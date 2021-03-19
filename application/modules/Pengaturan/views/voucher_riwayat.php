<div class="d-flex justify-content-between align-items-sm-center flex-column flex-sm-row mb-2">
  <div class="mr-4 mb-3 mb-sm-0">
    <h1 class="mb-0">Data voucher diskon ongkir | Expired</h1>
  </div>
  <button type="button" class="btn btn-primary btn-sm float-right" onclick="window.history.go(-1); return false;"><i class="fa fa-step-backward fa-sm mr-1"></i> Kembali</button>
</div>
<hr>

<div class="row">
  <div class="col-md-12 col-xs-12">
    <div class="card shadow-sm">
      <div class="card-header">Daftar Voucher | Expired</div>
      <div class="card-body">
        <table id="dataTable" class="table table-hover table-bordered">
          <thead>
            <th>KODE</th>
            <th>Nama</th>
            <th>Tanggal Mulai</th>
            <th>Tanggal Berakhir</th>
            <th>POTONGAN</th>
            <th>QUOTA LEFT</th>
            <th>DELETE</th>
          </thead>
          <tbody>
            <?php foreach ($voucher as $key) { ?>
              <tr>
                <td><?= $key->CODE;?></td>
                <td><?= $key->NAMA;?></td>
                <td><?= $key->TANGGAL_MULAI;?></td>
                <td><?= $key->TANGGAL_BERAKHIR;?></td>
                <td><?= $key->POTONGAN;?></td>
                <td><?= $key->QUOTA;?></td>
                <td> <button type="button" class="btn btn-sm btn-danger btn-block" data-toggle="modal" data-target="#hapus<?= $key->ID_VOUCHER;?>"> <i class="fa fa-trash mr-2"></i> Hapus</button> </td>
              </tr>

              <!-- MODAL hapus -->
              <div id="hapus<?= $key->ID_VOUCHER;?>" class="modal fade" role="dialog" tabindex="-1" >
                <div class="modal-dialog" role="document">
                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header bg-danger">
                      <h5 class="modal-title text-white">Hapus VOUCHER <b><?= $key->NAMA;?></b></h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body">
                      <form class="form-horizontal" action="<?php echo site_url('Pengaturan/hapus_voucher');?>" method="post">
                        <input type="hidden" name="id_voucher" value="<?= $key->ID_VOUCHER;?>">
                          <input type="hidden" name="nama" value="<?= $key->NAMA;?>">

                        <p>Apakah anda yakin akan menghapus data voucher  <b><?= $key->NAMA;?></b> </p>

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
            <?php }?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
