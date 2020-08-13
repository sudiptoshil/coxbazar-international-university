<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cox's Bazar International University</title>
    <link rel="icon" type="image/png" href="../asset/image/cbiu.png" />
    <link rel="stylesheet" href="../asset/bootstrap.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="../asset/jquery.fancybox.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.css">

    <link rel="stylesheet" href="../asset/style.css">
    <link rel="stylesheet" href="../asset/utils.css">

    <script type="text/javascript" src="../asset/jquery.fancybox.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.js"></script>
    <script src="../asset/jquery-3.4.1.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="../asset/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script type="text/javascript" src="../asset/bootstrap.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="../asset/title/ticker.css">
    <script src="../asset/title/ticker.js"></script>



    <link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <style>
        .notices {
            width: 50%;
            margin: 0 auto;
            text-align: justify;
            text-justify: inter-word;
        }

        .all-notice,
        .li {
            font-size: 20px;
            text-align: center;
            color: #202040;
            top: 0;
            bottom: 0;
        }

        @media (max-width: 768px) {
            .notices {
            width: 100%;
            margin: 0 auto;
            text-align: justify;
            text-justify: inter-word;
            padding: 20px;
        }
        }
    </style>
    
    
  <script type="text/javascript">
  function validateForm() {
  
  
       
  var x = document.forms["myForm"]["StudentInfo[techCode]"].value;
  if (x == "") {
    alert("Department must be filled out");
    return false;
  }
  
  var x = document.forms["myForm"]["StudentInfo[boardId]"].value;
  if (x == "") {
    alert("Board Name must be filled out");
    return false;
  }
  
  
  var x = document.forms["myForm"]["StudentInfo[boardGroup]"].value;
  if (x == "") {
    alert("Group must be filled out");
    return false;
  }
  
  
  var x = document.forms["myForm"]["StudentInfo[boardPassingYear]"].value;
  if (x == "") {
    alert("Passing Year must be filled out");
    return false;
  }
  
  
  var x = document.forms["myForm"]["StudentInfo[boardGpa]"].value;
  if (x == "") {
    alert("GPA must be filled out");
    return false;
  }
  
  
  var x = document.forms["myForm"]["StudentInfo[hscRoll]"].value;
  if (x == "") {
    alert("Roll Number must be filled out");
    return false;
  }
  
  
  
  var x = document.forms["myForm"]["StudentInfo[hscRegNo]"].value;
  if (x == "") {
    alert("REG Number must be filled out");
    return false;
  }
  

  

  
  var x = document.forms["myForm"]["StudentInfo[name]"].value;
  if (x == "") {
    alert("Name must be filled out");
    return false;
  }
  
  
  var x = document.forms["myForm"]["StudentInfo[mobile]"].value;
  if (x == "") {
    alert("Mobile Number must be filled out");
    return false;
  }
  

  var x = document.forms["myForm"]["StudentInfo[dob]"].value;
  if (x == "") {
    alert("Date of birth must be filled out");
    return false;
  }
  
  


  
   var x = document.forms["myForm"]["StudentInfo[presentAddress]"].value;
  if (x == "") {
    alert("Present Address must be filled out");
    return false;
  }
  
  
   var x = document.forms["myForm"]["StudentInfo[prDistrict]"].value;
  if (x == "") {
    alert("Present District must be filled out");
    return false;
  }
  
  

    var x = document.forms["myForm"]["StudentInfo[email]"].value;
 var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
if(x.match(mailformat)) {
   
}
    else {
    alert("Email must be valid");
    return false;
  } 
  
      
  
 
          var x = document.forms["myForm"]["hsc_acad_transfer"].value;
  if (x == "") {
    alert("HSC Academic Transfer must be attached");
    return false;
  }
  
  
   
    var x = document.forms["myForm"]["photo_1"].value;
  if (x == "") {
    alert("Photo must be attached");
    return false;
  }
  
  
 
  
  
}


