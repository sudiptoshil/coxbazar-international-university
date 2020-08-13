	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css1/tcal.css" />
	<script type="text/javascript" src="<?php echo base_url(); ?>css1/tcal.js"></script> 
	
	<?php
 foreach($ledger as $ledger1) { 
$all_ledger[] = $ledger1['ledger_title']." *".$ledger1['id'];
  }
// print_r ($all_customer);
  ?>
  

<link rel="stylesheet" href="<?php echo base_url(); ?>js1/jquery-ui.css">
  <script src="<?php echo base_url(); ?>js1/jquery-1.9.1.js"></script>
  <script src="<?php echo base_url(); ?>js1/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script>
  $(function() {
  
  var availableTags = JSON.parse('<?php echo json_encode($all_ledger); ?>');
  
    
    $( "#tags" ).autocomplete({
      source: availableTags
    });
  });
  </script>	
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

<?php echo form_open_multipart('admin/report_by_ledger') ?>
<table align="center">
<tr>

<td><label for="text">Ledger</label>	</td>
<td><span class="input-wrap"> <input type="input" name="ledger_id" id="tags"></span></td>

<td><div class="feild">Start Date</div></td>
<td><input class="tcal" type="input" name="start_date" value="<?php echo date('d-m-Y') ?>" /></td>

<td><div class="feild">End Date</div></td>
<td><input class="tcal" type="input" name="end_date" value="<?php echo date('d-m-Y'); ?>" /></td>
</tr>
</table>



<div class="form-group" style="text-align:center">	
<button type="submit" class="btn btn-info">Submit</button></div>

</form>

</div>	

</div>	

<?php
$grandtotal = 0;
$quantity = 0;
if(!empty($pre_credit) or !empty($pre_debit))
{
?>

 <div style="font-size:20px;line-height: 35px;text-align: center;"> 
<?php
$this->db->where('id', $ledger_id);
$query = $this->db->get("ledger");	
$row = $query->row();
echo $row->ledger_title;
?>
<br/>
General Ledger<br/>
For the period <?php echo $start_date; ?> to <?php echo $end_date; ?>
</div>

        
<table  class="display table table-bordered table-striped" id="dynamic-table">
<thead>
<tr>
<th>SL</th>
<th>DATE</th>
<th>DESCRIPTION</th>
<th>DEBIT</th>
<th>CREDIT</th>
</tr>

<tr>
<td></td>
<td></td>
<?php
$i=1;
$debit_total = 0;
$credit_total = 0;
$balance = 0;
$grandtotal = 0;

if($pre_debit>$pre_credit)
{
$balance_bd = $pre_debit-$pre_credit;
echo "<td>Balance C/D</td>";
echo "<td></td>";
echo "<td>".$balance_bd."</td>";
$credit_total = $credit_total + $balance_bd;
}
if($pre_credit>$pre_debit)
{
$balance_bd = $pre_credit-$pre_debit;
echo "<td>Balance B/D</td>";
echo "<td>".$pre_credit."</td>";
echo "<td></td>";
$debit_total = $debit_total + $pre_credit;
}
?>

</tr>






<?php
$i=1;
$credit = 0;
$cash = 0;
$bank = 0;
foreach ($all as $item): 
?>



<tr>

<td><?=$i;$i++;?></td>
<td><?php echo $item['date'];?></td>
<td><?php 
if($item['c_l_id']==$ledger_id)
{
$this->db->where('id', $item['d_l_id']);
$query = $this->db->get("ledger");	
$row = $query->row();
echo $row->ledger_title;
}
if($item['d_l_id']==$ledger_id)
{
$this->db->where('id', $item['c_l_id']);
$query = $this->db->get("ledger");	
$row = $query->row();
echo $row->ledger_title;
}
?></td>
<?php
if($item['c_l_id']==$ledger_id)
{
$credit_total = $credit_total + $item['amount'];
echo "<td>";
echo "</td>";
echo "<td>".$item['amount']."</td>";
}
?>
<?php
if($item['d_l_id']==$ledger_id)
{
$debit_total = $debit_total + $item['amount'];
echo "<td>".$item['amount']."</td>";
echo "<td>";
echo "</td>";
}
?>

</tr>

<?php endforeach; ?>



 <tr>
<td></td>
<td></td>
<?php
if($debit_total>$credit_total)
{
echo "<td>Balance C/D</td>";
echo "<td></td>";
$balance = $debit_total-$credit_total;
echo "<td>".$balance."</td>";
$credit_total = $credit_total + $balance;
}
if($debit_total<$credit_total)
{
echo "<td>Balance B/D</td>";
$balance = $credit_total-$debit_total;
echo "<td>".$balance."</td>";
echo "<td></td>";
$debit_total = $debit_total + $balance;
}
?>
</tr>

 <tr>
<td></td>
<td></td>
<td></td>
<td><?php echo $debit_total; ?></td>
<td><?php echo $credit_total; ?></td>
</tr>

</table>
<?php } ?>
                    </div>
                    </div>
                </section>
            </div>
        </div>
        <!-- page end-->
        </section>
    </section>

