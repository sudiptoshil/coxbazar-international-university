<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller{

	public function __construct() {
	    parent::__construct();
	    $this->load->model('admin/admin_model');
	    $this->load->model('common');
	    $this->load->model('alumni_model');
        $id = $this->common->user_session_data(1);
        $user_type = $this->common->user_session_data(2);
		if(empty($id)){
			redirect(base_url().'login');
		}
	}

	public function index(){
		$id = $this->common->user_session_data(1);
		$user_type = $this->common->user_session_data(2);
		$user_id = $this->common->user_session_data(3);
		if(empty($id))
			redirect(base_url().'login');

        if($user_type == $this->common->get_user_type('teacher')){
			redirect(base_url().'admin/user_profile/'.$user_id);
        }else{
    		$this->load->view('admin/header');
    		$this->load->view('admin/index');
    		$this->load->view('admin/footer');
	    }
	}

	public function dashboard(){
		$id = $this->common->user_session_data(1);
		$user_type = $this->common->user_session_data(2);
		$user_id = $this->common->user_session_data(3);
		if(empty($id))
			redirect(base_url().'login');

        if($user_type == $this->common->get_user_type('teacher')){
			//redirect(base_url().'admin/user_profile/'.$user_id);
			redirect(base_url().'admin/user_profile/'.$user_id.'/2?is_view=3');
        }else{
    		$this->load->view('admin/header');
    		$this->load->view('admin/index');
    		$this->load->view('admin/footer');
	    }
	}

	/* start Dept view/add/update/delete */

	public function dept(){
		$id = $this->common->user_session_data(1);
		$user_type = $this->common->user_session_data(2);
		if(empty($id))
			redirect(base_url().'login');

	    $data['success'] = '';


		$this->db->where("trash",0);
    	$this->db->order_by('id','asc');
		$data['all_dept'] = $this->db->get('dept')->result_array();

		$this->load->view('admin/header');
		$this->load->view('admin/dept/all_dept',$data);
		$this->load->view('admin/footer');
	}

	public function new_dept(){
		$id = $this->common->user_session_data(1);
		$user_type = $this->common->user_session_data(2);
		if(empty($id))
			redirect(base_url().'login');

	    $data = array();
	    $data['title'] = 'Create a new department';
        $data['info']='';
        if(!empty($_GET['dept_id'])){
            $data['info'] = $this->common->getAnyInfoRow('dept','id',$_GET['dept_id']);
        }
        $data['faculty'] = $this->common->getAll('faculty');

    	$data['success'] = 0;
		$this->load->view('admin/header');
		$this->load->view('admin/dept/new_dept',$data);
		$this->load->view('admin/footer');
	}

	public function insert_dept() {
		$id = $this->common->user_session_data(1);
		$user_type = $this->common->user_session_data(2);
		if(empty($id))
			redirect(base_url().'login');

	    $data = array();
	    $data['title'] = 'Create a new dept';

	    $faculty = $this->form_validation->set_rules('faculty', 'Faculty is', 'required');
	    $notice_type = $this->form_validation->set_rules('dept_name', 'Department is', 'required');
	    $notice_title = $this->form_validation->set_rules('dept_short_name', 'Dept. short name is', 'required');
	    $notice_descr =  $this->form_validation->set_rules('dept_code', 'Dept. code is', 'required');
	    //$this->form_validation->set_rules('notice-image', 'Notice image', 'required');
	    //$notice_date = $this->form_validation->set_rules('notice-date', 'Notice Date is', 'required');


		/*
		if(empty($notice_title))
			redirect('notice');

		*/
	    $data['success'] = '';

	    if ($this->form_validation->run() === FALSE)
	    {
	    	$data['success'] = 0;
	        $this->load->view('admin/header', $data);
	        $this->load->view('admin/dept/new_dept',$data);
	        $this->load->view('admin/footer');
	    }
	    else
	    {
	    	$data['success'] = 1;
	    	$notice_info = array(
		        'faculty' => $this->input->post('faculty'),
		        'name' => $this->input->post('dept_name'),
		        'code' => $this->input->post('dept_code'),
		        'short_name' => $this->input->post('dept_short_name'),
		        'phone' => $this->input->post('dept_phone'),
		        'email' => $this->input->post('dept_email'),
		        'overview' => $this->input->post('dept_overview'),
		        'mission_vision' => $this->input->post('dept_mission_vision'),
		        'academic_curriculum' => $this->input->post('dept_aca_curri'),
		        'starting_date' => $this->input->post('dept_starting_date'),
		        'date_time' => date('Y-m-d H:i:s'),
		        'by' => $this->common->user_session_data(1)
		    );

	    	/*image upload*/
	    	if ($_FILES['dept_image']['name'] !== ''){


			$config['upload_path']          = './assets/images/dept/';
	        $config['allowed_types']        = 'gif|jpg|png|';
	        $new_name = date('Ymd_his_').$_FILES["dept_image"]['name'];
	        $config['file_name'] = $new_name;

			$this->upload->initialize($config);


	        if ( ! $this->upload->do_upload('dept_image'))
	        {

		    		$data['success'] = $this->upload->display_errors();

		        	redirect('admin/dept');
	        }
	        else
	        {
	                $data = array('upload_data' => $this->upload->data());

	                $notice_info['image'] = $data['upload_data']['file_name'];
	        }

	    	}else{
	    		unset($notice_info['image']);
	    	}
		/*image upload*/

            if(!empty($_POST['dept_id'])){
                if ($_FILES['dept_image']['name'] !== '' && $this->common->getAnyInfoRow('dept', 'id', $_POST['dept_id'])->image)
                    unlink(FCPATH . "/assets/images/dept/" . $this->common->getAnyInfoRow('dept', 'id', $_POST['dept_id'])->image);

                $this->db->where('id',$_POST['dept_id']);
                $this->db->update('dept', $notice_info);
            }else{
                $this->db->insert('dept', $notice_info);
            }
	        redirect('admin/dept');
	    }
	}

    public function delete_dept($id) {

        if ($id != null) {
            $this->db->where('id',$id);
            $this->db->update('dept', array('trash' => 1));
        }
        redirect('admin/dept');
    }
	/* end Dept view/add/update/delete */

	/* start event view/add/update/delete */

	public function event(){
		$id = $this->common->user_session_data(1);
		$user_type = $this->common->user_session_data(2);
		if(empty($id))
			redirect(base_url().'login');

	    $data['success'] = '';


		$this->db->where("trash",0);
    	$this->db->order_by('id','desc');
		$data['all_event'] = $this->db->get('event')->result_array();

		$this->load->view('admin/header');
		$this->load->view('admin/event/all_event',$data);
		$this->load->view('admin/footer');
	}

	public function new_event(){
		$id = $this->common->user_session_data(1);
		$user_type = $this->common->user_session_data(2);
		if(empty($id))
			redirect(base_url().'login');

	    $data = array();
	    $data['title'] = 'Create a new event';
        $data['info']='';
        if(!empty($_GET['id'])){
            $data['info'] = $this->common->getAnyInfoRow('event','id',$_GET['id']);
        }

    	$data['success'] = 0;
		$this->load->view('admin/header');
		$this->load->view('admin/event/new_event',$data);
		$this->load->view('admin/footer');
	}

	public function new_event_insert() {
		$id = $this->common->user_session_data(1);
		$user_type = $this->common->user_session_data(2);
		if(empty($id))
			redirect(base_url().'login');

	    $data = array();
	    $data['title'] = 'Create a new event';

	    $title = $this->form_validation->set_rules('title', 'Event title is', 'required');
	    $start_date = $this->form_validation->set_rules('start_date', 'Start date is', 'required');
	    $end_date = $this->form_validation->set_rules('end_date', 'End date is', 'required');
	    $description =  $this->form_validation->set_rules('description', 'Description is', 'required');
	    //$this->form_validation->set_rules('notice-image', 'Notice image', 'required');
	    //$notice_date = $this->form_validation->set_rules('notice-date', 'Notice Date is', 'required');


		/*
		if(empty($notice_title))
			redirect('notice');

		*/
	    $data['success'] = '';

	    if ($this->form_validation->run() === FALSE)
	    {
	    	$data['success'] = 0;
	        $this->load->view('admin/header', $data);
	        $this->load->view('admin/event/new_event',$data);
	        $this->load->view('admin/footer');
	    }
	    else
	    {
	    	$data['success'] = 1;
	    	$notice_info = array(
		        'title' => $this->input->post('title'),
		        'start_date' => $this->input->post('start_date'),
		        'end_date' => $this->input->post('end_date'),
		        'description' => $this->input->post('description'),
		        'location' => $this->input->post('location'),
		        'date' => $this->common->getDate(),
		        'date_time' => $this->common->getDateTime(),
		        'added_by' => $this->common->user_session_data(1)
		    );

	    	/*image upload*/
	    	if ($_FILES['event_image']['name'] !== ''){


			$config['upload_path']          = './assets/images/event/';
	        $config['allowed_types']        = 'gif|jpg|png|jpeg';
	        $new_name = date('Ymd_his_').$_FILES["event_image"]['name'];
	        $config['file_name'] = $new_name;

			$this->upload->initialize($config);


	        if ( ! $this->upload->do_upload('event_image'))
	        {

		    		$data['success'] = $this->upload->display_errors();

		        	redirect('admin/event');
	        }
	        else
	        {
	                $data = array('upload_data' => $this->upload->data());

	                $notice_info['image'] = $data['upload_data']['file_name'];
	        }

	    	}else{
	    		unset($notice_info['image']);
	    	}
		/*image upload*/

            if(!empty($_POST['event_id'])){
                if ($_FILES['event_image']['name'] !== '' && $this->common->getAnyInfoRow('event', 'id', $_POST['event_id'])->image)
                    unlink(FCPATH . "/assets/images/event/" . $this->common->getAnyInfoRow('event', 'id', $_POST['event_id'])->image);

                $this->db->where('id',$_POST['event_id']);
                $this->db->update('event', $notice_info);
            }else{
                $this->db->insert('event', $notice_info);
            }
	        redirect('admin/event');
	    }
	}

	public function event_change_status($id, $status) {

        if ($id != null) {
            if ($status == 1) {
                $data['status'] = 0;
                $this->db->where('id', $id);
                $this->db->update('event', $data);
            } else {
                $data['status'] = 1;
                $this->db->where('id', $id);
                $this->db->update('event', $data

                );
            }
        }
        return redirect('admin/event/');
    }
    public function delete_event($id) {

        if ($id != null) {
            $this->db->where('id',$id);
            $this->db->update('event', array('trash' => 1));
        }
        redirect('admin/event');
    }

	/* start club view/add/update/delete */
	public function club(){
		$id = $this->common->user_session_data(1);
		$user_type = $this->common->user_session_data(2);
		if(empty($id))
			redirect(base_url().'login');

	    $data['success'] = '';


		$this->db->where("trash",0);
    	$this->db->order_by('id','asc');
		$data['all_club'] = $this->db->get('club')->result_array();

		$this->load->view('admin/header');
		$this->load->view('admin/club/all_club',$data);
		$this->load->view('admin/footer');
	}
	public function new_club(){
		$id = $this->common->user_session_data(1);
		$user_type = $this->common->user_session_data(2);
		if(empty($id))
			redirect(base_url().'login');

	    $data = array();
	    $data['title'] = 'Add new club';
        $data['info']='';
        if(!empty($_GET['id'])){
            $data['info'] = $this->common->getAnyInfoRow('club','id',$_GET['id']);
        }

    	$data['success'] = 0;
		$this->load->view('admin/header');
		$this->load->view('admin/club/new_club',$data);
		$this->load->view('admin/footer');
	}
	public function new_club_insert() {
		$id = $this->common->user_session_data(1);
		$user_type = $this->common->user_session_data(2);
		if(empty($id))
			redirect(base_url().'login');

	    $data = array();
	    $data['title'] = 'Add new club';

	    $title = $this->form_validation->set_rules('title', 'Event title is', 'required');
	    $start_date = $this->form_validation->set_rules('start_date', 'Start date is', 'required');
	    $description =  $this->form_validation->set_rules('description', 'Description is', 'required');
	    $data['success'] = '';

	    if ($this->form_validation->run() === FALSE)
	    {
	    	$data['success'] = 0;
	        $this->load->view('admin/header', $data);
	        $this->load->view('admin/club/new_club',$data);
	        $this->load->view('admin/footer');
	    }
	    else
	    {
	    	$data['success'] = 1;
	    	$notice_info = array(
		        'title' => $this->input->post('title'),
		        'starting_date' => $this->input->post('start_date'),
		        'description' => $this->input->post('description'),
		        'date' => $this->common->getDate(),
		        'date_time' => $this->common->getDateTime(),
		        'added_by' => $this->common->user_session_data(1)
		    );

	    	/*image upload*/
	    	if ($_FILES['event_image']['name'] !== '') {


			$config['upload_path']          = './assets/images/club/';
	        $config['allowed_types']        = 'gif|jpg|png|jpeg';
	        $new_name = date('Ymd_his_').$_FILES["event_image"]['name'];
	        $config['file_name'] = $new_name;

			$this->upload->initialize($config);


	        if ( ! $this->upload->do_upload('event_image'))
	        {

		    		$data['success'] = $this->upload->display_errors();

		        	redirect('admin/club');
	        }
	        else
	        {
	                $data = array('upload_data' => $this->upload->data());

	                $notice_info['image'] = $data['upload_data']['file_name'];
	        }

	    	}else{
	    		unset($notice_info['image']);
	    	}
		/*image upload*/

            if(!empty($_POST['club_id'])){
                if ($_FILES['event_image']['name'] !== '' && $this->common->getAnyInfoRow('club', 'id', $_POST['club_id'])->image)
                    unlink(FCPATH . "/assets/images/club/" . $this->common->getAnyInfoRow('club', 'id', $_POST['club_id'])->image);

                $this->db->where('id',$_POST['club_id']);
                $this->db->update('club', $notice_info);
            }else{
                $this->db->insert('club', $notice_info);
            }
	        redirect('admin/club');
	    }
	}
	public function club_change_status($id, $status) {
        if ($id != null) {
            if ($status == 1) {
                $data['status'] = 0;
                $this->db->where('id', $id);
                $this->db->update('club', $data);
            } else {
                $data['status'] = 1;
                $this->db->where('id', $id);
                $this->db->update('club', $data);
            }
        }
        return redirect('admin/club');
    }
    public function delete_club($id) {
        if ($id != null) {
            $this->db->where('id',$id);
            $this->db->update('club', array('trash' => 1));
        }
        redirect('admin/club');
    }
	/* end club view/add/update/delete */

	/* start mujib_borsho view/add/update/delete */
	public function mujib_borsho(){
		$id = $this->common->user_session_data(1);
		$user_type = $this->common->user_session_data(2);
		if(empty($id))
			redirect(base_url().'login');

	    $data['success'] = '';


		$this->db->where("trash",0);
    	$this->db->order_by('id','asc');
		$data['all_content'] = $this->db->get('mujib_borsho')->result_array();

		$this->load->view('admin/header');
		$this->load->view('admin/mujib_borsho/all_content',$data);
		$this->load->view('admin/footer');
	}

	public function new_mujib_borsho_content(){
		$id = $this->common->user_session_data(1);
		$user_type = $this->common->user_session_data(2);
		if(empty($id))
			redirect(base_url().'login');

	    $data = array();
	    $data['title'] = 'Add new mujib borsho content ';
        $data['info']='';
        if(!empty($_GET['id'])){
            $data['info'] = $this->common->getAnyInfoRow('mujib_borsho','id',$_GET['id']);
        }

    	$data['success'] = 0;
		$this->load->view('admin/header');
		$this->load->view('admin/mujib_borsho/new_mujib_borsho_content',$data);
		$this->load->view('admin/footer');
	}

	public function new_mujib_borsho_content_insert() {
		$id = $this->common->user_session_data(1);
		$user_type = $this->common->user_session_data(2);
		if(empty($id))
			redirect(base_url().'login');

	    $data = array();
	    $data['title'] = 'Add new mujib borsho content';

	    $title = $this->form_validation->set_rules('title', 'Event title is', 'required');
	    $start_date = $this->form_validation->set_rules('start_date', 'Start date is', 'required');
	    $end_date = $this->form_validation->set_rules('end_date', 'End date is', 'required');
	    $description =  $this->form_validation->set_rules('description', 'Description is', 'required');
	    //$this->form_validation->set_rules('notice-image', 'Notice image', 'required');
	    //$notice_date = $this->form_validation->set_rules('notice-date', 'Notice Date is', 'required');


		/*
		if(empty($notice_title))
			redirect('notice');

		*/
	    $data['success'] = '';

	    if ($this->form_validation->run() === FALSE)
	    {
	    	$data['success'] = 0;
	        $this->load->view('admin/header', $data);
	        $this->load->view('admin/mujib_borsho/new_mujib_borsho_content',$data);
	        $this->load->view('admin/footer');
	    }
	    else
	    {
	    	$data['success'] = 1;
	    	$notice_info = array(
		        'title' => $this->input->post('title'),
		        'start_date' => $this->input->post('start_date'),
		        'end_date' => $this->input->post('end_date'),
		        'description' => $this->input->post('description'),
		        'location' => $this->input->post('location'),
		        'date' => $this->common->getDate(),
		        'date_time' => $this->common->getDateTime(),
		        'added_by' => $this->common->user_session_data(1)
		    );

	    	/*image upload*/
	    	if ($_FILES['event_image']['name'] !== ''){


			$config['upload_path']          = './assets/images/mujib_borsho/';
	        $config['allowed_types']        = 'gif|jpg|png|jpeg|mp4|mp3|pdf';
	        $new_name = date('Ymd_his_').$_FILES["event_image"]['name'];
	        $config['file_name'] = $new_name;

			$this->upload->initialize($config);


	        if ( ! $this->upload->do_upload('event_image'))
	        {

		    		$data['success'] = $this->upload->display_errors();

		        	redirect('admin/mujib_borsho');
	        }
	        else
	        {
	                $data = array('upload_data' => $this->upload->data());

	                $notice_info['image_or_video_name'] = $data['upload_data']['file_name'];
	        }

	    	}else{
	    		unset($notice_info['image_or_video_name']);
	    	}
		/*image upload*/

            if(!empty($_POST['event_id'])){
                if ($_FILES['event_image']['name'] !== '' && $this->common->getAnyInfoRow('mujib_borsho', 'id', $_POST['event_id'])->image_or_video_name)
                    unlink(FCPATH . "/assets/images/mujib_borsho/" . $this->common->getAnyInfoRow('mujib_borsho', 'id', $_POST['event_id'])->image_or_video_name);

                $this->db->where('id',$_POST['event_id']);
                $this->db->update('mujib_borsho', $notice_info);
            }else{
                $this->db->insert('mujib_borsho', $notice_info);
            }
	        redirect('admin/mujib_borsho');
	    }
	}
	public function mujib_borsho_change_status($id, $status) {

        if ($id != null) {
            if ($status == 1) {
                $data['status'] = 0;
                $this->db->where('id', $id);
                $this->db->update('mujib_borsho', $data);
            } else {
                $data['status'] = 1;
                $this->db->where('id', $id);
                $this->db->update('mujib_borsho', $data

                );
            }
        }
        return redirect('admin/mujib_borsho');
    }
    public function delete_mujib_borsho_content($id) {

        if ($id != null) {
            $this->db->where('id',$id);
            $this->db->update('mujib_borsho', array('trash' => 1));
        }
        redirect('admin/mujib_borsho');
    }
	/* end mujib_borsho view/add/update/delete */


	/* start muktijuddha_corner view/add/update/delete */
	public function muktijuddha_corner(){
		$id = $this->common->user_session_data(1);
		$user_type = $this->common->user_session_data(2);
		if(empty($id))
			redirect(base_url().'login');

	    $data['success'] = '';


		$this->db->where("trash",0);
    	$this->db->order_by('id','asc');
		$data['all_content'] = $this->db->get('muktijuddha_corner')->result_array();

		$this->load->view('admin/header');
		$this->load->view('admin/muktijuddha_corner/all_content',$data);
		$this->load->view('admin/footer');
	}

	public function new_muktijuddha_corner_content(){
		$id = $this->common->user_session_data(1);
		$user_type = $this->common->user_session_data(2);
		if(empty($id))
			redirect(base_url().'login');

	    $data = array();
	    $data['title'] = 'Add new muktijuddha corner content ';
        $data['info']='';
        if(!empty($_GET['id'])){
            $data['info'] = $this->common->getAnyInfoRow('muktijuddha_corner','id',$_GET['id']);
        }

    	$data['success'] = 0;
		$this->load->view('admin/header');
		$this->load->view('admin/muktijuddha_corner/new_muktijuddha_corner_content',$data);
		$this->load->view('admin/footer');
	}

	public function new_muktijuddha_corner_content_insert() {
		$id = $this->common->user_session_data(1);
		$user_type = $this->common->user_session_data(2);
		if(empty($id))
			redirect(base_url().'login');

	    $data = array();
	    $data['title'] = 'Add new muktijuddha corner content';

	    $title = $this->form_validation->set_rules('title', 'Event title is', 'required');
	    $description =  $this->form_validation->set_rules('description', 'Description is', 'required');
	    //$this->form_validation->set_rules('notice-image', 'Notice image', 'required');
	    //$notice_date = $this->form_validation->set_rules('notice-date', 'Notice Date is', 'required');


		/*
		if(empty($notice_title))
			redirect('notice');

		*/
	    $data['success'] = '';

	    if ($this->form_validation->run() === FALSE)
	    {
	    	$data['success'] = 0;
	        $this->load->view('admin/header', $data);
	        $this->load->view('admin/muktijuddha_corner/new_muktijuddha_corner_content',$data);
	        $this->load->view('admin/footer');
	    }
	    else
	    {
	    	$data['success'] = 1;
	    	$notice_info = array(
		        'title' => $this->input->post('title'),
		        'description' => $this->input->post('description'),
		        'date' => $this->common->getDate(),
		        'date_time' => $this->common->getDateTime(),
		        'added_by' => $this->common->user_session_data(1)
		    );

	    	/*image upload*/
	    	if ($_FILES['event_image']['name'] !== ''){


			$config['upload_path']          = './assets/images/muktijuddha_corner/';
	        $config['allowed_types']        = 'pdf|gif|jpg|png|jpeg|mp4|mp3';
	        $new_name = date('Ymd_his_').$_FILES["event_image"]['name'];
	        $config['file_name'] = $new_name;

			$this->upload->initialize($config);


	        if ( ! $this->upload->do_upload('event_image'))
	        {

		    		$data['success'] = $this->upload->display_errors();

		        	redirect('admin/muktijuddha_corner');
	        }
	        else
	        {
	                $data = array('upload_data' => $this->upload->data());

	                $notice_info['image_or_video_name'] = $data['upload_data']['file_name'];
	        }

	    	}else{
	    		unset($notice_info['image_or_video_name']);
	    	}
		/*image upload*/

            if(!empty($_POST['event_id'])){
                if ($_FILES['event_image']['name'] !== '' && $this->common->getAnyInfoRow('muktijuddha_corner', 'id', $_POST['event_id'])->image_or_video_name)
                    unlink(FCPATH . "/assets/images/muktijuddha_corner/" . $this->common->getAnyInfoRow('muktijuddha_corner', 'id', $_POST['event_id'])->image_or_video_name);

                $this->db->where('id',$_POST['event_id']);
                $this->db->update('muktijuddha_corner', $notice_info);
            }else{
                $this->db->insert('muktijuddha_corner', $notice_info);
            }
	        redirect('admin/muktijuddha_corner');
	    }
	}
	public function muktijuddha_corner_change_status($id, $status) {

        if ($id != null) {
            if ($status == 1) {
                $data['status'] = 0;
                $this->db->where('id', $id);
                $this->db->update('muktijuddha_corner', $data);
            } else {
                $data['status'] = 1;
                $this->db->where('id', $id);
                $this->db->update('muktijuddha_corner', $data

                );
            }
        }
        return redirect('admin/muktijuddha_corner');
    }
    public function delete_muktijuddha_corner_content($id) {

        if ($id != null) {
            $this->db->where('id',$id);
            $this->db->update('muktijuddha_corner', array('trash' => 1));
        }
        redirect('admin/muktijuddha_corner');
    }
	/* end muktijuddha_corner view/add/update/delete */

	/* start notice view/add/update/delete */
	public function notice(){
		$id = $this->common->user_session_data(1);
		$user_type = $this->common->user_session_data(2);
		if(empty($id))
			redirect(base_url().'login');

	    $data['success'] = '';


		$this->db->where("trash",0);
    	$this->db->order_by('id','desc');
		$data['all_notice'] = $this->db->get('notice')->result_array();

		$this->load->view('admin/header');
		$this->load->view('admin/notice/all_notice',$data);
		$this->load->view('admin/footer');
	}

	public function new_notice(){
		$id = $this->common->user_session_data(1);
		$user_type = $this->common->user_session_data(2);
		if(empty($id))
			redirect(base_url().'login');

	    $data = array();
	    $data['title'] = 'Create a new notice';
        $data['info']='';
        if(!empty($_GET['notice_id'])){
            $data['info'] = $this->common->getAnyInfoRow('notice','id',$_GET['notice_id']);
        }

    	$data['success'] = 0;
		$this->load->view('admin/header');
		$this->load->view('admin/notice/add_notice',$data);
		$this->load->view('admin/footer');
	}

	public function insert_notice() {
		$id = $this->common->user_session_data(1);
		$user_type = $this->common->user_session_data(2);
		if(empty($id))
			redirect(base_url().'login');

        $data['info']='';
        if(!empty($_GET['notice_id'])){
            $data['info'] = $this->common->getAnyInfoRow('notice','id',$_GET['notice_id']);
        }

	    $data = array();
	    $data['title'] = 'Create a new notice';

	    $notice_type = $this->form_validation->set_rules('notice_type', 'Notice type is', 'required');
	    $notice_title = $this->form_validation->set_rules('title', 'Notice Title is', 'required');
	    /*$notice_descr =  $this->form_validation->set_rules('description', 'Notice Description is', 'required');*/
	    //$this->form_validation->set_rules('notice-image', 'Notice image', 'required');
	    $notice_date = $this->form_validation->set_rules('notice-date', 'Notice Date is', 'required');


		/*
		if(empty($notice_title))
			redirect('notice');

		*/
	    $data['success'] = '';

	    if ($this->form_validation->run() === FALSE)
	    {
	    	$data['success'] = 0;
	        $this->load->view('admin/header', $data);
	        $this->load->view('admin/notice/add_notice',$data);
	        $this->load->view('admin/footer');
	    }
	    else
	    {
	    	$data['success'] = 1;
	    	$notice_info = array(
		        'notice_type' => $this->input->post('notice_type'),
		        'title' => $this->input->post('title'),
		        //'slug' => $slug,
		        'description' => $this->input->post('description'),
		        'date' => date('Y-m-d',strtotime($this->input->post('notice-date'))),
		        'date_time' => $this->input->post('notice-date'),
		        'is_breaking' => $this->input->post('is_breaking')
		    );

	    	/*image upload*/
	    	if ($_FILES['notice-image']['name'] !== ''){


			$config['upload_path']          = './assets/images/notice/';
	        $config['allowed_types']        = 'gif|jpg|png|pdf|';
	        $new_name = date('Ymd_his_').$_FILES["notice-image"]['name'];
	        $config['file_name'] = $new_name;

			$this->upload->initialize($config);


	        if ( ! $this->upload->do_upload('notice-image'))
	        {

		    		$data['success'] = $this->upload->display_errors();

		        	redirect('admin/notice');
	        }
	        else
	        {
	                $data = array('upload_data' => $this->upload->data());

	                $notice_info['image'] = $data['upload_data']['file_name'];
	        }

	    	}else{
	    		unset($notice_info['image']);
	    	}
		/*image upload*/

            if(!empty($_POST['notice_id'])){
                if ($_FILES['notice-image']['name'] !== '' && $this->common->getAnyInfoRow('notice', 'id', $_POST['notice_id'])->image)
                    unlink(FCPATH . "/assets/images/notice/" . $this->common->getAnyInfoRow('notice', 'id', $_POST['notice_id'])->image);

                $this->db->where('id',$_POST['notice_id']);
                $this->db->update('notice', $notice_info);
            }else{
                $this->db->insert('notice', $notice_info);
            }
	        redirect('admin/notice');
	    }
	}
	public function notice_change_status($id, $status) {

        if ($id != null) {
            if ($status == 1) {
                $data['status'] = 0;
                $this->db->where('id', $id);
                $this->db->update('notice', $data);
            } else {
                $data['status'] = 1;
                $this->db->where('id', $id);
                $this->db->update('notice', $data

                );
            }
        }
        return redirect('admin/notice/');
    }
    public function delete_notice($id) {

        if ($id != null) {
            $this->db->where('id',$id);
            $this->db->update('notice', array('trash' => 1));
        }
        redirect('admin/notice');
    }


    public function user_profile($user_id){
        $user_type_sess = $this->common->user_session_data(2);
        $user_id_sess = $this->common->user_session_data(3);
//        if($user_id != $user_id_sess)
//            redirect(base_url().'admin/user_profile/'.$user_id_sess);

        if(!empty($type)){
            $user_type = $type;
        }else{
            $user_type = $user_type_sess;
        }
        $data['info']='';
        $data['user_info']='';
        $data['user_type']=$user_type;
        if(!empty($_GET['is_view'])){
           $data['is_view']=$_GET['is_view'];
        }


		$this->db->where('trash',0);
		$this->db->where('status',1);
		$this->db->where('id !=',1);
		$data['all_dept'] = $this->db->get('dept')->result_array();

		$this->db->where('trash',0);
		$this->db->where('status',1);
		$this->db->order_by('id','DESC');
		$data['all_batch'] = $this->db->get('batch')->result_array();


		if(!empty($user_id)){
			$data['info'] = $this->common->getAnyInfoRow('admission','id',$user_id);
			$data['edu_info'] = $this->common->getAll('educational_info','admission_id',$user_id);
			$data['payment_info'] = $this->common->getAnyInfoRow('admission_payment','applicant_id',$user_id);
		}
        $this->load->view('admin/header');
        $this->load->view('admin/user_profile',$data);
        $this->load->view('admin/footer');
    }

	public function teacher(){
		$id = $this->common->user_session_data(1);
		$user_type = $this->common->user_session_data(2);
		if(empty($id))
			redirect(base_url().'login');

		$data['all_teacher'] = $this->common->getAll('teachers');

		$this->load->view('admin/header');
		$this->load->view('admin/teacher/all_teacher',$data);
		$this->load->view('admin/footer');
	}

	public function add_teacher(){
		$id = $this->common->user_session_data(1);
		$user_type = $this->common->user_session_data(2);
		$user_id = $this->common->user_session_data(3);
		if(empty($id))
			redirect(base_url().'login');


		if($user_type == $this->common->get_user_type('teacher'))
			redirect(base_url().'admin/user_profile/'.$user_id);



	    $data['success'] = '';
		$data['all_teacher'] = $this->common->getAll('teachers');

		$data['all_dept'] = $this->common->getAll('dept');

		$data['designation'] = $this->common->getAll('designation','type','2');

		$teacher_type = $this->common->get_user_type('teacher');

        $data['info']='';
        $data['user_info']='';
		if(!empty($_GET['teacher_id'])){
		    $data['info'] = $this->common->getAnyInfoRow('teachers','id',$_GET['teacher_id']);
		    $data['user_info'] = $this->common->getAnyInfoRow('password','user_id',$_GET['teacher_id'],'user_type',$teacher_type);
            $data['educational_info'] = $this->common->getAll('educational_info','user_id',$_GET['teacher_id'],'user_type',$teacher_type);
            $data['job_records'] = $this->common->getAll('job_records','user_id',$_GET['teacher_id'],'user_type',$teacher_type);
            $data['extra_info'] = $this->common->getAll('curricular_activities_info','user_id',$_GET['teacher_id'],'user_type',$teacher_type);
        }

		$this->load->view('admin/header');
		$this->load->view('admin/teacher/add_teacher',$data);
		$this->load->view('admin/footer');
	}

	public function insert_teacher(){
		$id = $this->common->user_session_data(1);
		$user_type = $this->common->user_session_data(2);
		if(empty($id))
			redirect(base_url().'login');


		$this->db->where('trash',0);
		$this->db->where('status',1);
		$data['all_dept'] = $this->db->get('dept')->result_array();

        $datetime= date('Ymdhis');

        /*$name = $this->form_validation->set_rules('name', 'Name is', 'required');
        $phone = $this->form_validation->set_rules('phone', 'Phone', 'required');*/
        /*$this->form_validation->set_rules('pass', 'Password', 'required');
		$this->form_validation->set_rules('con_pass', 'Confirm Password', 'required|matches[password]');*/

        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $phone = $this->input->post('phone');
        $father = $this->input->post('father_name');
        $mother = $this->input->post('mother_name');
        $nid = $this->input->post('nid');
        $dob = $this->input->post('dob');
        $gender = $this->input->post('gender');
        $present_addr = $this->input->post('present_addr');
        $permanent_addr = $this->input->post('permanent_addr');
        $dept = $this->input->post('dept');
        $designation = $this->input->post('desig');
        $joining_date = $this->input->post('joining_date');
        $pass = $this->input->post('pass');
        $con_pass = $this->input->post('con_pass');

            if(!empty($name) && !empty($email) && !empty($phone) && !empty($father) && !empty($mother) &&
                !empty($dob) && !empty($gender) && !empty($present_addr) && !empty($permanent_addr) &&
                !empty($dept) && !empty($designation) && !empty($joining_date) &&
                !empty($pass) && !empty($con_pass))
            {
                $data['success'] = 0;

                /*$this->form_validation->set_rules('pass', 'Password', 'required');
                $this->form_validation->set_rules('con_pass', 'Confirm Password', 'required|matches[password]');*/
                //$roll_check = $this->alumni_model->isAlumni($roll);
                echo $_GET['teacher_id'].'<br>';
                if(!empty($_GET['teacher_id'])){

                    $this->db->where('phone',$phone);
                    $this->db->where('trash','0');
                    $this->db->where('status','1');
                    $this->db->where('id !=',$_GET['teacher_id']);
                    $phone_check = $this->db->get('teachers');
                }else{
                    $phone_check = $this->common->getSpecificRows('teachers', 'phone', $phone);
                }
                echo $this->db->last_query();
                exit;

                $email_check = $this->common->getSpecificRows('teachers', 'email', $email);
                 if ($this->common->mobileNumberCheck($phone) == FALSE) {
                    $data['success'] = 0;
                    echo $this->session->set_flashdata("msg", "Invalid mobile number.");

                    return redirect('admin/add_teacher');
                } else {
                        if ($phone_check->num_rows() > 0) {
                            $data['success'] = 0;
                            echo $this->session->set_flashdata("msg", "A teacher already registered with this phone.");

                            return redirect('admin/add_teacher');
                        }else if ($email_check->num_rows > 0) {
                            $data['success'] = 0;
                            echo $this->session->set_flashdata("msg", "A teacher already registered with this email.");

                            return redirect('admin/add_teacher');
                        } else if ($pass != $con_pass) {
                            $data['success'] = 0;
                            echo $this->session->set_flashdata("msg", "Password & Confirm password don't match.");


                            return redirect('admin/add_teacher');
                        } else {
                            $this->admin_model->add_teacher();

                            $teacher_id = $this->common->getSpecificField('teachers', 'phone', $this->input->post('phone'), 'id');

                            $pass = $this->input->post('pass');
                            $pass_hash = md5(sha1(md5($pass)));
                            $data2 = array(
                                'user_type' => $this->common->get_user_type('teacher'),
                                'user_id' => $teacher_id,
                                'username' => $this->input->post('name'),
                                'email' => $this->input->post('email'),
                                'mobile' => $this->input->post('phone'),
                                'pass_hash' => $pass_hash,
                                'pass_view' => $pass
                            );
                            $this->db->insert('password', $data2);
	    	                $data['success'] = 1;

                            redirect('admin/teacher');
                        }
                    }
                }
            else{
                echo $this->session->set_flashdata("msg", "* Mark fields are required!!");
                $data['success'] = 0;
                return redirect('admin/add_teacher');
            }
	}

	public function update_teacher(){
		$id = $this->common->user_session_data(1);
		$user_type = $this->common->user_session_data(2);
		if(empty($id))
			redirect(base_url().'login');


		$this->db->where('trash',0);
		$this->db->where('status',1);
		$data['all_dept'] = $this->db->get('dept')->result_array();

        $datetime= date('Ymdhis');

        /*$name = $this->form_validation->set_rules('name', 'Name is', 'required');
        $phone = $this->form_validation->set_rules('phone', 'Phone', 'required');*/
        /*$this->form_validation->set_rules('pass', 'Password', 'required');
		$this->form_validation->set_rules('con_pass', 'Confirm Password', 'required|matches[password]');*/

        $teacher_id = $this->input->post('id');
        $user_type1 = $this->input->post('user_type1');
        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $phone = $this->input->post('phone');
        $father = $this->input->post('father_name');
        $mother = $this->input->post('mother_name');
        $nid = $this->input->post('nid');
        $dob = $this->input->post('dob');
        $gender = $this->input->post('gender');
        $present_addr = $this->input->post('present_addr');
        $permanent_addr = $this->input->post('permanent_addr');
        $dept = $this->input->post('dept');
        $designation = $this->input->post('desig');
        $joining_date = $this->input->post('joining_date');
        $pass = $this->input->post('pass');
        $con_pass = $this->input->post('con_pass');


        $edu_degree = $this->input->post('edu_degree');
        $edu_institution = $this->input->post('edu_institution');
        $edu_passing_year = $this->input->post('edu_passing_year');
        $edu_session = $this->input->post('edu_session');
        $edu_cgpa = $this->input->post('edu_cgpa');


        $job_info_org = $this->input->post('job_org_name');
        $job_info_desgination = $this->input->post('job_designation');
        $job_info_addr = $this->input->post('job_address');
        $job_info_start_date = $this->input->post('job_starting_date');
        $job_info_end_date = $this->input->post('job_ending_date');

        $extra_organization = $this->input->post('extra_organization');
        $extra_member_id = $this->input->post('extra_member_id');
        $extra_description = $this->input->post('extra_description');
              /*echo '<pre>';
              print_r($_POST);*/
            if(!empty($name) && !empty($email) && !empty($phone) && !empty($father) && !empty($mother) &&
                !empty($dob) && !empty($gender) && !empty($present_addr) && !empty($permanent_addr) &&
                !empty($dept) && !empty($designation) && !empty($joining_date) &&
                !empty($pass) && !empty($con_pass))
            {
                $data['success'] = 0;

                /*$this->form_validation->set_rules('pass', 'Password', 'required');
                $this->form_validation->set_rules('con_pass', 'Confirm Password', 'required|matches[password]');*/
                //$roll_check = $this->alumni_model->isAlumni($roll);
                $phone_check = $this->common->getSpecificRows('teachers', 'phone', $phone);
                $email_check = $this->common->getSpecificRows('teachers', 'email', $email);
                 if ($this->common->mobileNumberCheck($phone) == FALSE) {
                    $data['success'] = 0;
                    echo $this->session->set_flashdata("msg", "Invalid mobile number.");

                    return redirect('admin/user_profile/'.$teacher_id.'/'.$user_type1);
                } else {
                        /*if ($phone_check->num_rows() > 0) {
                            $data['success'] = 0;
                            echo $this->session->set_flashdata("msg", "A teacher already registered with this phone.");

                            return redirect('admin/user_profile/'.$teacher_id.'/'.$user_type1);
                        }else if ($email_check->num_rows > 0) {
                            $data['success'] = 0;
                            echo $this->session->set_flashdata("msg", "A teacher already registered with this email.");

                            return redirect('admin/user_profile/'.$teacher_id.'/'.$user_type1);
                        } else*/ if ($pass != $con_pass) {
                            $data['success'] = 0;
                            echo $this->session->set_flashdata("msg", "Password & Confirm password don't match.");


                            return redirect('admin/user_profile/'.$teacher_id.'/'.$user_type1);
                        } else {


                            //$teacher_id = $this->common->getSpecificField('teachers', 'phone', $this->input->post('phone'), 'id');

                            $pass_hash = md5(sha1(md5($pass)));
                            $data2 = array(
                                'email' => $email,
                                'mobile' => $phone,
                                'pass_hash' => $pass_hash,
                                'pass_view' => $pass
                            );
                            $this->db->where('user_id',$teacher_id);
                            $this->db->where('user_type',$user_type1);
                            $this->db->update('password', $data2);


                                if(!empty($edu_degree))
                                {
                                    $this->db->where('user_id',$teacher_id);
                                    $this->db->where('user_type',$user_type1);
                                    $this->db->delete('educational_info');

                                    $count_edu = count($edu_degree);

                                    //echo $count_edu;

                                    for ($i=0;$i<$count_edu;$i++)
                                    {
                                        $edu_data = array(
                                            'edu_degree' => $edu_degree[$i],
                                            'school_college_uni' => $edu_institution[$i],
                                            'edu_passing_year' => $edu_passing_year[$i],
                                            'edu_session' => $edu_session[$i],
                                            'edu_cgpa' => $edu_cgpa[$i],
                                            'user_id' => $teacher_id,
                                            'user_type' => $user_type1,
                                            'date' => date('Y-m-d')
                                        );

                                        $this->db->insert('educational_info', $edu_data);
                                    }
                                }


                                if(!empty($job_info_org))
                                {
                                    $this->db->where('user_id',$teacher_id);
                                    $this->db->where('user_type',$user_type1);
                                    $this->db->delete('job_records');

                                    $count_job_info = count($job_info_org);
                                    for ($i=0;$i<$count_job_info;$i++){
                                        if(!empty($job_info_org[$i])){
                                            $job_data = array(
                                                'organization_name' => $job_info_org[$i],
                                                'address' => $job_info_addr[$i],
                                                'designation' => $job_info_desgination[$i],
                                                'starting_date' => date('Y-m-d',strtotime($job_info_start_date[$i])),
                                                'ending_date' => date('Y-m-d',strtotime($job_info_end_date[$i])),
                                                'user_id' => $teacher_id,
                                                'user_type' => $user_type1,
                                                'date' => date('Y-m-d')
                                            );
                                            $this->db->insert('job_records', $job_data);
                                        }
                                    }
                                }

                                if(!empty($extra_organization))
                                {
                                    $this->db->where('user_id',$teacher_id);
                                    $this->db->where('user_type',$user_type1);
                                    $this->db->delete('curricular_activities_info');
                                    $count_extra_carri = count($extra_organization);
                                    for ($i=0;$i<$count_extra_carri;$i++)
                                    {
                                        if(!empty($extra_organization[$i])){
                                            $extra_data = array(
                                                'extra_organization' => $extra_organization[$i],
                                                'extra_member_id' => $extra_member_id[$i],
                                                'extra_description' => $extra_description[$i],
                                                'user_id' => $teacher_id,
                                                'user_type' => $user_type1,
                                                'date' => date('Y-m-d')
                                            );

                                            $this->db->insert('curricular_activities_info', $extra_data);
                                        }
                                    }
                                }

                            //$returnget = $this->admin_model->update_teacher($teacher_id,$user_type1);
                            //echo $returnget;



	    	                //if($returnget == 1){

	    	                    $data['success'] = 1;
                                echo $this->session->set_flashdata("msg", "Updated!!");
                                redirect('admin/user_profile/'.$teacher_id.'/'.$user_type1);
	    	                /*}else{

	    	                }*/


                        }
                    }
                }
            else{
                echo $this->session->set_flashdata("msg", "* Mark fields are required!!");
                $data['success'] = 0;
                return redirect('admin/user_profile/'.$teacher_id.'/'.$user_type1);
            }
	}

    public function delete_teacher($id) {

        if ($id != null) {
            $this->db->where('id',$id);
            $this->db->update('teachers', array('trash' => 1));
        }
        redirect('admin/teacher');
    }

    public function cv_upload($id) {
        $data['user_id'] = $user_id = $id;
        $data["info"] = $this->common->getAnyInfoRow('cv','user_id',$user_id,'user_type',$this->common->get_user_type('teacher'));
        $this->load->view('admin/header');
        $this->load->view('admin/teacher/cv',$data);
        $this->load->view('admin/footer');
    }

    public function teacher_cv_insert() {
        $id = $this->common->user_session_data(1);
        $user_type = $this->common->user_session_data(2);
        $user_id = $this->common->user_session_data(3);
        if(empty($id))
            redirect(base_url().'admin/');

        $data = array();
        $data['title'] = 'Add teacher\'s cv';

        $title = $this->form_validation->set_rules('title', 'Title is', 'required');
        $data['success'] = '';

        if ($this->form_validation->run() === FALSE)
        {
            $data['success'] = 0;
            return redirect('admin/dashboard');
        }
        else
        {
            $title = $this->input->post('title');
            $data['success'] = 1;
            $notice_info = array(
                'user_type' => $user_type,
                'user_id' => $user_id,
                'title' =>  $title,
                'date' => $this->common->getDate(),
                'date_time' => $this->common->getDateTime(),
                'added_by' => $this->common->user_session_data(1)
            );

            /*image upload*/
            if ($_FILES['cv_file']['name'] !== ''){
                $config['upload_path']          = './assets/doc/cv/';
                $config['allowed_types']        = 'jpg|png|jpeg|pdf';
                $new_name = date('Ymd_his_').$title;
                $config['file_name'] = $new_name;

                $this->upload->initialize($config);


                if ( ! $this->upload->do_upload('cv_file'))
                {

                    $data['success'] = $this->upload->display_errors();

                    redirect('admin/dashboard');
                } else {
                    $data = array('upload_data' => $this->upload->data());

                    $notice_info['file_name'] = $data['upload_data']['file_name'];
                }

            }else{
                unset($notice_info['file_name']);
            }
            /*image upload*/

            if(!empty($_POST['cv_id'])){
                if ($_FILES['cv_file']['name'] !== '' && $this->common->getAnyInfoRow('cv', 'id', $_POST['cv_id'])->file_name)
                    unlink(FCPATH . "/assets/doc/cv/" . $this->common->getAnyInfoRow('cv', 'id', $_POST['cv_id'])->file_name);

                $this->db->where('id',$_POST['cv_id']);
                $this->db->update('cv', $notice_info);
            }else{
                $this->db->insert('cv', $notice_info);
            }
            redirect('admin/dashboard');
        }
    }

    /* end teacher add/update/delete */

    /* start research_paper add/update/delete */

	public function research_paper(){
		$id = $this->common->user_session_data(1);
		$user_type = $this->common->user_session_data(2);
		$user_id = $this->common->user_session_data(3);
		if(empty($id))
			redirect(base_url().'login');

		if($user_type == $this->common->get_user_type('teacher')){
		    $data['all_paper'] = $this->common->getAll('research_paper','user_id',$user_id);
		}else{
		    $data['all_paper'] = $this->common->getAll('research_paper');
		}
		$data['all_dept'] = $this->common->getAll('dept');

		$this->load->view('admin/header');
		$this->load->view('admin/teacher/research_paper',$data);
		$this->load->view('admin/footer');
	}
	public function teacher_list_on_change()
    {
        $response = array();
        $response['success'] = 0;

        $dept_id = $_POST['dept_id'];

        $this->db->where('dept',$dept_id);
        $this->db->where('trash',0);
        $this->db->where('status',1);
        $teacher_by_dept = $this->db->get('teachers');

        $response['teacher_list'] = array();
        foreach ($teacher_by_dept->result_array() as $key => $value) {
            $post = array();
            $post['id'] = $value['id'];
            $post['name'] = $value['name'];

            array_push($response['teacher_list'],$post);
        }

        $response['success'] = 1;

        echo json_encode($response);
    }
	public function add_research_paper_old() {
		$id = $this->common->user_session_data(1);
		$user_type = $this->common->user_session_data(2);
		if(empty($id))
			redirect(base_url().'login');

	    $data = array();
	    $data['title'] = 'Add New research/publication paper';

	    /*$dept_id = $this->form_validation->set_rules('dept_id', 'Department is', 'required');
	    $teacher = $this->form_validation->set_rules('teacher', 'Teacher is', 'required');
	    $title =  $this->form_validation->set_rules('title', 'Title is', 'required');
	    $file_name = $this->form_validation->set_rules('file_name', 'File is', 'required');*/


	    $data['success'] = '';

	    if ($this->form_validation->run() === FALSE)
	    {
	    	$data['success'] = 0;

	        redirect('admin/research_paper');
	    }
	    else
	    {
	    	$data['success'] = 1;
	    	$paper_info = array(
		        'user_id' => $teacher,
		        'user_type' => $this->common->get_user_type('teacher'),
		        'title' => $this->input->post('title'),
		        'date' => date('Y-m-d')
		    );

	    	/*image upload*/
	    	if ($_FILES['paper_file']['name'] !== ''){


			$config['upload_path']          = './assets/doc/research_and_publication/';
	        $config['allowed_types']        = 'gif|jpg|png|pdf|';
	        $new_name = date('Ymd_his_').$_FILES["paper_file"]['name'];
	        $config['file_name'] = $new_name;

			$this->upload->initialize($config);


	        if ( ! $this->upload->do_upload('paper_file'))
	        {

		    		$data['success'] = $this->upload->display_errors();

		        	redirect('admin/research_paper');
	        }
	        else
	        {
	                $data = array('upload_data' => $this->upload->data());

	                $paper_info['file_name'] = $data['upload_data']['file_name'];
	        }

	    	}else{
	    		unset($paper_info['file_name']);
	    	}
		/*image upload*/

            if(!empty($_POST['paper_id'])){
                if ($_FILES['paper_file']['name'] !== '' && $this->common->getAnyInfoRow('research_paper', 'id', $_POST['paper_id'])->file_name)
                    unlink(FCPATH . "/assets/doc/research_and_publication/" . $this->common->getAnyInfoRow('research_paper', 'id', $_POST['paper_id'])->file_name);

                $this->db->where('id',$_POST['paper_id']);
                $this->db->update('research_paper', $paper_info);
            }else{
                $this->db->insert('research_paper', $paper_info);
            }
	        redirect('admin/research_paper');
	    }
	}
	public function add_research_paper() {
	    $added_by = $this->common->user_session_data(1);

        /*image upload*/
        if ($_FILES['paper_file']['name'] !== '') {
            $slider_image_info = array(
                'user_id' => $_POST['teacher'],
                'user_type' => $this->common->get_user_type('teacher'),
                'title' =>  $_POST['title'],
                'date' =>  date('Y-m-d'),
                'added_by' => $added_by,
            );

            $config['upload_path'] =  './assets/doc/research_and_publication/';
            $config['allowed_types'] = 'pdf|jpg|jpeg|png|gif';
            $config['max_size'] = '20000000';
            $config['max_width'] = '152400000';
            $config['max_height'] = '100000000';
            $this->upload->initialize($config);
            $this->load->library('upload', $config);
            $this->load->library('image_lib');
           // $upload = $this->upload->do_upload('class_routine');

            if ( ! $this->upload->do_upload('paper_file')) {
                    throw new Exception($this->upload->display_errors());
            } else {
                $data1 = array('upload_data' => $this->upload->data());
                $image = $data1['upload_data']['file_name'];

                $configBig = array();
                $configBig['image_library'] = 'gd2';
                $configBig['source_image'] = './assets/doc/research_and_publication/' . $image;
                $configBig['create_thumb'] = TRUE;
                $configBig['maintain_ratio'] = FALSE;
                unset($configBig);
                //unlink(FCPATH . "assets/doc/class_routine/" . $image);

                $filename1 = $data1['upload_data']['raw_name'] . $data1['upload_data']['file_ext'];
                $rename = date('Ymd_his_')  .$_POST['title']. $data1['upload_data']['file_ext'];
                rename('./assets/doc/research_and_publication/' . $filename1, './assets/doc/research_and_publication/' . $rename);

                if (!empty($_POST['paper_id'])) {
                    if ($_FILES['paper_file']['name'] !== '' && $this->common->getAnyInfoRow('research_paper', 'id', $_POST['paper_id'])->file_name )
                        unlink(FCPATH . "assets/doc/research_and_publication/" . $this->common->getAnyInfoRow('research_paper', 'id', $_POST['paper_id'])->file_name);

                    $slider_image_info['date_time'] = $this->common->getDateTime();
                    $slider_image_info['file_name'] = $rename;
                    $this->db->where('id', $_POST['paper_id']);
                    $this->db->update('research_paper', $slider_image_info);

                    $this->session->set_flashdata('feedback', "Updated Successfully");
                    $this->session->set_flashdata('feedback_class', 'alert-success');
                    return redirect('admin/research_paper/');
                } else {
                    $slider_image_info['date_time'] = $this->common->getDateTime();
                    $slider_image_info['file_name'] = $rename;
                    $this->db->insert('research_paper', $slider_image_info);

                    if ($this->db->insert_id() > 0) {
                        $this->session->set_flashdata('feedback', "Added Successfully");
                        $this->session->set_flashdata('feedback_class', 'alert-success');
                        return redirect('admin/research_paper/');
                    } else {
                        unset($slider_image_info['image']);
                        $this->session->set_flashdata('feedback', "Added Failed");
                        $this->session->set_flashdata('feedback_class', 'alert-danger');
                    }
                }
            }
        } else {
            $this->session->set_flashdata('feedback', "Information Incomplete");
            $this->session->set_flashdata('feedback_class', 'alert-danger');
        }


        /*image upload*/
        //return redirect('admin/class_routine/');

	}

    public function delete_research_paper($id) {

        if ($id != null) {
            $this->db->where('id',$id);
            $this->db->update('research_paper', array('trash' => 1));
        }
        redirect('admin/research_paper');
    }
    /* end research_paper add/update/delete */

	public function student(){
		$id = $this->common->user_session_data(1);
		$user_type = $this->common->user_session_data(2);
		if(empty($id))
			redirect(base_url().'login');

		$data['all_students'] = $this->common->getAll('admission','trash',0);

		$this->load->view('admin/header');
		$this->load->view('admin/student/all_students',$data);
		$this->load->view('admin/footer');
	}

	public function applicants_request($id, $status) {

		if ($id != null) {
			if ($status == 2) {
				$data['status'] = 2;
				$this->db->where('id', $id);
				$this->db->update('admission', $data);
			} elseif ($status == 3) {
				$data['status'] = 3;
				$this->db->where('id', $id);
				$this->db->update('admission', $data
				);
			}
		}
		return redirect('admin/student');
	}
	public function add_student(){
		$id = $this->common->user_session_data(1);
		$user_type = $this->common->user_session_data(2);
		if(empty($id))
			redirect(base_url().'login');
		$data['success'] = 0;

		$this->db->where('trash',0);
		$this->db->where('status',1);
		$this->db->where('id !=',1);
		$data['all_dept'] = $this->db->get('dept')->result_array();

		$this->db->where('trash',0);
		$this->db->where('status',1);
		$this->db->order_by('id','DESC');
		$data['all_batch'] = $this->db->get('batch')->result_array();

        $data['info']='';

        $data['user_info']='';
        if(!empty($_GET['student_id'])){
            $data['info'] = $this->common->getAnyInfoRow('students','id',$_GET['student_id']);
            $data['user_info'] = $this->common->getAnyInfoRow('password','user_id',$_GET['student_id']);
        }

		$this->load->view('admin/header');
		$this->load->view('admin/student/add_student',$data);
		$this->load->view('admin/footer');
	}

	public function insert_student(){
		$id = $this->common->user_session_data(1);
		$user_type = $this->common->user_session_data(2);
		if(empty($id))
			redirect(base_url().'login');


		$this->db->where('trash',0);
		$this->db->where('status',1);
		$this->db->where('id !=',1);
		$data['all_dept'] = $this->db->get('dept')->result_array();

		$this->db->where('trash',0);
		$this->db->where('status',1);
		$this->db->order_by('id','DESC');
		$data['all_batch'] = $this->db->get('batch')->result_array();

        $datetime= date('Ymdhis');

        $name = $this->form_validation->set_rules('name', 'Name is', 'required');
        $phone = $this->form_validation->set_rules('phone', 'Phone', 'required');
        //$this->form_validation->set_rules('pass', 'Password', 'required');
		//$this->form_validation->set_rules('con_pass', 'Confirm Password', 'required|matches[password]');

        if ($this->form_validation->run() === FALSE)
	    {
	    	$data['success'] = 0;
	        $this->load->view('admin/header', $data);
	        $this->load->view('admin/student/add_student',$data);
	        $this->load->view('admin/footer');
	    }
	    else
	    {
	    	$data['success'] = 1;
	        $this->admin_model->add_student();

	        $student_id = $this->common->getSpecificField('students','phone',$this->input->post('phone'),'id');

	        $pass = $this->input->post('pass');
	        $pass_hash = md5(sha1(md5($pass)));
	        $data2 = array(
	        	'user_type' => 4,
	        	'user_id' => $student_id,
	        	'username' => $this->input->post('name'),
	        	'email' => $this->input->post('email'),
	        	'mobile' => $this->input->post('phone'),
	        	'pass_hash' => $pass_hash,
	        	'pass_view' => $pass
	        );
            if(!empty($_POST['teacher_id'])){
                $this->db->where('user_id',$_POST['teacher_id']);
                $this->db->update('password',$data2);
            }
            else{
                $data2['user_id'] = $student_id;
                $this->db->insert('password', $data2);
            }
            if(!empty($_POST['is_profile_update'])){
                redirect('admin/user_profile/'.$_POST['id']);
            }
            else{
                redirect('admin/student');
            }

	    }
	}

    public function delete_student($id) {

        if ($id != null) {
            $this->db->where('id',$id);
            $this->db->update('admission', array('trash' => 1));
        }
        redirect('admin/student');
    }

	public function alumni(){
		$id = $this->common->user_session_data(1);
		$user_type = $this->common->user_session_data(2);
		if(empty($id))
			redirect(base_url().'login');

		$data['all_alumni'] = $this->common->getAll('students','is_student',2,'status',1);

		$this->load->view('admin/header');
		$this->load->view('admin/alumni/all_alumni',$data);
		$this->load->view('admin/footer');
	}

	public function add_alumni(){
		$id = $this->common->user_session_data(1);
		$user_type = $this->common->user_session_data(2);
		if(empty($id))
			redirect(base_url().'login');
		$data['success'] = 0;

		$this->db->where('trash',0);
		$this->db->where('status',1);
		$this->db->where('id !=',1);
		$data['all_dept'] = $this->db->get('dept')->result_array();

		$data['membership_type'] = $this->common->getAll('type_list','type_id',2);

        $data['membership_list'] = $this->common->alumniMembershipList();

        $data['all_batch'] =  $this->common->getAll('batch','','','','','id','desc');

        $alumni_type = $this->common->get_user_type('alumni');

        $data['info']='';
        $data['user_info']='';
		if(!empty($_GET['alumni_id'])){
		    $data['info'] = $this->common->getAnyInfoRow('students','id',$_GET['alumni_id']);
		    $data['user_info'] = $this->common->getAnyInfoRow('password','user_id',$_GET['alumni_id'],'user_type',$alumni_type);
            $data['educational_info'] = $this->common->getAll('educational_info','user_id',$_GET['alumni_id'],'user_type',$alumni_type);
            $data['job_records'] = $this->common->getAll('job_records','user_id',$_GET['alumni_id'],'user_type',$alumni_type);
            $data['extra_info'] = $this->common->getAll('curricular_activities_info','user_id',$_GET['alumni_id'],'user_type',$alumni_type);
        }

        $datetime= date('Ymdhis');

		$this->load->view('admin/header');
		$this->load->view('admin/alumni/add_alumni',$data);
		$this->load->view('admin/footer');
	}

	public function insert_alumni(){
		$id = $this->common->user_session_data(1);
		$user_type = $this->common->user_session_data(2);
		if(empty($id))
			redirect(base_url().'login');


		$this->db->where('trash',0);
		$this->db->where('status',1);
		$this->db->where('id !=',1);
		$data['all_dept'] = $this->db->get('dept')->result_array();

        $datetime= date('Ymdhis');

        $name = $this->form_validation->set_rules('name', 'Name is', 'required');
        $phone = $this->form_validation->set_rules('phone', 'Phone', 'required');
        //$this->form_validation->set_rules('pass', 'Password', 'required');
		//$this->form_validation->set_rules('con_pass', 'Confirm Password', 'required|matches[password]');

        if ($this->form_validation->run() === FALSE)
	    {
	    	$data['success'] = 0;
	        $this->load->view('admin/header', $data);
	        $this->load->view('admin/alumni/add_alumni',$data);
	        $this->load->view('admin/footer');
	    }
	    else
	    {
	    	$data['success'] = 1;
            $name = $this->input->post('name');
            $batch = $this->input->post('batch');
            $roll = $this->input->post('roll');
            $dept = $this->input->post('dept');
            $phone = $this->input->post('phone');
            $email = $this->input->post('email');
            $dob = $this->input->post('dob');
            $father = $this->input->post('father_name');
            $mother = $this->input->post('mother_name');
            $present_addr = $this->input->post('present_addr');
            $permanent_addr = $this->input->post('permanent_addr');
            $membership = $this->input->post('membership');
            $pass = $this->input->post('pass');
            $con_pass = $this->input->post('con_pass');
            $roll = $this->input->post('roll');

            if(!empty($name) && !empty($batch) && !empty($roll) &&
                !empty($dept) && !empty($phone) &&
                !empty($email) && !empty($dob) &&
                !empty($father) && !empty($mother) &&
                !empty($present_addr) && !empty($permanent_addr) &&
                !empty($membership) && !empty($pass) &&
                !empty($con_pass) && !empty($roll))
            {


                /*$this->form_validation->set_rules('pass', 'Password', 'required');
                $this->form_validation->set_rules('con_pass', 'Confirm Password', 'required|matches[password]');*/
                $roll_check = $this->alumni_model->isAlumni($roll);
                $phone_check = $this->common->getSpecificRows('students', 'phone', $phone);
                $email_check = $this->common->getSpecificRows('students', 'email', $email);
                if ($roll_check->num_rows() > 0) {
                    echo $this->session->set_flashdata("msg", "This alumni already registered!! Contact alumni admin for more information.");

                    $this->load->view('admin/header');
                    /*$this->load->view('public/alumni/alumni-header');*/
                    $this->load->view('admin/alumni/add_alumni', $data);
                    $this->load->view('admin/footer');
                } else {
                    //echo print_r($roll_check);
                        if ($this->common->mobileNumberCheck($phone) == FALSE) {
                            echo $this->session->set_flashdata("msg", "Invalid mobile number.");

                            $this->load->view('admin/header');
                            $this->load->view('admin/alumni/add_alumni', $data);
                            $this->load->view('admin/footer');
                        } else if ($phone_check->num_rows > 0) {
                            echo $this->session->set_flashdata("msg", "This alumni already registered with this phone. Contact alumni admin for more information.");

                            $this->load->view('admin/header');
                            $this->load->view('admin/alumni/add_alumni', $data);
                            $this->load->view('admin/footer');
                        } else if ($pass != $con_pass) {
                            echo $this->session->set_flashdata("msg", "Password & Confirm password not match.");


                            $this->load->view('admin/header');
                            $this->load->view('admin/alumni/add_alumni', $data);
                            $this->load->view('admin/footer');
                        } else {
                            $this->admin_model->add_alumni();


                            $student_id = $this->common->getSpecificField('students', 'roll', $this->input->post('roll'), 'id');
                            //$student_id = $last_inserted_id;

                            $pass = $this->input->post('pass');
                            $pass_hash = md5(sha1(md5($pass)));
                            $data2 = array(
                                'user_type' => $this->common->get_user_type('alumni'),
                                'user_id' => $student_id,
                                'roll' => $this->input->post('roll'),
                                'email' => $this->input->post('email'),
                                'mobile' => $this->input->post('phone'),
                                'pass_hash' => $pass_hash,
                                'pass_view' => $pass
                            );
                            $this->db->insert('password', $data2);


                            $alumni_table = array(
                                'student_id' => $student_id,
                                'membership' => $this->input->post('membership'),
                                'date' => date('Y-m-d'),
                                'added_by' => $id
                            );
                            $this->db->insert('alumni', $alumni_table);

                            redirect('admin/alumni');
                        }
                    }
                }
            else{
                    echo $this->session->set_flashdata("msg", "* Mark fields are required!!");
                    $data['success'] = 0;
                    $this->load->view('admin/header');
                    $this->load->view('admin/alumni/add_alumni',$data);
                    $this->load->view('admin/footer');
                }
	    }
	}

	public function alumni_join_request(){
		$id = $this->common->user_session_data(1);
		$user_type = $this->common->user_session_data(2);
		if(empty($id))
			redirect(base_url().'login');

		if(isset($_POST['accept'])){
			$request_id = $this->input->post('id');
			$accept_val = $this->input->post('accept');
			$this->db->where('id',$request_id);
			$this->db->set('status',$accept_val);
			$this->db->update('students');

			$this->db->where('user_type',$this->common->get_user_type('alumni'));
			$this->db->where('user_id',$request_id);
			$this->db->set('status',$accept_val);
			$this->db->update('password');

			$this->db->where('student_id',$request_id);
			$this->db->set('status',$accept_val);
			$this->db->update('alumni');
		}

		$data['all_alumni'] = $this->common->getAll('students','is_student',2,'status',0);

		$this->load->view('admin/header');
		$this->load->view('admin/alumni/alumni_join_request',$data);
		$this->load->view('admin/footer');
	}

	public function staff(){
		$id = $this->common->user_session_data(1);
		$user_type = $this->common->user_session_data(2);
		if(empty($id))
			redirect(base_url().'login');

		$data['all_staff'] = $this->common->getAll('staffs');

		$this->load->view('admin/header');
		$this->load->view('admin/staff/all_staff',$data);
		$this->load->view('admin/footer');
	}

	public function add_staff(){
		$id = $this->common->user_session_data(1);
		$user_type = $this->common->user_session_data(2);
		if(empty($id))
			redirect(base_url().'login');
		$data['success'] = 0;

        $data['all_dept'] = $this->common->getAll('dept');

        $data['designation'] = $this->common->getAll('designation','type','3');

        $data['info']='';
        $data['user_info']='';
        if(!empty($_GET['staff_id'])){
            $data['info'] = $this->common->getAnyInfoRow('staffs','id',$_GET['staff_id']);
            $data['user_info'] = $this->common->getAnyInfoRow('password','user_id',$_GET['staff_id']);
        }
		$this->load->view('admin/header');
		$this->load->view('admin/staff/add_staff',$data);
		$this->load->view('admin/footer');
	}

	public function insert_staff(){
		$id = $this->common->user_session_data(1);
		$user_type = $this->common->user_session_data(2);
		if(empty($id))
			redirect(base_url().'login');


		$this->db->where('trash',0);
		$this->db->where('status',1);
		//$this->db->where('id !=',1);
		$data['all_dept'] = $this->db->get('dept')->result_array();
		$data['designation'] = $this->common->getAll('designation','type',3);

        $datetime= date('Ymdhis');

        $name = $this->form_validation->set_rules('name', 'Name is', 'required');
        $phone = $this->form_validation->set_rules('phone', 'Phone', 'required');
        //$this->form_validation->set_rules('pass', 'Password', 'required');
		//$this->form_validation->set_rules('con_pass', 'Confirm Password', 'required|matches[password]');

        if ($this->form_validation->run() === FALSE)
	    {
	    	$data['success'] = 0;
	        $this->load->view('admin/header', $data);
	        $this->load->view('admin/staff/add_staff',$data);
	        $this->load->view('admin/footer');
	    }
	    else
	    {
	    	$data['success'] = 1;
	        $this->admin_model->add_staff();

	        $staff_id = $this->common->getSpecificField('staffs','phone',$this->input->post('phone'),'id');

	        $pass = $this->input->post('pass');
	        $pass_hash = md5(sha1(md5($pass)));
	        $data2 = array(
	        	'user_type' => 3,
	        	'username' => $this->input->post('name'),
	        	'email' => $this->input->post('email'),
	        	'mobile' => $this->input->post('phone'),
	        	'pass_hash' => $pass_hash,
	        	'pass_view' => $pass,
	        );
            if(!empty($_POST['staff_id'])){
                $this->db->where('user_id',$_POST['staff_id']);
                $this->db->update('password',$data2);
            }
            else{
                $data2['user_id'] = $staff_id;
                $this->db->insert('password', $data2);

            }
            if(!empty($_POST['is_profile_update'])){
                redirect('admin/user_profile/'.$_POST['id']);
            }
            else{

                redirect('admin/staff');
            }

	    }
	}

    public function delete_staff($id) {

        if ($id != null) {
            $this->db->where('id',$id);
            $this->db->update('staffs', array('trash' => 1));
        }
        redirect('admin/staff');
    }

	public function testUpload() {
	        $this->load->view('admin/header');
	        $this->load->view('admin/test');
	        $this->load->view('admin/footer');
	}

	public function do_upload() {
                $config['upload_path']          = './assets/';
                $config['allowed_types']        = 'gif|jpg|png';

				$this->upload->initialize($config);


                if ( ! $this->upload->do_upload('userfile'))
                {
                        $error = array('error' => $this->upload->display_errors());

                        $this->load->view('admin/header');
	        			$this->load->view('admin/test');
	        			$this->load->view('admin/footer');
                }
                else
                {
                        $data = array('sss' => $this->upload->data());

                        echo "<pre>";
                        print_r($data['sss']['file_name']);
                }
        }

    //...............................Slider Image Entry Functionality Start............................//
    public function slider_image_entry() {
        $data["info"] = "";
        if (!empty($_GET['id'])) {
            $data["info"] = $this->common->getAnyInfoRow('tbl_slider_image', 'id', $_GET['id']);
        }

        $data['all_dept'] = $this->common->getAll('dept');
        $this->load->view('admin/header');
        $this->load->view('admin/slider_image/slider_image_entry', $data);
        $this->load->view('admin/footer');
    }

    public function add_slider_image_entry() {
        $by = $this->common->user_session_data(1);

        /*image upload*/
        if ($_FILES['slider_image']['name'] !== '') {
            $slider_image_info = array(
                'alt' => $_POST['alt'],
                'dept_id' => $_POST['dept_id'],
                'posted_by' => $by,
            );

            $config['upload_path'] = './assets/images/slider_image/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['max_size'] = '200000';
            $config['max_width'] = '1524000';
            $config['max_height'] = '1000000';
            $this->upload->initialize($config);
            $this->load->library('upload', $config);
            $this->load->library('image_lib');
            $upload = $this->upload->do_upload('slider_image');
            if ($upload == true) {
                $data1 = array('upload_data' => $this->upload->data());
                $image = $data1['upload_data']['file_name'];
                $configBig = array();
                $configBig['image_library'] = 'gd2';
                $configBig['source_image'] = './assets/images/slider_image/' . $image;
                $configBig['create_thumb'] = TRUE;
                $configBig['maintain_ratio'] = FALSE;
                $configBig['width'] = 710;
                $configBig['height'] = 450;
                $configBig['thumb_marker'] = "_big";
                $this->image_lib->initialize($configBig);
                $this->image_lib->resize();
                $this->image_lib->clear();
                unset($configBig);
                $filename1 = $data1['upload_data']['raw_name'] . '_big' . $data1['upload_data']['file_ext'];
                $rename = date('Ymd_hi_') . $_POST['alt'] . ".jpg";
                rename('./assets/images/slider_image/' . $filename1, './assets/images/slider_image/' . $rename);
                unlink(FCPATH . "assets/images/slider_image/" . $image);
                $slider_image_info['image'] = $rename;
            }
            if (!empty($_POST['slider_image_id'])) {
                if ($_FILES['slider_image']['name'] !== '' && $this->common->getAnyInfoRow('tbl_slider_image', 'id', $_POST['slider_image_id'])->image )
                    unlink(FCPATH . "assets/images/slider_image/" . $this->common->getAnyInfoRow('tbl_slider_image', 'id', $_POST['slider_image_id'])->image);

                $slider_image_info['updated'] = $this->common->getDateTime();
                $this->db->where('id', $_POST['slider_image_id']);
                $this->db->update('tbl_slider_image', $slider_image_info);

                $this->session->set_flashdata('feedback', "Updated Successfully");
                $this->session->set_flashdata('feedback_class', 'alert-success');
                return redirect('admin/all_slider_image/');
            } else {
                $slider_image_info['created'] = $this->common->getDateTime();
                $this->db->insert('tbl_slider_image', $slider_image_info);

                if ($this->db->insert_id() > 0) {
                    $this->session->set_flashdata('feedback', "Added Successfully");
                    $this->session->set_flashdata('feedback_class', 'alert-success');
                    return redirect('admin/all_slider_image/');
                } else {
                    unset($slider_image_info['image']);
                    $this->session->set_flashdata('feedback', "Added Failed");
                    $this->session->set_flashdata('feedback_class', 'alert-danger');
                }
            }
        } else {
            $this->session->set_flashdata('feedback', "Information Incomplete");
            $this->session->set_flashdata('feedback_class', 'alert-danger');
        }
        /*image upload*/
        return redirect('admin/slider_image_entry/');
    }

    public function all_slider_image() {
        $data['all'] = $this->common->getAll('tbl_slider_image');
        $this->load->view('admin/header');
        $this->load->view('admin/slider_image/all_slider_image', $data);
        $this->load->view('admin/footer');
    }

    public function slider_image_change_status($id, $status) {

        if ($id != null) {
            if ($status == 1) {
                $data['status'] = 0;
                $this->db->where('id', $id);
                $this->db->update('tbl_slider_image', $data);
            } else {
                $data['status'] = 1;
                $this->db->where('id', $id);
                $this->db->update('tbl_slider_image', $data

                );
            }
        }
        return redirect('admin/all_slider_image/');
    }

    public function slider_image_change_class($id, $class) {

        if ($id != null) {
            if ($class == 0) {
                $data['class'] = 1;
                $this->db->where('id', $id);
                $this->db->update('tbl_slider_image', $data);

//                $data['class'] = 0;
//                $this->db->where_not_in('id', $id);
//                $this->db->update('tbl_slider_image', $data);

            } else {
                $data['class'] = 0;
                $this->db->where('id', $id);
                $this->db->update('tbl_slider_image', $data);
            }
        }
        return redirect('admin/all_slider_image/');
    }

    public function slider_image_delete($id) {

        if ($id != null) {
            if ($this->common->getAnyInfoRow('tbl_slider_image', 'id', $id)->image)
                unlink(FCPATH . "assets/images/slider_image/" . $this->common->getAnyInfoRow('tbl_slider_image', 'id', $id)->image);
            $this->db->delete('tbl_slider_image', array('id' => $id));
        }
        return redirect('admin/all_slider_image/');
    }
    //...............................Slider Image Entry Functionality End............................//

    //...............................head speech Entry Functionality Start............................//
    public function dept_head_speech_entry() {
        $data["info"] = "";
        if (!empty($_GET['id'])) {
            $data["info"] = $this->common->getAnyInfoRow('tbl_dept_head_speech', 'id', $_GET['id']);
        }
        $data['all_dept'] = $this->common->getAll('dept');
        $this->load->view('admin/header');
        $this->load->view('admin/dept_head_speech/dept_head_speech_entry', $data);
        $this->load->view('admin/footer');
    }

    public function add_dept_head_speech_entry() {
        $by = $this->common->user_session_data(1);

        $description = $_POST['description'];
        $dept_id = $_POST['dept_id'];

        if (!empty($description) && !empty($dept_id)) {
            $dept_head_speech_info = array(
                'dept_id' => $dept_id,
                'description' => $description,
                'posted_by' => $by,
            );

            if (!empty($_POST['dept_head_speech_id'])) {
                $dept_head_speech_info['updated'] = $this->common->getDateTime();
                $this->db->where('id', $_POST['dept_head_speech_id']);
                $this->db->update('tbl_dept_head_speech', $dept_head_speech_info);
                $this->session->set_flashdata('feedback', "Updated Successfully");
                $this->session->set_flashdata('feedback_class', 'alert-success');
                return redirect('admin/all_dept_head_speech');
            } else {
                $dept_head_speech_info['created'] = $this->common->getDateTime();
                $this->db->insert('tbl_dept_head_speech', $dept_head_speech_info);

                if ($this->db->insert_id() > 0) {
                    $this->session->set_flashdata('feedback', "Added Successfully");
                    $this->session->set_flashdata('feedback_class', 'alert-success');
                    return redirect('admin/all_dept_head_speech');
                } else {
                    $this->session->set_flashdata('feedback', "Added Failed");
                    $this->session->set_flashdata('feedback_class', 'alert-danger');
                }
            }


        } else {
            $this->session->set_flashdata('feedback', "Information Incomplete");
            $this->session->set_flashdata('feedback_class', 'alert-danger');
        }
        return redirect('admin/dept_head_speech_entry');
    }

    public function all_dept_head_speech() {
        $data['all'] = $this->common->getAll('tbl_dept_head_speech');
        $this->load->view('admin/header');
        $this->load->view('admin/dept_head_speech/all_dept_head_speech', $data);
        $this->load->view('admin/footer');
    }

    public function dept_head_speech_change_status($id, $status) {

        if ($id != null) {
            if ($status == 1) {
                $data['status'] = 0;
                $this->db->where('id', $id);
                $this->db->update('tbl_dept_head_speech', $data);
            } else {
                $data['status'] = 1;
                $this->db->where('id', $id);
                $this->db->update('tbl_dept_head_speech', $data

                );
            }
        }
        return redirect('admin/all_dept_head_speech');
    }

    public function dept_head_speech_delete($id) {

        if ($id != null)
            $this->db->delete('tbl_dept_head_speech', array('id' => $id));

        return redirect('admin/all_dept_head_speech');
    }
    //...............................head speech Functionality End............................//

    //...............................lab info Entry Functionality Start............................//
    public function lab_info_entry() {
        $data["info"] = "";
        if (!empty($_GET['id'])) {
            $data["info"] = $this->common->getAnyInfoRow('tbl_lab_info', 'id', $_GET['id']);
        }
        $data['all_dept'] = $this->common->getAll('dept');
        $this->load->view('admin/header');
        $this->load->view('admin/lab_info/lab_info_entry', $data);
        $this->load->view('admin/footer');
    }

    public function add_lab_info_entry() {
        $by = $this->common->user_session_data(1);

        $dept_id = $_POST['dept_id'];
        $lab_info_text = $_POST['lab_info_text'];

        if (!empty($dept_id) && !empty($lab_info_text)) {
            $lab_info_info = array(
                'title' => $_POST['lab_info_title'],
                'dept_id' => $dept_id,
                'description' => $lab_info_text,
                'posted_by' => $by,
            );

            /*image upload*/
            if ($_FILES['lab_info_image']['name'] !== '') {

                $config['upload_path'] = './assets/images/lab_info/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['max_size'] = '200000';
                $config['max_width'] = '1524000';
                $config['max_height'] = '1000000';
                $this->upload->initialize($config);
                $this->load->library('upload', $config);
                $this->load->library('image_lib');
                $upload = $this->upload->do_upload('lab_info_image');
                if ($upload == true) {
                    $data1 = array('upload_data' => $this->upload->data());
                    $image = $data1['upload_data']['file_name'];
                    $configBig = array();
                    $configBig['image_library'] = 'gd2';
                    $configBig['source_image'] = './assets/images/lab_info/' . $image;
                    $configBig['create_thumb'] = TRUE;
                    $configBig['maintain_ratio'] = FALSE;
                    $configBig['width'] = 80;
                    $configBig['height'] = 80;
                    $configBig['thumb_marker'] = "_big";
                    $this->image_lib->initialize($configBig);
                    $this->image_lib->resize();
                    $this->image_lib->clear();
                    unset($configBig);
                    $filename1 = $data1['upload_data']['raw_name'] . '_big' . $data1['upload_data']['file_ext'];
                    $rename = date('Ymd_his_') .$dept_id . ".jpg";
                    rename('./assets/images/lab_info/' . $filename1, './assets/images/lab_info/' . $rename);
                    unlink(FCPATH . "assets/images/lab_info/" . $image);
                    $lab_info_info['file_name'] = $rename;
                }
            } else {
                unset($lab_info_info['file_name']);
            }
            /*image upload*/

            if (!empty($_POST['lab_info_id'])) {
                if ($_FILES['lab_info_image']['name'] !== '')
                    unlink(FCPATH . "/assets/images/lab_info/" . $this->common->getAnyInfoRow('tbl_lab_info', 'id', $_POST['lab_info_id'])->file_name);

                $lab_info_info['updated'] = $this->common->getDateTime();
                $this->db->where('id', $_POST['lab_info_id']);
                $this->db->update('tbl_lab_info', $lab_info_info);
                $this->session->set_flashdata('feedback', "Updated Successfully");
                $this->session->set_flashdata('feedback_class', 'alert-success');
                return redirect('admin/all_lab_info');
            } else {
                $lab_info_info['created'] = $this->common->getDateTime();
                $this->db->insert('tbl_lab_info', $lab_info_info);

                if ($this->db->insert_id() > 0) {
                    $this->session->set_flashdata('feedback', "Added Successfully");
                    $this->session->set_flashdata('feedback_class', 'alert-success');
                    return redirect('admin/all_lab_info');
                } else {
                    $this->session->set_flashdata('feedback', "Added Failed");
                    $this->session->set_flashdata('feedback_class', 'alert-danger');
                }
            }


        } else {
            $this->session->set_flashdata('feedback', "Information Incomplete");
            $this->session->set_flashdata('feedback_class', 'alert-danger');
        }
        return redirect('admin/lab_info_entry');
    }

    public function all_lab_info() {
        $data['all'] = $this->common->getAll('tbl_lab_info');
        $this->load->view('admin/header');
        $this->load->view('admin/lab_info/all_lab_info', $data);
        $this->load->view('admin/footer');
    }

    public function lab_info_change_status($id, $status) {

        if ($id != null) {
            if ($status == 1) {
                $data['status'] = 0;
                $this->db->where('id', $id);
                $this->db->update('tbl_lab_info', $data);
            } else {
                $data['status'] = 1;
                $this->db->where('id', $id);
                $this->db->update('tbl_lab_info', $data

                );
            }
        }
        return redirect('admin/all_lab_info');
    }

    public function lab_info_delete($id) {

        if ($id != null) {
            if ($this->common->getAnyInfoRow('tbl_lab_info', 'id', $id)->file_name)
                unlink(FCPATH . "/assets/images/lab_info/" . $this->common->getAnyInfoRow('tbl_lab_info', 'id', $id)->file_name);
            $this->db->delete('tbl_lab_info', array('id' => $id));
        }
        return redirect('admin/all_lab_info');
    }
    //...............................lab_info Entry Functionality End............................//

    /* start mission-vision area */

    public function mission_vision($id=null) {
        if(!empty($id)){

                $dept_id = $_POST['dept_id'];
                $dept_mission = $_POST['dept_mission'];

                if (!empty($dept_mission) && !empty($dept_id)) {
                    $dept_mission_info = array(
                        'dept_id' => $dept_id,
                        'mission_vision' => $dept_mission
                    );

                    if (!empty($_POST['dept_head_speech_id'])) {
                        $dept_mission_info['updated'] = $this->common->getDateTime();
                        $this->db->where('id', $_POST['dept_id']);
                        $this->db->update('dept', $dept_mission_info);
                        $this->session->set_flashdata('feedback', "Updated Successfully");
                        $this->session->set_flashdata('feedback_class', 'alert-success');
                        return redirect('admin/mission_vision');
                    }
                }

        }else{
            $data['all'] = $this->common->getAll('dept');

        }
        $this->load->view('admin/header');
        $this->load->view('admin/dept/mission_vision', $data);
        $this->load->view('admin/footer');
    }
    /* end mission-vision area */

    /* start academic curriculum area */
    public function academic_curriculum() {
        $data['all'] = $this->common->getAll('dept');
        $this->load->view('admin/header');
        $this->load->view('admin/dept/academic_curriculum', $data);
        $this->load->view('admin/footer');
    }
    /* end academic curriculum area */


    /* start photo gallery */
    public function photo_gallery() {
        $data["info"] = $this->common->getAll('photo_gallery','status',1);

        $this->load->view('admin/header');
        $this->load->view('admin/photo_gallery/all_photo_gallery', $data);
        $this->load->view('admin/footer');
    }

    public function add_photo_gallery() {
        $data["info"] = "";
        if (!empty($_GET['id'])) {
            $data["info"] = $this->common->getAnyInfoRow('photo_gallery','status',1);
        }

        $data['all_dept'] = $this->common->getAll('dept');
        $this->load->view('admin/header');
        $this->load->view('admin/photo_gallery/add_photo_gallery', $data);
        $this->load->view('admin/footer');
    }

    public function photo_gallery_entry() {
        $by = $this->common->user_session_data(1);

        /*image upload*/
        if ($_FILES['gallery_image']['name'] !== '') {
            $slider_image_info = array(
                'alt' => $_POST['alt'],
                'dept' => $_POST['dept_id'],
                'added_by' => $by,
            );

            $config['upload_path'] = './assets/images/photo_gallery/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['max_size'] = '200000';
            $config['max_width'] = '1524000';
            $config['max_height'] = '1000000';
            $this->upload->initialize($config);
            $this->load->library('upload', $config);
            $this->load->library('image_lib');
            $upload = $this->upload->do_upload('gallery_image');
            if ($upload == true) {
                $data1 = array('upload_data' => $this->upload->data());
                $image = $data1['upload_data']['file_name'];
                $configBig = array();
                $configBig['image_library'] = 'gd2';
                $configBig['source_image'] = './assets/images/photo_gallery/' . $image;
                $configBig['create_thumb'] = TRUE;
                $configBig['maintain_ratio'] = FALSE;
                $configBig['width'] = 710;
                $configBig['height'] = 450;
                $configBig['thumb_marker'] = "_big";
                $this->image_lib->initialize($configBig);
                $this->image_lib->resize();
                $this->image_lib->clear();
                unset($configBig);
                $filename1 = $data1['upload_data']['raw_name'] . '_big' . $data1['upload_data']['file_ext'];
                $rename = date('Ymd_hi_') . $_POST['alt'] . ".jpg";
                rename('./assets/images/photo_gallery/' . $filename1, './assets/images/photo_gallery/' . $rename);
                unlink(FCPATH . "assets/images/photo_gallery/" . $image);
                $slider_image_info['image'] = $rename;
            }
            if (!empty($_POST['gallery_image_id'])) {
                if ($_FILES['gallery_image']['name'] !== '' && $this->common->getAnyInfoRow('photo_gallery', 'id', $_POST['gallery_image_id'])->image )
                    unlink(FCPATH . "assets/images/photo_gallery/" . $this->common->getAnyInfoRow('photo_gallery', 'id', $_POST['gallery_image_id'])->image);

                $slider_image_info['date_time'] = $this->common->getDateTime();
                $this->db->where('id', $_POST['gallery_image_id']);
                $this->db->update('photo_gallery', $slider_image_info);

                $this->session->set_flashdata('feedback', "Updated Successfully");
                $this->session->set_flashdata('feedback_class', 'alert-success');
                return redirect('admin/photo_gallery/');
            } else {
                $slider_image_info['date_time'] = $this->common->getDateTime();
                $this->db->insert('photo_gallery', $slider_image_info);

                if ($this->db->insert_id() > 0) {
                    $this->session->set_flashdata('feedback', "Added Successfully");
                    $this->session->set_flashdata('feedback_class', 'alert-success');
                    return redirect('admin/photo_gallery/');
                } else {
                    unset($slider_image_info['image']);
                    $this->session->set_flashdata('feedback', "Added Failed");
                    $this->session->set_flashdata('feedback_class', 'alert-danger');
                }
            }
        } else {
            $this->session->set_flashdata('feedback', "Information Incomplete");
            $this->session->set_flashdata('feedback_class', 'alert-danger');
        }
        /*image upload*/
        return redirect('admin/photo_gallery/');
    }

    public function gallery_image_change_status($id, $status) {

        if ($id != null) {
            if ($status == 1) {
                $data['status'] = 0;
                $this->db->where('id', $id);
                $this->db->update('photo_gallery', $data);
            } else {
                $data['status'] = 1;
                $this->db->where('id', $id);
                $this->db->update('photo_gallery', $data

                );
            }
        }
        return redirect('admin/photo_gallery/');
    }

    public function slider_image_change_class1($id, $class) {

        if ($id != null) {
            if ($class == 0) {
                $data['class'] = 1;
                $this->db->where('id', $id);
                $this->db->update('tbl_slider_image', $data);

//                $data['class'] = 0;
//                $this->db->where_not_in('id', $id);
//                $this->db->update('tbl_slider_image', $data);

            } else {
                $data['class'] = 0;
                $this->db->where('id', $id);
                $this->db->update('tbl_slider_image', $data);
            }
        }
        return redirect('admin/all_slider_image/');
    }

    public function delete_photo_gallery($id) {

        /*if ($id != null) {
            if ($this->common->getAnyInfoRow('tbl_slider_image', 'id', $id)->image)
                unlink(FCPATH . "assets/images/slider_image/" . $this->common->getAnyInfoRow('tbl_slider_image', 'id', $id)->image);
            $this->db->delete('tbl_slider_image', array('id' => $id));
        }*/
        if($id !== null){
            $this->db->set('trash',1);
            $this->db->where('id',$id);
            $this->db->update('photo_gallery');
        }
        return redirect('admin/photo_gallery/');
    }
    /* end photo gallery */

    /* start class routine */
    public function class_routine(){
        $data["info"] = "";
        if (!empty($_GET['id'])) {
            $data["info"] = $this->common->getAnyInfoRow('class_routine','id',$_GET['id']);
        }else{
        $data["info"] = $this->common->getAll('class_routine','status',1);
        }
        //$data['all_dept'] = $this->common->getAll('dept');
        $this->load->view('admin/header');
        $this->load->view('admin/class_routine/all_routine', $data);
        $this->load->view('admin/footer');
    }

    public function add_routine(){
        $data["info"] = "";
        if (!empty($_GET['id'])) {
            $data["info"] = $this->common->getAnyInfoRow('class_routine','id',$_GET['id']);
        }
        $this->db->where('trash',0);
        $this->db->where('status',1);
        $this->db->where('id !=',1);
        $data['all_dept'] = $this->db->get('dept')->result_array();

        $data['all_batch'] = $this->common->getAll('batch');
        $this->load->view('admin/header');
        $this->load->view('admin/class_routine/add_routine', $data);
        $this->load->view('admin/footer');
    }

    public function add_routine_entry(){
        $by = $this->common->user_session_data(1);

        /*image upload*/
        if ($_FILES['class_routine']['name'] !== '') {
            $slider_image_info = array(
                'dept' => $_POST['dept_id'],
                'batch' => $_POST['batch'],
                'title' =>  $_POST['title'],
                'added_by' => $by,
            );

            $config['upload_path'] =  './assets/doc/class_routine/';
            $config['allowed_types'] = 'pdf|jpg|jpeg|png|gif';
            $config['max_size'] = '20000000';
            $config['max_width'] = '152400000';
            $config['max_height'] = '100000000';
            $this->upload->initialize($config);
            $this->load->library('upload', $config);
            $this->load->library('image_lib');
           // $upload = $this->upload->do_upload('class_routine');

            if ( ! $this->upload->do_upload('class_routine')) {
                    throw new Exception($this->upload->display_errors());
            } else {
                $data1 = array('upload_data' => $this->upload->data());
                $image = $data1['upload_data']['file_name'];

                $configBig = array();
                $configBig['image_library'] = 'gd2';
                $configBig['source_image'] = './assets/doc/class_routine/' . $image;
                $configBig['create_thumb'] = TRUE;
                $configBig['maintain_ratio'] = FALSE;
                unset($configBig);
                //unlink(FCPATH . "assets/doc/class_routine/" . $image);

                $filename1 = $data1['upload_data']['raw_name'] . $data1['upload_data']['file_ext'];
                $rename = date('Ymd_his_')  .$_POST['title']. $data1['upload_data']['file_ext'];
                rename('./assets/doc/class_routine/' . $filename1, './assets/doc/class_routine/' . $rename);

                if (!empty($_POST['routine_id'])) {
                    if ($_FILES['class_routine']['name'] !== '' && $this->common->getAnyInfoRow('class_routine', 'id', $_POST['routine_id'])->file_name )
                        unlink(FCPATH . "assets/doc/class_routine/" . $this->common->getAnyInfoRow('class_routine', 'id', $_POST['routine_id'])->file_name);

                    $slider_image_info['date_time'] = $this->common->getDateTime();
                    $slider_image_info['file_name'] = $rename;
                    $this->db->where('id', $_POST['routine_id']);
                    $this->db->update('class_routine', $slider_image_info);

                    $this->session->set_flashdata('feedback', "Updated Successfully");
                    $this->session->set_flashdata('feedback_class', 'alert-success');
                    return redirect('admin/class_routine/');
                } else {
                    $slider_image_info['date_time'] = $this->common->getDateTime();
                    $slider_image_info['file_name'] = $rename;
                    $this->db->insert('class_routine', $slider_image_info);

                    if ($this->db->insert_id() > 0) {
                        $this->session->set_flashdata('feedback', "Added Successfully");
                        $this->session->set_flashdata('feedback_class', 'alert-success');
                        return redirect('admin/class_routine/');
                    } else {
                        unset($slider_image_info['image']);
                        $this->session->set_flashdata('feedback', "Added Failed");
                        $this->session->set_flashdata('feedback_class', 'alert-danger');
                    }
                }
            }
        } else {
            $this->session->set_flashdata('feedback', "Information Incomplete");
            $this->session->set_flashdata('feedback_class', 'alert-danger');
        }


        /*image upload*/
        //return redirect('admin/class_routine/');
    }

    function routine_change_status($id,$status){

        if ($id != null) {
            if ($status == 0) {
                $data['status'] = 1;
                $this->db->where('id', $id);
                $this->db->update('class_routine', $data);

//                $data['class'] = 0;
//                $this->db->where_not_in('id', $id);
//                $this->db->update('tbl_slider_image', $data);

            } else {
                $data['status'] = 0;
                $this->db->where('id', $id);
                $this->db->update('class_routine', $data);
            }
        }
        return redirect('admin/class_routine/');
    }

    function delete_routine($id){
        if(!empty($id)){
            $this->db->set('trash',1);
            $this->db->where('id',$id);
            $this->db->update('class_routine');
            return redirect('admin/class_routine/');
            $this->session->set_flashdata('feedback', "Successfully successfully deleted");
            $this->session->set_flashdata('feedback_class', 'alert-warning');
        }
    }
    /* end class routine */

    /* start important link */
    public function important_link(){
        $data["info"] = "";
        if (!empty($_GET['id'])) {
            $data["info"] = $this->common->getAnyInfoRow('important_links','id',$_GET['id']);
        }else{
        $data["info"] = $this->common->getAll('important_links','trash',0);
        }
        //$data['all_dept'] = $this->common->getAll('dept');
        $this->load->view('admin/header');
        $this->load->view('admin/important_links/all_important_links', $data);
        $this->load->view('admin/footer');
    }

    public function add_important_link(){
        $data["info"] = "";
        if (!empty($_GET['id'])) {
            $data["info"] = $this->common->getAnyInfoRow('important_links','id',$_GET['id']);
        }

        $this->load->view('admin/header');
        $this->load->view('admin/important_links/add_important_link', $data);
        $this->load->view('admin/footer');
    }

    public function add_important_link_entry(){
        $by = $this->common->user_session_data(1);

        $title = $_POST['title'];
        $link = $_POST['link'];
        $link_id = $_POST['link_id'];

        if (!empty($title) && !empty($link)) {
            $link_info = array(
                'title' => $title,
                'link' => $link,
                'date' => $this->common->getDate(),
                'added_by' => $by,
            );

            if (!empty($_POST['link_id'])) {
                $this->db->where('id', $_POST['link_id']);
                $this->db->update('important_links', $link_info);
                $this->session->set_flashdata('feedback', "Updated Successfully");
                $this->session->set_flashdata('feedback_class', 'alert-success');
                return redirect('admin/important_link');
            } else {
                $link_info['date_time'] = $this->common->getDateTime();
                $this->db->insert('important_links', $link_info);

                if ($this->db->insert_id() > 0) {
                    $this->session->set_flashdata('feedback', "Added Successfully");
                    $this->session->set_flashdata('feedback_class', 'alert-success');
                    return redirect('admin/important_link');
                } else {
                    $this->session->set_flashdata('feedback', "Added Failed");
                    $this->session->set_flashdata('feedback_class', 'alert-danger');
                }
            }


        } else {
            $this->session->set_flashdata('feedback', "Information Incomplete");
            $this->session->set_flashdata('feedback_class', 'alert-danger');
        }
        return redirect('admin/important_link');

        $data["info"] = "";
        if (!empty($_GET['id'])) {
            $data["info"] = $this->common->getAnyInfoRow('important_links','id',$_GET['id']);
        }

        $this->load->view('admin/header');
        $this->load->view('admin/important_links/add_important_link', $data);
        $this->load->view('admin/footer');
    }

    function link_change_status($id,$status){
        if ($id != null) {
            if ($status == 0) {
                $data['status'] = 1;
                $this->db->where('id', $id);
                $this->db->update('important_links', $data);
            } else {
                $data['status'] = 0;
                $this->db->where('id', $id);
                $this->db->update('important_links', $data);
            }
        }
        return redirect('admin/important_link/');
    }

    function delete_important_link($id){
        if(!empty($id)){
            $this->db->set('trash',1);
            $this->db->where('id',$id);
            $this->db->update('important_links');
            return redirect('admin/important_link/');
            $this->session->set_flashdata('feedback', "Successfully deleted");
            $this->session->set_flashdata('feedback_class', 'alert-warning');
        }
    }
    /* end important link */

    /* start Batch add/update/delete */
    public function batch(){
        $data["info"] = "";
        $data["info"] = $this->common->getAll('batch','','','','','id','desc');
        //$data['all_dept'] = $this->common->getAll('dept');
        $this->load->view('admin/header');
        $this->load->view('admin/batch/all_batch', $data);
        $this->load->view('admin/footer');
    }

    public function add_batch(){
        $data["info"] = "";
        if (!empty($_GET['id'])) {
            $data["info"] = $this->common->getAnyInfoRow('batch','id',$_GET['id']);
        }

        $this->load->view('admin/header');
        $this->load->view('admin/batch/add_batch', $data);
        $this->load->view('admin/footer');
    }

    public function add_batch_entry(){
        $by = $this->common->user_session_data(1);

        $name = $_POST['name'];
        $batch_id = $_POST['batch_id'];

        if (!empty($name)) {
            $batch_info = array(
                'name' => $name,
                'date' => $this->common->getDate(),
                'added_by' => $by,
            );

            if (!empty($_POST['batch_id'])) {
                $this->db->where('id', $_POST['batch_id']);
                $this->db->update('batch', $batch_info);
                $this->session->set_flashdata('feedback', "Updated Successfully");
                $this->session->set_flashdata('feedback_class', 'alert-success');
                return redirect('admin/batch');
            } else {
                $link_info['date_time'] = $this->common->getDateTime();
                $this->db->insert('batch', $batch_info);

                if ($this->db->insert_id() > 0) {
                    $this->session->set_flashdata('feedback', "Added Successfully");
                    $this->session->set_flashdata('feedback_class', 'alert-success');
                    return redirect('admin/batch');
                } else {
                    $this->session->set_flashdata('feedback', "Added Failed");
                    $this->session->set_flashdata('feedback_class', 'alert-danger');
                }
            }


        } else {
            $this->session->set_flashdata('feedback', "Information Incomplete");
            $this->session->set_flashdata('feedback_class', 'alert-danger');
        }
        return redirect('admin/batch');

        $data["info"] = "";
        if (!empty($_GET['id'])) {
            $data["info"] = $this->common->getAnyInfoRow('batch','id',$_GET['id']);
        }

        $this->load->view('admin/header');
        $this->load->view('admin/batch/add_batch', $data);
        $this->load->view('admin/footer');
    }

    function delete_batch($id){
        if(!empty($id)){
            $this->db->set('trash',1);
            $this->db->where('id',$id);
            $this->db->update('batch');
            return redirect('admin/batch/');
            $this->session->set_flashdata('feedback', "Successfully deleted");
            $this->session->set_flashdata('feedback_class', 'alert-warning');
        }
    }
    /* end Batch add/update/delete */

    /* start administration_list add/update/delete */
    public function administration_list(){
        $data["info"] = "";
        $data["info"] = $this->common->getAll('administration_list','','','','','name','asc');
        //$data['all_dept'] = $this->common->getAll('dept');
        $this->load->view('admin/header');
        $this->load->view('admin/administration/all_list', $data);
        $this->load->view('admin/footer');
    }

    public function add_administration_list(){
        $data["info"] = "";
        if (!empty($_GET['id'])) {
            $data["info"] = $this->common->getAnyInfoRow('administration_list','id',$_GET['id']);
        }

        $this->load->view('admin/header');
        $this->load->view('admin/administration/add_list', $data);
        $this->load->view('admin/footer');
    }

    public function add_administration_list_entry(){
        $by = $this->common->user_session_data(1);

        $name = $_POST['name'];
        $description = $_POST['description'];
        $list_id = $_POST['list_id'];

        if (!empty($name)) {
            $batch_info = array(
                'name' => $name,
                'description' => $description,
                'date' => $this->common->getDate(),
                'added_by' => $by,
            );

            if (!empty($_POST['list_id'])) {
                $this->db->where('id', $_POST['list_id']);
                $this->db->update('administration_list', $batch_info);
                $this->session->set_flashdata('feedback', "Updated Successfully");
                $this->session->set_flashdata('feedback_class', 'alert-success');
                return redirect('admin/administration_list');
            } else {
                $link_info['date_time'] = $this->common->getDateTime();
                $this->db->insert('administration_list', $batch_info);

                if ($this->db->insert_id() > 0) {
                    $this->session->set_flashdata('feedback', "Added Successfully");
                    $this->session->set_flashdata('feedback_class', 'alert-success');
                    return redirect('admin/administration_list');
                } else {
                    $this->session->set_flashdata('feedback', "Added Failed");
                    $this->session->set_flashdata('feedback_class', 'alert-danger');
                }
            }
        } else {
            $this->session->set_flashdata('feedback', "Information Incomplete");
            $this->session->set_flashdata('feedback_class', 'alert-danger');
        }
        return redirect('admin/administration_list');

        $data["info"] = "";
        if (!empty($_GET['id'])) {
            $data["info"] = $this->common->getAnyInfoRow('administration','id',$_GET['id']);
        }

        $this->load->view('admin/header');
        $this->load->view('admin/administration/add_list', $data);
        $this->load->view('admin/footer');
    }

    function delete_administration_list($id){
        if(!empty($id)){
            $this->db->set('trash',1);
            $this->db->where('id',$id);
            $this->db->update('administration_list');
            return redirect('admin/administration_list/');
            $this->session->set_flashdata('feedback', "Successfully deleted");
            $this->session->set_flashdata('feedback_class', 'alert-warning');
        }
    }

    public function administration_staff() {
        $data['all_list'] = $this->common->getAll('administration_list');

        $data["administration_staff_list"] = "";

        if (!empty($_GET['id'])) {
            $data["info"] = $this->common->getAnyInfoRow('administration_staff','id',$_GET['id']);
        }
        $data["administration_staff_list"] = $this->common->getAll('administration_staff','','','','','id','desc');
        $data['designaion'] = $this->common->getAll('designation','type',$this->common->get_user_type('staff'));
        $this->load->view('admin/header');
        $this->load->view('admin/administration/officer_list', $data);
        $this->load->view('admin/footer');
    }
    public function add_administration_staff_entry(){
        $by = $this->common->user_session_data(1);

        $administration_list = $_POST['administration_list'];
        $designation = $_POST['designation'];
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];

        if (!empty($designation) && !empty($administration_list) && !empty($name) && !empty($phone)) {
            if ($this->common->mobileNumberCheck($phone) == FALSE) {
                $data['success'] = 0;
                $this->session->set_flashdata("feedback", "Invalid mobile number.");
                $this->session->set_flashdata('feedback_class', 'alert-danger');
                return redirect('admin/administration_staff/?id='.$_POST['id']);
            }else{

                $batch_info = array(
                    'list_id' => $administration_list,
                    'designation' => $designation,
                    'name' => $name,
                    'phone' => $phone,
                    'email' => $email,
                    'date' => $this->common->getDate(),
                    'added_by' => $by,
                );

                if (!empty($_POST['id'])) {
                    $this->db->where('id', $_POST['id']);
                    $this->db->update('administration_staff', $batch_info);
                    $this->session->set_flashdata('feedback', "Updated Successfully");
                    $this->session->set_flashdata('feedback_class', 'alert-success');
                    return redirect('admin/administration_staff');
                } else {
                    $link_info['date_time'] = $this->common->getDateTime();
                    $this->db->insert('administration_staff', $batch_info);

                    if ($this->db->insert_id() > 0) {
                        $this->session->set_flashdata('feedback', "Added Successfully");
                        $this->session->set_flashdata('feedback_class', 'alert-success');
                        return redirect('admin/administration_staff');
                    } else {
                        $this->session->set_flashdata('feedback', "Added Failed");
                        $this->session->set_flashdata('feedback_class', 'alert-danger');
                    }
                }
            }
        } else {
            $this->session->set_flashdata('feedback', "Information Incomplete");
            $this->session->set_flashdata('feedback_class', 'alert-danger');
        }
        return redirect('admin/administration_staff');

        $data["info"] = "";
        if (!empty($_GET['id'])) {
            $data["info"] = $this->common->getAnyInfoRow('administration','id',$_GET['id']);
        }

        $this->load->view('admin/header');
        $this->load->view('admin/administration/officer_list', $data);
        $this->load->view('admin/footer');
    }

    public function delete_administration_staff($id){
        if(!empty($id)){
            $this->db->set('trash',1);
            $this->db->where('id',$id);
            $this->db->update('administration_staff');
            return redirect('admin/administration_staff/');
            $this->session->set_flashdata('feedback', "Successfully deleted");
            $this->session->set_flashdata('feedback_class', 'alert-warning');
        }
    }
    /* end administration add/update/delete */

    /* start Session add/update/delete */
    public function session(){
        $data["info"] = "";
        $data["info"] = $this->common->getAll('academic_session','','','','','id','desc');
        $this->load->view('admin/header');
        $this->load->view('admin/session/all_session', $data);
        $this->load->view('admin/footer');
    }

    public function add_session(){
        $data["info"] = "";
        if (!empty($_GET['id'])) {
            $data["info"] = $this->common->getAnyInfoRow('academic_session','id',$_GET['id']);
        }

        $this->load->view('admin/header');
        $this->load->view('admin/session/add_session', $data);
        $this->load->view('admin/footer');
    }

    public function add_session_entry(){
        $by = $this->common->user_session_data(1);

        $name = $_POST['name'];
        $session_id = $_POST['session_id'];

        if (!empty($name)) {
            $session_info = array(
                'name' => $name,
                'date' => $this->common->getDate(),
                'added_by' => $by,
            );

            if (!empty($session_id)) {
                $this->db->where('id', $session_id);
                $this->db->update('academic_session', $session_info);
                $this->session->set_flashdata('feedback', "Updated Successfully");
                $this->session->set_flashdata('feedback_class', 'alert-success');
                return redirect('admin/session');
            } else {
                $link_info['date_time'] = $this->common->getDateTime();
                $this->db->insert('academic_session', $session_info);

                if ($this->db->insert_id() > 0) {
                    $this->session->set_flashdata('feedback', "Added Successfully");
                    $this->session->set_flashdata('feedback_class', 'alert-success');
                    return redirect('admin/session');
                } else {
                    $this->session->set_flashdata('feedback', "Added Failed");
                    $this->session->set_flashdata('feedback_class', 'alert-danger');
                }
            }


        } else {
            $this->session->set_flashdata('feedback', "Information Incomplete");
            $this->session->set_flashdata('feedback_class', 'alert-danger');
        }
        return redirect('admin/session');

        $data["info"] = "";
        if (!empty($_GET['id'])) {
            $data["info"] = $this->common->getAnyInfoRow('academic_session','id',$_GET['id']);
        }

        /*$this->load->view('admin/header');
        $this->load->view('admin/session/add_session', $data);
        $this->load->view('admin/footer');*/
        redirect('admin/add_session');
    }

    function delete_session($id){
        if(!empty($id)){
            $this->db->set('trash',1);
            $this->db->where('id',$id);
            $this->db->update('academic_session');
            return redirect('admin/session/');
            $this->session->set_flashdata('feedback', "Successfully deleted");
            $this->session->set_flashdata('feedback_class', 'alert-warning');
        }
    }
    /* end Session add/update/delete */


	public function administration()
	{

        $data["info"] = $this->common->getAnyInfoRow('various_content','content_type','administration');

		$this->load->view('admin/header');
		$this->load->view('admin/various_content/administration',$data);
		$this->load->view('admin/footer');

	}
	public function add_administration() {
	    $by = $this->common->user_session_data(1);

        $description = $_POST['description'];
        $administration_id = $_POST['administration_id'];

        if (!empty($description)) {
            $administration_info = array(
                'content' => $description,
                'content_type' => 'administration',
                'date' => $this->common->getDate(),
                'added_by' => $by,
            );

            if (!empty($administration_id)) {
                $this->db->where('id', $administration_id);
                $this->db->update('various_content', $administration_info);
                $this->session->set_flashdata('feedback', "Updated Successfully");
                $this->session->set_flashdata('feedback_class', 'alert-success');
                return redirect('admin/administration');
            } else {
                $link_info['date_time'] = $this->common->getDateTime();
                $this->db->insert('various_content', $administration_info);

                if ($this->db->insert_id() > 0) {
                    $this->session->set_flashdata('feedback', "Added Successfully");
                    $this->session->set_flashdata('feedback_class', 'alert-success');
                    return redirect('admin/administration');
                } else {
                    $this->session->set_flashdata('feedback', "Added Failed");
                    $this->session->set_flashdata('feedback_class', 'alert-danger');
                }
            }


        } else {
            $this->session->set_flashdata('feedback', "Information Incomplete");
            $this->session->set_flashdata('feedback_class', 'alert-danger');
        }
        return redirect('admin/administration');
	}
	public function admission()
	{

        $data["info"] = $this->common->getAnyInfoRow('various_content','content_type','admission');

		$this->load->view('admin/header');
		$this->load->view('admin/various_content/admission',$data);
		$this->load->view('admin/footer');

	}
	public function add_admission()
	{
	    $by = $this->common->user_session_data(1);

        $description = $_POST['description'];
        $administration_id = $_POST['admission_id'];

        if (!empty($description)) {
            $administration_info = array(
                'content' => $description,
                'content_type' => 'admission',
                'date' => $this->common->getDate(),
                'added_by' => $by,
            );

            if (!empty($administration_id)) {
                $this->db->where('id', $administration_id);
                $this->db->update('various_content', $administration_info);
                $this->session->set_flashdata('feedback', "Updated Successfully");
                $this->session->set_flashdata('feedback_class', 'alert-success');
                return redirect('admin/admission');
            } else {
                $link_info['date_time'] = $this->common->getDateTime();
                $this->db->insert('various_content', $administration_info);

                if ($this->db->insert_id() > 0) {
                    $this->session->set_flashdata('feedback', "Added Successfully");
                    $this->session->set_flashdata('feedback_class', 'alert-success');
                    return redirect('admin/admission');
                } else {
                    $this->session->set_flashdata('feedback', "Added Failed");
                    $this->session->set_flashdata('feedback_class', 'alert-danger');
                }
            }


        } else {
            $this->session->set_flashdata('feedback', "Information Incomplete");
            $this->session->set_flashdata('feedback_class', 'alert-danger');
        }
        return redirect('admin/admission');
	}

	public function principal_msg()
	{
        $data["info"] = $this->common->getAnyInfoRow('various_content','content_type','principal_msg');

		$this->load->view('admin/header');
		$this->load->view('admin/teacher/principal_msg',$data);
		$this->load->view('admin/footer');
	}
	public function add_principal_msg() {
	    $by = $this->common->user_session_data(1);

        $description = $_POST['description'];
        $principal_msg_id = $_POST['principal_msg_id'];

        if (!empty($description)) {
            $principal_msg_info = array(
                'content' => $description,
                'content_type' => 'principal_msg',
                'date' => $this->common->getDate(),
                'added_by' => $by,
            );

            /*image upload*/
	    	if ($_FILES['principal_image']['name'] !== ''){


			$config['upload_path']          = './assets/images/teachers';
	        $config['allowed_types']        = 'gif|jpg|png|jpeg';
	        $new_name = date('Ymd_his_').$_FILES["principal_image"]['name'];
	        $config['file_name'] = $new_name;

			$this->upload->initialize($config);


	        if ( ! $this->upload->do_upload('principal_image'))
	        {

		    		$data['success'] = $this->upload->display_errors();

		        	redirect('admin/principal_msg');
	        }
	        else
	        {
	                $data = array('upload_data' => $this->upload->data());

	                $principal_msg_info['file_name'] = $data['upload_data']['file_name'];
	        }

	    	}else{
	    		unset($principal_msg_info['file_name']);
	    	}
		    /*image upload*/

            if (!empty($principal_msg_id)) {

                if ($_FILES['principal_image']['name'] !== '' && $this->common->getAnyInfoRow('various_content', 'id', $principal_msg_id)->file_name)
                    unlink(FCPATH . "/assets/images/teachers/" . $this->common->getAnyInfoRow('various_content', 'id', $principal_msg_id)->file_name);

                $this->db->where('id', $principal_msg_id);
                $this->db->update('various_content', $principal_msg_info);
                $this->session->set_flashdata('feedback', "Updated Successfully");
                $this->session->set_flashdata('feedback_class', 'alert-success');
                return redirect('admin/principal_msg');
            } else {
                $link_info['date_time'] = $this->common->getDateTime();
                $this->db->insert('various_content', $principal_msg_info);

                if ($this->db->insert_id() > 0) {
                    $this->session->set_flashdata('feedback', "Added Successfully");
                    $this->session->set_flashdata('feedback_class', 'alert-success');
                    return redirect('admin/principal_msg');
                } else {
                    $this->session->set_flashdata('feedback', "Added Failed");
                    $this->session->set_flashdata('feedback_class', 'alert-danger');
                }
            }
        } else {
            $this->session->set_flashdata('feedback', "Information Incomplete");
            $this->session->set_flashdata('feedback_class', 'alert-danger');
        }
        return redirect('admin/principal_msg');
	}
	public function upload_file_for_download()
	{
	    $data['info']='';
        if(!empty($_GET['file_id'])){
            $data["info"] = $this->common->getAnyInfoRow('files','menu','download');
        }else{
            $data["all_file"] = $this->common->getAll('various_content','content_type','download','','','id','desc');
            /*$data["info"] = $this->common->getAnyInfoRow('files','','');*/
        }

		$this->load->view('admin/header');
		$this->load->view('admin/various_content/upload_file_for_download',$data);
		$this->load->view('admin/footer');
	}
	public function upload_file_for_link()
	{
	    $data['info']='';
        if(!empty($_GET['file_id'])){
            $data["info"] = $this->common->getAnyInfoRow('files','menu','admission');
        }else{
            $data["all_file"] = $this->common->getAll('files','','','','','id','desc');
            /*$data["info"] = $this->common->getAnyInfoRow('files','','');*/
        }

		$this->load->view('admin/header');
		$this->load->view('admin/various_content/upload_file_for_link',$data);
		$this->load->view('admin/footer');
	}
	public function add_upload_file_for_link()
	{
		$id = $this->common->user_session_data(1);
		$user_type = $this->common->user_session_data(2);

		if(empty($id))
			redirect(base_url().'login');

        $data['info']='';
        if(!empty($_GET['file_id'])){
            $data['info'] = $this->common->getAnyInfoRow('files','id',$_GET['file_id']);
        }

	    $data = array();
	    $data['title'] = 'Create a new file for link';

	    $title = $this->form_validation->set_rules('title', 'admission_file type is', 'required');
	    /*$notice_descr =  $this->form_validation->set_rules('description', 'Notice Description is', 'required');*/
	    //$this->form_validation->set_rules('notice-image', 'Notice image', 'required');
	    //$notice_date = $this->form_validation->set_rules('notice-date', 'Notice Date is', 'required');


		/*
		if(empty($notice_title))
			redirect('notice');

		*/
	    $data['success'] = '';

	    if ($this->form_validation->run() === FALSE)
	    {
	    	$data['success'] = 0;
	        redirect('upload_file_for_link');
	    }
	    else
	    {
	    	$data['success'] = 1;
	    	$notice_info = array(
		        'title' => $this->input->post('title'),
		        //'description' => $this->input->post('description'),
		        'date' => date('Y-m-d'),
		        'date_time' => date('Y-m-d h:i:s'),
		        'added_by' => $id
		    );

	    	/*image upload*/
	    	if ($_FILES['admission_file']['name'] !== ''){


			$config['upload_path']          = './assets/doc/';
	        $config['allowed_types']        = 'gif|jpg|png|pdf|mp4|mp3';
	        $new_name = date('Ymd_his_').$_FILES["admission_file"]['name'];
	        $config['file_name'] = $new_name;

			$this->upload->initialize($config);


	        if ( ! $this->upload->do_upload('admission_file'))
	        {

		    		$data['success'] = $this->upload->display_errors();

		        	redirect('admin/upload_file_for_link');
	        }
	        else
	        {
	                $data = array('upload_data' => $this->upload->data());

	                $notice_info['file_name'] = $data['upload_data']['file_name'];
	        }

	    	}else{
	    		unset($notice_info['file_name']);
	    	}
		    /*image upload*/

            if(!empty($_POST['file_id'])){
                if ($_FILES['admission_file']['name'] !== '' && $this->common->getAnyInfoRow('files', 'id', $_POST['file_id'])->file_name)
                    unlink(FCPATH . "/assets/doc/" . $this->common->getAnyInfoRow('files', 'id', $_POST['file_id'])->file_name);

                $this->db->where('id',$_POST['file_id']);
                $this->db->update('files', $notice_info);
            }else{
                $this->db->insert('files', $notice_info);
            }
	        redirect('admin/upload_file_for_link');
	    }
	}
    public function delete_file_for_link($id){
        if(!empty($id)){
            $this->db->set('trash',1);
            $this->db->where('id',$id);
            $this->db->update('files');
            return redirect('admin/upload_file_for_link');
            $this->session->set_flashdata('feedback', "Successfully deleted");
            $this->session->set_flashdata('feedback_class', 'alert-warning');
        }
    }


    /* start Faculty add/update/delete */
    public function faculty(){
        $data["info"] = "";
        $data["info"] = $this->common->getAll('faculty','','','','','id','desc');
        //$data['all_dept'] = $this->common->getAll('dept');
        $this->load->view('admin/header');
        $this->load->view('admin/faculty/all_faculty', $data);
        $this->load->view('admin/footer');
    }

    public function add_faculty(){
        $data["info"] = "";
        if (!empty($_GET['id'])) {
            $data["info"] = $this->common->getAnyInfoRow('faculty','id',$_GET['id']);
        }

        $this->load->view('admin/header');
        $this->load->view('admin/faculty/add_faculty', $data);
        $this->load->view('admin/footer');
    }

    public function add_faculty_entry(){
        $by = $this->common->user_session_data(1);

        $name = $_POST['name'];
        $batch_id = $_POST['batch_id'];

        if (!empty($name)) {
            $batch_info = array(
                'name' => $name,
                'date' => $this->common->getDate(),
                'added_by' => $by,
            );

            if (!empty($_POST['batch_id'])) {
                $this->db->where('id', $_POST['batch_id']);
                $this->db->update('faculty', $batch_info);
                $this->session->set_flashdata('feedback', "Updated Successfully");
                $this->session->set_flashdata('feedback_class', 'alert-success');
                return redirect('admin/faculty');
            } else {
                $link_info['date_time'] = $this->common->getDateTime();
                $this->db->insert('faculty', $batch_info);

                if ($this->db->insert_id() > 0) {
                    $this->session->set_flashdata('feedback', "Added Successfully");
                    $this->session->set_flashdata('feedback_class', 'alert-success');
                    return redirect('admin/faculty');
                } else {
                    $this->session->set_flashdata('feedback', "Added Failed");
                    $this->session->set_flashdata('feedback_class', 'alert-danger');
                }
            }


        } else {
            $this->session->set_flashdata('feedback', "Information Incomplete");
            $this->session->set_flashdata('feedback_class', 'alert-danger');
        }
        return redirect('admin/faculty');
    }

    function delete_faculty($id){
        if(!empty($id)){
            $this->db->set('trash',1);
            $this->db->where('id',$id);
            $this->db->update('faculty');
            return redirect('admin/faculty');
            $this->session->set_flashdata('feedback', "Successfully deleted");
            $this->session->set_flashdata('feedback_class', 'alert-warning');
        }
    }
    /* end Faculty add/update/delete */

    /* start result & yearly_students_summery add/update/delete */

    public function students_result(){
        $data["info"] = "";
        $data["info"] = $this->common->getAll('result');
        $data["level_term"] = $this->common->getAll('level_term');
        //$data['all_dept'] = $this->common->getAll('dept');
        $this->load->view('admin/header');
        $this->load->view('admin/student/students_result', $data);
        $this->load->view('admin/footer');
    }
    public function add_students_result(){

        $data["info"] = "";
        if (!empty($_GET['id'])) {
            $data["info"] = $this->common->getAnyInfoRow('result','id',$_GET['id']);
        }

		$this->db->where("trash",0);
    	$this->db->order_by('id','asc');
    	$this->db->where('id !=',1);
		$data['all_dept'] = $this->db->get('dept')->result_array();

		$this->db->where("trash",0);
    	$this->db->order_by('id','desc');
		$data['all_session'] = $this->db->get('academic_session')->result_array();

		$this->db->where("trash",0);
    	$this->db->order_by('id','desc');
		$data['all_batch'] = $this->db->get('batch')->result_array();

		$this->db->where("trash",0);
    	$this->db->order_by('id','asc');
		$data['level_term'] = $this->db->get('level_term')->result_array();

		$this->db->where("trash",0);
    	$this->db->order_by('id','asc');
    	$this->db->where('is_student','1');
		$data['roll'] = $this->db->get('students')->result_array();


        /*$data["info"] = "";
        $data["info"] = $this->common->getAll('yearly_students_summery','','','','','id','desc');*/
        //$data['all_dept'] = $this->common->getAll('dept');
        $this->load->view('admin/header');
        $this->load->view('admin/student/add_students_result', $data);
        $this->load->view('admin/footer');
    }


    public function add_students_result_submit(){
        $by = $this->common->user_session_data(1);

        $id = $_POST['id'];
        $dept = $_POST['dept'];
        $session = $_POST['session'];
        $batch = $_POST['batch'];
        $level_term = $_POST['level_term'];
        $student_id = $_POST['student_id'];
        $result = $_POST['result'];

        $this->db->where('student_id',$student_id);
        $this->db->where('dept',$dept);
        $this->db->where('session',$session);
        $this->db->where('batch',$batch);
        $this->db->where('level_term',$level_term);
        $this->db->where('status',1);
        $this->db->where('trash',0);
        $check = $this->db->get('result')->row();

        if (!empty($dept) && !empty($session) && !empty($batch) && !empty($level_term) && !empty($student_id) && !empty($result)) {
            if(count($check) > 0){
                $this->session->set_flashdata('feedback', "Results already exist.");
                $this->session->set_flashdata('feedback_class', 'alert-danger');
                return redirect('admin/add_students_result');
            }else {
                //echo print_r($check);
                $result_info = array(
                    'student_id' => $student_id,
                    'dept' => $dept,
                    'session' => $session,
                    'batch' => $batch,
                    'level_term' => $level_term,
                    'result' => $result,
                    'date' => $this->common->getDate(),
                    'date_time' => $this->common->getDateTime(),
                    'added_by' => $by
                );

                if (!empty($_POST['id'])) {
                    $this->db->where('id', $_POST['id']);
                    $this->db->update('result', $result_info);
                    $this->session->set_flashdata('feedback', "Updated Successfully");
                    $this->session->set_flashdata('feedback_class', 'alert-success');
                    return redirect('admin/students_result');
                } else {
                    $link_info['date_time'] = $this->common->getDateTime();
                    $this->db->insert('result', $result_info);

                    if ($this->db->insert_id() > 0) {
                        $this->session->set_flashdata('feedback', "Added Successfully");
                        $this->session->set_flashdata('feedback_class', 'alert-success');
                        return redirect('admin/students_result');
                    } else {
                        $this->session->set_flashdata('feedback', "Added Failed");
                        $this->session->set_flashdata('feedback_class', 'alert-danger');
                    }
                }
            }
        } else {
            $this->session->set_flashdata('feedback', "All field required.");
            $this->session->set_flashdata('feedback_class', 'alert-danger');
            return redirect('admin/add_students_result');
        }
    }
    function delete_students_result($id){
        if(!empty($id)){
            $this->db->set('trash',1);
            $this->db->where('id',$id);
            $this->db->update('result');
            return redirect('admin/students_result');
            $this->session->set_flashdata('feedback', "Successfully deleted");
            $this->session->set_flashdata('feedback_class', 'alert-warning');
        }
    }

    public function yearly_students_summery(){
        $data["info"] = "";
        $data["info"] = $this->common->getAll('yearly_students_summery','','','','','id','desc');
        //$data['all_dept'] = $this->common->getAll('dept');
        $this->load->view('admin/header');
        $this->load->view('admin/various_content/yearly_students_summery', $data);
        $this->load->view('admin/footer');
    }
    public function add_yearly_summery(){

        $data["info"] = "";
        if (!empty($_GET['id'])) {
            $data["info"] = $this->common->getAnyInfoRow('yearly_students_summery','id',$_GET['id']);
        }

        /*$data["info"] = "";
        $data["info"] = $this->common->getAll('yearly_students_summery','','','','','id','desc');*/
        //$data['all_dept'] = $this->common->getAll('dept');
        $this->load->view('admin/header');
        $this->load->view('admin/various_content/add_students_yearly_summery', $data);
        $this->load->view('admin/footer');
    }

    public function add_yearly_summery_entry(){
        $by = $this->common->user_session_data(1);

        $batch_id = $_POST['link_id'];
        $year = $_POST['year'];
        $passing_year = $_POST['passing_year'];
        $total_students = $_POST['total_students'];
        $total_pass = $_POST['total_pass'];
        $total_fail = $_POST['total_fail'];

        if (!empty($year) && !empty($total_students)) {
            $batch_info = array(
                'year' => $year,
                'passing_year' => $passing_year,
                'total_students' => $total_students,
                'passed' => $total_pass,
                'fail' => $total_fail,
                'date' => $this->common->getDate(),
                'added_by' => $by,
            );

            if (!empty($_POST['link_id'])) {
                $this->db->where('id', $_POST['link_id']);
                $this->db->update('yearly_students_summery', $batch_info);
                $this->session->set_flashdata('feedback', "Updated Successfully");
                $this->session->set_flashdata('feedback_class', 'alert-success');
                return redirect('admin/yearly_students_summery');
            } else {
                $link_info['date_time'] = $this->common->getDateTime();
                $this->db->insert('yearly_students_summery', $batch_info);

                if ($this->db->insert_id() > 0) {
                    $this->session->set_flashdata('feedback', "Added Successfully");
                    $this->session->set_flashdata('feedback_class', 'alert-success');
                    return redirect('admin/yearly_students_summery');
                } else {
                    $this->session->set_flashdata('feedback', "Added Failed");
                    $this->session->set_flashdata('feedback_class', 'alert-danger');
                }
            }


        } else {
            $this->session->set_flashdata('feedback', "Information Incomplete");
            $this->session->set_flashdata('feedback_class', 'alert-danger');
        }
        return redirect('admin/yearly_students_summery');
    }

    function delete_yearly_summery($id){
        if(!empty($id)){
            $this->db->set('trash',1);
            $this->db->where('id',$id);
            $this->db->update('yearly_students_summery');
            return redirect('admin/yearly_students_summery');
            $this->session->set_flashdata('feedback', "Successfully deleted");
            $this->session->set_flashdata('feedback_class', 'alert-warning');
        }
    }
    /* end yearly_students_summery add/update/delete */


    /* start service_box add/update/delete */
	public function service_box()
	{
	    $data['info']='';
        if(!empty($_GET['file_id'])){
            $data["info"] = $this->common->getAnyInfoRow('service_box','id',$_GET['file_id']);
            $data["all_file"] = $this->common->getAll('service_box','','','','','id','desc');
        }else{
            $data["all_file"] = $this->common->getAll('service_box','','','','','id','desc');
            /*$data["info"] = $this->common->getAnyInfoRow('files','','');*/
        }

		$this->load->view('admin/header');
		$this->load->view('admin/service_box/add_service_box',$data);
		$this->load->view('admin/footer');
	}
	public function add_service_box()
	{
		$id = $this->common->user_session_data(1);
		$user_type = $this->common->user_session_data(2);

		if(empty($id))
			redirect(base_url().'login');

        $data['info']='';
        if(!empty($_GET['file_id'])){
            $data['info'] = $this->common->getAnyInfoRow('service_box','id',$_GET['file_id']);
        }

	    $data = array();
	    $data['title'] = 'Create a new Service box';

	    $title = $this->form_validation->set_rules('title', 'Service box title is', 'required');


		/*
		if(empty($notice_title))
			redirect('notice');

		*/
	    $data['success'] = '';

	    if ($this->form_validation->run() === FALSE)
	    {
	    	$data['success'] = 0;
	        redirect('admin/service_box');
	    }
	    else
	    {
	    	$data['success'] = 1;
	    	$notice_info = array(
		        'title' => $this->input->post('title'),
		        //'description' => $this->input->post('description'),
		        'date' => date('Y-m-d'),
		        'date_time' => date('Y-m-d h:i:s'),
		        'added_by' => $id
		    );

	    	/*image upload*/
	    	if ($_FILES['admission_file']['name'] !== ''){


			$config['upload_path']          = './assets/doc/service_box';
	        $config['allowed_types']        = 'gif|jpg|png|';
	        $new_name = date('Ymd_his_').$_FILES["admission_file"]['name'];
	        $config['file_name'] = $new_name;

			$this->upload->initialize($config);


	        if ( ! $this->upload->do_upload('admission_file'))
	        {

		    		$data['success'] = $this->upload->display_errors();

		        	redirect('admin/service_box');
	        }
	        else
	        {
	                $data = array('upload_data' => $this->upload->data());

	                $notice_info['image'] = $data['upload_data']['file_name'];
	        }

	    	}else{
	    		unset($notice_info['image']);
	    	}
		/*image upload*/

            if(!empty($_POST['file_id'])){
                if ($_FILES['admission_file']['name'] !== '' && $this->common->getAnyInfoRow('service_box', 'id', $_POST['file_id'])->image)
                    unlink(FCPATH . "/assets/doc/service_box/" . $this->common->getAnyInfoRow('service_box', 'id', $_POST['file_id'])->image);

                $this->db->where('id',$_POST['file_id']);
                $this->db->update('service_box', $notice_info);
            }else{
                $this->db->insert('service_box', $notice_info);
            }
	        redirect('admin/service_box');
	    }
	}
	public function service_box_change_status($id, $status) {

        if ($id != null) {
            if ($status == 1) {
                $data['status'] = 0;
                $this->db->where('id', $id);
                $this->db->update('service_box', $data);
            } else {
                $data['status'] = 1;
                $this->db->where('id', $id);
                $this->db->update('service_box', $data

                );
            }
        }
        return redirect('admin/service_box/');
    }
    public function delete_service_box($id){
        if(!empty($id)){
            $this->db->set('trash',1);
            $this->db->where('id',$id);
            $this->db->update('service_box');
            return redirect('admin/service_box');
            $this->session->set_flashdata('feedback', "Successfully deleted");
            $this->session->set_flashdata('feedback_class', 'alert-warning');
        }
    }

	public function service_box_list()
	{
	    $data['info']='';
        if(!empty($_GET['id'])){
            $data["info"] = $this->common->getAnyInfoRow('service_box_list','id',$_GET['id']);
            $data["all_list"] = $this->common->getAll('service_box_list','','','','','id','desc');
        }else{
            /*$data["info"] = $this->common->getAnyInfoRow('files','','');*/
            $data["all_list"] = $this->common->getAll('service_box_list','','','','','id','desc');
        }
        $data["all_service_box"] = $this->common->getAll('service_box','','','','','title','asc');


		$this->load->view('admin/header');
		$this->load->view('admin/service_box/service_box_list',$data);
		$this->load->view('admin/footer');
	}

	public function add_service_box_list()
	{
		$id = $this->common->user_session_data(1);
		$user_type = $this->common->user_session_data(2);


		if(empty($id))
			redirect(base_url().'login');

        $data['info']='';
        if(!empty($_GET['id'])){
            $data['info'] = $this->common->getAnyInfoRow('service_box_list','id',$_GET['id']);
        }

	    $data = array();
	    $data['title'] = 'Create a new Service box list';

	    $title = $this->form_validation->set_rules('title', 'Service box list title is', 'required');


		/*
		if(empty($notice_title))
			redirect('notice');

		*/
	    $data['success'] = '';

	    if ($this->form_validation->run() === FALSE)
	    {
	    	$data['success'] = 0;
	        redirect('admin/service_box_list');
	    }
	    else
	    {
	    	$data['success'] = 1;
	    	$notice_info = array(
		        'title' => $this->input->post('title'),
		        'service_box' => $this->input->post('service_box'),
		        //'description' => $this->input->post('description'),
		        'date' => date('Y-m-d'),
		        'date_time' => date('Y-m-d h:i:s'),
		        'added_by' => $id
		    );

		/*image upload*/

            if(!empty($_POST['id'])){
                $this->db->where('id',$_POST['id']);
                $this->db->update('service_box_list', $notice_info);
            }else{
                $this->db->insert('service_box_list', $notice_info);
            }
	        redirect('admin/service_box_list');
	    }
	}
	public function service_box_list_change_status($id, $status) {

        if ($id != null) {
            if ($status == 1) {
                $data['status'] = 0;
                $this->db->where('id', $id);
                $this->db->update('service_box_list', $data);
            } else {
                $data['status'] = 1;
                $this->db->where('id', $id);
                $this->db->update('service_box_list', $data

                );
            }
        }
        return redirect('admin/service_box_list/');
    }
    public function delete_service_box_list($id){
        if(!empty($id)){
            $this->db->set('trash',1);
            $this->db->where('id',$id);
            $this->db->update('service_box_list');
            return redirect('admin/service_box_list');
            $this->session->set_flashdata('feedback', "Successfully deleted");
            $this->session->set_flashdata('feedback_class', 'alert-warning');
        }
    }


	public function service_box_list_file()
	{
	    $data['info']='';
        if(!empty($_GET['file_id'])){
            $data["info"] = $this->common->getAnyInfoRow('service_box_list_file','id',$_GET['file_id']);
            $data["all_service_box"] = $this->common->getAll('service_box','id',$_GET['file_id']);
            $data["all_list_file"] = $this->common->getAll('service_box_list_file','','','','','id','desc');
        }else{
            $data["all_list_file"] = $this->common->getAll('service_box_list_file','','','','','id','desc');
            $data["all_service_box"] = $this->common->getAll('service_box');
            /*$data["info"] = $this->common->getAnyInfoRow('files','','');
            $data["all_service_box"] = $this->common->getAll('service_box','','','','','title','asc');
            */
        }

		$this->load->view('admin/header');
		$this->load->view('admin/service_box/service_box_list_file',$data);
		$this->load->view('admin/footer');
	}

	public function service_box_list_on_change()
    {
        $response = array();
        $response['success'] = 0;

        $service_id = $_POST['service_id'];

        $this->db->where('service_box',$service_id);
        $this->db->where('trash',0);
        $this->db->where('status',1);
        $service_box_list = $this->db->get('service_box_list');

        $response['service_box_list'] = array();
        foreach ($service_box_list->result_array() as $key => $value) {
            $post = array();
            $post['id'] = $value['id'];
            $post['title'] = $value['title'];

            array_push($response['service_box_list'],$post);
        }

        $response['success'] = 1;

        echo json_encode($response);
    }
	public function add_service_box_list_file() {
		$id = $this->common->user_session_data(1);
		$user_type = $this->common->user_session_data(2);

		if(empty($id))
			redirect(base_url().'login');

        $data['info']='';
        if(!empty($_GET['file_id'])){
            $data['info'] = $this->common->getAnyInfoRow('service_box','id',$_GET['file_id']);
        }

	    $data = array();
	    $data['title'] = 'Create a new Service box list file';

	    $title = $this->form_validation->set_rules('title', 'Service box file title is', 'required');


		/*
		if(empty($notice_title))
			redirect('notice');

		*/
	    $data['success'] = '';

	    if ($this->form_validation->run() === FALSE)
	    {
	    	$data['success'] = 0;
	        redirect('admin/service_box_list_file');
	    }
	    else
	    {
	    	$data['success'] = 1;
	    	$notice_info = array(
		        'title' => $this->input->post('title'),
		        'service_box_list' => $this->input->post('service_box_list'),
		        //'description' => $this->input->post('description'),
		        'date' => date('Y-m-d'),
		        'date_time' => date('Y-m-d h:i:s'),
		        'added_by' => $id
		    );

	    	/*image upload*/
	    	if ($_FILES['service_file']['name'] !== ''){


			$config['upload_path']          = './assets/doc/service_box';
	        $config['allowed_types']        = 'gif|jpg|png|pdf';
	        $new_name = date('Ymd_his_').$_FILES["service_file"]['name'];
	        $config['file_name'] = $new_name;

			$this->upload->initialize($config);


	        if ( ! $this->upload->do_upload('service_file'))
	        {

		    		$data['success'] = $this->upload->display_errors();

		        	redirect('admin/service_box_list_file');
	        }
	        else
	        {
	                $data = array('upload_data' => $this->upload->data());

	                $notice_info['file_name'] = $data['upload_data']['file_name'];
	        }

	    	}else{
	    		unset($notice_info['file_name']);
	    	}
		/*image upload*/

            if(!empty($_POST['file_id'])){
                if ($_FILES['service_file']['name'] !== '' && $this->common->getAnyInfoRow('service_box_list_file', 'id', $_POST['file_id'])->image)
                    unlink(FCPATH . "/assets/doc/service_box/" . $this->common->getAnyInfoRow('service_box_list_file', 'id', $_POST['file_id'])->image);

                $this->db->where('id',$_POST['file_id']);
                $this->db->update('service_box_list_file', $notice_info);
            }else{
                $this->db->insert('service_box_list_file', $notice_info);
            }
	        redirect('admin/service_box_list_file');
	    }
	}
	public function service_box_list_file_change_status($id, $status) {

        if ($id != null) {
            if ($status == 1) {
                $data['status'] = 0;
                $this->db->where('id', $id);
                $this->db->update('service_box', $data);
            } else {
                $data['status'] = 1;
                $this->db->where('id', $id);
                $this->db->update('service_box', $data

                );
            }
        }
        return redirect('admin/service_box/');
    }
    public function delete_service_box_list_file($id){
        if(!empty($id)){
            $this->db->set('trash',1);
            $this->db->where('id',$id);
            $this->db->update('service_box_list_file');
            return redirect('admin/service_box_list_file');
            $this->session->set_flashdata('feedback', "Successfully deleted");
            $this->session->set_flashdata('feedback_class', 'alert-warning');
        }
    }

	public function req_for_hostel()
	{
	    $data['info']='';
        if(!empty($_GET['file_id'])){
            $data["all_req_for_hostel"] = $this->common->getAll('hostel_seat_request','','','','','id','desc');
        }else{
            $data["all_req_for_hostel"] = $this->common->getAll('hostel_seat_request','','','','','id','desc');
            /*$data["info"] = $this->common->getAnyInfoRow('files','','');*/
        }

		$this->load->view('admin/header');
		$this->load->view('admin/hostel/all_hostel_seat_request',$data);
		$this->load->view('admin/footer');
	}
	/* start contact_us_msg view/add/update/delete */
	public function contact_us_msg($msg_id=null){
		$id = $this->common->user_session_data(1);
		$user_type = $this->common->user_session_data(2);
		if(empty($id))
			redirect(base_url().'login');


        if($msg_id != null){
            $data['msg_id'] = $msg_id;
            $data['single_contact_us_msg'] = $this->common->getAnyInfoRow('contact_us','id',$msg_id);

            $data1['status'] = 0;
            $this->db->where('id', $msg_id);
            $this->db->update('contact_us', $data1);
        }

		$this->db->where("trash",0);
    	$this->db->order_by('id','desc');
		$data['all_contact_us_msg'] = $this->db->get('contact_us')->result_array();

		$this->load->view('admin/header');
		$this->load->view('admin/all_contact_us_message',$data);
		$this->load->view('admin/footer');
	}

	public function contact_us_change_status($id, $status) {
        if ($id != null) {
            if ($status == 1) {
                $data['status'] = 0;
                $this->db->where('id', $id);
                $this->db->update('contact_us', $data);
            } else {
                $data['status'] = 1;
                $this->db->where('id', $id);
                $this->db->update('contact_us', $data);
            }
        }
        return redirect('admin/contact_us_msg');
    }
    /* end contact_us_msg view/add/update/delete */

    /* start contact_us_msg view/add/update/delete */
	public function important_phone($id=null){
		$id = $this->common->user_session_data(1);
		$user_type = $this->common->user_session_data(2);
		if(empty($id))
			redirect(base_url().'login');


        if($id != null){
            $data['id'] = $id;
            $data['single_phone'] = $this->common->getAnyInfoRow('important_phone','id',$id);

            $data1['status'] = 0;
            $this->db->where('id', $id);
            $this->db->update('important_phone', $data1);
        }

		$this->db->where("trash",0);
    	$this->db->order_by('id','desc');
		$data['all_phone'] = $this->db->get('important_phone')->result_array();

		$this->load->view('admin/header');
		$this->load->view('admin/various_content/important_phone',$data);
		$this->load->view('admin/footer');
	}
	public function add_important_phone()
	{
		$id = $this->common->user_session_data(1);
		$user_type = $this->common->user_session_data(2);


		if(empty($id))
			redirect(base_url().'login');

        $data['info']='';
        if(!empty($_GET['id'])){
            $data['info'] = $this->common->getAnyInfoRow('important_phone','id',$_GET['id']);
        }

	    $data = array();
	    $data['title'] = 'Add new Important Phone';

	    $title = $this->form_validation->set_rules('title', 'Title is', 'required');
	    $phone = $this->form_validation->set_rules('phone', 'Phone is', 'required');


		/*
		if(empty($notice_title))
			redirect('notice');

		*/
	    $data['success'] = '';

	    if ($this->form_validation->run() === FALSE)
	    {
	    	$data['success'] = 0;
	        redirect('admin/important_phone');
	    }
	    else
	    {
	    	$data['success'] = 1;
	    	$notice_info = array(
		        'title' => $this->input->post('title'),
		        'phone' => $this->input->post('phone'),
		        //'description' => $this->input->post('description'),
		        'date' => $this->common->getDate(),
		        'date_time' => $this->common->getDateTime(),
		        'added_by' => $id
		    );

		/*image upload*/

            if(!empty($_POST['id'])){
                $this->db->where('id',$_POST['id']);
                $this->db->update('important_phone', $notice_info);
            }else{
                $this->db->insert('important_phone', $notice_info);
            }
	        redirect('admin/important_phone');
	    }
	}
    public function delete_important_phone($id){
        if(!empty($id)){
            $this->db->where('id',$id);
            $this->db->delete('important_phone');
            return redirect('admin/important_phone');
            $this->session->set_flashdata('feedback', "Successfully deleted");
            $this->session->set_flashdata('feedback_class', 'alert-warning');
        }
    }
    /* end contact_us_msg view/add/update/delete */


    /* start offering_degree add/update/delete */
    public function offering_degree(){
        $data["info"] = "";
        $data["info"] = $this->common->getAll('offering_degree','','','','','id','desc');
        //$data['all_dept'] = $this->common->getAll('dept');
        $this->load->view('admin/header');
        $this->load->view('admin/offering_degree/all_offering_degree', $data);
        $this->load->view('admin/footer');
    }

    public function add_offering_degree(){
        $data["info"] = "";
        if (!empty($_GET['id'])) {
            $data["info"] = $this->common->getAnyInfoRow('offering_degree','id',$_GET['id']);
        }
        $data['faculty'] =$this->common->getAll('faculty','','','','','name','asc');

        $data['dept'] =$this->common->getAll('dept','','','','','name','asc');

        $this->load->view('admin/header');
        $this->load->view('admin/offering_degree/add_offering_degree', $data);
        $this->load->view('admin/footer');
    }

    public function add_offering_degree_entry(){
        $by = $this->common->user_session_data(1);

        $faculty = $_POST['faculty'];
        $dept = $_POST['dept'];
        $name = $_POST['name'];
        $batch_id = $_POST['batch_id'];

        if (!empty($name)) {
            $batch_info = array (
                'faculty' => $faculty,
                'dept' => $dept,
                'name' => $name,
                'date' => $this->common->getDate(),
                'added_by' => $by,
            );

            if (!empty($_POST['batch_id'])) {
                $this->db->where('id', $_POST['batch_id']);
                $this->db->update('offering_degree', $batch_info);
                $this->session->set_flashdata('feedback', "Updated Successfully");
                $this->session->set_flashdata('feedback_class', 'alert-success');
                return redirect('admin/offering_degree');
            } else {
                $link_info['date_time'] = $this->common->getDateTime();
                $this->db->insert('offering_degree', $batch_info);

                if ($this->db->insert_id() > 0) {
                    $this->session->set_flashdata('feedback', "Added Successfully");
                    $this->session->set_flashdata('feedback_class', 'alert-success');
                    return redirect('admin/offering_degree');
                } else {
                    $this->session->set_flashdata('feedback', "Added Failed");
                    $this->session->set_flashdata('feedback_class', 'alert-danger');
                }
            }


        } else {
            $this->session->set_flashdata('feedback', "Information Incomplete");
            $this->session->set_flashdata('feedback_class', 'alert-danger');
        }
        return redirect('admin/offering_degree');
    }

    function delete_offering_degree($id){
        if(!empty($id)) {
            $this->db->set('trash',1);
            $this->db->where('id',$id);
            $this->db->update('offering_degree');
            return redirect('admin/offering_degree');
            $this->session->set_flashdata('feedback', "Successfully deleted");
            $this->session->set_flashdata('feedback_class', 'alert-warning');
        }
    }
    /* end offering_degree add/update/delete */

      /* start setting add/update/delete */
    public function designation(){
        $data["info"] = "";
        $this->db->where('status',1);
        $this->db->where('trash',0);
        $this->db->order_by('name','asc');
        $this->db->group_by('type');
        $data["all_designation"] = $this->db->get('designation')->result_array();
        $data["all_user_type"] = $this->common->getAll('type_list','type_id','1','','','id','asc');

        if(isset($_GET['id'])){
            $data["info"] = $this->common->getAnyInfoRow('designation','id',$_GET['id']);
        }
        //print_r( $data["all_designation"]);

        //echo $this->db->last_query();
        //$data["all_designation"] = $this->common->getAll('designation','','','','','id','asc');
        //$data['all_dept'] = $this->common->getAll('dept');
        $this->load->view('admin/header');
        $this->load->view('admin/setting/designation', $data);
        $this->load->view('admin/footer');
    }

    public function add_designation_entry(){
        $by = $this->common->user_session_data(1);

        $type = $_POST['user_type'];
        $title = $_POST['title'];
        /*$name = $_POST['name'];
        $batch_id = $_POST['batch_id'];*/

        if (!empty($type)) {
            $form_info = array (
                'type' => $type,
                'name' => $title,
                'date' => $this->common->getDate(),
                'added_by' => $by,
            );

            if (!empty($_POST['id'])) {
                $this->db->where('id', $_POST['id']);
                $this->db->update('designation', $form_info);
                $this->session->set_flashdata('feedback', "Updated Successfully");
                $this->session->set_flashdata('feedback_class', 'alert-success');
                return redirect('admin/designation');
            } else {
                $link_info['date_time'] = $this->common->getDateTime();
                $this->db->insert('designation', $form_info);

                if ($this->db->insert_id() > 0) {
                    $this->session->set_flashdata('feedback', "Added Successfully");
                    $this->session->set_flashdata('feedback_class', 'alert-success');
                    return redirect('admin/designation');
                } else {
                    $this->session->set_flashdata('feedback', "Added Failed");
                    $this->session->set_flashdata('feedback_class', 'alert-danger');
                }
            }
        } else {
            $this->session->set_flashdata('feedback', "Information Incomplete");
            $this->session->set_flashdata('feedback_class', 'alert-danger');
        }
        return redirect('admin/designation');
    }
    function delete_designation($id){
        if(!empty($id)){
            $this->db->set('trash',1);
            $this->db->where('id',$id);
            $this->db->update('designation');
            return redirect('admin/designation');
            $this->session->set_flashdata('feedback', "Successfully deleted");
            $this->session->set_flashdata('feedback_class', 'alert-warning');
        }
    }
    /* end setting add/update/delete */



    /* start library view/add/update/delete */
    public function library(){
        $id = $this->common->user_session_data(1);
        $user_type = $this->common->user_session_data(2);
        if(empty($id))
            redirect(base_url().'login');

        $data['success'] = '';


        $this->db->where("trash",0);
        $this->db->order_by('id','asc');
        $data['all_content'] = $this->db->get('library')->result_array();

        $this->load->view('admin/header');
        $this->load->view('admin/library/all_content',$data);
        $this->load->view('admin/footer');
    }

    public function new_library_content(){
        $id = $this->common->user_session_data(1);
        $user_type = $this->common->user_session_data(2);
        if(empty($id))
            redirect(base_url().'login');

        $data = array();
        $data['title'] = 'Add new library content ';
        $data['info']='';
        if(!empty($_GET['id'])){
            $data['info'] = $this->common->getAnyInfoRow('library','id',$_GET['id']);
        }

        $data['success'] = 0;
        $this->load->view('admin/header');
        $this->load->view('admin/library/new_library_content',$data);
        $this->load->view('admin/footer');
    }

    public function new_library_content_insert() {
        $id = $this->common->user_session_data(1);
        $user_type = $this->common->user_session_data(2);
        if(empty($id))
            redirect(base_url().'login');

        $data = array();
        $data['title'] = 'Add new library content';

        $title = $this->form_validation->set_rules('title', 'Library content title is', 'required');
        $description =  $this->form_validation->set_rules('description', 'Description is', 'required');
        //$this->form_validation->set_rules('notice-image', 'Notice image', 'required');
        //$notice_date = $this->form_validation->set_rules('notice-date', 'Notice Date is', 'required');


        /*
        if(empty($notice_title))
            redirect('notice');

        */
        $data['success'] = '';

        if ($this->form_validation->run() === FALSE)
        {
            $data['success'] = 0;
            $this->load->view('admin/header', $data);
            $this->load->view('admin/library/new_library_content',$data);
            $this->load->view('admin/footer');
        }
        else
        {
            $data['success'] = 1;
            $notice_info = array(
                'title' => $this->input->post('title'),
                'description' => $this->input->post('description'),
                'date' => $this->common->getDate(),
                'date_time' => $this->common->getDateTime(),
                'added_by' => $this->common->user_session_data(1)
            );

            /*image upload*/
            if ($_FILES['library_file']['name'] !== ''){

                $config['upload_path']          = './assets/doc/library/';
                $config['allowed_types']        = 'pdf|gif|jpg|png|jpeg|mp4|mp3|xls';
                $new_name = date('Ymd_his_').$_FILES["library_file"]['name'];
                $config['file_name'] = $new_name;

                $this->upload->initialize($config);


                if ( ! $this->upload->do_upload('library_file'))
                {

                    $data['success'] = $this->upload->display_errors();

                    redirect('admin/library');
                }
                else
                {
                    $data = array('upload_data' => $this->upload->data());

                    $notice_info['file_name'] = $data['upload_data']['file_name'];
                }

            }else{
                unset($notice_info['file_name']);
            }
            /*image upload*/

            if(!empty($_POST['id'])){
                if ($_FILES['library_file']['name'] !== '' && $this->common->getAnyInfoRow('library', 'id', $_POST['id'])->file_name)
                    unlink(FCPATH . "/assets/doc/library/" . $this->common->getAnyInfoRow('library', 'id', $_POST['id'])->file_name);

                $this->db->where('id',$_POST['id']);
                $this->db->update('library', $notice_info);
            }else{
                $this->db->insert('library', $notice_info);
            }
            redirect('admin/library');
        }
    }
    public function library_change_status($id, $status) {

        if ($id != null) {
            if ($status == 1) {
                $data['status'] = 0;
                $this->db->where('id', $id);
                $this->db->update('library', $data);
            } else {
                $data['status'] = 1;
                $this->db->where('id', $id);
                $this->db->update('library', $data

                );
            }
        }
        return redirect('admin/library');
    }
    public function delete_library_content($id) {

        if ($id != null) {
            $this->db->where('id',$id);
            $this->db->update('library', array('trash' => 1));
        }
        redirect('admin/library');
    }
    /* end library view/add/update/delete */



    /* start social_link add/update/delete */
    public function social_link(){
        $data["all_social_link"] = "";
        $data["all_social_link"] = $this->common->getAll('social_link');
        $data['all_dept'] = $this->common->getAll('dept');


        if (!empty($_GET['id'])) {
            $data["info"] = $this->common->getAnyInfoRow('social_link','id',$_GET['id']);
        }

        $this->load->view('admin/header');
        $this->load->view('admin/social_link/social_link', $data);
        $this->load->view('admin/footer');
    }

    public function add_social_link(){
        $data["info"] = "";
        if (!empty($_GET['id'])) {
            $data["info"] = $this->common->getAnyInfoRow('social_link','id',$_GET['id']);
        }

        $this->load->view('admin/header');
        $this->load->view('admin/social_link/add_social_link', $data);
        $this->load->view('admin/footer');
    }

    public function add_social_link_entry(){
        $by = $this->common->user_session_data(1);

        $dept = $_POST['dept'];
        $name = $_POST['name'];
        $icon = $_POST['icon'];
        $link = $_POST['link'];
        $link_id = $_POST['link_id'];

        if (!empty($name)) {
            $social_link_info = array (
                'dept' => $dept,
                'name' => $name,
                'icon' => $icon,
                'link' => $link,
                'date' => $this->common->getDate(),
                'added_by' => $by,
            );

            if (!empty($_POST['link_id'])) {
                $this->db->where('id', $_POST['link_id']);
                $this->db->update('social_link', $social_link_info);
                $this->session->set_flashdata('feedback', "Updated Successfully");
                $this->session->set_flashdata('feedback_class', 'alert-success');
                return redirect('admin/social_link');
            } else {
                $link_info['date_time'] = $this->common->getDateTime();
                $this->db->insert('social_link', $social_link_info);

                if ($this->db->insert_id() > 0) {
                    $this->session->set_flashdata('feedback', "Added Successfully");
                    $this->session->set_flashdata('feedback_class', 'alert-success');
                    return redirect('admin/social_link');
                } else {
                    $this->session->set_flashdata('feedback', "Added Failed");
                    $this->session->set_flashdata('feedback_class', 'alert-danger');
                }
            }


        } else {
            $this->session->set_flashdata('feedback', "Information Incomplete");
            $this->session->set_flashdata('feedback_class', 'alert-danger');
        }
        return redirect('admin/social_link');
    }

    function delete_social_link($id){
        if(!empty($id)) {
            $this->db->set('trash',1);
            $this->db->where('id',$id);
            $this->db->update('social_link');
            return redirect('admin/social_link');
            $this->session->set_flashdata('feedback', "Successfully deleted");
            $this->session->set_flashdata('feedback_class', 'alert-warning');
        }
    }
    /* end social_link add/update/delete */
}
?>
