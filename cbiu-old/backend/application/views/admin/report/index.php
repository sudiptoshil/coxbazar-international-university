<div class="container">




			<div class="row">
			
			
					<div class="col-sm-12" style="border-bottom:2px solid">
					
						<h1 style="text-align:center"><?php

				$wire=$this->session->userdata('wire');
				$ad=$this->session->userdata('admin');
				
				$ch=$this->news_model->anyName('wire','id',$wire,'name');

				if(empty($ch))
				{
					echo "Super Admin";
				}
				else{
					
					echo $ch;
					
					
				}

	?></h1>
					
					
					</div>
					
				
			
			
			</div>
			<div class="row" id="ro">
			
			
					<div class="col-sm-6 col-xs-6" style="padding:10px">
					
							<div class="row">
							
									<h3>Sender</h3>
							
							
							</div>
							<div class="row">
								
							
						<?php foreach($res as $or): ?>
								
									<p>Name  :<?php echo $or['name'] ?></p>
									<p>Phone :<?php echo $or['mobile'] ?></p>
							
									<p>Address :<?php echo $or['address'] ?></p>
								
								<?php endforeach; ?>
							</div>
							
					
					</div>
					
					<div class="col-sm-6 col-xs-6" style="text-align:right;">
					
					<div class="row">
							
									
									
									
									<h3>Receiver</h3>
									
								
									
							
							
							</div>
							<div class="row" style="margin-left:10px">
								<?php foreach($order as $or): ?>
								
								
									<p>Name  :<?php echo $or['name'] ?></p>
									<p>Phone :<?php echo $or['phone'] ?></p>
							
									<p>Address :<?php echo $or['address'] ?></p>
									
									
									<?php endforeach; ?>
							</div>
					
					</div>
			
			
			</div>
			
			
				<div class="row">
				
				
						<h4 style="text-align:center">Order List</h4>
				
				
				</div>
				
				<div class="row">
				
				
					<table class="table table-bordered">
						
								<thead>
								
											<th>SL</th>
											<th>Name</th>
											<th>Quantity</th>
											<th>Price</th>
											<th>Total</th>
								
								</thead>
								
								<tbody>
								
								
										<?php $total=0;$i=1; foreach($all as $val): ?>
										
										<tr>
											
										<td><?php echo $i++; ?></td>
										<td><?php echo $this->news_model->getcategorybreak_name('product','id',$val['p_id'],'product_name'); ?></td>
										<td><?php echo $val['quantity'] ?></td>
										<td><?php echo $val['price'] ?></td>
										
										<td><?php $total=$total+ ($val['quantity'] *$val['price'] ); echo ($val['quantity'] *$val['price'] ) ?></td>
										
										</tr>
										<?php endforeach; ?>
								
								<tr>
								
								<td colspan="4" style="text-align:right;"><strong>Total Price :</strong></td>
								<td><strong><?php echo $total; ?></strong></td>
								
								
								</tr>
								
								
								<tr>
								
								<td colspan="4" style="text-align:right;"><strong>Courier Cost :</strong></td>
								<td><strong>
								
								<?php
								 $ch=$this->news_model->getcategorybreak_name('final_order','id',$root,'courier');
								 
								 if(empty($ch))
								 {
								
								 echo  "0.0";
								   
								
								 }
								 else
								 {
								
								 echo $ch;
								 
								 }
								 
								  ?>
								
								
								
								</td>
								
								
								</tr>
								
								
									<tr>
								
								<td colspan="4" style="text-align:right;"><strong>Total :</strong></td>
								<td><strong><?php echo $total + $ch; ?></strong></td>
								
								
								</tr>
								
								
								
								</tbody>
						
						
						
						</table>
				
				
				</div>

				<div class="row">
				
				
							<div class="col-sm-6 col-xs-6">
							
							
									** Note: <?php echo $this->news_model->getcategorybreak_name('final_order','id',$root,'note');?>
							
							
							</div>
							<div class="col-sm-6 col-xs-6">
							
							
										
									
							
							</div>
				
				
				
				</div>
				
				
				
				
				<div class="row">
				
				
							<div class="col-sm-6 col-xs-6">
							
							
									** Payment Method :  <?php echo $this->news_model->getcategorybreak_name('final_order','id',$root,'pament_system');?>
							
							
							</div>
							<div class="col-sm-6 col-xs-6">
							
							
										
									
							
							</div>
				
				
				
				</div>
				
				
				
				<div class="row" style="margin-top:20px">
				
				
							<div class="col-sm-6 col-xs-6">
							
							
								<div class="row">
								
										<div class="col-sm-6 col-xs-6">
										<h3 style="border-top:2px solid;text-align:center">Signature</h3>
										</div>
										<div class="col-sm-6 col-xs-6">
										
										
										</div>
								
								
								</div>
							
									
							
							
							</div>
							<div class="col-sm-6 col-xs-6">
							
							
									<div class="row">
								
										<div class="col-sm-6 col-xs-6">
										
										</div>
										<div class="col-sm-6 col-xs-6">
										<h3 style="border-top:2px solid;text-align:center">Signature</h3>
										
										</div>
								
								
								</div>
							
									
							
							
							</div>	
									
							
							</div>
				
				
				
				</div>


</div>