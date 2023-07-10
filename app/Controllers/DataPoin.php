<?php

namespace App\Controllers;

use App\Models\DataPoinModel;


class DataPoin extends BaseController
{
    protected $dataPoinModel;

    public function __construct()
    {
        $this->dataPoinModel = new DataPoinModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Data Poin',
            'poin' => $this->dataPoinModel->getPoin()
        ];

        if (in_groups('Admin TU')) {
            $data['role'] = 'Admin TU';
            return view('admin/dataPoin/index', $data);
        } elseif (in_groups('Kepala Sekolah')) {
            # code...
        }
    }
    
    public function min($nis)
    {
        $nis = $nis;
        // dd($nis);
        $a = $this->request->getPost('poin');
        // dd($a);
        $b = $this->request->getvar('poin1');
        // dd($b);
        // foreach ($nis as $index => $n) {
            // $a = $poinValues[$index];
            // $b = $poinValues1[$index];
            $c = $a-$b;
            // dd($c);
            $data = [
                'jml_poin' => $c
            ];
    
            $ubah = $this->dataPoinModel->updatePoin($data, $nis);
    
            if (!$ubah) {
                // Handle update failure if necessary
            }
        // }
    
        session()->setFlashdata('info', 'Updated Category');
        return redirect()->to('/poin');
    }

    // public function min()
    // {
    //     $nis = $this->request->getPost('nis');
    //     $poinValues = $this->request->getPost('poin');
    //     $poinValues1 = $this->request->getPost('poin1');
    //     foreach ($nis as $index => $n) {
    //         $a = $poinValues[$index];
    //         $b = $poinValues1[$index];
    //         $c = $a-$b;
    //         $data = [
    //             'jml_poin' => $c
    //         ];
    
    //         $ubah = $this->dataPoinModel->updatePoin($data, $n);
    
    //         if (!$ubah) {
    //             // Handle update failure if necessary
    //         }
    //     }
    
    //     session()->setFlashdata('info', 'Updated Category');
    //     return redirect()->to('/poin');
    // }
    
}
