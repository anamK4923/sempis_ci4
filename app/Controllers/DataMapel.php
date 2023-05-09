<?php

namespace App\Controllers;

use App\Models\DataMapelModel;

class DataMapel extends BaseController
{
  protected $dataMapelModel;
  public function __construct()
  {
    $this->dataMapelModel = new DataMapelModel();
  }

  public function index()
  {
    $data = [
      'title' => 'Data Mapel',
      'mapel' => $this->dataMapelModel->getMapel()
    ];

    return view('dataMapel/index', $data);
  }

  public function tambah()
  {
    $data = [
      'title' => 'Tambah Mapel'
    ];

    return view('dataMapel/tambah', $data);
  }

  public function simpan()
  {
    $this->dataMapelModel->save([
      'kode_mapel'           => $this->request->getVar('kode_mapel'),
      'nama_mapel'    => $this->request->getVar('nama_mapel'),

    ]);

    return redirect()->to('/mapel');
  }
}
