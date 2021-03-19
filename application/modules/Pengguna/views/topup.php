<div class="container">
  <div class="main-body">
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb" class="main-breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url();?>">MAMAMOORENTAL</a></li>
        <li class="breadcrumb-item"><a href="<?= site_url('Akun');?>">Top UP</a></li>
        <li class="breadcrumb-item active" aria-current="page"><?= $pengguna->NAMA;?></li>
      </ol>
    </nav>
    <!-- /Breadcrumb -->

    <div class="col-md-12">
      <div class="p-card">
        <div class="p-card">
          <form action="<?php echo site_url('Payment?transaksi=topup');?>" method="post">
            <div class="p-card-body">
              <div class="row">
                <div class="col-12">
                  <div class="my-account-section__header-title">Isi Saldo Deposit
                    <a href="<?php echo site_url('Akun/Deposit');?>" class="btn btn-theme btn-sm pull-right text-none text-white">BATAL</a>
                  </div>
                  <div class="my-account-section__header-subtitle">Isikan jumlah nominal yang diinginkan untuk saldo deposit.</div>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-12">
                  <input type="text" name="nominal" class="form-control" id="INPUT" placeholder="Rp.0">
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <hr>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4 col-sm-12 mb-3">
                  <!-- Simple text stats with icons -->
                  <a href="javascript:void(0)" onclick="window.location.href='<?php echo site_url('Deposit/Payment/50000');?>'">
                    <div class="card card-body">
                      <div class="row text-center d-in-table">
                        <p><i class="fa fa-money fa-3x d-inline text-theme"></i></p>
                        <h3 class="text-semibold m0 text-secondary"><span class="font-18 font-weight-normal">Rp</span>.50.000</h3>
                        <span class="text-dark text-size-small">Beli saldo deposit</span>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="col-md-4 col-sm-12 mb-3">
                  <!-- Simple text stats with icons -->
                  <a href="javascript:void(0)" onclick="window.location.href='<?php echo site_url('Deposit/Payment/100000');?>'">
                    <div class="card card-body">
                      <div class="row text-center d-in-table">
                        <p><i class="fa fa-money fa-3x d-inline text-theme"></i></p>
                        <h3 class="text-semibold m0 text-secondary"><span class="font-18 font-weight-normal">Rp</span>.100.000</h3>
                        <span class="text-dark text-size-small">Beli saldo deposit</span>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="col-md-4 col-sm-12">
                  <!-- Simple text stats with icons -->
                  <a href="javascript:void(0)" onclick="window.location.href='<?php echo site_url('Deposit/Payment/200000');?>'">
                    <div class="card card-body">
                      <div class="row text-center d-in-table">
                        <p><i class="fa fa-money fa-3x d-inline text-theme"></i></p>
                        <h3 class="text-semibold m0 text-secondary"><span class="font-18 font-weight-normal">Rp</span>.200.000</h3>
                        <span class="text-dark text-size-small">Beli saldo deposit</span>
                      </div>
                    </div>
                  </a>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <hr>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <button type="submit" class="btn btn-success btn-block font-weight-bold">LANJUT</button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <script>
  function setInputFilter(textbox, inputFilter) {
    ["input", "keydown", "keyup", "mousedown", "mouseup", "select", "contextmenu", "drop"].forEach(function(event) {
      textbox.addEventListener(event, function() {
        if (inputFilter(this.value)) {
          this.oldValue = this.value;
          this.oldSelectionStart = this.selectionStart;
          this.oldSelectionEnd = this.selectionEnd;
        } else if (this.hasOwnProperty("oldValue")) {
          this.value = this.oldValue;
          this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
        } else {
          this.value = "";
        }
      });
    });
  }
  setInputFilter(document.getElementById("INPUT"), function(value) {
    return /^-?\d*$/.test(value);
  });
  </script>
