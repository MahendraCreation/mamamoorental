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

    <div id="ktp" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header bb-none">
            <h6>SCAN/Foto KTP anda</h6>
            <button type="button" class="close cls-pop" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body pt-0">
            <img src="<?php echo base_url();?>file/site/pengguna/<?= $pengguna->KODE_PERSONAL?>/<?= $pengguna->KTP;?>" class="gambar-scan" alt="SCAN/FOTO KTP">
          </div>
        </div>
      </div>
    </div>

    <div id="kk" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header bb-none">
            <h6>SCAN/Foto KK anda</h6>
            <button type="button" class="close cls-pop" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body pt-0">
            <img src="<?php echo base_url();?>file/site/pengguna/<?= $pengguna->KODE_PERSONAL?>/<?= $pengguna->KK;?>" class="gambar-scan" alt="SCAN/FOTO KTP">
          </div>
        </div>
      </div>
    </div>
    
      <div class="p-card mb-3">
        <form action="<?php echo site_url('Akun');?>" method="post">
          <div class="p-card-body">
            <div class="row">
              <div class="col-sm-12">
                <div class="my-account-section__header-title">Profil Saya</div>
                <div class="my-account-section__header-subtitle">Kelola informasi profil Anda untuk mengontrol, melindungi dan mengamankan akun</div>
              </div>
            </div>
            <hr>
            <?php if ($verifikasi == FALSE) { ?>
              <div class="row mb-3">
                <div class="col-sm-12">
                  <div class="alert alert-warning">
                  <span class="mb-0 text-secondary d-block">Akun anda dalam proses verifikasi berkas yang telah anda berikan. Sampai akun anda selesai diverifikasi, anda tidak dapat memesan dan mengisi saldo deposit anda.<br> Jika akun anda masih belum diverifikasi lebih dari 1x24 jam setelah melakukan pendaftaran/verifikasi ulang, harap hubungi admin MAMAMOORENTAL.</span>
                  </div>
                </div>
              </div>
            <?php }?>
            <div class="row mb-3">
              <div class="col-sm-3">
                <span class="mb-0 text-right text-secondary d-block">Kode Personal</span>
              </div>
              <div class="col-sm-9 text-dark">
                <span class="text-theme"><?= $pengguna->KODE;?></span>

                <?php if ($verifikasi == TRUE) { echo '<span class="badge badge-primary"><i class="fa fa-check-circle"></i> Active</span>'; }else{ echo '<span class="badge badge-secondary">Non-active</span>'; }?>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-sm-3">
                <span class="mb-0 text-right text-secondary d-block">Nama Lengkap</span>
              </div>
              <div class="col-sm-9 text-dark">
                <input type="text" class="form-control" name="nama" value="<?= $pengguna->NAMA?>">
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-sm-3">
                <span class="mb-0 text-right text-secondary d-block">KTP</span>
              </div>
              <div class="col-sm-9 text-dark">
                <div class="my-account__inline-container">
                  <a class="my-account__no-background-button my-account-profile__change-button" data-toggle="modal" data-target="#ktp">Lihat</a>
                  <a href="<?php echo site_url('Akun/KTP');?>" class="my-account__no-background-button my-account-profile__change-button ml-2">ubah</a>
                </div>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-sm-3">
                <span class="mb-0 text-right text-secondary d-block">KK</span>
              </div>
              <div class="col-sm-9 text-dark">
                <div class="my-account__inline-container">
                  <a class="my-account__no-background-button my-account-profile__change-button" data-toggle="modal" data-target="#kk">Lihat</a>
                  <a href="<?php echo site_url('Akun/KK');?>" class="my-account__no-background-button my-account-profile__change-button ml-2">ubah</a>
                </div>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-sm-3">
                <span class="mb-0 text-right text-secondary d-block">Email</span>
              </div>
              <div class="col-sm-9 text-dark">
                <div class="my-account__inline-container">
                  <div class="my-account__input-text"> <?php $mail = explode("@", $email); echo substr($mail[0], 0, 3)."***@".$mail[1]; ?></div>
                  <!-- <a href="<?php echo site_url('Akun/Email');?>" class="my-account__no-background-button my-account-profile__change-button ml-2">ubah</a> -->
                </div>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-sm-3">
                <span class="mb-0 text-right text-secondary d-block">No Hp</span>
              </div>
              <div class="col-sm-9 text-dark">
                <div class="my-account__inline-container">
                  <div class="my-account__input-text">
                    <?php
                    if ($pengguna->HP != null) {
                      $length = strlen($pengguna->HP);
                      $length = $length-3;

                      for ($i=0; $i < $length ; $i++) {
                        echo "*";
                      }

                      echo substr($pengguna->HP, -3); ?>
                    <?php }else{
                      echo "<small class='text-danger'>Harap lengkapi data diri anda</small>"; ?>
                    <?php } ?>
                    <a href="<?php echo site_url('Akun/Phone');?>" class="my-account__no-background-button my-account-profile__change-button ml-2">ubah</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-sm-3">
                <span class="mb-0 text-right text-secondary d-block">Instagram</span>
              </div>
              <div class="col-sm-9 text-dark">
                <input type="text" class="form-control" name="instagram" value="<?= $pengguna->INSTAGRAM?>">
                <small class="text-secondary">Contoh: @mamamoo_rental</small>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-sm-3">
                <span class="mb-0 text-right text-secondary d-block">Nama akun Facebook</span>
              </div>
              <div class="col-sm-9 text-dark">
                <input type="text" class="form-control" name="facebook" value="<?= $pengguna->FACEBOOK?>">
                <small class="text-secondary">Contoh: mamamoo rental</small>
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
