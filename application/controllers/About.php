<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends CI_Controller {

	public function __construct() {
	    parent::__construct();
	    $this->load->model('common');
	}
	public function index()
	{
		$this->load->view('public/head');
		$this->load->view('public/header');
		$this->load->view('public/about');
		$this->load->view('public/footer');
	}
}