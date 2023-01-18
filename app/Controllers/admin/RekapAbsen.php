<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\GajiModel;
use App\Models\RekapAbsenModel;
use CodeIgniter\HTTP\Request;

class RekapAbsen extends BaseController
{
    protected $gajiModel;
    protected $absenModel;
    public function __construct()
    {
        $this->gajiModel = new GajiModel();
        $this->absenModel = new RekapAbsenModel();

    }
   public function index()
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
        

        $bulanTahun = date('m-Y');
        $getBulan = $this->request->getVar('bulan');
        $getTahun = $this->request->getVar('tahun');
        if($getBulan && $getTahun){
            $bulanTahun = $getBulan . '-' . $getTahun;
        }
        $pecah = explode('-', $bulanTahun);
        $bulan = $pecah[0];
        $tahun = $pecah[1];

        $data = [
            'title' => 'Data Rekap Absen',
            'karyawan' => session()->get(),
            'rekapAbsen' => $this->absenModel->search($bulanTahun)->findAll()
        ];
        echo view('layout_admin/header', $data);
        echo view('layout_admin/sidebar', $data);
        echo view('admin/Absen/data_absen', $data);
        echo view('layout_admin/footer');
    }

    public function tambahRekapAbsen()
    {
        if (session()->get('hak_akses') != '1') {
            return redirect()->to('karyawan/dashboard');

        }

        $data = [
            'title' => 'Tambah Data Rekap Absen',
            'karyawan' => session()->get(),
            'dataKaryawan' => $this->gajiModel->findAll()

        ];
        echo view('layout_admin/header', $data);
        echo view('layout_admin/sidebar', $data);
        echo view('admin/Absen/tambahRekapAbsen', $data);
        echo view('layout_admin/footer');
    }

    public function editRekapAbsen()
    {
        if (session()->get('hak_akses') != '1') {
            return redirect()->to('karyawan/dashboard');

        }
        $bulanTahun = date('m-Y');
        $getBulan = $this->request->getVar('bulan');
        $getTahun = $this->request->getVar('tahun');
        if($getBulan && $getTahun){
            $bulanTahun = $getBulan . '-' . $getTahun;
        } 
        $pecah = explode('-', $bulanTahun);
        $bulan = $pecah[0];
        $tahun = $pecah[1];

        $data = [
            'title' => 'Rekap Absen Harian',
            'karyawan' => session()->get(),
            'bulan' => $bulan,
            'tahun' => $tahun,
            'bulanTahun' => $bulanTahun,
            'rekapAbsen' => $this->absenModel->where('bulan', $bulanTahun)->findAll()

        ];
        echo view('layout_admin/header', $data);
        echo view('layout_admin/sidebar', $data);
        echo view('admin/Absen/editRekapAbsen', $data);
        echo view('layout_admin/footer');
    }

    public function save()
    {
        $bulan = $this->request->getVar('bulan');
        $id_karyawan= $this->request->getVar('id_karyawan');
        $nik = $this->request->getVar('nik');
        $nama_karyawan = $this->request->getVar('nama_karyawan');
        $jenis_kelamin = $this->request->getVar('jenis_kelamin');
        $divisi = $this->request->getVar('divisi');
        $hadir = $this->request->getVar('hadir');
        $sakit = $this->request->getVar('sakit');
        $alpha = $this->request->getVar('alpha');
        // dd($id_karyawan);
        $jmlData = count($id_karyawan);
        for ($i = 0; $i < $jmlData; $i++){
            if($bulan[$i] !='' || $id_karyawan[$i] !=''){
                $this->absenModel->save([
                    'bulan' => $bulan[$i],
                    'id_karyawan' => $id_karyawan[$i],
                    'nik' => $nik[$i],
                    'nama_karyawan' => $nama_karyawan[$i],
                    'jenis_kelamin' => $jenis_kelamin[$i],
                    'divisi' => $divisi[$i],
                    'hadir' => $hadir[$i],
                    'sakit' => $sakit[$i],
                    'alpha' => $alpha[$i],

                ]);
            }
        }
        return redirect()->to('admin/rekap-absen');
    }

    public function update()
    {
        $id_absen= $this->request->getVar('id_absen');
        $bulan = $this->request->getVar('bulan');
        $id_karyawan= $this->request->getVar('id_karyawan');
        $nik = $this->request->getVar('nik');
        $nama_karyawan = $this->request->getVar('nama_karyawan');
        $jenis_kelamin = $this->request->getVar('jenis_kelamin');
        $divisi = $this->request->getVar('divisi');
        $hadir = $this->request->getVar('hadir');
        $sakit = $this->request->getVar('sakit');
        $alpha = $this->request->getVar('alpha');

        $jmlData = count($id_karyawan);
        for ($i = 0; $i < $jmlData; $i++){
            if($bulan[$i] !='' || $id_karyawan[$i] !=''){
                $this->absenModel->save([
                    'id_absen' => $id_absen[$i],
                    'bulan' => $bulan[$i],
                    'id_karyawan' => $bulan[$i],
                    'nik' => $nik[$i],
                    'nama_karyawan' => $nama_karyawan[$i],
                    'jenis_kelamin' => $jenis_kelamin[$i],
                    'divisi' => $divisi[$i],
                    'hadir' => $hadir[$i],
                    'sakit' => $sakit[$i],
                    'alpha' => $alpha[$i],

                ]);
            }
        }
        return redirect()->to('admin/rekap-absen');
    }
    
    public function delete($id)
    {
        $this->absenModel->delete($id);
        // session()->setFlashdata('pesan','Data berhasil dihapus');
        return redirect()->back();
    }
}
