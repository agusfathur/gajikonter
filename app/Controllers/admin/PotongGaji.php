<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\GajiModel;
use App\Models\PotongGajiModel;

class PotongGaji extends BaseController
{
    protected $potongModel;
    protected $gajiModel;
    public function __construct()
    {
        $this->potongModel = new PotongGajiModel();
        $this->gajiModel = new GajiModel();
    }
    public function index()
    {   
        if(session()->get('hak_akses') != '1'){
            return redirect()->to('karyawan/dashboard');
            
        }

         // tampilkan data berdasarkan
        $bulan = $this->request->getVar('bulan').'-'.$this->request->getVar('tahun');
        $keywordNama = $this->request->getVar('nama');

        if($bulan && $keywordNama){
            $potongGaji = $this->potongModel->where('nik', $keywordNama)->search($bulan);
        } else if($keywordNama){
            $potongGaji = $this->potongModel->where('nik', $keywordNama)->findAll();
        }else if($bulan){
            $potongGaji = $this->potongModel->search($bulan);
        } else {
            $potongGaji = $this->potongModel;
        }

        $data = [
            'title' => 'Potongan Gaji',
            'karyawan' => session()->get(),
            'dataKaryawan' => $this->gajiModel->findAll(),
            'dataPotongan' => $potongGaji->paginate(5,'potong_gaji'),
            'pager' => $this->potongModel->pager
        ];
        echo view('layout_admin/header', $data);
        echo view('layout_admin/sidebar', $data);
        echo view('admin/potong_gaji', $data);
        echo view('layout_admin/footer');
    }
    public function tambahPotongan()
    {   
        if(session()->get('hak_akses') != '1'){
            return redirect()->to('karyawan/dashboard');
            
        }

        $data = [
            'title' => 'Tambah Potongan Gaji',
            'karyawan' => session()->get(),
            'validation' => \Config\Services::validation(),
            'dataKaryawan' => $this->gajiModel->findAll()
            
        ];
        echo view('layout_admin/header', $data);
        echo view('layout_admin/sidebar', $data);
        echo view('admin/PotongGaji/tambahPotongan', $data);
        echo view('layout_admin/footer');
    }
    public function editPotongan($id)
    {   
        if(session()->get('hak_akses') != '1'){
            return redirect()->to('karyawan/dashboard');
            
        }

        $data = [
            'title' => 'Tambah Potongan Gaji',
            'karyawan' => session()->get(),
            'validation' => \Config\Services::validation(),
            'Potongan' =>$this->potongModel->find($id)
        ];
        echo view('layout_admin/header', $data);
        echo view('layout_admin/sidebar', $data);
        echo view('admin/PotongGaji/editPotongan', $data);
        echo view('layout_admin/footer');
    }

    public function save()
    {
        if(!$this->validate([
            'tgl_potong' => [
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
            'nominal' => [
                'rules'=>'required',
                'errors'=> [
                    'required' => 'Nominal wajib diisi',
                ]
            ],
        ])){
            return redirect()->to('admin/potong-gaji/tambah-potongan')->withInput();
        };
        $nama = $this->request->getVar('nama_karyawan');
        $dataKaryawan = $this->gajiModel->where('id_karyawan', $nama)->first();
        $tgl = $this->request->getVar('tgl_potong');
        $bln = explode('-',$tgl);
        $bulan = $bln[1] . '-' . $bln[0];

        $this->potongModel->save([
            'tgl_potong' => $tgl,
            'id_karyawan' => $dataKaryawan['id_karyawan'],
            'nama_karyawan' => $dataKaryawan['nama_karyawan'],
            'bulan' =>$bulan,
            'nik' => $dataKaryawan['nik'],
            'bonus' => $this->request->getVar('bonus'),
            'nominal' => $this->request->getVar('nominal'),
            
        ]);
        session()->setFlashdata('pesan', 'Berhasil tambah divisi');
        return redirect()->to('admin/potong-gaji');
    }

    public function update($id)
    {
        if(!$this->validate([
            'tgl_potong' => [
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
            'nominal' => [
                'rules'=>'required',
                'errors'=> [
                    'required' => 'Nominal wajib diisi',
                ]
            ],
        ])){
            return redirect()->to('admin/potong-gaji/edit-potongan/'.$id)->withInput();
        };
        $nama = $this->request->getVar('nama_karyawan');
        $dataKaryawan = $this->gajiModel->where('id_karyawan', $nama)->first();
        $tgl = $this->request->getVar('tgl_potong');
        $bln = explode('-',$tgl);
        $bulan = $bln[1] . '-' . $bln[0];

        $this->potongModel->save([
            'id_potong' => $id,
            'tgl_potong' => $tgl,
            'id_karyawan' => $dataKaryawan['id_karyawan'],
            'nama_karyawan' => $dataKaryawan['nama_karyawan'],
            'bulan' =>$bulan,
            'nik' => $dataKaryawan['nik'],
            'bonus' => $this->request->getVar('bonus'),
            'nominal' => $this->request->getVar('nominal'),
            
        ]);
        session()->setFlashdata('pesan', 'Berhasil Edit Potongan Gaji');
        return redirect()->to('admin/potong-gaji');
    }

    public function delete($id)
    {   
        $this->potongModel->delete($id);
        session()->setFlashdata('pesan','Data berhasil dihapus');
        return redirect()->to('admin/potong-gaji');
    }
}
