<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $title ?? 'Dashboard' ?> | Portal Guru
    </title>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --sidebar-width: 280px;
            --primary: #059669;
            --primary-dark: #047857;
            --primary-light: #D1FAE5;
            --bg-light: #F0FDF4;
            --text-main: #0F172A;
            --text-sub: #64748B;
            --border: #E2E8F0;
            --white: #FFFFFF;
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Outfit', sans-serif;
        }

        body {
            background-color: var(--bg-light);
            color: var(--text-main);
            overflow-x: hidden;
        }

        /* Sidebar */
        .sidebar {
            width: var(--sidebar-width);
            height: 100vh;
            background: var(--white);
            position: fixed;
            left: 0;
            top: 0;
            border-right: 1px solid var(--border);
            z-index: 1000;
            padding: 2rem 1.5rem;
            display: flex;
            flex-direction: column;
        }

        .sidebar-logo {
            font-size: 1.5rem;
            font-weight: 800;
            color: var(--primary);
            margin-bottom: 3rem;
            display: flex;
            align-items: center;
            gap: 0.8rem;
            padding: 0 0.5rem;
        }

        .nav-menu {
            list-style: none;
            flex-grow: 1;
        }

        .nav-item {
            margin-bottom: 0.5rem;
        }

        .nav-link {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 1rem 1.25rem;
            color: var(--text-sub);
            text-decoration: none;
            font-weight: 500;
            border-radius: 12px;
            transition: var(--transition);
        }

        .nav-link:hover,
        .nav-link.active {
            background: var(--primary-light);
            color: var(--primary);
        }

        .nav-link i {
            font-size: 1.25rem;
            width: 25px;
            text-align: center;
        }

        .sidebar-footer {
            margin-top: auto;
            border-top: 1px solid var(--border);
            padding-top: 1.5rem;
        }

        .user-pill {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 1rem;
            background: var(--bg-light);
            border-radius: 16px;
            margin-bottom: 1.5rem;
        }

        .user-avatar {
            width: 45px;
            height: 45px;
            border-radius: 14px;
            object-fit: cover;
        }

        .user-avatar-placeholder {
            width: 45px;
            height: 45px;
            background: linear-gradient(135deg, #059669, #10B981);
            color: white;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 1.1rem;
        }

        .btn-logout {
            width: 100%;
            padding: 1rem;
            border: 1px solid #FEE2E2;
            background: #FFF5F5;
            color: #DC2626;
            border-radius: 12px;
            text-decoration: none;
            font-weight: 600;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.8rem;
            transition: var(--transition);
        }

        .btn-logout:hover {
            background: #FEE2E2;
            transform: translateY(-2px);
        }

        /* Main Content */
        .main-content {
            margin-left: var(--sidebar-width);
            padding: 3rem;
            min-height: 100vh;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 3rem;
        }

        .header h1 {
            font-size: 2rem;
            font-weight: 800;
        }

        .date-badge {
            background: white;
            padding: 0.75rem 1.5rem;
            border-radius: 50px;
            font-weight: 500;
            color: var(--text-sub);
            border: 1px solid var(--border);
            font-size: 0.9rem;
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .sidebar {
                transform: translateX(-100%);
                transition: var(--transition);
                box-shadow: 20px 0 40px rgba(0, 0, 0, 0.1);
            }

            .sidebar.show {
                transform: translateX(0);
            }

            .main-content {
                margin-left: 0;
                padding: 1.5rem;
            }

            .header {
                flex-direction: column;
                align-items: flex-start;
                gap: 1rem;
            }

            .menu-toggle-guru {
                display: block !important;
                background: white;
                border: 1px solid var(--border);
                padding: 0.8rem;
                border-radius: 12px;
                cursor: pointer;
                margin-bottom: 2rem;
            }
        }

        .menu-toggle-guru {
            display: none;
        }

        /* Cards */
        .welcome-card {
            background: linear-gradient(135deg, #059669, #10B981);
            border-radius: 2rem;
            padding: 3rem;
            color: white;
            margin-bottom: 2.5rem;
            position: relative;
            overflow: hidden;
        }

        .welcome-card::after {
            content: '';
            position: absolute;
            right: -30px;
            top: -30px;
            width: 200px;
            height: 200px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
        }

        .welcome-card::before {
            content: '';
            position: absolute;
            right: 60px;
            bottom: -40px;
            width: 150px;
            height: 150px;
            background: rgba(255, 255, 255, 0.08);
            border-radius: 50%;
        }

        .welcome-card h2 {
            font-size: 1.8rem;
            font-weight: 800;
            margin-bottom: 0.5rem;
        }

        .welcome-card p {
            font-size: 1.05rem;
            opacity: 0.9;
        }

        .info-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 2rem;
            margin-bottom: 2.5rem;
        }

        @media (max-width: 900px) {
            .info-grid {
                grid-template-columns: 1fr;
            }
        }

        .info-card {
            background: white;
            padding: 2rem;
            border-radius: 1.5rem;
            border: 1px solid var(--border);
            transition: var(--transition);
        }

        .info-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.05);
            border-color: var(--primary);
        }

        .info-card .icon {
            width: 50px;
            height: 50px;
            background: var(--primary-light);
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.25rem;
            color: var(--primary);
            margin-bottom: 1.25rem;
        }

        .info-card h3 {
            font-size: 1rem;
            color: var(--text-sub);
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .info-card p {
            font-size: 1.25rem;
            font-weight: 700;
        }

        .quick-actions {
            background: white;
            border-radius: 1.5rem;
            padding: 2.5rem;
            border: 1px solid var(--border);
        }

        .quick-actions h2 {
            font-size: 1.3rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
        }

        .action-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 1rem;
        }

        .action-btn {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 1.25rem;
            background: var(--bg-light);
            border-radius: 1rem;
            text-decoration: none;
            color: var(--text-main);
            font-weight: 600;
            transition: var(--transition);
            border: 1px solid transparent;
        }

        .action-btn:hover {
            border-color: var(--primary);
            background: var(--primary-light);
            transform: translateY(-2px);
        }

        .action-btn i {
            font-size: 1.25rem;
            color: var(--primary);
        }
    </style>
