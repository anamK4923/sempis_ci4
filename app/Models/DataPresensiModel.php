<?php

namespace App\Models;

use CodeIgniter\Model;

class DataPresensiModel extends Model
{
    protected $table = 'data_presensi';
    protected $primarykey = 'nis';
    // protected $useTimestamps = true;
    protected $allowedFields = ['tanggal', 'nis', 'keterangan'];

    public function getPresensi($nis = false)
    {
        if ($nis == false) {
            return $this->findAll();
        }

        return $this->where(['nis' => $nis])->first();
    }
}
