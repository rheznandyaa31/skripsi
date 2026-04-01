<?= $this->extend('owner/layout') ?>

<?= $this->section('content') ?>
<div class="card">
    <div class="card-header bg-warning text-dark">
        <h2>Laporan Stok</h2>
    </div>
    <div class="card-body">
        <div class="mb-4">
            <button class="btn btn-outline-warning" onclick="window.print()">Cetak Laporan</button>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nama Bahan Baku</th>
                    <th>Stok</th>
                    <th>Satuan</th>
                    <th>Stok Minimal</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($bahan_baku as $item): ?>
                    <tr>
                        <td><?= $item['nama'] ?></td>
                        <td><?= $item['stok'] ?></td>
                        <td><?= $item['satuan'] ?></td>
                        <td><?= $item['stok_minimal'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?= $this->endSection() ?>
