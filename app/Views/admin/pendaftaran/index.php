<?= $this->extend('admin/layout') ?>

<?= $this->section('admin_content') ?>

<style>
    .card {
        background: white;
        border-radius: 20px;
        padding: 2rem;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
        border: 1px solid #E2E8F0;
        margin-bottom: 2rem;
    }

    .table-container {
        overflow-x: auto;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 1rem;
    }

    th {
        text-align: left;
        padding: 1.25rem 1rem;
        color: var(--text-sub);
        font-weight: 600;
        border-bottom: 2px solid #F1F5F9;
        font-size: 0.9rem;
        text-transform: uppercase;
        letter-spacing: 0.05em;
    }

    td {
        padding: 1.25rem 1rem;
        border-bottom: 1px solid #F1F5F9;
        color: var(--text-main);
        font-size: 0.95rem;
    }

    .status-badge {
        padding: 0.4rem 1rem;
        border-radius: 50px;
        font-size: 0.8rem;
        font-weight: 600;
    }

    .status-pending {
        background: #FEF3C7;
        color: #92400E;
    }

    .status-accepted {
        background: #D1FAE5;
        color: #065F46;
    }

    .status-rejected {
        background: #FEE2E2;
        color: #991B1B;
    }

    .action-btns {
        display: flex;
        gap: 0.5rem;
    }

    .btn-icon {
        width: 35px;
        height: 35px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 10px;
        color: white;
        text-decoration: none;
        transition: var(--transition);
        border: none;
        cursor: pointer;
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

    .header-actions {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 2rem;
    }

    .btn-settings {
        background: white;
        color: var(--text-main);
        border: 1px solid var(--border);
        padding: 0.75rem 1.5rem;
        border-radius: 12px;
        text-decoration: none;
        font-weight: 600;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        transition: var(--transition);
    }

    .btn-settings:hover {
        background: #F8FAFC;
        border-color: var(--primary);
        color: var(--primary);
    }
</style>

<div class="header-actions">
    <div>
        <h2 style="font-size: 1.5rem; font-weight: 700;">Daftar Calon Siswa</h2>
        <p style="color: var(--text-sub);">Total:
            <?= count($registrations) ?> pendaftaran masuk
        </p>
    </div>
    <a href="/admin/pendaftaran/settings" class="btn-settings">
        <i class="fas fa-cog"></i> Pengaturan Pendaftaran
    </a>
</div>

<?php if (session()->getFlashdata('success')): ?>
    <div
        style="background: #D1FAE5; color: #065F46; padding: 1rem; border-radius: 12px; margin-bottom: 2rem; border: 1px solid #A7F3D0;">
        <i class="fas fa-check-circle" style="margin-right: 0.5rem;"></i>
        <?= session()->getFlashdata('success') ?>
    </div>
<?php endif; ?>

<div class="card">
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Waktu Daftar</th>
                    <th>Nama Lengkap</th>
                    <th>Jenjang</th>
                    <th>WhatsApp</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($registrations)): ?>
                    <tr>
                        <td colspan="6" style="text-align: center; padding: 3rem; color: var(--text-sub);">
                            <i class="fas fa-inbox"
                                style="font-size: 3rem; margin-bottom: 1rem; display: block; opacity: 0.3;"></i>
                            Belum ada pendaftaran yang masuk.
                        </td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($registrations as $reg): ?>
                        <tr>
                            <td>
                                <?= date('d/m/Y H:i', strtotime($reg['created_at'])) ?>
                            </td>
                            <td style="font-weight: 600;">
                                <?= $reg['nama_lengkap'] ?>
                            </td>
                            <td><span
                                    style="background: #F1F5F9; padding: 0.2rem 0.6rem; border-radius: 4px; font-size: 0.85rem;">
                                    <?= $reg['jenjang'] ?>
                                </span></td>
                            <td>
                                <?= $reg['no_wa'] ?>
                            </td>
                            <td>
                                <span class="status-badge status-<?= $reg['status'] ?>">
                                    <?= ucfirst($reg['status']) ?>
                                </span>
                            </td>
                            <td>
                                <div class="action-btns">
                                    <a href="/admin/pendaftaran/show/<?= $reg['id'] ?>" class="btn-icon btn-view"
                                        title="Detail">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="/admin/pendaftaran/delete/<?= $reg['id'] ?>" class="btn-icon btn-delete"
                                        title="Hapus" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                        <i class="fas fa-trash-alt"></i>
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