<!-- Custom page header alternative example-->
<div class="d-flex justify-content-between align-items-sm-center flex-column flex-sm-row mb-2">
  <div class="mr-4 mb-3 mb-sm-0">
    <h1 class="mb-0">Detail Transaksi Persewaan</h1>
    <div class="small">
      <span class="font-weight-500 text-primary"><?php echo date("l");?></span>
      &#xB7; <?php echo date("j F Y");?> &#xB7; <?php echo date("H:i");?>
    </div>
  </div>
  <button type="button" class="btn btn-primary btn-sm float-right" onclick="window.history.go(-1); return false;"><i class="fa fa-step-backward fa-sm mr-1"></i> Kembali</button>
</div>
<div class="row">
  <!-- MODAL karya -->
  <div id="revoke" class="modal fade" role="dialog" tabindex="-1" >
    <div class="modal-dialog" role="document">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header bg-info">
          <h5 class="modal-title text-white">Revoke transaksi An. <b><?php echo $pesanan->NAMA;?></b></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <!-- Modal body -->
        <div class="modal-body">
          Yakin revoke/ubah status transaksi An.<b><?php echo $pesanan->NAMA ?></b>, menjadi:
          <hr>
          <?php if ($pesanan->STATUS == 3 || $pesanan->STATUS == 2 || $pesanan->STATUS == 1) {?>
            <a href="<?php echo site_url('Pesanan/Revoke/1/'.$pesanan->KODE_TRANSAKSI);?>" class="btn btn-sm btn-light btn-block">Belum diverifikasi</a>
          <?php }?>
          <?php if ($pesanan->STATUS == 4) {?>
            <a href="<?php echo site_url('Pesanan/Revoke/3/'.$pesanan->KODE_TRANSAKSI);?>" class="btn btn-sm btn-warning btn-block">Proses dikemas</a>
          <?php }?>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-light btn-sm" data-dismiss="modal">Batal</button>
        </div>

      </div>
    </div>
  </div>
  <div id="perpanjangan" class="modal fade" role="dialog" tabindex="-1" >
    <div class="modal-dialog" role="document">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <h5 class="modal-title text-white">Perpanjang SEWA - <b><?php echo $pesanan->KODE_TRANSAKSI;?></b></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <!-- Modal body -->
        <div class="modal-body">
          <form action="<?php echo site_url('Admin/Perpanjang');?>" method="post">
            <input type="hidden" name="KODE_TRANSAKSI" value="<?= $pesanan->KODE_TRANSAKSI;?>">
            <input type="hidden" name="WAKTU_KEMBALI" value="<?= $pesanan->WAKTU_KEMBALI;?>">
            <input type="hidden" name="a" value="<?= $pesanan->PERPANJANGAN;?>">
            <input type="hidden" name="b" value="<?= $pesanan->BIAYA_PERPANJANGAN;?>">
            <p>Pesanan <span class="text-primary">dalam tahap sedang disewa</span> dapat diperpanjang masa sewanya, anda dapat melakukan ini jika pengguna menghubungi anda untuk melakukan perpanjangan.</p>
            <p>Setelah pengguna <span class="text-success">membayarkan biaya perpanjangan</span> anda dapat memperpanjang masa sewa disini.</p>
            <div class="form-group">
              <label class="title font-weight-bold">Perpanjang Selama</label><br>
              <div class="form-check form-check-inline">
                <input type="radio" id="customRadioInline1" name="PERPANJANG" class="form-check-input" value="15" autocomplete="off" required>
                <label class="form-check-label pl-0" for="customRadioInline1">15 hari</label>
              </div>
              <div class="form-check form-check-inline ml-5">
                <input type="radio" id="customRadioInline2" name="PERPANJANG" class="form-check-input" value="30" autocomplete="off" required>
                <label class="form-check-label pl-0" for="customRadioInline2">30 Hari</label>
              </div>
            </div>
            <div class="form-group">
              <label class="title">Biaya Perpanjangan</label>
              <input type="number" name="BIAYA_PERPANJANGAN" class="form-control" placeholder="Masukkan biaya perpanjangan sewa">
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
              <button type="button" class="btn btn-light btn-sm" data-dismiss="modal">Batal</button>
              <button type="submit" class="btn btn-primary btn-sm">Perpanjang</button>
            </div>
          </form>
        </div>

      </div>
    </div>
  </div>

  <div class="col-xl-12">
    <!-- Account details card-->
    <div class="card mb-4">
      <div class="card-header">Data Transaksi No. <?= $pesanan->KODE_TRANSAKSI;?>
        <?php if ($pesanan->STATUS <= 4 AND $pesanan->STATUS >= 2) {?>
          <button class="btn btn-danger btn-sm float-right ml-2" data-toggle="modal"  data-target="#revoke">Revoke PROSES</button>
        <?php }?>
        <?php if ($pesanan->STATUS == 5) { ?>
          <button class="btn btn-primary btn-sm float-right ml-2" data-toggle="modal"  data-target="#perpanjangan">Perpanjang Masa Sewa</button>
        <?php }?>
      </div>
      <div class="card-body">

        <div class="row mb-3">
          <div class="col-sm-3">
            <span class="mb-0 text-right text-muted d-block">Kode Transaksi</span>
          </div>
          <div class="col-sm-9 text-dark">
            <span class="text-warning"><?= $pesanan->KODE_TRANSAKSI;?></span>

            <?php if($pesanan->STATUS == 1){ echo '<span class="badge badge-light">Belum Diverifikasi</span>'; }elseif ($pesanan->STATUS == 3) { echo '<span class="badge badge-warning">Dikemas</span>'; }elseif ($pesanan->STATUS == 4) {echo '<span class="badge badge-info">Dikirim</span>';}elseif ($pesanan->STATUS == 5) { echo '<span class="badge badge-primary">Disewa</span>'; }?>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-sm-9 offset-sm-3">
            <?php

            $now 				= strtotime(date("H:i d-m-Y")); // or your date as well
            $your_date 	= strtotime('-3 days', strtotime($pesanan->WAKTU_KEMBALI));
            $datediff 	= $now - $your_date;

            $cek 				= round($datediff / (60 * 60 * 24))+1;
            if ($cek > 3 AND $pesanan->STATUS == 5) {
              ?>

              <div class="alert alert-warning mb-0" style="padding: 0.5rem 1rem">
                Pesanan ini telah melewati batas pengembalian pesanan, dan akan menerima denda saat pengembalian.</b>
              </div>

            <?php }elseif ($cek > 0 AND $pesanan->STATUS == 5) { ?>

              <div class="alert alert-warning mb-0" style="padding: 0.5rem 1rem">
                Batas waktu pengembalian pesanan kurang dari <b>3 hari</b>.Waktu pengembalian pesanan <b><?= $pesanan->WAKTU_KEMBALI;?></b>
              </div>

            <?php }?>
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
            <span class="mb-0 text-right text-muted d-block">Nama Produk</span>
          </div>
          <div class="col-sm-9 text-dark">
            <span class="text-dark"><?= $pesanan->NAMA_PRODUK;?></span>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-sm-3">
            <span class="mb-0 text-right text-muted d-block">Selama</span>
          </div>
          <div class="col-sm-9 text-dark">
            <span class="text-dark"><?= $pesanan->LAMA_SEWA;?> Hari</span>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-sm-3">
            <span class="mb-0 text-right text-muted d-block">Alamat Pengiriman</span>
          </div>
          <div class="col-sm-9 text-dark">
            <span class="text-dark"><?= $pesanan->JALAN?>, <?= $controller->M_admin->find_kota($pesanan->KOTA);?> - <?= $controller->M_admin->find_kec($pesanan->KECAMATAN);?>, <?= $controller->M_admin->find_prov($pesanan->PROVINSI);?>, Kode POS <?= $pesanan->KODE_POS?></span>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-sm-3">
            <span class="mb-0 text-right text-muted d-block">Fee Ongkir</span>
          </div>
          <div class="col-sm-9 text-dark">
            <span class="text-dark">
              <?php if(empty($pesanan->FEE_PENGIRIMAN) || $pesanan->FEE_PENGIRIMAN == null){echo '<span class="text-primary">None</span>';}else{echo '<span class="text-success">Fee Ongkir:</span> Rp. <b>'.number_format($pesanan->FEE_PENGIRIMAN,0,",",".").'</b>';}?>
              </span>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-sm-3">
              <span class="mb-0 text-right text-muted d-block">Total pembayaran</span>
            </div>
            <div class="col-sm-9 text-dark">
              <span class="text-dark">Rp.<?= number_format($pesanan->TOTAL,0,",",".");?></span> <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#bukti"><i class="fa fa-eye mr-1"></i> Lihat</button>
            </div>
          </div>
          <?php if ($pesanan->PERPANJANGAN > 0) { ?>
            <div class="row mb-3">
              <div class="col-sm-3">
                <span class="mb-0 text-right text-muted d-block">Biaya Perpanjangan</span>
              </div>
              <div class="col-sm-9 text-dark">
                <span class="text-dark">Rp.<?= number_format($pesanan->BIAYA_PERPANJANGAN,0,",",".");?></span> <span class="text-info">(Diperpanjang <?= $pesanan->PERPANJANGAN;?> kali)</span>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-sm-3">
                <span class="mb-0 text-right text-muted d-block">Total Biaya Persewaan</span>
              </div>
              <div class="col-sm-9 text-dark">
                <span class="text-dark">Rp.<?= number_format($pesanan->BIAYA_PERPANJANGAN+$pesanan->TOTAL,0,",",".");?></span></span>
              </div>
            </div>
          <?php }?>
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
                  <a href="<?php echo base_url();?>file/site/pengguna/<?php echo $pesanan->KODE_PERSONAL;?>/bukti_bayar/<?php echo $pesanan->bukti;?>" class="text-none text-success mb-2" target="_blank">Buka di tab baru</a>
                  <img src="<?php echo base_url();?>file/site/pengguna/<?php echo $pesanan->KODE_PERSONAL;?>/bukti_bayar/<?php echo $pesanan->bukti;?>" alt="" width="100%" height="auto">
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                  <button type="button" class="btn btn-light btn-sm" data-dismiss="modal">TUTUP</button>
                </div>

              </div>
            </div>
          </div>
          <table width="100%" class="table table-stripped">
            <thead class="table-light">
              <tr>
                <th colspan="2">Parcel 1</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <style>
                .timeline .timeline-item .timeline-item-marker .timeline-item-marker-text {
                  font-size: 0.875rem;
                  width: 8rem;
                }
                </style>
                <td colspan="2">
                  <div class="timeline">
                    <?php if(!empty($pesanan->WAKTU_BALIK) || $pesanan->WAKTU_BALIK != null){ ?>
                      <div class="timeline-item">
                        <div class="timeline-item-marker">
                          <div class="timeline-item-marker-text"><?=str_replace(", ", " ", $pesanan->WAKTU_BALIK);?></div>
                          <div class="timeline-item-marker-indicator"><i data-feather="corner-down-left"></i></div>
                        </div>
                        <div class="timeline-item-content">Waktu Proses Pengembalian <br class="mt-0"><small class="text-danger">(Waktu proses pengembalian barang oleh pengguna)</small></div>
                      </div>
                    <?php }?>
                    <?php if(!empty($pesanan->WAKTU_KEMBALI) || $pesanan->WAKTU_KEMBALI != null){ ?>
                      <div class="timeline-item">
                        <div class="timeline-item-marker">
                          <div class="timeline-item-marker-text"><?=str_replace(", ", " ", $pesanan->WAKTU_KEMBALI);?></div>
                          <div class="timeline-item-marker-indicator"><i data-feather="alert-triangle"></i></div>
                        </div>
                        <div class="timeline-item-content">Waktu Kembali <br class="mt-0"><small class="text-danger">(Batas WAKTU Pengembalian barang)</small> <?php if ($pesanan->PERPANJANGAN > 0) { ?><span class="text-info">(Diperpanjang <?= $pesanan->PERPANJANGAN;?> kali) <?php } ?><br class="mt-0"><small class="text-danger">(Batas waktu pengembalian barang oleh pengguna)</small></div>
                        </div>
                      <?php } ?>
                      <?php if(!empty($pesanan->WAKTU_SELESAI) || $pesanan->WAKTU_SELESAI != null){ ?>
                        <div class="timeline-item">
                          <div class="timeline-item-marker">
                            <div class="timeline-item-marker-text"><?=str_replace(", ", " ", $pesanan->WAKTU_SELESAI);?></div>
                            <div class="timeline-item-marker-indicator"><i data-feather="check-square"></i></div>
                          </div>
                          <div class="timeline-item-content">Waktu Diterima <br class="mt-0"><small class="text-danger">(Diterima oleh pemesanan & mulai penghitungan lama pemesanan)</small></div>
                        </div>
                      <?php }?>
                      <?php if(!empty($pesanan->WAKTU_PENGIRIMAN) || $pesanan->WAKTU_PENGIRIMAN != null){ ?>
                        <div class="timeline-item">
                          <div class="timeline-item-marker">
                            <div class="timeline-item-marker-text"><?=str_replace(", ", " ", $pesanan->WAKTU_PENGIRIMAN);?></div>
                            <div class="timeline-item-marker-indicator"><i data-feather="truck"></i></div>
                          </div>
                          <div class="timeline-item-content">Waktu Pengiriman  <br class="mt-0"><small class="text-danger">(Dikirim dari MAMAMOORENTAL ke kurir)</small></div>
                        </div>
                      <?php }?>
                      <?php if(!empty($pesanan->WAKTU_PEMBAYARAN) || $pesanan->WAKTU_PEMBAYARAN != null){ ?>
                        <div class="timeline-item">
                          <div class="timeline-item-marker">
                            <div class="timeline-item-marker-text"><?=str_replace(", ", " ", $pesanan->WAKTU_PEMBAYARAN);?></div>
                            <div class="timeline-item-marker-indicator"><i data-feather="credit-card"></i></div>
                          </div>
                          <div class="timeline-item-content">Waktu Pembayaran <br class="mt-0"><small class="text-danger">(Upload bukti transfer)</small></div>
                        </div>
                      <?php }?>
                      <?php if(!empty($pesanan->WAKTU_PEMESANAN) || $pesanan->WAKTU_PEMESANAN != null){ ?>
                        <div class="timeline-item">
                          <div class="timeline-item-marker">
                            <div class="timeline-item-marker-text"><?=str_replace(", ", " ", $pesanan->WAKTU_PEMESANAN);?></div>
                            <div class="timeline-item-marker-indicator"><i data-feather="package"></i></div>
                          </div>
                          <div class="timeline-item-content">Waktu Pemesanan <br class="mt-0"><small class="text-danger">(Pesanan dibuat)</small></div>
                        </div>
                      <?php }?>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
