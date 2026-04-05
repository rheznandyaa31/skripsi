<?= $this->extend('owner/layout') ?>

<?= $this->section('content') ?>
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h3 class="fw-800 mb-1 text-dark">Monitoring Bahan Baku</h3>
        <p class="text-muted small mb-0">Kelola dan pantau persediaan stok untuk kelancaran produksi.</p>
    </div>
    <div class="d-flex gap-3 align-items-center">
        <div class="text-end me-2">
            <div class="text-muted extra-small text-uppercase fw-bold">Update Terakhir</div>
            <div class="fw-bold text-dark"><?= date('H:i') ?> WIB</div>
        </div>
        <button class="btn btn-primary shadow-sm px-4 py-2 rounded-4 fw-bold" onclick="window.location.reload()">
            <i class="bi bi-arrow-clockwise me-2"></i> Refresh
        </button>
    </div>
</div>

<?php if (!empty($notifikasi)): ?>
    <div class="alert border-0 shadow-sm rounded-4 p-4 mb-4" style="background: #fff9db; border-left: 6px solid #fab005 !important;">
        <div class="d-flex align-items-start">
            <div class="bg-warning bg-opacity-20 p-3 rounded-4 me-4 text-warning shadow-sm">
                <i class="bi bi-exclamation-octagon-fill fs-3"></i>
            </div>
            <div>
                <h5 class="fw-bold text-dark mb-1">Perhatian: Stok Kritis!</h5>
                <p class="text-muted small mb-3">Beberapa bahan baku berikut memerlukan pengisian ulang segera untuk menghindari hambatan produksi.</p>
                <div class="d-flex flex-wrap gap-2">
                    <?php foreach ($notifikasi as $notif): ?>
                        <div class="badge bg-white border border-warning border-opacity-50 text-dark px-3 py-2 rounded-3 shadow-sm">
                            <span class="text-danger fw-bold"><?= $notif['nama'] ?></span>: <?= $notif['stok'] ?> <?= $notif['satuan'] ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>

<div class="card border-0 shadow-sm rounded-4 overflow-hidden">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead>
                    <tr class="bg-light">
                        <th class="ps-4 py-4 border-0 text-uppercase extra-small fw-800 text-muted" style="letter-spacing: 0.1em;">Detail Bahan Baku</th>
                        <th class="py-4 border-0 text-uppercase extra-small fw-800 text-muted text-center" style="letter-spacing: 0.1em;">Stok Saat Ini</th>
                        <th class="py-4 border-0 text-uppercase extra-small fw-800 text-muted text-center" style="letter-spacing: 0.1em;">Kebutuhan Minimal</th>
                        <th class="pe-4 py-4 border-0 text-uppercase extra-small fw-800 text-muted text-end" style="letter-spacing: 0.1em;">Status Ketersediaan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($bahan_baku as $item): ?>
                        <tr>
                            <td class="ps-4 py-4">
                                <div class="d-flex align-items-center">
                                    <div class="bg-light p-3 rounded-4 me-3 text-secondary">
                                        <i class="bi bi-box-seam fs-4"></i>
                                    </div>
                                    <div>
                                        <div class="fw-bold text-dark fs-5"><?= $item['nama'] ?></div>
                                        <div class="text-muted small">ID Bahan: #BB-0<?= $item['id'] ?></div>
                                    </div>
                                </div>
                            </td>
                            <td class="py-4 text-center">
                                <div class="fs-4 fw-800 <?= ($item['stok'] <= $item['stok_minimal']) ? 'text-danger' : 'text-dark' ?>">
                                    <?= $item['stok'] ?>
                                </div>
                                <div class="extra-small text-uppercase fw-bold text-muted"><?= $item['satuan'] ?></div>
                            </td>
                            <td class="py-4 text-center">
                                <div class="bg-light d-inline-block px-3 py-1 rounded-3 fw-bold text-muted small">
                                    <?= $item['stok_minimal'] ?> <?= $item['satuan'] ?>
                                </div>
                            </td>
                            <td class="pe-4 py-4 text-end">
                                <?php if ($item['stok'] <= 0): ?>
                                    <span class="status-badge bg-danger text-white">
                                        <i class="bi bi-x-circle-fill me-2"></i> Stok Habis
                                    </span>
                                <?php elseif ($item['stok'] <= $item['stok_minimal']): ?>
                                    <span class="status-badge bg-warning text-dark">
                                        <i class="bi bi-exclamation-triangle-fill me-2"></i> Perlu Re-stok
                                    </span>
                                <?php else: ?>
                                    <span class="status-badge bg-success text-white">
                                        <i class="bi bi-check-circle-fill me-2"></i> Stok Aman
                                    </span>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<style>
    .fw-800 { font-weight: 800; }
    .extra-small { font-size: 0.7rem; }
    
    .table tbody tr {
        transition: all 0.3s ease;
        border-bottom: 1px solid #f1f5f9;
    }
    
    .table tbody tr:last-child {
        border-bottom: none;
    }
    
    .table tbody tr:hover {
        background-color: #f8fafc;
        transform: scale(1.002);
    }
    
    .status-badge {
        padding: 10px 20px;
        border-radius: 14px;
        font-weight: 700;
        font-size: 0.85rem;
        display: inline-flex;
        align-items: center;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
    }
</style>
<?= $this->endSection() ?>
