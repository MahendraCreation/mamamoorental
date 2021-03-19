<!DOCTYPE html>
<html class="no-js" lang="id">
<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title><?=$website[0];?></title>
  <meta name="description" content="<?=$website[1];?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- <link rel="apple-touch-icon" href="apple-touch-icon.png"> -->
  <link rel="icon" type="image/x-icon" href="<?php echo base_url(); ?>file/site/logo/<?= $website[3];?>">
  <!-- Place favicon.ico in the root directory -->


  <!-- =========================
  Loding All Stylesheet
  ============================== -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/frontend/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/frontend/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/frontend/css/owl.carousel.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/frontend/css/owl.carousel.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/frontend/css/owl.theme.default.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/frontend/css/animate.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/frontend/css/rateyo.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/frontend/css/lightslider.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/frontend/css/flexslider.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/frontend/css/jquery-ui.min.css">

  <link rel="stylesheet" href="<?php echo base_url();?>assets/frontend/css/megamenu.css">

  <!-- =========================
  Loding Main Theme Style
  ============================== -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/frontend/css/style.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/frontend/css/custom.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/frontend/css/order.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/frontend/css/rating.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/frontend/css/kat-carousel.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/frontend/css/kat-card.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/frontend/css/input-number.css">

  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

  <!-- =========================
  Header Loding JS Script
  ============================== -->
  <script src="<?php echo base_url();?>assets/frontend/js/modernizr.js"></script>
  <script src="<?php echo base_url();?>assets/frontend/js/jquery.min.js"></script>
  <script src="<?php echo base_url();?>assets/frontend/js/jquery-ui.js"></script>
  <script src="<?php echo base_url();?>assets/frontend/js/popper.js"></script>
