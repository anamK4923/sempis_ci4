<?php

namespace App\Models;

use CodeIgniter\Model;

class DataGuruModel extends Model
{
              protected $table = 'data_guru';
              protected $primarykey = 'nip';
              // protected $useTimestamps = true;
              protected $allowedFields = [
                            'nip', 'nama_guru', 'alamat', 'tgl_lahir', 'jenis_kelamin',
                            'no_hp', 'email', 'jabatan', 'lulusan'
              ];

              public function getGuru($nip = false)
              {
                            if ($nip == false) {
                                          return $this->findAll();
                            }

                            return $this->where(['nip' => $nip])->first();
              }
}
