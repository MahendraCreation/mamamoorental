<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/

// ADMIN

$route['Statistik']              = 'Admin/Statistik';
$route['Browser']                = 'Admin/Browser';

$route['Pengguna/(:any)']                     = 'Admin/detail_pengguna/$1';
$route['Pengguna/Verifikasi/(:any)']          = 'Admin/pengguna_verifikasi/$1';
$route['Pengguna/Revoke/(:any)']              = 'Admin/pengguna_revoke/$1';
$route['DataPengguna']            = 'Admin/data_pengguna';

$route['EditProduk/(:any)']       = 'Admin/edit_data/$1';
$route['DetailProduk/(:any)']     = 'Admin/DetailProduk/$1';

$route['TambahkanProduk']         = 'Admin/proses_produk';
$route['TambahProduk']            = 'Admin/tambah_produk';
$route['DataInventaris']          = 'Admin/data_produk';
$route['ProdukKnowledge']         = 'Admin/produk_knowledge';

$route['Pesanan/Verifikasi']      = 'Admin/data_pesanan';
$route['Pesanan/Ditolak']         = 'Admin/ditolak';
$route['Pesanan/Disewa']          = 'Admin/sedang_disewa';
$route['Pesanan/Riwayat']         = 'Admin/sewa_riwayat';
$route['Pesanan/Detail/(:any)']           = 'Admin/detail_sewa/$1';
$route['VerifikasiPesanan/(:any)']        = 'Admin/VerifikasiPesanan/$1';
$route['Pesanan/Tolak']                   = 'Admin/TolakPesanan';
$route['Pesanan/Diterima/(:any)']         = 'Admin/TerimaPesanan/$1';

$route['Pengiriman/Dikemas']        = 'Admin/pengiriman_dikemas';
$route['Pengiriman/dikirim']        = 'Admin/pengiriman_dikirim';
$route['Pengiriman/Riwayat']        = 'Admin/pengiriman_riwayat';
$route['Pengiriman/Kirim']          = 'Admin/pengiriman_kirim';
$route['Pengiriman/Kembali']        = 'Admin/Kembali';

$route['Pesanan/Revoke/(:num)/(:any)']          = 'Admin/revoke_pesanan/$1/$2';

$route['Deposit/Permintaan']       = 'Admin/deposit_minta';
$route['Deposit/Saldo']            = 'Admin/deposit_saldo';
$route['Deposit/Riwayat']          = 'Admin/deposit_riwayat';
$route['Deposit/Detail/(:any)']    = 'Admin/deposit_detail/$1';
$route['VerifikasiDeposit/(:any)']       = 'Admin/VerifikasiDeposit/$1';


$route['Pengaturan']          = 'Admin/Pengaturan';
$route['Voucher']             = 'Pengaturan/Voucher';
$route['Voucher/Riwayat']     = 'Pengaturan/RiwayatVoucher';


$route['Laporan/Transaksi']        = 'Admin/sewa_riwayat';
$route['Laporan/Deposit']          = 'Admin/deposit_riwayat';

// FRONT END

$route['Akun']                = 'Pengguna/Detail';
$route['Akun/Bank']           = 'Pengguna/Bank';
$route['Akun/Alamat']         = 'Pengguna/Alamat';
$route['Akun/Penjamin']       = 'Pengguna/Penjamin';
$route['Akun/Password']       = 'Pengguna/Password';
$route['Akun/Deposit']        = 'Pengguna/Deposit';

$route['Akun/TopUp']          = 'Pengguna/Topup';
$route['Akun/KTP']            = 'Pengguna/KTP';
$route['Akun/KK']             = 'Pengguna/KK';
$route['Akun/Email']          = 'Pengguna/Email';
$route['Akun/Phone']          = 'Pengguna/Phone';

$route['Akun/Pesanan']        = 'Pengguna/Pesanan';
$route['Pesanan/(:any)']      = 'Pengguna/PesananDetail/$1';


$route['Produk/(:any)']       = 'Produk/Detail/$1';
$route['Search/(:any)']       = 'Produk/index/$1';

$route['Deposit/Payment/(:any)']    = 'Transaksi/Payment/$1';
$route['Payment']                   = 'Transaksi/Payment';

$route['Diterima']                  = 'Pengguna/Diterima';
$route['Pengembalian/(:any)']       = 'Pengguna/Kembali/$1';
$route['Pesanan/Selesai/(:any)']    = 'Pengguna/KirimKembali/$1';

//SEWA
// $route['Keranjang/Diterima']  = 'Transaksi/diterima';


$route['Pembayaran']          = 'Transaksi/konfirmasi';
$route['Checkout/Done']       = 'Transaksi/Pembayaran';
$route['Checkout']            = 'Transaksi/checkout';

$route['bayar/(:any)']        = 'Transaksi/upload_bayar/$1';
// $route['bayar/(:any)']        = 'Transaksi/upload_bayar/$1';

$route['Done']                = 'Transaksi/Done_bayar';
$route['ResendPembayaran']    = 'Transaksi/Resend';
$route['UbahBukti/(:any)']    = 'Transaksi/UbahBukti/$1';
$route['KirimUbah']           = 'Transaksi/KirimUbah';

// $route['Verifikasi/(:any)']   = 'Login/verifikasi/$1';

$route['Disclaimer']          = 'Login/Disclaimer';
$route['SyaratdanKetentuan']  = 'Login/SyaratdanKetentuan';
$route['KebijakandanPrivasi'] = 'Login/KebijakandanPrivasi';

$route['Resend']              = 'Login/Resend';

$route['Welcome']             = 'Login/activate';
$route['aktivasi']            = 'Login/aktivasi';
$route['activate']            = 'Login/verifikasi';
$route['Daftar']              = 'Login/daftar';
$route['Masuk']               = 'Login';
$route['Keluar']              = 'Login/logout';

$route['Register']            = 'Login/register';
$route['Auth']                = 'Login/auth';


$route['Tentang']             = 'Home/Tentang';
$route['Promo']               = 'Home/Promo';

$route['default_controller']  = 'Home';
$route['404_override']        = 'Home/Error404';
$route['translate_uri_dashes'] = FALSE;
