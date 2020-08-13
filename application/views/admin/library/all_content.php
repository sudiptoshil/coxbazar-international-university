<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="row">
            <!-- <div class="col-xs-12">
                <h4 class="page-title">Notice</h4>
            </div> -->
            <?php if($success == 1){?>
            <script>
            	alert("New content successfully added.");
            </script>
        	<?php }?>
        	
            <div class="card-box">
            	<div class="all-notice">
		            <div class="content container-fluid">
		                <div class="row">
		                    <div class="col-xs-6">
		                        <h4 class="page-title">All Library Content</h4>
		                    </div>
		                    <div class="col-xs-6 text-right">
		                        <a href="<?=base_url();?>admin/new_library_content" class="btn btn-info">Add new library Content</a>
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
		                                <table id="add_datatable" class="display w-100 dataTable table-bordered table table-stripped">
		                                    <thead>
		                                        <tr>
		                                            <th class="text-center">Sl</th>
		                                            <th class="text-center">Title</th>
		                                            <th class="text-center">Description</th>
		                                            <th>File</th>
		                                            <th>Status</th>
		                                            <th class="text-nowrap">Action</th>
		                                        </tr>
		                                    </thead>
		                                    <tbody>
		                                        <?php
		                                        $sl = 1;
		                                        foreach ($all_content as $key => $n) {
		                                        ?>
		                                        <tr>
		                                            <td class="text-center"><?php echo $sl;?></td>
		                                            <td class="text-center"><?php echo $n['title'];?></td>
		                                            <td><?php echo substr($n['description'],0,100);?></td>
		                                            <!--<td>
                                                        <?php if(!empty($n['image_or_video_name'])):?>
                                                            <img width="50px" src="<?=base_url();?>assets/images/muktijuddha_corner/<?=$n['image_or_video_name'];?>" alt="">
                                                        <?php endif;?>
                                                    </td>-->
                                                    <td>
                                                        <?php if(!empty($n['image_or_video_name'])):
                                                        $type = substr($n['image_or_video_name'], -3,4);
                                                        if($type == 'mp4'){
                                                        ?>
                                                        <video width="320" height="240" controls>
                                                            <source src="<?=base_url();?>assets/doc/library/<?=$n['file_name'];?>" type="video/mp4" autoplay="false" >
                                                        </video>
                                                        <?php
                                                        }elseif($type == 'mp3'){
                                                        ?>
                                                        <audio controls src="<?=base_url();?>assets/doc/library/<?=$n['file_name'];?>">
                                                        <?php
                                                        }else{
                                                        ?>
                                                          <embed  src="<?=base_url();?>assets/doc/library/<?=$n['file_name'];?>" style="width:100%;height:100px;"  autoplay="false" autostart="false"></embed >
                                                        <?php } 
                                                        endif;?>
                                                    </td>
	                                                <td>
                                                        <?php if($n['status']==1):?>
                                                            <a href="<?=base_url('admin/library_change_status/').$n['id'].'/'.$n['status'];?>"
                                                               class="btn btn-info btn-sm">Active</a>
                                                        <?php else:?>
                                                            <a href="<?=base_url('admin/library_change_status/').$n['id'].'/'.$n['status'];?>"
                                                               class="btn btn-danger btn-sm">Inactive</a>
                                                        <?php endif;?>
                                                    </td>
		                                            <td class="text-nowrap">
                                                        <a href="<?=base_url()?>admin/new_library_content/?id=<?=$n['id']?>" title="" class="btn btn-warning"><i class="fa fa-pencil-square" aria-hidden="true"></i></a>
                                                        <a onclick="return(confirm('Are You Sure?'))" href="<?= base_url() ?>admin/delete_library_content/<?=$n['id'];?>" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a>
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