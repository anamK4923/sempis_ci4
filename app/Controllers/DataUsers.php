<?php

namespace App\Controllers;

use App\Models\DataUsersModel;
use Config\Services;
use PhpParser\Node\Expr\FuncCall;
use PSpell\Config;

class DataUsers extends BaseController
{
    protected $dataUsersModel;
    public function __construct()
    {
        $this->dataUsersModel = new DataUsersModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Data User',
            'users' => $this->dataUsersModel->getUsers()
        ];

        if (in_groups('admin')) {
            $data['role'] = 'Admin TU';
            return view('admin/dataUsers/index', $data);
        }
    }

    public function register()
    {
        $data = [
            'title' => 'Registrasi',
            'role' => 'Admin TU'
        ];
        return view('admin/dataUsers/register', $data);
    }

    public function hapus($id)
    {
        // dd($id);
        $this->dataUsersModel->where('id', $id)->delete();

        return redirect()->to('/users');
    }
}
