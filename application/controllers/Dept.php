<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dept extends CI_Controller {

	public function __construct() {
	    parent::__construct();
	    $this->load->model('common');
	}
	public function index()
	{
	    $this->db->where('trash',0);
	    $this->db->where('code !=',0);
		$data['all_dept'] = $this->db->get('dept')->result_array();
		
		$this->load->view('public/head');
		$this->load->view('public/header');
		$this->load->view('public/dept/departments',$data);
		$this->load->view('public/footer');
	}
	public function d($dept_short_name)
	{
	    $data['dept_id'] = $dept_id =  $this->common->getSpecificField('dept','short_name',$dept_short_name,'id');
	    
		$data['dept_teachers'] = $this->common->getAll('teachers','dept',$dept_id);
		$data['dept_staffs'] = $this->common->getAll('staffs','dept',$dept_id);
		$data['class_routine'] = $this->common->getAll('class_routine','dept',$dept_id);
		$data['dept_slide'] = $this->common->getAll('tbl_slider_image','dept_id',$dept_id);
		$data['dept_head_speech'] = $this->common->getAll('tbl_dept_head_speech','dept_id',$dept_id);
		$data['dept_lab_info'] = $this->common->getAll('tbl_lab_info','dept_id',$dept_id);
		$data['dept_photo_gallery'] = $this->common->getAll('photo_gallery','dept',$dept_id);

        
		$this->load->view('public/head');
		$this->load->view('public/header');
		$this->load->view('public/dept/dept_profile',$data);
		$this->load->view('public/footer');
	}
	/*public function ame()
	{
		$data['ame_teachers'] = $this->common->getAll('teachers','dept',2);
		$data['ame_staffs'] = $this->common->getAll('staffs','dept',2);
		$data['class_routine'] = $this->common->getAll('class_routine','dept',2);

		$this->load->view('public/head');
		$this->load->view('public/header');
		$this->load->view('public/dept/ame',$data);
		$this->load->view('public/footer');
	}
	public function fme()
	{
		$data['ame_teachers'] = $this->common->getAll('teachers','dept',3);
		$data['ame_staffs'] = $this->common->getAll('staffs','dept',3);
		$data['class_routine'] = $this->common->getAll('class_routine','dept',3);

		$this->load->view('public/head');
		$this->load->view('public/header');
		$this->load->view('public/dept/fme',$data);
		$this->load->view('public/footer');
	}
	public function wpe()
	{
		$data['ame_teachers'] = $this->common->getAll('teachers','dept',4);
		$data['ame_staffs'] = $this->common->getAll('staffs','dept',4);
		$data['class_routine'] = $this->common->getAll('class_routine','dept',4);
		
		$this->load->view('public/head');
		$this->load->view('public/header');
		$this->load->view('public/dept/wpe',$data);
		$this->load->view('public/footer');
	}
	public function yme()
	{
		$data['ame_teachers'] = $this->common->getAll('teachers','dept',5);
		$data['ame_staffs'] = $this->common->getAll('staffs','dept',5);
		$data['class_routine'] = $this->common->getAll('class_routine','dept',5);
		
		$this->load->view('public/head');
		$this->load->view('public/header');
		$this->load->view('public/dept/yme',$data);
		$this->load->view('public/footer');
	}*/
}