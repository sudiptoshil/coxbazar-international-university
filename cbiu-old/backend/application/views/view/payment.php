<section class="menu_slider_area ">
			<div class="container">
				<div class="row">
					

					
		<form method="post" action="<?php echo base_url();?>mains/payment/<?php echo $id?>">	
					  <?php echo validation_errors();?>



					<div class="col-sm-3"></div>
					
					
					<div class="col-sm-6  payment-page">
					
					
					
					
					
					
					
					<div class="form-group form-group1">
						<div class="col-md-9">
							<div class="radio">
								<label><input type="radio" name="pay" id="bKash" value="bKash">bKash</label>
								<label><input type="radio" name="pay" id="cash" value="cash" checked>Cash On Delivery</label>
							</div>
							<div class="radio">
								
							</div>
						</div>
					</div>
					
					<div class="form-group form-group1" style="display:none;" id="div">
						<label class="col-sm-12 control-label">Confirmation Code</label>
							<div class="col-sm-3">
								<input type="text" name="con" id="con_code" class="form-control">
							</div>
					</div>
					
					
						<div class="form-group">
									<label class="col-sm-12 control-label"></label>
									<div class="col-sm-6">
					<button type="submit" class="btn btn-info o-btn" name="submit" value="Submit">Submit</button>
									</div>
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					</div>
					
					
					
					<div class="col-sm-3"></div>






					

		</form>
					
				</div>	    
			</div>		
		</section>