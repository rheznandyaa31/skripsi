<?= $this->extend('owner/layout') ?>

<?= $this->section('content') ?>
<div class="card">
    <div class="card-header bg-info text-white">
        <h2>Monitoring Stok Bahan Baku</h2>
    </div>
    <div class="card-body">
        <?php if (!empty($notifikasi)): ?>
            <div class="alert alert-warning">
                <strong>Notifikasi!</strong> Stok berikut menipis atau habis:
                <ul>
                    <?php foreach ($notifikasi as $notif): ?>
                        <li><?= $notif['nama'] ?>: <?= $notif['stok'] ?> <?= $notif['satuan'] ?> (Minimal: <?= $notif['stok_minimal'] ?>)</li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Stok</th>
                    <th>Satuan</th>
                    <th>Stok Minimal</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($bahan_baku as $item): ?>
                    <tr>
                        <td><?= $item['nama'] ?></td>
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
<?= $this->endSection() ?>
