	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css1/tcal.css" />
	<script type="text/javascript" src="<?php echo base_url(); ?>css1/tcal.js"></script> 


	
 <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
        <!-- page start-->

<div class="row">
            <div class="col-sm-12">
                <section class="panel">
                   
                   <div class="panel-body" style="text-align:center">
                    <div class="adv-table">

<form method="get" action="<?=site_url('admin/index/');?>">
<table align="center">


<tr>
<td><div class="feild">Start Date</div></td>
<td><input class="tcal" type="input" name="date1" value="<?php echo set_value('date1'); ?>" /></td>

<td><div class="feild">End Date</div></td>
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

<?php
if(empty($_GET['date1']))
{
$last_date = date('Y-m-d', strtotime("-1 day"));
$date1 = date('Y-m-d');
$date2 = date('Y-m-d');
// echo $last_date;
// echo "<br/>".$date1;
}
else
{

$date1 = date("Y-m-d", strtotime($_GET['date1']));
$date2 = date("Y-m-d", strtotime($_GET['date2']));
$last_date = date('Y-m-d', strtotime($date1 . ' - 1 day'));
// echo $date1;
}
// $data['last_date'] = date('Y/m/d', strtotime("-".$date." day"));
?>



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
table, td, th {
    border: 1px solid #000000;
	border-collapse: collapse;
    padding: 5px;
}
td {
    vertical-align: top;
}
</style>




<div style="font-size:20px;line-height: 35px;text-align: center;"> 
<BR/>Final Report <br/>

 FROM <?=date("d-m-Y", strtotime($date1));?> TO <?=date("d-m-Y", strtotime($date2));?>

</div>
<br/>
  

<div class="CSSTableGenerator1" >
              
<table>
<tr>



<td>EXPENSE</td>
<td>PURCHASE</td>
<td>SALE</td>
<td></td>



</tr>

<tr>
<td>
<?php
$this->db->where('date >=', $date1);
$this->db->where('date <=', $date2);
$this->db->select('SUM(`amount`) as score');
$q=$this->db->get('accounts_expense');
$row=$q->row();
echo $count_e = $row->score;   // Opening Quantity

 ?>
</td>
<td>
<?php
$this->db->where('date >=', $date1);
$this->db->where('date <=', $date2);
$this->db->select('SUM(`in`*`price`) as score');
$q=$this->db->get('store');
$row=$q->row();
echo $count_p = $row->score;   // Opening Quantity
 ?>
 </td>
 
 <td>
<?php
$this->db->where('date >=', $date1);
$this->db->where('date <=', $date2);
$this->db->select('SUM(`sale`*`price`) as score');
$q=$this->db->get('store');
$row=$q->row();
echo $count_s = $row->score;   // Opening Quantity
 ?>
 </td>
 
 
  <td>
<?php
// echo $count_s - $count_p - $count_e;   // Opening Quantity
 ?>
 </td>
 
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

