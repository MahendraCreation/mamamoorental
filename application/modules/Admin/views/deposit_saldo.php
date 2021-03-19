<style>
th, td { white-space: nowrap; }
</style>
<!-- Custom page header alternative example-->
<div class="d-flex justify-content-between align-items-sm-center flex-column flex-sm-row mb-2">
  <div class="mr-4 mb-3 mb-sm-0">
    <h1 class="mb-0">SALDO Deposit pengguna</h1>
    <div class="small">
      <span class="font-weight-500 text-primary"><?php echo date("l");?></span>
      &#xB7; <?php echo date("j F Y");?> &#xB7; <?php echo date("H:i");?>
    </div>
  </div>
</div>

<!-- Content Row -->
<div class="row">
  <!-- Earnings (Monthly) Card Example -->
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-sm font-weight-bold text-success text-uppercase mb-1">Total Saldo Pengguna</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800">Rp.<?php echo number_format($controller->M_admin->all_saldo(),0,",",".");?></div>
          </div>
          <div class="col-auto">
            <i class="fa fa-coins fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<hr>
<div class="row">
  <div class="col-12">
    <!-- Dashboard info widget 1-->
    <div class="card shadow-sm">
      <div class="card-body">
        <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>No</th>
              <th>KODE DEPOSIT</th>
              <th>Nama Pengguna</th>
              <th>Saldo</th>
              <th>Transaksi DEPOSIT</th>
            </tr>
          </thead>
          <tbody>
            <?php if ($pesanan == false) { echo "<tr><td colspan='8'><center>Belum ada data</center></td></tr>";}else{ $no = 1; foreach ($pesanan as $data) {?>
              <tr>
                <td><?= $no;?></td>
                <td><?= $data->KODE_DEPOSIT;?></td>
                <td><?= $data->NAMA;?></td>
                <td>Rp.<?= number_format($data->DEPOSIT,0,",",".");?></td>
                <td> <h3 class="badge badge-info"><?= $controller->M_admin->count_topup($data->KODE_PERSONAL);?> kali transaksi topup</h3> </td>
              </tr>
              <?php $no++;}}?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
