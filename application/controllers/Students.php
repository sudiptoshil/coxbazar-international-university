<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Students extends CI_Controller {

	public function __construct() {
	    parent::__construct();
	    $this->load->model('common');
	}
	public function index()
	{
		$data['all_students'] = $this->common->getAll('students','is_student',1);
		//$data['all_teachers'] = $this->common->getAll('teachers');

		$this->load->view('public/head');
		$this->load->view('public/header');
		$this->load->view('public/students/current_students',$data);
		$this->load->view('public/footer');
	}
	public function result()
	{
		$data['all_result'] = $this->common->getAll('result','status',1);
		//$data['all_teachers'] = $this->common->getAll('teachers');

		$this->load->view('public/head');
		$this->load->view('public/header');
		$this->load->view('public/students/student_results',$data);
		$this->load->view('public/footer');
	}
	public function hostel_seat_req()
	{
	    $this->db->where('status',1);
	    $this->db->where('trash',0);
	    $this->db->where('id !=',1);
	    $this->db->order_by('name','asc');
	    $data['all_dept'] = $this->db->get('dept')->result_array();
	    
	    $this->db->where('status',1);
	    $this->db->where('trash',0);
	    $this->db->order_by('id','desc');
	    $data['all_batch'] = $this->db->get('batch')->result_array();
	    
	    $this->db->where('status',1);
	    $this->db->where('trash',0);
	    $this->db->order_by('id','desc');
	    $data['all_session'] = $this->db->get('academic_session')->result_array();
	    
	    $name = $this->input->post('student_name');
	    $gender = $this->input->post('gender');
	    $dept = $this->input->post('dept');
	    $batch = $this->input->post('batch');
	    $session = $this->input->post('session');
	    $roll = $this->input->post('roll');
	    $application = $this->input->post('application');
	    
	    if(!empty($dept)){
	        
    	    $this->db->where('student_name',$name);
    	    $this->db->where('gender',$gender);
	        $this->db->where('dept',$dept);
    	    $this->db->where('batch',$batch);
    	    $this->db->where('session',$session);
    	    $this->db->where('roll',$roll);
    	    $check_app = $this->db->get('hostel_seat_request');
    	    //echo $this->db->last_query();
    	    if($check_app->num_rows() > 0){
                $this->session->set_flashdata('msg', 'Already requested!');
    	    }else{
    	        $app_array=array(
    	            'student_name'=>$name,  
    	            'gender'=>$gender,  
    	            'dept'=>$dept,  
    	            'batch'=>$batch,  
    	            'session'=>$session,  
    	            'roll'=>$roll,  
    	            'application'=>$application,
    	            'date'=>$this->common->getDate()
                );
                $this->db->insert('hostel_seat_request',$app_array);
                $this->session->set_flashdata('msg', 'Application request successfully send.');
    	    }
    	    
	    }else{
	        if(isset($_POST))
                $this->session->set_flashdata('msg', 'All field required!');
	    }

		$this->load->view('public/head');
		$this->load->view('public/header');
		$this->load->view('public/students/hostel_seat_req',$data);
		$this->load->view('public/footer');
	}
}