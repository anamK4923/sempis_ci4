<?php

namespace App\Controllers;

use App\Models\DataAuthGroupsModel;
use App\Models\DataAuthGroupsUsersModel;
use App\Models\DataAuthorityModel;
use App\Models\DataGuruModel;
use App\Models\DataUsersModel;
use Config\Services;
use PhpParser\Node\Expr\FuncCall;
use PSpell\Config;

class DataUsers extends BaseController
{
    protected $dataUsersModel;
    protected $dataAuthGroupsModel, $dataAuthGroupsUsersModel, $dataGuruModel;
    protected $join;
    public function __construct()
    {
        $this->dataUsersModel = new DataUsersModel();
        $this->dataAuthGroupsModel = new DataAuthGroupsModel();
        $this->dataGuruModel = new DataGuruModel();

        $this->dataAuthGroupsUsersModel = new DataAuthGroupsUsersModel();
        $this->join = $this->dataUsersModel->select('users.*, auth_groups.name, auth_groups_users.*')
            ->join('auth_groups_users', 'auth_groups_users.user_id = users.id')
            ->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id')
            ->findAll();
        // dd($this->join);
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
            'role' => 'Admin TU',
            'authority' => $this->dataAuthGroupsModel->getAuthority()
        ];
        return view('admin/dataUsers/register', $data);
    }

    public function authority($id)
    {
        $data = [
            'title' => 'Registrasi',
            'role' => 'Admin TU',
            'authority' => $this->dataAuthGroupsModel->getAuthority(),
            'id_user'   => $id,
            'karyawan'  => $this->dataGuruModel->getGuru()
        ];
        // dd($data);
        return view('admin/dataUsers/authority', $data);
    }

    public function saveAuthority()
    {
        $id_user = $this->request->getVar('id_user');

        $data = [
            'group_id' => $this->request->getVar('id'),
            'user_id' => $id_user,
            'id_karyawan'   => $this->request->getVar('id_karyawan')
        ];
        // dd($data);

        $this->dataAuthGroupsUsersModel->updateGroupsUsers($data, $id_user);

        return redirect()->to('/users');
    }


    public function hapus($id)
    {
        // dd($id);
        $this->dataUsersModel->where('id', $id)->delete();

        return redirect()->to('/users');
    }
}
