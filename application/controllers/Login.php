<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct() {
	    parent::__construct();
	    $this->load->model('common');
	    $this->load->model('login_model');
        $id = $this->common->user_session_data(1);
        $user_type = $this->common->user_session_data(2);
        
	}
	public function index()
	{

		//echo $this->db->last_query();

		//$this->load->view('public/head');
		//$this->load->view('public/header');
		$this->load->view('admin/login');
		//$this->load->view('public/footer');
	}
	public function auth()
	{
		$username_email = $this->input->post('username_email',TRUE);
		$password = $this->input->post('password',TRUE);
		$pass_hash = md5(sha1(md5($password)));
		$validate = $this->login_model->validate($username_email,$pass_hash);
		
		if ((!empty($username_email) && !empty($password)) && $validate->num_rows() > 0) {
			$row_data = $validate->row_array();
			$id = $row_data['id'];
			$user_type = $row_data['user_type'];
			$user_id = $row_data['user_id'];
			
            if($user_type == $this->common->get_user_type('student')){
    			echo $this->session->set_flashdata("msg","This panel is not for student!!");
    			redirect(base_url().'login');
            }elseif($user_type == $this->common->get_user_type('alumni')){
    			echo $this->session->set_flashdata("msg","This panel is not for alumni!!");
    			redirect(base_url().'login');
            }else{
    			$ses_data = array(
    				'id' => $id,
    				'user_type' => $user_type,
    				'user_id' => $user_id
    			);
    			$this->session->set_userdata($ses_data);
    			redirect(base_url().'admin/dashboard');
            }

		}else if (empty($username_email) || empty($password)) {
			echo $this->session->set_flashdata("msg","Username/email/password empty!!");
			redirect(base_url().'login');
		}else{
			echo $this->session->set_flashdata("msg","Username or email or password wrong!!");
			redirect(base_url().'login');
		}
	}


	/*public function auth(){
	    $email    = $this->input->post('email',TRUE);
	    $password = md5($this->input->post('password',TRUE));
	    $validate = $this->login_model->validate($email,$password);
	    if($validate->num_rows() > 0){
	        $data  = $validate->row_array();
	        $name  = $data['user_name'];
	        $email = $data['user_email'];
	        $level = $data['user_level'];
	        $sesdata = array(
	            'username'  => $name,
	            'email'     => $email,
	            'level'     => $level,
	            'logged_in' => TRUE
	        );
	        $this->session->set_userdata($sesdata);
	        // access login for admin
	        if($level === '1'){
	            redirect('page');
	 
	        // access login for staff
	        }elseif($level === '2'){
	            redirect('page/staff');
	 
	        // access login for author
	        }else{
	            redirect('page/author');
	        }
	    }else{
	        echo $this->session->set_flashdata('msg','Username or Password is Wrong');
	        redirect('login');
	    }
  	}*/
 
 	function logout(){
      	$this->session->sess_destroy();
  		/*$this->session->unset_userdata('id');
  		$this->session->unset_userdata('user_type');
  		$this->session->unset_userdata('user_id');*/
      	redirect('login');
  	}
	public function forgot_password()
	{
		$this->load->view('admin/forgot-password');
	}
}