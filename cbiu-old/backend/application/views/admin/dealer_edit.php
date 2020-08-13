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
<?php foreach ($customer as $item): ?>
			
		 <form class="form-horizontal bucket-form" method="post" action="<?php echo base_url(); ?>admin/dealer_edit/<?php echo $id; ?>">
                 
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Name</label>
                        <div class="col-sm-6">
                            <input type="text" name="name" value="<?php echo $item['name']; ?>" class="form-control">
                        </div>
                    </div>
					
					 <div class="form-group">
                        <label class="col-sm-3 control-label">Phone</label>
                        <div class="col-sm-6">
                            <input type="text" name="phone" value="<?php echo $item['phone']; ?>" class="form-control">
                        </div>
                    </div>

<div class="form-group">					
<label class="col-sm-3 control-label">Zone</label>	
<div class="col-sm-6">		
			<select class="form-control input-lg m-bot15" name="zone">
<?php foreach($zone as $category1) { ?>
  <option value="<?php echo $category1['id'] ; ?>"<?php if ($category1['id'] == $item['zone']): ?> selected="selected"<?php endif; ?>><?php echo $category1['name']; ?></option>
  <?php  } ?>
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