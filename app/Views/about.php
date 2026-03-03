<?= $this->extend('layout') ?>

<?= $this->section('content') ?>

<!-- Hero Section About -->
<section class="section" style="padding-top: 10rem; background: linear-gradient(135deg, #F8FAFC 0%, #EFF6FF 100%);">
    <div class="container">
        <div class="section-title" style="text-align: left;">
            <h1 style="font-size: 3.5rem; margin-bottom: 2rem;">Tentang Kami</h1>
            <p style="text-align: left; max-width: 800px; font-size: 1.25rem;">Membangun masa depan melalui pendidikan
                yang inovatif dan berorientasi pada pembangunan karakter yang kuat.</p>
        </div>
    </div>
</section>

<!-- Vision & Mission -->
<section class="section">
    <div class="container">
        <div class="hero-grid">
            <div class="hero-content">
                <h2 style="font-size: 2.5rem; margin-bottom: 1.5rem;">Visi Kami</h2>
                <p style="font-size: 1.125rem; margin-bottom: 2rem;">"Menjadi lembaga pendidikan terkemuka yang mencetak
                    generasi religius, cerdas, kreatif, dan mandiri dengan standar internasional."</p>
                <h2 style="font-size: 2.5rem; margin-bottom: 1.5rem;">Misi Kami</h2>
                <ul style="list-style: none; padding: 0;">
                    <li style="margin-bottom: 1.5rem; display: flex; gap: 1rem;">
                        <i class="fas fa-check-circle" style="color: var(--primary); font-size: 1.5rem;"></i>
                        <span>Melaksanakan pembelajaran berkualitas berbasis teknologi terkini.</span>
                    </li>
                    <li style="margin-bottom: 1.5rem; display: flex; gap: 1rem;">
                        <i class="fas fa-check-circle" style="color: var(--primary); font-size: 1.5rem;"></i>
                        <span>Menumbuhkembangkan karakter religius dan etika yang kuat.</span>
                    </li>
                    <li style="margin-bottom: 1.5rem; display: flex; gap: 1rem;">
                        <i class="fas fa-check-circle" style="color: var(--primary); font-size: 1.5rem;"></i>
                        <span>Memfasilitasi pengembangan minat dan bakat melalui program ekstrakurikuler yang
                            beragam.</span>
                    </li>
                </ul>
            </div>
            <div class="hero-image"
                style="box-shadow: none; display: flex; align-items: center; justify-content: center; background: white; padding: 2rem; border-radius: 2rem; border: 1px solid #E2E8F0;">
                <i class="fas fa-bullseye" style="font-size: 15rem; color: #E0F2FE;"></i>
            </div>
        </div>
    </div>
</section>

<!-- History Section -->
<section class="section" style="background: #0F172A; color: white;">
    <div class="container">
        <div class="section-title">
            <h2 style="color: white;">Sejarah Singkat</h2>
            <p style="color: #94A3B8;">Didirikan pada tahun 1995, EduPortal telah tumbuh dari sekolah sederhana menjadi
                pusat pendidikan modern.</p>
        </div>
        <div style="max-width: 900px; margin: 0 auto; line-height: 2;">
            <p style="margin-bottom: 2rem;">Sejak awal berdiri, kami selalu berkomitmen untuk memberikan yang terbaik
                bagi para siswa. Berawal dengan hanya 50 murid, kini kami bangga melayani lebih dari 1500 siswa setiap
                tahunnya. Transformasi digital yang kami lakukan pada tahun 2018 telah membawa standard baru dalam
                efisiensi administrasi dan efektivitas pembelajaran.</p>
            <p>Hingga saat ini, ribuan alumni kami telah tersebar di berbagai universitas terbaik, baik di dalam maupun
                luar negeri, membuktikan kualitas pendidikan yang konsisten selama hampir tiga dekade.</p>
        </div>
    </div>
</section>

<!-- Leaders Section -->
<section class="section">
    <div class="container">
        <div class="section-title">
            <h2>Kepemimpinan Sekolah</h2>
            <p>Dipandu oleh para ahli pendidikan yang berdedikasi tinggi.</p>
        </div>
        <div class="news-grid">
            <div class="news-card" style="text-align: center; padding: 3rem 2rem;">
                <div
                    style="width: 150px; height: 150px; background: #E2E8F0; border-radius: 50%; margin: 0 auto 2rem; overflow: hidden;">
                    <div
                        style="width: 100%; height: 100%; display: flex; align-items: center; justify-content: center;">
                        <i class="fas fa-user-tie" style="font-size: 5rem; color: #94A3B8;"></i>
                    </div>
                </div>
                <h3>Drs. Ahmad Santoso</h3>
                <p style="color: var(--primary); font-weight: 600; margin-bottom: 1rem;">Kepala Sekolah</p>
                <p style="font-size: 0.9375rem; color: var(--text-sub);">"Kami berfokus pada hasil yang terukur dan
                    pengembangan karakter sebagai prioritas utama."</p>
            </div>
            <div class="news-card" style="text-align: center; padding: 3rem 2rem;">
                <div
                    style="width: 150px; height: 150px; background: #E2E8F0; border-radius: 50%; margin: 0 auto 2rem; overflow: hidden;">
                    <div
                        style="width: 100%; height: 100%; display: flex; align-items: center; justify-content: center;">
                        <i class="fas fa-user-tie" style="font-size: 5rem; color: #94A3B8;"></i>
                    </div>
                </div>
                <h3>Dr. Siti Aminah</h3>
                <p style="color: var(--primary); font-weight: 600; margin-bottom: 1rem;">Wakil Bidang Kurikulum</p>
                <p style="font-size: 0.9375rem; color: var(--text-sub);">"Kurikulum yang relevan dengan masa depan
                    adalah kunci kesuksesan siswa kami."</p>
            </div>
            <div class="news-card" style="text-align: center; padding: 3rem 2rem;">
                <div
                    style="width: 150px; height: 150px; background: #E2E8F0; border-radius: 50%; margin: 0 auto 2rem; overflow: hidden;">
                    <div
                        style="width: 100%; height: 100%; display: flex; align-items: center; justify-content: center;">
                        <i class="fas fa-user-tie" style="font-size: 5rem; color: #94A3B8;"></i>
                    </div>
                </div>
                <h3>Budi Pratama, M.Pd</h3>
                <p style="color: var(--primary); font-weight: 600; margin-bottom: 1rem;">Ketua Komite Sekolah</p>
                <p style="font-size: 0.9375rem; color: var(--text-sub);">"Kolaborasi antara sekolah dan orang tua adalah
                    fondasi ekosistem pendidikan kami."</p>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>