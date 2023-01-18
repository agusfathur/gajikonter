<?php

namespace App\Controllers\karyawan;
use App\Controllers\BaseController;
use App\Models\DataGajiModel;
use App\Models\GajiModel;
use App\Models\DivisiModel;
use App\Models\GajiPerhariModel;
use App\Models\PotongGajiModel;
use App\Models\PinjamanModel;
use App\Models\RekapAbsenModel;
class DataGaji extends BaseController
{   
    protected $dataGajiModel;
    
    public function __construct()
    {
        $this->dataGajiModel = new DataGajiModel();
    }

    
    public function index()
    {   
        if(session()->get('hak_akses') != '2'){
            return redirect()->to('admin/dashboard');
        }

        $dataGaji = $this->dataGajiModel->where('id_karyawan', session()->get('id_karyawan'))->orderBy('id_gaji','DESC')->findAll();
        // dd($dataGaji);
        $data =  [
            'title' => 'Data Gaji Karyawan',
            'karyawan' => session()->get(),
            'dataGaji' => $dataGaji

            
        ];
        echo view('layout_karyawan/header', $data);
        echo view('layout_karyawan/sidebar',$data);
        echo view('karyawan/data_gaji', $data);
        echo view('layout_karyawan/footer');
        
    }

}