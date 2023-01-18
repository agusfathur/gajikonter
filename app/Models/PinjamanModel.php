<?php

namespace App\Models;

use CodeIgniter\Model;

class PinjamanModel extends Model
{
    protected $table = 'pinjaman';
    protected $primaryKey = 'id_pinjam';

    protected $allowedFields = ['id_karyawan','nik', 'nama_karyawan', 'tgl','bulan', 'nominal'];

    public function search($keyword)
    {
        return $this->table('pinjaman')->like('bulan', $keyword);
    }

}