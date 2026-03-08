<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\MessageModel;

class Message extends BaseController
{
    public function index()
    {
        $messageModel = new MessageModel();

        $data = [
            'title' => 'Manajemen Pesan',
            'messages' => $messageModel->orderBy('created_at', 'DESC')->findAll()
        ];

        return view('admin/messages/index', $data);
    }

    public function show($id)
    {
        $messageModel = new MessageModel();
        $message = $messageModel->find($id);

        if (!$message) {
            return redirect()->to('/admin/messages')->with('error', 'Pesan tidak ditemukan.');
        }

        // Mark as read
        if (!$message['is_read']) {
            $messageModel->update($id, ['is_read' => 1]);
        }

        $data = [
            'title' => 'Detail Pesan',
            'msg' => $message
        ];

        return view('admin/messages/show', $data);
    }

    public function delete($id)
    {
        $messageModel = new MessageModel();
        $messageModel->delete($id);

        return redirect()->to('/admin/messages')->with('success', 'Pesan berhasil dihapus.');
    }
}
