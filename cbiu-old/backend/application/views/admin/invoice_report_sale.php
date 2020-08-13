	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css1/tcal.css" />
	<script type="text/javascript" src="<?php echo base_url(); ?>css1/tcal.js"></script> 

 <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
        <!-- page start-->

<div class="row">
            <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading">
                        Dynamic Table
                        <span class="tools pull-right">
                            <a href="javascript:;" class="fa fa-chevron-down"></a>
                            <a href="javascript:;" class="fa fa-cog"></a>
                            <a href="javascript:;" class="fa fa-times"></a>
                         </span>
                    </header>
                   <div class="panel-body" style="text-align:center">
                    <div class="adv-table">

<form method="get" action="<?=site_url('admin/invoice_report/');?>">
<table align="center">
<tr>

<td valign="top"><div class="feild">Start Date</div></td>
<td><input class="tcal" type="input" name="date1" value="<?php echo set_value('date1'); ?>" /></td>

<td valign="top"><div class="feild">End Date</div></td>
<td><input class="tcal" type="input" name="date2" value="<?php echo set_value('date2'); ?>" /></td>
</tr>
</table>


<div class="form-group" style="text-align:center">	
<button type="submit" class="btn btn-info">Submit</button></div>

</form>

</div>	

</div>	


<style>
table
{
border: 1px solid #ddd;
background-color: transparent;
    max-width: 100%;
	border-collapse: collapse;
    border-spacing: 0;
	 width: 100%;
	
}
table thead > tr > th, table tbody > tr > th, table tfoot > tr > th, table thead > tr > td, table tbody > tr > td, table tfoot > tr > td {
    padding: 10px;
}
table-bordered > thead > tr > th, table-bordered > thead > tr > td {
    border-bottom-width: 2px;
}
table-bordered > thead > tr > th, table-bordered > tbody > tr > th, table-bordered > tfoot > tr > th, table-bordered > thead > tr > td, table-bordered > tbody > tr > td, table-bordered > tfoot > tr > td {
    border: 1px solid #ddd;
}
table > thead > tr > th, table > tbody > tr > th, table > tfoot > tr > th, table > thead > tr > td, table > tbody > tr > td, table > tfoot > tr > td {
    border: 1px solid #ddd;
    line-height: 1.42857;
    padding: 8px;
    vertical-align: top;
}
</style>


<table  class="display table table-bordered table-striped" id="dynamic-table">
                    <thead>
                    <tr>
                        <th>INVOICE NO</th>
                       
						 <th>DATE</th>
					<th>DEALER</th>
						
					 </tr>
                    </thead>
                    <tbody>

<?php $i=1; foreach ($all as $item): ?>

<tr class="gradeX">
                   
                        <td><a target="_blank" href="<?php echo base_url(); ?>admin/invoice/<?=$item['id']?>">
						<?=$item['invoice_no']?></a></td>
						
						
         

<td><?=$item['date']?></td>   
<td><?php
$this->db->where("id", $item['customer']); 
	$result = $this->db->get('customer');
	$row = $result->row();
	if(!empty($row->name))
	echo $row->name;
?></td>




                    </tr>

<?php endforeach; ?>
</table>
<?php echo $links; ?>





                    </div>
                    </div>
                </section>
            </div>
        </div>
        <!-- page end-->
        </section>
    </section>

