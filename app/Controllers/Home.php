<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data['title'] = 'Home';

        if (in_groups('Admin TU')) {
            $data['role'] = 'Admin TU';
            return view('admin/landingPage/index.php', $data);
        } else if (in_groups('Guru')) {
            $data['role'] = 'Guru';
            return view('guru/landingPage/index.php', $data);
        } elseif (in_groups('Kepala Sekolah')) {
            $data['role'] = 'Kepala Sekolah';
            return view('kepsek/landingPage/index.php', $data);
        }
    }
}
