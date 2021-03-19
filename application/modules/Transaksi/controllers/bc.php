<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends MX_Controller {
	public function __construct(){
		parent::__construct();

		$this->load->model(['M_transaksi']);
		$this->load->library('user_agent');


		if ($this->session->userdata('logged_in') == FALSE || !$this->session->userdata('logged_in')){
			if (!empty($_SERVER['QUERY_STRING'])) {
				$uri = uri_string() . '?' . $_SERVER['QUERY_STRING'];
			} else {
				$uri = uri_string();
			}
			$this->session->set_userdata('redirect', $uri);
			$this->session->set_flashdata('alert', "Harap login ke akun anda, untuk melanjutkan");
			redirect('Masuk');
		}
		$status = $this->M_transaksi->pengguna_ver($this->session->userdata('KODE_PERSONAL'));
		if ($status == 0) {
			$this->session->set_flashdata('alert', "Akun anda belum diverifikasi kelengkapan data diri, harap menunggu sampai akun anda terverifikasi oleh admin. Hubungi admin jika hal ini masih terjadi lebih dari 1x24 jam setelah anda mendaftar!!");
			redirect('Akun');
		}
	}

	public function checkout(){
		$produk  						= $this->input->get('produk');
		$lama  							= $this->input->get('sewa');

		$data['lama_sewa']  = $lama;
		$produk							= $this->M_transaksi->get_detail($produk);

		if ($lama == 15) {
			$biaya_sewa 	= $produk->HARGA_15;
		}elseif ($lama == 30) {
			$biaya_sewa 	= $produk->HARGA_30;
		}else {
			$biaya_sewa 	= 0;
		}
		$data['biaya']			= $biaya_sewa;

		$data['produk']			= $produk;
		$data['pengguna']		= $this->M_transaksi->get_pengguna($this->session->userdata('KODE_PERSONAL'));
		$data['bank']				= $this->M_transaksi->get_bank($this->session->userdata('KODE_PERSONAL'));

		$data['controller'] = $this;
		$data['module'] 		= "Transaksi";
		if ($this->agent->is_mobile()){
			$data['fileview'] 	= "mobile_checkout";
		}else {
			$data['fileview'] 	= "checkout";
		}

		if ($this->agent->is_mobile()){
			echo Modules::run('Template/FrontEnd_Mobile', $data);
		}else{
			echo Modules::run('Template/FrontEnd_Main', $data);
		}
	}

	public function Payment($nilai = null){
		$KODE_PERSONAL	= $this->session->userdata('KODE_PERSONAL');
		$email					= $this->session->userdata('email');
		$pengguna				= $this->M_transaksi->get_pengguna($KODE_PERSONAL);
		$deposit				= $this->M_transaksi->get_deposit($KODE_PERSONAL);

		if ($nilai == null) {
			$nominal				= $this->input->post('nominal');
			$transaksi			= $this->input->get('transaksi');
		}else{
			$nominal 	= $nilai;
			$transaksi = "topup";
		}
		if ($transaksi == "topup") {

			if ($this->M_transaksi->Topup($nominal, $pengguna->KODE_PERSONAL, $deposit->KODE_DEPOSIT) == TRUE) {
				$this->session->set_flashdata('alert', 'Berhasil mengirim permintaan Pengisian Deposit, Harap cek email anda '.$this->session->userdata('email').'!!');

				$subject = 'Selesaikan PEMBAYARAN Pengisian Deposit';
				$message = '<div style="margin: 0; padding: 0; font-size: 12px">
				<style type="text/css">
				a[x-apple-data-detectors] {color: inherit !important;}
				</style>

				<table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr>
				<td style="padding: 20px 0 30px 0;">

				<table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="border-collapse: collapse; border: 1px solid #cccccc;">
				<tr>
				<td align="center" bgcolor="#70bbd9" style="padding: 40px 0 30px 0;">
				<img src="'.base_url().'/assets/frontend/img/source/e-regris.png" alt="Creating Email Magic." width="300" height="200" style="display: block;" />
				</td>
				</tr>
				<tr>
				<td bgcolor="#ffffff" style="padding: 40px 30px 40px 30px;">
				<table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
				<tr>
				<td style="color: #153643; font-family: Arial, sans-serif;">
				<h1 style="font-size: 20px; margin: 0;">'.$subject.'!</h1>
				</td>
				</tr>
				<tr>
				<td style="color: #153643; font-family: Arial, sans-serif; font-size: 14px; line-height: 20px; padding: 20px 0 30px 0;">
				<p style="margin: 0;">
				Harap mengirim Transfer untuk pengisian deposit di MAMAMOORENTAL, senilai Rp. <b>'.$nominal.'</b> <span class="text-danger"><i>ditambahkan dengan biaya admin bank masing-masing, jika beda bank.</i></span> ke REKENING dibawah ini, permintaan pengisian deposit akan hangus jika dalam waktu 1x24 jam transfer dan verfikasi pengisian tidak dilakukan:
				</p>
				<br>
				<table width="100%">
				<tr>
				<td><b>No Rekening</b></td>
				<td>: 12341234</td>
				</tr>
				<tr>
				<td><b>Atas Nama</b></td>
				<td>: MAMAMOORENTAL</td>
				</tr>
				<tr>
				<td><b>Bank</b></td>
				<td>: BCA</td>
				</tr>
				</table>
				<p>Setelah mengirim Transfer, silakan melakukan verifikasi bukti pembayaran di akun anda, atau melalui link berikut: </p>

				<div style="border:none;padding:0;margin:0;text-align:center;line-height:0">

				<a href="'.base_url().'Payment?transaksi=verifikasipengisiandeposit&kodedeposit='.$deposit->KODE_DEPOSIT.'" style="text-decoration:none;color:#ffffff;margin-left:auto;margin-right:auto;max-width:240px;background-color:#1db954;border-radius:20px;display:block" target="_blank" data-saferedirecturl="'.base_url().'Payment?transaksi=verifikasipengisiandeposit&user='.$deposit->KODE_DEPOSIT.'"><table style="border-collapse:collapse;padding:0;width:100%;max-width:240px;height:48px"><tbody style="border:none;padding:0;margin:0"><tr style="border:none;margin:0px;padding:0px"><td style="border:none;padding:0;margin:0;width:20px"></td><td style="border:none;padding:0;margin:0;font-family:&quot;circular&quot;,&quot;helvetica neue&quot;,&quot;helvetica&quot;,&quot;arial&quot;,sans-serif;font-weight:700;line-height:1.1em;letter-spacing:0.15px;font-size:14px;text-decoration:none;text-align:center;text-transform:uppercase;color:#ffffff">KONFIRMASI PEMBAYARAN SEKARANG</td><td style="border:none;padding:0;margin:0;width:20px"></td></tr></tbody></table></a>
				</div><br>

				Atau klik link berikut ini <a href="'.base_url().'Payment?transaksi=verifikasipengisiandeposit&user='.$deposit->KODE_DEPOSIT.'">'.base_url().'Payment?transaksi=verifikasipengisiandeposit&user='.$deposit->KODE_DEPOSIT.'</a><br><br><br>

				Terima kasih. <br><br>

				Salam,<br>
				ADMIN MAMAMOORENTAL<br>
				<a href="'.base_url().'" target="_blank">www.mamamoorental.com</a><br>
				</td>
				</tr>
				</table>
				</td>
				</tr>
				</table>
				</td>
				</tr>
				<tr>
				<td bgcolor="#70bbd9" style="padding: 30px 30px;">
				<table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
				<tr>
				<td style="color: #ffffff; font-family: Arial, sans-serif; font-size: 14px;">
				<p style="margin: 0;">&reg; MAMAMOORENTAL @ 2020<br/>
				</td>
				<td align="right">
				<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse;">
				<tr>
				<td>
				<a href="">
				<img src="'.base_url().'assets/frontend/img/sosmed/ig.png" alt="Twitter." width="38" height="38" style="display: block;" border="0" />
				</a>
				</td>
				<td style="font-size: 0; line-height: 0;" width="20">&nbsp;</td>
				<td>
				<a href="">
				<img src="'.base_url().'assets/frontend/img/sosmed/fb.png" alt="Facebook." width="38" height="38" style="display: block;" border="0" />
				</a>
				</td>
				</tr>
				</table>
				</td>
				</tr>
				</table>
				</td>
				</tr>
				</table>

				</td>
				</tr>
				</table>
				</div>';

				if ($this->send($email,$subject, $message) == TRUE) {

					$data['step']				= "SELESAIKAN PEMBAYARAN";
					$data['header']			= "Anda dapat melihat langkah transfer dan verifikasi di email anda - ".$email;
					$data['text']				= $this->session->flashdata('alert');
					$data['proses']			= "topup";
					$data['nominal']		= $nominal;

					$data['module'] 		= "Transaksi";
					$data['fileview'] 	= "topup";
					echo Modules::run('Template/FrontEnd_Waiting', $data);
				}else{
					$this->session->set_flashdata('alert', 'Gagal mengirim permintaan Pengisian Deposit, Coba lagi beberapa saat. Hubungi admin jika hal ini masih terjadi!!');
					header(site_url('Akun/TopUp'));
				}
			}else{
				$this->session->set_flashdata('alert', 'Gagal mengirim permintaan Pengisian Deposit, Coba lagi beberapa saat. Hubungi admin jika hal ini masih terjadi!!');
				header(site_url('Akun/TopUp'));
			}
		}elseif ($transaksi == "verifikasipengisiandeposit") {
			$get_topup = $this->M_transaksi->get_topup($deposit->KODE_DEPOSIT);
			if($this->input->post('submit')) {
				$dir					= "./file/site/pengguna/".$KODE_PERSONAL."/TopUp";
				if (!is_dir($dir)) {
					mkdir($dir, 0777, true);
				}
				$config['upload_path'] 		= $dir;
				$config['allowed_types'] 	= 'gif|jpg|png|jpeg';
				$config['max_size'] 			= '1024';
				$path 			= $_FILES['verifikasi']['name'];
				$ext 				= pathinfo($path, PATHINFO_EXTENSION);
				$file 			= "Verifikasi_".time()."_{$KODE_PERSONAL}.{$ext}";
				$config['file_name'] 			= $file;
				$config['overwrite'] 			= TRUE;
				$config['remove_spaces'] 	= TRUE;
				$this->load->library('upload', $config);
				$this->upload->initialize($config);

				if ($this->upload->do_upload('verifikasi')){
					if($this->M_transaksi->send_verifikasi($get_topup->ID_TOPUP, $KODE_PERSONAL, $file) == TRUE){
						$subject = 'BERHASIL VERIFIKASI PEMBAYARAN PENGISIAN SALDO';
						$message = '<div style="margin: 0; padding: 0; font-size: 12px">
						<style type="text/css">
						a[x-apple-data-detectors] {color: inherit !important;}
						</style>

						<table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">
						<tr>
						<td style="padding: 20px 0 30px 0;">

						<table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="border-collapse: collapse; border: 1px solid #cccccc;">
						<tr>
						<td align="center" bgcolor="#70bbd9" style="padding: 40px 0 30px 0;">
						<img src="'.base_url().'/assets/frontend/img/source/e-regris.png" alt="Creating Email Magic." width="300" height="200" style="display: block;" />
						</td>
						</tr>
						<tr>
						<td bgcolor="#ffffff" style="padding: 40px 30px 40px 30px;">
						<table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
						<tr>
						<td style="color: #153643; font-family: Arial, sans-serif;">
						<h1 style="font-size: 20px; margin: 0;">'.$subject.'!</h1>
						</td>
						</tr>
						<tr>
						<td style="color: #153643; font-family: Arial, sans-serif; font-size: 14px; line-height: 20px; padding: 20px 0 30px 0;">
						<p style="margin: 0;">
						Berhasil menerima verifikasi pembayaran pengisian saldo anda:
							</p>
							<table width="100%">
							<tr>
							<td><b>USER ID</b></td>
							<td>: '.$pengguna->KODE_PERSONAL.'</td>
							</tr>
							<tr>
							<td><b>Atas Nama</b></td>
							<td>: '.$pengguna->NAMA.'</td>
							</tr>
							<tr>
							<td><b>KODE DEPOSIT</b></td>
							<td>: '.$deposit->KODE_DEPOSIT.'</td>
							</tr>
							</table>
							<p>Selanjutnya anda akan menerima notifikasi, jika verifikasi pembayaran anda diterima</p>
							<table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
							<tr>
							<td valign="top" style="color: #153643; font-family: Arial, sans-serif; font-size: 14px; line-height: 20px; padding: 0px 0 30px 0;">


							Terima kasih. <br><br>

							Salam,<br>
							ADMIN MAMAMOORENTAL<br>
							<a href="'.base_url().'" target="_blank">www.mamamoorental.com</a><br>
							</td>
							</tr>
							</table>
							</td>
							</tr>
							</table>
							</td>
							</tr>
							<tr>
							<td bgcolor="#70bbd9" style="padding: 30px 30px;">
							<table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
							<tr>
							<td style="color: #ffffff; font-family: Arial, sans-serif; font-size: 14px;">
							<p style="margin: 0;">&reg; MAMAMOORENTAL @ 2020<br/>
							</td>
							<td align="right">
							<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse;">
							<tr>
							<td>
							<a href="">
							<img src="'.base_url().'assets/frontend/img/sosmed/ig.png" alt="Twitter." width="38" height="38" style="display: block;" border="0" />
							</a>
							</td>
							<td style="font-size: 0; line-height: 0;" width="20">&nbsp;</td>
							<td>
							<a href="">
							<img src="'.base_url().'assets/frontend/img/sosmed/fb.png" alt="Facebook." width="38" height="38" style="display: block;" border="0" />
							</a>
							</td>
							</tr>
							</table>
							</td>
							</tr>
							</table>
							</td>
							</tr>
							</table>

							</td>
							</tr>
							</table>
							</div>';

							if ($this->send($email,$subject, $message) == TRUE) {

								$this->session->set_flashdata('alert', 'Berhasil mengirim verifikasi pembayaran, anda akan menerima notifikasi dan saldo deposit anda akan bertambah saat verifikasi anda selesai. Hubungi admin jika hal ini belum terjadi dalam 1x24 jam!!');

								header('location:' . site_url('Akun/Deposit'));
							}else{
								$this->session->set_flashdata('alert', 'Gagal mengirim verifikasi pembayaran, Coba lagi beberapa saat. Hubungi admin jika hal ini masih terjadi!!');
							}
						}else{
							$this->session->set_flashdata('alert', 'Gagal mengirim verifikasi pembayaran, Coba lagi beberapa saat. Hubungi admin jika hal ini masih terjadi!!');
						}
					}else{
						$this->session->set_flashdata('alert', 'Gagal mengirim verifikasi pembayaran, Coba lagi beberapa saat. Hubungi admin jika hal ini masih terjadi!!');
					}
				}else{
					$data['step'] 			= "Upload Bukti TRANSFER";
					$data['KODE_DEPOSIT']	= $deposit->KODE_DEPOSIT;
					$data['module'] 			= "Transaksi";
					$data['fileview'] 		= "verifikasi";
					echo Modules::run('Template/FrontEnd_Waiting', $data);
				}

			}
		}




		public function upload_bayar($transaksi){
			$email 				= $this->session->userdata('email');

			$data['step']				= "Upload Bukti Pembayaran";
			$data['header']			= "Upload bukti transfer pembayaran anda ke No. Rekening 12341234 An. MAMAMOORENTAL - BCA";
			$data['text']				= "";
			$data['proses']			= "pembayaran";
			$data['transaksi']	= $transaksi;

			$data['module'] 	= "Transaksi";
			$data['fileview'] 	= "bayar";
			echo Modules::run('Template/FrontEnd_waiting', $data);
		}

		public function konfirmasi(){
			$pengguna 		= $this->input->get('pengguna');
			$transaksi  	= $this->input->get('transaksi');
			$data['penye']	  	= $this->M_transaksi->get_pengguna($this->session->userdata('KODE_PERSONAL'));

			$data['email']			= $pengguna;
			$data['kode']				= $transaksi;

			$data['step']				= "Konfirmasi Pembayaran";
			$data['header']			= "Harap Cek Email anda - ".$pengguna;
			$data['text']				= $this->session->flashdata('alert');
			$data['proses']			= "pembayaran";

			$data['module'] 	= "Transaksi";
			$data['fileview'] 	= "Waiting";
			echo Modules::run('Template/FrontEnd_waiting', $data);
		}

		public function Resend(){
			$email 					= $this->input->get('pengguna');
			$KODE_TRANSAKSI = $this->input->get('KODE_TRANSAKSI');
			$KODE_UNIT 			= $this->input->get('produk');

			if ($this->M_transaksi->cek_status($KODE_TRANSAKSI) == TRUE) {
				$this->session->set_flashdata('alert', 'Pembayaran anda telah diterima dan telah dikonfirmasi, anda tidak perlu melakukan proses ini!!');
				header('location:' . site_url('Akun/Pesanan'));
			}else{
				if ($this->sendToken($email, $KODE_TRANSAKSI, $KODE_UNIT) == TRUE) {
					$this->session->set_flashdata('alert', 'Berhasil mengirim permintaan persewaan barang, harap segera melakukan pembayaran dalam 1x24 jam. Cek email anda "'.$email.'" untuk informasi lebih lanjut!!');
					header('location:' . site_url('Pembayaran?transaksi='.$KODE_TRANSAKSI.'&pengguna='.$KODE_PERSONAL));
				}else {
					$this->session->set_flashdata('alert', 'Gagal mengirim email detail pembayaran dengan KODE TRANSAKSI <b>'.$KODE_TRANSAKSI.'</b>, Harap hubungi admin MAMAMOORENTAL !!');
					header('location:' . site_url('checkout?produk='.$KODE_UNIT));
				}
			}
		}

		function Pembayaran(){

			$email  				= $this->session->userdata('email');
			$KODE_PERSONAL  = $this->session->userdata('KODE_PERSONAL');
			$total 		 			= $this->input->post('total', true);
			$produk 		 		= $this->input->post('produk', true);
			$lama 		 			= $this->input->post('lama', true);
			$waktu 		 			= $this->input->post('waktu', true);

			$cek_email	= $this->M_transaksi->cek_email($email);

			if ($cek_email == TRUE) {

				do {

					$KODE_TRANSAKSI 	= uniqid('PAYMENT_');

				} while ($this->M_transaksi->cek_kode($KODE_TRANSAKSI) > 0);

				$transaksi = [
					'KODE_TRANSAKSI' 	=> $KODE_TRANSAKSI,
					'KODE_UNIT'				=> $produk,
					'KODE_PERSONAL'		=> $KODE_PERSONAL,
					'TOTAL'						=> $total,

				];
				$waktu_pesan = [
					'KODE_TRANSAKSI' 	=> $KODE_TRANSAKSI,
					'WAKTU_PEMESANAN' => $waktu

				];

				if ($this->M_transaksi->sewa_barang($transaksi, $waktu_pesan) == TRUE) {
					if ($this->sendToken($email, $KODE_TRANSAKSI, $produk) == TRUE) {
						$this->session->set_flashdata('alert', 'Berhasil mengirim permintaan persewaan barang, harap segera melakukan pembayaran dalam 1x24 jam. Cek email anda "'.$email.'" untuk informasi lebih lanjut!!');
						header('location:' . site_url('Pembayaran?transaksi='.$KODE_TRANSAKSI.'&pengguna='.$email));
					}else {
						$this->session->set_flashdata('alert', 'Gagal mengirim email detail pembayaran dengan KODE TRANSAKSI <b>'.$KODE_TRANSAKSI.'</b>, Harap hubungi admin MAMAMOORENTAL !!');
						header('location:' . site_url('checkout?produk='.$KODE_UNIT.'&sewa='.$lama));
					}
				}else{
					$this->session->set_flashdata('alert', 'Terjadi kesalahan saat mengirim permintaan transaksi, coba lagi nanti !!');
					header('location:' . site_url('checkout?produk='.$KODE_UNIT.'&sewa='.$lama));
				}
			}else{
				$this->session->set_flashdata('alert', 'Akun atas nama email anda tidak aktif atau tidak terdaftar. Harap melakukan aktivasi, Masuk ke akun anda atau menghubungi ADMIN MAMAMOORENTAL !!');
				header('location:' . site_url('Masuk'));
			}
		}

		function upload($KODE_PERSONAL, $KODE_TRANSAKSI, $file){
			$dir					= "./file/site/pengguna/".$KODE_PERSONAL."/bukti_bayar";
			if (!is_dir($dir)) {
				mkdir($dir, 0777, true);
			}
			$config['upload_path'] 		= $dir;
			$config['allowed_types'] 	= 'gif|jpg|png|jpeg';
			$config['max_size'] 			= '4024';
			$path = $file;
			$ext = pathinfo($path, PATHINFO_EXTENSION);
			$config['file_name'] 			= time()."_v_bayar_.{$KODE_TRANSAKSI}.{$ext}";
			$config['overwrite'] 			= TRUE;
			$config['remove_spaces'] 	= TRUE;
			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			if (!$this->upload->do_upload('bukti')){
				return FALSE;
			}else{
				return TRUE;
			}
		}

		public function Done_bayar(){
			$KODE_TRANSAKSI = $this->input->post('transaksi');
			if ($this->Done($KODE_TRANSAKSI) == TRUE) {
				if ($this->upload($this->session->userdata('KODE_PERSONAL'), $KODE_TRANSAKSI, $_FILES['bukti']['name']) == TRUE) {
					$path 		= $_FILES['bukti']['name'];
					$ext 			= pathinfo($path, PATHINFO_EXTENSION);
					$bukti 	  = time()."_v_bayar_.{$KODE_TRANSAKSI}.{$ext}";

					if ($this->M_transaksi->bukti_transaksi($bukti, $KODE_TRANSAKSI) == TRUE) {
						$this->session->set_flashdata('alert', "Berhasil upload bukti.");
						header('location:' . site_url('Akun/Pesanan'));
					}else{
						$this->session->set_flashdata('alert', "Terjadi kesalahan saat mengirim data anda.");
						header('location:' . site_url('bayar/'.$KODE_TRANSAKSI));
					}
				}else{
					$this->session->set_flashdata('alert', "Terjadi kesalahan saat mengupload file anda.");
					header('location:' . site_url('bayar/'.$KODE_TRANSAKSI));
				}
			}else {
				$this->session->set_flashdata('alert', "Terjadi kesalahan saat mengirim email ke anda.");
				header('location:' . site_url('bayar/'.$KODE_TRANSAKSI));
			}
		}

		public function sendToken($email, $KODE_TRANSAKSI, $KODE_UNIT){
			if ($this->M_transaksi->cek_status($KODE_TRANSAKSI) == TRUE) {
				$this->session->set_flashdata('alert', 'Pembayaran anda telah diterima dan telah dikonfirmasi, anda tidak perlu melakukan proses ini!!');
				header('location:' . site_url('Akun/Pesanan'));
			}else{
				$datatoken 	= $this->M_transaksi->get_token($KODE_TRANSAKSI);

				$transaksi  = $this->M_transaksi->get_transaksi($KODE_TRANSAKSI);
				$produk  		= $this->M_transaksi->get_detail($KODE_UNIT);
				$pengguna  	= $this->M_transaksi->get_pengguna($this->session->userdata('KODE_PERSONAL'));

				if($datatoken){
					$token 		= $datatoken->token;

				} else {

					$token = bin2hex(random_bytes(32));
					$datatoken = [
						'email' 					=> $email,
						'KODE_TRANSAKSI' 	=> $KODE_TRANSAKSI,
						'token' 					=> $token,
						'date_created' 		=> time()
					];

					$this->M_transaksi->save_token($datatoken);
				}

				$subject = 'Selesaikan PROSES TRANSAKSI PERSEWAAN MAMAMOORENTAL';
				$message = '<div style="margin: 0; padding: 0; font-size: 12px">
				<style type="text/css">
				a[x-apple-data-detectors] {color: inherit !important;}
				</style>

				<table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr>
				<td style="padding: 20px 0 30px 0;">

				<table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="border-collapse: collapse; border: 1px solid #cccccc;">
				<tr>
				<td align="center" bgcolor="#70bbd9" style="padding: 40px 0 30px 0;">
				<img src="'.base_url().'/assets/frontend/img/source/e-regris.png" alt="Creating Email Magic." width="300" height="200" style="display: block;" />
				</td>
				</tr>
				<tr>
				<td bgcolor="#ffffff" style="padding: 40px 30px 40px 30px;">
				<table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
				<tr>
				<td style="color: #153643; font-family: Arial, sans-serif;">
				<h1 style="font-size: 20px; margin: 0;">'.$subject.'!</h1>
				</td>
				</tr>
				<tr>
				<td style="color: #153643; font-family: Arial, sans-serif; font-size: 14px; line-height: 20px; padding: 20px 0 30px 0;">
				<p style="margin: 0;">
				Anda telah melakukan <b>TRANSAKSI</b> persewaan produk di <i>MAMAMOORENTAL</i><br>atas nama:
				</p>
				<table width="100%">
				<tr>
				<td><b>USER ID</b></td>
				<td>: '.$pengguna->KODE_PERSONAL.'</td>
				</tr>
				<tr>
				<td><b>Atas Nama</b></td>
				<td>: '.$pengguna->NAMA.'</td>
				</tr>
				<tr>
				<td><b>Email</b></td>
				<td>: '.$email.'</td>
				</tr>
				</table>
				<h4>Detail Pemesanan</h4>
				<table width="100%">
				<tr>
				<td><b>KODE TRANSAKSI</b></td>
				<td>: '.$KODE_TRANSAKSI.'</td>
				</tr>
				<tr>
				<td><b>KODE UNIT</b></td>
				<td>: '.$KODE_UNIT.'</td>
				</tr>
				<tr>
				<td><b>Nama Produk</b></td>
				<td>: '.$produk->NAMA_PRODUK.'</td>
				</tr>
				<tr>
				<td><b>Sub Total</b></td>
				<td>: <b>Rp.'.$transaksi->TOTAL.'</b></td>
				</tr>
				</table>
				<p>Silakan melakukan verifikasi bukti pembayaran, setelah pembayaran melalui TRANSFER BANK ke: <b>Rekening BCA 12341234 An. MAMAMOORENTAL</b></p>
				</td>
				</tr>
				<tr>
				<td>
				<table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
				<tr>
				<td valign="top" style="color: #153643; font-family: Arial, sans-serif; font-size: 14px; line-height: 20px; padding: 0px 0 30px 0;">

				<i>Tautan akan valid selama <b>24 jam</b>. Jika Anda merasa tidak melakukan <b>konfirmasi pembayaran</b> pada MAMAMOORENTAL, maka <b>TRANSAKSI</b> persewaan anda akan <u>hangus</u>.</i><br><br>

				<div style="border:none;padding:0;margin:0;text-align:center;line-height:0">

				<a href="'.base_url().'bayar?transaksi='.$KODE_TRANSAKSI.'&email='.$email.'&token='.$token.'" style="text-decoration:none;color:#ffffff;margin-left:auto;margin-right:auto;max-width:240px;background-color:#1db954;border-radius:20px;display:block" target="_blank" data-saferedirecturl="'.base_url().'bayar?transaksi='.$KODE_TRANSAKSI.'&email='.$email.'&token='.$token.'"><table style="border-collapse:collapse;padding:0;width:100%;max-width:240px;height:48px"><tbody style="border:none;padding:0;margin:0"><tr style="border:none;margin:0px;padding:0px"><td style="border:none;padding:0;margin:0;width:20px"></td><td style="border:none;padding:0;margin:0;font-family:&quot;circular&quot;,&quot;helvetica neue&quot;,&quot;helvetica&quot;,&quot;arial&quot;,sans-serif;font-weight:700;line-height:1.1em;letter-spacing:0.15px;font-size:14px;text-decoration:none;text-align:center;text-transform:uppercase;color:#ffffff">KONFIRMASI PEMBAYARAN SEKARANG</td><td style="border:none;padding:0;margin:0;width:20px"></td></tr></tbody></table></a>
				</div><br>

				Atau klik link berikut ini <a href="'.base_url().'bayar?transaksi='.$KODE_TRANSAKSI.'&email='.$email.'&token='.$token.'">'.base_url().'bayar?email='.$email.'&token='.$token.'</a><br><br><br>

				Terima kasih. <br><br>

				Salam,<br>
				ADMIN MAMAMOORENTAL<br>
				<a href="'.base_url().'" target="_blank">www.mamamoorental.com</a><br>
				</td>
				</tr>
				</table>
				</td>
				</tr>
				</table>
				</td>
				</tr>
				<tr>
				<td bgcolor="#70bbd9" style="padding: 30px 30px;">
				<table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
				<tr>
				<td style="color: #ffffff; font-family: Arial, sans-serif; font-size: 14px;">
				<p style="margin: 0;">&reg; MAMAMOORENTAL @ 2020<br/>
				</td>
				<td align="right">
				<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse;">
				<tr>
				<td>
				<a href="">
				<img src="'.base_url().'assets/frontend/img/sosmed/ig.png" alt="Twitter." width="38" height="38" style="display: block;" border="0" />
				</a>
				</td>
				<td style="font-size: 0; line-height: 0;" width="20">&nbsp;</td>
				<td>
				<a href="">
				<img src="'.base_url().'assets/frontend/img/sosmed/fb.png" alt="Facebook." width="38" height="38" style="display: block;" border="0" />
				</a>
				</td>
				</tr>
				</table>
				</td>
				</tr>
				</table>
				</td>
				</tr>
				</table>

				</td>
				</tr>
				</table>
				</div>';

				if ($this->send($email,$subject, $message) == TRUE) {
					return TRUE;
				}else {
					return FALSE;
				}
			}
		}

		public function send($to, $subject, $message){
			// Load PHPMailer library
			$this->load->library('phpmailer_lib');

			// PHPMailer object
			$mail = $this->phpmailer_lib->load();

			// SMTP configuration
			$mail->isSMTP();
			$mail->SMTPDebug  = FALSE;
			$mail->SMTPAuth   = TRUE;
			$mail->SMTPSecure = "tls";
			$mail->Port       = 587;
			$mail->Host       = "smtp.gmail.com";
			$mail->Username   = 'mail.mamamoorental@gmail.com';
			$mail->Password   = 'mamamoorental123';

			$mail->setFrom('mail.mamamoorental@gmail.com','no-reply - MAMAMOORENTAL');
			$mail->addReplyTo('mail.mamamoorental@gmail.com','no-reply - MAMAMOORENTAL');

			// Add a recipient
			$mail->addAddress($to);

			// Email subject
			$mail->Subject = $subject;

			// Set email format to HTML
			$mail->isHTML(true);
			// Email body content
			$mail->Body = $message;

			// Send email
			if(!$mail->send()){
				echo 'Message could not be sent. <br>';
				echo 'Mailer Error: ' . $mail->ErrorInfo;
				echo '<br>Contact ADMIN ';
				die();
				return false;
			}else{
				return true;
			}
		}

		public function Done($KODE_TRANSAKSI){
			$email = $this->session->userdata('email');
			if ($this->M_transaksi->cek_status($KODE_TRANSAKSI) == TRUE) {
				$this->session->set_flashdata('alert', 'Pembayaran anda telah diterima dan telah dikonfirmasi, anda tidak perlu melakukan proses ini!!');
				header('location:' . site_url('Akun/Pesanan'));
			}else{

				$datatoken 	= $this->M_transaksi->get_token($KODE_TRANSAKSI);

				$transaksi  = $this->M_transaksi->get_transaksi($KODE_TRANSAKSI);
				$produk  		= $this->M_transaksi->get_detail($transaksi->KODE_UNIT);
				$pengguna  	= $this->M_transaksi->get_pengguna($this->session->userdata('KODE_PERSONAL'));

				if(time() - $datatoken->date_created < (60*60*24)){

					$subject = 'Berhasil mengirim Bukti Pembayaran';
					$message = '<div style="margin: 0; padding: 0; font-size: 12px">
					<style type="text/css">
					a[x-apple-data-detectors] {color: inherit !important;}
					</style>

					<table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">
					<tr>
					<td style="padding: 20px 0 30px 0;">

					<table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="border-collapse: collapse; border: 1px solid #cccccc;">
					<tr>
					<td align="center" bgcolor="#70bbd9" style="padding: 40px 0 30px 0;">
					<img src="'.base_url().'/assets/frontend/img/source/e-regris.png" alt="Creating Email Magic." width="300" height="200" style="display: block;" />
					</td>
					</tr>
					<tr>
					<td bgcolor="#ffffff" style="padding: 40px 30px 40px 30px;">
					<table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
					<tr>
					<td style="color: #153643; font-family: Arial, sans-serif;">
					<h1 style="font-size: 20px; margin: 0;">'.$subject.'!</h1>
					</td>
					</tr>
					<tr>
					<td style="color: #153643; font-family: Arial, sans-serif; font-size: 14px; line-height: 20px; padding: 20px 0 30px 0;">
					<p style="margin: 0;">
					Anda telah berhasil mengirim bukti transfer pemesanan anda pada produk '.$produk->NAMA_PRODUK.', setelah dikonfirmasi oleh admin, pesanan anda akan diproses dan dikirim menuju alamat anda.
					</p>
					</td>
					</tr>
					<tr>
					<td>
					<table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
					<tr>
					<td valign="top" style="color: #153643; font-family: Arial, sans-serif; font-size: 14px; line-height: 20px; padding: 0px 0 30px 0;">

					Terima kasih. <br><br>

					Salam,<br>
					ADMIN MAMAMOORENTAL<br>
					<a href="'.base_url().'" target="_blank">www.mamamoorental.com</a><br>
					</td>
					</tr>
					</table>
					</td>
					</tr>
					</table>
					</td>
					</tr>
					<tr>
					<td bgcolor="#70bbd9" style="padding: 30px 30px;">
					<table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
					<tr>
					<td style="color: #ffffff; font-family: Arial, sans-serif; font-size: 14px;">
					<p style="margin: 0;">&reg; MAMAMOORENTAL @ 2020<br/>
					</td>
					<td align="right">
					<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse;">
					<tr>
					<td>
					<a href="">
					<img src="'.base_url().'assets/frontend/img/sosmed/ig.png" alt="Twitter." width="38" height="38" style="display: block;" border="0" />
					</a>
					</td>
					<td style="font-size: 0; line-height: 0;" width="20">&nbsp;</td>
					<td>
					<a href="">
					<img src="'.base_url().'assets/frontend/img/sosmed/fb.png" alt="Facebook." width="38" height="38" style="display: block;" border="0" />
					</a>
					</td>
					</tr>
					</table>
					</td>
					</tr>
					</table>
					</td>
					</tr>
					</table>

					</td>
					</tr>
					</table>
					</div>';

					if ($this->send($email,$subject, $message) == TRUE) {
						return TRUE;
					}else {
						return FALSE;
					}
				}
			}
		}

	}
