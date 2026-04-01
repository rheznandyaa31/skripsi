<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h3 class="fw-800 mb-1">Ringkasan Sistem</h3>
        <p class="text-muted">Pantau aktivitas sistem Anda hari ini.</p>
    </div>
    <div class="text-muted small">
        <i class="bi bi-calendar3 me-2"></i><?= date('l, d F Y') ?>
    </div>
</div>

<div class="row g-4 mb-4">
    <div class="col-md-3">
        <div class="card border-0 shadow-sm h-100" style="border-left: 4px solid #6366f1 !important;">
            <div class="card-body p-4">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="bg-indigo-soft p-3 rounded-4">
                        <i class="bi bi-people-fill text-indigo fs-4"></i>
                    </div>
                </div>
                <h6 class="text-muted mb-1">Total Pengguna</h6>
                <h2 class="fw-800 mb-0"><?= $total_users ?></h2>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card border-0 shadow-sm h-100" style="border-left: 4px solid #10b981 !important;">
            <div class="card-body p-4">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="bg-success-soft p-3 rounded-4">
                        <i class="bi bi-box-seam-fill text-success fs-4"></i>
                    </div>
                </div>
                <h6 class="text-muted mb-1">Total Produk</h6>
                <h2 class="fw-800 mb-0"><?= $total_produk ?></h2>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card border-0 shadow-sm h-100" style="border-left: 4px solid #f59e0b !important;">
            <div class="card-body p-4">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="bg-warning-soft p-3 rounded-4">
                        <i class="bi bi-database-fill text-warning fs-4"></i>
                    </div>
                </div>
                <h6 class="text-muted mb-1">Total Bahan Baku</h6>
                <h2 class="fw-800 mb-0"><?= $total_bahan ?></h2>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card border-0 shadow-sm h-100" style="border-left: 4px solid #ef4444 !important;">
            <div class="card-body p-4">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="bg-danger-soft p-3 rounded-4">
                        <i class="bi bi-cart-check-fill text-danger fs-4"></i>
                    </div>
                </div>
                <h6 class="text-muted mb-1">Total Penjualan</h6>
                <h2 class="fw-800 mb-0"><?= $total_penjualan ?></h2>
            </div>
        </div>
    </div>
</div>

<div class="row g-4">
    <div class="col-md-8">
        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-header bg-white py-3 border-0 rounded-t-4">
                <h5 class="mb-0 fw-700">Akses Cepat</h5>
            </div>
            <div class="card-body p-4">
                <div class="row g-3">
                    <div class="col-md-6">
                        <a href="<?= base_url('admin/users') ?>" class="quick-access-card bg-light p-4 rounded-4 text-decoration-none d-block">
                            <div class="d-flex align-items-center gap-3">
                                <div class="bg-white p-3 rounded-3 shadow-sm text-primary">
                                    <i class="bi bi-person-plus-fill fs-4"></i>
                                </div>
                                <div>
                                    <h6 class="mb-0 fw-bold text-dark">Tambah User</h6>
                                    <small class="text-muted">Kelola akun sistem</small>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-6">
                        <a href="<?= base_url('admin/stok') ?>" class="quick-access-card bg-light p-4 rounded-4 text-decoration-none d-block">
                            <div class="d-flex align-items-center gap-3">
                                <div class="bg-white p-3 rounded-3 shadow-sm text-success">
                                    <i class="bi bi-truck fs-4"></i>
                                </div>
                                <div>
                                    <h6 class="mb-0 fw-bold text-dark">Pesan Bahan</h6>
                                    <small class="text-muted">Restok bahan baku</small>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card border-0 shadow-sm rounded-4 bg-dark text-white h-100 overflow-hidden position-relative">
            <div class="card-body p-4 position-relative z-1">
                <h5 class="fw-bold mb-3">Status Sistem</h5>
                <div class="d-flex align-items-center gap-2 mb-4">
                    <span class="pulse-green"></span>
                    <span class="small opacity-75">Server Berjalan Normal</span>
                </div>
                <hr class="opacity-25 mb-4">
                <div class="small opacity-75 mb-1">Versi Aplikasi</div>
                <div class="fw-bold mb-3">v1.0.0-beta</div>
                <div class="small opacity-75 mb-1">Database</div>
                <div class="fw-bold">MySQL (skripsi)</div>
            </div>
            <div class="position-absolute bottom-0 end-0 p-3 opacity-10">
                <i class="bi bi-cpu-fill" style="font-size: 100px;"></i>
            </div>
        </div>
    </div>
</div>

<style>
    .fw-800 { font-weight: 800; }
    .fw-700 { font-weight: 700; }
    
    .bg-indigo-soft { background-color: #eef2ff; }
    .text-indigo { color: #6366f1; }
    
    .bg-success-soft { background-color: #ecfdf5; }
    .bg-warning-soft { background-color: #fffbeb; }
    .bg-danger-soft { background-color: #fef2f2; }
    
    .quick-access-card {
        border: 2px solid transparent;
        transition: all 0.3s ease;
    }
    .quick-access-card:hover {
        border-color: #6366f1;
        background-color: white !important;
        transform: translateY(-5px);
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.05);
    }
    
    .pulse-green {
        width: 10px;
        height: 10px;
        background: #10b981;
        border-radius: 50%;
        box-shadow: 0 0 0 rgba(16, 185, 129, 0.4);
        animation: pulse 2s infinite;
    }
    
    @keyframes pulse {
        0% { transform: scale(0.95); box-shadow: 0 0 0 0 rgba(16, 185, 129, 0.7); }
        70% { transform: scale(1); box-shadow: 0 0 0 10px rgba(16, 185, 129, 0); }
        100% { transform: scale(0.95); box-shadow: 0 0 0 0 rgba(16, 185, 129, 0); }
    }
</style>
<?= $this->endSection() ?>
