<?php

namespace App\Controllers;

use App\Models\DataSiswaModel;
use Config\Services;
use PSpell\Config;

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

        if (in_groups('admin')) {
            $data['role'] = 'Admin TU';
            return view('admin/dataSiswa/index', $data);
        } elseif (in_groups('kepsek')) {
            # code...
        }
    }

    public function detail($id)
    {
        $data = [
            'title' => 'Detail Siswa',
            'validation' => \Config\Services::validation(),
            'siswa' => $this->dataSiswaModel->getSiswa($id),
            'role' => 'Admin TU'
        ];

        return view('admin/dataSiswa/detail', $data);
    }

    public function tambah()
    {
        $data = [
            'title' => 'Tambah Siswa',
            'validation' => \Config\Services::validation(),
            'role' => 'Admin TU'
        ];

        return view('admin/dataSiswa/tambah', $data);
    }

    public function simpan()
    {
        if (!$this->validate([
            'nis'           => 'required|is_unique[data_siswa.nis]',
            'nama_siswa'    => 'required',
            'tgl_lahir'     => 'required',
            'jns_kelamin'   => 'required',
            'alamat'        => 'required',
            'tahun_masuk'   => 'required'
        ])) {
            $validation = \Config\Services::validation();

            // dd($validation);

            return redirect()->to('/siswa/tambah')->withInput();
        }


        $this->dataSiswaModel->save([
            'nis'           => $this->request->getVar('nis'),
            'nama_siswa'    => $this->request->getVar('nama_siswa'),
            'tgl_lahir'     => $this->request->getVar('tgl_lahir'),
            'jns_kelamin'   => $this->request->getVar('jns_kelamin'),
            'alamat'        => $this->request->getVar('alamat'),
            'tahun_masuk'   => $this->request->getVar('tahun_masuk')
        ]);

        return redirect()->to('/siswa');
    }

    public function hapus($nis)
    {
        // dd($nis);
        $this->dataSiswaModel->where('nis', $nis)->delete();

        return redirect()->to('/siswa');
    }

    public function edit($nis)
    {
        $data = [
            'title' => 'Edit Siswa',
            'validation' => \Config\Services::validation(),
            'siswa' => $this->dataSiswaModel->getSiswa($nis),
            'role' => 'Admin TU'
        ];

        return view('admin/dataSiswa/edit', $data);
    }

    public function update()
    {
        # code...
        $nis = $this->request->getPost('nis');

        $data = array(
            'nama_siswa'    => $this->request->getVar('nama_siswa'),
            'tgl_lahir'     => $this->request->getVar('tgl_lahir'),
            'jns_kelamin'   => $this->request->getVar('jns_kelamin'),
            'alamat'        => $this->request->getVar('alamat'),
            'tahun_masuk'   => $this->request->getVar('tahun_masuk')
        );

        $ubah = $this->dataSiswaModel->updateSiswa($data, $nis);
        if ($ubah) {
            session()->setFlashdata('info', 'Updated Category');
            // return redirect()->to(base_url('category'));
            return redirect()->to('/siswa');
        }
    }
}
