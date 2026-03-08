<?= $this->extend('admin/layout') ?>

<?= $this->section('admin_content') ?>

<style>
    .card {
        background: white;
        border-radius: 20px;
        padding: 2rem;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
        border: 1px solid #E2E8F0;
    }

    .table-container {
        overflow-x: auto;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    th {
        text-align: left;
        padding: 1.25rem 1rem;
        color: var(--text-sub);
        font-weight: 600;
        border-bottom: 2px solid #F1F5F9;
        font-size: 0.9rem;
    }

    td {
        padding: 1.25rem 1rem;
        border-bottom: 1px solid #F1F5F9;
        color: var(--text-main);
        font-size: 0.95rem;
    }

    .unread {
        background: #F8FAFC;
        font-weight: 600;
    }

    .badge-status {
        padding: 0.25rem 0.75rem;
        border-radius: 50px;
        font-size: 0.75rem;
        font-weight: 600;
    }

    .status-unread {
        background: #DBEAFE;
        color: #1E40AF;
    }

    .status-read {
        background: #F1F5F9;
        color: #64748B;
    }

    .btn-action {
        width: 35px;
        height: 35px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border-radius: 10px;
        color: white;
        text-decoration: none;
        transition: var(--transition);
    }

    .btn-view {
        background: var(--primary);
    }

    .btn-delete {
        background: #EF4444;
    }

    .btn-view:hover {
        background: var(--primary-dark);
        transform: translateY(-2px);
    }

    .btn-delete:hover {
        background: #DC2626;
        transform: translateY(-2px);
    }
</style>

<div style="margin-bottom: 2rem;">
    <h2 style="font-size: 1.5rem; font-weight: 700;">Kotak Masuk Pesan</h2>
    <p style="color: var(--text-sub);">Daftar pesan dari formulir kontak website</p>
</div>

<?php if (session()->getFlashdata('success')): ?>
    <div style="background: #D1FAE5; color: #065F46; padding: 1rem; border-radius: 12px; margin-bottom: 2rem;">
        <?= session()->getFlashdata('success') ?>
    </div>
<?php endif; ?>

<div class="card">
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Waktu</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Subjek</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($messages)): ?>
                    <tr>
                        <td colspan="6" style="text-align: center; padding: 3rem; color: var(--text-sub);">Belum ada pesan
                            masuk.</td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($messages as $m): ?>
                        <tr class="<?= $m['is_read'] ? '' : 'unread' ?>">
                            <td>
                                <?= date('d/m/Y H:i', strtotime($m['created_at'])) ?>
                            </td>
                            <td>
                                <?= esc($m['name']) ?>
                            </td>
                            <td>
                                <?= esc($m['email']) ?>
                            </td>
                            <td>
                                <span
                                    style="background: #F1F5F9; padding: 0.2rem 0.5rem; border-radius: 4px; font-size: 0.8rem;">
                                    <?= ucfirst($m['subject']) ?>
                                </span>
                            </td>
                            <td>
                                <span class="badge-status <?= $m['is_read'] ? 'status-read' : 'status-unread' ?>">
                                    <?= $m['is_read'] ? 'Dibaca' : 'Baru' ?>
                                </span>
                            </td>
                            <td>
                                <div style="display: flex; gap: 0.5rem;">
                                    <a href="/admin/messages/show/<?= $m['id'] ?>" class="btn-action btn-view" title="Lihat">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="/admin/messages/delete/<?= $m['id'] ?>" class="btn-action btn-delete" title="Hapus"
                                        onclick="return confirm('Hapus pesan ini?')">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection() ?>