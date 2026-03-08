<?= $this->extend('layout') ?>

<?= $this->section('content') ?>

<style>
    .register-container {
        padding-top: 10rem;
        padding-bottom: 6rem;
        background: linear-gradient(135deg, #F8FAFC 0%, #EFF6FF 100%);
    }

    .register-grid {
        display: grid;
        grid-template-columns: 1fr 1.5fr;
        gap: 4rem;
        align-items: start;
    }

    .register-info h1 {
        font-size: 3.5rem;
        margin-bottom: 2rem;
        line-height: 1.1;
    }

    .register-info p {
        font-size: 1.25rem;
        color: var(--text-sub);
        margin-bottom: 3rem;
    }

    .benefit-item {
        display: flex;
        gap: 1.5rem;
        margin-bottom: 2rem;
    }

    .benefit-icon {
        width: 50px;
        height: 50px;
        background: white;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--primary);
        font-size: 1.25rem;
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.05);
        flex-shrink: 0;
    }

    .register-form-card {
        background: white;
        padding: 4rem;
        border-radius: 2.5rem;
        box-shadow: 0 25px 50px -12px rgba(37, 99, 235, 0.08);
        border: 1px solid #F1F5F9;
    }

    .form-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1.5rem;
    }

    .input-field {
        margin-bottom: 2rem;
    }

    .input-field label {
        display: block;
        font-weight: 600;
        margin-bottom: 0.8rem;
        color: var(--text-main);
        font-size: 0.95rem;
    }

    .input-field input,
    .input-field select,
    .input-field textarea {
        width: 100%;
        padding: 1.1rem 1.5rem;
        border: 2px solid #F1F5F9;
        border-radius: 1rem;
        background: #F8FAFC;
        font-size: 1rem;
        transition: var(--transition);
        font-family: inherit;
    }

    .input-field input:focus,
    .input-field select:focus {
        outline: none;
        border-color: var(--primary);
        background: white;
    }

    @media (max-width: 1024px) {
        .register-grid {
            grid-template-columns: 1fr;
        }

        .register-info {
            text-align: center;
        }

        .benefit-item {
            justify-content: center;
            text-align: left;
        }
    }

    @media (max-width: 600px) {
        .form-row {
            grid-template-columns: 1fr;
        }

        .register-form-card {
            padding: 2.5rem;
        }
    }
</style>

