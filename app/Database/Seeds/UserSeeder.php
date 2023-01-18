<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'nik'           => '0123456789012345',
            'nama_karyawan' => 'Niam Cell',
            'username'      => 'admin',
            'password'      =>  password_hash('12345',PASSWORD_DEFAULT),
            'jenis_kelamin' => 'laki-laki',
            'divisi'        => '',
            'no_hp'         => '081231231231',
            'alamat'        => 'Kalirejo, Undaan, Kudus',
            'foto'          => 'default.png',
            'hak_akses'     => 1
        ];

        // // Simple Queries
        // $this->db->query('INSERT INTO users (username, email) VALUES(:username:, :email:)', $data);

        // Using Query Builder
        $this->db->table('data_karyawan')->insert($data);
    }
}