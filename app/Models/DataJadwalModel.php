<?php

namespace App\Models;

use CodeIgniter\Model;

class DataJadwalModel extends Model
{
    protected $table = 'jadwal';
    // protected $useTimestamps = true;
    protected $allowedFields = ['hari', 'kode_kelas', 'kode_mapel', 'nip'];

    public function getJadwal($hari = false)
    {
        if ($hari == false) {
            return $this->findAll();
        }

        return $this->where(['hari' => $hari])->first();
    }
}
