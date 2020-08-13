<div class="directory-area wrapper-area">
    <div class="content container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h2 class="page-title">Directory</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card-box">
                    <div class="card-block">
                        <table id="table_all_data" class="all_alumni display w-100 dataTable table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center">Sl</th>
                                    <th class="text-nowrap text-center">Name</th>
                                    <th class="text-center">Dept</th>
                                    <th class="text-center">Batch</th>
                                    <th class="text-center">Roll</th>
                                    <th class="text-center">Phone</th>
                                    <th class="text-center">Membership Type</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sl = 1;
                                foreach ($all_alumni as $key => $a) {
                                ?>
                                <tr>
                                    <td class="text-center"><?php echo $sl;?></td>
                                    <td class="text-nowrap text-center"><?php echo $a['name'];?></td>
                                    <td class="text-center"><?php echo $this->common->getSpecificField('dept','id',$a['dept'],'short_name');?></td>
                                    <td class="text-center"><?php echo $this->common->getSpecificField('batch','id',$a['batch'],'name');;?></td>
                                    <td class="text-center"><?php echo $a['roll'];?></td>
                                    <td class="text-center"><?php echo $a['phone'];?></td>
                                    <td class="text-center"><?php echo $this->common->getSpecificField('type_list','id',$this->common->getSpecificField('alumni','student_id',$a['id'],'membership'),'name');?></td>
                                   
                                </tr>
                                <?php
                                $sl++;
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>