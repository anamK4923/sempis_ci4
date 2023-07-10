<?php

namespace App\Controllers;

use App\Models\DataNilaiModel;
use Config\Services;
use PSpell\Config;

class DataNilai extends BaseController
{
    protected $dataNilaiModel;
    public function __construct()
    {
        $this->dataNilaiModel = new DataNilaiModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Data Nilai',
            'nilai' => $this->dataNilaiModel->getNilai()
        ];

        if (in_groups('guru')) {
            $data['role'] = 'Guru';
            return view('guru/dataNilai/index', $data);
        }
    }

    public function edit($nis)
    {
        $data = [
            'title' => 'Tambah Nilai',
            'role' => 'Guru',
            'nilai' => $this->dataNilaiModel->getNilai($nis),
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
        if (!$this->validate([
            'nis'           => 'required|is_unique[data_nilai.nis]',
            'tugas_1'         => 'required',
            'tugas_2'         => 'required',
            'tugas_3'         => 'required',
            'uts'         => 'required',
            'uas'         => 'required'
        ])) {
            $validation = \Config\Services::validation();

            // dd($validation);

            return redirect()->to('/nilai/edit')->withInput();
        }


        $a = $this->request->getPost('tugas_1');
        $b = $this->request->getPost('tugas_2');
        $c = $this->request->getPost('tugas_3');
        $d = $this->request->getPost('uts');
        $e = $this->request->getPost('uas');
        $total = ($a + $b + $c + $d + $e) / 5;
        $this->dataNilaiModel->save([
            'nis'           => $this->request->getVar('nis'),
            'kode_mapel'    => $this->request->getVar('kode_mapel'),
            'kode_ruang'    => $this->request->getVar('kode_ruang'),
            'tugas_1'    => $a,
            'tugas_2'    => $b,
            'tugas_3'    => $c,
            'uts'    => $d,
            'uas'    => $e,
            'rata_rata'     => $total
        ]);

        return redirect()->to('/nilai');
    }

    public function hapus()
    {
        $this->dataNilaiModel->where('id', $id)->delete();

        if (in_groups('guru')) {
            $data['role'] = 'Guru';
            return redirect()->to('/nilai');
        }
    }
}
