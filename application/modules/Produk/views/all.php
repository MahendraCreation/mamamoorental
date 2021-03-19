<style>
/* @media only screen and (min-width: 768px) { */

  .owl-nav {
    display:none;
  }

  .owl-stage {
    transform: none !important;
    width: 100% !important;
  }

  .owl-carousel .owl-stage-outer {

    width: 110%;
    overflow: visible;
  }

  #product-search > .owl-stage-outer > .owl-stage > .owl-item {
    display: inline-grid;
    float: none;
    margin-bottom: 30px;

  }
/* } */
</style>

<div class="container">
  <div class="row mt-3">
    <div class="col-md-12">
      <a class="shop-search-page__breadcrumb-link" href="<?php echo base_url();?>">
        <svg enable-background="new 0 0 11 11" viewBox="0 0 11 11" x="0" y="0" class="shopee-svg-icon icon-arrow-left">
          <g>
            <path d="m8.5 11c-.1 0-.2 0-.3-.1l-6-5c-.1-.1-.2-.3-.2-.4s.1-.3.2-.4l6-5c .2-.2.5-.1.7.1s.1.5-.1.7l-5.5 4.6 5.5 4.6c.2.2.2.5.1.7-.1.1-.3.2-.4.2z"></path>
          </g>
        </svg>
        kembali ke halaman utama
      </a>
      <div class="row mt-2">
        <!-- <div class="col-md-2">

        </div> -->
        <div class="col-md-12">
          <div class="shopee-sort-bar">
            <span class="shopee-sort-bar__label">Urutkan</span>
            <div class="shopee-sort-by-options">
              <!-- <a href="<?php echo site_url('Search/Terlaris');?>" class="shopee-sort-by-options__option shopee-sort-by-options__option--selected">Terlaris</a> -->
              <a href="<?php echo site_url('Search/Terbaru');?>" class="shopee-sort-by-options__option">Terbaru</a>
            </div>
          </div>
          <br>
          <div id="product-search" class="owl-carousel owl-theme">

            <?php if ($all == false) { echo "BELUM ADA PRODUK!!!";}else { foreach ($all as $all) { ?>
              <div class="col-md-12">
                <figure class="figure product-box wow fadeIn animated" data-wow-delay="0ms">
                  <div class="product-box-img">
                    <a href="<?php echo site_url('Produk/'.$all->KODE_UNIT_U);?>">
                      <?php if ($all->SOURCE == null) { ?>
                        <img src="<?php echo base_url();?>file/site/produk/product.png" class="figure-img img-fluid" alt="Product Img">
                      <?php }else{?>
                        <img src="<?php echo base_url();?>file/site/produk/<?= $all->KODE_UNIT;?>/<?= $all->SOURCE;?>" class="figure-img img-fluid h-198" alt="Product Img">
                      <?php }?>
                    </a>
                  </div>
                  <figcaption class="figure-caption">
                    <span class="badge badge-secondary wd-badge text-uppercase"><?= $all->MERK;?></span>
                    <!-- <div class="wishlist">
                    <i class="fa fa-heart" aria-hidden="true"></i>
                  </div> -->
                  <div class="content-excerpt">
                    <div class="O6wiAW" data-sqe="name"><div class="_1NoI8_ _16BAGk"><?= $all->NAMA_PRODUK;?></div></div>
                  </div>
                  <div class="price-start">
                    <span class="lwZ9D8">Rp</span>
                    <span class="_341bF0"><?= number_format($all->HARGA_15,0,",",".");?></span>
                    <span class="badge badge-<? if($all->TERSEDIA == 0){echo "warning text-white";}else { echo "info";};?> text-uppercase pull-right"><? if($all->TERSEDIA == 0){echo "Sedang disewa";}else { echo "Tersedia";};?></span>
                    <!-- <img src="<?php echo base_url();?>assets/frontend/img/free.png" class="free-ongkir" alt=""> -->
                  </div>
                  <div class="text-right">
                    <?php
                    $NILAI = $controller->M_produk->get_rating($all->KODE_UNIT);
                    // echo '<span class="mr-1 _18SLBt">('.(number_format($NILAI->RATING, 1, '.', '') == 0.0 ? 0 : number_format($NILAI->RATING, 1, '.', '')).')</span>';
                    echo '<span class="mr-1 _18SLBt">('.$NILAI->TOTAL.')</span>';
                    for ($i=1; $i <= $NILAI->TOTAL; $i++) {
                      echo '<i class="fa fa-star active-color" aria-hidden="true"></i> ';
                    }
                    for ($a=1; $a <= 5-$NILAI->TOTAL; $a++) {
                      echo '<i class="fa fa-star-o" aria-hidden="true"></i> ';
                    }
                    ?>
                  </div>
                </figcaption>
              </figure>
            </div>
          <?php }}?>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
