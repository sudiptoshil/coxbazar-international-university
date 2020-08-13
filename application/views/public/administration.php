<div class="about-area">
	<div class="section-top-banner">
		<div class="container">
			<div class="section-top-banner-links">
				<h1>Administration</h1>
				<nav aria-label="breadcrumb">
				  <ol class="breadcrumb">
				    <li class="breadcrumb-item"><a href="<?php echo base_url();?>">Home</a></li>
				    <li class="breadcrumb-item active" aria-current="page">Administration</li>
				  </ol>
				</nav>
			</div>
		</div>
	</div>

	<div class="about-area-body">
		<div class="container">
			<?php
                echo $this->common->getSpecificField('various_content','content_type','administration','content');
			?>
		</div>
	</div>
</div>