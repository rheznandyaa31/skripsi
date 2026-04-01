<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 class="fw-bold mb-1">Manajemen Produk</h4>
        <p class="text-muted small mb-0">Atur daftar produk dan konfigurasi harga jual.</p>
    </div>
    <div class="d-flex gap-2">
        <button class="btn btn-outline-primary border-2 px-4 py-2 rounded-3 fw-bold">
            <i class="bi bi-download me-2"></i> Ekspor
        </button>
        <button class="btn btn-primary shadow-sm px-4 py-2 rounded-3 fw-bold">
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
                                <button class="btn btn-light btn-sm rounded-3 me-1" title="Edit">
                                    <i class="bi bi-pencil-square text-primary"></i>
                                </button>
                                <button class="btn btn-light btn-sm rounded-3" title="Hapus">
                                    <i class="bi bi-trash3 text-danger"></i>
                                </button>
                            </td>
                        </tr>
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
    .extra-small {
        font-size: 0.75rem;
    }
    .table tbody tr:hover {
        background-color: #f8fafc;
    }
    .badge {
        font-weight: 600;
        letter-spacing: 0.02em;
    }
</style>
<?= $this->endSection() ?>
