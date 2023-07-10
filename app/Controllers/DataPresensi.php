<?php

namespace App\Controllers;

use App\Models\DataPresensiModel;
use Config\Services;
use PSpell\Config;

class DataPresensi extends BaseController
{
    protected $dataPresensiModel;
    public function __construct()
    {
        $this->dataPresensiModel = new DataPresensiModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Data Presensi',
            'presensi' => $this->dataPresensiModel->getPresensi()
        ];
        if (in_groups('guru')) {
            $data['role'] = 'Guru';
            return view('guru/dataPresensi/index', $data);
        }
        // return view('dataPresensi/index', $data);
    }

    public function tambah()
    {
        $data = [
            'title' => 'Tambah Presensi',
            'role' => 'guru',
            'validation' => \Config\Services::validation()
        ];
        if (in_groups('guru')) {
            $data['role'] = 'Guru';
            return view('guru/dataPresensi/tambah', $data);
        }
        // return view('dataPresensi/tambah', $data);
    }

    public function simpan()
    {
        if (!$this->validate([
            // 'tanggal'         => 'required',
            'nis'           => 'required|is_unique[data_presensi.nis]',
            'keterangan'     => 'required'
        ])) {
            $validation = \Config\Services::validation();

            // dd($validation);

            return redirect()->to('/presensi/tambah')->withInput();
        }


        $this->dataPresensiModel->save([
            // 'tanggal'    => $this->request->getVar('tanggal'),
            'nis'           => $this->request->getVar('nis'),
            'keterangan'     => $this->request->getVar('keterangan')
        ]);

        return redirect()->to('/presensi');
    }

    public function hapus()
    {
        $this->dataPresensiModel->delete($id = 'nis');

        return redirect()->to('/presensi');
    }
}