<div class="register-container">
    <div class="container register-grid">
        <!-- Info Side -->
        <div class="register-info">
            <h1>
                <?= $settings['title'] ?? 'Bergabunglah dengan EduPortal' ?>
            </h1>
            <p>
                <?= $settings['description'] ?? 'Mulai perjalanan pendidikan terbaik Anda bersama kami. Proses pendaftaran cepat, transparan, dan terintegrasi.' ?>
            </p>

            <?php if (isset($settings['deadline']) && $settings['deadline']): ?>
                <div class="benefit-item">
                    <div class="benefit-icon"><i class="fas fa-calendar-alt"></i></div>
                    <div>
                        <h4 style="margin-bottom: 0.4rem;">Batas Pendaftaran</h4>
                        <p style="font-size: 0.9rem; color: var(--text-sub);">Silahkan daftar sebelum tanggal
                            <?= date('d F Y', strtotime($settings['deadline'])) ?>
                        </p>
                    </div>
                </div>
            <?php endif; ?>

            <div class="benefit-item">
                <div class="benefit-icon"><i class="fas fa-file-invoice"></i></div>
                <div>
                    <h4 style="margin-bottom: 0.4rem;">Pendaftaran Online</h4>
                    <p style="font-size: 0.9rem; color: var(--text-sub);">Proses formulir yang mudah tanpa perlu
                        mengantre fisik.</p>
                </div>
            </div>

            <div class="benefit-item">
                <div class="benefit-icon"><i class="fas fa-clock"></i></div>
                <div>
                    <h4 style="margin-bottom: 0.4rem;">Konfirmasi Cepat</h4>
                    <p style="font-size: 0.9rem; color: var(--text-sub);">Tim admisi kami akan merespons pendaftaran
                        dalam 1-3 hari kerja.</p>
                </div>
            </div>

            <div class="benefit-item">
                <div class="benefit-icon"><i class="fas fa-shield-alt"></i></div>
                <div>
                    <h4 style="margin-bottom: 0.4rem;">Data Aman</h4>
                    <p style="font-size: 0.9rem; color: var(--text-sub);">Informasi pribadi Anda dilindungi dengan
                        standar keamanan tinggi.</p>
                </div>
            </div>
        </div>

        <!-- Form Side -->
        <div class="register-form-card">
            <?php if (!$settings['is_open']): ?>
                <div style="text-align: center; padding: 2rem;">
                    <i class="fas fa-lock" style="font-size: 4rem; color: #cbd5e1; margin-bottom: 2rem;"></i>
                    <h2 style="margin-bottom: 1rem;">Pendaftaran Ditutup</h2>
                    <p style="color: var(--text-sub);">Mohon maaf, saat ini pendaftaran belum dibuka atau sudah berakhir.
                        Silakan kembali lagi nanti.</p>
                    <a href="/" class="btn-cta"
                        style="display: inline-block; margin-top: 2rem; text-decoration: none;">Kembali ke Beranda</a>
                </div>
            <?php else: ?>
                <h2 style="margin-bottom: 3rem; font-size: 2rem;">Formulir Pendaftaran Siswa Baru</h2>

                <?php if (session()->getFlashdata('success')): ?>
                    <div
                        style="background: #D1FAE5; color: #065F46; padding: 1rem; border-radius: 0.5rem; margin-bottom: 2rem;">
                        <?= session()->getFlashdata('success') ?>
                    </div>
                <?php endif; ?>

                <?php if (session()->getFlashdata('errors')): ?>
                    <div
                        style="background: #FEE2E2; color: #991B1B; padding: 1rem; border-radius: 0.5rem; margin-bottom: 2rem;">
                        <ul style="margin: 0; padding-left: 1rem;">
                            <?php foreach (session()->getFlashdata('errors') as $error): ?>
                                <li>
                                    <?= $error ?>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <form action="<?= base_url('register/submit') ?>" method="POST">
                    <?= csrf_field() ?>

                    <div class="input-field">
                        <label>Nama Lengkap Calon Siswa</label>
                        <input type="text" name="nama_lengkap" placeholder="Contoh: Budi Santoso"
                            value="<?= old('nama_lengkap') ?>" required>
                    </div>

                    <div class="form-row">
                        <div class="input-field">
                            <label>Tempat Lahir</label>
                            <input type="text" name="tempat_lahir" placeholder="Kota Kelahiran"
                                value="<?= old('tempat_lahir') ?>" required>
                        </div>
                        <div class="input-field">
                            <label>Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir" value="<?= old('tanggal_lahir') ?>" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="input-field">
                            <label>Jenis Kelamin</label>
                            <select name="jenis_kelamin" required>
                                <option value="">Pilih...</option>
                                <option value="L" <?= old('jenis_kelamin') == 'L' ? 'selected' : '' ?>>Laki-laki</option>
                                <option value="P" <?= old('jenis_kelamin') == 'P' ? 'selected' : '' ?>>Perempuan</option>
                            </select>
                        </div>
                        <div class="input-field">
                            <label>Jenjang yang Dituju</label>
                            <select name="jenjang" required>
                                <option value="">Pilih Jenjang...</option>
                                <option value="SMP" <?= old('jenjang') == 'SMP' ? 'selected' : '' ?>>SMP</option>
                                <option value="SMA-IPA" <?= old('jenjang') == 'SMA-IPA' ? 'selected' : '' ?>>SMA IPA</option>
                                <option value="SMA-IPS" <?= old('jenjang') == 'SMA-IPS' ? 'selected' : '' ?>>SMA IPS</option>
                            </select>
                        </div>
                    </div>

                    <div class="input-field">
                        <label>Nama Orang Tua / Wali</label>
                        <input type="text" name="nama_wali" placeholder="Nama ayah/ibu" value="<?= old('nama_wali') ?>"
                            required>
                    </div>

                    <div class="form-row">
                        <div class="input-field">
                            <label>Nomor WhatsApp</label>
                            <input type="tel" name="no_wa" placeholder="0812xxxx" value="<?= old('no_wa') ?>" required>
                        </div>
                        <div class="input-field">
                            <label>Alamat Email</label>
                            <input type="email" name="email" placeholder="email@contoh.com" value="<?= old('email') ?>"
                                required>
                        </div>
                    </div>

                    <div class="input-field">
                        <label>Alamat Rumah Lengkap</label>
                        <textarea name="alamat" rows="3" placeholder="Masukkan alamat lengkap"
                            required><?= old('alamat') ?></textarea>
                    </div>

                    <button type="submit" class="btn-cta"
                        style="width: 100%; border: none; padding: 1.3rem; font-size: 1.1rem; cursor: pointer; margin-top: 1rem;">
                        Kirim Pendaftaran Sekarang
                    </button>
                </form>
                <p style="text-align: center; margin-top: 2rem; font-size: 0.85rem; color: var(--text-sub);">
                    Dengan mengeklik tombol, Anda menyetujui kebijakan privasi dan ketentuan EduPortal.
                </p>
            <?php endif; ?>
        </div>
    </div>
</div>
</div>
</div>

<?= $this->endSection() ?>