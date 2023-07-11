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
        if (in_groups('Guru')) {
            $data['role'] = 'Guru';
            return view('guru/dataPresensi/index', $data);
        }
        // return view('dataPresensi/index', $data);
    }

    public function tambah()
    {
        $data = [
            'title' => 'Tambah Presensi',
            'role' => 'Guru',
            'validation' => \Config\Services::validation()
        ];
        if (in_groups('Guru')) {
            $data['role'] = 'Guru';
            return view('guru/dataPresensi/tambah', $data);
        }
        // return view('dataPresensi/tambah', $data);
    }

    public function update($nis)
    {
        $nis = $this->request->getPost('nis');
        $kehadiran = $this->request->getPost('kehadiran');
        $total_pertemuan = $this->request->getvar('total_pertemuan');
        $hadir = $this->request->getvar('hadir');
        $ijin = $this->request->getvar('ijin');
        $sakit = $this->request->getvar('sakit');
        $alpha = $this->request->getvar('alpha');

        if ($kehadiran == 'hadir') {
            $hadir += 1;
            $total_pertemuan += 1;
        } elseif ($kehadiran == 'ijin') {
            $ijin += 1;
            $total_pertemuan += 1;
        } elseif ($kehadiran == 'sakit') {
            $sakit += 1;
            $total_pertemuan += 1;
        } else {
            $alpha += 1;
            $total_pertemuan += 1;
        }
        $persentase = ($hadir + $ijin + $sakit) / $total_pertemuan * 100;
        // dd($c);
        $data = array(
            'nis'           => $nis,
            'hadir'    => $hadir,
            'ijin'    => $ijin,
            'sakit'    => $sakit,
            'alpha'    => $alpha,
            'total_pertemuan'    => $total_pertemuan,
            'persentase'    => $persentase
        );
        $ubah = $this->dataPresensiModel->updatePresensi($data, $nis);
        // if (!$ubah) {
        //     // Handle update failure if necessary
        // }
        // // }
        // session()->setFlashdata('info', 'Updated Category');
        return redirect()->to('/presensi');
    }

    public function simpan()
    {
        if (!$this->validate([
            // 'tanggal'         => 'required',
            'nis'           => 'required|is_unique[data_presensi.nis]'
        ])) {
            $validation = \Config\Services::validation();

            // dd($validation);

            return redirect()->to('/presensi/tambah')->withInput();
        }


        $this->dataPresensiModel->save([
            // 'tanggal'    => $this->request->getVar('tanggal'),
            'nis'           => $this->request->getVar('nis'),
            'hadir'    => 0,
            'ijin'    => 0,
            'sakit'    => 0,
            'alpha'    => 0,
            'total_pertemuan'    => 0,
            'persentase'    => 0
        ]);

        return redirect()->to('/presensi');
    }

    public function hapus()
    {
        $this->dataPresensiModel->delete($id = 'nis');

        return redirect()->to('/presensi');
    }
}
