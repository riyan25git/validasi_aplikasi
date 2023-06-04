<?php

namespace App\Controllers;

use App\Models\UserModel;

class Daftar extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }
    public function index()
    {
        session();
        $data = [
            'validation' => \Config\Services::validation()
        ];
        return view('register', $data);
    }

    function verifikasi()
    {
        session();
        if (!$this->validate([
            'nama' => 'required',
            'username' => 'required',
            'password' => 'required',
            'email' => 'required'
        ])) {
            $validation = \Config\Services::validation();
            // dd($validation); 
            return redirect()->to('/daftar')->withInput()->with('validation', $validation);
        }
        return redirect()->to('/admin');
    }
}
