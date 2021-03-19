<table width="100%" class="table table-stripped">
  <tbody>
    <input type="hidden" name="total" value="<?= $total;?>">
    <input type="hidden" name="fee" value="<?= $ongkir;?>">
    <tr>
      <td width="30%"><b>Ongkir</b></td>
      <td width="70%"> Rp.<strong><?php echo number_format($ongkir,0,",",".");?></strong> - <span class="text text-info"><?= $lokasi;?></span> </td>
    </tr>
    <tr>
      <td><b>Voucher</b></td>
      <td>
        <div class="row">
          <div class="col-md-6">
            <div class="alert alert-warning p-10">
              <?php if ($vouch == null) { ?>
                <small class="text-danger">Harap masukkan kode voucher anda.</small>
                <input type="hidden" name="code" value="null" class="form-control form-control-sm" readonly>
              <?php }elseif($vouch == false){ ?>
                <small class="text-danger">Kode voucher tidak berlaku.</small>
                <input type="hidden" name="code" value="null" class="form-control form-control-sm" readonly>
              <?php }else{ ?>
                <small class="text-danger">Selamat anda mendapatkan potongan Rp.<?= number_format($vouch->POTONGAN,0,",",".");?>.</small>
                <input type="hidden" name="code" value="<?= $vouch->ID_VOUCHER;?>" class="form-control form-control-sm" readonly>
              <?php }?>
            </div>
          </div>
          <div class="col-md-6">
            <button type="button" class="btn btn-warning btn-sm" onClick="window.location.reload();">Reset Voucher</button>
          </div>
        </div>
      </td>
    </tr>
    <tr class="table-success">
      <td><b>Total Biaya</b></td>
      <td><h4><span class="font-weight-normal font-16">Rp.</span> <?php if($total == 0){echo "FREE";}else{echo number_format($total,0,",",".");}?></h4> <small class="text-danger">Tidak termasuk biaya admin, jika beda bank</small></td>
    </tr>
  </tbody>
</table>
