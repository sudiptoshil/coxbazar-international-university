<style>
    .rr{
        margin-top: 10px;
    }
</style>
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form action="<?=base_url('admin/add_yearly_summery_entry')?>" method="post">
                    <div class="card-box">
                        <div class="row">
                            <h4 class="card-title col-sm-6">
                                Add New Yearly Students Summery
                            </h4>
                            <div class="col-sm-6 text-right">
                                <a href="<?=base_url('admin/yearly_students_summery/')?>" class="btn btn-primary">All Yearly Students Summery</a>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-2" >
                                <input type="hidden" value="<?php if(!empty($info)) echo $info->id;?>" name="link_id" id="link_id">
                                <div class="form-group">
                                    <label>Session Year</label>
                                    <input type="text" class="form-control" name="year" value="<?php if(!empty($info)) echo $info->year;?>">
                                </div>
                            </div>
                            <div class="col-md-2" >
                                <div class="form-group">
                                    <label>Passing Year</label>
                                    <input type="text" class="form-control" name="passing_year" value="<?php if(!empty($info->passing_year)){ echo $info->passing_year;}?>">
                                </div>
                            </div>
                            <div class="col-md-2" >
                                <div class="form-group">
                                    <label>Total Students</label>
                                    <input type="text" class="form-control" name="total_students" value="<?php if(!empty($info->total_students)){ echo $info->total_students;}?>">
                                </div>
                            </div>
                            <div class="col-md-2" >
                                <div class="form-group">
                                    <label>Total Pass</label>
                                    <input type="text" class="form-control" name="total_pass" value="<?php if(!empty($info->passed)){ echo $info->passed;}?>">
                                </div>
                            </div>
                            <div class="col-md-2" >
                                <div class="form-group">
                                    <label>Total Fail</label>
                                    <input type="text" class="form-control" name="total_fail" value="<?php if(!empty($info->fail)){ echo $info->fail;}?>">
                                </div>
                            </div>
                            <div class="col-md-2">
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