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
                       Order Report
                        <span class="tools pull-right">
                            <a href="javascript:;" class="fa fa-chevron-down"></a>
                            <a href="javascript:;" class="fa fa-cog"></a>
                            <a href="javascript:;" class="fa fa-times"></a>
                         </span>
                    </header>
                    <div class="panel-body" style="text-align:center">
                    <div class="adv-table">

<form method="get" action="<?php echo base_url();?>main/order/">
<table align="center">
<tr>
<td><div class="feild">Start Date</div></td>
<td><input class="tcal" type="input" name="date1" value="<?php echo date('d-m-Y') ?>" /></td>

<td><div class="feild">End Date</div></td>
<td><input class="tcal" type="input" name="date2" value="<?php echo date('d-m-Y'); ?>" /></td>
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


         
<table>
<thead>
<tr>
<th>MEMBER</th>
<th>AMOUNT</th>
<th>DATE</th>
<th>TIME</th>
<th>STATUS</th>
<th>COURIER</th>
<th>OTHER</th>
<th>NOTE</th>
<th>CREATE BILL</th>
<th>INVOICE</th>
</tr>

<?php
$i=1;
foreach ($all as $item): 
?>
<tr>
<td><?php echo $item['name']; ?></td>
<td><?php echo $item['amount']?></td>
<td><?php echo $item['date']?></td>
<td><?php echo $item['time']?></td>

<td>
<?php if($item['status']==0) { ?> <div class="label label-primary">Pending</div> <?php } ?>
<?php if($item['status']==1) { ?> <div class="label label-success">Completed</div> <?php } ?>
</td>
<td><?php echo $item['courier']?></td>
<td><?php echo $item['other']?></td>
<td><?php echo $item['note']?></td>
<td><a target="_blank" class="menu" href="<?php echo base_url(); ?>main/create_bill/<?php echo $item['id']?>">Create Bill</a></td>	
<td><a target="_blank" class="menu" href="<?php echo base_url(); ?>main/invoice/<?php echo $item['id']?>">Invoice</a></td>
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

