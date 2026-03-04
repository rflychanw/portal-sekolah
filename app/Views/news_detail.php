<?= $this->extend('layout') ?>

<?= $this->section('content') ?>

<!-- News Detail Hero -->
<section class="section" style="padding-top: 10rem; background: #0F172A; color: white;">
    <div class="container">
        <div style="max-width: 800px; margin: 0 auto;">
            <div style="display: flex; gap: 1rem; align-items: center; margin-bottom: 2rem;">
                <a href="<?= base_url('news') ?>"
                    style="color: #94A3B8; text-decoration: none; font-weight: 500; display: flex; align-items: center; gap: 0.5rem;">
                    <i class="fas fa-arrow-left"></i> Kembali ke Berita
                </a>
                <span style="color: #475569;">/</span>
                <span style="color: var(--primary); font-weight: 600;">Detail Artikel</span>
            </div>
            <h1 style="color: white; font-size: 3rem; line-height: 1.2; margin-bottom: 2rem;">
                <?= esc($article['title']) ?>
            </h1>

            <div
                style="display: flex; gap: 2rem; align-items: center; border-top: 1px solid #1E293B; padding-top: 2rem;">
                <div style="display: flex; align-items: center; gap: 0.75rem;">
                    <div
                        style="width: 40px; height: 40px; background: var(--primary); border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: 700; color: white;">
                        <?= substr($article['writer'] ?? 'A', 0, 1) ?>
                    </div>
                    <div>
                        <div style="font-size: 0.9rem; font-weight: 600; color: white;">
                            <?= esc($article['writer'] ?? 'Admin') ?>
                        </div>
                        <div style="font-size: 0.8rem; color: #94A3B8;">Penulis Artikel</div>
                    </div>
                </div>
                <div style="height: 30px; width: 1px; background: #1E293B;"></div>
                <div>
                    <div style="font-size: 0.8rem; color: #94A3B8; margin-bottom: 0.2rem;">Diterbitkan pada</div>
                    <div style="font-size: 0.9rem; font-weight: 600; color: white;">
                        <?= date('d F Y', strtotime($article['created_at'])) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Content Section -->
<section class="section" style="background: white; padding-top: 4rem;">
    <div class="container">
        <div style="max-width: 800px; margin: 0 auto;">
            <?php if ($article['image']): ?>
                <div
                    style="margin-bottom: 4rem; border-radius: 2rem; overflow: hidden; box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.1);">
                    <img src="<?= base_url('uploads/articles/' . $article['image']) ?>" alt="<?= esc($article['title']) ?>"
                        style="width: 100%; height: auto; display: block;">
                </div>
            <?php endif; ?>

            <div class="article-body" style="font-size: 1.15rem; line-height: 1.8; color: #334155;">
                <?php if ($article['summary']): ?>
                    <div
                        style="font-style: italic; color: #64748B; border-left: 4px solid var(--primary); padding-left: 2rem; margin-bottom: 3rem; font-size: 1.25rem;">
                        <?= esc($article['summary']) ?>
                    </div>
                <?php endif; ?>

                <?= nl2br(esc($article['content'])) ?>
            </div>

            <!-- Share / Navigation Footer -->
            <div
                style="margin-top: 5rem; padding-top: 3rem; border-top: 1px solid #E2E8F0; display: flex; justify-content: space-between; align-items: center;">
                <div style="display: flex; gap: 1rem; align-items: center;">
                    <span style="font-weight: 700; color: #1E293B;">Bagikan:</span>
                    <a href="#"
                        style="width: 40px; height: 40px; border-radius: 50%; border: 1px solid #E2E8F0; display: flex; align-items: center; justify-content: center; color: #64748B; transition: all 0.3s ease;">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#"
                        style="width: 40px; height: 40px; border-radius: 50%; border: 1px solid #E2E8F0; display: flex; align-items: center; justify-content: center; color: #64748B; transition: all 0.3s ease;">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#"
                        style="width: 40px; height: 40px; border-radius: 50%; border: 1px solid #E2E8F0; display: flex; align-items: center; justify-content: center; color: #64748B; transition: all 0.3s ease;">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                </div>
                <a href="<?= base_url('news') ?>" class="btn-cta"
                    style="font-size: 0.9rem; padding: 0.75rem 1.5rem;">Lihat Berita Lainnya</a>
            </div>
        </div>
    </div>
</section>

<style>
    .article-body p {
        margin-bottom: 2rem;
    }

    .article-body h2,
    .article-body h3 {
        color: #0F172A;
        margin: 3rem 0 1.5rem;
    }

    a[style*="border-radius: 50%"]:hover {
        background: var(--primary);
        color: white !important;
        border-color: var(--primary) !important;
        transform: translateY(-3px);
    }
</style>

<?= $this->endSection() ?>