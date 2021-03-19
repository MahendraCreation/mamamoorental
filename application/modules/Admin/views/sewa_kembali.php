<style>
th, td { white-space: nowrap; }
</style>
<!-- Custom page header alternative example-->
<div class="d-flex justify-content-between align-items-sm-center flex-column flex-sm-row mb-2">
  <div class="mr-4 mb-3 mb-sm-0">
    <h1 class="mb-0">Pesanan sedang dikembalikan</h1>
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
              <th>Aksi</th>
              <th>Kode Transaksi</th>
              <th>Nama</th>
              <th>KODE UNIT</th>
              <th>WAKTU Pengembalian</th>
            </tr>
          </thead>
          <tbody>
            <?php if ($pesanan == false) { echo "<tr><td colspan='8'><center>Belum ada data</center></td></tr>";}else{ $no = 1; foreach ($pesanan as $data) {?>
              <tr>
                <td><?= $no;?></td>
                <td><button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#diterima<?= $no;?>">Terima Pesanan</button> <a href="<?php echo site_url('Pesanan/Detail/'.$data->KODE_TRANSAKSI);?>" class="btn btn-info btn-sm ml-1">Detail Pesanan</a></td>
                <td><?= $data->KODE_TRANSAKSI;?></td>
                <td><?= $data->NAMA;?></td>
                <td><?= $data->KODE_UNIT;?></td>
                <td>
                <?php if(empty($data->WAKTU_KEMBALI) || $data->WAKTU_KEMBALI == null){ echo '<span class="text-info">Menunggu proses sebelumnya</span>';}else{ echo '<span class="text text-indo ">Pukul '.str_replace(", ", " - Tanggal: ", $data->WAKTU_KEMBALI).'</span> WIB';};?>
                </td>
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
                      <img src="<?php echo base_url();?>file/site/pengguna/<?php echo $data->KODE_PERSONAL;?>/bukti_bayar/<?php echo $data->bukti;?>" alt="" width="100%" height="auto">
                      <a href="<?php echo base_url();?>file/site/pengguna/<?php echo $data->KODE_PERSONAL;?>/bukti_bayar/<?php echo $data->bukti;?>" class="text-success" target="_blank">Buka di tab baru</a>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                      <button type="button" class="btn btn-light btn-sm" data-dismiss="modal">TUTUP</button>
                    </div>

                  </div>
                </div>
              </div>
              <!-- MODAL karya -->
              <div id="diterima<?= $no;?>" class="modal fade" role="dialog" tabindex="-1" >
                <div class="modal-dialog modal-lg" role="document">
                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header bg-success">
                      <h5 class="modal-title text-white">Terima Pesanan An. <b><?php echo $data->NAMA;?></b></h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body">
                      <p>Dengan menerima pesanan ini, maka produk <b><?= $data->KODE_UNIT;?> - <?= $data->NAMA_PRODUK;?></b>, telah kembali ke inventaris MAMAMOORENTAL. Dan akan available kembali di TOKO. </p>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                      <button type="button" class="btn btn-light btn-sm" data-dismiss="modal">Batal</button>
                      <a href="<?php echo site_url('Pesanan/Diterima/'.$data->KODE_TRANSAKSI);?>" class="btn btn-success btn-sm">Terima Pesanan</a>
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
