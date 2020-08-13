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
                <form action="<?=base_url('admin/add_admission')?>" method="post">
                    <div class="card-box">
                        <div class="row">
                            <h4 class="card-title col-sm-12">
                                Admission
                            </h4>
                        </div>
                        <div class="row rr">
                            <div class="col-md-12" >
                                <input type="hidden" value="<?php if(!empty($info)) echo $info->id;?>" name="admission_id" id="admission_id">
                                <div class="form-group">
                                    <label>Admission Details</label>
                                    <textarea class="editor form-control" name="description" rows="7" placeholder="Admission details"><?php if(!empty($info)) echo $info->content;?></textarea>
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