// File validation

function fileValidation(file) {
    
    //alert(file);
    
    
            var fileInput = document.getElementById(file); 
              
            var filePath = fileInput.value; 
          
            // Allowing file type 
            var allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i; 
              
            if (!allowedExtensions.exec(filePath)) { 
                alert('Invalid file type'); 
                fileInput.value = ''; 
                return false; 
            }  
            else  
            { 
              
                // Image preview 
                if (fileInput.files && fileInput.files[0]) { 
                    var reader = new FileReader(); 
                    reader.onload = function(e) { 
                        document.getElementById( 
                            'imagePreview').innerHTML =  
                            '<img src="' + e.target.result 
                            + '"/>'; 
                    }; 
                      
                    reader.readAsDataURL(fileInput.files[0]); 
                } 
            } 
        } 

</script>   
    
</head>

<body>
    
    
    <?php include_once("header.html"); ?>
    
    

<section class="divider bg-lighter">
    <div class="display-table">
        <div class="display-table-cell">
            <div class="container pb-100">

                <div class="section-content title-box-left" style="background-color: #fff;">
                    <div class="row">
                        <div class="col-md-12">
                            <h3 class="text-theme-colored text-center pb-4" style="font-weight: normal; padding-left: 15px;">Online Student Addmission Form</h3>
                        </div>
                    </div>
                </div>

                                <div class="row">
                    <div class="col-md-12">
                        <form  name="myForm" class="form-horizontal" action="http://cbiu.ac.bd/admission_apply.php"  onsubmit="return validateForm()" method="post" enctype="multipart/form-data">


                        <div class="panel panel-info">
                            <div class="panel-heading alert alert-primary">
                                <h4 class="text-theme-colored text-uppercase text-bold m-0">Applied Department</h4>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                <div class="col-md-6 bg-lightest">
                                        <div style="">
                                            <div class="form-group mb-10">
                                            <div class="form-group field-studentinfo-techcode required">
<label class="control-label col-sm-3" for="studentinfo-techcode">Department</label>
<div class="col-sm-9">
<select id="studentinfo-techcode" class="form-control" name="StudentInfo[techCode]"  aria-required="true">
<option value="">Select Department</option>
<optgroup label="Faculty of Arts and Social Sciences">
<option value="1">Department of English</option>
<option value="2">Department of Islamic Studies</option>
<option value="8">Department of Library and Information Science</option>
</optgroup>
<optgroup label="Faculty of Business Administration">
<option value="3">Department of Business Administration</option>
<option value="4">Department of Hospitability and Tourism Management</option>
</optgroup>
<optgroup label="Faculty of Law">
<option value="5">Department of Law</option>
</optgroup>
<optgroup label="Faculty of Science and Engineering">
<option value="6">Computer Science and Engineering (CSE)</option>
<option value="7">Department of Electrical and Electronic Engineering (EEE)</option>
</optgroup>
</select>

<p class="help-block help-block-error "></p>
</div>
</div>                                            </div>






                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6 bg-lightest">
                                        
    <div class="form-group mb-10">
                                                <div>
                                                    <div class="form-group field-studentinfo-shiftid">
<label class="control-label col-sm-3" for="studentinfo-shiftid">Shift</label>
<div class="col-sm-9">
<select id="studentinfo-shiftid" class="form-control" name="StudentInfo[shiftId]">
<option value="">Select Shift</option>
<option value="1">Morning</option>
<option value="3">Evening</option>
</select>

<p class="help-block help-block-error "></p>
</div>
</div>                                                </div>
                                            </div>
                                    </div>
                                                            </div>
                                                            </div>




<div class="panel-heading alert alert-primary">
                                <h4 class="text-theme-colored text-uppercase text-bold m-0">Academic Information</h4>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                 <div class="col-md-6 bg-lightest">
                                        <div style="">
                                            

                                                                                    

                                            <div class="form-group mb-10">
                                                <div class="form-group field-studentinfo-boardid required">
