<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\AcademicCalendarModel;

class AcademicCalendar extends BaseController
{
    protected $academicModel;

    public function __construct()
    {
        $this->academicModel = new AcademicCalendarModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Kalender Akademik',
            'events' => $this->academicModel->orderBy('start_date', 'ASC')->findAll()
        ];

        return view('admin/academic_calendar/index', $data);
    }

    public function store()
    {
        $rules = [
            'title' => 'required|min_length[3]',
            'start_date' => 'required|valid_date',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->academicModel->save([
            'title' => $this->request->getPost('title'),
            'description' => $this->request->getPost('description'),
            'start_date' => $this->request->getPost('start_date'),
            'end_date' => $this->request->getPost('end_date') ?: null,
            'color' => $this->request->getPost('color') ?: '#2563eb',
        ]);

        return redirect()->to('/admin/academic-calendar')->with('success', 'Kegiatan berhasil ditambahkan');
    }

    public function update($id)
    {
        $rules = [
            'title' => 'required|min_length[3]',
            'start_date' => 'required|valid_date',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->academicModel->update($id, [
            'title' => $this->request->getPost('title'),
            'description' => $this->request->getPost('description'),
            'start_date' => $this->request->getPost('start_date'),
            'end_date' => $this->request->getPost('end_date') ?: null,
            'color' => $this->request->getPost('color') ?: '#2563eb',
        ]);

        return redirect()->to('/admin/academic-calendar')->with('success', 'Kegiatan berhasil diperbarui');
    }

    public function delete($id)
    {
        $this->academicModel->delete($id);
        return redirect()->to('/admin/academic-calendar')->with('success', 'Kegiatan berhasil dihapus');
    }
}
