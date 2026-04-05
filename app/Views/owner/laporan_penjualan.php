<?= $this->extend('owner/layout') ?>

<?= $this->section('content') ?>
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 class="fw-bold mb-1">Laporan Penjualan</h4>
        <p class="text-muted small mb-0">Rekapitulasi transaksi penjualan produk secara detail.</p>
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
                        <th class="ps-4 py-3 border-0 text-uppercase small fw-bold text-muted">Tanggal & Waktu</th>
                        <th class="py-3 border-0 text-uppercase small fw-bold text-muted">Nama Produk</th>
                        <th class="py-3 border-0 text-uppercase small fw-bold text-muted text-center">Jumlah</th>
                        <th class="pe-4 py-3 border-0 text-uppercase small fw-bold text-muted text-end">Total Harga</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $total_pendapatan = 0; ?>
                    <?php if (empty($penjualan)): ?>
                        <tr>
                            <td colspan="4" class="text-center py-5 text-muted">
                                <i class="bi bi-journal-x fs-1 d-block mb-2 opacity-25"></i>
                                Belum ada data transaksi penjualan.
                            </td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($penjualan as $item): ?>
                            <tr>
                                <td class="ps-4 py-3">
                                    <div class="fw-bold text-dark"><?= date('d M Y', strtotime($item['tanggal'])) ?></div>
                                    <div class="text-muted extra-small"><?= date('H:i', strtotime($item['tanggal'])) ?> WIB</div>
                                </td>
                                <td class="py-3">
                                    <div class="d-flex align-items-center">
                                        <div class="bg-primary bg-opacity-10 p-2 rounded-3 me-3 text-primary">
                                            <i class="bi bi-cart-check-fill"></i>
                                        </div>
                                        <div class="fw-bold text-dark"><?= $item['nama_produk'] ?></div>
                                    </div>
                                </td>
                                <td class="py-3 text-center fw-bold"><?= $item['jumlah'] ?></td>
                                <td class="pe-4 py-3 text-end fw-bold text-primary">
                                    Rp <?= number_format($item['total_harga'], 0, ',', '.') ?>
                                </td>
                            </tr>
                            <?php $total_pendapatan += $item['total_harga']; ?>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
                <tfoot class="bg-light">
                    <tr>
                        <th colspan="3" class="ps-4 py-3 border-0 text-uppercase small fw-bold text-dark text-end">Total Pendapatan</th>
                        <th class="pe-4 py-3 border-0 text-end fs-5 fw-800 text-primary">
                            Rp <?= number_format($total_pendapatan, 0, ',', '.') ?>
                        </th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>

<style>
    .fw-800 { font-weight: 800; }
    .extra-small { font-size: 0.75rem; }
    .table tbody tr:hover { background-color: #f8fafc; }
    @media print {
        .sidebar, .top-navbar, .btn, .mb-4 p { display: none !important; }
        .main-content { margin-left: 0 !important; padding: 0 !important; }
        .card { box-shadow: none !important; border: 1px solid #eee !important; }
    }
</style>
<?= $this->endSection() ?>
