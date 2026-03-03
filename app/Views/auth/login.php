<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | EduPortal Sekolah</title>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #2563EB;
            --primary-dark: #1E40AF;
            --green: #059669;
            --green-dark: #047857;
            --bg-light: #F8FAFC;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Outfit', sans-serif;
        }

        body {
            background: linear-gradient(135deg, #EFF6FF 0%, #DBEAFE 50%, #E0E7FF 100%);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1rem;
            overflow: hidden;
            transition: background 0.5s ease;
        }

        body.guru-mode {
            background: linear-gradient(135deg, #ECFDF5 0%, #D1FAE5 50%, #A7F3D0 100%);
        }

        /* Floating shapes */
        body::before,
        body::after {
            content: '';
            position: fixed;
            border-radius: 50%;
            z-index: 0;
            opacity: 0.12;
            transition: background 0.5s ease;
        }

        body::before {
            width: 350px;
            height: 350px;
            background: var(--primary);
            top: -80px;
            right: -80px;
            animation: float 8s ease-in-out infinite;
        }

        body::after {
            width: 250px;
            height: 250px;
            background: #6366F1;
            bottom: -60px;
            left: -60px;
            animation: float 6s ease-in-out infinite reverse;
        }

        body.guru-mode::before {
            background: var(--green);
        }

        body.guru-mode::after {
            background: #10B981;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0) rotate(0deg);
            }

            50% {
                transform: translateY(-25px) rotate(5deg);
            }
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .login-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            width: 100%;
            max-width: 460px;
            padding: 3rem;
            border-radius: 2rem;
            box-shadow: 0 25px 60px rgba(37, 99, 235, 0.1), 0 0 0 1px rgba(0, 0, 0, 0.03);
            text-align: center;
            position: relative;
            z-index: 1;
            animation: slideUp 0.5s ease-out;
            transition: box-shadow 0.5s ease;
        }

        body.guru-mode .login-card {
            box-shadow: 0 25px 60px rgba(5, 150, 105, 0.1), 0 0 0 1px rgba(0, 0, 0, 0.03);
        }

        .logo {
            font-size: 1.8rem;
            font-weight: 800;
            color: var(--primary);
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.8rem;
            transition: color 0.3s;
        }

        body.guru-mode .logo {
            color: var(--green);
        }

        h2 {
            font-size: 1.6rem;
            margin-bottom: 0.5rem;
            color: #1E293B;
        }

        p.subtitle {
            color: #64748B;
            margin-bottom: 2rem;
            font-size: 0.9375rem;
        }

        /* Role Tabs */
        .role-tabs {
            display: flex;
            background: #F1F5F9;
            border-radius: 14px;
            padding: 5px;
            margin-bottom: 2rem;
            position: relative;
        }

        .role-tab {
            flex: 1;
            padding: 0.85rem 1rem;
            border: none;
            background: transparent;
            font-family: 'Outfit', sans-serif;
            font-size: 0.95rem;
            font-weight: 600;
            color: #64748B;
            cursor: pointer;
            border-radius: 11px;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            position: relative;
            z-index: 1;
        }

        .role-tab.active {
            background: white;
            color: var(--primary);
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
        }

        body.guru-mode .role-tab.active {
            color: var(--green);
        }

        .role-tab:hover:not(.active) {
            color: #334155;
        }

        .form-group {
            text-align: left;
            margin-bottom: 1.5rem;
        }

        label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 600;
            color: #334155;
            font-size: 0.9rem;
        }

        .input-group {
            position: relative;
        }

        .input-group i {
            position: absolute;
            left: 1.25rem;
            top: 50%;
            transform: translateY(-50%);
            color: #94A3B8;
            font-size: 1.05rem;
            transition: color 0.3s;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 1rem 1.25rem 1rem 3.5rem;
            border: 2px solid #E2E8F0;
            border-radius: 1rem;
            background: #F8FAFC;
            font-size: 1rem;
            font-family: 'Outfit', sans-serif;
            transition: all 0.3s;
        }

        input[type="text"]:focus,
        input[type="password"]:focus {
            outline: none;
            border-color: var(--primary);
            background: white;
            box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.1);
        }

        body.guru-mode input[type="text"]:focus,
        body.guru-mode input[type="password"]:focus {
            border-color: var(--green);
            box-shadow: 0 0 0 4px rgba(5, 150, 105, 0.1);
        }

        .input-group:focus-within i {
            color: var(--primary);
        }

        body.guru-mode .input-group:focus-within i {
            color: var(--green);
        }

        .btn-login {
            width: 100%;
            padding: 1.1rem;
            background: var(--primary);
            color: white;
            border: none;
            border-radius: 1rem;
            font-size: 1rem;
            font-weight: 700;
            font-family: 'Outfit', sans-serif;
            cursor: pointer;
            transition: all 0.3s;
            margin-top: 0.5rem;
            box-shadow: 0 8px 25px rgba(37, 99, 235, 0.3);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }

        .btn-login:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 12px 30px rgba(37, 99, 235, 0.4);
        }

        body.guru-mode .btn-login {
            background: var(--green);
            box-shadow: 0 8px 25px rgba(5, 150, 105, 0.3);
        }

        body.guru-mode .btn-login:hover {
            background: var(--green-dark);
            box-shadow: 0 12px 30px rgba(5, 150, 105, 0.4);
        }

        .alert {
            padding: 1rem 1.25rem;
            border-radius: 1rem;
            margin-bottom: 1.5rem;
            font-size: 0.9rem;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            animation: slideUp 0.3s ease-out;
        }

        .alert-error {
            background: #FEE2E2;
            color: #991B1B;
            border: 1px solid #FECACA;
        }

        .alert-success {
            background: #DCFCE7;
            color: #166534;
            border: 1px solid #BBF7D0;
        }

        .footer {
            margin-top: 2rem;
            font-size: 0.85rem;
            color: #94A3B8;
        }

        /* Form panel transitions */
        .login-form {
            display: block;
        }

        .login-form.hidden {
            display: none;
        }
    </style>
