	
		<section class="menu_slider_area">
			<div class="container">
				<div class="row">
				
					<?php include ('menu.php'); ?>
					
					<div class="col-md-9">
						<div id="owl-main" class="owl-carousel owl-theme">
						  <div class="item"><img src="<?php echo base_url(); ?>main_change/img/keyring-banner.jpg"></div>
						  <div class="item"><img src="<?php echo base_url(); ?>main_change/img/tablet-banner.jpg"></div>
						  <div class="item"><img src="<?php echo base_url(); ?>main_change/img/mobile-banner.jpg"></div>
						</div>
					</div>

					
				</div>	    
			</div>		
		</section>
		
	
		
		
		
	
		<section class="product_carousel">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h3>Deals of the day!</h3>
							<div class="wrapper-with-margin">
								<div id="owl-demo" class="owl-carousel">
								
										<?php $i=1; foreach ($all as $item): ?>
										
				<a href="<?php echo base_url(); ?>main/pro_details/<?php echo $item['id'] ?>">
										<div class="single-carousel">
					<img src="<?php echo base_url(); ?>file_upload/<?php echo $item['image'] ?>"></a>
									<form>
												<h2><?php echo $item['product_name'] ?></h2>



<i type="button" data-role="<?php echo $item['price'] ?>" id="t_input" data-id="<?php echo $item['id'] ?>">Add Card</i>



<h4>TK.<span><?php echo $item['price'] ?></span></h4>



									   
											</form>
										
										
								
								
										</div>

									<?php endforeach; ?>
								</div>
							</div>
					</div>	
				</div>
			</div>
		</section>

		<section class="product_carousel">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h3>Campaign of the week!</h3>
							<div class="wrapper-with-margin">
								<div id="owl-demo-one" class="owl-carousel">
								    	<?php $i=1; foreach ($al as $item): ?>
										
							<a href="<?php echo base_url(); ?>main/pro_details/<?php echo $item['id'] ?>">
										<div class="single-carousel">
											<img src="<?php echo base_url(); ?>file_upload/<?php echo $item['image'] ?>"></a>
											<form>
												<h2><?php echo $item['product_name'] ?></h2>



<i type="button" data-role="<?php echo $item['price'] ?>" id="t_input" data-id="<?php echo $item['id'] ?>">Add Card</i>
												<h4>TK.<?php echo $item['price'] ?></h4>
									   
											</form>
										
										
								
								
										</div>

									<?php endforeach; ?>
								</div>
							</div>
					</div>	
				</div>
			</div>
		</section>
	
		<section class="product_carousel">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h3>Campaign of the week!</h3>
							<div class="wrapper-with-margin">
								<div id="owl-demo-two" class="owl-carousel">
								   	<?php $i=1; foreach ($new as $item): ?>
										
												<a href="<?php echo base_url(); ?>main/pro_details/<?php echo $item['id'] ?>">
										<div class="single-carousel">
											<img src="<?php echo base_url(); ?>file_upload/<?php echo $item['image'] ?>"></a>
											<form>
												<h2><?php echo $item['product_name'] ?></h2>



<i type="button" data-role="<?php echo $item['price'] ?>" id="t_input" data-id="<?php echo $item['id'] ?>">Add Card</i>
												<h4>TK.<?php echo $item['price'] ?></h4>
									   
											</form>
										
										
								
								
										</div>

									<?php endforeach; ?>
								</div>
								</div>
							</div>
					</div>	
				</div>
			</div>
		</section>
		
		
		
		
		<section>
		
			<div id="extruderRight" class="{title:'Item ', url:'<?php echo base_url(); ?>main/itemData'}"></div>
		
		</section>