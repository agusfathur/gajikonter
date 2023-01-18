<div class="container-fluid">
  <a class="btn btn-sm btn-primary mb-3" href="<?= base_url('admin/data-karyawan/tambah-karyawan'); ?>">
  <i class="fa-solid fa-user-plus"></i> Tambah Karyawan</a>

  <?php if(session()->getFlashdata('pesan')) : ?>
    <div class="alert alert-success"role="alert" style="width:40% ;">
      <?= session()->getFlashdata('pesan'); ?>
    </div>
  <?php endif; ?>
</div>


<div class="container-fluid">
  <div class="card shadow mb-4">
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead class="thead-dark">
          <tr>
              <th class="text-center">No</th>
              <th class="text-center">NIK</th>
              <th class="text-center">Nama Karyawan</th>
              <th class="text-center">Alamat</th>
              <th class="text-center">Jenis Kelamin</th>
              <th class="text-center">Divisi</th>
              <th class="text-center">No HP</th>
              <th class="text-center">Hak Akses</th>
              <th class="text-center">Foto</th>
              <th class="text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
          <?php $no=1; foreach($dataKaryawan as $dk) : ?>
            <tr style="color:black ;">
              <td class="text-center"><?= $no++ ?></td>
              <td class="text-center"><?= $dk['nik']; ?></td>
              <td class="text-center"><?= ucwords($dk['nama_karyawan']);  ?></td>
              <td class="text-center"><?= ucwords($dk['alamat']);  ?></td>
              <td class="text-center"><?= ucwords($dk['jenis_kelamin']);  ?></td>
              <td class="text-center"><?= ucwords($dk['divisi']);  ?></td>
              <td class="text-center"><?= $dk['no_hp'];  ?></td>
              <?php if($dk['hak_akses'] =='1') { ?>
                <td class="text-center">Admin</td>
                <?php } else { ?>
                  <td class="text-center">Karyawan</td>
                <?php } ?>
              <td class="text-center"><img src="/img/<?= $dk['foto']; ?>" width="50px"></td>
              
              <td>
                <center>
                  <a class="btn btn-sm btn-info" href="<?= base_url('admin/data-karyawan/edit-karyawan/'.$dk['id_karyawan']); ?>">
                    <i class="fa-solid fa-pen-to-square"></i>
                  </a>
                  <a onclick="return confirm('Yakin Hapus?')" class="btn btn-sm btn-danger" 
                  href="<?= base_url('admin/data-karyawan/delete/'.$dk['id_karyawan']); ?>">
                    <i class="fa-solid fa-trash"></i>
                  </a>
                </center>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
  </div>
</div>