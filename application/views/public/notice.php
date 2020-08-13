<div class="notice-area">
	<div class="section-top-banner">
		<!-- <img src="images/campus-img.jpg" alt="TECN"> -->
		<div class="container">
			<div class="section-top-banner-links">
				<h1>Notice</h1>
				<nav aria-label="breadcrumb">
				  <ol class="breadcrumb">
				    <li class="breadcrumb-item"><a href="<?php echo base_url();?>">Home</a></li>
				    <li class="breadcrumb-item active" aria-current="page">Notice</li>
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
                                    <a class="list-group-item list-group-item-action list-group-item-light text-center active" data-toggle="list" href="#notice" role="tab" aria-controls="notice">
                                        - Notice -
                                    </a>
									<a class="list-group-item list-group-item-action list-group-item-light text-center" data-toggle="list" href="#news_and_events" role="tab" aria-controls="news_and_events">
									 	- News & Events - 
									</a>
									<a class="list-group-item list-group-item-action list-group-item-light text-center" data-toggle="list" href="#downloads" role="tab" aria-controls="downloads">
									 	- Downloads - 
									</a>
								</div>
							</div>
				   		</div>
				   		<div class="col-md-9">
				   			<div class="notice-card-right">
				   				<div class="tab-content" id="nav-tabContent">
                                    <div class="tab-pane fade show active" id="notice" role="tabpanel" aria-labelledby="notice">
                                        <h5 class="notice-card-heading border-bottom text-center text-light main-bg pb-2 mb-4">Notice</h5>
                                        <div class="notice-card-right-body">
                                            <table id="all-notice" class="notice-card-right-body-table display w-100 table table-bordered">
                                                <thead>
                                                <tr>
                                                    <th class="text-center" width="130px">Date</th>
                                                    <th class="text-center">Description</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                //print_r($all_notice);
                                                foreach ($all_notice as $key => $n) {
                                                    ?>
                                                    <tr>
                                                        <td class="text-center" width="130px"><?php echo $n['date_time'];?></td>
                                                        <td>
                                                            <a href="<?php echo base_url();?>notice/single_notice/<?php echo $n['id'];?>"  title="<?php echo $n['date_time'];?>" class="notice-single-title" target="_blank">
                                                                <?php echo $n['title'];?>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                }
                                                ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
							      	<div class="tab-pane fade" id="news_and_events" role="tabpanel" aria-labelledby="news_and_events">
						   				<h5 class="notice-card-heading border-bottom text-center text-light main-bg pb-2 mb-4">News & Events</h5>
						   				<div class="notice-card-right-body">
											<table id="notice-card-right-body-table" class="notice-card-right-body-table display w-100 table table-bordered">
										        <thead>
										            <tr>
										                <th class="text-center" width="130px">Date</th>
										                <th class="text-center">Description</th>
										            </tr>
										        </thead>
										        <tbody>
						   							<?php
						   							 //print_r($all_notice);
						   							 foreach ($all_news_events as $key => $n) {
						   							?>
										            <tr>
										                <td class="text-center"><?php echo $n['date_time'];?></td>
										                <td>
										                	<a href="<?php echo base_url();?>notice/single_notice/<?php echo $n['id'];?>"  title="<?php echo $n['date_time'];?>" class="notice-single-title font-weight-bold" target="_blank">
										                		<?php echo $n['title'];?>
										                	</a>
										                </td>
										            </tr>
										            <?php
						   							}
						   							?>
										        </tbody>
										    </table>
						   				</div> 
							      	</div>
						      		<!-- start Upcoming Events -->
							      	<!-- end Upcoming Events -->
							      	<div class="tab-pane fade" id="downloads" role="tabpanel" aria-labelledby="downloads">
										
										<h5 class="notice-card-heading border-bottom text-center text-light main-bg pb-2 mb-4">Downloads</h5>
						   				<div class="notice-card-right-body">
											<table id="all-notice-download" class="notice-card-right-body-table display w-100 table table-bordered">
										        <tbody>
						   							<?php
						   							 //print_r($all_notice);
						   							// foreach ($all_notice as $key => $n) {
						   							?>
										            <tr>
										                <td>
										                	<a href="#"  title="Admission Form" class="notice-single-title" target="_blank">
										                		Admission Form
										                	</a>
										                </td>
										            </tr>
										            <tr>
										                <td>
										                	<a href="#"  title="Library Card Form" class="notice-single-title" target="_blank">
										                		Library Card Form
										                	</a>
										                </td>
										            </tr>
										            <?php
						   							//}
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