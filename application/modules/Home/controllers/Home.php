<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MX_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('M_home');
	}

	public function index(){
		$data['all']				= $this->M_home->get_all();
		$data['laris']				= $this->M_home->get_laris();
		$data['terbaru']				= $this->M_home->get_terbaru();
		$data['controller'] 		= $this;

		$data['module'] 		= "Home";
		$data['fileview'] 	= "home";

		if ($this->agent->is_mobile()){
			echo Modules::run('Template/FrontEnd_Mobile', $data);
		}else{
			echo Modules::run('Template/FrontEnd_Main', $data);
		}
	}

	public function Error404(){
		$data['module'] 	= "Home";
		$data['fileview'] 	= "404";
		echo Modules::run('Template/Error', $data);
	}

	public function Tentang(){
		$data['module'] 	= "Home";
		$data['fileview'] 	= "tentang";

		if ($this->agent->is_mobile()){
			echo Modules::run('Template/FrontEnd_Mobile', $data);
		}else{
			echo Modules::run('Template/FrontEnd_Main', $data);
		}
	}

	public function Promo(){
		$data['module'] 	= "Home";
		$data['fileview'] 	= "promo";

		if ($this->agent->is_mobile()){
			echo Modules::run('Template/FrontEnd_Mobile', $data);
		}else{
			echo Modules::run('Template/FrontEnd_Main', $data);
		}
	}

	public function HubungiKami(){
		$data['module'] 	= "Home";
		$data['fileview'] 	= "hubungi";

		if ($this->agent->is_mobile()){
			echo Modules::run('Template/FrontEnd_Mobile', $data);
		}else{
			echo Modules::run('Template/FrontEnd_Main', $data);
		}
	}

}
