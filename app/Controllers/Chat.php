<?php

namespace App\Controllers;

class Chat extends BaseController
{
    public function index()
    {

        $data = [
            'title' => 'Ci4 WebSocket Chat'
        ];
        echo view('templates/header', $data);
        echo view('chat');
        echo view('templates/footer');
    }
}
