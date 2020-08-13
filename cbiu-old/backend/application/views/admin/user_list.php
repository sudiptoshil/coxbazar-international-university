<section id="main-content">
        <section class="wrapper">
        <!-- page start-->

<div class="row">
            <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading">
					
					
                    <strong> User List </strong>
                        
                    </header>
					
					
					  <div class="panel-body" style="height:700px">
					  
						 <div class="adv-table">
						 
						 
							<table class="table table-bordered">
							
								<thead>
									<tr>
									<th style="text-align:center">Name</th>
									<th style="text-align:center">Ware</th>
									<th style="text-align:center">Type</th>
									</tr>
								</thead>
								<tbody>
								
								
									<?php foreach($user as $val): ?>
									
									
										<tr>
										
										
											<td><?php echo $val['user'] ?></td>
											<td>
											
											
			<?php echo $this->news_model->anyName('wire','id',$val['wire'],'name'); ?>								
											
											
											
											</td>
											
											<td>
											
											
												<?php

									if($val['type'] == 1)
													{
														
														echo "Super Admin";
														
													}
													else if($val['type'] == 2)
														echo "Admin";
													
												else if($val['type'] == 3)
													echo "User";

												?>
												
											
											</td>
											
											
											
											<td style="width:100px;">
											
											
												<?php 
												
						if($val['active'] == 1)
							{
								?>
					<button class="form-control btn-success">Active</button>									
								<?php
														
							}
						else{
							?>
													

					<button class="form-control btn-danger">Inactive</button>	
													
							<?php
														
							}
												
												
												?>
												
											
											</td>
<td><a style='color:red;font-weight:bold' onclick="getUser(<?php echo $val['id'] ?>,<?php echo $val['type'] ?>,<?php echo $val['wire'] ?>)" href="#Popup">Edit</a></td>
										
										
										</tr>
									
									<?php endforeach; ?>
								
								
								</tbody>
							
							</table>
						 
						 
						 
						 
						 <div id="Popup" class="Modal">
		<div class="content">
			
				<div class="row" style='border-bottom:2px solid;text-align:center;margin-bottom:10px'>
				
					<h3>Update User</h3>
				
				</div>
				<div class="row">
				
				<div class="form-group">
                      <label class="col-sm-2 control-label">Name</label>
                        <div class="col-sm-6">
    <input type="text" id="user"  class="form-control input-lg m-bot15">
                        </div>
                    
				</div>
				
				
				
				
				
				</div>
				
				<div class="row">
				
					
				<div class="form-group">
                      <label class="col-sm-2 control-label">Password</label>
                       <div class="col-sm-6">
    <input type="text" id="password"  class="form-control input-lg m-bot15">
                        </div>
                    
				</div>
				
				
				</div>
				<div class="row">
				
				
				
				<div class="form-group">
                      <label class="col-sm-2 control-label">Type</label>
                        <div class="col-sm-6">


							<select class="form-control input-lg m-bot15" id="type_u">
							
							
							
							
							</select>


                        </div>
                    
				</div>
				
				
				
				
				
				
				</div>
				
			
		<div class="row">
				
				
				
				<div class="form-group">
                      <label class="col-sm-2 control-label">Ware</label>
                        <div class="col-sm-6">


							<select class="form-control input-lg m-bot15" id="shop">
							
							
							
							
							</select>


                        </div>
						<div class="col-sm-4"></div>
                    
				</div>
				
				
				 
				
				
				
				</div>


				
				<div class="row">
				
				
				 <div class="form-group">
	<label class="col-sm-2 control-label">Permission</label>
							<div class="col-sm-6">		
							
							
<input name="active" value="1" type="radio" checked>  Active    <input name="active" value="0" type="radio">Inactive
							
							
							
						</div>
						
						<div class="col-sm-4"></div>
					</div>
				
				
				
				</div>
				
				<div class="col-sm-12" id="user_list">
			
			
			
			
			
			</div>
			
		<div class="row" style="margin-top:10px">
			<div class="col-sm-12">
							
					<div class="col-sm-4"></div>
					<div class="col-sm-3">
					
<button type="button" id="sub" onclick="user_update()" class="btn btn-info">Submit</button></div>
<button type="button" id="con" onclick="create_user2()" class="btn btn-info">Confirm</button></div>					
					</div>
					<div class="col-sm-4"></div>
					
					
					
					
	<span class="closes"></span>				
					
					
					
					
					
					
					
					
					
						</div>	
							</div>
				
				
				
				
				
				
				
				
				
			<span class="closes"></span>	
					
		</div>			
					
	</div>	
						 
						 
						 </div>
					  <div id="modals">
				
				<div class="col-sm-4"></div>
				<div class="col-sm-4" style="margin-top:10%;">
				
				<img style="display:none;" class="img" src="<?php echo base_url(); ?>css/715.gif" title="Loading........"/>
				
				
				
				</div>
				<div class="col-sm-4"></div>
				
				
		</div>	
					  
					  </div>
					
					
					
					
</section>
	</section>
	
	
	</div>
	
	
	</section>