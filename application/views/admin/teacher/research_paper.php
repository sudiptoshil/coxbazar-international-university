<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="row">
            <div class="card-box">
            	<div class="wrapper-body">
		            <div class="content container-fluid">
		                <div class="row">
		                    <div class="col-xs-12">
		                        <h4 class="page-title text-center">Research & Publication</h4>
		                    </div>
		                </div>
		                <div class="row">
		                    <div class="col-md-12">
	                            <?php echo validation_errors(); ?>
	                            
                                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                    <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="headingOne">
                                            <h4 class="panel-title">
                                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                  Add New research paper & publications 
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                                            <div class="panel-body">
                                                <form action="<?=base_url('admin/add_research_paper')?>" method="post" enctype="multipart/form-data">
                                                    <div class="row">
                                                        <?php
                                                        $user_type_teacher = $this->common->get_user_type('teacher');
                                                        $teacher_id = $this->common->user_session_data(3);
                                                        if($user_type_teacher == $this->common->user_session_data(2)){
                                                        ?>
                                                            <input type="hidden" value="<?php echo $this->common->getSpecificField('teachers','id',$teacher_id,'dept');?>" name="dept_id">
                                                            <input type="hidden" value="<?php echo $teacher_id;?>" name="teacher">
                                                            
                                                        <?php
                                                        }else{
                                                        ?>
                                                            <div class="col-md-6" >
                                                                <input type="hidden" value="<?php if(!empty($info)) echo $info->id;?>" name="paper_id" id="paper_id">
                                                                <div class="form-group">
                                                                    <label class="control-label">Department</label>
                                                                    <select name="dept_id" class="form-control" id="dept_teacher">
                                                                        <option value="0">-- Select Department --</option>
                                                                        <?php
                                                                        foreach ($all_dept as $key => $d) {
                                                                        ?>
                                                                            <option value="<?php echo $d['id'];?>"<?php if(!empty($info)){if($info->dept==$d['id']) echo 'selected';}?>>
                                                                                <?php echo $d['name'];?>
                                                                            </option>
                                                                        <?php
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6" >
                                                                <div class="form-group">
                                                                    <label class="control-label">Teacher</label>
                                                                    <select name="teacher" class="form-control" id="teachers">
                                                                        <!--<option value="0">Select teacher</option>-->
                                                                        <?php
                                                                        /*foreach ($all_batch as $key => $d) {
                                                                            ?>
                                                                            <option value="<?php echo $d['id'];?>"<?php if(!empty($info)){if($info->dept==$d['id']) echo 'selected';}?>>
                                                                                <?php echo $d['name'];?>
                                                                            </option>
                                                                            <?php
                                                                        }*/
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        <?php
                                                        }
                                                        ?>
                                                        <div class="col-md-6" >
                                                            <div class="form-group">
                                                                <label>Title</label>
                                                                <input type="text" class="form-control" name="title" value="<?php if(!empty($info)) echo $info->title;?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6" >
                                                            <div class="form-group">
                                                                <label>File:</label>
                                                                <input type="file" class="form-control" name="paper_file" id="paper_file" value="<?php if(!empty($info->file_name)){ echo $info->file_name;}?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row ">
                                                        <div class="text-center">
                                                            <button type="submit" class="btn btn-primary">
                                                                <?php if(!empty($info)) {
                                                                    echo "Update";
                                                                }else{
                                                                    echo "Submit";
                                                                }?>
                                                            </button>
                                                        </div>
                                                    </div>
                                            </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
		                </div>
		                <div class="row">
		                    <div class="col-lg-12">
		                        <div class="card-box">
		                            <div class="card-block">
		                                <table class="display w-100 dataTable table-bordered table table-stripped">
		                                    <legend>All Research & Publication</legend>
		                                    <thead>
		                                        <tr>
		                                            <th class="text-center">Sl</th>
		                                            <th class="text-center text-center">Date</th>
		                                            <th class="text-center text-nowrap">Title</th>
		                                            <th class="text-nowrap text-center">Action</th>
		                                        </tr>
		                                    </thead>
		                                    <tbody>
		                                        <?php
		                                        $sl = 1;
		                                        foreach ($all_paper as $key => $t) {
		                                        ?>
		                                        <tr>
		                                            <td class="text-center" width="30px"><?php echo $sl;?></td>
		                                            <td class="text-nowrap text-center" width="100px"><?php echo $t['date'];?></td>
		                                            <td class=""><?php echo $t['title'];?></td>
		                                            <td class="text-nowrap text-center" width="120px">
	                                            		<a href="<?=base_url()?>assets/doc/research_and_publication/<?=$t['file_name']?>" title="" class="btn btn-primary" target="_blank"><i class="fa fa-eye" aria-hidden="true"></i></a>
	                                            		<!--<a href="<?=base_url()?>admin/research_paper/?id=<?=$t['id']?>" title="" class="btn btn-warning"><i class="fa fa-pencil-square" aria-hidden="true"></i></a>-->
	                                            		<a onclick="return(confirm('Are You Sure?'))" href="<?= base_url() ?>admin/delete_research_paper/<?=$t['id'];?>" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a>
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