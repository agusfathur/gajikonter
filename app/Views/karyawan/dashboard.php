
<div class="container-fluid">

    <div class="alert alert-success font-weight-bold mb-4" style="width: 65%">Selamat datang, Anda login sebagai Karyawan</div>

    <div class="card shadow" style="margin-bottom: 120px; width: 65%;">
        <div class="card-header font-weight-bold bg-primary text-white">
            <span>Data Karyawan</span>
        </div>
    <div class="card-body">
        <div class="row">
            <div class="mt-4 px-3">
                <img style="width: 250px" src="<?= base_url('img/'.$karyawan['foto']); ?>" class="rounded">
            </div>
            <div>
            <table class="table" style="color: black;">
                    <tr>
                        <td>NIK</td>
                        <td>:</td>
                        <td><?= $karyawan['nik']; ?></td>
                    </tr>
                    <tr>
                        <td>Nama Karyawan</td>
                        <td>:</td>
                        <td><?= ucwords($karyawan['nama_karyawan']); ?></td>
                    </tr>
                    <tr>
                        <td>Jenis Kelamin</td>
                        <td>:</td>
                        <td><?= ucwords($karyawan['jenis_kelamin']); ?></td>
                    </tr>

                    <tr>
                        <td>Divisi</td>
                        <td>:</td>
                        <td><?= ucwords($karyawan['divisi']); ?></td>
                    </tr>
                    <tr>
                        <td>No Hp</td>
                        <td>:</td>
                        <td><?= $karyawan['no_hp']; ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

</div>