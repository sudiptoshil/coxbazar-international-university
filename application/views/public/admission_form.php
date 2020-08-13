<div class="about-area">
    <div class="section-top-banner">
        <div class="container">
            <div class="section-top-banner-links">
                <h1>Admission Form</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url();?>">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Admission Form</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="about-area-body">
        <div class="container-fluid">
            <div class="admission-form-area wrapper-area">
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
                                alert("Admission form successfully submitted.");
                            </script>
                        <?php }?>

                        <div class="admission-form card-box">
                            <div class="wrapper-form">
                                <h2 class="text-center">New Admission Form</h2>
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

                                <form action="<?php echo base_url();?>home/admission_form_submit" enctype="multipart/form-data" method="post">

                                    <fieldset class="border px-4 py-2 mb-4">
                                        <legend  class="w-auto">Applied Department</legend>
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <label class="control-label">Department<sup>*</sup></label>
                                                    <select name="dept" class="form-control" id="dept" required>
                                                        <option value="0">Select Department</option>
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
                                                    <label class="control-label">Shift<sup>*</sup></label>
                                                    <div id="shift_div">
                                                        <select name="shift" class="form-control" required readonly="readonly">
                                                            <option value="1" id="morning" slected>Morning</option>
                                                            <option value="3" id="evening" style="display: none;">Evening</option>
                                                        </select>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>

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
                                                    <label class="control-label">Applicant's Name(Bangla)</label>
                                                    <input type="text" name="name_bangla" class="form-control" placeholder="Student Name" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <label class="control-label">Gender<sup>*</sup></label>
                                                    <select name="gender" class="form-control" required>
                                                        <option value="0">Select Gender</option>
                                                        <option value="1">Male</option>
                                                        <option value="2">Female</option>
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
                                                    <label class="control-label">Father's Name<sup>*</sup></label>
                                                    <input type="text" name="father_name" class="form-control" placeholder="Father Name" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <label class="control-label">Father's Occupation<sup>*</sup></label>
                                                    <input type="text" name="father_occupation" class="form-control" placeholder="Father's Occupation" required>
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
                                                    <label class="control-label">Mother's Occupation<sup>*</sup></label>
                                                    <input type="text" name="mother_occupation" class="form-control" placeholder="Mother's Occupation" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <label class="control-label">Guardian's Name </label>
                                                    <input type="text" name="guardian_name" class="form-control" placeholder="Guardian's Name" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <label class="control-label">Guardian's Occupation</label>
                                                    <input type="text" name="guardian_occupation" class="form-control" placeholder="Guardian's Occupation" required>
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
                                                    <label class="control-label">Alternate Mobile</label>
                                                    <input type="text" name="alternate_phone" class="form-control" placeholder="Alternate mobile">
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
                                                    <label class="control-label">Father/Guardian's Mobile</label>
                                                    <input type="text" name="father_guardian_phone" class="form-control" placeholder="Father/Guardian's mobile">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <label class="control-label">Nationality<sup>*</sup></label>
                                                    <input type="text" name="nationality" class="form-control" placeholder="Nationality" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <label class="control-label">Country<sup>*</sup></label>
                                                    <select name="country" class="form-control" required>
                                                        <option value="0">Select Country</option>
                                                        <option value="1">Bangladesh</option>
