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
      <div id="kk" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header bb-none">
              <h6>Contoh SCAN/Foto KK</h6>
              <button type="button" class="close cls-pop" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body pt-0">
              <img src="<?php echo base_url();?>file/site/kk.jpg" class="gambar-scan" alt="SCAN/FOTO KK">
            </div>
          </div>
        </div>
      </div>

        <div class="p-card mb-3">
          <form action="<?php echo site_url('Akun/KK');?>" method="post" enctype="multipart/form-data">
            <div class="p-card-body">
              <div class="row">
                <div class="col-sm-12">
                  <div class="my-account-section__header-title">Ubah File KK <a href="<?php echo site_url('Akun');?>" class="btn btn-theme btn-sm pull-right">Batal</a> </div>
                  <div class="my-account-section__header-subtitle">Harap ubah file KK jika file KK anda ditolak.</div>
                </div>
              </div>
              <hr>
              <div class="row mb-3">
                <div class="col-sm-3">
                  <span class="mb-0 text-right text-secondary d-block">Scan/Foto KK <small class="text-danger">*</small></span>
                </div>
                <div class="col-sm-9 text-dark">
                  <img id="previewKk" class="mb-2 previewImg kk" src="<?php echo base_url();?>file/site/pengguna/<?php echo $pengguna->KODE_PERSONAL;?>/<?php echo $pengguna->KK;?>" alt="Placeholder">
                  <input type="hidden" name="kode" value="bismillah">
                  <input type="file" class="form-control-file" name="kk"  onchange="previewFileKk(this);" accept="image/*" required>
                  <small class="text-secondary">Contoh: kirim hasil scan/foto KK anda seperti <span class="text-primary pointer" data-toggle="modal" data-target="#kk">berikut ini (klik)</span></small>
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
function previewFileKk(input){
  $(".kk").removeClass('hidden');
  var file = $("input[name=kk]").get(0).files[0];

  if(file){
    var reader = new FileReader();

    reader.onload = function(){
      $("#previewKk").attr("src", reader.result);
    }

    reader.readAsDataURL(file);
  }
}
</script>
