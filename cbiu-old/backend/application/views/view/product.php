		<section class="product_area">
			<div class="container">
				<div class="row">
					
					<?php include ('menu.php'); ?>
					
					<div class="col-md-5">
						<div class="gallery">
				            <div class="images">
							
							
							

							 <div class="image active">
			<div class="content" style="background-image: url(<?php echo base_url(); ?>file_upload/<?php echo $idd."_thumb.jpg"?>)"></div>

				              </div>
							
							<?php $i=1; foreach ($all as $item): ?>
																		
										 <div class="image">
				                <div class="content" style="background-image: url(<?php echo base_url(); ?>multi_image/<?php echo $item['big_image']?>)"></div>
				              </div>
									
							
							<?php endforeach; ?>
				     
				   </div>
				            <div class="thumbs">
							
							
   <div class="thumb active" style="background-image: url(<?php echo base_url(); ?>file_upload/<?php echo $idd."_thumb.jpg"?>)"></div>
							
							
							<?php $j=1; foreach ($all as $ite): ?>
							
								
							
	
				                <div class="thumb" style="background-image: url(<?php echo base_url(); ?>multi_image/<?php echo $ite['th_image']?>)"></div>
									
								
							
							
							<?php endforeach; ?>
				              
				            </div>
				        </div>
					</div>

					<div class="col-md-4">
						<div class="product">
							<form class="form-horizontal">
							<fieldset>
							<div class="form-group">
							  <div class="col-md-12"><h2><?php echo $name;?></h2></div>
							</div> 

							<form class="form-horizontal">
							<fieldset>
							<div class="form-group">
							  <div class="col-md-12"></div>
							</div> 	
								
							<div class="form-group">
							  <label class="col-md-4 control-label" for="selectquantity">Item Condition:</label>
							  <div class="col-md-8"><p><?php echo $item_con;?></p></div>
							</div>  

							<!-- Select Basic -->
							<div class="form-group">
							  <label class="col-md-4 control-label" for="selectquantity">Quantity:</label>
							  <div class="col-md-8">
							     <input name="someid" id="selectquantity" type="text" onkeypress="return isNumberKey(event)"/>

							  </div>
							</div>

							<!-- Select Basic -->
							<div class="form-group">
							  <label class="col-md-4 control-label" for="selectsize">Size: </label>
							  <div class="col-md-8">
							    <select id="selectsize" id="size" class="form-control">
							     <?php $s=0; $j=1; foreach ($al as $item): ?>

								<?php 
								
									
								
								
									if($item['size'] != '' && $s != $item['size'])
									{
										$s=$item['size'];
										?>

							<option><?php echo $item['size'] ?></option>
										<?php

									}

								?>
														<?php endforeach; ?>

							    </select>
							  </div>
							</div>

							<!-- Select Basic -->
							<div class="form-group">
							  <label class="col-md-4 control-label" for="selectcolor">Color: </label>
							  <div class="col-md-8">
							    <select id="selectcolor" class="form-control">
							      <?php $j=1; foreach ($al as $item): ?>

								<?php 
									if($item['color'] == '')
									{

									}
									else
									{
										?>

							<option><?php echo $item['color'] ?></option>
										<?php

									}

								?>
														<?php endforeach; ?>
							    </select>
							  </div>
							</div>

							<div class="form-group">
							  <label class="col-md-4 control-label" for="selectquantity">Price:</label>
							  <div class="col-md-8"><p>TK. <?php echo $price; ?></p></div>
							</div> 

							<!-- Button -->
	<div class="form-group">
		<label class="col-md-4 control-label" for="singlecart"></label>
			<div class="col-md-8 single-carousel">
			
			


