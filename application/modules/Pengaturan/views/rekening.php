<div class="d-flex justify-content-between align-items-sm-center flex-column flex-sm-row mb-2">
  <div class="mr-4 mb-3 mb-sm-0">
    <h1 class="mb-0">Pengaturan Data BANK anda</h1>
  </div>
</div>
<hr>

<div class="alert alert-info shadow-sm">
  <p class="mb-0">Pengaturan informasi mengenai bank anda, digunakan untuk detail transfer saat pengguna menyewa produk. </p>
</div>

<div class="row">
  <div class="col-md-6 col-xs-12">
    <div class="card shadow-sm">
      <div class="card-header">Data detail BANK</div>
      <div class="card-body">
        <form class="form-horizontal" action="<?php echo site_url('Pengaturan/ubah_bank');?>" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label>Nomor Rekening</label>
            <input type="hidden" name="id[]" value="<?= $controller->M_pengaturan->get_idbank("rekening_no");?>">
            <input type="text" name="value[]" class="form-control" value="<?= $controller->M_pengaturan->get_bank("rekening_no");?>">
          </div>
          <div class="form-group">
            <label>Nama BANK</label>
            <div class="input-group input-group-joined">
              <input type="hidden" name="id[]" value="<?= $controller->M_pengaturan->get_idbank("rekening_bank");?>">
              <input type="text" name="value[]" class="form-control" value="<?= $controller->M_pengaturan->get_bank("rekening_bank");?>">
            </div>
            <div class="form-group">
              <label>Atas Nama</label>
              <div class="input-group input-group-joined">
                <input type="hidden" name="id[]" value="<?= $controller->M_pengaturan->get_idbank("rekening_an");?>">
                <input type="text" name="value[]" class="form-control" value="<?= $controller->M_pengaturan->get_bank("rekening_an");?>">
              </div>
              <hr>
              <button type="submit" class="btn btn-outline-primary btn-sm float-right">Ubah data BANK</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
