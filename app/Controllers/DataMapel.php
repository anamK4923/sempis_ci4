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

        if (in_groups('admin')) {
            $data['role'] = 'Admin TU';
            return view('admin/dataMapel/index', $data);
        } elseif (in_groups('kepsek')) {
            # code...
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
}
