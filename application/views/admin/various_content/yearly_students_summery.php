<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="row">
            <div class="card-box">
            	<div class="wrapper-body">
		            <div class="content container-fluid">
		                <div class="row">
		                    <div class="col-xs-6">
		                        <h4 class="page-title">All Students Summery</h4>
		                    </div>
		                    <div class="col-xs-6 text-right">
		                        <a href="<?=base_url();?>admin/add_yearly_summery" class="btn btn-primary">Add Students Summery</a>
		                    </div>
		                </div>
		                <div class="row">
		                    <div class="col-lg-12">
		                        <div class="card-box">
		                            <div class="card-block">
		                                <table id="all_teacher" class="display w-100 dataTable table-bordered table table-stripped all_teacher">
		                                    <thead>
		                                        <tr>
		                                            <th class="text-center">Sl</th>
		                                            <th class="text-center">Year</th>
		                                            <th class="text-center">Passing Year</th>
		                                            <th class="text-center">Total Students</th>
		                                            <th class="text-center">Pass</th>
		                                            <th class="text-center">Fail</th>
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
		                                            <td class="text-nowrap text-center"><?php echo $t['year'];?></td>
		                                            <td class="text-nowrap text-center"><?php echo $t['passing_year'];?></td>
		                                            <td class="text-center"><?php echo $t['total_students'];?></td>
		                                            <td class="text-center"><?php echo $t['passed'];?></td>
		                                            <td class="text-center"><?php echo $t['fail'];?></td>
		                                            <td class="text-nowrap text-center">
	                                            		<a href="<?=base_url()?>admin/add_yearly_summery/?id=<?=$t['id']?>" title="" class="btn btn-warning"><i class="fa fa-pencil-square" aria-hidden="true"></i></a>
                                                        <a onclick="return(confirm('Are You Sure?'))" href="<?= base_url() ?>admin/delete_yearly_summery/<?=$t['id'];?>" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a>
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