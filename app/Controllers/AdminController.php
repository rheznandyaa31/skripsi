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
        return view('admin/dashboard');
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
        $data = [
            'username'     => $this->request->getPost('username'),
            'password'     => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'nama_lengkap' => $this->request->getPost('nama_lengkap'),
            'role'         => $this->request->getPost('role'),
        ];
        $userModel->insert($data);
        return redirect()->to('/admin/users')->with('success', 'User berhasil ditambahkan');
    }

    // Produk Management
    public function produk()
    {
        $produkModel = new ProdukModel();
        $data['produk'] = $produkModel->findAll();
        return view('admin/produk/index', $data);
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
