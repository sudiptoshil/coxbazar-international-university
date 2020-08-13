<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="row">
            <div class="card-box">
                <div class="all-slider_image">
                    <div class="content container-fluid">
                        <div class="row">
                            <div class="col-xs-9">
                                <h4 class="page-title col-xs-4 ">All Service box list File</h4>
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
                                <?php if(isset($_GET['id'])){?>
                                <a  href="<?=base_url();?>admin/service_box_list_file" class="btn btn-primary">Add Service box list File</a>
                                <?php }else{?>
                                <a role="button" data-toggle="collapse" href="#add_service_box_list_file" aria-expanded="false" aria-controls="add_service_box_list_file" class="btn btn-primary">Add service box list File</a>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="collapse <?php if(isset($_GET['id'])){echo 'in';}?>" id="add_service_box_list_file">
                                    <div class="well">
                                        <form action="<?=base_url('admin/add_service_box_list_file')?>" method="post" enctype="multipart/form-data">
                                            <input type="hidden" value="<?php if(!empty($info)) echo $info->id;?>" name="file_id" id="file_id">
                                            <div class="row">
                                                <div class="col-md-4 col-sm-4 col-xs-12" >
                                                    <div class="form-group">
                                                        <label>Service box</label>
                                                        <select name="service_box" id="service_box" class="form-control">
                                                            <option value="0">Select Service box</option>
                                                            <?php foreach($all_service_box as $l){ 
                                                            ?>
                                                            <option value="<?php echo $l['id'];?>" <?php if(!empty($info) && $info->service_box == $l['id']){echo "selected";}?>><?=$l['title'];?></option>
                                                            <?php
                                                            }?>
                                                        </select>
                                                        <!--<input type="text" class="form-control" name="title" value="<?php if(!empty($info)) echo $info->title;?>" reqired>-->
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                    <div class="form-group">
                                                        <label>Service box List</label>
                                                        <select name="service_box_list" id="service_box_list" class="form-control">
                                                            <option value="0">Select Service box list</option>
                                                            <?php foreach($all_service_box_list as $l){
                                                            ?>
                                                            <option value="<?php echo $l['id'];?>" <?php if(!empty($info) && $info->service_box_list == $l['id']){echo "selected";}?>><?=$l['title'];?></option>
                                                            <?php
                                                            }?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                    <div class="form-group">
                                                        <label>Title</label>
                                                        <input type="text" class="form-control" name="title" value="<?php if(!empty($info)) echo $info->title;?>" reqired>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                    <div class="form-group">
                                                        <label>File</label>
                                                        <input type="file" class="form-control" name="service_file" value="<?php if(!empty($info)) echo $info->file_name;?>" reqired>
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
                                                <th class="text-center">Service Box</th>
                                                <th class="text-center">Service Box List Name</th>
                                                <th class="text-center">List title</th>
                                                <th class="text-center">File</th>
                                                <th class="text-center">Date</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php if(!empty($all_list_file)): 
                                                //print_r($info);
                                                $sl=1; foreach($all_list_file as $val):?>
                                                    <tr class="text-center">
                                                        <td><?=$sl++;?></td>
                                                        <td>
                                                            <?php
                                                            $sb_id = $this->common->getSpecificField('service_box_list','id',$val['service_box_list'],'service_box');
                                                            echo $this->common->getSpecificField('service_box','id',$sb_id,'title');
                                                            ?>
                                                        </td>
                                                        <td><?=$this->common->getSpecificField('service_box_list','id',$val['service_box_list'],'title');?></td>
                                                        <td><?=$val['title'];?></td>
                                                        <td><?=$val['file_name'];?></td>
                                                        <td><?=date('d-m-Y h:i a',strtotime($val['date_time']));?></td>
                                                        <td>
                                                            <!--<a href="<?= base_url() ?>admin/service_box_list/?id=<?=$val['id'];?>"
                                                               class="btn btn-info btn-xs"><i class="fa fa-pencil"></i></a>-->
                                                            <a onclick="return(confirm('Are You Sure?'))"
                                                               href="<?= base_url() ?>admin/delete_service_box_list_file/<?=$val['id'];?>"
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

