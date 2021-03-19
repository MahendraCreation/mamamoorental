<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_login extends CI_Model {
	function __construct(){
		parent::__construct();
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

	public function auth_pengguna($email){
		$query = $this->db->query("SELECT a.PASSWORD, a.KODE_PERSONAL, a.ROLE, b.NAMA FROM TB_AUTH a LEFT JOIN TB_PERSONALDATA b ON a.KODE_PERSONAL = b.KODE_PERSONAL WHERE a.email = '$email'");
		$cek = $query->num_rows();

		if ($cek > 0) {
			return $query->row();
		}else{
			return false;
		}
	}

	public function get_pengguna($email){
		$query = $this->db->query("SELECT a.KODE_PERSONAL, b.NAMA FROM TB_AUTH a LEFT JOIN TB_PERSONALDATA b ON a.KODE_PERSONAL = b.KODE_PERSONAL WHERE a.email = '$email'");
		$cek = $query->num_rows();

		if ($cek > 0) {
			return $query->row();
		}else{
			return false;
		}
	}

	public function cek_email($email){
		$query = $this->db->query("SELECT * FROM TB_AUTH WHERE email = '$email'");
		$cek = $query->num_rows();

		if ($cek == 0) {
			return true;
		}else{
			return false;
		}
	}

	public function cek_kode($KODE_PERSONAL){
		$query = $this->db->query("SELECT * FROM TB_AUTH WHERE KODE_PERSONAL = '$KODE_PERSONAL'");
		return $query->num_rows();

	}

	public function cek_deposit($KODE_DEPOSIT){
		$query = $this->db->query("SELECT * FROM TB_DEPOSIT WHERE KODE_DEPOSIT = '$KODE_DEPOSIT'");
		return $query->num_rows();

		// if ($cek == 0) {
		// 	return false;
		// }else{
		// 	return true;
		// }
	}

	public function cek_status($email){
		$query = $this->db->get_where('TB_AUTH', array('email' => $email));
		$status =  $query->row();

		if ($status->ACTIVE == 1) {
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function get_token($email){
		$query = $this->db->get_where('TB_TOKEN', array('email' => $email));
		return $query->row();
	}

	public function update_personal($personal, $bank, $KODE_PERSONAL){
		$this->db->where('KODE_PERSONAL', $KODE_PERSONAL);
		$this->db->update('TB_PERSONALDATA', $personal);
		$cek =  ($this->db->affected_rows() != 1) ? false : true;
		if ($cek == true) {
			$query 	= $this->db->get_where('TB_PERSONALREKENING', array('KODE_PERSONAL' => $KODE_PERSONAL));
			$status =  $query->num_rows();
			if ($status == 0) {
				$this->db->insert('TB_PERSONALREKENING', $bank);
				$last = ($this->db->affected_rows() != 1) ? false : true;
			}else{
				$this->db->where('KODE_PERSONAL', $KODE_PERSONAL);
				$this->db->update('TB_PERSONALREKENING', $bank);
				$last = ($this->db->affected_rows() != 1) ? false : true;
			}
			if ($last == true) {
				$this->db->where('KODE_PERSONAL', $KODE_PERSONAL);
				$this->db->update('TB_AUTH', array('PROFILE' => TRUE));
				return ($this->db->affected_rows() != 1) ? false : true;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}

	public function daftar_pengguna($auth, $data, $KODE_DEPOSIT, $KODE_PERSONAL){
		$this->db->insert('TB_AUTH', $auth);
		$cek =  ($this->db->affected_rows() != 1) ? false : true;
		if ($cek == true) {
			$this->db->insert('TB_PERSONALDATA', $data);
			$personal = ($this->db->affected_rows() != 1) ? false : true;
			if ($personal == true) {
				$depo = array('KODE_DEPOSIT' => $KODE_DEPOSIT, 'KODE_PERSONAL' => $KODE_PERSONAL);
				$this->db->insert('TB_DEPOSIT', $depo);
				return ($this->db->affected_rows() != 1) ? false : true;
			}
		}else{
			return false;
		}
	}

	public function activate($email){
		$this->db->where('EMAIL', $email);
		$result = $this->db->update('TB_AUTH', ['ACTIVE' => '1']);

		$this->db->delete('TB_TOKEN', ['email' => $email]);

		return $result;
	}

	public function save_token($data){
		$this->db->insert('TB_TOKEN', $data);
		return  ($this->db->affected_rows() != 1) ? false : true;
	}

	public function del_token($email){
		$this->db->delete('TB_TOKEN',['email' => $email]);
		return  ($this->db->affected_rows() != 1) ? false : true;
	}

	public function del_account($email){
		$this->db->delete('TB_AUTH',['email' => $email]);
		return  ($this->db->affected_rows() != 1) ? false : true;
	}

}
