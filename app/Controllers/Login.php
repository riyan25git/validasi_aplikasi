<?php

namespace App\Controllers;

use App\Models\UserModel;

class Login extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {
        $session = session();
        if (!$this->validate([
            'username' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom username harus diisi.',
                ]
            ],
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom password harus diisi.',
                ]
            ],

        ])) {
            $validation = \Config\Services::validation();
            // dd($validation);
            return redirect()->to('/')->withInput()->with('validation', $validation);
        } else {
            $username = $this->request->getVar('username');
            $password = $this->request->getVar('password');
            $data = $this->userModel->where('user_username', $username)->where('is_deleted', '0')->first();
            if ($data) {
                $pass = $data['user_password'];
                $verify_pass = password_verify($password, $pass);
                if ($verify_pass) {
                    if ($data['is_deleted'] == '0') {
                        $ses_data = [
                            'id'       => $data['user_id'],
                            'nama_pengguna'     => $data['user_nama'],
                            'email'    => $data['user_email'],
                            'avatar'    => $data['user_avatar'],
                            'level'     => $data['user_level'],
                            'logged_in'     => TRUE
                        ];
                        $session->set($ses_data);
                        $session->setFlashdata('notif', 'alert-success');
                        return redirect()->to('/admin');
                    } else {
                        $session->setFlashdata('notif-error', 'Akun anda masih belum aktif, mohon menunggu persetujuan dari Admin sebelum dapat menggunakan aplikasi.');
                        return redirect()->to('/');
                    }
                } else {
                    $session->setFlashdata('notif-error', 'Password yang dimasukkan salah, silahkan coba lagi.');
                    return redirect()->to('/');
                }
            } else {
                $session->setFlashdata('notif-error', 'Username tidak ditemukan, silahkan coba lagi.');
                return redirect()->to('/');
            }
        }
    }
}
