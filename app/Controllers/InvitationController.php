<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\Exceptions\PageNotFoundException;

class InvitationController extends BaseController
{
    /**
     * Show E-Invitation page by guest unique slug
     */
    public function show(string $slug)
    {
        $db = \Config\Database::connect();

        // 1. Fetch guest record
        $guest = $db->table('invitation_lists')
            ->where('slug', $slug)
            ->get()
            ->getRowArray();

        if (!$guest) {
            throw PageNotFoundException::forPageNotFound('Undangan tidak ditemukan atau tautan tidak valid.');
        }

        // 2. Increment view count
        $db->table('invitation_lists')->where('id', $guest['id'])->update([
            'view_count'     => (int)$guest['view_count'] + 1,
            'last_viewed_at' => date('Y-m-d H:i:s'),
        ]);

        // 3. Fetch Event Record
        $event = $db->table('events')->where('id', $guest['event_id'])->get()->getRowArray() ?: [
            'title'            => 'BeritaSatu Malam Apresiasi 2026',
            'theme'            => 'Menggerakkan Perubahan, Menginspirasi Negeri',
            'event_date_start' => '2026-11-20',
            'event_date_end'   => '2026-11-20',
        ];

        // 4. Check RSVP deadline: Allowed as long as event has not ended
        $eventEndTimestamp = strtotime(($event['event_date_end'] ?: $event['event_date_start']) . ' 23:59:59');
        $isEventEnded = (time() > $eventEndTimestamp);

        // 5. Determine active template
        $templateKey = 'malam_apresiasi';
        if (!empty($guest['template_id'])) {
            $tpl = $db->table('invitation_templates')->where('id', $guest['template_id'])->where('is_active', 1)->get()->getRowArray();
            if ($tpl && !empty($tpl['template_key'])) {
                $templateKey = $tpl['template_key'];
            }
        } else {
            $defTpl = $db->table('invitation_templates')
                ->where('event_id', $guest['event_id'])
                ->where('is_active', 1)
                ->where('is_default', 1)
                ->get()
                ->getRowArray();
            if ($defTpl && !empty($defTpl['template_key'])) {
                $templateKey = $defTpl['template_key'];
            }
        }

        // Sanitize templateKey against LFI
        $templateKey = preg_replace('/[^a-zA-Z0-9_-]/', '', $templateKey);
        $viewPath = 'invitation/templates/' . $templateKey;

        if (!is_file(APPPATH . 'Views/' . $viewPath . '.php')) {
            $viewPath = 'invitation/templates/malam_apresiasi';
        }

        return view($viewPath, [
            'guest'        => $guest,
            'event'        => $event,
            'isEventEnded' => $isEventEnded,
            'pageTitle'    => 'Undangan Resmi ' . esc($guest['name']) . ' — ' . esc($event['title']),
        ]);
    }

    /**
     * Submit / Update RSVP from guest
     */
    public function submitRsvp()
    {
        $invitationCode = trim((string)$this->request->getPost('invitation_code'));
        $rsvpStatus     = trim((string)$this->request->getPost('rsvp_status'));
        $notes          = trim((string)$this->request->getPost('notes'));

        if (!in_array($rsvpStatus, ['attending', 'declined'], true)) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Silakan pilih status kehadiran Anda.']);
        }

        $db = \Config\Database::connect();
        $guest = $db->table('invitation_lists')->where('invitation_code', $invitationCode)->get()->getRowArray();

        if (!$guest) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Kode undangan tidak valid.']);
        }

        // Check if event already concluded
        $event = $db->table('events')->where('id', $guest['event_id'])->get()->getRowArray();
        $eventEndTimestamp = strtotime(($event['event_date_end'] ?? '2026-11-20') . ' 23:59:59');
        if (time() > $eventEndTimestamp) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Masa konfirmasi kehadiran telah ditutup karena acara telah selesai.']);
        }

        // Sanitize notes
        $sanitizedNotes = mb_substr(strip_tags($notes), 0, 500);

        $db->table('invitation_lists')->where('id', $guest['id'])->update([
            'rsvp_status' => $rsvpStatus,
            'notes'       => $sanitizedNotes,
            'rsvp_at'     => date('Y-m-d H:i:s'),
            'updated_at'  => date('Y-m-d H:i:s'),
        ]);

        $statusLabel = ($rsvpStatus === 'attending') ? 'Hadir' : 'Berhalangan Hadir';

        return $this->response->setJSON([
            'status'      => 'success',
            'message'     => 'Terima kasih, konfirmasi kehadiran Anda (' . $statusLabel . ') berhasil dicatat.',
            'rsvp_status' => $rsvpStatus,
            'notes'       => $sanitizedNotes,
        ]);
    }

    /**
     * Live Preview for Admin (Dummy Guest)
     */
    public function preview()
    {
        $templateKey = trim((string)$this->request->getGet('template')) ?: 'malam_apresiasi';
        $templateKey = preg_replace('/[^a-zA-Z0-9_-]/', '', $templateKey);

        $dummyGuest = [
            'id'              => 0,
            'name'            => 'Bapak/Ibu Tamu Undangan Terhormat',
            'institution'     => 'Kementerian & Korporasi Mitra',
            'position'        => 'Tamu Undangan VIP',
            'email'           => 'tamu.vip@b-universe.id',
            'phone'           => '0812-3456-7890',
            'invitation_code' => 'MAP-PREVIEW',
            'slug'            => 'preview',
            'rsvp_status'     => 'pending',
            'notes'           => '',
        ];

        $dummyEvent = [
            'title'            => 'BeritaSatu Malam Apresiasi 2026',
            'theme'            => 'Menggerakkan Perubahan, Menginspirasi Negeri',
            'event_date_start' => '2026-11-20',
            'event_date_end'   => '2026-11-20',
        ];

        $viewPath = 'invitation/templates/' . $templateKey;
        if (!is_file(APPPATH . 'Views/' . $viewPath . '.php')) {
            $viewPath = 'invitation/templates/malam_apresiasi';
        }

        return view($viewPath, [
            'guest'        => $dummyGuest,
            'event'        => $dummyEvent,
            'isEventEnded' => false,
            'isPreview'    => true,
            'pageTitle'    => 'Preview E-Invitation — ' . esc($templateKey),
        ]);
    }
}
