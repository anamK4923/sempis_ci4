<?php

namespace App\Models;

use CodeIgniter\Model;

class DataMapelModel extends Model
{
              protected $table = 'mapel';
              protected $primarykey = 'kode_mapel';
              // protected $useTimestamps = true;
              protected $allowedFields = ['kode_mapel', 'nama_mapel'];

              public function getMapel($kode_mapel = false)
              {
                            if ($kode_mapel == false) {
                                          return $this->findAll();
                            }

                            return $this->where(['kode_mapel' => $kode_mapel])->first();
              }
}
