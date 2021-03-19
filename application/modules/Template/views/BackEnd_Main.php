<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content />
  <meta name="author" content />
  <title>ADMIN - MAMAMOORENTAL</title>
  <link rel="icon" type="image/x-icon" href="<?php echo base_url();?>file/site/logo/icon.png" />

  <link href="<?php echo base_url();?>assets/backend/css/styles.css" rel="stylesheet" />
  <link href="<?php echo base_url();?>assets/backend/css/custom.css" rel="stylesheet" />
  <link href="<?php echo base_url();?>assets/backend/css/plugin/daterangepicker/daterangepicker.css" rel="stylesheet" />
  <link href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
  <style>
  .select2-container--default .select2-selection--single .select2-selection__rendered {
    line-height: 38px;
  }
  .select2-container .select2-selection--single {
    height: 38px;
  }
  .select2-container--default .select2-selection--single .select2-selection__arrow {
    height: 36px;
  }
  .select2-container {
    width: 100% !important;
  }
  .filepond--credits{
    display: none !important;
  }
  </style>

  <script src="<?php echo base_url();?>assets/backend/js/plugin/font-awesome/5.13.0/js/all.min.js"></script>
  <script src="<?php echo base_url();?>assets/backend/js/plugin/feather-icons/4.27.0/feather.min.js"></script>
  <script src="<?php echo base_url();?>assets/backend/js/jquery-3.5.1.min.js"></script>
  <script src="<?php echo base_url();?>assets/backend/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
