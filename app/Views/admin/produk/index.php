<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 class="fw-bold mb-1">Kelola Produk</h4>
        <p class="text-muted small mb-0">Atur daftar produk dan konfigurasi harga jual.</p>
    </div>
    <div class="d-flex gap-2">
        <button class="btn btn-outline-primary border-2 px-4 py-2 rounded-3 fw-bold" type="button">
            <i class="bi bi-download me-2"></i> Ekspor
        </button>
        <button class="btn btn-primary shadow-sm px-4 py-2 rounded-3 fw-bold" data-bs-toggle="modal" data-bs-target="#addProdukModal" type="button">
            <i class="bi bi-plus-lg me-2"></i> Tambah Produk
        </button>
    </div>
</div>

<div class="card border-0 shadow-sm rounded-4 overflow-hidden mb-4">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-light">
                    <tr>
                        <th class="ps-4 py-3 border-0 text-uppercase small fw-bold text-muted">Informasi Produk</th>
                        <th class="py-3 border-0 text-uppercase small fw-bold text-muted text-center">Kategori</th>
                        <th class="py-3 border-0 text-uppercase small fw-bold text-muted text-end">Harga Jual</th>
                        <th class="py-3 border-0 text-uppercase small fw-bold text-muted text-center">Update Terakhir</th>
                        <th class="pe-4 py-3 border-0 text-uppercase small fw-bold text-muted text-end">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($produk as $item): ?>
                        <tr>
                            <td class="ps-4 py-3">
                                <div class="d-flex align-items-center">
                                    <div class="bg-primary bg-opacity-10 p-2 rounded-3 me-3 text-primary">
                                        <i class="bi bi-tag-fill"></i>
                                    </div>
                                    <div class="fw-bold text-dark"><?= $item['nama'] ?></div>
                                </div>
                            </td>
                            <td class="py-3 text-center">
                                <span class="badge rounded-pill bg-light text-dark px-3 py-2 border">
                                    <?= $item['kategori'] ?>
                                </span>
                            </td>
                            <td class="py-3 text-end fw-bold text-primary">
                                Rp <?= number_format($item['harga_jual'], 0, ',', '.') ?>
                            </td>
                            <td class="py-3 text-center small text-muted">
                                <?= date('d/m/Y', strtotime($item['updated_at'])) ?>
                                <div class="extra-small opacity-75"><?= date('H:i', strtotime($item['updated_at'])) ?> WIB</div>
                            </td>
                            <td class="pe-4 py-3 text-end">
                                <button class="btn btn-light btn-sm rounded-3 me-1" title="Edit" data-bs-toggle="modal" data-bs-target="#editProdukModal<?= $item['id'] ?>">
                                    <i class="bi bi-pencil-square text-primary"></i>
                                </button>
                                <form action="<?= base_url('admin/produk/delete/' . $item['id']) ?>" method="post" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus produk ini?');">
                                    <button type="submit" class="btn btn-light btn-sm rounded-3" title="Hapus">
                                        <i class="bi bi-trash3 text-danger"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        <div class="modal fade" id="editProdukModal<?= $item['id'] ?>" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content border-0 shadow-lg rounded-4">
                                    <div class="modal-header border-0 pt-4 px-4">
                                        <h5 class="modal-title fw-bold">Edit Produk</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="<?= base_url('admin/produk/update/' . $item['id']) ?>" method="post">
                                        <div class="modal-body p-4">
                                            <div class="mb-3">
                                                <label class="form-label small fw-bold text-muted text-uppercase">Nama Produk</label>
                                                <input type="text" name="nama" class="form-control bg-light border-0 rounded-3 py-2" value="<?= esc($item['nama']) ?>" required>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label small fw-bold text-muted text-uppercase">Kategori</label>
                                                <input type="text" name="kategori" class="form-control bg-light border-0 rounded-3 py-2" value="<?= esc($item['kategori']) ?>">
                                            </div>
                                            <div class="mb-0">
                                                <label class="form-label small fw-bold text-muted text-uppercase">Harga Jual</label>
                                                <div class="input-group">
                                                    <span class="input-group-text bg-light border-0 rounded-start-3 fw-bold text-muted">Rp</span>
                                                    <input type="number" name="harga_jual" class="form-control bg-light border-0 rounded-end-3 py-2" value="<?= esc($item['harga_jual']) ?>" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer border-0 pb-4 px-4">
                                            <button type="button" class="btn btn-light px-4 rounded-3 fw-bold text-muted" data-bs-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-primary px-4 rounded-3 fw-bold">Simpan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="alert alert-info border-0 rounded-4 shadow-sm d-flex align-items-center p-4">
    <div class="bg-info bg-opacity-20 p-3 rounded-circle me-4 text-info">
        <i class="bi bi-info-circle-fill fs-4"></i>
    </div>
    <div>
        <h6 class="fw-bold mb-1">Informasi Konfigurasi</h6>
        <p class="mb-0 small opacity-75">Perubahan harga yang Anda lakukan di sini akan langsung berdampak pada sistem kasir. Pastikan koordinasi dengan Owner sebelum melakukan perubahan harga massal.</p>
    </div>
</div>

<style>
    .extra-small { font-size: 0.75rem; }
    .table tbody tr:hover { background-color: #f8fafc; }
    .badge { font-weight: 600; letter-spacing: 0.02em; }
    .form-control:focus, .form-select:focus {
        background-color: #fff !important;
        box-shadow: 0 0 0 0.25rem rgba(99, 102, 241, 0.1);
        border: 1px solid #6366f1 !important;
    }
</style>
<div class="modal fade" id="addProdukModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg rounded-4">
            <div class="modal-header border-0 pt-4 px-4">
                <h5 class="modal-title fw-bold">Tambah Produk Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('admin/produk/create') ?>" method="post">
                <div class="modal-body p-4">
                    <div class="mb-3">
                        <label class="form-label small fw-bold text-muted text-uppercase">Nama Produk</label>
                        <input type="text" name="nama" class="form-control bg-light border-0 rounded-3 py-2" placeholder="Nama produk" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-bold text-muted text-uppercase">Kategori</label>
                        <input type="text" name="kategori" class="form-control bg-light border-0 rounded-3 py-2" placeholder="Kategori (opsional)">
                    </div>
                    <div class="mb-0">
                        <label class="form-label small fw-bold text-muted text-uppercase">Harga Jual</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-0 rounded-start-3 fw-bold text-muted">Rp</span>
                            <input type="number" name="harga_jual" class="form-control bg-light border-0 rounded-end-3 py-2" placeholder="0" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-0 pb-4 px-4">
                    <button type="button" class="btn btn-light px-4 rounded-3 fw-bold text-muted" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary px-4 rounded-3 fw-bold">Simpan Produk</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
