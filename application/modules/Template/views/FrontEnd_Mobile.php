<!DOCTYPE html>
<html class="no-js" lang="id">
<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title><?=$website[0];?></title>
  <meta name="description" content="<?=$website[1];?>">
  <meta name="viewport" content="width=device-width, initial-scale=0.8">

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
</head>
<body class="">
  <!--[if lt IE 8]>
  <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
  <![endif]-->

  <!-- <div class="preloader"></div> -->

  <?php if($this->session->flashdata('alert')) { ?>
    <div class="modal fade" id="notifikasi" role="dialog" tabindex="-1" >
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
    <div class="container bg-white">
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
            <a href="<?php echo site_url('Promo');?>" class="bar-text">PROMO</a>
            <a href="<?php echo site_url('Blog');?>" class="bar-text">BLOG</a>
          </div>

        </div>
      </div>
    </div>
  </section>

  <!-- =========================
  Header Top Section
  ============================== -->


  <nav class="navbar navbar-dark bg-info navbar-expand fixed-bottom" style="position:fixed;">
    <ul class="navbar-nav nav-justified w-100">
      <li class="nav-item">
        <a href="<?php echo base_url();?>" class="nav-link">
          <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-house" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M2 13.5V7h1v6.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V7h1v6.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5zm11-11V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
            <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"/>
          </svg>
        </a>
      </li>
      <li class="nav-item">
        <a href="<?php echo site_url('Search/all');?>" class="nav-link">
          <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-search" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z"/>
            <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"/>
          </svg>
        </a>
      </li>
      <li class="nav-item">
        <a href="<?php echo site_url('Akun/Pesanan');?>" class="nav-link">
          <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-cart4" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/>
          </svg>
        </a>
      </li>
      <li class="nav-item">
        <a href="<?php echo site_url('Akun');?>" class="nav-link">
          <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-person" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M10 5a2 2 0 1 1-4 0 2 2 0 0 1 4 0zM8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm6 5c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
          </svg>
        </a>
      </li>
      <li class="nav-item">
        <a href="<?php echo site_url('Keluar');?>" class="nav-link">
          <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-power" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M5.578 4.437a5 5 0 1 0 4.922.044l.5-.866a6 6 0 1 1-5.908-.053l.486.875z"/>
            <path fill-rule="evenodd" d="M7.5 8V1h1v7h-1z"/>
          </svg>
        </a>
      </li>
    </ul>
  </nav>


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
  Main Menu Section
  ============================== -->
  <!-- <br><br><br><br><br><br class="d-block d-sm-none"> -->
  <!-- <?= $this->load->view('Frontend_Menu');?> -->

  <!-- =========================
  Content Section
  ============================== -->

  <?php $this->load->view($module.'/'.$fileview); ?>

  <!-- =========================
  Footer Section
  ============================== -->
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
    <script src="<?php echo base_url();?>assets/frontend/js/jquery-ui.js"></script>
    <script src="<?php echo base_url();?>assets/frontend/js/popper.js"></script>
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
