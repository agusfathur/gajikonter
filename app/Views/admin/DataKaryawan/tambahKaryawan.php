<!-- Begin Page Content -->
<div class="container-fluid">

<div class="card shadow" style="width: 60% ; margin-bottom: 100px; color:black;">
	<div class="card-body">
		<form method="POST" action="<?= base_url('admin/data-karyawan/save'); ?>" enctype="multipart/form-data">
			<?= csrf_field(); ?>
			<div class="form-group">
				<label for="nik">NIK</label>
				<input type="number" name="nik" class="form-control <?= ($validation->hasError('nik')) ? 'is-invalid' : ''; ?>" id="nik" 
				autofocus placeholder="NIK" value="<?= old('nik'); ?>">
				<div class="invalid-feedback" >
					<?= $validation->getError('nik'); ?>
                </div>
			</div>

			<div class="form-group">
				<label for="nama_karyawan">Nama Karyawan</label>
				<input type="text" name="nama_karyawan" class="form-control <?= ($validation->hasError('nama_karyawan')) ? 'is-invalid' : ''; ?>"
				id="nama_karyawan" placeholder="Nama Karyawan..." value="<?= old('nama_karyawan'); ?>">
				<div class="invalid-feedback" >
					<?= $validation->getError('nama_karyawan'); ?>
                </div>
			</div>

			<div class="form-group">
				<label for="username" >Username</label>
				<input type="text" name="username" class="form-control <?= ($validation->hasError('username')) ? 'is-invalid' : ''; ?>" 
				id="username" placeholder="username..." value="<?= old('username'); ?>">
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
					<?php if (old('jenis_kelamin')) : ?>
						<option value="<?= old('jenis_kelamin'); ?> "><?= ucwords(old('jenis_kelamin')); ?> </option>
					<?php endif; ?>
					<option value=""> Pilih Jenis Kelamin </option>
					<option value="laki-laki">Laki-laki</option>
					<option value="perempuan">Perempuan</option>
				</select>
				<div class="invalid-feedback" >
					<?= $validation->getError('jenis_kelamin'); ?>
                </div>
			</div>

			<div class="form-group">
				<label for="divisi">Divisi</label>
				<select name="divisi" class="form-control <?= ($validation->hasError('divisi')) ? 'is-invalid' : ''; ?>"
				id="divisi">
						<option value=""> Pilih Divisi </option>
						<?php foreach($dataDivisi as $ds) :?>
							<option value="<?= $ds['nama_divisi']; ?>"><?= ucwords($ds['nama_divisi']); ?></option>
						<?php endforeach; ?>
				</select>
				<div class="invalid-feedback" >
					<?= $validation->getError('divisi'); ?>
                </div>
			</div>

			<div class="form-group">
				<label for="no_hp">Nomer HP</label>
				<input type="number" name="no_hp" class="form-control <?= ($validation->hasError('no_hp')) ? 'is-invalid' : ''; ?>"
				id="no_hp" placeholder="Nomer Hp..." value="<?= old('no_hp'); ?>">
				<div class="invalid-feedback" >
					<?= $validation->getError('no_hp'); ?>
                </div>
			</div>

			<div class="form-group">
				<label for="alamat">Alamat</label>
				<input type="text" name="alamat" class="form-control <?= ($validation->hasError('alamat')) ? 'is-invalid' : ''; ?>"
				id="alamat" placeholder="Alamat..." value="<?= old('alamat'); ?>">
				<div class="invalid-feedback" >
					<?= $validation->getError('alamat'); ?>
                </div>
			</div>

			<div class="form-group">
				<label for="hak_akses">Hak Akses</label>
				<select name="hak_akses" class="form-control <?= ($validation->hasError('hak_akses')) ? 'is-invalid' : ''; ?>" 
				id="hak_akses">
					<?php if(old('hak_akses')) : ?>
						<?php if(old('hak_akses') == 1) : ?>
							<option value="1">Admin</option>
						<?php else: ?>
							<option value="2">Karyawan</option>
						<?php endif; ?>
						<option value="2">Karyawan</option>
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
				id="foto">
				<div class="invalid-feedback" >
					<?= $validation->getError('foto'); ?>
                </div>
			</div>


			<button type="submit" class="btn btn-success" >Tambah</button>
			<button type="reset" class="btn btn-danger" >Reset</button>
			<a href="<?= base_url('admin/data-karyawan'); ?>" class="btn btn-primary">Kembali</a>

		</form>
	</div>
</div>
</div>