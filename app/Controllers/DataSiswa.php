<?php

namespace App\Controllers;

use App\Models\DataSiswaModel;

class DataSiswa extends BaseController
{
    protected $dataSiswaModel;
    public function __construct()
    {
        $this->dataSiswaModel = new DataSiswaModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Data Siswa',
            'siswa' => $this->dataSiswaModel->getSiswa()
        ];

        return view('dataSiswa/index', $data);
    }

    public function tambah()
    {
        $data = [
            'title' => 'Tambah Siswa'
        ];

        return view('dataSiswa/tambah', $data);
    }

    public function simpan()
    {
        $this->dataSiswaModel->save([
            'nis'           => $this->request->getVar('nis'),
            'nama_siswa'    => $this->request->getVar('nama_siswa'),
            // 'tgl_lahir'     => $this->request->getVar('tgl_lahir'),
            'jns_kelamin'   => $this->request->getVar('jns_kelamin'),
            'alamat'        => $this->request->getVar('alamat'),
            'tahun_masuk'   => $this->request->getVar('tahun_masuk')
        ]);

        return redirect()->to('/siswa');
    }
}
