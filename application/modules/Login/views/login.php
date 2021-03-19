<div class="container">
  <div class="row mt-5">
    <div class="col-md-4 offset-md-4">
      <div class="card shadow-md">
        <div class="card-body">

          <div class="text-center prl-10">
            <h5 class="modal-title text-center">MASUK <small class="text-theme pull-right"><a href="<?php echo site_url('Daftar');?>"  class="text-theme text-none daftar-text">Daftar</a></small></h5>
          </div>
          <div class="sign-up-section text-center p-10">
            <div class="login-form text-left m0">
              <form action="<?php echo site_url('Auth');?>" method="post">
                <div class="form-group">
                  <label for="m_email">Email</label>
                  <?php if ($this->session->userdata('l_email')) { ?>
                    <input type="email" class="form-control" id="m_email" name="m_email" value="<?= $this->session->userdata('l_email');?>" required>
                  <?php }else { ?>
                    <input type="email" class="form-control" id="m_email" name="m_email" placeholder="Masukkan email anda" required>
                  <?php }?>
                  <small class="text-secondary">Contoh: email@mamamoorental.com</small>
                </div>
                <div class="form-group">
                  <label for="m_password">Password</label>
                  <input type="password" class="form-control" id="m_password" name="m_password" minlength="8" placeholder="Masukkan password anda" required>
                </div>
                <button type="submit" class="btn btn-primary wd-login-btn">Masuk</button>

                <div class="wd-policy">
                  <small class="text-secondary">
                    Belum punya akun? <a href="<?php echo site_url('Daftar');?>" class="text-theme text-none">Daftar</a>
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
