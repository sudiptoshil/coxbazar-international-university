<div class="notice-area">
	<div class="section-top-banner">
		<div class="container">
			<div class="section-top-banner-links">
				<h1><?php echo $this->common->getSpecificField('service_box','id',$sb_id,'title');?></h1>
				<nav aria-label="breadcrumb">
				  <ol class="breadcrumb">
				    <li class="breadcrumb-item"><a href="<?php echo base_url();?>">Home</a></li>
				    <li class="breadcrumb-item active" aria-current="page"><?php echo $this->common->getSpecificField('service_box_list','id',$sb_list_id,'title');?></li>
				  </ol>
				</nav>
			</div>
		</div>
	</div>
	<div class="notice-area-body">
		<div class="container">
			<!-- <h1 class="text-center">Notice & Event</h1> -->
			<!-- <div class="card">
			  	<h2 class="card-header text-center text-light bg-dark">Notice & Event</h2>
			  	<div class="card-body"> -->
				   <div class="row">
				   		<div class="col-md-12">
				   			<div class="notice-card-right">
				   				<div class="tab-content" id="nav-tabContent">
							      	<div class="tab-pane fade show active" id="news_and_events" role="tabpanel" aria-labelledby="news_and_events">
						   				<h5 class="notice-card-heading border-bottom text-center text-light main-bg pb-2 mb-4"><?php echo $this->common->getSpecificField('service_box_list','id',$sb_list_id,'title');?></h5>
						   				<div class="notice-card-right-body">
											<table id="notice-card-right-body-table" class="notice-card-right-body-table display w-100 dataTable table-bordered">
										        <thead>
										            <tr>
										                <th class="text-center" width="50px">SL</th>
										                <th class="text-center" width="120px">Date</th>
										                <th class="text-center">Title</th>
										                <th class="text-center" width="120px">View</th>
										            </tr>
										        </thead>
										        <tbody>
						   							<?php
						   							$sl=1;
						   							 //print_r($all_research);
						   							 foreach ($sb_list_file as $key => $n) {
						   							?>
										            <tr>
										                <td class="text-center"><?php echo $sl;?></td>
										                <td class="text-center"><?php echo $n['date_time'];?></td>
										                <td><?php echo $n['title'];?></td>
										                <td class="text-center">
										                	<a href="<?php echo base_url();?>assets/doc/service_box/<?php echo $n['file_name'];?>"  title="<?php echo $n['title'];?>" class="btn btn-info" target="_blank">
										                		<i class="fa fa-eye"></i>
										                	</a>
										                </td>
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
			  	<!-- </div>
			</div> -->
		</div>
	</div>
</div>