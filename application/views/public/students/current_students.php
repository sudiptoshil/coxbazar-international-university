<div class="wrapper-area">
	<div class="section-top-banner">
		<!-- <img src="images/campus-img.jpg" alt="TECN"> -->
		<div class="container">
			<div class="section-top-banner-links">
				<h1>Current Students</h1>
				<nav aria-label="breadcrumb">
				  <ol class="breadcrumb">
				    <li class="breadcrumb-item"><a href="<?php echo base_url();?>">Home</a></li>
				    <li class="breadcrumb-item active" aria-current="page">Current Students</li>
				  </ol>
				</nav>
			</div>
		</div>
	</div>

	<div class="wrapper-area-body">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		   			<div class="wrapper-area-body-right">
		   				<div class="tab-content" id="nav-tabContent">
					      	<div class="tab-pane fade show active">
					      		<h5 class="wrapper-area-body-right-card-heading border-bottom text-center text-light main-bg pb-2 mb-4">
					   				Current Students List
					   			</h5>
				   				<div class="wrapper-card-right-body">
				   					<table class="all-teachers table dataTable table-bordered">
				   					     <thead>
    				   						<tr class="text-center">
    				   							<th>SL.</th>
    				   							<th>Name</th>
    				   							<th>Batch</th>
    				   							<th>Session</th>
    				   							<th>Roll</th>
    				   							<!--<th>Profile</th>-->
    				   						</tr>
				   						</thead>
				   						<tbody>
				   					<?php
										//echo print_r($all_teachers);
										$sl = 1;
										foreach ($all_students as $key => $t) {
					   				?>	
										<tr class="text-center">
				   							<td><?php echo $sl;?></td>
				   							<td><?php echo $t['name'];?></td>
				   							<td><?php echo $this->common->getSpecificField('batch','id',$t['batch'],'name');?></td>
				   							<td><?php echo $this->common->getSpecificField('academic_session','id',$t['session'],'name');?></td>
				   							<td><?php echo $t['roll'];?></td>
				   							<!--<td><a href="#" class="btn btn-primary">View Profile</a></td>-->
				   						</tr>
									<?php
										$sl++;
										}
									?>
				   						</tbody>
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