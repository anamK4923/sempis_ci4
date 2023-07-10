<?php

namespace App\Controllers;

use App\Models\DataJadwalModel;

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
            'jadwal' => $this->dataJadwalModel->getJadwal()
        ];

        if (in_groups('Admin TU')) {
            $data['role'] = 'Admin TU';
            return view('admin/dataJadwal/index', $data);
        } else if (in_groups('Guru')) {
            # code...
        } elseif (in_groups('Kepala Sekolah')) {
            # code...
        }
    }

    public function tambah()
    {
        $data = [
            'title' => 'Tambah Jadwal',
            'role' => 'Admin TU'
        ];

        return view('admin/dataJadwal/tambah', $data);
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
