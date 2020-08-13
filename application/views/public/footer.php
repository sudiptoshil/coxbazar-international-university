<div class="footer-area">
	<div class="footer-area-top">
		<div class="container">
			<div class="row">
				<div class="col-md-3">
					<div class="footer-area-top-single">
						<h4>About Us</h4>
						<ul class="list-group list-group-flush">
	  						<li class="list-group-item"><a href="<?=base_url();?>/about" title="">Overview</a></li>
							<li class="list-group-item"><a href="<?=base_url();?>/mission_vision" title="">Mission</a></li>
							<li class="list-group-item"><a href="#" title="">Achievements</a></li>
							<li class="list-group-item"><a href="<?=base_url();?>/notice" title="">News and Events</a></li>
							<li class="list-group-item"><a href="<?=base_url();?>/notice" title="">Notice Board</a></li>
							<li class="list-group-item"><a href="#" title="">Contact Us</a></li>
	  					</ul>
					</div>
				</div>
				<div class="col-md-3">
					<div class="footer-area-top-single">
						<h4>Academics</h4>
						<ul class="list-group list-group-flush">
	  						<li class="list-group-item"><a href="<?=base_url();?>/about" title="">Introduction</a></li>
							<li class="list-group-item"><a href="#" title="home/about">Our History</a></li>
							<li class="list-group-item"><a href="<?=base_url();?>/dept" title="">Departments</a></li>
							<li class="list-group-item"><a href="<?=base_url();?>/faculty" title="">Faculty/Stuff</a></li>
							<li class="list-group-item"><a href="#" title="">Curriculum </a></li>
							<!--<li class="list-group-item"><a href="#" title="">Facilities</a></li>-->

	  					</ul>
					</div>
				</div>
				<div class="col-md-3">
					<div class="footer-area-top-single">
						<h4>Departments</h4>
						<ul class="list-group list-group-flush"><?php
                        		$this->db->where("trash",0);
                        		$this->db->where("status",1);
                        		$this->db->where("id !=",1);
                            	$this->db->order_by('id','asc');
                        		$all_dept = $this->db->get('dept')->result_array();

                        		foreach($all_dept as $d){
                		    ?>
	  						<li class="list-group-item"><a href="<?php echo base_url();?>dept/d/<?php echo $d['short_name'];?>" title=""><?php echo $d['name'];?></a></li>
	  						<?php
                        		}
	  						?>
	  					</ul>
					</div>
				</div>
				<div class="col-md-3">
					<div class="footer-area-top-single">
						<h4>Important Links</h4>
						<ul class="list-group list-group-flush">
						    <?php
                        		$this->db->where("trash",0);
                        		$this->db->where("status",1);
                            	$this->db->order_by('id','asc');
                        		$all_link = $this->db->get('important_links')->result_array();

                        		foreach($all_link as $l){
                		    ?>
                		    <li class="list-group-item"><a href="<?php echo $l['link'];?>" title="" target="_blank"><?php echo $l['title'];?></a></li>
							<?php
                    		}
						    ?>
