<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MX_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model(['M_login']);
		// if ($this->session->userdata('logged_in') == TRUE) {
		// 	$this->session->set_flashdata('alert', 'Hai, '.$this->session->userdata('nama').' kamu sudah login');
		// 	header('location:' . base_url());
		// }
	}

	function kota(){
		$id_prov 							= $this->input->post('id_prov');
		$n										= strlen($id_prov);
		$m										= ($n==2?5:($n==5?8:13));
		$data['get_kota'] 		= $this->M_login->get_kota($id_prov, $n, $m);
		$this->load->view('kota', $data);
	}

	function kecamatan(){
		$id_kota 							= $this->input->post('id_kota');
		$n										= strlen($id_kota);
		$m										= ($n==2?5:($n==5?8:13));
		$data['get_kec'] 			= $this->M_login->get_kec($id_kota, $n, $m);
		$this->load->view('kecamatan', $data);
	}

	public function index(){
		$data['module'] 	= "Login";

		if ($this->agent->is_mobile()){
		$data['fileview'] 	= "m_login";
			echo Modules::run('Template/FrontEnd_Mobile', $data);
		}else{
		$data['fileview'] 	= "login";
			echo Modules::run('Template/FrontEnd_Main', $data);
		}
	}

	public function daftar(){
		$data['module'] 	= "Login";

		if ($this->agent->is_mobile()){
		$data['fileview'] 	= "m_daftar";
			echo Modules::run('Template/FrontEnd_Mobile', $data);
		}else{
		$data['fileview'] 	= "daftar";
			echo Modules::run('Template/FrontEnd_Main', $data);
		}
	}

	public function verifikasi(){
		$email 							= $this->input->get('email');
		$token 							= $this->input->get('token');

		$data['step']				= "Berhasil Aktivasi Akun";
		$data['header']			= "Proses AKTIVASI berhasil";
		$data['text']				= "Berhasil melakukan aktivasi dan verifikasi akun, Harap <b>lengkapi data diri</b> anda berikut ini !!";
		$data['proses']			= "verifikasi";

		$data['get_prov']		= $this->M_login->get_prov();
		$data['pengguna']		= $this->M_login->get_pengguna($email);

		$data['token']					= $token;
		$data['email']					= $email;
		$data['module'] 				= "Login";
		$data['fileview'] 			= "Waiting";
		echo Modules::run('Template/FrontEnd_Waiting', $data);
	}

	public function aktivasi(){
		$email = $this->input->get('email');
		$kode  = $this->input->get('kode');
		$nama  = $this->input->get('nama');

		$data['email']			= $email;
		$data['kode']				= $kode;
		$data['nama']				= $nama;

		$data['step']				= "Aktivasi Akun Anda";
		$data['header']			= "Harap Cek Email anda - ".$email;
		$data['text']				= $this->session->flashdata('alert');
		$data['proses']			= "aktivasi";

		$data['module'] 		= "Login";
		$data['fileview'] 	= "Waiting";
		echo Modules::run('Template/FrontEnd_Waiting', $data);
	}

	public function KebijakandanPrivasi(){
		$data['module'] 	= "Login";
		$data['fileview'] 	= "privasi";

		if ($this->agent->is_mobile()){
			echo Modules::run('Template/FrontEnd_Mobile', $data);
		}else{
			echo Modules::run('Template/FrontEnd_Main', $data);
		}
	}

	public function SyaratdanKetentuan(){
		$data['module'] 	= "Login";
		$data['fileview'] 	= "syarat";

		if ($this->agent->is_mobile()){
			echo Modules::run('Template/FrontEnd_Mobile', $data);
		}else{
			echo Modules::run('Template/FrontEnd_Main', $data);
		}
	}

	public function Disclaimer(){
		$data['module'] 	= "Login";
		$data['fileview'] 	= "disclaimer";

		if ($this->agent->is_mobile()){
			echo Modules::run('Template/FrontEnd_Mobile', $data);
		}else{
			echo Modules::run('Template/FrontEnd_Main', $data);
		}
	}

	public function hash(){
		$pass = "root1234";
		echo password_hash($pass, PASSWORD_DEFAULT);

	}

	function auth(){
		$email     = htmlspecialchars($this->input->post('m_email', true));
		$password  = htmlspecialchars($this->input->post('m_password'), true);

		$pengguna	= $this->M_login->auth_pengguna($email);

		if ($pengguna == FALSE) {
			$this->session->set_flashdata('alert', 'Email tidak terdaftar !!');
			header('location:' . base_url() . 'Masuk');
		}else{
			if(password_verify($password, $pengguna->PASSWORD)){
				$nama = $pengguna->NAMA;
				$sessiondata = array(
					'KODE_PERSONAL' => $pengguna->KODE_PERSONAL,
					'email'	    		=> $email,
					'nama' 					=> $nama,
					'role' 					=> $pengguna->ROLE,
					'logged_in' 		=> TRUE
				);

				$this->session->set_userdata($sessiondata);
				if ($pengguna->ROLE == 0) {
					if ($this->session->userdata('redirect')) {
						$this->session->set_flashdata('notif', 'Hai, '.$nama.' anda telah login. Silahkan melanjutkan aktivitas anda !!');
						redirect($this->session->userdata('redirect'));
					} else {
						$this->session->set_flashdata('alert', 'Selamat Datang, '.$nama);
						header('location:' . base_url());
					}
				}elseif ($pengguna->ROLE == 1) {
					if ($this->session->userdata('redirect')) {
						$this->session->set_flashdata('notif', 'Hai ADMIN, anda telah login. Silahkan melanjutkan aktivitas anda !!');
						redirect($this->session->userdata('redirect'));
					} else {
						$this->session->set_flashdata('success', 'Selamat Datang, admin');
						header('location:' . site_url('Admin'));
					}
				}


			}else{
				$this->session->set_flashdata('l_email', $email);
				$this->session->set_flashdata('alert', 'Password anda Salah !!');
				header('location:' . base_url() . 'Masuk');
			}
		}
	}

	function register(){

		$email  = htmlspecialchars($this->input->post('d_email', true));
		$nama 	= htmlspecialchars($this->input->post('d_nama', true));

		$cek_email	= $this->M_login->cek_email($email);

		if ($cek_email == TRUE) {

			do {

				$KODE_PERSONAL 	= uniqid('USER_');

			} while ($this->M_login->cek_kode($KODE_PERSONAL) > 0);

			do {

				$KODE_DEPOSIT 	= uniqid('DEPO_');

			} while ($this->M_login->cek_deposit($KODE_DEPOSIT) > 0);

			$auth = [
				'KODE_PERSONAL' => $KODE_PERSONAL,
				'EMAIL'					=> $email,
				'PASSWORD'			=> password_hash($this->input->post('d_password'), PASSWORD_DEFAULT),
				'ROLE'					=> 0,
			];

			$data = [
				'KODE_PERSONAL' => $KODE_PERSONAL,
				'NAMA'			  	=> $nama,
			];

			if ($this->M_login->daftar_pengguna($auth, $data, $KODE_DEPOSIT, $KODE_PERSONAL) == TRUE) {
				if ($this->sendToken($email, $KODE_PERSONAL, $nama) == TRUE) {
					$this->session->set_flashdata('alert', 'Berhasil mendaftarkan akun, harap aktivasi akun anda untuk dapat login. Cek email anda "'.$email.'" !!');
					header('location:' . site_url('aktivasi?email='.$email.'&kode='.$KODE_PERSONAL.'&nama='.$nama));
				}else {
					$this->session->set_flashdata('alert', 'Gagal mengirim email verifikasi, Harap hubungi admin MAMAMOORENTAL !!');
					header('location:' . site_url('Daftar'));
				}
			}else{
				$this->session->set_flashdata('alert', 'Terjadi kesalahan saat mendaftarkan akun, coba lagi nanti !!');
				header('location:' . site_url('Daftar'));
			}
		}else{
			$this->session->set_flashdata('alert', 'Email telah digunakan atau Akun anda telah aktif !!');
			header('location:' . site_url('Daftar'));
		}
	}

	public function Resend(){
		$email = $this->input->get('email');
		if ($this->M_login->cek_status($email) == TRUE) {
			$this->session->set_flashdata('alert', 'Akun anda telah aktif, anda tidak perlu melakukan proses aktivasi akun !!');
			header('location:' . site_url('Masuk'));
		}else{
			$kode  = $this->input->get('kode');
			$nama  = $this->input->get('nama');

			if ($this->sendToken($email, $kode, $nama) == TRUE) {
				$this->session->set_flashdata('alert', 'Berhasil mendaftarkan akun, harap aktivasi akun anda untuk dapat login. Cek email anda "'.$email.'" !!');
				header('location:' . site_url('Aktivasi?email='.$email.'&kode='.$kode.'&nama='.$nama));
			}else {
				$this->session->set_flashdata('alert', 'Gagal mengirim email verifikasi, Harap hubungi admin MAMAMOORENTAL !!');
				header('location:' . site_url('Daftar'));
			}
		}
	}

	public function sendToken($email, $KODE_PERSONAL, $nama){
		if ($this->M_login->cek_status($email) == TRUE) {
			$this->session->set_flashdata('alert', 'Akun anda telah aktif, anda tidak perlu melakukan proses aktivasi akun !!');
			header('location:' . site_url('Masuk'));
		}else{
			$datatoken = $this->M_login->get_token($email);

			if($datatoken){
				$token = $datatoken->token;

			} else {

				$token = bin2hex(random_bytes(32));
				$datatoken = [
					'email' => $email,
					'token' => $token,
					'date_created' => time()
				];

				$this->M_login->save_token($datatoken);
			}
			$subject = 'Aktivasi Akun MAMAMOORENTAL';
			$message = '<div style="margin: 0; padding: 0;">
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
			<h1 style="font-size: 24px; margin: 0;">'.$subject.'!</h1>
			</td>
			</tr>
			<tr>
			<td style="color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 24px; padding: 20px 0 30px 0;">
			<p style="margin: 0;">
			Anda telah melakukan pendaftaran akun MAMAMOORENTAL atas nama:
			</p>
			<table width="100%">
			<tr>
			<td><b>USER ID</b></td>
			<td>: '.$KODE_PERSONAL.'</td>
			</tr>
			<tr>
			<td><b>Nama</b></td>
			<td>: '.$nama.'</td>
			</tr>
			<tr>
			<td><b>Email</b></td>
			<td>: '.$email.'</td>
			</tr>
			</table>
			<p>Silakan lakukan verifikasi akun dengan klik tautan berikut ini:
				</p>
				</td>
				</tr>
				<tr>
				<td>
				<table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
				<tr>
				<td valign="top" style="color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 24px; padding: 20px 0 30px 0;">

				Tautan akan valid selama 24 jam. Jika Anda merasa tidak melakukan pendaftaran MAMAMOORENTAL, Anda dapat mengabaikan email ini.<br><br>

				<div style="border:none;padding:0;margin:0;text-align:center;line-height:0">

				<a href="'.base_url().'activate?email='.$email.'&token='.$token.'" style="text-decoration:none;color:#ffffff;margin-left:auto;margin-right:auto;max-width:240px;background-color:#1db954;border-radius:24px;display:block" target="_blank" data-saferedirecturl="'.base_url().'activate?email='.$email.'&token='.$token.'"><table style="border-collapse:collapse;padding:0;width:100%;max-width:240px;height:48px"><tbody style="border:none;padding:0;margin:0"><tr style="border:none;margin:0px;padding:0px"><td style="border:none;padding:0;margin:0;width:24px"></td><td style="border:none;padding:0;margin:0;font-family:&quot;circular&quot;,&quot;helvetica neue&quot;,&quot;helvetica&quot;,&quot;arial&quot;,sans-serif;font-weight:700;line-height:1.1em;letter-spacing:0.15px;font-size:14px;text-decoration:none;text-align:center;text-transform:uppercase;color:#ffffff">AKTIVASI AKUN SEKARANG</td><td style="border:none;padding:0;margin:0;width:24px"></td></tr></tbody></table></a>
				</div><br>

				Atau klik link berikut ini <a href="'.base_url().'activate?email='.$email.'&token='.$token.'">'.base_url().'activate?email='.$email.'&token='.$token.'</a><br><br>

				Terima kasih. <br><br>

				Salam,<br>
				ADMIN MAMAMOORENTAL<br>
				<a href="https://MAMAMOORENTAL.com/" target="_blank">www.mamamoorental.com</a><br>
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
				<img src="https://mamamoorental.com/assets/frontend/img/sosmed/ig.png" alt="Twitter." width="38" height="38" style="display: block;" border="0" />
				</a>
				</td>
				<td style="font-size: 0; line-height: 0;" width="20">&nbsp;</td>
				<td>
				<a href="">
				<img src="https://mamamoorental.com/assets/frontend/img/sosmed/fb.png" alt="Facebook." width="38" height="38" style="display: block;" border="0" />
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
			$mail->SMTPSecure = "ssl";
			$mail->Port       = 465;
			$mail->Host       = "mail.hivilab.org";
			$mail->Username   = 'mamamoorental@hivilab.org';
			$mail->Password   = 'mamamoorental123';

			$mail->setFrom('mail.mamamoorental@mamamoorental.com','no-reply - MAMAMOORENTAL');
			$mail->addReplyTo('mail.mamamoorental@mamamoorental.com','no-reply - MAMAMOORENTAL');

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

		function upload($KODE_PERSONAL, $type, $file){
			$dir					= "./file/site/pengguna/".$KODE_PERSONAL;
			if (!is_dir($dir)) {
				mkdir($dir, 0777, true);
			}
			$config['upload_path'] 		= $dir;
			$config['allowed_types'] 	= 'gif|jpg|png|jpeg';
			$config['max_size'] 			= '4024';
			$path = $file;
			$ext = pathinfo($path, PATHINFO_EXTENSION);
			$config['file_name'] 			= "{$type}_{$KODE_PERSONAL}.{$ext}";
			$config['overwrite'] 			= TRUE;
			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			if ($type == "profil") {
				if (!$this->upload->do_upload('pp')){
					return FALSE;
				}else{
					return TRUE;
				}
			}
			if ($type == "ktp") {
				if (!$this->upload->do_upload('ktp')){
					return FALSE;
				}else{
					return TRUE;
				}
			}
			if ($type == "kk") {
				if (!$this->upload->do_upload('kk')){
					return FALSE;
				}else{

					return TRUE;
				}
			}
		}

		public function activate(){
			$email = $this->input->get('email');
			$token = $this->input->get('token');
			if ($this->M_login->cek_status($email) == TRUE) {
				$this->session->set_flashdata('alert', 'Akun anda telah aktif, anda tidak perlu melakukan proses aktivasi akun !!');
				header('location:' . site_url('Masuk'));
			}else{

				$KODE_PERSONAL	= htmlspecialchars($this->input->post('KODE_PERSONAL'));


				if ($this->upload($KODE_PERSONAL, "profil", $_FILES['pp']['name']) == TRUE) {
					if ($this->upload($KODE_PERSONAL, "ktp", $_FILES['ktp']['name']) == TRUE) {
						if ($this->upload($KODE_PERSONAL, "kk", $_FILES['kk']['name']) == TRUE) {

							$path 		= $_FILES['pp']['name'];
							$ext 			= pathinfo($path, PATHINFO_EXTENSION);
							$pp 			= "profil_{$KODE_PERSONAL}.{$ext}";

							$path 		= $_FILES['ktp']['name'];
							$ext 			= pathinfo($path, PATHINFO_EXTENSION);
							$ktp 			= "ktp_{$KODE_PERSONAL}.{$ext}";

							$path 		= $_FILES['kk']['name'];
							$ext 			= pathinfo($path, PATHINFO_EXTENSION);
							$kk 			= "kk_{$KODE_PERSONAL}.{$ext}";

							$hp						= htmlspecialchars($this->input->post('hp'));
							$provinsi			= htmlspecialchars($this->input->post('provinsi'));
							$kota					= htmlspecialchars($this->input->post('kota'));
							$kecamatan		= htmlspecialchars($this->input->post('kecamatan'));
							$kode_pos			= htmlspecialchars($this->input->post('kode_pos'));
							$jalan				= htmlspecialchars($this->input->post('jalan'));

							$bank					= htmlspecialchars($this->input->post('bank'));
							$no_rek				= htmlspecialchars($this->input->post('no_rek'));
							$atas_nama		= htmlspecialchars($this->input->post('atas_nama'));

							$personal 		= array(
								'FOTO'			=> $pp,
								'HP'				=> $hp,
								'KK'				=> $kk,
								'KTP'				=> $ktp,
								'PROVINSI'	=> $provinsi,
								'KOTA'			=> $kota,
								'KECAMATAN'	=> $kecamatan,
								'KODE_POS'	=> $kode_pos,
								'JALAN'			=> $jalan
							);

							$bank 				= array(
								'KODE_PERSONAL'	=> $KODE_PERSONAL,
								'NO_REKENING'		=> $no_rek,
								'BANK'					=> $bank,
								'ATAS_NAMA'			=> $atas_nama
							);
							if ($this->M_login->update_personal($personal, $bank, $KODE_PERSONAL) == TRUE) {

								$pengguna  = $this->M_login->get_pengguna($email);
								$datatoken = $this->M_login->get_token($email);

								if($datatoken->token == $token){
									if(time() - $datatoken->date_created < (60*60*24)){
										$this->M_login->activate($email);

										$subject = 'Berhasil Aktivasi Akun MAMAMOORENTAL';
										$message = '<div style="margin: 0; padding: 0;">
										<style type="text/css">
										a[x-apple-data-detectors] {color: inherit !important;}
										</style>

										<table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">
										<tr>
										<td style="padding: 20px 0 30px 0;">

										<table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="border-collapse: collapse; border: 1px solid #cccccc;">
										<tr>
										<td align="center" bgcolor="#70bbd9" style="padding: 40px 0 30px 0;">
										<img src="https://mamamoorental.com/assets/frontend/img/source/e-regris.png" alt="Creating Email Magic." width="300" height="200" style="display: block;" />
										</td>
										</tr>
										<tr>
										<td bgcolor="#ffffff" style="padding: 40px 30px 40px 30px;">
										<table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
										<tr>
										<td style="color: #153643; font-family: Arial, sans-serif;">
										<h1 style="font-size: 24px; margin: 0;">'.$subject.'!</h1>
										</td>
										</tr>
										<tr>
										<td style="color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 24px; padding: 20px 0 30px 0;">
										<p style="margin: 0;">
										Anda berhasil melakukan aktivasi akun MAMAMOORENTAL, atas nama:
										</p>
										<table width="100%">
										<tr>
										<td><b>USER ID</b></td>
										<td>: '.$pengguna->KODE_PERSONAL.'</td>
										</tr>
										<tr>
										<td><b>Nama</b></td>
										<td>: '.$pengguna->NAMA.'</td>
										</tr>
										<tr>
										<td><b>Email</b></td>
										<td>: '.$email.'</td>
										</tr>
										</table>
										</p>
										</td>
										</tr>
										<tr>
										<td>
										<table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
										<tr>
										<td valign="top" style="color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 24px; padding: 20px 0 30px 0;">

										<div style="border:none;padding:0;margin:0;text-align:center;line-height:0">

										<a href="'.base_url().'Masuk'.'" style="text-decoration:none;color:#ffffff;margin-left:auto;margin-right:auto;max-width:240px;background-color:#1db954;border-radius:24px;display:block" target="_blank" data-saferedirecturl="'.base_url().'Masuk'.'"><table style="border-collapse:collapse;padding:0;width:100%;max-width:240px;height:48px"><tbody style="border:none;padding:0;margin:0"><tr style="border:none;margin:0px;padding:0px"><td style="border:none;padding:0;margin:0;width:24px"></td><td style="border:none;padding:0;margin:0;font-family:&quot;circular&quot;,&quot;helvetica neue&quot;,&quot;helvetica&quot;,&quot;arial&quot;,sans-serif;font-weight:700;line-height:1.1em;letter-spacing:0.15px;font-size:14px;text-decoration:none;text-align:center;text-transform:uppercase;color:#ffffff">MASUK SEKARANG</td><td style="border:none;padding:0;margin:0;width:24px"></td></tr></tbody></table></a>
										</div><br>

										Atau klik link berikut ini <a href="'.base_url().'Masuk'.'">'.base_url().'Masuk'.'</a><br><br>

										Terima kasih. <br><br>

										Salam,<br>
										ADMIN MAMAMOORENTAL<br>
										<a href="https://MAMAMOORENTAL.com/" target="_blank">www.mamamoorental.com</a><br>
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
										<img src="https://mamamoorental.com/assets/frontend/img/sosmed/ig.png" alt="Twitter." width="38" height="38" style="display: block;" border="0" />
										</a>
										</td>
										<td style="font-size: 0; line-height: 0;" width="20">&nbsp;</td>
										<td>
										<a href="">
										<img src="https://mamamoorental.com/assets/frontend/img/sosmed/fb.png" alt="Facebook." width="38" height="38" style="display: block;" border="0" />
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

										if ($this->send($email, $subject, $message) == TRUE) {
											$this->session->set_flashdata('l_email', $email);
											$this->session->set_flashdata('alert', 'Selamat, akun anda telah aktif. Anda dapat masuk ke akun anda sekarang !!');
											header('location:' . site_url('Masuk'));
										}else {
											$this->session->set_flashdata('alert', 'Gagal mengirim email verifikasi, Harap hubungi admin MAMAMOORENTAL !!');
											header('location:' . site_url('Daftar'));
										}
									} else {
										$this->M_login->del_token($email);
										$this->M_login->del_account($email);
										$this->session->set_flashdata('alert','Token kadaluarsa, harap melakukan pendaftaran akun lagi !!');
										header('location:' . site_url('Daftar'));
									}

								} else {
									$this->session->set_flashdata('alert','Aktivasi akun gagal!');
									header('location:' . site_url('Daftar'));
								}
							}else{
								$this->session->set_flashdata('alert','Terjadi kesalahan saat mengirim data diri anda, jika masih terjadi harap hubungi admin !!');
								header(base_url().'activate?email='.$email.'&token='.$token);
							}
						}else {
							$this->session->set_flashdata('alert','Terjadi kesalahan saat mengupload File KK Anda, jika masih terjadi harap hubungi admin !!');
							header(base_url().'activate?email='.$email.'&token='.$token);
						}
					}else {
						$this->session->set_flashdata('alert','Terjadi kesalahan saat mengupload File KTP Anda, jika masih terjadi harap hubungi admin !!');
						header(base_url().'activate?email='.$email.'&token='.$token);
					}
				}else {
					$this->session->set_flashdata('alert','Terjadi kesalahan saat mengupload Foto Profil Anda, jika masih terjadi harap hubungi admin !!');
					header(base_url().'activate?email='.$email.'&token='.$token);
				}
			}
		}

		public function logout(){
			$this->session->sess_destroy();
			$this->session->set_flashdata('alert','Berhasil keluar!');
			header('location:' . base_url());
		}

	}
