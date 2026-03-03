<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $title ?? 'Dashboard' ?> | EduPortal Admin
    </title>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --sidebar-width: 280px;
            --primary: #2563EB;
            --primary-dark: #1E40AF;
            --bg-light: #F8FAFC;
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
            background: #EFF6FF;
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
            width: 40px;
            height: 40px;
            background: var(--primary);
            color: white;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
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

            .menu-toggle-admin {
                display: block !important;
                background: white;
                border: 1px solid var(--border);
                padding: 0.8rem;
                border-radius: 12px;
                cursor: pointer;
                margin-bottom: 2rem;
            }
        }

        .menu-toggle-admin {
            display: none;
        }
    </style>
</head>

<body>
    <aside class="sidebar">
        <div class="sidebar-logo">
            <i class="fas fa-graduation-cap"></i>
            <span>EduAdmin</span>
        </div>

        <ul class="nav-menu">
            <li class="nav-item">
                <a href="<?= base_url('admin') ?>" class="nav-link <?= uri_string() == 'admin' ? 'active' : '' ?>">
                    <i class="fas fa-th-large"></i> Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link <?= uri_string() == 'admin/students' ? 'active' : '' ?>">
                    <i class="fas fa-users"></i> Data Siswa
                </a>
            </li>

            <li class="nav-item">

                <a href="#" class="nav-link <?= uri_string() == 'admin/news' ? 'active' : '' ?>">
                    <i class="fas fa-newspaper"></i> Manajemen Berita
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link <?= uri_string() == 'admin/academics' ? 'active' : '' ?>">
                    <i class="fas fa-calendar-alt"></i> Akademik
                </a>
            </li>
            <li class="nav-item">
                <a href="<?= base_url('admin/profile') ?>"
                    class="nav-link <?= uri_string() == 'admin/profile' ? 'active' : '' ?>">
                    <i class="fas fa-cog"></i> Pengaturan
                </a>
            </li>
        </ul>

        <div class="sidebar-footer">
            <div class="user-pill">
                <div class="user-avatar">
                    <?= substr(session()->get('username') ?? 'A', 0, 1) ?>
                </div>
                <div class="user-info">
                    <p style="font-weight: 700; font-size: 0.95rem;">
                        <?= session()->get('username') ?? 'Admin' ?>
                    </p>
                    <p style="font-size: 0.8rem; color: var(--text-sub);">Administrator</p>
                </div>
            </div>
            <a href="<?= base_url('auth/logout') ?>" class="btn-logout">
                <i class="fas fa-sign-out-alt"></i> Keluar
            </a>
        </div>
    </aside>

    <div class="main-content">
        <div class="menu-toggle-admin" id="adminMenuBtn">
            <i class="fas fa-bars"></i> Menu
        </div>
        <header class="header">
            <h1>
                <?= $title ?? 'Dashboard' ?>
            </h1>
            <div class="date-badge">
                <i class="fas fa-calendar-day" style="margin-right: 0.5rem; color: var(--primary);"></i>
                <span id="currentDate">
                    <?= date('d M Y') ?>
                </span>
            </div>
        </header>

        <main>
            <?= $this->renderSection('admin_content') ?>
        </main>
    </div>

    <script>
        // Admin Sidebar Toggle
        const adminMenuBtn = document.getElementById('adminMenuBtn');
        const sidebar = document.querySelector('.sidebar');

        if (adminMenuBtn) {
            adminMenuBtn.addEventListener('click', () => {
                sidebar.classList.toggle('show');
            });
        }

        // Close sidebar when clicking outside on mobile
        document.addEventListener('click', (e) => {
            if (window.innerWidth <= 1024) {
                if (!sidebar.contains(e.target) && !adminMenuBtn.contains(e.target)) {
                    sidebar.classList.remove('show');
                }
            }
        });
    </script>
</body>

</html>