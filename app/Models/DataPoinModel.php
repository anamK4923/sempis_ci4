<?php

namespace App\Models;

use CodeIgniter\Model;

class DataPoinModel extends Model
{
              protected $table = 'poin';
              protected $primarykey = 'id';
              // protected $useTimestamps = true;
              protected $allowedFields = ['id', 'nis', 'poin'];

              public function getPoin($id = false)
              {
                            if ($id == false) {
                                          return $this->findAll();
                            }

                            return $this->where(['id' => $id])->first();
              }
}
