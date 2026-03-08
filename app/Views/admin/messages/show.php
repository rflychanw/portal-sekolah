<?= $this->extend('admin/layout') ?>

<?= $this->section('admin_content') ?>

<style>
    .card {
        background: white;
        border-radius: 20px;
        padding: 2.5rem;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
        border: 1px solid #E2E8F0;
        max-width: 900px;
    }

    .message-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        margin-bottom: 2.5rem;
        padding-bottom: 1.5rem;
        border-bottom: 1px solid #F1F5F9;
    }

    .sender-info h3 {
        font-size: 1.5rem;
        margin-bottom: 0.5rem;
    }

    .sender-info p {
        color: var(--text-sub);
    }

    .subject-badge {
        background: var(--bg-light);
        color: var(--primary);
        padding: 0.5rem 1.25rem;
        border-radius: 50px;
        font-weight: 600;
        font-size: 0.9rem;
    }

    .message-content {
        line-height: 1.8;
        font-size: 1.1rem;
        color: var(--text-main);
        background: #F8FAFC;
        padding: 2rem;
        border-radius: 1.5rem;
        border: 1px solid #F1F5F9;
        white-space: pre-wrap;
    }

    .back-btn {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        color: var(--text-sub);
        text-decoration: none;
        margin-bottom: 2rem;
        font-weight: 500;
        transition: var(--transition);
    }

    .back-btn:hover {
        color: var(--primary);
    }
</style>

<a href="/admin/messages" class="back-btn">
    <i class="fas fa-arrow-left"></i> Kembali ke Kotak Masuk
</a>

<div class="card">
    <div class="message-header">
        <div class="sender-info">
            <span
                style="color: var(--primary); font-weight: 600; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.05em; display: block; margin-bottom: 0.5rem;">Dari:</span>
            <h3>
                <?= esc($msg['name']) ?>
            </h3>
            <p><i class="far fa-envelope" style="margin-right: 0.5rem;"></i>
                <?= esc($msg['email']) ?>
            </p>
            <p style="margin-top: 0.5rem; font-size: 0.9rem;"><i class="far fa-clock" style="margin-right: 0.5rem;"></i>
                <?= date('d F Y, H:i', strtotime($msg['created_at'])) ?>
            </p>
        </div>
        <div class="subject-badge">
            <i class="fas fa-tag" style="margin-right: 0.5rem;"></i>
            <?= ucfirst(esc($msg['subject'])) ?>
        </div>
    </div>

    <div style="margin-bottom: 1.5rem;">
        <span style="color: var(--text-sub); font-weight: 600; font-size: 0.85rem; text-transform: uppercase;">Isi
            Pesan:</span>
    </div>
    <div class="message-content">
        <?= esc($msg['message']) ?>
    </div>

    <div style="margin-top: 3rem; display: flex; gap: 1rem;">
        <a href="mailto:<?= esc($msg['email']) ?>" class="btn-cta"
            style="text-decoration: none; display: inline-flex; align-items: center; gap: 0.8rem;">
            <i class="fas fa-reply"></i> Balas via Email
        </a>
        <a href="/admin/messages/delete/<?= $msg['id'] ?>"
            style="padding: 0.8rem 1.5rem; border-radius: 50px; border: 1px solid #FEE2E2; color: #EF4444; text-decoration: none; font-weight: 600; background: #FFF5F5;"
            onclick="return confirm('Hapus pesan ini?')">
            <i class="fas fa-trash-alt" style="margin-right: 0.5rem;"></i> Hapus Pesan
        </a>
    </div>
</div>

<?= $this->endSection() ?>