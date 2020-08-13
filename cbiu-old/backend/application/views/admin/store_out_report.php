	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css1/tcal.css" />
	<script type="text/javascript" src="<?php echo base_url(); ?>css1/tcal.js"></script> 

	<script type="text/javascript">
	function blinker() {
    $('.blink_me').fadeOut(500);
    $('.blink_me').fadeIn(500);
}

setInterval(blinker, 1000);
</script> 	
	
 <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
        <!-- page start-->

<div class="row">
            <div class="col-sm-12">
                <section class="panel">
                   
                   <div class="panel-body" style="text-align:center">
                    <div class="adv-table">

<form method="get" action="<?=site_url('admin/store_out_report/');?>">
<table align="center">
<tr>

<td><div class="form-group">					
<label class="col-sm-3 control-label">Customer</label></div>	</td>
<td>	
<select class="form-control input-lg m-bot15" name="customer">
<option value="">All</option>
<option value="none">None</option>

<?php foreach($customer_for_form as $customer1) { ?>
<option value="<?php echo $customer1['id']; ; ?>"><?php echo $customer1['name']; ?></option>
<?php  } ?>
</select></td>

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

<td><div class="form-group">					
<label class="col-sm-3 control-label">Warehouse</label></div>	</td>
<td>
<select name="warehouse" class="form-control">
<option value="">All</option>
<?php foreach($warehouse as $warehouse1) { ?>
<option value="<?php echo $warehouse1['id']; ?>"><?php echo $warehouse1['name']; ?></option>
<?php  } ?>
</select></td>

</tr>

<tr>
<td><div class="feild">Start Date</div></td>
<td><input class="tcal" type="input" name="date1" value="<?php echo set_value('date1'); ?>" /></td>

<td><div class="feild">End Date</div></td>
<td><input class="tcal" type="input" name="date2" value="<?php echo set_value('date2'); ?>" /></td>

<td><div class="form-group">					
<label class="col-sm-3 control-label">Report Type</label></div>	</td>
<td>
<select class="form-control input-lg m-bot15" name="report_type">
<option value="">Details</option>
<option value="2">Short</option>
</select></td>
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
Kids Museum<BR/>Stock Statement <br/>
<?php
if(!empty($_GET['customer']))
{ 
$this->db->where("id", $_GET['customer']); 
$result = $this->db->get('customer');
$row = $result->row();
if(!empty($row->name)) 
echo "For customer<b> ".$row->name."</b><br/>";
}
?>
 FROM <?=date("d-m-Y", strtotime($date1));?> TO <?=date("d-m-Y", strtotime($date2));?>

</div>
<br/>
  

<div class="CSSTableGenerator1" >
              
<table>
<tr>



<td>NAME</td>
<td>O/QTY</td>
<td>P/QTY</td>
<td>P Ret/QTY</td>
<?php if(!empty($_GET['warehouse'])){ ?><td>Adj In</td><?php } ?>
<td>T/QTY</td>
<td>S/QTY</td>
<td>S Ret/QTY</td>
<?php if(!empty($_GET['warehouse'])){ ?><td>S Out</td><?php } ?>
<td>Profit</td>
<td>C/QTY</td>
<?php if(!empty($_GET['customer'])) { ?>
<?php foreach ($customer as $customer1): ?>
<td style="background-color:gray"><?=$customer1['name']?></td>
<td>Customer Profit</td>
<?php endforeach; ?>
<?php } ?>
</tr>

<?php
$i=1;
$profit = 0;
$customer_profit = 0;
$total_stock_value = 0;
$total_count_store_price =0;
$total_count_sale_price =0;
$total_cgs =0;
$p_adjust = 0;
$s_adjust = 0;
foreach ($product as $item): 

?>
<tr>
<td><?=$item['name']?></td>
<td>
<?php
$this->db->where("id", $item['code']); 
$result = $this->db->get('product');
$product = $result->row(); 
$opening_stock = $product->opening_stock;
	

if(!empty($_GET['warehouse']))
$this->db->where("warehouse", $_GET['warehouse']); 
$this->db->where('date <=', $last_date);
$this->db->select('SUM(`in`-`in_return`-`sale`+`out_return`) as score');
$this->db->where('bar_code',$item['code']);
$q=$this->db->get('store');
$row=$q->row();
$count_opening = $row->score+$opening_stock;   // Opening Quantity

if(!empty($_GET['warehouse']))
{
$this->db->where("adjust_from", $_GET['warehouse']); 
$this->db->where('date <=', $last_date);
$this->db->select('SUM(`adjust`) as score');
$this->db->where('bar_code',$item['code']);
$q=$this->db->get('store');
$row=$q->row();
// echo $row->score;
$count_opening = $count_opening - $row->score; 

$this->db->where("adjust_to", $_GET['warehouse']); 
$this->db->where('date <=', $last_date);
$this->db->select('SUM(`adjust`) as score');
$this->db->where('bar_code',$item['code']);
$q=$this->db->get('store');
$row=$q->row();
// echo $row->score;
$count_opening = $count_opening + $row->score; 
}
echo $count_opening;
 ?>
