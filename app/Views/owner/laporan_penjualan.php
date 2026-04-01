<?= $this->extend('owner/layout') ?>

<?= $this->section('content') ?>
<div class="card">
    <div class="card-header bg-success text-white">
        <h2>Laporan Penjualan</h2>
    </div>
    <div class="card-body">
        <div class="mb-4">
            <button class="btn btn-outline-success" onclick="window.print()">Cetak Laporan</button>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>Nama Produk</th>
                    <th>Jumlah</th>
                    <th>Total Harga</th>
                </tr>
            </thead>
            <tbody>
                <?php $total_pendapatan = 0; ?>
                <?php foreach ($penjualan as $item): ?>
                    <tr>
                        <td><?= date('d-m-Y H:i', strtotime($item['tanggal'])) ?></td>
                        <td><?= $item['nama_produk'] ?></td>
                        <td><?= $item['jumlah'] ?></td>
                        <td>Rp <?= number_format($item['total_harga'], 2, ',', '.') ?></td>
                    </tr>
                    <?php $total_pendapatan += $item['total_harga']; ?>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr class="table-info">
                    <th colspan="3">Total Pendapatan</th>
                    <th>Rp <?= number_format($total_pendapatan, 2, ',', '.') ?></th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
<?= $this->endSection() ?>
