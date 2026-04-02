<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistem Manajemen Skripsi</title>
    <!-- Google Fonts: Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        :root {
            --primary-color: #f97316;
            --primary-hover: #ea580c;
            --bg-gradient: linear-gradient(135deg, #fbbf24 0%, #f97316 50%, #dc2626 100%);
        }

        body {
            font-family: 'Inter', sans-serif;
            background: #ffffff;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
            overflow: hidden;
        }

        .login-container {
            width: 100%;
            max-width: 420px;
            padding: 20px;
            z-index: 1;
        }

        .login-card {
            background: #ffffff;
            border-radius: 30px;
            border: 1px solid #f3f4f6;
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
            padding: 48px 40px;
            transition: transform 0.3s ease;
        }

        .login-card:hover {
            transform: translateY(-5px);
        }

        .login-header {
            text-align: center;
            margin-bottom: 32px;
        }

        .login-header .logo-icon {
            width: 80px;
            height: 80px;
            background: #fff;
            color: var(--primary-color);
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 45px;
            margin: 0 auto 20px;
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
            border: 2px solid #fef3c7;
        }

        .login-header h3 {
            font-weight: 800;
            color: #92400e;
            margin-bottom: 4px;
            letter-spacing: -0.025em;
        }

        .login-header p {
            color: #b45309;
            font-size: 1.1rem;
            font-weight: 600;
        }

        .form-label {
            font-weight: 700;
            color: #78350f;
            font-size: 0.875rem;
            margin-bottom: 8px;
        }

        .input-group-text {
            background-color: #fffbeb;
            border-right: none;
            color: #d97706;
            border-radius: 12px 0 0 12px;
            border: 1px solid #fde68a;
        }

        .form-control {
            background-color: #fffbeb;
            border-left: none;
            padding: 12px 16px;
            border-radius: 0 12px 12px 0;
            font-size: 0.95rem;
            border: 1px solid #fde68a;
            color: #92400e;
        }

        .form-control::placeholder {
            color: #d97706;
            opacity: 0.5;
        }

        .form-control:focus {
            background-color: #fff;
            border-color: #fde68a;
            box-shadow: none;
        }

        .input-group:focus-within .input-group-text,
        .input-group:focus-within .form-control {
            border-color: var(--primary-color);
            background-color: #fff;
        }

        .btn-login {
            background: linear-gradient(to right, #f97316, #dc2626);
            border: none;
            color: #fff;
            font-weight: 800;
            padding: 14px;
            border-radius: 15px;
            transition: all 0.3s;
            margin-top: 8px;
            letter-spacing: 0.05em;
            box-shadow: 0 10px 15px -3px rgba(249, 115, 22, 0.4);
        }

        .btn-login:hover {
            transform: scale(1.02);
            box-shadow: 0 15px 20px -3px rgba(249, 115, 22, 0.5);
            filter: brightness(1.1);
        }

        .alert {
            border-radius: 15px;
            font-size: 0.875rem;
            border: none;
            font-weight: 600;
        }

        .footer-text {
            text-align: center;
            margin-top: 24px;
            color: #b45309;
            font-size: 0.875rem;
            font-weight: 500;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-card">
            <div class="login-header">
                <div class="logo-icon">
                    <i class="bi bi-egg-fried"></i>
                </div>
                <h3>Selamat Datang</h3>
                <p>do. Lurrr chicken</p>
            </div>
            
            <?php if (session()->getFlashdata('error')): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="bi bi-exclamation-circle-fill me-2"></i>
                    <?= session()->getFlashdata('error') ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>

            <?php if (session()->getFlashdata('success')): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="bi bi-check-circle-fill me-2"></i>
                    <?= session()->getFlashdata('success') ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>

            <form action="<?= base_url('login/attempt') ?>" method="post">
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-person"></i></span>
                        <input type="text" class="form-control" name="username" id="username" placeholder="Masukkan username" required autofocus>
                    </div>
                </div>
                <div class="mb-4">
                    <label for="password" class="form-label">Password</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-lock"></i></span>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Masukkan password" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-login w-100">
                    MASUK SEKARANG <i class="bi bi-arrow-right ms-2"></i>
                </button>
            </form>
            
            <div class="footer-text">
                <i class="bi bi-info-circle me-1"></i> Lupa password? Hubungi Admin.
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
