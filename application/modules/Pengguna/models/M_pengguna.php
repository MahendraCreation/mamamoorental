<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pengguna extends CI_Model {
	function __construct(){
		parent::__construct();
	}

	public function cek_transaksi($KODE_TRANSAKSI){
		$query = $this->db->query("SELECT KODE_TRANSAKSI FROM TB_TRANSAKSI WHERE KODE_TRANSAKSI = '$KODE_TRANSAKSI'");

		if ($query->num_rows() > 0) {
			return TRUE;
		}else{
			return FALSE;
		}

	}

	public function get_foto($id){
		$query = $this->db->query("SELECT * FROM TB_INVENTARISFOTO WHERE KODE_UNIT = '$id'");
		$cek = $query->num_rows();

		if ($cek > 0) {
			return $query->result();
		}else{
			return false;
		}
	}

	public function get_denda(){
		$query = $this->db->query("SELECT VALUE FROM TB_PENGATURAN WHERE length = 3 AND NAMA = 'denda_sewa'");
		$prov = $query->row();

		return $prov->VALUE;

	}

	public function find_prov($kode){
		$query = $this->db->query("SELECT nama FROM TB_WILAYAH WHERE LEFT(kode, 2) = '$kode' AND CHAR_LENGTH(kode)=2 ORDER BY nama");
		$prov = $query->row();

		return $prov->nama;

	}

	public function find_kota($kode){
		$query = $this->db->query("SELECT nama FROM TB_WILAYAH WHERE LEFT(kode, 5) = '$kode' AND CHAR_LENGTH(kode)=5 ORDER BY nama");
		$prov = $query->row();

		return $prov->nama;

	}

	public function find_kec($kode){
		$query = $this->db->query("SELECT nama FROM TB_WILAYAH WHERE LEFT(kode, 8) = '$kode' AND CHAR_LENGTH(kode)=8 ORDER BY nama");
		$prov = $query->row();

		return $prov->nama;

	}

	public function pengguna_ver($KODE_PERSONAL){
		$query = $this->db->query("SELECT VERIFIKASI FROM TB_AUTH WHERE KODE_PERSONAL = '$KODE_PERSONAL'");
		$cek = $query->row();

		return $cek->VERIFIKASI;
	}

	public function get_prov(){
		$query = $this->db->query("SELECT kode,nama FROM TB_WILAYAH WHERE CHAR_LENGTH(kode)=2 ORDER BY nama");
		$cek = $query->num_rows();

		if ($cek > 0) {
			return $query->result();
		}else{
			return false;
		}
	}

	public function get_kota($id_prov, $n, $m){
		$query = $this->db->query("SELECT kode, nama FROM TB_WILAYAH WHERE LEFT(kode, $n) = '$id_prov' AND CHAR_LENGTH(kode)=$m ORDER BY nama");
		$cek = $query->num_rows();

		if ($cek > 0) {
			return $query->result();
		}else{
			return false;
		}
	}

	public function get_kec($id_kota, $n, $m){
		$query = $this->db->query("SELECT kode, nama FROM TB_WILAYAH WHERE LEFT(kode, $n) = '$id_kota' AND CHAR_LENGTH(kode)=$m ORDER BY nama");
		$cek = $query->num_rows();

		if ($cek > 0) {
			return $query->result();
		}else{
			return false;
		}
	}

	public function get_pengguna($KODE_PERSONAL){
		$query = $this->db->query("SELECT *, a.KODE_PERSONAL as KODE FROM TB_PERSONALDATA a LEFT JOIN TB_PERSONALPENJAMIN b ON a.KODE_PERSONAL = b.KODE_PERSONAL LEFT JOIN TB_PERSONALREKENING c ON a.KODE_PERSONAL = c.KODE_PERSONAL WHERE a.KODE_PERSONAL = '$KODE_PERSONAL'");

		if ($query->num_rows() > 0) {
			return $query->row();
		}else{
			return false;
		}

	}

	public function get_kembali($KODE_TRANSAKSI){
		$query = $this->db->query("SELECT * FROM TB_TRANSAKSI a LEFT JOIN TB_TRANSAKSIWAKTU b ON a.KODE_TRANSAKSI = b.KODE_TRANSAKSI LEFT JOIN TB_INVENTARISUNIT c ON a.KODE_UNIT = c.KODE_UNIT WHERE a.KODE_TRANSAKSI = '$KODE_TRANSAKSI'");

		if ($query->num_rows() > 0) {
			return $query->row();
		}else{
			return false;
		}

	}
	public function bank_ma($find){
		$query = $this->db->query("SELECT * FROM TB_PENGATURAN WHERE length = 2 AND NAMA LIKE 'rekening_%' AND NAMA LIKE '%$find'");
		$ongkir = $query->row();

		return $ongkir->VALUE;
	}

	public function get_bank($KODE_PERSONAL){
		$query = $this->db->query("SELECT * FROM TB_PERSONALREKENING WHERE KODE_PERSONAL = '$KODE_PERSONAL'");

		if ($query->num_rows() > 0) {
			return $query->row();
		}else{
			return false;
		}

	}

	public function get_alamat($KODE_PERSONAL){
		$query = $this->db->query("SELECT a.PROVINSI, a.KOTA, a.KECAMATAN, a.JALAN, a.KODE_POS FROM TB_PERSONALDATA a WHERE a.KODE_PERSONAL = '$KODE_PERSONAL'");

		if ($query->num_rows() > 0) {
			return $query->row();
		}else{
			return false;
		}

	}

	public function get_penjamin($KODE_PERSONAL){
		$query = $this->db->query("SELECT * FROM TB_PERSONALPENJAMIN WHERE KODE_PERSONAL = '$KODE_PERSONAL'");

		if ($query->num_rows() > 0) {
			return $query->row();
		}else{
			return false;
		}

	}

	public function get_deposit($KODE_PERSONAL){
		$query = $this->db->query("SELECT * FROM TB_DEPOSIT WHERE KODE_PERSONAL = '$KODE_PERSONAL'");

		if ($query->num_rows() > 0) {
			return $query->row();
		}else{
			return false;
		}

	}

	public function get_pemasukan($KODE_PERSONAL){
		$query = $this->db->query("SELECT * FROM TB_TOPUP WHERE KODE_PERSONAL = '$KODE_PERSONAL'");

		if ($query->num_rows() > 0) {
			return $query->result();
		}else{
			return false;
		}

	}

	public function auth_pengguna($email){
		$query = $this->db->query("SELECT a.PASSWORD, a.KODE_PERSONAL, a.ROLE, b.NAMA FROM TB_AUTH a LEFT JOIN TB_PERSONALDATA b ON a.KODE_PERSONAL = b.KODE_PERSONAL WHERE a.email = '$email'");
		$cek = $query->num_rows();

		if ($cek > 0) {
			return $query->row();
		}else{
			return false;
		}
	}

	public function get_pesanan($KODE_PERSONAL){
		$query = $this->db->query("SELECT * FROM TB_TRANSAKSI  a LEFT JOIN TB_INVENTARISUNIT b ON a.KODE_UNIT = b.KODE_UNIT WHERE a.KODE_PERSONAL = '$KODE_PERSONAL' ORDER BY a.log_time DESC");

		if ($query->num_rows() > 0) {
			return $query->result();
		}else{
			return false;
		}

	}

	public function get_belumbayar($KODE_PERSONAL){
		$query = $this->db->query("SELECT * FROM TB_TRANSAKSI a LEFT JOIN TB_INVENTARISUNIT b ON a.KODE_UNIT = b.KODE_UNIT WHERE a.KODE_PERSONAL = '$KODE_PERSONAL' AND a.STATUS = 0 ORDER BY a.log_time DESC");

		if ($query->num_rows() > 0) {
			return $query->result();
		}else{
			return false;
		}

	}

	public function get_belumver($KODE_PERSONAL){
		$query = $this->db->query("SELECT * FROM TB_TRANSAKSI  a LEFT JOIN TB_INVENTARISUNIT b ON a.KODE_UNIT = b.KODE_UNIT WHERE a.KODE_PERSONAL = '$KODE_PERSONAL' AND a.STATUS = 1 ORDER BY a.log_time DESC");

		if ($query->num_rows() > 0) {
			return $query->result();
		}else{
			return false;
		}

	}

	public function get_kemas($KODE_PERSONAL){
		$query = $this->db->query("SELECT * FROM TB_TRANSAKSI  a LEFT JOIN TB_INVENTARISUNIT b ON a.KODE_UNIT = b.KODE_UNIT WHERE a.KODE_PERSONAL = '$KODE_PERSONAL' AND a.STATUS = 3 ORDER BY a.log_time DESC");

		if ($query->num_rows() > 0) {
			return $query->result();
		}else{
			return false;
		}

	}

	public function get_pengiriman($KODE_PERSONAL){
		$query = $this->db->query("SELECT * FROM TB_TRANSAKSI  a LEFT JOIN TB_INVENTARISUNIT b ON a.KODE_UNIT = b.KODE_UNIT WHERE a.KODE_PERSONAL = '$KODE_PERSONAL' AND a.STATUS = 4 ORDER BY a.log_time DESC");

		if ($query->num_rows() > 0) {
			return $query->result();
		}else{
			return false;
		}

	}

	public function get_disewa($KODE_PERSONAL){
		$query = $this->db->query("SELECT * FROM TB_TRANSAKSI  a LEFT JOIN TB_INVENTARISUNIT b ON a.KODE_UNIT = b.KODE_UNIT WHERE a.KODE_PERSONAL = '$KODE_PERSONAL' AND a.STATUS =  5 ORDER BY a.log_time DESC");

		if ($query->num_rows() > 0) {
			return $query->result();
		}else{
			return false;
		}

	}

	public function get_gagal($KODE_PERSONAL){
		$query = $this->db->query("SELECT * FROM TB_TRANSAKSI  a LEFT JOIN TB_INVENTARISUNIT b ON a.KODE_UNIT = b.KODE_UNIT WHERE a.KODE_PERSONAL = '$KODE_PERSONAL' AND a.STATUS =  99 || a.STATUS = 6 ORDER BY a.log_time DESC");

		if ($query->num_rows() > 0) {
			return $query->result();
		}else{
			return false;
		}

	}

	public function jml_semua($KODE_PERSONAL){
		$query = $this->db->query("SELECT COUNT(*) as jml FROM TB_TRANSAKSI  a LEFT JOIN TB_INVENTARISUNIT b ON a.KODE_UNIT = b.KODE_UNIT WHERE a.KODE_PERSONAL = '$KODE_PERSONAL'");

		if ($query->num_rows() > 0) {
			$data  = $query->row();
			return $data->jml;
		}else{
			return false;
		}

	}

	public function jml_belver($KODE_PERSONAL){
		$query = $this->db->query("SELECT COUNT(*) as jml FROM TB_TRANSAKSI  a LEFT JOIN TB_INVENTARISUNIT b ON a.KODE_UNIT = b.KODE_UNIT WHERE a.KODE_PERSONAL = '$KODE_PERSONAL' AND a.STATUS = 0");

		if ($query->num_rows() > 0) {
			$data  = $query->row();
			return $data->jml;
		}else{
			return false;
		}

	}

	public function jml_diproses($KODE_PERSONAL){
		$query = $this->db->query("SELECT COUNT(*) as jml FROM TB_TRANSAKSI  a LEFT JOIN TB_INVENTARISUNIT b ON a.KODE_UNIT = b.KODE_UNIT WHERE a.KODE_PERSONAL = '$KODE_PERSONAL' AND a.STATUS = 1");

		if ($query->num_rows() > 0) {
			$data  = $query->row();
			return $data->jml;
		}else{
			return false;
		}

	}

	public function jml_dikemas($KODE_PERSONAL){
		$query = $this->db->query("SELECT COUNT(*) as jml FROM TB_TRANSAKSI  a LEFT JOIN TB_INVENTARISUNIT b ON a.KODE_UNIT = b.KODE_UNIT WHERE a.KODE_PERSONAL = '$KODE_PERSONAL' AND a.STATUS = 3");

		if ($query->num_rows() > 0) {
			$data  = $query->row();
			return $data->jml;
		}else{
			return false;
		}

	}

	public function jml_dikirim($KODE_PERSONAL){
		$query = $this->db->query("SELECT COUNT(*) as jml FROM TB_TRANSAKSI  a LEFT JOIN TB_INVENTARISUNIT b ON a.KODE_UNIT = b.KODE_UNIT WHERE a.KODE_PERSONAL = '$KODE_PERSONAL' AND a.STATUS = 4");

		if ($query->num_rows() > 0) {
			$data  = $query->row();
			return $data->jml;
		}else{
			return false;
		}

	}

	public function jml_disewa($KODE_PERSONAL){
		$query = $this->db->query("SELECT COUNT(*) as jml FROM TB_TRANSAKSI  a LEFT JOIN TB_INVENTARISUNIT b ON a.KODE_UNIT = b.KODE_UNIT WHERE a.KODE_PERSONAL = '$KODE_PERSONAL' AND a.STATUS = 5");

		if ($query->num_rows() > 0) {
			$data  = $query->row();
			return $data->jml;
		}else{
			return false;
		}

	}

	public function jml_gagal($KODE_PERSONAL){
		$query = $this->db->query("SELECT COUNT(*) as jml FROM TB_TRANSAKSI  a LEFT JOIN TB_INVENTARISUNIT b ON a.KODE_UNIT = b.KODE_UNIT WHERE a.KODE_PERSONAL = '$KODE_PERSONAL' AND a.STATUS = 99 || a.STATUS = 6");

		if ($query->num_rows() > 0) {
			$data  = $query->row();
			return $data->jml;
		}else{
			return false;
		}

	}

	public function jml_dp_masuk($KODE_PERSONAL){
		$query = $this->db->query("SELECT COUNT(*) as jml FROM TB_TOPUP WHERE KODE_PERSONAL = '$KODE_PERSONAL' AND STATUS = 0");

		if ($query->num_rows() > 0) {
			$data  = $query->row();
			return $data->jml;
		}else{
			return false;
		}

	}

	public function get_detailpesanan($KODE_TRANSAKSI){
		$query = $this->db->query("SELECT z.*,z.STATUS as proses, a.*, b.*, c.SOURCE, d.GRADE, e.MERK, f.VARIAN, g.TYPE, l.* FROM TB_TRANSAKSI z LEFT JOIN TB_INVENTARISUNIT a ON z.KODE_UNIT = a.KODE_UNIT LEFT JOIN TB_HARGASEWA b ON a.KODE_UNIT = b.KODE_UNIT LEFT JOIN TB_INVENTARISFOTO c ON a.KODE_UNIT = c.KODE_UNIT LEFT JOIN TB_GRADE d ON a.ID_GRADE = d.ID_GRADE LEFT JOIN TB_MERK e ON a.ID_MERK = e.ID_MERK LEFT JOIN TB_VARIAN f ON a.ID_VARIAN = f.ID_VARIAN LEFT JOIN TB_TYPE g ON a.ID_TYPE = g.ID_TYPE LEFT JOIN TB_TRANSAKSIWAKTU l ON z.KODE_TRANSAKSI = l.KODE_TRANSAKSI WHERE z.KODE_TRANSAKSI = '$KODE_TRANSAKSI'");

		if ($query->num_rows() > 0) {
			return $query->row();
		}else{
			return false;
		}

	}

	public function update_personal($pribadi, $KODE_PERSONAL){
		$this->db->where('KODE_PERSONAL', $KODE_PERSONAL);
		$this->db->update('TB_PERSONALDATA', $pribadi);
		return ($this->db->affected_rows() != 1) ? false : true;
	}

	public function update_bank($bank, $KODE_PERSONAL){
		$this->db->where('KODE_PERSONAL', $KODE_PERSONAL);
		$this->db->update('TB_PERSONALREKENING', $bank);
		return ($this->db->affected_rows() != 1) ? false : true;
	}

	public function update_alamat($alamat, $KODE_PERSONAL){
		$this->db->where('KODE_PERSONAL', $KODE_PERSONAL);
		$this->db->update('TB_PERSONALDATA', $alamat);
		return ($this->db->affected_rows() != 1) ? false : true;
	}

	public function update_pass($pass, $KODE_PERSONAL){
		$this->db->where('KODE_PERSONAL', $KODE_PERSONAL);
		$this->db->update('TB_AUTH', $pass);
		return ($this->db->affected_rows() != 1) ? false : true;
	}

	public function update_penjamin($penjamin, $KODE_PERSONAL){
		$this->db->where('KODE_PERSONAL', $KODE_PERSONAL);
		$this->db->update('TB_PERSONALPENJAMIN', $penjamin);
		return ($this->db->affected_rows() != 1) ? false : true;
	}

	public function update_ktp($file, $KODE_PERSONAL){
		$ktp = array('KTP' => $file);
		$this->db->where('KODE_PERSONAL', $KODE_PERSONAL);
		$this->db->update('TB_PERSONALDATA', $ktp);
		return ($this->db->affected_rows() != 1) ? false : true;
	}

	public function update_kk($file, $KODE_PERSONAL){
		$kk = array('KK' => $file);
		$this->db->where('KODE_PERSONAL', $KODE_PERSONAL);
		$this->db->update('TB_PERSONALDATA', $kk);
		return ($this->db->affected_rows() != 1) ? false : true;
	}

	public function update_hp($hp, $KODE_PERSONAL){
		$this->db->where('KODE_PERSONAL', $KODE_PERSONAL);
		$this->db->update('TB_PERSONALDATA', $hp);
		return ($this->db->affected_rows() != 1) ? false : true;
	}

	public function update_diterima(){

		$KODE_TRANSAKSI 	= $this->input->post('kode_transaksi');
		$TANGGAL_KEMBALI  = $this->input->post('tgl_kembali');
		$waktu_mulai  		= $this->input->post('waktu_mulai');

		$data = array(
			'STATUS'		=> 5,
		);
		$this->db->where('KODE_TRANSAKSI', $KODE_TRANSAKSI);
		$this->db->update('TB_TRANSAKSI', $data);
		$cek = ($this->db->affected_rows() != 1) ? false : true;
		if ($cek == TRUE) {

			$waktu = array(
				'WAKTU_KEMBALI'		=> $TANGGAL_KEMBALI,
				'WAKTU_SELESAI'		=> $waktu_mulai
			);
			$this->db->where('KODE_TRANSAKSI', $KODE_TRANSAKSI);
			$this->db->update('TB_TRANSAKSIWAKTU', $waktu);
			return ($this->db->affected_rows() != 1) ? false : true;
		}else {
			return FALSE;
		}
	}

	public function send_kembali($KODE_PERSONAL){
		$KODE_TRANSAKSI 		= $this->input->post('KODE_TRANSAKSI');
		$KODE_UNIT 					= $this->input->post('KODE_UNIT');
		$no_resi_kembali		= $this->input->post('no_resi_kembali');
		$nilai							= $this->input->post('rating');
		$komentar						= $this->input->post('komentar');

		$nilai = array(
			'KODE_TRANSAKSI'		=> $KODE_TRANSAKSI,
			'KODE_PERSONAL'			=> $KODE_PERSONAL,
			'KODE_UNIT'					=> $KODE_UNIT,
			'NILAI'							=> $nilai,
			'KOMENTAR'					=> $komentar,
			'tanggal_nilai'			=> date("m, d-Y"),
			'waktu_nilai'				=> date("H:i"),
		);

		$this->db->insert('TB_NILAI', $nilai);
		$cek = ($this->db->affected_rows() != 1) ? false : true;

		$query  	= $this->db->query("SELECT ID_NILAI FROM TB_NILAI WHERE KODE_TRANSAKSI = '$KODE_TRANSAKSI'");
		$get 			= $query->row();
		$id_nilai = $get->ID_NILAI;

		if ($cek == TRUE) {
			$status = array(
				'STATUS'		=> 6,
			);
			$this->db->where('KODE_TRANSAKSI', $KODE_TRANSAKSI);
			$this->db->update('TB_TRANSAKSI', $status);

			$waktu = array(
				'WAKTU_BALIK'		=> date("H:i").", ".date("d-m-Y"),
			);
			$this->db->where('KODE_TRANSAKSI', $KODE_TRANSAKSI);
			$this->db->update('TB_TRANSAKSIWAKTU', $waktu);

			if($this->input->post('tag')){
				$tag 			= $this->input->post('tag', true);

				foreach ($tag as $i => $a) {
					$ket = array(
						'ID_NILAI'  			=> $id_nilai,
						'KODE_TRANSAKSI'  => $KODE_TRANSAKSI,
						'TAG' 						=> isset($tag[$i]) ? $tag[$i] : '',
					);
					$this->db->insert('TB_NILAITAG', $ket);
				}
				return ($this->db->affected_rows() != 1) ? false : true;
			}else {
				return FALSE;
			}
		}else {
			return FALSE;
		}
	}

}