<label class="control-label col-sm-3" for="studentinfo-boardid">Board Name</label>
<div class="col-sm-9">
<select id="studentinfo-boardid" class="form-control" name="StudentInfo[boardId]" aria-required="true">
<option value="">Select Board</option>
<option value="1">Dhaka</option>
<option value="2">Khulna</option>
<option value="3">Chittagong</option>
<option value="4">Rajshahi</option>
<option value="5">Sylhet</option>
<option value="7">Dinajpur</option>
<option value="8">Barisal</option>
<option value="9">Jessore</option>
<option value="10">Technical</option>
<option value="12">Madrasha</option>
<option value="14">Comilla</option>
<option value="15">Rangpur</option>
<option value="17">BTEB</option>
</select>

<p class="help-block help-block-error "></p>
</div>
</div>                                            </div>

                                            <div class="form-group mb-10">
                                                <div class="form-group field-studentinfo-boardgroup required">
<label class="control-label col-sm-3" for="studentinfo-boardgroup">Group</label>
<div class="col-sm-9">
<select id="studentinfo-boardgroup" class="form-control" name="StudentInfo[boardGroup]" aria-required="true">
<option value="">Select Group</option>
<option value="1">Science</option>
<option value="2">Arts</option>
<option value="3">Commerce</option>
</select>

<p class="help-block help-block-error "></p>
</div>
</div>                                            </div>

  <div class="form-group mb-10">
                                                <div class="form-group field-studentinfo-boardpassingyear required">
<label class="control-label col-sm-6" for="studentinfo-boardpassingyear">Board Passing Year</label>
<div class="col-sm-9">
<input type="text" id="studentinfo-boardpassingyear" class="form-control" name="StudentInfo[boardPassingYear]" maxlength="5" aria-required="true">

<p class="help-block help-block-error "></p>
</div>
</div>                                            </div>

                                        </div>
                                    </div>

                                    <div class="col-md-6 bg-lightest">
                                        <div style="">
                                          


                                            <div class="form-group mb-10">
                                                <div class="form-group field-studentinfo-boardgpa required">
<label class="control-label col-sm-3" for="studentinfo-boardgpa">Board GPA</label>
<div class="col-sm-9">
<input type="text" id="studentinfo-boardgpa" class="form-control" name="StudentInfo[boardGpa]" aria-required="true">

<p class="help-block help-block-error "></p>
</div>
</div>                                            </div>


                                            <div class="form-group mb-10">
                                                <div class="form-group field-studentinfo-sscroll required">
<label class="control-label col-sm-3" for="studentinfo-sscroll">HSC Roll</label>
<div class="col-sm-9">
<input type="text" id="studentinfo-sscroll" class="form-control" name="StudentInfo[hscRoll]" aria-required="true">

<p class="help-block help-block-error "></p>
</div>
</div>                                            </div>

                                            <div class="form-group mb-10">
                                                <div class="form-group field-studentinfo-sscregno required">
<label class="control-label col-sm-3" for="studentinfo-sscregno">HSC Reg No</label>
<div class="col-sm-9">
<input type="text" id="studentinfo-sscregno" class="form-control" name="StudentInfo[hscRegNo]" aria-required="true">

<p class="help-block help-block-error "></p>
</div>
</div>                                            </div>

                                        
                          
        <div class="form-group mb-10">
                                                <div class="form-group field-studentinfo-sscregno required">
<label class="control-label col-sm-12" for="studentinfo-sscregno">HSC Academinc Transfer Attachement</label>
<div class="col-sm-9">

<input type="file" id="file" class="form-control" name="hsc_acad_transfer"  onchange="return fileValidation(this.id)" />

