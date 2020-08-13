<div class="alumni-registration-area wrapper-area">
    <div class="content container">
        <div class="row">
            <!-- <div class="col-xs-12">
                <h4 class="page-title">Notice</h4>
            </div> -->

            <?php
           /* $num = "01619903891";
            if($this->common->mobileNumberCheck($num) != true){
            	echo "Num = false";
            }elseif($this->common->mobileNumberCheck($num) == true){

        	echo "ok";
            }*/

            $success = 0;
             if($success == 1){?>
            <script>
            	alert("New Alumni Successfully added.");
            </script>
        	<?php }?>
        	
            <div class="alumni-registration card-box">
            	<div class="wrapper-form">
	                <h2 class="text-center">New Alumni Registration</h2>
	                <br>
					<?php echo validation_errors(); 
						//$p = ddd;
						//$p = 'bb123';
        				//echo 'hash of '.$p.': '. md5(sha1(md5($p)));
					?>
					<p class="text-danger"><?php echo $this->session->flashdata('msg');?></p>

					<?php if(!empty($this->session->flashdata('success'))){?>
					<p class="text-success"><?php echo $this->session->flashdata('success');?></p>
					<?php }?>

					<form action="<?php echo base_url();?>alumni/insert_alumni" enctype="multipart/form-data" method="post">
					 	<fieldset class="border px-4 py-2">
  							<legend  class="w-auto">Basic:</legend>
							<div class="row">
								<div class="col-md-6 col-sm-6 col-xs-12">
				                    <div class="form-group">
				                        <label class="control-label">Name<sup>*</sup></label>
			                            <input type="text" name="name" class="form-control" placeholder="Student Name" required autofocus>
				                    </div>
								</div>
								<div class="col-md-6 col-sm-6 col-xs-12">
								    <div class="form-group">
				                        <label class="control-label">Batch<sup>*</sup></label>
			                        	<select name="batch" class="form-control" required>
		                                    <option value="0">-- Select Batch --</option>
		                                    <?php 
		                                    foreach ($all_batch as $key => $b) {
		                                    ?>
		                                    <option value="<?php echo $b['id'];?>"><?php echo $b['name'];?></option>}
		                                    <?php
		                                    }
		                                    ?>
		                                </select>
				                    </div>
								</div>
								<div class="col-md-6 col-sm-6 col-xs-12">
				                    <div class="form-group">
				                        <label class="control-label">Roll<sup>*</sup></label>
			                            <input type="text" name="roll" class="form-control" placeholder="Roll Number. Example: N201911001" required>
				                    </div>
								</div>
								<div class="col-md-6 col-sm-6 col-xs-12">
								    <div class="form-group">
				                        <label class="control-label">Department<sup>*</sup></label>
			                        	<select name="dept" class="form-control" required>
		                                    <option value="0">-- Select Department --</option>
		                                    <?php 
		                                    foreach ($all_dept as $key => $d) {
		                                    ?>
		                                    <option value="<?php echo $d['id'];?>"><?php echo $d['name'];?></option>}
		                                    <?php
		                                    }
		                                    ?>
		                                </select>
				                    </div>
								</div>
								<div class="col-md-6 col-sm-6 col-xs-12">
				                    <div class="form-group"> 
	                                    <label class="d-block">Gender<sup>*</sup></label>
	                                    <label class="radio-inline" style="margin-top: 10px;margin-bottom: 10px;">
	                                        <input type="radio" name="gender" value="1" checked="checked"> Male
	                                    </label>
	                                    <label class="radio-inline" style="margin-top: 10px;margin-bottom: 10px;">
	                                        <input type="radio" name="gender" value="2"> Female
	                                    </label>
				                    </div>
								</div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label">Blood Group</label>
                                        <select class="form-control" name="blood_group">
                                            <option value="0">Select Blood Group</option>
                                            <option value="A+">A+</option>
                                            <option value="A-">A-</option>
                                            <option value="AB+">AB+</option>
                                            <option value="AB-">AB-</option>
                                            <option value="B+">B+</option>
                                            <option value="B-">B-</option>
                                            <option value="O+">O+</option>
                                            <option value="O-">O-</option>
                                        </select>
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
				                        <label class="control-label">NID</label>
			                            <input type="text" name="nid" class="form-control" placeholder="NID">
				                    </div>
								</div>
								<div class="col-md-6 col-sm-6 col-xs-12">
				                    <div class="form-group">
				                        <label class="control-label">Image</label>
			                            <!--<input name="image" onchange="readURL(this)" type="file">-->
			                            <input type="file" name="alumni_img" id="alumni_img" class="form-control">
			                           <!-- <div class="" style="position: absolute; right:0;top:0;height: 40px;">
                                            <img src="" id="profile-img-tag" style="height: 100%;"/>
			                            </div>-->
				                    </div>
								</div>
								<div class="col-md-6 col-sm-6 col-xs-12">
				                    <div class="form-group">
				                        <label class="control-label">Father's Name<sup>*</sup></label>
			                            <input type="text" name="father_name" class="form-control" placeholder="Father Name" required>
				                    </div>
								</div>
								<div class="col-md-6 col-sm-6 col-xs-12">
				                    <div class="form-group">
				                        <label class="control-label">Mother's Name<sup>*</sup></label>
			                            <input type="text" name="mother_name" class="form-control" placeholder="Mother's Name" required>
				                    </div>
								</div>
								<div class="col-md-6 col-sm-6 col-xs-12">
				                    <div class="form-group">
				                        <label class="control-label">Present Address<sup>*</sup></label>
			                            <input type="text" name="present_addr" class="form-control" placeholder="Present Address" required>
				                    </div>
								</div>
								<div class="col-md-6 col-sm-6 col-xs-12">
				                    <div class="form-group">
				                        <label class="control-label">Permanent Address<sup>*</sup></label>
			                            <input type="text" name="permanent_addr" class="form-control" placeholder="Permanent Address" required>
				                    </div>
								</div>
								<div class="col-md-6 col-sm-6 col-xs-12">
				                    <div class="form-group">
				                        <label class="control-label">Admission Date</label>
			                            <input type="text" name="starting_date" class="datepicker form-control" placeholder="Starting Date" autocomplete="off">
				                    </div>
								</div>
								<div class="col-md-6 col-sm-6 col-xs-12">
				                    <div class="form-group">
				                        <label class="control-label">Passing Date</label>
			                            <input type="text" name="ending_date" class="datepicker form-control" placeholder="Ending Date" autocomplete="off">
				                    </div>
								</div>
								<div class="col-md-6 col-sm-6 col-xs-12">
								    <div class="form-group">
				                        <label class="control-label">Studentship</label>
			                        	<select name="is_student" class="form-control">
		                                    <option value="2">Alumni</option>
		                                </select>
				                    </div>
								</div>
								<div class="col-md-6 col-sm-6 col-xs-12">
								    <div class="form-group">
				                        <label class="control-label">Membership Type<sup>*</sup></label>
			                        	<select name="membership" class="form-control" required>
		                                    <option value="0">-- Select Membership --</option>
		                                    <?php 
		                                    foreach ($membership_list as $key => $m) {
		                                    ?>
		                                    <option value="<?php echo $m['id'];?>"><?php echo $m['name'];?></option>}
		                                    <?php
		                                    }
		                                    ?>
		                                </select>
				                    </div>
								</div>
								<div class="col-md-6 col-sm-6 col-xs-12">
								    <div class="form-group">
				                        <label class="control-label">Password<sup>*</sup></label>
			                            <input type="password" name="pass" class="form-control" placeholder="Password" required>
				                    </div>
								</div>
								<div class="col-md-6 col-sm-6 col-xs-12">
								    <div class="form-group">
				                        <label class="control-label">Confirm Password<sup>*</sup></label>
			                            <input type="password" name="con_pass" class="form-control" placeholder="Confirm Password" required>
				                    </div>
								</div>
							</div>
					 	</fieldset>
                        <br>
                        <br>
                        <fieldset class="border px-4 p-2">
                            <legend class="w-auto">Educational Information</legend>
                            <div class="form-group">
                                <a name="add_education" id="add_education" class="btn btn-info text-white">Add Education</a>
                            </div>
                            <div id="education_area">
                            </div>
                        </fieldset>
					 	<br>
					 	<br>
                        <fieldset class="border px-4 p-2">
                            <legend class="w-auto">Job Info</legend>
                            <div class="form-group">
                                <a name="add_job_info" id="add_job_info" class="btn btn-info text-white">Add Job Info</a>
                            </div>
                           <div id="job_info_area">
                                <?php
                                //echo '<pre>';
                                //print_r($educational_info);
                                if(!empty($job_info)){
                                    foreach($job_info as $j){
                                ?>
                               <div class="row" id="job_info_row_<?php echo $j['id']?>">
                                   <div class="col-md-3 col-sm-3 col-xs-6">
                                        <div class="form-group">
                                            <label class="control-label">Company Name</label>
                                            <input type="text" name="job_org_name[]" value="<?php echo $j['organization_name'];?>" id="job_org_name<?php echo $j['id']?>" class="job_info_input form-control" placeholder="Company Name">
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-sm-2 col-xs-6">
                                        <div class="form-group">
                                            <label class="control-label">Designation</label>
                                            <input type="text" name="job_designation[]" value="<?php echo $j['designation'];?>"  id="job_designation<?php echo $j['id']?>" class="job_info_input form-control" placeholder="Designation">
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-sm-2 col-xs-6">
                                        <div class="form-group">
                                            <label class="control-label">Address</label>
                                            <input type="text" name="job_address[]" value="<?php echo $j['address'];?>" id="job_address<?php echo $j['id']?>" class="job_info_input form-control" placeholder="Address">
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-sm-2 col-xs-4">
                                        <div class="form-group">
                                            <label class="control-label">Job Starting Date</label>
                                            <input type="text" name="job_starting_date[]" id="job_starting_date<?php echo $j['id']?>" value="<?php echo $j['starting_date'];?>" class="datepicker job_info_input form-control" placeholder="Starting Date">
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-sm-2 col-xs-4">
                                        <div class="form-group">
                                            <label class="control-label">Job Ending Date</label>
                                            <input type="text" name="job_ending_date[]" id="job_ending_date<?php echo $j['id']?>" value="<?php echo $j['ending_date'];?>" class="datepicker job_info_input form-control" placeholder="Ending Date">
                                        </div>
                                    </div>
                                </div>
                                <?php
                                   }
                                }
                                ?>
                           </div>
                        </fieldset>
					 	<br>
					 	<br>
                        <fieldset class="border px-4 p-2">
                            <legend class="w-auto">Extra Curricular Activities</legend>
		                    <div class="form-group">
                                <a name="add_extra_activities" id="add_extra_activities" class="btn btn-info text-white">Add Extra Curricular</a>
                            </div>
                            <div id="extra_activities_area">
                            </div>
                        </fieldset>
                        <br>
                        <br>
				 		<fieldset class="border px-4 p-2">
						   	<legend class="w-auto">Contact</legend>
					 		<div class="row">
								<div class="col-md-6 col-sm-6 col-xs-12">
				                    <div class="form-group">
				                        <label class="control-label">Phone<sup>*</sup></label>
			                            <input type="text" name="phone" class="form-control" placeholder="Phone" required>
				                    </div>
								</div>
								<div class="col-md-6 col-sm-6 col-xs-12">
				                    <div class="form-group">
				                        <label class="control-label">Email<sup>*</sup></label>
			                            <input type="email" name="email" class="form-control" placeholder="Email" required>
				                    </div>
								</div>
								<!-- security token -->
								<!-- end security token -->
								<div class="offset-lg-4 col-lg-4 offset-md-4 col-md-4 offset-sm-4 col-sm-4 col-xs-12">
				                    <div class="form-group">
				                        <label class="control-label">&nbsp;</label>
				                    	<button type="submit" name="submit" class="btn btn-primary form-control">Submit</button>
				                    </div>
								</div>
							</div>
						</fieldset>
					</form>
            	</div>
            </div>
        </div>
    </div>
