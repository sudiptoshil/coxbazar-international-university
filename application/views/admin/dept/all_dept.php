<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="row">
            <!-- <div class="col-xs-12">
                <h4 class="page-title">Notice</h4>
            </div> -->
            <?php if($success == 1){?>
            <script>
            	alert("New dept. successfully added.");
            </script>
        	<?php }?>
        	
            <div class="card-box">
            	<div class="all-notice">
		            <div class="content container-fluid">
		                <div class="row">
		                    <div class="col-xs-6">
		                        <h4 class="page-title">All Dept</h4>
		                    </div>
		                    <div class="col-xs-6 text-right">
		                        <a href="<?=base_url();?>admin/new_dept" class="btn btn-info">Add new dept.</a>
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
		                                            <th class="text-center">Faculty</th>
		                                            <th class="text-center">Dept. Name</th>
		                                            <th class="text-nowrap text-center">Short Name</th>
		                                            <th>Image</th>
		                                            <th>Phone</th>
		                                            <th>Email</th>
		                                            <th>Overview</th>
		                                            <th>Mission-Vision</th>
		                                            <th>Academic Curriculum</th>
		                                            <th class="text-nowrap">Action</th>
		                                        </tr>
		                                    </thead>
		                                    <tbody>
		                                        <?php
		                                        $sl = 1;
		                                        foreach ($all_dept as $key => $n) {
		                                        ?>
		                                        <tr>
		                                            <td class="text-center"><?php echo $sl;?></td>
		                                            <td class="text-center"><?php echo $this->common->getSpecificField('faculty','id',$n['faculty'],'name');?></td>
		                                            <td class="text-center"><?php echo $n['name'];?></td>
		                                            <td class="text-center"><?php echo $n['short_name'];?></td>
		                                            <td>
                                                        <?php if(!empty($n['image'])):?>
                                                            <img width="50px" src="<?=base_url();?>assets/images/dept/<?=$n['image'];?>" alt="">
                                                        <?php endif;?>
                                                        </td>
		                                            <td class="text-center"><?php echo $n['phone'];?></td>
		                                            <td class="text-center"><?php echo $n['email'];?></td>
		                                            <td><?php echo substr($n['overview'],0,100);?></td>
		                                            <td><?php echo substr($n['mission_vision'],0,100);?></td>
		                                            <td><?php echo substr($n['academic_curriculum'],0,100);?></td>
		                                            <td class="text-nowrap">
                                                        <a href="<?=base_url()?>admin/new_dept/?dept_id=<?=$n['id']?>" title="" class="btn btn-warning"><i class="fa fa-pencil-square" aria-hidden="true"></i></a>
                                                        <a onclick="return(confirm('Are You Sure?'))" href="<?= base_url() ?>admin/delete_dept/<?=$n['id'];?>" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a>
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