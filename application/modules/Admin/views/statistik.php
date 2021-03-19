<!-- Custom page header alternative example-->
<div class="d-flex justify-content-between align-items-sm-center flex-column flex-sm-row mb-2 mt-0">
  <div class="mr-4 mb-3 mb-sm-0">
    <h1 class="mb-0">Statistik Toko</h1>
    <div class="small">
      <span class="font-weight-500 text-primary"><?php echo date("F");?></span>
      &#xB7; <?php echo date("H:i");?> WIB
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
            <div class="small font-weight-bold text-primary mb-1">Transaksi Bulan Ini</div>
            <div class="h3"><?= $jml_transaksi;?> Pesanan</div>
            <div class="text-xs font-weight-bold text-success d-inline-flex align-items-center">
              <i class="mr-1" data-feather="money"></i>
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
            <div class="small font-weight-bold text-primary mb-1">Pendapatan Bulan Ini</div>
            <div class="h3">Rp.<?= number_format($jml_pendapatan,0,",",".");?></div>
            <div class="text-xs font-weight-bold text-success d-inline-flex align-items-center">
              <i class="mr-1" data-feather="trending-up"></i>
            </div>
          </div>
          <div class="ml-2"><i class="fas fa-dollar-sign fa-2x text-gray-200"></i></div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-xl-6 col-md-6 mb-4">
    <div class="card bg-primary border-0">
      <div class="card-body">
        <h5 class="text-white-50">Total Pendapatan</h5>
        <div class="mb-1">
          <span class="display-4 text-white">Rp.<?= number_format($jml_pendapatan,0,",",".");?></span>
        </div>
        <span class="text-white-50">Per tanggal: <?= date("d F Y");?></span>
      </div>
    </div>
  </div>
</div>
<hr class="mt-0">
<div class="row">
  <div class="col-lg-3 mb-4">
    <!-- Billing card 1-->
    <div class="card h-100 border-left-lg border-left-primary">
      <div class="card-body">
        <div class="small text-muted">Menunggu Konfirmasi</div>
        <div class="h3"><?= $controller->M_admin->count_sewa(1)?> Pesanan</div>
        <a class="text-arrow-icon small text-info">
          Pesanan belum dikonfirmasi bukti pembayaran
        </a>
      </div>
    </div>
  </div>
  <div class="col-lg-3 mb-4">
    <!-- Billing card 1-->
    <div class="card h-100 border-left-lg border-left-primary">
      <div class="card-body">
        <div class="small text-muted">Sedang Dikemas</div>
        <div class="h3"><?= $controller->M_admin->count_sewa(3)?> Pesanan</div>
        <a class="text-arrow-icon small text-info">
          Pesanan dalam proses pengemasan
        </a>
      </div>
    </div>
  </div>
  <div class="col-lg-3 mb-4">
    <!-- Billing card 1-->
    <div class="card h-100 border-left-lg border-left-primary">
      <div class="card-body">
        <div class="small text-muted">Sedang Disewa</div>
        <div class="h3"><?= $controller->M_admin->count_sewa(5)?> Pesanan</div>
        <a class="text-arrow-icon small text-info">
          Pesanan sedang disewa pelanggan
        </a>
      </div>
    </div>
  </div>
  <div class="col-lg-3 mb-4">
    <!-- Billing card 1-->
    <div class="card h-100 border-left-lg border-left-primary">
      <div class="card-body">
        <div class="small text-muted">Pengembalian</div>
        <div class="h3"><?= $controller->M_admin->count_sewa(6)?> Pesanan</div>
        <a class="text-arrow-icon small text-info">
          Pesanan dalam proses pengembalian
        </a>
      </div>
    </div>
  </div>
</div>
