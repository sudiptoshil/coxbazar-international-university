<style>
    .rr{
        margin-top: 10px;
    }
</style>
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form action="<?=base_url('admin/add_offering_degree_entry')?>" method="post">
                    <div class="card-box">
                        <div class="row">
                            <h4 class="card-title col-sm-6">
                                Add New Offered Degree
                            </h4>
                            <div class="col-sm-6 text-right">
                                <a href="<?=base_url('admin/offering_degree')?>" class="btn btn-primary">All Offered Degree</a>
                            </div>
                        </div>
                        <div class="row rr">
                            <input type="hidden" value="<?php if(!empty($info)) echo $info->id;?>" name="batch_id" id="batch_id">
                            <div class="col-md-3 col-sm-3">
                                <div class="form-group">
                                    <label>Faculty</label>
                                    <select class="form-control" name="faculty">
                                        <option value="0">Select Faculty</option>
                                        <?php
                                        foreach ($faculty as $f){
                                        ?>
                                            <option value="<?=$f['id'];?>"><?=$f['name'];?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-3">
                                <div class="form-group">
                                    <label>Department</label>
                                    <select class="form-control" name="dept">
                                        <option value="0">Select Dept</option>
                                        <?php
                                        foreach ($dept as $d){
                                        ?>
                                        <option value="<?=$d['id'];?>"><?=$d['name'];?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-3">
                                <div class="form-group">
                                    <label>Degree Name</label>
                                    <input type="text" class="form-control" name="name" value="<?php if(!empty($info)) echo $info->name;?>">
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-3 text-center">
                                <label>&nbsp;</label>
                                <button type="submit" class="btn btn-primary form-control">
                                    <?php if(!empty($info)) {
                                        echo "Update";
                                    }else{
                                        echo "Submit";
                                    }?>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>