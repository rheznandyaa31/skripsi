<?= $this->extend('gudang/layout') ?>

<?= $this->section('content') ?>
<div class="row mb-4">
    <div class="col-12 text-center">
        <h2 class="fw-bold">Melakukan Pemesanan Bahan Baku</h2>
        <p class="text-muted">Kelola permintaan stok baru dari supplier.</p>
    </div>
</div>

<div class="row g-4 justify-content-center">
    <div class="col-md-6">
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-header bg-white py-3 border-bottom-0">
                <h5 class="mb-0 fw-bold">Form Pemesanan</h5>
            </div>
            <div class="card-body">
                <form action="<?= base_url('gudang/buat-pesanan') ?>" method="post">
                    <div class="mb-3">
                        <label class="form-label">Bahan Baku</label>
                        <select name="bahan_baku_id" class="form-select" required>
                            <?php foreach ($bahan_baku as $item): ?>
                                <option value="<?= $item['id'] ?>"><?= $item['nama'] ?> (Stok: <?= $item['stok'] ?>)</option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jumlah Pesanan</label>
                        <input type="number" name="jumlah" class="form-control" min="1" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nama Supplier / Toko</label>
                        <input type="text" name="supplier" class="form-control" placeholder="Pemasok Bahan" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Ajukan Pesanan</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="row mt-4">
    <div class="col-12">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white py-3 border-bottom-0">
                <h5 class="mb-0 fw-bold">Riwayat Pemesanan Terakhir</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>Bahan Baku</th>
                                <th>Jumlah</th>
                                <th>Supplier</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($pemesanan as $pesan): ?>
                                <tr>
                                    <td><?= date('d-m-Y H:i', strtotime($pesan['tanggal_pesan'])) ?></td>
                                    <td class="fw-semibold"><?= $pesan['nama_bahan'] ?></td>
                                    <td><?= $pesan['jumlah'] ?></td>
                                    <td><?= $pesan['supplier'] ?></td>
                                    <td>
                                        <span class="badge bg-secondary"><?= ucfirst($pesan['status']) ?></span>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
