<style>
    sup{
        color: red;
    }
</style>
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="row">
            <!-- <div class="col-xs-12">
                <h4 class="page-title">Notice</h4>
            </div> -->
            <?php if($success == 1){?>
            <script>
            	alert("New Teachers Successfully added.");
            </script>
        	<?php }?>
        	
            <div class="card-box">
            	<div class="notice-form">
	                <h2 class="text-center">
                        <?php if(!empty($info)):?>
                            Update
                        <?php else:?>
                            Add New
                        <?php endif;?>

                         Teacher Info</h2>
	                <br>
					<?php echo validation_errors(); 
						//$p = ddd;
						//$p = 'bb123';
        				//echo 'hash of '.$p.': '. md5(sha1(md5($p)));
					?>

					<form action="<?php echo base_url();?>admin/insert_teacher" enctype="multipart/form-data" method="post">
						<div class="row">
					        <fieldset class="border px-4 p-2">
                                <input type="hidden" name="teacher_id" value="<?php if(!empty($info)){echo $info->id;}?>">
    							<div class="col-md-12 col-sm-12 col-xs-12">
    								<?=$this->session->flashdata('msg')?>
    								<?=$this->session->flashdata('success')?>
    								<?=$this->session->flashdata('error')?>
    							</div>
    							<div class="col-md-6 col-sm-6 col-xs-12">
    			                    <div class="form-group">
    			                        <label class="control-label">Name<sup>*</sup></label>
    		                            <input type="text" name="name" value="<?php if(!empty($info)){echo $info->name;}?>" class="form-control" placeholder="Teacher Name">
    			                    </div>
    							</div>
    							<div class="col-md-6 col-sm-6 col-xs-12">
    			                    <div class="form-group">
    			                        <label class="control-label">Email<sup>*</sup></label>
    		                            <input type="email" name="email" value="<?php if(!empty($info)){echo $info->email;}?>" class="form-control" placeholder="Email">
    			                    </div>
    							</div>
    							<div class="col-md-6 col-sm-6 col-xs-12">
    			                    <div class="form-group">
    			                        <label class="control-label">Phone<sup>*</sup></label>
    		                            <input type="text" name="phone" value="<?php if(!empty($info)){echo $info->phone;}?>" class="form-control" placeholder="Phone">
    			                    </div>
    							</div>
    							<div class="col-md-6 col-sm-6 col-xs-12">
    			                    <div class="form-group">
    			                        <label class="control-label">Father's Name<sup>*</sup></label>
    		                            <input type="text" name="father_name" value="<?php if(!empty($info)){echo $info->father_name;}?>" class="form-control" placeholder="Father Name">
    			                    </div>
    							</div>
    							<div class="col-md-6 col-sm-6 col-xs-12">
    			                    <div class="form-group">
    			                        <label class="control-label">Mother's Name<sup>*</sup></label>
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
    			                        <label class="control-label">Date of Birth<sup>*</sup></label>
    		                            <input type="text" name="dob" value="<?php if(!empty($info)){echo $info->dob;}?>" class="datepicker form-control" placeholder="dob" autocomplete="off">
    			                    </div>
    							</div>
    							<div class="col-md-6 col-sm-6 col-xs-12">
    			                    <div class="form-group">
    			                        <label class="control-label">Gender<sup>*</sup></label>
    		                        	<select name="gender" class="form-control">
    	                                    <option value="1" <?php if(!empty($info)){if($info->gender==1) echo 'selected';}?> >Male</option>
    	                                    <option value="2" <?php if(!empty($info)){if($info->gender==2) echo 'selected';}?> >Female</option>
    	                                </select>
    			                    </div>
    							</div>
    							<div class="col-md-6 col-sm-6 col-xs-12">
    			                    <div class="form-group">
    			                        <label class="control-label">Present Address<sup>*</sup></label>
    		                            <input type="text" name="present_addr" value="<?php if(!empty($info)){echo $info->present_address;}?>" class="form-control" placeholder="Present Address">
    			                    </div>
    							</div>
    							<div class="col-md-6 col-sm-6 col-xs-12">
    			                    <div class="form-group">
    			                        <label class="control-label">Permanent Address<sup>*</sup></label>
    		                            <input type="text" name="permanent_addr" value="<?php if(!empty($info)){echo $info->permanent_address;}?>" class="form-control" placeholder="Permanent Address">
    			                    </div>
    							</div>
    							<div class="col-md-6 col-sm-6 col-xs-12">
    							    <div class="form-group">
    			                        <label class="control-label">Department<sup>*</sup></label>
    		                        	<select name="dept" class="form-control" >
    	                                    <option value="0">-- Select Department --</option>
    	                                    <?php 
    	                                    foreach ($all_dept as $key => $d) {
    	                                    ?>
    	                                    <option value="<?php echo $d['id'];?>"<?php if(!empty($info)){if($info->dept==$d['id']) echo 'selected';}?>>
                                                <?php echo $d['name'];?>
                                            </option>
    	                                    <?php
    	                                    }
    	                                    ?>
    	                                </select>
    			                    </div>
    							</div>
    							<div class="col-md-6 col-sm-6 col-xs-12">
    							    <div class="form-group">
    			                        <label class="control-label">Designation<sup>*</sup></label>
    		                        	<select name="desig" class="form-control">
    	                                    <option value="0">-- Select Designation --</option>
    	                                    <?php 
    	                                    foreach ($designation as $key => $d) {
    	                                    ?>
    	                                    <option value="<?php echo $d['id'];?>" <?php if(!empty($info)){if($info->designation==$d['id']) echo 'selected';}?> >
                                                <?php echo $d['name'];?>
                                            </option>
    	                                    <?php
    	                                    }
    	                                    ?>
    	                                </select>
    			                    </div>
    							</div>
    							<div class="col-md-6 col-sm-6 col-xs-12">
    							    <div class="form-group">
    			                        <label class="control-label">Joining Date<sup>*</sup></label>
    		                            <input type="text" name="joining_date" value="<?php if(!empty($info)){echo $info->joining_date;}?>" class="datepicker form-control" placeholder="Joining Date">
    			                    </div>
    							</div>
    							<div class="col-md-6 col-sm-6 col-xs-12">
    							    <div class="form-group">
    			                        <label class="control-label">Password<sup>*</sup></label>
    		                            <input type="password" name="pass" value="<?php if(!empty($user_info)){echo $user_info->pass_view;}?>" class="form-control" placeholder="Password">
    			                    </div>
    							</div>
    							<div class="col-md-6 col-sm-6 col-xs-12">
    							    <div class="form-group">
    			                        <label class="control-label">Confirm Password<sup>*</sup></label>
    		                            <input type="password" name="con_pass" value="<?php if(!empty($user_info)){echo $user_info->pass_view;}?>" class="form-control" placeholder="Confirm Password">
    			                    </div>
    							</div>
    
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Image</label>
                                            <input name="teacher_image" id="teacher_image" class="form-control" type="file">
                                        </div>
                                    </div>
                                    <div class="col-md-6" id="image-holder">
                                        <img src="<?=base_url()?>assets/images/teachers/<?php if(!empty($info)){echo $info->image;}?>" alt="">
                                    </div>
                                </div>
                            </fieldset>
                            <br>
                            <br>
                            <fieldset class="border px-4 p-2">
                                <div class="col-md-12">
                                    <legend class="w-auto">Educational Information</legend>
                                    <a name="add_education" id="add_education" class="btn btn-info">Add Education</a>
                                    <br><br>
                                    <div id="education_area">
                                        <?php
                                        //echo '<pre>';
                                        //print_r($educational_info);
                                        if(!empty($educational_info)){
                                            foreach($educational_info as $e){
                                        ?>
                                        <div class="row">
                                           <div class="col-md-3 col-sm-3 col-xs-6">
                                                <div class="form-group">
                                                    <label class="control-label">Degree</label>
                                                    <input type="text" name="edu_degree[]" value="<?php echo $e['edu_degree'];?>" id="edu_degree<?php echo $e['id']?>" class="form-control" placeholder="Degree">
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6">
                                                <div class="form-group">
                                                    <label class="control-label">Passing Year</label>
                                                    <input type="text" name="edu_passing_year[]" value="<?php echo $e['edu_passing_year'];?>"  id="edu_passing_year<?php echo $e['id']?>" class="form-control" placeholder="Passing Year">
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6">
                                                <div class="form-group">
                                                    <label class="control-label">Session</label>
                                                    <input type="text" name="edu_session[]" id="edu_session<?php echo $e['id']?>" value="<?php echo $e['edu_session'];?>" class="form-control" placeholder="Session">
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6">
                                                <div class="form-group">
                                                    <label class="control-label">CGPA</label>
                                                    <input type="text" name="edu_cgpa[]" id="edu_cgpa<?php echo $e['id']?>" value="<?php echo $e['edu_cgpa'];?>" class="form-control" placeholder="CGPA">
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                           }
                                        }
                                        ?>
                                    </div>
                                </div>
                            </fieldset>
                            <br>
                            <br>
                            <fieldset class="border px-4 p-2">
                                <div class="col-md-12">
                                    <legend class="w-auto">Employment Records</legend>
                                    
                                    <a name="add_job_info" id="add_job_info" class="btn btn-info">Add Job Record</a>
                                    <br><br>
                                    <div id="job_info_area">
                                        <?php
                                        //echo '<pre>';
                                        //print_r($educational_info);
                                        if(!empty($job_records)){
                                            foreach($job_records as $j){
                                        ?>
                                        <div class="row">
                                            <div class="col-md-2 col-sm-2 col-xs-6">
                                                <div class="form-group">
                                                    <label class="control-label">Organization Name</label>
                                                    <input type="text" name="job_org_name[]" value="<?php echo $j['organization_name'];?>" id="job_org_name<?php echo $e['id']?>" class="form-control" placeholder="Organization Name">
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-sm-2 col-xs-6">
                                                <div class="form-group">
                                                    <label class="control-label">Address</label>
                                                    <input type="text" name="job_org_addr[]" value="<?php echo $j['address'];?>" id="job_org_addr<?php echo $j['id']?>" class="form-control" placeholder="Address">
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-sm-2 col-xs-6">
                                                <div class="form-group">
                                                    <label class="control-label">Designation</label>
                                                    <input type="text" name="job_org_designation[]" value="<?php echo $j['designation'];?>"  id="job_org_designation<?php echo $j['id']?>" class="form-control" placeholder="Designation">
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-sm-2 col-xs-6">
                                                <div class="form-group">
                                                    <label class="control-label">Starting Date</label>
                                                    <input type="text" name="job_org_starting_date[]" value="<?php echo $j['starting_date'];?>" id="job_org_starting_date<?php echo $j['id']?>" class="datepicker form-control" placeholder="Starting Date">
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-sm-2 col-xs-6">
                                                <div class="form-group">
                                                    <label class="control-label">Ending Date</label>
                                                    <input type="text" name="job_org_ending_date[]" value="<?php echo $j['ending_date'];?>" id="job_org_ending_date<?php echo $j['id']?>" class="datepicker form-control" placeholder="Ending Date">
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                           }
                                        }
                                        ?>
                                    </div>
                                </div>
                            </fieldset>
                            <br>
                            <br>
                            <fieldset class="border px-4 p-2">
                                <div class="col-md-12">
                                    <legend class="w-auto">Extra Curricular Activities</legend>
                                    <a name="add_extra_activities" id="add_extra_activities" class="btn btn-info">Add Activities</a>
                                    <div id="extra_activities_area">
                                        <?php
                                        if(!empty($extra_info)){
                                           foreach($extra_info as $e){
                                        ?>
                                           <div class="row">
                                               <div class="col-md-4 col-sm-4 col-xs-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Organaization</label>
                                                        <input type="text" name="extra_organization[]" value="<?php echo $e['extra_organization'];?>" id="extra_organization<?php echo $e['id']?>" class="form-control" placeholder="Organaization">
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-sm-4 col-xs-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Membership ID</label>
                                                        <input type="text" name="extra_member_id[]" value="<?php echo $e['extra_member_id'];?>"  id="extra_member_id<?php echo $e['id']?>" class="form-control" placeholder="Membership ID">
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-sm-4 col-xs-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Description</label>
                                                        <input type="text" name="extra_description[]" id="extra_description<?php echo $e['id']?>" value="<?php echo $e['extra_description'];?>" class="form-control" placeholder="Description">
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            <?php
                                               }
                                        }
                                           ?>
                                    </div>
                                </div>
                            </fieldset>
                            <br>
                            <br>

							<div class="col-md-12 col-sm-12 col-xs-12">
			                    <div class="form-group">
			                    	<button type="submit" name="submit" class="btn btn-primary form-control">
                                       <?php if(!empty($info)):?>
                                            Update
                                        <?php else:?>
                                            Submit
                                        <?php endif;?>
                                    </button>
			                    </div>
							</div>
						</div>
					</form>
            	</div>
            </div>
        </div>
    </div>
