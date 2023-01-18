<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class HakAkses extends Migration
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
            'keterangan' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
            ],
            'hak_akses' => [
                'type' => 'INT',
                'constraint' => '11'
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

        $this->forge->addKey('id', true);
        $this->forge->createTable('hak_akses');
    }

    public function down()
    {
        $this->forge->dropTable('hak_akses');
    }
}
