<?= $this->extend('layout') ?>

<?= $this->section('content') ?>

<!-- Curriculum Hero -->
<section class="section"
    style="padding-top: 10rem; background: linear-gradient(135deg, #F8FAFC 0%, #E0F2FE 100%); position: relative; overflow: hidden;">
    <div class="container" style="position: relative; z-index: 2;">
        <div class="section-title" style="text-align: center;">
            <span
                style="color: var(--primary); font-weight: 700; text-transform: uppercase; letter-spacing: 2px; font-size: 0.9rem; margin-bottom: 1rem; display: block;">Akademik</span>
            <h1 style="font-size: 3.5rem; margin-bottom: 2rem;">Kurikulum Sekolah</h1>
            <p style="font-size: 1.25rem; max-width: 800px; margin: 0 auto;">Pendidikan berkualitas dengan standar
                internasional yang dirancang untuk membekali setiap siswa dengan kecakapan intelektual dan karakter.</p>
        </div>
    </div>
    <i class="fas fa-book-open"
        style="position: absolute; right: -5rem; bottom: -5rem; font-size: 30rem; color: rgba(37, 99, 235, 0.05);"></i>
</section>

<!-- Curriculum Detail -->
<section class="section">
    <div class="container">
        <div class="hero-grid">
            <div class="hero-image" style="box-shadow: none; border-radius: 2rem; overflow: hidden;">
                <img src="<?= base_url('images/lab.png') ?>" alt="Learning Lab"
                    style="width: 100%; height: 600px; object-fit: cover;">
            </div>
            <div class="hero-content">
                <h2 style="font-size: 2.5rem; margin-bottom: 2rem;">Standar Pembelajaran Terpadu</h2>
                <p style="margin-bottom: 2rem;">Kami menggabungkan Kurikulum Merdeka yang menekankan fleksibilitas dan
                    pengembangan karakter dengan standar internasional Cambridge untuk memastikan siswa siap bersaing
                    secara global.</p>

                <div style="background: white; padding: 2rem; border-radius: 1.5rem; border: 1px solid #E2E8F0; margin-bottom: 1.5rem; transition: all 0.3s ease;"
                    class="hover-card">
                    <h4 style="color: var(--primary); margin-bottom: 1rem;"><i class="fas fa-microscope"
                            style="margin-right: 0.8rem;"></i> Fokus STEM & ICT</h4>
                    <p style="font-size: 0.9375rem; color: var(--text-sub);">Menekankan penguasaan Sains, Teknologi,
                        Rekayasa, dan Matematika dengan fasilitas laboratorium komputer dan sains tercanggih.</p>
                </div>

                <div style="background: white; padding: 2rem; border-radius: 1.5rem; border: 1px solid #E2E8F0; margin-bottom: 1.5rem; transition: all 0.3s ease;"
                    class="hover-card">
                    <h4 style="color: var(--primary); margin-bottom: 1rem;"><i class="fas fa-language"
                            style="margin-right: 0.8rem;"></i> Kemampuan Bilingual</h4>
                    <p style="font-size: 0.9375rem; color: var(--text-sub);">Setiap mata pelajaran inti disampaikan
                        dalam dua bahasa (Indonesia-Inggris) untuk melatih fasilitasi komunikasi global.</p>
                </div>

                <div style="background: white; padding: 2rem; border-radius: 1.5rem; border: 1px solid #E2E8F0; transition: all 0.3s ease;"
                    class="hover-card">
                    <h4 style="color: var(--primary); margin-bottom: 1rem;"><i class="fas fa-project-diagram"
                            style="margin-right: 0.8rem;"></i> Project-Based Learning</h4>
                    <p style="font-size: 0.9375rem; color: var(--text-sub);">Pembelajaran berbasis proyek yang
                        merangsang daya kritis, kreativitas, dan kerja sama tim antar siswa.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Academic Achievements -->
<section class="section" style="background: #F8FAFC;">
    <div class="container">
        <div class="section-title">
            <h2>Prestasi Akademik</h2>
            <p>Pencapaian gemilang siswa-siswi kami dalam bidang sains, teknologi, dan kompetensi intelektual lainnya.
            </p>
        </div>

        <div class="news-grid">
            <div class="news-card">
                <div style="padding: 3rem; text-align: center;">
                    <div style="font-size: 3rem; color: #F59E0B; margin-bottom: 1.5rem;"><i class="fas fa-trophy"></i>
                    </div>
                    <span
                        style="font-size: 0.8rem; font-weight: 700; color: var(--primary); text-transform: uppercase;">Maret
                        2024</span>
                    <h3 style="margin-top: 1rem;">Juara 1 Olimpiade Matematika Nasional</h3>
                    <p style="color: var(--text-sub); margin-top: 1rem;">Mendapatkan medali emas di tingkat nasional
                        bersaing dengan 500 sekolah terbaik.</p>
                </div>
            </div>
            <div class="news-card">
                <div style="padding: 3rem; text-align: center;">
                    <div style="font-size: 3rem; color: #94A3B8; margin-bottom: 1.5rem;"><i class="fas fa-award"></i>
                    </div>
                    <span
                        style="font-size: 0.8rem; font-weight: 700; color: var(--primary); text-transform: uppercase;">Februari
                        2024</span>
                    <h3 style="margin-top: 1rem;">Finalis International Science Fair</h3>
                    <p style="color: var(--text-sub); margin-top: 1rem;">Penelitian tentang energi terbarukan berhasil
                        masuk ke jajaran 10 besar dunia di Singapura.</p>
                </div>
            </div>
            <div class="news-card">
                <div style="padding: 3rem; text-align: center;">
                    <div style="font-size: 3rem; color: #CD7F32; margin-bottom: 1.5rem;"><i class="fas fa-medal"></i>
                    </div>
                    <span
                        style="font-size: 0.8rem; font-weight: 700; color: var(--primary); text-transform: uppercase;">Januari
                        2024</span>
                    <h3 style="margin-top: 1rem;">Juara Harapan 1 National Coding Cup</h3>
                    <p style="color: var(--text-sub); margin-top: 1rem;">Siswa kami terpilih sebagai developer muda
                        berbakat dengan aplikasi solusi lingkungan.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    .hover-card:hover {
        border-color: var(--primary) !important;
        transform: translateX(10px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.05);
    }
</style>

<?= $this->endSection() ?>