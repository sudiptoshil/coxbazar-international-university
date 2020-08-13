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

<form method="get" action="<?=site_url('admin/store_value_report/');?>">
<table align="center">
<tr>


<td><div class="form-group">					
<label class="col-sm-3 control-label">Category</label></div>	</td>
<td>
<select class="form-control input-lg m-bot15" name="category">
<option value="">All</option>
<option value="none">None</option>
<?php foreach($sub_category as $category) { ?>
<option value="<?php echo $category['id']; ?>"><?php echo $category['sub']; ?></option>
<?php  } ?>
</select></td>

<td><div class="feild">Start Date</div></td>
<td><input class="tcal" type="input" name="date1" value="<?php echo set_value('date1'); ?>" /></td>

<td><div class="feild">End Date</div></td>
<td><input class="tcal" type="input" name="date2" value="<?php echo set_value('date2'); ?>" /></td>
</tr>

<tr>
<td>Opening <input type="checkbox" value="1" name="opening"></td>
<td>Receiving <input type="checkbox" value="1" name="receiving"></td>
<td>Sales <input type="checkbox" value="1" name="sales"></td>
<td colspan=0>Closing <input type="checkbox" value="1" name="closing"></td>
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
B.C.M<BR/>Stock Statement <br/>

 FROM <?=$date1_for_details=date("d-m-Y", strtotime($date1));?> TO <?=$date2_for_details=date("d-m-Y", strtotime($date2));?>

</div>
<br/>
  

<div class="CSSTableGenerator1" >
              
<table>
<tr>

<td>NAME</td>
<?php if(!empty($_GET['opening']) && $_GET['opening']==1) { ?>
<td>O/QTY</td><td>Rate</td><td>Value</td>
<?php } ?>
<?php if(!empty($_GET['receiving']) && $_GET['receiving']==1) { ?>
<td>Rec/QTY</td><td>Rate</td><td>Value</td>
<?php } ?>
<?php if(!empty($_GET['sales']) && $_GET['sales']==1) { ?>
<td>S/QTY</td><td>Rate</td><td>Value</td>
<?php } ?>
<?php if(!empty($_GET['closing']) && $_GET['closing']==1) { ?>
<td>C/QTY</td><td>Rate</td><td>Value</td>
<?php } ?>

</tr>

<?php
$i=1;
$total_opening_value = 0;
$total_receiving_value = 0;
$total_sale_value = 0;
$total_stock_value = 0;
$total_count_store_price =0;
$total_count_sale_price =0;
$total_cgs =0;
foreach ($product as $item): 

?>
<tr>
<td><?=$item['name'];
$this->db->where("id", $item['code']); 
$result = $this->db->get('product');
$product = $result->row(); 
$opening_stock = $product->opening_stock;
?></td>


<?php
$this->db->where('date <=', $last_date);
$this->db->select('SUM(`in`-`in_return`-`sale`+`out_return`) as score');
$this->db->where('bar_code',$item['code']);
$q=$this->db->get('store');
$row=$q->row();
$count_opening = $row->score+$opening_stock;   // Opening Quantity
 ?>


<?php
$opening_value = $product->buy_price*$count_opening;
$total_opening_value = $total_opening_value + $opening_value;
?>

<?php
$this->db->where('date >=', $date1);
$this->db->where('date <=', $date2);
$this->db->select('SUM(`in`) as score');
$this->db->where('bar_code',$item['code']);
$q=$this->db->get('store');
$row=$q->row();
$count_receive = $row->score;   // Receive Quantity

$this->db->where('date >=', $date1);
$this->db->where('date <=', $date2);
$this->db->select('SUM(`in_return`) as score');
$this->db->where('bar_code',$item['code']);
$q=$this->db->get('store');
$row=$q->row();
$count_receive_return = $row->score;   // Receive Return Quantity
$total_recieve = $count_receive - $count_receive_return;
$count_opening + $count_receive - $count_receive_return ?></td>

<?php
$receiving_value = $product->buy_price*$total_recieve;
$total_receiving_value = $total_receiving_value + $receiving_value;
?>

<?php
$this->db->where('date >=', $date1);
$this->db->where('date <=', $date2);
$this->db->select('SUM(`sale`) as score');
$this->db->where('bar_code',$item['code']);
$q=$this->db->get('store');
$row=$q->row();
$count_sate = $row->score;   // Sales Quantity

$this->db->where('date >=', $date1);
$this->db->where('date <=', $date2);
$this->db->select('SUM(`out_return`) as score');
$this->db->where('bar_code',$item['code']);
$q=$this->db->get('store');
$row=$q->row();
$count_sate_return = $row->score;   // Sales Return Quantity
$total_sale = $count_sate - $count_sate_return;
?>

<?php
$sale_value = $product->buy_price*$total_sale;
$total_sale_value = $total_sale_value + $sale_value;
?>



<?php $closing = $count_opening + $count_receive - $count_receive_return - $count_sate + $count_sate_return;
$closing; ?>



<?php
$stock_value = $product->buy_price*$closing;
$total_stock_value = $total_stock_value + $stock_value;
?>

<?php if(!empty($_GET['opening']) && $_GET['opening']==1) { ?>
<td><?=round($count_opening)?></td>
<td><?=$product->buy_price; ?></td>
<td><?=round($opening_value)?></td>
<?php } ?>
<?php if(!empty($_GET['receiving']) && $_GET['receiving']==1) { ?>
<td><?=round($total_recieve)?></td>
<td><a href="<?php echo base_url(); ?>admin/store_report/1?product=<?=$product->id?>&date1=<?=$date1_for_details?>&date2=<?=$date2_for_details?>"><?=$product->buy_price; ?></a></td>
<td><?=round($receiving_value)?></td>
<?php } ?>
<?php if(!empty($_GET['sales']) && $_GET['sales']==1) { ?>
<td><?=round($total_sale)?></td>
<td><a href="<?php echo base_url(); ?>admin/store_report/3?product=<?=$product->id?>&date1=<?=$date1_for_details?>&date2=<?=$date2_for_details?>"><?=$product->buy_price; ?></a></td>
<td><?=round($sale_value)?></td>
<?php } ?>
<?php if(!empty($_GET['closing']) && $_GET['closing']==1) { ?>
<td><?=round($closing)?></td>
<td><?=$product->buy_price; ?></td>
<td><?=round($stock_value)?></td>
<?php } ?>



</tr>

<?php endforeach; ?>
<tr>
<td>Total</td>
<?php if(!empty($_GET['opening']) && $_GET['opening']==1) { ?>
<td colspan=2></td>
<td><?=round($total_opening_value)?></td>
<?php } ?>
<?php if(!empty($_GET['receiving']) && $_GET['receiving']==1) { ?>
<td colspan=2></td>
<td><?=round($total_receiving_value)?></td>
<?php } ?>
<?php if(!empty($_GET['sales']) && $_GET['sales']==1) { ?>
<td colspan=2></td>
<td><?=round($total_sale_value)?></td>
<?php } ?>
<?php if(!empty($_GET['closing']) && $_GET['closing']==1) { ?>
<td colspan=2></td>
<td><?=round($total_stock_value)?></td>
<?php } ?>
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

