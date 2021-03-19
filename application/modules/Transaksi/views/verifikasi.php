  <div class="col-md-6 offset-md-3 col-sm-12 mt-3">
    <div class="p-card shadow">
      <div class="card-body">
        <form action="<?php echo site_url('Payment?transaksi=verifikasipengisiandeposit&kodedeposit='.$KODE_DEPOSIT);?>" method="post" enctype="multipart/form-data">
          <input type="hidden" name="submit" value="true">
          <div class="row">
            <div class="col-sm-12">
              <div class="my-account-section__header-title">Kirim Verifikasi TRANSFER</div>
              <div class="my-account-section__header-subtitle">Harap kirim verifikasi dalam bentuk screenshoot atau foto bukti transfer.</div>
            </div>
          </div>
          <hr>
          <div class="row mb-3">
            <div class="col-sm-3">
              <span class="mb-0 text-right text-secondary d-block">Upload Bukti</span>
            </div>
            <div class="col-sm-9 text-dark">
              <img id="previewverifikasi" class="mb-2 previewImg verifikasi hidden" src="https://www.tutorialrepublic.com/examples/images/transparent.png" alt="Placeholder">
              <input type="file" class="form-control-file" name="verifikasi"  onchange="previewFileverifikasi(this);"  accept="image/*" required>
              <small class="text-secondary">Harap upload bukti dengan kualitas yang jelas dan terbaca.</small>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-sm-9 offset-md-3 text-dark">
              <button type="submit" class="btn btn-theme btn-sm wd-login-btn">Konfirmasi</button>
              <a href="<?php echo site_url('Akun/Deposit');?>" class="btn btn-outline-theme btn-sm wd-login-btn">BATAL</a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>


  <script>
  function previewFileverifikasi(input){
    $(".verifikasi").removeClass('hidden');
    var file = $("input[name=verifikasi]").get(0).files[0];

    if(file){
      var reader = new FileReader();

      reader.onload = function(){
        $("#previewverifikasi").attr("src", reader.result);
      }

      reader.readAsDataURL(file);
    }
  }
  </script>
