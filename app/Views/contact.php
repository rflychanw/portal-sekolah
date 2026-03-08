<?= $this->extend('layout') ?>

<?= $this->section('content') ?>

<!-- Contact Hero -->
<section class="section" style="padding-top: 10rem; background: linear-gradient(135deg, #F8FAFC 0%, #DBEAFE 100%);">
    <div class="container">
        <div class="section-title">
            <h1 style="font-size: 3.5rem; margin-bottom: 2rem;">Hubungi Kami</h1>
            <p>Kami di sini untuk membantu Anda. Silakan hubungi kami untuk pertanyaan, masukan, atau informasi
                pendaftaran.</p>
        </div>
    </div>
</section>

<!-- Contact Form and Map -->
<section class="section">
    <div class="container">
        <div class="hero-grid">
            <!-- Form -->
            <div
                style="background: white; border-radius: 2rem; padding: 4rem; box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.05); border: 1px solid #F1F5F9;">
                <h2 style="margin-bottom: 3rem;">Kirim Pesan</h2>

                <?php if (session()->getFlashdata('success')): ?>
                    <div
                        style="background: #D1FAE5; color: #065F46; padding: 1rem; border-radius: 0.8rem; margin-bottom: 2rem;">
                        <?= session()->getFlashdata('success') ?>
                    </div>
                <?php endif; ?>

                <?php if (session()->getFlashdata('errors')): ?>
                    <div
                        style="background: #FEE2E2; color: #991B1B; padding: 1rem; border-radius: 0.8rem; margin-bottom: 2rem;">
                        <ul style="margin: 0; padding-left: 1rem;">
                            <?php foreach (session()->getFlashdata('errors') as $error): ?>
                                <li><?= $error ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <form action="<?= base_url('contact/submit') ?>" method="post">
                    <?= csrf_field() ?>
                    <div style="margin-bottom: 2rem;">
                        <label
                            style="display: block; font-weight: 500; margin-bottom: 0.5rem; color: var(--text-sub);">Nama
                            Lengkap</label>
                        <input type="text" name="name" placeholder="Masukkan nama Anda" value="<?= old('name') ?>"
                            style="width: 100%; border: 1px solid #E2E8F0; padding: 1rem 1.5rem; border-radius: 0.8rem; background: #F8FAFC; font-size: 1rem; color: var(--text-main); transition: var(--transition);"
                            onfocus="this.style.borderColor='var(--primary)'; this.style.outline='none'"
                            onblur="this.style.borderColor='#E2E8F0'" required>
                    </div>
                    <div style="margin-bottom: 2rem;">
                        <label
                            style="display: block; font-weight: 500; margin-bottom: 0.5rem; color: var(--text-sub);">Alamat
                            Email</label>
                        <input type="email" name="email" placeholder="contoh@email.com" value="<?= old('email') ?>"
                            style="width: 100%; border: 1px solid #E2E8F0; padding: 1rem 1.5rem; border-radius: 0.8rem; background: #F8FAFC; font-size: 1rem; color: var(--text-main); transition: var(--transition);"
                            onfocus="this.style.borderColor='var(--primary)'; this.style.outline='none'"
                            onblur="this.style.borderColor='#E2E8F0'" required>
                    </div>
                    <div style="margin-bottom: 2rem;">
                        <label
                            style="display: block; font-weight: 500; margin-bottom: 0.5rem; color: var(--text-sub);">Subjek</label>
                        <select name="subject"
                            style="width: 100%; border: 1px solid #E2E8F0; padding: 1rem 1.5rem; border-radius: 0.8rem; background: #F8FAFC; font-size: 1rem; color: var(--text-main); transition: var(--transition);"
                            onfocus="this.style.borderColor='var(--primary)'; this.style.outline='none'"
                            onblur="this.style.borderColor='#E2E8F0'" required>
                            <option value="pendaftaran" <?= old('subject') == 'pendaftaran' ? 'selected' : '' ?>>
                                Pendaftaran Baru</option>
                            <option value="pertanyaan" <?= old('subject') == 'pertanyaan' ? 'selected' : '' ?>>Informasi
                                Umum</option>
                            <option value="kerjasama" <?= old('subject') == 'kerjasama' ? 'selected' : '' ?>>Kemitraan &
                                Kerjasama</option>
                            <option value="lainnya" <?= old('subject') == 'lainnya' ? 'selected' : '' ?>>Lainnya</option>
                        </select>
                    </div>
                    <div style="margin-bottom: 3rem;">
                        <label
                            style="display: block; font-weight: 500; margin-bottom: 0.5rem; color: var(--text-sub);">Pesan
                            Anda</label>
                        <textarea name="message" placeholder="Bagaimana kami bisa membantu?"
                            style="width: 100%; border: 1px solid #E2E8F0; padding: 1rem 1.5rem; border-radius: 0.8rem; background: #F8FAFC; font-size: 1rem; color: var(--text-main); transition: var(--transition); min-height: 150px; resize: vertical;"
                            onfocus="this.style.borderColor='var(--primary)'; this.style.outline='none'"
                            onblur="this.style.borderColor='#E2E8F0'" required><?= old('message') ?></textarea>
                    </div>
                    <button type="submit" class="btn-cta" style="width: 100%; border: none; cursor: pointer;">Kirim
                        Pesan Sekarang</button>
                </form>
            </div>

            <!-- Map Placeholder & Addresses -->
            <div style="padding-left: 2rem;">
                <div style="margin-bottom: 4rem;">
                    <h2 style="margin-bottom: 2rem;">Lokasi Sekolah</h2>
                    <div
                        style="width: 100%; height: 350px; background: #E2E8F0; border-radius: 2rem; display: flex; align-items: center; justify-content: center; position: relative; overflow: hidden; border: 1px solid #E2E8F0;">
                        <i class="fas fa-map-marked-alt" style="font-size: 5rem; color: #94A3B8;"></i>
                        <p
                            style="position: absolute; bottom: 2rem; background: var(--glass); padding: 1rem 2rem; border-radius: 50px; backdrop-filter: blur(5px); font-weight: 500;">
                            Jakarta Selatan, Indonesia</p>
                    </div>
                </div>

                <h2 style="margin-bottom: 2rem;">Detail Kontak</h2>
                <div style="display: grid; grid-template-columns: 1fr; gap: 2rem;">
                    <div style="display: flex; gap: 1.5rem; align-items: flex-start;">
                        <div
                            style="width: 50px; height: 50px; background: #EFF6FF; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: var(--primary); font-size: 1.25rem; flex-shrink: 0;">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div>
                            <h4 style="margin-bottom: 0.5rem;">Alamat Sekolah</h4>
                            <p style="color: var(--text-sub);">Jl. Pendidikan No. 123, Kebayoran Baru, Jakarta Selatan,
                                12150.</p>
                        </div>
                    </div>
                    <div style="display: flex; gap: 1.5rem; align-items: flex-start;">
                        <div
                            style="width: 50px; height: 50px; background: #EFF6FF; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: var(--primary); font-size: 1.25rem; flex-shrink: 0;">
                            <i class="fas fa-phone"></i>
                        </div>
                        <div>
                            <h4 style="margin-bottom: 0.5rem;">Nomor Telepon</h4>
                            <p style="color: var(--text-sub);">(021) 1234-5678</p>
                            <p style="color: var(--text-sub);">(021) 8765-4321</p>
                        </div>
                    </div>
                    <div style="display: flex; gap: 1.5rem; align-items: flex-start;">
                        <div
                            style="width: 50px; height: 50px; background: #EFF6FF; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: var(--primary); font-size: 1.25rem; flex-shrink: 0;">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div>
                            <h4 style="margin-bottom: 0.5rem;">Alamat Email</h4>
                            <p style="color: var(--text-sub);">info@eduportal.sch.id</p>
                            <p style="color: var(--text-sub);">admisi@eduportal.sch.id</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>