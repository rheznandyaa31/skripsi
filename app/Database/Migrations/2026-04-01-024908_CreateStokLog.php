<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateStokLog extends Migration
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
            'tipe' => [
                'type'       => 'ENUM',
                'constraint' => ['masuk', 'keluar'],
            ],
            'jumlah' => [
                'type'       => 'INT',
                'constraint' => 11,
            ],
            'keterangan' => [
                'type'       => 'TEXT',
                'null'       => true,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('bahan_baku_id', 'bahan_baku', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('stok_log');
    }

    public function down()
    {
        $this->forge->dropTable('stok_log');
    }
}
