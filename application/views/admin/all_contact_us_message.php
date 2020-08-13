<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="row">
            <div class="card-box">
            	<div class="all-notice">
		            <div class="content container-fluid">
		                <?php 
		                if(!empty($msg_id)){
	                    ?>
	                    <div class="row" style="padding-bottom: 30px">
    	                    <div class="col-sm-4 col-sm-offset-4"><h3>Contact Message Details</h3></div>
    	                    <div class="col-sm-4 text-right"><a href="<?=base_url();?>admin/contact_us_msg" class="btn btn-info" >All contact message</a></div>
	                    </div>
	                    <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                              <p><?=$single_contact_us_msg->name;?></p>
                            </div>
                        </div>
	                    <div class="form-group row">
                            <label for="Email" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                              <p><?=$single_contact_us_msg->email;?></p>
                            </div>
                        </div>
	                    <div class="form-group row">
                            <label for="Phone" class="col-sm-2 col-form-label">Phone</label>
                            <div class="col-sm-10">
                              <p><?=$single_contact_us_msg->phone;?></p>
                            </div>
                        </div>
	                    <div class="form-group row">
                            <label for="Subject" class="col-sm-2 col-form-label">Subject</label>
                            <div class="col-sm-10">
                              <p><?=$single_contact_us_msg->subject;?></p>
                            </div>
                        </div>
	                    <div class="form-group row">
                            <label for="Description" class="col-sm-2 col-form-label">Description</label>
                            <div class="col-sm-10">
                              <p><?=$single_contact_us_msg->description;?></p>
                            </div>
                        </div>
	                    <?php
	                    base_url().'admin/contact_us_change_status/'.$single_contact_us_msg->id.'/1';
		                }else{
		                ?>
		                <div class="row">
		                    <div class="col-xs-6">
		                        <h4 class="page-title">All contact us message.</h4>
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
		                                            <th class="text-center">Date</th>
		                                            <th class="text-center">Name</th>
		                                            <th class="text-center">Email</th>
		                                            <th class="text-center">Phone</th>
		                                            <th class="text-center">Subject</th>
		                                            <th class="text-center">Description</th>
		                                            <th>Status</th>
		                                            <th class="text-nowrap">Action</th>
		                                        </tr>
		                                    </thead>
		                                    <tbody>
		                                        <?php
		                                        $sl = 1;
		                                        foreach ($all_contact_us_msg as $key => $n) {
		                                        ?>
		                                        <tr>
		                                            <td class="text-center"><?php echo $sl;?></td>
		                                            <td class="text-center"><?php echo $n['date'];?></td>
		                                            <td class="text-center"><?php echo $n['name'];?></td>
		                                            <td class="text-center"><?php echo $n['email'];?></td>
		                                            <td class="text-center"><?php echo $n['phone'];?></td>
		                                            <td class="text-center"><?php echo $n['subject'];?></td>
		                                            <td><?php echo substr($n['description'],0,100);?></td>
	                                                <td class="text-center">
                                                        <?php if($n['status']==1):?>
                                                            <p>Unread</p>
                                                        <?php else:?>
                                                            <p>Read</p>
                                                        <?php endif;?>
                                                    </td>
		                                            <td class="text-center">
                                                        <a href="<?=base_url()?>admin/contact_us_msg/<?=$n['id']?>" title="" class="btn btn-primary"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                                        <!--<a onclick="return(confirm('Are You Sure?'))" href="<?= base_url() ?>admin/delete_contact_us/<?=$n['id'];?>" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a>-->
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
		                <?php } ?>
		            </div>
            	</div>
            </div>

        </div>
    </div>
</div>