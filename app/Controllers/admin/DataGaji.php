<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\DataGajiModel;
use App\Models\DivisiModel;
use App\Models\GajiModel;
use App\Models\GajiPerhariModel;
use App\Models\PinjamanModel;
use App\Models\PotongGajiModel;
use App\Models\RekapAbsenModel;

class DataGaji extends BaseController
{   
    protected $gajiModel;
    protected $divisiModel;
    protected $dataGajiModel;
    protected $gajiPerhariModel;
    protected $pinjamaModel;
    protected $potongGajiModel;
    protected $rekapAbsenModel;

    public function __construct()
    {
        $this->gajiModel = new GajiModel();
        $this->divisiModel = new DivisiModel();
        $this->dataGajiModel = new DataGajiModel();
        $this->gajiPerhariModel = new GajiPerhariModel();
        $this->pinjamaModel = new PinjamanModel();
        $this->potongGajiModel = new PotongGajiModel();
        $this->rekapAbsenModel = new RekapAbsenModel();
    }

    public function index()
    {
        if (session()->get('hak_akses') != '1') {
            return redirect()->to('karyawan/dashboard');

        }

        $dataUser = $this->gajiModel->findAll();
        $jmlUser = count($dataUser);
        foreach($dataUser as $dk){
            $id_karyawan[] = $dk['id_karyawan']; 
            $nik[] = $dk['nik']; 
            $nama[] = $dk['nama_karyawan']; 
            $divisi[] = $dk['divisi']; 
        }

        for ($i = 0; $i < $jmlUser; $i++ ){
            // ambil divisi
            $dataDivisi = $this->divisiModel->where('nama_divisi',$divisi[$i])->first();
            $gajiHarian = (int)$dataDivisi['gaji_harian'];

            // Ambil data rekap absen
            $rekapAbsen = $this->rekapAbsenModel->where('id_karyawan',$id_karyawan[$i])->findAll();
            $jmlRekap = count($rekapAbsen);
            foreach($rekapAbsen as $rekap){
                $bulanRekap[] = $rekap['bulan'];
                $hadirRekap[] = $rekap['hadir'];
            }
            
            for ($j=0; $j < $jmlRekap ; $j++) {

                $bulan = $bulanRekap[$j];
                $hadir = $hadirRekap[$j];

                $fee = 0;
                $bonus = 0;
                $gajiPerhari = $this->gajiPerhariModel->where('id_karyawan', $id_karyawan[$i])->where('bulan', $bulan)->findAll();
                    foreach($gajiPerhari as $gp){
                        $fee += (int)$gp['fee'];
                        $bonus += (int)$gp['bonus']; 
                    }

                $pinjaman = 0;
                $pinjamGaji = $this->pinjamaModel->where('id_karyawan', $id_karyawan[$i])->where('bulan', $bulan)->findAll();
                    foreach($pinjamGaji as $pj){
                        $pinjaman += (int)$pj['nominal'];
                    }

                $potong = 0;
                $potongGaji = $this->potongGajiModel->where('id_karyawan', $id_karyawan[$i])->where('bulan', $bulan)->findAll();
                    foreach($potongGaji as $pg){
                        $potong += (int) $pg['nominal'];
                    }
                
                $totalGajiHarian = ($hadir * $gajiHarian);
                $totalGaji = $totalGajiHarian + $fee + $bonus - $pinjaman - $potong;
                $data_gaji = $this->dataGajiModel->where('bulan', $bulan)->where('id_karyawan', $id_karyawan[$i])->first();

                // simpan ke db
                if($data_gaji){
                        $this->dataGajiModel->save([
                            'id_gaji' => $data_gaji['id_gaji'],
                            'id_karyawan' => $id_karyawan[$i],
                            'nik' => $nik[$i],
                            'bulan' => $data_gaji['bulan'],
                            'nama_karyawan' => $nama[$i],
                            'divisi' => $divisi[$i],
                            'fee' => $fee,
                            'bonus' => $bonus,
                            'gaji_harian' => $totalGajiHarian,
                            'potongan' => $potong,
                            'pinjaman' => $pinjaman,
                            'total' => $totalGaji
                        ]);
                } else {
                    $this->dataGajiModel->save([
                        'id_karyawan' => $id_karyawan[$i],
                        'bulan' => $bulan,
                        'nik' => $nik[$i],
                        'nama_karyawan' => $nama[$i],
                        'divisi' => $divisi[$i],
                        'fee' => $fee,
                        'bonus' => $bonus,
                        'gaji_harian' => $totalGajiHarian,
                        'potongan' => $potong,
                        'pinjaman' => $pinjaman,
                        'total' => $totalGaji
                    ]);
                }
            }
            
        } // akhir for

        // tampilkan data berdasarkan KEYWORD
        $cariBulan = $this->request->getVar('bulan').'-'.$this->request->getVar('tahun');
        $cariNama = $this->request->getVar('nama');

        if($cariBulan && $cariNama){
            $dataGaji = $this->dataGajiModel->where('nik', $cariNama)->search($cariBulan);
        } else if($cariNama){
            $dataGaji = $this->dataGajiModel->where('nik', $cariNama)->findAll();
        }else if($cariBulan){
            $dataGaji = $this->dataGajiModel->search($cariBulan);
        } else {
            $dataGaji = $this->dataGajiModel;
        }

        $data = [
            'title' => 'Data Gaji',
            'karyawan' => session()->get(),
            'dataKaryawan' => $this->gajiModel->findAll(),
            'dataGaji' => $dataGaji->paginate($jmlUser,'data_gaji'),
            'pager' => $this->dataGajiModel->pager
        ];


        echo view('layout_admin/header', $data);
        echo view('layout_admin/sidebar', $data);
        echo view('admin/dataGaji/data_gaji', $data);
        echo view('layout_admin/footer');
    }
}