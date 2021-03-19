<div class="container">
  <div class="row mt-5 mb-5">
    <div class="col-sm-12">
      <div class="card shadow-md">
        <div class="card-body">
          <div class="text-center">
            <h5 class="modal-title text-center">Daftar Sekarang</h5>
            Sudah punya akun? <a href="<?php echo site_url('Masuk');?>" class="text-theme text-none">Masuk</a>
          </div>
          <div class="sign-up-section text-center p-10">
            <div class="login-form text-left m0">
              <form action="<?php echo site_url('Register');?>" method="POST">
                <div class="form-group">
                  <label for="d_email">Email</label>
                  <input type="email" class="form-control" name="d_email" id="d_email" placeholder="Masukkan email anda" required>
                  <small class="text-secondary">Contoh: email@mamamoorental.com</small>
                </div>
                <div class="form-group">
                  <label for="d_nama">Nama Lengkap</label>
                  <input type="text" class="form-control" name="d_nama" id="d_nama" placeholder="Masukkan nama lengkap anda" required>
                </div>
                <div class="form-group">
                  <label for="d_password">Password</label>
                  <input type="password" class="form-control" name="d_password" id="d_password-login-pass" minlength="8" placeholder="Masukkan password anda" required>
                  <small class="text-secondary">Minimal 8 karakter.</small>
                </div>
                <button type="submit" class="btn btn-primary wd-login-btn">Daftar</button>

                <div class="wd-policy">
                  <small class="text-secondary">
                    Dengan mendaftar, saya menyetujui <a href="#" class="text-theme">syarat dan Ketentuan</a> serta <a href="#" class="text-theme">Kebijakan Privasi</a>.
                  </small>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
