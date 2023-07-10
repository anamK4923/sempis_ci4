<?php

namespace App\Models;

use CodeIgniter\Model;

class DataJadwalModel extends Model
{
    protected $table = 'jadwal';
    protected $primarykey = 'id';
    // protected $useTimestamps = true;
    protected $allowedFields = ['id', 'hari', 'jam_mulai', 'jam_selesai', 'kode_ruang', 'kode_mapel', 'nip'];

    public function getJadwal($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id' => $id])->first();
    }
}
