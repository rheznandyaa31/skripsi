<?= $this->extend('owner/layout') ?>

<?= $this->section('content') ?>
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 class="fw-bold mb-1">Laporan Stok Inventaris</h4>
        <p class="text-muted small mb-0">Daftar lengkap ketersediaan seluruh bahan baku.</p>
    </div>
    <button class="btn btn-primary shadow-sm px-4 py-2 rounded-3 fw-bold" onclick="window.print()">
        <i class="bi bi-printer-fill me-2"></i> Cetak Laporan
    </button>
</div>

<div class="card border-0 shadow-sm rounded-4 overflow-hidden mb-4">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-light">
                    <tr>
                        <th class="ps-4 py-3 border-0 text-uppercase small fw-bold text-muted">Bahan Baku</th>
                        <th class="py-3 border-0 text-uppercase small fw-bold text-muted text-center">Stok Sisa</th>
                        <th class="py-3 border-0 text-uppercase small fw-bold text-muted text-center">Satuan</th>
                        <th class="pe-4 py-3 border-0 text-uppercase small fw-bold text-muted text-end">Batas Minimal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($bahan_baku as $item): ?>
                        <tr>
                            <td class="ps-4 py-3">
                                <div class="fw-bold text-dark"><?= $item['nama'] ?></div>
                            </td>
                            <td class="py-3 text-center fw-bold">
                                <span class="<?= ($item['stok'] <= $item['stok_minimal']) ? 'text-danger' : 'text-dark' ?>">
                                    <?= $item['stok'] ?>
                                </span>
                            </td>
                            <td class="py-3 text-center text-muted small"><?= $item['satuan'] ?></td>
                            <td class="pe-4 py-3 text-end text-muted small"><?= $item['stok_minimal'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<style>
    .table tbody tr:hover { background-color: #f8fafc; }
    @media print {
        .sidebar, .top-navbar, .btn, .mb-4 p { display: none !important; }
        .main-content { margin-left: 0 !important; padding: 0 !important; }
        .card { box-shadow: none !important; border: 1px solid #eee !important; }
    }
</style>
<?= $this->endSection() ?>
