<div class="container">
  <div class="main-body">

    <!-- USER MENU -->
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb" class="main-breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url();?>">MAMAMOORENTAL</a></li>
        <li class="breadcrumb-item"><a href="<?= site_url('Akun');?>">Akun</a></li>
        <li class="breadcrumb-item active" aria-current="page"><?= $pengguna->NAMA;?></li>
      </ol>
    </nav>
    <!-- /Breadcrumb -->

    <div class="row gutters-sm">
      <div class="col-md-3 mb-3">

        <?php $this->load->view('user_menu'); ?>

      </div>

      <div class="col-md-9">
      <div class="p-card mb-3">
        <form action="<?php echo site_url('Akun/Alamat');?>" method="post">
          <div class="p-card-body">
            <div class="row">
              <div class="col-sm-12">
                <div class="my-account-section__header-title">Alamat Saya
                  <button type="button" class="btn btn-primary btn-sm float-right" onclick="window.history.go(-1); return false;"><i class="fa fa-step-backward fa-sm mr-1"></i> Kembali</button>
                </div>
                <div class="my-account-section__header-subtitle">Pastikan alamat anda telah benar, karena pengiriman barang akan ditujukan kealamat berikut.</div>
              </div>
            </div>
            <hr>
            <div class="row mb-3">
              <div class="col-sm-3">
                <span class="mb-0 text-right text-secondary d-block">Provinsi <small class="text-danger">*</small></span>
              </div>
              <div class="col-sm-9 text-dark">
                <select class="select2-basic" name="provinsi" id="id_prov" style="width: 75%" >
                  <optgroup label="Current Provinsi">
                    <option value="<?= $alamat->PROVINSI;?>"><?php echo $controller->M_pengguna->find_prov($alamat->PROVINSI);?></option>
                  </optgroup>
                  <optgroup label="Change Provinsi">
                    <?php foreach ($get_prov as $prov) { ?>
                      <option value="<?php echo $prov->kode;?>"><?php echo $prov->nama;?></option>
                    <?php }?>
                  </optgroup>
                </select>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-sm-3">
                <span class="mb-0 text-right text-secondary d-block">Kota/Kabupaten <small class="text-danger">*</small></span>
              </div>
              <div class="col-sm-9 text-dark">
                <select class="select2-basic" name="kota" id="id_kota" style="width: 75%" >
                  <option class="a " value="<?= $alamat->KOTA;?>"><?php echo $controller->M_pengguna->find_kota($alamat->KOTA);?></option>
                </select>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-sm-3">
                <span class="mb-0 text-right text-secondary d-block">Kecamatan <small class="text-danger">*</small></span>
              </div>
              <div class="col-sm-9 text-dark hidden" id="pil_kec">
                <select class="select2-basic " name="kecamatan" id="kec" style="width: 75%" >
                  <option value="0">Pilih Kota</option>
                </select>
              </div>
              <div class="col-sm-9 text-dark" id="cur_kec">
                <select class="select2-basic " style="width: 75%" disabled>
                  <option value=""><?php echo $controller->M_pengguna->find_kec($alamat->KECAMATAN);?></option>
                </select>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-sm-3">
                <span class="mb-0 text-right text-secondary d-block">Kode POS <small class="text-danger">*</small></span>
              </div>
              <div class="col-sm-9 text-dark">
                <input type="text" class="form-control form-control-sm" name="kode_pos" value="<?= $alamat->KODE_POS;?>">
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-sm-3">
                <span class="mb-0 text-right text-secondary d-block">Jalan <small class="text-danger">*</small></span>
              </div>
              <div class="col-sm-9 text-dark">
                <textarea type="text" class="form-control form-control-sm" rows="3" name="jalan"><?= $alamat->JALAN;?></textarea>
                <small class="text-danger">Tulis jalan anda dengan lengkap, sertakan RT, RW dan nomor rumah jika ada.</small>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-sm-9 offset-md-3 text-dark">
                <button type="submit" name="submit" class="btn btn-theme wd-login-btn">Simpan</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
</div>

<script type="text/javascript">
$("#id_prov").change(function(){
  $('#cur_kec').addClass('hidden');
  $('#pil_kec').removeClass('hidden');
  var id_prov = {id_prov:$("#id_prov").val()};
  $.ajax({
    type: "POST",
    url : "<?php echo site_url('Pengguna/kota'); ?>",
    data: id_prov,
    success: function(msg){
      $('#id_kota').html(msg);
    }
  });
});
</script>
