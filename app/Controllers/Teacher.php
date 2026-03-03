<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TeacherModel;

class Teacher extends BaseController
{
    protected $teacherModel;

    public function __construct()
    {
        $this->teacherModel = new TeacherModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Manajemen Guru',
            'teachers' => $this->teacherModel->findAll()
        ];
        return view('admin/teachers/index', $data);
    }

    public function create()
    {
        $data = ['title' => 'Tambah Guru'];
        return view('admin/teachers/create', $data);
    }

    public function store()
    {
        $rules = [
            'name' => 'required|min_length[3]',
            'subject' => 'required',
            'photo' => 'max_size[photo,2048]|is_image[photo]|mime_in[photo,image/jpg,image/jpeg,image/png]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $photo = $this->request->getFile('photo');
        $photoName = null;

        if ($photo->isValid() && !$photo->hasMoved()) {
            $photoName = $photo->getRandomName();
            $photo->move(FCPATH . 'uploads/teachers', $photoName);
        }

        $this->teacherModel->save([
            'name' => $this->request->getPost('name'),
            'nip' => $this->request->getPost('nip'),
            'subject' => $this->request->getPost('subject'),
            'bio' => $this->request->getPost('bio'),
            'photo' => $photoName,
        ]);

        return redirect()->to('admin/teachers')->with('success', 'Data guru berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $teacher = $this->teacherModel->find($id);
        if (!$teacher) {
            return redirect()->to('admin/teachers')->with('error', 'Data guru tidak ditemukan.');
        }

        $data = [
            'title' => 'Edit Guru',
            'teacher' => $teacher
        ];
        return view('admin/teachers/edit', $data);
    }

    public function update($id)
    {
        $teacher = $this->teacherModel->find($id);
        if (!$teacher) {
            return redirect()->to('admin/teachers')->with('error', 'Data guru tidak ditemukan.');
        }

        $rules = [
            'name' => 'required|min_length[3]',
            'subject' => 'required',
            'photo' => 'max_size[photo,2048]|is_image[photo]|mime_in[photo,image/jpg,image/jpeg,image/png]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $photo = $this->request->getFile('photo');
        $photoName = $teacher['photo'];

        if ($photo && $photo->isValid() && !$photo->hasMoved()) {
            if ($photoName && file_exists(FCPATH . 'uploads/teachers/' . $photoName)) {
                unlink(FCPATH . 'uploads/teachers/' . $photoName);
            }
            $photoName = $photo->getRandomName();
            $photo->move(FCPATH . 'uploads/teachers', $photoName);
        }

        $this->teacherModel->update($id, [
            'name' => $this->request->getPost('name'),
            'nip' => $this->request->getPost('nip'),
            'subject' => $this->request->getPost('subject'),
            'bio' => $this->request->getPost('bio'),
            'photo' => $photoName,
        ]);

        return redirect()->to('admin/teachers')->with('success', 'Data guru berhasil diperbarui.');
    }

    public function delete($id)
    {
        $teacher = $this->teacherModel->find($id);
        if ($teacher) {
            if ($teacher['photo'] && file_exists(FCPATH . 'uploads/teachers/' . $teacher['photo'])) {
                unlink(FCPATH . 'uploads/teachers/' . $teacher['photo']);
            }
            $this->teacherModel->delete($id);
            return redirect()->to('admin/teachers')->with('success', 'Data guru berhasil dihapus.');
        }
        return redirect()->to('admin/teachers')->with('error', 'Data guru tidak ditemukan.');
    }
}
