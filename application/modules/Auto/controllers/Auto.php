<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Auto extends MX_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('M_excel');
	}

	public function CekTransaksi(){
		
	}
}
