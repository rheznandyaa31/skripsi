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
        return view('owner/dashboard');
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
        $id = $this->request->getPost('id');
        $harga = $this->request->getPost('harga_jual');

        if ($produkModel->update($id, ['harga_jual' => $harga])) {
            return redirect()->back()->with('success', 'Harga produk berhasil diperbarui.');
        } else {
            return redirect()->back()->with('error', 'Gagal memperbarui harga produk.');
        }
    }
}
