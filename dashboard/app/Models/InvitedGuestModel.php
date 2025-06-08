<?php

namespace App\Models;

use CodeIgniter\Model;

class InvitedGuestModel extends Model
{
    protected $table = 'invited_guests';
    protected $allowedFields = ['name', 'email', 'phone', 'status', 'created_at', 'updated_at'];
}

