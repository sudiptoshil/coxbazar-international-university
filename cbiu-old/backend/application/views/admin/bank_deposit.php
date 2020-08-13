<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css1/tcal.css" />
	<script type="text/javascript" src="<?php echo base_url(); ?>css1/tcal.js"></script> 

<style>
.form-control {
    width: 75%;
}

.col-sm-6 {
    width: 30%;
}
.col-sm-3 {
    width: 15%;
}
</style>

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

		 <form class="form-horizontal bucket-form" method="post" action="<?php echo base_url(); ?>admin/bank_deposit">
                    
                  
					<div class="form-group">
                        <label class="col-sm-3 control-label">Voucher No</label>
                        <div class="col-sm-6">
                            <input type="text" name="voucher_no" value="<?php echo $voucher_no; ?>" class="form-control">
                        </div>
						
						<label class="col-sm-3 control-label">Date</label>
                        <div class="col-sm-6">
                            <input class="tcal"  type="text" name="date" value="<?php echo set_value('cash'); ?>" class="form-control">
                        </div>
						
                    </div>
					<div class="form-group">
                        <label class="col-sm-3 control-label">Amount</label>
                        <div class="col-sm-6">
                            <input type="text" name="amount" value="<?php echo set_value('amount'); ?>" class="form-control">
                        </div>
						
						<label class="col-sm-3 control-label">Bank</label>	
						<div class="col-sm-6">		
									<select class="form-control input-lg m-bot15" name="bank_ledger">
						<?php foreach($bank_ledger as $ledger1) { 
						?>
						  <option value="<?php echo $ledger1['id']; ?>"><?php echo $ledger1['ledger_title']; ?></option>
						<?php  } ?>
						</select></div>
						
                    </div>
					
					<div class="form-group">
                        <label class="col-sm-3 control-label">Cheque No</label>
                        <div class="col-sm-6">
                            <input type="text" name="cheque_no" value="" class="form-control">
                        </div>
						
						<label class="col-sm-3 control-label">Cheque Date</label>
                        <div class="col-sm-6">
                            <input class="tcal"  type="text" name="cheque_date" value="<?php echo set_value('cheque_date'); ?>" class="form-control">
                        </div>
						
                    </div>
					
					
					<div class="form-group">
					<label class="col-sm-3 control-label">Recieve From</label>	
						<div class="col-sm-6">		
									<select class="form-control input-lg m-bot15" name="ledger">
						<?php foreach($ledger as $ledger1) { 
						?>
						  <option value="<?php echo $ledger1['id']; ?>"><?php echo $ledger1['ledger_title']; ?></option>
						<?php  } ?>
						</select></div>
					
                        <label class="col-sm-3 control-label">Description</label>
                        <div class="col-sm-6">
                            <input type="text" name="description" value="<?php echo set_value('description'); ?>" class="form-control">
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