<?php

namespace App\Models;

use CodeIgniter\Model;

class DataNilaiModel extends Model
{
    protected $table = 'data_nilai';
    protected $primarykey = 'nis';
    // protected $useTimestamps = true;
    protected $allowedFields = ['id', 'nis', 'kode_mapel', 'kode_ruang', 'tugas_1', 'tugas_2', 'tugas_3', 'uts', 'uas', 'rata_rata'];

    public function getNilai($nis = false)
    {
        if ($nis == false) {
            return $this->findAll();
        }

        return $this->where(['nis' => $nis])->first();
    }
    public function updateNilai($data, $nis)
    {
        # code...
        return $this->db->table($this->table)->update($data, ['nis' => $nis]);
    }
}
