<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Skripsi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f4f6f9; }
        .sidebar { min-height: 100vh; background-color: #212529; padding-top: 20px; }
        .sidebar a { color: #adb5bd; text-decoration: none; display: block; padding: 12px 20px; transition: 0.3s; }
        .sidebar a:hover { color: #fff; background-color: #343a40; }
        .sidebar a.active { color: #fff; background-color: #0d6efd; }
        .content { padding: 30px; }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-2 sidebar">
                <h4 class="text-white text-center mb-4">Admin Sistem</h4>
                <hr class="bg-secondary">
                <a href="<?= base_url('admin') ?>">Dashboard</a>
                <a href="<?= base_url('admin/users') ?>">Kelola Pengguna</a>
                <a href="<?= base_url('admin/produk') ?>">Kelola Produk</a>
                <a href="<?= base_url('admin/stok') ?>">Stok & Pemesanan</a>
                <a href="<?= base_url('admin/laporan') ?>">Laporan</a>
                <hr class="bg-secondary">
                <a href="<?= base_url('owner') ?>" target="_blank">Lihat Sisi Owner</a>
            </nav>
            <main class="col-md-10 content">
                <?php if (session()->getFlashdata('success')): ?>
                    <div class="alert alert-success alert-dismissible fade show">
                        <?= session()->getFlashdata('success') ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                <?php endif; ?>
                <?= $this->renderSection('content') ?>
            </main>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
