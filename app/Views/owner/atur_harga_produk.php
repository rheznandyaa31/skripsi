<?= $this->extend('owner/layout') ?>

<?= $this->section('content') ?>
<div class="card">
    <div class="card-header bg-danger text-white">
        <h2>Mengatur Harga Jual Produk</h2>
    </div>
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nama Produk</th>
                    <th>Kategori</th>
                    <th>Harga Sekarang</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($produk as $item): ?>
                    <tr>
                        <td><?= $item['nama'] ?></td>
                        <td><?= $item['kategori'] ?></td>
                        <td>Rp <?= number_format($item['harga_jual'], 2, ',', '.') ?></td>
                        <td>
                            <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#editHargaModal<?= $item['id'] ?>">
                                Edit Harga
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="editHargaModal<?= $item['id'] ?>" tabindex="-1" aria-labelledby="editHargaModalLabel<?= $item['id'] ?>" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editHargaModalLabel<?= $item['id'] ?>">Edit Harga <?= $item['nama'] ?></h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="<?= base_url('owner/update-harga') ?>" method="post">
                                            <div class="modal-body">
                                                <input type="hidden" name="id" value="<?= $item['id'] ?>">
                                                <div class="mb-3">
                                                    <label for="harga_jual" class="form-label">Harga Jual Baru</label>
                                                    <input type="number" step="0.01" class="form-control" name="harga_jual" value="<?= $item['harga_jual'] ?>" required>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
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
<?= $this->endSection() ?>
