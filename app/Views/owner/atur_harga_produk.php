<?= $this->extend('owner/layout') ?>

<?= $this->section('content') ?>
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 class="fw-bold mb-1">Pengaturan Harga Produk</h4>
        <p class="text-muted small mb-0">Sesuaikan harga jual menu produk Anda dengan mudah.</p>
    </div>
</div>

<div class="card border-0 shadow-sm rounded-4 overflow-hidden">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-light">
                    <tr>
                        <th class="ps-4 py-3 border-0 text-uppercase small fw-bold text-muted">Nama Produk</th>
                        <th class="py-3 border-0 text-uppercase small fw-bold text-muted text-center">Kategori</th>
                        <th class="py-3 border-0 text-uppercase small fw-bold text-muted text-center">Harga Saat Ini</th>
                        <th class="pe-4 py-3 border-0 text-uppercase small fw-bold text-muted text-end">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($produk as $item): ?>
                        <tr>
                            <td class="ps-4 py-3">
                                <div class="fw-bold text-dark"><?= $item['nama'] ?></div>
                            </td>
                            <td class="py-3 text-center">
                                <span class="badge rounded-pill bg-light text-dark px-3 py-2 border">
                                    <?= $item['kategori'] ?>
                                </span>
                            </td>
                            <td class="py-3 text-center fw-bold text-primary">
                                Rp <?= number_format($item['harga_jual'], 0, ',', '.') ?>
                            </td>
                            <td class="pe-4 py-3 text-end">
                                <button type="button" class="btn btn-outline-primary btn-sm rounded-pill px-3 fw-bold" data-bs-toggle="modal" data-bs-target="#editHargaModal<?= $item['id'] ?>">
                                    <i class="bi bi-pencil-square me-1"></i> Ubah Harga
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="editHargaModal<?= $item['id'] ?>" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content border-0 shadow-lg rounded-4">
                                            <div class="modal-header border-0 pt-4 px-4">
                                                <h5 class="modal-title fw-bold">Update Harga: <?= $item['nama'] ?></h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form action="<?= base_url('owner/update-harga') ?>" method="post">
                                                <div class="modal-body p-4 text-start">
                                                    <input type="hidden" name="id" value="<?= $item['id'] ?>">
                                                    <div class="mb-3">
                                                        <label class="form-label small fw-bold text-muted text-uppercase">Harga Jual Baru</label>
                                                        <div class="input-group">
                                                            <span class="input-group-text bg-light border-0 rounded-start-3 fw-bold text-muted">Rp</span>
                                                            <input type="number" step="0.01" class="form-control bg-light border-0 rounded-end-3 py-2 fw-bold" name="harga_jual" value="<?= $item['harga_jual'] ?>" required>
                                                        </div>
                                                        <div class="form-text mt-2 small">Masukkan nominal harga tanpa titik atau koma.</div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer border-0 pb-4 px-4">
                                                    <button type="button" class="btn btn-light px-4 rounded-3 fw-bold text-muted" data-bs-dismiss="modal">Batal</button>
                                                    <button type="submit" class="btn btn-primary px-4 rounded-3 fw-bold shadow-sm">Simpan Perubahan</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<style>
    .table tbody tr:hover { background-color: #f8fafc; }
    .badge { font-weight: 600; letter-spacing: 0.02em; }
    .form-control:focus {
        background-color: #fff !important;
        box-shadow: 0 0 0 0.25rem rgba(14, 165, 233, 0.1);
        border: 1px solid #0ea5e9 !important;
    }
</style>
<?= $this->endSection() ?>
