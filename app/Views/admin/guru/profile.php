<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $title ?? 'Profil' ?> | Portal Guru
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
            }
        }

        .menu-toggle-guru {
            display: none;
            background: white;
            border: 1px solid var(--border);
            padding: 0.8rem;
            border-radius: 12px;
            cursor: pointer;
            margin-bottom: 2rem;
        }

        /* Profile Card */
        .profile-card {
            background: white;
            border-radius: 2rem;
            border: 1px solid var(--border);
            overflow: hidden;
            max-width: 800px;
        }

        .profile-header {
            background: linear-gradient(135deg, #059669, #10B981);
            padding: 3rem 3rem 5rem;
            color: white;
            position: relative;
        }

        .profile-header h2 {
            font-size: 1.5rem;
            font-weight: 700;
        }

        .profile-header p {
            opacity: 0.85;
            font-size: 0.95rem;
        }

        .profile-body {
            padding: 3rem;
            position: relative;
        }

        .profile-photo-wrapper {
            position: absolute;
            top: -50px;
            left: 3rem;
        }

        .profile-photo {
            width: 100px;
            height: 100px;
            border-radius: 24px;
            object-fit: cover;
            border: 4px solid white;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        }

        .profile-photo-placeholder {
            width: 100px;
            height: 100px;
            border-radius: 24px;
            background: linear-gradient(135deg, #059669, #10B981);
            border: 4px solid white;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 2.5rem;
            font-weight: 800;
        }

        .profile-details {
            margin-top: 4rem;
        }

        .detail-row {
            display: flex;
            align-items: center;
            padding: 1.25rem 0;
            border-bottom: 1px solid #F1F5F9;
        }

        .detail-row:last-child {
            border-bottom: none;
        }

        .detail-label {
            width: 200px;
            font-weight: 600;
            color: var(--text-sub);
            display: flex;
            align-items: center;
            gap: 0.75rem;
            font-size: 0.95rem;
        }

        .detail-label i {
            color: var(--primary);
            font-size: 1.1rem;
            width: 22px;
            text-align: center;
        }

        .detail-value {
            font-weight: 600;
            font-size: 1.05rem;
            color: var(--text-main);
        }

        @media (max-width: 600px) {
            .detail-row {
                flex-direction: column;
                align-items: flex-start;
                gap: 0.5rem;
            }

            .detail-label {
                width: auto;
            }

            .profile-body {
                padding: 2rem;
            }

            .profile-photo-wrapper {
                left: 2rem;
            }
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
                <a href="<?= base_url('admin/guru/articles') ?>"
                    class="nav-link <?= strpos(uri_string(), 'admin/guru/articles') !== false ? 'active' : '' ?>">
                    <i class="fas fa-newspaper"></i> Artikel Saya
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
                <div>
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
                <?= $title ?? 'Profil' ?>
            </h1>
            <div class="date-badge">
                <i class="fas fa-calendar-day" style="margin-right: 0.5rem; color: var(--primary);"></i>
                <span>
                    <?= date('d M Y') ?>
                </span>
            </div>
        </header>

        <main>
            <div class="profile-card">
                <div class="profile-header">
                    <h2>Profil Guru</h2>
                    <p>Informasi data diri Anda</p>
                </div>
                <div class="profile-body">
                    <div class="profile-photo-wrapper">
                        <?php if ($teacher_photo): ?>
                            <img src="<?= base_url('uploads/teachers/' . $teacher_photo) ?>" alt="<?= esc($teacher_name) ?>"
                                class="profile-photo">
                        <?php else: ?>
                            <div class="profile-photo-placeholder">
                                <?= substr($teacher_name ?? 'G', 0, 1) ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="profile-details">
                        <div class="detail-row">
                            <div class="detail-label">
                                <i class="fas fa-user"></i> Nama Lengkap
                            </div>
                            <div class="detail-value">
                                <?= esc($teacher_name ?? '-') ?>
                            </div>
                        </div>
                        <div class="detail-row">
                            <div class="detail-label">
                                <i class="fas fa-id-card"></i> NIP
                            </div>
                            <div class="detail-value">
                                <?= esc($teacher_nip ?? '-') ?>
                            </div>
                        </div>
                        <div class="detail-row">
                            <div class="detail-label">
                                <i class="fas fa-book"></i> Mata Pelajaran
                            </div>
                            <div class="detail-value">
                                <?= esc($teacher_subject ?? '-') ?>
                            </div>
                        </div>
                        <div class="detail-row">
                            <div class="detail-label">
                                <i class="fas fa-circle-check"></i> Status
                            </div>
                            <div class="detail-value" style="color: #059669;">● Aktif</div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script>
        const guruMenuBtn = document.getElementById('guruMenuBtn');
        const sidebar = document.querySelector('.sidebar');
        if (guruMenuBtn) {
            guruMenuBtn.addEventListener('click', () => { sidebar.classList.toggle('show'); });
        }
        document.addEventListener('click', (e) => {
            if (window.innerWidth <= 1024 && !sidebar.contains(e.target) && !guruMenuBtn.contains(e.target)) {
                sidebar.classList.remove('show');
            }
        });
    </script>
</body>

</html>