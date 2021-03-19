<!DOCTYPE html>
<html class="no-js" lang="id">
<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title><?=$website[0];?></title>
  <meta name="description" content="<?=$website[1];?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- <link rel="apple-touch-icon" href="apple-touch-icon.png"> -->
  <link rel="icon" type="image/x-icon" href="<?php echo base_url(); ?>file/site/logo/<?= $website[3];?>">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,400italic,600" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/frontend/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/frontend/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/frontend/css/custom.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/frontend/css/order.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/frontend/css/rating.css">
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

  <script src="<?php echo base_url();?>assets/frontend/js/jquery.min.js"></script>
</head>
<body>

  <?php if($this->session->flashdata('alert')) { ?>
    <div class="modal fade" id="notifikasi" role="dialog" tabindex="-1" >
      <div class="modal-dialog modal-dialog-centered" role="document">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-body" style="padding-bottom: 0px !important;">
            <button type="button" class="close alcs" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <div class="alert alert-warning alert-icon shadow" role="alert">
              <p><b>NOTIFIKASI !!</b></p>
              <?php echo $this->session->flashdata('alert'); ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script type="text/javascript">
    $(window).on('load',function(){
      $('#notifikasi').modal('show');
    });
    </script>
  <?php }?>

  <div class="container-fuild">
    <div class="w-header cotp__header text-white">
      <div class="w-header-container">
        <div class="d-flex d-flex--justify">
          <div class="d-flex">
            <a class="back-page back-arrow"  onclick="window.history.go(-1); return false;"></a>
            <h1 class="text-center cotp__header__text header-text mb-0"><?php echo $step;?></h1>
            <h1 class="text-center cotp__header__text header-text-pin mb-0" style="display: none;">Verifikasi PIN Tokopedia</h1>
          </div>
        </div>
      </div>
    </div>
    <?php $this->load->view($module.'/'.$fileview); ?>
  </div>


  <script type="text/javascript">
  $(document).ready(function() {
    $('.select2-basic').select2({
      width: 'resolve' // need to override the changed default
    });
  });
  </script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
  <script src="<?php echo base_url();?>assets/frontend/js/jquery-ui.js"></script>
  <script src="<?php echo base_url();?>assets/frontend/js/popper.js"></script>
  <script src="<?php echo base_url();?>assets/frontend/js/bootstrap.min.js"></script>
</body>
</html>
