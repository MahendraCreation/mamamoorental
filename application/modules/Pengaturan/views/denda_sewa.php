<div class="d-flex justify-content-between align-items-sm-center flex-column flex-sm-row mb-2">
  <div class="mr-4 mb-3 mb-sm-0">
    <h1 class="mb-0">Pengaturan DENDA telat pengembalian pesanan</h1>
  </div>
</div>
<hr>

<div class="alert alert-info shadow-sm">
  <p class="mb-0">Denda telat pengembalian, digunakan saat pengguna telat mengembalikan barang sesuai dengan batas waktu pengembalian. Denda akan dikalikan sesuai jumlah hari sampai pengguna mengembalikan barang. Dan admin dapat menghubungi via No telepon pengguna, untuk masalah pembayaran denda.</p>
</div>

<div class="row">
  <div class="col-md-6 col-xs-12">
    <div class="card shadow-sm">
      <div class="card-header">Atur TARIF DENDA telat pengembalian pesanan</div>
      <div class="card-body">
        <form class="form-horizontal" action="<?php echo site_url('Pengaturan/ubah_denda');?>" method="post">
          <div class="form-group">
            <label>Tarif Denda</label><div class="input-group input-group-joined">
              <div class="input-group-prepend">
                <span class="input-group-text">
                  Rp.
                </span>
              </div>
              <input type="number" name="value" class="form-control" value="<?= $controller->M_pengaturan->get_ongkir("denda_sewa");?>">
            </div>
          </div>
          <hr>
          <button type="submit" class="btn btn-outline-primary btn-sm float-right">Ubah Tarif Denda</button>
        </form>
      </div>
    </div>
  </div>
</div>
