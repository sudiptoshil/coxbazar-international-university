<style>
    .rr{
        margin-top: 10px;
    }
    .editor {
        height: 200px;
    }
</style>
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form action="<?=base_url('admin/add_administration_list_entry')?>" method="post">
                    <div class="card-box">
                        <div class="row">
                            <h4 class="card-title col-sm-6">
                                Add New list
                            </h4>
                            <div class="col-sm-6 text-right">
                                <a href="<?=base_url('admin/administration_list')?>" class="btn btn-primary">All Administration list</a>

                            </div>
                        </div>
                        <div class="row rr">
                            <div class="col-md-12 col-sm-12">
                                <input type="hidden" value="<?php if(!empty($info)) echo $info->id;?>" name="list_id" id="list_id">
                                <div class="form-group">
                                    <label>List Name</label>
                                    <input type="text" class="form-control" name="name" value="<?php if(!empty($info)) echo $info->name;?>">
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea class="editor form-control" name="description" value="<?php if(!empty($info)) echo $info->description;?>"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 text-center">
                                <label>&nbsp</label>
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