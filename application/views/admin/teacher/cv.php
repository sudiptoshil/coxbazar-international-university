<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="row">
            <div class="card-box">
                <div class="wrapper-body">
                    <div class="content container-fluid">
                        <div class="row">
                            <div class="col-xs-12">
                                <h4 class="page-title text-center">Curriculumn Vitae</h4>
                            </div>
                        </div>
                        <?php
                        $info = $this->common->getAnyInfoRow('cv','user_type',$this->common->get_user_type('teacher'),'user_id',$user_id);
                        //echo print_r($cv);
                        if(!empty($info)){ 
                            ?>
                            <div>
                                <embed src="<?=base_url();?>assets/doc/cv/<?=$info->file_name;?>#page=1&zoom=100" width="100%" height="500">
                            </div>
                            <?php
                        }
                        ?>
                        <form action="<?=base_url('admin/teacher_cv_insert')?>" method="post" enctype="multipart/form-data">
                            <div>
                                <div class="card-box">
                                    <div class="row">
                                        <h4 class="card-title col-sm-12">
                                            <?php if(!empty($info)){
                                                echo "Update";
                                            }else{
                                                echo "Upload";
                                            }?>
                                            Your CV
                                        </h4>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4" >
                                            <input type="hidden" value="<?php if(!empty($info)) echo $info->id;?>" name="cv_id" id="cv_id">

                                            <div class="form-group">
                                                <label>Title</label>
                                                <input type="text" class="form-control" name="title" value="<?php if(!empty($info)) echo $info->title;?>" reqired>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>CV Pdf File:</label>
                                                <input type="file" class="form-control" name="cv_file" id="cv_file" value="<?php if(!empty($info->file_name)){ echo $info->file_name;}?>" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group text-center">
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
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>