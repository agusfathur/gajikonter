<!-- Begin Page Content -->
<div class="container-fluid">

	<table class="table table-striped table-bordered text-center" style="color:black ;">
		<tr>
			<th>Bulan-Tahun</th>
			<th>Gaji Harian</th>
			<th>Fee</th>
			<th>Bonus</th>
			<th>Total Gaji</th>
		</tr>
		<?php foreach ($dataGaji as $dg) : ?>
		<tr>
			<td><?= $dg['bulan']; ?></td>
			<td>Rp. <?= number_format($dg['gaji_harian'],0,',','.'); ?></td>
			<td>Rp. <?= number_format($dg['fee'],0,',','.'); ?></td>
			<td>Rp. <?= number_format($dg['bonus'],0,',','.'); ?></td>
			<td>Rp. <?= number_format($dg['total'],0,',','.')?></td>
		</tr>
		<?php endforeach; ?>
	</table>
</div>
<!-- /.container-fluid -->