<?php

namespace App\Controllers\admin;
use App\Controllers\BaseController;
use App\Models\GajiModel;
use App\Models\DivisiModel;
class DataKaryawan extends BaseController
{

    protected $gajiModel;
    protected $divisiModel;
    public function __construct()
    {   
        
        $this->gajiModel = new GajiModel();
        $this->divisiModel = new DivisiModel();
    }
    public function index()
    {   
        if(session()->get('hak_akses') != '1'){
            return redirect()->to('karyawan/dashboard');
            
        }
        
        $data = [
            'title' => 'Data Karyawan',
            'karyawan' => session()->get(),
            'dataKaryawan' => $this->gajiModel->findAll()
        ];
        echo view('layout_admin/header', $data);
        echo view('layout_admin/sidebar', $data);
        echo view('admin/data_karyawan', $data);
        echo view('layout_admin/footer');
    }

    public function tambahKaryawan()
    {   
        if(session()->get('hak_akses') != '1'){
            return redirect()->to('karyawan/dashboard');
            
        }
        
        $data = [
            'title' => 'Tambah Data Karyawan',
            'karyawan' => session()->get(),
            'validation' => \Config\Services::validation(),
            'dataDivisi' => $this->divisiModel->findAll()
        ];
        echo view('layout_admin/header', $data);
        echo view('layout_admin/sidebar', $data);
        echo view('admin/DataKaryawan/tambahKaryawan', $data);
        echo view('layout_admin/footer');
    }
    public function editKaryawan($id)
    {   
        if(session()->get('hak_akses') != '1'){
            return redirect()->to('karyawan/dashboard');
            
        }
        
        $data = [
            'title' => 'Tambah Data Karyawan',
            'karyawan' => session()->get(),
            'validation' => \Config\Services::validation(),
            'dataKaryawan' => $this->gajiModel->find($id),
            'dataDivisi' => $this->divisiModel->findAll()
        ];
        echo view('layout_admin/header', $data);
        echo view('layout_admin/sidebar', $data);
        echo view('admin/DataKaryawan/editKaryawan', $data);
        echo view('layout_admin/footer');
    }

