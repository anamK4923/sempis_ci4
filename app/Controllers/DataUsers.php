<?php

namespace App\Controllers;

use App\Models\DataUsersModel;
use Config\Services;
use PhpParser\Node\Expr\FuncCall;
use PSpell\Config;

class DataUsers extends BaseController
{
    protected $dataUsersModel;
    protected $join;
    public function __construct()
    {
        $this->dataUsersModel = new DataUsersModel();
        $this->join = $this->dataUsersModel->select('users.*, auth_groups.name')
            ->join('auth_groups_users', 'auth_groups_users.user_id = users.id')
            ->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id')
            ->findAll();
    }

    public function index()
    {
        $data = [
            'title' => 'Data User',
            'users' => $this->join
        ];

        if (in_groups('Admin TU')) {
            $data['role'] = 'Admin TU';
            return view('admin/dataUsers/index', $data);
        } elseif (in_groups('Kepala Sekolah')) {
            $data['role'] = 'Kepala Sekolah';
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
