<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 class="fw-bold mb-1">Edit Pengguna</h4>
        <p class="text-muted small mb-0">Perbarui informasi akun dan hak akses pengguna.</p>
    </div>
    <a href="<?= base_url('admin/users') ?>" class="btn btn-light border px-4 py-2 rounded-3">
        <i class="bi bi-arrow-left me-2"></i> Kembali
    </a>
</div>

<?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert-danger alert-dismissible fade show border-0 shadow-sm rounded-4">
        <i class="bi bi-exclamation-triangle-fill me-2"></i>
        <?= session()->getFlashdata('error') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
<?php endif; ?>

<div class="card border-0 shadow-sm rounded-4">
    <div class="card-body p-4">
        <form action="<?= base_url('admin/users/update/' . $user['id']) ?>" method="post">
            <div class="mb-3">
                <label class="form-label small fw-bold text-muted text-uppercase">Username</label>
                <div class="input-group">
                    <span class="input-group-text bg-light border-0 rounded-start-3"><i class="bi bi-at text-muted"></i></span>
                    <input type="text" name="username" class="form-control bg-light border-0 rounded-end-3 py-2" value="<?= esc($user['username']) ?>" required>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label small fw-bold text-muted text-uppercase">Password (Isi jika ingin diubah)</label>
                <div class="input-group">
                    <span class="input-group-text bg-light border-0 rounded-start-3"><i class="bi bi-key text-muted"></i></span>
                    <input type="password" name="password" class="form-control bg-light border-0 rounded-end-3 py-2" placeholder="Minimal 8 karakter, angka, simbol, huruf besar (opsional)" minlength="8">
                </div>
                <div class="form-text small">Jika diisi, sandi harus minimal 8 karakter dan mengandung angka, simbol, dan huruf besar.</div>
            </div>
            <div class="mb-3">
                <label class="form-label small fw-bold text-muted text-uppercase">Nama Lengkap</label>
                <div class="input-group">
                    <span class="input-group-text bg-light border-0 rounded-start-3"><i class="bi bi-person text-muted"></i></span>
                    <input type="text" name="nama_lengkap" class="form-control bg-light border-0 rounded-end-3 py-2" value="<?= esc($user['nama_lengkap']) ?>" required>
                </div>
            </div>
            <div class="mb-0">
                <label class="form-label small fw-bold text-muted text-uppercase">Role / Hak Akses</label>
                <div class="input-group">
                    <span class="input-group-text bg-light border-0 rounded-start-3"><i class="bi bi-shield-check text-muted"></i></span>
                    <select name="role" class="form-select bg-light border-0 rounded-end-3 py-2">
                        <option value="admin" <?= $user['role'] === 'admin' ? 'selected' : '' ?>>Administrator</option>
                        <option value="owner" <?= $user['role'] === 'owner' ? 'selected' : '' ?>>Owner (Pemilik)</option>
                        <option value="gudang" <?= $user['role'] === 'gudang' ? 'selected' : '' ?>>Petugas Gudang</option>
                    </select>
                </div>
            </div>
            <div class="mt-4 d-flex justify-content-end gap-2">
                <a href="<?= base_url('admin/users') ?>" class="btn btn-light px-4 rounded-3 fw-bold text-muted">Batal</a>
                <button type="submit" class="btn btn-primary px-4 rounded-3 fw-bold">Simpan Perubahan</button>
            </div>
        </form>
    </div>
</div>

<style>
    .form-control:focus, .form-select:focus {
        background-color: #fff !important;
        box-shadow: 0 0 0 0.25rem rgba(99, 102, 241, 0.1);
        border: 1px solid #6366f1 !important;
    }
</style>
<?= $this->endSection() ?>
