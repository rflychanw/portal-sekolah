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
        $articleModel = new \App\Models\ArticleModel();
        $teacherModel = new \App\Models\TeacherModel();
        $studentModel = new \App\Models\StudentModel();

        $data = [
            'title' => 'Dashboard Admin',
            'stats' => [
                'students' => $studentModel->countAll(),
                'teachers' => $teacherModel->countAll(),
                'news' => $articleModel->countAll(),
                'registrations' => (new \App\Models\PendaftaranModel())->countAll(),
                'messages' => (new \App\Models\MessageModel())->countAll()
            ],
            'latest_articles' => $articleModel->orderBy('created_at', 'DESC')->limit(5)->find()
        ];
        return view('admin/dashboard', $data);
    }

    public function profile()
    {
        $data = ['title' => 'Profil Admin'];
        return view('admin/profile', $data);
    }

}



