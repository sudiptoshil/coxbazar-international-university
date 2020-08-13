<div class="profile-area wrapper-area">
	<div class="section-top-banner">
		<!-- <img src="images/campus-img.jpg" alt="TECN"> -->
		<div class="container">
			<div class="section-top-banner-links">
				<h1>Profile</h1>
				<nav aria-label="breadcrumb">
				  <ol class="breadcrumb">
				    <li class="breadcrumb-item"><a href="<?php echo base_url();?>">Home</a></li>
				    <li class="breadcrumb-item"><a href="<?=base_url();?>faculty">Faculty</a></li>
				    <li class="breadcrumb-item active" aria-current="page">Profile</li>
				  </ol>
				</nav>
			</div>
		</div>
	</div>
    <?php $id = $teacher_id;?>
	<div class="profile-area-body wrapper-area-body">
		<div class="container">
		    <h5 class="border-bottom text-center text-light main-bg p-2 mb-4">
   				Faculty Profile
   			</h5>
			<div class="row">
				<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
				    <div class="wrapper-area-body-left">
				        <div class="text-center">
                            <?php if(!empty($this->common->getSpecificField('teachers','id',$id,'image'))){
                            ?>
                            <img width="180px;" src="<?php echo base_url()?>assets/images/teachers/<?php echo $this->common->getSpecificField('teachers','id',$id,'image');?>" alt="" class="rounded-circle img-thumbnail mb-4">
                            <?php
                            }else{
                            ?>
                            <img width="180px;" src="<?php echo base_url()?>assets/images/noimage.png" alt="" class="rounded-circle img-thumbnail mb-4">
                            <?php
                            }?>
				        </div>
			   			<div class="list-group"  role="tablist">
							<a class="list-group-item list-group-item-action list-group-item-light text-center active" data-toggle="list" href="#home" role="tab" aria-controls="home">
							 	Home
							</a>
							<a class="list-group-item list-group-item-action list-group-item-light text-center" data-toggle="list" href="#education" role="tab" aria-controls="education">
								Education
							</a>
							<a class="list-group-item list-group-item-action list-group-item-light text-center" data-toggle="list" href="#job_experience" role="tab" aria-controls="job_experience">
								Job Experience
							</a>
							<a class="list-group-item list-group-item-action list-group-item-light text-center" data-toggle="list" href="#other_experience" role="tab" aria-controls="other_experience">
								Other
							</a>
							<!--<a class="list-group-item list-group-item-action list-group-item-light text-center" data-toggle="list" href="#experience" role="tab" aria-controls="experience">
							 	Experience
							</a>-->
							<a class="list-group-item list-group-item-action list-group-item-light text-center" data-toggle="list" href="#research" role="tab" aria-controls="research">
							 	Research & Publication
							</a>
						</div>
					</div>
				</div>
				<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
		   			<div class="wrapper-area-body-right">
		   				<div class="tab-content" id="nav-tabContent">
					      	<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home">
				   				<h5 class="wrapper-area-body-right-card-heading border-bottom text-cente mb-3">
					   				Home
					   			</h5>
				   				<div class="wrapper-card-right-body">
                                    <div class="row">
                                        <label class="col-sm-2 col-form-label pt-3">Name</label>
                                        <div class="col-sm-10">
                                          <div class="form-control-plaintext">
                                              <?php echo $this->common->getSpecificField('teachers','id',$id,'name');?>
                                          </div>
                                        </div>
                                        <!--<div class="pt-3">
                                            <label for="staticEmail" class="col-sm-2 col-form-label">Name</label>
                                            <div class="col-sm-10">
                                                <h4 class="pt-3"><?php echo $this->common->getSpecificField('teachers','id',$id,'name');?></h4>
                                            </div>
                                        </div>-->
                                    </div>
                                    <div class="row">
                                        <label for="staticEmail" class="col-sm-2 col-form-label">Department</label>
                                        <div class="col-sm-10">
                                          <div class="form-control-plaintext"><?php echo $this->common->getSpecificField('dept','id',$this->common->getSpecificField('teachers','id',$id,'dept'),'name');?></div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">Designation</label>
                                        <div class="col-sm-10">
                                            <div class="form-control-plaintext"><?php echo $this->common->getSpecificField('designation','id',$this->common->getSpecificField('teachers','id',$id,'designation'),'name');?></div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">Phone</label>
                                        <div class="col-sm-10">
                                            <div class="form-control-plaintext"><?php echo $this->common->getSpecificField('teachers','id',$id,'phone');?></div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">Email</label>
                                        <div class="col-sm-10">
                                          <div class="form-control-plaintext"><?php echo $this->common->getSpecificField('teachers','id',$id,'email');?></div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">Father's Name</label>
                                        <div class="col-sm-10">
                                          <div class="form-control-plaintext"><?php echo $this->common->getSpecificField('teachers','id',$id,'father_name');?></div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">Mother's Name</label>
                                        <div class="col-sm-10">
                                          <div class="form-control-plaintext"><?php echo $this->common->getSpecificField('teachers','id',$id,'mother_name');?></div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">NID</label>
                                        <div class="col-sm-10">
                                          <div class="form-control-plaintext"><?php echo $this->common->getSpecificField('teachers','id',$id,'nid');?></div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">Date of Birth</label>
                                        <div class="col-sm-10">
                                          <div class="form-control-plaintext"><?php echo $this->common->getSpecificField('teachers','id',$id,'dob');?></div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">Present Address</label>
                                        <div class="col-sm-10">
                                          <div class="form-control-plaintext"><?php echo $this->common->getSpecificField('teachers','id',$id,'present_address');?></div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">Permanent Address</label>
                                        <div class="col-sm-10">
                                          <div class="form-control-plaintext"><?php echo $this->common->getSpecificField('teachers','id',$id,'permanent_address');?></div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">Joining Date</label>
                                        <div class="col-sm-10">
                                          <div class="form-control-plaintext"><?php echo date('M d, Y',strtotime($this->common->getSpecificField('teachers','id',$id,'joining_date')));?></div>
                                        </div>
                                    </div>
								</div>
							</div>
					      	<div class="tab-pane fade" id="education" role="tabpanel" aria-labelledby="education">
				   				<h5 class="wrapper-area-body-right-card-heading border-bottom text-cente mb-4">
					   				Education
					   			</h5>
				   				<div class="wrapper-card-right-body">
				   				    <table class="table table-bordered">
				   				        <tr>
				   				            <th class="text-center">Sl.</th>
				   				            <th class="text-center">Degree</th>
				   				            <th class="text-center">Passing Year</th>
				   				            <th class="text-center">Session</th>
				   				            <th class="text-center">Result</th>
				   				        </tr>
				   				        <?php
				   				        $sl=1;
				   				        //print_r($education);
				   				        foreach($education as $e){
                                        ?>
				   				        <tr>
				   				            <td class="text-center"><?=$sl;?></td>
				   				           <td class="text-center"><?php echo $e['edu_degree'];?></td>
				   				           <td class="text-center"><?php echo $e['edu_passing_year'];?></td>
				   				           <td class="text-center"><?php echo $e['edu_session'];?></td>
				   				           <td class="text-center"><?php echo $e['edu_cgpa'];?></td>
				   				        </tr>
                                        <?php
                                        $sl++;
				   				        }
				   				        ?>
				   				    </table>
                                    <!--<div class="form-group row">
                                        
                                        <div class="col-sm-2 col-form-label">
                                            <h4><?php echo $this->common->getSpecificField('teachers','id',$id,'name');?></h4>
                                        </div>
                                        <div class="col-sm-10">
                                          <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?php echo $this->common->getSpecificField('teachers','id',$id,'name');?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="staticEmail" class="col-sm-2 col-form-label">Department</label>
                                        <div class="col-sm-10">
                                          <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?php echo $this->common->getSpecificField('dept','id',$this->common->getSpecificField('teachers','id',$id,'dept'),'name');?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Designation</label>
                                        <div class="col-sm-10">
                                          <input type="text" readonly class="form-control-plaintext" value="<?php echo $this->common->getSpecificField('designation','id',$this->common->getSpecificField('teachers','id',$id,'designation'),'name');?>">
                                        </div>
                                    </div>-->
								</div>
							</div>
					      	<div class="tab-pane fade" id="job_experience" role="tabpanel" aria-labelledby="job_experience">
				   				<h5 class="wrapper-area-body-right-card-heading border-bottom text-cente mb-4">
					   				Job Experience
					   			</h5>
				   				<div class="wrapper-card-right-body">
				   				    <table class="table table-bordered">
				   				        <tr>
				   				            <th class="text-center" width="50px">Sl.</th>
				   				            <th class="text-center text-nowrap">Organization Name</th>
				   				            <th class="text-center">Designation</th>
				   				            <th class="text-center">Address</th>
				   				            <th class="text-center text-nowrap" width="100px">Starting Date</th>
				   				            <th class="text-center text-nowrap" width="100px">Ending Date</th>
				   				        </tr>
				   				        <?php
				   				        $sl=1;
				   				        foreach($job_records as $e){
                                        ?>
				   				        <tr>
				   				           <td class="text-center"><?=$sl;?></td>
				   				           <td class="text-center"><?php echo $e['organization_name'];?></td>
				   				           <td class="text-center"><?php echo $e['designation'];?></td>
				   				           <td class="text-center"><?php echo $e['address'];?></td>
				   				           <td class="text-center text-nowrap"><?php echo $e['starting_date'];?></td>
				   				           <td class="text-center text-nowrap"><?php echo $e['ending_date'];?></td>
				   				        </tr>
                                        <?php
                                        $sl++;
				   				        }
				   				        ?>
				   				    </table>
								</div>
							</div>
					      	<div class="tab-pane fade" id="research" role="tabpanel" aria-labelledby="research">
				   				<h5 class="wrapper-area-body-right-card-heading border-bottom text-cente mb-4">
					   				Research & Publication
					   			</h5>
				   				<div class="wrapper-card-right-body">
				   				    <table class="table table-bordered">
				   				        <tr>
				   				            <th class="text-center" width="50px">Sl.</th>
				   				            <th class="text-center" width="120px">Date</th>
				   				            <th class="text-center">Title</th>
				   				            <th class="text-center" width="100px">View</th>
				   				        </tr>
				   				        <?php
				   				        $sl=1;
				   				        foreach($research as $e){
                                        ?>
				   				        <tr>
				   				           <td class="text-center"><?=$sl;?></td>
				   				           <td class="text-center"><?php echo $e['date'];?></td>
				   				           <td><?php echo $e['title'];?></td>
				   				           <td class="text-center"><a href="<?=base_url();?>assets/doc/research_and_publication/<?php echo $e['file_name'];?>" target="_blank" class="btn btn-info"><i class="fa fa-eye"></i></a></td>
				   				        </tr>
                                        <?php
                                        $sl++;
				   				        }
				   				        ?>
				   				    </table>
								</div>
							</div>
					      	<div class="tab-pane fade" id="other_experience" role="tabpanel" aria-labelledby="other_experience">
				   				<h5 class="wrapper-area-body-right-card-heading border-bottom text-cente mb-4">
					   				Other Experience
					   			</h5>
				   				<div class="wrapper-card-right-body">
				   				    <table class="table table-bordered">
				   				        <tr>
				   				            <th class="text-center" width="50px">Sl.</th>
				   				            <th class="text-center">Organization</th>
				   				            <th class="text-center">Membership No.</th>
				   				            <th class="text-center">Description</th>
				   				        </tr>
				   				        <?php
				   				        $sl=1;
				   				        foreach($curricular_activities_info as $c){
                                        ?>
				   				        <tr>
				   				           <td class="text-center"><?=$sl;?></td>
				   				           <td class="text-center">
				   				               <?php echo $c['extra_organization'];?>
			   				               </td>
				   				           <td><?php echo $c['extra_member_id'];?></td>
				   				           <td><?php echo $c['extra_description'];?></td>
				   				        </tr>
                                        <?php
                                        $sl++;
				   				        }
				   				        ?>
				   				    </table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>