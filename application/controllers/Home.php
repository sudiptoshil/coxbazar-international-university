<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct() {
	    parent::__construct();
	    $this->load->model('common');
	}
	public function index()
	{
	    
		$this->db->where("trash",0);
		$this->db->where("class",1);
		$this->db->where("dept_id",1);
    	$this->db->order_by('id','desc');
		$data['all_slider_image'] = $this->db->get('tbl_slider_image')->result_array();
		
		$this->db->where("notice_type = 2 OR notice_type=3" );
		$this->db->where("status",1);
		$this->db->where("trash",0);
    	$this->db->order_by('id','desc');
		$data['all_news_events'] = $this->db->get('notice')->result_array();
		//$data['all_notice'] = "SELECT * FROM `notice` WHERE `notice_type` = '2' AND `notice_type` = '3' ORDER BY `id` DESC";

		$this->db->where("trash",0);
		$this->db->where("notice_type",4);
		$this->db->where("status",1);
    	$this->db->order_by('id','desc');
		$data['all_academic_notice'] = $this->db->get('notice')->result_array();
		
		$this->db->where("trash",0);
		$this->db->where("notice_type",1);
		$this->db->where("status",1);
    	$this->db->order_by('id','desc');
		$data['all_notice'] = $this->db->get('notice')->result_array();
		
		$this->db->where("trash",0);
		$this->db->where("is_breaking",1);
		$this->db->where("status",1);
    	$this->db->order_by('id','desc');
		$data['all_breaking'] = $this->db->get('notice')->result_array();
		
		$this->db->where("trash",0);
		$this->db->where("code != ",0);
    	$this->db->order_by('id','desc');
		$data['all_dept'] = $this->db->get('dept')->result_array();
		
		$this->db->where("trash",0);
		$this->db->where("status",1);
    	$this->db->order_by('id','desc');
		$data['all_event'] = $this->db->get('event')->result_array();
		
        $data['tecn_info'] = $this->common->getAnyInfoRow('dept','code',0);
		
		$this->db->where("trash",0);
		$this->db->where("status",1);
    	$this->db->order_by('id','desc');
		$data['all_service_box'] = $this->db->get('service_box')->result_array();

		$this->db->where("trash",0);
		$this->db->where("status",1);
    	$this->db->order_by('name','asc');
		$data['faculties'] = $this->db->get('faculty')->result_array();

		$this->db->where("trash",0);
		$this->db->where("status",1);
    	$this->db->order_by('name','asc');
		$data['offering_degree'] = $this->db->get('offering_degree')->result_array();

		$this->db->where("trash",0);
		$this->db->where("status",1);
    	$this->db->order_by('name','asc');
		$data['administration_list'] = $this->db->get('administration_list')->result_array();


		//echo $this->db->last_query();

		$this->load->view('public/head');
		$this->load->view('public/header');
		$this->load->view('public/index',$data);
		$this->load->view('public/footer');
	}
	public function mission_vision()
	{
		$this->load->view('public/head');
		$this->load->view('public/header');
		$this->load->view('public/mission_vision');
		$this->load->view('public/footer');
	    
	}
	public function research_and_publication()
	{
	    if(isset($_GET['r'])){
	        $r = $_GET['r'];
	        if($r == 's'){
                $this->db->where("user_type !=",$this->common->get_user_type('teacher'));
            }elseif($r == 't'){
                $this->db->where("user_type",$this->common->get_user_type('teacher'));
            }
	    }    
		$this->db->where("trash",0);
		$this->db->where("status",1);
    	$this->db->order_by('id','desc');
		$data['all_research'] = $this->db->get('research_paper')->result_array();
		
		$this->load->view('public/head');
		$this->load->view('public/header');
		$this->load->view('public/research_and_publication',$data);
		$this->load->view('public/footer');
	    
	}
	public function administration()
	{
		/*$this->db->where("trash",0);
		$this->db->where("status",1);
    	$this->db->order_by('id','desc');
		$data['all_research'] = $this->db->get('research_paper')->result_array();*/
		
		$this->load->view('public/head');
		$this->load->view('public/header');
		$this->load->view('public/administration');
		$this->load->view('public/footer');
	    
	}
	public function al($id=null)
	{
	    if($id == null)
	        redirect('home/administration/');

	    $data = array();
        $data['id'] = $id;
        
		$this->db->where("trash",0);
		$this->db->where("status",1);
		$this->db->where("list_id",$id);
    	$this->db->order_by('id','desc');
		$data['administration_staff'] = $this->db->get('administration_staff')->result_array();

		$this->load->view('public/head');
		$this->load->view('public/header');
		$this->load->view('public/administration_list',$data);
		$this->load->view('public/footer');

	}
	public function register()
	{
		/*$this->db->where("trash",0);
		$this->db->where("status",1);
    	$this->db->order_by('id','desc');
		$data['all_research'] = $this->db->get('research_paper')->result_array();*/

		$this->load->view('public/head');
		$this->load->view('public/header');
		$this->load->view('public/register');
		$this->load->view('public/footer');

	}

    public function officer_list()
    {
        $data = '';
        $data['all_officer'] = $this->common->getAll('administration_list');

        $data["administration_staff_list"] = $this->common->getAll('administration_staff','','','','','id','desc');
        $data['designaion'] = $this->common->getAll('designation','type',$this->common->get_user_type('staff'));

        $this->load->view('public/head');
        $this->load->view('public/header');
        $this->load->view('public/officer_list',$data);
        $this->load->view('public/footer');
    }


    public function admission()
	{
		$this->load->view('public/head');
		$this->load->view('public/header');
		$this->load->view('public/admission');
		$this->load->view('public/footer');
	}

    public function applicant_login()
    {
        //echo $this->db->last_query();

        $this->load->view('public/head');
        $this->load->view('public/header');
        $this->load->view('public/admission/login');
        $this->load->view('public/footer');
    }

    public function auth()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $pass_hash = md5($password);
        //$validate = $this->login_model->validate($username_email,$pass_hash);


        //echo '<pre>';
        //echo print_r($all_alumni);
        if (!empty($email) && !empty($password)) {

            $alumni_row = $this->common->getSpecificRows('admission','email',$email);

            //$email = $this->common->getSpecificRows('password','email',$username_email,'user_type',$this->common->get_user_type('alumni'));
            //$mobile = $this->common->getSpecificRows('password','mobile',$username_email,'user_type',$this->common->get_user_type('alumni'));


            if ($alumni_row->num_rows() > 0) {
                $check = $alumni_row->row_array();
                if($check['pass_hash'] == $pass_hash){
                    $id = $check['id'];
                    $ses_data = array(
                        'id' => $id,
                    );
                    $this->session->set_userdata($ses_data);
                    redirect(base_url().'home/dashboard');
                }else{
                    echo $this->session->set_flashdata("msg","Password wrong");
                    redirect(base_url().'home/applicant_login');
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
                echo $this->session->set_flashdata("msg","No applicant found with this email!!");
                redirect(base_url().'home/applicant_login');
            }
        }else if (empty($email) || empty($password)) {
            echo $this->session->set_flashdata("msg","Email or Password empty!!");
            redirect(base_url().'home/applicant_login');
        }else{
            echo $this->session->set_flashdata("msg","Email or password wrong!!");
            redirect(base_url().'home/applicant_login');
        }
	}
	
	// public function auth()
	// {
	// 	$student = Student_reg::where('email', $_REQUEST['email'])->first();
    //     if ($student) {
    //         if (password_verify($_REQUEST['password'], $student->password)) {
    //             redirect(base_url().'home/dashboard');
              
    //         } else {
	// 		   echo $this->session->set_flashdata("msg","wrong password
	// 		   !!");
    //         redirect(base_url().'home/applicant_login');
    //         }
    //     } else {
	// 		echo $this->session->set_flashdata("msg","Invalid email
	// 		!!");
	// 	 redirect(base_url().'home/applicant_login');
    //     }
	// }
    public function dashboard()
    {
        $data['id'] = $user_id = $this->common->user_session_data(1);
        if (empty($user_id)) {
            redirect(base_url().'home/applicant_login');
        }

        $data["info"] = "";
        if (!empty($user_id)) {
            $data["info"] = $this->common->getAnyInfoRow('admission','id',$user_id);
            $data["edu_info"] = $this->common->getAll('educational_info','admission_id',$user_id);
            $data["payment_info"] = $this->common->getAnyInfoRow('admission_payment','applicant_id',$user_id);
        }

        $this->load->view('public/head');
        $this->load->view('public/header');
        $this->load->view('public/admission/dashboard',$data);
        $this->load->view('public/footer');
    }
    function logout(){
        $this->session->sess_destroy();
        /*$this->session->unset_userdata('id');
        $this->session->unset_userdata('user_type');
        $this->session->unset_userdata('user_id');*/
        redirect('home/applicant_login');
    }
    public function admission_form()
	{
		$data['id'] = $user_id = $this->common->user_session_data(1);
		if (empty($user_id)) {
			redirect(base_url() . 'home/applicant_login');
		}
		
        $this->db->where('trash',0);
        $this->db->where('status',1);
        $data['all_board'] = $this->db->get('board')->result_array();

        $this->db->where('trash',0);
        $this->db->where('status',1);
        $this->db->where('faculty >',0);
        $data['all_dept'] = $this->db->get('dept')->result_array();

		$this->load->view('public/head');
		$this->load->view('public/header');
		$this->load->view('public/admission_form',$data);
		$this->load->view('public/footer');
	}
    public function admission_form_submit()
	{
        $this->db->where('trash',0);
        $this->db->where('status',1);
        $this->db->where('id !=',1);
        $data['all_dept'] = $this->db->get('dept')->result_array();

        $data['membership_list'] = $this->common->alumniMembershipList();

        $data['all_batch'] =  $this->common->getAll('batch','','','','','id','desc');

        $datetime= date('Ymdhis');

        $dept = $this->input->post('dept');
        $shift = $this->input->post('shift');
        if($dept != 2 ){
            $shift = 1;
        }

        $name = $this->input->post('name');
        $name_bangla = $this->input->post('name_bangla');
        $gender = $this->input->post('gender');
        $dob = date("Y-m-d",strtotime($this->input->post('dob')));
        $father = $this->input->post('father_name');
        $father_occupation = $this->input->post('father_occupation');
        $mother = $this->input->post('mother_name');
        $mother_occupation = $this->input->post('mother_occupation');
        $guardian_name = $this->input->post('guardian_name');
        $guardian_occupation = $this->input->post('guardian_occupation');
        $phone = $this->input->post('phone');
        $alternate_phone = $this->input->post('alternate_phone');
        $email = $this->input->post('email');
        $father_guardian_phone = $this->input->post('father_guardian_phone');
        $nationality = $this->input->post('nationality');
        $country = $this->input->post('country');
        $marital_status = $this->input->post('marital_status');
        $religion = $this->input->post('religion');
        $passport = $this->input->post('passport');
        $blood_group = $this->input->post('blood_group');
        $pass_validation_date = $this->input->post('pass_validation_date');
        $birth_certificate = $this->input->post('birth_certificate');

        //academic info
//        $exam = $this->input->post('exam');
//        $board = $this->input->post('board');
//        $institution = $this->input->post('institution');
//        $passing_year = $this->input->post('passing_year');
//        $group = $this->input->post('group');
//        $cgpa = $this->input->post('cgpa');
//        $mark_without_optional = $this->input->post('mark_without_optional');

        //present_ address
        $house_no = $this->input->post('house_no');
        $road_village = $this->input->post('road_village');
        $lane = $this->input->post('lane');
        $block = $this->input->post('block');
        $area = $this->input->post('area');
        $thana = $this->input->post('thana');
        $district = $this->input->post('district');

        //present_ address
        $permanent_house_no = $this->input->post('permanent_house_no');
        $permanent_road_village = $this->input->post('permanent_road_village');
        $permanent_lane = $this->input->post('permanent_lane');
        $permanent_block = $this->input->post('permanent_block');
        $permanent_area = $this->input->post('permanent_area');
        $permanent_thana = $this->input->post('permanent_thana');
        $permanent_district = $this->input->post('permanent_district');

        $password = $this->input->post('password');
        $confirm_password = $this->input->post('confirm_password');

        $sender_number = $this->input->post('sender_number');
        $transaction_id = $this->input->post('transaction_id');
        $reference = $this->input->post('reference');
        $amount = $this->input->post('amount');


        //$this->db->insert('admission', $data);
      // echo "sql=>".$this->db->last_query();
     /*   if(!empty($name) && !empty($phone) && !empty($email) && !empty($dob) &&
            !empty($father) && !empty($mother)
            && !empty($password) &&
            !empty($confirm_password) ){*/

        $phone_check = $this->common->getSpecificRows('admission','mobile',$phone);
            //echo $this->db->last_query();
            $email_check = $this->common->getSpecificRows('admission','email',$email);

                if ($password != $confirm_password) {
                    echo $this->session->set_flashdata("msg","Password & Confirm password not match.");
                }else {
                    //$data['success'] = 1;
                    $data = array(
                        'dept' => $dept,
                        'shift' => $shift,
                        'name' => $name,
                        'name_bangla' => $name_bangla,
                        'gender' => $gender,
                        'dob' => $dob,
                        'fatherName' => $father,
                        'father_occupation' => $father_occupation,
                        'motherName' => $mother,
                        'mother_occupation' => $mother_occupation,
                        'guardianName' => $guardian_name,
                        'guardian_occupation' => $guardian_occupation,
                        'mobile' => $phone,
                        'alternate_phone' => $alternate_phone,
                        'email' => $email,
                        'guardianMobile' => $father_guardian_phone,
                        'nationality' => $nationality,
                        'country' => $country,
                        'marital_status' => $marital_status,
                        'religion' => $religion,
                        'passport' => $passport,
                        'bloodGroup' => $blood_group,
                        'pass_validation_date' => $pass_validation_date,
                        'birth_certificate' => $birth_certificate,

                        /*'house_no' => $house_no,
                        'road_village' =>  $road_village,
                        'lane' =>  $lane,
                        'block' => $block,*/
                        'presentAddress' => $house_no .",".$road_village.",".$lane.",".$block.','. $area,
                        'prThanaId' => $thana,
                        'prDistrict' => $district,

                        /*'permanent_house_no' => $permanent_house_no,
                        'permanent_road_village' =>  $permanent_road_village,
                        'permanent_lane' =>  $permanent_lane,
                        'permanent_block' => $permanent_block,*/
                        'permanentAddress' => $permanent_house_no .",".$permanent_road_village.",".$permanent_lane.",".$permanent_block.','. $permanent_area,
                        'perThanaId' => $permanent_thana,
                        'perDistrict' => $permanent_district,

                        'pass' => $password,
                        'pass_hash' => md5(sha1(md5($password))),

                        'date' => date("Y-m-d"),

                        'status' => 1
                    );
                    $payment_data = array(
                        'payment_type '=> 2,
                        'sender_number'=> $sender_number,
                        'sender_number'=> $sender_number,
                        'transaction_id'=> $transaction_id,
                        'reference' => $reference,
                        'amount' => $amount,
                        'date' => date('Y-m-d'),
                    );

                    /* profile/applicant's photo */
                    if ($_FILES['applicant_img']['name'] !== '') {

                        $config['upload_path'] = './assets/images/applicants/';
                        $config['allowed_types'] = 'jpg|jpeg|png|gif';
                        $config['max_size'] = '200000';
                        $config['max_width'] = '1524000';
                        $config['max_height'] = '1000000';
                        $this->upload->initialize($config);
                        $this->load->library('upload', $config);
                        $this->load->library('image_lib');
                        $upload = $this->upload->do_upload('applicant_img');
                        if ($upload == true) {
                            $data1 = array('upload_data' => $this->upload->data());
                            $image = $data1['upload_data']['file_name'];
                            $configBig = array();
                            $configBig['image_library'] = 'gd2';
                            $configBig['source_image'] = './assets/images/applicants/' . $image;
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
                            $rename =   trim($dept).'_'.trim($name).'_'.trim($phone).".jpg";
                            rename('./assets/images/applicants/' . $filename1, './assets/images/applicants/' . $rename);
                            unlink(FCPATH . "/assets/images/applicants/" . $image);
                            $data['image'] = $rename;
                        }
                    } else {
                        unset($data['image']);
                    }
                    /* profile/applicant's photo */

                    /* SSC transcript image */
                    if ($_FILES['ssc_transcript']['name'] !== '') {

                        $config['upload_path'] = './assets/images/applicants/';
                        $config['allowed_types'] = 'jpg|jpeg|png|gif';
                        $config['max_size'] = '200000';
                        $config['max_width'] = '1524000';
                        $config['max_height'] = '1000000';
                        $this->upload->initialize($config);
                        $this->load->library('upload', $config);
                        $this->load->library('image_lib');
                        $upload = $this->upload->do_upload('ssc_transcript');
                        if ($upload == true) {
                            $data1 = array('upload_data' => $this->upload->data());
                            $image = $data1['upload_data']['file_name'];
                            $configBig = array();
                            $configBig['image_library'] = 'gd2';
                            $configBig['source_image'] = './assets/images/applicants/' . $image;
                            $configBig['create_thumb'] = TRUE;
                            $configBig['maintain_ratio'] = FALSE;
                            /*$configBig['width'] = 100;
                            $configBig['height'] = 100;*/
                            $configBig['thumb_marker'] = "_big";
                            $this->image_lib->initialize($configBig);
                            $this->image_lib->resize();
                            $this->image_lib->clear();
                            unset($configBig);
                            $filename1 = $data1['upload_data']['raw_name'] . '_big' . $data1['upload_data']['file_ext'];
                            $rename =   'ssc_trans_'.trim($dept).'_'.trim($name).'_'.trim($phone).".jpg";
                            rename('./assets/images/applicants/' . $filename1, './assets/images/applicants/' . $rename);
                            unlink(FCPATH . "/assets/images/applicants/".$image);
                            $data['ssc_transcript_img'] = $rename;
                        }
                    } else {
                        unset($data['ssc_transcript_img']);
                    }
                    /* SSC transcript image */

                    /* HSC transcript image */
                    if ($_FILES['hsc_transcript']['name'] !== '') {

                        $config['upload_path'] = './assets/images/applicants/';
                        $config['allowed_types'] = 'jpg|jpeg|png|gif';
                        $config['max_size'] = '200000';
                        $config['max_width'] = '1524000';
                        $config['max_height'] = '1000000';
                        $this->upload->initialize($config);
                        $this->load->library('upload', $config);
                        $this->load->library('image_lib');
                        $upload = $this->upload->do_upload('hsc_transcript');
                        if ($upload == true) {
                            $data1 = array('upload_data' => $this->upload->data());
                            $image = $data1['upload_data']['file_name'];
                            $configBig = array();
                            $configBig['image_library'] = 'gd2';
                            $configBig['source_image'] = './assets/images/applicants/' . $image;
                            $configBig['create_thumb'] = TRUE;
                            $configBig['maintain_ratio'] = FALSE;
                            /*$configBig['width'] = 100;
                            $configBig['height'] = 100;*/
                            $configBig['thumb_marker'] = "_big";
                            $this->image_lib->initialize($configBig);
                            $this->image_lib->resize();
                            $this->image_lib->clear();
                            unset($configBig);
                            $filename1 = $data1['upload_data']['raw_name'] . '_big' . $data1['upload_data']['file_ext'];
                            $rename =   'hsc_trans_'.trim($dept).'_'.trim($name).'_'.trim($phone).".jpg";
                            rename('./assets/images/applicants/' . $filename1, './assets/images/applicants/' . $rename);
                            unlink(FCPATH . "/assets/images/applicants/".$image);
                            $data['hsc_transcript_img'] = $rename;
                        }
                    } else {
                        unset($data['hsc_transcript_img']);
                    }
                    /* HSC transcript image */

                    /* Degree/Hnrs transcript image */
                    if ($_FILES['degree_honours_transcript']['name'] !== '') {

                        $config['upload_path'] = './assets/images/applicants/';
                        $config['allowed_types'] = 'jpg|jpeg|png|gif';
                        $config['max_size'] = '200000';
                        $config['max_width'] = '1524000';
                        $config['max_height'] = '1000000';
                        $this->upload->initialize($config);
                        $this->load->library('upload', $config);
                        $this->load->library('image_lib');
                        $upload = $this->upload->do_upload('degree_honours_transcript');
                        if ($upload == true) {
                            $data1 = array('upload_data' => $this->upload->data());
                            $image = $data1['upload_data']['file_name'];
                            $configBig = array();
                            $configBig['image_library'] = 'gd2';
                            $configBig['source_image'] = './assets/images/applicants/' . $image;
                            $configBig['create_thumb'] = TRUE;
                            $configBig['maintain_ratio'] = FALSE;
                            /*$configBig['width'] = 100;
                            $configBig['height'] = 100;*/
                            $configBig['thumb_marker'] = "_big";
                            $this->image_lib->initialize($configBig);
                            $this->image_lib->resize();
                            $this->image_lib->clear();
                            unset($configBig);
                            $filename1 = $data1['upload_data']['raw_name'] . '_big' . $data1['upload_data']['file_ext'];
                            $rename =   'deg_hnrs_trans_'.trim($dept).'_'.trim($name).'_'.trim($phone).".jpg";
                            rename('./assets/images/applicants/' . $filename1, './assets/images/applicants/' . $rename);
                            unlink(FCPATH . "/assets/images/applicants/".$image);
                            $data['degree_honours_transcript_img'] = $rename;
                        }
                    } else {
                        unset($data['degree_honours_transcript_img']);
                    }
                    /* SSC transcript image */

                    $this->db->insert('admission', $data);

                    //echo $this->db->last_query();

                    $last_inserted_id = $this->db->insert_id();

                    if(!empty($last_inserted_id))
                    {

                        $exam = $this->input->post('exam');
                        $board = $this->input->post('board');
                        $institution = $this->input->post('institution');
                        $passing_year = $this->input->post('passing_year');
                        $group = $this->input->post('group');
                        $cgpa = $this->input->post('cgpa');
                        $mark_without_optional = $this->input->post('mark_without_optional');
                        if(empty($board)){
                            $board = 0;
                        }

                        if(!empty($exam))
                        {
                            $count_exam = count($exam);
                            for ($i=0;$i<$count_exam;$i++)
                            {
                                if(!empty($exam[$i])){
                                    $edu_data = array(
                                        'admission_id' => $last_inserted_id,
                                        'exam' => $exam[$i],
                                        'board' => $board[$i],
                                        'institution' => $institution[$i],
                                        'passing_year' => $passing_year[$i],
                                        'group' => $group[$i],
                                        'cgpa' => $cgpa[$i],
                                        'gpa' => $mark_without_optional[$i],
                                        'date' => date('Y-m-d')
                                    );

                                    $this->db->insert('educational_info', $edu_data);
                                }
                            }

                        }
                        $payment_data['applicant_id'] = $last_inserted_id;
                        $this->db->insert('admission_payment', $payment_data);
                        echo $this->session->set_flashdata("success","Successfully Submitted.");
                    }
                    redirect('home/admission_form');
                }
      //  }
	}
	public function event($id=null)
	{
	    $data = '';
	    if($id != null){
	        $data['id'] = $id;
	        $data['info'] = $this->common->getAnyInfoRow('event','id',$id);
        }else{
            $data['info'] = $this->common->getAll('event','status','1');
        }
	    
		$this->load->view('public/head');
		$this->load->view('public/header');
		$this->load->view('public/event',$data);
		$this->load->view('public/footer');
	}
	
	public function mujib_borsho($id=null)
	{
	    $data = '';
	    if($id != null){
	        $data['id'] = $id;
	        $data['info'] = $this->common->getAnyInfoRow('mujib_borsho','id',$id);
        }else{
            $data['info'] = $this->common->getAll('mujib_borsho','status','1');
        }
	    
		$this->load->view('public/head');
		$this->load->view('public/header');
		$this->load->view('public/mujib_borsho',$data);
		$this->load->view('public/footer');
	}
	
	public function principal_msg()
	{
	    $data = '';
	    
		$this->load->view('public/head');
		$this->load->view('public/header');
		$this->load->view('public/principal_msg',$data);
		$this->load->view('public/footer');
	}
	public function muktijuddha_corner($id=null)
	{
	    $data = '';
	    if($id != null){
	        $data['id'] = $id;
	        $data['info'] = $this->common->getAnyInfoRow('muktijuddha_corner','id',$id);
        }else{
            $data['info'] = $this->common->getAll('muktijuddha_corner','status','1');
        }
	    
		$this->load->view('public/head');
		$this->load->view('public/header');
		$this->load->view('public/muktijuddha_corner',$data);
		$this->load->view('public/footer');
	}
	public function library($id=null)
	{
	    $data = '';
	    if($id != null){
	        $data['id'] = $id;
	        $data['info'] = $this->common->getAnyInfoRow('library','id',$id);
        }else{
            $data['info'] = $this->common->getAll('library','status','1');
        }

		$this->load->view('public/head');
		$this->load->view('public/header');
		$this->load->view('public/library',$data);
		$this->load->view('public/footer');
	}
	
	public function sb($sb_id,$sb_list_id)
	{
	    $data = '';
	    $data['sb_id'] = $sb_id;
	    $data['sb_list_id'] = $sb_list_id;
        //$data['info'] = $this->common->getAnyInfoRow('muktijuddha_corner','id',$id);
        $data['sb_list_file'] = $this->common->getAll('service_box_list_file','service_box_list',$sb_list_id,'status','1');
	    
		$this->load->view('public/head');
		$this->load->view('public/header');
		$this->load->view('public/service_box',$data);
		$this->load->view('public/footer');
	}
	public function archive($id=null)
	{
	    $data = '';
	    if($id != null){
	        $data['id'] = $id;
	        $data['info'] = $this->common->getAnyInfoRow('notice','id',$id);
        }else{
	        if(isset($_GET)){
	            if(!empty($_GET['type']))
	                $this->db->where('notice_type',$_GET['type']);

                if(!empty($_GET['start_date']) && !empty($_GET['end_date'])) {
                    $start_date = date('Y-m-d',strtotime($_GET['start_date']));
                    $end_date = date('Y-m-d',strtotime($_GET['end_date']));
                    $this->db->where('date >=',$start_date);
                    $this->db->where('date <=',$end_date);
                }
                $this->db->where('status', 0);
                $this->db->where('trash', 0);

                $data['all_notice'] = $this->db->get('notice')->result_array();

            }else{
                $start_date = date("Y-m-d",strtotime("-2 month",strtotime(date("Y-m-01",strtotime("now") ) )));
                $end_date = date("Y-m-d",strtotime("-1 month",strtotime(date("Y-m-30",strtotime("now") ) )));

                $this->db->where('date >=',$start_date);
                $this->db->where('date <=',$end_date);
                $this->db->where('status', 0);
                $this->db->where('trash', 0);
                $data['all_notice'] = $this->db->get('notice')->result_array();
            }
            //echo $this->db->last_query();
        }
	    
		$this->load->view('public/head');
		$this->load->view('public/header');
		$this->load->view('public/archive',$data);
		$this->load->view('public/footer');
	}
	public function club($id=null)
	{
	    $data = '';
	    if($id != null){
	        $data['id'] = $id;
	        $data['info'] = $this->common->getAnyInfoRow('club','id',$id);
        }else{
            $data['info'] = $this->common->getAll('club','status','1');
        }
		
		$this->load->view('public/head');
		$this->load->view('public/header');
		$this->load->view('public/club',$data);
		$this->load->view('public/footer');
	}
	public function important_hotline()
	{
	    $data = '';
        $data['all_hotline'] = $this->common->getAll('important_phone','status','1');
		
		$this->load->view('public/head');
		$this->load->view('public/header');
		$this->load->view('public/important_hotline',$data);
		$this->load->view('public/footer');
	}
	
	public function contact_us_submit() {

	    $name = $this->form_validation->set_rules('name', 'Name is', 'required');
	    $email = $this->form_validation->set_rules('email', 'Email is', 'required');
	    $phone = $this->form_validation->set_rules('phone', 'Phone no is', 'required');
	    $subject =  $this->form_validation->set_rules('subject', 'Subject is', 'required');
	    $description =  $this->form_validation->set_rules('description', 'Description', 'required');
		

	    $data['success'] = '';

	    if ($this->form_validation->run() === FALSE)
	    {
	    	$data['success'] = 0;
            $this->session->set_flashdata('msg','Not send!!');
	    	redirect(base_url());
	    }
	    else
	    {
	    	$data['success'] = 1;
	    	$contact_info = array(
		        'name' => $this->input->post('name'),
		        'email' => $this->input->post('email'),
		        'phone' => $this->input->post('phone'),
		        'subject' => $this->input->post('subject'),
		        'description' => $this->input->post('description'),
		        'date' => $this->common->getDate(),
		        'date_time' => $this->common->getDateTime()
		    );
            $this->db->insert('contact_us', $contact_info);
            $this->session->set_flashdata('msg','Your messege successfully submitted.');
	        redirect(base_url());
	    }
	}
	
	
}
