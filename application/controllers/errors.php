<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Errors extends CI_Controller {

	public function __construct(){

		parent::__construct();
		$this->data['page_title'] = 'Page Missing';
	}

	public function page_missing(){

		$this->load->view('header', $this->data);
		$this->load->view('errors/page_missing');
		$this->load->view('footer');
	}


}

