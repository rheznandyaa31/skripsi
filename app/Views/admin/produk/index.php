<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>
<div class="card border-0 shadow-sm mb-4">
    <div class="card-header bg-white py-3">
        <h5 class="mb-0">Daftar Produk & Konfigurasi Harga</h5>
    </div>
    <div class="card-body">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Nama Produk</th>
                    <th>Kategori</th>
                    <th>Harga</th>
                    <th>Update Terakhir</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($produk as $item): ?>
                    <tr>
                        <td><?= $item['nama'] ?></td>
                        <td><?= $item['kategori'] ?></td>
                        <td>Rp <?= number_format($item['harga_jual'], 2, ',', '.') ?></td>
                        <td><?= date('d/m/Y H:i', strtotime($item['updated_at'])) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<div class="alert alert-info">
    <strong>Info Konfigurasi:</strong> Pengaturan harga juga dapat dilakukan oleh Owner. Admin memiliki akses penuh untuk mengubah data produk di sini.
</div>
<?= $this->endSection() ?>
