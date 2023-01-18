<!-- Begin Page Content -->
<div class="container-fluid">

	<div class="card shadow" style="width: 60% ; margin-bottom: 100px; color:black ;">
		<div class="card-body">
			<form method="POST" action="<?= base_url('admin/potong-gaji/update/'.$Potongan['id_potong']); ?>">
				<?= csrf_field(); ?>
                <div class="form-group">
					<label for="tgl_potong">Tanggal</label>
					<input type="date" name="tgl_potong" class="form-control <?= ($validation->hasError('tgl_potong')) ? 'is-invalid' : ''; ?>" 
					id="tgl_potong"value="<?= old('tgl_potong') ? old('tgl_potong') : $Potongan['tgl_potong']; ?>" >
					<div class="invalid-feedback" >
                        <?= $validation->getError('tgl_potong'); ?>
					</div>
				</div>

                <div class="form-group">
                    <label for="nama_karyawan">Nama Karyawan</label>
                    <select name="nama_karyawan" class="form-control <?= ($validation->hasError('nama_karyawan')) ? 'is-invalid' : ''; ?>"
                    id="nama_karyawan">
                        <option value="<?= $Potongan['id_karyawan']; ?>"><?= ucwords($Potongan['nama_karyawan']); ?></option>
                    </select>
                    <div class="invalid-feedback" >
                        <?= $validation->getError('nama_karyawan'); ?>
                    </div>
                </div>

                <div class="form-group">
					<label for="nominal">Jumlah</label>
					<input type="number" name="nominal" class="form-control <?= ($validation->hasError('nominal')) ? 'is-invalid' : ''; ?>" 
					id="nominal"value="<?= old('nominal') ? old('nominal'): $Potongan['nominal']; ?>" placeholder="jumlah potongan gaji">
					<div class="invalid-feedback" >
                        <?= $validation->getError('nominal'); ?>
					</div>
				</div>

				<button type="submit" class="btn btn-success" >Simpan</button>
				<button type="reset" class="btn btn-danger" >Reset</button>
				<a href="<?= base_url('admin/potong-gaji') ?>" class="btn btn-primary">Kembali</a>

			</form>
		</div>
	</div>
</div>