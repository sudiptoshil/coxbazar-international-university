<?php

$id=$_POST['get_value'];

		$this->db->where('id',$id);
		$query=$this->db->get('registration');
		$data=null;
		foreach ($query->result_array() as $key) {
			
			$data = array(
					"first_name" => $key['name'],
					"email" => $key['email'],
					"address" => $key['address'],
					"mobile" => $key['mobile']
					
				);
					
		}
		
		echo json_encode($data);
		
		

?>