<!--                                                        --><?php
//                                                        foreach ($all_dept as $key => $d) {
//                                                            ?>
<!--                                                            <option value="--><?php //echo $d['id'];?><!--">--><?php //echo $d['name'];?><!--</option>}-->
<!--                                                            --><?php
//                                                        }
//                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <label class="control-label">Marital Status<sup>*</sup></label>
                                                    <select name="marital_status" class="form-control" required>
                                                        <option value="0">Select Marital Status</option>
                                                        <option value="1">Unmarried</option>
                                                        <option value="2">Married</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <label class="control-label">Religion<sup>*</sup></label>
                                                    <select name="religion" class="form-control" required>
                                                        <option value="0">Select Religion</option>
                                                        <option value="1">Islam</option>
                                                        <option value="2">Hindu</option>
                                                        <option value="3">Buddist</option>
                                                        <option value="4">Christian</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <label class="control-label">NID/Passport</label>
                                                    <input type="text" name="passport" class="form-control" placeholder="NID/Passport">
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
                                                    <label class="control-label">Passport validate date</label>
                                                    <input type="text" name="pass_validation_date" class="datepicker form-control" placeholder="Passport validate date" autocomplete="off">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <label class="control-label">Birth Certificate No</label>
                                                    <input type="text" name="birth_certificate" class="form-control" placeholder="Birth Certificate no">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <label class="control-label">Applicant's Photo(PP Size)<sup>*</sup></label>
                                                    <!--<input name="image" onchange="readURL(this)" type="file">-->
                                                    <input type="file" name="applicant_img" id="applicant_img" class="form-control">
                                                    <!-- <div class="" style="position: absolute; right:0;top:0;height: 40px;">
                                                         <img src="" id="profile-img-tag" style="height: 100%;"/>
                                                     </div>-->
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                    <br>
                                    <br>
                                    <fieldset class="border px-4 p-2">
                                        <legend class="w-auto">Academic Information</legend>
                                        <div class="row">
                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6">Examination/Degree</div>
                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6">Board Name</div>
                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6">School/College</div>
                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6">Passing Year</div>
                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6">Group/Discipline/Major</div>
                                            <div class="col-lg-1 col-md-1 col-sm-4 col-xs-6" style="font-size: 12px;">GPS/ CGPA/ Division</div>
                                            <div class="col-lg-1 col-md-1 col-sm-4 col-xs-6" style="font-size: 12px;">Marks GPA without Optional</div>
                                        </div>
                                        <div id="education_area">
                                            <div class="row" id="removeDiv1">
                                                <div class="col-md-2 col-sm-2 col-xs-6">
                                                    <div class="form-group">
<!--                                                        <label class="control-label">Examination/Degree</label>-->
                                                        <select class="form-control" name="exam[]" id="exam1" >
                                                            <option value="0">Select Exam</option>
                                                            <option value="SSC">SSC</option>
                                                            <option value="HSC">HSC</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-2 col-sm-2 col-xs-6">
                                                    <div class="form-group">
<!--                                                        <label class="control-label">Board Name</label>-->
                                                        <select class="form-control" name="board[]" id="board1" >
                                                            <option value="0">Select Board</option>
                                                            <?php foreach($all_board as $b){
                                                            ?>
                                                                <option value="<?=$b['id'];?>"><?=$b['name'];?></option>
                                                            <?php
                                                            }?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-2 col-sm-2 col-xs-6">
                                                    <div class="form-group">
<!--                                                        <label class="control-label">School/College</label>-->
                                                        <input type="text" name="institution[]" id="institution1" class="form-control" placeholder="Institution">
                                                    </div>
                                                </div>
                                                <div class="col-md-2 col-sm-2 col-xs-6">
                                                    <div class="form-group">
<!--                                                        <label class="control-label">Passing Year</label>-->
                                                        <select class="form-control" name="passing_year[]" id="passing_year1" >
                                                            <option value="0">Select Passing Year</option>
                                                            <option value="2020">2020</option>
                                                            <option value="2019">2019</option>
                                                            <option value="2018">2018</option>
                                                            <option value="2017">2017</option>
                                                            <option value="2016">2016</option>
                                                            <option value="2015">2015</option>
                                                            <option value="2014">2014</option>
                                                            <option value="2013">2013</option>
                                                            <option value="2012">2012</option>
                                                            <option value="2011">2011</option>
                                                            <option value="2010">2010</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-2 col-sm-2 col-xs-6">
                                                    <div class="form-group">
<!--                                                        <label class="control-label">Group/Discipline/Major</label>-->
                                                        <select class="form-control" name="group[]" id="group1" >
                                                            <option value="0">Select Group</option>
                                                            <option value="Science">Science</option>
                                                            <option value="Commerce">Commerce</option>
                                                            <option value="Humminities">Humminities</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-1 col-sm-1 col-xs-4">
                                                    <div class="form-group">
<!--                                                        <label class="control-label">GPS/CGPA/Division</label>-->
                                                        <input type="text" name="cgpa[]" id="cgpa1" class="form-control" placeholder="CGPA">
                                                    </div>
                                                </div>
                                                <div class="col-md-1 col-sm-1 col-xs-6">
                                                    <div class="form-group">
