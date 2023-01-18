<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <!-- Custom fonts for this template-->
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" >
  <script src="https://kit.fontawesome.com/c2dedc156b.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

</head>

<br>
<body >
    <center>
        <h1>Konter Niam Cell</h1>
        <h2>Slip Gaji Karyawan</h2>
        <hr style="width: 50%; border-width: 5px; color: black">
    </center>
    <table style="width: 100%">
		<tr>
			<td width="20%">Nama Karyawan</td>
			<td width="2%">:</td>
			<td><?= $dataKaryawan['nama_karyawan'];?></td>
		</tr>
		<tr>
			<td>NIK</td>
			<td>:</td>
			<td><?= $dataKaryawan['nik'] ?></td>
		</tr>
		<tr>
			<td>Divisi</td>
			<td>:</td>
			<td><?= $dataKaryawan['divisi'] ?></td>
		</tr>
		<tr>
			<td>Bulan</td>
			<td>:</td>
			<td><?= $bulan; ?></td>
		</tr>
		<tr>
			<td>Tahun</td>
			<td>:</td>
			<td><?= $tahun ?></td>
		</tr>
	</table>
    <br>
    
	<table class="table table-bordered mt-3">
		<tr>
			<th class="text-center" width="5%">No</th>
			<th class="text-center" >Keterangan</th>
			<th class="text-center" >Jumlah</th>
		</tr>
		<tr>
			<td>1</td>
			<td>Gaji Harian</td>
			<td>Rp. <?= number_format($dataGaji['gaji_harian'],0,',','.') ?></td>
		</tr>

		<tr>
			<td>2</td>
			<td>FEE</td>
			<td>Rp. <?= number_format($dataGaji['fee'],0,',','.') ?></td>
		</tr>

		<tr>
			<td>3</td>
			<td>Bonus</td>
			<td>Rp. <?= number_format($dataGaji['bonus'],0,',','.') ?></td>
		</tr>

		<tr>
			<td>4</td>
			<td>Potongan</td>
			<td>Rp. <?= number_format($dataGaji['potongan'],0,',','.') ?></td>
		</tr>

		<tr>
			<td>4</td>
			<td>Pinjaman</td>
			<td>Rp. <?= number_format($dataGaji['pinjaman'],0,',','.') ?></td>
		</tr>

		<tr>
			<th colspan="2" style="text-align: right;">Total Gaji : </th>
			<th>Rp. <?= number_format($dataGaji['total'],0,',','.')?></th>
		</tr>
	</table>


<script>

window.print();

</script>
<!-- Footer -->
<!-- Optional JavaScript -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
 
 </body>
</html>