</div>

<!--<script src="<?php /*echo base_url(); */?>js/custom/link.js"></script>-->
<script>
    var i = 0;
    var j = 0;
    var k = 0;

    $('#add_education').click(function () {
        i++;
        var result = 0;

        $('#education_area').append('<div class="row" id="removeDiv' + i + '"><div class="col-md-2 col-sm-2 col-xs-6">\n' +
            '                                    <div class="form-group">\n' +
            '                                        <label class="control-label">Degree</label>\n' +
            '                                        <input type="text" name="edu_degree[]" id="edu_degree' + i + '" class="form-control" placeholder="Degree">\n' +
            '                                    </div>\n' +
            '                                </div>\n' +
            '                                <div class="col-md-3 col-sm-3 col-xs-6">\n' +
            '                                    <div class="form-group">\n' +
            '                                        <label class="control-label">Institution</label>\n' +
            '                                        <input type="text" name="edu_institution[]"  id="edu_institution' + i + '" class="form-control" placeholder="Institution">\n' +
            '                                    </div>\n' +
            '                                </div>\n' +
            '                                <div class="col-md-2 col-sm-2 col-xs-6">\n' +
            '                                    <div class="form-group">\n' +
            '                                        <label class="control-label">Passing Year</label>\n' +
            '                                        <input type="text" name="edu_passing_year[]"  id="edu_passing_year' + i + '" class="form-control" placeholder="Passing Year">\n' +
            '                                    </div>\n' +
            '                                </div>\n' +
            '                                <div class="col-md-2 col-sm-2 col-xs-6">\n' +
            '                                    <div class="form-group">\n' +
            '                                        <label class="control-label">Session</label>\n' +
            '                                        <input type="text" name="edu_session[]" id="edu_session' + i + '" class="form-control" placeholder="Session">\n' +
            '                                    </div>\n' +
            '                                </div>\n' +
            '                                <div class="col-md-2 col-sm-2 col-xs-4">\n' +
            '                                    <div class="form-group">\n' +
            '                                        <label class="control-label">CGPA</label>\n' +
            '                                        <input type="text" name="edu_cgpa[]" id="edu_cgpa' + i + '" class="form-control" placeholder="CGPA">\n' +
            '                                    </div>\n' +
            '                                </div><div class="col-md-1 col-sm-1 col-xs-2"><div class="form-group"><label class="control-label">Remove</label><button type="button" name="add" id="' + i + '" class="btn btn-danger btn_remove">X</button></div></div></div>')
    });

    $(document).on('click', '.btn_remove', function () {
        var button_id = $(this).attr("id");

        $('#removeDiv' + button_id + '').remove();
    });


    $('#add_extra_activities').click(function () {
        j++;
        var result = 0;

        $('#extra_activities_area').append('<div class="row" id="removeDiv2' + j + '"><div class="col-md-3 col-sm-3 col-xs-6">\n' +
            '                                    <div class="form-group">\n' +
            '                                        <label class="control-label">Organization</label>\n' +
            '                                        <input type="text" name="extra_organization[]" id="extra_organization" class="form-control" placeholder="Organization">\n' +
            '                                    </div>\n' +
            '                                </div>\n' +
            '                                <div class="col-md-3 col-sm-3 col-xs-6">\n' +
            '                                    <div class="form-group">\n' +
            '                                        <label class="control-label">Member Id</label>\n' +
            '                                        <input type="text" name="extra_member_id[]"  id="extra_member_id" class="form-control" placeholder="Member Id">\n' +
            '                                    </div>\n' +
            '                                </div>\n' +
            '                                <div class="col-md-5 col-sm-5 col-xs-6">\n' +
            '                                    <div class="form-group">\n' +
            '                                        <label class="control-label">Description</label>\n' +
            '                                        <input type="text" name="extra_description[]" id="extra_description" class="form-control" placeholder="Description">\n' +
            '                                    </div>\n' +
            '                                </div>\n' +
            '                                <div class="col-md-1 col-sm-1 col-xs-2"><div class="form-group"><label class="control-label">Remove</label><button type="button" name="add" id="' + j + '" class="btn btn-danger btn_remove2">X</button></div></div></div>')
    });

    $(document).on('click', '.btn_remove2', function () {
        var button_id = $(this).attr("id");

        $('#removeDiv2' + button_id + '').remove();
    });
    
                
    $('#add_job_info').click(function () {
        k++;
        var result = 0;

        $('#job_info_area').append('<div class="row" id="removeDiv3' + k + '"><div class="col-md-3 col-sm-3 col-xs-6">\n' +
            '                                    <div class="form-group">\n' +
            '                                        <label class="control-label">Organization</label>\n' +
            '                                        <input type="text" name="job_org_name[]" id="job_org_name' + k + '" class="form-control" placeholder="Organization">\n' +
            '                                    </div>\n' +
            '                                </div>\n' +
            '                                <div class="col-md-2 col-sm-2 col-xs-6">\n' +
            '                                    <div class="form-group">\n' +
            '                                        <label class="control-label">Designation</label>\n' +
            '                                        <input type="text" name="job_designation[]"  id="job_designation' + k + '" class="form-control" placeholder="Designation">\n' +
            '                                    </div>\n' +
            '                                </div>\n' +
            '                                <div class="col-md-2 col-sm-2 col-xs-6">\n' +
            '                                    <div class="form-group">\n' +
            '                                        <label class="control-label">Address</label>\n' +
            '                                        <input type="text" name="job_address[]"  id="job_address' + k + '" class="form-control" placeholder="Address">\n' +
            '                                    </div>\n' +
            '                                </div>\n' +
            '                                <div class="col-md-2 col-sm-2 col-xs-6">\n' +
            '                                    <div class="form-group">\n' +
            '                                        <label class="control-label">Job Starting Date</label>\n' +
            '                                        <input type="text" name="job_starting_date[]"  id="job_starting_date' + k + '" class="datepicker form-control" placeholder="Starting Date">\n' +
            '                                    </div>\n' +
            '                                </div>\n' +
            '                                <div class="col-md-2 col-sm-2 col-xs-6">\n' +
            '                                    <div class="form-group">\n' +
            '                                        <label class="control-label">Job Ending Date</label>\n' +
            '                                        <input type="text" name="job_ending_date[]"  id="job_ending_date' + k + '" class="datepicker form-control" placeholder="Ending Date">\n' +
            '                                    </div>\n' +
            '                                </div>\n' +
            '                                <div class="col-md-1 col-sm-1 col-xs-2"><div class="form-group"><label class="control-label">Remove</label><button type="button" name="add" id="' + k + '" class="btn btn-danger btn_remove3">X</button></div></div></div>')
    
            $('.datepicker').removeClass("hasDatepicker").datepicker();
    });

    $(document).on('click', '.btn_remove3', function () {
        var button_id = $(this).attr("id");

        $('#removeDiv3' + button_id + '').remove();
    });
</script>