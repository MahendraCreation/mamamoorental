<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna extends MX_Controller {
	public function __construct(){
		parent::__construct();
		date_default_timezone_set("Asia/Jakarta");
		if ($this->session->userdata('logged_in') == FALSE || !$this->session->userdata('logged_in')){
			if (!empty($_SERVER['QUERY_STRING'])) {
				$uri = uri_string() . '?' . $_SERVER['QUERY_STRING'];
			} else {
				$uri = uri_string();
			}
			$this->session->unset_userdata('redirect');
			$this->session->set_userdata('redirect', $uri);
			$this->session->set_flashdata('alert', "Harap login ke akun anda, untuk melanjutkan");
			redirect('Masuk');
		}
		$this->load->model('M_pengguna');
	}

	function kota(){
		$id_prov 							= $this->input->post('id_prov');
		$n										= strlen($id_prov);
		$m										= ($n==2?5:($n==5?8:13));
		$data['get_kota'] 		= $this->M_pengguna->get_kota($id_prov, $n, $m);
		$this->load->view('kota', $data);
	}

	function kecamatan(){
		$id_kota 							= $this->input->post('id_kota');
		$n										= strlen($id_kota);
		$m										= ($n==2?5:($n==5?8:13));
		$data['get_kec'] 			= $this->M_pengguna->get_kec($id_kota, $n, $m);
		$this->load->view('kecamatan', $data);
	}

	public function index(){
		redirect('Home');
	}

	public function detail(){
		$KODE_PERSONAL		= $this->session->userdata('KODE_PERSONAL');

		if ($this->M_pengguna->get_pengguna($KODE_PERSONAL) == FALSE) {
			$this->session->set_flashdata('alert', "Terjadi kesalahan saat akan menampilkan data diri anda, harap hubungi admin jika hal ini terus terjadi.");
			redirect(base_url());
		}else{

			if ($this->input->post('nama')) {
				$nama				= htmlspecialchars($this->input->post('nama'));
				$instagram	= htmlspecialchars($this->input->post('instagram'));
				$facebook		= htmlspecialchars($this->input->post('facebook'));

				$pribadi		= array(
					'NAMA'			=> $nama,
					'INSTAGRAM'	=> $instagram,
					'FACEBOOK'	=> $facebook
				);

				if ($this->M_pengguna->update_personal($pribadi, $KODE_PERSONAL) == TRUE) {
					$this->session->set_flashdata('alert', "Profil telah berhasil diubah.");
				}else{
					$this->session->set_flashdata('alert', "Tidak terjadi perubahan pada profil.");
				}

			}
			$status = $this->M_pengguna->pengguna_ver($this->session->userdata('KODE_PERSONAL'));
			if ($status == 0) {
				$data['verifikasi']	= FALSE;
			}else {
				$data['verifikasi']	= TRUE;
			}
			$data['pengguna']		= $this->M_pengguna->get_pengguna($KODE_PERSONAL);
			$data['email']			= $this->session->userdata('email');

			$data['module'] 		= "Pengguna";
			$data['fileview'] 	= "profil";

			if ($this->agent->is_mobile()){
				echo Modules::run('Template/FrontEnd_Mobile', $data);
			}else{
				echo Modules::run('Template/FrontEnd_Main', $data);
			}
		}
	}

	public function Pesanan(){
		$KODE_PERSONAL		= $this->session->userdata('KODE_PERSONAL');

		if ($this->M_pengguna->get_pengguna($KODE_PERSONAL) == FALSE) {
			$this->session->set_flashdata('alert', "Terjadi kesalahan saat akan menampilkan data diri anda, harap hubungi admin jika hal ini terus terjadi.");
			redirect(base_url());
		}else{

			$data['get_pesanan']			= $this->M_pengguna->get_pesanan($KODE_PERSONAL);
			$data['get_disewa']				= $this->M_pengguna->get_disewa($KODE_PERSONAL);
			$data['get_belumbayar']		= $this->M_pengguna->get_belumbayar($KODE_PERSONAL);
			$data['get_belumver']			= $this->M_pengguna->get_belumver($KODE_PERSONAL);
			$data['get_kemas']				= $this->M_pengguna->get_kemas($KODE_PERSONAL);
			$data['get_pengiriman']		= $this->M_pengguna->get_pengiriman($KODE_PERSONAL);
			$data['get_gagal']				= $this->M_pengguna->get_gagal($KODE_PERSONAL);

			$data['jml_semua']			= $this->M_pengguna->jml_semua($KODE_PERSONAL);
			$data['jml_disewa']			= $this->M_pengguna->jml_disewa($KODE_PERSONAL);
			$data['jml_belver']			= $this->M_pengguna->jml_belver($KODE_PERSONAL);
			$data['jml_diproses']	  = $this->M_pengguna->jml_diproses($KODE_PERSONAL);
			$data['jml_dikemas']	  = $this->M_pengguna->jml_dikemas($KODE_PERSONAL);
			$data['jml_dikirim']		= $this->M_pengguna->jml_dikirim($KODE_PERSONAL);
			$data['jml_gagal']			= $this->M_pengguna->jml_gagal($KODE_PERSONAL);



			$data['pengguna']		= $this->M_pengguna->get_pengguna($KODE_PERSONAL);
			$data['email']			= $this->session->userdata('email');

			$data['controller'] = $this;
			$data['module'] 		= "Pengguna";
			$data['fileview'] 	= "pesanan";

			if ($this->agent->is_mobile()){
				echo Modules::run('Template/FrontEnd_Mobile', $data);
			}else{
				echo Modules::run('Template/FrontEnd_Main', $data);
			}
		}
	}

	public function PesananDetail($KODE_TRANSAKSI){
		$KODE_PERSONAL		= $this->session->userdata('KODE_PERSONAL');

		if ($this->M_pengguna->get_pengguna($KODE_PERSONAL) == FALSE) {
			$this->session->set_flashdata('alert', "Terjadi kesalahan saat akan menampilkan data diri anda, harap hubungi admin jika hal ini terus terjadi.");
			redirect(base_url());
		}else{

			if ($this->M_pengguna->get_detailpesanan($KODE_TRANSAKSI) == FALSE) {
				$this->session->set_flashdata('alert', "Kode TRANSAKSI tidak dikenali, tidak dapat menampilkan detail transaksi. Coba lagi nanti, jika hal ini terus terjadi harap hubungi admin");
				redirect(site_url('Akun/Pesanan'));
			}else{
				$data['pesanan']		= $this->M_pengguna->get_detailpesanan($KODE_TRANSAKSI);

				$data['pengguna']		= $this->M_pengguna->get_pengguna($KODE_PERSONAL);
				$data['email']			= $this->session->userdata('email');

				$data['module'] 		= "Pengguna";
				$data['fileview'] 	= "detailpesanan";

				if ($this->agent->is_mobile()){
					echo Modules::run('Template/FrontEnd_Mobile', $data);
				}else{
					echo Modules::run('Template/FrontEnd_Main', $data);
				}
			}
		}
	}

	public function Kembali($transaksi){
		$KODE_PERSONAL		= $this->session->userdata('KODE_PERSONAL');

		if ($this->M_pengguna->get_pengguna($KODE_PERSONAL) == FALSE) {
			$this->session->set_flashdata('alert', "Terjadi kesalahan saat akan menampilkan data, harap hubungi admin jika hal ini terus terjadi.");
			redirect(base_url());
		}else{

			$pesanan 						= $this->M_pengguna->get_kembali($transaksi);
			$data['pengguna']		= $this->M_pengguna->get_pengguna($KODE_PERSONAL);

			$now 				= strtotime(date("H:i d-m-Y")); // or your date as well
			$your_date 	= strtotime($pesanan->WAKTU_KEMBALI);
			$datediff 	= $now - $your_date;

			$cek 				= round($datediff / (60 * 60 * 24));

			$get_denda	= $this->M_pengguna->get_denda();

			if ($cek > 0) {

				$denda = $cek*$get_denda;

				$data['telat']			= TRUE;
				$data['telat_hari']	= $cek;
				$data['denda']			= $denda;
			}else{
				$data['telat']			= FALSE;
				$data['telat_hari']	= 0;
				$data['denda']			= 0;
			}

			$data['controller']	= $this;
			$data['pesanan']		= $pesanan;

			$data['module'] 		= "Pengguna";
			$data['fileview'] 	= "kembali";

			if ($this->agent->is_mobile()){
				echo Modules::run('Template/FrontEnd_Mobile', $data);
			}else{
				echo Modules::run('Template/FrontEnd_Main', $data);
			}
		}
	}

	public function KirimKembali($KODE_TRANSAKSI){
		$KODE_PERSONAL		= $this->session->userdata('KODE_PERSONAL');
		if ($this->input->post('no_resi_kembali')) {

			if ($this->M_pengguna->send_kembali($KODE_PERSONAL) == TRUE) {
				$this->session->set_flashdata('alert', "Berhasil memproses pengembalian pesanan.");
				redirect(site_url('Pesanan/'.$this->input->post('KODE_TRANSAKSI')));
			}else{
				$this->session->set_flashdata('alert', "Gagal memproses pengembalian pesanan. Jika hal ini masih terjadi, harap hubungi admin");
				redirect(site_url('Pesanan/'.$this->input->post('KODE_TRANSAKSI')));
			}

		}
	}

	public function Diterima(){
		$KODE_PERSONAL		= $this->session->userdata('KODE_PERSONAL');

		if ($this->M_pengguna->get_pengguna($KODE_PERSONAL) == FALSE) {
			$this->session->set_flashdata('alert', "Terjadi kesalahan saat mencari data diri anda, harap hubungi admin jika hal ini terus terjadi.");
			redirect(site_url('Akun/Pesanan'));
		}else{

			if ($this->input->post('kode_transaksi')) {
				if ($this->M_pengguna->cek_transaksi($this->input->post('kode_transaksi')) == TRUE ) {

					if ($this->M_pengguna->update_diterima() == TRUE) {
						$this->session->set_flashdata('alert', "Berhasil menerima pesanan, harap kembalikan barang sebelum batas waktu kembali.");
						redirect(site_url('Akun/Pesanan'));
					}else{
						$this->session->set_flashdata('alert', "Tidak kesalahan. Coba lagi nanti, hubungi admin jika masih terjadi.");
						redirect(site_url('Akun/Pesanan'));
					}
				}else{
					$this->session->set_flashdata('alert', "Terjadi kesalahan saat mencari data pesanan ".$this->input->post('kode_transaksi').", harap hubungi admin jika hal ini terus terjadi.");
					redirect(site_url('Akun/Pesanan'));
				}
			}
		}
	}

	public function Bank(){
		$KODE_PERSONAL		= $this->session->userdata('KODE_PERSONAL');

		if ($this->M_pengguna->get_pengguna($KODE_PERSONAL) == FALSE) {
			$this->session->set_flashdata('alert', "Terjadi kesalahan saat akan menampilkan data diri anda, harap hubungi admin jika hal ini terus terjadi.");
			redirect(base_url());
		}else{

			if ($this->input->post('ATAS_NAMA')) {
				$ATAS_NAMA 	= htmlspecialchars($this->input->post('ATAS_NAMA'));
				$NO_REK			= htmlspecialchars($this->input->post('NO_REK'));
				$BANK				= htmlspecialchars($this->input->post('BANK'));

				$bank		= array(
					'ATAS_NAMA'		=> $ATAS_NAMA,
					'NO_REKENING' => $NO_REK,
					'BANK'				=> $BANK
				);

				if ($this->M_pengguna->update_bank($bank, $KODE_PERSONAL) == TRUE) {
					$this->session->set_flashdata('alert', "Detail rekening telah berhasil diubah.");
				}else{
					$this->session->set_flashdata('alert', "Tidak terjadi perubahan pada detail rekening.");
				}

			}

			$data['pengguna']		= $this->M_pengguna->get_pengguna($KODE_PERSONAL);
			$data['bank']				= $this->M_pengguna->get_bank($KODE_PERSONAL);

			$data['module'] 		= "Pengguna";
			$data['fileview'] 	= "bank";

			if ($this->agent->is_mobile()){
				echo Modules::run('Template/FrontEnd_Mobile', $data);
			}else{
				echo Modules::run('Template/FrontEnd_Main', $data);
			}
		}
	}

	public function Alamat(){
		$KODE_PERSONAL		= $this->session->userdata('KODE_PERSONAL');

		if ($this->M_pengguna->get_pengguna($KODE_PERSONAL) == FALSE) {
			$this->session->set_flashdata('alert', "Terjadi kesalahan saat akan menampilkan data diri anda, harap hubungi admin jika hal ini terus terjadi.");
			redirect(base_url());
		}else{

			if ($this->input->post('provinsi')) {
				$PROVINSI 		= htmlspecialchars($this->input->post('provinsi'));
				$KOTA					= htmlspecialchars($this->input->post('kota'));
				$KECAMATAN 		= htmlspecialchars($this->input->post('kecamatan'));
				$JALAN				= htmlspecialchars($this->input->post('jalan'));
				$KODE_POS 		= htmlspecialchars($this->input->post('kode_pos'));

				$alamat		= array(
					'PROVINSI'		=> $PROVINSI,
					'KOTA'				=> $KOTA,
					'KECAMATAN'		=> $KECAMATAN,
					'JALAN'				=> $JALAN,
					'KODE_POS'		=> $KODE_POS
				);

				if ($this->M_pengguna->update_alamat($alamat, $KODE_PERSONAL) == TRUE) {
					$this->session->set_flashdata('alert', "Alamat telah berhasil diubah.");
				}else{
					$this->session->set_flashdata('alert', "Tidak terjadi perubahan pada Alamat.");
				}

			}

			$data['get_prov']		= $this->M_pengguna->get_prov();
			$data['controller']	= $this;
			$data['pengguna']		= $this->M_pengguna->get_pengguna($KODE_PERSONAL);
			$data['alamat']			= $this->M_pengguna->get_alamat($KODE_PERSONAL);

			$data['module'] 		= "Pengguna";
			$data['fileview'] 	= "alamat";

			if ($this->agent->is_mobile()){
				echo Modules::run('Template/FrontEnd_Mobile', $data);
			}else{
				echo Modules::run('Template/FrontEnd_Main', $data);
			}
		}
	}

	public function Password(){
		$KODE_PERSONAL		= $this->session->userdata('KODE_PERSONAL');
		$email						= $this->session->userdata('email');

		if ($this->M_pengguna->get_pengguna($KODE_PERSONAL) == FALSE) {
			$this->session->set_flashdata('alert', "Terjadi kesalahan saat akan menampilkan data diri anda, harap hubungi admin jika hal ini terus terjadi.");
			redirect(base_url());
		}else{
			if ($this->input->post('cur_pass')) {
				$password 		= htmlspecialchars($this->input->post('cur_pass'));
				$new_pass			= htmlspecialchars($this->input->post('new_pass'));
				$con_pass 		= htmlspecialchars($this->input->post('con_pass'));
				$cek_pass	= $this->M_pengguna->auth_pengguna($email);
				if(password_verify($password, $cek_pass->PASSWORD)){
					if ($new_pass == $con_pass) {
						$pass = array('PASSWORD' => password_hash($new_pass, PASSWORD_DEFAULT));
						if ($this->M_pengguna->update_pass($pass, $KODE_PERSONAL) == TRUE) {
							$this->session->set_flashdata('alert', "Berhasil mengubah password.");
						}else{
							$this->session->set_flashdata('alert', "Gagal mengubah password, Harap hubungi ADMIN.");
						}
					}else{
						$this->session->set_flashdata('alert', "Password Konfirmasi tidak sama.");
					}
				}else{
					$this->session->set_flashdata('alert', "Password lama anda salah.");
				}
			}
			$data['pengguna']		= $this->M_pengguna->get_pengguna($KODE_PERSONAL);

			$data['module'] 		= "Pengguna";
			$data['fileview'] 	= "ubah_password";

			if ($this->agent->is_mobile()){
				echo Modules::run('Template/FrontEnd_Mobile', $data);
			}else{
				echo Modules::run('Template/FrontEnd_Main', $data);
			}
		}
	}

	public function Penjamin(){
		$KODE_PERSONAL		= $this->session->userdata('KODE_PERSONAL');
		$email						= $this->session->userdata('email');

		if ($this->M_pengguna->get_penjamin($KODE_PERSONAL) == FALSE) {
			$this->session->set_flashdata('alert', "Terjadi kesalahan saat akan menampilkan data diri anda, harap hubungi admin jika hal ini terus terjadi.");
			redirect(site_url('Akun'));
		}else{

			if ($this->input->post('NAMA_PENJAMIN')) {
				$NAMA_PENJAMIN 	= htmlspecialchars($this->input->post('NAMA_PENJAMIN'));
				$HP_PENJAMIN 		= htmlspecialchars($this->input->post('HP_PENJAMIN'));
				$NAMA_KANTOR 		= htmlspecialchars($this->input->post('NAMA_KANTOR'));
				$ALAMAT_KANTOR 	= htmlspecialchars($this->input->post('ALAMAT_KANTOR'));

				$penjamin		= array(
					'NAMA_PENJAMIN'		=> $NAMA_PENJAMIN,
					'HP_PENJAMIN'			=> $HP_PENJAMIN,
					'NAMA_KANTOR'			=> $NAMA_KANTOR,
					'ALAMAT_KANTOR'		=> $ALAMAT_KANTOR
				);

				if ($this->M_pengguna->update_penjamin($penjamin, $KODE_PERSONAL) == TRUE) {
					$this->session->set_flashdata('alert', "Data penjamin telah berhasil diubah.");
				}else{
					$this->session->set_flashdata('alert', "Tidak terjadi perubahan pada Data penjamin.");
				}

			}

			$data['pengguna']		= $this->M_pengguna->get_pengguna($KODE_PERSONAL);
			$data['penjamin']		= $this->M_pengguna->get_penjamin($KODE_PERSONAL);

			$data['module'] 		= "Pengguna";
			$data['fileview'] 	= "penjamin";

			if ($this->agent->is_mobile()){
				echo Modules::run('Template/FrontEnd_Mobile', $data);
			}else{
				echo Modules::run('Template/FrontEnd_Main', $data);
			}
		}
	}

	public function Deposit(){
		$KODE_PERSONAL		= $this->session->userdata('KODE_PERSONAL');

		if ($this->M_pengguna->get_pengguna($KODE_PERSONAL) == FALSE) {
			$this->session->set_flashdata('alert', "Terjadi kesalahan saat akan menampilkan data diri anda, harap hubungi admin jika hal ini terus terjadi.");
			redirect(base_url());
		}else{
			$status = $this->M_pengguna->pengguna_ver($this->session->userdata('KODE_PERSONAL'));
			if ($status == 0) {
				$this->session->set_flashdata('alert', "Akun anda belum diverifikasi kelengkapan data diri, harap menunggu sampai akun anda terverifikasi oleh admin. Hubungi admin jika hal ini masih terjadi lebih dari 1x24 jam setelah anda mendaftar!!");
				redirect('Akun');
			}else{
				$data['deposit']		= $this->M_pengguna->get_deposit($KODE_PERSONAL);
				$data['pengguna']		= $this->M_pengguna->get_pengguna($KODE_PERSONAL);

				$data['masuk']			= $this->M_pengguna->jml_dp_masuk($KODE_PERSONAL);
				$data['pemasukan']	= $this->M_pengguna->get_pemasukan($KODE_PERSONAL);

				$data['module'] 		= "Pengguna";
				$data['fileview'] 	= "deposit";

				if ($this->agent->is_mobile()){
					echo Modules::run('Template/FrontEnd_Mobile', $data);
				}else{
					echo Modules::run('Template/FrontEnd_Main', $data);
				}
			}
		}
	}

	public function Topup(){
		$KODE_PERSONAL			= $this->session->userdata('KODE_PERSONAL');

		$data['deposit']		= $this->M_pengguna->get_deposit($KODE_PERSONAL);
		$data['pengguna']		= $this->M_pengguna->get_pengguna($KODE_PERSONAL);
		$data['module'] 		= "Pengguna";
		$data['fileview'] 	= "topup";

		if ($this->agent->is_mobile()){
			echo Modules::run('Template/FrontEnd_Mobile', $data);
		}else{
			echo Modules::run('Template/FrontEnd_Main', $data);
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
		$config['file_name'] 			= time()."_v_{$type}_{$this->session->userdata('KODE_PERSONAL')}.{$ext}";
		$config['overwrite'] 			= TRUE;
		$config['remove_spaces'] 	= TRUE;
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

	public function KTP(){
		if ($this->input->post('kode')) {
			if ($this->upload($this->session->userdata('KODE_PERSONAL'), "ktp", $_FILES['ktp']['name']) == TRUE) {
				$path 		= $_FILES['ktp']['name'];
				$ext 			= pathinfo($path, PATHINFO_EXTENSION);
				$ktp 			= time()."_v_ktp_{$this->session->userdata('KODE_PERSONAL')}.{$ext}";

				if ($this->M_pengguna->update_ktp($ktp, $this->session->userdata('KODE_PERSONAL')) == TRUE) {
					$this->session->set_flashdata('alert', "Data KTP telah berhasil diubah.");
				}else{
					$this->session->set_flashdata('alert', "Tidak terjadi perubahan pada Data KTP.");
				}
			}else{
				$this->session->set_flashdata('alert', "Terjadi kesalahan saat mengupload file anda.");
			}
		}

		$data['pengguna']		= $this->M_pengguna->get_pengguna($this->session->userdata('KODE_PERSONAL'));
		$data['module'] 		= "Pengguna";
		$data['fileview'] 	= "ktp";

		if ($this->agent->is_mobile()){
			echo Modules::run('Template/FrontEnd_Mobile', $data);
		}else{
			echo Modules::run('Template/FrontEnd_Main', $data);
		}

	}

	public function KK(){
		if ($this->input->post('kode')) {
			if ($this->upload($this->session->userdata('KODE_PERSONAL'), "kk", $_FILES['kk']['name']) == TRUE) {
				$path 		= $_FILES['kk']['name'];
				$ext 			= pathinfo($path, PATHINFO_EXTENSION);
				$kk 			= time()."_v_kk_{$this->session->userdata('KODE_PERSONAL')}.{$ext}";

				if ($this->M_pengguna->update_kk($kk, $this->session->userdata('KODE_PERSONAL')) == TRUE) {
					$this->session->set_flashdata('alert', "Data KK telah berhasil diubah.");
				}else{
					$this->session->set_flashdata('alert', "Tidak terjadi perubahan pada Data KK.");
				}
			}else{
				$this->session->set_flashdata('alert', "Terjadi kesalahan saat mengupload file anda.");
			}
		}

		$data['pengguna']		= $this->M_pengguna->get_pengguna($this->session->userdata('KODE_PERSONAL'));
		$data['module'] 		= "Pengguna";
		$data['fileview'] 	= "kk";

		if ($this->agent->is_mobile()){
			echo Modules::run('Template/FrontEnd_Mobile', $data);
		}else{
			echo Modules::run('Template/FrontEnd_Main', $data);
		}

	}

	public function Phone(){
		$KODE_PERSONAL		= $this->session->userdata('KODE_PERSONAL');
		$email						= $this->session->userdata('email');

		if ($this->input->post('cur_pass')) {
			$password 		= htmlspecialchars($this->input->post('cur_pass'));
			$hp 		= htmlspecialchars($this->input->post('hp'));

			$cek_pass	= $this->M_pengguna->auth_pengguna($email);
			if(password_verify($password, $cek_pass->PASSWORD)){

				$hp		= array(
					'HP'		=> $hp,
				);

				if ($this->M_pengguna->update_hp($hp, $KODE_PERSONAL) == TRUE) {
					$this->session->set_flashdata('alert', "Nomor Telepon telah berhasil diubah.");
				}else{
					$this->session->set_flashdata('alert', "Tidak terjadi perubahan pada Nomor Telepon.");
				}
			}else {
				$this->session->set_flashdata('alert', "Password yang anda berikan salah.");
			}

		}

		$data['pengguna']		= $this->M_pengguna->get_pengguna($KODE_PERSONAL);

		$data['module'] 		= "Pengguna";
		$data['fileview'] 	= "telepon";

		if ($this->agent->is_mobile()){
			echo Modules::run('Template/FrontEnd_Mobile', $data);
		}else{
			echo Modules::run('Template/FrontEnd_Main', $data);
		}
	}

}
