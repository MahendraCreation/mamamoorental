<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends MX_Controller {
	public function __construct(){
		parent::__construct();

		$this->load->model(['M_produk']);

	}

	public function index($delimiter = null){
		if ($delimiter == "Produk") {
			$delimiter = $this->input->post("cari");
		}
		$data['all']				= $this->M_produk->get_all($delimiter);
		$data['controller']   = $this;

		$data['module'] 		= "Produk";
		$data['fileview'] 	= "all";

		if ($this->agent->is_mobile()){
			echo Modules::run('Template/FrontEnd_Mobile', $data);
		}else{
			echo Modules::run('Template/FrontEnd_Main', $data);
		}
	}

	public function Detail($id = null){
		if ($id == null || empty($id)){
			$this->session->set_flashdata('alert', "Tidak dapat menampilkan detail produk tersebut. Harap coba lagi");
			redirect(base_url());
		}else{
			if ($this->M_produk->get_detail($id) == false) {
				$this->session->set_flashdata('alert', "Tidak dapat menampilkan detail produk tersebut. Harap coba lagi");
				redirect(base_url());
			}else{
				$data['produk']				= $this->M_produk->get_detail($id);
				$data['foto']					= $this->M_produk->get_foto($id);
				$data['knowledge']		= $this->M_produk->get_knowledge($id);
				$data['review']				= $this->M_produk->get_review($id);
				$data['rating']				= $this->M_produk->get_rating($id);
				$data['controller']   = $this;

				$data['ongkir_jnt']						= $this->M_produk->get_ongkir_jnt();
				$data['ongkir_mamamoo']				= $this->M_produk->get_ongkir_mamamoo();
				$data['module'] 		= "Produk";
				$data['fileview'] 	= "detail";

				if ($this->agent->is_mobile()){
					echo Modules::run('Template/FrontEnd_Mobile', $data);
				}else{
					echo Modules::run('Template/FrontEnd_Main', $data);
				}
			}
		}
	}

}
