<?php
//$id from password table
$id = $this->session->userdata('id');
//user_type: 1 = admin; 2 = teacher; 3 = staff; 4 = students; 5 = alumni
$type = $this->session->userdata('user_type');

//user_id is used from students/teachers/staffs table
$user_id = $this->session->userdata('user_id');
?>