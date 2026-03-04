<?php

namespace App\Controllers\Guru;

use App\Controllers\BaseController;
use App\Models\ArticleModel;

class Article extends BaseController
{
    protected $articleModel;

    public function __construct()
    {
        $this->articleModel = new ArticleModel();
    }

    public function index()
    {
        $teacherId = session()->get('teacher_id');
        $data = [
            'title' => 'Artikel Saya',
            'articles' => $this->articleModel->where('teacher_id', $teacherId)->orderBy('created_at', 'DESC')->findAll()
        ];
        return view('admin/guru/articles/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tulis Artikel Baru'
        ];
        return view('admin/guru/articles/create', $data);
    }

    public function store()
    {
        $teacherId = session()->get('teacher_id');
        $teacherName = session()->get('teacher_name');

        $title = $this->request->getPost('title');
        $slug = url_title($title, '-', true);

        $check = $this->articleModel->where('slug', $slug)->first();
        if ($check) {
            $slug .= '-' . time();
        }

        $image = $this->request->getFile('image');
        $imageName = null;
        if ($image->isValid() && !$image->hasMoved()) {
            $imageName = $image->getRandomName();
            $image->move('uploads/articles/', $imageName);
        }

        $this->articleModel->save([
            'title' => $title,
            'slug' => $slug,
            'summary' => $this->request->getPost('summary'),
            'content' => $this->request->getPost('content'),
            'image' => $imageName,
            'status' => $this->request->getPost('status'),
            'teacher_id' => $teacherId,
            'writer' => $teacherName
        ]);

        return redirect()->to('admin/guru/articles')->with('success', 'Artikel berhasil dikirim!');
    }

    public function edit($id)
    {
        $teacherId = session()->get('teacher_id');
        $article = $this->articleModel->where('id', $id)->where('teacher_id', $teacherId)->first();

        if (!$article) {
            return redirect()->to('admin/guru/articles')->with('error', 'Artikel tidak ditemukan atau Anda tidak memiliki akses.');
        }

        $data = [
            'title' => 'Edit Artikel',
            'article' => $article
        ];
        return view('admin/guru/articles/edit', $data);
    }

    public function update($id)
    {
        $teacherId = session()->get('teacher_id');
        $article = $this->articleModel->where('id', $id)->where('teacher_id', $teacherId)->first();

        if (!$article) {
            return redirect()->to('admin/guru/articles')->with('error', 'Akses ditolak.');
        }

        $image = $this->request->getFile('image');
        $imageName = $article['image'];

        if ($image->isValid() && !$image->hasMoved()) {
            if ($imageName && file_exists('uploads/articles/' . $imageName)) {
                unlink('uploads/articles/' . $imageName);
            }
            $imageName = $image->getRandomName();
            $image->move('uploads/articles/', $imageName);
        }

        $this->articleModel->update($id, [
            'title' => $this->request->getPost('title'),
            'summary' => $this->request->getPost('summary'),
            'content' => $this->request->getPost('content'),
            'image' => $imageName,
            'status' => $this->request->getPost('status')
        ]);

        return redirect()->to('admin/guru/articles')->with('success', 'Artikel berhasil diperbarui!');
    }

    public function delete($id)
    {
        $teacherId = session()->get('teacher_id');
        $article = $this->articleModel->where('id', $id)->where('teacher_id', $teacherId)->first();

        if (!$article) {
            return redirect()->to('admin/guru/articles')->with('error', 'Akses ditolak.');
        }

        if ($article['image'] && file_exists('uploads/articles/' . $article['image'])) {
            unlink('uploads/articles/' . $article['image']);
        }
        $this->articleModel->delete($id);
        return redirect()->to('admin/guru/articles')->with('success', 'Artikel berhasil dihapus!');
    }
}
