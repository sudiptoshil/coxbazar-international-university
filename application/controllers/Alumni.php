<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Alumni extends CI_Controller {

	public function __construct() {
	    parent::__construct();
	    $this->load->model('common');
	    $this->load->model('login_model');
	    $this->load->model('alumni_model');
	}
	public function index()
	{
		$this->load->view('public/head');
		$this->load->view('public/alumni/alumni-header');
		$this->load->view('public/alumni/home');
		$this->load->view('public/alumni/alumni-footer');
	}
	public function login()
	{
		//echo $this->db->last_query();

		$this->load->view('public/head');
		$this->load->view('public/alumni/alumni-header');
		$this->load->view('public/alumni/login');
		$this->load->view('public/alumni/alumni-footer');
	}
	public function auth()
	{
		$roll_no = $this->input->post('roll',TRUE);
		$password = $this->input->post('password',TRUE);
		$pass_hash = md5(sha1(md5($password)));
		//$validate = $this->login_model->validate($username_email,$pass_hash);
		$all_alumni = $this->common->getAll('password','user_type',$this->common->get_user_type('alumni'));


		//echo '<pre>';
		//echo print_r($all_alumni);
		if (!empty($roll_no) && !empty($password)) {
		    
			$alumni_row = $this->common->getSpecificRows('password','roll',$roll_no,'user_type',$this->common->get_user_type('alumni'));
			
			//$email = $this->common->getSpecificRows('password','email',$username_email,'user_type',$this->common->get_user_type('alumni'));
			//$mobile = $this->common->getSpecificRows('password','mobile',$username_email,'user_type',$this->common->get_user_type('alumni'));


			if ($alumni_row->num_rows() > 0) {
				$check = $alumni_row->row_array();
				if($check['pass_hash'] == $pass_hash){
					$id = $check['id'];
					$user_type = $check['user_type'];
					$user_id = $check['user_id'];
					$ses_data = array(
						'id' => $id,
						'user_type' => $user_type,
						'user_id' => $user_id
					);
					$this->session->set_userdata($ses_data);
					redirect(base_url().'alumni/dashboard');
				}else{
					echo $this->session->set_flashdata("msg","Password wrong");
					redirect(base_url().'alumni/login');
				}
				/*$row_data = $validate->row_array();
				$id = $row_data['id'];
				$user_type = $row_data['user_type'];
				$user_id = $row_data['user_id'];
				if ($user_type != $this->common->get_user_type('alumni')) {
					echo $this->session->set_flashdata("msg","Invalid alumni id!!");
				}else{
					$ses_data = array(
						'id' => $id,
						'user_type' => $user_type,
						'user_id' => $user_id
					);
					$this->session->set_userdata($ses_data);
					redirect(base_url().'admin/dashboard');
				}*/
			}else{
				echo $this->session->set_flashdata("msg","Alumni not found by this roll!!");
				redirect(base_url().'alumni/login');
			}

		}else if (empty($username_email) || empty($password)) {
			echo $this->session->set_flashdata("msg","Roll or Password empty!!");
			redirect(base_url().'alumni/login');
		}else{
			echo $this->session->set_flashdata("msg","Roll or password wrong!!");
			redirect(base_url().'alumni/login');
		}
	}

	public function registration()
	{
		//$this->db->where("(notice_type=2 OR notice_type=3)");
		$this->db->where("trash",0);
    	$this->db->where('id !=',1);
		$data['all_dept'] = $this->db->get('dept')->result_array();
		//$data['all_notice'] = "SELECT * FROM `notice` WHERE `notice_type` = '2' AND `notice_type` = '3' ORDER BY `id` DESC";

		$data['membership_list'] = $this->common->alumniMembershipList();
		$data['all_batch'] =  $this->common->getAll('batch','','','','','id','desc');
		/*$this->db->where("type",1);
    	$this->db->order_by('id','desc');
		$data['all_notice'] = $this->db->get('notice')->result_array();*/

		//echo $this->db->last_query();

		$this->load->view('public/head');
		$this->load->view('public/alumni/alumni-header');
		$this->load->view('public/alumni/registration',$data);
		$this->load->view('public/alumni/alumni-footer');
	}

	public function insert_alumni(){

		$this->db->where('trash',0);
		$this->db->where('status',1);
		$this->db->where('id !=',1);
		$data['all_dept'] = $this->db->get('dept')->result_array();

		$data['membership_list'] = $this->common->alumniMembershipList();

		$data['all_batch'] =  $this->common->getAll('batch','','','','','id','desc');

        $datetime= date('Ymdhis');



        /*$name = $this->form_validation->set_rules('name', 'Name', 'required');
        $phone = $this->form_validation->set_rules('phone', 'Phone', 'required');*/
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
        	!empty($con_pass) && !empty($roll)){


			/*$this->form_validation->set_rules('pass', 'Password', 'required');
			$this->form_validation->set_rules('con_pass', 'Confirm Password', 'required|matches[password]');*/
	        $roll_check = $this->alumni_model->isAlumni($roll);
	        $phone_check = $this->common->getSpecificRows('students','phone',$phone);
	        $email_check = $this->common->getSpecificRows('students','email',$email);
	        if ($roll_check->num_rows() > 0) {
				echo $this->session->set_flashdata("msg","This alumni already registered!! Contact alumni admin for more information.");

				$this->load->view('public/head');
				$this->load->view('public/alumni/alumni-header');
				$this->load->view('public/alumni/registration',$data);
				$this->load->view('public/alumni/alumni-footer');
	        }else{
	        	//echo print_r($roll_check);
		        if ($this->common->mobileNumberCheck($phone) == FALSE) {
		        	echo $this->session->set_flashdata("msg","Invalid mobile number.");

					$this->load->view('public/head');
					$this->load->view('public/alumni/alumni-header');
					$this->load->view('public/alumni/registration',$data);
					$this->load->view('public/alumni/alumni-footer');
			    }else if ($phone_check->num_rows > 0) {
		        	echo $this->session->set_flashdata("msg","This alumni already registered with this phone. Contact alumni admin for more information.");

					$this->load->view('public/head');
					$this->load->view('public/alumni/alumni-header');
					$this->load->view('public/alumni/registration',$data);
					$this->load->view('public/alumni/alumni-footer');
			    }else if ($pass != $con_pass) {
		        	echo $this->session->set_flashdata("msg","Password & Confirm password not match.");

					$this->load->view('public/head');
					$this->load->view('public/alumni/alumni-header');
					$this->load->view('public/alumni/registration',$data);
					$this->load->view('public/alumni/alumni-footer');
			    }else {
			    	$data['success'] = 1;
			        $data = array(
			        	'name' => $this->input->post('name'),
			        	'roll' => $this->input->post('roll'),
			        	'dept' => $this->input->post('dept'),
			        	'batch' => $this->input->post('batch'),
			        	'phone' => $this->input->post('phone'),
			        	'email' => $this->input->post('email'),
			        	'gender' => $this->input->post('gender'),
			        	'blood_group' => $this->input->post('blood_group'),
			        	'dob' => date('Y-m-d',strtotime($this->input->post('dob'))),
			        	'nid' => $this->input->post('nid'),
			        	'father_name' => $this->input->post('father_name'),
			        	'mother_name' => $this->input->post('mother_name'),
			        	'present_address' => $this->input->post('present_addr'),
			        	'permanent_address' => $this->input->post('permanent_addr'),
			        	'starting_date' => $this->input->post('starting_date'),
			        	'is_student' => $this->input->post('is_student'),
			        	'ending_date' => $this->input->post('ending_date'),
			        	'date' => date('Y-m-d'),
			        	'status' => 0
			        );
			        

                    if ($_FILES['alumni_img']['name'] !== '') {

                        $config['upload_path'] = './assets/images/alumni/profile/';
                        $config['allowed_types'] = 'jpg|jpeg|png|gif';
                        $config['max_size'] = '200000';
                        $config['max_width'] = '1524000';
                        $config['max_height'] = '1000000';
                        $this->upload->initialize($config);
                        $this->load->library('upload', $config);
                        $this->load->library('image_lib');
                        $upload = $this->upload->do_upload('alumni_img');
                        if ($upload == true) {
                            $data1 = array('upload_data' => $this->upload->data());
                            $image = $data1['upload_data']['file_name'];
                            $configBig = array();
                            $configBig['image_library'] = 'gd2';
                            $configBig['source_image'] = './assets/images/alumni/profile/' . $image;
                            $configBig['create_thumb'] = TRUE;
                            $configBig['maintain_ratio'] = FALSE;
                            $configBig['width'] = 100;
                            $configBig['height'] = 100;
                            $configBig['thumb_marker'] = "_big";
                            $this->image_lib->initialize($configBig);
                            $this->image_lib->resize();
                            $this->image_lib->clear();
                            unset($configBig);
                            $filename1 = $data1['upload_data']['raw_name'] . '_big' . $data1['upload_data']['file_ext'];
                            $rename =   $this->input->post('roll') . ".jpg";
                            rename('./assets/images/alumni/profile/' . $filename1, './assets/images/alumni/profile/' . $rename);
                            unlink(FCPATH . "/assets/images/alumni/profile/" . $image);
                            $data['image'] = $rename;
                        }
                    } else {
                        unset($data['image']);
                    }
                    
		    		$this->db->insert('students', $data);

		    		$last_inserted_id = $this->db->insert_id();

		    		if(!empty($last_inserted_id))
                    {
                        
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
                        
                        if(!empty($edu_degree))
                        {
                            $count_edu = count($edu_degree);
                            for ($i=0;$i<$count_edu;$i++)
                            {
                                if(!empty($job_info_org[$i])){
                                    $edu_data = array(
                                        'edu_degree' => $edu_degree[$i],
                                        'school_college_uni' => $edu_institution[$i],
                                        'edu_passing_year' => $edu_passing_year[$i],
                                        'edu_session' => $edu_session[$i],
                                        'edu_cgpa' => $edu_cgpa[$i],
                                        'user_id' => $last_inserted_id,
                                        'user_type' => $this->common->get_user_type('alumni'),
                                        'date' => date('Y-m-d')
                                    );
    
                                    $this->db->insert('educational_info', $edu_data);
                                }
                            }
                        }


                        if(!empty($job_info_org))
                        {
                            /*$this->db->where('user_id',$students_id);
                            $this->db->where('user_type',$user_type);
                            $this->db->delete('job_records');*/
                            $count_job_info = count($job_info_org);
                            for ($i=0;$i<$count_job_info;$i++){
                                if(!empty($job_info_org[$i])){
                                    $job_data = array(
                                        'organization_name' => $job_info_org[$i],
                                        'address' => $job_info_addr[$i],
                                        'designation' => $job_info_desgination[$i],
                                        'starting_date' => date('Y-m-d',strtotime($job_info_start_date[$i])),
                                        'ending_date' => date('Y-m-d',strtotime($job_info_end_date[$i])),
                                        'user_id' => $last_inserted_id,
                                        'user_type' =>  $this->common->get_user_type('alumni'),
                                        'date' => date('Y-m-d')
                                    );
                    
                                    $this->db->insert('job_records', $job_data);
                                }
                            }
                        }

                        if(!empty($extra_organization))
                        {
                            $count_extra_carri = count($extra_organization);
                            for ($i=0;$i<$count_extra_carri;$i++)
                            {
                                $extra_data = array(
                                    'extra_organization' => $extra_organization[$i],
                                    'extra_member_id' => $extra_member_id[$i],
                                    'extra_description' => $extra_description[$i],
                                    'user_id' => $last_inserted_id,
                                    'user_type' => $this->common->get_user_type('alumni'),
                                    'date' => date('Y-m-d')
                                );

                                $this->db->insert('curricular_activities_info', $extra_data);
                            }
                        }
                    }

					echo $this->session->set_flashdata("success","Successfully registered.");

			        $student_id = $this->common->getSpecificField('students','roll',$this->input->post('roll'),'id');

			        $pass = $this->input->post('pass');
			        $pass_hash = md5(sha1(md5($pass)));
			        $data2 = array(
			        	'user_type' => $this->common->get_user_type('alumni'),
			        	'user_id' => $student_id,
			        	'roll' => $this->input->post('roll'),
			        	'email' => $this->input->post('email'),
			        	'mobile' => $this->input->post('phone'),
			        	'pass_hash' => $pass_hash,
			        	'pass_view' => $pass,
			        	'status' => 0
			        );
			        $this->db->insert('password', $data2);


			        $alumni_table = array(
			        	'student_id' => $student_id,
			        	'membership' => $this->input->post('membership'),
			        	'date' => date('Y-m-d'),
			        	'added_by' => 0,
			        	'status' => 0
			        );
			        $this->db->insert('alumni', $alumni_table);

			        redirect('alumni/registration');
			    }
	        }
        }else{
			echo $this->session->set_flashdata("msg","* Mark fields are required!!");
	    	$data['success'] = 0;
			$this->load->view('public/head');
			$this->load->view('public/alumni/alumni-header');
			$this->load->view('public/alumni/registration',$data);
			$this->load->view('public/alumni/alumni-footer');
        }
	}
	public function update_profile(){
		$id = $this->common->user_session_data(1);
		$user_type = $this->common->user_session_data(2);
		$user_id= $this->common->user_session_data(3);
		if(empty($id))
			redirect(base_url().'alumni/login');
			
	    $this->db->where('trash',0);
        $this->db->where('status',1);
        $this->db->where('id !=',1);
        $data['all_dept'] = $this->db->get('dept')->result_array();

        $this->db->where('trash',0);
        $this->db->where('status',1);
        $this->db->order_by('id','DESC');
        $data['all_batch'] = $this->db->get('batch')->result_array();


        if(!empty($user_id)){
            $data['info'] = $this->common->getAnyInfoRow('students','id',$user_id);
            $data['user_info'] = $this->common->getAnyInfoRow('password','user_type',$user_type,'user_id',$user_id);
            $data['educational_info'] = $this->common->getAll('educational_info','user_type',$user_type,'user_id',$user_id);
            $data['job_info'] = $this->common->getAll('job_records','user_type',$user_type,'user_id',$user_id);
            $data['extra_info'] = $this->common->getAll('curricular_activities_info','user_type',$user_type,'user_id',$user_id);
        }
    
		$this->load->view('public/head');
		$this->load->view('public/alumni/alumni-header');
		$this->load->view('public/alumni/profile',$data);
		$this->load->view('public/alumni/alumni-footer');
	}
	public function update_alumni(){
		$id = $this->common->user_session_data(1);
		$user_type = $this->common->user_session_data(2);
		$user_id = $this->common->user_session_data(3);
		if(empty($id))
			redirect(base_url().'alumni/login');


		$this->db->where('trash',0);
		$this->db->where('status',1);
		$data['all_dept'] = $this->db->get('dept')->result_array();

        $datetime= date('Ymdhis');

        /*$name = $this->form_validation->set_rules('name', 'Name is', 'required');
        $phone = $this->form_validation->set_rules('phone', 'Phone', 'required');*/
        /*$this->form_validation->set_rules('pass', 'Password', 'required');
		$this->form_validation->set_rules('con_pass', 'Confirm Password', 'required|matches[password]');*/

        $students_id = $this->input->post('id');
        $name = $this->input->post('name');
        $roll = $this->input->post('roll');
        $dept = $this->input->post('dept');
        $batch = $this->input->post('batch');
        $email = $this->input->post('email');
        $phone = $this->input->post('phone');
        $father = $this->input->post('father_name');
        $mother = $this->input->post('mother_name');
        $nid = $this->input->post('nid');
        $dob = $this->input->post('dob');
        $gender = $this->input->post('gender');
        $blood_group = $this->input->post('blood_group');
        $present_addr = $this->input->post('present_addr');
        $permanent_addr = $this->input->post('permanent_addr');
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
                !empty($dept) && !empty($pass) && !empty($con_pass))
            {
                $data['success'] = 0;

                /*$this->form_validation->set_rules('pass', 'Password', 'required');
                $this->form_validation->set_rules('con_pass', 'Confirm Password', 'required|matches[password]');*/
                //$roll_check = $this->alumni_model->isAlumni($roll);
                $phone_check = $this->common->getSpecificRows('students', 'phone', $phone);
                $email_check = $this->common->getSpecificRows('students', 'email', $email);
                 if ($this->common->mobileNumberCheck($phone) == FALSE) {
                    $data['success'] = 0;
                    echo $this->session->set_flashdata("msg", "Invalid mobile number.");

                    return redirect('alumni/update_profile');
                } else {
                        /*if ($phone_check->num_rows() > 0) {
                            $data['success'] = 0;
                            echo $this->session->set_flashdata("msg", "A student already registered with this phone.");
        
                            return redirect('admin/user_profile/'.$students_id.'/'.$user_type);
                        }else if ($email_check->num_rows > 0) {
                            $data['success'] = 0;
                            echo $this->session->set_flashdata("msg", "A student already registered with this email.");

                            return redirect('admin/user_profile/'.$students_id.'/'.$user_type);
                        } else*/ if ($pass != $con_pass) {
                            $data['success'] = 0;
                            echo $this->session->set_flashdata("msg", "Password & Confirm password don't match.");


                            return redirect('alumni/update_profile');
                        } else {


                            //$students_id = $this->common->getSpecificField('students', 'phone', $this->input->post('phone'), 'id');
                            $data = array(
            		        	'name' => $name,
            		        	'roll' => $roll,
            		        	'dept' => $dept,
            		        	'batch' => $batch,
            		        	'phone' => $phone,
            		        	'email' => $email,
            		        	'gender' => $gender,
            		        	'blood_group' => $blood_group,
            		        	'dob' => date('Y-m-d',strtotime($dob)),
            		        	'nid' => $nid,
            		        	'father_name' => $father,
            		        	'mother_name' => $mother,
            		        	'present_address' => $present_addr,
            		        	'permanent_address' => $permanent_addr,
            		        	'date' => date('Y-m-d')
            		        );
            		        
                            $this->db->where('id',$students_id);
                            $this->db->update('students', $data);
            		        
            		        
            		        
            		        
            		        if ($_FILES['student_image']['name'] !== '') {
                                $config['upload_path'] = './assets/images/alumni/profile/';
                                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                                $config['max_size'] = '200000';
                                $config['max_width'] = '1524000';
                                $config['max_height'] = '1000000';
                                $this->upload->initialize($config);
                                $this->load->library('upload', $config);
                                $this->load->library('image_lib');
                                $upload = $this->upload->do_upload('student_image');
                                if ($upload == true) {
                                    $data1 = array('upload_data' => $this->upload->data());
                                    $image = $data1['upload_data']['file_name'];
                                    $configBig = array();
                                    $configBig['image_library'] = 'gd2';
                                    $configBig['source_image'] = './assets/images/alumni/profile/' . $image;
                                    $configBig['create_thumb'] = TRUE;
                                    $configBig['maintain_ratio'] = FALSE;
                                    $configBig['width'] = 100;
                                    $configBig['height'] = 100;
                                    $configBig['thumb_marker'] = "_big";
                                    $this->image_lib->initialize($configBig);
                                    $this->image_lib->resize();
                                    $this->image_lib->clear();
                                    unset($configBig);
                                    $filename1 = $data1['upload_data']['raw_name'] . '_big' . $data1['upload_data']['file_ext'];
                                    $rename =   $this->input->post('roll') . ".jpg";
                                    rename('./assets/images/alumni/profile/' . $filename1, './assets/images/alumni/profile/' . $rename);
                                    unlink(FCPATH . "/assets/images/alumni/profile/" . $image);
                                    $data['image'] = $rename;
                                }
                            } else {
                                unset($data['image']);
                            } 
            		        
                            $pass_hash = md5(sha1(md5($pass)));
                            $data2 = array(
                                'email' => $email,
                                'mobile' => $phone,
                                'pass_hash' => $pass_hash,
                                'pass_view' => $pass
                            );
                            $this->db->where('user_id',$students_id);
                            $this->db->where('user_type',$user_type);
                            $this->db->update('password', $data2);
                            
                            
                            if(!empty($edu_degree))
                            {
                                $this->db->where('user_id',$students_id);
                                $this->db->where('user_type',$user_type);
                                $this->db->delete('educational_info');
                                
                                $count_edu = count($edu_degree);
                                
                                //echo $count_edu;
                                
                                for ($i=0;$i<$count_edu;$i++)
                                {
                                    if(!empty($edu_degree[$i])){
                                        $edu_data = array(
                                            'edu_degree' => $edu_degree[$i],
                                            'school_college_uni' => $edu_institution[$i],
                                            'edu_passing_year' => $edu_passing_year[$i],
                                            'edu_session' => $edu_session[$i],
                                            'edu_cgpa' => $edu_cgpa[$i],
                                            'user_id' => $students_id,
                                            'user_type' => $user_type,
                                            'date' => date('Y-m-d')
                                        );
                                        $this->db->insert('educational_info', $edu_data);
                                    }
                                }
                            }
                            
                            
                            if(!empty($job_info_org))
                            {
                                $this->db->where('user_id',$students_id);
                                $this->db->where('user_type',$user_type);
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
                                            'user_id' => $students_id,
                                            'user_type' => $user_type,
                                            'date' => date('Y-m-d')
                                        );
                        
                                        $this->db->insert('job_records', $job_data);
                                    }
                                }
                            }
            
                            if(!empty($extra_organization))
                            {
                                $this->db->where('user_id',$students_id);
                                $this->db->where('user_type',$user_type);
                                $this->db->delete('curricular_activities_info');
                                $count_extra_carri = count($extra_organization);
                                for ($i=0;$i<$count_extra_carri;$i++)
                                {
                                    if(!empty($extra_organization[$i])){
                                        $extra_data = array(
                                            'extra_organization' => $extra_organization[$i],
                                            'extra_member_id' => $extra_member_id[$i],
                                            'extra_description' => $extra_description[$i],
                                            'user_id' => $students_id,
                                            'user_type' => $user_type,
                                            'date' => date('Y-m-d')
                                        );
                
                                        $this->db->insert('curricular_activities_info', $extra_data);
                                    }
                                }
                            }
                            
                            //$returnget = $this->admin_model->update_alumni($students_id,$user_type);
                            //echo $returnget;
                            
                            
                            
	    	                //if($returnget == 1){
	    	                    
	    	                    $data['success'] = 1;
                                echo $this->session->set_flashdata("msg", "Updated!!");
                                redirect('alumni/update_profile/');
	    	                /*}else{
	    	                    
	    	                }*/
	    	                
                            
                        }
                    }
                }
            else{
                echo $this->session->set_flashdata("msg", "* Mark fields are required!!");
                $data['success'] = 0;
                return redirect('alumni/update_profile');
            }
	}
	
	public function directory()
	{
		$data['all_alumni'] = $this->common->getAll('students','is_student',2,'status',1, 'id','desc');

		$this->load->view('public/head');
		$this->load->view('public/alumni/alumni-header');
        $this->load->view('public/alumni/all_alumni',$data);
		$this->load->view('public/alumni/alumni-footer');
	}
 	
	public function dashboard()
	{
		$data['user_id'] = $user_id = $this->common->user_session_data(3);
		$data['user_type'] = $alumni_type = $this->common->user_session_data(2);
		if (empty($user_id) && empty($alumni_type)) {
			redirect(base_url().'alumni/login');
		}

        $data["info"] = "";
        if (!empty($user_id)) {
            $data["info"] = $this->common->getAnyInfoRow('cv','user_id',$user_id,'user_type',$alumni_type);
            $data["edu_info"] = $this->common->getAll('educational_info','user_id',$user_id,'user_type',$alumni_type);
            $data["job_info"] = $this->common->getAll('job_records','user_id',$user_id,'user_type',$alumni_type);
            $data["alumni_research"] = $this->common->getAll('research_paper','user_id',$user_id,'user_type',$alumni_type);
        }
        
		$data['all_alumni'] = $this->common->getAll('students','is_student',2,'status',1, 'id','desc');

		$this->load->view('public/head');
		$this->load->view('public/alumni/alumni-header');
        $this->load->view('public/alumni/dashboard',$data);
		$this->load->view('public/alumni/alumni-footer');
	}
	
	public function alumni_cv_insert() {
		$user_type = $this->common->user_session_data(2);
		$user_id = $this->common->user_session_data(3);
		if(empty($id))
			redirect(base_url().'alumni/login');

	    $data = array();
	    $data['title'] = 'Add alumni cv';

	    $title = $this->form_validation->set_rules('title', 'Title is', 'required');
	    $data['success'] = '';

	    if ($this->form_validation->run() === FALSE)
	    {
	    	$data['success'] = 0;
	        return redirect('alumni/dashboard/');
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
	                
		        	redirect('alumni/dashboard');
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

            if(!empty($_POST['cv_id'])){
                if ($_FILES['cv_file']['name'] !== '' && $this->common->getAnyInfoRow('cv', 'id', $_POST['cv_id'])->file_name)
                    unlink(FCPATH . "/assets/doc/cv/" . $this->common->getAnyInfoRow('cv', 'id', $_POST['cv_id'])->file_name);

                $this->db->where('id',$_POST['cv_id']);
                $this->db->update('cv', $notice_info);
            }else{
                $this->db->insert('cv', $notice_info);
            }
	        redirect('alumni/dashboard');
	    }
	}
	
	public function add_research_paper() {
	    $added_by = $this->common->user_session_data(1);

        /*image upload*/
        if ($_FILES['paper_file']['name'] !== '') {
            $slider_image_info = array(
                'user_id' => $_POST['alumni_id'],
                'user_type' => $this->common->get_user_type('alumni'),
                'title' =>  $_POST['title'],
                'date' =>  $this->common->getDate(),
                'date_time' =>  $this->common->getDateTime(),
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
                $title_trim = trim($_POST['title']);
                $rename = date('Ymd_his_')  .$title_trim. $data1['upload_data']['file_ext'];
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
                    return redirect('alumni/dashboard/');
                } else {
                    $slider_image_info['date_time'] = $this->common->getDateTime();
                    $slider_image_info['file_name'] = $rename;
                    $this->db->insert('research_paper', $slider_image_info);
    
                    if ($this->db->insert_id() > 0) {
                        $this->session->set_flashdata('feedback', "Added Successfully");
                        $this->session->set_flashdata('feedback_class', 'alert-success');
                        return redirect('alumni/dashboard/');
                    } else {
                        unset($slider_image_info['file_name']);
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
        
        /*$this->db->where('user_id',$students_id);
        $this->db->where('user_type',$user_type);
        $this->db->delete('job_records');
        if ($_FILES['paper_file']['name'] !== '' && $this->common->getAnyInfoRow('research_paper', 'id', $_POST['paper_id'])->file_name )
            unlink(FCPATH . "assets/doc/research_and_publication/" . $this->common->getAnyInfoRow('research_paper', 'id', $_POST['paper_id'])->file_name);
        
        */

        if ($id != null) {
            $this->db->where('id',$id);
            $this->db->update('research_paper', array('trash' => 1));
        }
        redirect('admin/research_paper');
    }
	
 	function logout(){
      	$this->session->sess_destroy();
      	redirect(base_url().'alumni/login');
  	}
	public function forgot_password()
	{
		$this->load->view('admin/forgot-password');
	}
}