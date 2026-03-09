<?= $this->extend('admin/layout') ?>

<?= $this->section('admin_content') ?>

<style>
    .card-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 2rem;
        margin-bottom: 4rem;
    }

    @media (max-width: 1200px) {
        .card-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (max-width: 600px) {
        .card-grid {
            grid-template-columns: 1fr;
        }
    }

    .admin-card {
        background: white;
        padding: 2.5rem;
        border-radius: 2rem;
        border: 1px solid var(--border);
        transition: var(--transition);
        display: flex;
        flex-direction: column;
        gap: 1.5rem;
    }

    .admin-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.05);
        border-color: var(--primary);
    }

    .card-icon {
        width: 60px;
        height: 60px;
        background: var(--bg-light);
        border-radius: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        color: var(--primary);
        transition: var(--transition);
    }

    .admin-card:hover .card-icon {
        background: var(--primary);
        color: white;
    }

    .card-info h3 {
        font-size: 2.5rem;
        font-weight: 800;
        margin-bottom: 0.25rem;
    }

    .card-info p {
        color: var(--text-sub);
        font-weight: 500;
        font-size: 1.1rem;
    }

    .chart-grid {
        display: grid;
        grid-template-columns: 2fr 1fr;
        gap: 2.5rem;
    }

    @media (max-width: 1200px) {
        .chart-grid {
            grid-template-columns: 1fr;
        }
    }

    .chart-card {
        background: white;
        padding: 3rem;
        border-radius: 2.5rem;
        border: 1px solid var(--border);
        min-height: 400px;
    }

    .chart-card h2 {
        font-size: 1.5rem;
        margin-bottom: 2rem;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .table-news {
        width: 100%;
        border-collapse: collapse;
    }

    .table-news th {
        text-align: left;
        padding: 1.5rem 1rem;
        color: var(--text-sub);
        font-weight: 600;
        border-bottom: 1px solid var(--border);
    }

    .table-news td {
        padding: 1.5rem 1rem;
        border-bottom: 1px solid #F1F5F9;
    }

    .status-badge {
        padding: 0.5rem 1rem;
        border-radius: 50px;
        font-size: 0.8rem;
        font-weight: 600;
        display: inline-block;
    }

    .status-published {
        background: #DCFCE7;
        color: #166534;
    }

    .status-draft {
        background: #FEF3C7;
        color: #92400E;
    }
</style>

<div class="card-grid">
    <a href="<?= base_url('admin/students') ?>" class="admin-card" style="text-decoration: none; color: inherit;">
        <div class="card-icon"><i class="fas fa-user-graduate"></i></div>
        <div class="card-info">
            <h3>
                <?= $stats['students'] ?>
            </h3>
            <p>Total Siswa</p>
        </div>
    </a>
    <a href="<?= base_url('admin/teachers') ?>" class="admin-card" style="text-decoration: none; color: inherit;">
        <div class="card-icon"><i class="fas fa-user-tie"></i></div>
        <div class="card-info">
            <h3>
                <?= $stats['teachers'] ?>
            </h3>
            <p>Total Guru</p>
        </div>
    </a>
    <a href="<?= base_url('admin/articles') ?>" class="admin-card" style="text-decoration: none; color: inherit;">
        <div class="card-icon"><i class="fas fa-newspaper"></i></div>
        <div class="card-info">
            <h3>
                <?= $stats['news'] ?>
            </h3>
            <p>Total Artikel</p>
        </div>
    </a>
    <a href="<?= base_url('admin/pendaftaran') ?>" class="admin-card" style="text-decoration: none; color: inherit;">
        <div class="card-icon"><i class="fas fa-file-signature"></i></div>
        <div class="card-info">
            <h3>
                <?= $stats['registrations'] ?>
            </h3>
            <p>Pendaftaran</p>
        </div>
    </a>
    <a href="<?= base_url('admin/messages') ?>" class="admin-card" style="text-decoration: none; color: inherit;">
        <div class="card-icon"><i class="fas fa-envelope"></i></div>
        <div class="card-info">
            <h3>
                <?= $stats['messages'] ?>
            </h3>
            <p>Pesan Masuk</p>
        </div>
    </a>
</div>

<div class="chart-grid">
    <div class="chart-card">
        <h2>Berita & Pengumuman Terbaru
            <a href="#"
                style="background: var(--bg-light); padding: 0.6rem 1.2rem; border-radius: 12px; transform: scale(0.9); font-weight: 600; font-size: 0.8rem; color: var(--primary);">Lihat
                Semua</a>
        </h2>
        <table class="table-news">
            <thead>
                <tr>
                    <th>Judul Berita</th>
                    <th>Status</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($latest_articles as $article): ?>
                    <tr>
                        <td>
                            <?= esc($article['title']) ?>
                        </td>
                        <td>
                            <span
                                class="status-badge <?= $article['status'] === 'Published' ? 'status-published' : 'status-draft' ?>">
                                <?= $article['status'] ?>
                            </span>
                        </td>
                        <td>
                            <?= date('d M Y', strtotime($article['created_at'])) ?>
                        </td>
                        <td style="display: flex; gap: 1rem; align-items: center;">
                            <a href="<?= base_url('admin/articles/edit/' . $article['id']) ?>" style="color: #F59E0B;">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="<?= base_url('admin/articles/delete/' . $article['id']) ?>" style="color: #EF4444;"
                                onclick="return confirm('Apakah Anda yakin ingin menghapus artikel ini?')">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                <?php if (empty($latest_articles)): ?>
                    <tr>
                        <td colspan="4" style="text-align: center; padding: 2rem; color: var(--text-sub);">
                            Belum ada artikel yang diterbitkan.
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <div class="chart-card">
        <h2>Aktivitas Terakhir</h2>
        <div class="activity-timeline" style="display: flex; flex-direction: column; gap: 2rem;">
            <div
                style="display: flex; gap: 1rem; border-left: 2px solid var(--border); padding-left: 1.5rem; position: relative;">
                <div
                    style="position: absolute; left: -7px; top: 0; width: 12px; height: 12px; border-radius: 50%; background: var(--primary); border: 2px solid white;">
                </div>
                <div style="flex-grow: 1;">
                    <p style="font-weight: 700; font-size: 0.95rem;">Upload Berita Baru</p>
                    <p style="font-size: 0.85rem; color: var(--text-sub); margin-bottom: 0.5rem;">"Wisuda Angkatan 2024"
                        berhasil diterbitkan.</p>
                    <span style="font-size: 0.75rem; color: #94A3B8;">10 menit yang lalu</span>
                </div>
            </div>
            <div
                style="display: flex; gap: 1rem; border-left: 2px solid var(--border); padding-left: 1.5rem; position: relative;">
                <div
                    style="position: absolute; left: -7px; top: 0; width: 12px; height: 12px; border-radius: 50%; background: #94A3B8; border: 2px solid white;">
                </div>
                <div style="flex-grow: 1;">
                    <p style="font-weight: 700; font-size: 0.95rem;">Pesan Baru Diterima</p>
                    <p style="font-size: 0.85rem; color: var(--text-sub); margin-bottom: 0.5rem;">Pertanyaan pendaftaran
                        dari Budi Santoso.</p>
                    <span style="font-size: 0.75rem; color: #94A3B8;">2 jam yang lalu</span>
                </div>
            </div>
            <div
                style="display: flex; gap: 1rem; border-left: 2px solid var(--border); padding-left: 1.5rem; position: relative;">
                <div
                    style="position: absolute; left: -7px; top: 0; width: 12px; height: 12px; border-radius: 50%; background: #94A3B8; border: 2px solid white;">
                </div>
                <div style="flex-grow: 1;">
                    <p style="font-weight: 700; font-size: 0.95rem;">Dokumen Guru Diperbarui</p>
                    <p style="font-size: 0.85rem; color: var(--text-sub); margin-bottom: 0.5rem;">Drs. Ahmad Santoso
                        mengubah profil guru.</p>
                    <span style="font-size: 0.75rem; color: #94A3B8;">Kemarin, 14:30</span>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>