<!-- Custom page header alternative example-->
<div class="d-flex justify-content-between align-items-sm-center flex-column flex-sm-row mb-2">
  <div class="mr-4 mb-3 mb-sm-0">
    <h1 class="mb-0">Detail Pengguna</h1>
    <div class="small">
      <span class="font-weight-500 text-primary"><?php echo date("l");?></span>
      &#xB7; <?php echo date("j F Y");?> &#xB7; <?php echo date("H:i");?>
    </div>
  </div>
  <a href="<?php echo site_url('DataPengguna');?>" class="btn btn-primary btn-sm float-right"><i class="fa fa-step-backward fa-sm mr-1"></i> Kembali</a>
</div>
<div class="row">
  <div class="col-xl-4">
    <!-- Profile picture card-->
    <div class="card">
      <div class="card-header">Berkas Pengguna</div>
      <div class="card-body text-center">
        <!-- Profile picture image-->
        <div class="small font-italic text-muted mb-1">Foto Profil</div>
        <div class="b-pic">
          <img class="img-account-profile mb-1" src="<?php echo base_url();?>file/site/pengguna/<?= $pengguna->KODE_PERSONAL?>/<?= $pengguna->FOTO;?>" alt />
        </div>
        <!-- Profile picture help block-->
        <button type="button" class="btn btn-primary btn-sm btn-block mb-2" data-toggle="modal" data-target="#pp">Lihat File</button>
        <hr>
        <!-- Profile picture image-->
        <div class="small font-italic text-muted mb-2">Scan KTP</div>
        <div class="b-pic" style="height: auto !important;">
          <img class="img-account-profile mb-1" style="top: 0 !important;" src="<?php echo base_url();?>file/site/pengguna/<?= $pengguna->KODE_PERSONAL?>/<?= $pengguna->KTP;?>" alt />
          <button type="button" class="btn btn-primary btn-sm btn-block mb-2 mt-1" data-toggle="modal" data-target="#ktp">Lihat File</button>
        </div>
        <hr>
        <!-- Profile picture help block-->
        <div class="small font-italic text-muted mb-2">Scan KK</div>
        <!-- Profile picture image-->
        <div class="b-pic" style="height: auto !important;">
          <img class="img-account-profile mb-1" style="top: 0 !important;" src="<?php echo base_url();?>file/site/pengguna/<?= $pengguna->KODE_PERSONAL?>/<?= $pengguna->KK;?>" alt />
          <button type="button" class="btn btn-primary btn-sm btn-block mb-2 mt-1" data-toggle="modal" data-target="#kk">Lihat File</button>
        </div>
        <!-- Profile picture help block-->
      </div>
    </div>
  </div>


  <!-- MODAL karya -->
  <div id="verifikasi" class="modal fade" role="dialog" tabindex="-1" >
    <div class="modal-dialog" role="document">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <h5 class="modal-title text-white">Verifikasi - <b><?php echo $pengguna->NAMA;?></b></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <!-- Modal body -->
        <div class="modal-body">
          Yakin verifikasi akun -  <?php echo $pengguna->NAMA ?>?
          <p>Pastikan seluruh <b>BERKAS PENGGUNA</b> (<i>Data Pengguna</i>, <i>KTP</i>, <i>KK</i>, <i>Data Penjamin</i>, dan <i>Data Rekening</i>) telah <u>LENGKAP</u>.</p>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-light btn-sm" data-dismiss="modal">Batal</button>
          <a href="<?php echo site_url('Pengguna/Verifikasi/'.$pengguna->KODE_PERSONAL);?>" class="btn btn-primary btn-sm">VERIFIKASI PENGGUNA</a>
        </div>

      </div>
    </div>
  </div>

  <!-- MODAL karya -->
  <div id="revoke" class="modal fade" role="dialog" tabindex="-1" >
    <div class="modal-dialog" role="document">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header bg-danger">
          <h5 class="modal-title text-white">Revoke - <b><?php echo $pengguna->NAMA;?></b></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <!-- Modal body -->
        <div class="modal-body">
          Yakin revoke status akun -  <?php echo $pengguna->NAMA ?>?
          <p>Dengan me-revoke akun ini, pengguna tidak akan bisa melakukan transaksi (<i>Persewaan barang</i> dan <i>Deposit</i>).</p>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-light btn-sm" data-dismiss="modal">Batal</button>
          <a href="<?php echo site_url('Pengguna/Revoke/'.$pengguna->KODE_PERSONAL);?>" class="btn btn-danger btn-sm">REVOKE PENGGUNA</a>
        </div>

      </div>
    </div>
  </div>
  <!-- MODAL karya -->
  <div id="pp" class="modal fade" role="dialog" tabindex="-1" >
    <div class="modal-dialog" role="document">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <h5 class="modal-title text-white">Foto Profil - <b><?php echo $pengguna->NAMA;?></b></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <!-- Modal body -->
        <div class="modal-body">
          <img src="<?php echo base_url();?>file/site/pengguna/<?= $pengguna->KODE_PERSONAL?>/<?= $pengguna->FOTO;?>" alt="<?php echo base_url();?>file/site/pengguna/<?= $pengguna->KODE_PERSONAL?>/<?= $pengguna->FOTO;?>" width="100%" height="auto">
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-light btn-sm" data-dismiss="modal">Tutup</button>
        </div>

      </div>
    </div>
  </div>
  <!-- MODAL karya -->
  <div id="ktp" class="modal fade" role="dialog" tabindex="-1" >
    <div class="modal-dialog" role="document">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <h5 class="modal-title text-white">Scan KTP - <b><?php echo $pengguna->NAMA;?></b></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <!-- Modal body -->
        <div class="modal-body">
          <img src="<?php echo base_url();?>file/site/pengguna/<?= $pengguna->KODE_PERSONAL?>/<?= $pengguna->KTP;?>" alt="<?php echo base_url();?>file/site/pengguna/<?= $pengguna->KODE_PERSONAL?>/<?= $pengguna->KTP;?>" width="100%" height="auto">
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-light btn-sm" data-dismiss="modal">Tutup</button>
        </div>

      </div>
    </div>
  </div>
  <!-- MODAL karya -->
  <div id="kk" class="modal fade" role="dialog" tabindex="-1" >
    <div class="modal-dialog" role="document">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <h5 class="modal-title text-white">SCAN KK - <b><?php echo $pengguna->NAMA;?></b></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <!-- Modal body -->
        <div class="modal-body">
          <img src="<?php echo base_url();?>file/site/pengguna/<?= $pengguna->KODE_PERSONAL?>/<?= $pengguna->KK;?>" alt="<?php echo base_url();?>file/site/pengguna/<?= $pengguna->KODE_PERSONAL?>/<?= $pengguna->KK;?>" width="100%" height="auto">
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-light btn-sm" data-dismiss="modal">Tutup</button>
        </div>

      </div>
    </div>
  </div>

  <div class="col-xl-8">
    <!-- Account details card-->
    <div class="card mb-4">
      <div class="card-header">Data Pengguna <?php if ($pengguna->VERIFIKASI == FALSE) {?> <button class="btn btn-primary btn-sm float-right" data-toggle="modal"  data-target="#verifikasi">Verifikasi</button> <?php }else{?><button class="btn btn-danger btn-sm float-right" data-toggle="modal"  data-target="#revoke">Revoke</button><?php }?></div>
      <div class="card-body">

        <div class="row mb-3">
          <div class="col-sm-3">
            <span class="mb-0 text-right text-muted d-block">Kode Personal</span>
          </div>
          <div class="col-sm-9 text-dark">
            <span class="text-warning"><?= $pengguna->KODE_PERSONAL;?></span>

            <?php if ($pengguna->VERIFIKASI == TRUE) { echo '<span class="badge badge-primary"><i class="fa fa-check-circle"></i> Active</span>'; }else{ echo '<span class="badge badge-light">Non-active</span>'; }?>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-sm-3">
            <span class="mb-0 text-right text-muted d-block">Nama Lengkap</span>
          </div>
          <div class="col-sm-9 text-dark">
            <span class="text-dark"><?= $pengguna->NAMA;?></span>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-sm-3">
            <span class="mb-0 text-right text-muted d-block">Email</span>
          </div>
          <div class="col-sm-9 text-dark">
            <span class="text-dark"><?= $pengguna->EMAIL;?></span>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-sm-3">
            <span class="mb-0 text-right text-muted d-block">No. Telepon</span>
          </div>
          <div class="col-sm-9 text-dark">
            <span class="text-dark"><?= $pengguna->HP;?></span>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-sm-3">
            <span class="mb-0 text-right text-muted d-block">Alamat</span>
          </div>
          <div class="col-sm-9 text-dark">
            <span class="text-dark"><?= $pengguna->JALAN?>, <?= $controller->M_admin->find_kota($pengguna->KOTA);?> - <?= $controller->M_admin->find_kec($pengguna->KECAMATAN);?>, <?= $controller->M_admin->find_prov($pengguna->PROVINSI);?>, Kode POS <?= $pengguna->KODE_POS?></span>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-sm-3">
            <span class="mb-0 text-right text-muted d-block">Instagram</span>
          </div>
          <div class="col-sm-9 text-dark">
            <span class="text-dark">@<?= $pengguna->INSTAGRAM;?></span>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-sm-3">
            <span class="mb-0 text-right text-muted d-block">Facebook</span>
          </div>
          <div class="col-sm-9 text-dark">
            <span class="text-dark"><?= $pengguna->FACEBOOK;?></span>
          </div>
        </div>

      </div>
      <div class="card-header">Data Penjamin </div>
      <div class="card-body">

        <div class="row mb-3">
          <div class="col-sm-3">
            <span class="mb-0 text-right text-muted d-block">Nama Lengkap Penjamin</span>
          </div>
          <div class="col-sm-9 text-dark">
            <span class="text-dark"><?= $pengguna->NAMA_PENJAMIN;?></span>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-sm-3">
            <span class="mb-0 text-right text-muted d-block">No. Telepon Penjamin</span>
          </div>
          <div class="col-sm-9 text-dark">
            <span class="text-dark"><?= $pengguna->HP_PENJAMIN;?></span>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-sm-3">
            <span class="mb-0 text-right text-muted d-block">Nama Kantor Penjamin</span>
          </div>
          <div class="col-sm-9 text-dark">
            <span class="text-dark"><?= $pengguna->NAMA_KANTOR;?></span>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-sm-3">
            <span class="mb-0 text-right text-muted d-block">Alamat Kantor Penjamin</span>
          </div>
          <div class="col-sm-9 text-dark">
            <span class="text-dark"><?= $pengguna->ALAMAT_KANTOR;?></span>
          </div>
        </div>

      </div>

      <div class="card-header">Data Rekening </div>
      <div class="card-body">
        <div class="row mb-3">
          <div class="col-sm-3">
            <span class="mb-0 text-right text-muted d-block">Nama BANK</span>
          </div>
          <div class="col-sm-9 text-dark">
            <span class="text-dark"><?= $pengguna->BANK;?></span>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-sm-3">
            <span class="mb-0 text-right text-muted d-block">No REKENING</span>
          </div>
          <div class="col-sm-9 text-dark">
            <span class="text-dark"><?= $pengguna->NO_REKENING;?></span>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-sm-3">
            <span class="mb-0 text-right text-muted d-block">Atas Nama</span>
          </div>
          <div class="col-sm-9 text-dark">
            <span class="text-dark"><?= $pengguna->ATAS_NAMA;?></span>
          </div>
        </div>

      </div>

    </div>
  </div>
</div>
