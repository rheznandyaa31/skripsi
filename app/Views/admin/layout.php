<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Skripsi</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        :root {
            --sidebar-width: 260px;
            --primary-bg: #f8fafc;
            --accent-color: #6366f1;
            --sidebar-bg: #1e293b;
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
            padding: 0 1rem 2rem;
            color: white;
            font-weight: 800;
            font-size: 1.25rem;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .nav-link {
            color: #94a3b8;
            padding: 0.8rem 1rem;
            border-radius: 12px;
            margin-bottom: 0.5rem;
            display: flex;
            align-items: center;
            gap: 12px;
            font-weight: 500;
            transition: all 0.2s;
        }

        .nav-link:hover {
            background: rgba(255, 255, 255, 0.05);
            color: white;
        }

        .nav-link.active {
            background: var(--accent-color);
            color: white;
            box-shadow: 0 10px 15px -3px rgba(99, 102, 241, 0.3);
        }

        .main-content {
            margin-left: var(--sidebar-width);
            padding: 2rem;
            min-height: 100vh;
        }

        .top-navbar {
            background: white;
            padding: 1rem 2rem;
            margin: -2rem -2rem 2rem;
            border-bottom: 1px solid #e2e8f0;
            display: flex;
            justify-content: flex-end;
            align-items: center;
        }

        .user-profile {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 6px 12px;
            border-radius: 100px;
            background: #f1f5f9;
        }

        .user-profile img {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background: var(--accent-color);
        }

        .alert {
            border-radius: 16px;
            border: none;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <div class="sidebar-brand">
            <div class="bg-primary p-2 rounded-3 shadow-sm">
                <i class="bi bi-shield-lock-fill text-white"></i>
            </div>
            <span>Admin Panel</span>
        </div>
        
        <nav class="nav flex-column">
            <a class="nav-link <?= (current_url() == base_url('admin')) ? 'active' : '' ?>" href="<?= base_url('admin') ?>">
                <i class="bi bi-grid-1x2-fill"></i> Dashboard
            </a>
            <a class="nav-link <?= (strpos(current_url(), 'admin/users') !== false) ? 'active' : '' ?>" href="<?= base_url('admin/users') ?>">
                <i class="bi bi-people-fill"></i> Kelola Pengguna
            </a>
            <a class="nav-link <?= (strpos(current_url(), 'admin/produk') !== false) ? 'active' : '' ?>" href="<?= base_url('admin/produk') ?>">
                <i class="bi bi-box-seam-fill"></i> Kelola Produk
            </a>
            <a class="nav-link <?= (strpos(current_url(), 'admin/stok') !== false) ? 'active' : '' ?>" href="<?= base_url('admin/stok') ?>">
                <i class="bi bi-database-fill-gear"></i> Stok & Pemesanan
            </a>
            <a class="nav-link <?= (strpos(current_url(), 'admin/laporan') !== false) ? 'active' : '' ?>" href="<?= base_url('admin/laporan') ?>">
                <i class="bi bi-file-earmark-bar-graph-fill"></i> Laporan
            </a>
            
            <div class="mt-auto pt-4">
                <hr class="bg-secondary opacity-25">
                <a class="nav-link text-danger" href="<?= base_url('logout') ?>">
                    <i class="bi bi-box-arrow-right"></i> Keluar
                </a>
            </div>
        </nav>
    </div>

    <main class="main-content">
        <div class="top-navbar">
            <div class="user-profile">
                <div class="text-end">
                    <div class="fw-bold small"><?= session()->get('nama_lengkap') ?></div>
                    <div class="text-muted" style="font-size: 10px;">Administrator</div>
                </div>
                <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center text-white" style="width: 32px; height: 32px;">
                    <i class="bi bi-person-fill"></i>
                </div>
            </div>
        </div>

        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-success alert-dismissible fade show">
                <i class="bi bi-check-circle-fill me-2"></i>
                <?= session()->getFlashdata('success') ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger alert-dismissible fade show">
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
