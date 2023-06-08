<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data['title'] = 'Home';

        if (in_groups('admin')) {
            $data['role'] = 'Admin TU';
            return view('admin/landingPage/index.php', $data);
        } else if (in_groups('guru')) {
            $data['role'] = 'Guru';
            return view('guru/landingPage/index.php', $data);
        } elseif (in_groups('kepsek')) {
            $data['role'] = 'Kepala Sekolah';
            return view('kepsek/landingPage/index.php', $data);
        }
    }
}
