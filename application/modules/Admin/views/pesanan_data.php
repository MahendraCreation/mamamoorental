<!-- Custom page header alternative example-->
<div class="d-flex justify-content-between align-items-sm-center flex-column flex-sm-row mb-2">
  <div class="mr-4 mb-3 mb-sm-0">
    <h1 class="mb-0">Dashboard</h1>
    <div class="small">
      <span class="font-weight-500 text-primary"><?php echo date("l");?></span>
      &#xB7; <?php echo date("j F Y");?> &#xB7; <?php echo date("H:i");?>
    </div>
  </div>
</div>
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
                  <a href="<?php echo site_url('Penggunga/'.$data->KODE_PERSONAL);?>" class="btn btn-datatable btn-icon btn-transparent-dark mr-2"><i class="fa fa-eye"></i></a>
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
