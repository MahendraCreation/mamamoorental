<div class="cotp__box--change">
  <h2 class="cotp__text--method-change"><?php echo $header;?></h2>
  <p class="cotp-change--title">
    <?php echo $text;?>
  </p>
  <hr style="width: 50%" class="mb-0">
  <?php if ($proses == "topup") { ?>
    <div class="row">
      <div class="col-md-4 offset-md-4">
        <p class="text-center">Selesaikan pengisian DEPOSIT, permintaan pengisian deposit akan hangus jika dalam waktu 1x24 jam transfer dan verfikasi pengisian tidak dilakukan:</p>
        <div class="p-card card-body shadow-sm">
          <table class="table table-stripped">
            <tr>
              <td width="30%"><b>Nominal Pengisian</b></td>
              <td width="70%">Rp. <?= $nominal;?></td>
            </tr>
            <tr>
              <td><b>No Rekening</b></td>
              <td>12341234</td>
            </tr>
            <tr>
              <td><b>Atas Nama</b></td>
              <td>MAMAMOORENTAL</td>
            </tr>
            <tr>
              <td><b>BANK</b></td>
              <td>BCA</td>
            </tr>
          </table>
          <a href="<?php echo site_url('Akun/Deposit');?>" class="btn btn-success btn-sm btn-block">Mengerti</a>
        </div>
        <p class="text-center">Harap mengirim Nominal Transfer sesuai dengan permintaan pengisian deposit <span class="text-danger">ditambahkan dengan biaya admin bank masing-masing, jika beda bank</span.></p>
      </div>
    </div>
    <div class="text-center cotp__text__not-active">
      <a href="javascript:void(0);" class="fs-13 fw-600 change-phone">Terjadi Masalah? Hubungi ADMIN!</a>
    </div>
  <?php }?>
</div>
