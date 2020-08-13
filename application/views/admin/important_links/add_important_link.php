<style>
    .rr{
        margin-top: 10px;
    }
</style>
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form action="<?=base_url('admin/add_important_link_entry')?>" method="post" enctype="multipart/form-data">
                    <div class="card-box">
                        <div class="row">
                            <h4 class="card-title col-sm-6">
                                Add New Important Links
                            </h4>
                            <div class="col-sm-6 text-right">
                                <a href="<?=base_url('admin/important_link/')?>" class="btn btn-primary">All important links</a>

                            </div>
                        </div>
                        <div class="row rr">
                            <div class="col-md-8 col-md-offset-2" >
                                <input type="hidden" value="<?php if(!empty($info)) echo $info->id;?>" name="link_id" id="link_id">
                                <div class="form-group">
                                    <label>Title</label>
                                    <input type="text" class="form-control" name="title" value="<?php if(!empty($info)) echo $info->title;?>">
                                </div>
                                <div class="form-group">
                                    <label>Link</label>
                                    <input type="text" class="form-control" name="link" value="<?php if(!empty($info->link)){ echo $info->link;}?>">
                                </div>
                            </div>
                        </div>
                        <div class="row rr">
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
                </form>
            </div>
        </div>
    </div>
</div>