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
<?php foreach ($invoice_no as $item): ?>
			
		 <form class="form-horizontal bucket-form" method="post" action="<?php echo base_url(); ?>admin/invoice_edit/<?php echo $id; ?>">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Invoice No</label>
                        <div class="col-sm-6">
                            <input type="text" name="invoice_no" value="<?php echo $item['invoice_no']; ?>" class="form-control">
                        </div>
                    </div>
				<?php if($item['type']==3 or $item['type']==4) { ?>	
					 <div class="form-group">					
<label class="col-sm-3 control-label">Customer</label>	
<div class="col-sm-6">		
			<select class="form-control input-lg m-bot15" name="customer">
<?php foreach($customer as $customer1) { ?>
  <option value="<?php echo $customer1['id']; ; ?>"<?php if ($customer1['id'] == $item['customer']): ?> selected="selected"<?php endif; ?>><?php echo $customer1['name']; ?></option>
  <?php  } ?>
</select></div></div>
					
					<?php } ?>		
					
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