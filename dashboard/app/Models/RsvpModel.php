<?php
namespace App\Models;

use CodeIgniter\Model;

class RsvpModel extends Model
{
    protected $table      = 'rsvp';
    protected $primaryKey = 'id';
    protected $allowedFields = ['guest_slug', 'guest_name', 'attendance', 'total_attendees', 'message', 'created_at'];
    protected $useTimestamps = false;
}
