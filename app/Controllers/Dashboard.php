<?php namespace App\Controllers;


class Dashboard extends BaseController
{
    public function index()
    {
        $data = [];

        echo view('layout/header',$data);
        echo view('dashboard');
        echo view('layout/footer');
    }
}
