<?php
namespace App\Controllers;

class AccessToken extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Masukkan Token Akses',
            'error' => session()->getFlashdata('error'),
        ];
        return view('access_token_form', $data);
    }

    public function submit()
    {
        $inputToken = $this->request->getPost('token');
        $validToken = getenv('ACCESS_TOKEN'); // atau simpan di config

        if ($inputToken === $validToken) {
            session()->set('access_granted', true);
            return redirect()->to('/invited-guests');
        }

        return redirect()->back()->with('error', 'Token salah');
    }

    public function logout()
    {
        session()->remove('access_granted');
        return redirect()->to('/invited-guests')->with('success', 'Anda telah keluar');
    }
}
