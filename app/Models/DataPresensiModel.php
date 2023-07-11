<?php

namespace App\Models;

use CodeIgniter\Model;

class DataPresensiModel extends Model
{
    protected $table = 'data_presensi';
    protected $primarykey = 'id';
    // protected $useTimestamps = true;
    protected $allowedFields = ['id', 'nis', 'hadir', 'ijin', 'sakit', 'alpha', 'total_pertemuan', 'persentase'];

    public function getPresensi($nis = false)
    {
        if ($nis == false) {
            return $this->findAll();
        }

        return $this->where(['nis' => $nis])->first();
    }

    public function updatePresensi($data, $nis)
    {
        # code...
        return $this->db->table($this->table)->update($data, ['nis' => $nis]);
    }
}
