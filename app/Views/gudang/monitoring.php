<?= $this->extend('gudang/layout') ?>

<?= $this->section('content') ?>
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h3 class="fw-800 mb-1 text-dark">Monitoring Stok Bahan Baku</h3>
        <p class="text-muted small mb-0">Pantau dan kelola arus keluar masuk bahan baku produksi.</p>
    </div>
    <div class="text-muted small">
        <i class="bi bi-clock-history me-1"></i> Update: <?= date('H:i') ?> WIB
    </div>
</div>

<div class="row g-4">
    <div class="col-md-8">
        <div class="card border-0 shadow-sm rounded-4 overflow-hidden h-100">
            <div class="card-header bg-white py-4 px-4 border-0">
                <h5 class="mb-0 fw-bold"><i class="bi bi-list-ul me-2 text-primary"></i>Daftar Inventaris Saat Ini</h5>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="bg-light">
                            <tr>
                                <th class="ps-4 py-3 border-0 text-uppercase extra-small fw-800 text-muted">Bahan Baku</th>
                                <th class="py-3 border-0 text-uppercase extra-small fw-800 text-muted text-center">Stok</th>
                                <th class="py-3 border-0 text-uppercase extra-small fw-800 text-muted text-center">Minimal</th>
                                <th class="pe-4 py-3 border-0 text-uppercase extra-small fw-800 text-muted text-end">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($bahan_baku as $item): ?>
                                <tr>
                                    <td class="ps-4 py-4">
                                        <div class="d-flex align-items-center">
                                            <div class="bg-light p-2 rounded-3 me-3 text-secondary">
                                                <i class="bi bi-box-seam fs-5"></i>
                                            </div>
                                            <div>
                                                <div class="fw-bold text-dark"><?= $item['nama'] ?></div>
                                                <div class="extra-small text-muted">#BB-<?= str_pad($item['id'], 3, '0', STR_PAD_LEFT) ?></div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="py-4 text-center">
                                        <div class="fw-800 fs-5 <?= ($item['stok'] <= $item['stok_minimal']) ? 'text-danger' : 'text-dark' ?>">
                                            <?= $item['stok'] ?>
                                        </div>
                                        <div class="extra-small text-uppercase fw-bold text-muted"><?= $item['satuan'] ?></div>
                                    </td>
                                    <td class="py-4 text-center">
                                        <span class="badge bg-light text-muted border px-2 py-1"><?= $item['stok_minimal'] ?> <?= $item['satuan'] ?></span>
                                    </td>
                                    <td class="pe-4 py-4 text-end">
                                        <?php if ($item['stok'] <= 0): ?>
                                            <span class="badge rounded-pill bg-danger bg-opacity-10 text-danger px-3 py-2 border border-danger border-opacity-10">
                                                <i class="bi bi-x-circle-fill me-1"></i> Habis
                                            </span>
                                        <?php elseif ($item['stok'] <= $item['stok_minimal']): ?>
                                            <span class="badge rounded-pill bg-warning bg-opacity-10 text-warning px-3 py-2 border border-warning border-opacity-10">
                                                <i class="bi bi-exclamation-triangle-fill me-1"></i> Menipis
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
        <div class="card border-0 shadow-sm rounded-4 h-100">
            <div class="card-header bg-white py-4 px-4 border-0">
                <h5 class="mb-0 fw-bold"><i class="bi bi-plus-slash-minus me-2 text-primary"></i>Update Stok</h5>
            </div>
            <div class="card-body px-4 pt-0">
                <form action="<?= base_url('gudang/update-stok') ?>" method="post">
                    <div class="mb-4">
                        <label class="form-label small fw-bold text-muted text-uppercase">Pilih Bahan Baku</label>
                        <select name="bahan_baku_id" class="form-select bg-light border-0 rounded-3 py-2 shadow-none" required>
                            <option value="" disabled selected>Pilih bahan...</option>
                            <?php foreach ($bahan_baku as $item): ?>
                                <option value="<?= $item['id'] ?>"><?= $item['nama'] ?> (Stok: <?= $item['stok'] ?>)</option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    
                    <div class="mb-4">
                        <label class="form-label small fw-bold text-muted text-uppercase">Tipe Transaksi</label>
                        <div class="row g-2">
                            <div class="col-6">
                                <input type="radio" class="btn-check" name="tipe" id="tipeMasuk" value="masuk" checked>
                                <label class="btn btn-outline-success w-100 py-2 rounded-3 fw-bold" for="tipeMasuk">
                                    <i class="bi bi-arrow-down-circle me-2"></i>Masuk
                                </label>
                            </div>
                            <div class="col-6">
                                <input type="radio" class="btn-check" name="tipe" id="tipeKeluar" value="keluar">
                                <label class="btn btn-outline-danger w-100 py-2 rounded-3 fw-bold" for="tipeKeluar">
                                    <i class="bi bi-arrow-up-circle me-2"></i>Keluar
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label small fw-bold text-muted text-uppercase">Jumlah</label>
                        <div class="input-group">
                            <input type="number" name="jumlah" class="form-control bg-light border-0 rounded-start-3 py-2 shadow-none" min="1" placeholder="0" required>
                            <span class="input-group-text bg-light border-0 rounded-end-3 text-muted fw-bold">Unit</span>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label small fw-bold text-muted text-uppercase">Keterangan (Opsional)</label>
                        <textarea name="keterangan" class="form-control bg-light border-0 rounded-3 py-2 shadow-none" rows="3" placeholder="Contoh: Produksi Roti Tawar / Supplier Indomilk"></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary w-100 py-3 rounded-3 fw-bold shadow-sm mb-3">
                        <i class="bi bi-save2-fill me-2"></i> Simpan Perubahan
                    </button>
                </form>
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
