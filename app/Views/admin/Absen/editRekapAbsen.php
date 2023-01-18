
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
                <a class="btn btn-primary mb-2 ml-auto shadow" href="<?= base_url('admin/rekap-absen'); ?>">
                Kembali</a>
            </form>
        </div>
    </div>
</div>

<div class="container-fluid">
    <form method="POST" action="<?= base_url('admin/rekap-absen/update'); ?>">
    <?= csrf_field(); ?>
        <div class="d-flex justify-content-between">
            <button class="btn btn-success mb-3 shadow ml-2" type="submit" name="submit" value="submit">Simpan</button>
            <div class="alert alert-info px-2 py-1">
                Menampilkan Data Kehadiran Pegawai Bulan: <span class="font-weight-bold"><?= $bulan; ?> </span> Tahun : <span class="font-weight-bold"><?= $tahun; ?></span>
            </div>
        </div>
        <table class="table table-bordered table-striped" style="color: black;">
            <tr>
                <td class="text-center">No</td>
                <td class="text-center">NIK</td>
                <td class="text-center">Nama Karyawan</td>
                <td class="text-center">Jenis Kelamin</td>
                <td class="text-center">Divisi</td>
                <td class="text-center" width="8%">Hadir</td>
                <td class="text-center" width="8%">Sakit</td>
                <td class="text-center" width="8%">Alpha</td>
            </tr>
            <?php $no=1; foreach($rekapAbsen as $ra) :?>
                <tr >
                    <input type="hidden" name="bulan[]" class="form-control" value="<?= $bulanTahun ?>">
                    <input type="hidden" name="id_absen[]" class="form-control" value="<?= $ra['id_absen'];?>">
                    <input type="hidden" name="id_karyawan[]" class="form-control" value="<?= $ra['id_karyawan'];?>">
                    <input type="hidden" name="nik[]" class="form-control" value="<?= $ra['nik'];?>">
                    <input type="hidden" name="nama_karyawan[]" class="form-control" value="<?= $ra['nama_karyawan'];?>">
                    <input type="hidden" name="jenis_kelamin[]" class="form-control" value="<?= $ra['jenis_kelamin']; ?>">
                    <input type="hidden" name="divisi[]" class="form-control" value="<?= $ra['divisi']; ?>">
                    
                    <td><?= $no++?></td>
                    <td><?= $ra['nik']; ?></td>
                    <td><?= ucwords($ra['nama_karyawan']); ?></td>
                    <td><?= ucwords($ra['jenis_kelamin']); ?></td>
                    <td><?= ucwords($ra['divisi']); ?></td>
                    <td><input type="number" name="hadir[]" class="form-control" value="<?= $ra['hadir']; ?>"></td>
                    <td><input type="number" name="sakit[]" class="form-control" value="<?= $ra['sakit']; ?>"></td>
                    <td><input type="number" name="alpha[]" class="form-control" value="<?= $ra['alpha']; ?>"></td>
            <?php endforeach; ?>
        </table>
    </form>
</div>