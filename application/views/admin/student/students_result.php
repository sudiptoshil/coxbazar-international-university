<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="row">
            <div class="card-box">
            	<div class="wrapper-body">
		            <div class="content container-fluid">
		                <div class="row">
		                    <div class="col-xs-6">
		                        <h4 class="page-title">All Students Result</h4>
		                    </div>
		                    <div class="col-xs-6 text-right">
		                        <a href="<?=base_url();?>admin/add_students_result" class="btn btn-primary">Add Students Result</a>
		                    </div>
		                </div>
		                
                        <p class="alert <?php echo $this->session->flashdata('feedback_class');?>">
                            <?php echo $this->session->flashdata('feedback');?>
                        </p>
		                <div class="row">
		                    <div class="col-lg-12">
		                        <div class="card-box">
		                            <div class="card-block">
		                                <table id="all_teacher" class="display w-100 dataTable table-bordered table table-stripped all_teacher">
		                                    <thead>
		                                        <tr>
		                                            <th class="text-center">Sl</th>
		                                            <th class="text-center">Roll</th>
		                                            <th class="text-center">Dept</th>
		                                            <th class="text-center">Session</th>
		                                            <th class="text-center">Batch</th>
		                                            <th class="text-center">Level - Term</th>
		                                            <th class="text-center">Result</th>
		                                            <th class="text-center">Action</th>
		                                        </tr>
		                                    </thead>
		                                    <tbody>
		                                        <?php
		                                        $sl = 1;
		                                        foreach ($info as $key => $t) {
		                                        ?>
		                                        <tr>
		                                            <td class="text-center"><?php echo $sl;?></td>
		                                            <td class="text-nowrap text-center"><?php echo $this->common->getSpecificField('students','id',$t['student_id'],'roll');?></td>
		                                            <td class="text-nowrap text-center"><?php echo $this->common->getSpecificField('dept','id',$t['dept'],'name');?></td>
		                                            <td class="text-center"><?php echo $this->common->getSpecificField('academic_session','id',$t['session'],'name');?></td>
		                                            <td class="text-center"><?php echo $this->common->getSpecificField('batch','id',$t['batch'],'name');?></td>
		                                            <td class="text-center"><?php echo $this->common->getSpecificField('level_term','id',$t['level_term'],'name');?></td>
		                                            <td class="text-center"><?php echo $t['result'];?></td>
		                                            <td class="text-nowrap text-center">
	                                            		<a href="<?=base_url()?>admin/add_students_result/?id=<?=$t['id']?>" title="" class="btn btn-warning"><i class="fa fa-pencil-square" aria-hidden="true"></i></a>
                                                        <a onclick="return(confirm('Are You Sure?'))" href="<?= base_url() ?>admin/delete_students_result/<?=$t['id'];?>" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a>
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