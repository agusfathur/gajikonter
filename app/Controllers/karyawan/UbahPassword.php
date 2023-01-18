<?php

namespace App\Controllers\karyawan;
use App\Controllers\BaseController;
use App\Models\GajiModel;
class UbahPassword extends BaseController
{

    protected $gajiModel;
    public function __construct()
    {
        $this->gajiModel = new GajiModel();
    }

    public function index()
    {   
        if(session()->get('hak_akses') != '2'){
            return redirect()->to('admin/dashboard');
        }
        
        $data =  [
            'title' => 'Ubah Password',
            'validation' => \Config\Services::validation(),
            'karyawan' => session()->get()
        ];
        echo view('layout_karyawan/header', $data);
        echo view('layout_karyawan/sidebar');
        echo view('karyawan/ubah_password', $data);
        echo view('layout_karyawan/footer');
    }

    public function updatePass($id)
    {       
        if(!$this->validate([
            'passBaru' => [
                'rules' =>'required|min_length[5]',
                'errors'=> [
                    'required' => 'Password harus diisi',
                    'min_length' => 'Password minimal 5 Character'
                ]
                ],
            'ConfirmPass' => [
                'rules' =>'required|matches[passBaru]',
                'errors'=> [
                    'required' => 'Password harus diisi',
                    'matches' => 'Password harus sama dengan Password Baru'
                ]
                ]
            
        ])){
            return redirect()->to('karyawan/ubah-password')->withInput();
        };
        
        $this->gajiModel->save([
            'id_karyawan' => $id,
            'password'=> password_hash($this->request->getVar('passBaru'), PASSWORD_DEFAULT)
        ]);
        session()->setFlashdata('pesan', 'Berhasil Ubah Password');
        return redirect()->to('karyawan/ubah-password');
    }
}