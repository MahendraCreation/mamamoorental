<style>
th, td { white-space: nowrap; }
</style>
<!-- Custom page header alternative example-->
<div class="d-flex justify-content-between align-items-sm-center flex-column flex-sm-row mb-2">
  <div class="mr-4 mb-3 mb-sm-0">
    <h1 class="mb-0">Riwayat Data Transaksi</h1>
  </div>
</div>
<hr>
<div class="row mb-3">
  <div class="col-md-12">
    <div class="row">
      <div class="col-md-6">
        <form action="<?php echo site_url('Laporan/Transaksi');?>" method="post" class="form-horizontal">
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <input type="date" name="mulai" class="form-control form-control-sm" value="<?= $mulai;?>">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <input type="date" name="berakhir" class="form-control form-control-sm" value="<?= $berakhir;?>">
              </div>
            </div>
            <div class="col-md-3">
              <button type="submit" class="btn btn-primary btn-sm">Tampilkan</button>
            </div>
          </div>
        </form>
      </div>
      <div class="col-md-6">
        <form action="<?php echo site_url('Excel/CreateSewa');?>" method="post" class="form-horizontal">

          <input type="hidden" name="mulai" value="<?= $mulai;?>">
          <input type="hidden" name="berakhir" value="<?= $berakhir;?>">

          <button type="submit" class="btn btn-success btn-sm float-right">Eksport .xls</button>
        </form>
      </div>
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
              <th>Kode Transaksi</th>
              <th>Nama</th>
              <th>KODE UNIT</th>
              <th>Total</th>
              <th>WAKTU PEMBAYARAN</th>
            </tr>
          </thead>
          <tbody>
            <?php if ($pesanan == false) { echo "<tr><td colspan='8'><center>Belum ada data</center></td></tr>";}else{ $no = 1; foreach ($pesanan as $data) {?>
              <tr>
                <td><?= $no;?></td>
                <td><a href="<?php echo site_url('Pesanan/Detail/'.$data->KODE_TRANSAKSI);?>" class="btn btn-info btn-sm ml-1">Detail Pesanan</a></td>
                <td><?= $data->KODE_TRANSAKSI;?></td>
                <td><?= $data->NAMA;?></td>
                <td><?= $data->KODE_UNIT;?></td>
                <td>Rp.<?= number_format($data->TOTAL,0,",",".");?></td>
                <td>
                  <?php if(empty($data->WAKTU_PEMBAYARAN) || $data->WAKTU_PEMBAYARAN == null){ echo '<span class="text-info">Menunggu proses sebelumnya</span>';}else{ echo '<span class="text text-primary font-weight-bold">Pukul '.str_replace(", ", " - Tanggal: ", $data->WAKTU_PEMBAYARAN).'</span> WIB';};?>
                  </td>
                </tr>
                <?php $no++;}}?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
