<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data['title'] = 'Wilayah';
        return view('login', $data);
    }

    public function halaman_utama()
    {
        $data = [
            'title' => 'Daerah Rawan Kriminalitas'
        ];
        echo view('users/templates/header', $data);
        echo view('users/index');
        echo view('users/templates/footer');
    }

    public function informasi()
    {
        $data = [
            'title' => 'Informasi Rawan Kriminalitas'
        ];
        echo view('users/templates/header', $data);
        echo view('users/informasi');
        echo view('users/templates/footer');
    }
}
