<?= $this->extend('gudang/layout') ?>

<?= $this->section('content') ?>
<div class="row mb-4">
    <div class="col-12">
        <div class="d-flex justify-content-between align-items-center bg-white p-4 rounded-4 shadow-sm">
            <div>
                <h3 class="fw-800 mb-1">Status Inventaris</h3>
                <p class="text-muted mb-0">Kelola arus masuk dan keluar bahan baku dengan efisien.</p>
            </div>
            <div class="text-end">
                <div class="badge bg-warning text-dark px-3 py-2 rounded-pill fw-bold">
                    <i class="bi bi-clock-history me-1"></i> Terakhir Update: <?= date('H:i') ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row g-4 mb-4">
    <div class="col-md-4">
        <div class="card h-100 bg-white">
            <div class="card-body p-4 text-center">
                <div class="bg-primary bg-opacity-10 p-3 rounded-circle d-inline-flex mb-3">
                    <i class="bi bi-box-seam text-primary fs-3"></i>
                </div>
                <h6 class="text-muted text-uppercase small fw-bold mb-2">Total Jenis Bahan</h6>
                <h2 class="fw-800 mb-0"><?= $total_item ?></h2>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card h-100 bg-white border-start border-warning border-4">
            <div class="card-body p-4 text-center">
                <div class="bg-warning bg-opacity-10 p-3 rounded-circle d-inline-flex mb-3">
                    <i class="bi bi-exclamation-diamond text-warning fs-3"></i>
                </div>
                <h6 class="text-muted text-uppercase small fw-bold mb-2">Stok Perlu Perhatian</h6>
                <h2 class="fw-800 mb-0"><?= count($notifikasi) ?></h2>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card h-100 bg-primary text-white shadow-lg">
            <div class="card-body p-4 d-flex flex-column justify-content-center align-items-center">
                <h6 class="text-white text-opacity-75 text-uppercase small fw-bold mb-3 text-center">Aksi Cepat</h6>
                <div class="d-flex gap-2">
                    <a href="<?= base_url('gudang/monitoring') ?>" class="btn btn-light btn-sm fw-bold px-3">Update Stok</a>
                    <a href="<?= base_url('gudang/pemesanan') ?>" class="btn btn-outline-light btn-sm fw-bold px-3">Buat Pesanan</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php if (!empty($notifikasi)): ?>
<div class="row mt-4">
    <div class="col-12">
        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-header bg-white py-3 border-bottom-0">
                <h5 class="mb-0 fw-bold text-danger d-flex align-items-center">
                    <span class="pulse-red me-2"></span> Notifikasi Mendesak
                </h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="bg-light">
                            <tr>
                                <th class="border-0 rounded-start">Nama Bahan</th>
                                <th class="border-0">Stok Sisa</th>
                                <th class="border-0">Kebutuhan Minimal</th>
                                <th class="border-0 rounded-end text-center">Tindakan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($notifikasi as $notif): ?>
                                <tr>
                                    <td class="fw-bold"><?= $notif['nama'] ?></td>
                                    <td>
                                        <span class="text-<?= ($notif['stok'] <= 0) ? 'danger' : 'warning' ?> fw-bold">
                                            <?= $notif['stok'] ?> <?= $notif['satuan'] ?>
                                        </span>
                                    </td>
                                    <td class="text-muted"><?= $notif['stok_minimal'] ?> <?= $notif['satuan'] ?></td>
                                    <td class="text-center">
                                        <a href="<?= base_url('gudang/pemesanan') ?>" class="btn btn-sm btn-outline-danger rounded-pill px-3">Pesan Sekarang</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>

<style>
    .fw-800 { font-weight: 800; }
    .pulse-red {
        width: 12px;
        height: 12px;
        background: #ef4444;
        border-radius: 50%;
        box-shadow: 0 0 0 rgba(239, 68, 68, 0.4);
        animation: pulse-red 2s infinite;
    }
    @keyframes pulse-red {
        0% { transform: scale(0.95); box-shadow: 0 0 0 0 rgba(239, 68, 68, 0.7); }
        70% { transform: scale(1); box-shadow: 0 0 0 10px rgba(239, 68, 68, 0); }
        100% { transform: scale(0.95); box-shadow: 0 0 0 0 rgba(239, 68, 68, 0); }
    }
</style>
<?= $this->endSection() ?>
