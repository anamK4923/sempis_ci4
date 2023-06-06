<?php

namespace App\Models;

use CodeIgniter\Model;

class DataSiswaModel extends Model
{
    protected $table = 'data_siswa';
    protected $primarykey = 'id';
    // protected $useTimestamps = true;
    protected $allowedFields = ['nis', 'nama_siswa', 'tgl_lahir', 'jns_kelamin', 'alamat', 'tahun_masuk'];

    public function getSiswa($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id' => $id])->first();
    }

    public function updateData($data, $id)
    {
        return $this->update($data, ['id' => $id]);
    }
}
