<?php

namespace App\Models;

use CodeIgniter\Model;

class DataKelasModel extends Model
{
  protected $table = 'kelas';
  protected $primarykey = 'kode_ruang';
  // protected $useTimestamps = true;
  protected $allowedFields = ['kode_ruang', 'nama_ruang', 'jenis_ruang'];

  public function getKelas($kode = false)
  {
    if ($kode == false) {
      return $this->findAll();
    }

    return $this->where(['kode_ruang' => $kode])->first();
  }
}
