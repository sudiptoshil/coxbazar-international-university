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
<?php foreach ($password as $item): ?>
			
		 <form class="form-horizontal bucket-form" method="post" action="<?php echo base_url(); ?>admin/password_change">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Password</label>
                        <div class="col-sm-6">
                            <input type="text" name="admin" value="<?php echo $item['password']; ?>" class="form-control">
                        </div>
                    </div>
                   

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