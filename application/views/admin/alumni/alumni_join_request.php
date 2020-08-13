<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="row">
            <div class="card-box">
            	<div class="wrapper-body">
		            <div class="content container-fluid">
		                <div class="row">
		                    <div class="col-xs-12">
		                        <h4 class="page-title">Alumni Join Request</h4>
		                    </div>
		                </div>
		                <div class="row">
		                    <div class="col-lg-12">
		                        <div class="card-box">
		                            <div class="card-block">
		                                <table id="table_all_data" class="display w-100 dataTable table-bordered table table-stripped all_teacher">
		                                    <thead>
		                                        <tr>
		                                            <th class="text-center">Sl</th>
		                                            <th class="text-center">Roll</th>
		                                            <th class="text-center">Name</th>
		                                            <th class="text-center">Dept</th>
		                                            <th class="text-nowrap">Batch</th>
		                                            <th class="text-center">Phone</th>
		                                            <th class="text-nowrap">Action</th>
		                                        </tr>
		                                    </thead>
		                                    <tbody>
		                                        <?php
		                                        $sl = 1;
		                                        foreach ($all_alumni as $key => $t) {
		                                        ?>
		                                        <tr>
		                                            <td class="text-center"><?php echo $sl;?></td>
		                                            <td class="text-nowrap text-center"><?php echo $t['roll'];?></td>
		                                            <td class="text-nowrap text-center"><?php echo $t['name'];?></td>
		                                            <td class="text-center"><?php echo $this->common->getSpecificField('dept','id',$t['dept'],'short_name');?></td>
		                                            <td class="text-center"><?php echo $this->common->getSpecificField('batch','id',$t['batch'],'name');?></td>
		                                            <td class="text-center"><?php echo $t['phone'];?></td>
		                                            <td class="text-nowrap text-center">
		                                            	
		                                            	<form method="post" action="<?php echo base_url();?>admin/alumni_join_request">
		                                            		<a href="#" title="View Profile" class="btn btn-primary"  data-toggle="modal" data-target=".alumni-profile-modal">
		                                            			<i class="fa fa-eye" aria-hidden="true"></i>
		                                            		</a>
		                                            		<input type="hidden" name="id" value="<?php echo $t['id'];?>">
		                                            		<button type="submit" name="accept" value="1" class="btn btn-success">Accept</button>
		                                            		<button type="submit"  name="accept" value="2" class="btn btn-danger">Cancel</button>
		                                            	</form>
	                                            		<!-- <a href="#" title="" class="btn btn-primary"><i class="fa fa-eye" aria-hidden="true"></i></a>
	                                            		<a href="#" title="" class="btn btn-warning"><i class="fa fa-pencil-square" aria-hidden="true"></i></a>
	                                            		<a href="#" title="" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a> -->
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
        <!-- Large modal -->
        <div class="modal fade alumni-profile-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog modal-lg" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h4 class="modal-title text-center" id="exampleModalLabel">Alumni Profile Request Info</h4>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-top: -21px;">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">

		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		      </div>
		    </div>
		  </div>
		</div>
    </div>
</div>