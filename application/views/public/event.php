<div class="notice-area">
	<div class="section-top-banner">
		<!-- <img src="images/campus-img.jpg" alt="TECN"> -->
		<div class="container">
			<div class="section-top-banner-links">
				<h1>Conference, Seminar, Workshop, Training Fiesta</h1>
				<nav aria-label="breadcrumb">
				  <ol class="breadcrumb">
				    <li class="breadcrumb-item"><a href="<?php echo base_url();?>">Home</a></li>
				    <?php
				    if(!empty($id)){
			        ?>
				    <li class="breadcrumb-item active" aria-current="page"><a href="<?php echo base_url();?>home/event">Conference, Seminar, Workshop, Training Fiesta</a> <?php echo ' / '.$info->title;?></li>
			        <?php
				    }else{;?>
				    <li class="breadcrumb-item active" aria-current="page">Conference, Seminar, Workshop, Training Fiesta</li>
				    <?php
				    };?>
				  </ol>
				</nav>
			</div>
		</div>
	</div>
	<div class="notice-area-body">
		<div class="container">
		   <div class="row">
		   		<div class="col-md-12">
		   			<div class="notice-card-right">
		   				<div class="tab-content">
					      	<div class="tab-pane fade show active" id="news_and_events" role="tabpanel" aria-labelledby="news_and_events">
					      	    <?php if(empty($id)){?>
					      	    
				   				<h5 class="notice-card-heading border-bottom text-center text-light main-bg pb-2 mb-4">All Conference, Seminar, Workshop, Training Fiesta</h5>
				   				<div class="notice-card-right-body">
									<div class="row">
                                	    <?php foreach($info as $e){
                                	    ?>
                                	    <div class="col-md-4 col-sm-4 col-xs-12">
                                	        <div class="single-event card borderbottomLR">
                                                <div class="single-event-img">
                                                    <img src="<?=base_url();?>assets/images/event/<?=$e['image'];?>" alt="">
                                                    <div class="event-body-date"><i class="far fa-calendar-alt"></i> <?=date('d',strtotime($e['start_date']));?> - <?=date('d F Y',strtotime($e['end_date']));?></div>
                                                </div>
                                                <div class="card-block">
                                                    <h5><?=$e['title'];?></h5>
                                                    <?php if(strlen($e['description']) > 200){echo substr($e['description'],0,200)."...";}else{echo $e['description'];}?>
                                                    
                                                </div>
                                                <div class="text-center mb-2"><a href="<?=base_url();?>home/event/<?=$e['id'];?>" class="btn btn-primary" target="_blank">Click for details...</a></div>
                                            </div>
                            	        </div>
                                	    <?php }?>
									</div>
				   				</div> 
				   				<?php }else{
				   				?>
				   				<div class="details-events">
			   				        <h3 class="text-center mb-4"><?=$info->title;?></h4>
			   				        <div class="mb-4">
				   				        <img src="<?=base_url();?>assets/images/event/<?=$info->image;?>" alt="" height="150px">
				   				    </div>
				   				    <div class="">
				   				        <h4><i class="far fa-calendar-alt"></i> Event Date: <?=date('d',strtotime($info->start_date));?> - <?=date('d F Y',strtotime($info->end_date));?></h4>
				   				    </div>
				   				    <div>
				   				        <h4><i class="fas fa-map-marker-alt"></i> Venue: <?=$info->location;?></h4>
				   				    </div>
				   				    <div class="text-justify">
				   				        <p><?=$info->description;?></p>
				   				    </div>
				   				    
				   				</div>
				   				<?php
				   				}?>
					      	</div>
					    </div>
		   			</div>
		   		</div>
		   </div>
		</div>
	</div>
</div>