<?php

namespace App\Controllers;

class Invite extends BaseController
{
    private const IMAGES_PATH = FCPATH . 'assets/images/';
    private \App\Models\InvitedGuestModel $guestModel;

    public function __construct()
    {
        $this->guestModel = new \App\Models\InvitedGuestModel();
    }

    public function index($slug = null)
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'slug' => 'required|alpha_dash'
        ]);

        if (!$validation->run(['slug' => $slug])) {
            return redirect()->to(base_url('/'));
        }

        try {
            $guest = $this->guestModel->where('slug', $slug)->first();
            if (!$guest) {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            }
        } catch (\Exception $e) {
            log_message('error', $e->getMessage());
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            // return redirect()->back()->with('error', 'Terjadi kesalahan dalam memproses permintaan');
        }

        $images = $this->getGalleryImages();

        $data = [
            'guestName'  => $guest['name'],
            'slug'  => $guest['slug'],
            'images' => $images,
            // Tambahkan data lain seperti RSVP, acara, gallery, dll di sini
        ];

        return view('invitation/index', $data);
    }

    // Buat ImageModel atau Helper baru
    private function getGalleryImages(): array 
    {
        helper('filesystem');
        $map = directory_map(self::IMAGES_PATH, 1);

        // filter hanya file gambar
        $images = array_filter($map, function($entry) {
            return is_string($entry) && preg_match('/\.(jpe?g|png|gif)$/i', $entry);
        });

        // natural sort ascending (case-insensitive)
        natcasesort($images);

        // reset numeric keys dan kembalikan sebagai array berurutan
        return array_values($images);
    }

    public function submit()
    {
        if (!$this->request->isAJAX()) {
            return $this->response->setStatusCode(400)->setJSON(['success' => false, 'message' => 'Invalid request']);
        }

        $name    = $this->request->getPost('name');
        $attend  = $this->request->getPost('attend');
        $count   = $this->request->getPost('count') ?: 1;
        $message = $this->request->getPost('message');
        $slug    = $this->request->getPost('slug') ?? $this->request->getGet('slug'); // slug bisa dikirim via hidden input atau query

        if (!$name || !$attend) {
            return $this->response->setJSON(['success' => false, 'message' => 'Nama dan kehadiran wajib diisi.']);
        }

        $rsvpModel = new \App\Models\RsvpModel();
        $data = [
            'guest_name'      => $name,
            'attendance'      => $attend,
            'total_attendees' => $attend === 'yes' ? (int)$count : 0,
            'message'         => $message,
            'created_at'      => date('Y-m-d H:i:s')
        ];
        $rsvpModel->insert($data);

        // Update status RSVP di invited_guests jika slug tersedia
        if ($slug) {
            $guestModel = new \App\Models\InvitedGuestModel();
            $guestModel->where('slug', $slug)->set(['rsvp_status' => $attend])->update();
        }

        $now = date('Y-m-d\TH:i');
        $nowFormatted = date('d M Y H:i');

        return $this->response->setJSON([
            'success' => true,
            'wish' => [
                'name' => $name,
                'time' => $now,
                'timeFormatted' => $nowFormatted,
                'message' => $message
            ]
        ]);
    }

    // Ambil wishes terbaru (misal 20 terakhir)
    public function getWishes()
    {
        // Jangan batasi hanya AJAX agar tidak error 400
        $rsvpModel = new \App\Models\RsvpModel();
        $wishes = $rsvpModel->orderBy('created_at', 'DESC')->findAll(20);

        $result = [];
        foreach ($wishes as $wish) {
            $result[] = [
                'name' => $wish['guest_name'],
                'time' => date('Y-m-d\TH:i', strtotime($wish['created_at'])),
                'message' => $wish['message']
            ];
        }
        // Kembalikan array wishes di key 'wishes' agar JS bisa membaca data.wishes
        return $this->response->setJSON(['wishes' => $result]);
    }
}
