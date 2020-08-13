		<section class="product_category_area">
			<div class="container">
				<div class="row">
					
					
					<?php include ('menu.php'); ?>
					
					<div class="col-md-9">
						<!-- Projects Row -->
				        <div class="row product_category">															          															   	<?php $i=1; foreach ($all as $item): ?>
										  <div class="col-md-3 portfolio-item">
												<a href="<?php echo base_url(); ?>main/pro_details/<?php echo $item['id'] ?>">
										<div class="single-carousel">
											<img src="<?php echo base_url(); ?>file_upload/<?php echo $item['image'] ?>"></a>
											<form>
												<h2><?php echo $item['product_name'] ?></h2>



<i type="button" data-role="<?php echo $item['price'] ?>" id="t_input" data-id="<?php echo $item['id'] ?>">Add Card</i>


												<h4>TK.<?php echo $item['price'] ?></h4>
									   
											</form>
										
										
								
								
										</div>
										
										
								
								  </div>
										
										
									<?php endforeach; ?>	

				        
				           
				        </div>

					</div>
				</div>
				
				<div class="row">
					<div class="col-md-3"></div>
					<div class="col-md-9"></div>
				</div>

			</div>		
		</section>
			<section>
		
			<div id="extruderRight" class="{title:'Item ', url:'<?php echo base_url(); ?>main/itemData'}"></div>
		
		</section>