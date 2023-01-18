<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DataKaryawan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_karyawan' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nik' => [
                'type'       => 'VARCHAR',
                'constraint' => '16',
                'unique' => true
            ],
            'nama_karyawan' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'username' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'password' => [
                'type'       => 'VARCHAR',
                'constraint' => '150',
            ],
            'jenis_kelamin' => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
            ],
            'divisi' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'no_hp' => [
                'type' => 'VARCHAR',
                'constraint' => '15'
            ],
            'alamat' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'foto' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'hak_akses' => [
                'type'       => 'INT',
                'constraint' => '1',
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
        $this->forge->addKey('id_karyawan', true);
        $this->forge->createTable('data_karyawan');
    }

    public function down()
    {
        $this->forge->dropTable('data_karyawan');
    }
}