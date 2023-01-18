
<div class="container-fluid"> 
  <a class="btn btn-sm btn-primary mb-3" href="<?= base_url('admin/data-divisi/tambah-divisi'); ?>">
  <i class="fa fa-plus"></i> Tambah Divisi</a>
  <br>
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
              <th class="text-center">Nama Divisi</th>
              <th class="text-center">Gaji Pokok Harian</th>
              <th class="text-center">FEE</th>
              <th class="text-center">Bonus</th>
              <th class="text-center">Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php $no=1; foreach($dataDivisi as $ds) : ?>
            <tr style="color:black ;">
              <td class="text-center"><?= $no++ ?></td>
              <td class="text-center"><?= ucwords($ds['nama_divisi']);?></td>
              <td class="text-center">Rp. <?= number_format($ds['gaji_harian']); ?></td>
              <td class="text-center">Rp. <?= number_format($ds['fee']); ?></td>
              <td class="text-center">Rp. <?= number_format($ds['bonus']); ?></td>
              <td>
                <center>
                  <a class="btn btn-sm btn-info" href="<?= base_url('admin/data-divisi/edit-divisi/'.$ds['id_divisi']); ?>"><i class="fa fa-edit"></i></a>
                  <a onclick="return confirm('Yakin Hapus?')" class="btn btn-sm btn-danger" 
                  href="<?= base_url('admin/data-divisi/delete/'.$ds['id_divisi']); ?>">
                  <i class="fa fa-trash"></i></a>
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