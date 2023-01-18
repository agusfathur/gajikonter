<?php

namespace App\Models;

use CodeIgniter\Model;

class GajiPerhariModel extends Model
{
    protected $table = 'gaji_perhari';
    protected $primaryKey = 'id_gaji';

    protected $allowedFields = ['id_karyawan','tgl','bulan','nik','nama_karyawan','divisi','fee', 
                            'bonus','keterangan'];
    
    public function search($keyword)
    {
        return $this->table('gaji_perhari')->like('bulan', $keyword);
    }

}