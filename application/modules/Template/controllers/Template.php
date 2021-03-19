<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Template extends MX_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model(['M_template']);
	}

	public function Error($data){
		$this->load->view('Error', $data);
	}

	public function FrontEnd_Mobile($data){
		if ($this->session->userdata('logged_in') == TRUE) {
			$data['logged'] = TRUE;
			$data['email']	= $this->session->userdata('email');
			$data['verifikasi'] = $this->M_template->get_verif($this->session->userdata('KODE_PERSONAL'));
		}else{
			$data['logged'] = FALSE;
		}
		// array_replace($base, array (0 => "makan"))
		$data['website']	= $this->M_template->get_website();
		$wa						= $this->M_template->get_wa();
		$wa 					= preg_replace('/^0/', '62', $wa);
		$data['wa']		= $wa;
		$data['ig']		= $this->M_template->get_ig();

		$this->load->view('FrontEnd_Mobile', $data);
	}

	public function FrontEnd_Main($data){
		if ($this->session->userdata('logged_in') == TRUE) {
			if ($this->session->userdata('role') == 0) {
				$data['admin'] = FALSE;
			}else {
				$data['admin'] = TRUE;
			}
			$data['logged'] = TRUE;
			$data['email']	= $this->session->userdata('email');
			$data['trans_belum']	= $this->M_template->trans_belum($this->session->userdata('KODE_PERSONAL'));
			$data['trans_kirim']	= $this->M_template->trans_kirim($this->session->userdata('KODE_PERSONAL'));
			$data['verifikasi'] 	= $this->M_template->get_verif($this->session->userdata('KODE_PERSONAL'));
		}else{
			$data['logged'] = FALSE;
		}
		// array_replace($base, array (0 => "makan"))
		$data['website']	= $this->M_template->get_website();
		$wa						= $this->M_template->get_wa();
		$wa 					= preg_replace('/^0/', '62', $wa);
		$data['wa']		= $wa;
		$data['ig']		= $this->M_template->get_ig();

		$this->load->view('FrontEnd_Main', $data);
	}

	public function BackEnd_Main($data){
		if ($this->session->userdata('logged_in') == TRUE) {
			$data['logged'] = TRUE;
			$data['email']	= $this->session->userdata('email');
			$data['nama']	  = $this->session->userdata('nama');
			$data['controller'] = $this;
			$data['verifikasi'] = $this->M_template->get_verif($this->session->userdata('KODE_PERSONAL'));
		}else{
			$data['logged'] = FALSE;
		}

		$this->load->view('BackEnd_Main', $data);
	}

	public function FrontEnd_Waiting($data){
		// array_replace($base, array (0 => "makan"))
		$data['website']	= $this->M_template->get_website();
		$wa						= $this->M_template->get_wa();
		$wa 					= preg_replace('/^0/', '62', $wa);
		$data['wa']		= $wa;
		$data['ig']		= $this->M_template->get_ig();

		$this->load->view('FrontEnd_Waiting', $data);
	}
}
