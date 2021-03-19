<div class="cotp__box--change">
  <h2 class="cotp__text--method-change"><?php echo $header;?></h2>
  <p class="cotp-change--title">
    <?php echo $text;?>
  </p>
  <hr style="width: 50%" class="mb-0">
  <?php if ($proses == "aktivasi") { ?>
    <div class="text-center cotp__text__not-active">
      <a href="<?php echo base_url().'Resend?email='.$email.'&kode='.$kode.'&nama='.$nama;?>" id="link-not-active" class="fs-13 fw-600 change-phone">Kirim kembali email</a>
    </div>

    <script type="text/javascript">
    var downloadButton = document.getElementById("link-not-active");
    var counter = 60;
    var newElement = document.createElement("p");
    newElement.innerHTML = "<span class='text-theme'>Belum menerima email</span>? anda dapat mengirim email lagi dalam <b>60 detik</b>.<br> <h6>HARAP CEK FOLDER SPAM EMAIL ANDA.</h6>";
    var id;

    downloadButton.parentNode.replaceChild(newElement, downloadButton);

    id = setInterval(function() {
      counter--;
      if(counter < 0) {
        newElement.parentNode.replaceChild(downloadButton, newElement);
        clearInterval(id);
      } else {
        newElement.innerHTML = "<span class='text-theme'>Belum menerima email</span>? anda dapat mengirim email lagi dalam <b>" + counter.toString() + " detik</b>.<br> <h6>HARAP CEK FOLDER SPAM EMAIL ANDA.</h6>";
      }
    }, 1000);
    </script>



  <?php }elseif ($proses == "pembayaran") { ?>
    <div class="text-center cotp__text__not-active">
      <a href="<?php echo base_url().'ResendPembayaran?Pengguna='.$email.'&KodeTransaksi='.$kode.'&Produk='.$produk;?>" id="link-not-active" class="fs-13 fw-600 change-phone">Kirim kembali email</a>
      <a href="<?php echo site_url('Akun/Pesanan');?>" class="fs-13 fw-600 change-phone text-primary mt-0">Cek Pesanan</a>
    </div>

    <script type="text/javascript">
    var downloadButton = document.getElementById("link-not-active");
    var counter = 60;
    var newElement = document.createElement("p");
    newElement.innerHTML = "<span class='text-theme'>Belum menerima email</span>? anda dapat mengirim email lagi dalam <b>60 detik</b>.<br> <h6>HARAP CEK FOLDER SPAM EMAIL ANDA.</h6>";
    var id;

    downloadButton.parentNode.replaceChild(newElement, downloadButton);

    id = setInterval(function() {
      counter--;
      if(counter < 0) {
        newElement.parentNode.replaceChild(downloadButton, newElement);
        clearInterval(id);
      } else {
        newElement.innerHTML = "<span class='text-theme'>Belum menerima email</span>? anda dapat mengirim email lagi dalam <b>" + counter.toString() + " detik</b>.<br> <h6>HARAP CEK FOLDER SPAM EMAIL ANDA.</h6>";
      }
    }, 1000);
    </script>
  <?php }elseif ($proses == "verifikasi") { ?>
    <div class="text-center cotp__text__not-active">
      <a href="javascript:void(0);" class="fs-13 fw-600 change-phone">Terjadi Masalah? Hubungi ADMIN!</a>
    </div>
  <?php }?>
</div>
