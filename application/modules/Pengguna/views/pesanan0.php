<div class="container">
  <div class="main-body">

    <!-- USER MENU -->

    <?php $this->load->view('user_menu'); ?>

    <div class="col-md-8">
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
                  <a class="nav-link" href="#gagal" role="tab" data-toggle="tab">Ditolak <?php if ($jml_gagal > 0) { ?><span class="badge badge-warning text-white"><?= $jml_gagal;?></span><?php }?></a>
                </li>
              </ul>

              <!-- Tab panes -->
              <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="semua">
                  <div class="list list-row block">
                    <?php if ($get_disewa == false) { echo "<center class='mt-3'><b>Belum ada pesanan</b></center>"; }else{ foreach ($get_disewa as $pesanan) { ?>
                      <div class="list-item">
                        <div>
                          <a href="<?php echo site_url('Pesanan/'.$pesanan->KODE_TRANSAKSI);?>" data-abc="true">
                            <span class="w-48 avatar">
                              <?php if ($pesanan->STATUS == 0) {?>
                                <svg enable-background="new 0 0 15 15" viewBox="0 0 15 15" x="0" y="0" class="shopee-svg-icon _3cSBz2 "style="width: 100px; height: 100px;""><linearGradient id="coingrey-a" gradientTransform="matrix(1 0 0 -1 0 -810.11)" gradientUnits="userSpaceOnUse" x1="2.9694" x2="12.0447" y1="-811.8111" y2="-823.427"><stop offset="0" stop-color="#c4c4c4"></stop><stop offset=".5306" stop-color="#f1f1f1"></stop><stop offset="1" stop-color="#c4c4c4"></stop></linearGradient><linearGradient id="coingrey-b" gradientTransform="matrix(1 0 0 -1 0 -810.11)" gradientUnits="userSpaceOnUse" x1="7.5" x2="7.5" y1="-810.2517" y2="-824.9919"><stop offset="0" stop-color="#b6b6b6"></stop><stop offset="1" stop-color="#b6b6b6"></stop></linearGradient><linearGradient id="coingrey-c" gradientTransform="matrix(1 0 0 -1 0 -810.11)" gradientUnits="userSpaceOnUse" x1="4.0932" x2="10.9068" y1="-813.5499" y2="-821.6702"><stop offset="0" stop-color="#b9b9b9"></stop><stop offset=".2243" stop-color="#bfbfbf"></stop><stop offset=".5015" stop-color="#d3d3d3"></stop><stop offset=".765" stop-color="#bfbfbf"></stop><stop offset="1" stop-color="#b9b9b9"></stop></linearGradient><linearGradient id="coingrey-d" gradientUnits="userSpaceOnUse" x1="5.4204" x2="9.7379" y1="5.0428" y2="10.188"><stop offset="0" stop-color="#dedede"></stop><stop offset=".5003" stop-color="#ffffff"></stop><stop offset="1" stop-color="#dedede"></stop></linearGradient><g><circle cx="7.5" cy="7.5" fill="url(#coingrey-a)" r="7.4"></circle><path d="m7.5.4c3.9 0 7.1 3.2 7.1 7.1s-3.2 7.1-7.1 7.1-7.1-3.2-7.1-7.1 3.2-7.1 7.1-7.1m0-.3c-4.1 0-7.4 3.3-7.4 7.4s3.3 7.4 7.4 7.4 7.4-3.3 7.4-7.4-3.3-7.4-7.4-7.4z" fill="url(#coingrey-b)"></path><path d="m14.4 7.7c0-.1 0-.1 0-.2 0-3.8-3.1-6.9-6.9-6.9s-6.9 3.1-6.9 6.9v.2c.1-3.7 3.1-6.7 6.9-6.7s6.8 3 6.9 6.7z" fill="#ffffff"></path><circle cx="7.5" cy="7.5" fill="url(#coingrey-c)" r="5.3"></circle><path d="m11.4 4c1.1 1 1.8 2.4 1.8 3.9 0 2.9-2.4 5.3-5.3 5.3-1.6 0-3-.7-3.9-1.8.9.8 2.2 1.4 3.5 1.4 2.9 0 5.3-2.4 5.3-5.3 0-1.4-.5-2.6-1.4-3.5z" fill="#eaeaea"></path><path d="m11.4 4c-1-1.1-2.4-1.8-3.9-1.8-2.9 0-5.3 2.4-5.3 5.3 0 1.6.7 3 1.8 3.9-.8-.9-1.4-2.2-1.4-3.5 0-2.9 2.4-5.3 5.3-5.3 1.4 0 2.6.5 3.5 1.4z" fill="#818181"></path><path d="m6.2 4.8c-.5.4-.6 1.1-.5 1.7.1.5.5 1 1.1 1.3.7.4 2.4.8 2.4 1.7 0 .2-.1.5-.2.6-.3.4-.8.5-1.3.5-.3 0-.7-.1-1-.2s-.6-.3-.9-.5c-.2-.1-.4 0-.5.1-.1.2 0 .4.1.5.5.4 1 .7 1.7.8.6.1 1.3.1 1.8-.2.5-.2.9-.6 1-1.2s-.1-1.2-.5-1.6c-.5-.5-2-1-2.4-1.3-.3-.2-.6-.5-.6-1 .1-.6.5-.9 1.1-.9.5 0 1.1.1 1.6.4.4.3.8-.4.4-.7-1-.6-2.5-.7-3.3 0z" fill="#909090"></path><path d="m6.1 4.5c-.5.4-.6 1.1-.5 1.7.1.5.5 1 1.1 1.3.7.4 2.4.8 2.4 1.7 0 .2-.1.5-.2.6-.3.4-.8.5-1.3.5-.3 0-.7-.1-1-.2s-.6-.3-.9-.5c-.2-.1-.4 0-.5.1-.1.2 0 .4.1.5.5.4 1 .7 1.7.8.6.1 1.3.1 1.8-.2.5-.2.9-.6 1-1.2s-.2-1.2-.6-1.6c-.5-.5-1.9-1-2.3-1.3-.3-.2-.6-.5-.6-1 .1-.6.5-.9 1.1-.9.5 0 1.1.1 1.6.4.4.3.8-.4.4-.7-1-.6-2.5-.7-3.3 0z" fill="url(#coingrey-d)"></path></g></svg>
                              <?php }else{?>
                                <img class="XBlEsH" src="https://deo.shopeemobile.com/shopee/shopee-pcmall-live-sg/assets/7d3426821a075ca8a0994a8fd0672d0a.png">
                              <?php }?>
                            </span>
                          </a>
                        </div>
                        <div class="flex"> <a href="<?php echo site_url('Pesanan/'.$pesanan->KODE_TRANSAKSI);?>" class="item-author text-color text-success mr-2 font-weight-bold" data-abc="true"><?php if ($pesanan->STATUS == 0) { echo "<span class='text-secondary'>Belum Dibayar</spen>"; }elseif ($pesanan->STATUS == 1) { echo "<span class='text-danger'>Menunggu Verifikasi</spen>"; }elseif ($pesanan->STATUS == 3) { echo "<span class='text-primary'>Dikirim</spen>"; }?></a>
                          <div class="item-except text-muted text-sm h-1x">Pesanan produk <b><?= $pesanan->NAMA_PRODUK;?></b></div>
                          <?php if ($pesanan->STATUS == 0) {?>
                            <a href="<?php echo site_url('bayar/'.$pesanan->KODE_TRANSAKSI);?>" class="text text-success">Bayar</a>
                          <?php }else{?>
                            <a href="<?php echo site_url('Pesanan/'.$pesanan->KODE_TRANSAKSI);?>" class="text text-info">Detail</a>
                          <?php }?>
                        </div>
                        <div class="no-wrap">
                          <div class="item-date text-muted text-sm d-none d-md-block"></div>
                        </div>
                      </div>
                    <?php }}?>
                  </div>
                </div>
                <div role="tabpanel" class="tab-pane" id="dibayar">
                  <div class="list list-row block">
                    <?php if ($get_belumbayar == false) { echo "<center class='mt-3'><b>Belum ada pesanan</b></center>"; }else{ foreach ($get_belumbayar as $dibayar) { ?>
                      <div class="list-item">
                        <div>
                          <a href="<?php echo site_url('Pesanan/'.$dibayar->KODE_TRANSAKSI);?>" data-abc="true">
                            <span class="w-48 avatar">
                              <img class="XBlEsH" src="https://deo.shopeemobile.com/shopee/shopee-pcmall-live-sg/assets/7d3426821a075ca8a0994a8fd0672d0a.png">
                            </span>
                          </a>
                        </div>
                        <div class="flex"> <a href="<?php echo site_url('Pesanan/'.$dibayar->KODE_TRANSAKSI);?>" class="item-author text-color text-success mr-2 font-weight-bold" data-abc="true">Belum Dibayar</a>
                          <div class="item-except text-muted text-sm h-1x">Pesanan produk <b><?= $dibayar->NAMA_PRODUK;?></b></div>
                          <?php if ($dibayar->STATUS == 0) {?>
                            <a href="<?php echo site_url('bayar/'.$dibayar->KODE_TRANSAKSI);?>" class="text text-success">Bayar</a>
                          <?php }else{?>
                            <a href="<?php echo site_url('Pesanan/'.$dibayar->KODE_TRANSAKSI);?>" class="text text-info">Detail</a>
                          <?php }?>
                        </div>
                        <div class="no-wrap">
                          <div class="item-date text-muted text-sm d-none d-md-block"></div>
                        </div>
                      </div>
                    <?php }}?>
                  </div>
                </div>
                <div role="tabpanel" class="tab-pane" id="verif">
                  <div class="list list-row block">
                    <?php if ($get_belumver == false) { echo "<center class='mt-3'><b>Belum ada pesanan</b></center>"; }else{ foreach ($get_belumver as $verif) { ?>
                      <div class="list-item">
                        <div>
                          <a href="<?php echo site_url('Pesanan/'.$verif->KODE_TRANSAKSI);?>" data-abc="true">
                            <span class="w-48 avatar">
                              <img class="XBlEsH" src="https://deo.shopeemobile.com/shopee/shopee-pcmall-live-sg/assets/7d3426821a075ca8a0994a8fd0672d0a.png">
                            </span>
                          </a>
                        </div>
                        <div class="flex"> <a href="<?php echo site_url('Pesanan/'.$verif->KODE_TRANSAKSI);?>" class="item-author text-color text-danger mr-2 font-weight-bold" data-abc="true">Proses Verifikasi</a>
                          <div class="item-except text-muted text-sm h-1x">Pesanan produk <b><?= $verif->NAMA_PRODUK;?></b></div>
                          <a href="<?php echo site_url('Pesanan/'.$verif->KODE_TRANSAKSI);?>" class="text text-info">Detail</a>
                        </div>
                        <div class="no-wrap">
                          <div class="item-date text-muted text-sm d-none d-md-block"></div>
                        </div>
                      </div>
                    <?php }}?>
                  </div>
                </div>
                <div role="tabpanel" class="tab-pane" id="kemas">
                  <div class="list list-row block">
                    <?php if ($get_kemas == false) { echo "<center class='mt-3'><b>Belum ada pesanan</b></center>"; }else{ foreach ($get_kemas as $dikemas) { ?>
                      <div class="list-item">
                        <div>
                          <a href="<?php echo site_url('Pesanan/'.$dikemas->KODE_TRANSAKSI);?>" data-abc="true">
                            <span class="w-48 avatar">
                              <img class="XBlEsH" src="https://deo.shopeemobile.com/shopee/shopee-pcmall-live-sg/assets/7d3426821a075ca8a0994a8fd0672d0a.png">
                            </span>
                          </a>
                        </div>
                        <div class="flex"> <a href="<?php echo site_url('Pesanan/'.$dikemas->KODE_TRANSAKSI);?>" class="item-author text-color text-success mr-2 font-weight-bold" data-abc="true">Sedang dikemas</a>
                          <div class="item-except text-muted text-sm h-1x">Pesanan produk <b><?= $dikemas->NAMA_PRODUK;?></b></div>
                        </div>
                        <div class="no-wrap">
                          <div class="item-date text-muted text-sm d-none d-md-block"></div>
                        </div>
                      </div>
                    <?php }}?>
                  </div>
                </div>
                <div role="tabpanel" class="tab-pane" id="kirim">
                  <div class="list list-row block">
                    <?php if ($get_pengiriman == false) { echo "<center class='mt-3'><b>Belum ada pesanan</b></center>"; }else{ foreach ($get_pengiriman as $kirim) { ?>
                      <div class="list-item">
                        <div>
                          <a href="<?php echo site_url('Pesanan/'.$kirim->KODE_TRANSAKSI);?>" data-abc="true">
                            <span class="w-48 avatar">
                              <img class="XBlEsH" src="https://deo.shopeemobile.com/shopee/shopee-pcmall-live-sg/assets/7d3426821a075ca8a0994a8fd0672d0a.png">
                            </span>
                          </a>
                        </div>
                        <div class="flex"> <a href="<?php echo site_url('Pesanan/'.$kirim->KODE_TRANSAKSI);?>" class="item-author text-color text-success mr-2 font-weight-bold" data-abc="true">Sedang dikirim</a>
                          <div class="item-except text-muted text-sm h-1x">Pesanan produk <b><?= $kirim->NAMA_PRODUK;?></b></div>
                          <a href="<?php echo site_url('PesananKirim/'.$gagal->KODE_TRANSAKSI);?>" class="text text-info">Detal</a>
                        </div>
                        <div class="no-wrap">
                          <div class="item-date text-muted text-sm d-none d-md-block"></div>
                        </div>
                      </div>
                    <?php }}?>
                  </div>
                </div>
                <div role="tabpanel" class="tab-pane" id="gagal">
                  <div class="list list-row block">
                    <?php if ($get_gagal == false) { echo "<center class='mt-3'><b>Belum ada pesanan</b></center>"; }else{ foreach ($get_gagal as $gagal) { ?>
                      <div class="list-item">
                        <div>
                          <a href="<?php echo site_url('Pesanan/'.$gagal->KODE_TRANSAKSI);?>" data-abc="true">
                            <span class="w-48 avatar">
                              <img class="XBlEsH" src="https://deo.shopeemobile.com/shopee/shopee-pcmall-live-sg/assets/7d3426821a075ca8a0994a8fd0672d0a.png">
                            </span>
                          </a>
                        </div>
                        <div class="flex"> <a href="<?php echo site_url('Pesanan/'.$gagal->KODE_TRANSAKSI);?>" class="item-author text-color text-success mr-2 font-weight-bold" data-abc="true">Bukti Ditolak</a>
                          <div class="item-except text-muted text-sm h-1x">Pesanan produk <b><?= $gagal->NAMA_PRODUK;?></b></div>
                          <a href="<?php echo site_url('Pesanan/'.$gagal->KODE_TRANSAKSI);?>" class="text text-info">Detail</a>
                        </div>
                        <div class="no-wrap">
                          <div class="item-date text-muted text-sm d-none d-md-block"></div>
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
    </div>
  </div>
</div>
</div>
