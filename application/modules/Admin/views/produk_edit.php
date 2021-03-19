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
    <h1 class="mb-0">Edit Data Produk</h1>
    <div class="small">
    </div>
  </div>
  <button type="button" class="btn btn-primary btn-sm float-right" onclick="window.history.go(-1); return false;"><i class="fa fa-step-backward fa-sm mr-1"></i> Kembali</button>
</div>
<hr>
<form action="<?php echo site_url('Admin/proses_edit');?>" method="POST" enctype="multipart/form-data">
  <input type="hidden" name="kode_unit" value="<?= $produk->KODE_UNIT;?>" class="form-control" required>
  <div class="row">
    <div class="col-md-8">
      <div class="card shadow-sm">
        <div class="card-header">
          Data Produk
        </div>
        <div class="card-body">
          <div class="form-group">
            <label class="title">Nama Produk <small class="text-danger">*</small> </label>
            <input type="text" name="nama_produk" value="<?= $produk->NAMA_PRODUK;?>" class="form-control" required>
          </div>
          <div class="form-group">
            <label class="title">Kategori <small class="text-danger">*</small> </label>
            <select class="select2 form-control" name="kategori" required>
              <optgroup label="current">
                <option value="<?= $produk->ID_KATEGORI;?>"><?= $produk->KATEGORI;?></option>
              </optgroup>
              <optgroup label="Change">
                <?php foreach ($kategori as $key) { ?>
                  <option value="<?= $key->ID_KATEGORI;?>"><?= $key->KATEGORI;?></option>
                <?php }?>
              </optgroup>
            </select>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label class="title">Varian <small class="text-danger">*</small> </label>
                <select class="select2 form-control" name="varian" >
                  <optgroup label="current">
                    <option value="<?= $produk->ID_VARIAN;?>"><?= $produk->VARIAN;?></option>
                  </optgroup>
                  <optgroup label="Change">
                    <?php foreach ($varian as $key) { ?>
                      <option value="<?= $key->ID_VARIAN;?>"><?= $key->VARIAN;?></option>
                    <?php }?>
                  </optgroup>
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label class="title">Grade <small class="text-danger">*</small> </label>
                <select class="select2 form-control" name="grade" >
                  <optgroup label="current">
                    <option value="<?= $produk->ID_GRADE;?>"><?= $produk->GRADE;?></option>
                  </optgroup>
                  <optgroup label="Change">
                    <?php foreach ($grade as $key) { ?>
                      <option value="<?= $key->ID_GRADE;?>"><?= $key->GRADE;?></option>
                    <?php }?>
                  </optgroup>
                </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-3">
              <div class="form-group">
                <label class="title">Berat Produk <small class="text-danger">*</small> </label>
                <div class="input-group input-group-joined">
                  <input type="text" name="berat" value="<?= $produk->BERAT;?>" class="form-control" onkeyup="this.value = this.value.replace(/,/g, '.')" required>
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
                <input type="date" name="tgl_beroperasi" value="<?= $produk->TGL_BEROPERASI;?>" class="form-control" required>
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
                  <input type="number" name="harga_beli" value="<?= $produk->HARGA_BELI;?>" class="form-control" required>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="title">Kondisi Awal <small class="text-danger">*</small></label>
            <input type="text" name="kondisi_awal" value="<?= $produk->KONDISI_AWAL;?>" class="form-control" >
          </div>
          <div class="form-group">
            <label class="title">Keterangan</label>
            <textarea name="keterangan" rows="3" class="form-control" maxlength="250"><?= $produk->KET;?></textarea>
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
                  <input type="number" name="harga_15" value="<?= $produk->HARGA_15;?>" class="form-control" required>
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
                  <input type="number" name="harga_30" value="<?= $produk->HARGA_30;?>" class="form-control" required>
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
                <input type="text" name="type" value="<?= $produk->TYPE;?>" class="form-control" >
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label class="title">Suction</label>
                <input type="text" name="suction" value="<?= $produk->SUCTION;?>" class="form-control" >
              </div>
            </div>
            <div class="col-md-2">
              <div class="form-group">
                <label class="title">Level</label>
                <input type="number" name="level" value="<?= $produk->LEVEL;?>" class="form-control" >
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-3">
              <div class="form-group">
                <label class="title">Cycle</label>
                <div class="onoffswitch">
                  <input type="checkbox" name="cycle" class="onoffswitch-checkbox" id="cycle" tabindex="0" <?= ($produk->CYCLE== TRUE) ? "checked" : "";?>>
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
                  <input type="checkbox" name="tuas_manual" class="onoffswitch-checkbox" id="tuas_manual" tabindex="0" <?= ($produk->TUAS_MANUAL == TRUE) ? "checked" : "";?>>
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
            <textarea name="fitur_tambahan" rows="3" class="form-control" maxlength="250"><?= $produk->FITUR_TAMBAHAN;?></textarea>
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
                  <input type="checkbox" name="stimulates" class="onoffswitch-checkbox" id="stimulates" tabindex="0" <?= ($produk->STIMULATES == TRUE) ? "checked" : "";?>>
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
                  <input type="checkbox" name="expressions" class="onoffswitch-checkbox" id="expressions" tabindex="0" <?= ($produk->EXPRESSIONS == TRUE) ? "checked" : "";?>>
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
                  <input type="checkbox" name="fase_tambahan" class="onoffswitch-checkbox" id="fase_tambahan" tabindex="0" <?= ($produk->FASE_TAMBAHAN == TRUE) ? "checked" : "";?>>
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
                  <input type="number" name="total" class="form-control form-control-sm" value="<?= $produk->TOTAL;?>">
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
                  <input type="checkbox" name="colok_listrik" class="onoffswitch-checkbox" id="colok_listrik" tabindex="0" <?= ($produk->COLOK_LISTRIK == TRUE) ? "checked" : "";?>>
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
                  <input type="checkbox" name="baterai_aa" class="onoffswitch-checkbox" id="baterai_aa" tabindex="0" <?= ($produk->BATERAI_AA == TRUE) ? "checked" : "";?>>
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
                  <input type="checkbox" name="powerbank_usb" class="onoffswitch-checkbox" id="powerbank_usb" tabindex="0" <?= ($produk->POWERBANK_USB == TRUE) ? "checked" : "";?>>
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
                  <input type="checkbox" name="rechargeable" class="onoffswitch-checkbox" id="rechargeable" tabindex="0" <?= ($produk->RECHARGEABLE == TRUE) ? "checked" : "";?>>
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
    <div class="col-md-4">
      <button type="submit" class="btn btn-primary btn-block shadow-sm mb-3"> <i class="fa fa-plus mr-2"></i> Simpan Perubahan</button>
      <div class="card shadow-sm">
        <div class="card-header">
          Gambar/foto produk
        </div>
        <div class="card-body">
          <div class="form-group">
            <label class="title">Edit foto produk?</label>
            <div class="onoffswitch">
              <input type="checkbox" class="onoffswitch-checkbox" id="foto" tabindex="0">
              <label class="onoffswitch-label" for="foto">
                <span class="onoffswitch-inner"></span>
                <span class="onoffswitch-switch"></span>
              </label>
            </div>
          </div>
          <div class="form-group hide" id="upload_foto">
            <button type="button" class="btn btn-sm btn-info btn-block" data-target="#fotoup" data-toggle="modal">Edit Foto Produk</button>
          </div>
        </div>
      </div>
    </div>
    <style>
      .previewImg{
        width: 235px !important;
        height: 235px !important;
      }
    </style>
    <div id="fotoup" class="modal fade" role="dialog" tabindex="-1" >
      <div class="modal-dialog modal-lg" role="document">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header bg-success">
            <h5 class="modal-title text-white">Ubah foto - <b><?php echo $produk->NAMA_PRODUK;?></b></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <!-- Modal body -->
          <div class="modal-body">
            <div class="row">
              <input type="hidden" id="editfotoss" name="editfoto">
              <?php if ($foto == FALSE) {
                for ($i=1; $i <= 5 ; $i++) { ?>
                  <div class="col-md-4">
                    <img id="FotoA<?= $i;?>" class="mb-2 previewImg ktp<?= $i;?>" src="<?php echo base_url();?>file/Pickanimage.png" alt="Placeholder">
                    <input type="file" id="getFoto<?= $i;?>" class="form-control-file fotoss" name="FOTO[]"  onchange="previewFotoA<?= $i;?>(this);" accept="image/*">
                  </div>

                  <script>
                  function previewFotoA<?= $i;?>(input){
                    $(".ktp<?= $i;?>").removeClass('hidden');
                    var file = $("#getFoto<?= $i;?>").get(0).files[0];

                    if(file){
                      var reader = new FileReader();

                      reader.onload = function(){
                        $("#FotoA<?= $i;?>").attr("src", reader.result);
                      }

                      reader.readAsDataURL(file);
                    }
                  }
                  </script>
                <?php } }else{ $cf = 0; foreach ($foto as $fotos) { ?>
                  <div class="col-md-4">
                    <div class="col-md-4">
                      <img id="FotoA<?= $cf;?>" class="mb-2 previewImg ktp<?= $cf;?>" src="<?php echo base_url();?>file/site/produk/<?= $fotos->KODE_UNIT;?>/<?= $fotos->SOURCE;?>" alt="Placeholder">
                      <input type="hidden" name="ID_FOTO[]" value="<?= $fotos->ID_FOTO;?>">
                      <input type="file" id="getFoto<?= $cf;?>" class="form-control-file fotoss" name="FOTO[]"  onchange="previewFotoA<?= $cf;?>(this);" accept="image/*">
                    </div>

                    <script>
                    function previewFotoA<?= $cf;?>(input){
                      $(".ktp<?= $cf;?>").removeClass('hidden');
                      var file = $("#getFoto<?= $cf;?>").get(0).files[0];

                      if(file){
                        var reader = new FileReader();

                        reader.onload = function(){
                          $("#FotoA<?= $cf;?>").attr("src", reader.result);
                        }

                        reader.readAsDataURL(file);
                      }
                    }
                    </script>
                  </div>
                  <?php $cf++; } if ($cf <= 5) {
                    for ($a=1; $a <= 5-$cf ; $a++) {
                      ?>
                        <div class="col-md-4">
                          <img id="FotoB<?= $a;?>" class="mb-2 previewImg ktpB<?= $a;?>" src="<?php echo base_url();?>file/Pickanimage.png" alt="Placeholder">
                          <input type="file" id="getFotoB<?= $a;?>" class="form-control-file fotoss" name="FOTOA[]"  onchange="previewFotoB<?= $a;?>(this);" accept="image/*">
                        </div>

                        <script>
                        function previewFotoB<?= $a;?>(input){
                          $(".ktpB<?= $a;?>").removeClass('hidden');
                          var file = $("#getFotoB<?= $a;?>").get(0).files[0];

                          if(file){
                            var reader = new FileReader();

                            reader.onload = function(){
                              $("#FotoB<?= $a;?>").attr("src", reader.result);
                            }

                            reader.readAsDataURL(file);
                          }
                        }
                        </script>
                    <?php } ?>
                  <?php } ?>
                <?php } ?>
              </div>
              <hr>
              <small>Klik tombol pilih file untuk memilih foto produk dari komputer anda.</small>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
              <button type="button" class="btn btn-light btn-sm" data-dismiss="modal">Selesai</button>
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
      document.getElementById('editfotoss').value = true;
    }else{
      $("#upload_foto").addClass('hide');
      document.getElementById('editfotoss').value = false;
    }
  });

  </script>
