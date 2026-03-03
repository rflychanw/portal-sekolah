<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Guru extends BaseController
{
    public function dashboard()
    {
        // Only allow guru role
        if (session()->get('role') !== 'guru') {
            return redirect()->to('/admin');
        }

        $data = [
            'title' => 'Dashboard Guru',
            'teacher_name' => session()->get('teacher_name'),
            'teacher_nip' => session()->get('teacher_nip'),
            'teacher_subject' => session()->get('teacher_subject'),
            'teacher_photo' => session()->get('teacher_photo'),
        ];
        return view('admin/guru/dashboard', $data);
    }

    public function profile()
    {
        // Only allow guru role
        if (session()->get('role') !== 'guru') {
            return redirect()->to('/admin');
        }

        $data = [
            'title' => 'Profil Guru',
            'teacher_name' => session()->get('teacher_name'),
            'teacher_nip' => session()->get('teacher_nip'),
            'teacher_subject' => session()->get('teacher_subject'),
            'teacher_photo' => session()->get('teacher_photo'),
        ];
        return view('admin/guru/profile', $data);
    }
}
