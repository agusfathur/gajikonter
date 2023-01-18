<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\DivisiModel;
use App\Models\GajiModel;
use App\Models\GajiPerhariModel;

class GajiPerhari extends BaseController
{   
    protected $gajiPerhariModel;
    protected $gajiModel;
    protected $divisiModel;
    public function __construct()
    {
        $this->gajiPerhariModel = new GajiPerhariModel();
        $this->gajiModel = new GajiModel();
        $this->divisiModel = new DivisiModel();
    }
    public function index()
    {
        if (session()->get('hak_akses') != '1') {
            return redirect()->to('karyawan/dashboard');

        }
        // tampilkan data berdasarkan
        $bulan = $this->request->getVar('bulan').'-'.$this->request->getVar('tahun');
        $keywordNama = $this->request->getVar('nama');

        if($bulan && $keywordNama){
            $gajiHarian = $this->gajiPerhariModel->where('nik', $keywordNama)->search($bulan);
        } else if($keywordNama){
            $gajiHarian = $this->gajiPerhariModel->where('nik', $keywordNama)->findAll();
        }else if($bulan){
            $gajiHarian = $this->gajiPerhariModel->search($bulan);
        } else {
            $gajiHarian = $this->gajiPerhariModel;
        }

        $data = [
            'title' => 'Gaji Perhari',
            'karyawan' => session()->get(),
            'dataKaryawan' => $this->gajiModel->findAll(),
            'gajiPerhari' => $gajiHarian->paginate(10, 'gaji_perhari'),
            'pager' => $this->gajiPerhariModel->pager
        ];
        echo view('layout_admin/header', $data);
        echo view('layout_admin/sidebar', $data);
        echo view('admin/gaji_perhari', $data);
        echo view('layout_admin/footer');
    }

    public function tambahGajiHarian()
    {
        if (session()->get('hak_akses') != '1') {
            return redirect()->to('karyawan/dashboard');

        }

        $data = [
            'title' => 'Tambah Gaji Perhari',
            'karyawan' => session()->get(),
            'validation' => \Config\Services::validation(),
            'dataKaryawan' =>$this->gajiModel->findAll()
        ];
        echo view('layout_admin/header', $data);
        echo view('layout_admin/sidebar', $data);
        echo view('admin/GajiPerhari/tambahGajiPerhari', $data);
        echo view('layout_admin/footer');
    }

    public function editGajiHarian($id)
    {
        if (session()->get('hak_akses') != '1') {
            return redirect()->to('karyawan/dashboard');

        }

        $data = [
            'title' => 'Edit Perhari',
            'karyawan' => session()->get(),
            'validation' => \Config\Services::validation(),
            'gajiHarian' => $this->gajiPerhariModel->find($id)
        ];
        echo view('layout_admin/header', $data);
        echo view('layout_admin/sidebar', $data);
        echo view('admin/GajiPerhari/editGajiPerhari', $data);
        echo view('layout_admin/footer');
    }

    public function save()
    {   
        if($this->request->getVar('fee') || $this->request->getVar('bonus')){
            $rules_ket = 'required';
        }else{
            $rules_ket = 'permit_empty';
        }

        if(!$this->validate([
            'tgl' => [
                'rules' => 'required',
                'errors'=> [
                    'required' => 'Tanggal wajib diisi',
                ]
            ],
            'nama_karyawan' => [
                'rules'=>'required',
                'errors'=> [
                    'required' => 'Nama wajib diisi',
                ]
            ],
            'keterangan' => [
                'rules'=> $rules_ket,
                'errors'=> [
                    'required' => 'keterangan wajib diisi',
                ]
            ],
        ])){
            return redirect()->to('admin/gaji-perhari/tambah-gaji-harian')->withInput();
        };
        $nama = $this->request->getVar('nama_karyawan');
        $dataKaryawan = $this->gajiModel->where('id_karyawan', $nama)->first();
        $datadivisi = $this->divisiModel->where('nama_divisi', $dataKaryawan['divisi'])->first();
        $tgl = $this->request->getVar('tgl');
        $bln = explode('-',$tgl);
        $bulan = $bln[1] . '-' . $bln[0];
        
        if($this->request->getVar('fee') == 'true'){
            $fee = (int) $datadivisi['fee'];
        } else{
            $fee = 0;
        }


        $this->gajiPerhariModel->save([
            'tgl' => $tgl,
            'bulan' =>$bulan,
            'id_karyawan' => $dataKaryawan['id_karyawan'],
            'nama_karyawan' => $dataKaryawan['nama_karyawan'],
            'nik' => $dataKaryawan['nik'],
            'divisi' => $dataKaryawan['divisi'],
            'fee' => $fee,
            'bonus' => $this->request->getVar('bonus'),
            'keterangan' => $this->request->getVar('keterangan'),
            
        ]);
        session()->setFlashdata('pesan', 'Berhasil tambah divisi');
        return redirect()->to('admin/gaji-perhari');
    }
    public function update($id)
    {   
        if($this->request->getVar('fee') || $this->request->getVar('bonus')){
            $rules_ket = 'required';
        }else{
            $rules_ket = 'permit_empty';
        }

        if(!$this->validate([
            'tgl' => [
                'rules' => 'required',
                'errors'=> [
                    'required' => 'Tanggal wajib diisi',
                ]
            ],
            'nama_karyawan' => [
                'rules'=>'required',
                'errors'=> [
                    'required' => 'Nama wajib diisi',
                ]
            ],
            'keterangan' => [
                'rules'=> $rules_ket,
                'errors'=> [
                    'required' => 'keterangan wajib diisi',
                ]
            ],
        ])){
            return redirect()->to('admin/gaji-perhari/edit-gaji-harian/'.$id)->withInput();
        };
        $nama = $this->request->getVar('nama_karyawan');
        $dataKaryawan = $this->gajiModel->where('id_karyawan', $nama)->first();
        $datadivisi = $this->divisiModel->where('nama_divisi', $dataKaryawan['divisi'])->first();
        $tgl = $this->request->getVar('tgl');
        $bln = explode('-',$tgl);
        $bulan = $bln[1] . '-' . $bln[0];
        
        if($this->request->getVar('fee') == 'true'){
            $fee = (int) $datadivisi['fee'];
        } else{
            $fee = 0;
        }


        $this->gajiPerhariModel->save([
            'id_gaji' => $id,
            'tgl' => $tgl,
            'bulan' =>$bulan,
            'id_karyawan' => $dataKaryawan['id_karyawan'],
            'nama_karyawan' => $dataKaryawan['nama_karyawan'],
            'nik' => $dataKaryawan['nik'],
            'divisi' => $dataKaryawan['divisi'],
            'fee' => $fee,
            'bonus' => $this->request->getVar('bonus'),
            'keterangan' => $this->request->getVar('keterangan'),
            
        ]);
        session()->setFlashdata('pesan', 'Berhasil tambah divisi');
        return redirect()->to('admin/gaji-perhari');
    }

    public function delete($id)
    {   
        $this->gajiPerhariModel->delete($id);
        session()->setFlashdata('pesan','Data berhasil dihapus');
        return redirect()->to('admin/gaji-perhari');
    }
}
