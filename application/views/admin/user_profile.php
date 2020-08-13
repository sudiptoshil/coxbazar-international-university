<div class="page-wrapper">
    <div class="card-box">
        <div class="content container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div>
                        <h3 class="text-center">Applicant's Profile </h3>
                    </div>
                </div>
                <!--<div class="col-sm-12 text-center">
                    <?php if ($user_type == 2): ?>
                        <img src="<?= base_url() ?>assets/images/teachers/<?php if (!empty($info)) {
                            echo $info->image;
                        } ?>" class="img-responsive img-circle" width="150" height="150">
                    <?php elseif ($user_type == 4): ?>
                        <img src="<?= base_url() ?>assets/images/students/<?php if (!empty($info)) {
                            echo $info->image;
                        } ?>" class="img-responsive img-circle" width="150" height="150">
                    <?php endif; ?>
                </div>-->
            </div>

            <div class="">
                <div class="card-box">
                    <div class="notice-form">
                        <!--<form action="<?php /*echo base_url();*/?>admin/insert_student" enctype="multipart/form-data" method="post">-->

                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12 ">
                                <div class="text-center" style="padding-bottom: 25px;">
                                    <img src="<?php if(!empty($info->image)){echo base_url()."assets/images/applicants/".$info->image;}else{echo base_url()."assets/images/user.png";}?>" alt="..." class="img-thumbnail" style="max-width: 100px;">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="row form-group">
                                    <label class="col-sm-4 control-label">Department</label>
                                    <div class="col-sm-8">
                                        <?php if(!empty($info)){echo $this->common->getSpecificField('dept','id',$info->dept,'name');}?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="row form-group">
                                    <label class="col-sm-4 control-label">Shift</label>
                                    <div class="col-sm-8">
                                        <?php if(!empty($info)){
                                            if($info->shift == 1){
                                                echo "Morning";
                                            }elseif ($info->shift == 3){
                                                echo "Evening";
                                            }
                                        }?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="row form-group">
                                    <label class="col-sm-4 control-label">Name</label>
                                    <div class="col-sm-8">
                                        <?php if(!empty($info)){echo $info->name;}?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="row form-group">
                                    <label class="col-sm-4 control-label">Bangla Name</label>
                                    <div class="col-sm-8">
                                        <?php if(!empty($info)){echo $info->name_bangla;}?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="row form-group">
                                    <label class="col-sm-4 control-label">Gender </label>
                                    <div class="col-sm-8">
                                        <?php if(!empty($info) && $info->gender == 1){echo "Male";}elseif(!empty($info) && $info->gender == 2){echo "Female";}?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="row form-group">
                                    <label class="col-sm-4 control-label">Date of Birth</label>
                                    <div class="col-sm-8">
                                        <?php if(!empty($info)){echo $info->dob;}?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="row form-group">
                                    <label class="col-sm-4 control-label">Father's Name</label>
                                    <div class="col-sm-8">
                                        <?php if(!empty($info)){echo $info->fatherName;}?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="row form-group">
                                    <label class="col-sm-4 control-label">Father's Occupation</label>
                                    <div class="col-sm-8">
                                        <?php if(!empty($info)){echo $info->father_occupation;}?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="row form-group">
                                    <label class="col-sm-4 control-label">Mother's Name</label>
                                    <div class="col-sm-8">
                                        <?php if(!empty($info)){echo $info->motherName;}?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="row form-group">
                                    <label class="col-sm-4 control-label">Mother's Occupation</label>
                                    <div class="col-sm-8">
                                        <?php if(!empty($info)){echo $info->mother_occupation;}?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="row form-group">
                                    <label class="col-sm-4 control-label">Guardian's Name</label>
                                    <div class="col-sm-8">
                                        <?php if(!empty($info)){echo $info->guardianName;}?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="row form-group">
                                    <label class="col-sm-4 control-label">Guardian's Occupation</label>
                                    <div class="col-sm-8">
                                        <?php if(!empty($info)){echo $info->guardian_occupation;}?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="row form-group">
                                    <label class="col-sm-4 control-label">Phone</label>
                                    <div class="col-sm-8">
                                        <?php if(!empty($info)){echo $info->mobile;}?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="row form-group">
                                    <label class="col-sm-4 control-label">Alternate Phone</label>
                                    <div class="col-sm-8">
                                        <?php if(!empty($info)){echo $info->alternate_phone;}?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="row form-group">
                                    <label class="col-sm-4 control-label">Email</label>
                                    <div class="col-sm-8">
                                        <?php if(!empty($info)){echo $info->email;}?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="row form-group">
                                    <label class="col-sm-4 control-label">Guardian's Phone</label>
                                    <div class="col-sm-8">
                                        <?php if(!empty($info)){echo $info->guardianMobile;}?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="row form-group">
                                    <label class="col-sm-4 control-label">Nationality</label>
                                    <div class="col-sm-8">
                                        <?php if(!empty($info)){echo $info->nationality;}?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="row form-group">
                                    <label class="col-sm-4 control-label">Country</label>
                                    <div class="col-sm-8">
                                        <?php if(!empty($info)){echo $info->country;}?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="row form-group">
                                    <label class="col-sm-4 control-label">Marital Status</label>
                                    <div class="col-sm-8">
                                        <?php if(!empty($info) && $info->marital_status==1){echo "Unmarried";}elseif(!empty($info) && $info->marital_status==1){echo "Married";}?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="row form-group">
                                    <label class="col-sm-4 control-label">Religion</label>
                                    <div class="col-sm-8">
                                        <?php if(!empty($info)){ echo $this->common->religion($info->religion);}?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="row form-group">
                                    <label class="col-sm-4 control-label">Passport </label>
                                    <div class="col-sm-8">
                                        <?php if(!empty($info)){echo $info->passport;}?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="row form-group">
                                    <label class="col-sm-4 control-label">Blood Group</label>
                                    <div class="col-sm-8">
                                        <?php if(!empty($info)){echo $info->bloodGroup;}?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="row form-group">
                                    <label class="col-sm-4 control-label">Passport Validation Date</label>
                                    <div class="col-sm-8">
                                        <?php if(!empty($info)){echo $info->pass_validation_date;}?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="row form-group">
                                    <label class="col-sm-4 control-label">Birth Certificate</label>
                                    <div class="col-sm-8">
                                        <?php if(!empty($info)){echo $info->birth_certificate;}?>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="row">
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <h4 class="text-uppercase"><u>Present Address</u></h4>
                                        <div class="row form-group">
                                            <label class="col-sm-4 control-label">Address</label>
                                            <div class="col-sm-8">
                                                <?php if(!empty($info)){echo $info->presentAddress;}?>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <label class="col-sm-4 control-label">District</label>
                                            <div class="col-sm-8">
                                                <?php if(!empty($info)){echo $info->prDistrict;}?>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <label class="col-sm-4 control-label">Thana</label>
                                            <div class="col-sm-8">
                                                <?php if(!empty($info)){echo $info->prThanaId;}?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <h4 class="text-uppercase"><u>Permanent Address</u></h4>
                                        <div class="row form-group">
                                            <label class="col-sm-4 control-label">Address</label>
                                            <div class="col-sm-8">
                                                <?php if(!empty($info)){echo $info->permanentAddress;}?>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <label class="col-sm-4 control-label">District</label>
                                            <div class="col-sm-8">
                                                <?php if(!empty($info)){echo $info->perDistrict;}?>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <label class="col-sm-4 control-label">Thana</label>
                                            <div class="col-sm-8">
                                                <?php if(!empty($info)){echo $info->perThanaId;}?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th class="text-center">Sl</th>
                                                <th class="text-center">Examination/Degree</th>
                                                <th class="text-center">Board Name</th>
                                                <th class="text-center">School/College</th>
                                                <th class="text-center">Passing Year</th>
                                                <th class="text-center">Group/Discipline/Major</th>
                                                <th class="text-center">GPA/ CGPA/ Division</th>
                                                <th class="text-center">Marks GPA without Optional</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $sl = 1;
                                            foreach($edu_info as $e){
                                            ?>
                                                <tr>
                                                    <td class="text-center"><?php echo $sl;?></td>
                                                    <td class="text-center"><?php echo $e['exam'];?></td>
                                                    <td class="text-center"><?php echo $this->common->getSpecificField("board",'id',$e['board'],'name');?></td>
                                                    <td class="text-center"><?php echo $e['institution'];?></td>
                                                    <td class="text-center"><?php echo $e['passing_year'];?></td>
                                                    <td class="text-center"><?php echo $e['group'];?></td>
                                                    <td class="text-center"><?php echo $e['cgpa'];?></td>
                                                    <td class="text-center"><?php echo $e['gpa'];?></td>
                                                </tr>
                                            <?php
                                                $sl++;
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="col-md-12 col-sm-12 col-xs-12 " style="padding-bottom: 30px;">
                                <div class="row">
                                    <div class="col-md-6 col-sm-6 col-xs-12 ">
                                        <label>SSC Transcript</label>
                                        <div class="pb-4">
                                            <a href="<?=base_url()."assets/images/applicants/".$info->ssc_transcript_img;?>" target="_blank"><img src="<?php if(!empty($info->ssc_transcript_img)){echo base_url()."assets/images/applicants/".$info->ssc_transcript_img;}?>" alt="..." class="img-thumbnail"></a>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12 ">
                                        <label>HSC Transcript</label>
                                        <div class="pb-4">
                                            <a href="<?=base_url()."assets/images/applicants/".$info->hsc_transcript_img;?>" target="_blank"><img src="<?php if(!empty($info->hsc_transcript_img)){echo base_url()."assets/images/applicants/".$info->hsc_transcript_img;}?>" alt="..." class="img-thumbnail"></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br><br>
                            <div class="col-md-12 col-sm-12 col-xs-12 ">
                                <div>
                                    <h4 class="text-center pb-4"><b>Your bkash payment info</b></h4>
                                </div>
                                <div class="row">

                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="row form-group">
                                            <label class="col-sm-5 control-label"><b>Sender Mobile No:</b> </label>
                                            <div class="col-sm-7">
                                                <?php if(!empty($payment_info)){echo $payment_info->sender_number;}?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="row form-group">
                                            <label class="col-sm-5 control-label"><b>Transaction ID:</b> </label>
                                            <div class="col-sm-7">
                                                <?php if(!empty($payment_info)){echo $payment_info->transaction_id;}?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="row form-group">
                                            <label class="col-sm-5 control-label"><b>Reference: </b></label>
                                            <div class="col-sm-7">
                                                <?php if(!empty($payment_info)){echo $payment_info->reference;}?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="row form-group">
                                            <label class="col-sm-5 control-label"><b>Amount: </b></label>
                                            <div class="col-sm-7">
                                                <?php if(!empty($payment_info)){echo $payment_info->amount;}?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br><br>
                            <hr>
                            <div class="col-md-12 col-sm-12 col-xs-12 text-center" style="border-top: 1px solid #333;">
                                <br><br>
                                <div class="form-group">
                                    <?php
                                        if($info->status == 1){
                                    ?>
                                        <h2>Current Status: <b class="text-default">Pending</b></h2>
                                        <a href="<?=base_url();?>/admin/applicants_request/<?=$info->id?>/2" class="btn btn-success">Accept?</a>
                                        <a href="<?=base_url();?>/admin/applicants_request/<?=$info->id?>/3" class="btn btn-danger">Cancel?</a>
                                    <?php
                                        }elseif($info->status == 2){
                                    ?>
                                        <h2>Current Status: <b class="text-success">Accepted</b></h2>
                                        <a href="<?=base_url();?>/admin/applicants_request/<?=$info->id?>/3" class="btn btn-danger">Cancel?</a>
                                    <?php
                                        }elseif($info->status == 3){
                                    ?>
                                        <h2>Current Status: <b class="text-danger">Cancelled</b></h2>
                                        <a href="<?=base_url();?>/admin/applicants_request/<?=$info->id?>/2" class="btn btn-success">Accept ?</a>
                                    <?php
                                        }
                                    ?>
                                </div>
                            </div>

                            <!--<div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label">&nbsp;</label>
                                    <?php /*if(empty($is_view)):*/?>
                                    <button type="submit" name="submit" class="btn btn-primary form-control">
                                        Update
                                    </button>
                                    <?/*endif;*/?>
                                </div>
                            </div>-->
                        </div>
                    <!--</form>-->
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
                        '                                <div class="col-md-4 col-sm-4 col-xs-6">\n' +
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
                        '                                <div class="col-md-1 col-sm-1 col-xs-4">\n' +
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
    
                    $('#extra_activities_area').append('<div class="row" id="removeDiv2' + j + '"><div class="col-md-3 col-sm-3 col-xs-6">\n' +
                        '                                    <div class="form-group">\n' +
                        '                                        <label class="control-label">Organization</label>\n' +
                        '                                        <input type="text" name="extra_organization[]" id="extra_organization' + j + '" class="form-control" placeholder="Organization">\n' +
                        '                                    </div>\n' +
                        '                                </div>\n' +
                        '                                <div class="col-md-3 col-sm-3 col-xs-6">\n' +
                        '                                    <div class="form-group">\n' +
                        '                                        <label class="control-label">Member Id</label>\n' +
                        '                                        <input type="text" name="extra_member_id[]"  id="extra_member_id' + j + '" class="form-control" placeholder="Member Id">\n' +
                        '                                    </div>\n' +
                        '                                </div>\n' +
                        '                                <div class="col-md-5 col-sm-5 col-xs-6">\n' +
                        '                                    <div class="form-group">\n' +
                        '                                        <label class="control-label">Description</label>\n' +
                        '                                        <input type="text" name="extra_description[]"  id="extra_description' + j + '" class="form-control" placeholder="Description">\n' +
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

