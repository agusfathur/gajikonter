<!-- Begin Page Content -->
<div class="container-fluid">

	<div class="card shadow" style="width: 60% ; margin-bottom: 100px; color:black ;">
		<div class="card-body">
			<form method="POST" action="<?= base_url('admin/data-divisi/update/'.$dataDivisi['id_divisi']); ?>">
				<?= csrf_field(); ?>
				<div class="form-group">
					<label for="nama_divisi">Nama Divisi</label>
					<input type="text" name="nama_divisi" class="form-control <?= ($validation->hasError('nama_divisi')) ? 'is-invalid' : ''; ?>" 
					id="nama_divisi" value="<?= (old('nama_divisi')) ? old('nama_divisi') : $dataDivisi['nama_divisi'] ?>" autofocus>
					<div class="invalid-feedback" >
                        <?= $validation->getError('nama_divisi'); ?>
					</div>
				</div>

				<div class="form-group">
					<label for="fee">FEE</label>
					<input type="number" name="fee" class="form-control <?= ($validation->hasError('fee')) ? 'is-invalid' : ''; ?>" 
					id="fee"value="<?= (old('fee')) ? old('fee') : $dataDivisi['fee'] ?>" >
					<div class="invalid-feedback" >
                        <?= $validation->getError('fee'); ?>
					</div>
				</div>
				
				<div class="form-group">
					<label for="bonus">Bonus</label>
					<input type="number" name="bonus" class="form-control <?= ($validation->hasError('bonus')) ? 'is-invalid' : ''; ?>" 
					id="bonus" value="<?= (old('bonus')) ? old('bonus') : $dataDivisi['bonus'] ?>">
					<div class="invalid-feedback" >
                        <?= $validation->getError('bonus'); ?>
					</div>
				</div>

				<div class="form-group">
					<label for="gaji_harian">Gaji Harian</label>
					<input type="number" name="gaji_harian" class="form-control <?= ($validation->hasError('gaji_harian')) ? 'is-invalid' : ''; ?>"
					id="gaji_harian" value="<?= (old('gaji_harian')) ? old('gaji_harian') : $dataDivisi['gaji_harian'] ?>">
					<div class="invalid-feedback" >
                        <?= $validation->getError('gaji_harian'); ?>
					</div>
				</div>

				<button type="submit" class="btn btn-success" >Simpan</button>
				<button type="reset" class="btn btn-danger" >Reset</button>
				<a href="<?= base_url('admin/data-divisi') ?>" class="btn btn-primary">Kembali</a>

			</form>
		</div>
	</div>
</div>