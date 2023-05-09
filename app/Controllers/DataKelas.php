<?php

namespace App\Controllers;

use App\Models\DataKelasModel;
use Config\Services;
use PSpell\Config;

class DataKelas extends BaseController
{
  protected $dataKelasModel;
  public function __construct()
  {
    $this->dataKelasModel = new DataKelasModel();
  }

  public function index()
  {
    $data = [
      'title' => 'Data Kelas',
      'kelas' => $this->dataKelasModel->getKelas()
    ];

    return view('dataKelas/index', $data);
  }

  public function tambah()
  {
    $data = [
      'title' => 'Tambah Kelas',
      'validation' => \Config\Services::validation()
    ];

    return view('dataKelas/tambah', $data);
  }

  public function simpan()
  {
    if (!$this->validate([
      'kode_ruang'    => 'required|is_unique[kelas.kode_ruang]',
      'nama_ruang'    => 'required',
      'jenis_ruang'   => 'required'
    ])) {
      $validation = \Config\Services::validation();

      // dd($validation);

      return redirect()->to('/kelas/tambah')->withInput();
    }


    $this->dataKelasModel->save([
      'kode_ruang'    => $this->request->getVar('kode_ruang'),
      'nama_ruang'    => $this->request->getVar('nama_ruang'),
      'jenis_ruang'   => $this->request->getVar('jenis_ruang')
    ]);

    return redirect()->to('/kelas');
  }

  public function hapus()
  {
    $this->dataKelasModel->delete($id = 'kode_ruang');

    return redirect()->to('/kelas');
  }
}