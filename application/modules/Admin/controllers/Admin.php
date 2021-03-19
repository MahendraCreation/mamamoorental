<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MX_Controller {
	public function __construct(){
		parent::__construct();
		date_default_timezone_set("Asia/Jakarta");
		$this->load->model(['M_admin']);
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

		if ($this->session->userdata('role') != 1) {
			$this->session->set_flashdata('alert', "Mohon maaf anda bukan ADMIN MAMAMOORENTAL!!");
			redirect('Akun');
		}
	}

	public function index(){
		$data['jml_pengguna'] 	= $this->M_admin->jml_pengguna();
		$data['jml_produk'] 		= $this->M_admin->jml_produk();
		$data['jml_transaksi'] 	= $this->M_admin->jml_transaksi();
		$data['jml_pendapatan']	= $this->M_admin->jml_pendapatan();

		$data['module'] 	= "Admin";
		$data['fileview'] 	= "dashboard";
		echo Modules::run('Template/BackEnd_Main', $data);
	}

	public function edit_data($KODE_UNIT){
		if ($this->M_admin->get_produk_data($KODE_UNIT) == FALSE) {
			$this->session->set_flashdata('alert', "Mohon maaf tidak dapat menampilkan data produk!");
			redirect('DataInventaris');
		}else{
			$data['merk']			    = $this->M_admin->get_merk(); // BRAND
			$data['type']			    = $this->M_admin->get_type(); // SERIES
			$data['varian']			  = $this->M_admin->get_varian();
			$data['grade']			  = $this->M_admin->get_grade();
			$data['kategori']			= $this->M_admin->get_kategori();
			$data['produk']			= $this->M_admin->get_produk_data($KODE_UNIT);
			$data['foto']			  = $this->M_admin->get_foto($KODE_UNIT);

			$data['controller'] = $this;
			$data['module'] 		= "Admin";
			$data['fileview'] 	= "produk_edit";
			echo Modules::run('Template/BackEnd_Main', $data);
		}
	}

	public function Statistik(){
		$data['jml_pengguna'] 	= $this->M_admin->bul_pengguna();
		$data['jml_produk'] 		= $this->M_admin->bul_produk();
		$data['jml_transaksi'] 	= $this->M_admin->bul_transaksi();
		$data['jml_pendapatan']	= $this->M_admin->bul_pendapatan();
		$data['controller']			= $this;

		$data['module'] 	= "Admin";
		$data['fileview'] 	= "statistik";
		echo Modules::run('Template/BackEnd_Main', $data);
	}

	public function Browser(){
		define('FM_EMBED', true);
		define('FM_SELF_URL', $_SERVER['PHP_SELF']);
		require 'file_manager/tinyfilemanager.php';
	}

	public function data_pengguna(){
		$data['total_pengguna']		= $this->M_admin->jml_pengguna();
		$data['pengguna_verif']		= $this->M_admin->pengguna_verif();
		$data['pengguna_belum']		= $this->M_admin->pengguna_belum();


		$data['get_pengguna']		= $this->M_admin->get_pengguna();

		$data['module'] 	= "Admin";
		$data['fileview'] 	= "pengguna_data";
		echo Modules::run('Template/BackEnd_Main', $data);
	}

	public function detail_pengguna($KODE_PERSONAL){
		$data['pengguna']		= $this->M_admin->detail_pengguna($KODE_PERSONAL);

		$data['controller'] = $this;
		$data['module'] 	= "Admin";
		$data['fileview'] 	= "detailpengguna";
		echo Modules::run('Template/BackEnd_Main', $data);
	}

	public function pengguna_verifikasi($KODE_PERSONAL){
		if ($this->M_admin->pengguna_verifikasi($KODE_PERSONAL) == TRUE) {
			$this->session->set_flashdata('success', 'Berhasil verifikasi data pengguna !!');
			header('location:' . base_url() . 'Pengguna/'.$KODE_PERSONAL);
		}else{
			$this->session->set_flashdata('alert', 'Gagal memverifikasi data pengguna !!');
			header('location:' . base_url() . 'Pengguna/'.$KODE_PERSONAL);
		}
	}

	public function pengguna_revoke($KODE_PERSONAL){
		if ($this->M_admin->pengguna_revoke($KODE_PERSONAL) == TRUE) {
			$this->session->set_flashdata('success', 'Berhasil me-revoke data pengguna !!');
			header('location:' . base_url() . 'Pengguna/'.$KODE_PERSONAL);
		}else{
			$this->session->set_flashdata('alert', 'Gagal me-revoke data pengguna !!');
			header('location:' . base_url() . 'Pengguna/'.$KODE_PERSONAL);
		}
	}

	// PRODUK

	public function data_produk(){
		$data['total_produk']				= $this->M_admin->jml_produk();
		$data['pengiriman']					= $this->M_admin->jml_pengiriman();
		$data['disewa']							= $this->M_admin->jml_disewa();

		$data['produk']			= $this->M_admin->get_produk();

		$data['controller'] = $this;
		$data['module'] 		= "Admin";
		$data['fileview'] 	= "produk_data";
		echo Modules::run('Template/BackEnd_Main', $data);
	}

	public function produk_knowledge(){
		$data['produk']			= $this->M_admin->get_produk();

		$data['module'] 	= "Admin";
		$data['fileview'] 	= "produk_knowledge";
		echo Modules::run('Template/BackEnd_Main', $data);
	}

	public function tambah_produk(){
		$data['merk']			    = $this->M_admin->get_merk(); // BRAND
		$data['type']			    = $this->M_admin->get_type(); // SERIES
		$data['varian']			  = $this->M_admin->get_varian();
		$data['grade']			  = $this->M_admin->get_grade();
		$data['kategori']			= $this->M_admin->get_kategori();

		$data['module'] 	= "Admin";
		$data['fileview'] 	= "produk_tambah";
		echo Modules::run('Template/BackEnd_Main', $data);
	}

	public function GetKodeUnitUrut(){
		$code 							= $this->input->post('code');

		if (!empty($code)) {
			if ($this->M_admin->get_jmlpr($code) == FALSE) {
				echo $data = 0;
			}else{
				$data	= $this->M_admin->get_jmlpr($code);
				echo $data;
			}
		}
	}

	public function proses_edit(){
		$KODE_UNIT 		= $this->input->post('kode_unit', true);
			if ($this->M_admin->EditProduk($KODE_UNIT) == TRUE) {

				if (!empty($_FILES['FOTO']['name']) || !empty($_FILES['FOTOA']['name'])) {

					$folder = "file/site/produk/{$KODE_UNIT}/";

					if (!is_dir($folder)) {
						mkdir($folder, 0755, true);
					}
					$config['upload_path']          = $folder;
					$config['allowed_types']        = 'gif|jpg|png';
					$config['max_size']             = 10048;
					$config['overwrite'] 						= true;
					$this->load->library('upload', $config);

					$ID_FOTO = $this->input->post('ID_FOTO', true);
					$files = $_FILES['FOTO'];
					$filesa = $_FILES['FOTOA'];

					// $this->db->where('KODE_UNIT', $KODE_UNIT);
					// $this->db->delete('TB_INVENTARISFOTO');

					$images = array();
					$imagesa = array();

					foreach ($files['name'] as $key => $image) {
						$_FILES['FOTO[]']['name']= $files['name'][$key];
						$_FILES['FOTO[]']['type']= $files['type'][$key];
						$_FILES['FOTO[]']['tmp_name']= $files['tmp_name'][$key];
						$_FILES['FOTO[]']['error']= $files['error'][$key];
						$_FILES['FOTO[]']['size']= $files['size'][$key];

						$fileName = $KODE_UNIT.'-'.preg_replace("/[^a-zA-Z0-9.]/", "", $image);;

						$images[] = $fileName;

						$config['file_name'] = $fileName;

						$this->upload->initialize($config);

						if ($this->upload->do_upload('FOTO[]')) {
							$upload_data 	= $this->upload->data();

							$data = array('KODE_UNIT' => $KODE_UNIT, 'SOURCE' => $upload_data['file_name']);
							$this->db->where('ID_FOTO', isset($ID_FOTO[$key]) ? $ID_FOTO[$key] : '');
							$this->db->update('TB_INVENTARISFOTO', $data);
						}
					}

					foreach ($filesa['name'] as $keya => $imagea) {
						$_FILES['FOTOA[]']['name']= $filesa['name'][$keya];
						$_FILES['FOTOA[]']['type']= $filesa['type'][$keya];
						$_FILES['FOTOA[]']['tmp_name']= $filesa['tmp_name'][$keya];
						$_FILES['FOTOA[]']['error']= $filesa['error'][$keya];
						$_FILES['FOTOA[]']['size']= $filesa['size'][$keya];

						$fileNamea = $KODE_UNIT.'-'.preg_replace("/[^a-zA-Z0-9.]/", "", $imagea);;

						$imagesa[] = $fileNamea;

						$config['file_name'] = $fileNamea;

						$this->upload->initialize($config);

						if ($this->upload->do_upload('FOTOA[]')) {
							$upload_dataa 	= $this->upload->data();

							$data = array('KODE_UNIT' => $KODE_UNIT, 'SOURCE' => $upload_dataa['file_name']);
							$this->db->insert('TB_INVENTARISFOTO', $data);
						}
					}
				}

				$this->session->set_flashdata('success', 'Berhasil mengubah data PRODUK: '.$KODE_UNIT.' !!');
				header('location:' . base_url() . 'DataInventaris');
			}else{
				$this->session->set_flashdata('alert', 'Gagal mengubah data PRODUK '.$KODE_UNIT.' !!');
				header('location:' . base_url() . 'EditProduk/'.$KODE_UNIT);
			}
	}

	public function proses_produk(){
		$KODE_UNIT 		= $this->input->post('kode_unit', true);
		if (empty($KODE_UNIT)) {
			$this->session->set_flashdata('alert', 'Harap generate KODE UNIT !!');
			header('location:' . base_url() . 'TambahProduk');
		}else{
			if ($this->M_admin->TambahProduk($KODE_UNIT) == TRUE) {

				if (!empty($_FILES['FOTO']['name'])) {

					$folder = "file/site/produk/{$KODE_UNIT}/";

					if (!is_dir($folder)) {
						mkdir($folder, 0755, true);
					}
					$config['upload_path']          = $folder;
					$config['allowed_types']        = 'gif|jpg|png';
					$config['max_size']             = 10048;
					$config['overwrite'] 						= true;
					$this->load->library('upload', $config);

					$files = $_FILES['FOTO'];

					$images = array();

					foreach ($files['name'] as $key => $image) {
						$_FILES['FOTO[]']['name']= $files['name'][$key];
						$_FILES['FOTO[]']['type']= $files['type'][$key];
						$_FILES['FOTO[]']['tmp_name']= $files['tmp_name'][$key];
						$_FILES['FOTO[]']['error']= $files['error'][$key];
						$_FILES['FOTO[]']['size']= $files['size'][$key];

						$fileName = $KODE_UNIT.'-'.preg_replace("/[^a-zA-Z0-9.]/", "", $image);;

						$images[] = $fileName;

						$config['file_name'] = $fileName;

						$this->upload->initialize($config);

						if ($this->upload->do_upload('FOTO[]')) {
							$upload_data 	= $this->upload->data();
							$data = array('KODE_UNIT' => $KODE_UNIT, 'SOURCE' => $upload_data['file_name']);
							$this->db->insert('TB_INVENTARISFOTO', $data);
						}
					}
				}

				$this->session->set_flashdata('success', 'Berhasil menambahkan PRODUK: '.$KODE_UNIT.' !!');
				header('location:' . base_url() . 'DataInventaris');
			}else{
				$this->session->set_flashdata('alert', 'Gagal menambahkan PRODUK '.$KODE_UNIT.' !!');
				header('location:' . base_url() . 'TambahProduk');
			}
		}
	}

	public function hapus_produk(){
		$nama = $this->input->post('NAMA_PRODUK');
		if ($this->M_admin->hapus_produk() == TRUE) {
			$this->session->set_flashdata('success', "Berhasil menghapus data produk: ".$nama);
			redirect('DataInventaris');
		}else{
			$this->session->set_flashdata('alert', "Terjadi kesalahan saat menghapus data produk: ".$nama);
			redirect('DataInventaris');
		}
	}

	//PESANAN

	public function ditolak(){

		$data['pesanan']						= $this->M_admin->get_pesan_tolak();
		$data['module'] 		= "Admin";
		$data['fileview'] 	= "sewa_tolak";
		echo Modules::run('Template/BackEnd_Main', $data);
	}

	public function Kembali(){

		$data['pesanan']						= $this->M_admin->get_pesan_kembali();
		$data['module'] 		= "Admin";
		$data['fileview'] 	= "sewa_kembali";
		echo Modules::run('Template/BackEnd_Main', $data);
	}

	public function data_pesanan(){
		$data['total_pesan']				= $this->M_admin->total_pesan();
		$data['pesan_blverif']			= $this->M_admin->pesan_blverif();
		$data['proses_kirim']				= $this->M_admin->proses_kirim();
		$data['proses_dikemas']			= $this->M_admin->proses_dikemas();
		$data['disewa']						  = $this->M_admin->jml_disewa();

		$data['pesanan']						= $this->M_admin->get_pesan_verif();

		$data['module'] 		= "Admin";
		$data['fileview'] 	= "sewa_verif";
		echo Modules::run('Template/BackEnd_Main', $data);
	}

	public function sedang_disewa(){
		$data['total_pesan']				= $this->M_admin->total_pesan();
		$data['pesan_blverif']			= $this->M_admin->pesan_blverif();
		$data['proses_kirim']				= $this->M_admin->proses_kirim();
		$data['proses_dikemas']			= $this->M_admin->proses_dikemas();
		$data['disewa']						  = $this->M_admin->jml_disewa();

		$data['pesanan']						= $this->M_admin->get_pesan_disewa();
		$data['module'] 	= "Admin";
		$data['fileview'] 	= "sewa_disewa";
		echo Modules::run('Template/BackEnd_Main', $data);
	}

	public function sewa_riwayat(){

		if ($this->input->post('mulai')) {
			$mulai = $this->input->post('mulai');
			$berakhir = $this->input->post('berakhir');
			$data['pesanan']						= $this->M_admin->riwayat_filter($mulai, $berakhir);
			$data['mulai']					= $mulai;
			$data['berakhir']			= $berakhir;
		}else{

			$data['pesanan']						= $this->M_admin->get_pesan_riwayat();
			$data['mulai']					= null;
			$data['berakhir']			= null;
		}
		// $data['total_pesan']				= $this->M_admin->total_pesan();
		// $data['pesan_blverif']			= $this->M_admin->pesan_blverif();
		// $data['proses_kirim']				= $this->M_admin->proses_kirim();
		// $data['proses_dikemas']			= $this->M_admin->proses_dikemas();
		// $data['disewa']						  = $this->M_admin->jml_disewa();

		$data['module'] 	= "Admin";
		$data['fileview'] 	= "sewa_riwayat";
		echo Modules::run('Template/BackEnd_Main', $data);
	}

	public function detail_sewa($KODE_TRANSAKSI){

		$data['pesanan']						= $this->M_admin->get_pesan_detail($KODE_TRANSAKSI);

		$data['controller']	= $this;
		$data['module'] 		= "Admin";
		$data['fileview'] 	= "sewa_detail";
		echo Modules::run('Template/BackEnd_Main', $data);
	}

	public function TerimaPesanan($KODE_TRANSAKSI){
		if ($this->M_admin->TerimaPesanan($KODE_TRANSAKSI) == TRUE) {
			$this->session->set_flashdata('success', 'Berhasil menerima pesanan !!');
			header('location:' . base_url() . 'Pengiriman/Kembali');
		}else{
			$this->session->set_flashdata('alert', 'Gagal menerima pesanan !!');
			header('location:' . base_url() . 'Pengiriman/Kembali');
		}
	}

	public function VerifikasiPesanan($KODE_TRANSAKSI){
		if ($this->M_admin->VerifikasiPesanan($KODE_TRANSAKSI) == TRUE) {
			$this->session->set_flashdata('success', 'Berhasil memverifikasi bukti pembayaran !!');
			header('location:' . base_url() . 'Pesanan/Verifikasi');
		}else{
			$this->session->set_flashdata('alert', 'Gagal memverifikasi bukti pembayaran !!');
			header('location:' . base_url() . 'Pesanan/Verifikasi');
		}
	}

	public function TolakPesanan(){
		$KODE_TRANSAKSI = $this->input->post('KODE_TRANSAKSI');
		if ($this->M_admin->TolakPesanan($KODE_TRANSAKSI) == TRUE) {
			$this->session->set_flashdata('success', 'Berhasil menolak transaksi '.$KODE_TRANSAKSI.' !!');
			header('location:' . base_url() . 'Pesanan/Verifikasi');
		}else{
			$this->session->set_flashdata('alert', 'Gagal menolak transaksi '.$KODE_TRANSAKSI.' !!');
			header('location:' . base_url() . 'Pesanan/Verifikasi');
		}
	}

	public function Perpanjang(){
		$KODE_TRANSAKSI = $this->input->post('KODE_TRANSAKSI');
		if ($this->M_admin->Perpanjang() == TRUE) {
			$this->session->set_flashdata('success', "Berhasil memperpanjang pesanan: ".$KODE_TRANSAKSI);
			redirect('Pesanan/Detail/'.$KODE_TRANSAKSI);
		}else{
			$this->session->set_flashdata('alert', "Terjadi kesalahan saat memperpanjang pesanan: ".$KODE_TRANSAKSI);
			redirect('Pesanan/Detail/'.$KODE_TRANSAKSI);
		}
	}

	// PENGIRIMAN

	public function pengiriman_dikemas(){
		$proses_pengirim						= 3;
		$data['total_pesan']				= $this->M_admin->total_pesan();
		$data['proses_dikemas']			= $this->M_admin->proses_dikemas();
		$data['proses_kirim']				= $this->M_admin->proses_kirim();

		$data['pesanan']						= $this->M_admin->get_pesan_pengirim($proses_pengirim);

		$data['module'] 		= "Admin";
		$data['fileview'] 	= "pengiriman_dikemas";
		echo Modules::run('Template/BackEnd_Main', $data);
	}

	public function pengiriman_kirim(){

		$KODE_TRANSAKSI	= $this->input->post('kode_transaksi');
		$NO_RESI				= $this->input->post('no_resi');

		if ($NO_RESI == null || empty($NO_RESI)) {
			$this->session->set_flashdata('alert', 'No RESI kosong. No RESI untuk pesanan '.$KODE_TRANSAKSI.' kosong, harap isikan no RESI, agar pengguna dapat melacak pengiriman pesanan !!');
			header('location:' . base_url() . 'Pengiriman/Dikemas');
		}else{
			if ($this->M_admin->pesanan_kirim($KODE_TRANSAKSI, $NO_RESI) == TRUE) {
				$this->session->set_flashdata('success', 'Berhasil mengubah pesanan menjadi proses pengiriman !!');
				header('location:' . base_url() . 'Pengiriman/Dikemas');
			}else{
				$this->session->set_flashdata('alert', 'Gagal mengubah status !!');
				header('location:' . base_url() . 'Pengiriman/Dikemas');
			}
		}
	}

	public function pengiriman_dikirim(){
		$proses_pengirim						= 4;
		$data['total_pesan']				= $this->M_admin->total_pesan();
		$data['proses_dikemas']			= $this->M_admin->proses_dikemas();
		$data['proses_kirim']				= $this->M_admin->proses_kirim();

		$data['pesanan']						= $this->M_admin->get_pesan_pengirim($proses_pengirim);

		$data['module'] 		= "Admin";
		$data['fileview'] 	= "pengiriman_dikirim";
		echo Modules::run('Template/BackEnd_Main', $data);
	}

	public function pengiriman_riwayat(){
		$data['total_pesan']				= $this->M_admin->total_pesan();
		$data['proses_dikemas']			= $this->M_admin->proses_dikemas();
		$data['proses_kirim']				= $this->M_admin->proses_kirim();

		$data['pesanan']						= $this->M_admin->get_pengirim_riwayat();

		$data['module'] 		= "Admin";
		$data['fileview'] 	= "pengiriman_riwayat";
		echo Modules::run('Template/BackEnd_Main', $data);
	}

	public function revoke_pesanan($status, $KODE_TRANSAKSI){
		if ($this->M_admin->revoke_pesanan($status, $KODE_TRANSAKSI) == TRUE) {
			$this->session->set_flashdata('success', 'Berhasil merubah status pesanan !!');
			header('location:' . base_url() . 'Pesanan/Detail/'.$KODE_TRANSAKSI);
		}else{
			$this->session->set_flashdata('alert', 'Gagal merubah status pesanan !!');
			header('location:' . base_url() . 'Pesanan/Detail/'.$KODE_TRANSAKSI);
		}
	}

	// Deposit

	public function deposit_minta(){
		$data['total_topup']				= $this->M_admin->total_topup();
		$data['topup_belver']				= $this->M_admin->topup_belver();

		$data['pesanan']					  = $this->M_admin->get_topup_belver();

		$data['module'] 		= "Admin";
		$data['fileview'] 	= "deposit_minta";
		echo Modules::run('Template/BackEnd_Main', $data);
	}

	public function deposit_saldo(){
		$data['total_topup']				= $this->M_admin->total_topup();
		$data['topup_belver']				= $this->M_admin->topup_belver();

		$data['pesanan']					  = $this->M_admin->get_topup_saldo();

		$data['module'] 		= "Admin";
		$data['fileview'] 	= "deposit_saldo";
		echo Modules::run('Template/BackEnd_Main', $data);
	}

	public function deposit_riwayat(){
		$data['total_topup']				= $this->M_admin->total_topup();
		$data['topup_belver']				= $this->M_admin->topup_belver();

		$data['pesanan']					  = $this->M_admin->get_topup_riwayat();

		$data['module'] 		= "Admin";
		$data['fileview'] 	= "deposit_riwayat";
		echo Modules::run('Template/BackEnd_Main', $data);
	}

	public function deposit_detail($KODE_TOPUP){
		$temp = explode("-", $KODE_TOPUP);
		$id_topup = $temp[0];
		$KODE_PERSONAL = $temp[1];

		$data['pesanan']					  = $this->M_admin->get_topup_detail($id_topup);

		$data['module'] 		= "Admin";
		$data['fileview'] 	= "deposit_detail";
		echo Modules::run('Template/BackEnd_Main', $data);
	}

	public function VerifikasiDeposit($KODE_TOPUP){
		$temp = explode("-", $KODE_TOPUP);
		$id_topup = $temp[0];
		$KODE_PERSONAL = $temp[1];
		if ($this->M_admin->VerifikasiDeposit($id_topup, $KODE_PERSONAL) == TRUE) {
			$this->session->set_flashdata('success', 'Berhasil mem - verifikasi permintaan deposit !!');
			header('location:' . base_url() . 'Deposit/Permintaan');
			// header('location:' . base_url() . 'Deposit/Detail/'.$KODE_TOPUP);
		}else{
			$this->session->set_flashdata('alert', 'Gagal mem - verifikasi permintaan deposit !!');
			header('location:' . base_url() . 'Deposit/Permintaan');
		}
	}

	// Pengaturan

	public function Pengaturan(){
		$data['total_pengguna']		= $this->M_admin->jml_pengguna();
		$data['pengguna_verif']		= $this->M_admin->pengguna_verif();
		$data['pengguna_belum']		= $this->M_admin->pengguna_belum();


		$data['get_pengguna']		= $this->M_admin->get_pengguna();

		$data['module'] 	= "Admin";
		$data['fileview'] 	= "pengaturan";
		echo Modules::run('Template/BackEnd_Main', $data);
	}

}
