<?php
class News_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
          public function getDataWise($id)
	    {
		
		
               $query=$this->db->query("SELECT * FROM `product` WHERE `show`=1 and  `category` like '$id%' limit 4");
		
	       return $query->result_array();	
		
		
	    }
	public function getCetagory($table,$li=null)
	{
			//$w = $this->session->userdata('wire');

		
			//$this->db->where("(wire='".$w."' OR wire='0')");

			
			if(!empty($li))
				$this->db->limit($li);
			
		
			$this->db->order_by("name","asc"); 
			$query=$this->db->get($table);
			
			return $query->result_array();

	}
	public function total_amount($table,$name,$id)
	{
		$this->db->where($name,$id);
		$this->db->select_sum('total');
		$query=$this->db->get($table);
		foreach($query->result_array() as $val)
		{
			return $val['total'];
		}
		
	}
	public function getAll_u($table,$col=null,$val=null){
	
	$w = $this->session->userdata('wire');
	$t = $this->session->userdata('type');
				
		
	$this->db->where('wire',$w);
	
	if($t != 1)
		$this->db->where('type !=',2);
	
	
	$this->db->order_by('id','DESC');
	if(!empty($col))
		
	
	$this->db->where($col,$val);
	$info=$this->db->get($table);
	return $info->result_array();
}
	public function getSubMenuData($id,$ad){
		
		$this->db->where('head',$id);
		$this->db->where('sub !=','');
		$this->db->where('user',$ad);
		$info=$this->db->get('user_access');
		
		return $info->result_array();
		
	}
	public function getMenuData($w,$admin){
		
		$q=$this->db->query("SELECT menu.id as ids,menu.name,menu.links
FROM `menu`
LEFT JOIN user_access ON menu.id = user_access.head
WHERE user_access.sub =0 AND user = '$admin'");
		
		
		return $q->result_array();
		
		
	}
	public function anyName($table,$col,$id,$name,$col2=null,$id2=null,$col3=null,$id3=null){
		
		
		
		//$w = $this->session->userdata('wire');
		
		
		if(!empty($col2)){
			
					$this->db->where($col2,$id2);	

		}
		if(!empty($col3)){
			
					$this->db->where($col3,$id3);	

		}
		
	//$this->db->where("(wire='".$w."' OR wire='0')");

	
	
		$this->db->where($col,$id);
		$info=$this->db->get($table);
		foreach($info->result_array() as $val){
			
			return $val[$name];
			
		}
	}
	public function getPname($table,$col,$id,$name,$col2=null,$id2=null,$col3=null,$id3=null)
	{

		
		
		$this->db->where($col,$id);
		if(!empty($col2))
			$this->db->where($col2,$id2);
				if(!empty($col3))
			$this->db->where($col3,$id3);
		
		$info=$this->db->get($table);
		
		foreach($info->result_array() as $val){
			
			
			return $val[$name];
			
		}
		
		
		
	}
	public function getWireList($table,$col,$asc,$check=null){
		
		$this->db->where('ch !=',0);
		$this->db->order_by($col,$asc);
		$info=$this->db->get($table);
		
		return $info->result_array();
		
	}
	
	public function getWare($table,$col,$asc,$check=null){
		
		
		$wire = $this->session->userdata('wire');
		$type=$this->session->userdata('type');
			
			if(!empty($wire))
				$this->db->where('id',$wire);
		if(!empty($check))
		$this->db->where('ch',0);
		$this->db->order_by($col,$asc);
		$info=$this->db->get($table);
		
		return $info->result_array();
		
	}
	
	
	
		public function check_login_user($user,$select,$pass,$table)
	{

		$this->db->where($select,$user);
		$this->db->where('password',$pass);
		$info=$this->db->get($table);
		
		
			foreach ($info->result_array() as $val) {
				return $val['id'];
			}
	}
	
	
	public function related_data($id,$n){
	
	
	$exp=explode(':',$id);
	$e=$exp[0];
	
	$info=$this->db->query("select * from product where id !=$n and category like '$e%' limit 5");
	
	return $info->result_array();
	
	}
	
	public function getcategorybreak_name($table,$col,$val,$name)
	{

	//$w = $this->session->userdata('wire');


		///$this->db->where('wire',$w);	
	$this->db->where($col,$val);
	
	
	$info=$this->db->get($table);
	
	
	foreach($info->result_array() as $val){
	
	
	
				return $val[$name];
	
	
	}
	}
	
	
	public function getProfileName($table,$id){
		$this->db->where('id',$id);
		$info=$this->db->get($table);
		foreach($info->result_array() as $val){
			
			return $val['name'];
			
		}
	}
	
	
	public function getProfileName2($table,$id){
		$this->db->where('id',$id);
		$info=$this->db->get($table);
		foreach($info->result_array() as $val){
			
			return $val['product_name'];
			
		}
	}
	
	
	
	public function getProductList($table,$id)
	{
		
		
		$this->db->order_by('id','DESC');
		$this->db->where('member_id',$id);
		$info=$this->db->get($table);
		
		
		return $info->result_array();
	}
	
	
	public function getOrderList($table,$id)
	{
		
		
		//$this->db->order_by('id','des');
		$this->db->where('final_order_id',$id);
		$info=$this->db->get($table);
		
		
		return $info->result_array();
	}
	
	
	
	
	public function explode_example($cate_id,$sub_id)
	{				
					 $this->db->where('category',$cate_id.':'.$sub_id);
					 $query=$this->db->get("product");
					 
					 
					 return $query->result_array();
					


	}
	public function getAllProduct($table,$col=null,$val=null,$col2=null,$val2=null)
	{
		
		if(!empty($col))
			$this->db->where($col,$val);
		if(!empty($val2))
			$this->db->where($col2,$val2);
		 $query=$this->db->get($table);
					 
					 
					 return $query->result_array();
		
		
	}
	public function pro_extra($id)
	{
			 $this->db->where('id',$id);
			$query=$this->db->get("product");
			return $query;
	}
	public function pro_details($id)
	{
		
		
		//$w = $this->session->userdata('wire');
				
		
	//$this->db->where('wire',$w);
		
		
		
		
		$this->db->where('root',$id);
		$query=$this->db->get("multi_image");
		return $query->result_array();
		
		
		
		
		
	}

	public function pro_color($id)
	{
		//$w = $this->session->userdata('wire');
				
		
	//$this->db->where('wire',$w);
		
		
		
		 $this->db->where('root',$id);
		 $this->db->order_by('size','asc');
		$query=$this->db->get("psize_color");
		return $query->result_array();
	}

	public function card_all($id,$member)
	{
		$this->db->select('*');
		$this->db->from('addcard');
		$this->db->join('product', 'addcard.root = product.id');
		$this->db->where($member,$id);
		$info = $this->db->get();
		//$info = $this->db->get('addcard');
		return $info->result_array();
	}
	public function regis_data($id,$total)
	{
		 $time = date('H:i:s',time()+21600);
		$tz = new DateTimeZone('Asia/Dhaka');
		$date = new DateTime($time, $tz);
		$tim=$date->format('g:i a');
		
		
		$this->db->where('id',$id);
		$query=$this->db->get("registration");
		
		foreach ($query->result_array() as $key) {
			
			$data = array(
					'name' => $key['name'],
					'email' => $key['email'],
					'phone' => $key['mobile'],
					'distric' => $key['distric'],
					'address' => $key['address'],
					'amount' => $total,
					'date' => date('Y-m-d'),
					'time' => $tim,
					'member_id' => $id,
					'status' => ''
								);
					$this->db->insert('final_order',$data);
		}
		$last_id = $this->db->insert_id();
		
		$this->db->where('member_id',$id);
		$query=$this->db->get("addcard");
		
		foreach ($query->result_array() as $key) {
			
			$data = array(
					'p_id' => $key['root'],
					'quantity' => $key['qun'],
					'price' => $key['total'],
					'final_order_id' => $last_id
								);
					$this->db->insert('order',$data);
		}
		
		$this->db->where('member_id',$id);
		$this->db->delete('addcard');
		
	}
	public function getValid($id)
	{
		$this->db->where('id',$id);
		$query=$this->db->get("registration");
		$row = $query->row();
		
		if(empty($row->id))
		{
			return 0;
		}
		else
		{
			return $row->id;
		}
			
	}
	public function getMember($id,$name)
	{
			$this->db->where('root',$id);
			$this->db->where('session_id',$name);
			return $this->db->get("addcard");
	}
	
	public function summationData($session_id,$name)
	{
$sum=$this->db->query("SELECT ifnull( sum( total ) , +0 ) AS tota, count( id ) AS count FROM addcard where session_id=$session_id'");
		return $sum;
	}
	
	public function getAll($session_id,$name)
	{
		
		
		
		$query=$this->db->query("SELECT product.price,addcard.root,product.product_name,addcard.qun, addcard.total FROM product JOIN addcard ON 
	product.id =addcard.root where session_id='$session_id'");
		
		return $query;
	}
	
	public function common3($table,$field=NULL,$value=NULL,$field2=NULL,$value2=NULL,$order_feild=NULL,$order_value=NULL) // uqing in arabian
{
	
	
	
			
			
		if (!empty($order_feild))
	$this->db->order_by($order_feild, $order_value); 
	if (!empty($field2))
	$this->db->where($field2, $value2);
	if (!empty($field))
	$this->db->where($field, $value);
	
		$info = $this->db->get($table);
		
		return $info->result_array();

} 
	
public function common($table,$field,$value)
{
		
			$this->db->where($field, $value);
			$query=$this->db->get($table);

			return $query->result_array();;
}


	
	public function getData($table,$abail,$feature,$limit=null,$col=null,$val=null)
	{
		$this->db->where('availability',$abail);
		$this->db->where('feture',$feature);
		$this->db->where('show',1);
		$this->db->order_by("id", "desc"); 
		
		if(empty($limit))
			$this->db->limit(10);
		else
			$this->db->limit($limit);
		
		if(!empty($col)){
			
			$this->db->where($col,$val);
		}
		
		
		$query=$this->db->get($table);
		return $query->result_array();
	}

	public function getSubCetagory($id)
	{
		$w = $this->session->userdata('wire');

			//if(!empty($w))
			//$this->db->where("(wire='".$w."' OR wire='0')");
		
		
		
			$this->db->where('root',$id);
			$query=$this->db->get('subcetagory');
			return $query->result_array();

	}
	
	public function getProfileData($table,$id)
	{
			$this->db->where('id',$id);
			$query=$this->db->get($table);
			return $query->result_array();

	}

	public function getPId($id,$table)
	{
			$this->db->select('procode');
			$this->db->where('procode',$id);
			$info = $this->db->get($table);

			foreach ($info->result_array() as $val) {
				return $val['procode'];
			}

	}
	
	public function pagination($table,$field=NULL,$value=NULL,$limit, $start) // uqing in arabian
{

 if(!empty($_GET['date1']) && !empty($_GET['date2']))
 {
$source = $_GET['date1'];
$date = new DateTime($source);
$date1 = $date->format('Y-m-d H:i:s');

$source = $_GET['date2'];
$date = new DateTime($source);
$date2 = $date->format('Y-m-d 24:i:s');

$this->db->where('date >=', $date1);
$this->db->where('date <=', $date2);
 }
   if(!empty($_GET['menu_cat_id']))
 $this->db->where('menu_cat_id', $_GET['menu_cat_id']);
 
    if(!empty($_GET['outlet_id']))
 $this->db->where('outlet_id', $_GET['outlet_id']);
 

	$this->db->limit($limit, $start);
	$this->db->order_by('id', 'desc'); 
	if (!empty($field))
	$this->db->where($field, $value);
	$info = $this->db->get($table);
	return $info->result_array();

} 	

	public function pagination_sender($table,$field=NULL,$value=NULL,$limit, $start) // uqing in arabian
{
	
			
	$this->db->order_by('id','DESC');
	
	$admin=$this->session->userdata('admin');
	$user_type=$this->session->userdata('type');
	

 if(!empty($_GET['date1']) && !empty($_GET['date2']))
 {	
	$source = $_GET['date1'];
$date = new DateTime($source);
$date1 = $date->format('Y-m-d');

$source = $_GET['date2'];
$date = new DateTime($source);
$date2 = $date->format('Y-m-d');

$this->db->where('created_at >=', $date1);
$this->db->where('created_at <=', $date2);
 }

	
	if(!empty($field)){
	
	$this->db->where($field,$value);
	
	}
	$this->db->limit($limit, $start);
	$info = $this->db->get($table);
	return $info->result_array();

}	


			public function count($table,$field=NULL,$value=NULL)
{	


		$admin=$this->session->userdata('admin');
	$user_type=$this->session->userdata('type');
	

 if(!empty($_GET['date1']) && !empty($_GET['date2']))
 {
$source = $_GET['date1'];
$date = new DateTime($source);
$date1 = $date->format('Y-m-d');

$source = $_GET['date2'];
$date = new DateTime($source);
$date2 = $date->format('Y-m-d');

$this->db->where('created_at >=', $date1);
$this->db->where('created_at <=', $date2);
 }
  if(!empty($_GET['users']))
 $this->db->where('user_id', $_GET['users']);
 
    if(!empty($_GET['outlet_id']))
 $this->db->where('outlet_id', $_GET['outlet_id']);
 


	if (!empty($field))
	$this->db->where($field, $value);
$this->db->from($table);
$count = $this->db->count_all_results();


		return $count;	
	
	
} 


	public function all_count($table,$feild=null,$value=null)
{	


	

 if(!empty($_GET['date1']) && !empty($_GET['date2']))
 {
$source = $_GET['date1'];
$date = new DateTime($source);
$date1 = $date->format('Y-m-d H:i:s');

$source = $_GET['date2'];
$date = new DateTime($source);
$date2 = $date->format('Y-m-d 24:i:s');

$this->db->where('date >=', $date1);
$this->db->where('date <=', $date2);
 }
if(!empty($_GET['category']))
 $this->db->where('category', $_GET['category']);
 
  if(!empty($_GET['product']))
 $this->db->where('bar_code', $_GET['product']);
 
 if(!empty($_GET['user']))
 $this->db->where('user', $_GET['user']);

    if(!empty($_GET['type']))
 $this->db->where('type', $_GET['type']);
 
if(!empty($feild))
$this->db->where($feild, $value);
$this->db->from($table);
$count = $this->db->count_all_results();
return $count;	
} 	

	
}