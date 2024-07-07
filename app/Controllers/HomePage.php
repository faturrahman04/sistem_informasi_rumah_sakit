<?php

namespace App\Controllers;

class HomePage extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Home',
        ];
        echo view('main/layout/Header', $data);
        echo view('main/Mainpage');
        echo view('main/layout/Footer');
    }
}
