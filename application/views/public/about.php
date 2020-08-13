<div class="about-area">
	<div class="section-top-banner">
		<!-- <img src="images/campus-img.jpg" alt="TECN"> -->
		<div class="container">
			<div class="section-top-banner-links">
				<h1>About TECN</h1>
				<nav aria-label="breadcrumb">
				  <ol class="breadcrumb">
				    <li class="breadcrumb-item"><a href="<?php echo base_url();?>">Home</a></li>
				    <li class="breadcrumb-item active" aria-current="page">About TECN</li>
				  </ol>
				</nav>
			</div>
		</div>
	</div>

	<div class="about-area-body">
		<div class="container">
			<?php
                echo $this->common->getSpecificField('dept','code',0,'overview');
			?>
		</div>
	</div>
</div>