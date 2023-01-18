<!-- Begin Page Content -->
<div class="container-fluid">
	<div class="card mx-auto" style="width: 35%">
		<div class="card-header bg-primary text-white text-center">
			FIlter Laporan Absensi
		</div>

		<form method="POST" action="<?= base_url('admin/laporan-absensi/cetak')?>">
		<div class="card-body">
			<div class="form-group row">
				<label for="bulan" class="col-sm-3 col-form-label">Bulan</label>
				<div class="col-sm-9">
					<select class="form-control" name="bulan" id="bulan">
					    <option value=""> Pilih Bulan </option>
					    <option value="01">Januari</option>
					    <option value="02">Februari</option>
					    <option value="03">Maret</option>
					    <option value="04">April</option>
					    <option value="05">Mei</option>
					    <option value="06">Juni</option>
					    <option value="07">Juli</option>
					    <option value="08">Agustus</option>
					    <option value="09">September</option>
					    <option value="10">Oktober</option>
					    <option value="11">November</option>
					    <option value="12">Desember</option>
				    </select>
				</div>
			</div>

			<div class="form-group row">
				<label for="tahun" class="col-sm-3 col-form-label">Tahun</label>
				<div class="col-sm-9">
					<select class="form-control" name="tahun" id="tahun">
					    <option value=""> Pilih Tahun </option>
					    <?php $tahun = date('Y');
					    for($i=2022;$i<$tahun+5;$i++) { ?>
					    <option value="<?php echo $i ?>"><?php echo $i ?></option>
					<?php }?>
					</select>
				</div>
			</div>
				<button style="width: 100%" type="submit" class="btn btn-primary" ><i class="fas fa-print"></i>  Cetak Laporan Absensi</button>
		</div>
	</form>
</div>
<div class="container-fluid mt-4">
    <center >
        <?php if(session()->getFlashdata('pesan')) : ?>
        <span class="badge badge-danger ml-4"><i class="fas fa-info-circle"></i> 
            <?= session()->getFlashdata('pesan'); ?>
        </span>
    <?php endif; ?>
    </center>
</div>
<!-- /.container-fluid -->