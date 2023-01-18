<?php

namespace App\Models;

use CodeIgniter\Model;

class GajiModel extends Model
{
    protected $table = 'data_karyawan';
    protected $primaryKey = 'id_karyawan';

    protected $allowedFields = ['nik', 'nama_karyawan', 'username', 'password', 
    'jenis_kelamin', 'divisi', 'alamat' ,'no_hp', 'foto', 'hak_akses'];


}