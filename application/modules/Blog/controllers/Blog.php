<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends MX_Controller {
	public function __construct(){
		parent::__construct();

	}

	public function index(){
		$data['module'] 	= "Blog";
		$data['fileview'] 	= "Blog";
		echo Modules::run('Template/FrontEnd_Main', $data);
	}

	public function DetailBlog(){
		$data['module'] 	= "Blog";
		$data['fileview'] 	= "detail";
		echo Modules::run('Template/FrontEnd_Main', $data);
	}

}
