<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="row">
            <!-- <div class="col-xs-12">
                <h4 class="page-title">Notice</h4>
            </div> -->
            <?php if($success == 1){?>
            <script>
            	alert("New Student Successfully added.");
            </script>
        	<?php }?>
        	
            <div class="card-box">
            	<div class="notice-form">
	                <h2 class="text-center">Add New Student</h2>
	                <br>
					<?php echo validation_errors(); 
						//$p = ddd;
						//$p = 'bb123';
        				//echo 'hash of '.$p.': '. md5(sha1(md5($p)));
					?>

					<form action="<?php echo base_url();?>admin/insert_student" enctype="multipart/form-data" method="post">

                        <input type="hidden" name="student_id" value="<?php if(!empty($info)){echo $info->id;}?>">
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
	                                    <option value="1">Current Student</option>
	                                   <!--  <option value="2">Alumni</option> -->
	                                </select>
			                    </div>
							</div>
							<!-- <div class="col-md-6 col-sm-6 col-xs-12">
			                    <div class="form-group">
			                        <label class="control-label">Ending Date</label>
		                            <input type="text" name="ending_date" class="datepicker form-control" placeholder="Ending Date">
			                    </div>
							</div> -->
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
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Image</label>
                                        <input name="student_image" id="student_image" class="form-control" type="file">
                                    </div>
                                </div>
                                <div class="col-md-6" id="image-holder">
                                    <img src="<?=base_url()?>assets/images/students/<?php if(!empty($info)){echo $info->image;}?>" alt="" width="100" height="100">
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
</div>