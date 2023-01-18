<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class RekapAbsen extends Migration
{
    public function up()
    {
        $this->forge->addField([

            'id_absen' => [
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
            'jenis_kelamin' => [
                'type'          => 'VARCHAR',
                'constraint'    => '20',
            ],
            'divisi' => [
                'type'          => 'VARCHAR',
                'constraint'    => '50',
            ],
            'hadir' => [
                'type'          => 'INT',
                'constraint'    => '11',
            ],
            'sakit' => [
                'type'          => 'INT',
                'constraint'    => '11',
            ],
            'alpha' => [
                'type'          => 'INT',
                'constraint'    => '11',
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

        $this->forge->addKey('id_absen', true);
        $this->forge->createTable('rekap_absen');
    }

    public function down()
    {
        $this->forge->dropTable('rekap_absen');
    }
}
