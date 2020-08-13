<?php
class Member extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		$this->load->model('news_model');
		$this->load->library('session');
		$this->load->helper(array('form', 'url'));
		$this->load->library('email');

	}


		
	
	
	



	
	
		function adminlogin()
			{

    			$this->load->helper('form');
				$this->load->library('form_validation');      
           		$this->form_validation->set_rules('name',  'name',  'required');
            	$this->form_validation->set_rules('password',  'Password',  'required|min_length[1]');

            		if ($this->form_validation->run() === FALSE)
						{

							$this->load->view('admin/login');
						}
					else
						{

		$name = $this->input->post('name');
		$pass = $this->input->post('password');
			
	
	
	$this->db->where('username', $name);
	$query = $this->db->get("users");
	$row = $query->row();
	
	
	//$hash = md5($pass);  
	
	
	 if($row->password == $pass)
 		{
		
		$this->session->set_userdata('active',$row->active);	
		$this->session->set_userdata('admin', $row->id);			
		$this->session->set_userdata('type', $row->type);			
		$this->session->set_userdata('wire', $row->wire);
		$this->session->set_userdata('wactive',$row->w_active);
		
		redirect('admin');
		
		} else {
		    redirect('member/adminlogin');
		}
							
							
							
							
							
						}
				}
	
	

	

	




}