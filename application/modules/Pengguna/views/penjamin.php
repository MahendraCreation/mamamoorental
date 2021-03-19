<div class="container">
  <div class="main-body">

    <!-- USER MENU -->
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb" class="main-breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url();?>">MAMAMOORENTAL</a></li>
        <li class="breadcrumb-item"><a href="<?= site_url('Akun');?>">Akun</a></li>
        <li class="breadcrumb-item active" aria-current="page"><?= $pengguna->NAMA;?></li>
      </ol>
    </nav>
    <!-- /Breadcrumb -->

    <div class="row gutters-sm">
      <div class="col-md-3 mb-3">

        <?php $this->load->view('user_menu'); ?>

      </div>

      <div class="col-md-9">
        <div class="p-card mb-3">
          <form action="<?php echo site_url('Akun/Penjamin');?>" method="post">
            <div class="p-card-body">
              <div class="row">
                <div class="col-sm-12">
                  <div class="my-account-section__header-title">Data Penjamin</div>
                  <div class="my-account-section__header-subtitle">Isikan data berikut ini dengan sebenar-benarnya.</div>
                </div>
              </div>
              <hr>
              <div class="row mb-3">
                <div class="col-sm-3">
                  <span class="mb-0 text-right text-secondary d-block">Nama Penjamin</span>
                </div>
                <div class="col-sm-9 text-dark">
                  <input type="text" class="form-control" name="NAMA_PENJAMIN" value="<?= $penjamin->NAMA_PENJAMIN;?>" required>
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-sm-3">
                  <span class="mb-0 text-right text-secondary d-block">No Telepon Penjamin</span>
                </div>
                <div class="col-sm-9 text-dark">
                  <input type="text" class="form-control" name="HP_PENJAMIN" value="<?= $penjamin->HP_PENJAMIN;?>" required>
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-sm-3">
                  <span class="mb-0 text-right text-secondary d-block">Nama Kantor Penjamin</span>
                </div>
                <div class="col-sm-9 text-dark">
                  <input type="text" class="form-control" name="NAMA_KANTOR" value="<?= $penjamin->NAMA_KANTOR;?>" required>
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-sm-3">
                  <span class="mb-0 text-right text-secondary d-block">Alamat Kantor Penjamin</span>
                </div>
                <div class="col-sm-9 text-dark">
                  <textarea type="text" class="form-control" name="ALAMAT_KANTOR" rows="3" required><?= $penjamin->ALAMAT_KANTOR;?></textarea>
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-sm-9 offset-md-3 text-dark">
                  <button type="submit" name="submit" class="btn btn-theme wd-login-btn">Simpan</button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
