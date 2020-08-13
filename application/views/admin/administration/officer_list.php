<style>
    .rr {margin-top: 10px;}
    .editor {height: 200px;}
</style>
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="row">
            <div class="card-box">
                <div class="all-slider_image">
                    <div class="content container-fluid">
                        <div class="row">
                            <div class="col-sm-12 text-right">
                                <a class="btn btn-primary" role="button" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">Add New Administration Staff</a>
                            </div>
                            <br><br>
                            <?php if($feedback=$this->session->flashdata('feedback')):
                                $feedback_class= $this->session->flashdata('feedback_class'); ?>
                                <div class="col-xs-12">
                                    <div class="text-center alert alert-dismissible <?= $feedback_class ?>" role="alert">
                                        <?= $feedback;?>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                </div>
                            <?php endif;?>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="collapse  <?php if(isset($_GET['id'])){echo 'in';}?>" id="collapseExample">
                                    <form action="<?=base_url('admin/add_administration_staff_entry')?>" method="post">
                                        <input type="hidden" value="<?php if(!empty($info)) echo $info->id;?>" name="id" id="id">
                                        <div class="card-box">
                                            <div class="row rr">
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <div class="form-group">
                                                        <label class="control-label">Administration list</label>
                                                        <select name="administration_list" class="form-control" required>
                                                            <option value="0">-- Select --</option>
                                                            <?php
                                                            foreach ($all_list as $key => $d) {
                                                                ?>
                                                                <option value="<?php echo $d['id'];?>" <?php if(!empty($info)){if($info->list_id==$d['id']) echo 'selected';}?> >
                                                                    <?php echo $d['name'];?>
                                                                </option>}
                                                                <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <div class="form-group">
                                                        <label class="control-label">Designation</label>
                                                        <select name="designation" class="form-control" required>
                                                            <option value="0">-- Select --</option>
                                                            <?php
                                                            foreach ($designaion as $key => $d) {
                                                            ?>
                                                            <option value="<?php echo $d['id'];?>" <?php if(!empty($info)){if($info->designation==$d['id']) echo 'selected';}?> >
                                                                <?php echo $d['name'];?>
                                                            </option>
                                                            <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <div class="form-group">
                                                        <label class="control-label">Name</label>
                                                        <input type="text" name="name" value="<?php if(!empty($info)){echo $info->name;}?>" class="form-control" placeholder="Staff Name" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <div class="form-group">
                                                        <label class="control-label">Email</label>
                                                        <input type="email" name="email" value="<?php if(!empty($info)){echo $info->email;}?>" class="form-control" placeholder="Email">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <div class="form-group">
                                                        <label class="control-label">Phone</label>
                                                        <input type="text" name="phone" value="<?php if(!empty($info)){echo $info->phone;}?>" class="form-control" placeholder="Phone" required>
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
                        <div class="row">
                            <div class="col-xs-12">
                                <h4 class="page-title col-xs-4 ">All Administration list</h4>
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
                                                <th class="text-center">Administration List</th>
                                                <th class="text-center">Designation</th>
                                                <th class="text-center">Name</th>
                                                <th class="text-center">Phone</th>
                                                <th class="text-center">Email</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php if(!empty($administration_staff_list)):
                                                //print_r($info);
                                                $sl=1; foreach($administration_staff_list as $val):?>
                                                <tr class="text-center">
                                                    <td width="50px;"><?=$sl++;?></td>
                                                    <td><?=$this->common->getSpecificField('administration_list','id',$val['list_id'],'name');?></td>
                                                    <td><?=$this->common->getSpecificField('designation','id',$val['designation'],'name');?></td>
                                                    <td><?=$val['name'];?></td>
                                                    <td><?=$val['phone'];?></td>
                                                    <td><?=$val['email'];?></td>
                                                    <td width="200px;">
                                                        <a href="<?= base_url() ?>admin/administration_staff/?id=<?=$val['id'];?>"
                                                           class="btn btn-warning"><i class="fa fa-pencil"></i> Update</a>
                                                        <a onclick="return(confirm('Are You Sure?'))"
                                                           href="<?= base_url() ?>admin/delete_administration_staff/<?=$val['id'];?>"
                                                           class="btn btn-danger"><i class="fa fa-trash"></i> Delete</a>
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