<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePemesananBahan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'bahan_baku_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],
            'jumlah' => [
                'type'       => 'INT',
                'constraint' => 11,
            ],
            'supplier' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'status' => [
                'type'       => 'ENUM',
                'constraint' => ['pending', 'selesai', 'dibatalkan'],
                'default'    => 'pending',
            ],
            'tanggal_pesan' => [
                'type' => 'DATETIME',
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('bahan_baku_id', 'bahan_baku', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('pemesanan_bahan');
    }

    public function down()
    {
        $this->forge->dropTable('pemesanan_bahan');
    }
}
