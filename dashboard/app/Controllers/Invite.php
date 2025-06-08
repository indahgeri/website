<?php

namespace App\Controllers;

class Invite extends BaseController
{
    public function index($slug = null)
    {
        if (!$slug) {
            return redirect()->to('/');
        }

        $guestModel = new \App\Models\InvitedGuestModel();
        $guest = $guestModel->where('slug', $slug)->first();

        if (!$guest) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $data = [
            'guest' => $guest,
            // load juga data rsvp, acara, gallery, dll di sini
        ];

        return view('invitation/index', $data);
    }
}
