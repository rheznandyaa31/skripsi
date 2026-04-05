<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gudang Dashboard - Skripsi</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        :root {
            --sidebar-width: 260px;
            --primary-bg: #f8fafc;
            --accent-color: #f59e0b;
            --sidebar-bg: #0f172a;
        }

        body { 
            background-color: var(--primary-bg); 
            font-family: 'Plus Jakarta Sans', sans-serif;
            overflow-x: hidden;
        }

        .sidebar { 
            width: var(--sidebar-width);
            height: 100vh;
            background-color: var(--sidebar-bg);
            position: fixed;
            left: 0;
            top: 0;
            z-index: 1000;
            padding: 1.5rem 1rem;
            transition: all 0.3s ease;
        }

        .sidebar-brand {
            padding: 0 1rem 2.5rem;
            color: white;
            font-weight: 800;
            font-size: 1.35rem;
            display: flex;
            align-items: center;
            gap: 12px;
            letter-spacing: -0.02em;
        }

        .sidebar-brand .brand-icon {
            width: 40px;
            height: 40px;
            background: var(--accent-color);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #0f172a;
            font-size: 1.4rem;
            box-shadow: 0 8px 16px -4px rgba(245, 158, 11, 0.4);
        }

        .nav-link {
            color: #94a3b8;
            padding: 0.9rem 1.2rem;
            border-radius: 14px;
            margin-bottom: 0.4rem;
            display: flex;
            align-items: center;
            gap: 14px;
            font-weight: 600;
            font-size: 0.925rem;
            transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .nav-link i {
            font-size: 1.2rem;
        }

        .nav-link:hover {
            background: rgba(255, 255, 255, 0.05);
            color: white;
            transform: translateX(4px);
        }

        .nav-link.active {
            background: var(--accent-color);
            color: #0f172a;
            font-weight: 700;
            box-shadow: 0 10px 15px -3px rgba(245, 158, 11, 0.3);
        }

        .main-content {
            margin-left: var(--sidebar-width);
            padding: 2.5rem;
            min-height: 100vh;
        }

        .top-navbar {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(8px);
            padding: 1rem 2.5rem;
            margin: -2.5rem -2.5rem 2.5rem;
            border-bottom: 1px solid #e2e8f0;
            display: flex;
            justify-content: flex-end;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 999;
        }

        .user-profile {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 8px 16px;
            border-radius: 100px;
            background: white;
            border: 1px solid #e2e8f0;
            box-shadow: 0 2px 4px rgba(0,0,0,0.02);
            transition: all 0.2s;
            cursor: pointer;
        }

        .user-profile:hover {
            border-color: var(--accent-color);
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
        }

        .user-profile.dropdown-toggle::after {
            display: none;
        }

        .dropdown-item {
            border-radius: 8px;
            margin: 0 8px;
            width: calc(100% - 16px);
            transition: all 0.2s;
        }

        .dropdown-item:hover {
            background-color: #f8fafc;
            transform: translateX(4px);
        }

        .card {
            border: none;
            border-radius: 24px;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.04), 0 4px 6px -2px rgba(0, 0, 0, 0.02);
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <div class="sidebar-brand">
            <div class="brand-icon">
                <i class="bi bi-box-seam-fill"></i>
            </div>
            <span>Logistics Hub</span>
        </div>
        
        <nav class="nav flex-column h-100">
            <a class="nav-link <?= (current_url() == base_url('gudang')) ? 'active' : '' ?>" href="<?= base_url('gudang') ?>">
                <i class="bi bi-speedometer2"></i> Dashboard
            </a>
            <a class="nav-link <?= (strpos(current_url(), 'gudang/monitoring') !== false) ? 'active' : '' ?>" href="<?= base_url('gudang/monitoring') ?>">
                <i class="bi bi-boxes"></i> Monitoring Stok
            </a>
            <a class="nav-link <?= (strpos(current_url(), 'gudang/pemesanan') !== false) ? 'active' : '' ?>" href="<?= base_url('gudang/pemesanan') ?>">
                <i class="bi bi-cart-plus-fill"></i> Pemesanan Bahan
            </a>
            <hr class="mx-3 opacity-10">
            <a class="nav-link text-danger" href="<?= base_url('logout') ?>">
                <i class="bi bi-box-arrow-right"></i> Logout
            </a>
            
            <div class="mt-auto">
                <a class="nav-link text-danger fw-bold bg-danger bg-opacity-10 border border-danger border-opacity-10 rounded-4" href="<?= base_url('logout') ?>">
                    <i class="bi bi-box-arrow-right"></i> Keluar
                </a>
            </div>
        </nav>
    </div>

    <main class="main-content">
        <div class="top-navbar">
            <div class="dropdown">
                <div class="user-profile dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="text-end">
                        <div class="fw-bold small"><?= session()->get('nama_lengkap') ?></div>
                        <div class="text-muted" style="font-size: 10px;">Petugas Gudang</div>
                    </div>
                    <div class="bg-warning rounded-circle d-flex align-items-center justify-content-center text-dark fw-bold" style="width: 32px; height: 32px;">
                        <?= substr(session()->get('nama_lengkap'), 0, 1) ?>
                    </div>
                </div>
                <ul class="dropdown-menu dropdown-menu-end border-0 shadow-sm rounded-4 mt-2">
                    <li><a class="dropdown-item px-3 py-2 small fw-bold" href="<?= base_url('gudang') ?>"><i class="bi bi-person me-2"></i> Profil Saya</a></li>
                    <li><hr class="dropdown-divider opacity-10"></li>
                    <li><a class="dropdown-item px-3 py-2 small fw-bold text-danger" href="<?= base_url('logout') ?>"><i class="bi bi-box-arrow-right me-2"></i> Keluar</a></li>
                </ul>
            </div>
        </div>

        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm rounded-4">
                <i class="bi bi-check-circle-fill me-2"></i>
                <?= session()->getFlashdata('success') ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger alert-dismissible fade show border-0 shadow-sm rounded-4">
                <i class="bi bi-exclamation-triangle-fill me-2"></i>
                <?= session()->getFlashdata('error') ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>

        <?= $this->renderSection('content') ?>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
