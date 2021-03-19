<div class="cotp__box--change">
  <h2 class="cotp__text--method-change"><?php echo $header;?></h2>
  <p class="cotp-change--title">
    <center><?php echo $text;?>.<br> <h6>HARAP CEK FOLDER SPAM EMAIL ANDA.</h6></center>
  </p>
  <hr style="width: 50%" class="mb-0">
  <?php if ($proses == "aktivasi") { ?>
    <div class="text-center cotp__text__not-active">
      <a href="<?php echo base_url().'Resend?email='.$email.'&kode='.$kode.'&nama='.$nama;?>" id="link-not-active" class="fs-13 fw-600 change-phone">Kirim kembali email</a>
    </div>

    <script type="text/javascript">
    var downloadButton = document.getElementById("link-not-active");
    var counter = 60;
    var newElement = document.createElement("p");
    newElement.innerHTML = "<span class='text-theme'>Belum menerima email</span>? anda dapat mengirim email lagi dalam <b>60 detik</b>.<br> <h6>HARAP CEK FOLDER SPAM EMAIL ANDA.</h6>";
    var id;

    downloadButton.parentNode.replaceChild(newElement, downloadButton);

    id = setInterval(function() {
      counter--;
      if(counter < 0) {
        newElement.parentNode.replaceChild(downloadButton, newElement);
        clearInterval(id);
      } else {
        newElement.innerHTML = "<span class='text-theme'>Belum menerima email</span>? anda dapat mengirim email lagi dalam <b>" + counter.toString() + " detik</b>.";
      }
    }, 1000);
    </script>
  <?php }elseif ($proses == "verifikasi") { ?>
    <form action="<?php echo site_url('Welcome?email='.$email.'&token='.$token);?>" method="post" enctype="multipart/form-data">
      <div id="ktp" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header bb-none">
              <h6>Contoh SCAN/Foto KTP</h6>
              <button type="button" class="close cls-pop" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body pt-0">
              <img src="<?php echo base_url();?>file/site/ktp.jpg" class="gambar-scan" alt="SCAN/FOTO KTP">
            </div>
          </div>
        </div>
      </div>

      <div id="kk" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header bb-none">
              <h6>Contoh SCAN/Foto KK</h6>
              <button type="button" class="close cls-pop" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body pt-0">
              <img src="<?php echo base_url();?>file/site/kk.jpg" class="gambar-scan" alt="SCAN/FOTO KK">
            </div>
          </div>
        </div>
      </div>


      <div class="row mb-3 mt-4">
        <div class="col-md-8 offset-md-2">
          <div class="p-card mb-3">
            <div class="p-card-body">
              <div class="row">
                <div class="col-sm-12">
                  <div class="my-account-section__header-title">Data diri Pribadi</div>
                  <div class="my-account-section__header-subtitle">Isikan data diri pribadi anda dengan sebenar-benarnya. <br><small class="text-danger">Semua data diri anda bersifat pribadi, hanya anda dan admin MAMAMOORENTAL yang mengetahui data diri anda.</small></div>
                </div>
              </div>
              <hr>
              <div class="row mb-3">
                <div class="col-sm-3">
                  <span class="mb-0 text-right text-secondary d-block">Kode Personal</span>
                </div>
                <div class="col-sm-9 text-dark">
                  <span class="text-theme"><?= $pengguna->KODE_PERSONAL;?></span>
                  <input type="hidden" name="KODE_PERSONAL" value="<?= $pengguna->KODE_PERSONAL;?>">
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-sm-3">
                  <span class="mb-0 text-right text-secondary d-block">Email</span>
                </div>
                <div class="col-sm-9 text-dark">
                  <?= $email;?>
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-sm-3">
                  <span class="mb-0 text-right text-secondary d-block">Nama Lengkap</span>
                </div>
                <div class="col-sm-9 text-dark">
                  <?= $pengguna->NAMA;?>
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-sm-3">
                  <span class="mb-0 text-right text-secondary d-block">Foto Profil</span>
                </div>
                <div class="col-sm-9 text-dark">
                  <img id="previewPp" class="mb-2 previewImg pp hidden" src="https://www.tutorialrepublic.com/examples/images/transparent.png" alt="Placeholder">
                  <input type="file" class="form-control-file" name="pp"  onchange="previewFilePp(this);"  accept="image/*" required>
                  <small class="text-secondary">Harap pilih foto dengan <span class="text-danger font-weight-bold">ratio 1:1</span> untuk hasil terbaik.</small>
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-sm-3">
                  <span class="mb-0 text-right text-secondary d-block">No Hp <small class="text-danger">*</small></span>
                </div>
                <div class="col-sm-9 text-dark">
                  <input type="text" class="form-control form-control-sm" name="hp" placeholder"Isikan nomor telepon aktif anda" required>
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-sm-3">
                  <span class="mb-0 text-right text-secondary d-block">Scan/Foto KTP <small class="text-danger">*</small></span>
                </div>
                <div class="col-sm-9 text-dark">
                  <img id="previewKtp" class="mb-2 previewImg ktp hidden" src="https://www.tutorialrepublic.com/examples/images/transparent.png" alt="Placeholder">
                  <input type="file" class="form-control-file" name="ktp"  onchange="previewFileKtp(this);" accept="image/*" required>
                  <small class="text-secondary">Contoh: kirim hasil scan/foto KTP anda seperti <span class="text-primary pointer" data-toggle="modal" data-target="#ktp">berikut ini (klik)</span></small>
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-sm-3">
                  <span class="mb-0 text-right text-secondary d-block">Scan/Foto KK <small class="text-danger">*</small></span>
                </div>
                <div class="col-sm-9 text-dark">
                  <img id="previewKk" class="mb-2 previewImg kk hidden" src="https://www.tutorialrepublic.com/examples/images/transparent.png" alt="Placeholder">
                  <input type="file" class="form-control-file" name="kk"  onchange="previewFileKk(this);" accept="image/*" required>
                  <small class="text-secondary">Contoh: kirim hasil scan/foto KK anda seperti <span class="text-primary pointer" data-toggle="modal" data-target="#kk">berikut ini (klik)</span></small>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row mb-3">
        <div class="col-md-8 offset-md-2">
          <div class="p-card mb-3">
            <div class="p-card-body">
              <div class="row">
                <div class="col-sm-12">
                  <div class="my-account-section__header-title">Alamat anda <small class="text-danger">*</small></div>
                  <div class="my-account-section__header-subtitle">Isikan alamat anda dengan benar dan detail, nantinya akan digunakan sebagai alamat pengiriman barang yang anda sewa</div>
                </div>
              </div>
              <hr>
              <div class="row mb-3">
                <div class="col-sm-3">
                  <span class="mb-0 text-right text-secondary d-block">Provinsi <small class="text-danger">*</small></span>
                </div>
                <div class="col-sm-9 text-dark">
                  <select class="select2-basic" name="provinsi" id="id_prov" style="width: 75%" required>
                    <?php foreach ($get_prov as $prov) { ?>
                      <option value="<?php echo $prov->kode;?>"><?php echo $prov->nama;?></option>
                    <?php }?>
                  </select>
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-sm-3">
                  <span class="mb-0 text-right text-secondary d-block">Kota/Kabupaten <small class="text-danger">*</small></span>
                </div>
                <div class="col-sm-9 text-dark">
                  <select class="select2-basic" name="kota" id="id_kota" style="width: 75%" required>
                    <option value="0">Pilih Provinsi</option>
                  </select>
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-sm-3">
                  <span class="mb-0 text-right text-secondary d-block">Kecamatan <small class="text-danger">*</small></span>
                </div>
                <div class="col-sm-9 text-dark">
                  <select class="select2-basic" name="kecamatan" id="kec" style="width: 75%" required>
                    <option value="0">Pilih Kota</option>
                  </select>
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-sm-3">
                  <span class="mb-0 text-right text-secondary d-block">Kode POS <small class="text-danger">*</small></span>
                </div>
                <div class="col-sm-9 text-dark">
                  <input type="text" class="form-control form-control-sm" name="kode_pos" required>
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-sm-3">
                  <span class="mb-0 text-right text-secondary d-block">Jalan <small class="text-danger">*</small></span>
                </div>
                <div class="col-sm-9 text-dark">
                  <textarea type="text" class="form-control form-control-sm" rows="3" name="jalan" placeholder"Isikan alamat jalan rumah anda dengan detail, sertakan nomor rumah" required></textarea>
                  <small class="text-danger">Tulis jalan anda dengan lengkap, sertakan RT, RW dan nomor rumah jika ada.</small>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row mb-3">
        <div class="col-md-8 offset-md-2">
          <div class="p-card mb-3">
            <div class="p-card-body">
              <div class="row">
                <div class="col-sm-12">
                  <div class="my-account-section__header-title">Data BANK/Rekening</div>
                  <div class="my-account-section__header-subtitle">Isikan data BANK/Rekening anda dengan benar, data ini akan digunakan dalam proses persewaan nanti.</div>
                </div>
              </div>
              <hr>
              <div class="row mb-3">
                <div class="col-sm-3">
                  <span class="mb-0 text-right text-secondary d-block">BANK ANDA <small class="text-danger">*</small></span>
                </div>
                <div class="col-sm-9 text-dark">
                  <select class="select2-basic" name="bank" style="width: 75%">
                    <option value="BCA">BCA</option>
                    <option value="BRI">BRI</option>
                    <option value="BNI">BNI</option>
                    <option value="MANDIRI">MANDIRI</option>
                  </select>
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-sm-3">
                  <span class="mb-0 text-right text-secondary d-block">Nomor Rekening <small class="text-danger">*</small></span>
                </div>
                <div class="col-sm-9 text-dark">
                  <input type="text" class="form-control form-control-sm" name="no_rek">
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-sm-3">
                  <span class="mb-0 text-right text-secondary d-block">Atas Nama <small class="text-danger">*</small></span>
                </div>
                <div class="col-sm-9 text-dark">
                  <input type="text" class="form-control form-control-sm" name="atas_nama">
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-sm-9 offset-md-3 text-dark">
                  <button type="submit" class="btn btn-theme wd-login-btn">Simpan</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="text-center cotp__text__not-active">
        <a href="javascript:void(0);" class="fs-13 fw-600 change-phone">Terjadi Masalah? Hubungi ADMIN!</a>
      </div>

      <script type="text/javascript">
      $("#id_prov").change(function(){
        var id_prov = {id_prov:$("#id_prov").val()};
        $.ajax({
          type: "POST",
          url : "<?php echo site_url('Login/kota'); ?>",
          data: id_prov,
          success: function(msg){
            $('#id_kota').html(msg);
          }
        });
      });
      </script>

      <script>
      function previewFilePp(input){
        $(".pp").removeClass('hidden');
        var file = $("input[name=pp]").get(0).files[0];

        if(file){
          var reader = new FileReader();

          reader.onload = function(){
            $("#previewPp").attr("src", reader.result);
          }

          reader.readAsDataURL(file);
        }
      }
      </script>

      <script>
      function previewFileKtp(input){
        $(".ktp").removeClass('hidden');
        var file = $("input[name=ktp]").get(0).files[0];

        if(file){
          var reader = new FileReader();

          reader.onload = function(){
            $("#previewKtp").attr("src", reader.result);
          }

          reader.readAsDataURL(file);
        }
      }
      </script>

      <script>
      function previewFileKk(input){
        $("#previewKk").removeClass('hidden');
        var file = $("input[name=kk]").get(0).files[0];

        if(file){
          var reader = new FileReader();

          reader.onload = function(){
            $("#previewKk").attr("src", reader.result);
          }

          reader.readAsDataURL(file);
        }
      }
      </script>
    </form>
  <?php }?>
</div>
