<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_excel extends CI_Model {
	function __construct(){
		parent::__construct();
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

	public function riwayat_filter($mulai, $berakhir){
		$query = $this->db->query("SELECT * FROM TB_TRANSAKSI a LEFT JOIN TB_PERSONALDATA b ON a.KODE_PERSONAL = b.KODE_PERSONAL LEFT JOIN TB_INVENTARISUNIT c ON a.KODE_UNIT = c.KODE_UNIT LEFT JOIN TB_TRANSAKSIWAKTU d ON a.KODE_TRANSAKSI = d.KODE_TRANSAKSI WHERE a.STATUS > 0 AND a.STATUS != 4 AND a.tanggal BETWEEN '$mulai' AND '$berakhir' ORDER BY a.log_time DESC");
		$cek  = $query->num_rows();
		if ($cek > 0) {
			return $query->result();
		}else{
			return false;
		}
	}

	public function riwayat_all(){
		$query = $this->db->query("SELECT * FROM TB_TRANSAKSI a LEFT JOIN TB_PERSONALDATA b ON a.KODE_PERSONAL = b.KODE_PERSONAL LEFT JOIN TB_INVENTARISUNIT c ON a.KODE_UNIT = c.KODE_UNIT LEFT JOIN TB_TRANSAKSIWAKTU d ON a.KODE_TRANSAKSI = d.KODE_TRANSAKSI WHERE a.STATUS > 0 AND a.STATUS != 4 ORDER BY a.log_time DESC");
		$cek  = $query->num_rows();
		if ($cek > 0) {
			return $query->result();
		}else{
			return false;
		}
	}

	public function deposit_filter($mulai, $berakhir){
		$query = $this->db->query("SELECT * FROM TB_TRANSAKSI a LEFT JOIN TB_PERSONALDATA b ON a.KODE_PERSONAL = b.KODE_PERSONAL LEFT JOIN TB_INVENTARISUNIT c ON a.KODE_UNIT = c.KODE_UNIT LEFT JOIN TB_TRANSAKSIWAKTU d ON a.KODE_TRANSAKSI = d.KODE_TRANSAKSI WHERE a.STATUS > 0 AND a.STATUS != 4 AND a.tanggal BETWEEN '$mulai' AND '$berakhir' ORDER BY a.log_time DESC");
		$cek  = $query->num_rows();
		if ($cek > 0) {
			return $query->result();
		}else{
			return false;
		}
	}

	public function deposit_all(){
		$query = $this->db->query("SELECT * FROM TB_TRANSAKSI a LEFT JOIN TB_PERSONALDATA b ON a.KODE_PERSONAL = b.KODE_PERSONAL LEFT JOIN TB_INVENTARISUNIT c ON a.KODE_UNIT = c.KODE_UNIT LEFT JOIN TB_TRANSAKSIWAKTU d ON a.KODE_TRANSAKSI = d.KODE_TRANSAKSI WHERE a.STATUS > 0 AND a.STATUS != 4 ORDER BY a.log_time DESC");
		$cek  = $query->num_rows();
		if ($cek > 0) {
			return $query->result();
		}else{
			return false;
		}
	}

}
