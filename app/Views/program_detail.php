<?= $this->extend('layout') ?>

<?= $this->section('content') ?>

<style>
    .detail-hero {
        background: linear-gradient(135deg, var(--primary) 0%, #1E40AF 100%);
        padding: 8rem 0 4rem;
        color: white;
        text-align: center;
    }

    .detail-container {
        max-width: 900px;
        margin: -4rem auto 4rem;
        background: white;
        border-radius: 2rem;
        padding: 3rem;
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.05);
        border: 1px solid #F1F5F9;
    }

    .program-image {
        width: 100%;
        height: 400px;
        object-fit: cover;
        border-radius: 1.5rem;
        margin-bottom: 2rem;
    }

    .content-area {
        line-height: 1.8;
        color: var(--text-main);
        font-size: 1.1rem;
    }

    .achievement-card {
        background: #F8FAFC;
        padding: 2rem;
        border-radius: 1.5rem;
        border-left: 5px solid var(--primary);
        margin-bottom: 1.5rem;
    }

    .back-btn {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        color: white;
        text-decoration: none;
        margin-bottom: 2rem;
        opacity: 0.8;
        transition: 0.3s;
    }

    .back-btn:hover {
        opacity: 1;
        transform: translateX(-5px);
    }
</style>

<section class="detail-hero">
    <div class="container">
        <a href="javascript:history.back()" class="back-btn"><i class="fas fa-arrow-left"></i> Kembali</a>
        <h1 style="font-size: 3rem; font-weight: 800; margin-bottom: 1rem;">
            <?= $program['title'] ?>
        </h1>
        <p style="font-size: 1.2rem; opacity: 0.9; max-width: 600px; margin: 0 auto;">
            <?= $program['description'] ?>
        </p>
    </div>
</section>

<div class="container">
    <div class="detail-container">
        <?php if ($program['image']): ?>
            <img src="<?= base_url($program['image']) ?>" class="program-image" alt="<?= $program['title'] ?>">
        <?php else: ?>
            <div
                style="width: 100%; height: 200px; background: #F1F5F9; border-radius: 1.5rem; display: flex; align-items: center; justify-content: center; margin-bottom: 2rem; color: #94A3B8;">
                <i class="<?= $program['icon'] ?> fa-3x"></i>
            </div>
        <?php endif; ?>

        <div class="content-area">
            <?= $program['content'] ?>
        </div>

        <?php if (!empty($achievements)): ?>
            <div style="margin-top: 4rem;">
                <h3 style="margin-bottom: 2rem; font-weight: 800; display: flex; align-items: center; gap: 1rem;">
                    <i class="fas fa-trophy" style="color: #F59E0B;"></i> Prestasi
                    <?= $program['title'] ?>
                </h3>
                <div style="display: grid; gap: 1.5rem;">
                    <?php foreach ($achievements as $ach): ?>
                        <div class="achievement-card" style="border-left-color: <?= $ach['color'] ?>;">
                            <div style="font-weight: 700; color: <?= $ach['color'] ?>; margin-bottom: 0.5rem;">
                                <?= $ach['date_event'] ?>
                            </div>
                            <h4 style="font-size: 1.2rem; margin-bottom: 0.5rem;">
                                <?= $ach['title'] ?>
                            </h4>
                            <p style="color: var(--text-sub); font-size: 0.95rem;">
                                <?= $ach['description'] ?>
                            </p>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>

<?= $this->endSection() ?>