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
            return redirect()->to('/');
        }

        try {
            $guest = $this->guestModel->where('slug', $slug)->first();
            if (!$guest) {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            }
        } catch (\Exception $e) {
            log_message('error', $e->getMessage());
            return redirect()->back()->with('error', 'Terjadi kesalahan dalam memproses permintaan');
        }

        $images = $this->getGalleryImages();

        $data = [
            'guest'  => $guest,
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
}
