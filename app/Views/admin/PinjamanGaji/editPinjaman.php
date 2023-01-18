<!-- Begin Page Content -->
<div class="container-fluid">

	<div class="card shadow" style="width: 60% ; margin-bottom: 100px; color:black ;">
		<div class="card-body">
			<form method="POST" action="<?= base_url('admin/pinjaman/update/'.$Pinjaman['id_pinjam']); ?>">
				<?= csrf_field(); ?>
                <div class="form-group">
					<label for="tgl">Tanggal</label>
					<input type="date" name="tgl" class="form-control <?= ($validation->hasError('tgl')) ? 'is-invalid' : ''; ?>" 
					id="tgl"value="<?= old('tgl') ? old('tgl'): $Pinjaman['tgl'] ; ?>" >
					<div class="invalid-feedback" >
                        <?= $validation->getError('tgl'); ?>
					</div>
				</div>

                <div class="form-group">
                    <label for="nama_karyawan">Nama Karyawan</label>
                    <select name="nama_karyawan" class="form-control <?= ($validation->hasError('nama_karyawan')) ? 'is-invalid' : ''; ?>"
                    id="nama_karyawan">
                        <option value="<?= $Pinjaman['id_karyawan']; ?>"><?= ucwords($Pinjaman['nama_karyawan']); ?></option>
                    </select>
                    <div class="invalid-feedback" >
                        <?= $validation->getError('nama_karyawan'); ?>
                    </div>
                </div>

                <div class="form-group">
					<label for="nominal">Jumlah</label>
					<input type="number" name="nominal" class="form-control <?= ($validation->hasError('nominal')) ? 'is-invalid' : ''; ?>" 
					id="nominal"value="<?= old('nominal')? old('nominal') : $Pinjaman['nominal'] ; ?>" placeholder="jumlah pinjaman gaji">
					<div class="invalid-feedback" >
                        <?= $validation->getError('nominal'); ?>
					</div>
				</div>

				<button type="submit" class="btn btn-success" >Simpan</button>
				<button type="reset" class="btn btn-danger" >Reset</button>
				<a href="<?= base_url('admin/pinjaman') ?>" class="btn btn-primary">Kembali</a>

			</form>
		</div>
	</div>
</div>