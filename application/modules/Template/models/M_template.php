<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_template extends CI_Model {
  function __construct(){
    parent::__construct();
  }

  function trans_belum($KODE_PERSONAL){
    $sql  = $this->db->query("SELECT COUNT(*) AS JML FROM TB_TRANSAKSI WHERE KODE_PERSONAL = '$KODE_PERSONAL' AND STATUS = 0");
    $data = $sql->row();
    return $data->JML;
  }

  function trans_kirim($KODE_PERSONAL){
    $sql  = $this->db->query("SELECT COUNT(*) AS JML FROM TB_TRANSAKSI WHERE KODE_PERSONAL = '$KODE_PERSONAL' AND STATUS = 4");
    $data = $sql->row();
    return $data->JML;
  }

  function get_verif($KODE_PERSONAL){
    $sql  = $this->db->query("SELECT VERIFIKASI FROM TB_AUTH WHERE KODE_PERSONAL = '$KODE_PERSONAL'");
    $data = $sql->row();
    return $data->VERIFIKASI;
  }

  function count_pengguna(){
    $sql  = $this->db->query("SELECT KODE_PERSONAL FROM TB_AUTH WHERE ROLE = 0 AND VERIFIKASI = 0 AND ACTIVE > 0 AND PROFILE > 0");
    return $sql->num_rows();
  }

  function count_sewa($status){
    $sql  = $this->db->query("SELECT KODE_TRANSAKSI FROM TB_TRANSAKSI WHERE STATUS = '$status'");
    return $sql->num_rows();
  }

  function get_website(){
    $data = array('MAMAMOORENTAL','Menjual Pompa Asi, Parts & Perlengkapan Bayi, Melayani sewa Pompa Asi & Sterilizer', 'NewLogo.png', 'icon.png');
    return $data;

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
}
