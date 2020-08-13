<?php 
	//require_once('config2.php');
	header('Content-Type:text/xml');
	echo '<?xml version="1.0" encoding="UTF-8" ?>';
	echo '<response>';
	
	$this->load->library('session');
	$this->load->helper('email');
	$this->load->helper(array('form', 'url'));
	$this->load->model('news_model');

	
	$admin_user = $this->session->userdata('admi');
	
	$id=$_GET['id'];
	$price=$_GET['price'];
	$qun=$_GET['qun'];
	$now=$_GET['now'];
	$time=$_GET['time'];
	
	$color=$_GET['color'];
	$size=$_GET['size'];
	
	session_start(); 	
	$session_id = session_id();
	
	
	$ids=null;
	$query=null;
	$sum=null;
	$che_qun=null;
	$che_price=null;
		
	if(!empty($admin_user))
		{	
	
			$this->db->where("root",$id);
			$this->db->where("member_id",$admin_user);
			$query = $this->db->get("addcard");		
			$row = $query->row();

			$ids=$row->root;
			$che_qun=$row->qun;
			$che_price=$row->total;
			
				if(empty($ids))
					{
						$data = array(
					'root' => $id,
					'price' => $price,
					'qun' => $qun,
					'total' => $price,
					'date' => $now,
					'time' => $time,
					'session_id' => '',
					'color' => $color,
					'size' => $size,
					'member_id' => $admin_user
					);
						$this->db->insert('addcard',$data);

					}
				else
				{
					if($qun>1)
					{
						$data = array(
					'qun' => ($che_qun+$qun),
					'total' => ($che_price+$price),
					);
					}
					else{
						$data = array(
					'qun' => ($che_qun+1),
					'total' => ($che_price+$price),
					);
					}
					$this->db->where('root',$id);
					$this->db->where('member_id',$admin_user);
					$this->db->update('addcard',$data);
				}
				
					
			$query=mysql_query("SELECT product.price,addcard.root,product.product_name,addcard.qun, addcard.total FROM product JOIN addcard ON 
	product.id =addcard.root where member_id='$admin_user'");
				$sum=mysql_query("SELECT ifnull( sum( total ) , +0 ) AS tota, count( id ) AS count FROM addcard where member_id='$admin_user'");
			
		
		}
	else{
			
			$this->db->where("root",$id);
			$this->db->where("session_id",$session_id);
			$query = $this->db->get("addcard");
		
			$row = $query->row();

			$ids=$row->root;
			$che_qun=$row->qun;
			$che_price=$row->total;
			
			
			if(empty($ids))
			{
			
			
			

			
					$data = array(
					'root' => $id,
					'price' => $price,
					'qun' => $qun,
					'total' => $price,
					'date' => $now,
					'time' => $time,
					'session_id' => $session_id,
					'color' => $color,
					'size' => $size
					
					);
							$this->db->insert('addcard',$data);

			}
			else if(!empty($ids))
				{
					if($qun>1)
					{
						$data = array(
					'qun' => ($che_qun+$qun),
					'total' => ($che_price+$price),
					);
					}
					else{
						$data = array(
					'qun' => ($che_qun+1),
					'total' => ($che_price+$price),
					);
					}
					
					$this->db->where('root',$id);
					$this->db->where('session_id',$session_id);
					$this->db->update('addcard',$data);
				}
				
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