</head>

<body id="loginBody">
    <div class="login-card">
        <div class="logo">
            <i class="fas fa-graduation-cap"></i>
            <span>EduPortal</span>
        </div>
        <h2>Selamat Datang</h2>
        <p class="subtitle">Portal Sekolah — Silakan masuk</p>

        <!-- Role Tabs -->
        <div class="role-tabs">
            <button type="button" class="role-tab active" id="tabAdmin" onclick="switchRole('admin')">
                <i class="fas fa-shield-alt"></i> Admin
            </button>
            <button type="button" class="role-tab" id="tabGuru" onclick="switchRole('guru')">
                <i class="fas fa-chalkboard-teacher"></i> Guru
            </button>
        </div>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-error">
                <i class="fas fa-exclamation-circle"></i>
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-success">
                <i class="fas fa-check-circle"></i>
                <?= session()->getFlashdata('success') ?>
            </div>
        <?php endif; ?>

        <!-- Admin Login Form -->
        <form action="<?= base_url('auth/loginProcess') ?>" method="POST" id="formAdmin" class="login-form">
            <?= csrf_field() ?>
            <input type="hidden" name="role" value="admin">
            <div class="form-group">
                <label>Username</label>
                <div class="input-group">
                    <i class="fas fa-user"></i>
                    <input type="text" name="username" placeholder="Masukkan username" required>
                </div>
            </div>
            <div class="form-group">
                <label>Password</label>
                <div class="input-group">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="password" placeholder="••••••••" required>
                </div>
            </div>
            <button type="submit" class="btn-login">
                <i class="fas fa-sign-in-alt"></i> Masuk sebagai Admin
            </button>
        </form>

        <!-- Guru Login Form -->
        <form action="<?= base_url('auth/loginProcess') ?>" method="POST" id="formGuru" class="login-form hidden">
            <?= csrf_field() ?>
            <input type="hidden" name="role" value="guru">
            <div class="form-group">
                <label>NIP (Nomor Induk Pegawai)</label>
                <div class="input-group">
                    <i class="fas fa-id-card"></i>
                    <input type="text" name="nip" placeholder="Masukkan NIP Anda" required>
                </div>
            </div>
            <div class="form-group">
                <label>Password</label>
                <div class="input-group">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="password" placeholder="••••••••" required>
                </div>
            </div>
            <button type="submit" class="btn-login">
                <i class="fas fa-sign-in-alt"></i> Masuk sebagai Guru
            </button>
        </form>

        <div class="footer">
            &copy; 2024 EduPortal Sekolah. All rights reserved.
        </div>
    </div>

    <script>
        function switchRole(role) {
            const body = document.getElementById('loginBody');
            const tabAdmin = document.getElementById('tabAdmin');
            const tabGuru = document.getElementById('tabGuru');
            const formAdmin = document.getElementById('formAdmin');
            const formGuru = document.getElementById('formGuru');

            if (role === 'guru') {
                body.classList.add('guru-mode');
                tabAdmin.classList.remove('active');
                tabGuru.classList.add('active');
                formAdmin.classList.add('hidden');
                formGuru.classList.remove('hidden');
            } else {
                body.classList.remove('guru-mode');
                tabAdmin.classList.add('active');
                tabGuru.classList.remove('active');
                formAdmin.classList.remove('hidden');
                formGuru.classList.add('hidden');
            }
        }

        // Auto-switch to guru tab if there's flashed role
        <?php if (session()->getFlashdata('login_role') === 'guru'): ?>
            switchRole('guru');
        <?php endif; ?>
    </script>
</body>

</html>