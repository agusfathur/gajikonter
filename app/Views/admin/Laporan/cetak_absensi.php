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
        <h2>Laporan Kehadiran Karyawan</h2>
    </center>
    <table >
		<tr>
			<td>Bulan</td>
			<td>:</td>
            <td>&nbsp;</td>
			<td><?= $bulan?></td>
		</tr>
		<tr>
			<td>Tahun</td>
			<td>:</td>
            <td>&nbsp;</td>
			<td><?= $tahun?></td>
		</tr>
	</table>
    <br>
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead >
        <tr>
            <th class="text-center">No</th>
            <th class="text-center">Bulan</th>
            <th class="text-center">NIK</th>
            <th class="text-center">Nama Karyawan</th>
            <th class="text-center">Jenis Kelamin</th>
            <th class="text-center">Divisi</th>
            <th class="text-center">Hadir</th>
            <th class="text-center">Sakit</th>
            <th class="text-center">Alpha</th>
        </tr>
        </thead>
        <tbody>
        <?php $no=1; foreach($rekapAbsen as $ra) : ?>
            <tr style="color: black;">
            <td><?= $no++ ?></td>
            <td><?= $ra['bulan'];?></td>
            <td><?= $ra['nik'];?></td>
            <td><?= ucwords($ra['nama_karyawan']);?></td>
            <td><?= ucwords($ra['jenis_kelamin']);?></td>
            <td><?= ucwords($ra['divisi']);?></td>
            <td class="text-center"><?= $ra['hadir'];?></td>
            <td class="text-center"><?= $ra['sakit'];?></td>
            <td class="text-center"><?= $ra['alpha'];?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
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