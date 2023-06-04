<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'user_id';
    protected $useTimestamps = TRUE;
    protected $allowedFields = ['user_nama', 'user_username', 'user_password', 'user_level', 'user_email', 'user_avatar'];

    public function getPengguna($id)
    {
        return $this->find($id);
    }
}
