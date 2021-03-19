<style>
th, td { white-space: nowrap; }
</style>
<!-- Custom page header alternative example-->
<div class="d-flex justify-content-between align-items-sm-center flex-column flex-sm-row mb-2">
  <div class="mr-4 mb-3 mb-sm-0">
    <h1 class="mb-0">Produk Knowledge</h1>
    <div class="small">
      <span class="font-weight-500 text-primary"><?php echo date("l");?></span>
      &#xB7; <?php echo date("j F Y");?> &#xB7; <?php echo date("H:i");?>
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
              <th>Brand</th>
              <th>Series</th>
              <th>Varian</th>
              <th>Grade</th>
              <th>Kode</th>
              <th>Unit</th>
              <th>Detail</th>
            </tr>
          </thead>
          <tbody>
            <?php if ($produk == false) { echo "<tr><td colspan='8'>Belum ada data</td></tr>";}else{ $no = 1; foreach ($produk as $data) {?>
              <tr>
                <td><?= $no;?></td>
                <td><?= $data->MERK;?></td>
                <td><?= $data->TYPE;?></td>
                <td><?= $data->VARIAN;?></td>
                <td><?= $data->GRADE;?></td>
                <td></td>
                <td></td>
                <td>
                  <a href="<?php echo site_url('DataInventaris/Detail/'.$data->KODE_UNIT);?>" class="btn btn-datatable btn-icon btn-transparent-dark mr-2"><i class="fa fa-eye"></i></a> <a href="<?php echo site_url('DataInventaris/Detail/'.$data->KODE_UNIT);?>" class="btn btn-datatable btn-icon btn-transparent-info mr-2"><i class="fa fa-edit"></i></a>
                    <a href="<?php echo site_url('DataInventaris/Detail/'.$data->KODE_UNIT);?>" class="btn btn-datatable btn-icon btn-transparent-danger mr-2"><i class="fa fa-eraser"></i></a>
                </td>
              </tr>
              <?php $no++;}}?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
