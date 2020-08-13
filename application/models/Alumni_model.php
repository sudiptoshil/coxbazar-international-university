<?php 
/**
 * Login Model
 */
class Alumni_Model extends CI_Model
{
	
	function __construct()
	{
		
	}


	public function isAlumni($roll)
	{
		$this->db->where("roll",$roll);
		$this->db->where('is_student',2);
		$this->db->where('trash',0);
		$result = $this->db->get('students',1);
		return $result;
		
		/*if ($result->num_rows() == 0) {
			return false;
		}else{
			foreach ($result as $key => $value) {
				if($value['status'] == 0){
					return "pending";
				}else if($value['status'] == 2){
					return "cancel";
				}else if($value['status'] == 3){
					return "disable";
				}
			}
		}*/
		/*$qry = $this->db->query("SELECT * FROM `password` WHERE `email`='".$username_email."' OR `username`='".$username_email."' AND `pass_hash`='".$password."' AND `status`='1' AND `trash`='0'");
		return $qry;*/
	}
	public function alumniLogin($username_email,$password)
	{

		$username = $this->common->getSpecificRows('password','username',$username_email);
		$email = $this->common->getSpecificRows('password','email',$username_email);
		$mobile = $this->common->getSpecificRows('password','mobile',$username_email);

		if($username->num_rows() > 0 ){
			
		}elseif($email->num_rows() > 0 ){

		}elseif($mobile->num_rows() > 0 ){

		}else{
			return false;
		}

		$this->db->where("username",$username_email);
		$this->db->where('pass_hash',$password);
		$this->db->where('status',1);
		$this->db->where('user_type',$this->common->get_user_type('alumni'));
		$this->db->where('trash',0);
		$result = $this->db->get('password',1);

		if ($result->num_rows() > 0) {
			return $result;
		}else{
			$this->db->where("email",$username_email);
			$this->db->where('pass_hash',$password);
			$this->db->where('status',1);
			$this->db->where('trash',0);
			$result = $this->db->get('password',1);
			return $result;
		}



		/*$qry = $this->db->query("SELECT * FROM `password` WHERE `email`='".$username_email."' OR `username`='".$username_email."' AND `pass_hash`='".$password."' AND `status`='1' AND `trash`='0'");
		return $qry;*/
	}
}
?>