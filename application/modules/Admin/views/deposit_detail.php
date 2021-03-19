<!-- Custom page header alternative example-->
<div class="d-flex justify-content-between align-items-sm-center flex-column flex-sm-row mb-2">
  <div class="mr-4 mb-3 mb-sm-0">
    <h1 class="mb-0">Detail Permintaan Deposit</h1>
    <div class="small">
      <span class="font-weight-500 text-primary"><?php echo date("l");?></span>
      &#xB7; <?php echo date("j F Y");?> &#xB7; <?php echo date("H:i");?>
    </div>
  </div>
  <button type="button" class="btn btn-primary btn-sm float-right" onclick="window.history.go(-1); return false;"><i class="fa fa-step-backward fa-sm mr-1"></i> Kembali</button>
</div>
<div class="row">

  <div class="col-xl-12">
    <!-- Account details card-->
    <div class="card mb-4">
      <div class="card-header">Data Transaksi No. D_<?= $pesanan->ID_TOPUP;?>-<?= $pesanan->KODE_PERSONAL;?></div>
      <div class="card-body">

        <div class="row mb-3">
          <div class="col-sm-3">
            <span class="mb-0 text-right text-muted d-block">Kode Transaksi</span>
          </div>
          <div class="col-sm-9 text-dark">
            <span class="text-warning">D_<?= $pesanan->ID_TOPUP;?>-<?= $pesanan->KODE_PERSONAL;?></span>

            <?php if($pesanan->STATUS == 1){ echo '<span class="badge badge-light">Belum Diverifikasi</span>'; }elseif ($pesanan->STATUS == 2) { echo '<span class="badge badge-success">Telah Diverifikasi</span>'; }?>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-sm-3">
            <span class="mb-0 text-right text-muted d-block">Nama Pemesan</span>
          </div>
          <div class="col-sm-9 text-dark">
            <span class="text-dark"><?= $pesanan->NAMA;?></span>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-sm-3">
            <span class="mb-0 text-right text-muted d-block">Jumlah Permintaan Saldo</span>
          </div>
          <div class="col-sm-9 text-dark">
            <span class="text-dark">Rp. <?= $pesanan->JUMLAH;?></span>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-sm-3">
            <span class="mb-0 text-right text-muted d-block">Waktu Pembayaran</span>
          </div>
          <div class="col-sm-9 text-dark">
            <span class="text-dark">Pukul <?= str_replace(", ", " - Tanggal: ", $pesanan->WAKTU_PEMBAYARAN);?></span> WIB</span> <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#bukti"><i class="fa fa-eye"></i> Lihat bukti</button>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-sm-3">
            <span class="mb-0 text-right text-muted d-block">Waktu Verifikasi</span>
          </div>
          <div class="col-sm-9 text-dark">
            <span class="text-dark"><?php if(empty($pesanan->WAKTU_VERIFIKASI) || $pesanan->WAKTU_VERIFIKASI == null){ echo '<span class="text-info">Menunggu proses sebelumnya</span>';}else{ echo '<span class="text text-primary">Pukul '.str_replace(", ", " - Tanggal: ", $pesanan->WAKTU_VERIFIKASI).'</span> WIB';};?></span>
          </div>
        </div>
        <div id="bukti" class="modal fade" role="dialog" tabindex="-1" >
          <div class="modal-dialog" role="document">
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header bg-success">
                <h5 class="modal-title text-white">Bukti pembayaran - <b><?php echo $pesanan->NAMA;?></b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <!-- Modal body -->
              <div class="modal-body">
                <img src="<?php echo base_url();?>file/site/pengguna/<?php echo $pesanan->KODE_PERSONAL;?>/TopUp/<?php echo $pesanan->BUKTI;?>" alt="" width="100%" height="auto">
                <a href="<?php echo base_url();?>file/site/pengguna/<?php echo $pesanan->KODE_PERSONAL;?>/TopUp/<?php echo $pesanan->BUKTI;?>" class="text-success" target="_blank">Buka di tab baru</a>
              </div>

              <!-- Modal footer -->
              <div class="modal-footer">
                <button type="button" class="btn btn-light btn-sm" data-dismiss="modal">TUTUP</button>
              </div>

            </div>
          </div>
        </div>

      </div>

    </div>
  </div>
</div>
