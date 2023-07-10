<?php

namespace App\Controllers;

use App\Models\DataGuruModel;
use App\Models\DataKelasModel;
use App\Models\DataMapelModel;
use App\Models\DataSiswaModel;

class Home extends BaseController
{
    protected $dataSiswaModel;
    protected $dataGuruModel;
    protected $dataKelasModel;
    protected $dataMapelModel;

    public function __construct()
    {
        $this->dataSiswaModel = new DataSiswaModel();
        $this->dataGuruModel = new DataGuruModel();
        $this->dataKelasModel = new DataKelasModel();
        $this->dataMapelModel = new DataMapelModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Home',
            'siswa' => $this->dataSiswaModel->jumlahSiswa(),
            'guru' => $this->dataGuruModel->jumlahGuru(),
            'kelas' => $this->dataKelasModel->jumlahKelas(),
            'mapel' => $this->dataMapelModel->jumlahMapel()
        ];

        if (in_groups('Admin TU')) {
            $data['role'] = 'Admin TU';
            return view('admin/landingPage/index.php', $data);
        } else if (in_groups('Guru')) {
            $data['role'] = 'Guru';
            return view('guru/landingPage/index.php', $data);
        } elseif (in_groups('Kepala Sekolah')) {
            $data['role'] = 'Kepala Sekolah';
            return view('kepsek/landingPage/index.php', $data);
        }
    }
}
