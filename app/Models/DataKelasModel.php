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

  public function updateKelas($data, $kode_ruang)
  {
    # code...
    return $this->db->table($this->table)->update($data, ['kode_ruang' => $kode_ruang]);
  }
}
