<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>
<div class="row g-4">
    <div class="col-md-7">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white py-3">
                <h5 class="mb-0">Daftar Stok Bahan Baku</h5>
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Stok</th>
                            <th>Satuan</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($bahan_baku as $item): ?>
                            <tr>
                                <td><?= $item['nama'] ?></td>
                                <td><?= $item['stok'] ?></td>
                                <td><?= $item['satuan'] ?></td>
                                <td>
                                    <?php if ($item['stok'] <= $item['stok_minimal']): ?>
                                        <span class="badge bg-danger">Butuh Pesan</span>
                                    <?php else: ?>
                                        <span class="badge bg-success">Aman</span>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-5">
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-header bg-white py-3">
                <h5 class="mb-0">Pesan Bahan Baru</h5>
            </div>
            <div class="card-body">
                <form action="<?= base_url('admin/stok/pesan') ?>" method="post">
                    <div class="mb-3">
                        <label class="form-label">Bahan Baku</label>
                        <select name="bahan_baku_id" class="form-select" required>
                            <?php foreach ($bahan_baku as $item): ?>
                                <option value="<?= $item['id'] ?>"><?= $item['nama'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jumlah</label>
                        <input type="number" name="jumlah" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Supplier</label>
                        <input type="text" name="supplier" class="form-control" placeholder="Nama Toko/Pemasok" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Buat Pesanan</button>
                </form>
            </div>
        </div>
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white py-3">
                <h5 class="mb-0">Riwayat Pemesanan</h5>
            </div>
            <div class="card-body p-0">
                <div class="list-group list-group-flush">
                    <?php foreach ($pemesanan as $pesan): ?>
                        <div class="list-group-item">
                            <div class="d-flex w-100 justify-content-between">
                                <h6 class="mb-1"><?= $pesan['nama_bahan'] ?> (<?= $pesan['jumlah'] ?>)</h6>
                                <small class="text-muted"><?= date('d/m', strtotime($pesan['tanggal_pesan'])) ?></small>
                            </div>
                            <small class="text-primary"><?= $pesan['supplier'] ?></small>
                            <span class="badge bg-secondary float-end"><?= ucfirst($pesan['status']) ?></span>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
