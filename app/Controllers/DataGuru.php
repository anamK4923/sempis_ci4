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
                                          // 'tgl_lahir'     => $this->request->getVar('tgl_lahir'),
                                          'jns_kelamin'   => $this->request->getVar('jns_kelamin'),
                                          'alamat'        => $this->request->getVar('alamat'),
                                          'tahun_masuk'   => $this->request->getVar('tahun_masuk')
                            ]);

                            return redirect()->to('/siswa');
              }
}
