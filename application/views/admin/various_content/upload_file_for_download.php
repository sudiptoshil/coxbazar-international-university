<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="row">
            <div class="card-box">
                <div class="all-slider_image">
                    <div class="content container-fluid">
                        <div class="row">
                            <div class="col-xs-9">
                                <h4 class="page-title col-xs-4 ">All uploaded files for download</h4>
                                <?php if($feedback=$this->session->flashdata('feedback')):
                                    $feedback_class= $this->session->flashdata('feedback_class'); ?>
                                    <div class="col-xs-8">
                                        <div class="text-center alert alert-dismissible <?= $feedback_class ?>" role="alert">
                                            <?= $feedback;?>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    </div>
                                <?php endif;?>
                            </div>
                            <div class="col-xs-3 text-right">
                                <a role="button" data-toggle="collapse" href="#add_downloadable_file" aria-expanded="false" aria-controls="add_downloadable_file" class="btn btn-primary">Add File</a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="collapse <?php if(isset($_GET['file_id'])){echo 'in';}?>" id="add_downloadable_file">
                                    <div class="well">
                                        <form action="<?=base_url('admin/add_upload_file_for_download')?>" method="post" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="col-md-4" >
                                                    <input type="hidden" value="<?php if(!empty($info)) echo $info->id;?>" name="file_id" id="file_id">
                                                    <div class="form-group">
                                                        <label>Title</label>
                                                        <input type="text" class="form-control" name="title" value="<?php if(!empty($info)) echo $info->title;?>" reqired>
                                                    </div>
                                                </div>
                                                <div class="col-md-4" >
                                                    <div class="form-group">
                                                        <label>File:</label>
                                                        <input type="file" class="form-control" name="admission_file" id="admission_file" value="<?php if(!empty($info->file_name)){ echo $info->file_name;}?>" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-4" >
                                                    <div class="form-group">
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
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="card-box">
                                    <div class="card-block table-responsive">
                                        <table  class="custom_datatable table-bordered table table-stripped">
                                            <thead>
                                            <tr>
                                                <th class="text-center">Sl</th>
                                                <th class="text-center">Title</th>
                                                <th class="text-center">File Name</th>
                                                <th class="text-center">File link/url</th>
                                                <th class="text-center">Date</th>
                                                <th class="text-center">Preview</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php if(!empty($all_file)): 
                                                //print_r($info);
                                                $sl=1; foreach($all_file as $val):?>
                                                    <tr class="text-center">
                                                        <td><?=$sl++;?></td>
                                                        <td><?=$val['title'];?></td>
                                                        <td><?=$val['file_name'];?></td>
                                                        <td><?=base_url();?>assets/doc/<?=$val['file_name']?></td>
                                                        <td><?=date('d-m-Y h:i a',strtotime($val['date_time']));?></td>
                                                        <td>
                                                            <?php if(!empty($val['file_name'])):?>
                                                              <iframe src="<?=base_url('assets/doc/').$val['file_name']?>" style="width:100%;height:100px;"></iframe>

                                                                <!--<img src="<?=base_url('assets/doc/').$val['file_name']?>" width="100" height="100">-->
                                                            <?php endif;?>
                                                        </td>
                                                        <!--<td>
                                                            <?php if($val['status']==1):?>
                                                                <a href="<?=base_url('admin/admission_file_change_status/').$val['id'].'/'.$val['status'];?>"
                                                                   class="btn btn-info btn-sm">Active</a>
                                                            <?php else:?>
                                                                <a href="<?=base_url('admin/admission_file_change_status/').$val['id'].'/'.$val['status'];?>"
                                                                   class="btn btn-danger btn-sm">Inactive</a>
                                                            <?php endif;?>
                                                        </td>-->
                                                        
                                                        <td>
                                                            <!--<a href="<?= base_url() ?>admin/add_upload_file_for_link/?file_id=<?=$val['id'];?>"
                                                               class="btn btn-info btn-xs"><i class="fa fa-pencil"></i></a>-->
                                                            <a onclick="return(confirm('Are You Sure?'))"
                                                               href="<?= base_url() ?>admin/delete_file_for_link/<?=$val['id'];?>"
                                                               class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
                                                        </td>
                                                    </tr>
                                                <?php endforeach;?>
                                            <?php endif;?>
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