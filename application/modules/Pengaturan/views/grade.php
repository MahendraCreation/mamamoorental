<div class="d-flex justify-content-between align-items-sm-center flex-column flex-sm-row mb-2">
  <div class="mr-4 mb-3 mb-sm-0">
    <h1 class="mb-0">Grade produk</h1>
  </div>
</div>
<hr>

<!-- MODAL tambah -->
<div id="tambah" class="modal fade" role="dialog" tabindex="-1" >
  <div class="modal-dialog" role="document">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h5 class="modal-title text-white">Tambah data <b>Grade</b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
        <form class="form-horizontal" action="<?php echo site_url('Pengaturan/tambah_grade');?>" method="post">

          <div class="form-group">
            <label class="title">Nama grade</label>
            <input type="text" name="grade" maxlength="25" class="form-control" placeholder="Isikan nama grade">
          </div>

          <div class="form-group">
            <label class="title">Keterangan</label>
            <textarea type="text" name="keterangan" class="form-control" rows="3" placeholder="Isikan keterangan grade"></textarea>
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
      <div class="card-header">Grade produk
        <button type="button" class="btn btn-sm btn-primary float-right" data-toggle="modal" data-target="#tambah"> <i class="fa fa-plus fa-xs"></i> Tambah Grade</button>
      </div>
      <div class="card-body">
        <table id="dataTable" class="table table-hover table-bordered" width="100%">
          <thead>
            <tr>
              <th>No</th>
              <th>Grade Produk</th>
              <th>Keterangan</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1; if ($grade == FALSE) { echo "<tr><td colspan='4'>Belum ada data</td></tr>";}else{ $no = 1; foreach ($grade as $key) { ?>
              <tr>
                <td><?= $no;?></td>
                <td><?= $key->GRADE;?> <?php if($controller->M_pengaturan->grade_counter($key->ID_GRADE) > 0){?> <span class="badge badge-info"><?= $controller->M_pengaturan->grade_counter($key->ID_GRADE); }else{?><span class="badge badge-warning"><?= $controller->M_pengaturan->grade_counter($key->ID_GRADE);}?></span></td>
                <td><?= isset($key->KETERANGAN) ? $key->KETERANGAN : 'Tidak ada';?></td>
                <td>
                  <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#edit<?= $no;?>"><i class="fa fa-edit fa-sm"></i></button>
                  <?php if($controller->M_pengaturan->grade_counter($key->ID_GRADE) > 0){ ?>
                    <button type="button" class="btn btn-sm btn-light" data-toggle="modal" data-target="#error"><i class="fa fa-trash fa-sm"></i></button>
                  <?php }else{?>
                    <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#hapus<?= $no;?>"><i class="fa fa-trash fa-sm"></i></button>
                  <?php }?>
                </td>
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
                      <p>Anda tidak dapat menghapus data grade, yang masih digunakan pada data produk</p>

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
                      <h5 class="modal-title text-white">Ubah data Grade <b><?= $key->GRADE;?></b></h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body">
                      <form class="form-horizontal" action="<?php echo site_url('Pengaturan/ubah_grade');?>" method="post">
                        <input type="hidden" name="id_grade" value="<?= $key->ID_GRADE;?>">

                        <div class="form-group">
                          <label class="title">Nama grade</label>
                          <input type="text" name="grade" maxlength="25" class="form-control" value="<?= $key->GRADE;?>">
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
                      <h5 class="modal-title text-white">Hapus data Grade <b><?= $key->GRADE;?></b></h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body">
                      <form class="form-horizontal" action="<?php echo site_url('Pengaturan/hapus_grade');?>" method="post">
                        <input type="hidden" name="id_grade" value="<?= $key->ID_GRADE;?>">

                        <p>Apakah anda yakin akan menghapus data grade  <b><?= $key->GRADE;?></b> </p>

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
        <p>Grade yang sedang digunakan pada data inventari / memiliki counter lebih dari 0, tidak dapat dihapus.</p>
      </div>
    </div>
  </div>
