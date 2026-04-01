<?= $this->extend('gudang/layout') ?>

<?= $this->section('content') ?>
<div class="row mb-4">
    <div class="col-12">
        <h2 class="fw-bold">Monitoring Stok Bahan Baku</h2>
        <p class="text-muted">Pantau dan kelola stok masuk dan keluar bahan baku.</p>
    </div>
</div>

<div class="row g-4">
    <div class="col-md-8">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white py-3 border-bottom-0">
                <h5 class="mb-0 fw-bold">Daftar Stok Saat Ini</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead>
                            <tr>
                                <th>Nama Bahan</th>
                                <th>Stok Tersedia</th>
                                <th>Satuan</th>
                                <th>Batas Minimal</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($bahan_baku as $item): ?>
                                <tr>
                                    <td class="fw-semibold"><?= $item['nama'] ?></td>
                                    <td><?= $item['stok'] ?></td>
                                    <td><?= $item['satuan'] ?></td>
                                    <td><?= $item['stok_minimal'] ?></td>
                                    <td>
                                        <?php if ($item['stok'] <= 0): ?>
                                            <span class="badge bg-danger">Habis</span>
                                        <?php elseif ($item['stok'] <= $item['stok_minimal']): ?>
                                            <span class="badge bg-warning">Menipis</span>
                                        <?php else: ?>
                                            <span class="badge bg-success">Cukup</span>
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
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-header bg-white py-3 border-bottom-0">
                <h5 class="mb-0 fw-bold">Update Stok Masuk/Keluar</h5>
            </div>
            <div class="card-body">
                <form action="<?= base_url('gudang/update-stok') ?>" method="post">
                    <div class="mb-3">
                        <label class="form-label">Bahan Baku</label>
                        <select name="bahan_baku_id" class="form-select" required>
                            <?php foreach ($bahan_baku as $item): ?>
                                <option value="<?= $item['id'] ?>"><?= $item['nama'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tipe Transaksi</label>
                        <div class="btn-group w-100" role="group">
                            <input type="radio" class="btn-check" name="tipe" id="tipeMasuk" value="masuk" checked>
                            <label class="btn btn-outline-success" for="tipeMasuk">Stok Masuk</label>
                            
                            <input type="radio" class="btn-check" name="tipe" id="tipeKeluar" value="keluar">
                            <label class="btn btn-outline-danger" for="tipeKeluar">Stok Keluar</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jumlah</label>
                        <input type="number" name="jumlah" class="form-control" min="1" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Keterangan</label>
                        <textarea name="keterangan" class="form-control" rows="2" placeholder="Misal: Dari Supplier X / Digunakan untuk Roti"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Update Stok</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
