<?php

namespace App\Controllers;

use App\Models\DataNilaiModel;
use App\Models\DataMapelModel;
use Config\Services;
use PSpell\Config;

class DataNilai extends BaseController
{
    protected $dataNilaiModel;
    protected $dataMapelModel;
    public function __construct()
    {
        $this->dataNilaiModel = new DataNilaiModel();
        $this->dataMapelModel = new DataMapelModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Data Nilai',
            'nilai' => $this->dataNilaiModel->getNilai(),
            'mapel' => $this->dataMapelModel->getMapel()
        ];


        if (in_groups('Guru')) {
            $data['role'] = 'Guru';
            return view('guru/dataNilai/index', $data);
        }
    }

    public function edit($nis)
    {
        $data = [
            'title' => 'Input Nilai',
            'role' => 'Guru',
            'nilai' => $this->dataNilaiModel->getNilai($nis),
            'mapel' => $this->dataMapelModel->getMapel(),
            'validation' => \Config\Services::validation()
        ];

        return view('guru/dataNilai/edit', $data);
    }

    // public function edit($nis)
    // {
    //     $data = [
    //         'title' => 'Edit Siswa',
    //         'validation' => \Config\Services::validation(),
    //         'siswa' => $this->dataSiswaModel->getSiswa($nis),
    //         'role' => 'Admin TU'
    //     ];

    //     return view('admin/dataSiswa/edit', $data);
    // }

    public function update()
    {
        $nis = $this->request->getPost('nis');

        // if (!$this->validate([
        //     'nis'           => 'required|is_unique[data_nilai.nis]',
        //     'kode_mapel'           => 'required',
        //     'kode_ruang'           => 'required',
        //     'tugas_1'         => 'required',
        //     'tugas_2'         => 'required',
        //     'tugas_3'         => 'required',
        //     'uts'         => 'required',
        //     'uas'         => 'required'
        // ])) {
        //     $validation = \Config\Services::validation();

        //     // dd($validation);

        //     return redirect()->to('/nilai/edit/' . $nis);
        // }


        $a = $this->request->getPost('tugas_1');
        $b = $this->request->getPost('tugas_2');
        $c = $this->request->getPost('tugas_3');
        $d = $this->request->getPost('uts');
        $e = $this->request->getPost('uas');
        $total = ($a + $b + $c + $d + $e) / 5;
        $data = array(
            'nis'           => $nis,
            'kode_mapel'    => $this->request->getVar('kode_mapel'),
            'kode_ruang'    => $this->request->getVar('kode_ruang'),
            'tugas_1'    => $a,
            'tugas_2'    => $b,
            'tugas_3'    => $c,
            'uts'    => $d,
            'uas'    => $e,
            'rata_rata'     => $total
        );
        $ubah = $this->dataNilaiModel->updateNilai($data, $nis);
        // if ($ubah) {
        //     session()->setFlashdata('info', 'Updated Category');
        //     // return redirect()->to(base_url('category'));
        //     return redirect()->to('/nilai');
        // }

        return redirect()->to('/nilai');
    }
}
