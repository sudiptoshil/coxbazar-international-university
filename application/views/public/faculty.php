<div class="demo-area wrapper-area">
	<div class="section-top-banner">
		<!-- <img src="images/campus-img.jpg" alt="TECN"> -->
		<div class="container">
			<div class="section-top-banner-links">
				<h1>Faculty</h1>
				<nav aria-label="breadcrumb">
				  <ol class="breadcrumb">
				    <li class="breadcrumb-item"><a href="<?php echo base_url();?>">Home</a></li>
				    <li class="breadcrumb-item active" aria-current="page">Faculty</li>
				  </ol>
				</nav>
			</div>
		</div>
	</div>

	<div class="demo-area-body wrapper-area-body">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
		   			<div class="wrapper-area-body-left">
			   			<div class="list-group"  role="tablist">
							<!-- <a class="list-group-item list-group-item-action list-group-item-light text-center active" data-toggle="list" href="#all_dept" role="tab" aria-controls="all_dept">
							 	All Department
							</a> -->
							<?php
							foreach ($all_dept as $key => $d) {
							?>
							<a class="list-group-item list-group-item-action list-group-item-light text-center <?php if(!isset($_GET['f']) && $d['short_name'] == 'All'){echo 'active';}elseif(isset($_GET['f']) && $_GET['f'] == $d['short_name']){echo 'active';}?>" href="<?php echo base_url();?>faculty?f=<?php echo $d['short_name'];?>">
								<?php echo $d['name'];?>
							</a>
							<?php
							}
							?>
						</div>
					</div>
				</div>
				<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
		   			<div class="wrapper-area-body-right">
		   				<div class="tab-content" id="nav-tabContent">
							<?php
							foreach ($all_dept as $key => $d) {
							?>
					      	<div class="tab-pane fade <?php if(!isset($_GET['f']) && $d['short_name'] == 'All'){echo 'show active';}elseif(isset($_GET['f']) && $d['short_name'] == $_GET['f']){echo 'show active';}?>">
					      		<h5 class="wrapper-area-body-right-card-heading border-bottom text-center text-light main-bg pb-2 mb-4">
					   				<?php echo $d['short_name'];?> Faculty List
					   			</h5>
				   				<div class="wrapper-card-right-body table-responsive">
				   					<table class="all-teachers display w-100 table table-striped table-bordered">
				   					    <thead>
    				   						<tr class="text-center">
    				   							<th>SL.</th>
    				   							<th>Name</th>
    				   							<th>Designation</th>
    				   							<th>Dept.</th>
    				   							<th>Phone</th>
    				   							<th>Email</th>
    				   							<th>Profile</th>
    				   						</tr>
				   						</thead>
    				   						<tbody>
    				   					<?php
    				   					if((!isset($_GET['f']) && $d['short_name'] == 'All') || (isset($_GET['f']) && $d['short_name'] == 'All')){
    
    										//echo print_r($all_teachers);
    										$sl = 1;
    										foreach ($all_teachers as $key => $t) {
    					   					?>
    											
    										<tr>
    				   							<td><?php echo $sl;?></td>
    				   							<td><?php echo $t['name'];?></td>
    				   							<td><?php echo $this->common->getSpecificField('designation','id',$t['designation'],'name');?></td>
    				   							<td><?php echo $this->common->getSpecificField('dept','id',$t['dept'],'short_name');?></td>
    				   							<td><?php echo $t['phone'];?></td>
    				   							<td><?php echo $t['email'];?></td>
    				   							<td><a href="<?=base_url();?>faculty/p/<?php echo $t['id'];?>" target="_blank" class="btn btn-primary">View Profile</a></td>
    				   						</tr>
    										<?php
    										$sl++;
    										}
    									}elseif(isset($_GET['f']) && $d['short_name'] == $_GET['f']){
    										$sl = 1;
    										$dept_teachers = $this->common->getAll('teachers','dept',$d['id']);
    										//echo print_r($dept_teachers);
    										foreach ($dept_teachers as $key => $t) {
    					   					?>
    											
    										<tr>
    				   							<td><?php echo $sl;?></td>
    				   							<td><?php echo $t['name'];?></td>
    				   							<td><?php echo $this->common->getSpecificField('designation','id',$t['designation'],'name');?></td>
    				   							<td><?php echo $this->common->getSpecificField('dept','id',$t['dept'],'short_name');?></td>
    				   							<td><?php echo $t['phone'];?></td>
    				   							<td><?php echo $t['email'];?></td>
    				   							<td><a href="<?=base_url();?>faculty/p/<?php echo $t['id'];?>" target="_blank" class="btn btn-primary">View Profile</a></td>
    				   						</tr>
    										<?php
    										$sl++;
    										}
    									}
    									?>
    									</tbody>
				   					</table>
								</div>
					      	</div>
							<?php
							}
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>