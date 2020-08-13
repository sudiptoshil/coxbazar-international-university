<!--breaking-news-->
<div class="breaking-news-area">
    <ul class="list-group list-group-flush" id="breaking_news" style="background: rgba(3, 87, 98, 0.23);">
    <?php
    foreach($all_breaking as $n){
    ?>
        <li>
            <a class="list-group-item" href="<?php echo base_url();?>notice/single_notice/<?php echo $n['id'];?>" title="" target="_blank">
      	        <h6 class="card-title m-0"><?php echo $n['title'];?></h6>
      		</a>
        </li>
  	<?php
	}
  	?>
    </ul>
</div>
<!--end breaking-news-->


<!-- start slider-area -->
<!-- container used -->
<div class="slider-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-12 col-sm-12 col col-xs-12">
    	        <div class="flexslider">
        	  	    <ul class="slides">
            	  	    <?php
            	  	    foreach($all_slider_image as $a){
            	  	    ?>
            		    <li>
            		      <img src="<?php echo base_url();?>assets/images/slider_image/<?php echo $a['image'];?>" alt=""/>
            		    </li>
            	  	    <?php
            	  	    }
            	  	    ?>
    	  	        </ul>
    	        </div>
            </div>

            <!--welcome message-->
<!--            <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">-->
<!--                <div class="row">-->
<!--                    <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">-->
<!--                        <div class="divider" ></div>-->
<!--                        <span class="index-welcome-principal-msg-title">Welcome to TECN</span>-->
<!--                        <div class="college-summary">-->
<!--                            --><?php //echo substr($this->common->getSpecificField('dept','code',0,'overview'),33,150);?>
<!--                            <span>-->
<!--                              <a class="read" target="_blank" href="--><?php //echo base_url()?><!--about">...Read more</a>-->
<!--                            </span>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">-->
<!--                        <div class="index-principal-msg">-->
<!--                            <span class="index-welcome-principal-msg-title">Message From Principal</span>-->
<!--                                <br style="font-size:4pt;">-->
<!--                                <img  class="principle-image" width="60" height="60" src="--><?//=base_url();?><!--assets/images/teachers/--><?//=$this->common->getSpecificField('various_content','content_type','principal_msg','file_name');?><!--" alt="img">-->
<!--                                --><?//=substr($this->common->getSpecificField('various_content','content_type','principal_msg','content'),0,85);?><!--...-->
<!--                                <a class="read d-inline-block"  href="--><?//=base_url();?><!--home/principal_msg" target="_blank">Read more</a>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
            <!--welcome message ends-->

            <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12"> <!--slider-area-notice-->
              	<div class="slider-area-notice">
            		<div class="slider-area-notice-title">
            			<h3>Academic Notice</h3>
            		</div>
            		<div class="slider-area-notice-body">
            			<ul class="list-group list-group-flush" id="scroller">
            				<?php
            				foreach($all_academic_notice as $n){
            				?>
            			  	<li>
            			  	    <a class="list-group-item" href="<?php echo base_url();?>notice/single_notice/<?php echo $n['id'];?>" title="" target="_blank">
            			  			<div class="slider-notice-date">
            			  				<span class="slider-notice-date-day">
            			  					<?php echo date('d M',strtotime($n['date']));?>
            			  				</span>
            			  				<span class="slider-notice-date-year">
            			  					<?php echo date('Y',strtotime($n['date']));?>
            			  				</span>
            		  				</div>
            			  			<div class="slider-notice-title"><?php echo $n['title'];?></div>
            			  			<div class="clearfix"></div>
            			  		</a>
            			  	</li>
            			  	<?php
            				}
            				foreach($all_academic_notice as $n){
            				?>
            			  	<li>
            			  	    <a class="list-group-item" href="<?php echo base_url();?>notice/single_notice/<?php echo $n['id'];?>" title="" target="_blank">
            			  			<div class="slider-notice-date">
            			  				<span class="slider-notice-date-day">
            			  					<?php echo date('d M',strtotime($n['date']));?>
            			  				</span>
            			  				<span class="slider-notice-date-year">
            			  					<?php echo date('Y',strtotime($n['date']));?>
            			  				</span>
            		  				</div>
            			  			<div class="slider-notice-title"><?php echo $n['title'];?></div>
            			  			<div class="clearfix"></div>
            			  		</a>
            			  	</li>
            			  	<?php
            				}
            			  	?>
            			</ul>
            		</div>
            	</div>
            </div> <!--slider-area-notice ends-->
        </div> <!--row-->
    </div> <!--container-->
