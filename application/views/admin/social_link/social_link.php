<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="row">
            <div class="card-box">
                <div class="all-slider_image">
                    <div class="content container-fluid">
                        <div class="row">
                            <div class="col-xs-9">
                                <h4 class="page-title col-xs-4 ">All Social Link</h4>
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
                                <a role="button" data-toggle="collapse" href="#add_social_link" aria-expanded="false" aria-controls="add_social_link" class="btn btn-primary">Add Social Link.</a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="collapse <?php if(isset($_GET['id'])){echo 'in';}?>" id="add_social_link">
                                    <div class="well">
                                        <form action="<?=base_url('admin/add_social_link_entry')?>" method="post" enctype="multipart/form-data">
                                            <input type="hidden" value="<?php if(isset($_GET['id']) && !empty($info)) echo $info->id;?>" name="link_id" id="id">
                                            <div class="row">
                                                <div class="col-md-4" >
                                                    <div class="form-group">
                                                        <label>Department</label>
                                                        <select class="form-control" name="dept" reqired>
                                                            <option value="0">Select department</option>
                                                            <?php
                                                            foreach ($all_dept as $u) {
                                                                ?>
                                                                <option value="<?=$u['id'];?>" <?php if(isset($_GET['id']) && $info->dept==$u['id']){echo 'selected';}?>><?=$u['name'];?></option>
                                                                <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4" >
                                                    <div class="form-group">
                                                        <label>Link Name</label>
                                                        <input type="text" class="form-control" name="name" value="<?php if(isset($_GET['id']) && !empty($info)) echo $info->name;?>" reqired>
                                                    </div>
                                                </div>
                                                <div class="col-md-4" >
                                                    <div class="form-group">
                                                        <label>Link</label>
                                                        <input type="text" class="form-control" name="link" value="<?php if(isset($_GET['id']) && !empty($info)) echo $info->link;?>" reqired>
                                                    </div>
                                                </div>
                                                <div class="col-md-4" >
                                                    <div class="form-group">
                                                        <label>Icon </label>
                                                        <input type="text" class="form-control" name="icon" value="<?php if(isset($_GET['id']) && !empty($info)){ echo htmlspecialchars($info->icon);}?>" reqired>
                                                        <span><a href="https://fontawesome.com/icons?d=gallery&s=brands&m=free" target="_blank">Get icon from here</a>. Then select an icon. Then copy the tag like "<code data-balloon="Copy HTML" data-balloon-pos="down" class="dib f2 hover-lime7"><span class="o-40">&lt;i class="</span>fab fa-facebook<span class="o-40">"&gt;&lt;/i&gt;</span></code>"</span>
                                                    </div>
                                                </div>
                                                <div class="col-md-4" >
                                                    <div class="form-group">
                                                        <label>&nbsp;</label>
                                                        <button type="submit" class="btn btn-primary form-control">
                                                            <?php if(isset($_GET['id']) && !empty($info)) {
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
                                                <th class="text-center">Dept</th>
                                                <th class="text-center">Name</th>
                                                <th class="text-center">Icon</th>
                                                <th class="text-center">Link</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            if(!empty($all_social_link)):
                                                //print_r($all_user_type);
                                                $sl=1;
                                                    foreach ($all_social_link as $val){
                                                ?>
                                                        <tr class="text-center">
                                                            <td><?=$sl++;?></td>
                                                            <td><?=$this->common->getSpecificField('dept','id',$val['dept'],'name');?></td>
                                                            <td><?=$val['name'];?></td>
                                                            <!--<td><?/*=$this->common->getSpecificField('type_list','id',$val['type'],'name')*/?></td>-->
                                                            <td>
                                                                <?php
                                                                echo $val['icon'];
                                                                ?>
                                                            </td>
                                                            <td>
                                                                <?php
                                                                echo $val['link'];
                                                                ?>
                                                            </td>
                                                            <td>
                                                                <a href="<?= base_url() ?>admin/social_link/?id=<?=$val['id'];?>"
                                                                   class="btn btn-info btn-xs"><i class="fa fa-pencil"></i></a>
                                                                <a onclick="return(confirm('Are You Sure?'))"
                                                                   href="<?= base_url() ?>admin/delete_social_link/<?=$val['id'];?>"
                                                                   class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
                                                            </td>
                                                        </tr>

                                                        <?php

                                                    } ?>
                                            <?php endif;
                                            //echo $this->db->last_query();
                                            ?>

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
