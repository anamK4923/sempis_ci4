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

        return view('dataPresensi/index', $data);
    }

    public function tambah()
    {
        $data = [
            'title' => 'Tambah Presensi',
            'validation' => \Config\Services::validation()
        ];

        return view('dataPresensi/tambah', $data);
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
