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
        $calendarModel = new \App\Models\AcademicCalendarModel();
        $programModel = new \App\Models\ProgramModel();
        $data = [
            'events' => $calendarModel->orderBy('start_date', 'ASC')->findAll(),
            'programs' => $programModel->where('type', 'academic')->orderBy('order_rank', 'ASC')->findAll(),
            'title' => 'Akademik'
        ];
        return view('academics', $data);
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

    public function programDetail($slug): string
    {
        $programModel = new \App\Models\ProgramModel();
        $achievementModel = new \App\Models\AchievementModel();

        $program = $programModel->where('slug', $slug)->first();

        if (!$program) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $data = [
            'program' => $program,
            'achievements' => $achievementModel->where('program_id', $program['id'])->findAll(),
            'title' => $program['title']
        ];

        return view('program_detail', $data);
    }

    public function extracurricular(): string
    {
        $programModel = new \App\Models\ProgramModel();
        $achievementModel = new \App\Models\AchievementModel();
        $data = [
            'clubs' => $programModel->where('type', 'extracurricular')->orderBy('order_rank', 'ASC')->findAll(),
            'achievements' => $achievementModel->orderBy('created_at', 'DESC')->findAll(),
            'title' => 'Ekstrakurikuler'
        ];
        return view('extracurricular', $data);
    }

    public function contact(): string
    {
        return view('contact');
    }


}


