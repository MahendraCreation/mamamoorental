<!-- Custom page header alternative example-->
<div class="d-flex justify-content-between align-items-sm-center flex-column flex-sm-row mb-2 mt-0">
  <div class="mr-4 mb-3 mb-sm-0">
    <h1 class="mb-0">Dashboard</h1>
    <div class="small">
      <span class="font-weight-500 text-primary"><?php echo date("l");?></span>
      &#xB7; <?php echo date("j F Y");?> &#xB7; <?php echo date("H:i");?>
    </div>
  </div>
</div>


<div class="row">
  <div class="col-xl-3 col-md-6 mb-4">
    <!-- Dashboard info widget 1-->
    <div class="card border-top-0 border-bottom-0 border-right-0 border-left-lg border-primary h-100">
      <div class="card-body">
        <div class="d-flex align-items-center">
          <div class="flex-grow-1">
            <div class="small font-weight-bold text-primary mb-1">Jumlah Pengguna</div>
            <div class="h5"><?= $jml_pengguna;?></div>
            <div class="text-xs font-weight-bold text-success d-inline-flex align-items-center">
              <i class="mr-1" data-feather="trending-up"></i>
            </div>
          </div>
          <div class="ml-2"><i class="fas fa-users fa-2x text-gray-200"></i></div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-md-6 mb-4">
    <!-- Dashboard info widget 1-->
    <div class="card border-top-0 border-bottom-0 border-right-0 border-left-lg border-primary h-100">
      <div class="card-body">
        <div class="d-flex align-items-center">
          <div class="flex-grow-1">
            <div class="small font-weight-bold text-primary mb-1">Jumlah Produk</div>
            <div class="h5"><?= $jml_produk;?></div>
            <div class="text-xs font-weight-bold text-success d-inline-flex align-items-center">
              <i class="mr-1" data-feather="trending-up"></i>

            </div>
          </div>
          <div class="ml-2"><i class="fas fa-box fa-2x text-gray-200"></i></div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-md-6 mb-4">
    <!-- Dashboard info widget 1-->
    <div class="card border-top-0 border-bottom-0 border-right-0 border-left-lg border-primary h-100">
      <div class="card-body">
        <div class="d-flex align-items-center">
          <div class="flex-grow-1">
            <div class="small font-weight-bold text-primary mb-1">Jumlah Transaksi</div>
            <div class="h5"><?= $jml_transaksi;?></div>
            <div class="text-xs font-weight-bold text-success d-inline-flex align-items-center">
              <i class="mr-1" data-feather="trending-up"></i>

            </div>
          </div>
          <div class="ml-2"><i class="fas fa-shopping-cart fa-2x text-gray-200"></i></div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-md-6 mb-4">
    <!-- Dashboard info widget 1-->
    <div class="card border-top-0 border-bottom-0 border-right-0 border-left-lg border-primary h-100">
      <div class="card-body">
        <div class="d-flex align-items-center">
          <div class="flex-grow-1">
            <div class="small font-weight-bold text-primary mb-1">Saldo Pendapatan</div>
            <div class="h5">Rp.<?= number_format($jml_pendapatan,0,",",".");?></div>
            <div class="text-xs font-weight-bold text-success d-inline-flex align-items-center">
              <i class="mr-1" data-feather="trending-up"></i>

            </div>
          </div>
          <div class="ml-2"><i class="fas fa-dollar-sign fa-2x text-gray-200"></i></div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Illustration dashboard card example-->
<div class="card card-waves mb-4">
  <div class="card-body p-5">
    <div class="row align-items-center justify-content-between">
      <div class="col-md-7">
        <h2 class="text-primary">Selamat Datang, admin mamamoorental !!</h2>
        <p class="text-gray-700">Jika terdapat masalah, anda dapat mengirim email ke tim kami. developpertech@gmail.com atau dengan menekan tombol dibawah ini.</p>
        <a class="btn btn-primary btn-sm px-3 py-2" target="_blank" href="mailto:developpertech@gmail.com">Kirim email <i class="ml-1" data-feather="arrow-right"></i></a>
        <br class="mt-0 mb-1"><small class="small text-muted">Technical support berlaku pada kesalahan/bug tidak berlaku untuk penambahan fitur.</small>
      </div>
      <div class="col-md-5 d-none d-lg-block mt-xxl-n4"><img class="img-fluid px-xl-4 mt-xxl-n5" src="<?php echo base_url();?>assets/backend/img/freepik/statistics-pana.svg" /></div>
    </div>
  </div>
</div>
