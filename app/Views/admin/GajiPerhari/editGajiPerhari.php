<!-- Begin Page Content -->
<div class="container-fluid">

	<div class="card shadow" style="width: 60% ; margin-bottom: 100px; color:black ;">
		<div class="card-body">
			<form method="POST" action="<?= base_url('admin/gaji-perhari/update/'.$gajiHarian['id_gaji']); ?>">
				<?= csrf_field(); ?>
                <div class="form-group">
					<label for="tgl">Tanggal</label>
					<input type="date" name="tgl" class="form-control <?= ($validation->hasError('tgl')) ? 'is-invalid' : ''; ?>" 
					id="tgl"value="<?= old('tgl')  ? old('tgl'): $gajiHarian['tgl'];; ?>" >
					<div class="invalid-feedback" >
                        <?= $validation->getError('tgl'); ?>
					</div>
				</div>

                <div class="form-group">
                    <label for="nama_karyawan">Nama Karyawan</label>
                    <select name="nama_karyawan" class="form-control <?= ($validation->hasError('nama_karyawan')) ? 'is-invalid' : ''; ?>"
                    id="nama_karyawan">
                            <option value="<?= $gajiHarian['id_karyawan']; ?>"><?= ucwords($gajiHarian['nama_karyawan']); ?> ( <?= ucwords($gajiHarian['divisi']); ?>)</option>
                    </select>
                    <div class="invalid-feedback" >
                        <?= $validation->getError('nama_karyawan'); ?>
                    </div>
                </div>

				<div class="form-group">
					<label for="">Fee &amp; bonus</label>
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<div class="input-group-text">
							<input type="checkbox" value="<?= $gajiHarian['fee'] ? $gajiHarian['fee']: 'true';?>" name="fee">
							</div>
						</div>
						<input type="number" class="form-control" name="bonus" placeholder="klik fee jika terpenuhi "
						value="<?= old('bonus') ? old('bonus') : $gajiHarian['bonus']; ?>">
					</div>
				</div>
                <div class="form-group">
					<label for="keterangan">Keterangan</label>
					<input type="text" name="keterangan" class="form-control <?= ($validation->hasError('keterangan')) ? 'is-invalid' : ''; ?>" 
					id="keterangan"value="<?= old('keterangan')? old('keterangan'): $gajiHarian['keterangan'] ; ?>" placeholder=" keterangan">
					<div class="invalid-feedback" >
                        <?= $validation->getError('keterangan'); ?>
					</div>
				</div>

				<button type="submit" class="btn btn-success" >Simpan</button>
				<button type="reset" class="btn btn-danger" >Reset</button>
				<a href="<?= base_url('admin/gaji-perhari') ?>" class="btn btn-primary">Kembali</a>

			</form>
		</div>
	</div>
</div>