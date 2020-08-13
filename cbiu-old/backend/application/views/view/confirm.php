

 <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
        <!-- page start-->

<div class="row">
            <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading">
                        Order Complete Process
                       
                    </header>
                    <div class="panel-body">
                    <div class="adv-table">
                    <table  class="display table table-bordered table-striped" id="dynamic-table" width="100%" border="1">
                    <thead>
                    <tr>
                
                        
                        <th>PRODUCT NAME</th>
                        
						<th>PRICE</th>
						<th>TOTAL PRICE</th>
                        <th>QUANTITY</th>
                        <th>DATE</th>
					   <th>TIME</th>
					
                    </tr>
                    </thead>
                    <tbody>

<?php $i=1; foreach ($all as $item): ?>

<tr class="gradeX">
                   
                        <td><?php echo $item['product_name']?></td>
						
						
            
                        <td><?php echo $item['price']?></td>
                        <td><?php echo $item['total']?></td>
                        <td><?php echo$item['qun']?></td>
                        <td><?php echo$item['date']?></td>
                        <td><?php echo$item['time']?></td>
            
                    </tr>
					

<?php endforeach; ?>
<td colspan="5" style="background:red;color:white;text-align:center;font-weight:bold;">Total Ammount :<?php echo $total;?></td>

</table>
                    </div>
                    </div>
				
					
					
                </section>
            </div>
        </div>
        <!-- page end-->
        </section>
		<section>
		
		<form method="post" action="<?php echo base_url();?>main/confirm/<?php echo $id?>/<?php echo $name?>">
			  <?php echo validation_errors();?>
		<section>
		
			<div class="checkbox">
				<label><input type="checkbox" value="<?php echo $id;?>" name="check">Information From Me</label>
			</div>
			
		</section>
				<div class="form-group">
												<label class="col-sm-3 control-label">Name</label>
												<div class="col-sm-9">
													<input type="text" name="name" id="name" class="form-control" required>
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-3 control-label">Email</label>
												<div class="col-sm-9">
													<input type="text" name="email" id="email" class="form-control" required>
												</div>
											</div>
											
											
											
											<div class="form-group">
												<label class="col-sm-3 control-label">Address</label>
												<div class="col-sm-9">
													<input type="text" name="address" id="address" class="form-control" required>
												</div>
											</div>
											
											<div class="form-group">
												<label class="col-sm-3 control-label">Distric</label>
												<div class="col-sm-9">
													<input type="text" name="distric" id="distric" class="form-control" required>
												</div>
											</div>
											
											<div class="form-group">
												<label class="col-sm-3 control-label">Mobile</label>
												<div class="col-sm-9">
													<input type="text" name="mobile" id="mobile" class="form-control" required>
												</div>
											</div>
    
								<button type="submit" class="btn btn-info" name="submit" value="Submit">Submit</button>
		
		</form>
		
		</section>
    </section>


