 
				
					
				
				<div class="col-sm-3">
						
							<div class="row pro_row">
							<?php $admin_user = $this->session->userdata('admin'); ?>
							
							<div class="list-group">
								<p class="list-group-item active" style="font-weight:bold;font-size:18px;">
									Admin
								</p>
								<a style="font-weight:bold" href="<?php echo base_url(); ?>main/profile_view/<?php echo $id; ?>" class="list-group-item">View Profile</a>
								<a style="font-weight:bold" href="<?php echo base_url(); ?>main/profile_update/<?php echo $id; ?>" class="list-group-item">Edit Profile</a>
		<a style="font-weight:bold" href="<?php echo base_url(); ?>main/order_list/<?php echo $id; ?>" class="list-group-item">Order List</a>
								
									
								
									
					
							
								
								<a style="font-weight:bold" href="<?php echo base_url(); ?>main/logout" class="list-group-item">Logout</a>
							</div>
							
							</div>
						
						</div>
				
				
				
				
				
			