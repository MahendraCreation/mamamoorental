<style>
th, td { white-space: nowrap; }
</style>
<!-- Custom page header alternative example-->
<div class="d-flex justify-content-between align-items-sm-center flex-column flex-sm-row mb-2">
  <div class="mr-4 mb-3 mb-sm-0">
    <h1 class="mb-0">Data Produk</h1>
    <div class="small">
    </div>
  </div>
  <a href="<?php echo site_url('TambahProduk');?>" class="btn btn-primary float-right btn-sm"> <i class="fa fa-box mr-2"></i> Tambah Produk</a>
</div>
<hr>
<div class="row">
  <div class="col-12">
    <!-- Dashboard info widget 1-->
    <div class="card shadow-sm">
      <div class="card-body">
        <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
          <?php if ($produk == false) { echo "<tr><td>Belum ada data</td></tr>";}else{ ?>
          <thead>
            <tr>
              <th rowspan="2" style="vertical-align: middle;">Aksi</th>
              <th colspan="7"><center>UNIT</center></th>
              <th rowspan="2" style="vertical-align: middle;">Harga Beli</th>
              <th rowspan="2" style="vertical-align: middle;">Tanggal Beroperasi</th>
              <th rowspan="2" style="vertical-align: middle;">Kondisi Awal</th>
            </tr>
            <tr>
              <th>Kode</th>
              <th>Nama Produk</th>
              <th>Kategori</th>
              <th>Brand</th>
              <th>Series</th>
              <th>Varian</th>
              <th>Grade</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1; foreach ($produk as $data) {?>
              <tr>
                <td>
                  <a href="<?php echo site_url('EditProduk/'.$data->KODE_UNIT);?>" class="btn btn-info btn-sm"> <i class="fa fa-edit"></i></a>
                  <a href="<?php echo site_url('Produk/'.$data->KODE_UNIT);?>" target="_blank" class="btn btn-light btn-sm"> <i class="fa fa-eye"></i></a>
                  <?php if ($controller->M_admin->cek_produk($data->KODE_UNIT) > 0) { ?>
                    <button type="button" class="btn btn-light btn-sm" data-toggle="modal" data-target="#error<?= $data->KODE_UNIT;?>"> <i class="fa fa-eraser"></i> </button>
                  <?php }else{?>
                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus<?= $data->KODE_UNIT;?>"> <i class="fa fa-eraser"></i> </button>
                  <?php }?>
                </td>
                <td><?= $data->KODE_UNIT_U;?></td>
                <td><?= substr($data->NAMA_PRODUK, 0, 25);?>...</td>
                <td><span class="badge <? $a = rand(1, 4); if($a == 1){ echo "badge-primary";}elseif($a == 2){echo "badge-info"; }elseif($a == 3){echo"badge-warning";}else{echo "badge-orange";}?>"><?= $data->NAMA_KATEGORI;?></span></td>
                <td><?= $data->MERK;?></td>
                <td><?= $data->TYPE;?></td>
                <td><?= $data->VARIAN;?></td>
                <td><?= $data->GRADE;?></td>
                <td>Rp. <?= number_format($data->HARGA_BELI,0,",",".");?></td>
                <td><?= date("d F Y", strtotime($data->TGL_BEROPERASI));?></td>
                <td><?= $data->KONDISI_AWAL;?></td>
              </tr>

              <!-- MODAL hapus -->
              <div id="error<?= $data->KODE_UNIT;?>" class="modal fade" role="dialog" tabindex="-1" >
                <div class="modal-dialog" role="document">
                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header bg-info">
                      <h5 class="modal-title text-white">Produk <b><?= substr($data->NAMA_PRODUK, 0, 25);?>...</b></h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body">

                      <p>Produk: <b><?= $data->NAMA_PRODUK;?></b> masih dalam tahap proses transaksi. Anda tidak dapat menghapus produk ini.</p>

                      <!-- Modal footer -->
                      <div class="modal-footer">
                        <button type="button" class="btn btn-info btn-sm" data-dismiss="modal">Batal</button>
                        </div
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- MODAL hapus -->
              <div id="hapus<?= $data->KODE_UNIT;?>" class="modal fade" role="dialog" tabindex="-1" >
                <div class="modal-dialog" role="document">
                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header bg-danger">
                      <h5 class="modal-title text-white">Hapus Produk <b><?= substr($data->NAMA_PRODUK, 0, 25);?>...</b></h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body">
                      <form class="form-horizontal" action="<?php echo site_url('Admin/hapus_produk');?>" method="post">
                        <input type="hidden" name="KODE_UNIT" value="<?= $data->KODE_UNIT;?>">
                        <input type="hidden" name="NAMA_PRODUK" value="<?= $data->NAMA_PRODUK;?>">

                        <p>Apakah anda yakin akan menghapus data produk  <b><?= $data->NAMA_PRODUK;?></b> </p>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                          <button type="button" class="btn btn-light btn-sm" data-dismiss="modal">Batal</button>
                          <button type="submit" class="btn btn-danger btn-sm">Hapus data</button>
                        </div>
                      </form>
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
