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
	
	// if($type==1) echo "Store in Form";
	// if($type==2) echo "Purchase Return Form"; 
	// if($type==3) echo "Store Out Form";
	// if($type==4) echo "Sales Return Form"; 
	// if($type==5) echo "Sales Return (Damage) Form"; 

	?>  </div>
	 </header>
				  
                    <div class="panel-body">
                    <div class="adv-table">
 
	

		
		<script>
function validateForm() {
    var x = document.forms["myForm"]["customer"].value;
    if (x==null || x=="") {
        alert("Customer No Required");
        return false;
    }
}

function validateForm2() {
    var x = document.forms["pForm"]["bar_code"].value;
    if (x==null || x=="") {
        alert("Product name Required");
        return false;
    }
	
	var x = document.forms["pForm"]["selling_price"].value;
    if (x==null || x=="") {
        alert("Selling price Required");
        return false;
    }
}
</script>
<br/>



			<form class="form-horizontal bucket-form" method="post" action="<?php echo base_url(); ?>admin/confirm_order/<?php echo $type; ?>" name="myForm" onsubmit="return validateForm()">
	
<table>
<tr>
	
				
	<?php
 foreach($customer as $customer1) { 
$all_customer[] = $customer1['name']." *".$customer1['id'];
  }
// print_r ($all_customer);


$this->db->select('SUM(`quantity`*`price`) as score');
$this->db->where('type',$type);
$this->db->where('invoice_no','');
$q=$this->db->get('store');
$row=$q->row();
$amount = $row->score; 


  ?>
  

<link rel="stylesheet" href="<?php echo base_url(); ?>js1/jquery-ui.css">
  <script src="<?php echo base_url(); ?>js1/jquery-1.9.1.js"></script>
  <script src="<?php echo base_url(); ?>js1/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script>
  $(function() {
  
  var availableTags = JSON.parse('<?php echo json_encode($all_customer); ?>');
  
    
    $( "#tags" ).autocomplete({
      source: availableTags
    });
  });
  </script>	

		<td>
			<div class="form-group">					
<label class="col-sm-3 control-label">Customer</label>	
<div class="col-sm-3">		
		<div class="ui-widget">
<span class="input-wrap"> <input type="input" name="customer" id="tags" style="width:150px"></span> 
</div>	</div></div>
</td>

				
                            <input type="hidden" name="amount" value="<?php echo $amount;?>" class="form-control">
                       
					
					
                            <input type="hidden" name="amount" value="<?php echo $amount;?>" class="form-control">
                        
					
					<td>
					<div class="form-group">
                        <label class="col-sm-3 control-label">Discount</label>
                        <div class="col-sm-12">
                            <input type="text" name="discount" value="" class="form-control">
                        </div>
                    </div>
					</td>
					
					<td>
					<div class="form-group">
                        <label class="col-sm-3 control-label">Paid</label>
                        <div class="col-sm-12">
                            <input type="text" name="paid" value="<?php echo $amount;?>" class="form-control">
                        </div>
                    </div>
					</td>
					
					<td>
					<div class="form-group">
                        <label class="col-sm-3 control-label">P Type</label>
                        <div class="col-sm-12">
                         		
				<select name="p_type" class="form-control">
					<option value="29">Cash</option>
					<?php $ledger = $this->news_model->common('ledger','sub_head_id',13) ;	
					foreach($ledger as $ledger1) { ?>
					<option value="<?php echo $ledger1['id']; ?>"><?php echo $ledger1['ledger_title']; ?></option>
					<?php  } ?>
					<option value="due">Due</option>
					</select>
                        </div>
                    </div>
					</td>
					
			
					
					<td>
					<div class="form-group">
                        <label class="col-sm-3 control-label">Date</label>
                        <div class="col-sm-6">
                        
<input class="tcal" type="text" name="date" value="<?php echo date('d-m-Y') ?>" style="width:150px"/>
                        </div>
                    </div>
	</td>
	</tr>
	</table>

	<div class="form-group" style="text-align:center">	
<button type="submit" class="btn btn-info" onclick="return confirm('Are you sure to order');">Submit</button></div>	
</form>		
							
					<br/>	<br/>

					
					
				

	<form class="form-horizontal bucket-form" method="post" action="<?php echo base_url(); ?>admin/order/<?php echo $type; ?>" name="pForm" onsubmit="return validateForm2()">
	