    public function save()
    {   
        if(!$this->validate([
            'nik' => [
                'rules' => 'required|is_unique[data_karyawan.nik]',
                'errors'=> [
                    'required' => 'NIK wajib diisi',
                    'is_unique' => 'NIK sudah ada'
                ]
            ],
            'nama_karyawan' => [
                'rules' => 'required',
                'errors'=> [
                    'required' => 'Nama wajib diisi',
                ]
            ],
            'username' => [
                'rules'=>'required',
                'errors'=> [
                    'required' => 'Username wajib diisi',
                ]
            ],
            'password' => [
                'rules' =>'required|min_length[5]',
                'errors'=> [
                    'required' => 'Password wajib diisi',
                    'min_length' => 'Password minimal 5 Character'
                ]
            ],
            'jenis_kelamin' => [
                'rules'=>'required',
                'errors'=> [
                    'required' => 'Jenis Kelamin harus diisi',
                ]
            ],
            'divisi' => [
                'rules'=>'required',
                'errors'=> [
                    'required' => 'Divisi wajib diisi',
                ]
            ],
            'alamat' => [
                'rules'=>'required',
                'errors'=> [
                    'required' => 'Alamat wajib diisi',
                ]
            ],
            'no_hp' => [
                'rules'=>'required',
                'errors'=> [
                    'required' => 'No HP wajibdiisi',
                ]
            ],
            'foto' => [
                'rules' => 'max_size[foto,1024]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]',
                    'errors' => [
                        'max_size' => 'Ukuran gambar terlalu besar',
                        'is_image' => 'Yang anda pilih bukan gambar',
                        'mime_in' => 'Yang anda pilih bukan gambar'
                ]
            ],
            'hak_akses' => [
                'rules'=>'required',
                'errors'=> [
                    'required' => 'Hak Akses wajibdiisi',
                ]
            ],

        ])){
            return redirect()->to('admin/data-karyawan/tambah-karyawan')->withInput();
        };

        $fileFoto = $this->request->getFile('foto');
        // apakah Tidak ada gambar yang diupload
        if($fileFoto->getError() == 4){
            $namaFoto = 'default.png';
        } else{ 
            $namaFoto = $fileFoto->getRandomName();
            $fileFoto->move('img', $namaFoto);
        }
        
        $this->gajiModel->save([
            'nik' => $this->request->getVar('nik'),
            'nama_karyawan' => $this->request->getVar('nama_karyawan'),
            'username' => $this->request->getVar('username'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
            'divisi' => $this->request->getVar('divisi'),
            'no_hp' => $this->request->getVar('no_hp'),
            'alamat' => strtolower($this->request->getVar('alamat')),
            'hak_akses' => $this->request->getVar('hak_akses'),
            'foto' => $namaFoto
        ]);
        session()->setFlashdata('pesan', 'Berhasil Tambah Karyawan');
        return redirect()->to('admin/data-karyawan');
    }

    public function update($id)
    {
        $dataUser = $this->gajiModel->where('id_karyawan', $id)->first();
        
        // cek password
        if($dataUser['password'] == $this->request->getVar('password')){
            $rules_pass = 'required|min_length[5]';
        } else {
            $rules_pass = 'permit_empty';
        }

        // cek nik
        if($dataUser['nik'] == $this->request->getVar('nik')){
            $rules_nik = 'required|is_unique[data_karyawan.nik]';
        } else {
            $rules_nik = 'required';
        }

        if(!$this->validate([
            'nik' => [
                'rules' => $rules_nik,
                'errors'=> [
                    'required' => 'NIK wajib diisi',
                ]
            ],
            'nama_karyawan' => [
                'rules' => 'required',
                'errors'=> [
                    'required' => 'Nama wajib diisi',
                ]
            ],
            'username' => [
                'rules'=>'required',
                'errors'=> [
                    'required' => 'Username wajib diisi',
                ]
            ],
            'password' => [
                'rules' => $rules_pass,
                'errors'=> [
                    'required' => 'Password wajib diisi',
                    'min_length' => 'Password minimal 5 Character'
                ]
            ],
            'jenis_kelamin' => [
                'rules'=>'required',
                'errors'=> [
                    'required' => 'Jenis Kelamin harus diisi',
                ]
            ],
            'divisi' => [
                'rules'=>'required',
                'errors'=> [
                    'required' => 'Divisi wajib diisi',
                ]
            ],
            'alamat' => [
                'rules'=>'required',
                'errors'=> [
                    'required' => 'Alamat wajib diisi',
                ]
            ],
            'no_hp' => [
                'rules'=>'required',
                'errors'=> [
                    'required' => 'No HP wajib diisi',
                ]
            ],
            'foto' => [
                'rules' => 'max_size[foto,1024]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]',
                    'errors' => [
                        'max_size' => 'Ukuran gambar terlalu besar',
                        'is_image' => 'Yang anda pilih bukan gambar',
                        'mime_in' => 'Yang anda pilih bukan gambar'
                ]
            ],
            'hak_akses' => [
                'rules'=>'required',
                'errors'=> [
                    'required' => 'Hak Akses wajib diisi',
                ]
            ],

        ])){
            return redirect()->to('admin/data-karyawan/edit-karyawan/'.$id)->withInput();
        };

        $fileFoto = $this->request->getFile('foto');

        // cek gambar, apkaah tetap gambar lama
        if($fileFoto->getError() == 4){
            $namaFoto = $this->request->getVar('fotoLama');
        } else {
            $namaFoto = $fileFoto->getRandomName();
            $fileFoto->move('img',$namaFoto);
            // hapus file lama jika ada
            if($this->request->getVar('fotoLama') != 'default.png'){
            // hapus gambar
                unlink("img/".$this->request->getVar('fotoLama'));
            }
        }

        if($this->request->getVar('password') && $this->request->getVar('password') != null){
            $pass = password_hash($this->request->getVar('password'), PASSWORD_DEFAULT);
        } else {
            $pass = $dataUser['password'];
        }
        
        $this->gajiModel->save([
            'id_karyawan' => $id,
            'nik' => $this->request->getVar('nik'),
            'nama_karyawan' => $this->request->getVar('nama_karyawan'),
            'username' => $this->request->getVar('username'),
            'password' => $pass,
            'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
            'divisi' => $this->request->getVar('divisi'),
            'no_hp' => $this->request->getVar('no_hp'),
            'alamat' => strtolower($this->request->getVar('alamat')),
            'hak_akses' => $this->request->getVar('hak_akses'),
            'foto' => $namaFoto
        ]);
        session()->setFlashdata('pesan', 'Berhasil edit karyawan');
        return redirect()->to('admin/data-karyawan');
    }

    public function delete($id)
    {   
        $user= $this->gajiModel->find($id);

        if($user['foto']){
            if($user['foto'] != 'default.png'){
            // hapus gambar
            unlink("img/".$user['foto']);
            }
        }
        $this->gajiModel->delete($id);
        session()->setFlashdata('pesan','Data berhasil dihapus');
        return redirect()->to('admin/data-karyawan');
    }
}
