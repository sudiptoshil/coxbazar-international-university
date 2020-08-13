<style>
.header
{


}

.logo
{
float: left;
 c
}
.logo img
{
width: 100px;
}
.customer_info
{
float: left;
width: 300px;
}
.right_site
{
float:right;
}

.body
{
margin: 0px auto auto;
    width: 1000px;
}


.CSSTableGenerator1 tr:first-child td
{
   background: gray;
   color: white;
    font-weight: bold;
	font-size: 14px;
   }
   
.CSSTableGenerator1 table
{
   border-collapse: collapse;
    font-family: verdana;
    font-size: 14px;
    width: 100%;
}   
   

.CSSTableGenerator1 table  tr  td {
    padding: 8px 4px;
	border: 1px solid #ddd;
	line-height: 9px;
}
   
.CSSTableGenerator1 table  tr  {
   background-color: white;
}

.CSSTableGenerator1 table  tr:nth-child(odd)  {
   background-color:#E5E5E5;
}

</style>
<div class="body"> 
<div class="header">  

<div class="logo"><img src="<?php echo base_url(); ?>images/logo.png" class="imageWidgetImage left "></div>

<div style="text-align:center;margin: 0px;font-size: 14px;">   
<div style="color:red;font-size: 51px;text-align:center;"> KIDS MUSEUM</div>
100/46 Rahaman Mansion, Thamakumondi lane Reazuddin Bazar<br/> Chittagong Bangladesh.
<br/>
Mobile : 01811-192444, Email : saiful.suman89@gmail.com
</div>


<div class="customer_info"> Invoice No :  <?php echo $invoice_no; ?>
<br/>

<?php 
$this->db->where("invoice_no", $invoice_no); 
$query = $this->db->get("invoice_no");
$row = $query->row();
// echo "Customer : ".$row->id; 
$customer = $row->customer; 
if($row->type!=1 && $row->type!=2)
{ 
$this->db->where("id", $customer); 
$query = $this->db->get("customer");
$customer = $query->row();
echo "Customer : ".$customer->name; 
echo "<br/>Mobile : ".$customer->phone; 
echo "<br/>Address : ".$customer->details; 
}
if($row->type==1 or $row->type==2)
{ 
$this->db->where("id", $customer); 
$query = $this->db->get("supplier");
$customer = $query->row();
echo "Supplier : ".$customer->name; 
}
?>

</div> 


<div class="right_site"> Date :
<?php
$all_total_price = 0; 
foreach ($pending as $item): 
echo date("d-m-Y", strtotime($item['date']));
break;
 endforeach; ?>

   </div> 

   </div> 

<div style="clear:both">     </div>

  <div style="height:1200px" > 
  
<div class="CSSTableGenerator1" style="margin:auto;margin-top:0px" >      
<table>
<tr>
<td style="width:100px">SL</td>
<td style="width:100px">MODEL NO</td>
<td style="width:300px">NAME</td>
<td style="width:300px">UNIT</td>
<td style="width:200px">QTN (PCS)</td>
<td style="width:200px">QTN (CTN)</td>
</tr>
<?php
$i=1;
$total = 0;
foreach ($pending as $item): 
?>
<tr>
<td><?=$i; $i++;?></td>
<td><?php 
$this->db->where('code', $item['bar_code']);
$query1 = $this->db->get("product");
$row1 = $query1->row();
echo $row1->model_no;
 ?></td>
<td><?php echo $item['name']; ?></td>
<td><?php 
echo $row1->unit;
 ?></td>
<td><?php echo $item['quantity']; ?></td>
<td><?php echo floor($item['quantity']/$row1->pcs)." CTN ".$item['quantity']%$row1->pcs; ?> PCS</td>
</tr>
<?php endforeach; ?>

</table>



</div> 

<style>
table {
    border-collapse: collapse;
    float: right;
    margin-top: 20px;
}

table, td, th {
    border: 1px solid black;
	padding: 5px;
}
</style>

<table style="float:left">
<tr><td style="text-align:center">Transport Name</td></tr>
<tr><td style="width:300px;height:200px"></td></tr>
</table>


<table style="float:right">
<tr><td style="text-align:center">Delivery Name</td></tr>
<tr><td style="width:300px;height:200px"></td></tr>
</table>

</div> 

<div style="clear:both"></div>

<hr/>
<div style="font-size: 25px; text-align: center;">

	www.kidsmuseumbd.com
</div>


