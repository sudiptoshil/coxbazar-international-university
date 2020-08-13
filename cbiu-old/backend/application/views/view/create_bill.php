
<style>
.form-control {
    width: 50%;
}

.col-sm-6 {
    width: 30%;
}
.col-sm-3 {
    width: 15%;
}
</style>

<!--main content start-->
    <section id="main-content" class="">
        <section class="wrapper">
        <!-- page start-->
        <!-- page start-->
     

        <div class="row">
        <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading" style="text-align:center">
               Create Bill
            </header>
            <div class="panel-body">

		 <form class="form-horizontal bucket-form" method="post" action="<?php echo base_url(); ?>main/create_bill/<?php echo $id ?>">
<table><tr>

				  <td><label class="col-sm-3 control-label">Courier Cost</label></td>
				  
				  <td><input type="text" name="courier" value="" class="form-control"></td>
				  
				  
					<td><label class="col-sm-3 control-label">Other</label></td>
                      
                    <td><input type="text" name="other" value="" class="form-control"></td>
					 
					 <td><label class="col-sm-3 control-label">Note</label></td>
                      
                    <td><input type="text" name="note" value="" class="form-control"></td>
					 </tr></table>
					 	
<div class="form-group" style="text-align:center">	
<button type="submit" class="btn btn-info">Update</button></div>
 
                </form>
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
<div class="adv-table">
		
		<table>
<thead>
<tr>
<th>SL</th>
<th>Name</th>
<th>Quantity</th>
<th>Price</th>
<th>Total Price</th>
<th>Status</th>
</tr>

<?php

$i=1;$net = 0;$all_total_price = 0; 
foreach ($order as $item): 

?>
<tr>
<td><?=$i; $i++;?></td>
<td><?php 
$this->db->where("id", $item['p_id']); 
$query = $this->db->get("product");
$row1 = $query->row();
echo $row1->product_name; 
$pri=$row1->price;
 ?></td>

<td><?php echo $item['quantity']; ?></td>
<td><?php echo $pri?></td>
<td><?php echo $item['price']?></td>
<td><?php echo $item['status']?></td>
<td data-value="3"><span class="label <?=$class?>"><?=$head;?></span></td>
<td>
<a href="<?php echo base_url(); ?>main/status_change/<?php echo $item['id']?>/0/<?php echo $item['final_order_id']?>" class="label label-primary">Pending</a>
<a href="<?php echo base_url(); ?>main/status_change/<?php echo $item['id']?>/1/<?php echo $item['final_order_id']?>" class="label label-success">Done</a>
<a href="<?php echo base_url(); ?>main/status_change/<?php echo $item['id']?>/2/<?php echo $item['final_order_id']?>" class="label label-danger">Cancel</a>
</td>
</tr>

<?php endforeach; ?>
<tr>
<td colspan=4>Total</td>
<td><?php echo $total;?></td>

</tr>
</table>
		
		
		
        </div>
		   </div>
        </section>
        </div>


                </div>

            </div>
        </div>


        <!-- page end-->
        </section>
    </section>
    <!--main content end-->