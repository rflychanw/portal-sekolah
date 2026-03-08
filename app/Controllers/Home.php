<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('home');
    }

    public function about(): string
    {
        return view('about');
    }

    public function academics(): string
    {
        return view('academics');
    }

    public function news(): string
    {
        $articleModel = new \App\Models\ArticleModel();
        $data = [
            'articles' => $articleModel->where('status', 'published')->orderBy('created_at', 'DESC')->findAll(),
            'title' => 'Berita & Acara'
        ];
        return view('news', $data);
    }

    public function newsDetail($slug): string
    {
        $articleModel = new \App\Models\ArticleModel();
        $article = $articleModel->where('slug', $slug)->where('status', 'published')->first();

        if (!$article) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $data = [
            'article' => $article,
            'title' => $article['title']
        ];

        return view('news_detail', $data);
    }

    public function curriculum(): string
    {
        $data = ['title' => 'Kurikulum Academik'];
        return view('curriculum', $data);
    }

    public function extracurricular(): string
    {
        $data = ['title' => 'Ekstrakurikuler'];
        return view('extracurricular', $data);
    }

    public function contact(): string
    {
        return view('contact');
    }


}


