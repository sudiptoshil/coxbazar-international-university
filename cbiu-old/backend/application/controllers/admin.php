<?php class Admin extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		$this->load->model('news_model');
		$this->load->library('session');
		$this->load->helper(array('form', 'url'));
		$this->load->library("pagination");


		$admin_user = $this->session->userdata('admin');
		
		if(empty($admin_user))
		{	
			redirect('member/adminlogin');
		}
	}
     			public function index()
		{
			
			
	$admin = $this->session->userdata('admin');
	$w = $this->session->userdata('wire');
	$type = $this->session->userdata('type');		
			
	$this->load->view('admin/admin_header');
	
$this->load->view('admin/dashboard');
		
			
	
		$this->load->view('admin/admin_footer');
		
		}
		
		
		
	
	function logout()
    {
$this->session->unset_userdata('active');
$this->session->unset_userdata('admin');
$this->session->unset_userdata('type');
$this->session->unset_userdata('wire');
$this->session->unset_userdata('wactive');


redirect('admin');
	}	
		
		
	

	public function pro_all()
	{
		$admin=$this->session->userdata('admin');
		$user_type=$this->session->userdata('type');
		

		$this->load->view('admin/admin_header');

		$config = array();
        $config["base_url"] = base_url() . "admin/pro_all/";
		$config["total_rows"] = $this->news_model->count('admission');
        $config["per_page"] = 30;
		$config['num_links'] = 10;
		$config['use_page_numbers'] = TRUE;
		$config['first_link'] = 'First';
        $config["uri_segment"] = 3;
        if (count($_GET) > 0) $config['suffix'] = '?' . http_build_query($_GET, '', "&");
		$config['first_url'] = $config['base_url'].'?'.http_build_query($_GET);
		$config['last_link'] = 'LAST';
		$config['next_link'] = '...NEXT';
		$config['prev_link'] = 'PREV...';
		$config['full_tag_open'] = '<div id="pagination">';
		$config['full_tag_close'] = '</div>';
		$config['anchor_class'] = 'class="number" ';
		$config['use_page_numbers'] = TRUE;
		
        $this->pagination->initialize($config);

        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

		$limit = $config["per_page"];
		
		if ($page!=0) {  $page = ($page * $limit)-$limit;  }
        else  {   $page= 0;  }

        $user_name = $this->session->userdata('admin');
 		$data["all"] = $this->news_model->pagination('admission','','',$config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();

        $this->load->view('admin/pro_all',$data);
		$this->load->view('admin/admin_footer');
	}



	public function full_view($id)
		{
	$data["id"] = $id;		

	$data["all"] = $this->news_model->common('admission','id', $id);
	
$this->load->view('admin/print',$data);
		
		
		}



	
}