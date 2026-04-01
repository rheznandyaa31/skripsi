<?= $this->extend('owner/layout') ?>

<?= $this->section('content') ?>
<div class="card">
    <div class="card-header bg-primary text-white">
        <h2>Dashboard Owner</h2>
    </div>
    <div class="card-body">
        <p>Selamat datang di sistem monitoring skripsi.</p>
        <div class="row">
            <div class="col-md-3">
                <div class="card bg-info text-white mb-4">
                    <div class="card-body">Monitoring Stok</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="<?= base_url('owner/stok-bahan-baku') ?>">Lihat Detail</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-success text-white mb-4">
                    <div class="card-body">Laporan Penjualan</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="<?= base_url('owner/laporan-penjualan') ?>">Lihat Detail</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-warning text-dark mb-4">
                    <div class="card-body">Laporan Stok</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-dark stretched-link" href="<?= base_url('owner/laporan-stok') ?>">Lihat Detail</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-danger text-white mb-4">
                    <div class="card-body">Atur Harga</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="<?= base_url('owner/atur-harga') ?>">Lihat Detail</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
