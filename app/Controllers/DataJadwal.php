<?php

namespace App\Controllers;

use App\Models\DataSiswaModel;

class DataJadwal extends BaseController
{
    protected $dataJadwalModel;
    public function __construct()
    {
        $this->dataJadwalModel = new DataJadwalModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Data Jadwal',
            'siswa' => $this->dataJadwalModel->getJadwal()
        ];

        return view('dataJadwal/index', $data);
    }

    public function tambah()
    {
        $data = [
            'title' => 'Tambah Jadwal'
        ];

        return view('dataJadwal/tambah', $data);
    }

    public function simpan()
    {
        $this->dataJadwalModel->save([
            'hari'           => $this->request->getVar('hari'),
            'kode_kelas'    => $this->request->getVar('kode_kelas'),
            'kode_mapel'   => $this->request->getVar('kode_mapel'),
            'nip'   => $this->request->getVar('nip')
        ]);

        return redirect()->to('/jadwal');
    }
}