<!--                                                        <label class="control-label text-xs">Marks GPA without Optional</label>-->
                                                        <input type="text" name="mark_without_optional[]" id="mark_without_optional2" class="form-control" placeholder="GPA">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row" id="removeDiv2">
                                                <div class="col-md-2 col-sm-2 col-xs-6">
                                                    <div class="form-group">
<!--                                                        <label class="control-label">Examination/Degree</label>-->
                                                        <select class="form-control" name="exam[]" id="exam2" >
                                                            <option value="0">Select Exam</option>
                                                            <option value="SSC">SSC</option>
                                                            <option value="HSC">HSC</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-2 col-sm-2 col-xs-6">
                                                    <div class="form-group">
<!--                                                        <label class="control-label">Board Name</label>-->
                                                        <select class="form-control" name="board[]" id="board2" >
                                                            <option value="0">Select Board</option>
                                                            <?php foreach($all_board as $b){
                                                                ?>
                                                                <option value="<?=$b['id'];?>"><?=$b['name'];?></option>
                                                                <?php
                                                            }?>
                                                        </select>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-2 col-sm-2 col-xs-6">
                                                    <div class="form-group">
<!--                                                        <label class="control-label">School/College</label>-->
                                                        <input type="text" name="institution[]" id="institution2" class="form-control" placeholder="Institution">
                                                    </div>
                                                </div>
                                                <div class="col-md-2 col-sm-2 col-xs-6">
                                                    <div class="form-group">
<!--                                                        <label class="control-label">Passing Year</label>-->
                                                        <select class="form-control" name="passing_year[]" id="passing_year2" >
                                                            <option value="0">Select Passing Year</option>
                                                            <option value="2020">2020</option>
                                                            <option value="2019">2019</option>
                                                            <option value="2018">2018</option>
                                                            <option value="2017">2017</option>
                                                            <option value="2016">2016</option>
                                                            <option value="2015">2015</option>
                                                            <option value="2014">2014</option>
                                                            <option value="2013">2013</option>
                                                            <option value="2012">2012</option>
                                                            <option value="2011">2011</option>
                                                            <option value="2010">2010</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-2 col-sm-2 col-xs-6">
                                                    <div class="form-group">
<!--                                                        <label class="control-label">Group/Discipline/Major</label>-->
                                                        <select class="form-control" name="group[]" id="group2" >
                                                            <option value="0">Select Group</option>
                                                            <option value="Science">Science</option>
                                                            <option value="Commerce">Commerce</option>
                                                            <option value="Humminities">Humminities</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-1 col-sm-1 col-xs-4">
                                                    <div class="form-group">
<!--                                                        <label class="control-label">GPS/CGPA/Division</label>-->
                                                        <input type="text" name="cgpa[]" id="cgpa2" class="form-control" placeholder="CGPA">
                                                    </div>
                                                </div>
                                                <div class="col-md-1 col-sm-1 col-xs-6">
                                                    <div class="form-group">
<!--                                                        <label class="control-label text-xs">Marks GPA without Optional</label>-->
                                                        <input type="text" name="mark_without_optional[]" id="mark_without_optional2" class="form-control" placeholder="GPA">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row" id="removeDiv3">
                                                <div class="col-md-2 col-sm-2 col-xs-6">
                                                    <div class="form-group">
<!--                                                    <label class="control-label">Examination/Degree</label>-->
                                                        <input type="text" name="exam[]" id="exam3" class="form-control" placeholder="Bachelor Degree">
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-sm-4 col-xs-6">
                                                    <div class="form-group">
<!--                                                    <label class="control-label">Board Name</label>-->
                                                        <input type="text" name="institution[]" id="institution3" class="form-control" placeholder="University/College">
                                                    </div>
                                                </div>
                                                <div class="col-md-2 col-sm-2 col-xs-6">
                                                    <div class="form-group">
