<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\TeacherModel;
use CodeIgniter\Controller;

class Auth extends Controller
{
    public function login()
    {
        if (session()->get('isLoggedIn')) {
            $role = session()->get('role');
            if ($role === 'guru') {
                return redirect()->to('/admin/guru/dashboard');
            }
            return redirect()->to('/admin');
        }
        return view('auth/login');
    }

    public function loginProcess()
    {
        $session = session();
        $role = $this->request->getPost('role');
        $password = $this->request->getPost('password');

        if ($role === 'guru') {
            return $this->loginGuru($session, $password);
        }

        return $this->loginAdmin($session, $password);
    }

    private function loginAdmin($session, $password)
    {
        $username = $this->request->getPost('username');

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

    private function loginGuru($session, $password)
    {
        $nip = $this->request->getPost('nip');

        $teacherModel = new TeacherModel();
        $teacher = $teacherModel->where('nip', $nip)->first();

        if (!$teacher) {
            return redirect()->back()->with('error', 'NIP atau password salah.')->with('login_role', 'guru');
        }

        if (!$teacher['password']) {
            return redirect()->back()->with('error', 'Akun belum memiliki password. Hubungi admin.')->with('login_role', 'guru');
        }

        if (!password_verify($password, $teacher['password'])) {
            return redirect()->back()->with('error', 'NIP atau password salah.')->with('login_role', 'guru');
        }

        $session->set([
            'username' => $teacher['name'],
            'teacher_id' => $teacher['id'],
            'teacher_name' => $teacher['name'],
            'teacher_nip' => $teacher['nip'],
            'teacher_subject' => $teacher['subject'],
            'teacher_photo' => $teacher['photo'],
            'isLoggedIn' => true,
            'role' => 'guru',
        ]);

        return redirect()->to('/admin/guru/dashboard');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/auth/login');
    }
}
