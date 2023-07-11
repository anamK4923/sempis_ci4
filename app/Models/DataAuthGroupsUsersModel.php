<?php

namespace App\Models;

use CodeIgniter\Model;

class DataAuthGroupsUsersModel extends Model
{
    protected $table = 'auth_groups_users';
    // protected $primarykey = 'id';
    // protected $useTimestamps = true;
    protected $allowedFields = ['group_id', 'user_id', 'id_karyawan'];

    public function updateGroupsUsers($data, $user_id)
    {
        # code...
        return $this->db->table($this->table)->update($data, ['user_id' => $user_id]);
    }
}
