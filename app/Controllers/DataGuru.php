<?php

namespace App\Controllers;

use App\Models\DataGuruModel;

class DataGuru extends BaseController
{
    protected $dataGuruModel;
    public function __construct()
    {
        $this->dataGuruModel = new DataGuruModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Data Guru',
            'guru' => $this->dataGuruModel->getGuru()
        ];

        if (in_groups('Admin TU')) {
            $data['role'] = 'Admin TU';
            return view('admin/dataGuru/index', $data);
        } elseif (in_groups('Kepala Sekolah')) {
            $data['role'] = 'Kepala Sekolah';
            return view('admin/dataGuru/index', $data);
        }
    }

    public function tambah()
    {
        $data = [
            'title' => 'Tambah Guru',
            'role'  => 'Admin TU',
            'validation' => \Config\Services::validation()
        ];

        return view('admin/dataGuru/tambah', $data);
    }

    public function simpan()
    {
        $this->dataGuruModel->save([
            'nip'           => $this->request->getVar('nip'),
            'nama_guru'    => $this->request->getVar('nama_guru'),
            'tgl_lahir'     => $this->request->getVar('tgl_lahir'),
            'jns_kelamin'   => $this->request->getVar('jenis_kelamin'),
            'alamat'        => $this->request->getVar('alamat'),
            'no_hp'   => $this->request->getVar('no_hp'),
            'email'   => $this->request->getVar('email'),
            'jabatan'   => $this->request->getVar('jabatan'),
            'lulusan'   => $this->request->getVar('lulusan')
        ]);

        return redirect()->to('/guru');
    }

    public function hapus($nip)
    {
        // dd($nis);
        $this->dataGuruModel->where('nip', $nip)->delete();

        return redirect()->to('/guru');
    }

    public function edit($nip)
    {
        $data = [
            'title' => 'Edit Guru',
            'validation' => \Config\Services::validation(),
            'guru' => $this->dataGuruModel->getGuru($nip),
            'role' => 'Admin TU'
        ];

        return view('admin/dataGuru/edit', $data);
    }

    public function update()
    {
        # code...
        $nip = $this->request->getPost('nip');

        $data = array(
            'nama_guru'    => $this->request->getVar('nama_guru'),
            'tgl_lahir'     => $this->request->getVar('tgl_lahir'),
            'jenis_kelamin'   => $this->request->getVar('jenis_kelamin'),
            'alamat'        => $this->request->getVar('alamat'),
            'no_hp'        => $this->request->getVar('no_hp'),
            'email'   => $this->request->getVar('email'),
            'jabatan'   => $this->request->getVar('jabatan'),
            'lulusan'   => $this->request->getVar('lulusan')
        );

        $ubah = $this->dataGuruModel->updateGuru($data, $nip);
        if ($ubah) {
            session()->setFlashdata('info', 'Updated Category');
            // return redirect()->to(base_url('category'));
            return redirect()->to('/guru');
        }
    }
}
