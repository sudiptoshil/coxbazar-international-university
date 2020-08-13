<script>
    function PrintDiv() {
        var divToPrint = document.getElementById('print');
        var popupWin = window.open('', '_blank', 'width=900,height=900');
        popupWin.document.open();
        popupWin.document.write('<html><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8"><link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet"><link href="<?php echo base_url();?>assets/css/font-awesome.min.css" rel="stylesheet"><link href="<?php echo base_url();?>assets/css/new_style.css" rel="stylesheet"><style>.view-h,.view-d,.dataTables_length,.dataTables_filter,.dataTables_info,.dataTables_paginate  {display: none;}.report-print-panel table {font-size: 11px;}.report-print-panel table th,td {padding: 3px;}.report-print-panel table thead tr th {background: #E39339 !important;color: #fff !important;text-align: center;}.fa:before{color: #fff !important;}.view-h,view-d,.print-btn{display:none;}</style></head><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
        popupWin.document.close();
    }
    /*function excelPrint(){
        $(".lists").hide();
        $(".tr_class_b_remove").attr("class","border_remove");
    
	    window.open('data:application/vnd.ms-excel,' + encodeURIComponent(
            $('div[id$=print]').html()
        ));
    
        setTimeout(function() {
            $(".border_remove").attr("class","tr_class_b_remove");
            $(".lists").show();
    
        }, 1000);
    }*/
</script>
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="row">
            <div class="card-box">
            	<div class="wrapper-body" id="print">
		            <div class="content container-fluid">
		                <div class="row">
		                    <div class="col-xs-6">
		                        <h4 class="page-title">All Alumni</h4>
		                    </div>
                    	    <div class="col-sm-6 col-xs-6 text-right">
                                <button class="btn btn-primary print-btn" onclick="PrintDiv()">Print</button> 
                            </div>
		                </div>
		                <div class="row">
		                    <div class="col-lg-12">
		                        <div class="card-box">
		                            <div class="card-block">
		                                <table id="all_teacher" class="display w-100 dataTable table-bordered table table-stripped all_teacher">
		                                    <thead>
		                                        <tr>
		                                            <th class="text-center">Sl</th>
		                                            <th class="text-nowrap text-center">Name</th>
		                                            <th class="text-center">Dept</th>
		                                            <th class="text-center">Batch</th>
		                                            <th class="text-center">Roll</th>
		                                            <th class="text-center">Phone</th>
		                                            <th class="text-center">Membership Type</th>
		                                            <th class="text-nowrap text-center view-h">Action</th>
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
		                                            <td class="text-nowrap text-center view-d">
	                                            		<a href="<?=base_url();?>admin/add_alumni?alumni_id=<?=$a['id'];?>" title="" target="_blank" class="btn btn-warning"><i class="fa fa-pencil-square" aria-hidden="true"></i></a>
	                                            		<a href="#" title="" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a>
	                                            	</td>
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
            </div>

        </div>
    </div>
</div>