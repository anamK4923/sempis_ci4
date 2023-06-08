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

        if (in_groups('admin')) {
            $data['role'] = 'Admin TU';
            return view('admin/dataPoin/index', $data);
        } elseif (in_groups('kepsek')) {
            # code...
        }
    }

    public function tambah()
    {
        $data = [
            'title' => 'Tambah Poin',
            'role' => 'Admin TU'
        ];

        return view('admin/dataPoin/tambah', $data);
    }

    public function simpan()
    {
        $this->dataPoinModel->save([
            'id'           => $this->request->getVar('id'),
            'nip'    => $this->request->getVar('nip'),
            'poin'   => $this->request->getVar('poin'),
        ]);

        return redirect()->to('/poin');
    }
}
