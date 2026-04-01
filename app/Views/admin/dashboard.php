<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-12">
        <h2 class="mb-4">Dashboard Admin</h2>
        <div class="row g-4">
            <div class="col-md-3">
                <div class="card border-0 shadow-sm bg-primary text-white">
                    <div class="card-body p-4">
                        <h5 class="card-title opacity-75">Kelola Pengguna</h5>
                        <p class="card-text">Manajemen hak akses & akun.</p>
                        <a href="<?= base_url('admin/users') ?>" class="btn btn-light btn-sm mt-2">Buka</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-0 shadow-sm bg-success text-white">
                    <div class="card-body p-4">
                        <h5 class="card-title opacity-75">Data Stok</h5>
                        <p class="card-text">Pemesanan & monitoring bahan.</p>
                        <a href="<?= base_url('admin/stok') ?>" class="btn btn-light btn-sm mt-2">Buka</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-0 shadow-sm bg-info text-white">
                    <div class="card-body p-4">
                        <h5 class="card-title opacity-75">Kelola Produk</h5>
                        <p class="card-text">Daftar menu & harga.</p>
                        <a href="<?= base_url('admin/produk') ?>" class="btn btn-light btn-sm mt-2">Buka</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-0 shadow-sm bg-warning text-dark">
                    <div class="card-body p-4">
                        <h5 class="card-title opacity-75">Laporan</h5>
                        <p class="card-text">Log transaksi & aktivitas.</p>
                        <a href="<?= base_url('admin/laporan') ?>" class="btn btn-dark btn-sm mt-2">Buka</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
