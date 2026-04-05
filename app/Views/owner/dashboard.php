<?= $this->extend('owner/layout') ?>

<?= $this->section('content') ?>
<div class="mb-4">
    <h3 class="fw-800">Ringkasan Bisnis</h3>
    <p class="text-muted">Selamat datang di panel kontrol bisnis Anda.</p>
</div>

<div class="row g-4 mb-4">
    <div class="col-md-3">
        <div class="card h-100">
            <div class="card-body">
                <div class="d-flex align-items-center mb-3">
                    <div class="bg-primary bg-opacity-10 p-2 rounded-3 me-3">
                        <i class="bi bi-wallet2 text-primary fs-4"></i>
                    </div>
                    <h6 class="card-subtitle text-muted mb-0">Pendapatan Bulan Ini</h6>
                </div>
                <h3 class="card-title fw-bold mb-0">Rp <?= number_format($pendapatan_bulan_ini, 0, ',', '.') ?></h3>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card h-100">
            <div class="card-body">
                <div class="d-flex align-items-center mb-3">
                    <div class="bg-success bg-opacity-10 p-2 rounded-3 me-3">
                        <i class="bi bi-cart-check text-success fs-4"></i>
                    </div>
                    <h6 class="card-subtitle text-muted mb-0">Total Transaksi</h6>
                </div>
                <h3 class="card-title fw-bold mb-0"><?= $total_transaksi ?></h3>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card h-100">
            <div class="card-body">
                <div class="d-flex align-items-center mb-3">
                    <div class="bg-warning bg-opacity-10 p-2 rounded-3 me-3">
                        <i class="bi bi-box-seam text-warning fs-4"></i>
                    </div>
                    <h6 class="card-subtitle text-muted mb-0">Produk Terdaftar</h6>
                </div>
                <h3 class="card-title fw-bold mb-0"><?= $total_produk ?></h3>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card h-100">
            <div class="card-body">
                <div class="d-flex align-items-center mb-3">
                    <div class="bg-danger bg-opacity-10 p-2 rounded-3 me-3">
                        <i class="bi bi-exclamation-triangle text-danger fs-4"></i>
                    </div>
                    <h6 class="card-subtitle text-muted mb-0">Stok Menipis</h6>
                </div>
                <h3 class="card-title fw-bold mb-0"><?= $stok_menipis ?> Item</h3>
            </div>
        </div>
    </div>
</div>

<div class="row g-4">
    <div class="col-md-6">
        <div class="card h-100">
            <div class="card-header bg-white border-0 py-3">
                <h5 class="fw-bold mb-0">Menu Utama</h5>
            </div>
            <div class="card-body">
                <div class="list-group list-group-flush">
                    <a href="<?= base_url('owner/laporan-penjualan') ?>" class="list-group-item list-group-item-action border-0 px-0 d-flex align-items-center py-3">
                        <div class="bg-light p-2 rounded-3 me-3">
                            <i class="bi bi-graph-up-arrow text-primary"></i>
                        </div>
                        <div>
                            <h6 class="mb-0 fw-bold">Analisis Penjualan</h6>
                            <small class="text-muted">Lihat laporan transaksi detail</small>
                        </div>
                        <i class="bi bi-chevron-right ms-auto text-muted"></i>
                    </a>
                    <a href="<?= base_url('owner/atur-harga') ?>" class="list-group-item list-group-item-action border-0 px-0 d-flex align-items-center py-3">
                        <div class="bg-light p-2 rounded-3 me-3">
                            <i class="bi bi-tag text-success"></i>
                        </div>
                        <div>
                            <h6 class="mb-0 fw-bold">Atur Harga Produk</h6>
                            <small class="text-muted">Sesuaikan harga jual menu</small>
                        </div>
                        <i class="bi bi-chevron-right ms-auto text-muted"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card h-100">
            <div class="card-header bg-white border-0 py-3">
                <h5 class="fw-bold mb-0">Informasi Stok</h5>
            </div>
            <div class="card-body">
                <div class="list-group list-group-flush">
                    <a href="<?= base_url('owner/stok-bahan-baku') ?>" class="list-group-item list-group-item-action border-0 px-0 d-flex align-items-center py-3">
                        <div class="bg-light p-2 rounded-3 me-3">
                            <i class="bi bi-search text-warning"></i>
                        </div>
                        <div>
                            <h6 class="mb-0 fw-bold">Monitoring Bahan Baku</h6>
                            <small class="text-muted">Cek stok bahan saat ini</small>
                        </div>
                        <i class="bi bi-chevron-right ms-auto text-muted"></i>
                    </a>
                    <a href="<?= base_url('owner/laporan-stok') ?>" class="list-group-item list-group-item-action border-0 px-0 d-flex align-items-center py-3">
                        <div class="bg-light p-2 rounded-3 me-3">
                            <i class="bi bi-file-earmark-spreadsheet text-info"></i>
                        </div>
                        <div>
                            <h6 class="mb-0 fw-bold">Laporan Inventaris</h6>
                            <small class="text-muted">Cetak data stok lengkap</small>
                        </div>
                        <i class="bi bi-chevron-right ms-auto text-muted"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .fw-800 { font-weight: 800; }
</style>
<?= $this->endSection() ?>
