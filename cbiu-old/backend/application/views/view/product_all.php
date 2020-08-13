
<div class="col-sm-1" style="width: 1.333%;">



</div>


<div class="col-sm-8">


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
									

								</thead>
								
								
								<tbody>
								
								<?php foreach($all as $val):?>
								
								<tr>
								
								
								
								
									<td><?php echo $val['name'] ?></td>
									<td><?php echo $val['fullname'] ?></td>
									<td><?php echo $val['email'] ?></td>
									<td><?php echo $val['country'] ?></td>
									<td><?php echo $val['address'] ?></td>
									<td><?php echo $val['mobile'] ?></td>
								
								</tr>
								
								<?php endforeach; ?>
								
								</tbody>
						
						
						</table>
				
				
				
		
		
		</div>




</div>