<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="row">
            <div class="card-box">
                <div class="all-slider_image">
                    <div class="content container-fluid">
                        <div class="row">
                            <div class="col-xs-9">
                                <h4 class="page-title col-xs-4 ">All Offered Degree</h4>
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
                                <a href="<?=base_url('admin/add_offering_degree/')?>" class="btn btn-primary">Add Offered Degree</a>
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
                                                <th class="text-center">Faculty</th>
                                                <th class="text-center">Department</th>
                                                <th class="text-center">Name</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php if(!empty($info)): 
                                                //print_r($info);
                                                $sl=1; foreach($info as $val):?>
                                                    <tr class="text-center">
                                                        <td width="50px;"><?=$sl++;?></td>
                                                        <td><?=$this->common->getSpecificField('faculty','id',$val['faculty'],'name');?></td>
                                                        <td><?=$this->common->getSpecificField('dept','id',$val['dept'],'name');?></td>
                                                        <td><?=$val['name'];?></td>
                                                        <td width="200px;">
                                                            <a href="<?= base_url() ?>admin/add_offering_degree/?id=<?=$val['id'];?>"
                                                               class="btn btn-warning"><i class="fa fa-pencil"></i> Update</a>
                                                            <a onclick="return(confirm('Are You Sure?'))"
                                                               href="<?= base_url() ?>admin/delete_offering_degree/<?=$val['id'];?>"
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