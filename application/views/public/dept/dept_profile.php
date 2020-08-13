<div class="ame-area wrapper-area">
	<div class="section-top-banner">
		<!-- <img src="images/campus-img.jpg" alt="TECN"> -->
		<div class="container">
			<div class="section-top-banner-links">
				<h1><?php echo $this->common->getSpecificField('dept','id',$dept_id,'name');?> (<?php echo $this->common->getSpecificField('dept','id',$dept_id,'short_name');?>)</h1>
				<nav aria-label="breadcrumb">
				  <ol class="breadcrumb">
				    <li class="breadcrumb-item"><a href="<?php echo base_url();?>">Home</a></li>
				    <li class="breadcrumb-item"><a href="<?php echo base_url();?>dept/">Departments</a></li>
				    <li class="breadcrumb-item active" aria-current="page"><?php echo $this->common->getSpecificField('dept','id',$dept_id,'short_name');?></li>
				  </ol>
				</nav>
			</div>
		</div>
	</div>

	<div class="ame-area-body wrapper-area-body">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
		   			<div class="ame-body-left wrapper-area-body-left">
			   			<div class="list-group"  role="tablist">
							<a class="list-group-item active" data-toggle="list" id="menu_1_btn" href="#home_page" role="tab" aria-controls="home_page">
							 	Home Page 
							</a>
							<a class="list-group-item" data-toggle="list" href="#msg_from_head" role="tab" aria-controls="msg_from_head">
								Message from Head 
							</a>
							<a class="list-group-item" data-toggle="list" href="#faculty_list" role="tab" aria-controls="faculty_list">
							 	Faculty List
							</a>
							<a class="list-group-item" data-toggle="list" href="#officer_list" role="tab" aria-controls="officer_list">
							 	Officer List 
							</a>
							<a class="list-group-item" data-toggle="list" href="#academic_curriculum" role="tab" aria-controls="academic_curriculum">
							 	Academic Curriculum
							</a>
							<a class="list-group-item" data-toggle="list" href="#mission_vision" role="tab" aria-controls="mission_vision">
							 	Mission & Vision
							</a>
							<!-- <a class="list-group-item" data-toggle="list" href="#" role="tab" aria-controls="">
							 	Laboratories
							</a> -->
							<a class="list-group-item" data-toggle="list" href="#class_routine" role="tab" aria-controls="class_routine">
							 	Class Routine
							</a>
							<!-- <a class="list-group-item" data-toggle="list" href="#download" role="tab" aria-controls="">
							 	Downloads
							</a> -->
							<a class="list-group-item" data-toggle="list" href="#photo_gallery" role="tab" aria-controls="">
							 	Photo Gallery
							</a>
							<!-- <a class="list-group-item" data-toggle="list" href="#" role="tab" aria-controls="">
							 	Research
							</a> -->
							<!-- <a class="list-group-item" data-toggle="list" href="#" role="tab" aria-controls="">
							 	Testing and Consultancy Service
							</a> -->
							<!-- <a class="list-group-item" data-toggle="list" href="#other" role="tab" aria-controls="">
							 	Others
							</a> -->
							<a class="list-group-item" data-toggle="list" href="#lab_info" role="tab" aria-controls="">
							 	Lab Info
							</a>
							<a class="list-group-item" data-toggle="list" href="#contact" role="tab" aria-controls="">
							 	Contact
							</a>
						</div>
					</div>
				</div>
				<div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
		   			<div class="ame-body-right wrapper-area-body-right">
		   				<div class="tab-content" id="nav-tabContent">
					      	<div class="tab-pane fade show active" id="home_page" role="tabpanel" aria-labelledby="home_page">
			   				 	<div class="wrapper-body-slide flexslider">
								  	<ul class="slides">
								  	   <?php 
								  	   foreach($dept_slide as $s){
								  	   ?>
									    <li>
									      <img src="<?php echo base_url();?>assets/images/slider_image/<?php echo $s['image'];?>" alt="<?php echo $s['alt'];?>"/>
									    </li>
								  	   <?php
								  	   }
								  	   ?>
									    <!--<li>
									      <img src="<?php echo base_url();?>assets/images/dept/ame/ame1.jpg"/>
									    </li>
									    <li>
									      <img src="<?php echo base_url();?>assets/images/dept/ame/ame2.jpg" />
									    </li>-->
								  	</ul>
								</div>
								<div class="wrapper-area-body-right-title">
									<h3>Overview</h3>
								</div>
								<p>
									<?php echo $this->common->getSpecificField('dept','id',$dept_id,'overview');?>
								</p>
							</div>

					      	<div class="tab-pane fade" id="msg_from_head" role="tabpanel" aria-labelledby="msg_from_head">
					      		<div class="wrapper-area-body-right-title">
									<h3>Message From Head</h3>
								</div>
                                <?php echo $this->common->getSpecificField('tbl_dept_head_speech','dept_id',$dept_id,'description');?>
                                
								<!--<h4 class="text-muted">Dr. Head Name</h4>
								<h5 class="text-muted">Head of the Department</h5>
								<h5 class="text-muted">Email: name@tecn.gov.bd</h5>
								<h5 class="text-muted">Phone:</h5>-->

					      	</div>
					      	<div class="tab-pane fade" id="faculty_list" role="tabpanel" aria-labelledby="faculty_list">
								<div class="wrapper-area-body-right-title">
									<h3>Faculty List</h3>
								</div>
								<div class="faculty_list_body">
									<div class="row">
										<?php 
										foreach ($dept_teachers as $key => $t) {
										?>
										<div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
											<div class="faculty-list_body_single">
											    <a href="<?=base_url();?>faculty/p/<?=$t['id']?>">
    											    <div class="faculty-list_body_single_img">
    													<img src="<?php if(!empty($t['image'])){echo base_url();?>assets/images/teachers/<?php echo $t['image'];}else{echo base_url();?>assets/images/noimg.jpg<?php } ?>" alt="">
    												</div>
    												<h5 class="text-center"><?php echo $t['name'];?></h5>
    												<h6 class="text-center"><?php echo $this->common->getSpecificField('designation','id',$t['designation'],'name');?></h6>
											    </a>
											</div>
										</div>
										<?php
										}
										?>
									</div>
								</div>
					      	</div>
					      	<div class="tab-pane fade" id="officer_list" role="tabpanel" aria-labelledby="officer_list">
								<div class="wrapper-area-body-right-title">
									<h3>Officer List</h3>
								</div>
				   				<div class="faculty_list_body">
									<div class="row">
										<?php 
										foreach ($dept_staffs as $key => $s) {
										?>
										<div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
											<div class="faculty-list_body_single">
												<div class="faculty-list_body_single_img">
													<img src="<?php echo base_url();?>assets/images/staffs/<?php echo $s['image'];?>" alt="">
												</div>
												<h5 class="text-center"><?php echo $s['name'];?></h5>
												<h6 class="text-center"><?php echo $this->common->getSpecificField('designation','id',$s['designation'],'name');?></h6>
											</div>
										</div>
										<?php
										}
										?>
									</div>
								</div>
					      	</div>
					      	<div class="tab-pane fade" id="academic_curriculum" role="tabpanel" aria-labelledby="academic_curriculum">
								<div class="wrapper-area-body-right-title">
									<h3>Academic Curriculum</h3>
								</div>
				   				<div class="wrapper-card-right-body">
									<?php echo $this->common->getSpecificField('dept','id',$dept_id,'academic_curriculum');?>
								</div>
					      	</div>
					      	<div class="tab-pane fade" id="mission_vision" role="tabpanel" aria-labelledby="mission_vision">
								<div class="wrapper-area-body-right-title">
									<h3>Our Mission & Vision</h3>
								</div>
				   				<div class="wrapper-card-right-body">
									<?php echo $this->common->getSpecificField('dept','id',$dept_id,'mission_vision');?>
								</div>
					      	</div>
					      	<div class="tab-pane fade" id="class_routine" role="tabpanel" aria-labelledby="class_routine">
								<div class="wrapper-area-body-right-title">
									<h3>Class Routine</h3>
								</div>
				   				<div class="wrapper-card-right-body">
									<table class="table table-bordered table-hover">
										<thead>
											<tr>
												<th class="text-center" width="40px;">Sl</th>
												<th class="text-center" width="100px;">Date</th>
												<th class="text-center">Title</th>
												<th class="text-center" width="100px;">Action</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$sl=1;
											foreach ($class_routine as $key => $c) {
											?>
											<tr>
												<td class="text-center"><?php echo $sl;?></td>
												<td class="text-center text-nowrap"><?php echo date('d-m-Y H:i:s',strtotime($c['date_time']));?></td>
												<td><?php echo $c['title'];?></td>
												<td class="text-center"><a href="<?php echo base_url();?>assets/doc/class_routine/<?php echo $c['file_name'];?>" title="<?php echo $c['title'];?>" download>Download</a></td>
											</tr>
											<?php
											$sl++;
											}
											?>
										</tbody>
									</table>
								</div>
					      	</div>
					      	<div class="tab-pane fade" id="photo_gallery" role="tabpanel" aria-labelledby="photo_gallery">
								<div class="wrapper-area-body-right-title">
									<h3>Photo Gallery</h3>
								</div>
				   				<div class="wrapper-card-right-body">
				   					<div class="image-gallery">
				   						<div class="row">
											<?php
											foreach ($dept_photo_gallery as $key => $c) {
											?>
				   							<div class="col-md-3 col-sm-4 col-xs-6">
				   								<a data-fancybox="gallery" href="<?php echo base_url();?>assets/images/photo_gallery/<?php echo $c['image'];?>" title="">
				   									<img src="<?php echo base_url();?>assets/images/photo_gallery/<?php echo $c['image'];?>" alt="<?php echo $c['alt'];?>" class="img-thumbnail">
				   								</a>
				   							</div>
											<?php
											}
											?>
				   						</div>
				   					</div>
								</div>
					      	</div>
					      	<div class="tab-pane fade" id="lab_info" role="tabpanel" aria-labelledby="lab_info">
								<div class="wrapper-area-body-right-title">
									<h3>Lab Info</h3>
								</div>
				   				<div class="wrapper-card-right-body">
				   					<div class="lab-image">
				   					    <img src="<?php echo base_url();?>assets/images/lab_info/<?php echo $this->common->getSpecificField('tbl_lab_info','dept_id',$dept_id,'file_name');?>" alt="" class="img-thumbnail" >
				   					</div>
				   					<div>
				   					    <p><?php echo $this->common->getSpecificField('tbl_lab_info','dept_id',$dept_id,'description');?></p>
				   					</div>
								</div>
					      	</div>
					      	<div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact">
								<div class="wrapper-area-body-right-title">
									<h3>Contact Us</h3>
								</div>
				   				<div class="wrapper-card-right-body">
									<div class="card card-primary">
										<div class="card-body">
                                            <div class="form-group row">
                                                <label for="deptPhone" class="col-sm-4 col-md-3 col-form-label"><i class="fas fa-phone-square"></i> Phone</label>
                                                <div class="col-sm-8 col-md-9 col-form-label">
                                                    <?php echo $this->common->getSpecificField('dept','id',$dept_id,'phone');?>
                                                </div>
                                            </div>
									        <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-4 col-md-3 col-form-label"><i class="far fa-envelope"></i> Email</label>
                                                <div class="col-sm-8 col-md-9 col-form-label">
                                                    <?php echo $this->common->getSpecificField('dept','id',$dept_id,'email');?>
                                                </div>
                                            </div>
											<!--<form>
											  	<div class="form-row">
													<div class="form-group col-md-6">
														<label for="contact_name">Name</label>
														<input name="contact_name" type="text" class="form-control" id="contact_name" placeholder="Name">
													</div>
												    <div class="form-group col-md-6">
												      	<label for="contact_email">Email</label>
												      	<input name="contact_email" type="email" class="form-control" id="contact_email" placeholder="Email">
												    </div>
													<div class="form-group col-md-12">
														<label for="contact_subject">Subject</label>
														<input name="contact_subject" type="text" class="form-control" id="contact_subject" placeholder="Type contact subject">
													</div>
													<div class="form-group col-md-12">
														<label for="contact_description">Description</label>
														<textarea name="contact_description" rows="4" id="contact_description" class="form-control" placeholder="Description"></textarea>
													</div>
												</div>
												<button type="submit" class="main-bg btn btn-secondary form-control">Send</button>
											</form>-->
										</div>
									</div>
								</div> 
					      	</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	$('.wrapper-body-slide').flexslider({
   		direction: "vertical",
   		controlNav: false,
        animation: "fade"
	  });
</script>