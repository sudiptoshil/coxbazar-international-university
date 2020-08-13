<?php
class Admin_Model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }
	public function notice_type($type)
	{
		if($type == 1){
			return "General Notice";
		}elseif ($type == 2) {
			return "News";
		}elseif ($type == 3) {
			return "Events";
		}elseif ($type == 4) {
			return "Academic Notice";
		}
	}
	public function insert_notice($data)
	{
	    $this->load->helper('url');
	    //$slug = url_title($this->input->post('title'), 'dash', TRUE);
	    return $this->db->insert('notice', $data);
	}
	/* add teacher */
	public function add_teacher()
	{
        $data = array(
        	'name' => $this->input->post('name'),
        	'email' => $this->input->post('email'),
        	'phone' => $this->input->post('phone'),
        	'father_name' => $this->input->post('father_name'),
        	'mother_name' => $this->input->post('mother_name'),
        	'nid' => $this->input->post('nid'),
        	'dob' => $this->input->post('dob'),
        	'gender' => $this->input->post('gender'),
        	'present_address' => $this->input->post('present_addr'),
        	'permanent_address' => $this->input->post('permanent_addr'),
        	'dept' => $this->input->post('dept'),
        	'designation' => $this->input->post('desig'),
        	'joining_date' => $this->input->post('joining_date'),
        	'added_by' => $this->common->user_session_data(1)
        );

        /*image upload*/
        if ($_FILES['teacher_image']['name'] !== '') {

            $config['upload_path'] = './assets/images/teachers/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['max_size'] = '200000';
            $config['max_width'] = '1524000';
            $config['max_height'] = '1000000';
            $this->upload->initialize($config);
            $this->load->library('upload', $config);
            $this->load->library('image_lib');
            $upload = $this->upload->do_upload('teacher_image');
            if ($upload == true) {
                $data1 = array('upload_data' => $this->upload->data());
                $image = $data1['upload_data']['file_name'];
                $configBig = array();
                $configBig['image_library'] = 'gd2';
                $configBig['source_image'] = './assets/images/teachers/' . $image;
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
                $rename = date('Ymd_his_') . $this->input->post('name') . ".jpg";
                rename('./assets/images/teachers/' . $filename1, './assets/images/teachers/' . $rename);
                unlink(FCPATH . "/assets/images/teachers/" . $image);
                $data['image'] = $rename;
            }
        } else {
            unset($data['image']);
        }
        /*image upload*/



        if(!empty($_POST['teacher_id'])){
            if ($_FILES['teacher_image']['name'] !== '' && $this->common->getAnyInfoRow('teachers', 'id', $_POST['teacher_id'])->image) {
                unlink(FCPATH . "/assets/images/teachers/" . $this->common->getAnyInfoRow('teachers', 'id', $_POST['teacher_id'])->image);
            }

            
            $this->db->where('id',$_POST['teacher_id']);
            return $this->db->update('teachers', $data);




        }else{
            $this->db->insert('teachers', $data);

            $last_inserted_id = $this->db->insert_id();


            if(!empty($last_inserted_id))
            {

                $edu_degree = $this->input->post('edu_degree');
                $edu_passing_year = $this->input->post('edu_passing_year');
                $edu_session = $this->input->post('edu_session');
                $edu_cgpa = $this->input->post('edu_cgpa');

                $job_info_org = $this->input->post('job_org_name');
                $job_info_addr = $this->input->post('job_org_addr');
                $job_info_desgination = $this->input->post('job_org_designation');
                $job_info_start_date = $this->input->post('job_org_starting_date');
                $job_info_end_date = $this->input->post('job_org_ending_date');

                $extra_organization = $this->input->post('extra_organization');
                $extra_member_id = $this->input->post('extra_member_id');
                $extra_description = $this->input->post('extra_description');

                if(!empty($edu_degree))
                {
                    $count_edu = count($edu_degree);
                    for ($i=0;$i<$count_edu;$i++)
                    {
                        $edu_data = array(
                            'edu_degree' => $edu_degree[$i],
                            'edu_passing_year' => $edu_passing_year[$i],
                            'edu_session' => $edu_session[$i],
                            'edu_cgpa' => $edu_cgpa[$i],
                            'user_id' => $last_inserted_id,
                            'user_type' => $this->common->get_user_type('teacher'),
                            'date' => date('Y-m-d')
                        );

                        $this->db->insert('educational_info', $edu_data);
                    }
                }
                
                if(!empty($job_info_org))
                {
                    $count_job_info = count($job_info_org);
                    for ($i=0;$i<$count_job_info;$i++){
                        $job_data = array(
                            'organization_name' => $job_info_org[$i],
                            'address' => $job_info_addr[$i],
                            'designation' => $job_info_desgination[$i],
                            'starting_date' => $job_info_start_date[$i],
                            'ending_date' => $job_info_end_date[$i],
                            'user_id' => $last_inserted_id,
                            'user_type' => $this->common->get_user_type('teacher'),
                            'date' => date('Y-m-d')
                        );
        
                        $this->db->insert('job_records', $job_data);
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
                            'user_type' => $this->common->get_user_type('teacher'),
                            'date' => date('Y-m-d')
                        );

                        $this->db->insert('curricular_activities_info', $extra_data);
                    }
                }
                
            }
        }
	}
	public function update_teacher($teacher_id=null,$user_type1=null)
	{
        $data = array(
        	'name' => $this->input->post('name'),
        	'email' => $this->input->post('email'),
        	'phone' => $this->input->post('phone'),
        	'father_name' => $this->input->post('father_name'),
        	'mother_name' => $this->input->post('mother_name'),
        	'nid' => $this->input->post('nid'),
        	'dob' => $this->input->post('dob'),
        	'gender' => $this->input->post('gender'),
        	'present_address' => $this->input->post('present_addr'),
        	'permanent_address' => $this->input->post('permanent_addr'),
        	'dept' => $this->input->post('dept'),
        	'designation' => $this->input->post('desig'),
        	'joining_date' => $this->input->post('joining_date')
        );

        /*image upload*/
        if ($_FILES['teacher_image']['name'] !== '') {

            $config['upload_path'] = './assets/images/teachers/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['max_size'] = '200000';
            $config['max_width'] = '1524000';
            $config['max_height'] = '1000000';
            $this->upload->initialize($config);
            $this->load->library('upload', $config);
            $this->load->library('image_lib');
            $upload = $this->upload->do_upload('teacher_image');
            if ($upload == true) {
                $data1 = array('upload_data' => $this->upload->data());
                $image = $data1['upload_data']['file_name'];
                $configBig = array();
                $configBig['image_library'] = 'gd2';
                $configBig['source_image'] = './assets/images/teachers/' . $image;
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
                $rename = date('Ymd_his_') . $this->input->post('name') . ".jpg";
                rename('./assets/images/teachers/' . $filename1, './assets/images/teachers/' . $rename);
                unlink(FCPATH . "/assets/images/teachers/" . $image);
                $data['image'] = $rename;
            }
        } else {
            unset($data['image']);
        }
        /*image upload*/



        //if(!empty($_POST['teacher_id'])){
            if ($_FILES['teacher_image']['name'] !== '' && $this->common->getAnyInfoRow('teachers', 'id', $teacher_id)->image) {
                unlink(FCPATH . "/assets/images/teachers/" . $this->common->getAnyInfoRow('teachers', 'id', $teacher_id)->image);
            }

            
            $this->db->where('id',$teacher_id);
            return $this->db->update('teachers', $data);




        /*}else{
            $this->db->insert('teachers', $data);*/



            /*if(!empty($teacher_id))
            {*/
//echo "hi";
                $edu_degree = $this->input->post('edu_degree');
                $edu_passing_year = $this->input->post('edu_passing_year');
                $edu_session = $this->input->post('edu_session');
                $edu_cgpa = $this->input->post('edu_cgpa');

                $extra_organization = $this->input->post('extra_organization');
                $extra_member_id = $this->input->post('extra_member_id');
                $extra_description = $this->input->post('extra_description');
        
                if(!empty($edu_degree))
                {
                    $this->db->where('user_id',$teacher_id);
                    $this->db->where('user_type',$user_type1);
                    $this->db->delete('educational_info');
                    
                    $count_edu = count($edu_degree);
                    for ($i=0;$i<$count_edu;$i++)
                    {
                        $edu_data = array(
                            'edu_degree' => $edu_degree[$i],
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

                if(!empty($extra_organization))
                {
                    $this->db->where('user_id',$teacher_id);
                    $this->db->where('user_type',$user_type1);
                    $this->db->delete('curricular_activities_info');
                    $count_extra_carri = count($extra_organization);
                    for ($i=0;$i<$count_extra_carri;$i++)
                    {
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
                
                    /*$this->db->where('user_id',$teacher_id);
                    $this->db->where('user_type',$user_type1);
                    $this->db->delete('educational_info');
                        $job_data = array(
                            'edu_degree' => $edu_degree[$i],
                            'edu_passing_year' => $edu_passing_year[$i],
                            'edu_session' => $edu_session[$i],
                            'edu_cgpa' => $edu_cgpa[$i],
                            'user_id' => $last_inserted_id,
                            'user_type' => $this->common->get_user_type('teacher'),
                            'date' => date('Y-m-d')
                        );
        
                        $this->db->insert('educational_info', $edu_data);*/
            //}
        //}
        return 1;
	}

	/* add student */
	public function add_student()
	{
        $data = array(
        	'name' => $this->input->post('name'),
        	'roll' => $this->input->post('roll'),
        	'dept' => $this->input->post('dept'),
            'batch' => $this->input->post('batch'),
        	'phone' => $this->input->post('phone'),
        	'email' => $this->input->post('email'),
        	'gender' => $this->input->post('gender'),
        	'dob' => $this->input->post('dob'),
        	'nid' => $this->input->post('nid'),
        	'father_name' => $this->input->post('father_name'),
        	'mother_name' => $this->input->post('mother_name'),
        	'present_address' => $this->input->post('present_addr'),
        	'permanent_address' => $this->input->post('permanent_addr'),
        	'starting_date' => $this->input->post('starting_date'),
        	'is_student' => $this->input->post('is_student'),
        	/*'ending_date' => $this->input->post('ending_date'),*/
        	'added_by' => $this->common->user_session_data(1)
        );

        /*image upload*/
        if ($_FILES['student_image']['name'] !== '') {

            $config['upload_path'] = './assets/images/students/';
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
                $configBig['source_image'] = './assets/images/students/' . $image;
                $configBig['create_thumb'] = TRUE;
                $configBig['maintain_ratio'] = FALSE;
                $configBig['width'] = 300;
                $configBig['height'] = 300;
                $configBig['thumb_marker'] = "_big";
                $this->image_lib->initialize($configBig);
                $this->image_lib->resize();
                $this->image_lib->clear();
                unset($configBig);
                $filename1 = $data1['upload_data']['raw_name'] . '_big' . $data1['upload_data']['file_ext'];
                $rename = date('Ymd_his_') . $this->input->post('name') . ".jpg";
                rename('./assets/images/students/' . $filename1, './assets/images/students/' . $rename);
                unlink(FCPATH . "/assets/images/students/" . $image);
                $data['image'] = $rename;
            }
        } else {
            unset($data['image']);
        }
        /*image upload*/

        if(!empty($_POST['student_id'])){
            if ($_FILES['student_image']['name'] !== '' && $this->common->getAnyInfoRow('students', 'id', $_POST['student_id'])->image)
                unlink(FCPATH . "/assets/images/students/" . $this->common->getAnyInfoRow('students', 'id', $_POST['student_id'])->image);

            $this->db->where('id',$_POST['student_id']);
            return $this->db->update('students', $data);
        }else{
            return $this->db->insert('students', $data);
        }
	}
	/* add alumni */
	public function add_alumni()
	{
        /*$data = array(
        	'name' => $this->input->post('name'),
        	'roll' => $this->input->post('roll'),
        	'dept' => $this->input->post('dept'),
        	'phone' => $this->input->post('phone'),
        	'email' => $this->input->post('email'),
        	'gender' => $this->input->post('gender'),
        	'dob' => $this->input->post('dob'),
        	'nid' => $this->input->post('nid'),
        	'father_name' => $this->input->post('father_name'),
        	'mother_name' => $this->input->post('mother_name'),
        	'present_address' => $this->input->post('present_addr'),
        	'permanent_address' => $this->input->post('permanent_addr'),
        	'starting_date' => $this->input->post('starting_date'),
        	'is_student' => $this->input->post('is_student'),
        	'ending_date' => $this->input->post('ending_date'),
        	'added_by' => $this->common->user_session_data(1)
        );
        return $this->db->insert('students', $data);*/

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
            'starting_date' => date('Y-m-d',strtotime($this->input->post('starting_date'))),
            'is_student' => $this->input->post('is_student'),
            'ending_date' => date('Y-m-d',strtotime($this->input->post('ending_date'))),
            'date' => date('Y-m-d'),
            'status' => 1
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
            $job_info_addr = $this->input->post('job_org_addr');
            $job_info_desgination = $this->input->post('job_org_designation');
            $job_info_start_date = $this->input->post('job_org_starting_date');
            $job_info_end_date = $this->input->post('job_org_ending_date');

            $extra_organization = $this->input->post('extra_organization');
            $extra_member_id = $this->input->post('extra_member_id');
            $extra_description = $this->input->post('extra_description');

            if(!empty($edu_degree))
            {
                $count_edu = count($edu_degree);
                for ($i=0;$i<$count_edu;$i++)
                {
                    $edu_data = array(
                        'user_type' => $this->common->get_user_type('alumni'),
                        //'user_id' => $this->common->getSpecificField('teachers','phone',$this->input->post('phone'),'id'),
                        'user_id' => $last_inserted_id,
                        'edu_degree' => $edu_degree[$i],
                        'school_college_uni' => $edu_institution[$i],
                        'edu_passing_year' => $edu_passing_year[$i],
                        'edu_session' => $edu_session[$i],
                        'edu_cgpa' => $edu_cgpa[$i],
                        'date' => date('Y-m-d')
                    );

                    $this->db->insert('educational_info', $edu_data);
                }
            }
            
                
            if(!empty($job_info_org))
            {
                $count_job_info = count($job_info_org);
                for ($i=0;$i<$count_job_info;$i++){
                    $job_data = array(
                        'organization_name' => $job_info_org[$i],
                        'address' => $job_info_addr[$i],
                        'designation' => $job_info_desgination[$i],
                        'starting_date' => date('Y-m-d',strtotime($job_info_start_date[$i])),
                        'ending_date' => date('Y-m-d',strtotime($job_info_end_date[$i])),
                        'user_id' => $last_inserted_id,
                        'user_type' => $this->common->get_user_type('alumni'),
                        'date' => date('Y-m-d')
                    );
    
                    $this->db->insert('job_records', $job_data);
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
	}
    /* add staff */
    public function add_staff()
    {
        $data = array(
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'phone' => $this->input->post('phone'),
            'nid' => $this->input->post('nid'),
            'dob' => $this->input->post('dob'),
            'gender' => $this->input->post('gender'),
            'father_name' => $this->input->post('father_name'),
            'mother_name' => $this->input->post('mother_name'),
            'present_address' => $this->input->post('present_addr'),
            'permanent_address' => $this->input->post('permanent_addr'),
            'dept' => $this->input->post('dept'),
            'designation' => $this->input->post('designation'),
            'joining_date' => $this->input->post('joining_date'),
            'added_by' => $this->common->user_session_data(1)
        );

        /*image upload*/
        if ($_FILES['staff_image']['name'] !== '') {

            $config['upload_path'] = './assets/images/staffs/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['max_size'] = '200000';
            $config['max_width'] = '1524000';
            $config['max_height'] = '1000000';
            $this->upload->initialize($config);
            $this->load->library('upload', $config);
            $this->load->library('image_lib');
            $upload = $this->upload->do_upload('staff_image');
            if ($upload == true) {
                $data1 = array('upload_data' => $this->upload->data());
                $image = $data1['upload_data']['file_name'];
                $configBig = array();
                $configBig['image_library'] = 'gd2';
                $configBig['source_image'] = './assets/images/staffs/' . $image;
                $configBig['create_thumb'] = TRUE;
                $configBig['maintain_ratio'] = FALSE;
                $configBig['width'] = 300;
                $configBig['height'] = 300;
                $configBig['thumb_marker'] = "_big";
                $this->image_lib->initialize($configBig);
                $this->image_lib->resize();
                $this->image_lib->clear();
                unset($configBig);
                $filename1 = $data1['upload_data']['raw_name'] . '_big' . $data1['upload_data']['file_ext'];
                $rename = date('Ymd_his_') . $this->input->post('name') . ".jpg";
                rename('./assets/images/staffs/' . $filename1, './assets/images/staffs/' . $rename);
                unlink(FCPATH . "/assets/images/staffs/" . $image);
                $data['image'] = $rename;
            }
        } else {
            unset($data['image']);
        }
        /*image upload*/



        if(!empty($_POST['staff_id'])){
            if ($_FILES['staff_image']['name'] !== '' && $this->common->getAnyInfoRow('staffs', 'id', $_POST['staff_id'])->image)
                unlink(FCPATH . "/assets/images/staffs/" . $this->common->getAnyInfoRow('staffs', 'id', $_POST['staff_id'])->image);

            $this->db->where('id',$_POST['staff_id']);
            return $this->db->update('staffs', $data);
        }else{
            return $this->db->insert('staffs', $data);
        }

    }
}
?>