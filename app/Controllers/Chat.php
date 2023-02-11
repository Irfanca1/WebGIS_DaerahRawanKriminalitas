<?php

namespace App\Controllers;

class Chat extends BaseController
{
    public function index()
    {

        $data = [
            'title' => 'Ci4 WebSocket Chat'
        ];
        echo view('users/templates/header', $data);
        echo view('chat');
        echo view('users/templates/footer');
    }
}
