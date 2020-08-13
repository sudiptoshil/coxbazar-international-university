<div class="header-area">
	<div class="header-area-top-up text-center">
        <div class="container">
            <div class="header-area-top-up-in d-flex justify-content-center">
            </div>
		</div>
	</div>
	<div class="header-area-top">
	    <div class="container">
            <div class="row">
                <div class="header-area-top-right-s col-lg-2 col-md-0 col-sm-0">
                    <img src="<?php echo base_url();?>assets/images/logo.png" alt="">
                </div>

                <div class="header-area-top-center-s col-lg-10  col-md-12 col-sm-12 head-text">
                    <h1 class="text-center font-bold text-uppercase pt-3" style="font-family: exo;"><b>Cox's Bazar International University</b></h1>
                    <h1 class="text-center pb-3" style="font-family: SolaimanLipi;">কক্সবাজার ইন্টারন্যাশনাল ইউনিভার্সিটি</h1>
                </div>
            </div>
	    </div>
	</div>
	<div class="header-area-bottom ">
		<nav class="navbar navbar-expand-lg navbar-dark bg-light ">
			<div class="container">
				<div class="mobile-menu-area">
					<div class="mobile-menu-area-in w-100 d-flex justify-content-between">
				    	<div class="header-logo-mobile">
						  	<a class="navbar-brand" href="<?php echo base_url();?>">
						  		<img src="<?php echo base_url();?>assets/images/logo.png" alt="">
						  	</a>
				    	</div>
				    	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" style="height: 50px;margin: 11px 0;">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                    </div>
	            </div>
			  	<div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent" >
				    <ul class="navbar-nav">
				      	<li class="nav-item active">
				        	<a class="nav-link" href="<?php echo base_url();?>"><?php echo $this->lang->line('menu_home_header');?> <span class="sr-only">(current)</span></a>
				      	</li>
				      	<li class="nav-item dropdown">
				        	<a class="nav-link dropdown-toggle" href="<?php echo base_url();?>dept" id="deptDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php echo $this->lang->line('menu_department_header');?> <span class="sr-only">(current)</span>
			        	    </a>
					        <div class="dropdown-menu" aria-labelledby="deptDropdown">
						        <a class="dropdown-item" href="<?php echo base_url();?>dept/"><?php echo $this->lang->line('menu_department_header');?></a>
				          		<div class="dropdown-divider"></div>
				          		<?php
                        	    $this->db->where('trash',0);
                        	    $this->db->where('code !=',0);
                        		$all_dept = $this->db->get('dept')->result_array();
                        		
                        		//$all_dept = $this->common->getAll('dept');

				          		foreach($all_dept as $d){?>
								<a class="dropdown-item" href="<?php echo base_url();?>dept/d/<?php echo $d['short_name'];?>"><?php echo $d['name'];?></a> 
								<?php }?>
					        </div>
				      	</li>
				      	<!-- <li class="nav-item">
				        	<a class="nav-link" href="<?php echo base_url();?>">Faculties</a>
				      	</li> -->
				      	<!--<li class="nav-item">
				        	<a class="nav-link" href="">Administration</a>
				      	</li>-->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="<?php echo base_url();?>administration" id="administrationDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php echo $this->lang->line('menu_administration_header');?>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="administrationDropdown" style="left: auto; right: 0;">
                                <a class="dropdown-item" href="<?php echo base_url();?>home/administration"><?php echo $this->lang->line('menu_administration_header');?> </a>
                                <!--<div class="dropdown-divider"></div>
                                <?php
