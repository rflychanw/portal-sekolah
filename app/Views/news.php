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

<!-- Filter/Navigation News -->
<section class="section" style="padding: 2rem 0; background: white; border-bottom: 1px solid #E2E8F0;">
    <div class="container" style="display: flex; gap: 2rem; justify-content: center; font-weight: 500;">
        <a href="#" style="color: var(--primary);">Semua</a>
        <a href="#" style="color: var(--text-sub);">Akademik</a>
        <a href="#" style="color: var(--text-sub);">Olahraga</a>
        <a href="#" style="color: var(--text-sub);">Prestasi</a>
        <a href="#" style="color: var(--text-sub);">Pengumuman</a>
    </div>
</section>

<!-- News Grid Full -->
<section class="section">
    <div class="container">
        <div class="news-grid" style="grid-template-columns: repeat(3, 1fr); gap: 3rem;">
            <!-- Already have 3 cards, let's add some variations -->
            <div class="news-card">
                <div class="news-image">
                    <img src="<?= base_url('images/graduation.png') ?>" alt="News"
                        style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <div class="news-content">
                    <div class="news-date">Mei 15, 2024</div>
                    <h3>Wisuda Angkatan 2024</h3>
                    <p>Momen haru dan bangga saat 350 siswa merayakan kelulusan mereka...</p>
                    <a href="#"
                        style="color: var(--primary); font-weight: 600; margin-top: 1rem; display: inline-block;">Baca
                        Selengkapnya</a>
                </div>
            </div>

            <div class="news-card">
                <div class="news-image">
                    <img src="<?= base_url('images/lab.png') ?>" alt="News"
                        style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <div class="news-content">
                    <div class="news-date">April 20, 2024</div>
                    <h3>Peresmian Lab Sains High-Tech</h3>
                    <p>Memasuki era digital, EduPortal menghadirkan fasilitas sains terbaik...</p>
                    <a href="#"
                        style="color: var(--primary); font-weight: 600; margin-top: 1rem; display: inline-block;">Baca
                        Selengkapnya</a>
                </div>
            </div>

            <div class="news-card">
                <div class="news-image">
                    <img src="<?= base_url('images/hero.png') ?>" alt="News"
                        style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <div class="news-content">
                    <div class="news-date">Maret 10, 2024</div>
                    <h3>Kunjungan Industri ke Silicon Valley</h3>
                    <p>Meningkatkan wawasan teknologi siswa melalui kunjungan industri mancanegara...</p>
                    <a href="#"
                        style="color: var(--primary); font-weight: 600; margin-top: 1rem; display: inline-block;">Baca
                        Selengkapnya</a>
                </div>
            </div>

            <div class="news-card">
                <div
                    style="height: 200px; background: #EEF2FF; display: flex; align-items: center; justify-content: center;">
                    <i class="fas fa-trophy" style="font-size: 3rem; color: var(--accent);"></i>
                </div>
                <div class="news-content">
                    <div class="news-date">Februari 28, 2024</div>
                    <h3>Juara 1 Olimpiade Matematika Nasional</h3>
                    <p>Selamat kepada Budi Santoso atas prestasinya mengharumkan nama sekolah...</p>
                    <a href="#"
                        style="color: var(--primary); font-weight: 600; margin-top: 1rem; display: inline-block;">Baca
                        Selengkapnya</a>
                </div>
            </div>

            <div class="news-card">
                <div
                    style="height: 200px; background: #F0FDF4; display: flex; align-items: center; justify-content: center;">
                    <i class="fas fa-leaf" style="font-size: 3rem; color: #10B981;"></i>
                </div>
                <div class="news-content">
                    <div class="news-date">Januari 15, 2024</div>
                    <h3>Gerakan Sekolah Hijau (Go Green)</h3>
                    <p>Komitmen kami dalam melestarikan lingkungan melalui program daur ulang...</p>
                    <a href="#"
                        style="color: var(--primary); font-weight: 600; margin-top: 1rem; display: inline-block;">Baca
                        Selengkapnya</a>
                </div>
            </div>

            <div class="news-card">
                <div
                    style="height: 200px; background: #FFF7ED; display: flex; align-items: center; justify-content: center;">
                    <i class="fas fa-laptop-code" style="font-size: 3rem; color: #F97316;"></i>
                </div>
                <div class="news-content">
                    <div class="news-date">Desember 20, 2023</div>
                    <h3>Coding Boot Camp Summer 2024</h3>
                    <p>Segera daftarkan diri dalam pelatihan pemrograman intensif selama liburan...</p>
                    <a href="#"
                        style="color: var(--primary); font-weight: 600; margin-top: 1rem; display: inline-block;">Baca
                        Selengkapnya</a>
                </div>
            </div>
        </div>

        <!-- Pagination Placeholder -->
        <div style="margin-top: 4rem; text-align: center; display: flex; gap: 1rem; justify-content: center;">
            <a href="#"
                style="width: 40px; height: 40px; background: var(--primary); color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center;">1</a>
            <a href="#"
                style="width: 40px; height: 40px; background: white; color: var(--text-main); border-radius: 50%; border: 1px solid #E2E8F0; display: flex; align-items: center; justify-content: center;">2</a>
            <a href="#"
                style="width: 40px; height: 40px; background: white; color: var(--text-main); border-radius: 50%; border: 1px solid #E2E8F0; display: flex; align-items: center; justify-content: center;">3</a>
        </div>
    </div>
</section>

<?= $this->endSection() ?>