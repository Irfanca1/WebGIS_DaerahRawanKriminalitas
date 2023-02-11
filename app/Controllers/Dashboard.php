<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
	public function index()
	{
		$data = [
			'title' => 'Dashboard'
		];

		echo view('users/templates/header', $data);
		echo view('dashboard');
		echo view('users/templates/footer');
	}

	//--------------------------------------------------------------------

}
