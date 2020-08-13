<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="row">
            <div class="card-box">
                <div class="all-dept_head_speech">
                    <div class="content container-fluid">
                        <div class="row">
                            <div class="col-xs-9">
                                <h4 class="page-title col-xs-4">All Speech</h4>
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
                                <a href="<?=base_url('admin/dept_head_speech_entry')?>" class="btn btn-primary">Add New</a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="card-box">
                                    <div class="card-block">
                                        <table class="custom_datatable table-bordered table table-stripped">
                                            <thead>
                                            <tr>
                                                <th class="text-center">Sl</th>
                                                <th class="text-center">Department</th>
                                                <th class="text-center">Description</th>
                                                <th class="text-center">Date</th>
                                                <th class="text-center">Status</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php if(!empty($all)):?>
                                                <?php $sl=1; foreach($all as $val):?>
                                                    <tr class="text-center">
                                                        <td><?=$sl++;?></td>
                                                        <td><?=$this->common->anyName('dept','id',$val['dept_id'],'short_name');?></td>
                                                        <td><?=$val['description'];?></td>
                                                        <td><?=date('d-m-Y h:i a',strtotime($val['created']));?></td>
                                                        <td>
                                                            <?php if($val['status']==1):?>
                                                                <a href="<?=base_url('admin/dept_head_speech_change_status/').$val['id'].'/'.$val['status'] ;?>"
                                                                   class="btn btn-info btn-sm">Active</a>
                                                            <?php else:?>
                                                                <a href="<?=base_url('admin/dept_head_speech_change_status/').$val['id'].'/'.$val['status'] ;?>"
                                                                   class="btn btn-danger btn-sm">Inactive</a>
                                                            <?php endif;?>
                                                        </td>
                                                        <td>
                                                            <a href="<?= base_url() ?>admin/dept_head_speech_entry/?id=<?=$val['id'];?>"
                                                               class="btn btn-info btn-xs"><i class="fa fa-pencil"></i></a>
                                                            <a onclick="return(confirm('Are You Sure?'))"
                                                               href="<?= base_url() ?>admin/dept_head_speech_delete/<?=$val['id'];?>"
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