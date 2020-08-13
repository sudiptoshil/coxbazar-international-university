<div class="notice-area">
	<div class="section-top-banner">
		<!-- <img src="images/campus-img.jpg" alt="TECN"> -->
		<div class="container">
			<div class="section-top-banner-links">
				<h1>Mujib Borsho</h1>
				<nav aria-label="breadcrumb">
				  <ol class="breadcrumb">
				    <li class="breadcrumb-item"><a href="<?php echo base_url();?>">Home</a></li>
				    <?php
				    if(!empty($id)){
			        ?>
				    <li class="breadcrumb-item active" aria-current="page"><a href="<?php echo base_url();?>home/mujib_borsho">Mujib Borsho</a> <?php echo ' / '.$info->title;?></li>
			        <?php
				    }else{;?>
				    <li class="breadcrumb-item active" aria-current="page">Mujib Borsho</li>
				    <?php
				    };?>
				  </ol>
				</nav>
			</div>
		</div>
	</div>


    <!--Mujib borsho Coutndown area -->
    <div class="countdown-area">
        <div class="container">
            <div class="countdown-area-img">
                <img src="<?=base_url();?>assets/images/mujib_borsho/mujib.jpg" alt="">
            </div>
            <div id="countdown_area_mujib_borsho">
                <div class="mujib_borsho_in">
                    <div class="row">
                        <div class="col-md-3 col-sm-6 col-6 text-center">
                            <div class="mujib_borsho_in_single">
                                <span id="mujib_days">0</span><br>
                                <h5>Days</h5>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-6 text-center">
                            <div class="mujib_borsho_in_single">
                                <span id="mujib_hrs">0</span><br>
                                <h5>Hours</h5>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-6 text-center">
                            <div class="mujib_borsho_in_single">
                                <span id="mujib_min">0</span><br>
                                <h5>Minutes</h5>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-6 text-center">
                            <div class="mujib_borsho_in_single">
                                <span id="mujib_sec">0</span><br>
                                <h5>Seconds</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>

        </div>
    </div>
    <!-- end Mujib borsho Coutndown area -->

	<div class="notice-area-body">
		<div class="container">
		   <div class="row">
		   		<div class="col-md-12">
		   			<div class="notice-card-right">
		   				<div class="tab-content">
					      	<div class="tab-pane fade show active" id="news_and_events" role="tabpanel" aria-labelledby="news_and_events">
					      	    <?php if(empty($id)){?>

				   				<h5 class="notice-card-heading border-bottom text-center text-light main-bg pb-2 mb-4">All Mujib Borsho Content</h5>
				   				<div class="notice-card-right-body">



									<div class="row">
                                	    <?php foreach($info as $e){
                                	    ?>
									    <div class="col-md-4 col-sm-4 col-xs-12">
                                            <div class="single-event card borderbottomLR">
                                                <div class="single-event-img">
                                                    <?php
                                                    $file_name = $e['image_or_video_name'];
                                                    if(!empty($file_name)):
                                                        $type = substr($file_name, -3,4);
                                                        if($type == 'mp4'){
                                                        ?>
                                                        <video width="100%" height="auto" controls>
                                                            <source src="<?=base_url();?>assets/images/mujib_borsho/<?=$file_name;?>" type="video/mp4">
                                                        </video>
                                                        <?php
                                                        }elseif($type == 'mp3'){
                                                        ?>
                                                        <audio controls src="<?=base_url();?>assets/images/mujib_borsho/<?=$file_name;?>">
                                                        <?php
                                                        }elseif($type == 'pdf'){
                                                        ?>
                                                          <embed  src="<?=base_url();?>assets/images/mujib_borsho/<?=$file_name;?>" style="width:100%;height:100px;"  autoplay="false" autostart="false"></embed >
                                                        <?php
                                                        } else{
                                                        ?>
                				   				        <img src="<?=base_url();?>assets/images/mujib_borsho/<?=$file_name;?>" alt="" height="150px">
                			   				            <?php
                                                        }
                                                        endif;
                                                        ?>
                                                </div>

                                                <!--<div class="single-event-img">
                                                    <img src="<?=base_url();?>assets/images/mujib_borsho/<?=$e['image_or_video_name'];?>" alt="" height="150px">
                                                </div>-->
                                                <label style="color:red" class="pt-4 px-3"><i class="far fa-calendar-alt"></i> <?=date('d',strtotime($e['start_date']));?> - <?=date('d F Y',strtotime($e['end_date']));?></label>
                                                <div class="card-block">
                                                    <h5><?=$e['title'];?></h5>
                                                    <?=substr($e['description'],0,200);?>...
                                                </div>
                                                <div class="text-center pb-3">
                                                    <a href="<?=base_url();?>home/mujib_borsho/<?=$e['id'];?>" class="btn btn-primary" target="_blank">Click for details...</a>
                                                </div>
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
			   				            <?php if(!empty($info->image_or_video_name)):
                                        $type = substr($info->image_or_video_name, -3,4);
                                        if($type == 'mp4'){
                                        ?>
                                        <video width="100%" height="auto" controls>
                                            <source src="<?=base_url();?>assets/images/mujib_borsho/<?=$info->image_or_video_name;?>" type="video/mp4">
                                        </video>
                                        <?php
                                        }elseif($type == 'mp3'){
                                        ?>
                                        <audio controls src="<?=base_url();?>assets/images/mujib_borsho/<?=$info->image_or_video_name;?>">
                                        <?php
                                        }elseif($type == 'pdf'){
                                        ?>
                                          <embed  src="<?=base_url();?>assets/images/mujib_borsho/<?=$info->image_or_video_name;?>" style="width:100%;height:400px;"  autoplay="false" autostart="false"></embed >
                                        <?php
                                        } else{
                                        ?>
				   				        <img src="<?=base_url();?>assets/images/mujib_borsho/<?=$info->image_or_video_name;?>" alt="" height="150px">
			   				            <?php
                                        }
                                        endif;
                                        ?>
                                    </div>
			   				        <!--<div class="mb-4">
				   				        <img src="<?=base_url();?>assets/images/mujib_borsho/<?=$info->image_or_video_name;?>" alt="" height="150px">
				   				    </div>-->
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

    /* Mujib borsho countdown*/
    // Set the date we're counting down to
    var countDownDate = new Date("Mar 17, 2020 00:00:00").getTime();

    // Update the count down every 1 second
    var x = setInterval(function() {

        // Get today's date and time
        var now = new Date().getTime();

        // Find the distance between now and the count down date
        var distance = countDownDate - now;

        // Time calculations for days, hours, minutes and seconds
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        // Output the result in an element with id="demo"
        document.getElementById("mujib_days").innerHTML =   days ;
        document.getElementById("mujib_hrs").innerHTML =   hours ;
        document.getElementById("mujib_min").innerHTML =   minutes ;
        document.getElementById("mujib_sec").innerHTML =   seconds ;

        // If the count down is over, write some text
        if (distance < 0) {
            clearInterval(x);
            document.getElementById("mujib_days").innerHTML =  0 ;
            document.getElementById("mujib_hrs").innerHTML =   0 ;
            document.getElementById("mujib_min").innerHTML =   0 ;
            document.getElementById("mujib_sec").innerHTML =   0 ;
        }
    }, 1000);
    /* end Mujib borsho countdown*/
    </script>
