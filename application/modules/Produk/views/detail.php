<!-- =========================
Product Details Section
============================== -->
<section class="product-details">
  <div class="container">
    <div class="row">
      <div class="col-12 p0">
        <div class="page-location">
          <ul>
            <li><a href="<?php echo base_url();?>">
              Home
            </a></li><span class="divider">/</span>
            <li><a href="<?php echo site_url('Search/all');?>">
              <?=(!empty($this->uri->segment(1)) ? $this->uri->segment(1) : '');?>
            </a></li><span class="divider">/</span>
            <li><span class="page-location-active">
              <?= $produk->NAMA_PRODUK;?>
            </span></li>
          </ul>
        </div>
      </div>
      <div class="col-12 card-c">
        <!-- ====================================
        Product Details Gallery Section
        ========================================= -->
        <div class="row">
          <div class="product-gallery col-12 col-md-6 col-lg-5">
            <!-- ====================================
            Single Product Gallery Section
            ========================================= -->
            <div class="row">
              <div class="col-md-12 pb-15 pt-15 product-slier-details">
                <ul id="lightSlider">
                  <?php if ($foto == null) { ?>
                    <li data-thumb="<?php echo base_url();?>file/site/produk/product.png">
                      <img class="figure-img img-fluid" src="<?php echo base_url();?>file/site/produk/product.png" alt="product-img" />
                    </li>
                  <?php }else{ foreach ($foto as $pic) {?>
                    <li data-thumb="<?php echo base_url();?>file/site/produk/<?= $pic->KODE_UNIT;?>/<?= $pic->SOURCE;?>">
                      <img class="figure-img img-fluid" src="<?php echo base_url();?>file/site/produk/<?= $pic->KODE_UNIT;?>/<?= $pic->SOURCE;?>" alt="product-img" />
                    </li>
                  <?php } }?>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-6 col-12 col-md-6 col-lg-7">
            <div class="product-details-gallery">
              <div class="qaNIZv">
                <span class="text-dark"><?= $produk->NAMA_PRODUK;?></span>
              </div>
              <div class="flex _32fuIU">
                <div class="flex M3KjhJ">
                  <div class="_3Oj5_n _2z6cUg"><?= number_format($rating->RATING, 1, '.', '');?></div>
                  <div class="_1_WXLA">
                    <a href="#"><i class="fa fa-star active-color" aria-hidden="true"></i></a>
                  </div>
                </div>
                <div class="flex M3KjhJ">
                  <div class="_3Oj5_n"><?= $rating->TOTAL;?></div>
                  <div class="_1_WXLA">penilaian</div>
                </div>
              </div>
              <hr>
              <div class="list-group content-list pt-0">
                <div style="margin-top: -0px;">
                  <div class="flex flex-column">
                    <div class="flex flex-column KHpkTU">
                      <div class="flex items-center">
                        <div class="flex items-center _2n_9_X">
                          <div class="flex items-center" style="width:100% !important">
                            <div class="row col-12 pl-0">
                              <div class="col-6">
                                <div class="_3n5NQx"><span class="font-16">15 Hari</span> <span class="font-14">Rp.</span><?= number_format($produk->HARGA_15,0,",",".");?></div>
                              </div>
                              <div class="col-6">
                                <div class="_3n5NQx"><span class="font-16">30 Hari</span> <span class="font-14">Rp.</span><?= number_format($produk->HARGA_30,0,",",".");?></div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <form action="<?php echo site_url('Checkout');?>" method="get">
                  <div class="row mt-20">
                    <div class="col-4 col-lg-3">
                      <span class="_2iNrDS">Pengiriman</span>
                    </div>
                    <div class="col-8 col-lg-9">
                      <div class="form-check form-check-inline">
                        <input type="radio" id="kurir1" name="kurir" class="form-check-input" value="jnt" onclick="jnt_ongkir();" autocomplete="off" required>
                        <label class="form-check-label pl-0" for="kurir1">JNT Kurir</label>
                      </div>
                      <div class="form-check form-check-inline ml-5">
                        <input type="radio" id="kurir2" name="kurir" class="form-check-input" value="mamamoo" onclick="mamamoo_ongir();" autocomplete="off" required>
                        <label class="form-check-label pl-0" for="kurir2">MAMAMOO Kurir</label>
                      </div>
                    </div>
                  </div>
                  <div class="row mt-20">
                    <div class="col-4 col-lg-3">
                      <span class="_2iNrDS">Keterangan</span>
                    </div>
                    <div class="col-8 col-lg-9">
                      <div class="hide" id="mamamoo">
                        <?php foreach ($ongkir_mamamoo as $key) { ?>
                          <p>Pengiriman Kurir Mamamoo, daerah <span class="text-danger"><?= $key->KETERANGAN;?></span><br> Fee Rp.<b><?= $key->VALUE ?></b>/kg </p>
                        <?php } ?>
                        <hr>
                        <p><?= $produk->KETERANGAN;?></p>
                      </div>
                      <div class="hide" id="jnt">
                        <?php foreach ($ongkir_jnt as $key) { ?>
                          <p>Pengiriman Kurir JNT, daerah <span class="text-danger"><?= $key->KETERANGAN;?></span><br> Fee Rp.<b><?= $key->VALUE ?></b>/kg </p>
                        <?php } ?>
                        <hr>
                        <p><?= $produk->KETERANGAN;?></p>
                      </div>
                    </div>
                  </div>
                  <input type="hidden" name="produk" value="<?= $produk->KODE_UNIT_U;?>">
                  <div class="row mt-20">
                    <div class="col-4 col-lg-3">
                      <span class="_2iNrDS">Lama Sewa</span>
                    </div>
                    <div class="col-8 col-lg-9">
                      <div class="form-check form-check-inline">
                        <input type="radio" id="customRadioInline1" name="sewa" class="form-check-input" value="15" autocomplete="off" required>
                        <label class="form-check-label pl-0" for="customRadioInline1">15 hari</label>
                      </div>
                      <div class="form-check form-check-inline ml-5">
                        <input type="radio" id="customRadioInline2" name="sewa" class="form-check-input" value="30" autocomplete="off" required>
                        <label class="form-check-label pl-0" for="customRadioInline2">30 Hari</label>
                      </div>
                    </div>
                  </div>
                  <div class="row mt-20">
                    <div class="col-12">
                      <?php if ($produk->TERSEDIA == 0) { ?>
                        <button type="button" class="btn btn-outline-theme mr-2"><i class="fa fa-circle"></i> Mohon Maaf Sedang Disewa</button>
                      <?php }else { ?>
                        <button type="submit" class="btn btn-outline-theme mr-2"><i class="fa fa-shopping-cart"></i> Sewa Sekarang</button>
                      <?php }?>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row mt-20">
      <div class="col-md-12 p0">

        <div class="wd-tab-section">
          <div class="bd-example bd-example-tabs">
            <ul class="nav nav-pills mb-3 wd-tab-menu" id="pills-tab" role="tablist">
              <li class="nav-item col-6 col-md">
                <a class="nav-link active" id="description-tab" data-toggle="pill" href="#description-section" role="tab" aria-controls="description-section" aria-expanded="true">Deskripsi</a>
              </li>
              <li class="nav-item col-6 col-md">
                <a class="nav-link" id="reviews-tab" data-toggle="pill" href="#reviews" role="tab" aria-controls="reviews" aria-expanded="false">Review</a>
              </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
              <div class="tab-pane fade active show " id="description-section" role="tabpanel" aria-labelledby="description-tab" aria-expanded="true">
                <div class="card-c">
                  <div class="card-body">
                    <div class="row mb-30">
                      <div class="col-12">
                        <div class="kP-bM3">Spesifikasi Produk</div>
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
                    <div class="row mb-30">
                      <div class="col-12">
                        <div class="kP-bM3">Produk Knowledge</div>

                        <div class="row">
                          <div class="col-md-6">
                            <div class="row mt-20 ml-0">
                              <div class="col-4 col-lg-3">
                                <span class="_2iNrDS">Power Source</span>
                              </div>
                              <div class="col-8 col-lg-9">
                                <p>
                                  <?php if($knowledge->COLOK_LISTRIK == TRUE){ echo '<span class="badge badge-secondary mr-2">COLOK LISTRIK</span>';}?>
                                  <?php if($knowledge->BATERAI_AA == TRUE){ echo '<span class="badge badge-secondary">BATERAI AA</span>';}?>
                                  <?php if($knowledge->POWERBANK_USB == TRUE){ echo '<span class="badge badge-secondary">POWERBANK / USB</span>';}?>
                                  <?php if($knowledge->RECHARGEABLE == TRUE){ echo '<span class="badge badge-secondary">Rechargeable / Dapat di cas ulang</span>';}?>
                                </p>
                              </div>
                            </div>
                            <div class="row mt-20 ml-0">
                              <div class="col-4 col-lg-3">
                                <span class="_2iNrDS">Type</span>
                              </div>
                              <div class="col-8 col-lg-9">
                                <p><?php echo $knowledge->TYPE;?></p>
                              </div>
                            </div>
                            <div class="row mt-20 ml-0">
                              <div class="col-4 col-lg-3">
                                <span class="_2iNrDS">Suction</span>
                              </div>
                              <div class="col-8 col-lg-9">
                                <p><?php echo $knowledge->SUCTION;?></p>
                              </div>
                            </div>
                            <div class="row mt-20 ml-0">
                              <div class="col-4 col-lg-3">
                                <span class="_2iNrDS">Level</span>
                              </div>
                              <div class="col-8 col-lg-9">
                                <p><?php echo $knowledge->LEVEL;?></p>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="row mt-20 ml-0">
                              <div class="col-4 col-lg-3">
                                <span class="_2iNrDS">Fase</span>
                              </div>
                              <div class="col-8 col-lg-9">
                                <p class="text-theme">
                                  <?php if ($knowledge->STIMULATES == TRUE) { echo "Stimulates, "; }?>
                                  <?php if ($knowledge->STIMULATES == TRUE) { echo "Expressions, "; }?>
                                  <?php if ($knowledge->STIMULATES == TRUE) { echo "dan Fase Tambahan"; }?>
                                </p>
                              </div>
                            </div>
                            <div class="row mt-20 ml-0">
                              <div class="col-4 col-lg-3">
                                <span class="_2iNrDS">Total</span>
                              </div>
                              <div class="col-8 col-lg-9">
                                <p><?php echo $knowledge->TOTAL;?></p>
                              </div>
                            </div>
                            <div class="row mt-20 ml-0">
                              <div class="col-4 col-lg-3">
                                <span class="_2iNrDS">CYCLE</span>
                              </div>
                              <div class="col-8 col-lg-9">
                                <p class="text-theme"><?php if ($knowledge->CYCLE == TRUE) { echo "Ada"; }else{ echo "Tidak tersedia";}?></p>
                              </div>
                            </div>
                            <div class="row mt-20 ml-0">
                              <div class="col-4 col-lg-3">
                                <span class="_2iNrDS">Tuas Manual</span>
                              </div>
                              <div class="col-8 col-lg-9">
                                <p class="text-theme"><?php if ($knowledge->CYCLE == TRUE) { echo "Ada"; }else{ echo "Tidak tersedia";}?></p>
                              </div>
                            </div>
                          </div>
                        </div>
                        <hr>
                        <div class="row mt-20 ml-0">
                          <div class="col-3 col-lg-2">
                            <span class="_2iNrDS">Fitur Tambahan</span>
                          </div>
                          <div class="col-9 col-lg-10">
                            <p><?php echo $knowledge->FITUR_TAMBAHAN;?></p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="tab-pane fadereviews-section" id="reviews">
                <?php if ($review == false) { ?>

                  <div class="col-12 review-our-product-area">
                    <div class="row">
                      <div class="col-md-12">
                        <h4 class="text-muted"><center>Belum ada review</center></h4>
                      </div>
                    </div>
                  </div>
                <?php }else { ?>
                  <div class="row">
                    <div class="col-12">
                      <style>
                      .review-rating {
                        left: 40% !important;
                      }
                      </style>
                      <h6 class="review-rating-title">Average Ratings and Reviews</h6>
                      <div class="row tab-rating-bar-section">
                        <div class="col-8 col-md-4 col-lg-4">
                          <img src="<?= base_url();?>assets/frontend/img/review-bg.png" alt="review-bg">
                          <div class="review-rating text-center">
                            <h1 class="rating"><?= number_format($rating->RATING, 1, '.', '');?></h1>
                            <br><p><?= $rating->TOTAL;?> Reviews</p>
                          </div>
                        </div>
                        <div class="col-12 col-md-3 rating-bar-section">
                          <div class="media rating-star-area">
                            <p>5 <i class="fa fa-star" aria-hidden="true"></i></p>
                            <div class="media-body rating-bar">
                              <div class="progress wd-progress">
                                <?php
                                $rat  = $controller->M_produk->progress_rating(5);
                                $prog = ($rat/$rating->TOTAL)*100;
                                ?>
                                <div class="progress-bar wd-bg-green" role="progressbar" style="width: <?= $prog;?>%" aria-valuenow="<?= $prog;?>" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                            </div>
                          </div>
                          <div class="media rating-star-area">
                            <p>4 <i class="fa fa-star" aria-hidden="true"></i></p>
                            <div class="media-body rating-bar">
                              <div class="progress wd-progress">
                                <?php
                                $rat  = $controller->M_produk->progress_rating(4);
                                $prog = ($rat/$rating->TOTAL)*100;
                                ?>
                                <div class="progress-bar wd-bg-green" role="progressbar" style="width: <?= $prog;?>%" aria-valuenow="<?= $prog;?>" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                            </div>
                          </div>
                          <div class="media rating-star-area">
                            <p>3 <i class="fa fa-star" aria-hidden="true"></i></p>
                            <div class="media-body rating-bar">
                              <div class="progress wd-progress">
                                <?php
                                $rat  = $controller->M_produk->progress_rating(3);
                                $prog = ($rat/$rating->TOTAL)*100;
                                ?>
                                <div class="progress-bar wd-bg-green" role="progressbar" style="width: <?= $prog;?>%" aria-valuenow="<?= $prog;?>" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                            </div>
                          </div>
                          <div class="media rating-star-area">
                            <p>2 <i class="fa fa-star" aria-hidden="true"></i></p>
                            <div class="media-body rating-bar">
                              <div class="progress wd-progress">
                                <?php
                                $rat  = $controller->M_produk->progress_rating(2);
                                $prog = ($rat/$rating->TOTAL)*100;
                                ?>
                                <div class="progress-bar wd-bg-yellow" role="progressbar" style="width: <?= $prog;?>%" aria-valuenow="<?= $prog;?>" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                            </div>
                          </div>
                          <div class="media rating-star-area">
                            <p>1 <i class="fa fa-star" aria-hidden="true"></i></p>
                            <div class="media-body rating-bar">
                              <div class="progress wd-progress">
                                <?php
                                $rat  = $controller->M_produk->progress_rating(1);
                                $prog = ($rat/$rating->TOTAL)*100;
                                ?>
                                <div class="progress-bar wd-bg-red" role="progressbar" style="width: <?= $prog;?>%" aria-valuenow="<?= $prog;?>" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <hr>

                      <div class="reviews-market">
                        <!--
                        =================================
                        Review Our Product
                        =================================
                      -->
                      <div class="review-our-product text-left row">
                        <div class="col-12 col-lg-6 reviews-title">
                          <h3>Review to our Produk</h3>
                        </div>

                        <div class="col-12 col-lg-6 text-right display-none-md">

                        </div>

                        <!-- =================================
                        Review Client Section
                        ================================= -->
                        <?php foreach ($review as $key) { ?>
                          <div class="col-12 review-our-product-area">
                            <div class="row">
                              <div class="col-12 col-md-6">
                                <div class="row">
                                  <div class="col-12">
                                    <div class="media">
                                      <div class="media-left media-middle">
                                        <a href="#">
                                          <img class="rounded-circle" width="64" height="64" src="<?= base_url();?>file/site/pengguna/<?= $key->KODE_PERSONAL;?>/<?= $key->FOTO;?>" alt="client-img">
                                        </a>
                                      </div>
                                      <div class="media-body">
                                        <h4 class="media-heading client-title mt-3 ml-2"><?= $key->NAMA;?></h4>

                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="col-12 col-md-6 review-date-time">
                                <p class="review-date"><?= $key->tanggal_nilai;?></p>
                                <p class="review-time">at <?= $key->waktu_nilai;?></p>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-12"></div>
                              <div class="col-6 col-md-4">
                                <div class="rating-market-section">
                                  <?php
                                  for ($i=1; $i <= $key->NILAI; $i++) {
                                    echo '<i class="fa fa-star fa-lg text-warning" aria-hidden="true"></i> ';
                                  }
                                  ?>
                                  <?php
                                  for ($a=1; $a <= 5-$key->NILAI; $a++) {
                                    echo '<i class="fa fa-star-o fa-lg" aria-hidden="true"></i> ';
                                  }
                                  ?>
                                </div>
                              </div>
                              <div class="col-6 col-md-4">
                                <div class="client-review-list">
                                  <div class="media">
                                    <div class="media-left media-middle">
                                      <a href="#">
                                        <img class="media-object" src="<?php echo base_url();?>assets/frontend/img/client/client-list-icon-1.png" alt="client-img">
                                      </a>
                                    </div>
                                    <div class="media-body">
                                      <h6 class="media-heading">Review Tag</h6>
                                    </div>
                                  </div>
                                  <ul class="check-list">
                                    <?php foreach ($controller->M_produk->get_review_tag($key->ID_NILAI) as $value) {?>
                                      <li><i class="fa fa-check" aria-hidden="true"></i> <?= $value->TAG;?></li>
                                    <?php } ?>
                                  </ul>
                                </div>
                              </div>
                              <div class="col-6 col-md-4">
                                <div class="client-review-list">
                                  <div class="media">
                                    <div class="media-body">
                                      <h6 class="media-heading"><?= $key->KOMENTAR;?></h6>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        <?php } ?>
                      </div>
                    </div>
                  </div>
                </div>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>
</section>

<script>
function jnt_ongkir(){
  $("#jnt").removeClass('hide');
  $('#mamamoo').addClass('hide');
}
function mamamoo_ongir(){
  $("#mamamoo").removeClass('hide');
  $('#jnt').addClass('hide');
}
</script>

<script src="<?php echo base_url();?>assets/frontend/js/input-number.js"></script>
