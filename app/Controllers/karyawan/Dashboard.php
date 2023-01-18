<?php

namespace App\Controllers\karyawan;
use App\Controllers\BaseController;
class Dashboard extends BaseController
{
    
    
    public function index()
    {   
        if(session()->get('hak_akses') != '2'){
            return redirect()->to('admin/dashboard');
        }
        
        $data =  [
            'title' => 'Dashboard Karyawan',
            'karyawan' => session()->get()
        ];
        echo view('layout_karyawan/header', $data);
        echo view('layout_karyawan/sidebar',$data);
        echo view('karyawan/dashboard', $data);
        echo view('layout_karyawan/footer');
    }
    

}
