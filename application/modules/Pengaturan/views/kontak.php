<div class="d-flex justify-content-between align-items-sm-center flex-column flex-sm-row mb-2">
  <div class="mr-4 mb-3 mb-sm-0">
    <h1 class="mb-0">Pengaturan Kontak Website</h1>
  </div>
</div>
<hr>

<div class="alert alert-info shadow-sm">
  <p class="mb-0">Anda dapat mengubah kontak WA dan URL Instagram profil anda disini.</p>
</div>

<div class="row">
  <div class="col-md-6 col-xs-12">
    <div class="card shadow-sm">
      <div class="card-header">Atur nomor kontak whatsapp anda.</div>
      <div class="card-body">
        <form class="form-horizontal" action="<?php echo site_url('Pengaturan/ubah_wa');?>" method="post">
          <div class="form-group">
            <label>Kontak Whatsapp</label>
            <div class="input-group input-group-joined">
              <div class="input-group-prepend">
                <span class="input-group-text">
                  wa.me/
                </span>
              </div>
              <input type="number" name="value" class="form-control" value="<?= $wa;?>">
            </div>
          </div>
          <hr>
          <button type="submit" class="btn btn-outline-primary btn-sm float-right">Ubah Nomor</button>
        </form>
      </div>
    </div>
  </div>
    <div class="col-md-6 col-xs-12">
      <div class="card shadow-sm">
        <div class="card-header">Atur URL profil Instagram anda.</div>
        <div class="card-body">
          <form class="form-horizontal" action="<?php echo site_url('Pengaturan/ubah_ig');?>" method="post">
            <div class="form-group">
              <label>URL profil</label>
              <div class="input-group input-group-joined">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    instagram.com/
                  </span>
                </div>
                <input type="text" name="value" class="form-control" value="<?= $ig;?>">
              </div>
            </div>
            <hr>
            <button type="submit" class="btn btn-outline-primary btn-sm float-right">Ubah URL</button>
          </form>
        </div>
      </div>
    </div>
</div>