<!--                                                        <label class="control-label">Passing Year</label>-->
                                                        <select class="form-control" name="passing_year[]" id="passing_year3" >
                                                            <option value="0">Select Passing Year</option>
                                                            <option value="2020">2020</option>
                                                            <option value="2019">2019</option>
                                                            <option value="2018">2018</option>
                                                            <option value="2017">2017</option>
                                                            <option value="2016">2016</option>
                                                            <option value="2015">2015</option>
                                                            <option value="2014">2014</option>
                                                            <option value="2013">2013</option>
                                                            <option value="2012">2012</option>
                                                            <option value="2011">2011</option>
                                                            <option value="2010">2010</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-2 col-sm-2 col-xs-6">
                                                    <div class="form-group">
<!--                                                        <label class="control-label">Group/Discipline/Major</label>-->
                                                        <input type="text" name="group[]" id="group3" class="form-control" placeholder="Subject">
                                                    </div>
                                                </div>
                                                <div class="col-md-1 col-sm-1 col-xs-4">
                                                    <div class="form-group">
<!--                                                        <label class="control-label">GPS/CGPA/Division</label>-->
                                                        <input type="text" name="cgpa[]" id="cgpa3" class="form-control" placeholder="CGPA">
                                                    </div>
                                                </div>
                                                <div class="col-md-1 col-sm-1 col-xs-6">
                                                    <div class="form-group">
<!--                                                        <label class="control-label text-xs">Marks GPA without Optional</label>-->
                                                        <input type="text" name="mark_without_optional[]" id="mark_without_optional3" class="form-control" placeholder="GPA">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row" id="removeDiv4">
                                                <div class="col-md-2 col-sm-2 col-xs-6">
                                                    <div class="form-group">
<!--                                                    <label class="control-label">Examination/Degree</label>-->
                                                        <input type="text" name="exam[]" id="exam4" class="form-control" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-sm-4 col-xs-6">
                                                    <div class="form-group">
<!--                                                    <label class="control-label">Board Name</label>-->
                                                        <input type="text" name="institution[]" id="institution4" class="form-control" placeholder="University/College">
                                                    </div>
                                                </div>
                                                <div class="col-md-2 col-sm-2 col-xs-6">
                                                    <div class="form-group">
<!--                                                        <label class="control-label">Passing Year</label>-->
                                                        <select class="form-control" name="passing_year[]" id="passing_year4" >
                                                            <option value="0">Select Passing Year</option>
                                                            <option value="2020">2020</option>
                                                            <option value="2019">2019</option>
                                                            <option value="2018">2018</option>
                                                            <option value="2017">2017</option>
                                                            <option value="2016">2016</option>
                                                            <option value="2015">2015</option>
                                                            <option value="2014">2014</option>
                                                            <option value="2013">2013</option>
                                                            <option value="2012">2012</option>
                                                            <option value="2011">2011</option>
                                                            <option value="2010">2010</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-2 col-sm-2 col-xs-6">
                                                    <div class="form-group">
<!--                                                        <label class="control-label">Group/Discipline/Major</label>-->
                                                        <input type="text" name="group[]" id="group4" class="form-control" placeholder="Subject">
                                                    </div>
                                                </div>
                                                <div class="col-md-1 col-sm-1 col-xs-4">
                                                    <div class="form-group">
<!--                                                        <label class="control-label">GPS/CGPA/Division</label>-->
                                                        <input type="text" name="cgpa[]" id="cgpa4" class="form-control" placeholder="CGPA">
                                                    </div>
                                                </div>
                                                <div class="col-md-1 col-sm-1 col-xs-6">
                                                    <div class="form-group">
<!--                                                        <label class="control-label text-xs">Marks GPA without Optional</label>-->
                                                        <input type="text" name="mark_without_optional[]" id="mark_without_optional4" class="form-control" placeholder="GPA">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row" id="removeDiv5">
                                                <div class="col-md-2 col-sm-2 col-xs-6">
                                                    <div class="form-group">
<!--                                                    <label class="control-label">Examination/Degree</label>-->
                                                        <input type="text" name="masters_degree[]" id="masters_degree" class="form-control" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-sm-4 col-xs-6">
                                                    <div class="form-group">
