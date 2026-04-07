<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

use App\Models\BahanBakuModel;
use App\Models\ProdukModel;
use App\Models\PenjualanModel;

class OwnerController extends BaseController
{
    public function index()
    {
        $bahanBakuModel = new BahanBakuModel();
        $produkModel = new ProdukModel();
        $penjualanModel = new PenjualanModel();

        $data['stok_menipis'] = $bahanBakuModel->where('stok <= stok_minimal')->countAllResults();
        $data['total_produk'] = $produkModel->countAll();
        
        // Pendapatan bulan ini
        $data['pendapatan_bulan_ini'] = $penjualanModel->where('tanggal >=', date('Y-m-01'))
                                                      ->selectSum('total_harga')
                                                      ->first()['total_harga'] ?? 0;
                                                      
        $data['total_transaksi'] = $penjualanModel->countAll();

        return view('owner/dashboard', $data);
    }

    public function stokBahanBaku()
    {
        $bahanBakuModel = new BahanBakuModel();
        $data['bahan_baku'] = $bahanBakuModel->findAll();
        
        // Notifikasi stok habis / menipis
        $data['notifikasi'] = $bahanBakuModel->where('stok <= stok_minimal')->findAll();

        return view('owner/stok_bahan_baku', $data);
    }

    public function laporanPenjualan()
    {
        $penjualanModel = new PenjualanModel();
        $data['penjualan'] = $penjualanModel->select('penjualan.*, produk.nama as nama_produk')
                                           ->join('produk', 'produk.id = penjualan.produk_id')
                                           ->findAll();

        return view('owner/laporan_penjualan', $data);
    }

    public function laporanStok()
    {
        $bahanBakuModel = new BahanBakuModel();
        $data['bahan_baku'] = $bahanBakuModel->findAll();

        return view('owner/laporan_stok', $data);
    }

    public function aturHargaProduk()
    {
        $produkModel = new ProdukModel();
        $data['produk'] = $produkModel->findAll();

        return view('owner/atur_harga_produk', $data);
    }

    public function updateHargaProduk()
    {
        $produkModel = new ProdukModel();
        $id = (int) $this->request->getPost('id');
        $harga = $this->request->getPost('harga_jual');

        if ($id <= 0) {
            return redirect()->back()->with('error', 'Produk tidak valid.');
        }

        if (! is_numeric($harga) || $harga < 0) {
            return redirect()->back()->with('error', 'Harga jual harus berupa angka dan tidak boleh negatif.');
        }

        $produk = $produkModel->find($id);
        if (! $produk) {
            return redirect()->back()->with('error', 'Data produk tidak ditemukan.');
        }

        if ($produkModel->update($id, ['harga_jual' => $harga])) {
            return redirect()->back()->with('success', 'Harga produk berhasil diperbarui.');
        }

        return redirect()->back()->with('error', 'Gagal memperbarui harga produk.');
    }
}
