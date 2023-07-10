<?php

namespace App\Models;

use CodeIgniter\Model;

class DataNilaiModel extends Model
{
    protected $table = 'data_nilai';
    protected $primarykey = 'nis';
    // protected $useTimestamps = true;
    protected $allowedFields = ['nis', 'nilai', 'rata_rata'];

    public function getNilai($nis = false)
    {
        if ($nis == false) {
            return $this->findAll();
        }

        return $this->where(['nis' => $nis])->first();
    }
}
