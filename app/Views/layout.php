<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $title ?? 'Portal Sekolah' ?> | Minimalist & Elegant
    </title>
    <meta name="description"
        content="<?= $description ?? 'Portal Sekolah Minimalis dan Elegan untuk masa depan cerah' ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
</head>

<body>
    <nav id="navbar">
        <div class="container">
            <a href="<?= base_url() ?>" class="logo">
                <i class="fas fa-graduation-cap"></i>
                <span>EduPortal</span>
            </a>
            <div class="menu-btn" id="menuBtn">
                <i class="fas fa-bars"></i>
            </div>
            <ul class="nav-links" id="navLinks">
                <li><a href="<?= base_url('/') ?>"
                        class="<?= uri_string() == '' || uri_string() == '/' ? 'active' : '' ?>">Beranda</a></li>
                <li><a href="<?= base_url('about') ?>" class="<?= uri_string() == 'about' ? 'active' : '' ?>">Tentang
                        Kami</a></li>
                <li><a href="<?= base_url('academics') ?>"
                        class="<?= uri_string() == 'academics' ? 'active' : '' ?>">Akademik</a></li>
                <li><a href="<?= base_url('news') ?>" class="<?= uri_string() == 'news' ? 'active' : '' ?>">Berita</a>
                </li>
                <li><a href="<?= base_url('contact') ?>"
                        class="<?= uri_string() == 'contact' ? 'active' : '' ?>">Kontak</a></li>
                <li><a href="<?= base_url('register') ?>" class="btn-cta">Daftar Sekarang</a></li>
            </ul>
        </div>
    </nav>

    <main>
        <?= $this->renderSection('content') ?>
    </main>

    <footer>
        <div class="container">
            <div class="footer-grid">
                <div class="footer-info">
                    <div class="footer-logo">EduPortal</div>
                    <p style="color: #94A3B8; margin-bottom: 2rem;">Membentuk generasi emas dengan pendidikan
                        berkualitas, teknologi modern, dan karakter yang kuat.</p>
                    <div class="social-links" style="display: flex; gap: 1rem;">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
                <div class="footer-links">
                    <h4>Pintasan</h4>
                    <ul>
                        <li><a href="<?= base_url('about') ?>">Profil Sekolah</a></li>
                        <li><a href="<?= base_url('academics') ?>">Kurikulum</a></li>
                        <li><a href="<?= base_url('news') ?>">Berita & Acara</a></li>
                        <li><a href="<?= base_url('contact') ?>">Hubungi Kami</a></li>
                    </ul>
                </div>
                <div class="footer-links">
                    <h4>Akademik</h4>
                    <ul>
                        <li><a href="#">Penerimaan Siswa</a></li>
                        <li><a href="#">Kalender Akademik</a></li>
                        <li><a href="#">Fasilitas</a></li>
                        <li><a href="#">Ekstrakurikuler</a></li>
                    </ul>
                </div>
                <div class="footer-links">
                    <h4>Kontak</h4>
                    <ul>
                        <li style="color: #94A3B8;"><i class="fas fa-map-marker-alt"
                                style="margin-right: 0.5rem; color: var(--primary);"></i> Jl. Pendidikan No. 123,
                            Jakarta</li>
                        <li style="color: #94A3B8;"><i class="fas fa-phone"
                                style="margin-right: 0.5rem; color: var(--primary);"></i> (021) 1234-5678</li>
                        <li style="color: #94A3B8;"><i class="fas fa-envelope"
                                style="margin-right: 0.5rem; color: var(--primary);"></i> info@eduportal.sch.id</li>
                    </ul>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2024 EduPortal Sekolah. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        gsap.registerPlugin(ScrollTrigger);

        // Navbar Animation on Scroll
        window.addEventListener('scroll', () => {
            const nav = document.getElementById('navbar');
            if (window.scrollY > 50) {
                nav.style.padding = '0.5rem 0';
                nav.style.boxShadow = '0 10px 30px rgba(0,0,0,0.1)';
            } else {
                nav.style.padding = '0';
                nav.style.boxShadow = 'none';
            }
        });

        // Simple Fade In Animation for Sections
        gsap.utils.toArray('.section').forEach(section => {
            gsap.from(section, {
                opacity: 0,
                y: 50,
                duration: 1,
                scrollTrigger: {
                    trigger: section,
                    start: 'top 80%',
                    toggleActions: 'play none none none'
                }
            });
        });

        // Mobile Menu Toggle
        const menuBtn = document.getElementById('menuBtn');
        const navLinks = document.getElementById('navLinks');

        menuBtn.addEventListener('click', () => {
            navLinks.classList.toggle('active');
            const icon = menuBtn.querySelector('i');
            if (navLinks.classList.contains('active')) {
                icon.classList.remove('fa-bars');
                icon.classList.add('fa-times');
            } else {
                icon.classList.remove('fa-times');
                icon.classList.add('fa-bars');
            }
        });

        // Close menu when clicking a link
        document.querySelectorAll('.nav-links a').forEach(link => {
            link.addEventListener('click', () => {
                navLinks.classList.remove('active');
                menuBtn.querySelector('i').classList.remove('fa-times');
                menuBtn.querySelector('i').classList.add('fa-bars');
            });
        });
    </script>
</body>

</html>