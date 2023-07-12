<?php

namespace App\Models;

use CodeIgniter\Model;

class DataGuruModel extends Model
{
    protected $table = 'data_guru';
    protected $primarykey = 'id_karyawan';
    // protected $useTimestamps = true;
    protected $allowedFields = [
        'id_karyawan', 'nama_guru', 'alamat', 'tgl_lahir', 'jenis_kelamin',
        'no_hp', 'email', 'status', 'lulusan'
    ];

    public function getGuru($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id_karyawan' => $id])->first();
    }

    public function updateGuru($data, $id)
    {
        # code...
        return $this->db->table($this->table)->update($data, ['id_karyawan' => $id]);
    }

    public function jumlahGuru()
    {
        return $this->countAll();
    }
}