</div> <!--slider area ends-->

<!--start main-four-links -->
<!--<div class="main-four-links">
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
				<div class="main-four-links-single">
					<a href="<?php echo base_url();?>about" title="" class="text-decoration-none">
						<div class="card text-white mb-2">
						  	<div class="card-header main-bg"><h4 class="m-0">About TECN</h4></div>
						  	<div class="card-body sub-bg">
						    	<img src="<?php echo base_url();?>assets/images/logo-only.png" alt="TECN">
						  	</div>
						</div>
					</a>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
				<div class="main-four-links-single">
					<a href="<?php echo base_url();?>home/administration" title="" class="text-decoration-none">
						<div class="card text-white mb-2">
						  	<div class="card-header main-bg"><h4 class="m-0">Administration</h4></div>
						  	<div class="card-body sub-bg">
						    	<i class="fas fa-hotel"></i>
						  	</div>
						</div>
					</a>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
				<div class="main-four-links-single">
					<a href="#" title="" class="text-decoration-none">
						<div class="card text-white mb-2">
						  	<div class="card-header main-bg"><h4 class="m-0">Library</h4></div>
						  	<div class="card-body sub-bg">
						    	<i class="fas fa-book-open"></i>
						  	</div>
						</div>
					</a>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
				<div class="main-four-links-single">
					<a href="<?php echo base_url();?>home/mission_vision" title="" class="text-decoration-none">
						<div class="card text-white mb-2">
						  	<div class="card-header main-bg"><h4 class="m-0">Mission & Vision</h4></div>
						  	<div class="card-body sub-bg">
						    	<i class="fas fa-road"></i>
						  	</div>
						</div>
					</a>
				</div>
			</div>
		</div>
	</div>
</div>-->
<!--end main-four-links -->

