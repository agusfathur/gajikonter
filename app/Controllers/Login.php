<?php

namespace App\Controllers;

use App\Models\GajiModel;

class Login extends BaseController
{

    public function index()
	{   
        if(session()->get('id_karyawan')){
            return redirect()->back();
        }
		return view('login');
	}

	public function auth()
	{
		$gajiModel = new GajiModel();
		$username = $this->request->getPost('username');
		$password = $this->request->getPost('password');
		
		$dataUser = $gajiModel->where('username', $username)->first();
        if ($dataUser) {
            if (password_verify($password, $dataUser['password'])) {
                session()->set([
                    'id_karyawan' => $dataUser['id_karyawan'],
                    'username' => $dataUser['username'],
                    'nik' => $dataUser['nik'],
                    'nama_karyawan' => $dataUser['nama_karyawan'],
                    'jenis_kelamin' => $dataUser['jenis_kelamin'],
                    'divisi' => $dataUser['divisi'],
                    'no_hp' => $dataUser['no_hp'],
                    'foto' => $dataUser['foto'],
                    'hak_akses' => $dataUser['hak_akses']
                ]);
				if($dataUser['hak_akses'] == '1'){
					return redirect()->to('admin/dashboard');
				} else if($dataUser['hak_akses'] == '2'){
					return redirect()->to('karyawan/dashboard' );
				} else{
					return redirect()->to('login');
				}
            } else {
                session()->setFlashdata('pesan', 'Username & Password Salah');
                return redirect()->back();
            }
        } else {
            session()->setFlashdata('pesan', 'Username & Password Salah');
            return redirect()->back();
        }
	}

    public function logout(){
		session()->destroy();
		return redirect()->to('login');
	}

}
