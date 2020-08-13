<div class="departments-page-area wrapper-area">
	<div class="section-top-banner">
		<!-- <img src="images/campus-img.jpg" alt="TECN"> -->
		<div class="container">
			<div class="section-top-banner-links">
				<h1>Departments</h1>
				<nav aria-label="breadcrumb">
				  <ol class="breadcrumb">
				    <li class="breadcrumb-item"><a href="<?php echo base_url();?>">Home</a></li>
				    <li class="breadcrumb-item active" aria-current="page">Departments</li>
				  </ol>
				</nav>
			</div>
		</div>
	</div>

	<div class="departments-page-area-body wrapper-area-body">
		<div class="container">
			<div class="wrapper-area-body-title">
				<span>Our Departments</span>
			</div>
			<div class="row">
			    <?php 
			    //print_r($all_dept);
			    foreach($all_dept as $d){
		        ?>
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
		   			<div class="dept-page-single">
		   				<a href="<?php echo base_url();?>dept/d/<?php echo $d['short_name'];?>" title="<?php echo $d['name'];?>">
			   				<div class="dept-page-single-img">
			   					<img src="<?php echo base_url();?>assets/images/dept/<?php echo $d['image'];?>" class="img-thumbnail">
			   				</div>
			   				<div class="dept-page-single-title">
			   				    <?php echo $d['name'].'('.$d['short_name'].')';?>
			   					<!--Apparel Manufacturing Engineering (AME)-->
			   				</div>
			   			</a>
		   			</div>
				</div>
		        <?php
			    }
			    ?>
			</div>
		</div>
	</div>
</div>