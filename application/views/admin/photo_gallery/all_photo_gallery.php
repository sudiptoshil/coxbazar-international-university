<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="row">
            <div class="card-box">
                <div class="all-slider_image">
                    <div class="content container-fluid">
                        <div class="row">
                            <div class="col-xs-9">
                                <h4 class="page-title col-xs-4">All</h4>
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
                                <a href="<?=base_url('admin/add_photo_gallery/')?>" class="btn btn-primary">Add New Image</a>
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
                                                <th class="text-center">Department</th>
                                                <th class="text-center">Image</th>
                                                <th class="text-center">Alt</th>
                                                <th class="text-center">Date</th>
                                                <th class="text-center">Status</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php if(!empty($info)): 
                                                //print_r($info);
                                                $sl=1; foreach($info as $val):?>
                                                    <tr class="text-center">
                                                        <td><?=$sl++;?></td>
                                                        <td><?=$this->common->getSpecificField('dept','id',$val['dept'],'short_name');?></td>
                                                        <td>
                                                            <?php if(!empty($val['image'])):?>
                                                                <img src="<?=base_url('assets/images/photo_gallery/').$val['image']?>" width="100" height="100">
                                                            <?php endif;?>
                                                        </td>
                                                        <td><?=$val['alt'];?></td>
                                                        <td><?=date('d-m-Y h:i a',strtotime($val['date_time']));?></td>
                                                        <td>
                                                            <?php if($val['status']==1):?>
                                                                <a href="<?=base_url('admin/gallery_image_change_status/').$val['id'].'/'.$val['status'];?>"
                                                                   class="btn btn-info btn-sm">Active</a>
                                                            <?php else:?>
                                                                <a href="<?=base_url('admin/gallery_image_change_status/').$val['id'].'/'.$val['status'];?>"
                                                                   class="btn btn-danger btn-sm">Inactive</a>
                                                            <?php endif;?>
                                                        </td>
                                                        
                                                        <td>
                                                            <a href="<?= base_url() ?>admin/add_photo_gallery/?id=<?=$val['id'];?>"
                                                               class="btn btn-info btn-xs"><i class="fa fa-pencil"></i></a>
                                                            <a onclick="return(confirm('Are You Sure?'))"
                                                               href="<?= base_url() ?>admin/delete_photo_gallery/<?=$val['id'];?>"
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