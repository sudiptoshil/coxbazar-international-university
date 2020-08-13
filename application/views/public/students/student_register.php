<form action="<?php echo base_url();?>Student/studentRegister/save_student_register" method="POST">

<fieldset class="border px-4 py-2">
<legend  class="w-auto">Personal Information:</legend>
<div class="row">
	<div class="col-md-6 col-sm-6 col-xs-12">
		<div class="form-group">
			<label class="control-label">Applicant's Name(English)<sup>*</sup></label>
			<input type="text" name="name" class="form-control" placeholder="Student Name" required autofocus>
		</div>
	</div>
	
	
	<div class="col-md-6 col-sm-6 col-xs-12">
		<div class="form-group">
			<label class="control-label">Date of Birth<sup>*</sup></label>
			<input type="text" name="dob" class="datepicker form-control" placeholder="dob" autocomplete="off"  required>
		</div>
	</div>
	
	<div class="col-md-6 col-sm-6 col-xs-12">
		<div class="form-group">
			<label class="control-label">Applican's Mobile<sup>*</sup></label>
			<input type="text" name="phone" class="form-control" placeholder="Phone" required>
		</div>
	</div>
	
	<div class="col-md-6 col-sm-6 col-xs-12">
		<div class="form-group">
			<label class="control-label">Applicant's Email<sup>*</sup></label>
			<input type="email" name="email" class="form-control" placeholder="Email" required>
		</div>
	</div>

	<div class="col-md-6 col-sm-6 col-xs-12">
		<div class="form-group">
			<label class="control-label">Applicant's Password<sup>*</sup></label>
			<input type="password" name="password" class="form-control" placeholder="Password" required>
		</div>
	</div>

	<div class="col-md-6 col-sm-6 col-xs-12">
		<div class="form-group">
			<label class="control-label">Applicant's Confim Password<sup>*</sup></label>
			<input type="password" name="confim_password" class="form-control" placeholder="Confirm password" required>
		</div>
	</div>

	<div class="col-md-6 col-sm-6 col-xs-12">
		<div class="form-group">
			
			<button type="submit" align="center"  class="btn btn-primary">Register</button>
		</div>
	</div>
</div>
</fieldset>
</form>