<table>
<tr>
				
	<?php
 foreach($product as $product1) { 
$all_product[] = $product1['model_no']." *".$product1['id'];
  }
// print_r ($all_product);
  ?>
 
  <script>
  $(function() {
  
  var availableTags = JSON.parse('<?php echo json_encode($all_product); ?>');
  
    
    $( "#ptags" ).autocomplete({
      source: availableTags
    });
  });
  </script>	
		
		<td>
			<div class="form-group">					
<label class="col-sm-3 control-label">Product Name</label>	
<div class="col-sm-6">		
		<div class="ui-widget">
<span class="input-wrap"> <input type="input" name="bar_code" id="ptags"></span> 
</div>	</div></div>
</td>

					<td>
					<div class="form-group">
                        <label class="col-sm-3 control-label">Quantity</label>
                        <div class="col-sm-6">
                            <input type="text" name="quantity" value="1" class="form-control">
                        </div>
                    </div>
					</td>
					
					<td>
					<div class="form-group">
                        <label class="col-sm-3 control-label">Warehouse</label>
                        <div class="col-sm-6">
                         		
				<select name="warehouse" class="form-control">
					
					<?php foreach($warehouse as $warehouse1) { ?>
					<option value="<?php echo $warehouse1['id']; ?>"><?php echo $warehouse1['name']; ?></option>
					<?php  } ?>
				
					</select>
                        </div>
                    </div>
					</td>
					
					<td>
					<div class="form-group">
                        <label class="col-sm-3 control-label">Selling Price</label>
                        <div class="col-sm-6">
                            <input type="text" name="selling_price" value="" class="form-control">
                        </div>
                    </div>
					</td>

			
	</tr>
	</table>

	<div class="form-group" style="text-align:center">	
<button type="submit" class="btn btn-info" >Submit</button></div>	
</form>	


					<br/>	<br/>					
										
	
<div class="panel-body">
                    <div class="adv-table">
                    <table  class="display table table-bordered table-striped" id="dynamic-table">
                    <thead>
                    <tr>
                
       <th>NAME</th><th>QNTY</th><th>AMOUNT</th><th>TOTAL PRICE</th><th class="hidden-phone">DELETE</th>
					
                    </tr>
                    </thead>
                    <tbody>

<?php $i=1; $total = 0; foreach ($pending as $item): ?>

<tr class="gradeX">

<td><?=$item['name']?></td>
<td><?=$item['quantity']?></td><td><?=$item['price']?></td> <td><?= $this_total = $item['price']*$item['quantity'];$total = $total + $this_total;?></td>
<td>

<a href="<?php echo base_url(); ?>admin/delete/store/id/<?php echo $item['id']; ?>/order" onclick="return confirm('Are you sure want to delete');">
<span style="color:red;float:right">X</span>
</td>
                    </tr>

<?php endforeach; ?>
</table>

                    </div>
                    </div>

	
										
                    </div>
                    </div>
                </section>
            </div>
        </div>
        <!-- page end-->
        </section>
    </section>

	
	
	<script src="<?php echo base_url(); ?>bs3/js/bootstrap.min.js"></script>
<script class="include" type="text/javascript" src="<?php echo base_url(); ?>js/accordion-menu/jquery.dcjqaccordion.2.7.js"></script>
<script src="<?php echo base_url(); ?>js/scrollTo/jquery.scrollTo.min.js"></script>
<script src="<?php echo base_url(); ?>assets/jQuery-slimScroll-1.3.0/jquery.slimscroll.js"></script>
<script src="<?php echo base_url(); ?>js/nicescroll/jquery.nicescroll.js"></script>
<!--Easy Pie Chart-->
<script src="<?php echo base_url(); ?>assets/easypiechart/jquery.easypiechart.js"></script>
<!--Sparkline Chart-->
<script src="<?php echo base_url(); ?>assets/sparkline/jquery.sparkline.js"></script>
<!--jQuery Flot Chart-->
<script src="<?php echo base_url(); ?>assets/flot-chart/jquery.flot.js"></script>
<script src="<?php echo base_url(); ?>assets/flot-chart/jquery.flot.tooltip.min.js"></script>
<script src="<?php echo base_url(); ?>assets/flot-chart/jquery.flot.resize.js"></script>
<script src="<?php echo base_url(); ?>assets/flot-chart/jquery.flot.pie.resize.js"></script>


<!--common script init for all pages-->
<script src="<?php echo base_url(); ?>js/scripts.js"></script>