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
<section id="curriculum" class="section">
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

                <?php foreach ($programs as $prog): ?>
                    <div
                        style="background: white; padding: 2rem; border-radius: 1.5rem; border: 1px solid #E2E8F0; margin-bottom: 1.5rem;">
                        <h4 style="color: var(--primary); margin-bottom: 1rem;"><i class="<?= $prog['icon'] ?>"
                                style="margin-right: 0.8rem;"></i> <?= $prog['title'] ?></h4>
                        <p style="font-size: 0.9375rem; color: var(--text-sub);"><?= $prog['description'] ?></p>
                        <a href="<?= base_url('program/' . $prog['slug']) ?>"
                            style="display: inline-block; padding: 0.6rem 1.5rem; background: var(--primary); color: white; border-radius: 50px; text-decoration: none; font-weight: 600; font-size: 0.85rem; margin-top: 1rem; transition: 0.3s;">
                            Selengkapnya
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>

<!-- Extracurricular -->
<section id="extracurricular" class="section" style="background: #F8FAFC;">
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

<!-- Academic Calendar Section -->
<section id="calendar" class="section">
    <div class="container">
        <div class="section-title">
            <h2>Kalender Akademik</h2>
            <p>Jadwal kegiatan penting sekolah selama tahun ajaran berlangsung.</p>
        </div>

        <div
            style="background: white; padding: 2.5rem; border-radius: 2rem; border: 1px solid #E2E8F0; box-shadow: 0 10px 30px rgba(0,0,0,0.05);">
            <!-- FullCalendar Container -->
            <div id='public-calendar' style="min-height: 500px;"></div>

            <div style="margin-top: 3rem;">
                <h3 style="margin-bottom: 2rem; font-size: 1.5rem;">Kegiatan Mendatang</h3>
                <div class="news-grid" style="grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));">
                    <?php if (empty($events)): ?>
                        <p style="text-align: center; grid-column: 1/-1; color: var(--text-sub); padding: 2rem;">Tidak ada
                            kegiatan terdekat.</p>
                    <?php else: ?>
                        <?php foreach (array_slice($events, 0, 3) as $event): ?>
                            <div
                                style="background: #F8FAFC; padding: 2rem; border-radius: 1.5rem; border-left: 5px solid <?= $event['color'] ?>;">
                                <div style="color: var(--primary); font-weight: 700; margin-bottom: 0.5rem;">
                                    <?= date('d M Y', strtotime($event['start_date'])) ?>
                                    <?= $event['end_date'] ? ' - ' . date('d M Y', strtotime($event['end_date'])) : '' ?>
                                </div>
                                <h4 style="font-size: 1.25rem; margin-bottom: 1rem;"><?= $event['title'] ?></h4>
                                <p style="font-size: 0.9375rem; color: var(--text-sub);"><?= $event['description'] ?></p>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FullCalendar for Public View -->
<link href='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.css' rel='stylesheet' />
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js'></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const calendarEl = document.getElementById('public-calendar');
        if (calendarEl) {
            const calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                locale: 'id',
                height: 'auto',
                events: [
                    <?php foreach ($events as $event): ?>
                                {
                            title: '<?= htmlspecialchars($event['title']) ?>',
                            start: '<?= $event['start_date'] ?>',
                            end: '<?= $event['end_date'] ? date('Y-m-d', strtotime($event['end_date'] . ' +1 day')) : $event['start_date'] ?>',
                            backgroundColor: '<?= $event['color'] ?>',
                            borderColor: '<?= $event['color'] ?>',
                        },
                    <?php endforeach; ?>
                ]
            });
            calendar.render();
        }
    });
</script>

<?= $this->endSection() ?>