<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Owner Dashboard - Skripsi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; }
        .sidebar { min-height: 100vh; background-color: #343a40; padding-top: 20px; }
        .sidebar a { color: #fff; text-decoration: none; display: block; padding: 10px 20px; }
        .sidebar a:hover { background-color: #495057; }
        .content { padding: 20px; }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-2 sidebar">
                <h4 class="text-white text-center">Owner</h4>
                <hr class="bg-white">
                <a href="<?= base_url('owner') ?>">Dashboard</a>
                <a href="<?= base_url('owner/stok-bahan-baku') ?>">Monitoring Stok</a>
                <a href="<?= base_url('owner/laporan-penjualan') ?>">Laporan Penjualan</a>
                <a href="<?= base_url('owner/laporan-stok') ?>">Laporan Stok</a>
                <a href="<?= base_url('owner/atur-harga') ?>">Atur Harga Produk</a>
            </nav>
            <main class="col-md-10 content">
                <?php if (session()->getFlashdata('success')): ?>
                    <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
                <?php endif; ?>
                <?php if (session()->getFlashdata('error')): ?>
                    <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
                <?php endif; ?>

                <?= $this->renderSection('content') ?>
            </main>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
