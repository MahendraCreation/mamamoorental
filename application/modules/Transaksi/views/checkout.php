<div class="container">
  <div class="row mt-3">
    <div class="col-md-12">
      <form action="<?php echo site_url('Checkout/Done');?>" method="post">
        <input type="hidden" name="produk" value="<?= $produk->KODE_UNIT;?>">
        <input type="hidden" name="lama" value="<?= $lama_sewa;?>">
        <input type="hidden" name="waktu" value="<?php date_default_timezone_set("Asia/Jakarta"); echo date("H:i");?>, <?= date("d/m/Y");?>">
        <a class="shop-search-page__breadcrumb-link" href="<?php echo base_url();?>">
          <svg enable-background="new 0 0 11 11" viewBox="0 0 11 11" x="0" y="0" class="shopee-svg-icon icon-arrow-left">
            <g>
              <path d="m8.5 11c-.1 0-.2 0-.3-.1l-6-5c-.1-.1-.2-.3-.2-.4s.1-.3.2-.4l6-5c .2-.2.5-.1.7.1s.1.5-.1.7l-5.5 4.6 5.5 4.6c.2.2.2.5.1.7-.1.1-.3.2-.4.2z"></path>
            </g>
          </svg>
          Batal Pesanan
        </a>
        <div class="row mt-2">
          <div class="col-md-12">
            <div class="checkout-address-selection">
              <div class="shopee-border-delivery"></div>
              <div class="checkout-address-selection__container">
                <div class="checkout-address-selection__section-header">
                  <div class="checkout-address-selection__section-header-text">
                    <svg height="16" viewBox="0 0 12 16" width="12" class="shopee-svg-icon icon-location-marker">
                      <path d="M6 3.2c1.506 0 2.727 1.195 2.727 2.667 0 1.473-1.22 2.666-2.727 2.666S3.273 7.34 3.273 5.867C3.273 4.395 4.493 3.2 6 3.2zM0 6c0-3.315 2.686-6 6-6s6 2.685 6 6c0 2.498-1.964 5.742-6 9.933C1.613 11.743 0 8.498 0 6z" fill-rule="evenodd"></path>
                    </svg> alamat pengiriman
                  </div>
                </div>
                <div class="checkout-address-selection__selected-address-summary">
                  <div class="checkout-address-row">
                    <div class="checkout-address-row__user-detail"><?= $pengguna->NAMA;?> <?= preg_replace('/^0/', '(+62) ', $pengguna->HP);?></div>
                    <div class="checkout-address-row__address-summary"><?= $pengguna->JALAN?>, <?= $controller->M_transaksi->find_kota($pengguna->KOTA);?> - <?= $controller->M_transaksi->find_kec($pengguna->KECAMATAN);?>, <?= $controller->M_transaksi->find_prov($pengguna->PROVINSI);?>, Kode POS <?= $pengguna->KODE_POS?></div>
                  </div>
                  <a href="<?php echo site_url('Akun/Alamat');?>" class="checkout-address-selection__change-btn">ubah</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row mt-5">
          <div class="col-md-12">
            <div class="card shadow-sm">
              <div class="card-body">
                <div class="kP-bM3">Pemesanan</div>
                <div class="row mt-20 ml-0">
                  <div class="col-12">
                    <table width="100%" class="table table-stripped">
                      <thead class="table-secondary">
                        <tr>
                          <th width="30%">Nama Produk</th>
                          <th width="70%">Detail</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td><?= $produk->NAMA_PRODUK;?></td>
                          <td>

                            <div class="row mb-30">
                              <div class="col-12">
                                <div class="kP-bM3" style="font-size: 1rem; padding: .5rem;">Spesifikasi Produk</div>
                                <div class="row mt-20 ml-0">
                                  <div class="col-3 col-lg-2">
                                    <span class="_2iNrDS">Brand</span>
                                  </div>
                                  <div class="col-9 col-lg-10">
                                    <p><?= $produk->MERK?></p>
                                  </div>
                                </div>
                                <div class="row mt-20 ml-0">
                                  <div class="col-3 col-lg-2">
                                    <span class="_2iNrDS">Series</span>
                                  </div>
                                  <div class="col-9 col-lg-10">
                                    <p><?= $produk->TYPE?></p>
                                  </div>
                                </div>
                                <div class="row mt-20 ml-0">
                                  <div class="col-3 col-lg-2">
                                    <span class="_2iNrDS">Variant</span>
                                  </div>
                                  <div class="col-9 col-lg-10">
                                    <p><?= $produk->VARIAN?></p>
                                  </div>
                                </div>
                                <div class="row mt-20 ml-0">
                                  <div class="col-3 col-lg-2">
                                    <span class="_2iNrDS">GRADE</span>
                                  </div>
                                  <div class="col-9 col-lg-10">
                                    <p><?= $produk->GRADE?></p>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </td>
                        </tr>
                      </tbody>
                      <thead class="table-secondary">
                        <tr>
                          <th colspan="2">Detail Pemesanan</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td><b>Waktu Pemesanan</b></td>
                          <td><strong><?php date_default_timezone_set("Asia/Jakarta"); echo date("H:i");?>, <?= date("d/m/Y");?></td>
                          </tr>
                          <tr>
                            <td><b>Durasi Sewa</b></td>
                            <td><strong><?= $lama_sewa;?></strong> Hari</td>
                          </tr>
                          <tr>
                            <td><b>Biaya Sewa</b></td>
                            <td>Rp.<strong><?= number_format($biaya_sewa,0,",",".");?></strong> selama <span class="text text-secondary"><?= $lama_sewa;?> Hari</span> </td>
                          </tr>
                          <tr>
                            <td><b>Berat barang</b></td>
                            <td> <strong><?php echo $produk->BERAT; ?></strong>.<span class="text text-info">Kg</span> </td>
                          </tr>
                        </tbody>
                      </table>
                      <table width="100%" class="table table-stripped" id="vouch">
                        <tbody>
                          <input type="hidden" name="total" id="total" value="<?= $total;?>">
                          <input type="hidden" name="fee" id="ongkir" value="<?= $ongkir;?>">
                          <input type="hidden" id="lokasi" value="<?= $lokasi;?>">
                          <tr>
                            <td width="30%"><b>Ongkir</b></td>
                            <td width="70%"> Rp.<strong><?php echo number_format($ongkir,0,",",".") ?></strong> - <span class="text text-info"><?= $lokasi;?></span> </td>
                          </tr>
                          <tr>
                            <td><b>Voucher</b></td>
                            <td>
                              <div class="row">
                                <div class="col-md-8">
                                  <input type="text" name="code" id="code" placeholder="Tambahkan kode voucher" maxlength="11" class="form-control form-control-sm">
                                  <div class="alert alert-warning p-10 mt-2">
                                    <small class="text-danger">Anda dapat menambahkan kode voucher ongkir, jika memilikinya.</small>
                                  </div>
                                </div>
                                <div class="col-md-4">
                                  <button type="button" onclick="uservouch()" class="btn btn-sm btn-info">Gunakan kode voucher</button>
                                </div>
                              </div>
                            </td>
                          </tr>
                          <tr class="table-success">
                            <td><b>Total Biaya</b></td>
                            <td><h4><span class="font-weight-normal font-16">Rp.</span> <?= number_format($total,0,",",".");?></h4> <small class="text-danger">Tidak termasuk biaya admin, jika beda bank</small></td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <script type="text/javascript">
          function uservouch(){
            var code    = $("#code").val();
            var ongkir  = $("#ongkir").val();
            var total   = $("#total").val();
            var lokasi  = $("#lokasi").val();
            var send    = code+","+ongkir+","+total+","+lokasi;
            $.ajax({
              type: "POST",
              url : "<?php echo site_url('Transaksi/VoucherCode'); ?>",
              data: {send:send},
              success: function(msg){
                $('#vouch').replaceWith(msg);
              }
            });
          }
          </script>
          <div class="row mt-5">
            <div class="col-12">
              <div class="card shadow-sm">
                <div class="card-body">
                  <div class="kP-bM3">Detail rekening anda <small class="text text-danger">Harap melakukan transfer sesuai dengan No. Rekening anda dibawah ini !!</small>
                    <a href="<?php echo site_url('Akun/Bank');?>" class="checkout-address-selection__change-btn font-14 pull-right">ubah</a>
                  </div>
                  <div class="row mt-20 ml-0">
                    <div class="col-3 col-lg-2">
                      <span class="_2iNrDS">Bank</span>
                    </div>
                    <div class="col-9 col-lg-10">
                      <p><span class="badge badge-secondary"><?= $bank->BANK;?></span></p>
                    </div>
                  </div>
                  <div class="row mt-20 ml-0">
                    <div class="col-3 col-lg-2">
                      <span class="_2iNrDS">An. Rekening</span>
                    </div>
                    <div class="col-9 col-lg-10">
                      <p><?= $bank->ATAS_NAMA;?></p>
                    </div>
                  </div>
                  <div class="row mt-20 ml-0">
                    <div class="col-3 col-lg-2">
                      <span class="_2iNrDS">No Rekening</span>
                    </div>
                    <div class="col-9 col-lg-10">
                      <p><?= $bank->NO_REKENING;?></p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row mt-5">
            <div class="col-12">
              <div class="card shadow-sm">
                <div class="card-body">
                  <div class="kP-bM3">Tambahkan Catatan</div>
                  <div class="row mt-20 ml-0">
                    <div class="col-3 col-lg-2">
                      <span class="_2iNrDS">Catatan</span>
                    </div>
                    <div class="col-9 col-lg-10">
                      <textarea name="catatan" rows="3" class="form-control"></textarea>
                      <small class="text-secondary">Tambahkan catatan jika perlu, ex: Saya transfer dari rekening lain.</small>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-12">
              <button type="submit" class="btn btn-theme btn-block">Pesan Sekarang</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
