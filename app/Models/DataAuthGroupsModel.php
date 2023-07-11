<?php

namespace App\Models;

use CodeIgniter\Model;

class DataAuthGroupsModel extends Model
{
    protected $table = 'auth_groups';
    protected $primarykey = 'id';
    // protected $useTimestamps = true;
    // protected $allowedFields = ['group_id', 'user_id'];
    public function getAuthority()
    {
        return $this->findAll();
    }
}
