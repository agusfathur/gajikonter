<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\RekapAbsenModel;

class LaporanAbsensi extends BaseController
{
    protected $rekapAbsenModel;
    public function __construct()
    {
        $this->rekapAbsenModel = new RekapAbsenModel();
    }
    public function index()
    {
        if (session()->get('hak_akses') != '1') {
            return redirect()->to('karyawan/dashboard');

        }
        

        $data = [
            'title' => 'Laporan Absensi',
            'karyawan' => session()->get(),
        ];
        echo view('layout_admin/header', $data);
        echo view('layout_admin/sidebar', $data);
        echo view('admin/Laporan/laporan_absensi', $data);
        echo view('layout_admin/footer');
    }

    public function cetakRekapAbsen()
    {   
        if (session()->get('hak_akses') != '1') {
            return redirect()->to('karyawan/dashboard');

        }


        $bulan = $this->request->getVar('bulan');
        $tahun = $this->request->getVar('tahun');

        //apakah ada bulan dan bulan tidak kosong
        if((isset($bulan) && $bulan !='') && (isset($tahun) && $tahun !='')){
            $bulanTahun = $bulan . '-' . $tahun;
        } else{
            $bulan = date('m');
            $tahun = date('Y');
            $bulanTahun = $bulan . '-' . $tahun;
        }

        $data = [
            'title' => 'Laporan Absensi',
            'karyawan' => session()->get(),
            'bulan' => $bulan,
            'tahun' => $tahun,    
            'rekapAbsen' => $this->rekapAbsenModel->where('bulan',$bulanTahun)->findAll()
        ];

        return view('admin/Laporan/cetak_absensi', $data);

    }
}
