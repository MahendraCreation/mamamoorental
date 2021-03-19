<style>
th, td { white-space: nowrap; }
</style>
<!-- Custom page header alternative example-->
<div class="d-flex justify-content-between align-items-sm-center flex-column flex-sm-row mb-2">
  <div class="mr-4 mb-3 mb-sm-0">
    <h1 class="mb-0">Permintaan pengisian SALDO Deposit</h1>
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
            <div class="text-sm font-weight-bold text-success text-uppercase mb-1">Total Permintaan</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $total_topup;?> Permintaan</div>
          </div>
          <div class="col-auto">
            <i class="fa fa-coins fa-2x text-gray-300"></i>
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
            <div class="text-sm font-weight-bold text-primary text-uppercase mb-1">Belum Verifikasi</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $topup_belver;?> Permintaan</div>
          </div>
          <div class="col-auto">
            <i class="fa fa-check-circle fa-2x text-gray-300"></i>
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
              <th>Aksi</th>
              <th>Kode Transaksi</th>
              <th>Nama</th>
              <th>Jumlah Pengisian</th>
              <th>Waktu Pembayaran</th>
              <th>Bukti</th>
            </tr>
          </thead>
          <tbody>
            <?php if ($pesanan == false) { echo "<tr><td colspan='8'><center>Belum ada data</center></td></tr>";}else{ $no = 1; foreach ($pesanan as $data) {?>
              <tr>
                <td><?= $no;?></td>
                <td>
                  <a href="<?php echo site_url('Deposit/Detail/'.$data->ID_TOPUP.'-'.$data->KODE_PERSONAL);?>" class="btn btn-info btn-sm">Detail</a>
                  <button type="button" class="btn btn-success btn-sm ml-1" data-toggle="modal" data-target="#verifikasi<?= $no; ?>">Konfirmasi</button>
                </td>
                <td>D_<?= $data->ID_TOPUP;?>-<?= $data->KODE_PERSONAL;?></td>
                <td><?= $data->NAMA;?></td>
                <td>Rp.<?= number_format($data->JUMLAH,0,",",".");?></td>
                <td><?php if(empty($data->WAKTU_PEMBAYARAN) || $data->WAKTU_PEMBAYARAN == null){ echo '<span class="text-info">Menunggu proses sebelumnya</span>';}else{ echo '<span class="text text-primary">Pukul '.str_replace(", ", " - Tanggal: ", $data->WAKTU_PEMBAYARAN).'</span> WIB';};?></td>
                <td><button type="button" class="btn btn-info btn-sm btn-block" data-toggle="modal" data-target="#bukti<?= $no;?>">Lihat</button></td>
              </tr>
              <!-- MODAL karya -->
              <div id="bukti<?= $no;?>" class="modal fade" role="dialog" tabindex="-1" >
                <div class="modal-dialog" role="document">
                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header bg-success">
                      <h5 class="modal-title text-white">Bukti pembayaran - <b><?php echo $data->NAMA;?></b></h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body">
                      <img src="<?php echo base_url();?>file/site/pengguna/<?php echo $data->KODE_PERSONAL;?>/TopUp/<?php echo $data->BUKTI;?>" alt="" width="100%" height="auto">
                      <a href="<?php echo base_url();?>file/site/pengguna/<?php echo $data->KODE_PERSONAL;?>/TopUp/<?php echo $data->BUKTI;?>" class="text-success" target="_blank">Buka di tab baru</a>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                      <button type="button" class="btn btn-light btn-sm" data-dismiss="modal">TUTUP</button>
                    </div>

                  </div>
                </div>
              </div>
              <!-- MODAL karya -->
              <div id="verifikasi<?= $no;?>" class="modal fade" role="dialog" tabindex="-1" >
                <div class="modal-dialog" role="document">
                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header bg-primary">
                      <h5 class="modal-title text-white">Verifikasi transaksi An. <b><?php echo $data->NAMA;?></b></h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body">
                      <p>Apakah anda yakin ingin memverifikasi transaksi ini? Pastikan <b>TRANSFER</b>, dan <b>BUKTI PEMBAYARAN</b> telah benar </p>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                      <button type="button" class="btn btn-light btn-sm" data-dismiss="modal">Batal</button>
                      <a href="<?php echo site_url('VerifikasiDeposit/'.$data->ID_TOPUP.'-'.$data->KODE_PERSONAL);?>" class="btn btn-primary btn-sm">Verifikasi</a>
                    </div>

                  </div>
                </div>
              </div>
              <?php $no++;}}?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
