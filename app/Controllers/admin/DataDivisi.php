<?php

namespace App\Controllers\admin;
use App\Controllers\BaseController;
use App\Models\DivisiModel;
class DataDivisi extends BaseController
{
    protected $divisiModel;
    public function __construct()
    {   
        $this->divisiModel = new DivisiModel();
        
    }
    public function index()
    {   
        if(session()->get('hak_akses') != '1'){
            return redirect()->to('karyawan/dashboard');
        }
        
        $data = [
            'title' => 'Data Divisi',
            'karyawan' => session()->get(),
            'dataDivisi' => $this->divisiModel->findAll()
        ];
        echo view('layout_admin/header', $data);
        echo view('layout_admin/sidebar',$data);
        echo view('admin/data_divisi', $data);
        echo view('layout_admin/footer');
    }

    public function tambahDivisi()
    {
        if(session()->get('hak_akses') != '1'){
            return redirect()->to('karyawan/dashboard');
        }

        $data = [
            'title' => 'Tambah Data Divisi',
            'validation' => \Config\Services::validation(),
            'karyawan' => session()->get(),
        ];
        echo view('layout_admin/header', $data);
        echo view('layout_admin/sidebar',$data);
        echo view('admin/DataDivisi/tambahDivisi', $data);
        echo view('layout_admin/footer');
    }

    public function editDivisi($id)
    {
        if(session()->get('hak_akses') != '1'){
            return redirect()->to('karyawan/dashboard');
        }

        $data = [
            'title' => 'Edit Data Divisi',
            'validation' => \Config\Services::validation(),
            'karyawan' => session()->get(),
            'dataDivisi' => $this->divisiModel->find($id)
        ];
        echo view('layout_admin/header', $data);
        echo view('layout_admin/sidebar',$data);
        echo view('admin/DataDivisi/editDivisi', $data);
        echo view('layout_admin/footer');
    }

    public function save()
    {   
        if(!$this->validate([
            'nama_divisi' => [
                'rules' => 'required|is_unique[data_divisi.nama_divisi]',
                'errors'=> [
                    'required' => 'Nama Divisi wajib diisi',
                    'is_unique' => 'Nama Divisi sudah ada'
                ]
            ],
            'fee' => [
                'rules' => 'required',
                'errors'=> [
                    'required' => 'Fee wajib diisi',
                ]
            ],
            'bonus' => [
                'rules'=>'required',
                'errors'=> [
                    'required' => 'Bonus wajib diisi',
                ]
            ],
            'gaji_harian' => [
                'rules'=>'required',
                'errors'=> [
                    'required' => 'Gaji Harian wajib diisi',
                ]
            ],
        ])){
            return redirect()->to('admin/data-divisi/tambah-divisi')->withInput();
        };
        
        $this->divisiModel->save([
            'nama_divisi' => $this->request->getVar('nama_divisi'),
            'fee' => $this->request->getVar('fee'),
            'bonus' => $this->request->getVar('bonus'),
            'gaji_harian' => $this->request->getVar('gaji_harian'),
            
        ]);
        session()->setFlashdata('pesan', 'Berhasil tambah divisi');
        return redirect()->to('admin/data-divisi');
    }

    public function update($id)
    {   
        if(!$this->validate([
            'nama_divisi' => [
                'rules' => 'required',
                'errors'=> [
                    'required' => 'Nama Divisi wajib diisi',
                ]
            ],
            'fee' => [
                'rules' => 'required',
                'errors'=> [
                    'required' => 'Fee wajib diisi',
                ]
            ],
            'bonus' => [
                'rules'=>'required',
                'errors'=> [
                    'required' => 'Bonus wajib diisi',
                ]
            ],
            'gaji_harian' => [
                'rules'=>'required',
                'errors'=> [
                    'required' => 'Gaji Harian wajib diisi',
                ]
            ],
        ])){
            return redirect()->to('admin/data-divisi/edit-divisi/'.$id)->withInput();
        };
        
        $this->divisiModel->save([
            'id_divisi' => $id,
            'nama_divisi' => $this->request->getVar('nama_divisi'),
            'fee' => $this->request->getVar('fee'),
            'bonus' => $this->request->getVar('bonus'),
            'gaji_harian' => $this->request->getVar('gaji_harian'),
            
        ]);
        session()->setFlashdata('pesan', 'Data berhasil diedit');
        return redirect()->to('admin/data-divisi');
    }

    public function delete($id)
    {   
        $this->divisiModel->delete($id);
        session()->setFlashdata('pesan','Data berhasil dihapus');
        return redirect()->to('admin/data-divisi');
    }
}
