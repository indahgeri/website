<?php
namespace App\Controllers;

use App\Models\RsvpModel;

class Rsvp extends BaseController
{
    protected $model;

    public function __construct()
    {
        $this->model = new RsvpModel();
    }

    // Tampilkan semua RSVP
    public function index()
    {
        if (!session('access_granted')) {
            return redirect()->to(site_url('access-token'));
        }
        $data = [
            'title' => 'Data RSVP',
            'rsvps' => $this->model->orderBy('created_at', 'DESC')->findAll(),
        ];
        return view('rsvp/index', $data);
    }

    // Hapus RSVP
    public function delete($id)
    {
        if (!session('access_granted')) {
            return redirect()->to(site_url('access-token'));
        }
        $this->model->delete($id);
        return redirect()->to(site_url('rsvp'))->with('success', 'Data RSVP berhasil dihapus.');
    }
}