</div>

<script>
    $("#teacher_image").on('change', function () {

        //Get count of selected files
        var countFiles = $(this)[0].files.length;

        var imgPath = $(this)[0].value;
        var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
        var image_holder = $("#image-holder");
        image_holder.empty();

        if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") {
            if (typeof (FileReader) != "undefined") {

                //loop for each file selected for uploaded.
                for (var i = 0; i < countFiles; i++) {

                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $("<img />", {
                            "src": e.target.result,
                            "class": "thumb-image",
                            "width":"100",
                            "height":"100"
                        }).appendTo(image_holder);
                    }

                    image_holder.show();
                    reader.readAsDataURL($(this)[0].files[i]);
                }

            } else {
                alert("This browser does not support FileReader.");
            }
        } else {
            alert("Pls select only images");
        }
    });
    
    /* start add education js */
        var i = 0;
        var j = 0;
        var k = 0;

    $('#add_education').click(function () {
        i++;
        var result = 0;

        $('#education_area').append('<div class="row" id="removeDiv' + i + '"><div class="col-md-3 col-sm-3 col-xs-6">\n' +
            '                                    <div class="form-group">\n' +
            '                                        <label class="control-label">Degree</label>\n' +
            '                                        <input type="text" name="edu_degree[]" id="edu_degree" class="form-control" placeholder="Degree">\n' +
            '                                    </div>\n' +
            '                                </div>\n' +
            '                                <div class="col-md-3 col-sm-3 col-xs-6">\n' +
            '                                    <div class="form-group">\n' +
            '                                        <label class="control-label">Passing Year</label>\n' +
            '                                        <input type="text" name="edu_passing_year[]"  id="edu_passing_year" class="form-control" placeholder="Passing Year">\n' +
            '                                    </div>\n' +
            '                                </div>\n' +
            '                                <div class="col-md-3 col-sm-3 col-xs-6">\n' +
            '                                    <div class="form-group">\n' +
            '                                        <label class="control-label">Session</label>\n' +
            '                                        <input type="text" name="edu_session[]" id="edu_session" class="form-control" placeholder="Session">\n' +
            '                                    </div>\n' +
            '                                </div>\n' +
            '                                <div class="col-md-2 col-sm-2 col-xs-4">\n' +
            '                                    <div class="form-group">\n' +
            '                                        <label class="control-label">CGPA</label>\n' +
            '                                        <input type="text" name="edu_cgpa[]" id="edu_cgpa" class="form-control" placeholder="CGPA">\n' +
            '                                    </div>\n' +
            '                                </div><div class="col-md-1 col-sm-1 col-xs-2"><div class="form-group"><label class="control-label">Remove</label><button type="button" name="add" id="' + i + '" class="btn btn-danger btn_remove">X</button></div></div></div>')
    });

    $(document).on('click', '.btn_remove', function () {
        var button_id = $(this).attr("id");

        $('#removeDiv' + button_id + '').remove();
    });

    /* end add education js */
    
    /* start add job info js */
    $('#add_job_info').click(function () {
        j++;
        var result = 0;

        $('#job_info_area').append('<div class="row" id="removeDiv2' + j + '"><div class="col-md-2 col-sm-2 col-xs-6">\n' +
            '                                    <div class="form-group">\n' +
            '                                        <label class="control-label">Organization Name</label>\n' +
            '                                        <input type="text" name="job_org_name[]" id="job_org_name" class="form-control" placeholder="Organization Name">\n' +
            '                                    </div>\n' +
            '                                </div>\n' +
            '                                <div class="col-md-2 col-sm-2 col-xs-6">\n' +
            '                                    <div class="form-group">\n' +
            '                                        <label class="control-label">Address</label>\n' +
            '                                        <input type="text" name="job_org_addr[]"  id="job_org_addr" class="form-control" placeholder="Address">\n' +
            '                                    </div>\n' +
            '                                </div>\n' +
            '                                <div class="col-md-2 col-sm-2 col-xs-6">\n' +
            '                                    <div class="form-group">\n' +
            '                                        <label class="control-label">Designation</label>\n' +
            '                                        <input type="text" name="job_org_designation[]" id="job_org_designation" class="form-control" placeholder="Designation">\n' +
            '                                    </div>\n' +
            '                                </div>\n' +
            '                                <div class="col-md-2 col-sm-2 col-xs-6">\n' +
            '                                    <div class="form-group">\n' +
            '                                        <label class="control-label">Starting Date</label>\n' +
            '                                        <input type="text" name="job_org_starting_date[]" id="job_org_starting_date' + j + '" class="datepicker form-control" placeholder="Starting Date">\n' +
            '                                    </div>\n' +
            '                                </div>\n' +
            '                                <div class="col-md-2 col-sm-2 col-xs-6">\n' +
            '                                    <div class="form-group">\n' +
            '                                        <label class="control-label">Ending Date</label>\n' +
            '                                        <input type="text" name="job_org_ending_date[]" id="job_org_ending_date' + j + '" class="datepicker form-control" placeholder="Ending Date">\n' +
            '                                    </div>\n' +
            '                                </div>\n' +
            '                                <div class="col-md-1 col-sm-1 col-xs-2"><div class="form-group"><label class="control-label">Remove</label><button type="button" name="add" id="' + j + '" class="btn btn-danger btn_remove2">X</button></div></div></div>')
        $('.datepicker').removeClass("hasDatepicker").datepicker();
    });
    
   
   
    $(document).on('click', '.btn_remove2', function () {
        var button_id = $(this).attr("id");

        $('#removeDiv2' + button_id + '').remove();
    });
    /* end add job info js */
    
    /* start add extra activities js */
    $('#add_extra_activities').click(function () {
        k++;
        var result = 0;

        $('#extra_activities_area').append('<div class="row" id="removeDiv3' + k + '"><div class="col-md-3 col-sm-3 col-xs-6">\n' +
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
            '                                <div class="col-md-4 col-sm-4 col-xs-6">\n' +
            '                                    <div class="form-group">\n' +
            '                                        <label class="control-label">Description</label>\n' +
            '                                        <textarea name="extra_description[]" id="extra_description" class="form-control" placeholder="Description"></textarea>\n' +
            '                                    </div>\n' +
            '                                </div>\n' +
            '                                <div class="col-md-1 col-sm-1 col-xs-2"><div class="form-group"><label class="control-label">Remove</label><button type="button" name="add" id="' + k + '" class="btn btn-danger btn_remove3">X</button></div></div></div>')
    });

    $(document).on('click', '.btn_remove3', function () {
        var button_id = $(this).attr("id");

        $('#removeDiv3' + button_id + '').remove();
    });
    /* end add extra activities js */

</script>