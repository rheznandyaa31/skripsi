<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

use App\Models\UserModel;
use App\Models\ProdukModel;
use App\Models\BahanBakuModel;
use App\Models\PenjualanModel;
use App\Models\PemesananBahanModel;

class AdminController extends BaseController
{
    public function index()
    {
        $userModel = new UserModel();
        $produkModel = new ProdukModel();
        $bahanBakuModel = new BahanBakuModel();
        $penjualanModel = new PenjualanModel();

        $data['total_users'] = $userModel->countAll();
        $data['total_produk'] = $produkModel->countAll();
        $data['total_bahan'] = $bahanBakuModel->countAll();
        $data['total_penjualan'] = $penjualanModel->countAll();

        return view('admin/dashboard', $data);
    }

    // User Management
    public function users()
    {
        $userModel = new UserModel();
        $data['users'] = $userModel->findAll();
        return view('admin/users/index', $data);
    }

    public function createUser()
    {
        $userModel = new UserModel();
        $password = $this->request->getPost('password');

        if (! $this->isValidPassword($password)) {
            return redirect()->back()->withInput()->with('error', 'Sandi harus minimal 8 karakter dan mengandung angka, simbol, dan huruf besar.');
        }

        $data = [
            'username'     => $this->request->getPost('username'),
            'password'     => password_hash($password, PASSWORD_DEFAULT),
            'nama_lengkap' => $this->request->getPost('nama_lengkap'),
            'role'         => $this->request->getPost('role'),
        ];
        $existing = $userModel->where('username', $data['username'])->first();
        if ($existing) {
            return redirect()->to('/admin/users')->with('error', 'Username sudah digunakan.');
        }

        $userModel->insert($data);
        return redirect()->to('/admin/users')->with('success', 'User berhasil ditambahkan');
    }

    public function editUser($id)
    {
        $userModel = new UserModel();
        $user = $userModel->find($id);

        if (! $user) {
            return redirect()->to('/admin/users')->with('error', 'User tidak ditemukan.');
        }

        $data['user'] = $user;
        return view('admin/users/edit', $data);
    }

    public function updateUser($id)
    {
        $userModel = new UserModel();

        $user = $userModel->find($id);
        if (! $user) {
            return redirect()->to('/admin/users')->with('error', 'User tidak ditemukan.');
        }

        $username = $this->request->getPost('username');
        $existing = $userModel->where('username', $username)->where('id !=', $id)->first();
        if ($existing) {
            return redirect()->back()->with('error', 'Username sudah digunakan oleh user lain.');
        }

        $data = [
            'username'     => $username,
            'nama_lengkap' => $this->request->getPost('nama_lengkap'),
            'role'         => $this->request->getPost('role'),
        ];

        $password = $this->request->getPost('password');
        if ($password) {
            if (! $this->isValidPassword($password)) {
                return redirect()->back()->withInput()->with('error', 'Sandi harus minimal 8 karakter dan mengandung angka, simbol, dan huruf besar.');
            }
            $data['password'] = password_hash($password, PASSWORD_DEFAULT);
        }

        $userModel->update($id, $data);
        return redirect()->to('/admin/users')->with('success', 'User berhasil diperbarui');
    }

    public function deleteUser($id)
    {
        $userModel = new UserModel();

        if (session()->get('id') == $id) {
            return redirect()->to('/admin/users')->with('error', 'Tidak dapat menghapus akun yang sedang digunakan.');
        }

        $user = $userModel->find($id);
        if (! $user) {
            return redirect()->to('/admin/users')->with('error', 'User tidak ditemukan.');
        }

        $userModel->delete($id);
        return redirect()->to('/admin/users')->with('success', 'User berhasil dihapus');
    }

    // Produk Management
    public function produk()
    {
        $produkModel = new ProdukModel();
        $data['produk'] = $produkModel->findAll();
        return view('admin/produk/index', $data);
    }

    public function createProduk()
    {
        $produkModel = new ProdukModel();
        $data = [
            'nama'       => $this->request->getPost('nama'),
            'kategori'   => $this->request->getPost('kategori'),
            'harga_jual' => $this->request->getPost('harga_jual'),
        ];

        $produkModel->insert($data);
        return redirect()->to('/admin/produk')->with('success', 'Produk berhasil ditambahkan');
    }

    public function updateProduk($id)
    {
        $produkModel = new ProdukModel();

        $produk = $produkModel->find($id);
        if (! $produk) {
            return redirect()->to('/admin/produk')->with('error', 'Produk tidak ditemukan.');
        }

        $data = [
            'nama'       => $this->request->getPost('nama'),
            'kategori'   => $this->request->getPost('kategori'),
            'harga_jual' => $this->request->getPost('harga_jual'),
        ];

        $produkModel->update($id, $data);
        return redirect()->to('/admin/produk')->with('success', 'Produk berhasil diperbarui');
    }

    public function deleteProduk($id)
    {
        $produkModel = new ProdukModel();

        $produk = $produkModel->find($id);
        if (! $produk) {
            return redirect()->to('/admin/produk')->with('error', 'Produk tidak ditemukan.');
        }

        $produkModel->delete($id);
        return redirect()->to('/admin/produk')->with('success', 'Produk berhasil dihapus');
    }

    private function isValidPassword(string $password): bool
    {
        return (bool) preg_match('/^(?=.*[A-Z])(?=.*\d)(?=.*[^A-Za-z0-9]).{8,}$/', $password);
    }


    // Stok & Pemesanan Bahan
    public function stok()
    {
        $bahanBakuModel = new BahanBakuModel();
        $pemesananModel = new PemesananBahanModel();
        
        $data['bahan_baku'] = $bahanBakuModel->findAll();
        $data['pemesanan'] = $pemesananModel->select('pemesanan_bahan.*, bahan_baku.nama as nama_bahan')
                                          ->join('bahan_baku', 'bahan_baku.id = pemesanan_bahan.bahan_baku_id')
                                          ->findAll();
        
        return view('admin/stok/index', $data);
    }

    public function pesanBahan()
    {
        $pemesananModel = new PemesananBahanModel();
        $data = [
            'bahan_baku_id' => $this->request->getPost('bahan_baku_id'),
            'jumlah'        => $this->request->getPost('jumlah'),
            'supplier'      => $this->request->getPost('supplier'),
            'status'        => 'pending',
            'tanggal_pesan' => date('Y-m-d H:i:s'),
        ];
        $pemesananModel->insert($data);
        return redirect()->to('/admin/stok')->with('success', 'Pemesanan bahan berhasil dibuat');
    }

    // Laporan
    public function laporan()
    {
        $penjualanModel = new PenjualanModel();
        $data['penjualan'] = $penjualanModel->select('penjualan.*, produk.nama as nama_produk')
                                           ->join('produk', 'produk.id = penjualan.produk_id')
                                           ->findAll();
        return view('admin/laporan/index', $data);
    }
}