<!-- start faculties_n_dept -->
<div class="faculties_n_dept">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="faculties_n_dept_sin first">
                    <div class="faculties_n_dept_sin_title ">
                        Faculties
                    </div>
                    <div class="faculties_n_dept_sin_list scrollbar">
                        <ul>
                            <?php
                            foreach($faculties as $f){
                            ?>
                            <li><a class="#"><?=$f['name'];?></a></li>
                            <?php
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="faculties_n_dept_sin third">
                    <div class="faculties_n_dept_sin_title text-right">
                        Departments
                    </div>
                    <div class="faculties_n_dept_sin_list scrollbar">
                        <ul>
                            <?php
                            foreach($all_dept as $d){
                            ?>
                            <li><a class="" href="<?php echo base_url();?>dept/d/<?php echo $d['short_name'];?>" target="_blank"><?=$d['name'];?></a></li>
                            <?php
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end faculties_n_dept -->


<?php if(count($all_event) > 0){?>
<!--events-->
<div class="event" style="display: none;">
    <div class="container">
      <div class="row" style="margin-top: 10px">
        <div class="col-sm-12" style="margin-bottom: 10px">
          <div class="divider" style="height:5px;background-color:#C8C41A"></div>
            <h3 class="event-title"> Conference, Seminar, Workshop, Training Fiesta</h3>
          </div>
      </div>


        <div class="event-body">
        	<div class="owl-carousel">
        	    <?php foreach($all_event as $e){
        	    ?>
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
        	    <?php }?>
        	</div>
        </div>
    	<div class="text-center mt-3">
    	    <a href="<?=base_url();?>home/event" class="btn btn-outline-secondary">View All</a>
    	</div>
	</div>

</div>
<!--events-->
<?php
}
?>


<!-- start notice-event-area -->
<div class="notice-event-area">
	<div class="container">
    	<div class="sec-title text-dark">
    		<h1 class="text-center text-uppercase pb-5">News, Events & Notice</h1>
    	</div>
		<div class="row">
			<div class="col-md-8">
				<div class="card text-dark bg-default mb-3">
					<div class="card-header text-center text-light main-bg">
						<h5 class="mb-0">News & Events</h5>
					</div>
					<div class="card-body p-0">
						<ul class="list-group list-group-flush">
							<?php
							//print_r($all_news_events);
							foreach($all_news_events as $n){
							?>
						  	<li>
						  		<a class="list-group-item" href="<?php echo base_url();?>notice/single_notice/<?php echo $n['id'];?>" title="" target="_blank">
						  			<h6 class="card-title m-0"><?php echo $n['title'];?></h6>
									<p class="card-text"><small class="text-muted"><?php echo $n['date'];?></small></p>
						  		</a>
						  	</li>
							<?php
							}
							?>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="card text-dark bg-default mb-3">
					<div class="card-header text-center text-light main-bg">
						<h5 class="mb-0">General Notice</h5>
					</div>
					<div class="card-body p-0">
						<ul class="list-group list-group-flush">
							<?php
							//print_r($all_news_events);
							foreach($all_notice as $n){
							?>
						  	<li>
						  		<a class="list-group-item" href="<?php echo base_url();?>notice/single_notice/<?php echo $n['id'];?>" title="" target="_blank">
						  			<h6 class="card-title m-0"><?php echo $n['title'];?></h6>
									<p class="card-text"><small class="text-muted"><?php echo $n['date'];?></small></p>
						  		</a>
						  	</li>
						  	<?php
							}
						  	?>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-md-3 d-none">
				<div class="important-hotline card text-dark bg-default mb-3">
					<div class="card-header text-center text-light main-bg">
						<h5 class="mb-0">Important Hotline</h5>
					</div>
					<div class="card-body text-center p-0" style="max-height: inherit;background: linear-gradient(#F5F5F5,#FCFCFC);">
				        <img src="<?php echo base_url();?>assets/images/Hotline_BN.png" alt="">
				        <a href="<?php echo base_url();?>home/important_hotline" class="card-header text-center text-light w-100 d-block main-bg" target="_blank">More ...</a>
				    </div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end notice-event-area -->

<!--important boxes-->
<div class="important-box-area" style="display: none;">
    <div class="container" >
        <div class="row">
            <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                <div class="imp-box-left">
                    <div class="row">
                        <?php
                        foreach($all_service_box as $s){
                            $all_service_box_list = $this->common->getAll('service_box_list','service_box',$s['id']);
                        ?>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="imp-box-left-single">
                        		<h4 class="imp-box-head"><?=$s['title'];?></h4>
                        		<div class="imp-box-left-single-img">
                        		    <img src="<?=base_url();?>assets/doc/service_box/<?=$s['image'];?>" alt="" class="w-100">
                        		</div>
                        		<ul class="caption fade-caption" style="margin:0">
                        		    <?php foreach($all_service_box_list as $a){
                        		    ?>
                        		    <li><a href="<?=base_url();?>home/sb/<?=$s['id'];?>/<?=$a['id'];?>" target="_blank"><?=$a['title'];?></a></li>
                        			<?php
                        		    }?>
                        		</ul>
                    		</div>
                        </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
        	    <div class="mujib-borsho-area mb-3">
        			<h4 class="imp-box-head" style="font-size: 20px;background: #72B21C;padding: 10px 5px;text-align: center;font-weight: bold;text-transform: uppercase;color: #fff;">Mujib Borsho</h4>
                    <a href="<?php echo base_url();?>home/mujib_borsho" target="_blank">
            		    <img src="<?= base_url();?>assets/images/mujib_borsho/Mujib_Borso_100.jpg" alt="" style="width: 100%;">
            	    </a>
<!--                    <div id="mujib_borsho_count_down"></div>-->
            	</div>

        	    <div class="mujib-borsho-area">
        			<h4 class="imp-box-head" style="font-size: 20px;background: red;padding: 10px 5px;text-align: center;font-weight: bold;text-transform: uppercase;color: #fff;">Muktijuddha Corner</h4>
                    <a href="<?php echo base_url();?>home/muktijuddha_corner" target="_blank">
            		    <img src="<?=base_url();?>assets/images/Freedom_Fighter.jpg" alt="" style="width: 100%;">
            	    </a>
            	</div>
            </div>
        </div>
    </div>
</div>

<!-- start dept-area -->
<div class="dept-area">
	<div class="sec-title text-light">
		<h1 class="text-center text-uppercase pb-5">Our Departments</h1>
	</div>
	<div class="container">
		<div class="owl-carousel">
		    <?php
		    //print_r($all_dept);
		    foreach($all_dept as $d){
	        ?>
			<div class="dept-area-single">
				<a href="<?php echo base_url();?>dept/d/<?php echo $d['short_name'];?>" title="<?php echo $d['name'];?>">
					<div class="dept-area-img">
			      		<img src="<?php echo base_url();?>assets/images/dept/<?php echo $d['image'];?>" alt=""/>
					</div>
					<div class="dept-area-title">
						<?php echo $d['name'];?>
					</div>
				</a>
			 </div>
	        <?php
		    }
		    ?>
		</div>
  </div>
</div>
<!-- end dept-area -->

<!-- start yearly-graduation-area -->

<div class="yearly-graduation-area" style="background: #F3F3F3; display: none;">
    <div class="container py-5">
        <div class="sec-title text-dark">
    		<h1 class="text-center text-uppercase py-2">Statistics of Academic Results</h1>
    	</div>
    	<div class="row">
    		<div class="col-md-12 table-responsive">
    	        <table class="table table-bordered" style="background: #fff;">
    	            <tr>
    	                <th class="text-center">Sl</th>
    	                <th class="text-center">Session</th>
    	                <th class="text-center">Passing Year</th>
    	                <th class="text-center">Total Students</th>
    	                <th class="text-center">Passed Students</th>
    	                <th class="text-center">Percentage</th>
    	            </tr>
    	            <?php
    	            $this->db->where('status',1);
    	            $this->db->where('trash',0);
    	            $this->db->order_by('id','desc');
    	            $this->db->limit('5');
    	            $yearly_students = $this->db->get('yearly_students_summery')->result_array();
    	            //$yearly_students = $this->common->getAll('yearly_students_summery');
    	            $sl = 1;
    	            foreach($yearly_students as $y){
    	            ?>
    	            <tr class="text-center">
    	                <td><?=$sl;?></td>
    	                <td><?=$y['year'];?></td>
    	                <td><?=$y['passing_year'];?></td>
    	                <td><?=$y['total_students'];?></td>
    	                <td><?=$y['passed'];?></td>
    	                <td><?=ceil(($y['passed']/$y['total_students'])*100)."%";?></td>
    	            </tr>
    	            <?php
    	            $sl++;
    	            }?>
    	        </table>
    	    </div>
    	</div>
    </div>
</div>
<!-- end yearly-graduation-area -->

<!--important boxes-->

<!-- start facts-counting -->
<div class="facts-counting-area" id="facts_counting">
    <div class="container">
        <div><h2 class="facts-counting-area-title pb-4">CBIU At a Glance</h2></div>
        <div class="row">
            <div class="col-lg-2 col-md-4 col-sm-6 col-xs-6 mb-2">
                <div class="counting-single">
                    <h4>Faculties</h4>
                    <h1><span class="counter-value" data-count="<?php echo count($this->common->getAll('faculty'));?>">0</span></h1>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-6 col-xs-6 mb-2">
                <div class="counting-single">
                    <h4>Departments</h4>
                    <h1><span class="counter-value" data-count="<?php echo count($this->common->getAll('dept'));?>">0</span></h1>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-6 col-xs-6 mb-2">
                <div class="counting-single">
                    <h4>Teachers</h4>
                    <h1><span class="counter-value" data-count="<?php echo count($this->common->getAll('teachers'));?>">0</span></h1>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-6 col-xs-6 mb-2">
                <div class="counting-single">
                    <h4>Officers & Staffs</h4>
                    <h1><span class="counter-value" data-count="<?php echo count($this->common->getAll('staffs'));?>">0</span></h1>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-6 col-xs-6 mb-2">
                <div class="counting-single">
                    <h4>Students</h4>
                    <h1><span class="counter-value" data-count="<?php echo count($this->common->getAll('students','is_student',1));?>">0</span></h1>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-6 col-xs-6 mb-2">
                <div class="counting-single">
                    <h4>Graduates</h4>
                    <h1><span class="counter-value" data-count="<?php echo count($this->common->getAll('students','is_student',2));?>">0</span></h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end facts-counting -->

<!-- start contact-us -->
<div class="contact-us-area">
    <div class="contact-us-bottom">
        <div class="container">
            <div class="contact-us-bottom-title text-center text-white  text-uppercase">Contact/Complain Us</div>
            <div class="contact-us-form">
                <form method="POST" action="<?=base_url();?>home/contact_us_submit" id="contact_us_form">
                    <div class="row">
                        <div class="col-xs-12 col-sm-4">
                            <div class="form-group">
                                <input type="text" name="name" id="name" class="form-control" placeholder="Name" required>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-4">
                            <div class="form-group">
                                <input type="email" name="email" id="email" class="form-control" placeholder="Email" required>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-4">
                            <div class="form-group">
                                <input type="text" name="phone" id="phone" class="form-control" placeholder="Phone" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="text" name="subject" id="subject" class="form-control" placeholder="Subject" required>
                    </div>
                    <div class="form-group">
                        <textarea name="description" id="description" rows="3" class="form-control" placeholder="Description" required></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" onclick="contact_us_submit()" class="btn btn-outline-default form-control">Submit</button>
                    </div>
                    <div class="contact_error text-white text-center"><?php echo $this->session->flashdata('msg');?></div>
                </form>
                <div></div>
            </div>
        </div>
	</div>
    <div class="contact-us-top">
    	<div class="sec-title text-dark">
    		<h1 class="text-center text-uppercase">Get In Touch</h1>
    	</div>
    	<div class="container">
    		<div class="row">
    			<div class="col-md-8">
    				<div class="contact-us-map">
    					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d368.5095097474797!2d91.98432539077612!3d21.415753790633964!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30adc880a04119ab%3A0xb2d6f6784eeed39b!2sCox&#39;s%20Bazar%20International%20University!5e0!3m2!1sen!2sbd!4v1594209150878!5m2!1sen!2sbd" width="750" height="300" style="border:0" allowfullscreen></iframe>
    					<!-- <iframe src="https://www.google.com/maps/d/embed?mid=1fTDD5Fywo9FaRorSO53U83BhBz6AQGyW" width="640" height="480"></iframe> -->
    				</div>
    			</div>
    			<div class="col-md-4">
    				<div class="contact-us-right">
    					<div class="contact-us-right-titile">
    						<h4><i class="fab fa-buffer"></i> COX'S BAZAR INTERNATIONAL UNIVERSITY</h4>
    					</div>
    					<h6><i class="fas fa-map-marker-alt"></i> Kolatoli Moor, Cox's Bazar, Chittagong, Bangladesh</h6>
    					<h6><i class="fas fa-phone-square"></i> Phone: <?=$tecn_info->phone;?></h6>
    					<h6><i class="fas fa-mobile"></i> Mobile No.: 01762686274-5</h6>
    					<h6><i class="far fa-envelope"></i> Email: <?=$tecn_info->email;?></h6>
    					<h6><i class="fas fa-globe"></i> http://cbiu.ac.bd</h6>
    				</div>
    			</div>
    		</div>

    	</div>
	</div>
</div>
<!-- end contact-us -->


<script>
/* start .facts-counting-area*/
var a = 0;
$(window).scroll(function() {
	/*var oTop = window.innerHeight - jQuery('#facts_counting').offset().top;*/
	var oTop = window.innerHeight - $('#facts_counting').offset().top;
  	if (a == 0 && $(window).scrollTop() > oTop) {
    	$('.counter-value').each(function() {
	      	var $this = $(this),
	        	countTo = $this.attr('data-count');
	      	$({
	        	countNum: $this.text()
	      	})
	      	.animate({
	          	countNum: countTo
	        },

	        {
	          	duration: 2500,
	          	easing: 'swing',
	          	step: function() {
	            	$this.text(Math.floor(this.countNum));
	          	},
	          	complete: function() {
	            	$this.text(this.countNum);
	            	//alert('finished');
	          	}
	        });
    	});
    	a = 1;
  }
});
/* end .facts-counting-area*/




</script>
<?php
//include('footer.php');
?>
