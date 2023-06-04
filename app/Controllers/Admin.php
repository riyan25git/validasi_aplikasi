<?php

namespace App\Controllers;


class Admin extends BaseController
{
    protected $userModel;

    public function __construct()
    {
    }
    public function index()
    {
        session();
        if (!session()->get('logged_in')) {
            return redirect()->to('/');
        } else {
            $data = [
                'validation' => \Config\Services::validation()
            ];
            return view('admin/halaman-awal', $data);
        }
    }
}
