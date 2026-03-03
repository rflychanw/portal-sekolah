<?= $this->extend('layout') ?>

<?= $this->section('content') ?>

<!-- Academics Hero -->
<section class="section"
    style="padding-top: 10rem; background: linear-gradient(135deg, #F8FAFC 0%, #E0F2FE 100%); position: relative; overflow: hidden;">
    <div class="container" style="position: relative; z-index: 2;">
        <div class="section-title" style="text-align: center;">
            <h1 style="font-size: 3.5rem; margin-bottom: 2rem;">Program Akademik Kami</h1>
            <p style="font-size: 1.25rem;">Menyediakan kurikulum komprehensif yang dirancang untuk mempersiapkan siswa
                menghadapi tantangan global dengan kompetensi dan integritas tinggi.</p>
        </div>
    </div>
    <i class="fas fa-graduation-cap"
        style="position: absolute; right: -5rem; bottom: -5rem; font-size: 30rem; color: rgba(37, 99, 235, 0.05);"></i>
</section>

<!-- Curriculum Section -->
<section class="section">
    <div class="container">
        <div class="hero-grid">
            <div class="hero-image" style="box-shadow: none; border-radius: 2rem; overflow: hidden;">
                <img src="<?= base_url('images/lab.png') ?>" alt="Lab Science"
                    style="width: 100%; height: 600px; object-fit: cover;">
            </div>
            <div class="hero-content">
                <h2 style="font-size: 2.5rem; margin-bottom: 2rem;">Kurikulum Tingkat Internasional</h2>
                <p style="margin-bottom: 2rem;">Kami menggabungkan Kurikulum Merdeka dengan standar internasional
                    Cambridge untuk memastikan siswa mendapatkan pondasi pengetahuan yang luas namun tetap memiliki
                    identitas karakter yang kuat.</p>

                <div
                    style="background: white; padding: 2rem; border-radius: 1.5rem; border: 1px solid #E2E8F0; margin-bottom: 1.5rem;">
                    <h4 style="color: var(--primary); margin-bottom: 1rem;"><i class="fas fa-microscope"
                            style="margin-right: 0.8rem;"></i> Fokus STEM</h4>
                    <p style="font-size: 0.9375rem; color: var(--text-sub);">Menekankan penguasaan Sains, Teknologi,
                        Rekayasa, dan Matematika dengan metode eksperimen langsung (hands-on learning).</p>
                </div>

                <div
                    style="background: white; padding: 2rem; border-radius: 1.5rem; border: 1px solid #E2E8F0; margin-bottom: 1.5rem;">
                    <h4 style="color: var(--primary); margin-bottom: 1rem;"><i class="fas fa-language"
                            style="margin-right: 0.8rem;"></i> Kemampuan Bahasa</h4>
                    <p style="font-size: 0.9375rem; color: var(--text-sub);">Program bilingual (Indonesia-Inggris) untuk
                        membekali siswa dengan kemampuan komunikasi lintas budaya yang lancar.</p>
                </div>

                <div style="background: white; padding: 2rem; border-radius: 1.5rem; border: 1px solid #E2E8F0;">
                    <h4 style="color: var(--primary); margin-bottom: 1rem;"><i class="fas fa-chess"
                            style="margin-right: 0.8rem;"></i> Pengembangan Karakter</h4>
                    <p style="font-size: 0.9375rem; color: var(--text-sub);">Pendidikan berbasis nilai yang menumbuhkan
                        disiplin, integritas, dan rasa empati pada sesama.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Extracurricular -->
<section class="section" style="background: #F8FAFC;">
    <div class="container">
        <div class="section-title">
            <h2>Ekstrakurikuler</h2>
            <p>Eksplorasi minat dan bakat Anda di luar ruang kelas melalui program pengembangan diri kami.</p>
        </div>
        <div class="news-grid">
            <div class="stat-card" style="padding: 3rem 2rem;">
                <i class="fas fa-basketball-ball"
                    style="font-size: 3rem; color: var(--accent); margin-bottom: 2rem;"></i>
                <h3>Olahraga</h3>
                <p style="color: var(--text-sub);">Basket, Futsal, Badminton, & Renang.</p>
            </div>
            <div class="stat-card" style="padding: 3rem 2rem;">
                <i class="fas fa-music" style="font-size: 3rem; color: var(--primary); margin-bottom: 2rem;"></i>
                <h3>Seni & Budaya</h3>
                <p style="color: var(--text-sub);">Musik, Tari, Teater, & Fotografi.</p>
            </div>
            <div class="stat-card" style="padding: 3rem 2rem;">
                <i class="fas fa-robot" style="font-size: 3rem; color: #10B981; margin-bottom: 2rem;"></i>
                <h3>Sains & Teknologi</h3>
                <p style="color: var(--text-sub);">Robotika, Coding Club, & Karya Ilmiah.</p>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>