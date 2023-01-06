<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data['title'] = 'Wilayah';
        return view('login', $data);
    }
}
