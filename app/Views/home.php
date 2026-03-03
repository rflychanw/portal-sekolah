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

<!-- News/Announcements -->
<section class="section">
    <div class="container">
        <div class="section-title">
            <h2>Berita & Pengumuman Terbaru</h2>
            <p>Tetap terinformasi dengan segala aktivitas dan pencapaian terbaru di EduPortal.</p>
        </div>
        <div class="news-grid">
            <div class="news-card">
                <div class="news-image">
                    <img src="<?= base_url('images/graduation.png') ?>" alt="Graduation"
                        style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <div class="news-content">
                    <div class="news-date">Mei 15, 2024</div>
                    <h3>Wisuda Angkatan 2024: Menuju Masa Depan Baru</h3>
                    <p>Momen haru dan bangga saat 350 siswa kami merayakan kelulusan mereka...</p>
                    <a href="#"
                        style="color: var(--primary); font-weight: 600; margin-top: 1rem; display: inline-block;">Baca
                        Selengkapnya <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>
            <div class="news-card">
                <div class="news-image">
                    <img src="<?= base_url('images/lab.png') ?>" alt="Science Lab"
                        style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <div class="news-content">
                    <div class="news-date">April 20, 2024</div>
                    <h3>Peresmian Lab Sains High-Tech Terbaru</h3>
                    <p>Memasuki era digital, EduPortal menghadirkan fasilitas laboratorium sains tercanggih...</p>
                    <a href="#"
                        style="color: var(--primary); font-weight: 600; margin-top: 1rem; display: inline-block;">Baca
                        Selengkapnya <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>
            <div class="news-card">
                <div class="news-image">
                    <div
                        style="width: 100%; height: 100%; background: linear-gradient(135deg, #60A5FA 0%, #3B82F6 100%); display: flex; align-items: center; justify-content: center;">
                        <i class="fas fa-users" style="font-size: 3rem; color: white;"></i>
                    </div>
                </div>
                <div class="news-content">
                    <div class="news-date">Maret 10, 2024</div>
                    <h3>Sesi Konseling Karir: Memilih Jurusan yang Tepat</h3>
                    <p>Bersama pakar pendidikan, kami membantu siswa merencanakan jalur karir masa depan...</p>
                    <a href="#"
                        style="color: var(--primary); font-weight: 600; margin-top: 1rem; display: inline-block;">Baca
                        Selengkapnya <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>
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