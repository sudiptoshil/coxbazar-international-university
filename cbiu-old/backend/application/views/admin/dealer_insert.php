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

		 <form class="form-horizontal bucket-form" method="post" action="<?php echo base_url(); ?>admin/dealer_insert">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Name</label>
                        <div class="col-sm-6">
                            <input type="text" name="name" value="<?php echo set_value('name'); ?>" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Phone</label>
                        <div class="col-sm-6">
                            <input type="text" name="phone" value="<?php echo set_value('phone'); ?>" class="form-control">
                        </div>
                    </div>
					
					<div class="form-group">
                        <label class="col-sm-3 control-label">Opening Balance</label>
                        <div class="col-sm-6">
                            <input type="text" name="opening_balance" value="<?php echo set_value('opening_balance'); ?>" class="form-control">
                        </div>
                    </div>
					
					 <div class="form-group">
                        <label class="col-sm-3 control-label">Address</label>
                        <div class="col-sm-6">
                            <input type="text" name="details" value="<?php echo set_value('details'); ?>" class="form-control">
                        </div>
                    </div>
					
					<div class="form-group">
                        <label class="col-sm-3 control-label">User</label>
                        <div class="col-sm-6">
                            <input type="text" name="user" value="<?php echo set_value('user'); ?>" class="form-control">
                        </div>
                    </div>
					<div class="form-group">
                        <label class="col-sm-3 control-label">Password</label>
                        <div class="col-sm-6">
                            <input type="text" name="password" value="<?php echo set_value('password'); ?>" class="form-control">
                        </div>
                    </div>
				

<div class="form-group">					
<label class="col-sm-3 control-label">Zone</label>	
<div class="col-sm-6">		
			<select class="form-control input-lg m-bot15" name="zone">
<?php foreach($zone as $category1) { 
?>
  <option value="<?php echo $category1['id']; ?>"><?php echo $category1['name']; ?></option>
<?php  } ?>
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