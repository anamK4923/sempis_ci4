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

    if (in_groups('admin')) {
      $data['role'] = 'Admin TU';
      return view('admin/dataKelas/index', $data);
    } elseif (in_groups('kepsek')) {
      # code...
    }
  }

  public function tambah()
  {
    $data = [
      'title' => 'Tambah Kelas',
      'validation' => \Config\Services::validation(),
      'role' => 'Admin TU'
    ];

    return view('admin/dataKelas/tambah', $data);
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
  public function hapus($kode_ruang)
  {
    $this->dataKelasModel->where('kode_ruang', $kode_ruang)->delete();

    return redirect()->to('/kelas');
  }
}