</head>
<body class="">
  <!--[if lt IE 8]>
  <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
  <![endif]-->

  <!-- <div class="preloader"></div> -->

  <?php if($this->session->flashdata('alert')) { ?>
    <div class="modal fade" id="notifikasi" role="dialog" >
      <div class="modal-dialog modal-dialog-centered" role="document">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-body" style="padding-bottom: 0px !important;">
            <button type="button" class="close alcs" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <div class="alert alert-warning alert-icon shadow" role="alert">
              <p><b>NOTIFIKASI !!</b></p>
              <?php echo $this->session->flashdata('alert'); ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script type="text/javascript">
    $(window).on('load',function(){
      $('#notifikasi').modal('show');
    });
    </script>
  <?php }?>

  <!-- =========================
  Header Top Section
  ============================== -->
  <section id="wd-header-top">
    <div class="container">
      <div class="row">
        <div class="col-6 col-sm-6 col-md-4 col-lg-4 col-xl-3">
          <!-- =========================
          Social Media List
          ============================== -->
          <div class="wb-social-media text-left">
            <a href="https://api.whatsapp.com/send?phone=+<?php echo $wa;?>" class="wa" target="_blank"><i class="fa fa-whatsapp"></i></a>
            <a href="https://www.instagram.com/<?= $ig;?>" class="ig" target="_blank"><i class="fa fa-instagram"></i></a>
          </div>
        </div>

        <!-- =========================
        Select Country and Language
        ============================== -->
        <div class="col-6 col-sm-6 col-md-8 col-lg-8 col-xl-9 text-right pr-10">
          <div class="text-right i-flex">
            <a href="<?php echo site_url('Tentang');?>" class="bar-text">Tentang Kami</a>
          </div>

        </div>
      </div>
    </div>
  </section>

  <!-- =========================
  Header Top Section
  ============================== -->
  <section id="wd-header" class="d-flex align-items-center sticker-nav mob-sticky pb-0">
    <div class="container">
      <div class="row mb-0">

        <div class="order-1 order-sm-2  col-12 col-sm-5 col-md-4 col-lg-3 col-xl-3">
          <div class="blrub-logo">
            <a href="<?php echo base_url();?>">
              <img src="<?php echo base_url();?>file/site/logo/<?= $website[2];?>" alt="Logo"s>
            </a>
          </div>
        </div>

        <!-- =========================
        Search Box  Show on large device
        ============================== -->
        <div class="col-12 order-lg-2 col-md-5 col-lg-5 col-xl-5 d-none d-lg-block">
          <div class="input-group wd-btn-group header-search-option src-head">
            <form action="<?php echo site_url("Search/Produk");?>" method="post" style="display: contents;">
              <input type="text" class="form-control input-sm blurb-search p-812" name="cari" placeholder="Cari nama produk..." aria-label="Masukkan nama produk...">
              <span class="input-group-btn">
                <button class="btn btn-secondary wd-btn-search p-812" type="submit">
                  <i class="fa fa-search" aria-hidden="true"></i>
                </button>
              </span>
            </form>
          </div>
        </div>

        <!-- =========================
        Login and My Acount
        ============================== -->
        <div class="order-3 order-sm-3 col-10 col-sm-7 col-lg-4 col-md-8 col-xl-4">
          <!-- =========================
          User Account Section
          ============================== -->
          <div class="acc-header-wraper">
            <!-- =========================
            Cart Out
            ============================== -->

            <div class="header-cart">
              <?php if ($logged == TRUE) { ?>
                <div class="dropdown wd-compare-btn mr-10">
                  <button class="btn btn-secondary dropdown-toggle compare-btn" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-bell-o"></i>
                  </button>
                  <?php if ($verifikasi == 0 || $trans_belum > 0 || $trans_kirim > 0) { ?>
                    <span class="count">!</span>
                  <?php }?>
                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu2" style="transform: translate3d(-248px, 23px, 0px) !important;">
                    <div class="wd-item-list">
                      <?php if ($verifikasi == 0) { ?>
                        <div class="media">
                          <img class="d-flex mr-3" src="<?php echo base_url();?>assets/frontend/img/cart.png" alt="cart-img">
                          <div class="media-body p2">
                            <h6 class="mt-0 list-group-title font-weight-bold">Belum Verifikasi</h6>
                            <div class="cart-price text-secondary font-14">Akun anda belum diverifikasi!</div>
                          </div>
                        </div>
                      <?php }?>
                      <?php if ($trans_belum > 0) { ?>
                        <a href="<?php echo site_url('Akun/Pesanan');?>" class="media">
                          <img class="d-flex mr-3" src="<?php echo base_url();?>assets/frontend/img/cart.png" alt="cart-img">
                          <div class="media-body p2">
                            <h6 class="mt-0 list-group-title font-weight-bold">Pesanan</h6>
                            <div class="cart-price text-secondary font-14">Anda memiliki pesanan yang belum dibayar!</div>
                          </div>
                        </a>
                      <?php } if ($trans_kirim > 0) {?>
                        <a href="<?php echo site_url('Akun/Pesanan');?>" class="media">
                          <img class="d-flex mr-3" src="<?php echo base_url();?>assets/frontend/img/review-icon.png" alt="cart-img">
                          <div class="media-body p2">
                            <h6 class="mt-0 list-group-title font-weight-bold">Pesanan</h6>
                            <div class="cart-price text-secondary font-14">Anda memiliki pesanan dalam pengiriman!</div>
                          </div>
                        </a>
                      <?php }?>
                    </div>
                  </div>
                </div>
                <div class="dv-bar"></div>
                <div class="dropdown wd-compare-btn">
                  <button class="btn btn-secondary dropdown-toggle compare-btn btn-sm" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-user"></i> <span class="font-16" style="margin-top: -2px;"><?php $nama = explode(" ", $this->session->userdata('nama')); echo $nama[0]; ?></span>
                  </button>
                  <?php if ($admin == TRUE) { ?>
                    <div class="dropdown-menu dropdown-menu-right shadow-hv" aria-labelledby="dropdownMenu2">
                      <ul class="profil-menu">
                        <li><a href="<?php echo site_url('Admin');?>">Dashboard Admin</a></li>
                        <li><a href="<?php echo site_url('Keluar');?>">Keluar</a></li>
                      </ul>
                    </div>
                  <?php }else{?>
                    <div class="dropdown-menu dropdown-menu-right shadow-hv" aria-labelledby="dropdownMenu2">
                      <ul class="profil-menu">
                        <li><a href="<?php echo site_url('Akun');?>">Akun Saya</a></li>
                        <li><a href="<?php echo site_url('Akun/Pesanan');?>">Pesanan</a></li>
                        <li><a href="<?php echo site_url('Keluar');?>">Keluar</a></li>
                      </ul>
                    </div>
                  <?php }?>
                </div>
              <?php }else { ?>
                <div class="dv-bar"></div>
                <button class="btn btn-outline-theme btn-sm" role="button" data-toggle="modal" data-target="#masuk">
                  <i class="fa fa-sign-in" aria-hidden="true"></i> <span>Masuk</span>
                </button>
                <a href="<?php echo site_url('Daftar');?>" class="btn btn-theme btn-sm" type="button" role="button" >
                  <i class="fa fa-pencil-square-o" aria-hidden="true"></i> <span>Daftar</span>
                </a>
              <?php } ?>
            </div>
          </div>

        </div>
      </div><!--Row End-->
      <br class="d-lg-none">
      <div class="row mt-0 mb-0 d-none d-lg-block d-xl-block">
        <div class="col-lg-9  offset-lg-3 col-md-8 offset-md-4">
          <div class="nav-menu">
            <a href="<?php echo base_url();?>" class="mr-10">Halaman Utama</a>
            <a href="<?php echo site_url('Search/all');?>" class="mr-10">Semua Produk</a>
            <a href="<?php echo site_url('Search/terbaru');?>" class="mr-10">New Arrivals</a>
            <a href="<?php echo site_url('Search/PompaSparepart');?>" class="mr-10">Pompa asi & sparepart</a>
          </div>
        </div>
      </div>
    </div><!--Container End-->
  </section><!--Section End-->



  <!-- LOGIN POP UP -->
  <div id="masuk" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header bb-none">
          <button type="button" class="close cls-pop" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="text-center prl-10">
            <h5 class="modal-title text-center">MASUK <small class="text-theme pull-right"><a href="<?php echo site_url('Daftar');?>" class="text-theme text-none daftar-text">Daftar</a></small></h5>
          </div>
          <div class="sign-up-section text-center p-10">
            <div class="login-form text-left m0">
              <form action="<?php echo site_url('Auth');?>" method="post">
                <div class="form-group">
                  <label for="m_email">Email</label>
                  <input type="email" class="form-control" id="m_email" name="m_email" placeholder="Masukkan email anda">
                  <small class="text-secondary">Contoh: email@mamamoorental.com</small>
                </div>
                <div class="form-group">
                  <label for="m_password">Password</label>
                  <input type="password" class="form-control" id="m_password" name="m_password" minlength="8" placeholder="Masukkan password anda">
                </div>
                <button type="submit" class="btn btn-primary wd-login-btn">Masuk</button>

                <div class="wd-policy">
                  <small class="text-secondary">
                    Belum punya akun? <a href="<?php echo site_url('Daftar');?>" class="text-theme text-none">Daftar</a>
                  </small>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- =========================
  Content Section
  ============================== -->

  <?php $this->load->view($module.'/'.$fileview); ?>

  <a href="https://api.whatsapp.com/send?phone=+<?php echo $wa;?>" class="float text-none text-white" target="_blank">
    <i class="fa fa-whatsapp fa-2x my-float"></i>
  </a>

  <!-- =========================
  Footer Section
  ============================== -->
  <footer class="footer wow fadeInUp animated" data-wow-delay="900ms">
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <!-- ===========================
          Footer About
          =========================== -->
          <div class="footer-about">
            <a href="<?php echo base_url();?>" class="footer-about-logo">
              <img src="<?php echo base_url();?>file/site/logo/<?= $website[2];?>" alt="Logo">
            </a>
            <div class="footer-description">
              <p><?= $website[1];?></p>
            </div>
            <div class="wb-social-media">
              <a href="https://api.whatsapp.com/send?phone=+<?php echo $wa;?>" class="wa" target="_blank"><i class="fa fa-whatsapp"></i></a>
              <a href="https://www.instagram.com/<?= $ig;?>" class="ig" target="_blank"><i class="fa fa-instagram"></i></a>
            </div>
          </div>
        </div>
        <div class="col-md-3 footer-view-controller">
          <!-- ===========================
          Festival Deals
          =========================== -->
          <div class="footer-nav">
            <h6 class="footer-subtitle active-color">Website Kami</h6>
            <ul>
              <li><a href="<?php echo site_url('Tentang');?>"> Tentang Kami </a></li>
            </ul>
          </div>
        </div>
        <div class="col-md-3 footer-view-controller">
          <!-- ===========================
          Need Help ?
          =========================== -->
          <div class="footer-nav">
            <h6 class="footer-subtitle">Butuh bantuan ?</h6>
            <ul>
              <li><a href="https://api.whatsapp.com/send?phone=+<?php echo $wa;?>" target="_blank">Hubungi Kami</a></li>
            </ul>
          </div>
        </div>
        <div class="col-md-2 footer-view-controller">
          <!-- ===========================
          About
          =========================== -->
          <div class="footer-nav">
            <h6 class="footer-subtitle">Tentang</h6>
            <ul>
              <li><a href="<?php echo site_url('Disclaimer');?>">Disclaimer</a></li>
              <li><a href="<?php echo site_url('SyaratdanKetentuan');?>">Syarat dan Ketentuan</a></li>
              <li><a href="<?php echo site_url('KebijakandanPrivasi');?>">Kebijakan Privasi</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!-- =========================
  CopyRight
  ============================== -->
  <section class="copyright wow fadeInUp animated" data-wow-delay="1500ms">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="copyright-text">
            <small class="text-uppercase">COPYRIGHT &copy; 2020</p><a class="created-by" href="https://hivilab.org/">Creative Crew</small>
            </div>
          </div>
        </div>
      </div>
    </section>

    <script type="text/javascript">
    $(document).ready(function() {
      $('.select2-basic').select2();
    });
    </script>

    <!-- =========================
    Main Loding JS Script
    ============================== -->
    <script src="<?php echo base_url();?>assets/frontend/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>assets/frontend/js/jquery.counterup.min.js"></script>
    <script src="<?php echo base_url();?>assets/frontend/js/jquery.nav.js"></script>
    <!-- <script src="<?php echo base_url();?>assets/frontend/js/jquery.nicescroll.js"></script> -->
    <script src="<?php echo base_url();?>assets/frontend/js/jquery.rateyo.js"></script>
    <script src="<?php echo base_url();?>assets/frontend/js/jquery.scrollUp.min.js"></script>
    <script src="<?php echo base_url();?>assets/frontend/js/jquery.sticky.js"></script>
    <script src="<?php echo base_url();?>assets/frontend/js/mobile.js"></script>
    <script src="<?php echo base_url();?>assets/frontend/js/lightslider.min.js"></script>
    <script src="<?php echo base_url();?>assets/frontend/js/owl.carousel.min.js"></script>
    <script src="<?php echo base_url();?>assets/frontend/js/circle-progress.min.js"></script>
    <script src="<?php echo base_url();?>assets/frontend/js/waypoints.min.js"></script>
    <script src="<?php echo base_url();?>assets/frontend/js/simplePlayer.js"></script>
    <script src="<?php echo base_url();?>assets/frontend/js/main.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>


    <script src="<?php echo base_url();?>assets/frontend/js/kat-carousel.js"></script>
  </body>
  </html>
