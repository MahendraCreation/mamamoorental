<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pengaturan extends CI_Model {
	function __construct(){
		parent::__construct();
		date_default_timezone_set("Asia/Jakarta");
	}

	// BANK

	public function get_idbank($identifier){
		$query = $this->db->query("SELECT ID_PENGATURAN FROM TB_PENGATURAN WHERE NAMA LIKE '%$identifier%'");
		if ($query->num_rows() > 0) {
			$data = $query->row();
			return $data->ID_PENGATURAN;
		}else{
			return false;
		}
	}

	public function get_bank($identifier){
		$query = $this->db->query("SELECT VALUE FROM TB_PENGATURAN WHERE NAMA LIKE '%$identifier%'");
		if ($query->num_rows() > 0) {
			$data = $query->row();
			return $data->VALUE;
		}else{
			return false;
		}
	}

	public function UbahBank(){

		if($this->input->post('id')){
			$identifier	=	$this->input->post('id', true);
			$value 			= $this->input->post('value', true);

			foreach ($identifier as $i => $a) {
				$data = array(
					'VALUE' 						=> isset($value[$i]) ? $value[$i] : '',
				);
				$this->db->where('ID_PENGATURAN', isset($identifier[$i]) ? $identifier[$i] : '');
				$this->db->update('TB_PENGATURAN', $data);
			}
			return TRUE;
		}else {
			return FALSE;
		}
	}

	// VOUCHER

	public function get_voucher_ex(){
		$now = date("d-m-Y");
		$query = $this->db->query("SELECT * FROM TB_VOUCHER WHERE $now > TANGGAL_BERAKHIR");
		return $query->result();
	}

	public function get_voucher(){
		$now = date("d-m-Y");
		$query = $this->db->query("SELECT * FROM TB_VOUCHER WHERE $now <= TANGGAL_BERAKHIR");
		return $query->result();
	}

	public function cek_code($code){
		$query = $this->db->query("SELECT * FROM TB_VOUCHER WHERE CODE = '$code'");
		$cek = $query->num_rows();

		if ($cek == 0) {
			return false;
		}else{
			return true;
		}
	}

	public function TambahVoucher(){
		$NAMA			=	$this->input->post('nama');
		$CODE			=	$this->input->post('code');
		$TANGGAL_MULAI			=	$this->input->post('mulai');
		$TANGGAL_BERAKHIR 	= $this->input->post('berakhir');
		$POTONGAN 					= $this->input->post('potongan');
		$QUOTA		 					= $this->input->post('quota');

		$date 							= str_replace('/', '-', $TANGGAL_MULAI);
		$TANGGAL_MULAI 			= date('d-m-Y', strtotime($date));

		$date 							= str_replace('/', '-', $TANGGAL_BERAKHIR);
		$TANGGAL_BERAKHIR 	= date('d-m-Y', strtotime($date));

		$data = array('NAMA' => $NAMA, 'CODE' => $CODE, 'TANGGAL_MULAI' => $TANGGAL_MULAI, 'TANGGAL_BERAKHIR' => $TANGGAL_BERAKHIR, 'POTONGAN' => $POTONGAN, 'QUOTA' => $QUOTA);
		$this->db->insert('TB_VOUCHER', $data);
		return ($this->db->affected_rows() != 1) ? false : true;
	}

	public function hapus_voucher(){
		$ID_VOUCHER  =	$this->input->post('id_voucher');

		$this->db->where('ID_VOUCHER', $ID_VOUCHER);
		$this->db->delete('TB_VOUCHER');
		return ($this->db->affected_rows() != 1) ? false : true;
	}

	// ONGKIR & DENDA

	public function get_ongkir($identifier){
		$query = $this->db->query("SELECT VALUE FROM TB_PENGATURAN WHERE NAMA LIKE '%$identifier%'");
		if ($query->num_rows() > 0) {
			$data = $query->row();
			return $data->VALUE;
		}else{
			return false;
		}
	}

	public function get_idongkir($identifier){
		$query = $this->db->query("SELECT ID_PENGATURAN FROM TB_PENGATURAN WHERE NAMA LIKE '%$identifier%'");
		if ($query->num_rows() > 0) {
			$data = $query->row();
			return $data->ID_PENGATURAN;
		}else{
			return false;
		}
	}

	public function UbahOngkir(){

		if($this->input->post('id')){
			$identifier	=	$this->input->post('id', true);
			$value 			= $this->input->post('value', true);

			foreach ($identifier as $i => $a) {
				$data = array(
					'VALUE' 						=> isset($value[$i]) ? $value[$i] : '',
				);
				$this->db->where('ID_PENGATURAN', isset($identifier[$i]) ? $identifier[$i] : '');
				$this->db->update('TB_PENGATURAN', $data);
			}
			return TRUE;
		}else {
			return FALSE;
		}
	}

	public function UbahDenda(){
		$value = $this->input->post('value');

		$data = array('VALUE' => $value);
		$this->db->where('NAMA', 'denda_sewa');
		$this->db->update('TB_PENGATURAN', $data);
		return ($this->db->affected_rows() != 1) ? false : true;
	}

  function get_wa(){
    $sql  = $this->db->query("SELECT VALUE FROM TB_PENGATURAN WHERE NAMA = 'm_wa'");
    $data = $sql->row();
    return $data->VALUE;
  }

  function get_ig(){
    $sql  = $this->db->query("SELECT VALUE FROM TB_PENGATURAN WHERE NAMA = 'm_instagram'");
    $data = $sql->row();
    return $data->VALUE;
  }

	public function UbahWa(){
		$value = $this->input->post('value');

		$data = array('VALUE' => $value);
		$this->db->where('NAMA', 'm_wa');
		$this->db->update('TB_PENGATURAN', $data);
		return ($this->db->affected_rows() != 1) ? false : true;
	}

	public function UbahIg(){
		$value = $this->input->post('value');

		$data = array('VALUE' => $value);
		$this->db->where('NAMA', 'm_instagram');
		$this->db->update('TB_PENGATURAN', $data);
		return ($this->db->affected_rows() != 1) ? false : true;
	}

	// BRAND

	public function get_brand(){
		$query = $this->db->query("SELECT * FROM TB_MERK ORDER BY ID_MERK DESC");
		if ($query->num_rows() > 0) {
			return $query->result();
		}else{
			return false;
		}
	}

	public function brand_counter($id){
		$query = $this->db->query("SELECT COUNT(*) as COUNTER FROM TB_MERK WHERE ID_MERK = '$id'");
		if ($query->num_rows() > 0) {
			$data = $query->row();
			return $data->COUNTER;
		}else{
			return false;
		}
	}

	public function TambahBrand(){
		$query 		= $this->db->query("SELECT * FROM TB_MERK");
		$ID_MERK  = $query->num_rows()+1;

		$MERK			=	$this->input->post('brand');
		$KODE			=	$this->input->post('kode');
		$KET 			= $this->input->post('keterangan');

		$data = array('ID_MERK' => $ID_MERK, 'MERK' => $MERK, 'KODE' => $KODE, 'KETERANGAN' => $KET);
		$this->db->insert('TB_MERK', $data);
		return ($this->db->affected_rows() != 1) ? false : true;
	}

	public function ubah_brand(){
		$ID_MERK  =	$this->input->post('id_brand');

		$MERK			=	$this->input->post('brand');
		$KET 			= $this->input->post('keterangan');

		$data = array('MERK' => $MERK, 'KETERANGAN' => $KET);
		$this->db->where('ID_MERK', $ID_MERK);
		$this->db->update('TB_MERK', $data);
		return ($this->db->affected_rows() != 1) ? false : true;
	}

	public function hapus_brand(){
		$ID_MERK  =	$this->input->post('id_brand');

		$this->db->where('ID_MERK', $ID_MERK);
		$this->db->delete('TB_MERK');
		return ($this->db->affected_rows() != 1) ? false : true;
	}

	// SERIES

	public function get_series(){
		$query = $this->db->query("SELECT * FROM TB_TYPE ORDER BY ID_TYPE DESC");
		if ($query->num_rows() > 0) {
			return $query->result();
		}else{
			return false;
		}
	}

	public function series_counter($id){
		$query = $this->db->query("SELECT COUNT(*) as COUNTER FROM TB_INVENTARISUNIT WHERE ID_TYPE = '$id'");
		if ($query->num_rows() > 0) {
			$data = $query->row();
			return $data->COUNTER;
		}else{
			return false;
		}
	}

	public function TambahSeries(){
		$TYPE     = $this->input->post('series');
		$KODE			=	$this->input->post('kode');
		$KET      = $this->input->post('keterangan');

		$query = $this->db->query("SELECT * FROM TB_TYPE");

		$new_id = $query->num_rows()+1;

		$data = array('ID_TYPE' => $new_id, 'TYPE' => $TYPE, 'KODE' => $KODE, 'KETERANGAN' => $KET);
		$this->db->insert('TB_TYPE', $data);
		return ($this->db->affected_rows() != 1) ? false : true;
	}

	public function ubah_series(){
		$ID_TYPE  = $this->input->post('id_type');

		$TYPE     = $this->input->post('series');
		$KET      = $this->input->post('keterangan');

		$data = array('TYPE' => $TYPE, 'KETERANGAN' => $KET);
		$this->db->where('ID_TYPE', $ID_TYPE);
		$this->db->update('TB_TYPE', $data);
		return ($this->db->affected_rows() != 1) ? false : true;
	}

	public function hapus_series(){
		$ID_TYPE  = $this->input->post('id_type');

		$this->db->where('ID_TYPE', $ID_TYPE);
		$this->db->delete('TB_TYPE');
		return ($this->db->affected_rows() != 1) ? false : true;
	}

	// VARIAN

	public function get_varian(){
		$query = $this->db->query("SELECT * FROM TB_VARIAN ORDER BY ID_VARIAN DESC");
		if ($query->num_rows() > 0) {
			return $query->result();
		}else{
			return false;
		}
	}

	public function varian_counter($id){
		$query = $this->db->query("SELECT COUNT(*) as COUNTER FROM TB_INVENTARISUNIT WHERE ID_VARIAN = '$id'");
		if ($query->num_rows() > 0) {
			$data = $query->row();
			return $data->COUNTER;
		}else{
			return false;
		}
	}

	public function TambahVarian(){
		$VARIAN     = $this->input->post('varian');
		$KET      = $this->input->post('keterangan');

		$query = $this->db->query("SELECT * FROM TB_TYPE");

		$new_id = $query->num_rows()+1;

		$data = array('ID_VARIAN' => $new_id, 'VARIAN' => $VARIAN, 'KETERANGAN' => $KET);
		$this->db->insert('TB_VARIAN', $data);
		return ($this->db->affected_rows() != 1) ? false : true;
	}

	public function ubah_varian(){
		$ID_VARIAN  = $this->input->post('id_varian');

		$VARIAN     = $this->input->post('varian');
		$KET      = $this->input->post('keterangan');

		$data = array('VARIAN' => $VARIAN, 'KETERANGAN' => $KET);
		$this->db->where('ID_VARIAN', $ID_VARIAN);
		$this->db->update('TB_VARIAN', $data);
		return ($this->db->affected_rows() != 1) ? false : true;
	}

	public function hapus_varian(){
		$ID_VARIAN  = $this->input->post('id_varian');

		$this->db->where('ID_VARIAN', $ID_VARIAN);
		$this->db->delete('TB_VARIAN');
		return ($this->db->affected_rows() != 1) ? false : true;
	}

	// GRADE

	public function get_grade(){
		$query = $this->db->query("SELECT * FROM TB_GRADE");
		if ($query->num_rows() > 0) {
			return $query->result();
		}else{
			return false;
		}
	}

	public function grade_counter($id){
		$query = $this->db->query("SELECT COUNT(*) as COUNTER FROM TB_INVENTARISUNIT WHERE ID_GRADE = '$id'");
		if ($query->num_rows() > 0) {
			$data = $query->row();
			return $data->COUNTER;
		}else{
			return false;
		}
	}

	public function TambahGrade(){
		$query 		= $this->db->query("SELECT * FROM TB_GRADE");
		$ID_GRADE  = $query->num_rows()+1;

		$GRADE     = $this->input->post('grade');
		$KET      = $this->input->post('keterangan');

		$data = array('ID_GRADE' => $ID_GRADE, 'GRADE' => $GRADE, 'KETERANGAN' => $KET);
		$this->db->insert('TB_GRADE', $data);
		return ($this->db->affected_rows() != 1) ? false : true;
	}

	public function ubah_grade(){
		$ID_GRADE  = $this->input->post('id_grade');

		$GRADE     = $this->input->post('grade');
		$KET      = $this->input->post('keterangan');

		$data = array('GRADE' => $GRADE, 'KETERANGAN' => $KET);
		$this->db->where('ID_GRADE', $ID_GRADE);
		$this->db->update('TB_GRADE', $data);
		return ($this->db->affected_rows() != 1) ? false : true;
	}

	public function hapus_grade(){
		$ID_GRADE  = $this->input->post('id_grade');

		$this->db->where('ID_GRADE', $ID_GRADE);
		$this->db->delete('TB_GRADE');
		return ($this->db->affected_rows() != 1) ? false : true;
	}

	// KATEGORI

	public function get_kategori(){
		$query = $this->db->query("SELECT * FROM TB_KATEGORI ORDER BY ID_KATEGORI DESC");
		if ($query->num_rows() > 0) {
			return $query->result();
		}else{
			return false;
		}
	}

	public function kat_counter($id){
		$query = $this->db->query("SELECT COUNT(*) as COUNTER FROM TB_INVENTARISUNIT WHERE KATEGORI = '$id'");
		if ($query->num_rows() > 0) {
			$data = $query->row();
			return $data->COUNTER;
		}else{
			return false;
		}
	}

	public function TambahKategori(){
		$KATEGORI     = $this->input->post('kategori');
		$KET			    = $this->input->post('keterangan');

		$data = array('KATEGORI' => $KATEGORI, 'KETERANGAN' => $KET);
		$this->db->insert('TB_KATEGORI', $data);
		return ($this->db->affected_rows() != 1) ? false : true;
	}

	public function ubah_kategori(){
		$ID_KATEGORI  = $this->input->post('id_kategori');

		$KATEGORI     = $this->input->post('kategori');
		$KET			    = $this->input->post('keterangan');

		$data = array('KATEGORI' => $KATEGORI, 'KETERANGAN' => $KET);
		$this->db->where('ID_KATEGORI', $ID_KATEGORI);
		$this->db->update('TB_KATEGORI', $data);
		return ($this->db->affected_rows() != 1) ? false : true;
	}

	public function hapus_kategori(){
		$ID_KATEGORI  = $this->input->post('id_kategori');

		$this->db->where('ID_KATEGORI', $ID_KATEGORI);
		$this->db->delete('TB_KATEGORI');
		return ($this->db->affected_rows() != 1) ? false : true;
	}



}
