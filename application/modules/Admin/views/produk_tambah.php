<style>

.select2-container--default .select2-selection--single .select2-selection__clear {
  display: none !important;
}
input[type="text"]{
  text-transform:uppercase;
}
</style>

<!-- Custom page header alternative example-->
<div class="d-flex justify-content-between align-items-sm-center flex-column flex-sm-row mb-2">
  <div class="mr-4 mb-3 mb-sm-0">
    <h1 class="mb-0">Tambah Data Produk</h1>
    <div class="small">
    </div>
  </div>
  <button type="button" class="btn btn-primary btn-sm float-right" onclick="window.history.go(-1); return false;"><i class="fa fa-step-backward fa-sm mr-1"></i> Kembali</button>
</div>
<hr>
<form action="<?php echo site_url('TambahkanProduk');?>" method="POST" enctype="multipart/form-data">
  <div class="row">
    <div class="col-md-8">
      <div class="card shadow-sm">
        <div class="card-header">
          Kode Produk
        </div>
        <div class="card-body pb-0">
          <div class="alert alert-warning p-2">
            <small><b>HARAP ATUR "KODE"</b> dari <i>BRAND</i> / <i>SERIES</i>, agar <b>KODE UNIT</b> dapat terbuat dan anda <b>dapat melanjutkan</b> proses penambahan produk.
              <hr class="mt-1 mb-1">Pergi ke <b>pengaturan</b> > BRAND / SERIES untuk menambahkan data BRAND dan SERIES.</small>
          </div>
          <div class="row mb-0">
            <div class="col-md-4 mb-0">
              <div class="form-group mb-0">
                <label class="title">Brand <small class="text-danger">*</small> </label>
                <select class="select2 form-control" name="merk" id="brand" >
                  <option value="0">Pilih Brand</option>
                  <?php foreach ($merk as $key) { ?>
                    <option value="<?= $key->KODE ;?>-<?= $key->ID_MERK;?>"><?= $key->MERK;?></option>
                  <?php }?>
                </select>
              </div>
            </div>
            <div class="col-md-4 mb-0">
              <div class="form-group mb-0">
                <label class="title">Series <small class="text-danger">*</small> </label>
                <select class="select2 form-control" name="series" id="series" >
                  <option value="0">Pilih Series</option>
                  <?php foreach ($type as $key) { ?>
                    <option value="<?= $key->KODE ;?>-<?= $key->ID_TYPE;?>"><?= $key->TYPE;?></option>
                  <?php }?>
                </select>
              </div>
            </div>
            <div class="col-md-4 mb-0">
              <div class="form-group mb-0">
                <label class="title">Generate Kode Unit</label>
                <button type="button" onclick="generate()" class="btn btn-orange btn-block" style="line-height: 1.3;">Generate Kode</button>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 mt-0">
              <small class="text-danger">pastikan anda memasukkan brand dan series dengan benar. Anda tidak dapat mengubah hal ini.</small>
            </div>
          </div>
          <div id="code"></div>
          <script type="text/javascript">
          function generate(){
            var strbrand    = document.getElementById("brand").value;
            var get_brand   = strbrand.split("-");
            var code_brand  = get_brand[0];
            var strseries    = document.getElementById("series").value;
            var get_series   = strseries.split("-");
            var code_series   = get_series[0];

            var code = code_brand+""+code_series;
            $.ajax({
              type: "POST",
              url : "<?php echo site_url('Admin/GetKodeUnitUrut'); ?>",
              data: {code:code},
              success: function(data) {
                if (code_brand == 0) {
                  alert("Minimal pilih BRAND sebagai acuan KODE UNIT!!");
                }else{
                  $('#kode_unit').val(code_brand+""+code_series+"0"+data);
                }
              },
              error: function() {
                alert('Ops.. Terjadi Kesalahan!!');
              }
            });
            //   $('#idbiodatanya').val(sektornya+""+negaranya1+""+negaranya2+""+callingnya+""+skillnya);

            $("#data_produk").removeClass('hide');
            $("#more_data").removeClass('hide');
          }; // Trigger the event
          </script>
          <div class="form-group">
            <label class="title">Kode Unit</label>
            <input type="text" name="kode_unit" id="kode_unit" placeholder="Pilih Brand & Series" class="form-control" required readonly>
          </div>
        </div>
        <div class="hide" id="data_produk">

          <div class="card-header">
            Data Produk
          </div>
          <div class="card-body">
            <div class="form-group">
              <label class="title">Nama Produk <small class="text-danger">*</small> </label>
              <input type="text" name="nama_produk" placeholder="Isikan nama produk" class="form-control" required>
            </div>
            <div class="form-group">
              <label class="title">Kategori <small class="text-danger">*</small> </label>
              <select class="select2 form-control" name="kategori" required>
                <option value=""></option>
                <?php foreach ($kategori as $key) { ?>
                  <option value="<?= $key->ID_KATEGORI;?>"><?= $key->KATEGORI;?></option>
                <?php }?>
              </select>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label class="title">Varian <small class="text-danger">*</small> </label>
                  <select class="select2 form-control" name="varian" >
                    <option value=""></option>
                    <?php foreach ($varian as $key) { ?>
                      <option value="<?= $key->ID_VARIAN;?>"><?= $key->VARIAN;?></option>
                    <?php }?>
                  </select>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label class="title">Grade <small class="text-danger">*</small> </label>
                  <select class="select2 form-control" name="grade" >
                    <option value=""></option>
                    <?php foreach ($grade as $key) { ?>
                      <option value="<?= $key->ID_GRADE;?>"><?= $key->GRADE;?></option>
                    <?php }?>
                  </select>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-3">
                <div class="form-group">
                  <label class="title">Berat Produk <small class="text-danger">*</small> </label>
                  <div class="input-group input-group-joined">
                    <input type="text" name="berat" placeholder="Berat" class="form-control" onkeyup="this.value = this.value.replace(/,/g, '.')" required>
                    <div class="input-group-append">
                      <span class="input-group-text">
                        .Kg
                      </span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label class="title">Tanggal Beroperasi <small class="text-danger">*</small> </label>
                  <input type="date" name="tgl_beroperasi" placeholder="Tanggal Beroperasi" class="form-control" required>
                </div>
              </div>
              <div class="col-md-5">
                <div class="form-group">
                  <label class="title">Harga Beli <small class="text-danger">*</small> </label>
                  <div class="input-group input-group-joined">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        Rp.
                      </span>
                    </div>
                    <input type="number" name="harga_beli" placeholder="Harga Beli" class="form-control" required>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label class="title">Kondisi Awal <small class="text-danger">*</small></label>
              <input type="text" name="kondisi_awal" placeholder="Kondisi Awal Produk" class="form-control" >
            </div>
            <div class="form-group">
              <label class="title">Keterangan</label>
              <textarea name="keterangan" rows="3" class="form-control" maxlength="250" placeholder="Keterangan"></textarea>
              <small class="text-muted">Max 250 karakter</small>
            </div>
          </div>
          <div class="card-header">
            Harga Sewa
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label class="title">Harga Sewa 15 Hari</label>
                  <div class="input-group input-group-joined">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        Rp.
                      </span>
                    </div>
                    <input type="number" name="harga_15" placeholder="Untuk 15 Hari" class="form-control" required>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label class="title">Harga Sewa 30 Hari</label>
                  <div class="input-group input-group-joined">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        Rp.
                      </span>
                    </div>
                    <input type="number" name="harga_30" placeholder="Untuk 30 Hari" class="form-control" required>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="card-header">
            Produk Knowledge
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label class="title">Type</label>
                  <input type="text" name="type" placeholder="Type" class="form-control" >
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label class="title">Suction</label>
                  <input type="text" name="suction" placeholder="Suction" class="form-control" >
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                  <label class="title">Level</label>
                  <input type="number" name="level" placeholder="Level" class="form-control" >
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-3">
                <div class="form-group">
                  <label class="title">Cycle</label>
                  <div class="onoffswitch">
                    <input type="checkbox" name="cycle" class="onoffswitch-checkbox" id="cycle" tabindex="0">
                    <label class="onoffswitch-label" for="cycle">
                      <span class="onoffswitch-inner"></span>
                      <span class="onoffswitch-switch"></span>
                    </label>
                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label class="title">Tuas Manual</label>
                  <div class="onoffswitch">
                    <input type="checkbox" name="tuas_manual" class="onoffswitch-checkbox" id="tuas_manual" tabindex="0">
                    <label class="onoffswitch-label" for="tuas_manual">
                      <span class="onoffswitch-inner"></span>
                      <span class="onoffswitch-switch"></span>
                    </label>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label class="title">Fitur Tambahan</label>
              <textarea name="fitur_tambahan" rows="3" class="form-control" maxlength="250" placeholder="Fitur Tambahan"></textarea>
            </div>
          </div>
          <div class="card-header">
            Fase
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-3">
                <div class="form-group">
                  <label class="title">STIMULATES</label>
                  <div class="onoffswitch">
                    <input type="checkbox" name="stimulates" class="onoffswitch-checkbox" id="stimulates" tabindex="0">
                    <label class="onoffswitch-label" for="stimulates">
                      <span class="onoffswitch-inner"></span>
                      <span class="onoffswitch-switch"></span>
                    </label>
                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label class="title">Expressions</label>
                  <div class="onoffswitch">
                    <input type="checkbox" name="expressions" class="onoffswitch-checkbox" id="expressions" tabindex="0">
                    <label class="onoffswitch-label" for="expressions">
                      <span class="onoffswitch-inner"></span>
                      <span class="onoffswitch-switch"></span>
                    </label>
                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label class="title">Fase Tambahan</label>
                  <div class="onoffswitch">
                    <input type="checkbox" name="fase_tambahan" class="onoffswitch-checkbox" id="fase_tambahan" tabindex="0">
                    <label class="onoffswitch-label" for="fase_tambahan">
                      <span class="onoffswitch-inner"></span>
                      <span class="onoffswitch-switch"></span>
                    </label>
                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label class="title">Total</label>
                  <div class="onoffswitch">
                    <input type="number" name="total" class="form-control form-control-sm" placeholder="Total">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="card-header">
            Power Source
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-3">
                <div class="form-group">
                  <label class="title">Colok Listrik</label>
                  <div class="onoffswitch">
                    <input type="checkbox" name="colok_listrik" class="onoffswitch-checkbox" id="colok_listrik" tabindex="0">
                    <label class="onoffswitch-label" for="colok_listrik">
                      <span class="onoffswitch-inner"></span>
                      <span class="onoffswitch-switch"></span>
                    </label>
                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label class="title">Baterai AAA</label>
                  <div class="onoffswitch">
                    <input type="checkbox" name="baterai_aa" class="onoffswitch-checkbox" id="baterai_aa" tabindex="0">
                    <label class="onoffswitch-label" for="baterai_aa">
                      <span class="onoffswitch-inner"></span>
                      <span class="onoffswitch-switch"></span>
                    </label>
                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label class="title">PowerBank/USB</label>
                  <div class="onoffswitch">
                    <input type="checkbox" name="powerbank_usb" class="onoffswitch-checkbox" id="powerbank_usb" tabindex="0">
                    <label class="onoffswitch-label" for="powerbank_usb">
                      <span class="onoffswitch-inner"></span>
                      <span class="onoffswitch-switch"></span>
                    </label>
                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label class="title">Rechargeable</label>
                  <div class="onoffswitch">
                    <input type="checkbox" name="rechargeable" class="onoffswitch-checkbox" id="rechargeable" tabindex="0">
                    <label class="onoffswitch-label" for="rechargeable">
                      <span class="onoffswitch-inner"></span>
                      <span class="onoffswitch-switch"></span>
                    </label>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-4 hide" id="more_data">
      <button type="submit" class="btn btn-primary btn-block shadow-sm mb-3"> <i class="fa fa-plus mr-2"></i> Tambahkan Data Produk</button>
      <div class="card shadow-sm">
        <div class="card-header">
          Gambar/foto produk
        </div>
        <div class="card-body">
          <div class="form-group">
            <label class="title">Tambahkan foto produk?</label>
            <div class="onoffswitch">
              <input type="checkbox" class="onoffswitch-checkbox" id="foto" tabindex="0">
              <label class="onoffswitch-label" for="foto">
                <span class="onoffswitch-inner"></span>
                <span class="onoffswitch-switch"></span>
              </label>
            </div>
          </div>
          <div class="form-group hide" id="upload_foto">
            <input type="file" class="form-control form-control-sm" name="FOTO[]" multiple data-max-file-size="2MB" data-max-files="5"  id="files" onchange="checkFiles(this.files)"/>
            <small class="text-muted">Max ukuran 2MB dan max 5 foto produk, harap gunakan ratio foto 1:1</small>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>
<script type="text/javascript">

function checkFiles(files) {
  if(files.length>5) {
    alert("Max 5 files; files have been truncated");

    let list = new DataTransfer;
    for(let i=0; i<5; i++)
    list.items.add(files[i])

    document.getElementById('files').files = list.files
  }
}

$("#foto").change(function() {
  if(this.checked) {
    $("#upload_foto").removeClass('hide');
  }else{
    $("#upload_foto").addClass('hide');
    document.getElementById('files').value = "";
  }
});

</script>
