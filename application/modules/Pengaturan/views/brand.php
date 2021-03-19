<div class="d-flex justify-content-between align-items-sm-center flex-column flex-sm-row mb-2">
  <div class="mr-4 mb-3 mb-sm-0">
    <h1 class="mb-0">Brand produk</h1>
  </div>
</div>
<hr>

<!-- MODAL tambah -->
<div id="tambah" class="modal fade" role="dialog" tabindex="-1" >
  <div class="modal-dialog" role="document">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h5 class="modal-title text-white">Tambah data <b>Brand</b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
        <form class="form-horizontal" action="<?php echo site_url('Pengaturan/tambah_brand');?>" method="post">

          <div class="form-group">
            <label class="title">Nama brand</label>
            <input type="text" name="brand" maxlength="25" class="form-control" placeholder="Isikan nama brand">
          </div>

          <div class="form-group">
            <label class="title">KODE brand</label>
            <input type="text" name="kode" maxlength="3" class="form-control" maxlength="3" placeholder="Isikan kode brand">
            <small class="text-muted">Digunakan untuk bagian KODE UNIT, Max 3 karakter | <span class="text-danger">Anda hanya dapat mengatur ini satu kali</span>.</small>
          </div>

          <div class="form-group">
            <label class="title">Keterangan</label>
            <textarea type="text" name="keterangan" class="form-control" rows="3" placeholder="Isikan keterangan brand"></textarea>
          </div>

          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="button" class="btn btn-light btn-sm" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary btn-sm">Tambahkan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-8">
    <div class="card shadow-sm">
      <div class="card-header">Brand produk
        <button type="button" class="btn btn-sm btn-primary float-right" data-toggle="modal" data-target="#tambah"> <i class="fa fa-plus fa-xs"></i> Tambah Brand</button>
      </div>
      <div class="card-body">
        <table id="dataTable" class="table table-hover table-bordered" width="100%">
          <thead>
            <tr>
              <th>No</th>
              <th>Aksi</th>
              <th>Brand Produk</th>
              <th>Kode</th>
              <th>Keterangan</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1; if ($brand == FALSE) { echo "<tr><td colspan='4'>Belum ada data</td></tr>";}else{ $no = 1; foreach ($brand as $key) { ?>
              <tr>
                <td><?= $no;?></td>
                <td>
                  <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#edit<?= $no;?>"><i class="fa fa-edit fa-sm"></i></button>
                  <?php if($controller->M_pengaturan->kat_counter($key->ID_MERK) > 0){ ?>
                    <button type="button" class="btn btn-sm btn-light" data-toggle="modal" data-target="#error"><i class="fa fa-trash fa-sm"></i></button>
                  <?php }else{?>
                    <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#hapus<?= $no;?>"><i class="fa fa-trash fa-sm"></i></button>
                  <?php }?>
                </td>
                <td><?= $key->MERK;?> <span class="badge badge-info"><?= $controller->M_pengaturan->kat_counter($key->ID_MERK);?></span></td>
                <td><?= $key->KODE;?></td>
                <td><span classs="badge badge-primary"><?= isset($key->KETERANGAN) ? $key->KETERANGAN : 'Tidak ada';?></span></td>
              </tr>

              <!-- MODAL error -->
              <div id="error" class="modal fade" role="dialog" tabindex="-1" >
                <div class="modal-dialog" role="document">
                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Opps...</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body">
                      <p>Anda tidak dapat menghapus data brand, yang masih digunakan pada data produk</p>

                      <button type="button" class="btn btn-primary btn-sm float-right" data-dismiss="modal">Ok, Mengerti</button>
                    </div>
                  </div>
                </div>
              </div>

              <!-- MODAL edit -->
              <div id="edit<?= $no;?>" class="modal fade" role="dialog" tabindex="-1" >
                <div class="modal-dialog" role="document">
                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header bg-info">
                      <h5 class="modal-title text-white">Ubah data Brand <b><?= $key->MERK;?></b></h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body">
                      <form class="form-horizontal" action="<?php echo site_url('Pengaturan/ubah_brand');?>" method="post">
                        <input type="hidden" name="id_brand" value="<?= $key->ID_MERK;?>">

                        <div class="form-group">
                          <label class="title">Nama brand</label>
                          <input type="text" name="brand" maxlength="25" class="form-control" value="<?= $key->MERK;?>">
                        </div>

                        <div class="form-group">
                          <label class="title">Keterangan</label>
                          <textarea type="text" name="keterangan" class="form-control" rows="3"><?= $key->KETERANGAN;?></textarea>
                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                          <button type="button" class="btn btn-light btn-sm" data-dismiss="modal">Batal</button>
                          <button type="submit" class="btn btn-info btn-sm">Ubah data</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>

              <!-- MODAL hapus -->
              <div id="hapus<?= $no;?>" class="modal fade" role="dialog" tabindex="-1" >
                <div class="modal-dialog" role="document">
                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header bg-danger">
                      <h5 class="modal-title text-white">Hapus data Brand <b><?= $key->MERK;?></b></h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body">
                      <form class="form-horizontal" action="<?php echo site_url('Pengaturan/hapus_brand');?>" method="post">
                        <input type="hidden" name="id_brand" value="<?= $key->ID_MERK;?>">

                        <p>Apakah anda yakin akan menghapus data brand  <b><?= $key->MERK;?></b> </p>

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
              <?php $no++;}};?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="alert alert-info shadow-sm">
        <p>Brand yang sedang digunakan pada data inventari / memiliki counter lebih dari 0, tidak dapat dihapus.</p>
      </div>
    </div>
  </div>
