<?= $this->extend('admin/layout') ?>

<?= $this->section('admin_content') ?>

<style>
    .detail-grid {
        display: grid;
        grid-template-columns: 2fr 1fr;
        gap: 2rem;
    }

    .card {
        background: white;
        border-radius: 20px;
        padding: 2rem;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
        border: 1px solid #E2E8F0;
        margin-bottom: 2rem;
    }

    .info-group {
        margin-bottom: 1.5rem;
    }

    .info-label {
        font-size: 0.85rem;
        color: var(--text-sub);
        display: block;
        margin-bottom: 0.3rem;
        text-transform: uppercase;
        letter-spacing: 0.05em;
    }

    .info-value {
        font-size: 1.1rem;
        font-weight: 500;
        color: var(--text-main);
    }

    .status-card {
        position: sticky;
        top: 2rem;
    }

    .btn-action {
        width: 100%;
        padding: 1rem;
        border-radius: 12px;
        border: none;
        font-weight: 600;
        cursor: pointer;
        margin-bottom: 1rem;
        transition: var(--transition);
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.8rem;
    }

    .btn-accept {
        background: #10B981;
        color: white;
    }

    .btn-reject {
        background: #EF4444;
        color: white;
    }

    .btn-pending {
        background: #F59E0B;
        color: white;
    }

    .btn-accept:hover {
        background: #059669;
        transform: translateY(-2px);
    }

    .btn-reject:hover {
        background: #DC2626;
        transform: translateY(-2px);
    }

    .btn-pending:hover {
        background: #D97706;
        transform: translateY(-2px);
    }

    .back-link {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        color: var(--text-sub);
        text-decoration: none;
        margin-bottom: 2rem;
        font-weight: 500;
        transition: var(--transition);
    }

    .back-link:hover {
        color: var(--primary);
    }
</style>

<a href="/admin/pendaftaran" class="back-link">
    <i class="fas fa-arrow-left"></i> Kembali ke Daftar
</a>

<?php if (session()->getFlashdata('success')): ?>
    <div
        style="background: #D1FAE5; color: #065F46; padding: 1rem; border-radius: 12px; margin-bottom: 2rem; border: 1px solid #A7F3D0;">
        <i class="fas fa-check-circle" style="margin-right: 0.5rem;"></i>
        <?= session()->getFlashdata('success') ?>
    </div>
<?php endif; ?>

<div class="detail-grid">
    <div class="main-info">
        <div class="card">
            <h3 style="margin-bottom: 2rem; border-bottom: 1px solid #F1F5F9; padding-bottom: 1rem;">Informasi Calon
                Siswa</h3>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem;">
                <div class="info-group">
                    <span class="info-label">Nama Lengkap</span>
                    <span class="info-value">
                        <?= $reg['nama_lengkap'] ?>
                    </span>
                </div>
                <div class="info-group">
                    <span class="info-label">Email</span>
                    <span class="info-value">
                        <?= $reg['email'] ?>
                    </span>
                </div>
                <div class="info-group">
                    <span class="info-label">Tempat, Tanggal Lahir</span>
                    <span class="info-value">
                        <?= $reg['tempat_lahir'] ?>,
                        <?= date('d F Y', strtotime($reg['tanggal_lahir'])) ?>
                    </span>
                </div>
                <div class="info-group">
                    <span class="info-label">Jenis Kelamin</span>
                    <span class="info-value">
                        <?= $reg['jenis_kelamin'] == 'L' ? 'Laki-laki' : 'Perempuan' ?>
                    </span>
                </div>
                <div class="info-group">
                    <span class="info-label">Jenjang Dituju</span>
                    <span class="info-value"
                        style="background: #EFF6FF; color: var(--primary); padding: 0.3rem 0.8rem; border-radius: 6px; font-weight: 600; font-size: 0.9rem;">
                        <?= $reg['jenjang'] ?>
                    </span>
                </div>
                <div class="info-group">
                    <span class="info-label">Nomor WhatsApp</span>
                    <span class="info-value"><a href="https://wa.me/<?= preg_replace('/[^0-9]/', '', $reg['no_wa']) ?>"
                            target="_blank" style="color: #059669; text-decoration: none;"><i
                                class="fab fa-whatsapp"></i>
                            <?= $reg['no_wa'] ?>
                        </a></span>
                </div>
            </div>

            <div class="info-group" style="margin-top: 1rem;">
                <span class="info-label">Nama Orang Tua / Wali</span>
                <span class="info-value">
                    <?= $reg['nama_wali'] ?>
                </span>
            </div>

            <div class="info-group">
                <span class="info-label">Alamat Lengkap</span>
                <span class="info-value" style="line-height: 1.6;">
                    <?= nl2br($reg['alamat']) ?>
                </span>
            </div>

            <div class="info-group" style="margin-top: 2rem; padding-top: 1.5rem; border-top: 1px solid #F1F5F9;">
                <span class="info-label">Tanggal Pendaftaran</span>
                <span class="info-value" style="font-size: 0.95rem; color: var(--text-sub);">
                    <?= date('d F Y, H:i', strtotime($reg['created_at'])) ?>
                </span>
            </div>
        </div>
    </div>

    <div class="status-sidebar">
        <div class="card status-card">
            <h3 style="margin-bottom: 1.5rem;">Update Status</h3>

            <div
                style="margin-bottom: 2rem; text-align: center; padding: 1.5rem; border-radius: 12px; background: #F8FAFC;">
                <span class="info-label" style="margin-bottom: 0.5rem;">Status Saat Ini</span>
                <span
                    style="font-size: 1.25rem; font-weight: 700; text-transform: uppercase; color: <?= $reg['status'] == 'accepted' ? '#10B981' : ($reg['status'] == 'rejected' ? '#EF4444' : '#F59E0B') ?>">
                    <?= $reg['status'] ?>
                </span>
            </div>

            <form action="/admin/pendaftaran/update-status/<?= $reg['id'] ?>" method="POST">
                <?= csrf_field() ?>

                <?php if ($reg['status'] !== 'accepted'): ?>
                    <button type="submit" name="status" value="accepted" class="btn-action btn-accept">
                        <i class="fas fa-check"></i> Terima Pendaftaran
                    </button>
                <?php endif; ?>

                <?php if ($reg['status'] !== 'rejected'): ?>
                    <button type="submit" name="status" value="rejected" class="btn-action btn-reject">
                        <i class="fas fa-times"></i> Tolak Pendaftaran
                    </button>
                <?php endif; ?>

                <?php if ($reg['status'] !== 'pending'): ?>
                    <button type="submit" name="status" value="pending" class="btn-action btn-pending">
                        <i class="fas fa-clock"></i> Kembalikan ke Pending
                    </button>
                <?php endif; ?>
            </form>

            <p style="font-size: 0.85rem; color: var(--text-sub); text-align: center; margin-top: 1.5rem;">
                MENGUPDATE STATUS AKAN MEMBERIKAN TANDA PADA DATA PENDAFTARAN.
            </p>
        </div>
    </div>
</div>

<?= $this->endSection() ?>