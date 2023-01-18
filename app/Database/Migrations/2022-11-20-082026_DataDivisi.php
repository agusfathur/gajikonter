<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DataDivisi extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_divisi' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama_divisi' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'fee' => [
                'type' => 'INT',
                'constraint' => '120',
            ],
            'bonus' => [
                'type' => 'INT',
                'constraint' => '120',
            ],
            'gaji_harian' => [
                'type' => 'INT',
                'constraint' => '120',
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true
            ],
            'updated_at' =>[
                'type' => 'DATETIME',
                'null' => true
            ]
        ]);
        $this->forge->addKey('id_divisi', true);
        $this->forge->createTable('data_divisi');
    }

    public function down()
    {
        $this->forge->dropTable('data_divisi');
    }
}
