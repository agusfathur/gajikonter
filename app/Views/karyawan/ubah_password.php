<!-- Begin Page Content -->
<div class="container-fluid">

	<?php if(session()->getFlashdata('pesan')) : ?>
		<div class="alert alert-success " role="alert" style="width:40% ;">
				<?= session()->getFlashdata('pesan'); ?>
		</div>
	<?php endif; ?>

	<div class="card shadow text-dark" style="width: 40%">
		<div class="card-body">
			<form method="POST" action="<?= base_url('karyawan/ubah-password/update-password/'.session()->get('id_karyawan')); ?>">
				<?= csrf_field(); ?>
				<div class="form-grup">
					<label for="passBaru">Password Baru</label>
					<input type="password" name="passBaru" class="form-control <?= ($validation->hasError('passBaru')) ? 'is-invalid' : ''; ?>" 
					id="passBaru" autofocus>
					<div class="invalid-feedback" >
                        <?= $validation->getError('passBaru'); ?>
                	</div>
				</div>
				<br>
				<div class="form-grup">
					<label for="ulangPass">Ulangi Password Baru</label>
					<input type="password" name="ConfirmPass" class="form-control <?= ($validation->hasError('ConfirmPass')) ? 'is-invalid' : ''; ?>" 
					id="ulangPass">
					<div class="invalid-feedback" >
                        <?= $validation->getError('ConfirmPass'); ?>
    				</div>
				</div>
				<br>
				<button type="submit" class="btn btn-success">Ubah</button>
			</form>
		</div>
	</div>

</div>
<!-- /.container-fluid -->