<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Faculty extends CI_Controller {

	public function __construct() {
	    parent::__construct();
	    $this->load->model('common');
	}
	public function index($id=null)
	{
		$data['all_dept'] = $this->common->getAll('dept');
		$data['all_teachers'] = $this->common->getAll('teachers');

		$this->load->view('public/head');
		$this->load->view('public/header');
		$this->load->view('public/faculty',$data);
		$this->load->view('public/footer');
	}
	public function p($id=null)
	{
	    $user_type = $this->common->get_user_type('teacher');
		$data['teacher_id'] = $id;
		$data['profile'] = $this->common->getSpecificRows('teachers','id',$id);
		$data['job_records'] = $this->common->getAll('job_records','user_type',$user_type,'user_id',$id);
		$data['education'] = $this->common->getAll('educational_info','user_type',$user_type,'user_id',$id);
		$data['research'] = $this->common->getAll('research_paper','user_type',$user_type,'user_id',$id);
		$data['curricular_activities_info'] = $this->common->getAll('curricular_activities_info','user_type',$user_type,'user_id',$id);
        //echo $this->db->last_query();
		$this->load->view('public/head');
		$this->load->view('public/header');
		$this->load->view('public/teacher/profile',$data);
		$this->load->view('public/footer');
	}
}