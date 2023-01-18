<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\DataGajiModel;
use App\Models\GajiModel;

class SlipGaji extends BaseController
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
            'title' => 'Slip Gaji',
            'karyawan' => session()->get(),
            'namaKaryawan' => $this->gajiModel->findAll()

        ];
        echo view('layout_admin/header', $data);
        echo view('layout_admin/sidebar');
        echo view('admin/Laporan/slip_gaji', $data);
        echo view('layout_admin/footer');
    }

    public function cetakSlipGaji()
    {   
        if (session()->get('hak_akses') != '1') {
            return redirect()->to('karyawan/dashboard');

        }

        $bulan = $this->request->getVar('bulan');
        $tahun = $this->request->getVar('tahun');
        $nama = $this->request->getVar('nama_karyawan');

        //apakah ada bulan dan bulan tidak kosong
        if((isset($bulan) && $bulan !='') && (isset($tahun) && $tahun !='')){
            $bulanTahun = $bulan . '-' . $tahun;
        } else{
            $bulan = date('m');
            $tahun = date('Y');
            $bulanTahun = $bulan . '-' . $tahun;
        }

        // d($bulan);

        if(!$nama && $nama == ''){
            session()->setFlashdata('pesan', 'Lengkapi semua data yang akan dicari');
            return redirect()->back();
        }

        $data = [
            'title' => 'Cetak Slip Gaji',
            'karyawan' => session()->get(),
            'bulan' => $bulan,
            'tahun' => $tahun,
            'dataKaryawan' => $this->gajiModel->where('id_karyawan',$nama)->first(),
            'dataGaji' => $this->dataGajiModel->where('id_karyawan',$nama)->where('bulan',$bulanTahun)->first()
        ];
        // $ddd = $this->gajiModel->where('id_karyawan', $nama)->first();
        // dd($ddd);

        return view('admin/laporan/cetak_slip', $data);

    }
}
