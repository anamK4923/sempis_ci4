<?php

namespace App\Models;

use CodeIgniter\Model;

class DataJadwalModel extends Model
{
    protected $table = 'jadwal';
    protected $primarykey = 'id';
    // protected $useTimestamps = true;
    protected $allowedFields = ['id', 'hari', 'jam_mulai', 'jam_selesai', 'kode_ruang', 'kode_mapel', 'id_karyawan'];

    public function getJadwal($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id' => $id])->first();
    }

    public function updateJadwal($data, $id)
    {
        # code...
        return $this->db->table($this->table)->update($data, ['id' => $id]);
    }
}
