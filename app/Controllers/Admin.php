<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Admin extends Controller
{
    public function index()
    {
        // Redirect guru to their own dashboard
        if (session()->get('role') === 'guru') {
            return redirect()->to('/admin/guru/dashboard');
        }
        $teacherModel = new \App\Models\TeacherModel();

        $data = [
            'title' => 'Dashboard Admin',
            'stats' => [
                'students' => 1500,
                'teachers' => $teacherModel->countAll(),
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



