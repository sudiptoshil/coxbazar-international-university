	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css1/tcal.css" />
	<script type="text/javascript" src="<?php echo base_url(); ?>css1/tcal.js"></script> 

 <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
        <!-- page start-->

<div class="row">
            <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading">
                        Dynamic Table
                        <span class="tools pull-right">
                            <a href="javascript:;" class="fa fa-chevron-down"></a>
                            <a href="javascript:;" class="fa fa-cog"></a>
                            <a href="javascript:;" class="fa fa-times"></a>
                         </span>
                    </header>
                   <div class="panel-body" style="text-align:center">
                    <div class="adv-table">


 <form class="form-horizontal bucket-form" method="get" action="<?php echo base_url(); ?>admin/store_report/<?php echo $type; ?>">
             
<table align="center">
<tr>
<td valign="top"><label for="text">Product</label>	</td>
<td><select class="bol_type" name="product">
<option value="">All</option>
<?php foreach($product as $product1) { 
?>
  <option value="<?php echo $product1['code']; ?>"><?php echo $product1['name']; ?></option>
<?php  } ?>
</select></td>


<td valign="top"><div class="feild">Start Date</div></td>
<td><input class="tcal" type="input" name="date1" value="<?php echo set_value('date1'); ?>" /></td>

<td valign="top"><div class="feild">End Date</div></td>
<td><input class="tcal" type="input" name="date2" value="<?php echo set_value('date2'); ?>" /></td>
</tr>
</table>


<div class="form-group" style="text-align:center">	
<button type="submit" class="btn btn-info">Submit</button></div>

</form>

</div>	

</div>	


<style>
table
{
border: 1px solid #ddd;
background-color: transparent;
    max-width: 100%;
	border-collapse: collapse;
    border-spacing: 0;
	 width: 100%;
	
}
table thead > tr > th, table tbody > tr > th, table tfoot > tr > th, table thead > tr > td, table tbody > tr > td, table tfoot > tr > td {
    padding: 10px;
}
table-bordered > thead > tr > th, table-bordered > thead > tr > td {
    border-bottom-width: 2px;
}
table-bordered > thead > tr > th, table-bordered > tbody > tr > th, table-bordered > tfoot > tr > th, table-bordered > thead > tr > td, table-bordered > tbody > tr > td, table-bordered > tfoot > tr > td {
    border: 1px solid #ddd;
}
table > thead > tr > th, table > tbody > tr > th, table > tfoot > tr > th, table > thead > tr > td, table > tbody > tr > td, table > tfoot > tr > td {
    border: 1px solid #ddd;
    line-height: 1.42857;
    padding: 8px;
    vertical-align: top;
}
</style>

    
<table>


<tr>
<td align=center><b>
<?php
if($type==1)
echo "Purchase Report";
if($type==2)
echo "Purchase Return Report";
if($type==3)
echo "Sales Report";
if($type==4)
echo "Sales Return Report";
if($type==5) echo "Sales Return (Damage) Form"; 
?>

 <?php
if(!empty($_GET['date1']))
{
echo $source = $_GET['date1'];
$date = new DateTime($source);
$date1 = $date->format('Y-m-d');
?>
 To <?php
echo $source = $_GET['date2'];
$date = new DateTime($source);
$date2 = $date->format('Y-m-d');
 $date3 = $date->format('d-m-Y');
 }
?></b></td>
</tr>
</table>

<table  class="display table table-bordered table-striped" id="dynamic-table">
                    <thead>
                    <tr>
                
                        <th>CODE</th>
                        
                        <th>NAME</th>
                         <th>QNTY</th>
						<th>PRICE</th>
						<th>TOTAL PRICE</th>
						 <th>UNIT</th>
						  <th>INVOICE NO</th>
						 <th>DATE</th><th>EDIT</th>
						
					
					
                    </tr>
                    </thead>
                    <tbody>

<?php $i=1; $all_total_price = 0; foreach ($all as $item): ?>

<tr class="gradeX">
                   
                        <td><?=$item['bar_code']?></td>
						
						
         
<td><?=$item['name']?></td>
   <td><?=$item['quantity']?></td>
<td><?=$item['price']?></td>
<td><?php echo $total_price = $item['quantity']*$item['price']; $all_total_price = $all_total_price + $total_price;?></td>
<td><?php
$this->db->where("code", $item['bar_code']); 
	$result = $this->db->get('product');
	$row = $result->row();
	echo $row->unit;
	?></td>
	<td>	<a target="_blank" class="menu" href="<?php echo base_url(); ?>admin/invoice/<?=$item['invoice_no']?>"><?=$item['invoice_no']?></a></td> 
<td><?=$item['date']?></td>   
<td>
<a target="_blank" class="menu" href="<?php echo base_url(); ?>admin/store_edit/<?=$item['id']?>">EDIT</a>
</a>

<a href="<?php echo base_url(); ?>admin/delete/store/id/<?php echo $item['id']; ?>/index" onclick="return confirm('Are you sure want to delete');">
<span style="color:red;float:right">X</span>
</td>
                    </tr>

<?php endforeach; ?>
 <tr>
                
                    <td colspan=4>Grand Total</td>
					<td><?php echo $all_total_price;?></td>
                    </tr>
</table>
<?php echo $links; ?>





                    </div>
                    </div>
                </section>
            </div>
        </div>
        <!-- page end-->
        </section>
    </section>

