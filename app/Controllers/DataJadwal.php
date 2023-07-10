<?php

namespace App\Controllers;

use App\Models\DataGuruModel;
use App\Models\DataJadwalModel;
use App\Models\DataKelasModel;
use App\Models\DataMapelModel;

class DataJadwal extends BaseController
{
    protected $dataJadwalModel;
    protected $dataGuruModel;
    protected $dataMapelModel;
    protected $dataKelasModel;
    protected $join;
    public function __construct()
    {
        $this->dataJadwalModel = new DataJadwalModel();
        $this->dataGuruModel = new DataGuruModel();
        $this->dataMapelModel = new DataMapelModel();
        $this->dataKelasModel = new DataKelasModel();
        $this->join = $this->dataJadwalModel->select('jadwal.*, kelas.*, mapel.*, data_guru.*')
            ->join('kelas', 'kelas.kode_ruang = jadwal.kode_ruang')
            ->join('mapel', 'mapel.kode_mapel = jadwal.kode_mapel')
            ->join('data_guru', 'data_guru.nip = jadwal.nip')
            ->findAll();
        // dd($this->join);
    }

    public function index()
    {
        $data = [
            'title' => 'Data Jadwal',
            'jadwal' => $this->join
        ];

        if (in_groups('Admin TU')) {
            $data['role'] = 'Admin TU';
            return view('admin/dataJadwal/index', $data);
        } else if (in_groups('Guru')) {
            # code...
        } elseif (in_groups('Kepala Sekolah')) {
            # code...
        }
    }

    public function tambah()
    {
        $data = [
            'title' => 'Tambah Jadwal',
            'role' => 'Admin TU',
            'kelas' => $this->dataKelasModel->getKelas(),
            'mapel' => $this->dataMapelModel->getMapel(),
            'guru' => $this->dataGuruModel->getGuru()
        ];

        return view('admin/dataJadwal/tambah', $data);
    }

    public function simpan()
    {
        if (!$this->validate([
            'hari'           => 'required',
            'jam_mulai'    => 'required',
            'jam_selesai'     => 'required',
            'kode_ruang'   => 'required',
            'kode_mapel'        => 'required',
            'nip'   => 'required'
        ])) {
            $validation = \Config\Services::validation();

            // dd($validation);

            return redirect()->to('/jadwal/tambah')->withInput();
        }

        $data = [
            'hari'           => $this->request->getVar('hari'),
            'jam_mulai'    => $this->request->getVar('jam_mulai'),
            'jam_selesai'     => $this->request->getVar('jam_selesai'),
            'kode_ruang'   => $this->request->getVar('kode_ruang'),
            'kode_mapel'   => $this->request->getVar('kode_mapel'),
            'nip'   => $this->request->getVar('nip')
        ];
        // dd($data);


        $this->dataJadwalModel->save($data);

        return redirect()->to('/jadwal');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Jadwal',
            'validation' => \Config\Services::validation(),
            'jadwal' => $this->dataJadwalModel->getJadwal($id),
            'role' => 'Admin TU',
            'kelas' => $this->dataKelasModel->getKelas(),
            'mapel' => $this->dataMapelModel->getMapel(),
            'guru' => $this->dataGuruModel->getGuru()
        ];

        return view('admin/dataJadwal/edit', $data);
    }

    public function update()
    {
        # code...
        $id = $this->request->getPost('id');

        if (!$this->validate([
            'hari'           => 'required',
            'jam_mulai'    => 'required',
            'jam_selesai'     => 'required',
            'kode_ruang'   => 'required',
            'kode_mapel'        => 'required',
            'nip'   => 'required'
        ])) {
            $validation = \Config\Services::validation();

            // dd($validation);

            return redirect()->to('/jadwal/edit/' . $id);
        }

        $data = array(
            'hari'           => $this->request->getVar('hari'),
            'jam_mulai'    => $this->request->getVar('jam_mulai'),
            'jam_selesai'     => $this->request->getVar('jam_selesai'),
            'kode_ruang'   => $this->request->getVar('kode_ruang'),
            'kode_mapel'   => $this->request->getVar('kode_mapel'),
            'nip'   => $this->request->getVar('nip')
        );

        $ubah = $this->dataJadwalModel->updateJadwal($data, $id);
        if ($ubah) {
            session()->setFlashdata('info', 'Updated Category');
            // return redirect()->to(base_url('category'));
            return redirect()->to('/jadwal');
        }
    }

    public function hapus($id)
    {
        $this->dataJadwalModel->where('id', $id)->delete();

        return redirect()->to('/jadwal');
    }
}
