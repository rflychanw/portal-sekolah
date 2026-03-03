<?= $this->extend('admin/layout') ?>

<?= $this->section('admin_content') ?>

<style>
    .card {
        background: white;
        border-radius: 16px;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -1px rgba(0, 0, 0, 0.03);
        padding: 2rem;
        max-width: 800px;
    }

    .form-group {
        margin-bottom: 1.5rem;
    }

    .form-group label {
        display: block;
        margin-bottom: 0.5rem;
        font-weight: 600;
        color: #334155;
    }

    .form-control {
        width: 100%;
        padding: 0.75rem 1rem;
        border-radius: 12px;
        border: 1px solid #E2E8F0;
        transition: all 0.2s;
        font-size: 1rem;
    }

    .form-control:focus {
        outline: none;
        border-color: #2563EB;
        box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
    }

    .btn {
        padding: 0.75rem 2rem;
        border-radius: 12px;
        font-weight: 600;
        transition: all 0.2s;
        cursor: pointer;
        border: none;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        text-decoration: none;
    }

    .btn-primary {
        background: #2563EB;
        color: white;
    }

    .btn-secondary {
        background: #F1F5F9;
        color: #475569;
    }

    .error-list {
        background: #FFF1F2;
        color: #BE123C;
        padding: 1rem;
        border-radius: 12px;
        margin-bottom: 1.5rem;
        list-style: inside;
    }

    .current-photo {
        width: 100px;
        height: 100px;
        border-radius: 12px;
        object-fit: cover;
        margin-bottom: 1rem;
        border: 2px solid #E2E8F0;
    }
</style>

<div style="margin-bottom: 2rem;">
    <a href="<?= base_url('admin/teachers') ?>"
        style="color: #64748B; text-decoration: none; display: flex; align-items: center; gap: 0.5rem;">
        <i class="fas fa-arrow-left"></i> Kembali ke Daftar
    </a>
    <h2 style="font-weight: 700; font-size: 1.5rem; margin-top: 1rem;">Edit Data Guru</h2>
</div>

<?php if (session()->getFlashdata('errors')): ?>
    <ul class="error-list">
        <?php foreach (session()->getFlashdata('errors') as $error): ?>
            <li>
                <?= $error ?>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<div class="card">
    <form action="<?= base_url('admin/teachers/update/' . $teacher['id']) ?>" method="POST"
        enctype="multipart/form-data">
        <?= csrf_field() ?>

        <div class="form-group">
            <label for="name">Nama Lengkap *</label>
            <input type="text" name="name" id="name" class="form-control" value="<?= old('name', $teacher['name']) ?>"
                required>
        </div>

        <div class="form-group">
            <label for="nip">NIP (Opsional)</label>
            <input type="text" name="nip" id="nip" class="form-control" value="<?= old('nip', $teacher['nip']) ?>">
        </div>

        <div class="form-group">
            <label for="subject">Mata Pelajaran *</label>
            <input type="text" name="subject" id="subject" class="form-control"
                value="<?= old('subject', $teacher['subject']) ?>" required>
        </div>

        <div class="form-group">
            <label for="bio">Biografi / Deskripsi</label>
            <textarea name="bio" id="bio" class="form-control" rows="4"><?= old('bio', $teacher['bio']) ?></textarea>
        </div>

        <div class="form-group">
            <label>Foto Saat Ini</label>
            <div>
                <?php if ($teacher['photo']): ?>
                    <img src="<?= base_url('uploads/teachers/' . $teacher['photo']) ?>" alt="<?= $teacher['name'] ?>"
                        class="current-photo">
                <?php else: ?>
                    <div class="current-photo"
                        style="background: #F1F5F9; display: flex; align-items: center; justify-content: center; color: #94A3B8;">
                        <i class="fas fa-user fa-3x"></i>
                    </div>
                <?php endif; ?>
            </div>
            <label for="photo">Ganti Foto Profil</label>
            <input type="file" name="photo" id="photo" class="form-control" accept="image/*">
            <p style="font-size: 0.8rem; color: #94A3B8; margin-top: 0.5rem;">Biarkan kosong jika tidak ingin mengubah
                foto.</p>
        </div>

        <div style="display: flex; gap: 1rem; margin-top: 2rem;">
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            <a href="<?= base_url('admin/teachers') ?>" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>

<?= $this->endSection() ?>