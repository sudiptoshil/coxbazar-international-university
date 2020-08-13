<!--main content start-->
    <section id="main-content" class="">
        <section class="wrapper">
        <!-- page start-->
        <!-- page start-->
     

        <div class="row">
        <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Form Elements
            </header>
            <div class="panel-body">
<?php foreach ($store as $item): ?>
			
		 <form class="form-horizontal bucket-form" method="post" action="<?php echo base_url(); ?>admin/store_edit/<?php echo $id; ?>">
		 
		 
					<div class="form-group">					
<label class="col-sm-3 control-label">Product</label>	
<div class="col-sm-6">		
			<select class="form-control input-lg m-bot15" name="bar_code">
<?php foreach($product as $product1) { ?>
  <option value="<?php echo $product1['code']; ?>"<?php if ($product1['code'] == $item['bar_code']): ?> selected="selected"<?php endif; ?>><?php echo $product1['name']; ?></option>
  <?php  } ?>
</select></div></div>
		
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Quantity</label>
                        <div class="col-sm-6">
                            <input type="text" name="quantity" value="<?php echo $item['quantity']; ?>" class="form-control">
                        </div>
                    </div>
					
					<div class="form-group">
                        <label class="col-sm-3 control-label">Price</label>
                        <div class="col-sm-6">
                            <input type="text" name="price" value="<?php echo $item['price']; ?>" class="form-control">
                        </div>
                    </div>
					
                    <input type="hidden" name="type" value="<?php echo $item['type']; ?>" class="form-control">

<div class="form-group" style="text-align:center">	
<button type="submit" class="btn btn-info">Update</button></div>
 
                </form>
				<?php endforeach; ?>	
				
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