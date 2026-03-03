<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin | EduPortal Sekolah</title>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #2563EB;
            --primary-dark: #1E40AF;
            --bg-light: #F8FAFC;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Outfit', sans-serif;
        }

        body {
            background: linear-gradient(135deg, #EFF6FF 0%, #DBEAFE 100%);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1rem;
        }

        .login-card {
            background: white;
            width: 100%;
            max-width: 450px;
            padding: 3.5rem;
            border-radius: 2rem;
            box-shadow: 0 25px 50px -12px rgba(37, 99, 235, 0.1);
            text-align: center;
        }

        .logo {
            font-size: 2rem;
            font-weight: 800;
            color: var(--primary);
            margin-bottom: 2rem;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.8rem;
        }

        h2 {
            font-size: 1.75rem;
            margin-bottom: 0.8rem;
            color: #1E293B;
        }

        p.subtitle {
            color: #64748B;
            margin-bottom: 3rem;
            font-size: 0.9375rem;
        }

        .form-group {
            text-align: left;
            margin-bottom: 1.8rem;
        }

        label {
            display: block;
            margin-bottom: 0.6rem;
            font-weight: 500;
            color: #475569;
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
        }

        input {
            width: 100%;
            padding: 1rem 1.25rem 1rem 3.5rem;
            border: 2px solid #F1F5F9;
            border-radius: 1rem;
            background: #F8FAFC;
            font-size: 1rem;
            transition: all 0.3s;
        }

        input:focus {
            outline: none;
            border-color: var(--primary);
            background: white;
            box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.1);
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
            cursor: pointer;
            transition: all 0.3s;
            margin-top: 1rem;
            box-shadow: 0 8px 20px rgba(37, 99, 235, 0.3);
        }

        .btn-login:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 12px 25px rgba(37, 99, 235, 0.4);
        }

        .alert {
            background: #FEE2E2;
            color: #991B1B;
            padding: 1rem;
            border-radius: 0.8rem;
            margin-bottom: 2rem;
            font-size: 0.9rem;
            font-weight: 500;
        }

        .footer {
            margin-top: 2rem;
            font-size: 0.875rem;
            color: #94A3B8;
        }
    </style>
</head>

<body>
    <div class="login-card">
        <div class="logo">
            <i class="fas fa-graduation-cap"></i>
            <span>EduPortal</span>
        </div>
        <h2>Selamat Datang Kembali</h2>
        <p class="subtitle">Panel Administrasi Portals Sekolah</p>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert">
                <i class="fas fa-exclamation-circle" style="margin-right: 0.5rem;"></i>
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert" style="background: #DCFCE7; color: #166534;">
                <i class="fas fa-check-circle" style="margin-right: 0.5rem;"></i>
                <?= session()->getFlashdata('success') ?>
            </div>
        <?php endif; ?>

        <form action="<?= base_url('auth/loginProcess') ?>" method="POST">
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
            <button type="submit" class="btn-login">Masuk ke Dashboard</button>
        </form>

        <div class="footer">
            &copy; 2024 EduPortal Sekolah. All rights reserved.
        </div>


    </div>
</body>

</html>