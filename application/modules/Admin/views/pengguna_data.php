<!-- Custom page header alternative example-->
<div class="d-flex justify-content-between align-items-sm-center flex-column flex-sm-row mb-2">
  <div class="mr-4 mb-3 mb-sm-0">
    <h1 class="mb-0">Data Pengguna</h1>
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
            <div class="text-sm font-weight-bold text-success text-uppercase mb-1">Total Pengguna</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $total_pengguna;?> Pengguna</div>
          </div>
          <div class="col-auto">
            <i class="fa fa-users fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Earnings (Monthly) Card Example -->
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-sm font-weight-bold text-primary text-uppercase mb-1">Terverifikasi</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $pengguna_verif;?> Pengguna</div>
          </div>
          <div class="col-auto">
            <i class="fa fa-check-circle fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Earnings (Monthly) Card Example -->
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-warning shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-sm font-weight-bold text-warning text-uppercase mb-1">Belum diverifikasi</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $pengguna_belum;?> Pengguna</div>
          </div>
          <div class="col-auto">
            <i class="fa fa-gavel fa-2x text-gray-300"></i>
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
              <th>Detail</th>
              <th>Nama</th>
              <th>Email</th>
              <th>HP</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            <?php if ($get_pengguna == false) { echo "<tr><td colspan='8'>Belum ada data</td></tr>";}else{ $no = 1; foreach ($get_pengguna as $data) {?>
              <tr>
                <td><?= $no;?></td>
                <td>
                  <a href="<?php echo site_url('Pengguna/'.$data->KODE_PERSONAL);?>" class="btn btn-datatable btn-icon btn-transparent-dark mr-2"><i class="fa fa-eye"></i></a>
                </td>
                <td><?= $data->NAMA;?></td>
                <td><?= $data->EMAIL;?></td>
                <td><?= $data->HP;?></td>
                <td><?php if($data->VERIFIKASI == 1){echo "<span class='badge badge-primary'><i class='fa fa-check-circle'></i> Active</span>";}else{echo "<span class='badge badge-danger'><i class='fa fa-circle'></i> Non-active</span>";}?></td>
              </tr>
              <?php $no++;}}?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
