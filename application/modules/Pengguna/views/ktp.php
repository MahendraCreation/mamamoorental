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
              <h6>Contoh SCAN/Foto KTP</h6>
              <button type="button" class="close cls-pop" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body pt-0">
              <img src="<?php echo base_url();?>file/site/ktp.jpg" class="gambar-scan" alt="SCAN/FOTO KTP">
            </div>
          </div>
        </div>
      </div>

        <div class="p-card mb-3">
          <form action="<?php echo site_url('Akun/KTP');?>" method="post" enctype="multipart/form-data">
            <div class="p-card-body">
              <div class="row">
                <div class="col-sm-12">
                  <div class="my-account-section__header-title">Ubah File KTP <a href="<?php echo site_url('Akun');?>" class="btn btn-theme btn-sm pull-right">Batal</a></div>
                  <div class="my-account-section__header-subtitle">Harap ubah file KTP jika file KTP anda ditolak.</div>
                </div>
              </div>
              <hr>
              <div class="row mb-3">
                <div class="col-sm-3">
                  <span class="mb-0 text-right text-secondary d-block">Scan/Foto KTP <small class="text-danger">*</small></span>
                </div>
                <div class="col-sm-9 text-dark">
                  <img id="previewKtp" class="mb-2 previewImg ktp" src="<?php echo base_url();?>file/site/pengguna/<?php echo $pengguna->KODE_PERSONAL;?>/<?php echo $pengguna->KTP;?>" alt="Placeholder">
                  <input type="hidden" name="kode" value="bismillah">
                  <input type="file" class="form-control-file" name="ktp"  onchange="previewFileKtp(this);" accept="image/*" required>
                  <small class="text-secondary">Contoh: kirim hasil scan/foto KTP anda seperti <span class="text-primary pointer" data-toggle="modal" data-target="#ktp">berikut ini (klik)</span></small>
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-sm-9 offset-md-3 text-dark">
                  <button type="submit" name="submit" class="btn btn-theme wd-login-btn">Konfirmasi</button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
function previewFileKtp(input){
  $(".ktp").removeClass('hidden');
  var file = $("input[name=ktp]").get(0).files[0];

  if(file){
    var reader = new FileReader();

    reader.onload = function(){
      $("#previewKtp").attr("src", reader.result);
    }

    reader.readAsDataURL(file);
  }
}
</script>
