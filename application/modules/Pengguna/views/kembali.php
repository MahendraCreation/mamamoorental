<!-- <link href="https://use.fontawesome.com/releases/v5.0.1/css/all.css" rel="stylesheet"> -->
<style>
form,label { margin: 0; padding: 0; }
</style>

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

        <div class="p-card mb-3">
          <div class="p-card-body">
            <div class="row">
              <div class="col-sm-12">
                <div class="order-detail-header__state-container">
                  <a onclick="window.history.go(-1); return false;" class="text-none pointer">
                    <div class="order-detail-header__back-button">
                      <svg enable-background="new 0 0 11 11" viewBox="0 0 11 11" x="0" y="0" class="shopee-svg-icon order-detail-header__back-button--arrow icon-arrow-left">
                        <g><path d="m8.5 11c-.1 0-.2 0-.3-.1l-6-5c-.1-.1-.2-.3-.2-.4s.1-.3.2-.4l6-5c .2-.2.5-.1.7.1s.1.5-.1.7l-5.5 4.6 5.5 4.6c.2.2.2.5.1.7-.1.1-.3.2-.4.2z"></path></g>
                      </svg> KEMBALI
                    </div>
                  </a>
                  <div class="order-detail-header__note">
                    <span class="order-content__header__order-sn">NO. PESANAN. <?= $pesanan->KODE_TRANSAKSI;?></span>
                    <span class="order-detail-header__separator">|</span>
                    <span class="order-detail-header__status">dinilai</span>
                  </div>
                  <form  class="text-center w100 p-20 pt-0" action="<?php echo site_url('Pesanan/Selesai/'.$pesanan->KODE_TRANSAKSI);?>" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="KODE_TRANSAKSI" value="<?= $pesanan->KODE_TRANSAKSI;?>">
                    <input type="hidden" name="KODE_UNIT" value="<?= $pesanan->KODE_UNIT;?>">
                    <div class="row mb-3">
                      <div class="col-md-12">
                        <table class="table table-stripped text-right">
                          <tbody>
                            <tr>
                              <td width="65%" class="text-secondary">Nama produk</td>
                              <td width="35%"><?= $pesanan->NAMA_PRODUK;?></td>
                            </tr>
                            <tr>
                              <td class="text-secondary">Waktu Dimulai</td>
                              <td><?= $pesanan->WAKTU_SELESAI;?></td>
                            </tr>
                            <tr>
                              <td class="text-secondary">Batas Waktu Pengembalian</td>
                              <td class="text-danger"><?= $pesanan->WAKTU_KEMBALI;?></td>
                            </tr>
                            <?php if ($telat == TRUE) { ?>
                              <tr>
                                <td class="text-secondary">Telat</td>
                                <td>Mohon maaf waktu pengembalian anda telah telat selama <?= $telat_hari;?> Hari </td>
                              </tr>
                            <?php }?>
                            <tr>
                              <td class="text-secondary">Denda</td>
                              <td>Rp.<span class="text-theme font-20"><?= $denda;?></span></td>
                            </tr>
                            <?php if ($telat == TRUE) { ?>
                              <tr>
                                <td colspan="2">
                                  <span class="text-danger">Harap membayarkan denda anda, pada No. Rekening <b><?= $controller->M_pengguna->bank_ma("_no");?> - <?= $controller->M_pengguna->bank_ma("_bank");?> <?= $controller->M_pengguna->bank_ma("_an");?></span>
                                  </td>
                                </tr>
                              <?php }?>
                            </tbody>
                          </table>
                        </div>
                      </div>
                      <div class="row mb-3">
                        <div class="col-md-12">
                          <input type="text" name="no_resi_kembali" class="form-control" placeholder="Masukkan no resi pengiriman" required>
                          <small class="float-left text-muted">Tambahkan no resi kika diperlukan.</small>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-4 offset-md-4 col-sm-12">
                          <center id='rating' class="rating text-center">
                            <input type="radio" class="rate" id="star5" name="rating" value="5" <?php if (isset($c) && $c == '5') { echo 'checked'; } ?> />
                            <label for="star5" class="font-30" title="Sempurna - 5 Bintang"></label>

                            <input type="radio" class="rate" id="star4" name="rating" value="4" <?php if (isset($c) && $c == '4') { echo 'checked'; } ?> />
                            <label for="star4" class="font-30" title="Sangat Bagus - 4 Bintang"></label>

                            <input type="radio" class="rate" id="star3" name="rating" value="3" <?php if (isset($c) && $c == '3') { echo 'checked'; } ?> />
                            <label for="star3" class="font-30" title="Bagus - 3 Bintang"></label>

                            <input type="radio" class="rate" id="star2" name="rating" value="2" <?php if (isset($c) && $c == '2') { echo 'checked'; } ?> />
                            <label for="star2" class="font-30" title="Tidak Buruk - 2 Bintang"></label>

                            <input type="radio" class="rate" id="star1" name="rating" value="1" <?php if (isset($c) && $c == '1') { echo 'checked'; } ?> />
                            <label for="star1" class="font-30" title="Buruk - 1 Bintang"></label>
                          </center>
                        </div>
                      </div>
                      <div class="row mb-3">
                        <div class="col-md-12">
                          <ul class="ks-cboxtags">
                            <li><input type="checkbox" name="tag[]" id="checkboxOne" value="Kualitas produk baik"><label for="checkboxOne">Kualitas produk baik</label></li>
                            <li><input type="checkbox" name="tag[]" id="checkboxTwo" value="Proses cepat"><label for="checkboxTwo">Proses cepat</label></li>
                            <li><input type="checkbox" name="tag[]" id="checkboxThree" value="Respon admin baik"><label for="checkboxThree">Respon admin baik</label></li>
                            <li><input type="checkbox" name="tag[]" id="checkboxFour" value="Pengiriman barang baik"><label for="checkboxFour">Pengiriman barang baik</label></li>
                            <li><input type="checkbox" name="tag[]" id="checkboxFive" value="Harga produk bersahabat"><label for="checkboxFive">Harga produk bersahabat</label></li>
                          </ul>
                        </div>
                      </div>
                      <div class="row mb-3">
                        <div class="col-md-12">
                          <textarea name="komentar" rows="4" class="form-control" minlength="50" placeholder="Beritahu pengguna lain mengapa Anda menyukai produk ini." required></textarea>
                          <small class="text-secondary">Berikan komentar minimal 50 karakter</small>
                        </div>
                      </div>
                      <br>
                      <button type="submit" name="submit" class="btn btn-sm btn-theme wd-login-btn">Kembalikan Pesanan Anda</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
