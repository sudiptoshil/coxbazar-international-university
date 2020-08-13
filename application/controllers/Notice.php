<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notice extends CI_Controller {

	public function __construct() {
	    parent::__construct();
	    $this->load->model('common');
	}
	public function index()
	{
		$this->db->where("notice_type=2 OR notice_type=3");
		$this->db->where("trash",0);
		$this->db->where("status",1);
    	$this->db->order_by('id','desc');
		$data['all_news_events'] = $this->db->get('notice')->result_array();


		$this->db->where("notice_type",1);
		$this->db->where("trash",0);
		$this->db->where("status",1);
    	$this->db->order_by('id','desc');
		$data['all_notice'] = $this->db->get('notice')->result_array();

		$this->load->view('public/head');
		$this->load->view('public/header');
		$this->load->view('public/notice',$data);
		$this->load->view('public/footer');
	}
	public function single_notice($id=null)
	{

		$data['single_notice'] = $this->common->getSpecificRows('notice','id',$id)->result_array();

		$this->load->view('public/head');
		$this->load->view('public/header');
		$this->load->view('public/single_notice',$data);
		$this->load->view('public/footer');
	}
}