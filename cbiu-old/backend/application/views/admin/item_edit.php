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
			
		 <form class="form-horizontal bucket-form" method="post" action="<?php echo base_url(); ?>admin/item_edit/<?php echo $id; ?>">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Produc Code</label>
                        <div class="col-sm-6">
                            <input type="text" name="code" value="<?php echo $item['code']; ?>" class="form-control">
                        </div>
                    </div>
					<div class="form-group">
                        <label class="col-sm-3 control-label">Model No</label>
                        <div class="col-sm-6">
                            <input type="text" name="model_no" value="<?php echo $item['model_no']; ?>" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Product Name </label>
                        <div class="col-sm-6">
                            <input type="text" name="name" value="<?php echo $item['name']; ?>" class="form-control">
                        </div>
                    </div>
					
				

<div class="form-group">					
<label class="col-sm-3 control-label">Category</label>	
<div class="col-sm-6">		
			<select class="form-control input-lg m-bot15" name="category">
<?php foreach($category as $category1) { ?>
  <option value="<?php echo $category1['root']."-".$category1['id']; ; ?>"<?php if ($category1['id'] == $item['category']): ?> selected="selected"<?php endif; ?>><?php echo $category1['sub']; ?></option>
  <?php  } ?>
</select></div></div>

			<!--
			 <div class="form-group">
                        <label class="col-sm-3 control-label">Buying Price</label>
                        <div class="col-sm-6">
                            <input type="text" name="buy_price" value="<?php echo $item['buy_price']; ?>" class="form-control">
                        </div>
                    </div>
					
					<div class="form-group">
                        <label class="col-sm-3 control-label">Selling Price</label>
                        <div class="col-sm-6">
                            <input type="text" name="sell_price" value="<?php echo $item['sell_price']; ?>" class="form-control">
                        </div>
                    </div>
				-->	
				<div class="form-group">
                        <label class="col-sm-3 control-label">1 Ctn = ? Pcs</label>
                        <div class="col-sm-6">
                            <input type="text" name="pcs" value="<?php echo $item['pcs']; ?>" class="form-control">
                        </div>
                    </div>

				
					<div class="form-group">
                        <label class="col-sm-3 control-label">Opening Stock</label>
                        <div class="col-sm-6">
                            <input type="text" name="opening_stock" value="<?php echo $item['opening_stock']; ?>" class="form-control">
                        </div>
                    </div>
					
					<div class="form-group">
                        <label class="col-sm-3 control-label">Minimum Stock</label>
                        <div class="col-sm-6">
                            <input type="text" name="stock_limit" value="<?php echo $item['stock_limit']; ?>" class="form-control">
                        </div>
                    </div>
					
			
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Unit</label>
                        <div class="col-sm-6">
                            <input type="text" name="unit" value="<?php echo $item['unit']; ?>" class="form-control">
                        </div>
                    </div>
 
 <div class="form-group">
 <label class="col-sm-3 control-label">Stauts</label>	
<div class="col-sm-6">		
			<select class="form-control input-lg m-bot15" name="active">
<option value="1" <?php if ($item['active'] == 1): ?> selected="selected"<?php endif; ?>>Active</option>
<option value="0" <?php if ($item['active'] == 0): ?> selected="selected"<?php endif; ?>>Not Active</option>
</select></div></div>

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