</td>

<td><?php
if(!empty($_GET['warehouse']))
$this->db->where("warehouse", $_GET['warehouse']); 
$this->db->where('date >=', $date1);
$this->db->where('date <=', $date2);
$this->db->select('SUM(`in`) as score');
$this->db->where('bar_code',$item['code']);
$q=$this->db->get('store');
$row=$q->row();
echo $count_receive = $row->score;   // Receive Quantity
?></td>


<td><?php
if(!empty($_GET['warehouse']))
$this->db->where("warehouse", $_GET['warehouse']); 
$this->db->where('date >=', $date1);
$this->db->where('date <=', $date2);
$this->db->select('SUM(`in_return`) as score');
$this->db->where('bar_code',$item['code']);
$q=$this->db->get('store');
$row=$q->row();
echo $count_receive_return = $row->score;   // Receive Return Quantity
?></td>

<?php if(!empty($_GET['warehouse'])){ ?>
<td>
<?php
$this->db->where("adjust_from", $_GET['warehouse']); 
$this->db->where('date >=', $date1);
$this->db->where('date <=', $date2);
$this->db->select('SUM(`adjust`) as score');
$this->db->where('bar_code',$item['code']);
$q=$this->db->get('store');
$row=$q->row();
echo $p_adjust = $row->score;   // Purchase Adjust
?>
</td><?php } ?>

<td><?php echo $count_opening + $count_receive - $count_receive_return + $p_adjust?></td>
<td><?php
if(!empty($_GET['warehouse']))
$this->db->where("warehouse", $_GET['warehouse']); 
$this->db->where('date >=', $date1);
$this->db->where('date <=', $date2);
$this->db->select('SUM(`sale`) as score');
$this->db->where('bar_code',$item['code']);
$q=$this->db->get('store');
$row=$q->row();
echo $count_sate = $row->score;   // Sales Quantity
?></td>

<td><?php
if(!empty($_GET['warehouse']))
$this->db->where("warehouse", $_GET['warehouse']); 
$this->db->where('date >=', $date1);
$this->db->where('date <=', $date2);
$this->db->select('SUM(`out_return`) as score');
$this->db->where('bar_code',$item['code']);
$q=$this->db->get('store');
$row=$q->row();
echo $count_sate_return = $row->score;   // Sales Return Quantity
?></td>

<?php if(!empty($_GET['warehouse'])){ ?>
<td>
<?php
$this->db->where("adjust_to", $_GET['warehouse']); 
$this->db->where('date >=', $date1);
$this->db->where('date <=', $date2);
$this->db->select('SUM(`adjust`) as score');
$this->db->where('bar_code',$item['code']);
$q=$this->db->get('store');
$row=$q->row();
echo $s_adjust = $row->score;   // Sales Adjust
?>
</td><?php } ?>

<td><?php
if(!empty($_GET['warehouse']))
$this->db->where("warehouse", $_GET['warehouse']); 
$this->db->where('date >=', $date1);
$this->db->where('date <=', $date2);
$this->db->select('SUM(`sale`*(`price`-`buy_price`)) as score');
$this->db->where('bar_code',$item['code']);
$q=$this->db->get('store');
$row=$q->row();
$profit = $profit + $row->score;   // Profit
echo $row->score;
?></td>

<?php
$closing = $count_opening + $count_receive - $count_receive_return - $count_sate + $count_sate_return + $p_adjust - $s_adjust;

if($product->stock_limit >= $closing)
echo "<td style='background-color:white' class='blink_me'>".$closing;
else
echo "<td>".floor($closing/$product->pcs)." CTN ".$closing%$product->pcs;
// echo "<td>".$closing;
 ?> 
</td>

<?php if(!empty($_GET['customer'])) { ?>

<?php foreach ($customer as $customer1): ?>
<td style="background-color:#D0D0D0"><?php
$this->db->where('date >=', $date1);
$this->db->where('date <=', $date2);
$this->db->select('SUM(`sale`-`out_return`) as score');
$this->db->where('bar_code',$item['code']);
$this->db->where('customer',$customer1['id']);
$q=$this->db->get('store');
$row=$q->row();
$count_sale = $row->score;
echo round($count_sale);     // Customer Sale
?></td>

<td style="background-color:#D0D0D0"><?php
$this->db->where('date >=', $date1);
$this->db->where('date <=', $date2);
$this->db->select('SUM((`sale`*(`price`-`buy_price`))-(`out_return`*(`price`-`buy_price`))) as score');
$this->db->where('bar_code',$item['code']);
$this->db->where('customer',$customer1['id']);
$q=$this->db->get('store');
$row=$q->row();
$count_profit = $row->score; 
echo round($count_profit);    // Customer Profit
$customer_profit = $customer_profit + $row->score; 
?></td>

<?php endforeach; ?>
<?php } ?>
</tr>

<?php endforeach; ?>
<tr>
<td> Profit</td>
<td><?php echo $profit; ?></td>
<?php if(!empty($_GET['customer'])) { ?>
<td>Customer Profit</td>
<td><?php echo $customer_profit; ?></td>
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

