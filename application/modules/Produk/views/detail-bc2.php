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
            <li><a href="<?=(!empty($this->uri->segment(1)) ? $this->uri->segment(1) : '');?>">
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
              <div class="col-md-12 pb-15 product-slier-details">
                <ul id="lightSlider">
                  <a href="<?php echo site_url('Produk/'.$produk->KODE_UNIT);?>">
                    <?php if ($foto == null) { ?>
                      <li data-thumb="<?php echo base_url();?>file/site/produk/product.png">
                        <img class="figure-img img-fluid" src="<?php echo base_url();?>file/site/produk/product.png" alt="product-img" />
                      </li>
                    <?php }else{ foreach ($foto as $pic) {?>
                      <li data-thumb="<?php echo base_url();?>file/site/produk/<?= $pic->SOURCE;?>">
                        <img class="figure-img img-fluid" src="<?php echo base_url();?>file/site/produk/<?= $pic->SOURCE;?>" alt="product-img" />
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
                <hr>
                <!-- <div class="flex _32fuIU">
                  <div class="flex M3KjhJ">
                    <div class="_3Oj5_n _2z6cUg">4.9</div>
                    <div class="_1_WXLA">
                      <a href="#"><i class="fa fa-star active-color" aria-hidden="true"></i></a>
                    </div>
                  </div>
                  <div class="flex M3KjhJ">
                    <div class="_3Oj5_n">47</div>
                    <div class="_1_WXLA">penilaian</div>
                  </div>
                </div> -->
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
                  <!-- <div class="row mt-20">
                  <div class="col-4 col-lg-3">
                  <span class="_2iNrDS">Pengiriman</span>
                </div>
                <div class="col-8 col-lg-9">
                <p>Dalam Kota Free Ongkir</p>
              </div>
            </div> -->
            <form class="" action="<?php echo site_url('Checkout?produk='.$produk->KODE_UNIT);?>" method="post">
            <div class="row mt-20">
              <div class="col-4 col-lg-3">
                <span class="_2iNrDS">Keterangan</span>
              </div>
              <div class="col-8 col-lg-9">
                <p><?= $produk->KETERANGAN;?></p>
              </div>
            </div>
            <hr>
            <div class="row mt-20">
              <div class="col-12">
                <a href="<?php echo site_url('Checkout?produk='.$produk->KODE_UNIT);?>" class="btn btn-outline-theme mr-2"><i class="fa fa-shopping-cart"></i> Sewa Sekarang</a>
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
    <div class="card-c">
      <div class="card-body">
        <div class="row mb-30">
          <div class="col-12">
            <div class="kP-bM3">Spesifikasi Produk</div>
            <!-- <div class="row mt-20 ml-0">
            <div class="col-3 col-lg-2">
            <span class="_2iNrDS">Kategori</span>
          </div>
          <div class="col-9 col-lg-10">
          <p><span class="badge badge-secondary">UV</span></p>
        </div>
      </div> -->
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
      <div class="row mt-20 ml-0">
        <div class="col-3 col-lg-2">
          <span class="_2iNrDS">Jumlah Unit ini</span>
        </div>
        <div class="col-9 col-lg-10">
          <p>-</p>
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
              <p class="text-theme"><?php if ($knowledge->CYCLE == TRUE) { echo "Ada"; }?></p>
            </div>
          </div>
          <div class="row mt-20 ml-0">
            <div class="col-4 col-lg-3">
              <span class="_2iNrDS">Tuas Manual</span>
            </div>
            <div class="col-8 col-lg-9">
              <p class="text-theme"><?php if ($knowledge->CYCLE == TRUE) { echo "Ada"; }?></p>
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
  <!-- <div class="row mb-30">
  <div class="col-12">
  <div class="kP-bM3">Deskripsi Produk</div>
  <div class="row mt-20 ml-0">
  <div class="col-12">
  <p>- Valve ORIGINAL logo spectra</p>
</div>
</div>
</div>
</div> -->
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</section>


<script src="<?php echo base_url();?>assets/frontend/js/input-number.js"></script>