</head>

<body>
    <aside class="sidebar">
        <div class="sidebar-logo">
            <i class="fas fa-chalkboard-teacher"></i>
            <span>Portal Guru</span>
        </div>

        <ul class="nav-menu">
            <li class="nav-item">
                <a href="<?= base_url('admin/guru/dashboard') ?>"
                    class="nav-link <?= uri_string() == 'admin/guru/dashboard' ? 'active' : '' ?>">
                    <i class="fas fa-th-large"></i> Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a href="<?= base_url('admin/guru/profile') ?>"
                    class="nav-link <?= uri_string() == 'admin/guru/profile' ? 'active' : '' ?>">
                    <i class="fas fa-user"></i> Profil Saya
                </a>
            </li>
        </ul>

        <div class="sidebar-footer">
            <div class="user-pill">
                <?php if (session()->get('teacher_photo')): ?>
                    <img src="<?= base_url('uploads/teachers/' . session()->get('teacher_photo')) ?>"
                        alt="<?= session()->get('teacher_name') ?>" class="user-avatar">
                <?php else: ?>
                    <div class="user-avatar-placeholder">
                        <?= substr(session()->get('teacher_name') ?? 'G', 0, 1) ?>
                    </div>
                <?php endif; ?>
                <div class="user-info">
                    <p style="font-weight: 700; font-size: 0.95rem;">
                        <?= session()->get('teacher_name') ?? 'Guru' ?>
                    </p>
                    <p style="font-size: 0.8rem; color: var(--text-sub);">Guru</p>
                </div>
            </div>
            <a href="<?= base_url('admin/guru/logout') ?>" class="btn-logout">
                <i class="fas fa-sign-out-alt"></i> Keluar
            </a>
        </div>
    </aside>

    <div class="main-content">
        <div class="menu-toggle-guru" id="guruMenuBtn">
            <i class="fas fa-bars"></i> Menu
        </div>
        <header class="header">
            <h1>
                <?= $title ?? 'Dashboard' ?>
            </h1>
            <div class="date-badge">
                <i class="fas fa-calendar-day" style="margin-right: 0.5rem; color: var(--primary);"></i>
                <span>
                    <?= date('d M Y') ?>
                </span>
            </div>
        </header>

        <main>
            <!-- Welcome Card -->
            <div class="welcome-card">
                <h2>Selamat Datang,
                    <?= esc($teacher_name ?? 'Guru') ?>! 👋
                </h2>
                <p>Semoga hari Anda penuh semangat dan inspirasi untuk mengajar.</p>
            </div>

            <!-- Info Cards -->
            <div class="info-grid">
                <div class="info-card">
                    <div class="icon"><i class="fas fa-id-card"></i></div>
                    <h3>NIP</h3>
                    <p>
                        <?= esc($teacher_nip ?? '-') ?>
                    </p>
                </div>
                <div class="info-card">
                    <div class="icon"><i class="fas fa-book"></i></div>
                    <h3>Mata Pelajaran</h3>
                    <p>
                        <?= esc($teacher_subject ?? '-') ?>
                    </p>
                </div>
                <div class="info-card">
                    <div class="icon"><i class="fas fa-clock"></i></div>
                    <h3>Status</h3>
                    <p style="color: #059669;">● Aktif</p>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="quick-actions">
                <h2><i class="fas fa-bolt" style="color: var(--primary); margin-right: 0.5rem;"></i> Aksi Cepat</h2>
                <div class="action-grid">
                    <a href="<?= base_url('admin/guru/profile') ?>" class="action-btn">
                        <i class="fas fa-user-edit"></i>
                        <span>Lihat Profil</span>
                    </a>
                    <a href="<?= base_url('admin/guru/logout') ?>" class="action-btn">
                        <i class="fas fa-sign-out-alt"></i>
                        <span>Keluar</span>
                    </a>
                </div>
            </div>
        </main>
    </div>

    <script>
        const guruMenuBtn = document.getElementById('guruMenuBtn');
        const sidebar = document.querySelector('.sidebar');

        if (guruMenuBtn) {
            guruMenuBtn.addEventListener('click', () => {
                sidebar.classList.toggle('show');
            });
        }

        document.addEventListener('click', (e) => {
            if (window.innerWidth <= 1024) {
                if (!sidebar.contains(e.target) && !guruMenuBtn.contains(e.target)) {
                    sidebar.classList.remove('show');
                }
            }
        });
    </script>
</body>

</html>