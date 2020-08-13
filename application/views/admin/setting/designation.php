<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="row">
            <div class="card-box">
                <div class="all-slider_image">
                    <div class="content container-fluid">
                        <div class="row">
                            <div class="col-xs-9">
                                <h4 class="page-title col-xs-4 ">All Designation</h4>
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
                                <a role="button" data-toggle="collapse" href="#add_designation" aria-expanded="false" aria-controls="add_designation" class="btn btn-primary">Add Designation.</a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="collapse <?php if(isset($_GET['id'])){echo 'in';}?>" id="add_designation">
                                    <div class="well">
                                        <form action="<?=base_url('admin/add_designation_entry')?>" method="post" enctype="multipart/form-data">
                                            <input type="hidden" value="<?php if(!empty($info)) echo $info->id;?>" name="id" id="id">
                                            <div class="row">
                                                <div class="col-md-4" >
                                                    <div class="form-group">
                                                        <label>User Type</label>
                                                        <select class="form-control" name="user_type" reqired>
                                                            <option value="0">Select User Type</option>
                                                            <?php
                                                            foreach ($all_user_type as $u) {
                                                            ?>
                                                            <option value="<?=$u['id'];?>" <?php if(isset($_GET['user_type']) && $_GET['user_type']==$u['id']){echo 'selected';}?>><?=$u['name'];?></option>
                                                            <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4" >
                                                    <div class="form-group">
                                                        <label>Designation Name</label>
                                                        <input type="text" class="form-control" name="title" value="<?php if(!empty($info)) echo $info->name;?>" reqired>
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
                                                <th class="text-center">For</th>
                                                <th class="text-center">Designation Name</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php if(!empty($all_designation)):
                                                //print_r($all_user_type);
                                                $sl=1;
                                                $all_desg = "";
                                                foreach($all_user_type as $val):
                                                    $all_desg = $this->common->getAll('designation','type',$val['id']);
                                                    //print_r($all_desg);
                                                    $total_desg = count($all_desg);

                                                    foreach ($all_desg as $d){
                                                        ?>
                                                            <tr class="text-center">
                                                                <td><?=$sl++;?></td>
                                                                <td rowspan=""><?=$val['name'];?></td>
                                                                <!--<td><?/*=$this->common->getSpecificField('type_list','id',$val['type'],'name')*/?></td>-->
                                                                <td>
                                                                    <?php
                                                                        echo $d['name'];
                                                                    ?>
                                                                </td>
                                                                <td>
                                                                    <a href="<?= base_url() ?>admin/designation/?user_type=<?=$val['id'];?>&id=<?=$d['id'];?>"
                                                                       class="btn btn-info btn-xs"><i class="fa fa-pencil"></i></a>
                                                                    <a onclick="return(confirm('Are You Sure?'))"
                                                                       href="<?= base_url() ?>admin/delete_designation/<?=$d['id'];?>"
                                                                       class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
                                                                </td>
                                                            </tr>

                                                        <?php

                                                    }
                                                    endforeach;?>
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