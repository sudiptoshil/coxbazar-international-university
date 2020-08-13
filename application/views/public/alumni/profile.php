<div class="dashboard-area wrapper-area">
	<div class="dashboard-area-body wrapper-area-body">
		<div class="container">
            <div class="card-box">
        <div class="content container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div>
                        <h3 class="text-center">
                            Profile
                        </h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="text-center">
                        <?php echo $this->session->flashdata('msg');?>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="card-box">
                    <div class="notice-form">
                        <form action="<?php echo base_url();?>alumni/update_alumni" enctype="multipart/form-data" method="post">
    
                            <input type="hidden" name="is_profile_update" value="1">
                            <input type="hidden" name="id" value="<?php if(!empty($info)){echo $info->id;}?>">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <?=$this->session->flashdata('success')?>
                                    <?=$this->session->flashdata('error')?>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label">Name</label>
                                        <input type="text" name="name" value="<?php if(!empty($info)){echo $info->name;}?>" class="form-control" placeholder="Student Name">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label">Roll</label>
                                        <input type="text" name="roll" value="<?php if(!empty($info)){echo $info->roll;}?>" class="form-control" placeholder="Roll Number">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label">Department</label>
                                        <select name="dept" class="form-control">
                                            <option value="0">-- Select Department --</option>
                                            <?php
                                            foreach ($all_dept as $key => $d) {
                                                ?>
                                                <option value="<?php echo $d['id'];?>" <?php if(!empty($info)){if($info->dept==$d['id']) echo 'selected';}?>>
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
                                        <label class="control-label">Batch</label>
                                        <select name="batch" class="form-control">
                                            <option value="0">-- Select Batch --</option>
                                            <?php
                                            foreach ($all_batch as $key => $b) {
                                                ?>
                                                <option value="<?php echo $b['id'];?>" <?php if(!empty($info)){if($info->batch==$b['id']) echo 'selected';}?>>
                                                    <?php echo $b['name'];?>
                                                </option>}
                                                <?php
                                            }
                                            ?>
                                        </select>
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
                                        <label class="control-label">Email</label>
                                        <input type="email" name="email" value="<?php if(!empty($info)){echo $info->email;}?>" class="form-control" placeholder="Email">
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
                                        <label class="control-label">Blood Group</label>
                                        <select class="form-control" name="blood_group">
                                            <option value="0">Select Blood Group</option>
                                            <option value="A+" <?php if(!empty($info)){if($info->blood_group=='A+') echo 'selected';}?>>A+</option>
                                            <option value="A-"<?php if(!empty($info)){if($info->blood_group=='A-') echo 'selected';}?>>A-</option>
                                            <option value="AB+"<?php if(!empty($info)){if($info->blood_group=='AB+') echo 'selected';}?>>AB+</option>
                                            <option value="AB-"<?php if(!empty($info)){if($info->blood_group=='AB-') echo 'selected';}?>>AB-</option>
                                            <option value="B+"<?php if(!empty($info)){if($info->blood_group=='B+') echo 'selected';}?>>B+</option>
                                            <option value="B-"<?php if(!empty($info)){if($info->blood_group=='B-') echo 'selected';}?>>B-</option>
                                            <option value="O+"<?php if(!empty($info)){if($info->blood_group=='O+') echo 'selected';}?>>O+</option>
                                            <option value="O-"<?php if(!empty($info)){if($info->blood_group=='O-') echo 'selected';}?>>O-</option>
                                        </select>
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
                                        <label class="control-label">NID</label>
                                        <input type="text" value="<?php if(!empty($info)){echo $info->nid;}?>" name="nid" class="form-control" placeholder="NID">
                                    </div>
                                </div>
    
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label">Father's Name</label>
                                        <input type="text" value="<?php if(!empty($info)){echo $info->father_name;}?>" name="father_name" class="form-control" placeholder="Father Name">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label">Mother's Name</label>
                                        <input type="text" value="<?php if(!empty($info)){echo $info->mother_name;}?>" name="mother_name" class="form-control" placeholder="Mother's Name">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label">Present Address</label>
                                        <input type="text" value="<?php if(!empty($info)){echo $info->present_address;}?>" name="present_addr" class="form-control" placeholder="Present Address">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label">Permanent Address</label>
                                        <input type="text" value="<?php if(!empty($info)){echo $info->permanent_address;}?>" name="permanent_addr" class="form-control" placeholder="Permanent Address">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label">Starting Date</label>
                                        <input type="text" value="<?php if(!empty($info)){echo $info->starting_date;}?>" name="starting_date" class="datepicker form-control" placeholder="Starting Date">
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
                                        <label class="control-label">Password</label>
                                        <input type="password" value="<?php if(!empty($user_info)){echo $user_info->pass_view;}?>" name="pass" class="form-control" placeholder="Password">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label">Confirm Password</label>
                                        <input type="password" value="<?php if(!empty($user_info)){echo $user_info->pass_view;}?>" name="con_pass" class="form-control" placeholder="Confirm Password">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="control-label">Image</label>
                                                <input name="student_image" id="student_image" class="form-control" type="file">
                                            </div>
                                        </div>
                                        <div class="col-sm-6" id="image-holder">
                                            <img src="<?=base_url()?>assets/images/alumni/profile/<?php if(!empty($info)){echo $info->image;}?>" alt="" width="100" height="100">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-sm-12">
                                   <br>
                                   <br>
                                   <fieldset class="border px-4 p-2">
                                       <legend class="w-auto">Educational Information</legend>
                                        <div class="form-group">
                                            <a name="add_education" id="add_education" class="btn btn-info text-white">Add Education</a>
                                        </div>
                                       <div id="education_area">
                                               <?php
                                               //echo '<pre>';
                                               //print_r($educational_info);
                                               foreach($educational_info as $e){
                                                ?>
                                           <div class="row">
                                               <div class="col-md-2 col-sm-2 col-xs-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Degree</label>
                                                        <input type="text" name="edu_degree[]" value="<?php echo $e['edu_degree'];?>" id="edu_degree<?php echo $e['id']?>" class="form-control" placeholder="Degree">
                                                    </div>
                                                </div>
                                               <div class="col-md-3 col-sm-3 col-xs-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Institution</label>
                                                        <input type="text" name="edu_institution[]" value="<?php echo $e['school_college_uni'];?>" id="edu_institution<?php echo $e['id']?>" class="form-control" placeholder="Institution">
                                                    </div>
                                                </div>
                                                <div class="col-md-2 col-sm-2 col-xs-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Passing Year</label>
                                                        <input type="text" name="edu_passing_year[]" value="<?php echo $e['edu_passing_year'];?>"  id="edu_passing_year<?php echo $e['id']?>" class="form-control" placeholder="Passing Year">
                                                    </div>
                                                </div>
                                                <div class="col-md-2 col-sm-2 col-xs-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Session</label>
                                                        <input type="text" name="edu_session[]" id="edu_session<?php echo $e['id']?>" value="<?php echo $e['edu_session'];?>" class="form-control" placeholder="Session">
                                                    </div>
                                                </div>
                                                <div class="col-md-2 col-sm-2 col-xs-6">
                                                    <div class="form-group">
                                                        <label class="control-label">CGPA</label>
                                                        <input type="text" name="edu_cgpa[]" id="edu_cgpa<?php echo $e['id']?>" value="<?php echo $e['edu_cgpa'];?>" class="form-control" placeholder="CGPA">
                                                    </div>
                                                </div>
                                            </div>
                                                <?php
                                               }
                                               ?>
                                       </div>
                                   </fieldset>
                               </div>
                               
                               
                               <div class="col-sm-12">
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
                               </div>
    
                               <div class="col-sm-12">
                                   <br>
                                   <br>
                                   <fieldset class="border px-4 p-2">
                                       <legend class="w-auto">Extra Activites</legend>
                                       <a name="add_extra_activities" id="add_extra_activities" class="btn btn-info text-white">Add Activities</a>
                                       <div id="extra_activities_area">
                                           <?php
                                               foreach($extra_info as $e){
                                                ?>
                                           <div class="row">
                                               <div class="col-md-4 col-sm-4 col-xs-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Organaization</label>
                                                        <input type="text" name="extra_organization[]" value="<?php echo $e['extra_organization'];?>" id="extra_organization<?php echo $e['id']?>" class="form-control" placeholder="Organaization">
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-sm-3 col-xs-6">
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
                                               ?>
                                       </div>
                                   </fieldset>
                               </div>
                                
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label">&nbsp;</label>
                                        <?php if(empty($is_view)):?>
                                        <button type="submit" name="submit" class="btn btn-primary form-control">
                                            Update
                                        </button>
                                        <?endif;?>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
                <script>
                    $("#student_image").on('change', function () {
        
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
            </script>
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
                        '                                        <input type="text" name="edu_degree[]" id="edu_degree" class="form-control" placeholder="Degree">\n' +
                        '                                    </div>\n' +
                        '                                </div>\n' +
                        '                                <div class="col-md-3 col-sm-3 col-xs-6">\n' +
                        '                                    <div class="form-group">\n' +
                        '                                        <label class="control-label">Institution</label>\n' +
                        '                                        <input type="text" name="edu_institution[]"  id="edu_institution" class="form-control" placeholder="Institution">\n' +
                        '                                    </div>\n' +
                        '                                </div>\n' +
                        '                                <div class="col-md-2 col-sm-2 col-xs-6">\n' +
                        '                                    <div class="form-group">\n' +
                        '                                        <label class="control-label">Passing Year</label>\n' +
                        '                                        <input type="text" name="edu_passing_year[]"  id="edu_passing_year" class="form-control" placeholder="Passing Year">\n' +
                        '                                    </div>\n' +
                        '                                </div>\n' +
                        '                                <div class="col-md-2 col-sm-2 col-xs-6">\n' +
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
    
    
                $('#add_extra_activities').click(function () {
                    j++;
                    var result = 0;
    
                    $('#extra_activities_area').append('<div class="row" id="removeDiv2' + j + '"><div class="col-md-4 col-sm-4 col-xs-6">\n' +
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
                        '                                        <input type="text" name="extra_description[]"  id="extra_description" class="form-control" placeholder="Description">\n' +
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
        </div>
    </div>
        </div>
    </div>
</div>