/*
                                $this->db->where('trash',0);
                                $this->db->where('status',1);
                                $administration_list = $this->db->get('administration_list')->result_array();

                                foreach($administration_list as $al){*/?>
                                <a class="dropdown-item" href="<?php /*echo base_url();*/?>home/al/<?php /*echo $al['id'];*/?>"><?php /*echo $al['name'];*/?></a>
                                --><?php /*}*/?>
                                <a class="dropdown-item" href="#">Register</a>
                                <a class="dropdown-item" href="#">Officer List</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="<?php echo base_url();?>home/admission_form" id="admissionDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php echo $this->lang->line('menu_admission_header');?>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="admissionDropdown" style="left: auto; right: 0;">
                                <a class="dropdown-item" href="<?php echo base_url();?>home/admission_form"><?php echo $this->lang->line('menu_admission_header');?></a>
                                <a class="dropdown-item" href="<?php echo base_url();?>home/applicant_login">Applicant Login</a>

                            </div>
                        </li>
				      	<li class="nav-item">
				        	<a class="nav-link" href="#"><?php echo $this->lang->line('menu_faculty_header');?></a>
				      	</li>
				      	
				      	<!-- <li class="nav-item">
				        	<a class="nav-link" href="<?php echo base_url();?>academic">
				          		Academic
				        	</a>
				      	</li> -->
				      	<li class="nav-item">
				        	<a class="nav-link" href="#" target="_blank"><?php echo $this->lang->line('menu_webmail_header');?></a>
				      	</li>
				      	<!-- 
				      	<li class="nav-item">
				        	<a class="nav-link" href="<?php echo base_url();?>campup_life">Campus Life</a>
				      	</li> 
				      	-->
				      	<li class="nav-item">
				        	<a class="nav-link" href="#"><?php echo $this->lang->line('menu_research_publication_header');?></a>
				      	</li>
				      	<li class="nav-item">
				        	<a class="nav-link" href="#"><?php echo $this->lang->line('menu_alumni_header');?></a>
				      	</li>
				      	<li class="nav-item">
				        	<a class="nav-link" href="#"><?php echo $this->lang->line('menu_notice_header');?></a>
				      	</li>
				      	<li class="nav-item dropdown">
				      	  	<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php echo $this->lang->line('menu_more_header');?>
				        	</a>
				        	<div class="dropdown-menu" aria-labelledby="navbarDropdown" style="left: auto; right: 0;">
								<a class="dropdown-item" href="#"><?php echo $this->lang->line('menu_library_header');?></a>
								<a class="dropdown-item" href="#"><?php echo $this->lang->line('menu_current_students_header');?></a>
								<a class="dropdown-item" href="#"><?php echo $this->lang->line('menu_students_results_header');?></a>
								<a class="dropdown-item" href="#"><?php echo $this->lang->line('menu_hostel_seat_allotment_header');?></a>
								<a class="dropdown-item" href="#"><?php echo $this->lang->line('menu_students_club_header');?></a>
								<a class="dropdown-item" href="#"><?php echo $this->lang->line('menu_archives_header');?></a>
				        	</div>
			      		</li>
				    </ul>
			    </div>
		    </div>
		</nav>
    </div>
</div>
<!-- <div class="header-area bg-white border-bottom shadow-sm p-3 px-md-4 mb-3">
<!--	<div class="container">-->
<!--		<div class="d-flex flex-column flex-md-row align-items-center">-->
<!--		  	<div class="my-0 mr-md-auto font-weight-normal">-->
<!--		  		<a href="#" title="Textile Engineering College">-->
<!--		  			<img src="images/logo.png" alt="Textile Engineering College" alt="">-->
<!--		  		</a>-->
<!--		  	</div>-->
<!--			<nav class="my-2 my-md-0 mr-md-3">-->
<!--			    <a class="p-2 text-dark" href="#">Home</a>-->
<!--			    <a class="p-2 text-dark" href="#">About</a>-->
<!--			    <a class="p-2 text-dark" href="#">Academic</a>-->
<!--			    <a class="p-2 text-dark" href="#">Admission</a>-->
<!--			    <a class="p-2 text-dark" href="#">Department</a>-->
<!--		  	</nav>-->
<!--		  	<a class="btn btn-outline-primary" href="#">Notice</a>-->
<!--		</div>-->
<!--	</div>-->
<!--</div> -->
