<?php

namespace App\Controllers;

use App\Models\DataPoinModel;

class DataPoin extends BaseController
{
    protected $dataPoinModel;
    public function __construct()
    {
        $this->dataPoinModel = new DataPoinModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Data Poin',
            'poin' => $this->dataPoinModel->getPoin()
        ];

        return view('dataPoin/index', $data);
    }

    public function tambah()
    {
        $data = [
            'title' => 'Tambah Poin',
            'validation' => \Config\Services::validation()
        ];

        return view('dataPoin/tambah', $data);
    }

    public function simpan()
    {
        $this->dataPoinModel->save([
            'id'     => $this->request->getVar('id'),
            'nip'    => $this->request->getVar('nip'),
            'poin'   => $this->request->getVar('poin'),
        ]);

        return redirect()->to('/poin');
    }
}
