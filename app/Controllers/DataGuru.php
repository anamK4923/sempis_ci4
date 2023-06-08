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
            'guru' => $this->dataGuruModel->getGuru()
        ];

        if (in_groups('admin')) {
            $data['role'] = 'Admin TU';
            return view('admin/dataGuru/index', $data);
        } elseif (in_groups('kepsek')) {
            # code...
        }
    }

    public function tambah()
    {
        $data = [
            'title' => 'Tambah Guru',
            'role'  => 'Admin TU'
        ];

        return view('admin/dataGuru/tambah', $data);
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

        return redirect()->to('/guru');
    }
}
