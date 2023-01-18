
<div class="container-fluid">
    <?php if(session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success"role="alert" style="width:40% ;">
        <?= session()->getFlashdata('pesan'); ?>
        </div>
    <?php endif; ?>
</div>

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

                <button type="submit" class="btn btn-primary mb-2 ml-4 shadow"><i class="fa-solid fa-eye"></i> Tampilkan Data</button>
                <a class="btn btn-success mb-2 ml-4 shadow" href="<?= base_url('admin/rekap-absen/tambah-rekap-absen'); ?>">
                <i class="fa-solid fa-plus"></i> Tambah Form Rekap Absen</a>
                <a class="btn btn-info mb-2 ml-4 shadow" href="<?= base_url('admin/rekap-absen/edit-rekap-absen'); ?>">
                <i class="fa-solid fa-pencil"></i> &nbsp; Rekap Absen Harian</a>
            </form>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead class="thead-dark">
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
                    <th class="text-center">Action</th>
                </tr>
                </thead>
                <tbody>
                <?php $no=1; foreach($rekapAbsen as $ra) : ?>
                    <tr style="color:black ;">
                    <td class="text-center"><?= $no++ ?></td>
                    <td class="text-center"><?= $ra['bulan'];?></td>
                    <td class="text-center"><?= $ra['nik'];?></td>
                    <td class="text-center"><?= ucwords($ra['nama_karyawan']);?></td>
                    <td class="text-center"><?= ucwords($ra['jenis_kelamin']);?></td>
                    <td class="text-center"><?= ucwords($ra['divisi']);?></td>
                    <td class="text-center"><?= $ra['hadir'];?></td>
                    <td class="text-center"><?= $ra['sakit'];?></td>
                    <td class="text-center"><?= $ra['alpha'];?></td>
                    <td class="text-center">
                        <a onclick="return confirm('Yakin Hapus?')" class="btn btn-sm btn-danger" href="<?= base_url('admin/rekap-absen/delete/'.$ra['id_absen']); ?>">
                        <i class="fa-solid fa-trash"></i></a>
                    </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
            </div>
        </div>
    </div>
</div>