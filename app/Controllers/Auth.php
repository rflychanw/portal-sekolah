<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class Auth extends Controller
{
    public function login()
    {
        if (session()->get('isLoggedIn')) {
            return redirect()->to('/admin');
        }
        return view('auth/login');
    }

    public function loginProcess()
    {
        $session = session();
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // Static for now, can be replaced with database logic
        if ($username === 'admin' && $password === 'admin123') {
            $session->set([
                'username' => 'Administrator',
                'isLoggedIn' => true,
                'role' => 'admin'
            ]);
            return redirect()->to('/admin');
        }

        return redirect()->back()->with('error', 'Username atau password salah.');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/auth/login');
    }
}
