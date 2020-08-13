<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="row">
            <!-- <div class="col-xs-12">
                <h4 class="page-title">Notice</h4>
            </div> -->
            <?php if($success == 1){?>
            <script>
            	alert("New Staff Successfully added.");
            </script>
        	<?php }?>
        	
            <div class="card-box">
            	<div class="notice-form">
	                <h2 class="text-center">Add New Staff</h2>
	                <br>
					<?php echo validation_errors(); 
						//$p = ddd;
						//$p = 'bb123';
        				//echo 'hash of '.$p.': '. md5(sha1(md5($p)));
					?>

					<form action="<?php echo base_url();?>admin/insert_staff" enctype="multipart/form-data" method="post">

                        <input type="hidden" name="staff_id" value="<?php if(!empty($info)){echo $info->id;}?>">
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<?=$this->session->flashdata('success')?>
								<?=$this->session->flashdata('error')?>
							</div>
							<div class="col-md-6 col-sm-6 col-xs-12">
			                    <div class="form-group">
			                        <label class="control-label">Name</label>
		                            <input type="text" name="name" value="<?php if(!empty($info)){echo $info->name;}?>" class="form-control" placeholder="Staff Name">
			                    </div>
							</div>
							<div class="col-md-6 col-sm-6 col-xs-12">
			                    <div class="form-group">
			                        <label class="control-label">Email</label>
		                            <input type="email" name="email" value="<?php if(!empty($info)){echo $info->email;}?>" class="form-control" placeholder="Email">
			                    </div>
							</div>
							<div class="col-md-6 col-sm-6 col-xs-12">
			                    <div class="form-group">
			                        <label class="control-label">Phone</label>
		                            <input type="text" name="phone" value="<?php if(!empty($info)){echo $info->phone;}?>" class="form-control" placeholder="Phone">
			                    </div>
							</div>
							<div class="col-md-6 col-sm-6 col-xs-12">
			                    <div class="form-group">
			                        <label class="control-label">Father's Name</label>
		                            <input type="text" name="father_name" value="<?php if(!empty($info)){echo $info->father_name;}?>" class="form-control" placeholder="Father Name">
			                    </div>
							</div>
							<div class="col-md-6 col-sm-6 col-xs-12">
			                    <div class="form-group">
			                        <label class="control-label">Mother's Name</label>
		                            <input type="text" name="mother_name" value="<?php if(!empty($info)){echo $info->mother_name;}?>" class="form-control" placeholder="Mother's Name">
			                    </div>
							</div>
							<div class="col-md-6 col-sm-6 col-xs-12">
			                    <div class="form-group">
			                        <label class="control-label">NID</label>
		                            <input type="text" name="nid" value="<?php if(!empty($info)){echo $info->nid;}?>" class="form-control" placeholder="NID">
			                    </div>
							</div>
							<div class="col-md-6 col-sm-6 col-xs-12">
			                    <div class="form-group">
			                        <label class="control-label">Date of Birth</label>
		                            <input type="text" name="dob" value="<?php if(!empty($info)){echo $info->dob;}?>" class="datepicker form-control" placeholder="dob" autocomplete="off">
			                    </div>
							</div>
							<div class="col-md-6 col-sm-6 col-xs-12">
			                    <div class="form-group">
			                        <label class="control-label">Gender</label>
		                        	<select name="gender" class="form-control">
	                                    <option value="1" <?php if(!empty($info)){if($info->gender==1) echo 'selected';}?> >Male</option>
	                                    <option value="2" <?php if(!empty($info)){if($info->gender==2) echo 'selected';}?> >Female</option>
	                                </select>
			                    </div>
							</div>
							<div class="col-md-6 col-sm-6 col-xs-12">
			                    <div class="form-group">
			                        <label class="control-label">Present Address</label>
		                            <input type="text" name="present_addr"  value="<?php if(!empty($info)){echo $info->present_address;}?>"class="form-control" placeholder="Present Address">
			                    </div>
							</div>
							<div class="col-md-6 col-sm-6 col-xs-12">
			                    <div class="form-group">
			                        <label class="control-label">Permanent Address</label>
		                            <input type="text" name="permanent_addr" value="<?php if(!empty($info)){echo $info->permanent_address;}?>" class="form-control" placeholder="Permanent Address">
			                    </div>
							</div>
							<!-- <div class="col-md-6 col-sm-6 col-xs-12">
			                    <div class="form-group">
			                        <label class="control-label">Image</label>
		                            <input name="image" class="form-control" type="file">
			                    </div>
							</div> -->
							<div class="col-md-6 col-sm-6 col-xs-12">
							    <div class="form-group">
			                        <label class="control-label">Department</label>
		                        	<select name="dept" class="form-control">
	                                    <option value="0">-- Select Department --</option>
	                                    <?php 
	                                    foreach ($all_dept as $key => $d) {
	                                    ?>
	                                    <option value="<?php echo $d['id'];?>" <?php if(!empty($info)){if($info->dept==$d['id']) echo 'selected';}?> >
                                            <?php echo $d['name'];?>
                                        </option>}
	                                    <?php
	                                    }
	                                    ?>
	                                </select>
			                    </div>
							</div>
							<div class="col-md-6 col-sm-6 col-xs-12">
							    <div class="form-group">
			                        <label class="control-label">Designation</label>
		                        	<select name="designation" class="form-control">
	                                    <option value="0">-- Select Designation --</option>
	                                    <?php 
	                                    foreach ($designation as $key => $d) {
	                                    ?>
	                                    <option value="<?php echo $d['id'];?>" <?php if(!empty($info)){if($info->designation==$d['id']) echo 'selected';}?> >
                                            <?php echo $d['name'];?>
                                        </option>}
	                                    <?php
	                                    }
	                                    ?>
	                                </select>
			                    </div>
							</div>
							<div class="col-md-6 col-sm-6 col-xs-12">
							    <div class="form-group">
			                        <label class="control-label">Joining Date</label>
		                            <input type="text" name="joining_date" value="<?php if(!empty($info)){echo $info->joining_date;}?>" class="datepicker form-control" placeholder="Joining Date" autocomplete="off">
			                    </div>
							</div>
							<div class="col-md-6 col-sm-6 col-xs-12">
							    <div class="form-group">
			                        <label class="control-label">Password</label>
		                            <input type="password" name="pass" value="<?php if(!empty($user_info)){echo $user_info->pass_view;}?>" class="form-control" placeholder="Password">
			                    </div>
							</div>
							<div class="col-md-6 col-sm-6 col-xs-12">
							    <div class="form-group">
			                        <label class="control-label">Confirm Password</label>
		                            <input type="password" name="con_pass" value="<?php if(!empty($user_info)){echo $user_info->pass_view;}?>" class="form-control" placeholder="Confirm Password">
			                    </div>
							</div>

                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Image</label>
                                        <input name="staff_image" id="staff_image" class="form-control" type="file">
                                    </div>
                                </div>
                                <div class="col-md-6" id="image-holder">
                                    <img src="<?=base_url()?>assets/images/staffs/<?php if(!empty($info)){echo $info->image;}?>" alt="" width="100" height="100">
                                </div>
                            </div>
							<div class="col-md-6 col-sm-6 col-xs-12">
			                    <div class="form-group">
			                        <label class="control-label">&nbsp;</label>
			                    	<button type="submit" name="submit" class="btn btn-primary form-control">Submit</button>
			                    </div>
							</div>
						</div>
					</form>
            	</div>
            </div>
        </div>
    </div>
</div>