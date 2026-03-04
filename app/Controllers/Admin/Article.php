<?php

namespace App\Controllers\Admin;

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
        $data = [
            'title' => 'Manajemen Berita & Artikel',
            'articles' => $this->articleModel->getArticlesWithAuthor()
        ];
        return view('admin/articles/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tulis Artikel Baru'
        ];
        return view('admin/articles/create', $data);
    }

    public function store()
    {
        $title = $this->request->getPost('title');
        $slug = url_title($title, '-', true);

        // Ensure slug is unique
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
            'teacher_id' => null, // Admin writes
            'writer' => 'Admin'
        ]);

        return redirect()->to('admin/articles')->with('success', 'Artikel berhasil diterbitkan!');
    }

    public function edit($id)
    {
        $article = $this->articleModel->find($id);
        if (!$article) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $data = [
            'title' => 'Edit Artikel',
            'article' => $article
        ];
        return view('admin/articles/edit', $data);
    }

    public function update($id)
    {
        $article = $this->articleModel->find($id);

        $image = $this->request->getFile('image');
        $imageName = $article['image'];

        if ($image->isValid() && !$image->hasMoved()) {
            // Delete old image
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

        return redirect()->to('admin/articles')->with('success', 'Artikel berhasil diperbarui!');
    }

    public function delete($id)
    {
        $article = $this->articleModel->find($id);
        if ($article['image'] && file_exists('uploads/articles/' . $article['image'])) {
            unlink('uploads/articles/' . $article['image']);
        }
        $this->articleModel->delete($id);
        return redirect()->to('admin/articles')->with('success', 'Artikel berhasil dihapus!');
    }
}
