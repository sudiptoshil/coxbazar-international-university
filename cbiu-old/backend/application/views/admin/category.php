
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

<form class="form-horizontal bucket-form" method="post" action="<?php echo base_url(); ?>admin/category">

<div class="form-group" style="text-align:center">	
<button type="submit" class="btn btn-info">Update</button></div>
							
<?php $i=0; foreach ($all as $item): ?>
<input type="hidden" name="id[]" value="<?php echo $item['id']; ?>" />	
		
<div class="form-group">
                       <label class="col-sm-3 control-label"></label>
                        <div class="col-sm-6">
                            <input type="text" name="sub[]" value="<?php echo $item['sub']; ?>" class="form-control">
                        </div>
                    

	 </div>			
					

 <?php $i++; endforeach;  ?>

<div class="form-group">
                         <label class="col-sm-3 control-label"></label>
                        <div class="col-sm-6">
                            <input type="text" name="new_sub" value="" class="form-control">
                        </div>
				
   </div>

 <input type="hidden" name="count" value="<?php echo $i; ?>" />
	
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