<p class="help-block help-block-error "></p>
</div>
</div>                                            </div>                  
                          
                                        
                                        
                                        </div>
                                    </div>
                                                            </div>
                                                        </div>






                            <div class="panel-heading alert alert-primary">
                                <h4 class="text-theme-colored text-uppercase text-bold m-0">Personal Information</h4>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                <div class="col-md-6 bg-lightest">
                                    <div style="">
                                        <div class="form-group mb-10">
                                            <div class="form-group field-studentinfo-name required">
<label class="control-label col-sm-3" for="studentinfo-name">Student Name</label>
<div class="col-sm-9">
<input type="text" id="studentinfo-name" class="form-control" name="StudentInfo[name]" maxlength="100" aria-required="true">

<p class="help-block help-block-error "></p>
</div>
</div>                                        </div>
                                        <div class="form-group mb-10">
                                            <div class="form-group field-studentinfo-fathername required">
<label class="control-label col-sm-3" for="studentinfo-fathername">Father Name</label>
<div class="col-sm-9">
<input type="text" id="studentinfo-fathername" class="form-control" name="StudentInfo[fatherName]" maxlength="100" aria-required="true">

<p class="help-block help-block-error "></p>
</div>
</div>                                        </div>
                                        <div class="form-group mb-10">
                                            <div class="form-group field-studentinfo-mothername required">
<label class="control-label col-sm-3" for="studentinfo-mothername">Mother Name</label>
<div class="col-sm-9">
<input type="text" id="studentinfo-mothername" class="form-control" name="StudentInfo[motherName]" maxlength="100" aria-required="true">

<p class="help-block help-block-error "></p>
</div>
</div>                                        </div>
                                        <div class="form-group mb-10">
                                            <div class="form-group field-studentinfo-guardianname required">
<label class="control-label col-sm-3" for="studentinfo-guardianname">Guardian Name</label>
<div class="col-sm-9">
<input type="text" id="studentinfo-guardianname" class="form-control" name="StudentInfo[guardianName]" maxlength="100" aria-required="true">

<p class="help-block help-block-error "></p>
</div>
</div>                                        </div>
                                        <div class="form-group mb-10">
                                            <div class="form-group field-studentinfo-guardianmobile required">
<label class="control-label col-sm-3" for="studentinfo-guardianmobile">Guardian Mobile</label>
<div class="col-sm-9">
<input type="text" id="studentinfo-guardianmobile" class="form-control" name="StudentInfo[guardianMobile]" aria-required="true">

<p class="help-block help-block-error "></p>
</div>
</div>                                        </div>
                                        <div class="form-group mb-10">
                                            <div class="form-group field-studentinfo-dob required">
<label class="control-label col-sm-3" for="studentinfo-dob">Date of Birth</label>
<div class="col-sm-9">
<input type="text" id="studentinfo-dob" class="form-control" name="StudentInfo[dob]" placeholder="yyyy-mm-dd" style="z-index:9999">


<p class="help-block help-block-error "></p>
</div>
</div>                                        </div>


<!--new div-->

                                        <div class="form-group mb-10">
                                            <div class="form-group field-studentinfo-gender required">
<label class="control-label col-sm-3" for="studentinfo-gender">Gender</label>
<div class="col-sm-9">
<select id="studentinfo-gender" class="form-control" name="StudentInfo[gender]" aria-required="true">
<option value="">Select Gender</option>
<option value="1">Male</option>
<option value="2">Female</option>
</select>

<p class="help-block help-block-error "></p>
</div>
</div>                                        </div>

                                    </div>
                                </div>

                                <div class="col-md-6 bg-lightest">
                                    <div style="">

                                        <div class="form-group mb-10">
                                            <div class="form-group field-studentinfo-religion required">
<label class="control-label col-sm-3" for="studentinfo-religion">Religion</label>
<div class="col-sm-9">
<select id="studentinfo-religion" class="form-control" name="StudentInfo[religion]" aria-required="true">
<option value="">Select Religion</option>
<option value="1">Islam</option>
<option value="2">Hindu</option>
<option value="3">Christian</option>
<option value="4">Buddhist</option>
</select>

