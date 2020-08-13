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

<form method="get" action="<?php echo base_url();?>admin/member">
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
.status_complete {
    background-color: #70ac2e;
    margin: auto;
    padding: 3px;
    text-align: center;
    width: 66px;
}
.status_reject {
    background-color: #ff3300;
    margin: auto;
    padding: 3px;
    text-align: center;
    width: 66px;
}
</style>


         
<table>
<thead>
<tr>
<th>NAME</th>
<th>MOBILE</th>
<th>EMAIL</th>
<th>ADDRESS</th>
<th>STATUS</th>
<th>CHANGE</th>
</tr>

<?php
$i=1;
foreach ($all as $item): 
?>
<tr>
<td><?php echo $item['name']?></td>
<td><?php echo $item['phone']?></td>
<td><?php echo $item['email']?></td>
<td><?php echo $item['address']?></td>

<td>
<?php if($item['status']==1)
echo "<div class='status_complete'>Active</div>"?>
<?php if($item['status']==0)
echo "<div class='status_reject'>Inactive</div>"?>
</td>

<td>
<?php if($item['status']==1) { ?>
<a href="<?php echo base_url(); ?>admin/active/<?php echo $item['id']?>/0">
 <img src="<?php echo base_url(); ?>img/stock_lock_open.png" class="logo2" alt="Logo"/>
</a>
<?php } else { ?>
<a href="<?php echo base_url(); ?>admin/active/<?php echo $item['id']?>/1">
 <img src="<?php echo base_url(); ?>img/stock_lock.png" class="logo2" alt="Logo"/>
 </a>
<?php } ?>
</td>
	
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

