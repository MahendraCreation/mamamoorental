<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_admin extends CI_Model {
	function __construct(){
		parent::__construct();
		date_default_timezone_set("Asia/Jakarta");
	}

	function count_sewa($status){
		$sql  = $this->db->query("SELECT KODE_TRANSAKSI FROM TB_TRANSAKSI WHERE STATUS = '$status'");
		return $sql->num_rows();
	}

	public function get_produk_data($id){
		$query = $this->db->query("SELECT a.*, a.KODE_UNIT as KODE_UNIT_U, a.KETERANGAN as KET, b.*, c.*, d.*, e.*, f.*, g.*, h.*, i.*, j.*, k.* FROM TB_INVENTARISUNIT a LEFT JOIN TB_HARGASEWA b ON a.KODE_UNIT = b.KODE_UNIT LEFT JOIN TB_INVENTARISFOTO c ON a.KODE_UNIT = c.KODE_UNIT LEFT JOIN TB_GRADE d ON a.ID_GRADE = d.ID_GRADE LEFT JOIN TB_MERK e ON a.ID_MERK = e.ID_MERK LEFT JOIN TB_VARIAN f ON a.ID_VARIAN = f.ID_VARIAN LEFT JOIN TB_TYPE g ON a.ID_TYPE = g.ID_TYPE LEFT JOIN TB_INVENTARISKNOWLEDGE h ON a.KODE_UNIT = h.KODE_UNIT LEFT JOIN TB_INVENTARISFASE i ON h.ID_KNOWLEDGE = i.ID_KNOWLEDGE LEFT JOIN TB_INVENTARISPOWER j ON h.ID_KNOWLEDGE = j.ID_KNOWLEDGE LEFT JOIN TB_KATEGORI k ON a.KATEGORI = k.ID_KATEGORI WHERE a.KODE_UNIT = '$id'");
		$cek = $query->num_rows();

		if ($cek > 0) {
			return $query->row();
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

	public function bul_pengguna(){
		$query = $this->db->query("SELECT COUNT(*) as jml FROM TB_AUTH WHERE ROLE = 0 AND ACTIVE > 0 AND PROFILE > 0");
		$data  = $query->row();
		return $data->jml;
	}

	public function bul_produk(){
		$query = $this->db->query("SELECT COUNT(*) as jml FROM TB_INVENTARISUNIT");
		$data  = $query->row();
		return $data->jml;
	}

	public function bul_transaksi(){
		$bulan = date("m");
		$query = $this->db->query("SELECT COUNT(*) as jml FROM TB_TRANSAKSI WHERE tanggal LIKE '%-$bulan-%'");
		$data  = $query->row();
		return $data->jml;
	}

	public function bul_pendapatan(){
		$bulan = date("m");
		$query = $this->db->query("SELECT SUM(TOTAL) as jml, SUM(BIAYA_PERPANJANGAN) as jml_perpanjangan FROM TB_TRANSAKSI WHERE tanggal LIKE '%-$bulan-%'");
		$data  = $query->row();
		return $data->jml+$data->jml_perpanjangan;
	}

	public function cek_produk($KODE_UNIT){
		$query = $this->db->query("SELECT * FROM TB_TRANSAKSI WHERE KODE_UNIT = '$KODE_UNIT' AND STATUS < 6");
		return $query->num_rows();
	}

	public function get_jmlpr($code){
		$query = $this->db->query("SELECT * FROM TB_INVENTARISUNIT WHERE KODE_UNIT LIKE '$code%'");
		return $query->num_rows()+1;
	}

	public function get_merk(){ //BRAND
		$query = $this->db->query("SELECT * FROM TB_MERK");
		return $query->result();
	}

	public function get_type(){ // SERIES
		$query = $this->db->query("SELECT * FROM TB_TYPE");
		return $query->result();
	}

	public function get_varian(){
		$query = $this->db->query("SELECT * FROM TB_VARIAN");
		return $query->result();
	}

	public function get_grade(){
		$query = $this->db->query("SELECT * FROM TB_GRADE");
		return $query->result();
	}

	public function get_kategori(){
		$query = $this->db->query("SELECT * FROM TB_KATEGORI ORDER BY KATEGORI ASC");
		return $query->result();
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

	public function total_pesan(){
		$query = $this->db->query("SELECT COUNT(*) as jml FROM TB_INVENTARISUNIT a LEFT JOIN TB_TRANSAKSI b ON a.KODE_UNIT = b.KODE_UNIT WHERE b.STATUS BETWEEN 1 AND 6");
		$data  = $query->row();
		return $data->jml;
	}

	public function pesan_blverif(){
		$query = $this->db->query("SELECT COUNT(*) as jml FROM TB_INVENTARISUNIT a LEFT JOIN TB_TRANSAKSI b ON a.KODE_UNIT = b.KODE_UNIT WHERE b.STATUS = 1");
		$data  = $query->row();
		return $data->jml;
	}

	public function proses_dikemas(){
		$query = $this->db->query("SELECT COUNT(*) as jml FROM TB_INVENTARISUNIT a LEFT JOIN TB_TRANSAKSI b ON a.KODE_UNIT = b.KODE_UNIT WHERE b.STATUS = 3");
		$data  = $query->row();
		return $data->jml;
	}

	public function proses_kirim(){
		$query = $this->db->query("SELECT COUNT(*) as jml FROM TB_INVENTARISUNIT a LEFT JOIN TB_TRANSAKSI b ON a.KODE_UNIT = b.KODE_UNIT WHERE b.STATUS = 4");
		$data  = $query->row();
		return $data->jml;
	}

	public function jml_pengiriman(){
		$query = $this->db->query("SELECT COUNT(*) as jml FROM TB_INVENTARISUNIT a LEFT JOIN TB_TRANSAKSI b ON a.KODE_UNIT = b.KODE_UNIT WHERE b.STATUS = 4");
		$data  = $query->row();
		return $data->jml;
	}

	public function jml_disewa(){
		$query = $this->db->query("SELECT COUNT(*) as jml FROM TB_INVENTARISUNIT a LEFT JOIN TB_TRANSAKSI b ON a.KODE_UNIT = b.KODE_UNIT WHERE b.STATUS = 5");
		$data  = $query->row();
		return $data->jml;
	}

	// public function get_pesan_pengirim($status){
	// 	$query = $this->db->query("SELECT COUNT(*) as jml FROM TB_INVENTARISUNIT a LEFT JOIN TB_TRANSAKSI b ON a.KODE_UNIT = b.KODE_UNIT WHERE b.STATUS = '$status'");
	// 	$data  = $query->row();
	// 	return $data->jml;
	// }

	public function jml_pengguna(){
		$query = $this->db->query("SELECT COUNT(*) as jml FROM TB_AUTH WHERE ROLE = 0 AND ACTIVE > 0 AND PROFILE > 0");
		$data  = $query->row();
		return $data->jml;
	}

	public function pengguna_verif(){
		$query = $this->db->query("SELECT COUNT(*) as jml FROM TB_AUTH WHERE ROLE = 0 AND VERIFIKASI > 0 AND ACTIVE > 0 AND PROFILE > 0");
		$data  = $query->row();
		return $data->jml;
	}

	public function pengguna_belum(){
		$query = $this->db->query("SELECT COUNT(*) as jml FROM TB_AUTH WHERE ROLE = 0 AND VERIFIKASI = 0 AND ACTIVE > 0 AND PROFILE > 0");
		$data  = $query->row();
		return $data->jml;
	}

	public function jml_produk(){
		$query = $this->db->query("SELECT COUNT(*) as jml FROM TB_INVENTARISUNIT");
		$data  = $query->row();
		return $data->jml;
	}

	public function jml_transaksi(){
		$query = $this->db->query("SELECT COUNT(*) as jml FROM TB_TRANSAKSI WHERE STATUS BETWEEN 1 AND 7");
		$data  = $query->row();
		return $data->jml;
	}

	public function jml_pendapatan(){
		$query = $this->db->query("SELECT SUM(TOTAL) as jml, SUM(BIAYA_PERPANJANGAN) as jml_perpanjangan FROM TB_TRANSAKSI WHERE STATUS BETWEEN 1 AND 7");
		$data  = $query->row();
		return $data->jml+$data->jml_perpanjangan;
	}

	public function total_topup(){
		$query = $this->db->query("SELECT COUNT(*) as jml FROM TB_TOPUP WHERE STATUS > 0");
		$data  = $query->row();
		return $data->jml;
	}

	public function topup_belver(){
		$query = $this->db->query("SELECT COUNT(*) as jml FROM TB_TOPUP WHERE STATUS = 1");
		$data  = $query->row();
		return $data->jml;
	}

	public function get_pesan_tolak(){
		$query = $this->db->query("SELECT * FROM TB_TRANSAKSI a LEFT JOIN TB_PERSONALDATA b ON a.KODE_PERSONAL = b.KODE_PERSONAL LEFT JOIN TB_INVENTARISUNIT c ON a.KODE_UNIT = c.KODE_UNIT LEFT JOIN TB_TRANSAKSIWAKTU d ON a.KODE_TRANSAKSI = d.KODE_TRANSAKSI WHERE a.STATUS = 99 AND a.STATUS != 4 ORDER BY a.log_time DESC");
		$cek  = $query->num_rows();
		if ($cek > 0) {
			return $query->result();
		}else{
			return false;
		}
	}

	public function get_pesan_kembali(){
		$query = $this->db->query("SELECT * FROM TB_TRANSAKSI a LEFT JOIN TB_PERSONALDATA b ON a.KODE_PERSONAL = b.KODE_PERSONAL LEFT JOIN TB_INVENTARISUNIT c ON a.KODE_UNIT = c.KODE_UNIT LEFT JOIN TB_TRANSAKSIWAKTU d ON a.KODE_TRANSAKSI = d.KODE_TRANSAKSI WHERE a.STATUS = 6 AND a.STATUS != 4 ORDER BY a.log_time DESC");
		$cek  = $query->num_rows();
		if ($cek > 0) {
			return $query->result();
		}else{
			return false;
		}
	}

	public function get_pesan_verif(){
		$query = $this->db->query("SELECT * FROM TB_TRANSAKSI a LEFT JOIN TB_PERSONALDATA b ON a.KODE_PERSONAL = b.KODE_PERSONAL LEFT JOIN TB_INVENTARISUNIT c ON a.KODE_UNIT = c.KODE_UNIT LEFT JOIN TB_TRANSAKSIWAKTU d ON a.KODE_TRANSAKSI = d.KODE_TRANSAKSI WHERE a.STATUS = 1 AND a.STATUS != 4 ORDER BY a.log_time DESC");
		$cek  = $query->num_rows();
		if ($cek > 0) {
			return $query->result();
		}else{
			return false;
		}
	}

	public function get_pesan_disewa(){
		$query = $this->db->query("SELECT * FROM TB_TRANSAKSI a LEFT JOIN TB_PERSONALDATA b ON a.KODE_PERSONAL = b.KODE_PERSONAL LEFT JOIN TB_INVENTARISUNIT c ON a.KODE_UNIT = c.KODE_UNIT LEFT JOIN TB_TRANSAKSIWAKTU d ON a.KODE_TRANSAKSI = d.KODE_TRANSAKSI WHERE a.STATUS = 5 AND a.STATUS != 4 ORDER BY a.log_time DESC");
		$cek  = $query->num_rows();
		if ($cek > 0) {
			return $query->result();
		}else{
			return false;
		}
	}

	public function get_pesan_riwayat(){
		$query = $this->db->query("SELECT * FROM TB_TRANSAKSI a LEFT JOIN TB_PERSONALDATA b ON a.KODE_PERSONAL = b.KODE_PERSONAL LEFT JOIN TB_INVENTARISUNIT c ON a.KODE_UNIT = c.KODE_UNIT LEFT JOIN TB_TRANSAKSIWAKTU d ON a.KODE_TRANSAKSI = d.KODE_TRANSAKSI WHERE a.STATUS > 0 AND a.STATUS != 4 ORDER BY a.log_time DESC");
		$cek  = $query->num_rows();
		if ($cek > 0) {
			return $query->result();
		}else{
			return false;
		}
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

	public function get_pesan_pengirim($status){
		$query = $this->db->query("SELECT * FROM TB_TRANSAKSI a LEFT JOIN TB_PERSONALDATA b ON a.KODE_PERSONAL = b.KODE_PERSONAL LEFT JOIN TB_INVENTARISUNIT c ON a.KODE_UNIT = c.KODE_UNIT LEFT JOIN TB_TRANSAKSIWAKTU d ON a.KODE_TRANSAKSI = d.KODE_TRANSAKSI WHERE a.STATUS = '$status' ORDER BY a.log_time DESC");
		$cek  = $query->num_rows();
		if ($cek > 0) {
			return $query->result();
		}else{
			return false;
		}
	}

	public function get_pengirim_riwayat(){
		$query = $this->db->query("SELECT * FROM TB_TRANSAKSI a LEFT JOIN TB_PERSONALDATA b ON a.KODE_PERSONAL = b.KODE_PERSONAL LEFT JOIN TB_INVENTARISUNIT c ON a.KODE_UNIT = c.KODE_UNIT LEFT JOIN TB_TRANSAKSIWAKTU d ON a.KODE_TRANSAKSI = d.KODE_TRANSAKSI WHERE a.STATUS BETWEEN 3 AND 4 ORDER BY a.log_time DESC");
		$cek  = $query->num_rows();
		if ($cek > 0) {
			return $query->result();
		}else{
			return false;
		}
	}

	public function get_pesan_detail($KODE_TRANSAKSI){
		$query = $this->db->query("SELECT * FROM TB_TRANSAKSI a LEFT JOIN TB_PERSONALDATA b ON a.KODE_PERSONAL = b.KODE_PERSONAL LEFT JOIN TB_INVENTARISUNIT c ON a.KODE_UNIT = c.KODE_UNIT LEFT JOIN TB_TRANSAKSIWAKTU d ON a.KODE_TRANSAKSI = d.KODE_TRANSAKSI WHERE a.KODE_TRANSAKSI = '$KODE_TRANSAKSI'");
		$cek  = $query->num_rows();
		if ($cek > 0) {
			return $query->row();
		}else{
			return false;
		}
	}

	public function get_pengguna(){
		$query = $this->db->query("SELECT * FROM TB_AUTH a LEFT JOIN TB_PERSONALDATA b ON a.KODE_PERSONAL = b.KODE_PERSONAL WHERE a.ROLE = 0");
		$cek  = $query->num_rows();
		if ($cek > 0) {
			return $query->result();
		}else{
			return false;
		}
	}

	public function detail_pengguna($KODE_PERSONAL){
		$query = $this->db->query("SELECT * FROM TB_AUTH a LEFT JOIN TB_PERSONALDATA b ON a.KODE_PERSONAL = b.KODE_PERSONAL LEFT JOIN TB_PERSONALPENJAMIN c ON a.KODE_PERSONAL = c.KODE_PERSONAL LEFT JOIN TB_PERSONALREKENING d ON a.KODE_PERSONAL = d.KODE_PERSONAL WHERE a.KODE_PERSONAL = '$KODE_PERSONAL'");
		$cek  = $query->num_rows();
		if ($cek > 0) {
			return $query->row();
		}else{
			return false;
		}
	}

	public function get_produk(){
		$query = $this->db->query("SELECT a.*, a.KODE_UNIT as KODE_UNIT_U, b.*, d.GRADE, e.MERK, f.VARIAN, g.TYPE, h.KATEGORI as NAMA_KATEGORI FROM TB_INVENTARISUNIT a LEFT JOIN TB_HARGASEWA b ON a.KODE_UNIT = b.KODE_UNIT LEFT JOIN TB_GRADE d ON a.ID_GRADE = d.ID_GRADE LEFT JOIN TB_MERK e ON a.ID_MERK = e.ID_MERK LEFT JOIN TB_VARIAN f ON a.ID_VARIAN = f.ID_VARIAN LEFT JOIN TB_TYPE g ON a.ID_TYPE = g.ID_TYPE LEFT JOIN TB_KATEGORI h ON a.KATEGORI = h.ID_KATEGORI WHERE a.HAPUS = 0 ORDER BY a.ID_MERK ASC, a.KODE_UNIT ASC");

		if ($query->num_rows() > 0) {
			return $query->result();
		}else{
			return false;
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

	public function get_pesanan(){
		$query = $this->db->query("SELECT * FROM TB_TRANSAKSI  a LEFT JOIN TB_INVENTARISUNIT b ON a.KODE_UNIT = b.KODE_UNIT");

		if ($query->num_rows() > 0) {
			return $query->result();
		}else{
			return false;
		}

	}

	public function get_topup_belver(){
		$query = $this->db->query("SELECT * FROM TB_TOPUP  a LEFT JOIN TB_TOPUPVERIFIKASI b ON a.ID_TOPUP = b.ID_TOPUP LEFT JOIN TB_PERSONALDATA c ON a.KODE_PERSONAL = c.KODE_PERSONAL WHERE a.STATUS = 1");

		if ($query->num_rows() > 0) {
			return $query->result();
		}else{
			return false;
		}

	}

	public function get_topup_saldo(){
		$query = $this->db->query("SELECT * FROM TB_DEPOSIT a LEFT JOIN TB_PERSONALDATA b ON a.KODE_PERSONAL = b.KODE_PERSONAL LEFT JOIN TB_AUTH c ON a.KODE_PERSONAL = c.KODE_PERSONAL WHERE c.ROLE != 1 ORDER BY a.DEPOSIT DESC");

		if ($query->num_rows() > 0) {
			return $query->result();
		}else{
			return false;
		}

	}

	public function all_saldo(){
		$query = $this->db->query("SELECT SUM(DEPOSIT) as jml FROM TB_DEPOSIT");
		$data  = $query->row();
		return $data->jml;
	}

	public function count_topup($KODE_PERSONAL){
		$query = $this->db->query("SELECT COUNT(*) as jml FROM TB_TOPUP WHERE KODE_PERSONAL = '$KODE_PERSONAL' AND STATUS > 0");
		$data  = $query->row();
		return $data->jml;
	}

	public function get_topup_riwayat(){
		$query = $this->db->query("SELECT * FROM TB_TOPUP  a LEFT JOIN TB_TOPUPVERIFIKASI b ON a.ID_TOPUP = b.ID_TOPUP LEFT JOIN TB_PERSONALDATA c ON a.KODE_PERSONAL = c.KODE_PERSONAL WHERE a.STATUS > 0");

		if ($query->num_rows() > 0) {
			return $query->result();
		}else{
			return false;
		}

	}

	public function get_topup_detail($id_topup){
		$query = $this->db->query("SELECT * FROM TB_TOPUP  a LEFT JOIN TB_TOPUPVERIFIKASI b ON a.ID_TOPUP = b.ID_TOPUP LEFT JOIN TB_PERSONALDATA c ON a.KODE_PERSONAL = c.KODE_PERSONAL WHERE a.ID_TOPUP = '$id_topup'");

		if ($query->num_rows() > 0) {
			return $query->row();
		}else{
			return false;
		}

	}

	public function pengguna_verifikasi($KODE_PERSONAL){
		$data = array('VERIFIKASI' => 1);
		$this->db->where('KODE_PERSONAL', $KODE_PERSONAL);
		$this->db->update('TB_AUTH', $data);
		return ($this->db->affected_rows() != 1) ? false : true;
	}

	public function pengguna_revoke($KODE_PERSONAL){
		$data = array('VERIFIKASI' => 0);
		$this->db->where('KODE_PERSONAL', $KODE_PERSONAL);
		$this->db->update('TB_AUTH', $data);
		return ($this->db->affected_rows() != 1) ? false : true;
	}

	public function VerifikasiPesanan($KODE_TRANSAKSI){
		$data = array('STATUS' => 3);
		$this->db->where('KODE_TRANSAKSI', $KODE_TRANSAKSI);
		$this->db->update('TB_TRANSAKSI', $data);
		$cek = ($this->db->affected_rows() != 1) ? false : true;
		if ($cek == TRUE) {
			$waktu = date("d/m/Y");
			$data = array('WAKTU_VERIFIKASI' => $waktu);
			$this->db->where('KODE_TRANSAKSI', $KODE_TRANSAKSI);
			$this->db->update('TB_TRANSAKSIWAKTU', $data);
			return ($this->db->affected_rows() != 1) ? false : true;
		}else{
			return FALSE;
		}
	}

	public function TerimaPesanan($KODE_TRANSAKSI){
		$query = $this->db->query("SELECT KODE_UNIT FROM TB_TRANSAKSI WHERE KODE_TRANSAKSI = '$KODE_TRANSAKSI'");
		$transaksi = $query->row();
		$kode = $transaksi->KODE_UNIT;

		$data = array('STATUS' => 7);
		$this->db->where('KODE_TRANSAKSI', $KODE_TRANSAKSI);
		$this->db->update('TB_TRANSAKSI', $data);
		$cek = ($this->db->affected_rows() != 1) ? false : true;
		if ($cek == TRUE) {
			$data = array('TERSEDIA' => 1);
			$this->db->where('KODE_UNIT', $kode);
			$this->db->update('TB_INVENTARISUNIT', $data);
			return ($this->db->affected_rows() != 1) ? false : true;
		}else {
			return FALSE;
		}
	}

	public function TolakPesanan($KODE_TRANSAKSI){
		$komentar = $this->input->post('bukti_komen');
		$data = array('STATUS' => 99, 'bukti_komen' => $komentar);
		$this->db->where('KODE_TRANSAKSI', $KODE_TRANSAKSI);
		$this->db->update('TB_TRANSAKSI', $data);
		return ($this->db->affected_rows() != 1) ? false : true;
	}

	public function pesanan_kirim($KODE_TRANSAKSI, $no_resi){
		$data = array('STATUS' => 4, 'no_resi' => $no_resi);
		$this->db->where('KODE_TRANSAKSI', $KODE_TRANSAKSI);
		$this->db->update('TB_TRANSAKSI', $data);
		$cek = ($this->db->affected_rows() != 1) ? false : true;
		if ($cek == TRUE) {
			$waktu = date("H:i").", ".date("d/m/Y");
			$data = array('WAKTU_PENGIRIMAN' => $waktu);
			$this->db->where('KODE_TRANSAKSI', $KODE_TRANSAKSI);
			$this->db->update('TB_TRANSAKSIWAKTU', $data);
			return ($this->db->affected_rows() != 1) ? false : true;
		}else{
			return FALSE;
		}
	}

	public function revoke_pesanan($status, $KODE_TRANSAKSI){
		$data = array('STATUS' => $status);
		$this->db->where('KODE_TRANSAKSI', $KODE_TRANSAKSI);
		$this->db->update('TB_TRANSAKSI', $data);
		if ($status == 3) {
			$cek = ($this->db->affected_rows() != 1) ? false : true;
			if ($cek == TRUE) {
				$this->db->where('KODE_TRANSAKSI', $KODE_TRANSAKSI);
				$this->db->update('TB_TRANSAKSIWAKTU', $data);
				return ($this->db->affected_rows() != 1) ? false : true;
			}else{
				return FALSE;
			}
		}else{
			return ($this->db->affected_rows() != 1) ? false : true;
		}
	}

	public function VerifikasiDeposit($id_topup, $KODE_PERSONAL){
		$waktu = date("H:i").", ".date("d/m/Y");
		$data = array('STATUS' => 2, 'WAKTU_VERIFIKASI' => $waktu);
		$this->db->where('ID_TOPUP', $id_topup);
		$this->db->update('TB_TOPUP', $data);
		$cek = ($this->db->affected_rows() != 1) ? false : true;

		if ($cek == TRUE) {

			$minta	= $this->db->query("SELECT JUMLAH FROM TB_TOPUP WHERE ID_TOPUP = '$id_topup'");
			$satu  	= $minta->row();
			$jumlah = $satu->JUMLAH;

			$punya	= $this->db->query("SELECT DEPOSIT FROM TB_DEPOSIT WHERE KODE_PERSONAL = '$KODE_PERSONAL'");
			$dua  	= $punya->row();
			$saldo 	= $dua->DEPOSIT;

			$new_saldo = $saldo+$jumlah;

			$new = array('DEPOSIT' => $new_saldo);
			$this->db->where('KODE_PERSONAL', $KODE_PERSONAL);
			$this->db->update('TB_DEPOSIT', $new);
			return ($this->db->affected_rows() != 1) ? false : true;

		}else{
			return FALSE;
		}
	}


	public function TambahProduk($KODE_UNIT){

		$NAMA_PRODUK			= $this->input->post('nama_produk');
		$KATEGORI					= $this->input->post('kategori');
		$ID_MERK					= $this->input->post('merk');
		$ID_TYPE					= $this->input->post('series');
		$ID_VARIAN				= $this->input->post('varian');
		$ID_GRADE					= $this->input->post('grade');
		$BERAT						= $this->input->post('berat');
		$TGL_BEROPERASI		= $this->input->post('tgl_beroperasi');
		$KONDISI_AWAL			= $this->input->post('kondisi_awal');
		$HARGA_BELI				= $this->input->post('harga_beli');
		$KETERANGAN				= $this->input->post('keterangan');

		$MERK = explode("-", $ID_MERK);
		$TYPE = explode("-", $ID_TYPE);

		if (isset($TYPE[1])) {
			$SERIES	= $TYPE[1];
		}else {
			$SERIES	= $TYPE[0];
		}

		$UNIT = array(
			'KODE_UNIT'				=> $KODE_UNIT,
			'NAMA_PRODUK'			=> $NAMA_PRODUK,
			'KATEGORI'			  => $KATEGORI,
			'ID_MERK'					=> $MERK[1],
			'ID_TYPE'					=> $SERIES,
			'ID_VARIAN'				=> $ID_VARIAN,
			'ID_GRADE'				=> $ID_GRADE,
			'BERAT'						=> $BERAT,
			'TGL_BEROPERASI'	=> $TGL_BEROPERASI,
			'KONDISI_AWAL'		=> $KONDISI_AWAL,
			'HARGA_BELI'			=> $HARGA_BELI,
			'KETERANGAN'			=> $KETERANGAN
		);

		$this->db->insert('TB_INVENTARISUNIT', $UNIT);
		$cek = ($this->db->affected_rows() != 1) ? false : true;

		if ($cek == TRUE) {

			$TYPE							= $this->input->post('type');
			$SUCTION					= $this->input->post('suction');
			$LEVEL						= $this->input->post('level');
			$CYCLE						= $this->input->post('cycle');
			$TUAS_MANUAL			= $this->input->post('tuas_manual');
			$FITUR_TAMBAHAN		= $this->input->post('fitur_tambahan');

			$KNOWLEDGE = array(
				'KODE_UNIT'				=> $KODE_UNIT,
				'TYPE'						=> $TYPE,
				'SUCTION'					=> $SUCTION,
				'LEVEL'						=> $LEVEL,
				'CYCLE'						=> is_null($CYCLE)?0:1,
				'TUAS_MANUAL'			=> is_null($TUAS_MANUAL)?0:1,
				'FITUR_TAMBAHAN'	=> $FITUR_TAMBAHAN
			);

			$this->db->insert('TB_INVENTARISKNOWLEDGE', $KNOWLEDGE);
			$cek = ($this->db->affected_rows() != 1) ? false : true;

			if ($cek == TRUE) {

				$get   = $this->db->query("SELECT * FROM TB_INVENTARISKNOWLEDGE WHERE KODE_UNIT = '$KODE_UNIT'");
				$data  = $get->row();
				$id    = $data->ID_KNOWLEDGE;

				$STIMULATES			= $this->input->post('stimulates');
				$EXPRESSIONS		= $this->input->post('expressions');
				$FASE_TAMBAHAN	= $this->input->post('fase_tambahan');
				$TOTAL					= $this->input->post('total');

				$FASE = array(
					'ID_KNOWLEDGE' 	=> $id,
					'STIMULATES' 		=> is_null($STIMULATES)?0:1,
					'Expressions' 	=> is_null($EXPRESSIONS)?0:1,
					'FASE_TAMBAHAN' => is_null($FASE_TAMBAHAN)?0:1,
					'TOTAL' 				=> $TOTAL,
				);

				$this->db->insert('TB_INVENTARISFASE', $FASE);
				$cek = ($this->db->affected_rows() != 1) ? false : true;

				if ($cek == TRUE) {

					$COLOK_LISTRIK		= $this->input->post('colok_listrik');
					$BATERAI_AA				= $this->input->post('baterai_aa');
					$POWERBANK_USB		= $this->input->post('powerbank_usb');
					$RECHARGEABLE			= $this->input->post('rechargeable');

					$POWER = array(
						'ID_KNOWLEDGE' 	=> $id,
						'COLOK_LISTRIK' => is_null($COLOK_LISTRIK)?0:1,
						'BATERAI_AA'	 	=> is_null($BATERAI_AA)?0:1,
						'POWERBANK_USB' => is_null($POWERBANK_USB)?0:1,
						'RECHARGEABLE' 	=> is_null($RECHARGEABLE)?0:1,
					);

					$this->db->insert('TB_INVENTARISPOWER', $POWER);
					$cek = ($this->db->affected_rows() != 1) ? false : true;

					if ($cek == TRUE) {

						$harga_15		= $this->input->post('harga_15');
						$harga_30		= $this->input->post('harga_30');

						$POWER = array(
							'KODE_UNIT' 	=> $KODE_UNIT,
							'HARGA_15' 	=> $harga_15,
							'HARGA_30' 	=> $harga_30,
						);

						$this->db->insert('TB_HARGASEWA', $POWER);
						return ($this->db->affected_rows() != 1) ? false : true;
					}else{
						return FALSE;
					}
				}else{
					return FALSE;
				}
			}else{
				return FALSE;
			}
		}else{
			return FALSE;
		}
	}


	public function EditProduk($KODE_UNIT){

		$NAMA_PRODUK			= $this->input->post('nama_produk');
		$KATEGORI					= $this->input->post('kategori');
		$ID_MERK					= $this->input->post('merk');
		$ID_TYPE					= $this->input->post('series');
		$ID_VARIAN				= $this->input->post('varian');
		$ID_GRADE					= $this->input->post('grade');
		$BERAT						= $this->input->post('berat');
		$TGL_BEROPERASI		= $this->input->post('tgl_beroperasi');
		$KONDISI_AWAL			= $this->input->post('kondisi_awal');
		$HARGA_BELI				= $this->input->post('harga_beli');
		$KETERANGAN				= $this->input->post('keterangan');

		$MERK = explode("-", $ID_MERK);
		$TYPE = explode("-", $ID_TYPE);

		if (isset($TYPE[1])) {
			$SERIES	= $TYPE[1];
		}else {
			$SERIES	= $TYPE[0];
		}

		$UNIT = array(
			'NAMA_PRODUK'			=> $NAMA_PRODUK,
			'KATEGORI'			  => $KATEGORI,
			// 'ID_MERK'					=> $MERK[1],
			// 'ID_TYPE'					=> $SERIES,
			'ID_VARIAN'				=> $ID_VARIAN,
			'ID_GRADE'				=> $ID_GRADE,
			'BERAT'						=> $BERAT,
			'TGL_BEROPERASI'	=> $TGL_BEROPERASI,
			'KONDISI_AWAL'		=> $KONDISI_AWAL,
			'HARGA_BELI'			=> $HARGA_BELI,
			'KETERANGAN'			=> $KETERANGAN
		);

		$this->db->where('KODE_UNIT', $KODE_UNIT);
		$this->db->update('TB_INVENTARISUNIT', $UNIT);
		$cek = TRUE;

		if ($cek == TRUE) {

			$TYPE							= $this->input->post('type');
			$SUCTION					= $this->input->post('suction');
			$LEVEL						= $this->input->post('level');
			$CYCLE						= $this->input->post('cycle');
			$TUAS_MANUAL			= $this->input->post('tuas_manual');
			$FITUR_TAMBAHAN		= $this->input->post('fitur_tambahan');

			$KNOWLEDGE = array(
				'TYPE'						=> $TYPE,
				'SUCTION'					=> $SUCTION,
				'LEVEL'						=> $LEVEL,
				'CYCLE'						=> is_null($CYCLE)?0:1,
				'TUAS_MANUAL'			=> is_null($TUAS_MANUAL)?0:1,
				'FITUR_TAMBAHAN'	=> $FITUR_TAMBAHAN
			);

			$this->db->where('KODE_UNIT', $KODE_UNIT);
			$this->db->update('TB_INVENTARISKNOWLEDGE', $KNOWLEDGE);
			$cek = TRUE;

			if ($cek == TRUE) {

				$get   = $this->db->query("SELECT * FROM TB_INVENTARISKNOWLEDGE WHERE KODE_UNIT = '$KODE_UNIT'");
				$data  = $get->row();
				$id    = $data->ID_KNOWLEDGE;

				$STIMULATES			= $this->input->post('stimulates');
				$EXPRESSIONS		= $this->input->post('expressions');
				$FASE_TAMBAHAN	= $this->input->post('fase_tambahan');
				$TOTAL					= $this->input->post('total');

				$FASE = array(
					'STIMULATES' 		=> is_null($STIMULATES)?0:1,
					'Expressions' 	=> is_null($EXPRESSIONS)?0:1,
					'FASE_TAMBAHAN' => is_null($FASE_TAMBAHAN)?0:1,
					'TOTAL' 				=> $TOTAL,
				);

				$this->db->where('ID_KNOWLEDGE', $id);
				$this->db->update('TB_INVENTARISFASE', $FASE);
				$cek = TRUE;

				if ($cek == TRUE) {

					$COLOK_LISTRIK		= $this->input->post('colok_listrik');
					$BATERAI_AA				= $this->input->post('baterai_aa');
					$POWERBANK_USB		= $this->input->post('powerbank_usb');
					$RECHARGEABLE			= $this->input->post('rechargeable');

					$POWER = array(
						'COLOK_LISTRIK' => is_null($COLOK_LISTRIK)?0:1,
						'BATERAI_AA'	 	=> is_null($BATERAI_AA)?0:1,
						'POWERBANK_USB' => is_null($POWERBANK_USB)?0:1,
						'RECHARGEABLE' 	=> is_null($RECHARGEABLE)?0:1,
					);

					$this->db->where('ID_KNOWLEDGE', $id);
					$this->db->update('TB_INVENTARISPOWER', $POWER);
					$cek = TRUE;

					if ($cek == TRUE) {

						$harga_15		= $this->input->post('harga_15');
						$harga_30		= $this->input->post('harga_30');

						$POWER = array(
							'HARGA_15' 	=> $harga_15,
							'HARGA_30' 	=> $harga_30,
						);

						$this->db->where('KODE_UNIT', $KODE_UNIT);
						$this->db->update('TB_HARGASEWA', $POWER);
						return TRUE;
					}else{
						return FALSE;
					}
				}else{
					return FALSE;
				}
			}else{
				return FALSE;
			}
		}else{
			return FALSE;
		}
	}

	public function hapus_produk(){

		$KODE_UNIT = $this->input->post('KODE_UNIT');
		$data = array('HAPUS' => 1);

		$this->db->where('KODE_UNIT', $KODE_UNIT);
		$this->db->update('TB_INVENTARISUNIT', $data);
		return ($this->db->affected_rows() != 1) ? false : true;

	}

	public function Perpanjang(){

		$KODE_TRANSAKSI = $this->input->post('KODE_TRANSAKSI');
		$waktu_awal 		= $this->input->post('WAKTU_KEMBALI');
		$PERPANJANG 		= $this->input->post('PERPANJANG');
		$BIAYA			 		= $this->input->post('BIAYA_PERPANJANGAN');
		$a 							= $this->input->post('a');
		$b 							= $this->input->post('b');

		$waktu_kembali = date("H:i").", ".date("d-m-Y", strtotime('+'.$PERPANJANG.' days', strtotime(date("Y-m-d", strtotime($waktu_awal)))));

		$data = array(
			'WAKTU_KEMBALI' => $waktu_kembali,
			'PERPANJANGAN' 		=> $a+1
		);

		$this->db->where('KODE_TRANSAKSI', $KODE_TRANSAKSI);
		$this->db->update('TB_TRANSAKSIWAKTU', $data);
		$cek = ($this->db->affected_rows() != 1) ? false : true;

		if ($cek == TRUE) {
				$data = array(
					'BIAYA_PERPANJANGAN' => $b+$BIAYA
				);

				$this->db->where('KODE_TRANSAKSI', $KODE_TRANSAKSI);
				$this->db->update('TB_TRANSAKSI', $data);
				return ($this->db->affected_rows() != 1) ? false : true;
		}else {
			return FALSE;
		}

	}

}