<!--	  						<li class="list-group-item"><a href="http://www.ugc.gov.bd/en" title="" target="_blank">University Grants Commission</a></li>-->
<!--	  						<li class="list-group-item"><a href="" title="" target="_blank">University Grants Commission</a></li>-->
<!--							<li class="list-group-item"><a href="#" title="" target="_blank">Tender Notice</a></li>-->
<!--							<li class="list-group-item"><a href="#" title="" target="_blank">Forms & Download</a></li>-->
<!--							<li class="list-group-item"><a href="#" title="" target="_blank">Carreer Opportunities</a></li>-->
<!--							<li class="list-group-item"><a href="" title="" target="_blank">Location, Maps and Direction</a></li>-->
	  					</ul>
					</div>

					<!--<div class="footer-area-top-single">
						<h4>Offices</h4>
						<ul class="list-group list-group-flush">
	  						<li class="list-group-item"><a href="#" title="">Office of the VC</a></li>
							<li class="list-group-item"><a href="#" title="">Office of the Treasurer</a></li>
							<li class="list-group-item"><a href="#" title="">Office of the Registrar</a></li>
							<li class="list-group-item"><a href="#" title="">Others</a></li>
	  					</ul>
					</div>-->
				</div>
				<div class="col-md-2 d-none">
					<div class="footer-area-top-single">
						<h4>Tools</h4>
						<ul class="list-group list-group-flush">
	  						<li class="list-group-item"><a href="#" title="">Directory</a></li>
							<li class="list-group-item"><a href="#" title="">Support Tools</a></li>
							<li class="list-group-item"><a href="#" title="">Study Tools</a></li>
							<li class="list-group-item"><a href="#" title="">Career Tools</a></li>
							<li class="list-group-item"><a href="#" title="">TECN Magazine</a></li>
							<li class="list-group-item"><a href="#" title="">Research Tools</a></li>
							<li class="list-group-item"><a href="#" title="">Connect Tools</a></li>
	  					</ul>
					</div>
				</div>
				<div class="col-md-2 d-none">
					<div class="footer-area-top-single">
						<h4>Campus Life</h4>
						<ul class="list-group list-group-flush">
	  						<li class="list-group-item"><a href="#" title="">Get Direction</a></li>
							<li class="list-group-item"><a href="#" title="">Campus Tour</a></li>
							<li class="list-group-item"><a href="#" title="">Group & Club</a></li>
							<!--<li class="list-group-item"><a href="#" title="">Events Calender</a></li>-->
							<li class="list-group-item"><a href="#" title="">Campus Activities</a></li>
							<li class="list-group-item"><a href="#" title="">Cultural</a></li>
							<li class="list-group-item"><a href="#" title="">Residence Halls</a></li>
							<li class="list-group-item"><a href="#" title="">Student Organizations</a></li>
							<li class="list-group-item"><a href="#" title="">Muktijuddho Corner</a></li>
	  					</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="footer-area-bottom">
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<div class="footer-bottom-left">
                        <div class="social_links">

                            <ul>
                            <?php
                            $this->db->where('trash',0);
                            $this->db->where('dept =',1);
                            $all_social_link = $this->db->get('social_link')->result_array();

                            //$all_dept = $this->common->getAll('dept');

                            foreach($all_social_link as $s){?> 
                                <li>
                                    <a href="<?=$s['link'];?>" target="_blank"><?=$s['icon'];?></a>
                                </li>
                            <?php
                            }
                            ?>
                            </ul>
                        </div><br><br>
<!--                        <div class="visitors">-->
<!--                            --><?php
//                            $total_visitor = 0;
//                            $v = $this->db->get('visitor_count')->result_array();
//                            foreach($v as $c){
//                                 $total_visitor = $c['total_visitors'];
//                            }
//                            $this->db->set('total_visitors',$total_visitor+1);
//                            $this->db->update('visitor_count');
//                            ?>
<!--                            Total Visitors: --><?php //echo $total_visitor;?>
<!--                        </div>-->
					</div>
				</div>
				<div class="col-md-4">
				    <?php
				    $this->db->order_by('id','desc');
				    $this->db->limit(1);
				    $last_notice_date_time = $this->db->get('notice')->result_array();

				    //print_r($last_notice_date_time);
				    ?>
					<div class="footer-bottom-center text-center">
						&copy; Copyright <?php echo date('Y');?> | CBIU | All rights reserved.<br><br>
<!--                        <h6 class="m-0">Site Last Update: --><?php //foreach($last_notice_date_time as $r){echo $r['date_time'];}?><!--</h6>-->
					</div>
				</div>
				<div class="col-md-4">
					<div class="footer-bottom-right text-right">
						Made with <i class="far fa-heart text-danger font-weight-bold" ></i> By <a href="https://www.cursorbd.com/" class="text-danger text-decoration-none font-weight-bold" target="_blank" title="Cursor"><img src="<?php echo base_url();?>assets/images/cursor-logo.png" style="width: 20px;" alt=""> Cursor</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>
