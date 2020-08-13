<!--main content start-->
    <section id="main-content" class="">
        <section class="wrapper">
        <!-- page start-->
        <!-- page start-->
     
	 
	 
		

        <div class="row">
		
		
		
		<?php  $w=$this->session->userdata('wire'); ?>
		
		
		
		<div class="col-lg-12">
		
				<section class="panel">
				
				<header class="panel-heading">
				
				<?php if($w == 0){
					
					?>
		<a href="#Popup"><strong>Create Store</strong></a>

					<?php
				} ?>
					
					
					
				</header>
				
				<div class="panel-body">
				
				
<form class="form-horizontal bucket-form" method="post" action="<?php echo base_url(); ?>/create_user">

				
				<div class="form-group">
                      <label class="col-sm-2 control-label">User Name</label>
                        <div class="col-sm-4">
						
						
 <input type="text" id="user"  class="form-control">
                        
						
						
						</div>
						
						
						
						
						
                    
				</div>
	
                 <div class="form-group"> 
<label class="col-sm-2 control-label">Password</label>				 
                        <div class="col-sm-4">
						
						
     <input type="text" id="password" class="form-control">
                       


					   </div>
				</div>
                        
                         <div class="form-group">
	<label class="col-sm-2 control-label">Type</label>				 

							<div class="col-sm-4">		
		<select id="type" class="form-control" name="type" onchange="type_per()">
<option></option>		
			<?php

			
			
			if($w == 0){
				?>
		<option value="1">SUPER ADMIN</option>
			<option value="2">ADMIN</option>

				<?php
			}
			
			?>
				
									
				<option value="3">USER</option>			
									
		</select>
							</div>
						</div>



			<?php if($w == 0){
				
				?>
				
				<div class="form-group">
				
	<label class="col-sm-2 control-label">Warehouse</label>
	
	
							<div class="col-sm-4">		
	<select class="form-control" id="shop">
								
				<?php foreach($ware as $val): ?>
	
<option value="<?php echo $val['id']; ?>"><?php echo $val['name'] ?></option>
	
				<?php endforeach; ?>
	
	</select>
						</div>
						
						
						
					</div>
				
				<?php
				
			}
			
			else{
				
				
		$name=$this->news_model->anyName('wire','id',$w,'name');		
				
				?>
				
				<div class="form-group">
				
				<label class="col-sm-2 control-label">Warehouse</label>
				<div class="col-sm-4">
				
				
					
						<select class="form-control" id="shop">
						
						
							<option value="<?php echo $w; ?>"><?php echo $name; ?></option>
						
						</select>
				
				</div>
				
				</div>
				
				
				
				
				<?php
				
			}
			
			
			
			
			?>

                        
                    

	
	 
                        <div class="form-group">
	<label class="col-sm-2 control-label">Permission</label>
							<div class="col-sm-6">		
							
							
<input name="active" value="1" type="radio" checked>  Active    <input name="active" value="0" type="radio">Inactive
							
							
							
						</div>
					</div>
	 <div class="col-sm-12">
		
		<div class="row">
		
		
			<div class="col-sm-3"></div>
			<div class="col-sm-6">
			
	<h3>User access</h3>		
			
			
			
			</div>
			<div class="col-sm-3"></div>
		
		
		</div>
		<div class="row">
		<div class="col-sm-3"></div>
		<div class="col-sm-6" id="per">
		
		
		
		
		
		
		</div>
		<div class="col-sm-3"></div>
	</div>
	
	 </div>
	 
	 <div class="form-group" style="text-align:center">	
<button type="button" id="sub" onclick="create_user()" class="btn btn-info">Submit</button></div>
<button type="button" id="con" onclick="create_user2()" class="btn btn-info">Confirm</button></div>
	 
	 
	 
				
					</form>
					
					
	<div id="Popup" class="Modal">
		<div class="content">
			
				<div class="row" style='border-bottom:2px solid;text-align:center;margin-bottom:10px'>
				
					<h3>CREATE STORE</h3>
				
				</div>
				<div class="row">
				
				<div class="form-group">
                      <label class="col-sm-2 control-label">Store Name</label>
                        <div class="col-sm-6">
    <input type="text" id="wname"  class="form-control">
                        </div>
                    
				</div></div>
				
				<div class="row">
				<div class="form-group">
                      <label class="col-sm-2 control-label">Theme</label>
                        <div class="col-sm-6">
<input type="text" id="wtheme"  class="form-control">
                        </div></div></div>


				<div class="row">
				<div class="form-group">
                      <label class="col-sm-2 control-label">Address</label>
                        <div class="col-sm-6"> <textarea id="waddress" class="form-control" rows="6"></textarea> </div>
                    </div></div>
				
				
			<div class="row">
			<div class="form-group">
                      <label class="col-sm-2 control-label">Phone</label>
                        <div class="col-sm-6"><input type="text" id="wphone"  class="form-control"></div>
                    </div></div>


			<div class="row">
			<div class="form-group">
                      <label class="col-sm-2 control-label">City </label>
                        <div class="col-sm-6"><input type="text" id="wvat"  class="form-control"></div>
                    </div></div>	
									
		<div class="row">
			<div class="col-sm-12" style="text-align:right">
							
					<div class="col-sm-4"></div>
					<div class="col-sm-3">
					
					<button onclick="process_p2()" id="submit_p" class="form-control">Submit</button>
					
					</div>
					<div class="col-sm-4"></div>
					
						</div>	
							</div>
				
				
				
				
				
				
				
				
				
			<span class="closes"></span>	
					
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
				
				<section/>
		
		</div>
		
		
		

        </div>


                </div>

            </div>
        </div>


        <!-- page end-->
        </section>
    </section>
    <!--main content end-->