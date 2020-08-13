<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="row">
            <!-- <div class="col-xs-12">
                <h4 class="page-title">Notice</h4>
            </div> -->
            <?php if($success == 1){?>
            <script>
            	alert("Notice Successfully Inserted.");
            </script>
        	<?php }?>
        	
            <div class="card-box">
            	<div class="all-notice">
		            <div class="content container-fluid">
		                <div class="row">
		                    <div class="col-xs-12">
		                        <h4 class="page-title">All Notices</h4>
		                    </div>
		                </div>
		                <div class="row">
		                    <div class="col-lg-12">
		                        <div class="card-box">
		                            <div class="card-block table-responsive">
		                               <!--  <h6 class="card-title text-bold">Default Datatable</h6>
		                                <p class="content-group">
		                                    This is the most basic example of the datatables with zero configuration. Use the <code>.datatable</code> class to initialize datatables.
		                                </p> -->
		                                <table id="all_notice" class="display w-100 dataTable table-bordered table table-stripped">
		                                    <thead>
		                                        <tr>
		                                            <th class="text-center">Sl</th>
		                                            <th class="text-center">Date</th>
		                                            <th class="text-center">Notice Type</th>
		                                            <th>Title</th>
		                                            <th>File Name</th>
		                                            <th>Short Description</th>
		                                            <th>Active</th>
		                                            <th class="text-nowrap">Action</th>
		                                        </tr>
		                                    </thead>
		                                    <tbody>
		                                        <?php
		                                        $sl = 1;
		                                        foreach ($all_notice as $key => $n) {
		                                        ?>
		                                        <tr>
		                                            <td class="text-center"><?php echo $sl;?></td>
		                                            <td class="text-nowrap text-center"><?php echo $n['date'];?></td>
		                                            <td class="text-center"><?php echo $this->admin_model->notice_type($n['notice_type']);?></td>
		                                            <td><?php echo $n['title'];?></td>
		                                            <td>
                                                        <?php 
                                                        $file_name = $n['image'];
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
                                                    </td>
		                                            <td><?php if(strlen($n['description']) > 100){echo substr($n['description'],0,100)."...";}else{echo $n['description'];}?></td>
	                                                <td>
                                                        <?php if($n['status']==1):?>
                                                            <a href="<?=base_url('admin/notice_change_status/').$n['id'].'/'.$n['status'];?>"
                                                               class="btn btn-info btn-sm">Active</a>
                                                        <?php else:?>
                                                            <a href="<?=base_url('admin/notice_change_status/').$n['id'].'/'.$n['status'];?>"
                                                               class="btn btn-danger btn-sm">Inactive</a>
                                                        <?php endif;?>
                                                    </td>
		                                            <td class="text-nowrap">
                                                        <a href="<?=base_url()?>admin/new_notice/?notice_id=<?=$n['id']?>" title="" class="btn btn-warning"><i class="fa fa-pencil-square" aria-hidden="true"></i></a>
                                                        <a onclick="return(confirm('Are You Sure?'))" href="<?= base_url() ?>admin/delete_notice/<?=$n['id'];?>" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a>
	                                            	</td>
		                                        </tr>
		                                        <?php
		                                        $sl++;
		                                        }
		                                        ?>
		                                    </tbody>
		                                </table>
		                            </div>
		                        </div>
		                    </div>
		                </div>
		            </div>
            	</div>
            </div>

        </div>
    </div>
</div>