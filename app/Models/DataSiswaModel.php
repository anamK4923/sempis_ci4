<?php

namespace App\Models;

use CodeIgniter\Model;

class DataSiswaModel extends Model
{
    protected $table = 'data_siswa';
    protected $primarykey = 'nis';
    // protected $useTimestamps = true;
    protected $allowedFields = ['nis', 'nama_siswa', 'tgl_lahir', 'jns_kelamin', 'alamat', 'tahun_masuk'];

    public function getSiswa($nis = false)
    {
        if ($nis == false) {
            return $this->findAll();
        }

        return $this->where(['nis' => $nis])->first();
    }
}
