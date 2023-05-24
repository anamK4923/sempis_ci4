<?php

namespace App\Models;

use CodeIgniter\Model;

class DataUsersModel extends Model
{
    protected $table = 'users';
    protected $primarykey = 'id';
    // protected $useTimestamps = true;
    protected $allowedFields = ['email', 'username'];

    public function getUsers($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id' => $id])->first();
    }
}
