<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class studentRegister extends CI_Controller
{

	public function student_register()
	{
		$this->db->where('trash',0);
        $this->db->where('status',1);
        $data['all_board'] = $this->db->get('board')->result_array();

        $this->db->where('trash',0);
        $this->db->where('status',1);
        $this->db->where('faculty >',0);
        $data['all_dept'] = $this->db->get('dept')->result_array();

		$this->load->view('public/head');
		$this->load->view('public/header');
		$this->load->view('public/students/student_register',$data);
		$this->load->view('public/footer');

	}

	public function save_student_register()
	{	
		// $student = print_r($_REQUEST);
		$student = new Student_reg();
		$student->name	= $_REQUEST['name'];
		$student->dob	= $_REQUEST['dob'];
		$student->mobile= $_REQUEST['phone'];
		$student->email	= $_REQUEST['email'];
		// $student->pass	= password_hash($_REQUEST['confim_password'],PASSWORD_BCRYPT);
		$student->pass  = $_REQUEST['confim_password'];
		$student->pass_hash = md5($_REQUEST['confim_password']);

		$student->save();
		// Student_reg::create($_REQUEST);
		// redirect('Student/studentRegister/student_register');
		redirect('Home/applicant_login');

	}


}
