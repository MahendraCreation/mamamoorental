<div class="d-flex justify-content-between align-items-sm-center flex-column flex-sm-row mb-2">
  <div class="mr-4 mb-3 mb-sm-0">
    <h1 class="mb-0">Pengaturan ONGKIR</h1>
  </div>
</div>
<hr>

<div class="alert alert-info shadow-sm">
  <p class="mb-0">Tarif ongkir kurir berikut, berguna untuk menentukan tarif flat ongkir nantinya. Dimana dihitung per-KG. Untuk tarif ongkir J&T, dapat di cek melalui situs resmi J&T -> <a href="https://www.jet.co.id/rates" target="_blank" class="text-warning text-none">Kunjungi situs</a>. </p>
</div>

<div class="row">
  <div class="col-md-6 col-xs-12">
    <div class="card shadow-sm">
      <div class="card-header">Data tarif ongkir MAMAMOO Kurir</div>
      <div class="card-body">
        <form class="form-horizontal" action="<?php echo site_url('Pengaturan/ubah_ongkir');?>" method="post">
          <input type="hidden" name="nama" value="MAMAMOO Kurir">
          <div class="form-group">
            <label>Tarif ongkir dalam kota MALANG</label>
            <div class="input-group input-group-joined">
              <div class="input-group-prepend">
                <span class="input-group-text">
                  Rp.
                </span>
              </div>
              <input type="hidden" name="id[]" value="<?= $controller->M_pengaturan->get_idongkir("mamamoo_kota");?>">
              <input type="number" name="value[]" class="form-control" value="<?= $controller->M_pengaturan->get_ongkir("mamamoo_kota");?>">
            </div>
          </div>
          <div class="form-group">
            <label>Tarif ongkir Kabupaten MALANG</label><div class="input-group input-group-joined">
              <div class="input-group-prepend">
                <span class="input-group-text">
                  Rp.
                </span>
              </div>
              <input type="hidden" name="id[]" value="<?= $controller->M_pengaturan->get_idongkir("mamamoo_kab");?>">
              <input type="number" name="value[]" class="form-control" value="<?= $controller->M_pengaturan->get_ongkir("mamamoo_kab");?>">
            </div>
          </div>
          <div class="form-group">
            <label>Tarif ongkir luar MALANG</label><div class="input-group input-group-joined">
              <div class="input-group-prepend">
                <span class="input-group-text">
                  Rp.
                </span>
              </div>
              <input type="hidden" name="id[]" value="<?= $controller->M_pengaturan->get_idongkir("mamamoo_luar");?>">
              <input type="number" name="value[]" class="form-control" value="<?= $controller->M_pengaturan->get_ongkir("mamamoo_luar");?>">
            </div>
          </div>
          <hr>
          <button type="submit" class="btn btn-outline-primary btn-sm float-right">Ubah Tarif Ongkir</button>
        </form>
      </div>
    </div>
  </div>


  <div class="col-md-6 col-xs-12">
    <div class="card shadow-sm">
      <div class="card-header">Data tarif ongkir J&T Kurir</div>
      <div class="card-body">
        <form class="form-horizontal" action="<?php echo site_url('Pengaturan/ubah_ongkir');?>" method="post">
          <input type="hidden" name="nama" value="J&T Kurir">
          <div class="form-group">
            <label>Tarif ongkir dalam kota MALANG</label><div class="input-group input-group-joined">
              <div class="input-group-prepend">
                <span class="input-group-text">
                  Rp.
                </span>
              </div>
              <input type="hidden" name="id[]" value="<?= $controller->M_pengaturan->get_idongkir("jnt_kota");?>">
              <input type="number" name="value[]" class="form-control" value="<?= $controller->M_pengaturan->get_ongkir("jnt_kota");?>">
            </div>
          </div>
          <div class="form-group">
            <label>Tarif ongkir Kabupaten MALANG</label><div class="input-group input-group-joined">
              <div class="input-group-prepend">
                <span class="input-group-text">
                  Rp.
                </span>
              </div>
              <input type="hidden" name="id[]" value="<?= $controller->M_pengaturan->get_idongkir("jnt_kab");?>">
              <input type="number" name="value[]" class="form-control" value="<?= $controller->M_pengaturan->get_ongkir("jnt_kab");?>">
            </div>
          </div>
          <div class="form-group">
            <label>Tarif ongkir luar MALANG</label><div class="input-group input-group-joined">
              <div class="input-group-prepend">
                <span class="input-group-text">
                  Rp.
                </span>
              </div>
              <input type="hidden" name="id[]" value="<?= $controller->M_pengaturan->get_idongkir("jnt_luar");?>">
              <input type="number" name="value[]" class="form-control" value="<?= $controller->M_pengaturan->get_ongkir("jnt_luar");?>">
            </div>
          </div>
          <hr>
          <button type="submit" class="btn btn-outline-primary btn-sm float-right">Ubah Tarif Ongkir</button>
        </form>
      </div>
    </div>
  </div>
</div>
