<div class="imp-hotline-area wrapper-area">
    <div class="section-top-banner">
        <!-- <img src="images/campus-img.jpg" alt="TECN"> -->
        <div class="container">
            <div class="section-top-banner-links">
                <h1>Officer List</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url();?>">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Officer List</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="wrapper-area-body">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="wrapper-area-body-right">
                        <div class="row">
                            <?php
                            //echo '<pre>';
                            //print_r($administration_staff_list);
                            foreach($administration_staff_list as $a){
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
    </div>
</div>