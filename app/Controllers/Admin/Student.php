<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\StudentModel;

class Student extends BaseController
{
    public function index()
    {
        $studentModel = new StudentModel();

        $data = [
            'title' => 'Data Siswa',
            'students' => $studentModel->orderBy('nama_lengkap', 'ASC')->findAll()
        ];

        return view('admin/students/index', $data);
    }

    public function delete($id)
    {
        $studentModel = new StudentModel();
        $studentModel->delete($id);

        return redirect()->to('/admin/students')->with('success', 'Data siswa berhasil dihapus.');
    }
}
