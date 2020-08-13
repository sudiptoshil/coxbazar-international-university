


<div class="col-sm-9" style="background:white;">


		<div class="row pro">
		
		
				<div class="col-sm-12 pro_header">
				
				
						<p style="font-weight:bold;font-size:20px;color:white;"><?php echo $title; ?></p>
				
				</div>
				
		
		
		</div>
		
		
		<div class="row">
		
		
				
			
				
				
						<table class="table table-bordered table-hover">
						
								<thead>
								
									<th>SL</th>
									<th>Product Name</th>
									<th>Quantity</th>
									<th>Price</th>
									<th>Total</th>
									<th>Status</th>
									

								</thead>
								
								
								<tbody>
								
								<?php $total=0;$i=1; foreach($all as $val):?>
								
								<tr>
								
								
								
								
									<td><?php echo $i++; ?></td>
									<td><?php echo $this->news_model->getProfileName2('product',$val['p_id']); ?></td>
									<td><?php echo $val['quantity'] ?></td>
									<td>
									<?php
									echo $val['price'] ;
									
									//$total=$total+$val['price'];
									
									?>
									</td>
									<td>
									
									
							<?php
									echo $val['price']*$val['quantity'];
									
									$total=$total+($val['price']*$val['quantity']);
									
									?>		
									
									
									
									
									
									
									
									
									
									</td>
									<td>
									
									<?php if($val['status']==0) { ?> <div class="label label-primary">Pending</div> <?php } ?>
									<?php if($val['status']==1) { ?> <div class="label label-success">Completed</div> <?php } ?>
								<?php if($val['status']==2) { ?> <div class="label label-danger">Cancel</div> <?php } ?>
									
									
									</td>
								
								</tr>
								
								<?php endforeach; ?>
								
								
								<tr>
								
										<td colspan="4" style="text-align:right;font-weight:bold;">Total  Price:</td>
										<td colspan="3" style="text-align:left;font-weight:bold;"><?php echo $total; ?></td>
								
								</tr>
								
								</tbody>
						
						
						</table>
				
				
				
		
		
		</div>




</div>