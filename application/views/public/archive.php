<div class="notice-area">
	<div class="section-top-banner">
		<!-- <img src="images/campus-img.jpg" alt="TECN"> -->
		<div class="container">
			<div class="section-top-banner-links">
				<h1>Archive</h1>
				<nav aria-label="breadcrumb">
				  <ol class="breadcrumb">
				    <li class="breadcrumb-item"><a href="<?php echo base_url();?>">Home</a></li>
				    <?php
				    if(!empty($id)){
			        ?>
				    <li class="breadcrumb-item active" aria-current="page"><a href="<?php echo base_url();?>home/archive">Archive</a> <?php echo ' / '.$info->title;?></li>
			        <?php
				    }else{;?>
				    <li class="breadcrumb-item active" aria-current="page">Archive</li>
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
					      	    
				   				<h5 class="notice-card-heading border-bottom text-center text-light main-bg pb-2 mb-4">Archives</h5>
				   				<div class="notice-card-right-body">
				   				    <div class="wrapper-card-right-body">
                                        <div class="archive-form">
                                            <form action="<?=base_url();?>home/archive" method="GET">
                                                <div class="form-row">
                                                    <div class="col-sm-3">
                                                        <div class="form-group">
                                                            <label >Select Type</label>
                                                            <select name="type" class="form-control">
                                                                <option value="0">All</option>
                                                                <option value="1" <?php if(isset($_GET['type']) && ($_GET['type'] == '1')){echo "selected";}?>>General Notice</option>
                                                                <option value="4" <?php if(isset($_GET['type']) && ($_GET['type'] == '4')){echo "selected";}?>>Academic Notice</option>
                                                                <option value="2" <?php if(isset($_GET['type']) && ($_GET['type'] == '2')){echo "selected";}?>>News</option>
                                                                <option value="3" <?php if(isset($_GET['type']) && ($_GET['type'] == '3')){echo "selected";}?>>Event</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-group">
                                                            <label>Start Date</label>
                                                            <input type="text" name="start_date" class="datepicker form-control" value="<?php if(isset($_GET['start_date'])){echo $_GET['start_date'];}?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-group">
                                                            <label>End Date</label>
                                                            <input type="text" name="end_date" class="datepicker form-control" value="<?php if(isset($_GET['end_date'])){echo $_GET['end_date'];}?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-group">
                                                            <label>&nbsp;</label>
                                                            <button type="submit" class="btn text-light main-bg form-control">Search</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <?php
                                        /*echo $start_date = date("Y-m-d",strtotime("-2 month",strtotime(date("Y-m-01",strtotime("now") ) )));
                                        echo $end_date = date("Y-m-d",strtotime("-1 month",strtotime(date("Y-m-30",strtotime("now") ) )));
                                        echo '<pre>';
                                        print_r($all_notice);*/
                                        ?>
                                        <div class="archive-body">
                                            <div class="row">
                                                <?php foreach($all_notice as $e){
                                                    ?>
                                                    <div class="col-md-4 col-sm-4 col-xs-12">
                                                        <div class="single-event card borderbottomLR">
                                                            <div class="single-event-img">
                                                                <img src="<?=base_url();?>assets/images/notice/<?=$e['image'];?>" alt="">
                                                            </div>
                                                            <div class="card-block">
                                                                <h5><?=$e['title'];?></h5>
                                                                <div class=""><i class="far fa-calendar-alt"></i> <?=date('Y-m-d',strtotime($e['date']));?> </div>
                                                                <?php if(strlen($e['description']) > 200){echo substr($e['description'],0,200)."...";}else{echo $e['description'];}?>

                                                            </div>
                                                            <div class="text-center mb-2"><a href="<?=base_url();?>notice/single_notice/<?=$e['id'];?>" class="btn btn-primary" target="_blank">Click for details...</a></div>
                                                        </div>
                                                    </div>
                                                <?php }?>
                                            </div>
                                        </div>


    				   					<!--<table class="all-teachers display w-100 dataTable table-bordered">
    				   					     <thead>
        				   						<tr class="text-center">
        				   							<th>SL.</th>
        				   							<th width="50px">Date</th>
        				   							<th>Title</th>
        				   							<th>Short Description</th>
        				   							<th>Preview</th>
        				   							<th>View</th>
        				   						</tr>
    				   						</thead>
    				   						<tbody>
    				   					<?php
/*    										//echo print_r($all_teachers);
    										$sl = 1;
    										foreach ($info as $key => $e) {
    					   				*/?>
    										<tr class="text-center">
    				   							<td><?php /*echo $sl;*/?></td>
    				   							<td>
    				   							   <?/*=$e['date'];*/?>
    				   							</td>
    				   							<td><?/*=$e['title'];*/?></td>
    				   							<td><?php /*if(strlen($e['description']) > 150){echo substr($e['description'],0,150)."...";}else{echo $e['description'];}*/?></td>
    				   							<td>
    				   							    <?php /*
                                                    $file_name = $e['image'];
                                                    if(!empty($file_name)):
                                                        $type = substr($file_name, -3,4);
                                                        if($type == 'mp4'){
                                                        */?>
                                                        <video width="100%" height="auto" controls>
                                                            <source src="<?/*=base_url();*/?>assets/images/notice/<?/*=$file_name;*/?>" type="video/mp4">
                                                        </video>
                                                        <?php
/*                                                        }elseif($type == 'mp3'){
                                                        */?>
                                                        <audio controls src="<?/*=base_url();*/?>assets/images/notice/<?/*=$file_name;*/?>">
                                                        <?php
/*                                                        }elseif($type == 'pdf'){
                                                        */?>
                                                          <embed  src="<?/*=base_url();*/?>assets/images/notice/<?/*=$file_name;*/?>" style="width:100%;height:100px;"  autoplay="false" autostart="false"></embed >
                                                        <?php /*
                                                        } else{
                                                        */?>
                				   				        <img src="<?/*=base_url();*/?>assets/images/notice/<?/*=$file_name;*/?>" alt="" height="150px">
                			   				            <?php
/*                                                        }
                                                        endif;
                                                        */?>
				   							    </td>
    				   							<td><a href="<?/*=base_url();*/?>home/archive/<?/*=$e['id'];*/?>" class="btn btn-primary" target="_blank">Details</a></td>
    				   						</tr>
    									<?php
/*    										$sl++;
    										}
    									*/?>
    				   						</tbody>
    				   					</table>-->
    								</div>
				   				    
				   				    
				   				    
									<!--<div class="row">
                                	    <?php foreach($info as $e){?>
									    <div class="col-md-4 col-sm-4 col-xs-12">
                                            <div class="muktijuddha-single single-event card mb-2">
                                                <div class="single-event-img">
                                                    <?php 
                                                    $file_name = $e['image'];
                                                    if(!empty($file_name)):
                                                        $type = substr($file_name, -3,4);
                                                        if($type == 'mp4'){
                                                        ?>
                                                        <video width="100%" height="auto" controls>
                                                            <source src="<?=base_url();?>assets/images/notice/<?=$file_name;?>" type="video/mp4">
                                                        </video>
                                                        <?php
                                                        }elseif($type == 'mp3'){
                                                        ?>
                                                        <audio controls src="<?=base_url();?>assets/images/notice/<?=$file_name;?>">
                                                        <?php
                                                        }elseif($type == 'pdf'){
                                                        ?>
                                                          <embed  src="<?=base_url();?>assets/images/notice/<?=$file_name;?>" style="width:100%;height:100px;"  autoplay="false" autostart="false"></embed >
                                                        <?php 
                                                        } else{
                                                        ?>
                				   				        <img src="<?=base_url();?>assets/images/notice/<?=$file_name;?>" alt="" height="150px">
                			   				            <?php
                                                        }
                                                        endif;
                                                        ?>
                                                </div>
                                                <div class="card-block" style="padding: 15px;">
                                                    <h5><?=$e['title'];?></h5>
                                                    <?php if(strlen($e['description']) > 200){echo substr($e['description'],0,200)."...";}else{echo $e['description'];}?>
                                                </div>
                                                <div class="text-center mb-2"><a href="<?=base_url();?>home/archive/<?=$e['id'];?>" class="btn btn-primary" target="_blank">Details</a></div>
                                            </div>
									    </div>
                                	    <?php }?>
									</div>-->
				   				</div> 
				   				<?php }else{
				   				?>
				   				<div class="details-events">
			   				        <h3 class="text-center mb-4"><?=$info->title;?></h4>
			   				        <div class="mb-4">
			   				            <?php if(!empty($info->image)):
                                        $type = substr($info->image, -3,4);
                                        if($type == 'mp4'){
                                        ?>
                                        <video width="100%" height="auto" controls>
                                            <source src="<?=base_url();?>assets/images/notice/<?=$info->image;?>" type="video/mp4">
                                        </video>
                                        <?php
                                        }elseif($type == 'mp3'){
                                        ?>
                                        <audio controls src="<?=base_url();?>assets/images/notice/<?=$info->image;?>">
                                        <?php
                                        }elseif($type == 'pdf'){
                                        ?>
                                          <embed  src="<?=base_url();?>assets/images/notice/<?=$info->image;?>" style="width:100%;height:400px;"  autoplay="false" autostart="false"></embed >
                                        <?php 
                                        } else{
                                        ?>
				   				        <img src="<?=base_url();?>assets/images/notice/<?=$info->image;?>" alt="" height="150px">
			   				            <?php
                                        }
                                        endif;
                                        ?>
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