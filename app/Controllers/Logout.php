<?php

namespace App\Controllers;

class Logout extends BaseController
{

    public function __construct()
    {
    }

    public function index()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/');
    }
}
