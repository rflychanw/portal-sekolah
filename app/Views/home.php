<?= $this->extend('layout') ?>

<?= $this->section('content') ?>

<!-- Hero Section -->
<section class="hero">
    <div class="container hero-grid">
        <div class="hero-content">
            <h1>Masa Depan Cerah Dimulai Di Sini.</h1>
            <p>EduPortal adalah tempat di mana bakat dan aspirasi Anda berkembang. Kami menyediakan lingkungan
                pendidikan yang inovatif, modern, dan penuh inspirasi.</p>
            <div class="hero-btns" style="display: flex; gap: 1rem;">
                <a href="<?= base_url('contact') ?>" class="btn-cta">Mulai Menjelajah</a>
                <a href="<?= base_url('about') ?>" class="btn-cta"
                    style="background: white; color: var(--text-main) !important; border: 1px solid #E2E8F0; box-shadow: none;">Pelajari
                    Lebih Lanjut</a>
            </div>
        </div>
        <div class="hero-image">
            <img src="<?= base_url('images/hero.png') ?>" alt="Modern School Building">
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="section" style="background: white;">
    <div class="container">
        <div class="stats">
            <div class="stat-card">
                <h3>1500+</h3>
                <p>Siswa Aktif</p>
            </div>
            <div class="stat-card">
                <h3>120+</h3>
                <p>Guru Berpengalaman</p>
            </div>
            <div class="stat-card">
                <h3>45+</h3>
                <p>Fasilitas Modern</p>
            </div>
            <div class="stat-card">
                <h3>98%</h3>
                <p>Tingkat Kelulusan</p>
            </div>
        </div>
    </div>
</section>

<!-- Program & Akademik Section -->
<section class="section" style="background: #F8FAFC; padding-top: 5rem; padding-bottom: 5rem;">
    <div class="container">
        <div class="section-title">
            <span
                style="color: var(--primary); font-weight: 700; text-transform: uppercase; letter-spacing: 2px; font-size: 0.8rem; margin-bottom: 1rem; display: block;">Eksploitasi
                Potensi Anda</span>
            <h2>Program Unggulan & Akademik</h2>
            <p>Kami merancang kurikulum dan kegiatan yang berfokus pada pengembangan holistik setiap siswa.</p>
        </div>

        <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 2.5rem; margin-top: 4rem;">
            <!-- Program Pembelajaran -->
            <div class="academic-card"
                style="background: white; border-radius: 2rem; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.05); transition: all 0.3s ease; border: 1px solid #F1F5F9;">
                <div style="height: 200px; overflow: hidden;">
                    <img src="<?= base_url('images/hero.png') ?>" alt="Program Pembelajaran"
                        style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.5s ease;">
                </div>
                <div style="padding: 2.5rem;">
                    <div
                        style="width: 50px; height: 50px; background: #EFF6FF; color: #2563EB; border-radius: 12px; display: flex; align-items: center; justify-content: center; margin-bottom: 1.5rem; font-size: 1.25rem;">
                        <i class="fas fa-laptop-code"></i>
                    </div>
                    <h3 style="font-size: 1.5rem; margin-bottom: 1rem; font-weight: 700;">Program Pembelajaran</h3>
                    <p style="color: #64748B; line-height: 1.6; margin-bottom: 1.5rem;">Metode pembelajaran inovatif
                        berbasis teknologi (e-learning) yang menggabungkan teori dan praktik secara seimbang.</p>
                    <a href="<?= base_url('academics') ?>"
                        style="color: var(--primary); font-weight: 600; text-decoration: none; display: inline-flex; align-items: center; gap: 0.5rem; font-size: 0.9rem;">Selengkapnya
                        <i class="fas fa-chevron-right" style="font-size: 0.8rem;"></i></a>
                </div>
            </div>

            <!-- Kurikulum -->
            <div class="academic-card"
                style="background: white; border-radius: 2rem; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.05); transition: all 0.3s ease; border: 1px solid #F1F5F9;">
                <div style="height: 200px; overflow: hidden;">
                    <img src="<?= base_url('images/lab.png') ?>" alt="Kurikulum"
                        style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.5s ease;">
                </div>
                <div style="padding: 2.5rem;">
                    <div
                        style="width: 50px; height: 50px; background: #F0FDF4; color: #16A34A; border-radius: 12px; display: flex; align-items: center; justify-content: center; margin-bottom: 1.5rem; font-size: 1.25rem;">
                        <i class="fas fa-book-reader"></i>
                    </div>
                    <h3 style="font-size: 1.5rem; margin-bottom: 1rem; font-weight: 700;">Kurikulum Berstandar</h3>
                    <p style="color: #64748B; line-height: 1.6; margin-bottom: 1.5rem;">Kurikulum 2013 yang diperkaya
                        dengan muatan lokal dan internasional untuk menyiapkan siswa bersaing secara global.</p>
                    <a href="<?= base_url('academics') ?>"
                        style="color: var(--primary); font-weight: 600; text-decoration: none; display: inline-flex; align-items: center; gap: 0.5rem; font-size: 0.9rem;">Selengkapnya
                        <i class="fas fa-chevron-right" style="font-size: 0.8rem;"></i></a>
                </div>
            </div>

            <!-- Estrakurikuler -->
            <div class="academic-card"
                style="background: white; border-radius: 2rem; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.05); transition: all 0.3s ease; border: 1px solid #F1F5F9;">
                <div style="height: 200px; overflow: hidden;">
                    <img src="<?= base_url('images/graduation.png') ?>" alt="Ekstrakurikuler"
                        style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.5s ease;">
                </div>
                <div style="padding: 2.5rem;">
                    <div
                        style="width: 50px; height: 50px; background: #FFF7ED; color: #EA580C; border-radius: 12px; display: flex; align-items: center; justify-content: center; margin-bottom: 1.5rem; font-size: 1.25rem;">
                        <i class="fas fa-basketball-ball"></i>
                    </div>
                    <h3 style="font-size: 1.5rem; margin-bottom: 1rem; font-weight: 700;">Ekstrakurikuler Variatif</h3>
                    <p style="color: #64748B; line-height: 1.6; margin-bottom: 1.5rem;">Lebih dari 15 klub minat dan
                        bakat, mulai dari seni, olahraga, hingga robotika untuk mengasah kreativitas siswa.</p>
                    <a href="<?= base_url('academics') ?>"
                        style="color: var(--primary); font-weight: 600; text-decoration: none; display: inline-flex; align-items: center; gap: 0.5rem; font-size: 0.9rem;">Selengkapnya
                        <i class="fas fa-chevron-right" style="font-size: 0.8rem;"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    .academic-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1) !important;
        border-color: var(--primary) !important;
    }

    .academic-card:hover img {
        transform: scale(1.1);
    }

    @media (max-width: 1024px) {
        div[style*="grid-template-columns: repeat(3, 1fr)"] {
            grid-template-columns: 1fr !important;
        }
    }
