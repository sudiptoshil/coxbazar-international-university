<div class="profile-area wrapper-area">
	<div class="section-top-banner">
		<!-- <img src="images/campus-img.jpg" alt="TECN"> -->
		<div class="container">
			<div class="section-top-banner-links">
				<h1>Profile</h1>
				<nav aria-label="breadcrumb">
				  <ol class="breadcrumb">
				    <li class="breadcrumb-item"><a href="<?php echo base_url();?>">Home</a></li>
				    <li class="breadcrumb-item"><a href="<?=base_url();?>/faculty">Faculty</a></li>
				    <li class="breadcrumb-item active" aria-current="page">Profile</li>
				  </ol>
				</nav>
			</div>
		</div>
	</div>
    <?php $id = $_GET['id'];?>
	<div class="profile-area-body wrapper-area-body">
		<div class="container">
		    <h5 class="border-bottom text-center text-light main-bg p-2 mb-4">
   				Faculty Profile
   			</h5>
			<div class="row">
				<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
				    <div class="wrapper-area-body-left">
			   			<div class="list-group"  role="tablist">
							<a class="list-group-item list-group-item-action list-group-item-light text-center active" data-toggle="list" href="#home" role="tab" aria-controls="home">
							 	Home
							</a>
							<a class="list-group-item list-group-item-action list-group-item-light text-center" data-toggle="list" href="#education" role="tab" aria-controls="education">
								Education
							</a>
							<!--<a class="list-group-item list-group-item-action list-group-item-light text-center" data-toggle="list" href="#experience" role="tab" aria-controls="experience">
							 	Experience
							</a>-->
							<!--<a class="list-group-item list-group-item-action list-group-item-light text-center" data-toggle="list" href="#menu_4_content" role="tab" aria-controls="menu_4_content">
							 	Research Publication
							</a>-->
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
                                        <div class="col-sm-12">
                                            <?php if(!empty($this->common->getSpecificField('teachers','id',$id,'image'))){
                                            ?>
                                            <img width="180px;" src="<?php echo base_url()?>assets/images/teachers/<?php echo $this->common->getSpecificField('teachers','id',$id,'image');?>" alt="" class="img-thumbnail">
                                            <?php
                                            }else{
                                            ?>
                                            <img width="180px;" src="<?php echo base_url()?>assets/images/noimage.png" alt="" class="img-thumbnail">
                                            <?php
                                            }?>
                                            
                                        </div>
                                            
                                        <label class="col-sm-2 col-form-label pt-3">Name</label>
                                        <div class="col-sm-10">
                                          <input type="text" readonly class="form-control-plaintext pt-3 font-weight-bold" value="<?php echo $this->common->getSpecificField('teachers','id',$id,'name');?>">
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
                                          <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?php echo $this->common->getSpecificField('dept','id',$this->common->getSpecificField('teachers','id',$id,'dept'),'name');?>">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">Designation</label>
                                        <div class="col-sm-10">
                                          <input type="text" readonly class="form-control-plaintext" value="<?php echo $this->common->getSpecificField('designation','id',$this->common->getSpecificField('teachers','id',$id,'designation'),'name');?>">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">Phone</label>
                                        <div class="col-sm-10">
                                          <input type="text" readonly class="form-control-plaintext" value="<?php echo $this->common->getSpecificField('teachers','id',$id,'phone');?>">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">Email</label>
                                        <div class="col-sm-10">
                                          <input type="text" readonly class="form-control-plaintext" value="<?php echo $this->common->getSpecificField('teachers','id',$id,'email');?>">
                                        </div>
                                    </div>
								</div>
							</div>
					      	<div class="tab-pane fade" id="education" role="tabpanel" aria-labelledby="education">
				   				<h5 class="wrapper-area-body-right-card-heading border-bottom text-cente mb-4">
					   				Education
					   			</h5>
				   				<div class="wrapper-card-right-body">
                                    <div class="form-group row">
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
                                    </div>
								</div>
							</div>
					      	<!--<div class="tab-pane fade" id="experience" role="tabpanel" aria-labelledby="experience">
				   				<h5 class="wrapper-area-body-right-card-heading border-bottom text-cente mb-4">
					   				Experience
					   			</h5>
				   				<div class="wrapper-card-right-body">
                                    <div class="form-group row">
                                        <div for="staticEmail" class="col-sm-2 col-form-label">
                                            <img width="180px;" src="<?php echo base_url()?>assets/images/teachers/<?php echo $this->common->getSpecificField('teachers','id',$id,'image');?>" alt="" class="img-thumbnail">
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
                                    </div>
								</div>
							</div>-->
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>