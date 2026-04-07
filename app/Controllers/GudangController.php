<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

use App\Models\BahanBakuModel;
use App\Models\StokLogModel;
use App\Models\PemesananBahanModel;

class GudangController extends BaseController
{
    public function index()
    {
        $bahanBakuModel = new BahanBakuModel();
        $data['notifikasi'] = $bahanBakuModel->where('stok <= stok_minimal')->findAll();
        $data['total_item'] = $bahanBakuModel->countAll();
        return view('gudang/dashboard', $data);
    }

    public function monitoring()
    {
        $bahanBakuModel = new BahanBakuModel();
        $data['bahan_baku'] = $bahanBakuModel->findAll();
        return view('gudang/monitoring', $data);
    }

    public function updateStok()
    {
        $bahanBakuModel = new BahanBakuModel();
        $stokLogModel = new StokLogModel();

        $id = (int) $this->request->getPost('bahan_baku_id');
        $tipe = $this->request->getPost('tipe');
        $jumlah = (int) $this->request->getPost('jumlah');
        $keterangan = $this->request->getPost('keterangan');

        if (! in_array($tipe, ['masuk', 'keluar'], true)) {
            return redirect()->back()->with('error', 'Tipe transaksi tidak valid.');
        }

        if ($id <= 0 || $jumlah <= 0) {
            return redirect()->back()->with('error', 'Bahan dan jumlah harus diisi dengan benar.');
        }

        $bahan = $bahanBakuModel->find($id);
        if (! $bahan) {
            return redirect()->back()->with('error', 'Data bahan baku tidak ditemukan.');
        }

        $stokBaru = ($tipe == 'masuk') ? $bahan['stok'] + $jumlah : $bahan['stok'] - $jumlah;

        if ($stokBaru < 0) {
            return redirect()->back()->with('error', 'Stok tidak mencukupi untuk pengeluaran ini.');
        }

        $db = \Config\Database::connect();
        $db->transStart();

        $bahanBakuModel->update($id, ['stok' => $stokBaru]);
        $stokLogModel->insert([
            'bahan_baku_id' => $id,
            'tipe'          => $tipe,
            'jumlah'        => $jumlah,
            'keterangan'    => $keterangan,
        ]);

        $db->transComplete();

        if ($db->transStatus() === false) {
            return redirect()->back()->with('error', 'Gagal memperbarui stok.');
        }

        return redirect()->back()->with('success', 'Stok berhasil diperbarui.');
    }

    public function pemesanan()
    {
        $bahanBakuModel = new BahanBakuModel();
        $pemesananModel = new PemesananBahanModel();

        $data['bahan_baku'] = $bahanBakuModel->findAll();
        $data['pemesanan'] = $pemesananModel->select('pemesanan_bahan.*, bahan_baku.nama as nama_bahan')
                                          ->join('bahan_baku', 'bahan_baku.id = pemesanan_bahan.bahan_baku_id')
                                          ->orderBy('created_at', 'DESC')
                                          ->findAll();

        return view('gudang/pemesanan', $data);
    }

    public function buatPesanan()
    {
        $pemesananModel = new PemesananBahanModel();
        $bahanId = (int) $this->request->getPost('bahan_baku_id');
        $jumlah = (int) $this->request->getPost('jumlah');
        $supplier = trim((string) $this->request->getPost('supplier'));

        if ($bahanId <= 0 || $jumlah <= 0 || $supplier === '') {
            return redirect()->back()->with('error', 'Bahan, jumlah, dan supplier wajib diisi dengan benar.');
        }

        $data = [
            'bahan_baku_id' => $bahanId,
            'jumlah'        => $jumlah,
            'supplier'      => $supplier,
            'status'        => 'pending',
            'tanggal_pesan' => date('Y-m-d H:i:s'),
        ];

        if ($pemesananModel->insert($data)) {
            return redirect()->back()->with('success', 'Pesanan bahan baku berhasil dibuat.');
        }

        return redirect()->back()->with('error', 'Gagal membuat pesanan.');
    }
}
