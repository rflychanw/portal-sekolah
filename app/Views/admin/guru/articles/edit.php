<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $title ?? 'Edit Artikel' ?> | Portal Guru
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

        .main-content {
            margin-left: var(--sidebar-width);
            padding: 3rem;
            min-height: 100vh;
        }

        @media (max-width: 1024px) {
            .sidebar {
                transform: translateX(-100%);
            }

            .main-content {
                margin-left: 0;
                padding: 1.5rem;
            }
        }
    </style>
</head>

<body>
    <aside class="sidebar">
        <div class="sidebar-logo"><i class="fas fa-chalkboard-teacher"></i> <span>Portal Guru</span></div>
        <ul class="nav-menu">
            <li class="nav-item"><a href="<?= base_url('admin/guru/dashboard') ?>" class="nav-link"><i
                        class="fas fa-th-large"></i> Dashboard</a></li>
            <li class="nav-item"><a href="<?= base_url('admin/guru/articles') ?>" class="nav-link active"><i
                        class="fas fa-newspaper"></i> Artikel Saya</a></li>
            <li class="nav-item"><a href="<?= base_url('admin/guru/profile') ?>" class="nav-link"><i
                        class="fas fa-user"></i> Profil Saya</a></li>
        </ul>
        <div class="sidebar-footer">
            <div class="user-pill">
                <div class="user-avatar-placeholder">
                    <?= substr(session()->get('teacher_name') ?? 'G', 0, 1) ?>
                </div>
                <div class="user-info">
                    <p style="font-weight: 700; font-size: 0.95rem;">
                        <?= session()->get('teacher_name') ?? 'Guru' ?>
                    </p>
                    <p style="font-size: 0.8rem; color: var(--text-sub);">Guru</p>
                </div>
            </div>
            <a href="<?= base_url('admin/guru/logout') ?>" class="btn-logout"><i class="fas fa-sign-out-alt"></i>
                Keluar</a>
        </div>
    </aside>

    <div class="main-content">
        <div style="margin-bottom: 2rem;">
            <a href="<?= base_url('admin/guru/articles') ?>"
                style="color: #64748B; text-decoration: none; display: inline-flex; align-items: center; gap: 0.5rem; font-weight: 500;">
                <i class="fas fa-arrow-left"></i> Kembali ke Daftar
            </a>
            <h1 style="font-size: 2rem; font-weight: 800; margin-top: 1rem;">Edit Artikel</h1>
        </div>

        <main>
            <div class="card"
                style="background: white; border-radius: 16px; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05); padding: 2rem;">
                <form action="<?= base_url('admin/guru/articles/update/' . $article['id']) ?>" method="POST"
                    enctype="multipart/form-data">
                    <?= csrf_field() ?>
                    <div style="margin-bottom: 1.5rem;">
                        <label style="display: block; margin-bottom: 0.5rem; font-weight: 600; color: #334155;">Judul
                            Artikel</label>
                        <input type="text" name="title" value="<?= esc($article['title']) ?>" required
                            style="width: 100%; padding: 0.75rem 1rem; border: 1px solid #E2E8F0; border-radius: 12px; font-size: 1rem;">
                    </div>
                    <div style="margin-bottom: 1.5rem;">
                        <label
                            style="display: block; margin-bottom: 0.5rem; font-weight: 600; color: #334155;">Ringkasan</label>
                        <textarea name="summary" rows="3"
                            style="width: 100%; padding: 0.75rem 1rem; border: 1px solid #E2E8F0; border-radius: 12px; font-size: 1rem;"><?= esc($article['summary']) ?></textarea>
                    </div>
                    <div style="margin-bottom: 1.5rem;">
                        <label style="display: block; margin-bottom: 0.5rem; font-weight: 600; color: #334155;">Konten
                            Lengkap</label>
                        <textarea name="content" rows="10" required
                            style="width: 100%; padding: 0.75rem 1rem; border: 1px solid #E2E8F0; border-radius: 12px; font-size: 1rem;"><?= esc($article['content']) ?></textarea>
                    </div>
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem; margin-bottom: 2rem;">
                        <div>
                            <label
                                style="display: block; margin-bottom: 0.5rem; font-weight: 600; color: #334155;">Gambar
                                Unggulan</label>
                            <?php if ($article['image']): ?>
                                <div style="margin-bottom: 1rem;"><img
                                        src="<?= base_url('uploads/articles/' . $article['image']) ?>" alt="Current"
                                        style="width: 100px; border-radius: 8px;"></div>
                            <?php endif; ?>
                            <input type="file" name="image" accept="image/*"
                                style="width: 100%; padding: 0.5rem; border: 1px solid #E2E8F0; border-radius: 12px;">
                        </div>
                        <div>
                            <label
                                style="display: block; margin-bottom: 0.5rem; font-weight: 600; color: #334155;">Status</label>
                            <select name="status"
                                style="width: 100%; padding: 0.75rem 1rem; border: 1px solid #E2E8F0; border-radius: 12px; background: white;">
                                <option value="draft" <?= $article['status'] == 'draft' ? 'selected' : '' ?>>Draft</option>
                                <option value="published" <?= $article['status'] == 'published' ? 'selected' : '' ?>
                                    >Terbitkan</option>
                            </select>
                        </div>
                    </div>
                    <button type="submit"
                        style="background: var(--primary); color: white; border: none; padding: 0.75rem 2rem; border-radius: 12px; font-weight: 700; cursor: pointer;">
                        <i class="fas fa-save" style="margin-right: 0.5rem;"></i> Simpan Perubahan
                    </button>
                </form>
            </div>
        </main>
    </div>
</body>

</html>