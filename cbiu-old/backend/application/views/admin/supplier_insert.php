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

		 <form class="form-horizontal bucket-form" method="post" action="<?php echo base_url(); ?>admin/supplier_insert">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Name</label>
                        <div class="col-sm-6">
                            <input type="text" name="name" value="<?php echo set_value('name'); ?>" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">User Name</label>
                        <div class="col-sm-6">
                            <input type="text" name="user" value="<?php echo set_value('user'); ?>" class="form-control">
                        </div>
                    </div>
					
                <div class="form-group">
                        <label class="col-sm-3 control-label">password</label>
                        <div class="col-sm-6">
                            <input type="text" name="password" value="<?php echo set_value('password'); ?>" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Company</label>
                        <div class="col-sm-6">
                            <input type="text" name="company" value="<?php echo set_value('company'); ?>" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Status I/o</label>
                        <div class="col-sm-6">
                            <input type="text" name="status" value="<?php echo set_value('status'); ?>" class="form-control">
                        </div>
                    </div>

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