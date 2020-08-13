<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta http-equiv="Content-Type" content="text/html">

        <title>Gagetoy</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="<?php echo base_url(); ?>main_change/css/mbExtruder.css" media="all" rel="stylesheet" type="text/css">
	<link href='http://fonts.googleapis.com/css?family=Raleway:400,700' rel='stylesheet' type='text/css'>
	
	<link href="<?php echo base_url(); ?>main_change/css/gallery.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>main_change/css/responsive-tabs.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
	<link href="<?php echo base_url(); ?>main_change/css/owl.carousel.css" rel="stylesheet"> 
	<link href="<?php echo base_url(); ?>main_change/css/owl.theme.css" rel="stylesheet" />
	<link href="<?php echo base_url(); ?>main_change/css/owl.transitions.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>main_change/css/font-awesome.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>main_change/css/normalize.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>main_change/css/main.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>main_change/responsive.css" rel="stylesheet">
	
	
	
	
	<link href="<?php echo base_url(); ?>main_change/css/profile.css" rel="stylesheet">
	
	<link href="<?php echo base_url(); ?>css/mbExtruder.css" rel="stylesheet">
	
	
	
	
	
	
	<link href="<?php echo base_url(); ?>css/jquery-ui.css" rel="stylesheet">

	
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link href="<?php echo base_url(); ?>main_change/style.css" rel="stylesheet">


</head>
 <body onload="dataLoad()">
       
      
      <header class="headar_area">
			<div class="container headar">
				<div class="row">
					<div class="col-md-3 logo">
						<a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>main_change/img/logo.png"></a>
					</div>
					<div class="col-md-2 hFeature">
						<i class="fa fa-truck"></i>
						<h2>Cash On<br>Delivery</h2>
					</div>
					<div class="col-md-2 hFeature">
						<i class="fa fa-mobile"></i>
						<h2>Call Us Now</h2>
						<p><b>+88 01732 01 09 02</b></p>
					</div>
					
					
					<div class="col-md-2">
					
					<div class="login">
					
					<?php 
							
					$admin_user = $this->session->userdata('admi');
							
					if(empty($admin_user))
						{
					?>
								
					<button type="button" class="btn btn-default l-btn" data-toggle="modal" data-target="#myModalGED" value="login" style="font-weight:bold;">Login</button>
										
					<button data-toggle="modal" style="font-weight:bold;" data-target="#myModalGE" value="login" class='btn btn-default l-btn'>Sign up</button>
	
										
					<div class="modal fade" id="myModalGED" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					<div class="modal-dialog" role="document">
					<div class="modal-content">
					<div class="modal-header">
						
						
						<div class="row">
						
								<div class="col-sm-6">	<h2>Login Form</h2></div>
								<div class="col-sm-6" style="text-align:right"> 	<a class="btn btn-default l-btn" data-dismiss="modal">X</a></div>
						
						
						</div>
					
						
											

						
						
						
						
					</div>
					<div class="modal-body">
					<form method="post" action="<?php echo base_url(); ?>main/user_insert" enctype="multipart/form-data">
					<?php echo validation_errors();?>
					<div class="form-group">
					
                        <label class="col-sm-3 control-label">Email</label>
                        <div class="col-sm-9">
                            <input type="text" name="user" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Password</label>
                        <div class="col-sm-9">
                            <input type="password" name="password" class="form-control">
                        </div>
                    </div>
													
     <button type="submit"  name="marchanduger" value="login" class="btn btn-default l-btn">Submit</button>   <a class="btn btn-default l-btn" href="<?php echo base_url(); ?>main/forget_pass">Forget Password</a>

 	

</form> 
											      </div>
											     
											    </div>
											  </div>
											</div>
								
								
								
								<?php
								
								
							}
							else{
								
								?>
								
								
								<div class="dropdown">
									<button class="btn btn-default dropdown-toggle" value="login" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
										<span class="glyphicon glyphicon-user"></span>   <?php echo $this->news_model->getProfileName('registration',$admin_user); ?>
									<span class="caret"></span>
								</button>
										<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
										<li><a href="<?php echo base_url(); ?>main/profile/<?php echo $admin_user ?>">
										<span class="glyphicon glyphicon-user"></span>   View Profile</a></li>
											
											<li><a href="<?php echo base_url(); ?>main/logout"><span class="glyphicon glyphicon-log-out"></span>  Logout</a></li>
										</ul>
									</div>
								
								
								
								<?php
								
								
								
								
							}
							
							
							?>
					
					
					
											<!-- Modal -->
											<div class="modal fade" id="myModalGE" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
											  <div class="modal-dialog" role="document">
											    <div class="modal-content">
											      <div class="modal-header">
											        	<div class="row">
						
								<div class="col-sm-6">	<h2>Registration Form</h2><span style="color:red;display:none" id='already'>Already use your email</span></div>
								<div class="col-sm-6" style="text-align:right;"> 	<a id="cross" style="" class="btn btn-default l-btn" data-dismiss="modal">X</a></div>
						
						
						</div>
													
													
											      </div>
											      <div class="modal-body">
<form method="post" action="<?php echo base_url(); ?>main/registration" enctype="multipart/form-data">

					  <?php echo validation_errors();?>

											<div class="form-group">
												<label class="col-sm-3 control-label">Name</label>
												<div class="col-sm-9">
													<input type="text" id="name" class="form-control"><p style='color:red;display:none' id='n'>please enter your name</p>
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-3 control-label">Email</label>
												<div class="col-sm-9"  id="em_div">
													<input type="email" id="email" class="form-control"><p style='color:red;display:none' id='pa'>please enter your email</p><p style='color:red;display:none' id='va'>please enter your valid email</p>
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-3 control-label">Password</label>
												<div class="col-sm-9">
													<input type="password" id="password" class="form-control"><p style='color:red;display:none' id='pass'>please enter your password</p>
												</div>
											</div>
											
										
											
											<div class="form-group">
												<label class="col-sm-3 control-label">Address</label>
												<div class="col-sm-9">
													<input type="text" id="address" class="form-control"><p style='color:red;display:none' id='addr'>please enter your address</p>
												</div>
											</div>
											
											<div class="form-group">
												<label class="col-sm-3 control-label">Distric</label>
												<div class="col-sm-9">
													<input type="text" id="distric" class="form-control"><p style='color:red;display:none' id='dis'>please enter your distric</p>
												</div>
											</div>
											
											<div class="form-group">
												<label class="col-sm-3 control-label">Mobile</label>
												<div class="col-sm-9">
													<input type="text" id="mobile" class="form-control"><p style='color:red;display:none' id='mo'>please enter your mobile number</p>
												</div>
											</div>
    
								<button type="button" class="btn btn-info l-btn" name="submit" id="ragis" value="modal" >Submit</button>
													
											      </div>
												  
												  </form>
												  
											   
											    </div>
											  </div>
											</div>
					
					
					</div>
										

					</div>
					
					
					
					
					<div class="col-md-3 hFeature">
						<div id="sb-search" class="sb-search">
							<form>
								<input class="sb-search-input" placeholder="Enter your search term..." type="search" value="" name="search" id="search">
								<input class="sb-search-submit" type="submit" value="">
								<span class="sb-icon-search"></span>
							</form>
						</div>
					</div>
				</div>	
			</div>
		</header>
	