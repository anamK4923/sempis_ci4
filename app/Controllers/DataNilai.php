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
    
    public function tambah()
    {
        $data = [
            'title' => 'Tambah Nilai',
            'role' => 'Guru',
            'validation' => \Config\Services::validation()
        ];

        return view('guru/dataNilai/tambah', $data);
    }

    public function simpan()
    {
        if (!$this->validate([
            'nis'           => 'required|is_unique[data_nilai.nis]',
            'nilai'         => 'required',
            'rata_rata'     => 'required'
        ])) {
            $validation = \Config\Services::validation();

            // dd($validation);

            return redirect()->to('/nilai/tambah')->withInput();
        }


        $this->dataNilaiModel->save([
            'nis'           => $this->request->getVar('nis'),
            'nilai'    => $this->request->getVar('nilai'),
            'rata_rata'     => $this->request->getVar('rata_rata')
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
