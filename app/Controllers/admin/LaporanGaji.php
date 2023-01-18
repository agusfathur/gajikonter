<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\DataGajiModel;
use App\Models\GajiModel;

class LaporanGaji extends BaseController
{
    protected $gajiModel;
    protected $dataGajiModel;
    public function __construct()
    {
        $this->gajiModel = new GajiModel();
        $this->dataGajiModel = new DataGajiModel();
    }
    public function index()
    {
        if (session()->get('hak_akses') != '1') {
            return redirect()->to('karyawan/dashboard');
        }

        $data = [
            'title' => 'Laporan Gaji',
            'karyawan' => session()->get(),
            'namaKaryawan' => $this->gajiModel->findAll()

        ];
        echo view('layout_admin/header', $data);
        echo view('layout_admin/sidebar');
        echo view('admin/Laporan/laporan_gaji', $data);
        echo view('layout_admin/footer');
    }

    public function cetakGaji()
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
            'dataGaji' => $this->dataGajiModel->where('bulan',$bulanTahun)->findAll()
        ];
        // $dg = $this->dataGajiModel->where('bulan', $bulanTahun)->findAll();
        // dd($dg);
        return view('admin/Laporan/cetak_gaji', $data);

    }
}
