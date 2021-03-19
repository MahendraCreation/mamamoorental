<div class="p-card">
  <div class="p-card-body">
    <div class="d-flex flex-column align-items-center text-center">
      <img src="<?= base_url();?>file/site/pengguna/<?= $pengguna->KODE_PERSONAL;?>/<?= $pengguna->FOTO;?>" alt="Admin" class="rounded-circle" width="150" height="150">
      <div class="mt-3">
        <h4><?= $pengguna->NAMA;?></h4>
        <a href="<?php echo site_url();?>Akun" class="btn btn-outline-primary btn-sm mt-2 text-none">Edit data diri</a>
      </div>
    </div>
  </div>
</div>
<div class="p-card mt-3">
  <ul class="list-group list-group-flush">
    <a href="<?= site_url('Akun');?>" class="user-menu">
      <li class="list-group-item d-flex align-items-center flex-wrap" style="border-bottom: 1px solid rgba(0,0,0,.125);">
        <div class="userpage-sidebar-menu-entry__icon" style="background-color: rgb(255, 193, 7);">
          <svg enable-background="new 0 0 15 15" viewBox="0 0 15 15" x="0" y="0" class="shopee-svg-icon user-page-sidebar-icon icon-headshot">
            <i class="fa fa-user userpage-icon" style="left: -5.5px !important;"></i>
          </svg>
        </div>
        <span class="mb-0">Profil</span>
      </li>
    </a>
    <a href="<?= site_url('Akun/Bank');?>" class="user-menu">
      <li class="list-group-item d-flex align-items-center flex-wrap" style="border-bottom: 1px solid rgba(0,0,0,.125);">
        <div class="userpage-sidebar-menu-entry__icon" style="background-color: rgb(26, 199, 43);">
          <svg enable-background="new 0 0 15 15" viewBox="0 0 15 15" x="0" y="0" class="shopee-svg-icon user-page-sidebar-icon icon-headshot">
            <i class="fa fa-credit-card userpage-icon"></i>
          </svg>
        </div>
        <span class="mb-0">Bank & Kartu</span>
      </li>
    </a>
    <a href="<?= site_url('Akun/Alamat');?>" class="user-menu">
      <li class="list-group-item d-flex align-items-center flex-wrap" style="border-bottom: 1px solid rgba(0,0,0,.125);">
        <div class="userpage-sidebar-menu-entry__icon" style="background-color: rgb(255, 119, 97);">
          <svg enable-background="new 0 0 15 15" viewBox="0 0 15 15" x="0" y="0" class="shopee-svg-icon user-page-sidebar-icon icon-headshot">
            <i class="fa fa-address-card userpage-icon"></i>
          </svg>
        </div>
        <span class="mb-0">Alamat</span>
      </li>
    </a>
    <a href="<?= site_url('Akun/Penjamin');?>" class="user-menu">
      <li class="list-group-item d-flex align-items-center flex-wrap" style="border-bottom: 1px solid rgba(0,0,0,.125);">
        <div class="userpage-sidebar-menu-entry__icon" style="background-color: rgb(188, 54, 244);">
          <svg enable-background="new 0 0 15 15" viewBox="0 0 15 15" x="0" y="0" class="shopee-svg-icon user-page-sidebar-icon icon-headshot">
            <i class="fa fa-users userpage-icon"></i>
          </svg>
        </div>
        <span class="mb-0">Penjamin</span>
      </li>
    </a>
    <a href="<?= site_url('Akun/Password');?>" class="user-menu">
      <li class="list-group-item d-flex align-items-center flex-wrap" style="border-bottom: 1px solid rgba(0,0,0,.125);">
        <div class="userpage-sidebar-menu-entry__icon" style="background-color: rgb(238, 77, 45);">
          <svg enable-background="new 0 0 15 15" viewBox="0 0 15 15" x="0" y="0" class="shopee-svg-icon user-page-sidebar-icon icon-headshot">
            <i class="fa fa-key userpage-icon"></i>
          </svg>
        </div>
        <span class="mb-0">Ubah Password</span>
      </li>
    </a>
    <a href="<?= site_url('Akun/Pesanan');?>" class="user-menu">
      <li class="list-group-item d-flex align-items-center flex-wrap" style="border-bottom: 1px solid rgba(0,0,0,.125);">
        <div class="userpage-sidebar-menu-entry__icon" style="background-color: rgb(68, 181, 255);">
          <svg enable-background="new 0 0 15 15" viewBox="0 0 15 15" x="0" y="0" class="shopee-svg-icon user-page-sidebar-icon icon-headshot">
            <i class="fa fa-shopping-cart userpage-icon"></i>
          </svg>
        </div>
        <span class="mb-0">Pesanan Saya</span>
      </li>
    </a>
    <a href="<?= site_url('Akun/Deposit');?>" class="user-menu">
      <li class="list-group-item d-flex align-items-center flex-wrap">
        <div class="userpage-sidebar-menu-entry__icon" style="background-color: rgb(255, 174, 4);">
          <svg enable-background="new 0 0 15 15" viewBox="0 0 15 15" x="0" y="0" class="shopee-svg-icon user-page-sidebar-icon icon-headshot">
            <i class="fa fa-money userpage-icon"></i>
          </svg>
        </div>
        <span class="mb-0">Deposit</span>
      </li>
    </a>
  </ul>
</div>
