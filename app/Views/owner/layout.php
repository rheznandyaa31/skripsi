<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Owner Dashboard - Skripsi</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        :root {
            --sidebar-width: 260px;
            --primary-bg: #f3f4f6;
            --accent-color: #0ea5e9;
            --sidebar-bg: #ffffff;
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
            padding: 2rem 1rem;
            transition: all 0.3s ease;
            border-right: 1px solid #e5e7eb;
            display: flex;
            flex-direction: column;
        }

        .sidebar-brand {
            padding: 0 1rem 2.5rem;
            color: #111827;
            font-weight: 800;
            font-size: 1.4rem;
            display: flex;
            align-items: center;
            gap: 12px;
            letter-spacing: -0.02em;
        }

        .sidebar-brand .brand-icon {
            width: 42px;
            height: 42px;
            background: linear-gradient(135deg, #0ea5e9 0%, #2563eb 100%);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.5rem;
            box-shadow: 0 8px 16px -4px rgba(14, 165, 233, 0.4);
        }

        .nav-link {
            color: #64748b;
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
            transition: transform 0.2s ease;
        }

        .nav-link:hover {
            background: #f8fafc;
            color: var(--accent-color);
            transform: translateX(4px);
        }

        .nav-link:hover i {
            transform: scale(1.1);
        }

        .nav-link.active {
            background: #f0f9ff;
            color: var(--accent-color);
            position: relative;
        }

        .nav-link.active::after {
            content: '';
            position: absolute;
            right: 12px;
            width: 6px;
            height: 6px;
            background: var(--accent-color);
            border-radius: 50%;
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
            border-bottom: 1px solid #e5e7eb;
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
            border: 1px solid #e5e7eb;
            box-shadow: 0 2px 4px rgba(0,0,0,0.02);
            transition: all 0.2s;
            cursor: pointer;
        }

        .user-profile:hover {
            border-color: var(--accent-color);
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
        }

        .card {
            border: none;
            border-radius: 24px;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.04), 0 4px 6px -2px rgba(0, 0, 0, 0.02);
            background: white;
        }

        .btn-logout {
            margin-top: auto;
            color: #ef4444;
            background: #fef2f2;
            border: 1px solid #fee2e2;
        }

        .btn-logout:hover {
            background: #fee2e2;
            color: #dc2626;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <div class="sidebar-brand">
            <div class="brand-icon">
                <i class="bi bi-rocket-takeoff-fill"></i>
            </div>
            <span>Owner Hub</span>
        </div>
        
        <nav class="nav flex-column h-100">
            <a class="nav-link <?= (current_url() == base_url('owner')) ? 'active' : '' ?>" href="<?= base_url('owner') ?>">
                <i class="bi bi-grid-fill"></i> Dashboard
            </a>
            <a class="nav-link <?= (strpos(current_url(), 'owner/stok-bahan-baku') !== false) ? 'active' : '' ?>" href="<?= base_url('owner/stok-bahan-baku') ?>">
                <i class="bi bi-box-seam-fill"></i> Monitoring Stok
            </a>
            <a class="nav-link <?= (strpos(current_url(), 'owner/laporan-penjualan') !== false) ? 'active' : '' ?>" href="<?= base_url('owner/laporan-penjualan') ?>">
                <i class="bi bi-bar-chart-line-fill"></i> Laporan Penjualan
            </a>
            <a class="nav-link <?= (strpos(current_url(), 'owner/laporan-stok') !== false) ? 'active' : '' ?>" href="<?= base_url('owner/laporan-stok') ?>">
                <i class="bi bi-journal-text"></i> Laporan Stok
            </a>
            <a class="nav-link <?= (strpos(current_url(), 'owner/atur-harga') !== false) ? 'active' : '' ?>" href="<?= base_url('owner/atur-harga') ?>">
                <i class="bi bi-tag-fill"></i> Atur Harga
            </a>
            
            <div class="mt-auto">
                <a class="nav-link btn-logout fw-bold" href="<?= base_url('logout') ?>">
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
                    <div class="text-muted" style="font-size: 10px;">Owner / Pemilik</div>
                </div>
                <div class="bg-info rounded-circle d-flex align-items-center justify-content-center text-white" style="width: 32px; height: 32px;">
                    <i class="bi bi-person-fill"></i>
                </div>
            </div>
        </div>

        <?= $this->renderSection('content') ?>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
