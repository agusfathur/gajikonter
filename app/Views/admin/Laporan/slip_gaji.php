<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="card mx-auto shadow" style="width: 35%">
        <div class="card-header bg-primary text-white text-center">
            FIlter Slip Gaji Karyawan
        </div>

        <form method="POST" action="<?= base_url('admin/slip-gaji/cetak')?>">
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
                <label for="pilihTahun" class="col-sm-3 col-form-label">Tahun</label>
                <div class="col-sm-9">
                    <select class="form-control" name="tahun">
                        <option value=""> Pilih Tahun </option>
                        <?php $tahun = date('Y');
                        for ($i = 2022; $i < $tahun + 5; $i++) { ?>
                                <option value="<?= $i ?>"><?= $i ?></option>
                            <?php } ?>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="pilihNama" class="col-sm-3 col-form-label">Nama Karyawan</label>
                <div class="col-sm-9">
                    <select class="form-control" name="nama_karyawan">
                        <option value=""> Pilih Karyawan</option>
                        <?php foreach($namaKaryawan as $nk): ?>
                            <option value="<?= $nk['id_karyawan']; ?>"><?= $nk['nama_karyawan']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <center>
                <button style="width: 50%" type="submit" class="btn btn-primary"><i class="fa-solid fa-fw fa-print"></i></i>
                Cetak Slip Gaji</button>
            </center>
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