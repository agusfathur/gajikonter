<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class GajiPerhari extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_gaji' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'id_karyawan' => [
                'type'       => 'INT',
                'constraint' => '11',
            ],
            'nik' => [
                'type'       => 'VARCHAR',
                'constraint' => '16',
            ],
            'tgl' => [
                'type'       => 'DATE',
            ],
            'bulan' => [
                'type'       => 'VARCHAR',
                'constraint' => '11',
            ],
            'nama_karyawan' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'divisi' => [
                'type'       => 'VARCHAR',
                'constraint' => '30',
            ],
            'fee' => [
                'type'       => 'INT',
                'constraint' => '100',
            ],
            'bonus' => [
                'type'       => 'INT',
                'constraint' => '100',
            ],
            'keterangan' => [
                'type'       => 'TEXT',
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
        

        $this->forge->addKey('id_gaji', true);
        $this->forge->createTable('gaji_perhari');
    }

    public function down()
    {
        $this->forge->dropTable('gaji_perhari');
    }
}
