<?php

namespace App\Models;

use CodeIgniter\Model;

class DataSiswaModel extends Model
{
    protected $table = 'data_siswa';
    protected $primarykey = 'nis';
    // protected $useTimestamps = true;
    protected $allowedFields = ['nis', 'nama_siswa', 'tgl_lahir', 'jns_kelamin', 'alamat', 'tahun_masuk', 'kode_ruang'];

    public function getSiswa($nis = false)
    {
        if ($nis == false) {
            return $this->findAll();
        }

        return $this->where(['nis' => $nis])->first();
    }

    public function updateSiswa($data, $nis)
    {
        # code...
        return $this->db->table($this->table)->update($data, ['nis' => $nis]);
    }
}
