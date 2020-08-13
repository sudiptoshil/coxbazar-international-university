<style>
.adv-table table tr td {
    padding:5px;
	font-weight: bold;
	font-size:17px;
}
</style>
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
		<div style="color: #1fb5ad;
    font-size: 28px;
    text-align: center;"> <?php 
	
	if($type==1) echo "Store in Form";
	if($type==2) echo "Purchase Return Form"; 
	if($type==3) echo "Store Out Form";
	if($type==4) echo "Sales Return Form"; 
	if($type==5) echo "Sales Return (Damage) Form"; 

	?>  </div>
	 </header>
				  
                    <div class="panel-body">
                    <div class="adv-table">

<!--
		<form action="#" style="float:left">
			<fieldset>
				<input size="10" type="text" name="search" value="" id="id_search" placeholder="Search" autofocus />
			</fieldset>
		</form>
-->		
<form class="form-horizontal bucket-form" method="post" action="<?php echo base_url(); ?>admin/store_in/<?php echo $type; ?>" name="myForm" onsubmit="return validateForm()">

<table  class="display table table-bordered table-striped" id="table_example">
<tr><td><div class="form-group">					
<label class="col-sm-3 control-label">Warehouse</label>	
<div class="col-sm-6">
<select class="form-control input-lg m-bot15" name="warehouse">
<?php foreach($warehouse as $warehouse1) { ?>
 <option value="<?php echo $warehouse1['id']; ?>"><?php echo $warehouse1['name']; ?></option>
<?php  } ?>
</select></div></div>
</td>

<?php  if($type==6) { ?>
<td><div class="form-group">					
<label class="col-sm-3 control-label">To Warehouse</label>	
<div class="col-sm-6">
<select class="form-control input-lg m-bot15" name="warehouse_2">
<?php foreach($warehouse as $warehouse1) { ?>
 <option value="<?php echo $warehouse1['id']; ?>"><?php echo $warehouse1['name']; ?></option>
<?php  } ?>
</select></div></div>
</td>
<?php  } ?>

</tr>
</table>	

	
<table  class="display table table-bordered table-striped" id="table_example">
<thead>
<tr>
<th>Model No</th><th>Name</th><th>QNTY</th><th>PRICE</th><th>UNIT</th>
</tr>
</thead>			
		
					<?php  $i=0; foreach ($sub_category as $item): $j=1;?>
					<tr><td colspan=5 style="text-align:center;background-color:#D0D0D6;"><?=$item['sub']?></td></tr>
					
					
					<?php $product = $this->news_model->common('product','category',$item['id']) ;	
					
					foreach ($product as $product_item): 					?>

				
      
					
					<tr>
						<td><?=$product_item['model_no']?><td><?=$product_item['name']?></td><td>
						
						
						
					<input type="hidden" name="id[]" value="<?php echo $product_item['id']; ?>" />	 
<!-- The Name form field -->
  
    <input type="text" name="quantity[]" id="quantity" size="3" value=""/> </td> 
	
<td>	
<?php						
	// $this->db->where("id", $product_item['id']); 
// $result = $this->db->get('product');
// $row = $result->row();
// if($type==1 or $type==2) 
// $price = $row->buy_price;
// if($type==3 or $type==4 or $type==5) 
// $price = $row->sell_price;	
?>	
	 <input type="text" name="price[]" size="3" value=""/>  
</td>	
	 <input type="hidden" name="code[]"  value="<?=$product_item['code']?>"/> 

	  <input type="hidden" name="count" value="<?php echo $i; ?>" />
	 
<!-- The Submit button -->
<td><?=$product_item['unit']?></td>


								
								
									</tr>
							
									<?php $i++; $j++;  endforeach; endforeach; ?>
									
									

	
	
									
	<div class="form-group" style="text-align:center">	
<button type="submit" class="btn btn-info">Submit</button></div>						
									
									</form>
										</table>
										
					<br/>	<br/>	<br/>	<br/>					
										
										
										
                    </div>
                    </div>
                </section>
            </div>
        </div>
        <!-- page end-->
        </section>
    </section>