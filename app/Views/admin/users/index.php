<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 class="fw-bold mb-1">Manajemen Pengguna</h4>
        <p class="text-muted small mb-0">Kelola hak akses dan akun pengguna sistem.</p>
    </div>
    <button class="btn btn-primary shadow-sm px-4 py-2 rounded-3" data-bs-toggle="modal" data-bs-target="#addUserModal">
        <i class="bi bi-person-plus-fill me-2"></i> Tambah Pengguna
    </button>
</div>

<div class="card border-0 shadow-sm rounded-4 overflow-hidden">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-light">
                    <tr>
                        <th class="ps-4 py-3 border-0 text-uppercase small fw-bold text-muted">Pengguna</th>
                        <th class="py-3 border-0 text-uppercase small fw-bold text-muted text-center">Role</th>
                        <th class="py-3 border-0 text-uppercase small fw-bold text-muted">Tanggal Bergabung</th>
                        <th class="pe-4 py-3 border-0 text-uppercase small fw-bold text-muted text-end">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user): ?>
                        <tr>
                            <td class="ps-4 py-3">
                                <div class="d-flex align-items-center">
                                    <div class="avatar-circle me-3 bg-<?= $user['role'] == 'admin' ? 'danger' : ($user['role'] == 'owner' ? 'info' : 'warning') ?> bg-opacity-10 text-<?= $user['role'] == 'admin' ? 'danger' : ($user['role'] == 'owner' ? 'info' : 'warning') ?>">
                                        <?= strtoupper(substr($user['username'], 0, 1)) ?>
                                    </div>
                                    <div>
                                        <div class="fw-bold text-dark"><?= $user['nama_lengkap'] ?></div>
                                        <div class="text-muted small">@<?= $user['username'] ?></div>
                                    </div>
                                </div>
                            </td>
                            <td class="py-3 text-center">
                                <?php if ($user['role'] == 'admin'): ?>
                                    <span class="badge rounded-pill bg-danger bg-opacity-10 text-danger px-3 py-2 border border-danger border-opacity-10">
                                        <i class="bi bi-shield-lock me-1"></i> Administrator
                                    </span>
                                <?php elseif ($user['role'] == 'owner'): ?>
                                    <span class="badge rounded-pill bg-info bg-opacity-10 text-info px-3 py-2 border border-info border-opacity-10">
                                        <i class="bi bi-person-badge me-1"></i> Owner
                                    </span>
                                <?php else: ?>
                                    <span class="badge rounded-pill bg-warning bg-opacity-10 text-warning px-3 py-2 border border-warning border-opacity-10">
                                        <i class="bi bi-box-seam me-1"></i> Gudang
                                    </span>
                                <?php endif; ?>
                            </td>
                            <td class="py-3">
                                <div class="text-dark small fw-medium"><?= date('d M Y', strtotime($user['created_at'])) ?></div>
                                <div class="text-muted extra-small"><?= date('H:i', strtotime($user['created_at'])) ?> WIB</div>
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

<!-- Modal Tambah User -->
<div class="modal fade" id="addUserModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg rounded-4">
            <div class="modal-header border-0 pt-4 px-4">
                <h5 class="modal-title fw-bold">Tambah Pengguna Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('admin/users/create') ?>" method="post">
                <div class="modal-body p-4">
                    <div class="mb-3">
                        <label class="form-label small fw-bold text-muted text-uppercase">Username</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-0 rounded-start-3"><i class="bi bi-at text-muted"></i></span>
                            <input type="text" name="username" class="form-control bg-light border-0 rounded-end-3 py-2" placeholder="username_pengguna" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-bold text-muted text-uppercase">Password</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-0 rounded-start-3"><i class="bi bi-key text-muted"></i></span>
                            <input type="password" name="password" class="form-control bg-light border-0 rounded-end-3 py-2" placeholder="••••••••" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-bold text-muted text-uppercase">Nama Lengkap</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-0 rounded-start-3"><i class="bi bi-person text-muted"></i></span>
                            <input type="text" name="nama_lengkap" class="form-control bg-light border-0 rounded-end-3 py-2" placeholder="Masukkan nama lengkap" required>
                        </div>
                    </div>
                    <div class="mb-0">
                        <label class="form-label small fw-bold text-muted text-uppercase">Role / Hak Akses</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-0 rounded-start-3"><i class="bi bi-shield-check text-muted"></i></span>
                            <select name="role" class="form-select bg-light border-0 rounded-end-3 py-2">
                                <option value="admin">Administrator</option>
                                <option value="owner">Owner (Pemilik)</option>
                                <option value="gudang">Petugas Gudang</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-0 pb-4 px-4">
                    <button type="button" class="btn btn-light px-4 rounded-3 fw-bold text-muted" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary px-4 rounded-3 fw-bold">Simpan Akun</button>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
    .avatar-circle {
        width: 40px;
        height: 40px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        font-size: 1.1rem;
    }
    .extra-small {
        font-size: 0.75rem;
    }
    .table tbody tr {
        transition: all 0.2s;
    }
    .table tbody tr:hover {
        background-color: #f8fafc;
    }
    .badge {
        font-weight: 600;
        letter-spacing: 0.02em;
    }
    .form-control:focus, .form-select:focus {
        background-color: #fff !important;
        box-shadow: 0 0 0 0.25rem rgba(99, 102, 241, 0.1);
        border: 1px solid #6366f1 !important;
    }
</style>
<?= $this->endSection() ?>
