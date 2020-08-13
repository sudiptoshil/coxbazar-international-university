<div class="notice-area">
	<div class="section-top-banner">
		<!-- <img src="images/campus-img.jpg" alt="TECN"> -->
		<div class="container">
			<div class="section-top-banner-links">
				<h1>Research & Publication</h1>
				<nav aria-label="breadcrumb">
				  <ol class="breadcrumb">
				    <li class="breadcrumb-item"><a href="<?php echo base_url();?>">Home</a></li>
				    <li class="breadcrumb-item active" aria-current="page">Research & Publication</li>
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
				   		<div class="col-md-3">
				   			<div class="notice-card-left">
					   			<div class="list-group"  role="tablist">
        							<!--<a class="list-group-item list-group-item-action list-group-item-light text-center <?php if(!isset($_GET['f']) && $d['short_name'] == 'All'){echo 'active';}elseif(isset($_GET['f']) && $_GET['f'] == $d['short_name']){echo 'active';}?>" href="<?php echo base_url();?>faculty?f=<?php echo $d['short_name'];?>">
        								<?php// echo $d['name'];?>
        							</a>-->
									<a href="<?php echo base_url();?>home/research_and_publication?r=a" class="list-group-item list-group-item-action list-group-item-light text-center <?php if(!isset($_GET['r']) || $_GET['r'] == 'a'){echo 'active';}?>">
									 	All
									</a>
									<a href="<?php echo base_url();?>home/research_and_publication?r=t" class="list-group-item list-group-item-action list-group-item-light text-center <?php if(isset($_GET['r']) && $_GET['r'] == 't'){echo 'active';}?>">
									 	Teacher
									</a>
									<a href="<?php echo base_url();?>home/research_and_publication?r=s" class="list-group-item list-group-item-action list-group-item-light text-center <?php if(isset($_GET['r']) && $_GET['r'] == 's'){echo 'active';}?>">
									 	Students
									</a>
								</div>
							</div>
				   		</div>
				   		<div class="col-md-9">
				   			<div class="notice-card-right">
				   				<div class="tab-content" id="nav-tabContent">
							      	<div class="tab-pane fade show active" id="news_and_events" role="tabpanel" aria-labelledby="news_and_events">
						   				<h5 class="notice-card-heading border-bottom text-center text-light main-bg pb-2 mb-4">Research & Publications</h5>
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
						   							 foreach ($all_research as $key => $n) {
						   							?>
										            <tr>
										                <td class="text-center"><?php echo $sl;?></td>
										                <td class="text-center"><?php echo $n['date_time'];?></td>
										                <td><?php echo $n['title'];?></td>
										                <td class="text-center">
										                	<a href="<?php echo base_url();?>assets/doc/research_and_publication/<?php echo $n['file_name'];?>"  title="<?php echo $n['title'];?>" class="btn btn-info" target="_blank">
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