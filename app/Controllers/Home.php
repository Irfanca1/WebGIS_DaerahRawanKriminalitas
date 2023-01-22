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
        echo view('templates/header', $data);
        echo view('halaman_utama');
        echo view('templates/footer');
    }
}
