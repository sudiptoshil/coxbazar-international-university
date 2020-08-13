<div class="single-notice-area wrapper-area">
	<div class="section-top-banner">
		<!-- <img src="images/campus-img.jpg" alt="TECN"> -->
		<div class="container">
			<div class="section-top-banner-links">
				<h1>Notice</h1>
				<nav aria-label="breadcrumb">
				  <ol class="breadcrumb">
				    <li class="breadcrumb-item"><a href="<?php echo base_url();?>">Home</a></li>
				    <li class="breadcrumb-item"><a href="<?php echo base_url();?>notice">Notice</a></li>
				    <li class="breadcrumb-item active" aria-current="page">Single Notice</li>
				  </ol>
				</nav>
			</div>
		</div>
	</div>

	<div class="single-notice-body wrapper-area-body">
		<div class="container">
			<div class="row">
		   		<div class="col-md-12">
		   			<?php 
		   			foreach ($single_notice as $key => $s) {
		   			?>
		   			<div class="single-notice-body-in">
		   				<div class="single-notice-body-title">
		   					<h3><?php echo $s['title'];?></h3>
		   				</div>
		   				<div>
		   					<p class="text-mute"><?php echo $s['date_time'];?></p>
		   				</div>
		   				<div class="single-notice-body-desccription">
		   					<?php echo $s['description'];?>
		   				</div>	
		   				<div class="single-notice-body-image">
		   				    <iframe src="<?php echo base_url();?>assets/images/notice/<?php echo $s['image'];?>" style="border:0px #FFFFFF none;" name="myiFrame" scrolling="no" frameborder="0" marginheight="0px" marginwidth="0px" height="750px" width="100%"></iframe>
		   				    <!--<object data="<?php echo base_url();?>assets/images/notice/<?php echo $s['image'];?>" type="text/html"  style="width:100%;height:100%"></object>-->
		   				    <!--<embed src= "<?php echo base_url();?>assets/images/notice/<?php echo $s['image'];?>" width= "100%" height="auto">-->
		   					<!--<img src="<?php echo base_url();?>assets/images/notice/<?php echo $s['image'];?>" alt="asdf">-->
		   				</div>	
		   			</div>
		   			<?php
		   			}
		   			?>
		   		</div>
			</div>
		</div>
	</div>
</div>