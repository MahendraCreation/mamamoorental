<style>
th, td { white-space: nowrap; }
</style>
<!-- Custom page header alternative example-->
<div class="d-flex justify-content-between align-items-sm-center flex-column flex-sm-row mb-2">
  <div class="mr-4 mb-3 mb-sm-0">
    <h1 class="mb-0">Riwayat pengisian SALDO Deposit</h1>
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
              <th>Kode Transaksi</th>
              <th>Nama</th>
              <th>Jumlah Pengisian</th>
              <th>Waktu Pembayaran</th>
              <th>Waktu Verifikasi</th>
            </tr>
          </thead>
          <tbody>
            <?php if ($pesanan == false) { echo "<tr><td colspan='8'><center>Belum ada data</center></td></tr>";}else{ $no = 1; foreach ($pesanan as $data) {?>
              <tr>
                <td><?= $no;?></td>
                <td>
                  <a href="<?php echo site_url('Deposit/Detail/'.$data->ID_TOPUP.'-'.$data->KODE_PERSONAL);?>" class="btn btn-info btn-sm">Detail</a>
                </td>
                <td>D_<?= $data->ID_TOPUP;?>-<?= $data->KODE_PERSONAL;?></td>
                <td><?= $data->NAMA;?></td>
                <td>Rp.<?= number_format($data->JUMLAH,0,",",".");?></td>
                <td><?php if(empty($data->WAKTU_PEMBAYARAN) || $data->WAKTU_PEMBAYARAN == null){ echo '<span class="text-info">Menunggu proses sebelumnya</span>';}else{ echo '<span class="text text-success">Pukul '.str_replace(", ", " - Tanggal: ", $data->WAKTU_PEMBAYARAN).'</span> WIB';};?></td>
                <td><?php if(empty($data->WAKTU_VERIFIKASI) || $data->WAKTU_VERIFIKASI == null){ echo '<span class="text-warning">Menunggu proses sebelumnya</span>';}else{ echo '<span class="text text-primary">Pukul '.str_replace(", ", " - Tanggal: ", $data->WAKTU_VERIFIKASI).'</span> WIB';};?></span> WIB</td>
              </tr>
              <?php $no++;}}?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
