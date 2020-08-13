


<div class="col-sm-9" style="background:white;">


		<div class="row pro">
		
		
				<div class="col-sm-12 pro_header">
				
				
						<p style="font-weight:bold;font-size:20px;color:white;"><?php echo $title; ?></p>
				
				</div>
				
		
		
		</div>
		
		
		<div class="row">
		
				<div class="col-sm-12 up_pro">
		


	<?php foreach($all as $val):  ?>
		
	<form action="<?php echo base_url(); ?>mains/profile_submit/<?php echo $val['id'] ?>" method="post">


			
		<div class="row">
					
					
					
					<div class="col-sm-6">
				
				
						<div class="form-group">
									<label class="col-sm-12 control-label">Name</label>
									<div class="col-sm-12">
										<input type="text" value="<?php echo $val['name'] ?>" name="name" class="form-control" required>
									</div>
								</div>
				
				
				
				</div>
				
				<div class="col-sm-6">
				
				<div class="form-group">
							<label class="col-sm-12 control-label">Last Name</label>
							  <div class="col-sm-12">
							  
<input type="text" value="<?php echo $val['last_name'] ?>" name="last_name" class="form-control">

									</div>
								</div>
				
				
				</div>
					
					
					
				</div>
				
				
				
	<div class="row">
					
					
					
					<div class="col-sm-6">
				
				
						<div class="form-group">
									<label class="col-sm-12 control-label">Company</label>
									<div class="col-sm-12">
										<input type="text" value="<?php echo $val['com_name'] ?>" name="com_name" class="form-control">
									</div>
								</div>
				
				
				
				</div>
				
				<div class="col-sm-6">
				
				<div class="form-group">
							<label class="col-sm-12 control-label">City</label>
							  <div class="col-sm-12">
							  
<input type="text" value="<?php echo $val['city'] ?>" name="city" class="form-control">

									</div>
								</div>
				
				
				</div>
					
					
					
				</div>			
				
				
				
				
				
				
				
		<div class="row">
					
					
					
					<div class="col-sm-6">
				
				
						<div class="form-group">
									<label class="col-sm-12 control-label">State/Province</label>
									<div class="col-sm-12">
										<input type="text" value="<?php echo $val['state'] ?>" name="state" class="form-control">
									</div>
								</div>
				
				
				
				</div>
				
				<div class="col-sm-6">
				
				<div class="form-group">
							<label class="col-sm-12 control-label">Zip/Postcode</label>
							  <div class="col-sm-12">
							  
<input type="text" value="<?php echo $val['zip'] ?>" name="zip" class="form-control">

									</div>
								</div>
				
				
				</div>
					
					
					
				</div>			
				
				
				
				
				
				
				
				
				
				
				
				<div class="row">
					
					
					
					<div class="col-sm-6">
				
				
						<div class="form-group">
									<label class="col-sm-12 control-label">Email</label>
									<div class="col-sm-12">
										<input type="email" value="<?php echo $val['email'] ?>" name="email" class="form-control" required>
									</div>
								</div>
				
				
				
				</div>
				
				<div class="col-sm-6">
				
				<div class="form-group">
									<label class="col-sm-12 control-label">Mobile</label>
									<div class="col-sm-12">
										<input type="text" value="<?php echo $val['mobile'] ?>" name="mobile" class="form-control" required>
									</div>
								</div>
				
				
				</div>
					
					
					
				</div>
				
				
				
				<div class="row">
					
					
					
					<div class="col-sm-6">
				
				
						<div class="form-group">
									<label class="col-sm-12 control-label">Country</label>
									<div class="col-sm-12">
										<input type="text" value="<?php echo $val['country'] ?>" name="country" class="form-control">
									</div>
								</div>
				
				
				
				</div>
				
				<div class="col-sm-6">
				
				<div class="form-group">
									<label class="col-sm-12 control-label">Passowrd</label>
									<div class="col-sm-12">
										<input type="password" name="pass" value="<?php echo $val['password'] ?>" class="form-control" required>
									</div>
								</div>
				
				
				</div>
					
					
					
				</div>
				
				
				
				
				<div class="row">
					
					
					
					<div class="col-sm-6">
				
				
						<div class="form-group">
									<label class="col-sm-12 control-label">Address 1</label>
									<div class="col-sm-12">
										<textarea class="form-control" rows="6" name="address" required="required"><?php echo $val['address'] ?></textarea>
									</div>
								</div>
				
				
				
				</div>
				
				<div class="col-sm-6">
				
				
						<div class="form-group">
									<label class="col-sm-12 control-label">Address 2</label>
									<div class="col-sm-12">
										<textarea class="form-control" rows="6" name="address2"><?php echo $val['address2'] ?></textarea>
									</div>
								</div>
				
				
				
				</div>
					
					
				</div>
				
				
				<div class="row">
					
					
					
					<div class="col-sm-6">
				
				
						<div class="form-group">
									
									<div class="col-sm-12 btn_update">
										
										
										
										<button type="submit" class="btn btn-primary" name="submit" value="Submit"><span class="glyphicon glyphicon-hand-right" aria-hidden="true"></span>        Submit</button>
										
										
									</div>
								</div>
				
				
				
				</div>
				
				
					
					
					
				</div>
				
			</form>	
			
			
			<?php endforeach ?>
				
	</div>
				
				
				
		
		
		</div>
		
		




</div>