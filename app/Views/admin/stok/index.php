<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>
<div class="mb-4">
    <h4 class="fw-bold mb-1">Stok & Pemesanan Bahan</h4>
    <p class="text-muted small mb-0">Monitor ketersediaan bahan baku dan kelola pemesanan ke supplier.</p>
</div>

<div class="row g-4">
    <div class="col-md-8">
        <div class="card border-0 shadow-sm rounded-4 overflow-hidden h-100">
            <div class="card-header bg-white py-3 border-0">
                <h5 class="mb-0 fw-bold">Daftar Stok Bahan Baku</h5>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="bg-light">
                            <tr>
                                <th class="ps-4 py-3 border-0 text-uppercase small fw-bold text-muted">Bahan Baku</th>
                                <th class="py-3 border-0 text-uppercase small fw-bold text-muted text-center">Stok</th>
                                <th class="py-3 border-0 text-uppercase small fw-bold text-muted text-center">Satuan</th>
                                <th class="pe-4 py-3 border-0 text-uppercase small fw-bold text-muted text-end">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($bahan_baku as $item): ?>
                                <tr>
                                    <td class="ps-4 py-3">
                                        <div class="fw-bold text-dark"><?= $item['nama'] ?></div>
                                        <small class="text-muted">Min. Stok: <?= $item['stok_minimal'] ?></small>
                                    </td>
                                    <td class="py-3 text-center fw-bold"><?= $item['stok'] ?></td>
                                    <td class="py-3 text-center text-muted"><?= $item['satuan'] ?></td>
                                    <td class="pe-4 py-3 text-end">
                                        <?php if ($item['stok'] <= $item['stok_minimal']): ?>
                                            <span class="badge rounded-pill bg-danger bg-opacity-10 text-danger px-3 py-2 border border-danger border-opacity-10">
                                                <i class="bi bi-exclamation-triangle-fill me-1"></i> Butuh Pesan
                                            </span>
                                        <?php else: ?>
                                            <span class="badge rounded-pill bg-success bg-opacity-10 text-success px-3 py-2 border border-success border-opacity-10">
                                                <i class="bi bi-check-circle-fill me-1"></i> Aman
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
    </div>
    <div class="col-md-4">
        <div class="card border-0 shadow-sm rounded-4 mb-4">
            <div class="card-header bg-white py-3 border-0">
                <h5 class="mb-0 fw-bold">Pesan Bahan Baru</h5>
            </div>
            <div class="card-body pt-0">
                <form action="<?= base_url('admin/stok/pesan') ?>" method="post">
                    <div class="mb-3">
                        <label class="form-label small fw-bold text-muted text-uppercase">Bahan Baku</label>
                        <select name="bahan_baku_id" class="form-select bg-light border-0 rounded-3 py-2" required>
                            <option value="" disabled selected>Pilih Bahan...</option>
                            <?php foreach ($bahan_baku as $item): ?>
                                <option value="<?= $item['id'] ?>"><?= $item['nama'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-bold text-muted text-uppercase">Jumlah</label>
                        <input type="number" name="jumlah" class="form-control bg-light border-0 rounded-3 py-2" placeholder="0" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-bold text-muted text-uppercase">Supplier</label>
                        <input type="text" name="supplier" class="form-control bg-light border-0 rounded-3 py-2" placeholder="Nama Toko/Pemasok" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100 py-2 rounded-3 fw-bold">
                        <i class="bi bi-cart-plus-fill me-2"></i> Buat Pesanan
                    </button>
                </form>
            </div>
        </div>
        <div class="card border-0 shadow-sm rounded-4 h-100">
            <div class="card-header bg-white py-3 border-0">
                <h5 class="mb-0 fw-bold">Riwayat Pemesanan</h5>
            </div>
            <div class="card-body p-0">
                <div class="list-group list-group-flush">
                    <?php if (empty($pemesanan)): ?>
                        <div class="p-4 text-center text-muted">
                            <i class="bi bi-inbox fs-1 d-block mb-2 opacity-25"></i>
                            <small>Belum ada riwayat pemesanan</small>
                        </div>
                    <?php else: ?>
                        <?php foreach ($pemesanan as $pesan): ?>
                            <div class="list-group-item border-0 px-4 py-3">
                                <div class="d-flex w-100 justify-content-between align-items-center mb-1">
                                    <h6 class="mb-0 fw-bold text-dark"><?= $pesan['nama_bahan'] ?></h6>
                                    <span class="badge bg-secondary bg-opacity-10 text-secondary px-2 py-1 rounded-pill small">
                                        <?= ucfirst($pesan['status']) ?>
                                    </span>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <small class="text-primary fw-medium"><?= $pesan['supplier'] ?> (<?= $pesan['jumlah'] ?>)</small>
                                    <small class="text-muted extra-small"><?= date('d M, H:i', strtotime($pesan['tanggal_pesan'])) ?></small>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .extra-small {
        font-size: 0.75rem;
    }
    .badge {
        font-weight: 600;
        letter-spacing: 0.01em;
    }
    .form-select:focus, .form-control:focus {
        background-color: #fff !important;
        box-shadow: 0 0 0 0.25rem rgba(99, 102, 241, 0.1);
        border: 1px solid #6366f1 !important;
    }
</style>
<?= $this->endSection() ?>
