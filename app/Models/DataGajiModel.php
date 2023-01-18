<?php

namespace App\Models;

use CodeIgniter\Model;

class DataGajiModel extends Model
{
    protected $table = 'data_gaji';
    protected $primaryKey = 'id_gaji';

    protected $allowedFields = ['id_karyawan','nik','bulan','nama_karyawan','divisi','fee', 'bonus', 
                'gaji_harian','potongan','pinjaman' ,'total'];

    public function search($keyword)
    {
        return $this->table('data_gaji')->like('bulan', $keyword);
    }
}
