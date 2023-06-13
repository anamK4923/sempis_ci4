<?php

namespace App\Models;

use CodeIgniter\Model;

class DataPoinModel extends Model
{
    protected $table = 'poin';
    // protected $useTimestamps = true;
    protected $allowedFields = ['nis', 'jml_poin'];

    public function getPoin($nis = false)
    {
        if ($nis == false) {
            return $this->db->table('poin')
            ->join('status_poin', 'status_poin.nis = poin.nis')
            ->join('data_siswa', 'data_siswa.nis = poin.nis')
            ->get()->getResultArray();
        }

        return $this->where(['nis' => $nis])->first();
    }
}
