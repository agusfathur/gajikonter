<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DataGaji extends Migration
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
                'type'           => 'INT',
                'constraint'     => '11',
            ],
            'nik' => [
                'type'           => 'VARCHAR',
                'constraint'     => '16',
            ],
            'bulan' => [
                'type'           => 'VARCHAR',
                'constraint'     => '11',
            ],
            'nama_karyawan' => [
                'type'           => 'VARCHAR',
                'constraint'     => '11',
            ],
            'divisi' => [
                'type'           => 'VARCHAR',
                'constraint'     => '11',
            ],
            'fee' => [
                'type'           => 'INT',
                'constraint'     => '100',
            ],
            'bonus' => [
                'type'           => 'INT',
                'constraint'     => '100',
            ],
            'gaji_harian' => [
                'type'           => 'INT',
                'constraint'     => '100',
            ],
            'potongan' => [
                'type'           => 'INT',
                'constraint'     => '100',
            ],
            'pinjaman' => [
                'type'           => 'INT',
                'constraint'     => '100',
            ],
            'total' => [
                'type'           => 'INT',
                'constraint'     => '100',
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
        $this->forge->createTable('data_gaji');
    }

    public function down()
    {
        $this->forge->dropTable('data_gaji');
    }
}
