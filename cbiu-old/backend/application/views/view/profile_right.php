


<div class="col-sm-9" style="background:white;">


		<div class="row pro">
		
		
				<div class="col-sm-12 pro_header">
				
				
						<p style="font-weight:bold;font-size:20px;color:white;"><?php echo $title; ?></p>
				
				</div>
				
		
		
		</div>
		
		
		<div class="row">
		
		
				
			
				
				
						<table class="table table-bordered table-hover">
						
								<thead>
								
									<th>Name</th>
									<th>Email</th>
									<th>Company</th>
									<th>City</th>
									<th>State/Province</th>
									<th>Zip/Postcode</th>
									<th>Country</th>
									<th>Address</th>
									<th>Mobile</th>

								</thead>
								
								
								<tbody>
								
								<?php foreach($all as $val):?>
								
								<tr>
								
								
								
								
						<td><?php echo $val['name']." ".$val['last_name']; ?></td>
									<td><?php echo $val['email'] ?></td>
									<td><?php echo $val['com_name'] ?></td>
									<td><?php echo $val['city'] ?></td>
									<td><?php echo $val['state'] ?></td>
									<td><?php echo $val['zip'] ?></td>
									<td><?php echo $val['country'] ?></td>
									<td><?php echo $val['address'] ?></td>
									<td><?php echo $val['mobile'] ?></td>
								
								</tr>
								
								<?php endforeach; ?>
								
								</tbody>
						
						
						</table>
				
				
				
		
		
		</div>




</div>