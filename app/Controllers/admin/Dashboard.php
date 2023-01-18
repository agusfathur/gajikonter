<?php

namespace App\Controllers\admin;
use App\Controllers\BaseController;
use App\Models\DivisiModel;
use App\Models\GajiModel;
use App\Models\RekapAbsenModel;
class Dashboard extends BaseController
{
    protected $gajiModel;
    protected $divisiModel;
    protected $rekaoAbsenModel;

    public function __construct()
    {
        $this->gajiModel = new GajiModel();
        $this->divisiModel = new DivisiModel();
        $this->rekaoAbsenModel = new RekapAbsenModel();
    }

    public function index()
    {   
            
        if(session()->get('hak_akses') != '1'){
            return redirect()->to('karyawan/dashboard');
            
        }


        $dataKaryawan = $this->gajiModel->findAll();
        $dataDivisi = $this->divisiModel->findAll();
        $dataAdmin = $this->gajiModel->where('hak_akses', 1)->findAll();
        $laki = count($this->gajiModel->where('jenis_kelamin', 'laki-laki')->findAll());
        $perempuan = count($this->gajiModel->where('jenis_kelamin', 'perempuan')->findAll());

        $absen = $this->rekaoAbsenModel->where('bulan', date('m-Y'))->findAll();
        // d($absen);


        $data = [
            'title' => 'Dashboard Admin',
            'karyawan' => session()->get(),
            'dataKaryawan' => $dataKaryawan,
            'dataDivisi' => $dataDivisi,
            'dataAdmin' => $dataAdmin,
            'dataLaki'=> $laki,
            'dataPerempuan' => $perempuan,
            'absen' => $absen
        ];
        echo view('layout_admin/header', $data);
        echo view('layout_admin/sidebar',$data);
        echo view('admin/dashboard', $data);
        echo view('layout_admin/footer');
    }
}
