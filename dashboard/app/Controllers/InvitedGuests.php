<?php namespace App\Controllers;

use App\Models\InvitedGuestModel;

class InvitedGuests extends BaseController
{
    protected $model;

    public function __construct()
    {
        $this->model = new InvitedGuestModel();
    }

    /** List semua tamu */
    public function index()
    {
        $data = [
            'title'  => 'Daftar Tamu Undangan',
            'guests' => $this->model->orderBy('created_at','DESC')->findAll(),
        ];
        return view('invited_guests/index', $data);
    }

    /** Form tambah */
    public function create()
    {
        return view('invited_guests/form', [
            'title'      => 'Tambah Tamu Undangan',
            'guest'      => null,
            'validation' => \Config\Services::validation()
        ]);
    }

    /** Simpan data baru */
    public function store()
    {
        if (! $this->validateModel()) {
            return redirect()->back()->withInput();
        }

        $post = $this->request->getPost();
        $this->model->insert([
            'name'        => $post['name'],
            'slug'        => url_title($post['name'], '-', true),
            'phone'       => $post['phone'],
            'detail'       => $post['detail'],
            'is_sent'     => isset($post['is_sent']) ? 1 : 0,
            'is_opened'   => isset($post['is_opened']) ? 1 : 0,
            'rsvp_status' => $post['rsvp_status'],
        ]);

        session()->setFlashdata('success', 'Tamu berhasil ditambahkan.');
        return redirect()->to('/invited-guests');
    }

    /** Form edit */
    public function edit($id)
    {
        $guest = $this->model->find($id);
        if (! $guest) throw new \CodeIgniter\Exceptions\PageNotFoundException("Tamu #{$id} tidak ditemukan");

        return view('invited_guests/form', [
            'title'      => 'Edit Tamu Undangan',
            'guest'      => $guest,
            'validation' => \Config\Services::validation()
        ]);
    }

    /** Proses update */
    public function update($id)
    {
        if (! $this->validateModel()) {
            return redirect()->back()->withInput();
        }

        $post = $this->request->getPost();
        $data = [
            'name'        => $post['name'],
            'slug'        => url_title($post['name'], '-', true),
            'phone'       => $post['phone'],
            'detail'       => $post['detail'],
            'is_sent'     => isset($post['is_sent']) ? 1 : 0,
            'is_opened'   => isset($post['is_opened']) ? 1 : 0,
            'rsvp_status' => $post['rsvp_status'],
        ];

        // ▶️ Benar: data dulu, lalu ID
        $this->model->update($id, $data);

        session()->setFlashdata('success', 'Data tamu berhasil diperbarui.');
        return redirect()->to('/invited-guests');
    }

    /** Hapus data */
    public function delete($id)
    {
        $this->model->delete($id);
        session()->setFlashdata('success', 'Tamu berhasil dihapus.');
        return redirect()->to('/invited-guests');
    }

    /** Validasi input shared */
    protected function validateModel(): bool
    {
        return $this->validate($this->model->validationRules);
    }
}
