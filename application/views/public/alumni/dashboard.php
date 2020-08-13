<div class="dashboard-area wrapper-area">
	<div class="dashboard-area-body wrapper-area-body">
		<div class="container">
			<div class="row">
				<?php
				$id = $this->common->user_session_data(1);
				$alumni_id = $this->common->user_session_data(3);
				$alumni_data = $this->common->getSpecificRows('students','id',$alumni_id)->row_array();
                //echo print_r($alumni_data);
				if($alumni_data['status'] == '0'){
				    echo "<div class='text-center text-danger py-5 w-100'><h2>Your account is not activated yet. Please contact with admin.</h2></div>";
				}else{
				?>
				
				<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
		   			<div class="wrapper-area-body-left">
		   			    <div class="alumni-profile-pic">
		   			        <?php
		   			        if(!empty($alumni_data['image'])){
	   			            ?>
	   			            <img src="<?=base_url();?>assets/images/alumni/profile/<?=$alumni_data['image'];?>">
	   			            <?php
		   			        }else{
	   			            ?>
	   			            <img src="<?=base_url();?>assets/images/noimage.png">
	   			            <?php
		   			        }
		   			        ?>
		   			    </div>
			   			<div class="list-group"  role="tablist">
							<a class="list-group-item list-group-item-action list-group-item-light text-center active" data-toggle="list" href="#menu_1_content" role="tab" aria-controls="menu_1_content">
							 	Profile
							</a>
							<a class="list-group-item list-group-item-action list-group-item-light text-center" data-toggle="list" href="#menu_2_content" role="tab" aria-controls="menu_2_content">
								Education
							</a>
							<a class="list-group-item list-group-item-action list-group-item-light text-center" data-toggle="list" href="#job_info_content" role="tab" aria-controls="job_info_content">
								Job Info
							</a>
							<a class="list-group-item list-group-item-action list-group-item-light text-center" data-toggle="list" href="#menu_3_content" role="tab" aria-controls="menu_3_content">
							 	Extra Curricular Activities
							</a>
							<a class="list-group-item list-group-item-action list-group-item-light text-center" data-toggle="list" href="#research_paper" role="tab" aria-controls="research_paper">
							 	Research Paper
							</a>
							<a class="list-group-item list-group-item-action list-group-item-light text-center" data-toggle="list" href="#menu_4_content" role="tab" aria-controls="menu_4_content">
							 	Curriculum Vitae
							</a>
							<a href="<?=base_url();?>alumni/update_profile" class="list-group-item list-group-item-action list-group-item-light text-center" >
							    Update Profile
							</a>
						</div>
					</div>
				</div>
				<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
		   			<div class="wrapper-area-body-right">
		   				<div class="tab-content" id="nav-tabContent">
					      	<div class="tab-pane fade show active" id="menu_1_content" role="tabpanel" aria-labelledby="menu_1_content">
				   				<h5 class="wrapper-area-body-right-card-heading border-bottom text-center text-light bg-blue mb-4">
					   				Profile
					   			</h5>
				   				<div class="wrapper-card-right-body">
									<div class="dashboard-profile-body table-responsive">
								        <div class="text-right mb-2"></div>
										<table class="table table-bordered">
											<tbody>
												<tr>
													<td width="200px">Name: </td>
													<td><?php echo $alumni_data['name'];?></td>
												</tr>
												<tr>
													<td width="200px">Email: </td>
													<td><?php echo $alumni_data['email'];?></td>
												</tr>
												<tr>
													<td width="200px">Phone: </td>
													<td><?php echo $alumni_data['phone'];?></td>
												</tr>
												<tr>
													<td width="200px">Date Of Birth: </td>
													<td><?php echo $alumni_data['dob'];?></td>
												</tr>
												<tr>
													<td width="200px">Father's Name: </td>
													<td><?php echo $alumni_data['father_name'];?></td>
												</tr>
												<tr>
													<td width="200px">Mother's Name: </td>
													<td><?php echo $alumni_data['mother_name'];?></td>
												</tr>
												<tr>
													<td width="200px">Present Address: </td>
													<td><?php echo $alumni_data['present_address'];?></td>
												</tr>
												<tr>
													<td width="200px">Permanent Address: </td>
													<td><?php echo $alumni_data['permanent_address'];?></td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>
					      	<div class="tab-pane fade" id="menu_2_content" role="tabpanel" aria-labelledby="menu_2_content">
					      		<h5 class="wrapper-area-body-right-card-heading border-bottom text-center text-light bg-blue pb-2 mb-4">
					   				Education
					   			</h5>
				   				<div class="wrapper-card-right-body">
                                    <div class="dashboard-profile-body table-responsive">
										<table class="table table-bordered">
											<?php

											$alumni_id = $this->common->getSpecificField('password','id',$this->common->user_session_data(1),'user_id');
											$alumni_edu_data = $this->common->getAll('educational_info','user_type',$this->common->get_user_type('alumni'),'user_id',$alumni_id);

											?>
											<thead>
											    <tr>
											        <th>Degree</th>
											        <th>Institution</th>
											        <th>Session</th>
											        <th>Passing Year</th>
											        <th>CGPA</th>
											    </tr>
											</thead>
											<tbody>
										    <?php
										    foreach($alumni_edu_data as $edu){
									        ?>
										        <tr>
													<td><?=$edu['edu_degree'];?></td>
													<td><?=$edu['school_college_uni'];?></td>
													<td><?=$edu['edu_session'];?></td>
													<td><?=$edu['edu_passing_year'];?></td>
													<td><?=$edu['edu_cgpa'];?></td
												</tr>
									        <?php
										    }
										    ?>
											</tbody>
										</table>
									</div>
								</div>
					      	</div>
					      	<div class="tab-pane fade" id="job_info_content" role="tabpanel" aria-labelledby="job_info_content">
					      		<h5 class="wrapper-area-body-right-card-heading border-bottom text-center text-light bg-blue pb-2 mb-4">
					   				Education
					   			</h5>
				   				<div class="wrapper-card-right-body">
                                    <div class="dashboard-profile-body table-responsive">
										<table class="table table-bordered">
											<?php
                                            //print_r($job_info);
											//$alumni_id = $this->common->getSpecificField('password','id',$this->common->user_session_data(1),'user_id');
											//$alumni_edu_data = $this->common->getAll('educational_info','user_type',$this->common->get_user_type('alumni'),'user_id',$alumni_id);

											?>
											<thead>
											    <tr>
											        <th class="text-center">Company Name</th>
											        <th class="text-center">Designation</th>
											        <th class="text-center">Address</th>
											        <th class="text-center">Starting Date</th>
											        <th class="text-center">Ending Date</th>
											    </tr>
											</thead>
											<tbody>
										    <?php
										    foreach($job_info as $job){
									        ?>
										        <tr>
													<td><?=$job['organization_name'];?></td>
													<td><?=$job['designation'];?></td>
													<td><?=$job['address'];?></td>
													<td><?=$job['starting_date'];?></td>
													<td><?=$job['ending_date'];?></td
												</tr>
									        <?php
										    }
										    ?>
											</tbody>
										</table>
									</div>
								</div>
					      	</div>
					      	<div class="tab-pane fade" id="menu_3_content" role="tabpanel" aria-labelledby="menu_3_content">
								<h5 class="wrapper-area-body-right-card-heading border-bottom text-center text-light bg-blue pb-2 mb-4">
					   				Extra Curricular Activities
					   			</h5>
				   				<div class="wrapper-card-right-body">
									<div class="dashboard-profile-body table-responsive">
										<table class="table table-bordered">
											<?php

											$alumni_id = $this->common->getSpecificField('password','id',$this->common->user_session_data(1),'user_id');
											$alumni_ex_curr = $this->common->getAll('curricular_activities_info','user_type',$this->common->get_user_type('alumni'),'user_id',$alumni_id);

											?>
											<thead>
											    <tr>
											        <th>Organization</th>
											        <th>Member ID</th>
											        <th>Description</th>
											    </tr>
											</thead>
											<tbody>
											    <?php
											    foreach($alumni_ex_curr as $cur){
										        ?>
										        <tr>
													<td><?php echo $cur['extra_organization'];?></td>
													<td><?php echo $cur['extra_member_id'];?></td>
													<td><?php echo $cur['extra_description'];?></td>
												</tr>
										        <?php
											    }
											    ?>
											</tbody>
										</table>
									</div>
								</div>
					      	</div>
					      	<div class="tab-pane fade" id="research_paper" role="tabpanel" aria-labelledby="research_paper">
								<h5 class="wrapper-area-body-right-card-heading border-bottom text-center text-light bg-blue pb-2 mb-4">
					   				Research Paper
					   			</h5>
				   				<div class="wrapper-card-right-body">
									<div class="dashboard-profile-body table-responsive">
									    <!--new research paper add -->
									    <div class="accordion" id="researchPaperAdd">
                                            <div class="card border-bottom">
                                                <div class="card-header">
                                                  <h2 class="mb-0">
                                                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#researchPaperForm" aria-expanded="true" aria-controls="researchPaperForm">
                                                      Add New Research Paper
                                                    </button>
                                                  </h2>
                                                </div>
                                        
                                                <div id="researchPaperForm" class="collapse" aria-labelledby="researchPaperAdd" data-parent="#researchPaperAdd">
                                                    <div class="card-body" >
                                                        <form action="<?=base_url('alumni/add_research_paper')?>" method="post" enctype="multipart/form-data">
                                                            <div class="row">
                                                                <?php
                                                                $user_type_alumni = $this->common->get_user_type('alumni');
                                                                $alumni_id = $this->common->user_session_data(3);
                                                                if(isset($_GET['id'])){
                                                                    $info = $this->common->getAnyInfoRow('research_paper','id',$_GET['id']);
                                                                }else{
                                                                    $info = '';
                                                                }
                                                                ?>
                                                                <input type="hidden" value="<?php echo $alumni_id;?>" name="alumni_id">
                                                                <input type="hidden" value="<?php if(!empty($info)) echo $info->id;?>" name="paper_id" id="paper_id">
                                                                  
                                                                <div class="col-md-6" >
                                                                    <div class="form-group">
                                                                        <label>Title</label>
                                                                        <input type="text" class="form-control" name="title" value="<?php if(!empty($info)) echo $info->title;?>">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4" >
                                                                    <div class="form-group">
                                                                        <label>File:</label>
                                                                        <input type="file" class="form-control" name="paper_file" id="paper_file" value="<?php if(!empty($info->file_name)){ echo $info->file_name;}?>">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2" >
                                                                    <div class="text-center">
                                                                        <label>&nbsp;</label>
                                                                        <button type="submit" class="btn btn-primary form-control">
                                                                            <?php if(!empty($info)) {
                                                                                echo "Update";
                                                                            }else{
                                                                                echo "Submit";
                                                                            }?>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <br>
									    <!-- end new research paper add -->
										<table class="table table-bordered table-stripe">
											<?php
											$alumni_id = $this->common->user_session_data(3);
											//$alumni_research = $this->common->getAll('research_paper','user_type',$this->common->get_user_type('alumni'),'user_id',$alumni_id);
											?>
											<thead>
											    <tr>
											        <th style="width: 50px;" class="text-center">Sl</th>
											        <th style="width: 150px;" class="text-center">Date</th>
											        <th class="text-center">Title</th>
											        <th style="width: 150px;" class="text-center">Details</th>
											    </tr>
											</thead>
											<tbody>
											    <?php
											    $sl = 1;
											    if(!empty($alumni_research)){
    											    foreach($alumni_research as $r){
    										        ?>
        										        <tr>
        													<td class="text-center"><?php echo $sl;?></td>
        													<td class="text-center"><?php echo $r['date'];?></td>
        													<td><?php echo $r['title'];?></td>
        													<td class="text-nowrap text-center">
        													    <a href="<?=base_url()?>assets/doc/research_and_publication/<?=$r['file_name']?>" title="" class="btn btn-primary" target="_blank"><i class="fa fa-eye" aria-hidden="true"></i></a>
        	                                            		<!--<a href="<?=base_url()?>alumni/add_research_paper/?id=<?=$r['id']?>" title="" class="btn btn-warning text-white"><i class="far fa-edit" aria-hidden="true"></i></a>-->
        	                                            		<a onclick="return(confirm('Are You Sure?'))" href="<?= base_url() ?>alumni/delete_research_paper/<?=$r['id'];?>" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a>
        	                                            	</td>
        												</tr>
										        <?php
    										        $sl++;
    											    }
											    }else{
										        ?>
        										        <tr>
        													<td colspan="4" class="text-center">No data.</td>
        												</tr>
										        <?php
											    }
											    ?>
											</tbody>
										</table>
									</div>
								</div>
					      	</div>
					      	<div class="tab-pane fade" id="menu_4_content" role="tabpanel" aria-labelledby="menu_4_content">
								<h5 class="wrapper-area-body-right-card-heading border-bottom text-center text-light bg-blue pb-2 mb-4">
					   				Curriculum Vitae
					   			</h5>
				   				<div class="wrapper-card-right-body">
									<?php
									$info = $this->common->getAnyInfoRow('cv','user_type',$user_type,'user_id',$user_id);
									//echo print_r($cv);
									if(!empty($info)){
								    ?>
								    <div>
							            <embed src="<?=base_url();?>assets/doc/cv/<?=$info->file_name;?>#page=1&zoom=100" width="100%" height="500">
								    </div>
								    <?php
									}
									?>
								    <form action="<?=base_url('alumni/alumni_cv_insert')?>" method="post" enctype="multipart/form-data">
                                        <div>
									        <div class="card-box">
                                                <div class="row">
                                                    <h4 class="card-title col-sm-12">
                                                        <?php if(!empty($info)){
                                                        echo "Update";
                                                        }else{
                                                        echo "Upload";
                                                        }?>
                                                         Your CV
                                                    </h4>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4" >
                                                        <input type="hidden" value="<?php if(!empty($info)) echo $info->id;?>" name="cv_id" id="cv_id">
                                                        
                                                        <div class="form-group">
                                                            <label>Title</label>
                                                            <input type="text" class="form-control" name="title" value="<?php if(!empty($info)) echo $info->title;?>" reqired>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label>CV Pdf File:</label>
                                                            <input type="file" class="form-control" name="cv_file" id="cv_file" value="<?php if(!empty($info->file_name)){ echo $info->file_name;}?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group text-center">
                                                            <label>&nbsp;</label>
                                                            <button type="submit" class="btn btn-primary form-control">
                                                                <?php if(!empty($info)) {
                                                                    echo "Update";
                                                                }else{
                                                                    echo "Submit";
                                                                }?>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
							    </div>
						    </div>
					    </div>
				    </div>
			    </div>
			    <?php
			    }
			    ?>
		    </div>
	    </div>
    </div>
</div>