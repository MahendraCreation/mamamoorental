<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_home extends CI_Model {
	function __construct(){
		parent::__construct();
	}

	public function get_nilai($kode){
		$query = $this->db->query("SELECT COUNT(NILAI) as TOTAL, AVG(NILAI) as RATING FROM TB_NILAI WHERE KODE_UNIT = '$kode'");
		return $query->row();
	}

	public function get_all(){
		$query = $this->db->query("SELECT a.*, a.KODE_UNIT as KODE_UNIT_U, b.*, c.SOURCE, d.GRADE, e.MERK, f.VARIAN, g.TYPE FROM TB_INVENTARISUNIT a LEFT JOIN TB_HARGASEWA b ON a.KODE_UNIT = b.KODE_UNIT LEFT JOIN TB_INVENTARISFOTO c ON a.KODE_UNIT = c.KODE_UNIT LEFT JOIN TB_GRADE d ON a.ID_GRADE = d.ID_GRADE LEFT JOIN TB_MERK e ON a.ID_MERK = e.ID_MERK LEFT JOIN TB_VARIAN f ON a.ID_VARIAN = f.ID_VARIAN LEFT JOIN TB_TYPE g ON a.ID_TYPE = g.ID_TYPE WHERE HAPUS = 0 GROUP BY a.KODE_UNIT");

		if ($query->num_rows() > 0) {
			return $query->result();
		}else{
			return false;
		}
	}

	public function get_laris(){
		$query = $this->db->query("SELECT (SELECT count(KODE_UNIT) as jml FROM TB_TRANSAKSI WHERE STATUS != 99) as laris, a.*, a.KODE_UNIT as KODE_UNIT_U, b.*, c.SOURCE, d.GRADE, e.MERK, f.VARIAN, g.TYPE FROM TB_INVENTARISUNIT a LEFT JOIN TB_HARGASEWA b ON a.KODE_UNIT = b.KODE_UNIT LEFT JOIN TB_INVENTARISFOTO c ON a.KODE_UNIT = c.KODE_UNIT LEFT JOIN TB_GRADE d ON a.ID_GRADE = d.ID_GRADE LEFT JOIN TB_MERK e ON a.ID_MERK = e.ID_MERK LEFT JOIN TB_VARIAN f ON a.ID_VARIAN = f.ID_VARIAN LEFT JOIN TB_TYPE g ON a.ID_TYPE = g.ID_TYPE WHERE HAPUS = 0 AND a.KODE_UNIT NOT IN (SELECT KODE_UNIT FROM TB_TRANSAKSI WHERE STATUS BETWEEN 0 AND 6 OR STATUS = 99) GROUP BY a.KODE_UNIT ORDER BY laris DESC");

		if ($query->num_rows() > 0) {
			return $query->result();
		}else{
			return false;
		}
	}

	public function get_terbaru(){
		$query = $this->db->query("SELECT a.*, a.KODE_UNIT as KODE_UNIT_U, b.*, c.SOURCE, d.GRADE, e.MERK, f.VARIAN, g.TYPE FROM TB_INVENTARISUNIT a LEFT JOIN TB_HARGASEWA b ON a.KODE_UNIT = b.KODE_UNIT LEFT JOIN TB_INVENTARISFOTO c ON a.KODE_UNIT = c.KODE_UNIT LEFT JOIN TB_GRADE d ON a.ID_GRADE = d.ID_GRADE LEFT JOIN TB_MERK e ON a.ID_MERK = e.ID_MERK LEFT JOIN TB_VARIAN f ON a.ID_VARIAN = f.ID_VARIAN LEFT JOIN TB_TYPE g ON a.ID_TYPE = g.ID_TYPE WHERE HAPUS = 0 AND a.KODE_UNIT NOT IN (SELECT KODE_UNIT FROM TB_TRANSAKSI WHERE STATUS BETWEEN 0 AND 6 OR STATUS = 99)  GROUP BY a.KODE_UNIT ORDER BY a.TGL_BEROPERASI DESC");

		if ($query->num_rows() > 0) {
			return $query->result();
		}else{
			return false;
		}
	}
}
