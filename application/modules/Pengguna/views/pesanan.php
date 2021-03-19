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
        <div class="p-card">
          <div class="p-card-body">
            <div class="row">
              <div class="col-sm-12">
                <div class="my-account-section__header-title">Pesanan anda</div>
                <div class="my-account-section__header-subtitle">Daftar pesanan anda.</div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                <!-- Bootstrap CSS -->
                <!-- jQuery first, then Bootstrap JS. -->
                <!-- Nav tabs -->

                <ul class="nav nav-tabs nav-fill" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" href="#semua" role="tab" data-toggle="tab">Disewa <?php if ($jml_disewa > 0) { ?><span class="badge badge-warning text-white"><?= $jml_disewa;?></span><?php }?> </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#dibayar" role="tab" data-toggle="tab">Keranjang <?php if ($jml_belver > 0) { ?><span class="badge badge-warning text-white"><?= $jml_belver;?></span><?php }?></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#verif" role="tab" data-toggle="tab">Diproses <?php if ($jml_diproses > 0) { ?><span class="badge badge-warning text-white"><?= $jml_diproses;?></span><?php }?></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#kemas" role="tab" data-toggle="tab">Dikemas <?php if ($jml_dikemas > 0) { ?><span class="badge badge-warning text-white"><?= $jml_dikemas;?></span><?php }?></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#kirim" role="tab" data-toggle="tab">Dikirim <?php if ($jml_dikirim > 0) { ?><span class="badge badge-warning text-white"><?= $jml_dikirim;?></span><?php }?></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#gagal" role="tab" data-toggle="tab">Ditolak & Kembali <?php if ($jml_gagal > 0) { ?><span class="badge badge-warning text-white"><?= $jml_gagal;?></span><?php }?></a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>



        <!-- Tab panes -->
        <div class="tab-content">
          <div role="tabpanel" class="tab-pane active" id="semua">
            <div class="list list-row">
              <?php if ($get_disewa == false) { echo "<div class='p-card mt-10'><center class='card-body p-2'><b>Belum ada pesanan</b></center></div>"; }else{ foreach ($get_disewa as $pesanan) { ?>
                <div class="purchase-list-page__checkout-card-wrapper">
                  <div class="order-card__container">
                    <div class="order-card__content-wrapper">
                      <div class="order-card__content">
                        <div class="order-content__container">
                          <div class="order-content__header">
                            <div class="order-delivery-status__wrapper">
                              <a class="order-content__header__delivery-status" href="<?php echo site_url('Pesanan/'.$pesanan->KODE_TRANSAKSI);?>">
                                <svg enable-background="new 0 0 15 15" viewBox="0 0 15 15" x="0" y="0" class="shopee-svg-icon icon-free-shipping-line">
                                  <g>
                                    <line fill="none" stroke-linejoin="round" stroke-miterlimit="10" x1="8.6" x2="4.2" y1="9.8" y2="9.8"></line>
                                    <circle cx="3" cy="11.2" fill="none" r="2" stroke-miterlimit="10"></circle>
                                    <circle cx="10" cy="11.2" fill="none" r="2" stroke-miterlimit="10"></circle>
                                    <line fill="none" stroke-miterlimit="10" x1="10.5" x2="14.4" y1="7.3" y2="7.3"></line>
                                    <polyline fill="none" points="1.5 9.8 .5 9.8 .5 1.8 10 1.8 10 9.1" stroke-linejoin="round" stroke-miterlimit="10"></polyline>
                                    <polyline fill="none" points="9.9 3.8 14 3.8 14.5 10.2 11.9 10.2" stroke-linejoin="round" stroke-miterlimit="10"></polyline>
                                  </g>
                                </svg>
                                <span class="order-delivery-status__desc">
                                  <?php if ($pesanan->STATUS == 0) {?>
                                    [Sistem] Harap segera membayar paket anda
                                  <?php }elseif ($pesanan->STATUS == 1) { ?>
                                    [Sistem] Menunggu konfirmasi bukti pembayaran dari [admin]
                                  <?php }elseif ($pesanan->STATUS == 3) { ?>
                                    [Sistem] Paket anda sedang dikemas
                                  <?php }elseif ($pesanan->STATUS == 4) { ?>
                                    [Malang Hub] Paket anda sedang dikirim
                                  <?php }elseif ($pesanan->STATUS == 5) { ?>
                                    [Kurir] Paket anda telah diterima [Receiver] dan disewa
                                  <?php }elseif ($pesanan->STATUS == 6) { ?>
                                    [Sistem] Paket sedang diproses pengembalian
                                  <?php }elseif ($pesanan->STATUS == 7) { ?>
                                    [Sistem] Pesanan anda telah selesai
                                  <?php }elseif ($pesanan->STATUS == 99) { ?>
                                    [Sistem] Bukti transfer anda ditolak
                                  <?php }?>
                                </span>
                              </a>
                            </div>
                            <div class="order-content-status">
                              <?php if ($pesanan->STATUS == 0) {?>
                                BELUM DIBAYAR
                              <?php }elseif ($pesanan->STATUS == 1) { ?>
                                MENUNGGU VALIDASI
                              <?php }elseif ($pesanan->STATUS == 3) { ?>
                                DIKEMAS
                              <?php }elseif ($pesanan->STATUS == 4) { ?>
                                DIKIRIM
                              <?php }elseif ($pesanan->STATUS == 5) { ?>
                                DISEWA
                              <?php }elseif ($pesanan->STATUS == 6) { ?>
                                PENGEMBALIAN
                              <?php }elseif ($pesanan->STATUS == 7) { ?>
                                SELESAI
                              <?php }elseif ($pesanan->STATUS == 99) { ?>
                                DITOLAK
                              <?php }?>
                            </div>
                          </div>
                          <div class="order-content__item-list">
                            <a class="order-content__item-wrapper" href="<?php echo site_url('Pesanan/'.$pesanan->KODE_TRANSAKSI);?>">
                              <div class="order-content__item order-content__item--last">
                                <div class="order-content__item__col order-content__item__detail">
                                  <div class="order-content__item__product">
                                    <div class="order-content__item__image">
                                      <div class="shopee-image__wrapper">
                                        <div class="shopee-image__place-holder">
                                          <svg enable-background="new 0 0 15 15" viewBox="0 0 15 15" x="0" y="0" class="shopee-svg-icon icon-loading-image">
                                            <g>
                                              <rect fill="none" height="8" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" width="10" x="1" y="4.5"></rect>
                                              <line fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" x1="1" x2="11" y1="6.5" y2="6.5"></line>
                                              <rect fill="none" height="3" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" width="3" x="11" y="6.5"></rect>
                                              <line fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" x1="1" x2="11" y1="14.5" y2="14.5"></line>
                                              <line fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" x1="6" x2="6" y1=".5" y2="3"></line>
                                              <line fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" x1="3.5" x2="3.5" y1="1" y2="3"></line>
                                              <line fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" x1="8.5" x2="8.5" y1="1" y2="3"></line>
                                            </g>
                                          </svg>
                                        </div>
                                        <?php $foto = $controller->M_pengguna->get_foto($pesanan->KODE_UNIT); if ($foto == null) { ?>
                                          <div class="shopee-image__content" style="background-image: url('<?php echo base_url();?>file/site/produk/product.png');">
                                            <div class="shopee-image__content--blur"> </div>
                                          </div>
                                        <?php }else{ foreach ($foto as $pic) {?>
                                          <div class="shopee-image__content" style="background-image: url('<?php echo base_url();?>file/site/produk/<?= $pic->KODE_UNIT;?>/<?= $pic->SOURCE;?>');">
                                            <div class="shopee-image__content--blur"> </div>
                                          </div>
                                        <?php } }?>
                                      </div>
                                    </div>
                                    <div class="order-content__item__detail-content">
                                      <div class="order-content__item__name"><?= $pesanan->NAMA_PRODUK;?></div>
                                      <div class="order-content__item__quantity">Disewa selama <?= $pesanan->LAMA_SEWA;?> Hari</div>
                                    </div>
                                  </div>
                                </div>
                                <div class="order-content__item__price order-content__item__col order-content__item__col--small order-content__item__col--last">
                                  <div class="order-content__item__price-text text-right">
                                    <div class="shopee-price--original">Total Pesanan</div>
                                    <div class="shopee-price--primary" style="font-size: 20px;">Rp.<?= number_format($pesanan->TOTAL,0,",",".");?></div>
                                  </div>
                                </div>
                              </div>
                            </a>
                          </div>
                        </div>
                      </div>
                      <div class="_39ltn9">
                        <div class="_2IkeiS _1wGF8P"> </div>
                        <div class="_2IkeiS Bm16W5"> </div>
                      </div>
                    </div>
                    <div class="order-card__buttons-container">
                      <div class="purchase-card-buttons__wrapper">
                        <div class="purchase-card-buttons__container">
                          <div class="purchase-card-buttons__show-button-wrapper">
                            <?php if ($pesanan->STATUS == 0) {?>
                              <a href="<?php echo site_url('bayar/'.$pesanan->KODE_TRANSAKSI);?>" class="shopee-button-solid shopee-button-solid--fill shopee-button-solid--primary text-none">
                                <span class="purchase-card-buttons__button-content"> Upload Bukti Transfer</span>
                              </a>
                            <?php }elseif ($pesanan->STATUS == 1) { ?>
                              <a href="https://api.whatsapp.com/send?phone=085785111746&text=Hai20%permintaan20%saya20%apakah20%sudah20%divalidasi?" target="_blank" class="shopee-button-solid shopee-button-solid--fill shopee-button-solid--primary text-none">
                                <span class="purchase-card-buttons__button-content"> Hubungi Admin</span>
                              </a>
                            <?php }elseif ($pesanan->STATUS == 5) { ?>
                              <a href="<?php echo site_url('Pengembalian/'.$pesanan->KODE_TRANSAKSI);?>" class="shopee-button-solid shopee-button-solid--fill shopee-button-solid--primary text-none">
                                <span class="purchase-card-buttons__button-content"> Pengembalian Pesanan</span>
                              </a>
                            <?php }elseif ($pesanan->STATUS == 7) { ?>
                              <a href="<?php echo site_url('Produk/'.$pesanan->KODE_UNIT);?>" class="shopee-button-solid shopee-button-solid--fill shopee-button-solid--primary text-none">
                                <span class="purchase-card-buttons__button-content"> Sewa Lagi</span>
                              </a>
                            <?php }elseif ($pesanan->STATUS == 99) { ?>
                              <a href="<?php echo site_url('UbahBukti/'.$pesanan->KODE_TRANSAKSI);?>" class="shopee-button-solid shopee-button-solid--fill shopee-button-solid--primary text-none">
                                <span class="purchase-card-buttons__button-content"> Ubah Bukti Transfer</span>
                              </a>
                            <?php }?>
                          </div>
                          <div class="purchase-card-buttons__show-button-wrapper">
                            <a href="<?php echo site_url('Pesanan/'.$pesanan->KODE_TRANSAKSI);?>" class="shopee-button-outline shopee-button-outline--fill shopee-button-outline--primary text-none">
                              <span class="purchase-card-buttons__button-content"> Tampilkan Rincian Pesanan </span>
                            </a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              <?php }}?>
            </div>
          </div>
          <div role="tabpanel" class="tab-pane" id="dibayar">
            <div class="list list-row">
              <?php if ($get_belumbayar == false) { echo "<div class='p-card mt-10'><center class='card-body p-2'><b>Belum ada pesanan</b></center></div>"; }else{ foreach ($get_belumbayar as $dibayar) { ?>
                <div class="purchase-list-page__checkout-card-wrapper">
                  <div class="order-card__container">
                    <div class="order-card__content-wrapper">
                      <div class="order-card__content">
                        <div class="order-content__container">
                          <div class="order-content__header">
                            <div class="order-delivery-status__wrapper">
                              <a class="order-content__header__delivery-status" href="<?php echo site_url('Pesanan/'.$dibayar->KODE_TRANSAKSI);?>">
                                <svg enable-background="new 0 0 15 15" viewBox="0 0 15 15" x="0" y="0" class="shopee-svg-icon icon-free-shipping-line">
                                  <g>
                                    <line fill="none" stroke-linejoin="round" stroke-miterlimit="10" x1="8.6" x2="4.2" y1="9.8" y2="9.8"></line>
                                    <circle cx="3" cy="11.2" fill="none" r="2" stroke-miterlimit="10"></circle>
                                    <circle cx="10" cy="11.2" fill="none" r="2" stroke-miterlimit="10"></circle>
                                    <line fill="none" stroke-miterlimit="10" x1="10.5" x2="14.4" y1="7.3" y2="7.3"></line>
                                    <polyline fill="none" points="1.5 9.8 .5 9.8 .5 1.8 10 1.8 10 9.1" stroke-linejoin="round" stroke-miterlimit="10"></polyline>
                                    <polyline fill="none" points="9.9 3.8 14 3.8 14.5 10.2 11.9 10.2" stroke-linejoin="round" stroke-miterlimit="10"></polyline>
                                  </g>
                                </svg>
                                <span class="order-delivery-status__desc">
                                  <?php if ($dibayar->STATUS == 0) {?>
                                    [Sistem] Harap segera membayar paket anda
                                  <?php }elseif ($dibayar->STATUS == 1) { ?>
                                    [Sistem] Menunggu konfirmasi bukti pembayaran dari [admin]
                                  <?php }elseif ($dibayar->STATUS == 3) { ?>
                                    [Sistem] Paket anda sedang dikemas
                                  <?php }elseif ($dibayar->STATUS == 4) { ?>
                                    [Malang Hub] Paket anda sedang dikirim
                                  <?php }elseif ($dibayar->STATUS == 5) { ?>
                                    [Kurir] Paket anda telah diterima [Receiver] dan disewa
                                  <?php }elseif ($dibayar->STATUS == 6) { ?>
                                    [Sistem] Paket sedang diproses pengembalian
                                  <?php }elseif ($dibayar->STATUS == 7) { ?>
                                    [Sistem] dibayar anda telah selesai
                                  <?php }elseif ($dibayar->STATUS == 99) { ?>
                                    [Sistem] Bukti transfer anda ditolak
                                  <?php }?>
                                </span>
                              </a>
                            </div>
                            <div class="order-content-status">
                              <?php if ($dibayar->STATUS == 0) {?>
                                BELUM DIBAYAR
                              <?php }elseif ($dibayar->STATUS == 1) { ?>
                                MENUNGGU VALIDASI
                              <?php }elseif ($dibayar->STATUS == 3) { ?>
                                DIKEMAS
                              <?php }elseif ($dibayar->STATUS == 4) { ?>
                                DIKIRIM
                              <?php }elseif ($dibayar->STATUS == 5) { ?>
                                DISEWA
                              <?php }elseif ($dibayar->STATUS == 6) { ?>
                                PENGEMBALIAN
                              <?php }elseif ($dibayar->STATUS == 7) { ?>
                                SELESAI
                              <?php }elseif ($dibayar->STATUS == 99) { ?>
                                DITOLAK
                              <?php }?>
                            </div>
                          </div>
                          <div class="order-content__item-list">
                            <a class="order-content__item-wrapper" href="<?php echo site_url('Pesanan/'.$dibayar->KODE_TRANSAKSI);?>">
                              <div class="order-content__item order-content__item--last">
                                <div class="order-content__item__col order-content__item__detail">
                                  <div class="order-content__item__product">
                                    <div class="order-content__item__image">
                                      <div class="shopee-image__wrapper">
                                        <div class="shopee-image__place-holder">
                                          <svg enable-background="new 0 0 15 15" viewBox="0 0 15 15" x="0" y="0" class="shopee-svg-icon icon-loading-image">
                                            <g>
                                              <rect fill="none" height="8" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" width="10" x="1" y="4.5"></rect>
                                              <line fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" x1="1" x2="11" y1="6.5" y2="6.5"></line>
                                              <rect fill="none" height="3" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" width="3" x="11" y="6.5"></rect>
                                              <line fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" x1="1" x2="11" y1="14.5" y2="14.5"></line>
                                              <line fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" x1="6" x2="6" y1=".5" y2="3"></line>
                                              <line fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" x1="3.5" x2="3.5" y1="1" y2="3"></line>
                                              <line fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" x1="8.5" x2="8.5" y1="1" y2="3"></line>
                                            </g>
                                          </svg>
                                        </div>
                                        <?php $foto = $controller->M_pengguna->get_foto($dibayar->KODE_UNIT); if ($foto == null) { ?>
                                          <div class="shopee-image__content" style="background-image: url('<?php echo base_url();?>file/site/produk/product.png');">
                                            <div class="shopee-image__content--blur"> </div>
                                          </div>
                                        <?php }else{ foreach ($foto as $pic) {?>
                                          <div class="shopee-image__content" style="background-image: url('<?php echo base_url();?>file/site/produk/<?= $pic->KODE_UNIT;?>/<?= $pic->SOURCE;?>');">
                                            <div class="shopee-image__content--blur"> </div>
                                          </div>
                                        <?php } }?>
                                      </div>
                                    </div>
                                    <div class="order-content__item__detail-content">
                                      <div class="order-content__item__name"><?= $dibayar->NAMA_PRODUK;?></div>
                                      <div class="order-content__item__quantity">Disewa selama <?= $dibayar->LAMA_SEWA;?> Hari</div>
                                    </div>
                                  </div>
                                </div>
                                <div class="order-content__item__price order-content__item__col order-content__item__col--small order-content__item__col--last">
                                  <div class="order-content__item__price-text text-right">
                                    <div class="shopee-price--original">Total dibayar</div>
                                    <div class="shopee-price--primary" style="font-size: 20px;">Rp.<?= number_format($dibayar->TOTAL,0,",",".");?></div>
                                  </div>
                                </div>
                              </div>
                            </a>
                          </div>
                        </div>
                      </div>
                      <div class="_39ltn9">
                        <div class="_2IkeiS _1wGF8P"> </div>
                        <div class="_2IkeiS Bm16W5"> </div>
                      </div>
                    </div>
                    <div class="order-card__buttons-container">
                      <div class="purchase-card-buttons__wrapper">
                        <div class="purchase-card-buttons__container">
                          <div class="purchase-card-buttons__show-button-wrapper">
                            <?php if ($dibayar->STATUS == 0) {?>
                              <a href="<?php echo site_url('bayar/'.$dibayar->KODE_TRANSAKSI);?>" class="shopee-button-solid shopee-button-solid--fill shopee-button-solid--primary text-none">
                                <span class="purchase-card-buttons__button-content"> Upload Bukti Transfer</span>
                              </a>
                            <?php }elseif ($dibayar->STATUS == 1) { ?>
                              <a href="https://api.whatsapp.com/send?phone=085785111746&text=Hai20%permintaan20%saya20%apakah20%sudah20%divalidasi?" target="_blank" class="shopee-button-solid shopee-button-solid--fill shopee-button-solid--primary text-none">
                                <span class="purchase-card-buttons__button-content"> Hubungi Admin</span>
                              </a>
                            <?php }elseif ($dibayar->STATUS == 5) { ?>
                              <a href="<?php echo site_url('Pengembalian/'.$dibayar->KODE_TRANSAKSI);?>" class="shopee-button-solid shopee-button-solid--fill shopee-button-solid--primary text-none">
                                <span class="purchase-card-buttons__button-content"> Pengembalian dibayar</span>
                              </a>
                            <?php }elseif ($dibayar->STATUS == 7) { ?>
                              <a href="<?php echo site_url('Produk/'.$dibayar->KODE_UNIT);?>" class="shopee-button-solid shopee-button-solid--fill shopee-button-solid--primary text-none">
                                <span class="purchase-card-buttons__button-content"> Sewa Lagi</span>
                              </a>
                            <?php }elseif ($dibayar->STATUS == 99) { ?>
                              <a href="<?php echo site_url('UbahBukti/'.$dibayar->KODE_TRANSAKSI);?>" class="shopee-button-solid shopee-button-solid--fill shopee-button-solid--primary text-none">
                                <span class="purchase-card-buttons__button-content"> Ubah Bukti Transfer</span>
                              </a>
                            <?php }?>
                          </div>
                          <div class="purchase-card-buttons__show-button-wrapper">
                            <a href="<?php echo site_url('Pesanan/'.$dibayar->KODE_TRANSAKSI);?>" class="shopee-button-outline shopee-button-outline--fill shopee-button-outline--primary text-none">
                              <span class="purchase-card-buttons__button-content"> Tampilkan Rincian Pesanan </span>
                            </a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              <?php }}?>
            </div>
          </div>
          <div role="tabpanel" class="tab-pane" id="verif">
            <div class="list list-row">
              <?php if ($get_belumver == false) { echo "<div class='p-card mt-10'><center class='card-body p-2'><b>Belum ada pesanan</b></center></div>"; }else{ foreach ($get_belumver as $verif) { ?>
                <div class="purchase-list-page__checkout-card-wrapper">
                  <div class="order-card__container">
                    <div class="order-card__content-wrapper">
                      <div class="order-card__content">
                        <div class="order-content__container">
                          <div class="order-content__header">
                            <div class="order-delivery-status__wrapper">
                              <a class="order-content__header__delivery-status" href="<?php echo site_url('Pesanan/'.$verif->KODE_TRANSAKSI);?>">
                                <svg enable-background="new 0 0 15 15" viewBox="0 0 15 15" x="0" y="0" class="shopee-svg-icon icon-free-shipping-line">
                                  <g>
                                    <line fill="none" stroke-linejoin="round" stroke-miterlimit="10" x1="8.6" x2="4.2" y1="9.8" y2="9.8"></line>
                                    <circle cx="3" cy="11.2" fill="none" r="2" stroke-miterlimit="10"></circle>
                                    <circle cx="10" cy="11.2" fill="none" r="2" stroke-miterlimit="10"></circle>
                                    <line fill="none" stroke-miterlimit="10" x1="10.5" x2="14.4" y1="7.3" y2="7.3"></line>
                                    <polyline fill="none" points="1.5 9.8 .5 9.8 .5 1.8 10 1.8 10 9.1" stroke-linejoin="round" stroke-miterlimit="10"></polyline>
                                    <polyline fill="none" points="9.9 3.8 14 3.8 14.5 10.2 11.9 10.2" stroke-linejoin="round" stroke-miterlimit="10"></polyline>
                                  </g>
                                </svg>
                                <span class="order-delivery-status__desc">
                                  <?php if ($verif->STATUS == 0) {?>
                                    [Sistem] Harap segera membayar paket anda
                                  <?php }elseif ($verif->STATUS == 1) { ?>
                                    [Sistem] Menunggu konfirmasi bukti pembayaran dari [admin]
                                  <?php }elseif ($verif->STATUS == 3) { ?>
                                    [Sistem] Paket anda sedang dikemas
                                  <?php }elseif ($verif->STATUS == 4) { ?>
                                    [Malang Hub] Paket anda sedang dikirim
                                  <?php }elseif ($verif->STATUS == 5) { ?>
                                    [Kurir] Paket anda telah diterima [Receiver] dan disewa
                                  <?php }elseif ($verif->STATUS == 6) { ?>
                                    [Sistem] Paket sedang diproses pengembalian
                                  <?php }elseif ($verif->STATUS == 7) { ?>
                                    [Sistem] verif anda telah selesai
                                  <?php }elseif ($verif->STATUS == 99) { ?>
                                    [Sistem] Bukti transfer anda ditolak
                                  <?php }?>
                                </span>
                              </a>
                            </div>
                            <div class="order-content-status">
                              <?php if ($verif->STATUS == 0) {?>
                                BELUM DIBAYAR
                              <?php }elseif ($verif->STATUS == 1) { ?>
                                MENUNGGU VALIDASI
                              <?php }elseif ($verif->STATUS == 3) { ?>
                                DIKEMAS
                              <?php }elseif ($verif->STATUS == 4) { ?>
                                DIKIRIM
                              <?php }elseif ($verif->STATUS == 5) { ?>
                                DISEWA
                              <?php }elseif ($verif->STATUS == 6) { ?>
                                PENGEMBALIAN
                              <?php }elseif ($verif->STATUS == 7) { ?>
                                SELESAI
                              <?php }elseif ($verif->STATUS == 99) { ?>
                                DITOLAK
                              <?php }?>
                            </div>
                          </div>
                          <div class="order-content__item-list">
                            <a class="order-content__item-wrapper" href="<?php echo site_url('Pesanan/'.$verif->KODE_TRANSAKSI);?>">
                              <div class="order-content__item order-content__item--last">
                                <div class="order-content__item__col order-content__item__detail">
                                  <div class="order-content__item__product">
                                    <div class="order-content__item__image">
                                      <div class="shopee-image__wrapper">
                                        <div class="shopee-image__place-holder">
                                          <svg enable-background="new 0 0 15 15" viewBox="0 0 15 15" x="0" y="0" class="shopee-svg-icon icon-loading-image">
                                            <g>
                                              <rect fill="none" height="8" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" width="10" x="1" y="4.5"></rect>
                                              <line fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" x1="1" x2="11" y1="6.5" y2="6.5"></line>
                                              <rect fill="none" height="3" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" width="3" x="11" y="6.5"></rect>
                                              <line fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" x1="1" x2="11" y1="14.5" y2="14.5"></line>
                                              <line fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" x1="6" x2="6" y1=".5" y2="3"></line>
                                              <line fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" x1="3.5" x2="3.5" y1="1" y2="3"></line>
                                              <line fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" x1="8.5" x2="8.5" y1="1" y2="3"></line>
                                            </g>
                                          </svg>
                                        </div>
                                        <?php $foto = $controller->M_pengguna->get_foto($verif->KODE_UNIT); if ($foto == null) { ?>
                                          <div class="shopee-image__content" style="background-image: url('<?php echo base_url();?>file/site/produk/product.png');">
                                            <div class="shopee-image__content--blur"> </div>
                                          </div>
                                        <?php }else{ foreach ($foto as $pic) {?>
                                          <div class="shopee-image__content" style="background-image: url('<?php echo base_url();?>file/site/produk/<?= $pic->KODE_UNIT;?>/<?= $pic->SOURCE;?>');">
                                            <div class="shopee-image__content--blur"> </div>
                                          </div>
                                        <?php } }?>
                                      </div>
                                    </div>
                                    <div class="order-content__item__detail-content">
                                      <div class="order-content__item__name"><?= $verif->NAMA_PRODUK;?></div>
                                      <div class="order-content__item__quantity">Disewa selama <?= $verif->LAMA_SEWA;?> Hari</div>
                                    </div>
                                  </div>
                                </div>
                                <div class="order-content__item__price order-content__item__col order-content__item__col--small order-content__item__col--last">
                                  <div class="order-content__item__price-text text-right">
                                    <div class="shopee-price--original">Total verif</div>
                                    <div class="shopee-price--primary" style="font-size: 20px;">Rp.<?= number_format($verif->TOTAL,0,",",".");?></div>
                                  </div>
                                </div>
                              </div>
                            </a>
                          </div>
                        </div>
                      </div>
                      <div class="_39ltn9">
                        <div class="_2IkeiS _1wGF8P"> </div>
                        <div class="_2IkeiS Bm16W5"> </div>
                      </div>
                    </div>
                    <div class="order-card__buttons-container">
                      <div class="purchase-card-buttons__wrapper">
                        <div class="purchase-card-buttons__container">
                          <div class="purchase-card-buttons__show-button-wrapper">
                            <?php if ($verif->STATUS == 0) {?>
                              <a href="<?php echo site_url('bayar/'.$verif->KODE_TRANSAKSI);?>" class="shopee-button-solid shopee-button-solid--fill shopee-button-solid--primary text-none">
                                <span class="purchase-card-buttons__button-content"> Upload Bukti Transfer</span>
                              </a>
                            <?php }elseif ($verif->STATUS == 1) { ?>
                              <a href="https://api.whatsapp.com/send?phone=085785111746&text=Hai20%permintaan20%saya20%apakah20%sudah20%divalidasi?" target="_blank" class="shopee-button-solid shopee-button-solid--fill shopee-button-solid--primary text-none">
                                <span class="purchase-card-buttons__button-content"> Hubungi Admin</span>
                              </a>
                            <?php }elseif ($verif->STATUS == 5) { ?>
                              <a href="<?php echo site_url('Pengembalian/'.$verif->KODE_TRANSAKSI);?>" class="shopee-button-solid shopee-button-solid--fill shopee-button-solid--primary text-none">
                                <span class="purchase-card-buttons__button-content"> Pengembalian verif</span>
                              </a>
                            <?php }elseif ($verif->STATUS == 7) { ?>
                              <a href="<?php echo site_url('Produk/'.$verif->KODE_UNIT);?>" class="shopee-button-solid shopee-button-solid--fill shopee-button-solid--primary text-none">
                                <span class="purchase-card-buttons__button-content"> Sewa Lagi</span>
                              </a>
                            <?php }elseif ($verif->STATUS == 99) { ?>
                              <a href="<?php echo site_url('UbahBukti/'.$verif->KODE_TRANSAKSI);?>" class="shopee-button-solid shopee-button-solid--fill shopee-button-solid--primary text-none">
                                <span class="purchase-card-buttons__button-content"> Ubah Bukti Transfer</span>
                              </a>
                            <?php }?>
                          </div>
                          <div class="purchase-card-buttons__show-button-wrapper">
                            <a href="<?php echo site_url('Pesanan/'.$verif->KODE_TRANSAKSI);?>" class="shopee-button-outline shopee-button-outline--fill shopee-button-outline--primary text-none">
                              <span class="purchase-card-buttons__button-content"> Tampilkan Rincian Pesanan </span>
                            </a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              <?php }}?>
            </div>
          </div>
          <div role="tabpanel" class="tab-pane" id="kemas">
            <div class="list list-row">
              <?php if ($get_kemas == false) { echo "<div class='p-card mt-10'><center class='card-body p-2'><b>Belum ada pesanan</b></center></div>"; }else{ foreach ($get_kemas as $dikemas) { ?>
                <div class="purchase-list-page__checkout-card-wrapper">
                  <div class="order-card__container">
                    <div class="order-card__content-wrapper">
                      <div class="order-card__content">
                        <div class="order-content__container">
                          <div class="order-content__header">
                            <div class="order-delivery-status__wrapper">
                              <a class="order-content__header__delivery-status" href="<?php echo site_url('Pesanan/'.$dikemas->KODE_TRANSAKSI);?>">
                                <svg enable-background="new 0 0 15 15" viewBox="0 0 15 15" x="0" y="0" class="shopee-svg-icon icon-free-shipping-line">
                                  <g>
                                    <line fill="none" stroke-linejoin="round" stroke-miterlimit="10" x1="8.6" x2="4.2" y1="9.8" y2="9.8"></line>
                                    <circle cx="3" cy="11.2" fill="none" r="2" stroke-miterlimit="10"></circle>
                                    <circle cx="10" cy="11.2" fill="none" r="2" stroke-miterlimit="10"></circle>
                                    <line fill="none" stroke-miterlimit="10" x1="10.5" x2="14.4" y1="7.3" y2="7.3"></line>
                                    <polyline fill="none" points="1.5 9.8 .5 9.8 .5 1.8 10 1.8 10 9.1" stroke-linejoin="round" stroke-miterlimit="10"></polyline>
                                    <polyline fill="none" points="9.9 3.8 14 3.8 14.5 10.2 11.9 10.2" stroke-linejoin="round" stroke-miterlimit="10"></polyline>
                                  </g>
                                </svg>
                                <span class="order-delivery-status__desc">
                                  <?php if ($dikemas->STATUS == 0) {?>
                                    [Sistem] Harap segera membayar paket anda
                                  <?php }elseif ($dikemas->STATUS == 1) { ?>
                                    [Sistem] Menunggu konfirmasi bukti pembayaran dari [admin]
                                  <?php }elseif ($dikemas->STATUS == 3) { ?>
                                    [Sistem] Paket anda sedang dikemas
                                  <?php }elseif ($dikemas->STATUS == 4) { ?>
                                    [Malang Hub] Paket anda sedang dikirim
                                  <?php }elseif ($dikemas->STATUS == 5) { ?>
                                    [Kurir] Paket anda telah diterima [Receiver] dan disewa
                                  <?php }elseif ($dikemas->STATUS == 6) { ?>
                                    [Sistem] Paket sedang diproses pengembalian
                                  <?php }elseif ($dikemas->STATUS == 7) { ?>
                                    [Sistem] dikemas anda telah selesai
                                  <?php }elseif ($dikemas->STATUS == 99) { ?>
                                    [Sistem] Bukti transfer anda ditolak
                                  <?php }?>
                                </span>
                              </a>
                            </div>
                            <div class="order-content-status">
                              <?php if ($dikemas->STATUS == 0) {?>
                                BELUM DIBAYAR
                              <?php }elseif ($dikemas->STATUS == 1) { ?>
                                MENUNGGU VALIDASI
                              <?php }elseif ($dikemas->STATUS == 3) { ?>
                                DIKEMAS
                              <?php }elseif ($dikemas->STATUS == 4) { ?>
                                DIKIRIM
                              <?php }elseif ($dikemas->STATUS == 5) { ?>
                                DISEWA
                              <?php }elseif ($dikemas->STATUS == 6) { ?>
                                PENGEMBALIAN
                              <?php }elseif ($dikemas->STATUS == 7) { ?>
                                SELESAI
                              <?php }elseif ($dikemas->STATUS == 99) { ?>
                                DITOLAK
                              <?php }?>
                            </div>
                          </div>
                          <div class="order-content__item-list">
                            <a class="order-content__item-wrapper" href="<?php echo site_url('Pesanan/'.$dikemas->KODE_TRANSAKSI);?>">
                              <div class="order-content__item order-content__item--last">
                                <div class="order-content__item__col order-content__item__detail">
                                  <div class="order-content__item__product">
                                    <div class="order-content__item__image">
                                      <div class="shopee-image__wrapper">
                                        <div class="shopee-image__place-holder">
                                          <svg enable-background="new 0 0 15 15" viewBox="0 0 15 15" x="0" y="0" class="shopee-svg-icon icon-loading-image">
                                            <g>
                                              <rect fill="none" height="8" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" width="10" x="1" y="4.5"></rect>
                                              <line fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" x1="1" x2="11" y1="6.5" y2="6.5"></line>
                                              <rect fill="none" height="3" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" width="3" x="11" y="6.5"></rect>
                                              <line fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" x1="1" x2="11" y1="14.5" y2="14.5"></line>
                                              <line fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" x1="6" x2="6" y1=".5" y2="3"></line>
                                              <line fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" x1="3.5" x2="3.5" y1="1" y2="3"></line>
                                              <line fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" x1="8.5" x2="8.5" y1="1" y2="3"></line>
                                            </g>
                                          </svg>
                                        </div>
                                        <?php $foto = $controller->M_pengguna->get_foto($dikemas->KODE_UNIT); if ($foto == null) { ?>
                                          <div class="shopee-image__content" style="background-image: url('<?php echo base_url();?>file/site/produk/product.png');">
                                            <div class="shopee-image__content--blur"> </div>
                                          </div>
                                        <?php }else{ foreach ($foto as $pic) {?>
                                          <div class="shopee-image__content" style="background-image: url('<?php echo base_url();?>file/site/produk/<?= $pic->KODE_UNIT;?>/<?= $pic->SOURCE;?>');">
                                            <div class="shopee-image__content--blur"> </div>
                                          </div>
                                        <?php } }?>
                                      </div>
                                    </div>
                                    <div class="order-content__item__detail-content">
                                      <div class="order-content__item__name"><?= $dikemas->NAMA_PRODUK;?></div>
                                      <div class="order-content__item__quantity">Disewa selama <?= $dikemas->LAMA_SEWA;?> Hari</div>
                                    </div>
                                  </div>
                                </div>
                                <div class="order-content__item__price order-content__item__col order-content__item__col--small order-content__item__col--last">
                                  <div class="order-content__item__price-text text-right">
                                    <div class="shopee-price--original">Total dikemas</div>
                                    <div class="shopee-price--primary" style="font-size: 20px;">Rp.<?= number_format($dikemas->TOTAL,0,",",".");?></div>
                                  </div>
                                </div>
                              </div>
                            </a>
                          </div>
                        </div>
                      </div>
                      <div class="_39ltn9">
                        <div class="_2IkeiS _1wGF8P"> </div>
                        <div class="_2IkeiS Bm16W5"> </div>
                      </div>
                    </div>
                    <div class="order-card__buttons-container">
                      <div class="purchase-card-buttons__wrapper">
                        <div class="purchase-card-buttons__container">
                          <div class="purchase-card-buttons__show-button-wrapper">
                            <?php if ($dikemas->STATUS == 0) {?>
                              <a href="<?php echo site_url('bayar/'.$dikemas->KODE_TRANSAKSI);?>" class="shopee-button-solid shopee-button-solid--fill shopee-button-solid--primary text-none">
                                <span class="purchase-card-buttons__button-content"> Upload Bukti Transfer</span>
                              </a>
                            <?php }elseif ($dikemas->STATUS == 1) { ?>
                              <a href="https://api.whatsapp.com/send?phone=085785111746&text=Hai20%permintaan20%saya20%apakah20%sudah20%divalidasi?" target="_blank" class="shopee-button-solid shopee-button-solid--fill shopee-button-solid--primary text-none">
                                <span class="purchase-card-buttons__button-content"> Hubungi Admin</span>
                              </a>
                            <?php }elseif ($dikemas->STATUS == 5) { ?>
                              <a href="<?php echo site_url('Pengembalian/'.$dikemas->KODE_TRANSAKSI);?>" class="shopee-button-solid shopee-button-solid--fill shopee-button-solid--primary text-none">
                                <span class="purchase-card-buttons__button-content"> Pengembalian dikemas</span>
                              </a>
                            <?php }elseif ($dikemas->STATUS == 7) { ?>
                              <a href="<?php echo site_url('Produk/'.$dikemas->KODE_UNIT);?>" class="shopee-button-solid shopee-button-solid--fill shopee-button-solid--primary text-none">
                                <span class="purchase-card-buttons__button-content"> Sewa Lagi</span>
                              </a>
                            <?php }elseif ($dikemas->STATUS == 99) { ?>
                              <a href="<?php echo site_url('UbahBukti/'.$dikemas->KODE_TRANSAKSI);?>" class="shopee-button-solid shopee-button-solid--fill shopee-button-solid--primary text-none">
                                <span class="purchase-card-buttons__button-content"> Ubah Bukti Transfer</span>
                              </a>
                            <?php }?>
                          </div>
                          <div class="purchase-card-buttons__show-button-wrapper">
                            <a href="<?php echo site_url('Pesanan/'.$dikemas->KODE_TRANSAKSI);?>" class="shopee-button-outline shopee-button-outline--fill shopee-button-outline--primary text-none">
                              <span class="purchase-card-buttons__button-content"> Tampilkan Rincian Pesanan </span>
                            </a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              <?php }}?>
            </div>
          </div>
          <div role="tabpanel" class="tab-pane" id="kirim">
            <div class="list list-row">
              <?php if ($get_pengiriman == false) { echo "<div class='p-card mt-10'><center class='card-body p-2'><b>Belum ada pesanan</b></center></div>"; }else{ foreach ($get_pengiriman as $kirim) { ?>
                <div class="purchase-list-page__checkout-card-wrapper">
                  <div class="order-card__container">
                    <div class="order-card__content-wrapper">
                      <div class="order-card__content">
                        <div class="order-content__container">
                          <div class="order-content__header">
                            <div class="order-delivery-status__wrapper">
                              <a class="order-content__header__delivery-status" href="<?php echo site_url('Pesanan/'.$kirim->KODE_TRANSAKSI);?>">
                                <svg enable-background="new 0 0 15 15" viewBox="0 0 15 15" x="0" y="0" class="shopee-svg-icon icon-free-shipping-line">
                                  <g>
                                    <line fill="none" stroke-linejoin="round" stroke-miterlimit="10" x1="8.6" x2="4.2" y1="9.8" y2="9.8"></line>
                                    <circle cx="3" cy="11.2" fill="none" r="2" stroke-miterlimit="10"></circle>
                                    <circle cx="10" cy="11.2" fill="none" r="2" stroke-miterlimit="10"></circle>
                                    <line fill="none" stroke-miterlimit="10" x1="10.5" x2="14.4" y1="7.3" y2="7.3"></line>
                                    <polyline fill="none" points="1.5 9.8 .5 9.8 .5 1.8 10 1.8 10 9.1" stroke-linejoin="round" stroke-miterlimit="10"></polyline>
                                    <polyline fill="none" points="9.9 3.8 14 3.8 14.5 10.2 11.9 10.2" stroke-linejoin="round" stroke-miterlimit="10"></polyline>
                                  </g>
                                </svg>
                                <span class="order-delivery-status__desc">
                                  <?php if ($kirim->STATUS == 0) {?>
                                    [Sistem] Harap segera membayar paket anda
                                  <?php }elseif ($kirim->STATUS == 1) { ?>
                                    [Sistem] Menunggu konfirmasi bukti pembayaran dari [admin]
                                  <?php }elseif ($kirim->STATUS == 3) { ?>
                                    [Sistem] Paket anda sedang dikemas
                                  <?php }elseif ($kirim->STATUS == 4) { ?>
                                    [Malang Hub] Paket anda sedang dikirim
                                  <?php }elseif ($kirim->STATUS == 5) { ?>
                                    [Kurir] Paket anda telah diterima [Receiver] dan disewa
                                  <?php }elseif ($kirim->STATUS == 6) { ?>
                                    [Sistem] Paket sedang diproses pengembalian
                                  <?php }elseif ($kirim->STATUS == 7) { ?>
                                    [Sistem] kirim anda telah selesai
                                  <?php }elseif ($kirim->STATUS == 99) { ?>
                                    [Sistem] Bukti transfer anda ditolak
                                  <?php }?>
                                </span>
                              </a>
                            </div>
                            <div class="order-content-status">
                              <?php if ($kirim->STATUS == 0) {?>
                                BELUM DIBAYAR
                              <?php }elseif ($kirim->STATUS == 1) { ?>
                                MENUNGGU VALIDASI
                              <?php }elseif ($kirim->STATUS == 3) { ?>
                                DIKEMAS
                              <?php }elseif ($kirim->STATUS == 4) { ?>
                                DIKIRIM
                              <?php }elseif ($kirim->STATUS == 5) { ?>
                                DISEWA
                              <?php }elseif ($kirim->STATUS == 6) { ?>
                                PENGEMBALIAN
                              <?php }elseif ($kirim->STATUS == 7) { ?>
                                SELESAI
                              <?php }elseif ($kirim->STATUS == 99) { ?>
                                DITOLAK
                              <?php }?>
                            </div>
                          </div>
                          <div class="order-content__item-list">
                            <a class="order-content__item-wrapper" href="<?php echo site_url('Pesanan/'.$kirim->KODE_TRANSAKSI);?>">
                              <div class="order-content__item order-content__item--last">
                                <div class="order-content__item__col order-content__item__detail">
                                  <div class="order-content__item__product">
                                    <div class="order-content__item__image">
                                      <div class="shopee-image__wrapper">
                                        <div class="shopee-image__place-holder">
                                          <svg enable-background="new 0 0 15 15" viewBox="0 0 15 15" x="0" y="0" class="shopee-svg-icon icon-loading-image">
                                            <g>
                                              <rect fill="none" height="8" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" width="10" x="1" y="4.5"></rect>
                                              <line fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" x1="1" x2="11" y1="6.5" y2="6.5"></line>
                                              <rect fill="none" height="3" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" width="3" x="11" y="6.5"></rect>
                                              <line fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" x1="1" x2="11" y1="14.5" y2="14.5"></line>
                                              <line fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" x1="6" x2="6" y1=".5" y2="3"></line>
                                              <line fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" x1="3.5" x2="3.5" y1="1" y2="3"></line>
                                              <line fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" x1="8.5" x2="8.5" y1="1" y2="3"></line>
                                            </g>
                                          </svg>
                                        </div>
                                        <?php $foto = $controller->M_pengguna->get_foto($kirim->KODE_UNIT); if ($foto == null) { ?>
                                          <div class="shopee-image__content" style="background-image: url('<?php echo base_url();?>file/site/produk/product.png');">
                                            <div class="shopee-image__content--blur"> </div>
                                          </div>
                                        <?php }else{ foreach ($foto as $pic) {?>
                                          <div class="shopee-image__content" style="background-image: url('<?php echo base_url();?>file/site/produk/<?= $pic->KODE_UNIT;?>/<?= $pic->SOURCE;?>');">
                                            <div class="shopee-image__content--blur"> </div>
                                          </div>
                                        <?php } }?>
                                      </div>
                                    </div>
                                    <div class="order-content__item__detail-content">
                                      <div class="order-content__item__name"><?= $kirim->NAMA_PRODUK;?></div>
                                      <div class="order-content__item__quantity">Disewa selama <?= $kirim->LAMA_SEWA;?> Hari</div>
                                    </div>
                                  </div>
                                </div>
                                <div class="order-content__item__price order-content__item__col order-content__item__col--small order-content__item__col--last">
                                  <div class="order-content__item__price-text text-right">
                                    <div class="shopee-price--original">Total kirim</div>
                                    <div class="shopee-price--primary" style="font-size: 20px;">Rp.<?= number_format($kirim->TOTAL,0,",",".");?></div>
                                  </div>
                                </div>
                              </div>
                            </a>
                          </div>
                        </div>
                      </div>
                      <div class="_39ltn9">
                        <div class="_2IkeiS _1wGF8P"> </div>
                        <div class="_2IkeiS Bm16W5"> </div>
                      </div>
                    </div>
                    <div class="order-card__buttons-container">
                      <div class="purchase-card-buttons__wrapper">
                        <div class="purchase-card-buttons__container">
                          <div class="purchase-card-buttons__show-button-wrapper">
                            <?php if ($kirim->STATUS == 0) {?>
                              <a href="<?php echo site_url('bayar/'.$kirim->KODE_TRANSAKSI);?>" class="shopee-button-solid shopee-button-solid--fill shopee-button-solid--primary text-none">
                                <span class="purchase-card-buttons__button-content"> Upload Bukti Transfer</span>
                              </a>
                            <?php }elseif ($kirim->STATUS == 1) { ?>
                              <a href="https://api.whatsapp.com/send?phone=085785111746&text=Hai20%permintaan20%saya20%apakah20%sudah20%divalidasi?" target="_blank" class="shopee-button-solid shopee-button-solid--fill shopee-button-solid--primary text-none">
                                <span class="purchase-card-buttons__button-content"> Hubungi Admin</span>
                              </a>
                            <?php }elseif ($kirim->STATUS == 4) { ?>
                              <button data-toggle="modal" data-target="#diterima<?= $kirim->KODE_TRANSAKSI;?>" class="shopee-button-solid shopee-button-solid--fill shopee-button-solid--primary text-none">
                                <span class="purchase-card-buttons__button-content"> Pesanan Diterima</span>
                              </button>
                            <?php }elseif ($kirim->STATUS == 5) { ?>
                              <a href="<?php echo site_url('Pengembalian/'.$kirim->KODE_TRANSAKSI);?>" class="shopee-button-solid shopee-button-solid--fill shopee-button-solid--primary text-none">
                                <span class="purchase-card-buttons__button-content"> Pengembalian kirim</span>
                              </a>
                            <?php }elseif ($kirim->STATUS == 7) { ?>
                              <a href="<?php echo site_url('Produk/'.$kirim->KODE_UNIT);?>" class="shopee-button-solid shopee-button-solid--fill shopee-button-solid--primary text-none">
                                <span class="purchase-card-buttons__button-content"> Sewa Lagi</span>
                              </a>
                            <?php }elseif ($kirim->STATUS == 99) { ?>
                              <a href="<?php echo site_url('UbahBukti/'.$kirim->KODE_TRANSAKSI);?>" class="shopee-button-solid  shopee-button-solid--primary text-none">
                                <span class="purchase-card-buttons__button-content"> Ubah Bukti Transfer</span>
                              </a>
                            <?php }?>
                          </div>
                          <div class="purchase-card-buttons__show-button-wrapper">
                            <a href="<?php echo site_url('Pesanan/'.$kirim->KODE_TRANSAKSI);?>" class="shopee-button-outline shopee-button-outline--fill shopee-button-outline--primary text-none">
                              <span class="purchase-card-buttons__button-content"> Tampilkan Rincian Pesanan </span>
                            </a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div id="diterima<?= $kirim->KODE_TRANSAKSI;?>" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header bb-none pb-0">
                        <h6>Terima No. Pesanan <?= $kirim->KODE_TRANSAKSI;?></h6>
                        <button type="button" class="close cls-pop" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body pt-0">
                        <hr>
                        <small>Dengan menekan tombol <b>Terima Pesanan</b>, berarti anda telah menerima pesanan dan waktu persewaan dimulai, dimana anda harus mengembalikan barang paling lambat <b><?= $kirim->LAMA_SEWA;?></b> hari dari sekarang, atau pada tanggal <strong><?php echo date("H:i").", ".date("d-m-Y", strtotime('+'.$kirim->LAMA_SEWA.' days', strtotime(date("d-m-Y"))));?></strong>.</small>
                        <hr>
                        <div class="row text-center">
                          <div class="col-md-10 offset-md-1">
                            <span class="text-secondary">Terima pesanan atas: <span class="text-theme"><?= $kirim->NAMA_PRODUK;?></span></span>
                            <br><br class="mb-1 mt-1">
                            <form action="<?php echo site_url('Diterima');?>" method="post">
                              <input type="hidden" name="waktu_mulai" value="<?= date("H:i").", ".date("d-m-Y");?>">
                              <input type="hidden" name="tgl_kembali" value="<?php echo date("H:i").", ".date("d-m-Y", strtotime('+'.$kirim->LAMA_SEWA.' days', strtotime(date("Y-m-d"))));?>">
                              <input type="hidden" name="kode_transaksi" value="<?= $kirim->KODE_TRANSAKSI;?>">
                              <button type="submit" class="btn btn-sm btn-theme text-none text-white">Terima Pesanan</button>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

              <?php }}?>
            </div>
          </div>
          <div role="tabpanel" class="tab-pane" id="gagal">
            <div class="list list-row">
              <?php if ($get_gagal == false) { echo "<div class='p-card mt-10'><center class='card-body p-2'><b>Belum ada pesanan</b></center></div>"; }else{ foreach ($get_gagal as $gagal) { ?>
                <div class="purchase-list-page__checkout-card-wrapper">
                  <div class="order-card__container">
                    <div class="order-card__content-wrapper">
                      <div class="order-card__content">
                        <div class="order-content__container">
                          <div class="order-content__header">
                            <div class="order-delivery-status__wrapper">
                              <a class="order-content__header__delivery-status" href="<?php echo site_url('Pesanan/'.$gagal->KODE_TRANSAKSI);?>">
                                <svg enable-background="new 0 0 15 15" viewBox="0 0 15 15" x="0" y="0" class="shopee-svg-icon icon-free-shipping-line">
                                  <g>
                                    <line fill="none" stroke-linejoin="round" stroke-miterlimit="10" x1="8.6" x2="4.2" y1="9.8" y2="9.8"></line>
                                    <circle cx="3" cy="11.2" fill="none" r="2" stroke-miterlimit="10"></circle>
                                    <circle cx="10" cy="11.2" fill="none" r="2" stroke-miterlimit="10"></circle>
                                    <line fill="none" stroke-miterlimit="10" x1="10.5" x2="14.4" y1="7.3" y2="7.3"></line>
                                    <polyline fill="none" points="1.5 9.8 .5 9.8 .5 1.8 10 1.8 10 9.1" stroke-linejoin="round" stroke-miterlimit="10"></polyline>
                                    <polyline fill="none" points="9.9 3.8 14 3.8 14.5 10.2 11.9 10.2" stroke-linejoin="round" stroke-miterlimit="10"></polyline>
                                  </g>
                                </svg>
                                <span class="order-delivery-status__desc">
                                  <?php if ($gagal->STATUS == 0) {?>
                                    [Sistem] Harap segera membayar paket anda
                                  <?php }elseif ($gagal->STATUS == 1) { ?>
                                    [Sistem] Menunggu konfirmasi bukti pembayaran dari [admin]
                                  <?php }elseif ($gagal->STATUS == 3) { ?>
                                    [Sistem] Paket anda sedang dikemas
                                  <?php }elseif ($gagal->STATUS == 4) { ?>
                                    [Malang Hub] Paket anda sedang dikirim
                                  <?php }elseif ($gagal->STATUS == 5) { ?>
                                    [Kurir] Paket anda telah diterima [Receiver] dan disewa
                                  <?php }elseif ($gagal->STATUS == 6) { ?>
                                    [Sistem] Paket sedang diproses pengembalian
                                  <?php }elseif ($gagal->STATUS == 7) { ?>
                                    [Sistem] gagal anda telah selesai
                                  <?php }elseif ($gagal->STATUS == 99) { ?>
                                    [Sistem] Bukti transfer anda ditolak
                                  <?php }?>
                                </span>
                              </a>
                            </div>
                            <div class="order-content-status">
                              <?php if ($gagal->STATUS == 0) {?>
                                BELUM DIBAYAR
                              <?php }elseif ($gagal->STATUS == 1) { ?>
                                MENUNGGU VALIDASI
                              <?php }elseif ($gagal->STATUS == 3) { ?>
                                DIKEMAS
                              <?php }elseif ($gagal->STATUS == 4) { ?>
                                DIKIRIM
                              <?php }elseif ($gagal->STATUS == 5) { ?>
                                DISEWA
                              <?php }elseif ($gagal->STATUS == 6) { ?>
                                PENGEMBALIAN
                              <?php }elseif ($gagal->STATUS == 7) { ?>
                                SELESAI
                              <?php }elseif ($gagal->STATUS == 99) { ?>
                                DITOLAK
                              <?php }?>
                            </div>
                          </div>
                          <div class="order-content__item-list">
                            <a class="order-content__item-wrapper" href="<?php echo site_url('Pesanan/'.$gagal->KODE_TRANSAKSI);?>">
                              <div class="order-content__item order-content__item--last">
                                <div class="order-content__item__col order-content__item__detail">
                                  <div class="order-content__item__product">
                                    <div class="order-content__item__image">
                                      <div class="shopee-image__wrapper">
                                        <div class="shopee-image__place-holder">
                                          <svg enable-background="new 0 0 15 15" viewBox="0 0 15 15" x="0" y="0" class="shopee-svg-icon icon-loading-image">
                                            <g>
                                              <rect fill="none" height="8" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" width="10" x="1" y="4.5"></rect>
                                              <line fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" x1="1" x2="11" y1="6.5" y2="6.5"></line>
                                              <rect fill="none" height="3" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" width="3" x="11" y="6.5"></rect>
                                              <line fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" x1="1" x2="11" y1="14.5" y2="14.5"></line>
                                              <line fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" x1="6" x2="6" y1=".5" y2="3"></line>
                                              <line fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" x1="3.5" x2="3.5" y1="1" y2="3"></line>
                                              <line fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" x1="8.5" x2="8.5" y1="1" y2="3"></line>
                                            </g>
                                          </svg>
                                        </div>
                                        <?php $foto = $controller->M_pengguna->get_foto($gagal->KODE_UNIT); if ($foto == null) { ?>
                                          <div class="shopee-image__content" style="background-image: url('<?php echo base_url();?>file/site/produk/product.png');">
                                            <div class="shopee-image__content--blur"> </div>
                                          </div>
                                        <?php }else{ foreach ($foto as $pic) {?>
                                          <div class="shopee-image__content" style="background-image: url('<?php echo base_url();?>file/site/produk/<?= $pic->SOURCE;?>');">
                                            <div class="shopee-image__content--blur"> </div>
                                          </div>
                                        <?php } }?>
                                      </div>
                                    </div>
                                    <div class="order-content__item__detail-content">
                                      <div class="order-content__item__name"><?= $gagal->NAMA_PRODUK;?></div>
                                      <div class="order-content__item__quantity">Disewa selama <?= $gagal->LAMA_SEWA;?> Hari</div>
                                    </div>
                                  </div>
                                </div>
                                <div class="order-content__item__price order-content__item__col order-content__item__col--small order-content__item__col--last">
                                  <div class="order-content__item__price-text text-right">
                                    <div class="shopee-price--original">Total gagal</div>
                                    <div class="shopee-price--primary" style="font-size: 20px;">Rp.<?= number_format($gagal->TOTAL,0,",",".");?></div>
                                  </div>
                                </div>
                              </div>
                            </a>
                          </div>
                        </div>
                      </div>
                      <div class="_39ltn9">
                        <div class="_2IkeiS _1wGF8P"> </div>
                        <div class="_2IkeiS Bm16W5"> </div>
                      </div>
                    </div>
                    <div class="order-card__buttons-container">
                      <div class="purchase-card-buttons__wrapper">
                        <div class="purchase-card-buttons__container">
                          <div class="purchase-card-buttons__show-button-wrapper">
                            <?php if ($gagal->STATUS == 0) {?>
                              <a href="<?php echo site_url('bayar/'.$gagal->KODE_TRANSAKSI);?>" class="shopee-button-solid shopee-button-solid--fill shopee-button-solid--primary text-none">
                                <span class="purchase-card-buttons__button-content"> Upload Bukti Transfer</span>
                              </a>
                            <?php }elseif ($gagal->STATUS == 1) { ?>
                              <a href="https://api.whatsapp.com/send?phone=085785111746&text=Hai20%permintaan20%saya20%apakah20%sudah20%divalidasi?" target="_blank" class="shopee-button-solid shopee-button-solid--fill shopee-button-solid--primary text-none">
                                <span class="purchase-card-buttons__button-content"> Hubungi Admin</span>
                              </a>
                            <?php }elseif ($gagal->STATUS == 5) { ?>
                              <a href="<?php echo site_url('Pengembalian/'.$gagal->KODE_TRANSAKSI);?>" class="shopee-button-solid shopee-button-solid--fill shopee-button-solid--primary text-none">
                                <span class="purchase-card-buttons__button-content"> Pengembalian gagal</span>
                              </a>
                            <?php }elseif ($gagal->STATUS == 7) { ?>
                              <a href="<?php echo site_url('Produk/'.$gagal->KODE_UNIT);?>" class="shopee-button-solid shopee-button-solid--fill shopee-button-solid--primary text-none">
                                <span class="purchase-card-buttons__button-content"> Sewa Lagi</span>
                              </a>
                            <?php }elseif ($gagal->STATUS == 99) { ?>
                              <a href="<?php echo site_url('UbahBukti/'.$gagal->KODE_TRANSAKSI);?>" class="shopee-button-solid shopee-button-solid--fill shopee-button-solid--primary text-none">
                                <span class="purchase-card-buttons__button-content"> Ubah Bukti Transfer</span>
                              </a>
                            <?php }?>
                          </div>
                          <div class="purchase-card-buttons__show-button-wrapper">
                            <a href="<?php echo site_url('Pesanan/'.$gagal->KODE_TRANSAKSI);?>" class="shopee-button-outline shopee-button-outline--fill shopee-button-outline--primary text-none">
                              <span class="purchase-card-buttons__button-content"> Tampilkan Rincian Pesanan </span>
                            </a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              <?php }}?>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>
