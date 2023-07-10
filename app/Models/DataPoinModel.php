<?php

namespace App\Models;

use CodeIgniter\Model;

class DataPoinModel extends Model
{
    protected $table = 'poin';
    // protected $useTimestamps = true;
    protected $allowedFields = ['nis', 'jml_poin'];

    public function getPoin($nis = false)
    {
        if ($nis == false) {
            return $this->findAll();

        }
        return $this->where(['nis' => $nis])->first();
    }

    public function updatePoin($data, $nis)
    {
        # code...
        return $this->db->table($this->table)->update($data, ['nis' => $nis]);
    }
}