<!--                                                    <label class="control-label">Board Name</label>-->
                                                        <input type="text" name="university_name[]" id="university_name" class="form-control" placeholder="University/College">
                                                    </div>
                                                </div>
                                                <div class="col-md-2 col-sm-2 col-xs-6">
                                                    <div class="form-group">
<!--                                                        <label class="control-label">Passing Year</label>-->
                                                        <select class="form-control" name="passing_year[]" id="passing_year2" >
                                                            <option value="0">Select Passing Year</option>
                                                            <option value="2020">2020</option>
                                                            <option value="2019">2019</option>
                                                            <option value="2018">2018</option>
                                                            <option value="2017">2017</option>
                                                            <option value="2016">2016</option>
                                                            <option value="2015">2015</option>
                                                            <option value="2014">2014</option>
                                                            <option value="2013">2013</option>
                                                            <option value="2012">2012</option>
                                                            <option value="2011">2011</option>
                                                            <option value="2010">2010</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-2 col-sm-2 col-xs-6">
                                                    <div class="form-group">
<!--                                                        <label class="control-label">Group/Discipline/Major</label>-->
                                                        <input type="text" name="subject[]" id="subject" class="form-control" placeholder="Subject">
                                                    </div>
                                                </div>
                                                <div class="col-md-1 col-sm-1 col-xs-4">
                                                    <div class="form-group">
<!--                                                        <label class="control-label">GPS/CGPA/Division</label>-->
                                                        <input type="text" name="edu_cgpa[]" id="edu_cgpa2" class="form-control" placeholder="CGPA">
                                                    </div>
                                                </div>
                                                <div class="col-md-1 col-sm-1 col-xs-6">
                                                    <div class="form-group">
