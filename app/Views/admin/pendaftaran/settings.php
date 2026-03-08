<?= $this->extend('admin/layout') ?>

<?= $this->section('admin_content') ?>

<style>
    .card {
        background: white;
        border-radius: 20px;
        padding: 2.5rem;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
        border: 1px solid #E2E8F0;
        max-width: 800px;
    }

    .form-group {
        margin-bottom: 2rem;
    }

    .form-group label {
        display: block;
        font-weight: 600;
        margin-bottom: 0.8rem;
        color: var(--text-main);
    }

    .form-control {
        width: 100%;
        padding: 1rem 1.25rem;
        border: 2px solid #F1F5F9;
        border-radius: 12px;
        background: #F8FAFC;
        font-size: 1rem;
        transition: var(--transition);
    }

    .form-control:focus {
        outline: none;
        border-color: var(--primary);
        background: white;
    }

    .switch-container {
        display: flex;
        align-items: center;
        gap: 1rem;
        padding: 1.5rem;
        background: #F8FAFC;
        border-radius: 12px;
        margin-bottom: 2rem;
    }

    .switch {
        position: relative;
        display: inline-block;
        width: 60px;
        height: 34px;
    }

    .switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        transition: .4s;
        border-radius: 34px;
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 26px;
        width: 26px;
        left: 4px;
        bottom: 4px;
        background-color: white;
        transition: .4s;
        border-radius: 50%;
    }

    input:checked+.slider {
        background-color: var(--primary);
    }

    input:focus+.slider {
        box-shadow: 0 0 1px var(--primary);
    }

    input:checked+.slider:before {
        transform: translateX(26px);
    }

    .btn-save {
        background: var(--primary);
        color: white;
        padding: 1rem 2.5rem;
        border-radius: 12px;
        border: none;
        font-weight: 600;
        cursor: pointer;
        font-size: 1rem;
        transition: var(--transition);
        display: inline-flex;
        align-items: center;
        gap: 0.8rem;
    }

    .btn-save:hover {
        background: var(--primary-dark);
        transform: translateY(-2px);
        box-shadow: 0 10px 20px rgba(37, 99, 235, 0.2);
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

<div class="card">
    <h2 style="margin-bottom: 0.5rem;">Pengaturan Pendaftaran</h2>
    <p style="color: var(--text-sub); margin-bottom: 2.5rem;">Konfigurasi bagaimana halaman pendaftaran publik
        ditampilkan dan fungsinya.</p>

    <?php if (session()->getFlashdata('success')): ?>
        <div
            style="background: #D1FAE5; color: #065F46; padding: 1rem; border-radius: 12px; margin-bottom: 2rem; border: 1px solid #A7F3D0;">
            <i class="fas fa-check-circle" style="margin-right: 0.5rem;"></i>
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>

    <form action="/admin/pendaftaran/settings/update" method="POST">
        <?= csrf_field() ?>

        <div class="switch-container">
            <label class="switch">
                <input type="checkbox" name="is_open" id="is_open" <?= ($settings && $settings['is_open']) ? 'checked' : '' ?>>
                <span class="slider"></span>
            </label>
            <div>
                <label for="is_open" style="font-weight: 700; cursor: pointer; display: block;">Buka Pendaftaran</label>
                <p style="font-size: 0.85rem; color: var(--text-sub);">Aktifkan untuk memperbolehkan calon siswa
                    mendaftar online.</p>
            </div>
        </div>

        <div class="form-group">
            <label>Judul Halaman Pendaftaran</label>
            <input type="text" name="title" class="form-control"
                value="<?= $settings['title'] ?? 'Pendaftaran Siswa Baru' ?>" required>
        </div>

        <div class="form-group">
            <label>Deskripsi Singkat</label>
            <textarea name="description" class="form-control" rows="4"
                required><?= $settings['description'] ?? '' ?></textarea>
        </div>

        <div class="form-group">
            <label>Batas Akhir Pendaftaran (Opsional)</label>
            <input type="date" name="deadline" class="form-control" value="<?= $settings['deadline'] ?? '' ?>">
            <p style="font-size: 0.85rem; color: var(--text-sub); margin-top: 0.5rem;">Kosongkan jika tidak ada batas
                waktu tetap.</p>
        </div>

        <button type="submit" class="btn-save">
            <i class="fas fa-save"></i> Simpan Perubahan
        </button>
    </form>
</div>

<?= $this->endSection() ?>