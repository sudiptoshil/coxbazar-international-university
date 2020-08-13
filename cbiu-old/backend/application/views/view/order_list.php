
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
									<th>Date</th>
									<th>Time</th>
									<th>Status</th>
									<th>Amount</th>
									<th>Courier</th>
									<th>Others</th>
									<th>Total Amount</th>
									

								</thead>
								
								
								<tbody>
								
								<?php $i=1; foreach($all as $val):?>
								
								<tr>
								
								
								
								
									<td><?php echo $i++; ?></td>
									<td><?php echo $val['date'] ?></td>
									<td><?php echo $val['time'] ?></td>

									<td><?php if($val['status']==0) { ?> <div class="label label-primary">Pending</div> <?php } ?>
<?php if($val['status']==1) { ?> <div class="label label-success">Completed</div> <?php } ?>
</td>
									<td><?php echo $val['amount'] ?></td>
									<td><?php echo $val['courier'] ?></td>
									<td><?php echo $val['other'];
									
									
									$gross=$val['courier'] + $val['other'] +$val['amount'];
									
									?></td>
									
									<td><?php echo $gross; ?></td>
									<td><a target="_blank" href="<?php echo base_url(); ?>mains/order_details/<?php echo $val['id'] ?>/<?php echo $id ?>">Details</a></td>
								
								
								</tr>
								
								<?php endforeach; ?>
								
								</tbody>
						
						
						</table>
				
				
				
		<?php echo $links?>
		
		</div>




</div>