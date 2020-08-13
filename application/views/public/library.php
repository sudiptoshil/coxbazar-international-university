<div class="notice-area">
    <div class="section-top-banner">
        <!-- <img src="images/campus-img.jpg" alt="TECN"> -->
        <div class="container">
            <div class="section-top-banner-links">
                <h1>Library</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url();?>">Home</a></li>
                        <?php
                        if(!empty($id)){
                            ?>
                            <li class="breadcrumb-item active" aria-current="page"><a href="<?php echo base_url();?>home/library">Library</a> <?php echo ' / '.$info->title;?></li>
                            <?php
                        }else{;?>
                            <li class="breadcrumb-item active" aria-current="page">Library</li>
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

                                    <h5 class="notice-card-heading border-bottom text-center text-light main-bg pb-2 mb-4">Library Content</h5>
                                    <div class="notice-card-right-body">
                                        <div class="row">
                                            <?php foreach($info as $e){?>
                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                    <div class="muktijuddha-single single-event card mb-2">
                                                        <div class="single-event-img">
                                                            <?php
                                                            $file_name = $e['file_name'];
                                                            if(!empty($file_name)):
                                                            $type = substr($file_name, -3,4);
                                                            if($type == 'mp4'){
                                                                ?>
                                                                <video width="100%" height="auto" controls>
                                                                    <source src="<?=base_url();?>assets/doc/library/<?=$file_name;?>" type="video/mp4">
                                                                </video>
                                                                <?php
                                                            }elseif($type == 'mp3'){
                                                            ?>
                                                            <audio controls src="<?=base_url();?>assets/doc/library/<?=$file_name;?>">
                                                            <?php
                                                            }elseif($type == 'pdf'){
                                                                ?>
                                                                <embed  src="<?=base_url();?>assets/doc/library/<?=$file_name;?>" style="width:100%;height:100px;"  autoplay="false" autostart="false"></embed >
                                                                <?php
                                                            } else{
                                                                if($file_name == ''){
                                                                ?>
                                                                    <img src="<?=base_url();?>assets/images/image-not-found.jpg" alt="" height="150px">
                                                                <?php
                                                                }else{
                                                                ?>
                                                                <img src="<?=base_url();?>assets/doc/library/<?=$file_name;?>" alt="" height="150px">
                                                                <?php
                                                                }
                                                            }
                                                            else:
                                                            ?> 
                                                                <img src="<?=base_url();?>assets/images/image-not-found.jpg" alt="" height="150px">
                                                            <?php
                                                            endif;
                                                            ?>
                                                        </div>
                                                        <div class="card-block" style="padding: 15px;">
                                                            <h5><?=$e['title'];?></h5>
                                                            <?php if(strlen($e['description']) > 200){echo substr($e['description'],0,200)."...";}else{echo $e['description'];}?>
                                                        </div>
                                                        <div class="text-center mb-2"><a href="<?=base_url();?>home/library/<?=$e['id'];?>" class="btn btn-primary" target="_blank">Click for details...</a></div>
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
                                                <?php if(!empty($info->file_name)):
                                                $type = substr($info->file_name, -3,4);
                                                if($type == 'mp4'){
                                                    ?>
                                                    <video width="100%" height="auto" controls>
                                                        <source src="<?=base_url();?>assets/doc/library/<?=$info->file_name;?>" type="video/mp4">
                                                    </video>
                                                    <?php
                                                }elseif($type == 'mp3'){
                                                ?>
                                                <audio controls src="<?=base_url();?>assets/doc/library/<?=$info->file_name;?>">
                                                    <?php
                                                    }elseif($type == 'pdf'){
                                                        ?>
                                                        <embed  src="<?=base_url();?>assets/doc/library/<?=$info->file_name;?>" style="width:100%;height:400px;"  autoplay="false" autostart="false"></embed >
                                                        <?php
                                                    } else{
                                                        ?>
                                                        <img src="<?=base_url();?>assets/doc/library/<?=$info->file_name;?>" alt="" height="150px">
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