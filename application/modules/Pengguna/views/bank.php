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
          <form action="<?php echo site_url('Akun/Bank');?>" method="post">
            <div class="p-card-body">
              <div class="row">
                <div class="col-sm-12">
                  <div class="my-account-section__header-title">Rekening Bank Saya
                    <button type="button" class="btn btn-primary btn-sm float-right" onclick="window.history.go(-1); return false;"><i class="fa fa-step-backward fa-sm mr-1"></i> Kembali</button>
                  </div>
                  <div class="my-account-section__header-subtitle">Data rekening bank anda, digunakan untuk proses pemesanan produk.</div>
                </div>
              </div>
              <hr>
              <div class="row mb-3">
                <div class="col-sm-3">
                  <span class="mb-0 text-right text-secondary d-block">Atas Nama</span>
                </div>
                <div class="col-sm-9 text-dark">
                  <input type="text" class="form-control" name="ATAS_NAMA" value="<?= $bank->ATAS_NAMA?>">
                  <small class="text-danger">Harus sama dengan rekening bank</small>
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-sm-3">
                  <span class="mb-0 text-right text-secondary d-block">No. Rekening</span>
                </div>
                <div class="col-sm-9 text-dark">
                  <input type="text" class="form-control" name="NO_REK" value="<?= $bank->NO_REKENING?>">
                  <small class="text-danger">Harus sama dengan rekening bank</small>
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-sm-3">
                  <span class="mb-0 text-right text-secondary d-block">BANK</span>
                </div>
                <div class="col-sm-9 text-dark">
                  <select class="select2-basic hide" name="BANK" style="width:50%">
                    <optgroup label="Current Bank">
                      <option value="<?= $bank->BANK;?>"><?= $bank->BANK;?></option>
                    </optgroup>
                    <optgroup label="Change Bank">
                      <option value="BCA">BCA</option>
                      <option value="BRI">BRI</option>
                      <option value="BNI">BNI</option>
                      <option value="MANDIRI">MANDIRI</option>
                    </optgroup>
                  </select>
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
