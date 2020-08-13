<?php 
	//require_once('config2.php');
	header('Content-Type:text/xml');
	echo '<?xml version="1.0" encoding="UTF-8" ?>';
	echo '<response>';
	
	$this->load->library('session');
	$admin_user = $this->session->userdata('admi');
	
	$body=$_GET['body'];
	
	session_start(); 	
	$session_id = session_id( );
	

	
		if(!empty($admin_user))
		{	
	
			
			
			$query=mysql_query("SELECT product.price,addcard.root,product.product_name,addcard.qun, addcard.total FROM product JOIN addcard ON 
	product.id =addcard.root where member_id='$admin_user'");
				$sum=mysql_query("SELECT ifnull( sum( total ) , +0 ) AS tota, count( id ) AS count FROM addcard where member_id='$admin_user'");
		}
		else
		{
			
			
			
			$query=mysql_query("SELECT product.price,addcard.root,product.product_name,addcard.qun, addcard.total FROM product JOIN addcard ON 
	product.id =addcard.root where session_id='$session_id'");
				$sum=mysql_query("SELECT ifnull( sum( total ) , +0 ) AS tota, count( id ) AS count FROM addcard where session_id='$session_id'");
		}
		
		echo '<people>';
				while($row=mysql_fetch_array($query)){
				echo '<person>';
						echo '<pri>'.$row['price'].'</pri>';
						echo '<id>'.$row['root'].'</id>';
						echo '<pname>'.$row['product_name'].'</pname>';
						echo '<pric>'.$row['total'].'</pric>';
						echo '<qun>'.$row['qun'].'</qun>';
				echo '</person>';
				}
				while($ro=mysql_fetch_array($sum)){
				echo '<person>';
						echo '<sum>'.$ro['tota'].'</sum>';
						echo '<coun>'.$ro['count'].'</coun>';
				echo '</person>';
				}
				
		echo '</people>';
		
	
	
	echo '</response>';
?>