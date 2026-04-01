<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gudang Dashboard - Skripsi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        body { background-color: #f8f9fa; }
        .sidebar { min-height: 100vh; background-color: #1a1d20; padding-top: 20px; }
        .sidebar a { color: #dee2e6; text-decoration: none; display: block; padding: 12px 20px; border-radius: 5px; margin: 4px 10px; }
        .sidebar a:hover { background-color: #2b3035; color: #fff; }
        .sidebar a.active { background-color: #0d6efd; color: #fff; }
        .content { padding: 25px; }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-2 sidebar">
                <div class="text-white text-center mb-4">
                    <i class="bi bi-box-seam fs-2"></i>
                    <h5 class="mt-2">Petugas Gudang</h5>
                </div>
                <hr class="bg-secondary mx-3">
                <a href="<?= base_url('gudang') ?>">Dashboard</a>
                <a href="<?= base_url('gudang/monitoring') ?>">Monitoring Stok</a>
                <a href="<?= base_url('gudang/pemesanan') ?>">Pemesanan Bahan</a>
            </nav>
            <main class="col-md-10 content">
                <?php if (session()->getFlashdata('success')): ?>
                    <div class="alert alert-success alert-dismissible fade show">
                        <?= session()->getFlashdata('success') ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                <?php endif; ?>
                <?php if (session()->getFlashdata('error')): ?>
                    <div class="alert alert-danger alert-dismissible fade show">
                        <?= session()->getFlashdata('error') ?>
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
