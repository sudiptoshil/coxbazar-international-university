<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="row">
            <div class="card-box">
                <div class="all-slider_image">
                    <div class="content container-fluid">
                        <div class="row">
                            <div class="col-xs-9">
                                <h4 class="page-title col-xs-4 ">All Important Phone No</h4>
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
                                <a role="button" data-toggle="collapse" href="#add_important_phone" aria-expanded="false" aria-controls="add_important_phone" class="btn btn-primary">Add Phone No.</a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="collapse <?php if(isset($_GET['id'])){echo 'in';}?>" id="add_important_phone">
                                    <div class="well">
                                        <form action="<?=base_url('admin/add_important_phone')?>" method="post" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="col-md-4" >
                                                    <input type="hidden" value="<?php if(!empty($info)) echo $info->id;?>" name="id" id="id">
                                                    <div class="form-group">
                                                        <label>Title</label>
                                                        <input type="text" class="form-control" name="title" value="<?php if(!empty($info)) echo $info->title;?>" reqired>
                                                    </div>
                                                </div>
                                                <div class="col-md-4" >
                                                    <div class="form-group">
                                                        <label>Phone Number</label>
                                                        <input type="text" class="form-control" name="phone" value="<?php if(!empty($info)) echo $info->phone;?>" reqired>
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
                                                <th class="text-center">Phone No</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php if(!empty($all_phone)): 
                                                //print_r($info);
                                                $sl=1; foreach($all_phone as $val):?>
                                                    <tr class="text-center">
                                                        <td><?=$sl++;?></td>
                                                        <td><?=$val['title'];?></td>
                                                        <td><?=$val['phone'];?></td>
                                                        <td>
                                                            <!--<a href="<?= base_url() ?>admin/add_important_phone/?id=<?=$val['id'];?>"
                                                               class="btn btn-info btn-xs"><i class="fa fa-pencil"></i></a>-->
                                                            <a onclick="return(confirm('Are You Sure?'))"
                                                               href="<?= base_url() ?>admin/delete_important_phone/<?=$val['id'];?>"
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