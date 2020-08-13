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
                       Profit Summery
                        <span class="tools pull-right">
                            <a href="javascript:;" class="fa fa-chevron-down"></a>
                            <a href="javascript:;" class="fa fa-cog"></a>
                            <a href="javascript:;" class="fa fa-times"></a>
                         </span>
                    </header>
                   <div class="panel-body" style="text-align:center">
                    <div class="adv-table">


 <form class="form-horizontal bucket-form" method="get" action="<?php echo base_url(); ?>admin/profit_summery/">
             
<table align="center">
<tr>
<td><div class="form-group">					
<label class="col-sm-3 control-label">Warehouse</label></div>	</td>
<td>
<select name="warehouse" class="form-control">
<option value="">All</option>
<?php foreach($warehouse as $warehouse1) { ?>
<option value="<?php echo $warehouse1['id']; ?>"><?php echo $warehouse1['name']; ?></option>
<?php  } ?>
</select></td>


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

    
<script type="text/javascript">     
        function PrintDiv() {    
           var divToPrint = document.getElementById('divToPrint');
           var popupWin = window.open('', '_blank', 'width=900,height=900');
           popupWin.document.open();
           popupWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
            popupWin.document.close();
                }
     </script>
<div style="float:left"><input type="button" value="print" onclick="PrintDiv();" /></div>


 <div id="divToPrint" style="padding: 20px;margin:auto">

	

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


<tr>
<td align=center><b>

 <?php
if(!empty($_GET['date1']))
{
echo $source = $_GET['date1'];
$date = new DateTime($source);
$date1 = $date->format('Y-m-d');
?>
 To <?php
echo $source = $_GET['date2'];
$date = new DateTime($source);
$date2 = $date->format('Y-m-d');
 $date3 = $date->format('d-m-Y');
 }
?></b></td>
</tr>
</table>

<table  class="display table table-bordered table-striped" id="dynamic-table">
                    <thead>
                    <tr><th>HEAD</th><th>AMOUNT</th></tr>
                    </thead>
                    <tbody>

<tr class="gradeX">                 
<td>Gross Profit</td>
<td style="background-color:#D0D0D0"><?php
if(!empty($_GET['date1']))
{
$this->db->where('date >=', $date1);
$this->db->where('date <=', $date2);
}
if(!empty($_GET['warehouse']))
$this->db->where('warehouse',$_GET['warehouse']);

$this->db->select('SUM((`sale`*(`price`-`buy_price`))-(`out_return`*(`price`-`buy_price`))) as score');
$q=$this->db->get('store');
$row=$q->row();
$count_profit = $row->score; 
echo round($count_profit);    //  Profit
?></td>
 </tr>
 
 <tr class="gradeX">                 
<td>Expense</td>
<td style="background-color:#D0D0D0"><?php

if(!empty($_GET['warehouse']))
$this->db->where('warehouse',$_GET['warehouse']);
if(!empty($_GET['date1']))
{
$this->db->where('date >=', $date1);
$this->db->where('date <=', $date2);
}
$this->db->select('SUM(`amount`) as score');
$this->db->where('d_p_id',2);
$q=$this->db->get('transaction');
$row=$q->row();
$debit = $row->score;

if(!empty($_GET['warehouse']))
$this->db->where('warehouse',$_GET['warehouse']);
if(!empty($_GET['date1']))
{
$this->db->where('date >=', $date1);
$this->db->where('date <=', $date2);
}
$this->db->select('SUM(`amount`) as score');
$this->db->where('c_p_id',2);
$q=$this->db->get('transaction');
$row=$q->row();
$credit = $row->score;
echo $expense = $debit - $credit;
?></td>
 </tr>
   <tr class="gradeX">                 
<td>Net Profit</td>
<td style="background-color:#D0D0D0"><?php
echo $count_profit - $expense;
?></td>
 </tr>      
</table>



</div>


                    </div>
                    </div>
                </section>
            </div>
        </div>
        <!-- page end-->
        </section>
    </section>

