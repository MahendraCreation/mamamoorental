<div class="d-flex justify-content-between align-items-sm-center flex-column flex-sm-row mb-2">
  <div class="mr-4 mb-3 mb-sm-0">
    <h1 class="mb-0">Data voucher diskon ongkir</h1>
  </div>
</div>
<hr>

<!-- MODAL tambah -->
<div id="tambah" class="modal fade" role="dialog" tabindex="-1" >
  <div class="modal-dialog" role="document">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h5 class="modal-title text-white">Tambah <b>Voucher</b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
        <form class="form-horizontal" action="<?php echo site_url('Pengaturan/tambah_voucher');?>" method="post">

          <div class="form-group">
            <label class="title">Nama Voucher</label>
            <input type="text" name="nama" maxlength="25" class="form-control" placeholder="Nama Voucher" required>
          </div>

          <div class="form-group">
            <label class="title">CODE</label>
            <div class="row">
              <div class="col-md-4">
                <input type="text" id="nama" class="form-control" maxlength="4" placeholder="Awal Code" required>
              </div>
              <div class="col-md-5" id="code">
                <input type="text" name="code" class="form-control" placeholder="Klik generate" readonly required>
              </div>
              <div class="col-md-3">
                <button type="button" onclick="generate()" class="btn btn-info btn-block">Generate</button>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="row">
              <div class="col-md-6">
                <label class="title">Tanggal Berlaku</label>
                <input type="date" name="mulai" class="form-control" placeholder="Tanggal Berlaku" required>
              </div>
              <div class="col-md-6">
                <label class="title">Tanggal Berakhir</label>
                <input type="date" name="berakhir" class="form-control" placeholder="Tanggal Berakhir" required>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="title">Potongan Voucher</label>
            <div class="input-group input-group-joined">
              <div class="input-group-prepend">
                <span class="input-group-text">
                  Rp.
                </span>
              </div>
              <input type="number" name="potongan" class="form-control" placeholder="Potongan voucher" required>
            </div>
          </div>
          <div class="form-group">
            <label class="title">Quota penggunaan</label>
            <input type="number" name="quota" maxlength="25" class="form-control" placeholder="Jumlah quota max penggunaan" required>
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

<script type="text/javascript">
function generate(){
  var nama = {nama:$("#nama").val()};
  $.ajax({
    type: "POST",
    url : "<?php echo site_url('Pengaturan/VoucherHash'); ?>",
    data: nama,
    success: function(msg){
      $('#code').html(msg);
    }
  });
}
</script>

<div class="row">
  <div class="col-md-8 col-xs-9">
    <div class="card shadow-sm">
      <div class="card-header">Daftar Voucher | BERLAKU
        <button type="button" class="btn btn-sm btn-primary float-right" data-toggle="modal" data-target="#tambah"> <i class="fa fa-plus fa-xs"></i> Tambah Voucher</button>
      </div>
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
  <div class="col-md-4 col-xs-3">
    <div class="alert alert-info shadow-sm">
      <p>Tambahkan data voucher pengeriman bagi pengguna. SETELAH MENAMBAHKAN VOUCHER, anda dapat memberikan kode tersebut melalui: Pesan Pribadi WA, GiveAway/Feed/Event IG, dan lainnya.</p>
      <p>Voucher yang telah melewati batas waktu aktif, akan langsung menjadi nonaktif. anda dapat melihat riwayat voucher disini: <a href="<?php echo site_url('Voucher/Riwayat');?>" class="text-cyan text-none">Lihat riwayat voucher</a>. </p>
    </div>
  </div>
</div>
