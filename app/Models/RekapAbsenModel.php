<?php

namespace App\Models;

use CodeIgniter\Model;

class RekapAbsenModel extends Model
{
    protected $table = 'rekap_absen';
    protected $primaryKey = 'id_absen';

    protected $allowedFields = ['bulan','id_karyawan','nik','nama_karyawan','jenis_kelamin','divisi',
                            'hadir', 'sakit', 'alpha'];

    public function search($keyword)
    {
        return $this->table('rekap_absen')->like('bulan', $keyword);
    }
}