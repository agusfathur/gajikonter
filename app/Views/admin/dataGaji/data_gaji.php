
<div class="container-fluid">
    <div class="card mb-2 shadow">
        <div class="card-header bg-primary text-white">
        Filter Data <?= $title; ?>
    </div>
    <div class="card-body shadow">
        <form class="form-inline">
            <div class="form-group mb-2">
                <label for="opsiBulan">Bulan</label>
                <select class="form-control ml-3" name="bulan" id="opsiBulan">
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

            <div class="form-group mb-2 ml-4">
                <label for="opsiTahun">Tahun</label>
                <select class="form-control ml-3" name="tahun" id="opsiTahun">
                    <option value=""> Pilih Tahun </option>
                    <?php $tahun = date('Y');
                    for($i=2022;$i < $tahun+5;$i++) { ?>
                    <option value="<?= $i ?>"><?= $i ?></option>
                <?php }?>
                </select>
            </div>
    
            <div class="form-group mb-2 ml-4">
                <label for="opsiNama">Nama</label>
                <select class="form-control ml-3" name="nama" id="opsiNama">
                <option value=""> Pilih Nama Karyawan</option>
                    <?php foreach($dataKaryawan as $dk) :?>
                        <option value="<?= $dk['nik']; ?>"><?= ucwords($dk['nama_karyawan']); ?> ( <?= ucwords($dk['divisi']); ?>)</option>
                    <?php endforeach; ?>
                </select>
            </div>

            <?php
                // apakah ada bulan dan bulan tidak kosong
                if((isset($_GET['bulan']) && $_GET['bulan'] !='') && (isset($_GET['tahun']) && $_GET['tahun'] !='')){
                    $bulan = $_GET['bulan'];
                    $tahun = $_GET['tahun'];
                    $bulanTahun = $bulan . '-' . $tahun;
                } else{
                    $bulan = date('m');
                    $tahun = date('Y');
                    $bulanTahun = $bulan . '-' . $tahun;
                }
            ?>

            <button type="submit" class="btn btn-primary mb-2 ml-4 shadow"><i class="fa-solid fa-eye"></i> Tampilkan Data</button>
            
        </form>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="alert alert-info px-2 py-1 mb-2" style="width: 40%;">
        Menampilkan <?= $title; ?> Bulan: <span class="font-weight-bold"><?= $bulan; ?> </span> Tahun : <span class="font-weight-bold"><?= $tahun; ?></span>
    </div>
</div>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div  class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="thead-dark">
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Bulan-Tahun</th>
                            <th class="text-center">Nama</th>
                            <th class="text-center">Divisi</th>
                            <th class="text-center">Fee</th>
                            <th class="text-center">Bonus</th>
                            <th class="text-center">Gaji Harian</th>
                            <th class="text-center">Potongan</th>
                            <th class="text-center">Pinjaman</th>
                            <th class="text-center">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; foreach($dataGaji as $dg) : ?>
                            <tr style="color:black;">
                            <td class=""><?= $no++ ?></td>
                            <td class=""><?= $dg['bulan'];?></td>
                            <td class=""><?= ucwords($dg['nama_karyawan']);?></td>
                            <td class=""><?= ucfirst($dg['divisi']); ?></td>
                            <td class="">Rp. <?= number_format($dg['fee'],0,',','.'); ?></td>
                            <td class="">Rp. <?= number_format($dg['bonus'],0,',','.'); ?></td>
                            <td class="">Rp. <?= number_format($dg['gaji_harian'],0,',','.'); ?></td>
                            <td class="">- Rp. <?= number_format($dg['potongan'],0,',','.'); ?></td>
                            <td class="">- Rp. <?= number_format($dg['pinjaman'],0,',','.'); ?></td>
                            <td class="">Rp. <?= number_format($dg['total'],0,',','.'); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <?= $pager->links('data_gaji', 'gaji_pagination'); ?>
            </div>
        </div>
    </div>
</div>


