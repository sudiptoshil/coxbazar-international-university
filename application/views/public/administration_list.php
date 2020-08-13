<div class="about-area">
	<div class="section-top-banner">
		<div class="container">
			<div class="section-top-banner-links">
				<h1><?=$this->common->getSpecificField('administration_list','id',$id,'name');?></h1>
				<nav aria-label="breadcrumb">
				  <ol class="breadcrumb">
				    <li class="breadcrumb-item"><a href="<?php echo base_url();?>">Home</a></li>
				    <li class="breadcrumb-item active" aria-current="page"><?=$this->common->getSpecificField('administration_list','id',$id,'name');?></li>
				  </ol>
				</nav>
			</div>
		</div>
	</div>

	<div class="about-area-body">
		<div class="container">
            <div class="sec-title">
                <h4><?=$this->common->getSpecificField('administration_list','id',$id,'name');?></h4>
            </div>
            <p><?=$this->common->getSpecificField('administration_list','id',$id,'description');?></p>
			<?php
               // echo $this->common->getSpecificField('various_content','content_type','register','content');
                //echo $this->common->getSpecificField('various_content','content_type','register','content');
			?>
            <div class="pt-3">
                <div class="sec-title pb-2">
                    <h4>Officers & Staffs</h4>
                </div>
                <div class="row">
                    <?php
                    //echo '<pre>';
                    //print_r($administration_staff_list);
                    foreach($administration_staff as $a){
                        ?>
                        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                            <div class="card mb-3">
                                <div class="card-header text-center text-white main-bg">
                                    <?=$a['name'];?>
                                    <?/*=$this->common->getSpecificField('administration_list','id',$a['list_id'],'name');*/?>
                                </div>
                                <div class="card-body text-center">
                                    <?=$this->common->getSpecificField('designation','id',$a['designation'],'name');?><br>
                                    <?=$a['phone'];?><br>
                                    <?=$a['email'];?>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
		</div>
	</div>
</div>