<p class="help-block help-block-error "></p>
</div>
</div>                                        </div>

                                        <div class="form-group mb-10">
                                            <div class="form-group field-studentinfo-nationality required">
<label class="control-label col-sm-3" for="studentinfo-nationality">Nationality</label>
<div class="col-sm-9">
<input type="text" id="studentinfo-nationality" class="form-control" name="StudentInfo[nationality]" value="Bangladeshi" aria-required="true">

<p class="help-block help-block-error "></p>
</div>
</div>                                        </div>

                                        <div class="form-group mb-10">
                                            <div class="form-group field-studentinfo-mobile required">
<label class="control-label col-sm-3" for="studentinfo-mobile">Mobile</label>
<div class="col-sm-9">
<input type="text" id="studentinfo-mobile" class="form-control" name="StudentInfo[mobile]" maxlength="11" aria-required="true">

<p class="help-block help-block-error "></p>
</div>
</div>                                        </div>

                                        <div class="form-group mb-10">
                                            <div class="form-group field-studentinfo-email">
<label class="control-label col-sm-3" for="studentinfo-email">Email</label>
<div class="col-sm-9">
<input type="text" id="studentinfo-email" class="form-control" name="StudentInfo[email]" maxlength="50">

<p class="help-block help-block-error "></p>
</div>
</div>                                        </div>

                                        <div class="form-group mb-10">
                                            <div class="form-group field-studentinfo-bloodgroup required">
<label class="control-label col-sm-3" for="studentinfo-bloodgroup">Blood Group</label>
<div class="col-sm-9">
<select id="studentinfo-bloodgroup" class="form-control" name="StudentInfo[bloodGroup]" aria-required="true">
<option value="">Select Blood Group</option>
<option value="1">O−</option>
<option value="2">O+</option>
<option value="3">A-</option>
<option value="4">A+</option>
<option value="5">B−</option>
<option value="6">B+</option>
<option value="7">AB-</option>
<option value="8">AB+</option>
<option value="9">Unknown</option>
</select>

<p class="help-block help-block-error "></p>
</div>
</div>                                        </div>



       <div class="form-group mb-10">
                                                <div class="form-group field-studentinfo-sscregno required">
<label class="control-label col-sm-12" for="studentinfo-sscregno">Photo</label>
<div class="col-sm-9">

<input type="file" id="file1" class="form-control" name="photo_1"  onchange="return fileValidation(this.id)" />

<p class="help-block help-block-error "></p>
</div>
</div>                                            </div> 





                                                                                   </div>
                                </div>
                            </div>
                             </div>

<!--row add-->


                            <div class="panel-heading alert alert-primary">
                                <h4 class="text-theme-colored text-uppercase text-bold m-0">Present & Permanent Address</h4>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                <div class="col-md-6 bg-lightest">
                                    <div style="">
                                        <div class="form-group mb-10">
                                            <div class="form-group field-studentinfo-presentaddress required">
<label class="control-label col-sm-3" for="studentinfo-presentaddress">Present Address</label>
<div class="col-sm-9">
<textarea id="studentinfo-presentaddress" class="form-control" name="StudentInfo[presentAddress]" maxlength="150" aria-required="true"></textarea>

<p class="help-block help-block-error "></p>
</div>
</div>                                        </div>
                                        <div class="form-group mb-10">
                                            <div class="form-group field-studentinfo-prdistrict required">
