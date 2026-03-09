<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ProgramModel;
use App\Models\AchievementModel;

class Program extends BaseController
{
    protected $programModel;
    protected $achievementModel;

    public function __construct()
    {
        $this->programModel = new ProgramModel();
        $this->achievementModel = new AchievementModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Manajemen Program & Ekstrakurikuler',
            'academics' => $this->programModel->where('type', 'academic')->orderBy('order_rank', 'ASC')->findAll(),
            'extras' => $this->programModel->where('type', 'extracurricular')->orderBy('order_rank', 'ASC')->findAll(),
            'achievements' => $this->achievementModel->orderBy('created_at', 'DESC')->findAll()
        ];

        return view('admin/programs/index', $data);
    }

    // Program Methods (Academic & Extracurricular Clubs)
    public function storeProgram()
    {
        helper('url');
        $title = $this->request->getPost('title');
        $this->programModel->save([
            'type' => $this->request->getPost('type'),
            'category' => $this->request->getPost('category'),
            'title' => $title,
            'slug' => url_title($title, '-', true),
            'description' => $this->request->getPost('description'),
            'content' => $this->request->getPost('content'),
            'icon' => $this->request->getPost('icon'),
            'tags' => $this->request->getPost('tags'),
            'image' => $this->request->getPost('image'),
            'order_rank' => $this->request->getPost('order_rank') ?: 0,
        ]);

        return redirect()->back()->with('success', 'Program berhasil disimpan');
    }

    public function updateProgram($id)
    {
        helper('url');
        $title = $this->request->getPost('title');
        $this->programModel->update($id, [
            'category' => $this->request->getPost('category'),
            'title' => $title,
            'slug' => url_title($title, '-', true),
            'description' => $this->request->getPost('description'),
            'content' => $this->request->getPost('content'),
            'icon' => $this->request->getPost('icon'),
            'tags' => $this->request->getPost('tags'),
            'image' => $this->request->getPost('image'),
            'order_rank' => $this->request->getPost('order_rank') ?: 0,
        ]);

        return redirect()->back()->with('success', 'Program berhasil diperbarui');
    }

    public function deleteProgram($id)
    {
        $this->programModel->delete($id);
        return redirect()->back()->with('success', 'Program berhasil dihapus');
    }

    // Achievement Methods
    public function storeAchievement()
    {
        $this->achievementModel->save([
            'program_id' => $this->request->getPost('program_id') ?: null,
            'title' => $this->request->getPost('title'),
            'description' => $this->request->getPost('description'),
            'icon' => $this->request->getPost('icon'),
            'date_event' => $this->request->getPost('date_event'),
            'color' => $this->request->getPost('color'),
        ]);

        return redirect()->back()->with('success', 'Prestasi berhasil disimpan');
    }

    public function updateAchievement($id)
    {
        $this->achievementModel->update($id, [
            'program_id' => $this->request->getPost('program_id') ?: null,
            'title' => $this->request->getPost('title'),
            'description' => $this->request->getPost('description'),
            'icon' => $this->request->getPost('icon'),
            'date_event' => $this->request->getPost('date_event'),
            'color' => $this->request->getPost('color'),
        ]);

        return redirect()->back()->with('success', 'Prestasi berhasil diperbarui');
    }

    public function deleteAchievement($id)
    {
        $this->achievementModel->delete($id);
        return redirect()->back()->with('success', 'Prestasi berhasil dihapus');
    }
}
