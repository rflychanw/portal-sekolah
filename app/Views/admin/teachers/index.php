<?= $this->extend('admin/layout') ?>

<?= $this->section('admin_content') ?>

<style>
    .card {
        background: white;
        border-radius: 16px;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -1px rgba(0, 0, 0, 0.03);
        padding: 1.5rem;
        margin-bottom: 2rem;
    }

    .btn {
        padding: 0.75rem 1.5rem;
        border-radius: 12px;
        font-weight: 600;
        transition: all 0.2s;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        text-decoration: none;
        cursor: pointer;
        border: none;
    }

    .btn-primary {
        background: #2563EB;
        color: white;
    }

    .btn-primary:hover {
        background: #1E40AF;
        transform: translateY(-1px);
    }

    .btn-sm {
        padding: 0.5rem 1rem;
        font-size: 0.875rem;
    }

    .btn-warning {
        background: #F59E0B;
        color: white;
    }

    .btn-danger {
        background: #EF4444;
        color: white;
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
        padding: 1rem;
        color: #64748B;
        font-weight: 600;
        border-bottom: 1px solid #E2E8F0;
    }

    td {
        padding: 1rem;
        vertical-align: middle;
        border-bottom: 1px solid #F1F5F9;
    }

    .teacher-photo {
        width: 48px;
        height: 48px;
        border-radius: 12px;
        object-fit: cover;
    }

    .badge {
        padding: 0.25rem 0.75rem;
        border-radius: 9999px;
        font-size: 0.75rem;
        font-weight: 600;
        background: #EFF6FF;
        color: #2563EB;
    }

    .alert {
        padding: 1rem;
        border-radius: 12px;
        margin-bottom: 1.5rem;
    }

    .alert-success {
        background: #DCFCE7;
        color: #166534;
        border: 1px solid #BBF7D0;
    }

    .status-badge {
        padding: 0.35rem 0.85rem;
        border-radius: 9999px;
        font-size: 0.75rem;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        gap: 0.35rem;
    }

    .status-active {
        background: #DCFCE7;
        color: #166534;
    }

    .status-inactive {
        background: #FEF3C7;
        color: #92400E;
    }
</style>

<div class="header-actions"
    style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem;">
    <div>
        <h2 style="font-weight: 700; font-size: 1.5rem;">Daftar Guru</h2>
        <p style="color: #64748B; font-size: 0.9rem;">Kelola data pengajar sekolah</p>
    </div>
    <a href="<?= base_url('admin/teachers/create') ?>" class="btn btn-primary">
        <i class="fas fa-plus"></i> Tambah Guru
    </a>
</div>

<?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success">
        <?= session()->getFlashdata('success') ?>
    </div>
<?php endif; ?>

<div class="card">
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Foto</th>
                    <th>Nama / NIP</th>
                    <th>Mata Pelajaran</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($teachers)): ?>
                    <tr>
                        <td colspan="5" style="text-align: center; color: #64748B; padding: 3rem;">Belum ada data guru.</td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($teachers as $t): ?>
                        <tr>
                            <td>
                                <?php if ($t['photo']): ?>
                                    <img src="<?= base_url('uploads/teachers/' . $t['photo']) ?>" alt="<?= $t['name'] ?>"
                                        class="teacher-photo">
                                <?php else: ?>
                                    <div class="teacher-photo"
                                        style="background: #F1F5F9; display: flex; align-items: center; justify-content: center; color: #94A3B8;">
                                        <i class="fas fa-user"></i>
                                    </div>
                                <?php endif; ?>
                            </td>
                            <td>
                                <div style="font-weight: 600;">
                                    <?= $t['name'] ?>
                                </div>
                                <div style="font-size: 0.8rem; color: #64748B;">
                                    <?= $t['nip'] ?: '-' ?>
                                </div>
                            </td>
                            <td>
                                <span class="badge">
                                    <?= $t['subject'] ?>
                                </span>
                            </td>
                            <td>
                                <?php if ($t['password']): ?>
                                    <span class="status-badge status-active">
                                        <i class="fas fa-check-circle"></i> Aktif
                                    </span>
                                <?php else: ?>
                                    <span class="status-badge status-inactive">
                                        <i class="fas fa-exclamation-triangle"></i> Belum Aktif
                                    </span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <div style="display: flex; gap: 0.5rem;">
                                    <a href="<?= base_url('admin/teachers/edit/' . $t['id']) ?>" class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="<?= base_url('admin/teachers/delete/' . $t['id']) ?>" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
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