<!--                                                        <label class="control-label text-xs">Marks GPA without Optional</label>-->
                                                        <input type="text" name="mark_without_optional[]" id="mark_without_optional2" class="form-control" placeholder="GPA">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                    <div class="form-group">
                                                        <label class="control-label">SSC Transcript Image<sup>*</sup></label>
                                                        <input type="file" name="ssc_transcript" id="ssc_transcript" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                    <div class="form-group">
                                                        <label class="control-label">HSC Transcript Image<sup>*</sup></label>
                                                        <input type="file" name="hsc_transcript" id="hsc_transcript" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                    <div class="form-group">
                                                        <label class="control-label">Degree/Honours Transcript Image<span style="font-size: 12px;"> (For masters applicant)</span></label>
                                                        <input type="file" name="degree_honours_transcript" id="degree_honours_transcript" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                    <br>
                                    <br>
                                    <div id="present_area">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                <fieldset class="border px-4 p-2">
                                                <legend class="w-auto">Present Address</legend>
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <div class="row form-group">
                                                            <label class="col-6 control-label">House No./Name</label>
                                                            <input type="text" name="house_no" id="house_no" class="col-6 form-control" placeholder="House No./Name">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <div class="row form-group">
                                                            <label class="col-6 control-label">Road/Village(*)</label>
                                                            <input type="text" name="road_village" id="Road_Village" class="col-6 form-control" placeholder="Road/Village">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <div class="row form-group">
                                                            <label class="col-6 control-label">Lane</label>
                                                            <input type="text" name="lane" id="Lane" class="col-6 form-control" placeholder="Lane">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <div class="row form-group">
                                                            <label class="col-6 control-label">Block</label>
                                                            <input type="text" name="block" id="block" class="col-6 form-control" placeholder="Block">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <div class="row form-group">
                                                            <label class="col-6 control-label">Area/Post Office(*)</label>
                                                            <input type="text" name="area" id="area" class=" col-6 form-control" placeholder="Area">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <div class="row form-group">
                                                            <label class="col-6 control-label">Thana/Upozilla(*)</label>
                                                            <input type="text" name="thana" id="thana" class="col-6 form-control" placeholder="Thana/Upozilla">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <div class="row form-group">
                                                            <label class="col-6 control-label">District</label>
                                                            <input type="text" name="district" id="district" class="col-6 form-control" placeholder="district">
                                                        </div>
                                                    </div>
                                                </div>
                                                </fieldset>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                <fieldset class="border px-4 p-2">
                                                <legend class="w-auto">Permanent Address <label style="font-size: 14px;"><input type="checkbox" id="same_addr"> Click the box if same as present address.</label></legend>
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <div class="row form-group">
                                                            <label class="col-6 control-label">House No./Name</label>
                                                            <input type="text" name="permanent_house_no" id="permanent_house_no" class="col-6 form-control" placeholder="House No./Name">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <div class="row form-group">
                                                            <label class="col-6 control-label">Road/Village(*)</label>
                                                            <input type="text" name="permanent_road_village" id="permanent_road_village" class="col-6 form-control" placeholder="Road/Village">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <div class="row form-group">
                                                            <label class="col-6 control-label">Lane</label>
                                                            <input type="text" name="permanent_lane" id="permanent_lane" class="col-6 form-control" placeholder="Lane">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <div class="row form-group">
                                                            <label class="col-6 control-label">Block</label>
                                                            <input type="text" name="permanent_block" id="permanent_block" class="col-6 form-control" placeholder="Block">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <div class="row form-group">
                                                            <label class="col-6 control-label">Area/Post Office(*)</label>
                                                            <input type="text" name="permanent_area" id="permanent_area" class=" col-6 form-control" placeholder="Area">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <div class="row form-group">
                                                            <label class="col-6 control-label">Thana/Upozilla(*)</label>
                                                            <input type="text" name="permanent_thana" id="permanent_thana" class="col-6 form-control" placeholder="Thana/Upozilla">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <div class="row form-group">
                                                            <label class="col-6 control-label">District</label>
                                                            <input type="text" name="permanent_district" id="permanent_district" class="col-6 form-control" placeholder="district">
                                                        </div>
                                                    </div>
                                                </div>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <fieldset class="border px-4 py-2 mb-4">
                                        <legend  class="w-auto"><img src="<?=base_url();?>assets/images/bkash.png" style="width: 100px;"></span> Payment - <span>Merchant Account No: <b>01713256001</b> Through <span style="background: #E0156E;color: #fff;padding: 0 4px;">Payment</span> Option</span></legend>
                                        <div class="row">
                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                <div class="form-group">
                                                    <label class="control-label">Sender Mobile No<sup>*</sup></label>
                                                    <input type="text" name="sender_number" id="sender_number" class="form-control" placeholder="Sender Number" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                <div class="form-group">
                                                    <label class="control-label">Transaction ID<sup>*</sup></label>
                                                    <input type="text" name="transaction_id" id="transaction_id" class="form-control" placeholder="Transaction ID" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                <div class="form-group">
                                                    <label class="control-label">Reference/<b>Student ID</b><sup>*</sup></label>
                                                    <input type="text" name="reference" id="reference" class="form-control" placeholder="Reference/Student ID">
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                <div class="form-group">
                                                    <label class="control-label">Amount<sup>*</sup></label>
                                                    <input type="text" name="amount" id="amount" class="form-control" placeholder="Amount" required>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                    <br>
                                    <fieldset class="border px-4 p-2">
                                        <legend class="w-auto">For Login</legend>
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <label class="control-label">Password<sup>*</sup></label>
                                                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <label class="control-label">Confirm Password<sup>*</sup></label>
                                                    <input type="password" name="confirm_password" class="form-control" placeholder="Confirm Password" required>
                                                </div>
                                            </div>
                                            <!-- security token -->
                                            <!-- end security token -->
                                            <div class="offset-lg-4 col-lg-4 offset-md-4 col-md-4 offset-sm-4 col-sm-4 col-xs-12">
                                                <div class="form-group">
                                                    <label class="control-label">&nbsp;</label>
                                                    <button onclick="return(confirm('Confirm?'))" type="submit" name="submit" class="btn btn-primary form-control text-white">Submit</button>
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
                var pass = $('#password').val();
                var pass_confirm = $('#confirm_password').val();

                $('#dept').on('change',function () {
                    var dept = $(this).val();
                    if(dept == 2){
                        $('#evening').removeAttr('style');
                        /*$('#morning').prop('selected', false);
                        $('#evening').prop('selected', true);*/
                    }else{
                        $('#evening').attr('style','display: none;');
                        /*$('#morning').prop('selected', true);
                        $('#evening').prop('selected', false);*/
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
        </div>
    </div>
</div>