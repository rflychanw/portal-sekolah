<?= $this->extend('admin/layout') ?>

<?= $this->section('admin_content') ?>

<div style="margin-bottom: 2rem;">
    <a href="<?= base_url('admin/articles') ?>"
        style="color: #64748B; text-decoration: none; display: inline-flex; align-items: center; gap: 0.5rem; font-weight: 500;">
        <i class="fas fa-arrow-left"></i> Kembali ke Daftar
    </a>
    <h2 style="font-weight: 700; font-size: 1.5rem; margin-top: 1rem;">Edit Artikel</h2>
</div>

<div class="card"
    style="background: white; border-radius: 16px; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05); padding: 2rem;">
    <form action="<?= base_url('admin/articles/update/' . $article['id']) ?>" method="POST"
        enctype="multipart/form-data">
        <?= csrf_field() ?>

        <div style="margin-bottom: 1.5rem;">
            <label style="display: block; margin-bottom: 0.5rem; font-weight: 600; color: #334155;">Judul
                Artikel</label>
            <input type="text" name="title" value="<?= esc($article['title']) ?>" required
                style="width: 100%; padding: 0.75rem 1rem; border: 1px solid #E2E8F0; border-radius: 12px; font-size: 1rem;">
        </div>

        <div style="margin-bottom: 1.5rem;">
            <label style="display: block; margin-bottom: 0.5rem; font-weight: 600; color: #334155;">Ringkasan
                (Summary)</label>
            <textarea name="summary" rows="3"
                style="width: 100%; padding: 0.75rem 1rem; border: 1px solid #E2E8F0; border-radius: 12px; font-size: 1rem;"><?= esc($article['summary']) ?></textarea>
        </div>

        <div style="margin-bottom: 1.5rem;">
            <label style="display: block; margin-bottom: 0.5rem; font-weight: 600; color: #334155;">Konten
                Artikel</label>
            <textarea name="content" rows="10" required
                style="width: 100%; padding: 0.75rem 1rem; border: 1px solid #E2E8F0; border-radius: 12px; font-size: 1rem;"><?= esc($article['content']) ?></textarea>
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem; margin-bottom: 2rem;">
            <div>
                <label style="display: block; margin-bottom: 0.5rem; font-weight: 600; color: #334155;">Gambar
                    Unggulan</label>
                <?php if ($article['image']): ?>
                    <div style="margin-bottom: 1rem;">
                        <img src="<?= base_url('uploads/articles/' . $article['image']) ?>" alt="Current image"
                            style="width: 150px; border-radius: 8px;">
                    </div>
                <?php endif; ?>
                <input type="file" name="image" accept="image/*"
                    style="width: 100%; padding: 0.5rem; border: 1px solid #E2E8F0; border-radius: 12px;">
                <p style="font-size: 0.8rem; color: #64748B; margin-top: 0.5rem;">Kosongkan jika tidak ingin mengganti
                    gambar.</p>
            </div>
            <div>
                <label style="display: block; margin-bottom: 0.5rem; font-weight: 600; color: #334155;">Status
                    Publikasi</label>
                <select name="status"
                    style="width: 100%; padding: 0.75rem 1rem; border: 1px solid #E2E8F0; border-radius: 12px; font-size: 1rem; background: white;">
                    <option value="draft" <?= $article['status'] == 'draft' ? 'selected' : '' ?>>Draft</option>
                    <option value="published" <?= $article['status'] == 'published' ? 'selected' : '' ?>>Published</option>
                </select>
            </div>
        </div>

        <div style="display: flex; gap: 1rem;">
            <button type="submit"
                style="background: #2563EB; color: white; border: none; padding: 0.75rem 2rem; border-radius: 12px; font-weight: 700; cursor: pointer;">
                <i class="fas fa-save" style="margin-right: 0.5rem;"></i> Simpan Perubahan
            </button>
        </div>
    </form>
</div>

<?= $this->endSection() ?>