<?php namespace App\Models;

use CodeIgniter\Model;

class InvitedGuestModel extends Model
{
    protected $table         = 'invited_guests';
    protected $primaryKey    = 'id';
    protected $allowedFields = [
        'name', 'slug', 'phone', 'email','detail',
        'is_sent', 'is_opened', 'rsvp_status'
    ];

    // timestamps
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = '';  // tidak ada updated_at

    // default values
    protected $defaultValues = [
        'is_sent'     => 0,
        'is_opened'   => 0,
        'rsvp_status' => 'pending',
    ];

    // validasi (optional)
    protected $validationRules = [
        'name'        => 'required|min_length[3]|max_length[100]',
        'phone'       => 'permit_empty|numeric',
        'email'       => 'permit_empty|valid_email',
        'details'     => 'permit_empty|max_length[255]',
        'rsvp_status' => 'required|in_list[pending,yes,no,maybe]',
    ];
}