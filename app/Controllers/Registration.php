<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PendaftaranModel;
use App\Models\PendaftaranSettingsModel;

class Registration extends BaseController
{
    public function index()
    {
        $settingsModel = new PendaftaranSettingsModel();
        $settings = $settingsModel->first();

        $data = [
            'title' => $settings['title'] ?? 'Pendaftaran Siswa Baru',
            'settings' => $settings
        ];

        return view('register', $data);
    }

    public function submit()
    {
        $settingsModel = new PendaftaranSettingsModel();
        $settings = $settingsModel->first();

        // Check if registration is open
        if (!$settings || !$settings['is_open']) {
            return redirect()->back()->with('error', 'Pendaftaran sedang ditutup.');
        }

        $pendaftaranModel = new PendaftaranModel();

        $validation = $this->validate([
            'nama_lengkap' => 'required|min_length[3]',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|valid_date',
            'jenis_kelamin' => 'required|in_list[L,P]',
            'jenjang' => 'required',
            'nama_wali' => 'required',
            'no_wa' => 'required|numeric',
            'email' => 'required|valid_email',
            'alamat' => 'required'
        ]);

        if (!$validation) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $pendaftaranModel->save([
            'nama_lengkap' => $this->request->getPost('nama_lengkap'),
            'tempat_lahir' => $this->request->getPost('tempat_lahir'),
            'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
            'jenjang' => $this->request->getPost('jenjang'),
            'nama_wali' => $this->request->getPost('nama_wali'),
            'no_wa' => $this->request->getPost('no_wa'),
            'email' => $this->request->getPost('email'),
            'alamat' => $this->request->getPost('alamat'),
            'status' => 'pending'
        ]);

        return redirect()->to('/register')->with('success', 'Pendaftaran Anda telah berhasil dikirim. Kami akan menghubungi Anda segera.');
    }
}
