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

      <div id="diterima" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header bb-none pb-0">
              <h6>Terima No. Pesanan <?= $pesanan->KODE_TRANSAKSI;?></h6>
              <button type="button" class="close cls-pop" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body pt-0">
              <hr>
              <small>Dengan menekan tombol <b>Terima Pesanan</b>, berarti anda telah menerima pesanan dan waktu persewaan dimulai, dimana anda harus mengembalikan barang paling lambat <b><?= $pesanan->LAMA_SEWA;?></b> hari dari sekarang, atau pada tanggal <strong><?php echo date("H:i").", ".date("d-m-Y", strtotime('+'.$pesanan->LAMA_SEWA.' days', strtotime(date("d-m-Y"))));?></strong>.</small>
              <hr>
              <div class="row text-center">
                <div class="col-md-10 offset-md-1">
                  <span class="text-secondary">Terima pesanan atas: <span class="text-theme"><?= $pesanan->NAMA_PRODUK;?></span></span>
                  <br><br class="mb-1 mt-1">
                  <form action="<?php echo site_url('Diterima');?>" method="post">
                    <input type="hidden" name="waktu_mulai" value="<?= date("H:i").", ".date("d-m-Y");?>">
                    <input type="hidden" name="tgl_kembali" value="<?php echo date("H:i").", ".date("d-m-Y", strtotime('+'.$pesanan->LAMA_SEWA.' days', strtotime(date("Y-m-d"))));?>">
                    <input type="hidden" name="kode_transaksi" value="<?= $pesanan->KODE_TRANSAKSI;?>">
                    <button type="submit" class="btn btn-sm btn-theme text-none text-white">Terima Pesanan</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-9">
        <div class="p-card mb-3">
          <div class="p-card-body">
            <div class="row">
              <div class="col-sm-12">
                <div class="my-account-section__header-title">Detail pesanan
                  <button onclick="window.history.go(-1); return false;" type="button" class="btn btn-secondary btn-sm float-right"><i class="fa fa-backward fa-sm mr-1"></i> Kembali</button>
                  <?php if ($pesanan->proses == 5) { ?>
                    <a href="<?php echo site_url('Pengembalian/'.$pesanan->KODE_TRANSAKSI);?>" type="button" class="btn btn-danger btn-sm float-right mr-2"><i class="fa fa-send-o fa-sm mr-1"></i> Pengembalian</a>
                  <?php }elseif ($pesanan->proses == 4) { ?>
                    <button data-toggle="modal" data-target="#diterima" class="btn btn-info btn-sm float-right mr-2"><i class="fa fa-send-o fa-sm mr-1"></i> Pesanan Diterima</button>
                  <?php }?>
                </div>
                <div class="my-account-section__header-subtitle">Detail pesanan anda</div>
              </div>
            </div>
            <hr>
            <div class="row mb-3">
              <div class="col-sm-12">
                <table width="100%" class="table table-stripped">
                  <thead class="table-secondary">
                    <tr>
                      <th>Pemesanan</th>
                      <th>Detail</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td><b>STATUS</b></td>
                      <td>
                        <?php if ($pesanan->proses == 0){?>
                          <span class="badge badge-secondary">Belum Dibayar</span>
                          <div class="row mt-1">
                            <div class="col-md-4">
                              <a href="<?php echo site_url('bayar/'.$pesanan->KODE_TRANSAKSI);?>" class="btn btn-theme btn-sm btn-block">
                                Upload Bukti Transfer
                              </a>
                            </div>
                          </div>
                        <?php }elseif ($pesanan->proses == 1) { ?>
                          <span class="badge badge-danger">Menunggu Validasi</span>
                        <?php }elseif ($pesanan->proses == 3) { ?>
                          <span class="badge badge-primary">Sedang Dikemas</span>
                        <?php }elseif ($pesanan->proses == 4) { ?>
                          <span class="badge badge-warning">Dalam Pengiriman</span>
                        <?php }elseif ($pesanan->proses == 5) { ?>
                          <span class="badge badge-info">Telah Diterima dan Disewa</span>
                        <?php }elseif ($pesanan->proses == 6) { ?>
                          <span class="badge badge-info">Dalam Proses Pengembalian</span>
                        <?php }elseif ($pesanan->proses == 7) { ?>
                          <span class="badge badge-success">Selesai</span>
                        <?php }elseif ($pesanan->proses == 99) { ?>
                          <span class="badge badge-danger">Bukti Transfer Ditolak</span>
                        <?php }?>
                        <?php
                        if ($pesanan->proses > 4) {
                          $now 				= strtotime(date("H:i d-m-Y")); // or your date as well
                          $your_date 	= strtotime('-3 days', strtotime($pesanan->WAKTU_KEMBALI));
                          $datediff 	= $now - $your_date;

                          $cek 				= round($datediff / (60 * 60 * 24))+1;
                          if ($cek > 3) {
                            ?>

                            <div class="alert alert-warning mt-10 mb-0" style="padding: 0.5rem 1rem">
                              Anda telah melewati batas pengambalian pesanan anda. Anda akan mulai dikenakan denda.</b>
                            </div>

                          <?php }elseif ($cek > 0) { ?>

                            <div class="alert alert-warning mt-10 mb-0" style="padding: 0.5rem 1rem">
                              Batas waktu pengembalian pesanan anda kurang <b>3 hari</b>. Harap kembalikan pesanan anda sebelum <b><?= $pesanan->WAKTU_KEMBALI;?></b>
                            </div>

                          <?php }}?>
                        </td>
                      </tr>
                      <?php if (!empty($pesanan->bukti) || $pesanan->bukti != null) {?>
                        <tr>
                          <td><b>Bukti Pembayaran</b></td>
                          <td>
                            <a class="my-account__no-background-button my-account-profile__change-button text-info ml-2" data-toggle="modal" data-target="#bukti">Lihat</a>
                            <?php if ($pesanan->proses == 0 || $pesanan->proses == 99) { ?>
                            <a href="<?php echo site_url('UbahBukti/'.$pesanan->KODE_TRANSAKSI);?>" class="my-account__no-background-button my-account-profile__change-button text-info ml-2">Ubah</a> <?php if ($pesanan->proses == 99) { ?> <small class="text-danger">Bukti tidak diterima, harap upload bukti baru yang benar</small> <?php }}?>
                          </td>
                        </tr>
                      <?php }?>
                      <tr>
                        <td><b>Kode Transaksi</b></td>
                        <td><span class="text-theme"><?= $pesanan->KODE_TRANSAKSI;?></span></td>
                      </tr>
                      <tr>
                        <td><b>Lama Persewaan</b></td>
                        <td><span class="text-dark"><?= $pesanan->LAMA_SEWA;?></span> <span class="text-secondary">Hari</span> </td>
                      </tr>
                      <tr>
                        <td><b>Biaya Sewa</b></td>
                        <td>Rp.<span class="text-dark"><?= $pesanan->TOTAL-$pesanan->FEE_PENGIRIMAN-$pesanan->DISKON-$pesanan->DEPOSIT;?></span></td>
                      </tr>
                      <tr>
                        <td><b>Ongkir</b></td>
                        <td>
                          <?php if ($pesanan->FEE_PENGIRIMAN) { ?> Rp.<span class="text-dark"><?= $pesanan->FEE_PENGIRIMAN;?></span>
                        <?php }else{ ?><img src="<?php echo base_url();?>assets/frontend/img/free.png" class="free-ongkir" style="float:left !important" alt=""> <span class="text-secondary ml-2" style="margin-top:3px !important;">Free Ongkir</span> <?php }?>
                        </td>
                      </tr>
                      <tr>
                        <td><b>Total Biaya</b></td>
                        <td>
                          <h5><span class="font-weight-normal font-16">Rp.</span> <?= $pesanan->TOTAL;?> </h5>
                          <small class="text-danger">Tidak termasuk biaya admin, jika beda bank</small>
                        </td>
                      </tr>
                    </tbody>
                    <thead class="table-secondary">
                      <tr>
                        <th width="30%">Nama Produk</th>
                        <th width="70%">Detail</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td><?= $pesanan->NAMA_PRODUK;?></td>
                        <td>

                          <div class="row mb-30">
                            <div class="col-12">
                              <div class="kP-bM3" style="font-size: 1rem; padding: .5rem;">Detail Produk</div>
                              <div class="row mt-20 ml-0">
                                <div class="col-3 col-lg-2">
                                  <span class="_2iNrDS">Brand</span>
                                </div>
                                <div class="col-9 col-lg-10">
                                  <p><?= $pesanan->MERK?></p>
                                </div>
                              </div>
                              <div class="row mt-20 ml-0">
                                <div class="col-3 col-lg-2">
                                  <span class="_2iNrDS">Series</span>
                                </div>
                                <div class="col-9 col-lg-10">
                                  <p><?= $pesanan->TYPE?></p>
                                </div>
                              </div>
                              <div class="row mt-20 ml-0">
                                <div class="col-3 col-lg-2">
                                  <span class="_2iNrDS">Variant</span>
                                </div>
                                <div class="col-9 col-lg-10">
                                  <p><?= $pesanan->VARIAN?></p>
                                </div>
                              </div>
                              <div class="row mt-20 ml-0">
                                <div class="col-3 col-lg-2">
                                  <span class="_2iNrDS">GRADE</span>
                                </div>
                                <div class="col-9 col-lg-10">
                                  <p><?= $pesanan->GRADE?></p>
                                </div>
                              </div>
                            </div>
                          </div>
                        </td>
                      </tr>
                    </tbody>
                    <thead class="table-secondary">
                      <tr>
                        <th colspan="2">Parcel 1</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td colspan="2">
                          <?php if(!empty($pesanan->WAKTU_BALIK) || $pesanan->WAKTU_BALIK != null){ ?>
                            <div class="row mb-3">
                              <div class="col-sm-7">
                                <span class="mb-0 text-right text-muted d-block">Waktu Proses Pengembalian <br class="mt-0"><small class="text-danger">(Waktu proses pengembalian barang oleh pengguna)</small></span>
                              </div>
                              <div class="col-sm-5 text-dark" style="border-bottom: 1px solid #e9ecef;">
                                <span class="text-dark"><span class="text text-info"><?=str_replace(", ", " ", $pesanan->WAKTU_BALIK);?></span></span>
                              </div>
                            </div>
                          <?php }?>
                          <?php if(!empty($pesanan->WAKTU_KEMBALI) || $pesanan->WAKTU_KEMBALI != null){ ?>
                            <div class="row mb-3">
                              <div class="col-sm-7">
                                <span class="mb-0 text-right text-muted d-block">Waktu Kembali <br class="mt-0"><small class="text-danger">(Batas WAKTU Pengembalian barang)</small></span>
                              </div>
                              <div class="col-sm-5 text-dark" style="border-bottom: 1px solid #e9ecef;">
                                <span class="text-dark"><span class="text text-danger"><?=str_replace(", ", " ", $pesanan->WAKTU_KEMBALI);?></span></span>
                              </div>
                            </div>
                          <?php }?>
                          <?php if(!empty($pesanan->WAKTU_SELESAI) || $pesanan->WAKTU_SELESAI != null){ ?>
                            <div class="row mb-3">
                              <div class="col-sm-7">
                                <span class="mb-0 text-right text-muted d-block">Waktu Diterima <br class="mt-0"><small class="text-danger">(Diterima oleh pemesanan & mulai penghitungan lama pemesanan)</small></span>
                              </div>
                              <div class="col-sm-5 text-dark" style="border-bottom: 1px solid #e9ecef;">
                                <span class="text-dark"><span class="text text-dark"><?=str_replace(", ", " ", $pesanan->WAKTU_SELESAI);?></span> </span>
                              </div>
                            </div>
                          <?php }?>
                          <?php if(!empty($pesanan->WAKTU_PENGIRIMAN) || $pesanan->WAKTU_PENGIRIMAN != null){ ?>
                            <div class="row mb-3">
                              <div class="col-sm-7">
                                <span class="mb-0 text-right text-muted d-block">Waktu Pengiriman  <br class="mt-0"><small class="text-danger">(Dikirim dari MAMAMOORENTAL ke kurir)</small></span>
                              </div>
                              <div class="col-sm-5 text-dark" style="border-bottom: 1px solid #e9ecef;">
                                <span class="text-dark"><span class="text text-dark"><?=str_replace(", ", " ", $pesanan->WAKTU_PENGIRIMAN);?></span> </span>
                              </div>
                            </div>
                          <?php }?>
                          <?php if(!empty($pesanan->WAKTU_PEMBAYARAN) || $pesanan->WAKTU_PEMBAYARAN != null){ ?>
                            <div class="row mb-3">
                              <div class="col-sm-7">
                                <span class="mb-0 text-right text-muted d-block">Waktu Pembayaran <br class="mt-0"><small class="text-danger">(Upload bukti transfer)</small></span>
                              </div>
                              <div class="col-sm-5 text-dark" style="border-bottom: 1px solid #e9ecef;">
                                <span class="text-dark"><span class="text text-dark"><?=str_replace(", ", " ", $pesanan->WAKTU_PEMBAYARAN);?></span> </span>
                              </div>
                            </div>
                          <?php }?>
                          <?php if(!empty($pesanan->WAKTU_PEMESANAN) || $pesanan->WAKTU_PEMESANAN != null){ ?>
                            <div class="row mb-3">
                              <div class="col-sm-7">
                                <span class="mb-0 text-right text-muted d-block">Waktu Pemesanan <br class="mt-0"><small class="text-danger">(Pesanan dibuat)</small></span>
                              </div>
                              <div class="col-sm-5 text-dark" style="border-bottom: 1px solid #e9ecef;">
                                <span class="text-dark"><span class="text text-dark"><?=str_replace(", ", " ", $pesanan->WAKTU_PEMESANAN);?></span> </span>
                              </div>
                            </div>
                          <?php }?>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div id="bukti" class="modal fade" role="dialog" tabindex="-1" >
        <div class="modal-dialog" role="document">
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header bg-success">
              <h5 class="modal-title text-white">Bukti pembayaran - <b><?php echo $pengguna->NAMA;?></b></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
              <img src="<?php echo base_url();?>file/site/pengguna/<?php echo $pesanan->KODE_PERSONAL;?>/bukti_bayar/<?php echo $pesanan->bukti;?>" alt="" width="100%" height="auto">
              <a href="<?php echo base_url();?>file/site/pengguna/<?php echo $pesanan->KODE_PERSONAL;?>/bukti_bayar/<?php echo $pesanan->bukti;?>" class="text-success" target="_blank">Buka di tab baru</a>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
              <button type="button" class="btn btn-light btn-sm" data-dismiss="modal">TUTUP</button>
            </div>

          </div>
        </div>
      </div>
    </div>
