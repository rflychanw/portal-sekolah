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
            <h1>Bergabunglah dengan EduPortal</h1>
            <p>Mulai perjalanan pendidikan terbaik Anda bersama kami. Proses pendaftaran cepat, transparan, dan
                terintegrasi.</p>

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
            <h2 style="margin-bottom: 3rem; font-size: 2rem;">Formulir Pendaftaran Siswa Baru</h2>
            <form action="#" method="POST">

                <div class="input-field">
                    <label>Nama Lengkap Calon Siswa</label>
                    <input type="text" placeholder="Contoh: Budi Santoso" required>
                </div>

                <div class="form-row">
                    <div class="input-field">
                        <label>Tempat Lahir</label>
                        <input type="text" placeholder="Kota Kelahiran" required>
                    </div>
                    <div class="input-field">
                        <label>Tanggal Lahir</label>
                        <input type="date" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="input-field">
                        <label>Jenis Kelamin</label>
                        <select required>
                            <option value="">Pilih...</option>
                            <option value="L">Laki-laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>
                    <div class="input-field">
                        <label>Jenjang yang Dituju</label>
                        <select required>
                            <option value="">Pilih Jenjang...</option>
                            <option value="SMP">SMP / Middle School</option>
                            <option value="SMA-IPA">SMA IPA / High School Science</option>
                            <option value="SMA-IPS">SMA IPS / High School Social</option>
                        </select>
                    </div>
                </div>

                <div class="input-field">
                    <label>Nama Orang Tua / Wali</label>
                    <input type="text" placeholder="Nama ayah/ibu" required>
                </div>

                <div class="form-row">
                    <div class="input-field">
                        <label>Nomor WhatsApp</label>
                        <input type="tel" placeholder="0812xxxx" required>
                    </div>
                    <div class="input-field">
                        <label>Alamat Email</label>
                        <input type="email" placeholder="email@contoh.com" required>
                    </div>
                </div>

                <div class="input-field">
                    <label>Alamat Rumah Lengkap</label>
                    <textarea rows="3" placeholder="Masukkan alamat lengkap" required></textarea>
                </div>

                <button type="submit" class="btn-cta"
                    style="width: 100%; border: none; padding: 1.3rem; font-size: 1.1rem; cursor: pointer; margin-top: 1rem;">
                    Kirim Pendaftaran Sekarang
                </button>
            </form>
            <p style="text-align: center; margin-top: 2rem; font-size: 0.85rem; color: var(--text-sub);">
                Dengan mengeklik tombol, Anda menyetujui kebijakan privasi dan ketentuan EduPortal.
            </p>
        </div>
    </div>
</div>

<?= $this->endSection() ?>