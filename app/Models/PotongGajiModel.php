<?php

namespace App\Models;

use CodeIgniter\Model;

class PotongGajiModel extends Model
{
    protected $table = 'potong_gaji';
    protected $primaryKey = 'id_potong';

    protected $allowedFields = ['id_karyawan','nik', 'nama_karyawan', 'bulan','tgl_potong' , 'nominal'];

    public function search($keyword)
    {
        return $this->table('potong_gaji')->like('bulan', $keyword);
    }
}