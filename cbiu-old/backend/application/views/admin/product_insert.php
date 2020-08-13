<!--main content start-->
    <section id="main-content" class="">
        <section class="wrapper">
        <!-- page start-->
        <!-- page start-->

<?php
$this->db->order_by("id", "desc"); 
	$this->db->limit(1, 0);
	$result = $this->db->get('product');
	$row = $result->row();
	$code = $row->code+1;
	?>
		

        <div class="row">
        <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Form Elements
            </header>
            <div class="panel-body">

		 <form class="form-horizontal bucket-form" method="post" action="<?php echo base_url(); ?>admin/product_insert">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Produc Code</label>
                        <div class="col-sm-6">
                            <input type="text" name="code" value="<?php echo $code; ?>" class="form-control">
                        </div>
                    </div>
					 <div class="form-group">
                        <label class="col-sm-3 control-label">Model No</label>
                        <div class="col-sm-6">
                            <input type="text" name="model_no" value="" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Produc Name ( English )</label>
                        <div class="col-sm-6">
                            <input type="text" name="name" value="<?php echo set_value('name'); ?>" class="form-control">
                        </div>
                    </div>
					
				

<div class="form-group">					
<label class="col-sm-3 control-label">Category</label>	
<div class="col-sm-6">		
			<select class="form-control input-lg m-bot15" name="category">
<?php foreach($category as $category1) { 
?>
  <option value="<?php echo $category1['root']."-".$category1['id']; ?>"><?php echo $category1['sub']; ?></option>
<?php  } ?>
</select></div></div>

				<!--
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Buying Price</label>
                        <div class="col-sm-6">
                            <input type="text" name="buy_price" value="<?php echo set_value('buy_price'); ?>" class="form-control">
                        </div>
                    </div>
					
					<div class="form-group">
                        <label class="col-sm-3 control-label">Selling Price</label>
                        <div class="col-sm-6">
                            <input type="text" name="sell_price" value="<?php echo set_value('sell_price'); ?>" class="form-control">
                        </div>
                    </div>
				-->	
				
				<div class="form-group">
                        <label class="col-sm-3 control-label">1 Ctn = ? Pcs</label>
                        <div class="col-sm-6">
                            <input type="text" name="pcs" value="<?php echo set_value('pcs'); ?>" class="form-control">
                        </div>
                    </div>
				
					<div class="form-group">
                        <label class="col-sm-3 control-label">Opening Stock</label>
                        <div class="col-sm-6">
                            <input type="text" name="opening_stock" value="<?php echo set_value('opening_stock'); ?>" class="form-control">
                        </div>
                    </div>
					
					<div class="form-group">
                        <label class="col-sm-3 control-label">Minimum Stock</label>
                        <div class="col-sm-6">
                            <input type="text" name="stock_limit" value="<?php echo set_value('stock_limit'); ?>" class="form-control">
                        </div>
                    </div>
					
					<div class="form-group">
                        <label class="col-sm-3 control-label">Unit</label>
                        <div class="col-sm-6">
                            <input type="text" name="unit" value="<?php echo set_value('unit'); ?>" class="form-control">
                        </div>
                    </div>
 
 <div class="form-group">
 <label class="col-sm-3 control-label">Stauts</label>	
<div class="col-sm-6">		
			<select class="form-control input-lg m-bot15" name="active">
<option value="1">Available</option>
<option value="0">Not Available</option>
</select></div></div>

<div class="form-group" style="text-align:center">	
<button type="submit" class="btn btn-info">Submit</button></div>
 
                </form>
            </div>
        </section>

        </div>
        </div>


                </div>

            </div>
        </div>


        <!-- page end-->
        </section>
    </section>
    <!--main content end-->