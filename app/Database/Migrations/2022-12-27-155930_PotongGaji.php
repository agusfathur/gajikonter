<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PotongGaji extends Migration
{
    public function up()
    {
        $this->forge->addField([

            'id_potong' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'id_karyawan' => [
                'type'          => 'INT',
                'constraint'    => '11',
            ],
            'bulan' => [
                'type'          => 'VARCHAR',
                'constraint'    => '11',
            ],
            'nik' => [
                'type'          => 'VARCHAR',
                'constraint'    => '16',
            ],
            'nama_karyawan' => [
                'type'          => 'VARCHAR',
                'constraint'    => '100',
            ],
            'tgl_potong' => [
                'type'          => 'DATE',
            ],
            'nominal' => [
                'type'          => 'INT',
                'constraint'    => '100',
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

        $this->forge->addKey('id_potong', true);
        $this->forge->createTable('potong_gaji');
    }

    public function down()
    {
        $this->forge->dropTable('potong_gaji');
    }
}
