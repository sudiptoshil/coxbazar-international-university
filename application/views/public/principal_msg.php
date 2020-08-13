<div class="about-area">
	<div class="section-top-banner">
		<!-- <img src="images/campus-img.jpg" alt="TECN"> -->
		<div class="container">
		    <?php 
    	        $info = $this->common->getAnyInfoRow('various_content','content_type','principal_msg');
		    ?>
			<div class="section-top-banner-links">
				<h1>Principal's Message</h1>
				<nav aria-label="breadcrumb">
				  <ol class="breadcrumb">
				    <li class="breadcrumb-item"><a href="<?php echo base_url();?>">Home</a></li>
				    <li class="breadcrumb-item active" aria-current="page">Principal Message</li>
				  </ol>
				</nav>
			</div>
		</div>
	</div>

	<div class="about-area-body">
		<div class="container">
		    <?php if(!empty($info->file_name)){
		    ?>
		    <img src="<?=base_url();?>assets/images/teachers/<?=$info->file_name;?>" style="float: left; width: 200px;padding-right: 15px;"/>
		    <?php 
		    }?>
			<?php
                echo $info->content;
			?>
		</div>
	</div>
</div>