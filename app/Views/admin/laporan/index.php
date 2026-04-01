<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>
<div class="card border-0 shadow-sm mb-4">
    <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Laporan Transaksi Penjualan</h5>
        <button class="btn btn-outline-primary btn-sm" onclick="window.print()">Export PDF/Cetak</button>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>Produk</th>
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
                <tr class="table-primary">
                    <th colspan="3">Total Pendapatan Seluruhnya</th>
                    <th>Rp <?= number_format($total_pendapatan, 2, ',', '.') ?></th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
<?= $this->endSection() ?>
