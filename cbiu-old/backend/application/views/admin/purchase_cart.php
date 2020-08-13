<style>
.adv-table table tr td {
    padding:5px;
	font-weight: bold;
	font-size:17px;
}
</style>

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
	
	if($type==1) echo "Purchase Cart";
	if($type==2) echo "Purchase Return Cart"; 

	?>  </div>
	 </header>
				  
                    <div class="panel-body">
                    <div class="adv-table">

		
		<script>
function validateForm() {
    var x = document.forms["myForm"]["supplier"].value;
    if (x==null || x=="") {
        alert("Invoice No must be filled out");
        return false;
    }
}
</script>
		
	
			<form class="form-horizontal bucket-form" method="post" action="<?php echo base_url(); ?>admin/purchase_cart/<?php echo $type; ?>" name="myForm" onsubmit="return validateForm()">
	
<table>
<tr>

		
	<?php
	
	$this->db->order_by("id", "desc"); 
	$this->db->limit(1, 0);
	$result = $this->db->get('invoice_no');
	$row = $result->row();
	$invoice_no = $row->id+1;
	
 foreach($supplier as $supplier1) { 
$all_supplier[] = $supplier1['name']." *".$supplier1['id'];
  }
// print_r ($all_customer);
  ?>
  

<link rel="stylesheet" href="<?php echo base_url(); ?>js1/jquery-ui.css">
  <script src="<?php echo base_url(); ?>js1/jquery-1.9.1.js"></script>
  <script src="<?php echo base_url(); ?>js1/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script>
  $(function() {
  
  var availableTags = JSON.parse('<?php echo json_encode($all_supplier); ?>');
  
    
    $( "#tags" ).autocomplete({
      source: availableTags
    });
  });
  </script>	
		
		
		<td>
			<div class="form-group">					
<label class="col-sm-3 control-label">Supplier</label>	
<div class="col-sm-6">		
		<div class="ui-widget">
<span class="input-wrap"> <input type="input" name="supplier" id="tags" style="width:150px"></span> 
</div>	</div></div>
</td>

			<?php  				
				$this->db->select('SUM(`quantity`*`buy_price`) as score');
				$this->db->where('invoice_no', '');
				$this->db->where('type',$type);
				$q=$this->db->get('store');
				$row=$q->row();
				// echo $row->score;
				?>

					<td>
					<div class="form-group">
                        <label class="col-sm-3 control-label">Paid</label>
                        <div class="col-sm-6">
                            <input type="text" name="paid" value="<?php echo $row->score ?>" class="form-control">
                        </div>
                    </div>
					</td>
					
					<td>
					<div class="form-group">
                        <label class="col-sm-3 control-label">P Type</label>
                        <div class="col-sm-6">
                         		
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
					
			<input type="hidden" name="total_amount" value="<?php echo $row->score  ?>" />

			<input type="hidden" name="invoice_no" value="<?php echo $invoice_no ?>" />

			
	</tr>
	</table>

	<div class="form-group" style="text-align:center">	
<button type="submit" class="btn btn-info">Submit</button></div>						
									
									</form>	
	

<table  class="display table table-bordered table-striped" id="table_example">
<thead>
<tr>
<th>Model No</th><th>Name</th><th>QNTY</th><th>PRICE</th><th>TOTAL PRICE</th><th></th>
</tr>
</thead>			
		
					<?php  $i=0; foreach ($pending as $item): 
					
					$this->db->where('code',$item['bar_code']);
					$q=$this->db->get('product');
					$row=$q->row();
					// $count_sale = $row->score;
										?>
					<tr>
						<td><?=$row->model_no?><td><?=$row->name?></td>
						<td><?=$item['quantity']?></td><td><?=$item['buy_price']?></td>
						<td><?=$item['buy_price']*$item['quantity']?></td>
					
					
					<td><a href="<?php echo base_url(); ?>admin/res_order_delete/store/id/<?php echo $item['id']; ?>/purchase_cart/1" onclick="return confirm('Are you sure want to delete');"><span style="color:red;float:right">X</span></td>

					</tr>
							
				<?php $i++; endforeach; ?>
									
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