</head>
<body class="nav-fixed">
  <nav class="topnav navbar navbar-expand shadow navbar-light bg-white" id="sidenavAccordion">
    <a class="navbar-brand" href="<?php echo site_url('Admin');?>">MAMAMOORENTAL</a>
    <button class="btn btn-icon btn-transparent-dark order-1 order-lg-0 mr-lg-2" id="sidebarToggle" href="#"><i data-feather="menu"></i></button>
    <ul class="navbar-nav align-items-center ml-auto">
      <li class="nav-item dropdown no-caret mr-3 d-none d-md-inline">
        <a href="<?php echo base_url();?>" target="_blank" class="nav-link" href="" role="button">
          <div class="d-none d-md-inline font-weight-500">Store</div>
          <i class="fas fa-shopping-cart"></i>
        </a>
      </li>
      <li class="nav-item dropdown no-caret mr-3 dropdown-notifications">
        <a class="btn btn-icon btn-transparent-dark dropdown-toggle" id="navbarDropdownAlerts" href="javascript:void(0);" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i data-feather="bell"></i>
          <?php if ($controller->M_template->count_pengguna() > 0 || $controller->M_template->count_sewa(1) > 0 || $controller->M_template->count_sewa(3) > 0 || $controller->M_template->count_sewa(6) > 0) {?>
            <span class="badge badge-info">
              <?= $controller->M_template->count_pengguna()+$controller->M_template->count_sewa(1)+$controller->M_template->count_sewa(3)+$controller->M_template->count_sewa(6);?>
            </span>
          <?php }?>
        </a>
        <div class="dropdown-menu dropdown-menu-right border-0 shadow animated--fade-in-up" aria-labelledby="navbarDropdownAlerts">
          <h6 class="dropdown-header dropdown-notifications-header">
            <i class="mr-2" data-feather="bell"></i>
            Pemberitahuan
          </h6>
          <?php if ($controller->M_template->count_pengguna() > 0 || $controller->M_template->count_sewa(1) > 0 || $controller->M_template->count_sewa(3) > 0 || $controller->M_template->count_sewa(6) > 0) {?>
            <?php if ($controller->M_template->count_pengguna() > 0) {?>
              <a class="dropdown-item dropdown-notifications-item" href="<?php echo site_url('DataPengguna');?>">
                <div class="dropdown-notifications-item-icon bg-primary"><i data-feather="user-check"></i></div>
                <div class="dropdown-notifications-item-content">
                  <div class="dropdown-notifications-item-content-details">Verifikasi pengguna</div>
                  <div class="dropdown-notifications-item-content-text"><span class="badge badge-primary"><?= $controller->M_template->count_pengguna();?></span> pengguna belum diverifikasi!</div>
                </div>
              </a>
            <?php }?>
            <?php if ($controller->M_template->count_sewa(1) > 0) {?>
              <a class="dropdown-item dropdown-notifications-item" href="<?php echo site_url('Pesanan/Verifikasi');?>">
                <div class="dropdown-notifications-item-icon bg-success"><i data-feather="credit-card"></i></div>
                <div class="dropdown-notifications-item-content">
                  <div class="dropdown-notifications-item-content-details">Konfirmasi pembayaran</div>
                  <div class="dropdown-notifications-item-content-text"><span class="badge badge-success"><?= $controller->M_template->count_sewa(1);?></span> pesanan belum dikonfirmasi bukti pembayaran!</div>
                </div>
              </a>
            <?php }?>
            <?php if ($controller->M_template->count_sewa(3) > 0) {?>
              <a class="dropdown-item dropdown-notifications-item" href="<?php echo site_url('Pengiriman/Dikemas');?>">
                <div class="dropdown-notifications-item-icon bg-warning"><i data-feather="package"></i></div>
                <div class="dropdown-notifications-item-content">
                  <div class="dropdown-notifications-item-content-details">Pesanan sedang dikemas</div>
                  <div class="dropdown-notifications-item-content-text"><span class="badge badge-warning"><?= $controller->M_template->count_sewa(3);?></span> pesanan sedang dikemas!</div>
                </div>
              </a>
            <?php }?>
            <?php if ($controller->M_template->count_sewa(6) > 0) {?>
              <a class="dropdown-item dropdown-notifications-item" href="<?php echo site_url('Pengiriman/Kembali');?>">
                <div class="dropdown-notifications-item-icon bg-muted"><i data-feather="truck"></i></div>
                <div class="dropdown-notifications-item-content">
                  <div class="dropdown-notifications-item-content-details">Proses pengembalian</div>
                  <div class="dropdown-notifications-item-content-text"><span class="badge badge-primary"><?= $controller->M_template->count_sewa(6);?></span> pesanan dalam proses pengembalian!</div>
                </div>
              </a>
            <?php }?>
          <?php }else{?>
            <a class="dropdown-item dropdown-notifications-item">
              <div class="dropdown-notifications-item-content">
                <div class="dropdown-notifications-item-content-text">Tidak ada pemberitahuan.</div>
              </div>
            </a>
          <?php }?>
        </div>
      </li>
      <li class="nav-item dropdown no-caret mr-2 dropdown-user">
        <a class="btn btn-icon btn-transparent-dark dropdown-toggle" id="navbarDropdownUserImage" href="javascript:void(0);" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img class="img-fluid" src="https://source.unsplash.com/QAB-WJcbgJk/60x60"/></a>
        <div class="dropdown-menu dropdown-menu-right border-0 shadow animated--fade-in-up" aria-labelledby="navbarDropdownUserImage">
          <h6 class="dropdown-header d-flex align-items-center">
            <img class="dropdown-user-img" src="https://source.unsplash.com/QAB-WJcbgJk/60x60" />
            <div class="dropdown-user-details">
              <div class="dropdown-user-details-name">Admin Mamamoorental</div>
            </div>
          </h6>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="<?php echo site_url('Keluar');?>">
            <div class="dropdown-item-icon"><i data-feather="log-out"></i></div>
            Keluar
          </a>
        </div>
      </li>
    </ul>
  </nav>
  <div id="layoutSidenav">
    <div id="layoutSidenav_nav">
      <nav class="sidenav shadow-right sidenav-light">
        <div class="sidenav-menu">
          <div class="nav accordion" id="accordionSidenav">
            <div class="sidenav-menu-heading">Main</div>
            <a class="nav-link" href="<?php echo site_url('Admin');?>">
              <div class="nav-link-icon"><i data-feather="trello"></i></div>
              Dashboard
            </a>
            <a class="nav-link" href="<?php echo site_url('Statistik');?>">
              <div class="nav-link-icon"><i data-feather="activity"></i></div>
              Statistik
            </a>
            <a class="nav-link" href="<?php echo site_url('Voucher');?>">
              <div class="nav-link-icon"><i data-feather="percent"></i></div>
              Voucher
            </a>
            <a class="nav-link" href="<?php echo site_url('Pengaturan');?>">
              <div class="nav-link-icon"><i data-feather="settings"></i></div>
              Pengaturan
            </a>
            <div class="sidenav-menu-heading">Berkas</div>
            <a class="nav-link" href="<?php echo site_url('DataPengguna');?>">
              <div class="nav-link-icon"><i data-feather="users"></i></div>
              Data Pengguna
            </a>
            <a class="nav-link" href="<?php echo site_url('DataInventaris');?>">
              <div class="nav-link-icon"><i data-feather="package"></i></div>
              Data Inventaris
            </a>
            <div class="sidenav-menu-heading">Persewaan</div>
            <a class="nav-link" href="<?php echo site_url('Pesanan/Ditolak');?>">
              <div class="nav-link-icon"><i data-feather="clipboard"></i></div>
              Permintaan Ditolak
              <?php if ($controller->M_template->count_sewa(99) > 0) {?> <span class="badge badge-danger ml-1"><?= $controller->M_template->count_sewa(99);?></span> <?php }?>
            </a>
            <a class="nav-link" href="<?php echo site_url('Pesanan/Verifikasi');?>">
              <div class="nav-link-icon"><i data-feather="clipboard"></i></div>
              Permintaan Sewa
            </a>
            <a class="nav-link" href="<?php echo site_url('Pengiriman/Dikemas');?>">
              <div class="nav-link-icon"><i data-feather="box"></i></div>
              Sedang Dikemas
            </a>
            <a class="nav-link" href="<?php echo site_url('Pengiriman/dikirim');?>">
              <div class="nav-link-icon"><i data-feather="truck"></i></div>
              Sedang Dikirim
              <?php if ($controller->M_template->count_sewa(4) > 0) {?> <span class="badge badge-orange ml-1"><?= $controller->M_template->count_sewa(4);?></span> <?php }?>
            </a>
            <a class="nav-link" href="<?php echo site_url('Pesanan/Disewa');?>">
              <div class="nav-link-icon"><i data-feather="cast"></i></div>
              Sedang Disewa
              <?php if ($controller->M_template->count_sewa(5) > 0) {?> <span class="badge badge-teal ml-1"><?= $controller->M_template->count_sewa(5);?></span> <?php }?>
            </a>
            <a class="nav-link" href="<?php echo site_url('Pengiriman/Kembali');?>">
              <div class="nav-link-icon"><i data-feather="git-pull-request"></i></div>
              Proses Pengembalian
            </a>
            <div class="sidenav-menu-heading">Deposit</div>
            <a class="nav-link" href="<?php echo site_url('Deposit/Permintaan');?>">
              <div class="nav-link-icon"><i data-feather="shopping-bag"></i></div>
              Permintaan Deposit
            </a>
            <a class="nav-link" href="<?php echo site_url('Deposit/Saldo');?>">
              <div class="nav-link-icon"><i data-feather="dollar-sign"></i></div>
              Saldo Pengguna
            </a>
            <div class="sidenav-menu-heading">Laporan</div>
            <a class="nav-link" href="<?php echo site_url('Laporan/Transaksi');?>">
              <div class="nav-link-icon"><i data-feather="file-text"></i></div>
              Transaksi Sewa
            </a>
            <a class="nav-link" href="<?php echo site_url('Laporan/Deposit');?>">
              <div class="nav-link-icon"><i data-feather="file-plus"></i></div>
              Transaksi Deposit
            </a>
          </div>
        </div>
        <div class="sidenav-footer">
          <div class="sidenav-footer-content">
            <div class="sidenav-footer-subtitle">Masuk sebagai:</div>
            <div class="sidenav-footer-title">Admin Mamamoorental</div>
          </div>
        </div>
      </nav>
    </div>
    <div id="layoutSidenav_content">
      <?php if($this->session->flashdata('alert')) { ?>
        <div class="modal fade" id="notifikasi" role="dialog" tabindex="-1" >
          <div class="modal-dialog modal-dialog-centered" role="document">
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-body">
                <button type="button" class="close alcs" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <div class="alert alert-warning alert-icon shadow" style="margin: 0px !important; padding:10px !important" role="alert">
                  <p><b>Opss !!</b><br>
                    <?php echo $this->session->flashdata('alert'); ?></p>
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
        <?php }elseif ($this->session->flashdata('success')) {?>
          <div class="modal fade" id="notifikasi" role="dialog" tabindex="-1" >
            <div class="modal-dialog modal-dialog-centered" role="document">
              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-body">
                  <button type="button" class="close alcs" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  <div class="alert alert-success alert-icon shadow" style="margin: 0px !important; padding:10px !important" role="alert">
                    <p><b>Berhasil !!</b><br>
                      <?php echo $this->session->flashdata('success'); ?></p>
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
          <?php }elseif ($this->session->flashdata('error')) {?>
            <div class="modal fade" id="notifikasi" role="dialog" tabindex="-1" >
              <div class="modal-dialog modal-dialog-centered" role="document">
                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-body">
                    <button type="button" class="close alcs" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="alert alert-danger alert-icon shadow" style="margin: 0px !important; padding:10px !important" role="alert">
                      <p><b>Berhasil !!</b><br>
                        <?php echo $this->session->flashdata('error'); ?></p>
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
            <?php } ?>
            <main>
              <!-- Main page content-->
              <div class="container mt-5">
                <?php $this->load->view($module.'/'.$fileview); ?>
              </div>
            </main>
            <footer class="footer mt-auto footer-light">
              <div class="container-fluid">
                <div class="row">
                  <div class="col-md-6 small">Copyright &#xA9; MAMAMOORENTAL 2020</div>
                </div>
              </div>
            </footer>
          </div>
        </div>

        <script src="<?php echo base_url();?>assets/backend/js/scripts.js"></script>
        <script src="<?php echo base_url();?>assets/backend/js/plugin/Chart.js/2.9.3/Chart.min.js"></script>
        <script src="<?php echo base_url();?>assets/backend/js/plugin/momentjs/moment.min.js"></script>
        <script src="<?php echo base_url();?>assets/backend/js/plugin/daterangepicker/daterangepicker.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
        <script src="<?php echo base_url();?>assets/backend/js/demo/date-range-picker-demo.js"></script>
        <script type="text/javascript">
        $(document).ready(function() {
          var table = $('#dataTable').DataTable( {
            scrollX:        true,
            "autoWidth": false,
          } );
        } );
        $(document).ready(function() {
          $('.select2').select2({
            placeholder: "Pilih data",
            allowClear: true
          });
        });
        </script>
      </body>
      </html>
