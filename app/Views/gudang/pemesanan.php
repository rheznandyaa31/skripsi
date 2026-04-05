<?= $this->extend('gudang/layout') ?>

<?= $this->section('content') ?>
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h3 class="fw-800 mb-1 text-dark">Pemesanan Bahan Baku</h3>
        <p class="text-muted small mb-0">Kelola permintaan stok baru kepada supplier/pemasok.</p>
    </div>
</div>

<div class="row g-4">
    <div class="col-md-5">
        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-header bg-white py-4 px-4 border-0">
                <h5 class="mb-0 fw-bold"><i class="bi bi-cart-plus me-2 text-primary"></i>Form Pemesanan</h5>
            </div>
            <div class="card-body px-4 pt-0">
                <form action="<?= base_url('gudang/buat-pesanan') ?>" method="post">
                    <div class="mb-4">
                        <label class="form-label small fw-bold text-muted text-uppercase">Bahan Baku</label>
                        <select name="bahan_baku_id" class="form-select bg-light border-0 rounded-3 py-2 shadow-none" required>
                            <option value="" disabled selected>Pilih bahan...</option>
                            <?php foreach ($bahan_baku as $item): ?>
                                <option value="<?= $item['id'] ?>"><?= $item['nama'] ?> (Stok: <?= $item['stok'] ?>)</option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label class="form-label small fw-bold text-muted text-uppercase">Jumlah Pesanan</label>
                        <div class="input-group">
                            <input type="number" name="jumlah" class="form-control bg-light border-0 rounded-start-3 py-2 shadow-none" min="1" placeholder="0" required>
                            <span class="input-group-text bg-light border-0 rounded-end-3 text-muted fw-bold">Unit</span>
                        </div>
                    </div>
                    <div class="mb-4">
                        <label class="form-label small fw-bold text-muted text-uppercase">Nama Supplier / Toko</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-0 rounded-start-3 text-muted"><i class="bi bi-shop"></i></span>
                            <input type="text" name="supplier" class="form-control bg-light border-0 rounded-end-3 py-2 shadow-none" placeholder="Contoh: Toko Berkah" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary w-100 py-3 rounded-3 fw-bold shadow-sm mb-3">
                        <i class="bi bi-send-fill me-2"></i> Ajukan Pemesanan
                    </button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-7">
        <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
            <div class="card-header bg-white py-4 px-4 border-0">
                <h5 class="mb-0 fw-bold"><i class="bi bi-clock-history me-2 text-primary"></i>Riwayat Pemesanan</h5>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="bg-light">
                            <tr>
                                <th class="ps-4 py-3 border-0 text-uppercase extra-small fw-800 text-muted">Tanggal</th>
                                <th class="py-3 border-0 text-uppercase extra-small fw-800 text-muted">Bahan</th>
                                <th class="py-3 border-0 text-uppercase extra-small fw-800 text-muted text-center">Qty</th>
                                <th class="py-3 border-0 text-uppercase extra-small fw-800 text-muted">Supplier</th>
                                <th class="pe-4 py-3 border-0 text-uppercase extra-small fw-800 text-muted text-end">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($pemesanan)): ?>
                                <tr>
                                    <td colspan="5" class="text-center py-5 text-muted small">Belum ada riwayat pemesanan.</td>
                                </tr>
                            <?php else: ?>
                                <?php foreach ($pemesanan as $pesan): ?>
                                    <tr>
                                        <td class="ps-4 py-4 small text-muted">
                                            <?= date('d/m/y', strtotime($pesan['tanggal_pesan'])) ?>
                                            <div class="extra-small opacity-75"><?= date('H:i', strtotime($pesan['tanggal_pesan'])) ?></div>
                                        </td>
                                        <td class="py-4 fw-bold text-dark"><?= $pesan['nama_bahan'] ?></td>
                                        <td class="py-4 text-center fw-bold text-primary"><?= $pesan['jumlah'] ?></td>
                                        <td class="py-4 small text-muted"><?= $pesan['supplier'] ?></td>
                                        <td class="pe-4 py-4 text-end">
                                            <span class="badge rounded-pill bg-secondary bg-opacity-10 text-secondary px-3 py-2 border border-secondary border-opacity-10">
                                                <?= ucfirst($pesan['status']) ?>
                                            </span>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .fw-800 { font-weight: 800; }
    .extra-small { font-size: 0.75rem; }
    .table tbody tr:hover { background-color: #f8fafc; }
    .form-select:focus, .form-control:focus {
        background-color: #fff !important;
        box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.1) !important;
        border: 1px solid #0d6efd !important;
    }
</style>
<?= $this->endSection() ?>
