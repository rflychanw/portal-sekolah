<?= $this->extend('admin/layout') ?>

<?= $this->section('admin_content') ?>

<style>
    .student-card {
        background: white;
        border-radius: 24px;
        padding: 2rem;
        border: 1px solid var(--border);
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
    }

    .data-table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0 0.8rem;
    }

    .data-table th {
        text-align: left;
        padding: 1rem;
        color: var(--text-sub);
        font-weight: 600;
        font-size: 0.9rem;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .data-table tr:not(.header-row) {
        background: #F8FAFC;
        transition: var(--transition);
    }

    .data-table tr:not(.header-row):hover {
        background: white;
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        transform: scale(1.005);
    }

    .data-table td {
        padding: 1.2rem 1rem;
    }

    .data-table td:first-child {
        border-radius: 16px 0 0 16px;
        border-left: 1px solid var(--border);
    }

    .data-table td:last-child {
        border-radius: 0 16px 16px 0;
        border-right: 1px solid var(--border);
    }

    .data-table tr:not(.header-row) td {
        border-top: 1px solid var(--border);
        border-bottom: 1px solid var(--border);
    }

    .jenjang-badge {
        padding: 0.4rem 0.8rem;
        border-radius: 8px;
        font-size: 0.8rem;
        font-weight: 700;
    }

    .badge-sd {
        background: #fee2e2;
        color: #dc2626;
    }

    .badge-smp {
        background: #dbeafe;
        color: #2563eb;
    }

    .badge-sma {
        background: #ecfdf5;
        color: #059669;
    }

    .btn-action {
        width: 36px;
        height: 36px;
        border-radius: 10px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        text-decoration: none;
        transition: var(--transition);
    }

    .btn-delete {
        background: #FEE2E2;
        color: #DC2626;
    }

    .btn-action:hover {
        transform: scale(1.1);
    }
</style>

<div class="student-card">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem;">
        <div>
            <h2 style="font-size: 1.5rem; font-weight: 800;">Daftar Siswa Aktif</h2>
            <p style="color: var(--text-sub);">Data siswa yang telah berhasil mendaftar dan disetujui.</p>
        </div>
    </div>

    <?php if (session()->getFlashdata('success')): ?>
        <div
            style="background: #ECFDF5; color: #059669; padding: 1rem; border-radius: 12px; margin-bottom: 1.5rem; border: 1px solid #D1FAE5;">
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>

    <div style="overflow-x: auto;">
        <table class="data-table">
            <thead>
                <tr class="header-row">
                    <th>Nama Lengkap</th>
                    <th>Jenjang</th>
                    <th>Email / No. WA</th>
                    <th>Wali Murid</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($students)): ?>
                    <tr>
                        <td colspan="5" style="text-align: center; padding: 3rem; color: var(--text-sub);">Belum ada data
                            siswa.</td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($students as $student): ?>
                        <tr>
                            <td>
                                <div style="font-weight: 700; color: var(--text-main);">
                                    <?= $student['nama_lengkap'] ?>
                                </div>
                                <div style="font-size: 0.8rem; color: var(--text-sub);">
                                    <?= $student['tempat_lahir'] ?>,
                                    <?= date('d/m/Y', strtotime($student['tanggal_lahir'])) ?>
                                </div>
                            </td>
                            <td>
                                <span class="jenjang-badge badge-<?= strtolower($student['jenjang']) ?>">
                                    <?= $student['jenjang'] ?>
                                </span>
                            </td>
                            <td>
                                <div style="font-size: 0.9rem;">
                                    <?= $student['email'] ?: '-' ?>
                                </div>
                                <div style="font-size: 0.85rem; color: var(--text-sub);">
                                    <?= $student['no_wa'] ?>
                                </div>
                            </td>
                            <td>
                                <div style="font-weight: 600; font-size: 0.9rem;">
                                    <?= $student['nama_wali'] ?>
                                </div>
                            </td>
                            <td>
                                <a href="<?= base_url('admin/students/delete/' . $student['id']) ?>"
                                    class="btn-action btn-delete" onclick="return confirm('Hapus data siswa ini?')">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection() ?>