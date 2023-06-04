<?php

namespace App\Controllers;

use App\Models\UserModel;

class Home extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {
        session();
        if (!session()->get('logged_in')) {
            $data = [
                'validation' => \Config\Services::validation()
            ];
            return view('main', $data);
        } else {
            return redirect()->to('/admin');
        }
    }
}
