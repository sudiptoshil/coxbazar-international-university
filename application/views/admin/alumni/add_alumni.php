<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="row">
            <!-- <div class="col-xs-12">
                <h4 class="page-title">Notice</h4>
            </div> -->
            <?php if($success == 1){?>
            <script>
            	alert("New Alumni Successfully added.");
            </script>
        	<?php }?>

            <div class="card-box">
            	<div class="notice-form">
            	    
	                <h2 class="text-center">
	                    
                        <?php if(!empty($info)):?>
                            Update
                        <?php else:?>
                            Add New
                        <?php endif;?> Alumni
	                    </h2>
	                <br>
					<?php echo validation_errors();
						//$p = ddd;
						//$p = 'bb123';
        				//echo 'hash of '.$p.': '. md5(sha1(md5($p)));
					?>

                    <form action="<?php echo base_url();?>admin/insert_alumni" enctype="multipart/form-data" method="post">
                        <input type="hidden" name="alumni_id" value="<?php if(!empty($info)){echo $info->id;}?>">
                        
                        <fieldset class="border px-4 py-2">
                            <legend  class="w-auto">Basic:</legend>
                            <div class="row">
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label">Name<sup>*</sup></label>
                                        <input type="text" name="name" value="<?php if(!empty($info)){echo $info->name;}?>" class="form-control" placeholder="Student Name" required autofocus>
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
                                                <option value="<?php echo $b['id'];?>" <?php if(!empty($info)){if($info->batch==$b['id']) echo 'selected';}?>><?php echo $b['name'];?></option>}
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label">Roll<sup>*</sup></label>
                                        <input type="text" name="roll" value="<?php if(!empty($info)){echo $info->roll;}?>" class="form-control" placeholder="Roll Number. Example: N201911001" required>
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
                                                <option value="<?php echo $d['id'];?>" <?php if(!empty($info)){if($info->dept==$d['id']) echo 'selected';}?>><?php echo $d['name'];?></option>}
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
                                            <input type="radio" name="gender" value="1" <?php if(!empty($info)){if($info->gender==1) echo 'checked="checked"';}?>> Male
                                        </label>
                                        <label class="radio-inline" style="margin-top: 10px;margin-bottom: 10px;">
                                            <input type="radio" name="gender" value="2" <?php if(!empty($info)){if($info->gender==2) echo 'checked="checked"';}?>> Female
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label">Blood Group</label>
                                        <select class="form-control" name="blood_group">
                                            <option value="0">Select Blood Group</option>
                                            <option value="A+" <?php if(!empty($info)){if($info->blood_group=='A+') echo 'selected';}?>>A+</option>
                                            <option value="A-" <?php if(!empty($info)){if($info->blood_group=='A-') echo 'selected';}?>>A-</option>
                                            <option value="AB+" <?php if(!empty($info)){if($info->blood_group=='AB+') echo 'selected';}?>>AB+</option>
                                            <option value="AB-" <?php if(!empty($info)){if($info->blood_group=='AB-') echo 'selected';}?>>AB-</option>
                                            <option value="B+" <?php if(!empty($info)){if($info->blood_group=='B+') echo 'selected';}?>>B+</option>
                                            <option value="B-" <?php if(!empty($info)){if($info->blood_group=='B-') echo 'selected';}?>>B-</option>
                                            <option value="O+" <?php if(!empty($info)){if($info->blood_group=='O+') echo 'selected';}?>>O+</option>
                                            <option value="O-" <?php if(!empty($info)){if($info->blood_group=='O-') echo 'selected';}?>>O-</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label">Date of Birth<sup>*</sup></label>
                                        <input type="text" name="dob" value="<?php if(!empty($info)){echo $info->dob;}?>" class="datepicker form-control"  placeholder="dob" autocomplete="off"  required>
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
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label class="control-label">Image</label>
                                                <input type="file" name="alumni_img" id="alumni_image" class="form-control">
                                            </div>
                                            <div class="col-md-6" id="image-holder" style="height: 50px;">
                                                <img src="<?=base_url()?>assets/images/alumni/profile/<?php if(!empty($info)){echo $info->image;}?>" alt="">
                                            </div>
                                            <!--<div class="col-sm-6" class="image-holder">
                                                <div class="" style="right:0;top:0;height: 50px;text-align: center;margin-top: 10px;">
                                                     <img src="<?=base_url();?>assets/images/alumni/profile/<?php if(!empty($info)){echo $info->image;}?>" id="profile-img-tag" class="thumb-image" style="height: 100%;"/>
                                                 </div>
                                            </div>-->
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label">Father's Name<sup>*</sup></label>
                                        <input type="text" name="father_name" value="<?php if(!empty($info)){echo $info->father_name;}?>" class="form-control" placeholder="Father Name" required>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label">Mother's Name<sup>*</sup></label>
                                        <input type="text" name="mother_name" value="<?php if(!empty($info)){echo $info->mother_name;}?>" class="form-control" placeholder="Mother's Name" required>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label">Present Address<sup>*</sup></label>
                                        <input type="text" name="present_addr" value="<?php if(!empty($info)){echo $info->present_address;}?>" class="form-control" placeholder="Present Address" required>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label">Permanent Address<sup>*</sup></label>
                                        <input type="text" name="permanent_addr" value="<?php if(!empty($info)){echo $info->permanent_address;}?>" class="form-control" placeholder="Permanent Address" required>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label">Admission Date</label>
                                        <input type="text" name="starting_date" value="<?php if(!empty($info)){echo $info->starting_date;}?>" class="datepicker form-control" placeholder="Starting Date" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label">Passing Date</label>
                                        <input type="text" name="ending_date" value="<?php if(!empty($info)){echo $info->ending_date;}?>" class="datepicker form-control" placeholder="Ending Date" autocomplete="off">
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
                                                <option value="<?php echo $m['id'];?>" value="<?php if(!empty($info)){echo $info->membership_type;}?>"><?php echo $m['name'];?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label">Password<sup>*</sup></label>
                                        <input type="password" name="pass" value="<?php if(!empty($user_info)){echo $user_info->pass_view;}?>" class="form-control" placeholder="Password" required>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label">Confirm Password<sup>*</sup></label>
                                        <input type="password" name="con_pass" value="<?php if(!empty($user_info)){echo $user_info->pass_view;}?>" class="form-control" placeholder="Confirm Password" required>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <br>
                        <br>
                        <fieldset class="border px-4 p-2">
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
                        </fieldset>
                        <br>
                        <br>
                        <fieldset class="border px-4 p-2">
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
                        </fieldset>
                        <br>
                        <br>
                        <fieldset class="border px-4 p-2">
                            <legend class="w-auto">Extra Curricular Activities</legend>
                            <a name="add_extra_activities" id="add_extra_activities" class="btn btn-info">Add Activities</a>
                            <br><br>
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
                                        <input type="text" name="phone" value="<?php if(!empty($info)){echo $info->phone;}?>" class="form-control" placeholder="Phone" required>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label">Email<sup>*</sup></label>
                                        <input type="email" name="email" value="<?php if(!empty($info)){echo $info->email;}?>" class="form-control" placeholder="Email" required>
                                    </div>
                                </div>
                                <!-- security token -->
                                <!-- end security token -->
                                <div class="text-center">
                                    <button type="submit" name="submit" class="btn btn-primary">
                                        <?php if(!empty($info)):?>
                                            Update
                                        <?php else:?>
                                            Submit
                                        <?php endif;?>
                                    </button>
                                </div>
                            </div>
                        </fieldset>
                    </form>
            	</div>
            </div>
        </div>
    </div>
</div>

<script>

    
    $("#alumni_image").on('change', function () {

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
                            //"width":"100",
                            "height":"50"
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

</script>