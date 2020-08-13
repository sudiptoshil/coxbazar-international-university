<style>
    .rr{
        margin-top: 10px;
    }
</style>
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form action="<?=base_url('admin/add_batch_entry')?>" method="post">
                    <div class="card-box">
                        <div class="row">
                            <h4 class="card-title col-sm-6">
                                Add New Batch
                            </h4>
                            <div class="col-sm-6 text-right">
                                <a href="<?=base_url('admin/batch')?>" class="btn btn-primary">All batch</a>

                            </div>
                        </div>
                        <div class="row rr">
                            <div class="col-md-6 col-sm-6">
                                <input type="hidden" value="<?php if(!empty($info)) echo $info->id;?>" name="batch_id" id="batch_id">
                                <div class="form-group">
                                    <label>Batch Name</label>
                                    <input type="text" class="form-control" name="name" value="<?php if(!empty($info)) echo $info->name;?>">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 text-center">
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