<?= $this->extend('layout') ?>

<?= $this->section('content') ?>

<!-- Extracurricular Hero -->
<section class="section"
    style="padding-top: 10rem; background: linear-gradient(135deg, #ECFDF5 0%, #D1FAE5 100%); position: relative; overflow: hidden;">
    <div class="container" style="position: relative; z-index: 2;">
        <div class="section-title" style="text-align: center;">
            <span
                style="color: #059669; font-weight: 700; text-transform: uppercase; letter-spacing: 2px; font-size: 0.9rem; margin-bottom: 1rem; display: block;">Kegiatan
                Siswa</span>
            <h1 style="font-size: 3.5rem; margin-bottom: 2rem;">Ekstrakurikuler</h1>
            <p style="font-size: 1.25rem; max-width: 800px; margin: 0 auto;">Wadah bagi siswa untuk mengeksplorasi
                minat, mengembangkan bakat, dan mengasah jiwa kepemimpinan di luar kegiatan akademik.</p>
        </div>
    </div>
    <i class="fas fa-basketball-ball"
        style="position: absolute; right: -5rem; bottom: -5rem; font-size: 30rem; color: rgba(5, 150, 105, 0.05);"></i>
</section>

<!-- Club Categories -->
<section class="section">
    <div class="container">
        <div class="section-title">
            <h2>Klub Minat & Bakat</h2>
            <p>Pilih komunitas yang sesuai dengan passion Anda dan kembangkan potensi diri secara maksimal.</p>
        </div>

        <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 2.5rem; margin-top: 4rem;">
            <?php foreach ($clubs as $club): ?>
                <div class="activity-card"
                    style="background: white; border-radius: 2rem; padding: 3rem; text-align: center; border: 1px solid #F1F5F9; transition: all 0.3s ease;">
                    <div
                        style="width: 80px; height: 80px; background: #F8FAFC; color: var(--primary); border-radius: 20px; display: flex; align-items: center; justify-content: center; margin: 0 auto 2rem; font-size: 2rem;">
                        <i class="<?= $club['icon'] ?>"></i>
                    </div>
                    <h3><?= $club['title'] ?></h3>
                    <p style="color: var(--text-sub); margin-top: 1rem; margin-bottom: 2rem;"><?= $club['description'] ?>
                    </p>
                    <div style="display: flex; flex-wrap: wrap; justify-content: center; gap: 0.5rem; margin-bottom: 2rem;">
                        <?php if ($club['tags']): ?>
                            <?php foreach (explode(',', $club['tags']) as $tag): ?>
                                <span class="tag"><?= trim($tag) ?></span>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                    <a href="<?= base_url('program/' . $club['slug']) ?>"
                        style="display: inline-block; padding: 0.8rem 2rem; background: var(--primary); color: white; border-radius: 50px; text-decoration: none; font-weight: 600; font-size: 0.9rem; transition: 0.3s;">
                        Lihat Detail
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Extra Achievements -->
<section class="section" style="background: #0F172A; color: white;">
    <div class="container">
        <div class="section-title">
            <h2 style="color: white;">Prestasi Ekstrakurikuler</h2>
            <p style="color: #94A3B8;">Kebanggaan sekolah dari berbagai kompetisi non-akademik di tingkat regional
                maupun internasional.</p>
        </div>

        <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 3rem; margin-top: 4rem;">
            <?php foreach ($achievements as $ach): ?>
                <div
                    style="display: flex; gap: 2rem; align-items: flex-start; background: rgba(255,255,255,0.05); padding: 2.5rem; border-radius: 2rem; border: 1px solid rgba(255,255,255,0.1);">
                    <div style="font-size: 3rem; color: <?= $ach['color'] ?>;"><i class="<?= $ach['icon'] ?>"></i></div>
                    <div>
                        <h4 style="font-size: 1.25rem; margin-bottom: 0.5rem;"><?= $ach['title'] ?></h4>
                        <p style="color: #94A3B8; font-size: 0.95rem;"><?= $ach['description'] ?></p>
                        <div style="margin-top: 1rem; font-weight: 700; color: #059669;"><?= $ach['date_event'] ?></div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<style>
    .activity-card:hover {
        transform: translateY(-10px);
        border-color: #059669 !important;
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.05);
    }

    .tag {
        background: #F1F5F9;
        color: #475569;
        padding: 0.4rem 0.8rem;
        border-radius: 50px;
        font-size: 0.8rem;
        font-weight: 600;
    }

    @media (max-width: 900px) {

        div[style*="grid-template-columns: repeat(3, 1fr)"],
        div[style*="grid-template-columns: repeat(2, 1fr)"] {
            grid-template-columns: 1fr !important;
        }
    }
</style>

<?= $this->endSection() ?>