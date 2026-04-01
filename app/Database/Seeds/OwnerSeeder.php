<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class OwnerSeeder extends Seeder
{
    public function run()
    {
        // Bahan Baku
        $bahanBaku = [
            ['nama' => 'Terigu', 'stok' => 50, 'satuan' => 'kg', 'stok_minimal' => 10, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['nama' => 'Gula', 'stok' => 5, 'satuan' => 'kg', 'stok_minimal' => 10, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')], // Menipis
            ['nama' => 'Telur', 'stok' => 0, 'satuan' => 'butir', 'stok_minimal' => 20, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')], // Habis
        ];
        $this->db->table('bahan_baku')->insertBatch($bahanBaku);

        // Produk
        $produk = [
            ['nama' => 'Roti Tawar', 'harga_jual' => 15000, 'kategori' => 'Roti', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['nama' => 'Roti Manis', 'harga_jual' => 8000, 'kategori' => 'Roti', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
        ];
        $this->db->table('produk')->insertBatch($produk);

        // Penjualan
        $penjualan = [
            ['produk_id' => 1, 'jumlah' => 2, 'total_harga' => 30000, 'tanggal' => date('Y-m-d H:i:s'), 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['produk_id' => 2, 'jumlah' => 5, 'total_harga' => 40000, 'tanggal' => date('Y-m-d H:i:s'), 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
        ];
        $this->db->table('penjualan')->insertBatch($penjualan);

        // Users
        $users = [
            [
                'username'     => 'admin',
                'password'     => password_hash('admin123', PASSWORD_DEFAULT),
                'nama_lengkap' => 'Administrator Utama',
                'role'         => 'admin',
                'created_at'   => date('Y-m-d H:i:s'),
                'updated_at'   => date('Y-m-d H:i:s'),
            ],
            [
                'username'     => 'owner',
                'password'     => password_hash('owner123', PASSWORD_DEFAULT),
                'nama_lengkap' => 'Pemilik Toko',
                'role'         => 'owner',
                'created_at'   => date('Y-m-d H:i:s'),
                'updated_at'   => date('Y-m-d H:i:s'),
            ],
            [
                'username'     => 'gudang',
                'password'     => password_hash('gudang123', PASSWORD_DEFAULT),
                'nama_lengkap' => 'Petugas Gudang',
                'role'         => 'gudang',
                'created_at'   => date('Y-m-d H:i:s'),
                'updated_at'   => date('Y-m-d H:i:s'),
            ],
        ];
        $this->db->table('users')->insertBatch($users);
    }
}
