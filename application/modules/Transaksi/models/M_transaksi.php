<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_transaksi extends CI_Model {
	function __construct(){
		parent::__construct();
		date_default_timezone_set("Asia/Jakarta");
	}

	public function cek_code($code){
		$query = $this->db->query("SELECT * FROM TB_VOUCHER WHERE CODE = '$code' AND QUOTA > 0");
		$cek = $query->num_rows();

		if ($cek == 0) {
			return FALSE;
		}else{
			return $query->row();
		}
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

	public function get_jnt($daerah){
		$query = $this->db->query("SELECT * FROM TB_PENGATURAN WHERE length = 1 AND NAMA LIKE 'jnt_%' AND NAMA LIKE '%$daerah'");
		$ongkir = $query->row();

		return $ongkir->VALUE;
	}

	public function bank_ma($find){
		$query = $this->db->query("SELECT * FROM TB_PENGATURAN WHERE length = 2 AND NAMA LIKE 'rekening_%' AND NAMA LIKE '%$find'");
		$ongkir = $query->row();

		return $ongkir->VALUE;
	}

	public function get_mamamoo($a){
		$query = $this->db->query("SELECT * FROM TB_PENGATURAN WHERE length = 1 AND NAMA LIKE 'mamamoo_%' AND NAMA LIKE '%$a'");
		$ongkir = $query->row();

		return $ongkir->VALUE;
	}

	public function get_transaksi($KODE_TRANSAKSI){
		$query = $this->db->query("SELECT * FROM TB_TRANSAKSI WHERE KODE_TRANSAKSI = '$KODE_TRANSAKSI'");
		$cek = $query->num_rows();

		if ($cek > 0) {
			return $query->row();
		}else{
			return false;
		}
	}

	public function pengguna_ver($KODE_PERSONAL){
		$query = $this->db->query("SELECT VERIFIKASI FROM TB_AUTH WHERE KODE_PERSONAL = '$KODE_PERSONAL'");
		$cek = $query->row();

		return $cek->VERIFIKASI;
	}

	public function get_saldo($KODE_PERSONAL){
		$query = $this->db->query("SELECT DEPOSIT FROM TB_DEPOSIT WHERE KODE_PERSONAL = '$KODE_PERSONAL'");
		$cek = $query->row();

		return $cek->VERIFIKASI;
	}

	public function get_pengguna($KODE_PERSONAL){
		$query = $this->db->query("SELECT * FROM TB_PERSONALDATA a LEFT JOIN TB_AUTH b ON a.KODE_PERSONAL = b.KODE_PERSONAL WHERE a.KODE_PERSONAL = '$KODE_PERSONAL'");
		$cek = $query->num_rows();

		if ($cek > 0) {
			return $query->row();
		}else{
			return false;
		}
	}

	public function get_bank($KODE_PERSONAL){
		$query = $this->db->query("SELECT * FROM TB_PERSONALREKENING WHERE KODE_PERSONAL = '$KODE_PERSONAL'");
		return $query->row();
	}

	public function cek_email($email){
		$query = $this->db->query("SELECT * FROM TB_AUTH WHERE email = '$email'");
		$cek = $query->num_rows();

		if ($cek == 0) {
			return false;
		}else{
			return true;
		}
	}

	public function get_token($KODE_TRANSAKSI){
		$query = $this->db->get_where('TB_TRANSAKSITOKEN', array('KODE_TRANSAKSI' => $KODE_TRANSAKSI));
		return $query->row();
	}

	public function get_topup($KODE_DEPOSIT){
		$query = $this->db->query("SELECT * FROM TB_TOPUP WHERE KODE_DEPOSIT = '$KODE_DEPOSIT' AND STATUS = 0");
		return $query->row();
	}

	public function cek_status($KODE_TRANSAKSI){
		$query = $this->db->get_where('TB_TRANSAKSI', array('KODE_TRANSAKSI' => $KODE_TRANSAKSI));
		$status =  $query->row();

		if ($status->STATUS == 1) {
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function cek_kode($KODE_TRANSAKSI){
		$query = $this->db->query("SELECT * FROM TB_TRANSAKSI WHERE KODE_TRANSAKSI = '$KODE_TRANSAKSI'");
		$cek = $query->num_rows();

		if ($cek == 0) {
			return false;
		}else{
			return true;
		}
	}

	public function get_detail($id){
		$query = $this->db->query("SELECT a.*, b.*, c.SOURCE, d.GRADE, e.MERK, f.VARIAN, g.TYPE FROM TB_INVENTARISUNIT a LEFT JOIN TB_HARGASEWA b ON a.KODE_UNIT = b.KODE_UNIT LEFT JOIN TB_INVENTARISFOTO c ON a.KODE_UNIT = c.KODE_UNIT LEFT JOIN TB_GRADE d ON a.ID_GRADE = d.ID_GRADE LEFT JOIN TB_MERK e ON a.ID_MERK = e.ID_MERK LEFT JOIN TB_VARIAN f ON a.ID_VARIAN = f.ID_VARIAN LEFT JOIN TB_TYPE g ON a.ID_TYPE = g.ID_TYPE WHERE a.KODE_UNIT = '$id'");
		$cek = $query->num_rows();

		if ($cek > 0) {
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

	public function send_verifikasi($ID_TOPUP, $KODE_PERSONAL, $file){
		$waktu = date("H:i").", ".date("d/m/Y");
		$status = array('STATUS' => 1, 'WAKTU_PEMBAYARAN' => $waktu);
		$this->db->where('KODE_PERSONAL', $KODE_PERSONAL);
		$this->db->update('TB_TOPUP', $status);

		$data = array(
			'ID_TOPUP'				=> $ID_TOPUP,
			'KODE_PERSONAL' 	=> $KODE_PERSONAL,
			'BUKTI'						=> $file
		);
		$this->db->insert('TB_TOPUPVERIFIKASI', $data);
		return  ($this->db->affected_rows() != 1) ? false : true;
	}

	public function Topup($nominal, $KODE_PERSONAL, $kode_deposit){
		$data = array(
			'KODE_PERSONAL'			=> $KODE_PERSONAL,
			'KODE_DEPOSIT'			=> $kode_deposit,
			'JUMLAH'						=> $nominal,
			'WAKTU_TOPUP'				=> date("d-m-Y"),
			'WAKTU_EXPIRED'			=> time()
		);
		$this->db->insert('TB_TOPUP', $data);
		return  ($this->db->affected_rows() != 1) ? false : true;
	}

	public function del_token($kode){
		$this->db->delete('TB_TOPUP', ['KODE_TRANSAKSI' => $KODE_TRANSAKSI]);
		return  ($this->db->affected_rows() != 1) ? false : true;
	}


	///Sewa


	public function sewa_barang($transaksi, $waktu_pesan, $KODE_UNIT, $ID_VOUCHER){
		$this->db->insert('TB_TRANSAKSI', $transaksi);
		$cek = ($this->db->affected_rows() != 1) ? false : true;
		if ($cek == TRUE) {
			$this->db->insert('TB_TRANSAKSIWAKTU', $waktu_pesan);
			$cek = ($this->db->affected_rows() != 1) ? false : true;
			if ($cek == TRUE) {
				$get_quota 	= $this->db->query("SELECT QUOTA FROM TB_VOUCHER WHERE ID_VOUCHER = '$ID_VOUCHER'");
				$fetch 			= $get_quota->row();
				$quota			= $fetch->QUOTA-1;
				$new_quota = array('QUOTA' => $quota);
				$this->db->where('ID_VOUCHER', $ID_VOUCHER);
				$this->db->update('TB_VOUCHER', $new_quota);

				$data = array('TERSEDIA' => 0);
				$this->db->where('KODE_UNIT', $KODE_UNIT);
				$this->db->update('TB_INVENTARISUNIT', $data);
				return ($this->db->affected_rows() != 1) ? false : true;
			}else {
				return FALSE;
			}
		}else{
			false;
		}
	}

	public function save_token($data){
		$this->db->insert('TB_TRANSAKSITOKEN', $data);
		return  ($this->db->affected_rows() != 1) ? false : true;
	}

	public function del_token_transaksi($email){
		$this->db->delete('TB_TRANSAKSITOKEN',['email' => $email]);
		return  ($this->db->affected_rows() != 1) ? false : true;
	}

	public function bukti_transaksi($bukti, $KODE_TRANSAKSI){
		$data = array(
			'bukti'			=> $bukti,
			'STATUS'		=> 1,
			'tanggal'		=> date("Y-m-d"),
		);
		$this->db->where('KODE_TRANSAKSI', $KODE_TRANSAKSI);
		$this->db->update('TB_TRANSAKSI', $data);
		$cek = ($this->db->affected_rows() != 1) ? false : true;
		if ($cek == TRUE) {
			$waktu = date("H:i").", ".date("d/m/Y");
			$waktu_pesan = array('WAKTU_PEMBAYARAN' => $waktu);
			$this->db->where('KODE_TRANSAKSI', $KODE_TRANSAKSI);
			$this->db->update('TB_TRANSAKSIWAKTU', $waktu_pesan);
			return ($this->db->affected_rows() != 1) ? false : true;
		}else{
			false;
		}
	}

}?>
