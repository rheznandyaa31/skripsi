<?= $this->extend('gudang/layout') ?>

<?= $this->section('content') ?>
<div class="row mb-4">
    <div class="col-12">
        <h2 class="fw-bold">Dashboard Gudang</h2>
        <p class="text-muted">Selamat datang kembali, Petugas Gudang.</p>
    </div>
</div>

<div class="row g-4">
    <div class="col-md-4">
        <div class="card border-0 shadow-sm p-3 bg-primary text-white">
            <div class="d-flex align-items-center">
                <div class="fs-1 me-3"><i class="bi bi-box"></i></div>
                <div>
                    <h6 class="mb-0 opacity-75">Total Item</h6>
                    <h3 class="mb-0 fw-bold"><?= $total_item ?></h3>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card border-0 shadow-sm p-3 bg-warning text-dark">
            <div class="d-flex align-items-center">
                <div class="fs-1 me-3"><i class="bi bi-exclamation-triangle"></i></div>
                <div>
                    <h6 class="mb-0 opacity-75">Stok Menipis</h6>
                    <h3 class="mb-0 fw-bold"><?= count($notifikasi) ?></h3>
                </div>
            </div>
        </div>
    </div>
</div>

<?php if (!empty($notifikasi)): ?>
<div class="row mt-4">
    <div class="col-12">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white py-3 border-bottom-0">
                <h5 class="mb-0 fw-bold text-danger"><i class="bi bi-bell-fill me-2"></i>Notifikasi Stok Habis / Menipis</h5>
            </div>
            <div class="card-body">
                <div class="list-group list-group-flush">
                    <?php foreach ($notifikasi as $notif): ?>
                        <div class="list-group-item d-flex justify-content-between align-items-center px-0">
                            <div>
                                <h6 class="mb-0"><?= $notif['nama'] ?></h6>
                                <small class="text-muted">Tersisa: <?= $notif['stok'] ?> <?= $notif['satuan'] ?> (Batas Minimal: <?= $notif['stok_minimal'] ?>)</small>
                            </div>
                            <span class="badge bg-<?= ($notif['stok'] <= 0) ? 'danger' : 'warning' ?>">
                                <?= ($notif['stok'] <= 0) ? 'Habis' : 'Menipis' ?>
                            </span>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="mt-3">
                    <a href="<?= base_url('gudang/pemesanan') ?>" class="btn btn-outline-primary btn-sm">Lakukan Pemesanan</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>
<?= $this->endSection() ?>
