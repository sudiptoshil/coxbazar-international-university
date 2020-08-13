<style>
    .rr{
        margin-top: 10px;
    }
    .ck-editor__editable {
      min-height: 250px;
    }
</style>
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form action="<?=base_url('admin/add_principal_msg')?>" method="post" enctype="multipart/form-data">
                    <div class="card-box">
                        <div class="row">
                            <h4 class="card-title col-sm-6">
                                Principal Message
                            </h4>
                            <?php 
                            if($this->session->flashdata('feedback')) {
                                echo $message = $this->session->flashdata('feedback');
                            }
                            ?>
                        </div>
                        <div class="row rr">
                            <div class="col-md-12" >
                                <input type="hidden" value="<?php if(!empty($info)) echo $info->id;?>" name="principal_msg_id" id="principal_msg_id">
                                <div class="form-group">
                                    <label>Principal Message Details</label>
                                    <textarea class="editor form-control" name="description" rows="7" placeholder="Principal Message details"><?php if(!empty($info)) echo $info->content;?></textarea>
                                </div>
                            </div>
                            <div class="col-md-4" >
                                <div class="form-group">
                                    <label>Principal Image:</label>
                                    <input type="file" class="form-control" name="principal_image" id="principal_image" value="<?php if(!empty($info->file_name)){ echo $info->file_name;}?>">
                                </div>
                            </div>
                            <div class="col-md-8">
                                <img src="<?=base_url();?>assets/images/teachers/<?php if(!empty($info->file_name)){ echo $info->file_name;}?>" alt="" class="img-thumbnail" width="80px"/>
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