</style>

<!-- News/Announcements -->
<section class="section">
    <div class="container">
        <div class="section-title">
            <h2>Berita & Pengumuman Terbaru</h2>
            <p>Tetap terinformasi dengan segala aktivitas dan pencapaian terbaru di EduPortal.</p>
        </div>
        <div class="news-grid">
            <?php
            $articleModel = new \App\Models\ArticleModel();
            $latestArticles = $articleModel->where('status', 'published')->orderBy('created_at', 'DESC')->limit(3)->findAll();
            ?>

            <?php if (empty($latestArticles)): ?>
                <div style="grid-column: span 3; text-align: center; color: #94A3B8; padding: 3rem;">
                    Belum ada berita yang tersedia.
                </div>
            <?php else: ?>
                <?php foreach ($latestArticles as $a): ?>
                    <div class="news-card">
                        <div class="news-image" style="height: 200px; background: #F1F5F9; overflow: hidden;">
                            <?php if ($a['image']): ?>
                                <img src="<?= base_url('uploads/articles/' . $a['image']) ?>" alt="<?= esc($a['title']) ?>"
                                    style="width: 100%; height: 100%; object-fit: cover;">
                            <?php else: ?>
                                <div
                                    style="width: 100%; height: 100%; display: flex; align-items: center; justify-content: center; color: #CBD5E1;">
                                    <i class="fas fa-image" style="font-size: 2.5rem;"></i>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="news-content">
                            <div
                                style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 0.5rem;">
                                <div class="news-date"><?= date('M d, Y', strtotime($a['created_at'])) ?></div>
                                <div
                                    style="font-size: 0.7rem; color: #64748B; background: #F1F5F9; padding: 0.1rem 0.5rem; border-radius: 999px;">
                                    By <?= esc($a['writer'] ?? 'Admin') ?>
                                </div>
                            </div>
                            <h3
                                style="height: 2.8em; overflow: hidden; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; line-height: 1.4; margin-bottom: 0.5rem;">
                                <?= esc($a['title']) ?>
                            </h3>
                            <p
                                style="height: 4.8em; overflow: hidden; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; line-height: 1.6; margin-bottom: 1rem; font-size: 0.9rem; color: #64748B;">
                                <?= esc($a['summary'] ?? (strlen($a['content']) > 100 ? substr(strip_tags($a['content']), 0, 100) . '...' : strip_tags($a['content']))) ?>
                            </p>
                            <a href="<?= base_url('news/' . $a['slug']) ?>"
                                style="color: var(--primary); font-weight: 600; text-decoration: none; display: inline-flex; align-items: center; gap: 0.5rem;">
                                Baca Selengkapnya <i class="fas fa-arrow-right" style="font-size: 0.8rem;"></i>
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
        <div style="text-align: center; margin-top: 3rem;">
            <a href="<?= base_url('news') ?>" class="btn-cta" style="padding: 0.8rem 2rem; font-size: 0.9rem;">Lihat
                Semua Berita</a>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="section" style="background: var(--primary); color: white; text-align: center;">
    <div class="container" style="max-width: 800px;">
        <h2 style="font-size: 3rem; margin-bottom: 2rem;">Siap Memulai Petualangan Ilmu?</h2>
        <p style="font-size: 1.25rem; margin-bottom: 3rem; opacity: 0.9;">Daftarkan diri Anda atau anak Anda sekarang
            untuk mendapatkan pendidikan berkualitas kelas dunia.</p>
        <a href="<?= base_url('contact') ?>" class="btn-cta"
            style="background: white; color: var(--primary) !important;">Daftar Sekarang</a>
    </div>
</section>

<?= $this->endSection() ?>