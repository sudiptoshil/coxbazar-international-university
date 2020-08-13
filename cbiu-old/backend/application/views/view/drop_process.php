<?php 
	//require_once('config2.php');
	
	
	$this->load->library('session');
	$this->load->helper(array('form', 'url'));
	$admin_user = $this->session->userdata('admi');
	
	session_start(); 	
	$session_id = session_id( );
	
			$id=$_POST['id'];
$query=null;	
$sum=null;		
		if(!empty($admin_user))
		{	
	
			$this->db->where('root',$id);
			$this->db->where('member_id',$admin_user);
			$this->db->delete('addcard');
			
			$query=mysql_query("SELECT product.price,addcard.root,product.product_name,addcard.qun, addcard.total FROM product JOIN addcard ON 
	product.id =addcard.root where member_id='$admin_user'");
	$sum=mysql_query("SELECT ifnull( sum( total ) , +0 ) AS tota, count( id ) AS count FROM addcard where member_id='$admin_user'");
	
		}
		else
		{
			$this->db->where('root',$id);
			$this->db->where('session_id',$session_id);
			$this->db->delete('addcard');
			
				$query=mysql_query("SELECT product.price,addcard.root,product.product_name,addcard.qun, addcard.total FROM product JOIN addcard ON 
	product.id =addcard.root where session_id='$session_id'");
	
	$sum=mysql_query("SELECT ifnull( sum( total ) , +0 ) AS tota, count( id ) AS count FROM addcard where session_id='$session_id'");
		}
		
			$response["posts"]= array();
		while($val=mysql_fetch_array($query))
			{
	
			 $post= array();
             $post["price"]= $val["price"];
             $post["root"]= $val["root"];
             $post["pro_name"]= $val["product_name"];
             $post["total"]= $val["total"];
             $post["qun"]= $val["qun"];
             array_push($response["posts"], $post);
	
			}
			
		
		
	echo json_encode($response);
				
				
		
?>