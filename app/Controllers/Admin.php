<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Admin extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Dashboard Admin',
            'stats' => [
                'students' => 1500,
                'teachers' => 120,
                'news' => 45,
                'messages' => 12
            ]
        ];
        return view('admin/dashboard', $data);
    }

    public function profile()
    {
        $data = ['title' => 'Profil Admin'];
        return view('admin/profile', $data);
    }

}



