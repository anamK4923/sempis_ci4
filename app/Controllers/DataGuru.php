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

        return view('dataGuru/index', $data);
    }

    public function tambah()
    {
        $data = [
            'title' => 'Tambah Guru',
            'validation' => \Config\Services::validation()
        ];

        return view('dataGuru/tambah', $data);
    }

    public function simpan()
    {
        $this->dataGuruModel->save([
            'nip'           => $this->request->getVar('nip'),
            'nama_guru'    => $this->request->getVar('nama_guru'),
            'tgl_lahir'     => $this->request->getVar('tgl_lahir'),
            'jns_kelamin'   => $this->request->getVar('jenis_kelamin'),
            'alamat'        => $this->request->getVar('alamat'),
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

}
