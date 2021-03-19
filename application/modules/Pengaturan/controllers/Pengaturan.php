<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengaturan extends MX_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('M_pengaturan');
		date_default_timezone_set("Asia/Jakarta");
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

	//BANK

	public function Bank(){
		$data['controller']	= $this;

		$data['module'] 		= "Pengaturan";
		$data['fileview'] 	= "rekening";
		echo Modules::run('Template/BackEnd_Main', $data);
	}

	public function ubah_bank(){
		if ($this->M_pengaturan->UbahBank() == TRUE) {
			$this->session->set_flashdata('success', "Berhasil mengubah detail BANK");
			redirect('Pengaturan/Bank');
		}else{
			$this->session->set_flashdata('alert', "detail BANK, Tidak mengalami perubahan");
			redirect('Pengaturan/Bank');
		}
	}

	//DENDA SEWA

	public function Denda(){
		$data['controller']	= $this;

		$data['module'] 		= "Pengaturan";
		$data['fileview'] 	= "denda_sewa";
		echo Modules::run('Template/BackEnd_Main', $data);
	}

	public function ubah_denda(){
		if ($this->M_pengaturan->UbahDenda() == TRUE) {
			$this->session->set_flashdata('success', "Berhasil mengubah denda SEWA");
			redirect('Pengaturan/Denda');
		}else{
			$this->session->set_flashdata('alert', "Data SEWA, Tidak mengalami perubahan");
			redirect('Pengaturan/Denda');
		}
	}

	//ONGKIR

	public function Ongkir(){
		$data['controller']	= $this;

		$data['module'] 		= "Pengaturan";
		$data['fileview'] 	= "ongkir";
		echo Modules::run('Template/BackEnd_Main', $data);
	}

	public function ubah_ongkir(){
		$nama = $this->input->post('nama');
		if ($this->M_pengaturan->UbahOngkir() == TRUE) {
			$this->session->set_flashdata('success', "Berhasil mengubah tarif ongkir: ".$nama);
			redirect('Pengaturan/Ongkir');
		}else{
			$this->session->set_flashdata('alert', "Data tarif ongkir: ".$nama.", Tidak mengalami perubahan");
			redirect('Pengaturan/Ongkir');
		}
	}

	//KONTAK WEBSITE

	public function Kontak(){
		$data['controller']	= $this;

		$data['wa']		= $this->M_pengaturan->get_wa();
		$data['ig']		= $this->M_pengaturan->get_ig();

		$data['module'] 		= "Pengaturan";
		$data['fileview'] 	= "kontak";
		echo Modules::run('Template/BackEnd_Main', $data);
	}

	public function ubah_wa(){
		if ($this->M_pengaturan->UbahWa() == TRUE) {
			$this->session->set_flashdata('success', "Berhasil mengubah Kontak WA");
			redirect('Pengaturan/Kontak');
		}else{
			$this->session->set_flashdata('alert', "Data Kontak WA, Tidak mengalami perubahan");
			redirect('Pengaturan/Kontak');
		}
	}

	public function ubah_ig(){
		if ($this->M_pengaturan->UbahIg() == TRUE) {
			$this->session->set_flashdata('success', "Berhasil mengubah Kontak IG");
			redirect('Pengaturan/Kontak');
		}else{
			$this->session->set_flashdata('alert', "Data Kontak IG, Tidak mengalami perubahan");
			redirect('Pengaturan/Kontak');
		}
	}

	//KATEGORI

	public function Kategori(){
		if ($this->M_pengaturan->get_kategori() == FALSE) {
			$this->session->set_flashdata('alert', "Gagal menampilkan data kategori, harap hubungi developer.");
			redirect('Pengaturan');
		}else{
			$data['kategori']      = $this->M_pengaturan->get_kategori();

			$data['controller'] = $this;
			$data['module']     = "Pengaturan";
			$data['fileview']   = "kategori";
			echo Modules::run('Template/BackEnd_Main', $data);
		}
	}

	public function tambah_kategori(){
		$nama = $this->input->post('kategori');
		if ($this->M_pengaturan->TambahKategori() == TRUE) {
			$this->session->set_flashdata('success', "Berhasil menambahkan data kategori: ".$nama);
			redirect('Pengaturan/Kategori');
		}else{
			$this->session->set_flashdata('alert', "Terjadi kesalahan saat menambahkan data kategori: ".$nama);
			redirect('Pengaturan/Kategori');
		}
	}

	public function ubah_kategori(){
		$nama = $this->input->post('kategori');
		if ($this->M_pengaturan->ubah_kategori() == TRUE) {
			$this->session->set_flashdata('success', "Berhasil mengubah data kategori: ".$nama);
			redirect('Pengaturan/Kategori');
		}else{
			$this->session->set_flashdata('alert', "Terjadi kesalahan saat mengubah data kategori: ".$nama);
			redirect('Pengaturan/Kategori');
		}
	}

	public function hapus_kategori(){
		$nama = $this->input->post('kategori');
		if ($this->M_pengaturan->hapus_kategori() == TRUE) {
			$this->session->set_flashdata('success', "Berhasil menghapus data kategori: ".$nama);
			redirect('Pengaturan/Kategori');
		}else{
			$this->session->set_flashdata('alert', "Terjadi kesalahan saat menghapus data kategori: ".$nama);
			redirect('Pengaturan/Kategori');
		}
	}

	//BRAND

	public function Brand(){
		if ($this->M_pengaturan->get_brand() == FALSE) {
			$this->session->set_flashdata('alert', "Gagal menampilkan data brand, harap hubungi developer.");
			redirect('Pengaturan');
		}else{
			$data['brand']			= $this->M_pengaturan->get_brand();

			$data['controller'] = $this;
			$data['module'] 		= "Pengaturan";
			$data['fileview'] 	= "brand";
			echo Modules::run('Template/BackEnd_Main', $data);
		}
	}

	public function tambah_brand(){
		$nama = $this->input->post('brand');
		if ($this->M_pengaturan->TambahBrand() == TRUE) {
			$this->session->set_flashdata('success', "Berhasil menambahkan data brand: ".$nama);
			redirect('Pengaturan/Brand');
		}else{
			$this->session->set_flashdata('alert', "Terjadi kesalahan saat menambahkan data brand: ".$nama);
			redirect('Pengaturan/Brand');
		}
	}

	public function ubah_brand(){
		$nama = $this->input->post('brand');
		if ($this->M_pengaturan->ubah_brand() == TRUE) {
			$this->session->set_flashdata('success', "Berhasil mengubah data brand: ".$nama);
			redirect('Pengaturan/Brand');
		}else{
			$this->session->set_flashdata('alert', "Terjadi kesalahan saat mengubah data brand: ".$nama);
			redirect('Pengaturan/Brand');
		}
	}

	public function hapus_brand(){
		$nama = $this->input->post('brand');
		if ($this->M_pengaturan->hapus_brand() == TRUE) {
			$this->session->set_flashdata('success', "Berhasil menghapus data brand: ".$nama);
			redirect('Pengaturan/Brand');
		}else{
			$this->session->set_flashdata('alert', "Terjadi kesalahan saat menghapus data brand: ".$nama);
			redirect('Pengaturan/Brand');
		}
	}

	//SERIES

	public function Series(){
		if ($this->M_pengaturan->get_series() == FALSE) {
			$this->session->set_flashdata('alert', "Gagal menampilkan data series, harap hubungi developer.");
			redirect('Pengaturan');
		}else{
			$data['series']			= $this->M_pengaturan->get_series();

			$data['controller'] = $this;
			$data['module'] 		= "Pengaturan";
			$data['fileview'] 	= "series";
			echo Modules::run('Template/BackEnd_Main', $data);
		}
	}

	public function tambah_series(){
		$nama = $this->input->post('series');
		if ($this->M_pengaturan->TambahSeries() == TRUE) {
			$this->session->set_flashdata('success', "Berhasil menambahkan data series: ".$nama);
			redirect('Pengaturan/Series');
		}else{
			$this->session->set_flashdata('alert', "Terjadi kesalahan saat menambahkan data series: ".$nama);
			redirect('Pengaturan/Series');
		}
	}

	public function ubah_series(){
		$nama = $this->input->post('series');
		if ($this->M_pengaturan->ubah_series() == TRUE) {
			$this->session->set_flashdata('success', "Berhasil mengubah data series: ".$nama);
			redirect('Pengaturan/Series');
		}else{
			$this->session->set_flashdata('alert', "Terjadi kesalahan saat mengubah data series: ".$nama);
			redirect('Pengaturan/Series');
		}
	}

	public function hapus_series(){
		$nama = $this->input->post('series');
		if ($this->M_pengaturan->hapus_series() == TRUE) {
			$this->session->set_flashdata('success', "Berhasil menghapus data series: ".$nama);
			redirect('Pengaturan/Series');
		}else{
			$this->session->set_flashdata('alert', "Terjadi kesalahan saat menghapus data series: ".$nama);
			redirect('Pengaturan/Series');
		}
	}

	//VARIAN

	public function Varian(){
		if ($this->M_pengaturan->get_varian() == FALSE) {
			$this->session->set_flashdata('alert', "Gagal menampilkan data varian, harap hubungi developer.");
			redirect('Pengaturan');
		}else{
			$data['varian']			= $this->M_pengaturan->get_varian();

			$data['controller'] = $this;
			$data['module'] 		= "Pengaturan";
			$data['fileview'] 	= "varian";
			echo Modules::run('Template/BackEnd_Main', $data);
		}
	}

	public function tambah_varian(){
		$nama = $this->input->post('varian');
		if ($this->M_pengaturan->TambahVarian() == TRUE) {
			$this->session->set_flashdata('success', "Berhasil menambahkan data varian: ".$nama);
			redirect('Pengaturan/Varian');
		}else{
			$this->session->set_flashdata('alert', "Terjadi kesalahan saat menambahkan data varian: ".$nama);
			redirect('Pengaturan/Varian');
		}
	}

	public function ubah_varian(){
		$nama = $this->input->post('varian');
		if ($this->M_pengaturan->ubah_varian() == TRUE) {
			$this->session->set_flashdata('success', "Berhasil mengubah data varian: ".$nama);
			redirect('Pengaturan/Varian');
		}else{
			$this->session->set_flashdata('alert', "Terjadi kesalahan saat mengubah data varian: ".$nama);
			redirect('Pengaturan/Varian');
		}
	}

	public function hapus_varian(){
		$nama = $this->input->post('varian');
		if ($this->M_pengaturan->hapus_varian() == TRUE) {
			$this->session->set_flashdata('success', "Berhasil menghapus data varian: ".$nama);
			redirect('Pengaturan/Varian');
		}else{
			$this->session->set_flashdata('alert', "Terjadi kesalahan saat menghapus data varian: ".$nama);
			redirect('Pengaturan/Varian');
		}
	}

	//GRADE

	public function Grade(){
		if ($this->M_pengaturan->get_grade() == FALSE) {
			$this->session->set_flashdata('alert', "Gagal menampilkan data grade, harap hubungi developer.");
			redirect('Pengaturan');
		}else{
			$data['grade']			= $this->M_pengaturan->get_grade();

			$data['controller'] = $this;
			$data['module'] 		= "Pengaturan";
			$data['fileview'] 	= "grade";
			echo Modules::run('Template/BackEnd_Main', $data);
		}
	}

	public function tambah_grade(){
		$nama = $this->input->post('grade');
		if ($this->M_pengaturan->TambahGrade() == TRUE) {
			$this->session->set_flashdata('success', "Berhasil menambahkan data grade: ".$nama);
			redirect('Pengaturan/Grade');
		}else{
			$this->session->set_flashdata('alert', "Terjadi kesalahan saat menambahkan data grade: ".$nama);
			redirect('Pengaturan/Grade');
		}
	}

	public function ubah_grade(){
		$nama = $this->input->post('grade');
		if ($this->M_pengaturan->ubah_grade() == TRUE) {
			$this->session->set_flashdata('success', "Berhasil mengubah data grade: ".$nama);
			redirect('Pengaturan/Grade');
		}else{
			$this->session->set_flashdata('alert', "Terjadi kesalahan saat mengubah data grade: ".$nama);
			redirect('Pengaturan/Grade');
		}
	}

	public function hapus_grade(){
		$nama = $this->input->post('grade');
		if ($this->M_pengaturan->hapus_grade() == TRUE) {
			$this->session->set_flashdata('success', "Berhasil menghapus data grade: ".$nama);
			redirect('Pengaturan/Grade');
		}else{
			$this->session->set_flashdata('alert', "Terjadi kesalahan saat menghapus data grade: ".$nama);
			redirect('Pengaturan/Grade');
		}
	}

	//VOUCHER

	public function RiwayatVoucher(){
		$data['voucher']			= $this->M_pengaturan->get_voucher_ex();

		$data['controller'] = $this;
		$data['module'] 		= "Pengaturan";
		$data['fileview'] 	= "voucher_riwayat";
		echo Modules::run('Template/BackEnd_Main', $data);
	}

	public function Voucher(){
		$data['voucher']			= $this->M_pengaturan->get_voucher();

		$data['controller'] = $this;
		$data['module'] 		= "Pengaturan";
		$data['fileview'] 	= "voucher";
		echo Modules::run('Template/BackEnd_Main', $data);
	}

	public function VoucherHash(){
		$front 							= $this->input->post('nama');

		if ($front == null || empty($front)) {
			$front = "CODE";
		}
		$front 	= strtoupper($front);
		$chars 	= "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
		$code 	= "";

		do {
			for ($i = 0; $i < 6; $i++) {
				$code .= $chars[mt_rand(0, strlen($chars)-1)];
				$result = $front."_".$code;
			}

		} while ($this->M_pengaturan->cek_code($result) > 0);

		$data['code'] = $result;
		$this->load->view('code', $data);
	}

	public function tambah_voucher(){
		$nama = $this->input->post('nama');
		if (empty($this->input->post('code'))) {
			$this->session->set_flashdata('success', "Harap klik generate code, untuk menentukan kode voucher: ".$nama);
			redirect('Voucher');
		}else{
			if ($this->M_pengaturan->TambahVoucher() == TRUE) {
				$this->session->set_flashdata('success', "Berhasil menambahkan data voucher: ".$nama);
				redirect('Voucher');
			}else{
				$this->session->set_flashdata('alert', "Terjadi kesalahan saat menambahkan data voucher: ".$nama);
				redirect('Voucher');
			}
		}
	}

	public function hapus_voucher(){
		$nama = $this->input->post('nama');
		if ($this->M_pengaturan->hapus_voucher() == TRUE) {
			$this->session->set_flashdata('success', "Berhasil menghapus data voucher: ".$nama);
			redirect('Voucher');
		}else{
			$this->session->set_flashdata('alert', "Terjadi kesalahan saat menghapus data voucher: ".$nama);
			redirect('Voucher');
		}
	}



}
