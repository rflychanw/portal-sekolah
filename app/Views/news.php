<?= $this->extend('layout') ?>

<?= $this->section('content') ?>

<!-- News Hero -->
<section class="section" style="padding-top: 10rem; background: #0F172A; color: white;">
    <div class="container">
        <div class="section-title">
            <h1 style="color: white; font-size: 3.5rem;">Berita & Acara</h1>
            <p style="color: #94A3B8;">Tetap terupdate dengan berita terkini, pencapaian siswa, dan agenda kegiatan
                resmi di EduPortal.</p>
        </div>
    </div>
</section>

<!-- News Grid Full -->
<section class="section">
    <div class="container">
        <?php if (empty($articles)): ?>
            <div style="text-align: center; padding: 5rem 0;">
                <i class="fas fa-newspaper" style="font-size: 5rem; color: #E2E8F0; margin-bottom: 2rem;"></i>
                <h2 style="color: #64748B;">Belum ada berita yang diterbitkan.</h2>
                <p style="color: #94A3B8;">Silakan kembali lagi nanti untuk update terbaru.</p>
            </div>
        <?php else: ?>
            <div class="news-grid" style="grid-template-columns: repeat(3, 1fr); gap: 3rem;">
                <?php foreach ($articles as $a): ?>
                    <div class="news-card">
                        <div class="news-image" style="height: 220px; background: #F1F5F9; overflow: hidden;">
                            <?php if ($a['image']): ?>
                                <img src="<?= base_url('uploads/articles/' . $a['image']) ?>" alt="<?= esc($a['title']) ?>"
                                    style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.5s ease;">
                            <?php else: ?>
                                <div style="width: 100%; height: 100%; display: flex; align-items: center; justify-content: center; color: #CBD5E1;">
                                    <i class="fas fa-image" style="font-size: 3rem;"></i>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="news-content" style="padding: 2rem;">
                            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1rem;">
                                <div class="news-date" style="font-size: 0.85rem; color: var(--primary); font-weight: 600;">
                                    <?= date('d M Y', strtotime($a['created_at'])) ?>
                                </div>
                                <div style="font-size: 0.75rem; color: #64748B; background: #F1F5F9; padding: 0.2rem 0.6rem; border-radius: 999px; font-weight: 500;">
                                    By <?= esc($a['writer'] ?? 'Admin') ?>
                                </div>
                            </div>
                            <h3 style="font-size: 1.25rem; margin-bottom: 1rem; color: #1E293B; line-height: 1.4; height: 2.8em; overflow: hidden; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">
                                <?= esc($a['title']) ?>
                            </h3>
                            <p style="color: #64748B; font-size: 0.95rem; line-height: 1.6; margin-bottom: 1.5rem; height: 4.8em; overflow: hidden; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical;">
                                <?= esc($a['summary'] ?? (strlen($a['content']) > 100 ? substr(strip_tags($a['content']), 0, 100) . '...' : strip_tags($a['content']))) ?>
                            </p>
                            <a href="<?= base_url('news/' . $a['slug']) ?>"
                                style="color: var(--primary); font-weight: 700; text-decoration: none; display: inline-flex; align-items: center; gap: 0.5rem; font-size: 0.9rem;">
                                Baca Selengkapnya <i class="fas fa-chevron-right" style="font-size: 0.75rem;"></i>
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>

<style>
    .news-card {
        background: white;
        border-radius: 1.5rem;
        overflow: hidden;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
        transition: all 0.3s ease;
        border: 1px solid #F1F5F9;
    }
    .news-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
        border-color: var(--primary);
    }
    .news-card:hover img {
        transform: scale(1.1);
    }
    
    @media (max-width: 1024px) {
        .news-grid {
            grid-template-columns: repeat(2, 1fr) !important;
        }
    }
    @media (max-width: 768px) {
        .news-grid {
            grid-template-columns: 1fr !important;
        }
    }
</style>

<?= $this->endSection() ?>