<label class="control-label col-sm-3" for="studentinfo-prdistrict">Present District</label>
<div class="col-sm-9">
<select id="studentinfo-prdistrict" class="form-control" name="StudentInfo[prDistrict]" onchange="
                                                    $.get( &quot;/ajax/getpresentthana&quot;, { id: $(this).val() } )
                                                    .done(function( data ) {
                                                       $( &quot;#studentinfo-prthanaid&quot; ).html( data );
                                                        }
                                                    );" aria-required="true">
<option value="">Select District </option>

<?php 

$servername = "localhost";
$username = "p9epkpjrusys";
$password = "Shamima@2001";
$dbname = "cursor";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

$query = "SELECT id,name FROM `districts`";

$result1 = mysqli_query($conn, $query);

 while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[0];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>

</select>


<p class="help-block help-block-error "></p>
</div>
</div>                                        </div>
                                        <div class="form-group mb-10">
                                            <div class="form-group field-studentinfo-prthanaid required">
<label class="control-label col-sm-3" for="studentinfo-prthanaid">Present Thana</label>
<div class="col-sm-9">
<select id="studentinfo-prthanaid" class="form-control" name="StudentInfo[prThanaId]" aria-required="true">
<option value="">Select Thana</option>


<?php 

$query = "SELECT id,name FROM `upazilas`";

$result1 = mysqli_query($conn, $query);

 while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[0];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>

</select>

<p class="help-block help-block-error "></p>
</div>
</div>                                        </div>

                                    </div>
                                </div>

                                <div class="col-md-6 bg-lightest">
                                    <div style="">
                                        <div class="form-group mb-10">
                                            <div class="form-group field-studentinfo-permanentaddress required">
<label class="control-label col-sm-3" for="studentinfo-permanentaddress">Permanent Address</label>
<div class="col-sm-9">
<textarea id="studentinfo-permanentaddress" class="form-control" name="StudentInfo[permanentAddress]" maxlength="150" aria-required="true"></textarea>

<p class="help-block help-block-error "></p>
</div>
</div>                                            
                                        </div>
                                        <div class="form-group mb-10">
                                            <div class="form-group field-studentinfo-perdistrict required">
<label class="control-label col-sm-3" for="studentinfo-perdistrict">Permanent District</label>
<div class="col-sm-9">
<select id="studentinfo-perdistrict" class="form-control" name="StudentInfo[perDistrict]" onchange="
                                                    $.get( &quot;/ajax/getpermenantthana&quot;, { id: $(this).val() } )
                                                    .done(function( data ) {
                                                        $( &quot;#studentinfo-perthanaid&quot; ).html( data );
                                                    }
                                                 );" aria-required="true">
<option value="">Select District </option>


<?php 

$query = "SELECT id,name FROM `districts`";

$result1 = mysqli_query($conn, $query);

 while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[0];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>


</select>

<p class="help-block help-block-error "></p>
</div>
</div>                                        </div>
                                        <div class="form-group mb-10">
                                            <div class="form-group field-studentinfo-perthanaid required">
<label class="control-label col-sm-3" for="studentinfo-perthanaid">Permanent Thana</label>
<div class="col-sm-9">
<select id="studentinfo-perthanaid" class="form-control" name="StudentInfo[perThanaId]" aria-required="true">
<option value="">Select Thana</option>



<?php 

$query = "SELECT id,name FROM `upazilas`";

$result1 = mysqli_query($conn, $query);

 while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[0];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>


</select>

<p class="help-block help-block-error "></p>
</div>
</div>                                        </div>

                                    </div>
                                </div>
                            </div>
                            </div>

                            <div class="panel-body" style="padding-bottom:  50px;">
                                <div class="col-md-7 bg-lightest col-sm-offset-5">
                                    <div class="form-group mb-0">
                                        <div class="form-group field-studentinfo-sessid required">

<div class="col-sm-9 col-sm-offset-3">
<input type="hidden" id="studentinfo-sessid" class="form-control" name="StudentInfo[sessId]" value="4">

<p class="help-block help-block-error "></p>
</div>
</div>                                        <button type="submit" class="btn btn-dark btn-lg btn-theme-colored">Register Now </button>                                    </div>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>



    
    
    
    
    
    
    
    
    
     <?php include_once("footer.html"); ?>

</body>

</html>