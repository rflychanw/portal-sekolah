<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MessageModel;

class Contact extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Hubungi Kami'
        ];
        return view('contact', $data);
    }

    public function submit()
    {
        $messageModel = new MessageModel();

        if (
            !$this->validate([
                'name' => 'required|min_length[3]',
                'email' => 'required|valid_email',
                'subject' => 'required',
                'message' => 'required|min_length[5]'
            ])
        ) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $messageModel->save([
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'subject' => $this->request->getPost('subject'),
            'message' => $this->request->getPost('message')
        ]);

        return redirect()->to('/contact')->with('success', 'Pesan Anda telah berhasil terkirim. Terima kasih telah menghubungi kami.');
    }
}
