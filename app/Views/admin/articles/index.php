<?= $this->extend('admin/layout') ?>

<?= $this->section('admin_content') ?>

<div class="header-actions"
    style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem;">
    <div>
        <h2 style="font-weight: 700; font-size: 1.5rem;">Manajemen Artikel</h2>
        <p style="color: #64748B; font-size: 0.9rem;">Kelola berita dan publikasi sekolah</p>
    </div>
    <a href="<?= base_url('admin/articles/create') ?>" class="btn btn-primary"
        style="background: #2563EB; color: white; padding: 0.75rem 1.5rem; border-radius: 12px; font-weight: 600; text-decoration: none; display: inline-flex; align-items: center; gap: 0.5rem;">
        <i class="fas fa-plus"></i> Artikel Baru
    </a>
</div>

<?php if (session()->getFlashdata('success')): ?>
    <div
        style="background: #DCFCE7; color: #166534; padding: 1rem; border-radius: 12px; border: 1px solid #BBF7D0; margin-bottom: 1.5rem;">
        <?= session()->getFlashdata('success') ?>
    </div>
<?php endif; ?>

<div class="card"
    style="background: white; border-radius: 16px; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05); padding: 1.5rem;">
    <div style="overflow-x: auto;">
        <table style="width: 100%; border-collapse: collapse;">
            <thead>
                <tr>
                    <th
                        style="text-align: left; padding: 1rem; color: #64748B; font-weight: 600; border-bottom: 1px solid #E2E8F0;">
                        Gambar</th>
                    <th
                        style="text-align: left; padding: 1rem; color: #64748B; font-weight: 600; border-bottom: 1px solid #E2E8F0;">
                        Judul</th>
                    <th
                        style="text-align: left; padding: 1rem; color: #64748B; font-weight: 600; border-bottom: 1px solid #E2E8F0;">
                        Penulis</th>
                    <th
                        style="text-align: left; padding: 1rem; color: #64748B; font-weight: 600; border-bottom: 1px solid #E2E8F0;">
                        Status</th>
                    <th
                        style="text-align: left; padding: 1rem; color: #64748B; font-weight: 600; border-bottom: 1px solid #E2E8F0;">
                        Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($articles)): ?>
                    <tr>
                        <td colspan="5" style="text-align: center; color: #64748B; padding: 3rem;">Belum ada artikel.</td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($articles as $a): ?>
                        <tr>
                            <td style="padding: 1rem; border-bottom: 1px solid #F1F5F9;">
                                <?php if ($a['image']): ?>
                                    <img src="<?= base_url('uploads/articles/' . $a['image']) ?>" alt="Article"
                                        style="width: 80px; height: 50px; border-radius: 8px; object-fit: cover;">
                                <?php else: ?>
                                    <div
                                        style="width: 80px; height: 50px; background: #F1F5F9; border-radius: 8px; display: flex; align-items: center; justify-content: center; color: #94A3B8;">
                                        <i class="fas fa-image"></i>
                                    </div>
                                <?php endif; ?>
                            </td>
                            <td style="padding: 1rem; border-bottom: 1px solid #F1F5F9;">
                                <div style="font-weight: 600; color: #1E293B;">
                                    <?= esc($a['title']) ?>
                                </div>
                                <div style="font-size: 0.8rem; color: #64748B;">
                                    <?= date('d M Y', strtotime($a['created_at'])) ?>
                                </div>
                            </td>
                            <td style="padding: 1rem; border-bottom: 1px solid #F1F5F9;">
                                <span style="font-size: 0.9rem; font-weight: 500;">
                                    <?= $a['teacher_id'] ? esc($a['teacher_author_name']) : '<span style="color: #2563EB;">Admin</span>' ?>
                                </span>
                            </td>
                            <td style="padding: 1rem; border-bottom: 1px solid #F1F5F9;">
                                <?php if ($a['status'] === 'published'): ?>
                                    <span
                                        style="background: #DCFCE7; color: #166534; padding: 0.25rem 0.75rem; border-radius: 9999px; font-size: 0.75rem; font-weight: 600;">Published</span>
                                <?php else: ?>
                                    <span
                                        style="background: #F1F5F9; color: #64748B; padding: 0.25rem 0.75rem; border-radius: 9999px; font-size: 0.75rem; font-weight: 600;">Draft</span>
                                <?php endif; ?>
                            </td>
                            <td style="padding: 1rem; border-bottom: 1px solid #F1F5F9;">
                                <div style="display: flex; gap: 0.5rem;">
                                    <a href="<?= base_url('admin/articles/edit/' . $a['id']) ?>"
                                        style="color: #F59E0B; background: #FEF3C7; width: 32px; height: 32px; border-radius: 8px; display: flex; align-items: center; justify-content: center; text-decoration: none;">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="<?= base_url('admin/articles/delete/' . $a['id']) ?>"
                                        onclick="return confirm('Hapus artikel ini?')"
                                        style="color: #EF4444; background: #FEE2E2; width: 32px; height: 32px; border-radius: 8px; display: flex; align-items: center; justify-content: center; text-decoration: none;">
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