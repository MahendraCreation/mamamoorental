<div class="container">
  <div class="row mt-5">
    <div id="bukti" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header bb-none">
            <h6>Contoh SCAN/Foto Bukti Transfer</h6>
            <button type="button" class="close cls-pop" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body pt-0">
            <img src="<?php echo base_url();?>file/site/bukti.jpg" class="gambar-scan" alt="SCAN/FOTO KTP">
          </div>
        </div>
      </div>
    </div>

    <div class="col-lg-8 offset-lg-2 col-sm-12">
      <div class="p-card mb-3">
        <form action="<?php echo site_url('Done');?>" method="post" enctype="multipart/form-data">
          <input type="hidden" name="transaksi" value="<?= $transaksi;?>">
          <div class="p-card-body">
            <div class="row">
              <div class="col-sm-12">
                <div class="my-account-section__header-title">Upload bukti TRANSFER PEMBAYARAN</div>
                <div class="my-account-section__header-subtitle">Harap upload foto struk / ScreenShoot Bukti Transfer Pembayaran.</div>
              </div>
            </div>
            <hr>
            <div class="row mb-3">
              <div class="col-sm-3">
                <span class="mb-0 text-right text-secondary d-block">Bukti transfer <small class="text-danger">*</small></span>
              </div>
              <div class="col-sm-9 text-dark">
                <img id="previewBukti" class="mb-2 previewImg bukti hidden" src="https://www.tutorialrepublic.com/examples/images/transparent.png" alt="Placeholder">
                <input type="hidden" name="kode" value="bismillah">
                <input type="file" class="form-control-file" name="bukti"  onchange="previewFileBukti(this);" accept="image/*" required>
                <small class="text-secondary">Contoh: bukti transfer seperti <span class="text-primary pointer" data-toggle="modal" data-target="#bukti">berikut ini (klik)</span></small>
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
function previewFileBukti(input){
  $(".bukti").removeClass('hidden');
  var file = $("input[name=bukti]").get(0).files[0];

  if(file){
    var reader = new FileReader();

    reader.onload = function(){
      $("#previewBukti").attr("src", reader.result);
    }

    reader.readAsDataURL(file);
  }
}
</script>
