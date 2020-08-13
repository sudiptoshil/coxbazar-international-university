<style>
    .rr{
        margin-top: 10px;
    }
</style>
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form action="<?=base_url('admin/add_students_result_submit')?>" method="post">
                    <div class="card-box">
                        <div class="row">
                            <h4 class="card-title col-sm-6">
                                <?php 
                                if(!empty($info))
                                    echo "Update";
                                else
                                    echo "Add";
                                ?>
                                Student Result
                            </h4>
                            <div class="col-sm-6 text-right">
                                <?php 
                                if(!empty($info)){
                                ?>
                                <a href="<?=base_url('admin/add_students_result')?>" class="btn btn-primary">Add Students Result</a>
                                <?php 
                                }
                                ?>
                                
                                <a href="<?=base_url('admin/students_result')?>" class="btn btn-primary">All Students Result</a>
                            </div>
                        </div>
                    
                        <p class="alert <?php echo $this->session->flashdata('feedback_class');?>">
                            <?php echo $this->session->flashdata('feedback');?>
                        </p>
                        <br>
                        <div class="row">
                            <div class="col-md-4" >
                                <input type="hidden" value="<?php if(!empty($info)) echo $info->id;?>" name="id" id="id">
                                <div class="form-group">
                                    <label>Dept.</label>
                                    <select class="form-control" name="dept">
                                        <?php foreach($all_dept as $d){?>
                                        <option value="<?=$d['id'];?>" <?php if(!empty($info) && $d['id'] == $info->dept){echo "selected";}?>><?=$d['name'];?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4" >
                                <div class="form-group">
                                    <label>Session</label>
                                    <select class="form-control" name="session">
                                        <?php foreach($all_session as $s){?>
                                        <option value="<?=$s['id'];?>" <?php if(!empty($info) && $s['id'] == $info->session){echo "selected";}?>><?=$s['name'];?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4" >
                                <div class="form-group">
                                    <label>Batch</label>
                                    <select class="form-control" name="batch">
                                        <?php foreach($all_batch as $s){?>
                                        <option value="<?=$s['id'];?>" <?php if(!empty($info) && $s['id'] == $info->batch){echo "selected";}?>><?=$s['name'];?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4" >
                                <div class="form-group">
                                    <label>Level - Term</label>
                                    <select class="form-control" name="level_term">
                                        <?php foreach($level_term as $s){?>
                                        <option value="<?=$s['id'];?>"  <?php if(!empty($info) && $s['id'] == $info->level_term){echo "selected";}?>><?=$s['name'];?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4" >
                                <div class="form-group">
                                    <label>Roll</label>
                                    <select name="student_id" class="selectpicker form-control" data-live-search="true">
                                        <option value="0">Select Roll</option>
                                        <?php foreach($roll as $s){?>
                                        <option value="<?=$s['id'];?>" <?php if(!empty($info) && $s['id'] == $info->student_id){echo "selected";}?>><?=$s['roll'];?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4" >
                                <div class="form-group">
                                    <label>Result</label>
                                    <input type="text" class="form-control" name="result" value="<?php if(!empty($info->result)){ echo $info->result;}?>">
                                </div>
                            </div>
                            <div class="col-md-12">
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
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>