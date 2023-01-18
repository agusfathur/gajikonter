<!-- Begin Page Content -->
<div class="container-fluid">


    <div class="card shadow" style="width: 60% ; margin-bottom: 100px; color:black ">
        <div class="card-body">
            <form method="POST" action="<?= base_url('admin/data-karyawan/update/'.$dataKaryawan['id_karyawan']); ?>" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <input type="hidden" name="fotoLama" id="" value="<?= $dataKaryawan['foto']; ?>">
                <div class="form-group">
                    <label for="nik">NIK</label>
                    <input type="number" name="nik" class="form-control <?= ($validation->hasError('nik')) ? 'is-invalid' : ''; ?>" id="nik" 
                    autofocus placeholder="NIK" value="<?= (old('nik')) ? old('nik') : $dataKaryawan['nik'] ?>">
                    <div class="invalid-feedback" >
                        <?= $validation->getError('nik'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="nama_karyawan">Nama Karyawan</label>
                    <input type="text" name="nama_karyawan" class="form-control <?= ($validation->hasError('nama_karyawan')) ? 'is-invalid' : ''; ?>"
                    id="nama_karyawan" placeholder="Nama Karyawan..." value="<?= (old('nama_karyawan')) ? old('nama_karyawan') : $dataKaryawan['nama_karyawan'] ?>">
                    <div class="invalid-feedback" >
                        <?= $validation->getError('nama_karyawan'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="username" >Username</label>
                    <input type="text" name="username" class="form-control <?= ($validation->hasError('username')) ? 'is-invalid' : ''; ?>" 
                    id="username" placeholder="username..." value="<?= (old('username')) ? old('username') : $dataKaryawan['username'] ?>">
                    <div class="invalid-feedback" >
                        <?= $validation->getError('username'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control <?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?>" 
                    id="password" placeholder="password minimal 5 character...">
                    <div class="invalid-feedback" >
                        <?= $validation->getError('password'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="jenis_kelamin">Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="form-control <?= ($validation->hasError('jenis_kelamin')) ? 'is-invalid' : ''; ?>" 
                    id="jenis_kelamin">
                    <?php if(old('jenis_kelamin')): ?>
                            <?php if(old('jenis_kelamin') == 'laki-laki') :  ?>
                                <option value="<?= old('jenis_kelamin'); ?>"><?= ( old('jenis_kelamin')== 'laki-laki') ? 'Laki-laki' : 'perempuan' ; ?></option>
                                <option value="Perempuan">Perempuan</option>
                            <?php else: ?>
                                <option value="<?= old('jenis_kelamin'); ?>"><?= ( old('jenis_kelamin') == 'perempuan') ? 'Perempuan' : 'Laki-laki' ; ?></option>
                                <option value="laki-laki">Laki-laki</option>
                            <?php endif; ?>
                    <?php elseif($dataKaryawan['jenis_kelamin']): ?>
                            <?php if($dataKaryawan['jenis_kelamin'] == 'laki-laki') :  ?>
                                <option value="<?= $dataKaryawan['jenis_kelamin']; ?>"><?= ( $dataKaryawan['jenis_kelamin'] == 'laki-laki') ? 'Laki-laki' : 'Perempuan' ; ?></option>
                                <option value="perempuan">Perempuan</option>
                            <?php else: ?>
                                <option value="<?= $dataKaryawan['jenis_kelamin']; ?>"><?= ( $dataKaryawan['jenis_kelamin'] == 'perempuan') ? 'Perempuan' : 'Laki-Laki' ; ?></option>
                                <option value="laki-laki">Laki-laki</option>
                            <?php endif; ?>
                    <?php else: ?>
                        <option value=""> Pilih Jenis Kelamin </option>
                        <option value="laki-laki">Laki-laki</option>
                        <option value="perempuan">Perempuan</option>
                    <?php endif; ?>
                    </select>
                    <div class="invalid-feedback" >
                        <?= $validation->getError('jenis_kelamin'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="divisi">Divisi</label>
                    <select name="divisi" class="form-control <?= ($validation->hasError('divisi')) ? 'is-invalid' : ''; ?>"
                    id="divisi" value="">
                    <?php if(old('divisi')): ?>
                        <option value="<?= old('divisi'); ?>"><?= ucwords(old('divisi')); ?></option>
                        <?php foreach($dataDivisi as $ds) :?>
                            <option value="<?= $ds['nama_divisi']; ?>"><?= ucwords($ds['nama_divisi']); ?></option>
                            <?php if( $ds['nama_divisi'] == old('divisi')) : ?>
                                <option hidden value="<?= $ds['nama_divisi']; ?>"></option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php elseif($dataKaryawan['divisi']): ?>
                        <option value="<?= $dataKaryawan['divisi']; ?>"><?= ucwords($dataKaryawan['divisi']); ?></option>
                        <?php foreach($dataDivisi as $ds) :?>
                            <option value="<?= $ds['nama_divisi']; ?>"><?= ucwords($ds['nama_divisi']); ?></option>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <option  value=""> Pilih Divisi </option>
                        <?php foreach($dataDivisi as $ds) :?>
                            <option value="<?= $ds['nama_divisi']; ?>"><?= ucwords($ds['nama_divisi']); ?></option>
                        <?php endforeach; ?>
                    <?php endif; ?>
                    </select>
                    <div class="invalid-feedback" >
                        <?= $validation->getError('divisi'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="no_hp">Nomer HP</label>
                    <input type="number" name="no_hp" class="form-control <?= ($validation->hasError('no_hp')) ? 'is-invalid' : ''; ?>"
                    id="no_hp" placeholder="Nomer Hp..." value="<?= (old('no_hp')) ? old('no_hp') : $dataKaryawan['no_hp'] ?>">
                    <div class="invalid-feedback" >
                        <?= $validation->getError('no_hp'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" name="alamat" class="form-control <?= ($validation->hasError('alamat')) ? 'is-invalid' : ''; ?>"
                    id="alamat" placeholder="Alamat..." value="<?= (old('alamat')) ? old('alamat') : $dataKaryawan['alamat'] ?>">
                    <div class="invalid-feedback" >
                        <?= $validation->getError('alamat'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="hak_akses">Hak Akses</label>
                    <select name="hak_akses" class="form-control <?= ($validation->hasError('hak_akses')) ? 'is-invalid' : ''; ?>" 
                    id="hak_akses" value="">
                    <?php if(old('hak_akses')): ?>
                            <?php if(old('hak_akses') == '1') :  ?>
                                <option value="<?= old('hak_akses'); ?>">Admin</option>
                                <option value="2">Karyawan</option>
                            <?php else: ?>
                                <option value="<?= old('hak_akses'); ?>">Karyawan</option>
                                <option value="1">Admin</option>
                            <?php endif; ?>
                    <?php elseif($dataKaryawan['hak_akses']): ?>
                            <?php if($dataKaryawan['hak_akses'] == '1') :  ?>
                                <option value="<?= $dataKaryawan['hak_akses']; ?>"><?= ( $dataKaryawan['hak_akses'] == '1') ? 'Admin' : 'Karyawan' ; ?></option>
                                <option value="2">Karyawan</option>
                            <?php else: ?>
                                <option value="<?= $dataKaryawan['hak_akses']; ?>"><?= ( $dataKaryawan['hak_akses'] == '1') ? 'Admin' : 'Karyawan' ; ?></option>
                                <option value="1">Admin</option>
                            <?php endif; ?>
                    <?php else: ?>
                            <option value=""> Pilih Hak Akses </option>
                            <option value="1">Admin</option>
                            <option value="2">Karyawan</option>
                    <?php endif; ?>
                    </select>
                    <div class="invalid-feedback" >
                        <?= $validation->getError('hak_akses'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="foto">Foto</label>
                    <input type="file" name="foto" class="form-control <?= ($validation->hasError('foto')) ? 'is-invalid' : ''; ?>"
                    id="foto" value="<?= (old('foto')) ? old('foto') : $dataKaryawan['foto'] ?>">
                    <div class="invalid-feedback" >
                        <?= $validation->getError('foto'); ?>
                    </div>
                </div>
                

                <button type="submit" class="btn btn-success" >Simpan</button>
                <button type="reset" class="btn btn-danger" >Reset</button>
                <a href="<?= base_url('admin/data-karyawan'); ?>" class="btn btn-primary">Kembali</a>
            </form>
        </div>
    </div>
</div>