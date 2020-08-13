<div class="wrapper-area">
	<div class="section-top-banner">
		<!-- <img src="images/campus-img.jpg" alt="TECN"> -->
		<div class="container">
			<div class="section-top-banner-links">
				<h1>Student Results</h1>
				<nav aria-label="breadcrumb">
				  <ol class="breadcrumb">
				    <li class="breadcrumb-item"><a href="<?php echo base_url();?>">Home</a></li>
				    <li class="breadcrumb-item active" aria-current="page">Student Results</li>
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
					   				Student Results List
					   			</h5>
				   				<div class="wrapper-card-right-body">
				   					<table class="all-teachers display w-100 dataTable table-bordered">
				   					     <thead>
    				   						<tr class="text-center">
    				   							<th>SL.</th>
    				   							<th>Name</th>
    				   							<th>Roll</th>
    				   							<th>Batch</th>
    				   							<th>Session</th>
    				   							<th>Term</th>
    				   							<th>Result</th>
    				   						</tr>
				   						</thead>
				   						<tbody>
				   					<?php
										//echo print_r($all_teachers);
										$sl = 1;
										foreach ($all_result as $key => $t) {
					   				?>	
										<tr class="text-center">
				   							<td><?php echo $sl;?></td>
				   							<td><?php echo $this->common->getSpecificField('students','id',$t['student_id'],'name');?></td>
				   							<td><?php echo $this->common->getSpecificField('students','id',$t['student_id'],'roll');?></td>
				   							<td><?php echo $this->common->getSpecificField('batch','id',$t['batch'],'name');?></td>
				   							<td><?php echo $this->common->getSpecificField('academic_session','id',$t['session'],'name');?></td>
				   							<td><?php echo $this->common->getSpecificField('level_term','id',$t['level_term'],'name');?></td>
				   							<td><?php echo $t['result'];?></td>
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