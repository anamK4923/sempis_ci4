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

        if (in_groups('Admin TU')) {
            $data['role'] = 'Admin TU';
            return view('admin/dataMapel/index', $data);
        } elseif (in_groups('Kepala Sekolah')) {
            $data['role'] = 'Kepala Sekolah';
            return view('admin/dataMapel/index', $data);
        }
    }

    public function tambah()
    {
        $data = [
            'title' => 'Tambah Mapel',
            'role' => 'Admin TU',
            'validation' => \Config\Services::validation()
        ];

        return view('admin/dataMapel/tambah', $data);
    }

    public function simpan()
    {
        $this->dataMapelModel->save([
            'kode_mapel'           => $this->request->getVar('kode_mapel'),
            'nama_mapel'    => $this->request->getVar('nama_mapel'),

        ]);

        return redirect()->to('/mapel');
    }

    public function hapus($kode_mapel)
    {
        // dd($nis);
        $this->dataMapelModel->where('kode_mapel', $kode_mapel)->delete();

        return redirect()->to('/mapel');
    }
    public function edit($kode_mapel)
    {
        $data = [
            'title' => 'Edit Mapel',
            'validation' => \Config\Services::validation(),
            'mapel' => $this->dataMapelModel->getMapel($kode_mapel),
            'role' => 'Admin TU'
        ];

        return view('admin/dataMapel/edit', $data);
    }

    public function update()
    {
        # code...
        $kode_mapel = $this->request->getPost('kode_mapel');

        $data = array(
            'nama_mapel'     => $this->request->getVar('nama_mapel'),
        );

        $ubah = $this->dataMapelModel->updateMapel($data, $kode_mapel);
        if ($ubah) {
            session()->setFlashdata('info', 'Updated Category');
            // return redirect()->to(base_url('category'));
            return redirect()->to('/mapel');
        }
    }
}
