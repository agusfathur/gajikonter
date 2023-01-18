<?php

namespace App\Models;

use CodeIgniter\Model;

class DivisiModel extends Model
{
    protected $table = 'data_divisi';
    protected $primaryKey = 'id_divisi';

    protected $allowedFields = ['nama_divisi','fee', 'bonus','gaji_harian'];


}