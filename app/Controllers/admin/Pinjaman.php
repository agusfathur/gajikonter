<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\GajiModel;
use App\Models\PinjamanModel;

class Pinjaman extends BaseController
{
    protected $pinjamanModel;
    protected $gajiModel;
    public function __construct()
    {
        $this->pinjamanModel = new PinjamanModel();
        $this->gajiModel = new GajiModel();
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
            $pinjaman = $this->pinjamanModel->where('nik', $keywordNama)->search($bulan);
        } else if($keywordNama){
            $pinjaman = $this->pinjamanModel->where('nik', $keywordNama)->findAll();
        }else if($bulan){
            $pinjaman = $this->pinjamanModel->search($bulan);
        } else {
            $pinjaman = $this->pinjamanModel;
        }

        $data = [
            'title' => 'Pinjaman Gaji',
            'karyawan' => session()->get(),
            'dataKaryawan' => $this->gajiModel->findAll(),
            'Pinjaman' => $pinjaman->paginate(5,'pinjaman'),
            'pager' => $this->pinjamanModel->pager
        ];
        echo view('layout_admin/header', $data);
        echo view('layout_admin/sidebar', $data);
        echo view('admin/pinjaman', $data);
        echo view('layout_admin/footer');
    }

    public function tambahPinjaman()
    {
        if (session()->get('hak_akses') != '1') {
            return redirect()->to('karyawan/dashboard');

        }

        $data = [
            'title' => 'Tambah Pinjaman Gaji',
            'karyawan' => session()->get(),
            'validation' => \Config\Services::validation(),
            'dataKaryawan' =>$this->gajiModel->findAll()
        ];
        echo view('layout_admin/header', $data);
        echo view('layout_admin/sidebar', $data);
        echo view('admin/PinjamanGaji/tambahPinjaman', $data);
        echo view('layout_admin/footer');
    }

    public function editPinjaman($id)
    {
        if (session()->get('hak_akses') != '1') {
            return redirect()->to('karyawan/dashboard');

        }

        $data = [
            'title' => 'Edit Pinjaman Gaji',
            'karyawan' => session()->get(),
            'validation' => \Config\Services::validation(),
            'Pinjaman' => $this->pinjamanModel->find($id)
        ];
        echo view('layout_admin/header', $data);
        echo view('layout_admin/sidebar', $data);
        echo view('admin/PinjamanGaji/editPinjaman', $data);
        echo view('layout_admin/footer');
    }

    public function save()
    {
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
            'nominal' => [
                'rules'=>'required',
                'errors'=> [
                    'required' => 'Nominal wajib diisi',
                ]
            ],
        ])){
            return redirect()->to('admin/pinjaman/tambah-pinjaman')->withInput();
        };
        $nama = $this->request->getVar('nama_karyawan');
        $dataKaryawan = $this->gajiModel->where('id_karyawan', $nama)->first();
        $tgl = $this->request->getVar('tgl');
        $bln = explode('-',$tgl);
        $bulan = $bln[1] . '-' . $bln[0];

        $this->pinjamanModel->save([
            'tgl' => $tgl,
            'id_karyawan' => $dataKaryawan['id_karyawan'],
            'nama_karyawan' => $dataKaryawan['nama_karyawan'],
            'bulan' =>$bulan,
            'nik' => $dataKaryawan['nik'],
            'nominal' => $this->request->getVar('nominal'),
            
        ]);
        session()->setFlashdata('pesan', 'Berhasil tambah divisi');
        return redirect()->to('admin/pinjaman');
    }

    public function update($id)
    {
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
            'nominal' => [
                'rules'=>'required',
                'errors'=> [
                    'required' => 'Nominal wajib diisi',
                ]
            ],
        ])){
            return redirect()->to('admin/pinjaman/edit-pinjaman/'.$id)->withInput();
        };
        $nama = $this->request->getVar('nama_karyawan');
        $dataKaryawan = $this->gajiModel->where('id_karyawan', $nama)->first();
        $tgl = $this->request->getVar('tgl');
        $bln = explode('-',$tgl);
        $bulan = $bln[1] . '-' . $bln[0];

        $this->pinjamanModel->save([
            'id_pinjam' => $id,
            'tgl' => $tgl,
            'id_karyawan' => $dataKaryawan['id_karyawan'],
            'nama_karyawan' => $dataKaryawan['nama_karyawan'],
            'bulan' =>$bulan,
            'nik' => $dataKaryawan['nik'],
            'bonus' => $this->request->getVar('bonus'),
            'nominal' => $this->request->getVar('nominal'),
            
        ]);
        session()->setFlashdata('pesan', 'Berhasil tambah divisi');
        return redirect()->to('admin/pinjaman');
    }

    public function delete($id)
    {   
        $this->pinjamanModel->delete($id);
        session()->setFlashdata('pesan','Data berhasil dihapus');
        return redirect()->to('admin/pinjaman');
    }
}
