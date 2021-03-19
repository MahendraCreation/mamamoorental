<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_produk extends CI_Model {
	function __construct(){
		parent::__construct();
	}

	public function get_all($delimiter){
		$algo = "";
		if ($delimiter == "all") {
			$algo = "WHERE HAPUS = 0 GROUP BY a.KODE_UNIT";
		}elseif ($delimiter == "Terbaru" || $delimiter == "terbaru") {
			$algo = "WHERE HAPUS = 0 GROUP BY a.KODE_UNIT ORDER BY a.TGL_BEROPERASI DESC";
		}elseif ($delimiter == "pompa") {
			$algo = "WHERE a.KATEGORI = 2 AND HAPUS = 0  GROUP BY a.KODE_UNIT";
		}elseif ($delimiter == "uv") {
			$algo = "WHERE a.KATEGORI = 3 AND HAPUS = 0  GROUP BY a.KODE_UNIT";
		}elseif ($delimiter == "PompaSparepart") {
			$algo = "WHERE a.KATEGORI = 3 || a.KATEGORI = 2 AND HAPUS = 0  GROUP BY a.KODE_UNIT";
		}elseif ($delimiter == "hospital") {
			$algo = "WHERE a.ID_GRADE = 1 AND HAPUS = 0  GROUP BY a.KODE_UNIT";
		}elseif ($delimiter == "portable") {
			$algo = "WHERE a.ID_GRADE = 2 AND HAPUS = 0  GROUP BY a.KODE_UNIT";
		}elseif ($delimiter == "disewa") {
			$algo = "WHERE a.TERSEDIA = 0 AND HAPUS = 0  GROUP BY a.KODE_UNIT";
		}else{
			$algo = "WHERE a.NAMA_PRODUK LIKE '%$delimiter%' AND HAPUS = 0  GROUP BY a.KODE_UNIT";
		}

		$query = $this->db->query("SELECT a.*, a.KODE_UNIT as KODE_UNIT_U, b.*, c.SOURCE, d.GRADE, e.MERK, f.VARIAN, g.TYPE FROM TB_INVENTARISUNIT a LEFT JOIN TB_HARGASEWA b ON a.KODE_UNIT = b.KODE_UNIT LEFT JOIN TB_INVENTARISFOTO c ON a.KODE_UNIT = c.KODE_UNIT LEFT JOIN TB_GRADE d ON a.ID_GRADE = d.ID_GRADE LEFT JOIN TB_MERK e ON a.ID_MERK = e.ID_MERK LEFT JOIN TB_VARIAN f ON a.ID_VARIAN = f.ID_VARIAN LEFT JOIN TB_TYPE g ON a.ID_TYPE = g.ID_TYPE {$algo}");

		if ($query->num_rows() > 0) {
			return $query->result();
		}else{
			return false;
		}
	}

	public function get_produk($delimiter){
		$query = $this->db->query("SELECT * FROM TB_INVENTARISUNIT WHERE HAPUS = 0");
		$cek = $query->num_rows();

		if ($cek > 0) {
			return $query->result();
		}else{
			return false;
		}
	}

	public function get_ongkir_jnt(){
		$query = $this->db->query("SELECT * FROM TB_PENGATURAN WHERE length = 1 AND NAMA LIKE 'jnt_%'");
		$cek = $query->num_rows();

		if ($cek > 0) {
			return $query->result();
		}else{
			return false;
		}
	}

	public function get_ongkir_mamamoo(){
		$query = $this->db->query("SELECT * FROM TB_PENGATURAN WHERE length = 1 AND NAMA LIKE 'mamamoo_%'");
		$cek = $query->num_rows();

		if ($cek > 0) {
			return $query->result();
		}else{
			return false;
		}
	}

	public function get_detail($id){
		$query = $this->db->query("SELECT a.*, a.KODE_UNIT as KODE_UNIT_U, b.*, c.SOURCE, d.GRADE, e.MERK, f.VARIAN, g.TYPE FROM TB_INVENTARISUNIT a LEFT JOIN TB_HARGASEWA b ON a.KODE_UNIT = b.KODE_UNIT LEFT JOIN TB_INVENTARISFOTO c ON a.KODE_UNIT = c.KODE_UNIT LEFT JOIN TB_GRADE d ON a.ID_GRADE = d.ID_GRADE LEFT JOIN TB_MERK e ON a.ID_MERK = e.ID_MERK LEFT JOIN TB_VARIAN f ON a.ID_VARIAN = f.ID_VARIAN LEFT JOIN TB_TYPE g ON a.ID_TYPE = g.ID_TYPE WHERE a.KODE_UNIT = '$id' GROUP BY a.KODE_UNIT");
		$cek = $query->num_rows();

		if ($cek > 0) {
			return $query->row();
		}else{
			return false;
		}
	}

	public function get_review($id){
		$query = $this->db->query("SELECT * FROM TB_NILAI a LEFT JOIN TB_PERSONALDATA b ON a.KODE_PERSONAL = b.KODE_PERSONAL WHERE a.KODE_UNIT = '$id' ORDER BY a.ID_NILAI DESC");
		$cek = $query->num_rows();

		if ($cek > 0) {
			return $query->result();
		}else{
			return false;
		}
	}


	public function progress_rating($id){
		$query = $this->db->query("SELECT COUNT(NILAI) as TOTAL FROM TB_NILAI WHERE NILAI = '$id' ");
		return $query->row()->TOTAL;
	}
	public function get_rating($id){
		$query = $this->db->query("SELECT AVG(NILAI) as RATING, COUNT(NILAI) as TOTAL FROM TB_NILAI WHERE KODE_UNIT = '$id' ");
		return $query->row();
	}

	public function get_review_tag($id){
		$query = $this->db->query("SELECT * FROM TB_NILAITAG WHERE ID_NILAI = '$id'");
		$cek = $query->num_rows();

		if ($cek > 0) {
			return $query->result();
		}else{
			return false;
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

	public function get_knowledge($id){
		$query = $this->db->query("SELECT * FROM TB_INVENTARISKNOWLEDGE a LEFT JOIN TB_INVENTARISPOWER b ON a.ID_KNOWLEDGE = b.ID_KNOWLEDGE LEFT JOIN TB_INVENTARISFASE c ON a.ID_KNOWLEDGE = c.ID_KNOWLEDGE WHERE a.KODE_UNIT = '$id' GROUP BY a.KODE_UNIT");
		$cek = $query->num_rows();

		if ($cek > 0) {
			return $query->row();
		}else{
			return false;
		}
	}

}
