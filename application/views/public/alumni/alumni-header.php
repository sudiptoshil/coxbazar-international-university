<div class="alumni-header-area header-area">
	<div class="header-area-top">
		<h2 class="text-center p-3">Textile Engineering College, Noakhali</h2>
	</div>
	<div class="header-area-bottom ">
		<nav class="navbar navbar-expand-lg navbar-dark bg-light ">
			<div class="container">
					<div class="mobile-menu-area">
						<div class="mobile-menu-area-in w-100 d-flex justify-content-between">
					    	<div class="header-logo-mobile">
							  	<a class="navbar-brand" href="<?php echo base_url();?>alumni">
							  		<img src="<?php echo base_url();?>assets/images/alumni/alumni-logo.png" alt="">
							  	</a>
					    	</div>
					    	<div class="header-mobile-menu-btn ml-auto">
							  	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
							    	<span class="navbar-toggler-icon"></span>
							  	</button>
						  	</div>
					  	</div>
					</div>

				  	<div class="collapse navbar-collapse" id="navbarSupportedContent">
					    <div class="header-logo">
						  	<a class="navbar-brand" href="<?php echo base_url();?>">
						  		<img src="<?php echo base_url();?>assets/images/alumni/alumni-logo.png" alt="">
						  	</a>
					    </div>
					    <ul class="navbar-nav ml-auto">
					      	<li class="nav-item">
					        	<a class="nav-link" href="<?php echo base_url();?>">Back to TECN <span class="sr-only">(current)</span></a>
					      	</li>
					      	<li class="nav-item active">
					        	<a class="nav-link" href="<?php echo base_url();?>alumni">Home <span class="sr-only">(current)</span></a>
					      	</li>
					      	<li class="nav-item">
					        	<a class="nav-link" href="<?php echo base_url();?>alumni/#about">About</a>
					      	</li>
					      	<li class="nav-item">
					        	<a class="nav-link" href="<?php echo base_url();?>alumni/directory">Directory</a>
					      	</li>
					      	<!--<li class="nav-item"><a class="nav-link" href="<?php echo base_url();?>alumni/#contact">Contact</a></li>-->
					      	<?php
							
					      	if(!empty($this->common->user_session_data(1)) && $this->common->user_session_data(2) == $this->common->get_user_type('alumni')){
							?>
					      	<li class="nav-item"><a class="nav-link" href="<?php echo base_url();?>alumni/dashboard">Dashboard</a>
					      	<li class="nav-item"><a class="nav-link" href="<?php echo base_url();?>alumni/logout">Logout</a>

							<?php
					      	}else{
				      		?>
					      	<li class="nav-item">
					        	<a class="nav-link" href="<?php echo base_url();?>alumni/registration">Registration</a>
					      	</li>
					      	<li class="nav-item"><a class="nav-link" href="<?php echo base_url();?>alumni/login">Login</a>
				      		<?php
					      	}
					      	?>
					      	
					    </ul>
				  </div>
		  </div>
		</nav>
	</div>
</div>