<i class="btn btn-primary" data-role="<?php echo $price ;?>" id="t_input" data-id="<?php echo $id;?>">Add Card</i>




			
			
			
<!--<button id="singlecart" type="button"  name="singlecart" class="btn btn-primary" onclick='process("<?php echo $id ;?>","<?php echo $price;?>","0")'>Add Cart</button>-->
								
								
								
								
								
								
								
								
							  </div>
	</div>

							</fieldset>


							
							
							</div>	
					</div>
				</div>
				
				<div class="row">
					<div class="col-md-3"></div>
					<div class="col-md-9 tab_area">
						    <!--Horizontal Tab-->
						    <div id="horizontalTab">
						        <ul>
						            <li><a href="#tab-1">Details</a></li>
						            <li><a href="#tab-2">Customer Questions</a></li>
						            <li><a href="#tab-3">Shipping and payment</a></li>
						            <li><a href="#tab-4">Returns</a></li>
						            <li><a href="#tab-5">Ratings & Reviews</a></li>
						        </ul>

						        <div id="tab-1">
						            <p>
						            
						            <?php
						            
						            
						            	echo $this->news_model->getcategorybreak_name('product','id',$idd,'details');
						            
						            
						             ?>
						            
						            
						            </p>
						        </div>
						        <div id="tab-2">
						            <p>Quisque sodales sodales lacus pharetra bibendum. Etiam commodo non velit ac rhoncus. Mauris euismod purus sem, ac adipiscing quam laoreet et. Praesent vulputate ornare sem vel scelerisque. Ut dictum augue non erat lacinia, sed lobortis elit gravida. Proin ante massa, ornare accumsan ultricies et, posuere sit amet magna. Praesent dignissim, enim sed malesuada luctus, arcu sapien sodales sapien, ut placerat eros nunc vel est. Donec tristique mi turpis, et sodales nibh gravida eu. Etiam odio risus, porttitor non lacus id, rhoncus tempus tortor. Curabitur tincidunt molestie turpis, ut luctus nibh sollicitudin vel. Sed vel luctus nisi, at mattis metus. Aenean ultricies dolor est, a congue ante dapibus varius. Nulla at auctor nunc. Curabitur accumsan feugiat felis ut pretium. Praesent semper semper nisi, eu cursus augue.</p>
						        </div>
						        <div id="tab-3">
						            <p>Mauris facilisis elit ut sem eleifend accumsan molestie sit amet dolor. Pellentesque dapibus arcu eu lorem laoreet, vitae cursus metus mattis. Nullam eget porta enim, eu rutrum magna. Duis quis tincidunt sem, sit amet faucibus magna. Integer commodo, turpis consequat fermentum egestas, leo odio posuere dui, elementum placerat eros erat id augue. Nullam at eros eget urna vestibulum malesuada vitae eu mauris. Aliquam interdum rhoncus velit, quis scelerisque leo viverra non. Suspendisse id feugiat dui. Nulla in aliquet leo. Proin vel magna sed est gravida rhoncus. Mauris lobortis condimentum nibh, vitae bibendum tortor vehicula ac. Curabitur posuere arcu eros.</p>
						        </div>
						        <div id="tab-4">
						            <p>Donec egestas facilisis sapien sit amet euismod. Donec mollis lectus neque, in consectetur magna sodales et. Nam rutrum libero vitae magna sollicitudin aliquet. In tristique ultrices euismod. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Suspendisse pretium congue sodales. Curabitur egestas, metus sed ultrices suscipit, metus nibh vehicula ligula, vel volutpat sapien nibh sed quam. Etiam elementum nisi eu risus congue, ut eleifend lectus ultricies. Vivamus in ligula fermentum, bibendum sapien eget, pretium est. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Donec ut ante non risus rutrum faucibus.</p>
						        </div>
						        <div id="tab-5">
						            <p>Proin dignissim faucibus odio sollicitudin sagittis. Phasellus aliquet, erat vitae mollis consectetur, enim lectus ornare libero, et porta mi dui eu tellus. Morbi lobortis, elit at euismod porta, magna lacus mattis massa, a lacinia ligula risus et lectus. Sed et aliquam ligula. Nunc venenatis orci magna, quis facilisis sem porta non. Nunc sodales arcu in consectetur malesuada. Maecenas varius justo lacus, scelerisque viverra tellus luctus eu. Nam imperdiet ultricies suscipit. Ut urna mauris, eleifend quis lacinia non, mollis id libero. Praesent pharetra viverra ipsum at posuere. Quisque commodo tortor nec hendrerit faucibus. Fusce convallis urna et vehicula tincidunt. Duis sed vehicula justo, eu placerat nisi. Donec facilisis augue non turpis semper, eget condimentum mauris malesuada. Nunc in dignissim mi, sed laoreet felis.</p>
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
							<h3>Related Product</h3>
							<div class="wrapper-with-margin">
								<div id="owl-demo" class="owl-carousel">
								
										<?php $i=1; foreach ($rela as $item): ?>
										
												<a href="<?php echo base_url(); ?>main/pro_details/<?php echo $item['id'] ?>">
										<div class="single-carousel">
											<img src="<?php echo base_url(); ?>file_upload/<?php echo $item['image'] ?>"></a>
											
										
								
								
										</div>

									<?php endforeach; ?>
								</div>
							</div>
					</div>	
				</div>
			</div>
		</section>
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		<section>
		
			<div id="extruderRight" class="{title:'Item ', url:'<?php echo base_url(); ?>main/itemData'}"></div>
		
		</section>