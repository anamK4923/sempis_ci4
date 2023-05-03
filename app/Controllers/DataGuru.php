<?php

namespace App\Controllers;

use App\Models\DataGuruModel;

class DataGuru extends BaseController
{
              protected $dataGuruModel;
              public function __construct()
              {
                            $this->dataGuruModel = new DataGuruModel();
              }

              public function index()
              {
                            $data = [
                                          'title' => 'Data Guru',
                                          'siswa' => $this->dataGuruModel->getGuru()
                            ];

                            return view('dataGuru/index', $data);
              }

              public function tambah()
              {
                            $data = [
                                          'title' => 'Tambah Guru'
                            ];

                            return view('dataGuru/tambah', $data);
              }

              public function simpan()
              {
                            $this->dataGuruModel->save([
                                          'nip'           => $this->request->getVar('nip'),
                                          'nama_guru'    => $this->request->getVar('nama_guru'),
                                          'alamat'   => $this->request->getVar('alamat'),
                                         //'tgl_lahir'     => $this->request->getVar('tgl_lahir'),
                                          'jenis_kelamin' =>$thus->request->getVar('jenis_kelamin'),
                                          'no_hp'   => $this->request->getVar('no_hp'),
                                          'email'   => $this->request->getVar('email'),
                                          'jabatan'   => $this->request->getVar('jabatan'),
                                          'lulusan'   => $this->request->getVar('lulusan')
                            ]);

                            return redirect()->to('/siswa');
              }
}
