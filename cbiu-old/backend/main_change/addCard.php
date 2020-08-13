<?php 
	require_once('config2.php');
	header('Content-Type:text/xml');
	echo '<?xml version="1.0" encoding="UTF-8" ?>';
	echo '<response>';
	 $id=$_GET['id'];
	 $price=$_GET['price'];
	 $qun=$_GET['qun'];
	 $date=$_GET['date'];
	 $pname=$_GET['pname'];
	 $time=$_GET['time'];	
$sql=mysql_query("insert into addcard"."(root,pname,price,qun,total,date,time)"."values('$id','$pname','$price','$qun','$qun','$price','$date','$time')");

			$query=mysql_query("select * from addcard");
			
			echo '<people>';
				while($row=mysql_fetch_array($query)){
				echo '<person>';
						echo '<id>'.$row['id'].'</id>';
						echo '<product_name>'.$row['product_name'].'</product_name>';
						echo '<price>'.$row['price'].'</price>';
				echo '</person>';
				}
				
				
		echo '</people>';
			
			
	 echo '</response>';
	//$del=$_GET['del'];
		
	//$body=$_GET['body'];
	
	/*if(!empty($body))
	{
		$query=mysql_query("select * from ordar");
			
			echo '<people>';
				while($row=mysql_fetch_array($query)){
				echo '<person>';
						echo '<id>'.$row['id'].'</id>';
						echo '<product_name>'.$row['product_name'].'</product_name>';
						echo '<price>'.$row['price'].'</price>';
						echo '<total>'.$row['total_p'].'</total>';
				echo '</person>';
				}
				
				
		echo '</people>';
	}
	
	else if(empty($del))
	{
		$getData=mysql_query("select pid from ordar where pid='$id'");
		$pId=null;
		while($row=mysql_fetch_array($getData))
		{
			$pId=$row['pid'];
		}
		
		if($pId == '')
		{
			 $sql=mysql_query("insert into ordar"."(product_name,price,total_p,pid)"."values('$value','$wap','$wap','$id')");
		}
		
		else
		{
			$getprice=mysql_query("select total_p from ordar where pid='$id'");
			while($row=mysql_fetch_array($getprice))
		{
			$total=$row['total_p']+$wap;
		}
			
			$update=mysql_query("update ordar set total_p='$total' where pid='$id'");
		}
		



	$query=mysql_query("select * from ordar");
	
	$sum=mysql_query("SELECT sum( total_p) AS total FROM ordar");

		echo '<people>';
				while($row=mysql_fetch_array($query)){
				echo '<person>';
						echo '<id>'.$row['id'].'</id>';
						echo '<product_name>'.$row['product_name'].'</product_name>';
						echo '<price>'.$row['price'].'</price>';
						echo '<total>'.$row['total_p'].'</total>';
				echo '</person>';
				}
				
				while($row=mysql_fetch_array($sum)){
				echo '<person>';
						echo '<sum>'.$row['total'].'</sum>';
				echo '</person>';
				}
				
		echo '</people>';
	}
	
	else
	{
		$sum=mysql_query("delete from ordar where id='$del'");
		
			$query=mysql_query("select * from ordar");
			
			echo '<people>';
				while($row=mysql_fetch_array($query)){
				echo '<person>';
						echo '<id>'.$row['id'].'</id>';
						echo '<product_name>'.$row['product_name'].'</product_name>';
						echo '<price>'.$row['price'].'</price>';
						echo '<total>'.$row['total_p'].'</total>';
				echo '</person>';
				}
				
				
		echo '</people>';

	}*/
	
	
?>