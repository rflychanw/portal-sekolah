<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\PendaftaranModel;
use App\Models\PendaftaranSettingsModel;

class Pendaftaran extends BaseController
{
    public function index()
    {
        $pendaftaranModel = new PendaftaranModel();

        $data = [
            'title' => 'Daftar Pendaftaran',
            'registrations' => $pendaftaranModel->orderBy('created_at', 'DESC')->findAll()
        ];

        return view('admin/pendaftaran/index', $data);
    }

    public function show($id)
    {
        $pendaftaranModel = new PendaftaranModel();
        $registration = $pendaftaranModel->find($id);

        if (!$registration) {
            return redirect()->to('/admin/pendaftaran')->with('error', 'Data tidak ditemukan.');
        }

        $data = [
            'title' => 'Detail Pendaftaran',
            'reg' => $registration
        ];

        return view('admin/pendaftaran/show', $data);
    }

    public function updateStatus($id)
    {
        $pendaftaranModel = new PendaftaranModel();
        $status = $this->request->getPost('status');

        if (!in_array($status, ['pending', 'accepted', 'rejected'])) {
            return redirect()->back()->with('error', 'Status tidak valid.');
        }

        $pendaftaranModel->update($id, ['status' => $status]);

        return redirect()->back()->with('success', 'Status pendaftaran berhasil diperbarui.');
    }

    public function delete($id)
    {
        $pendaftaranModel = new PendaftaranModel();
        $pendaftaranModel->delete($id);

        return redirect()->to('/admin/pendaftaran')->with('success', 'Pendaftaran berhasil dihapus.');
    }

    public function settings()
    {
        $settingsModel = new PendaftaranSettingsModel();
        $data = [
            'title' => 'Pengaturan Pendaftaran',
            'settings' => $settingsModel->first()
        ];

        return view('admin/pendaftaran/settings', $data);
    }

    public function updateSettings()
    {
        $settingsModel = new PendaftaranSettingsModel();
        $settings = $settingsModel->first();

        $data = [
            'is_open' => $this->request->getPost('is_open') ? 1 : 0,
            'title' => $this->request->getPost('title'),
            'description' => $this->request->getPost('description'),
            'deadline' => $this->request->getPost('deadline') ?: null,
        ];

        if ($settings) {
            $settingsModel->update($settings['id'], $data);
        } else {
            $settingsModel->save($data);
        }

        return redirect()->to('/admin/pendaftaran/settings')->with('success', 'Pengaturan berhasil diperbarui.');
    }
}
