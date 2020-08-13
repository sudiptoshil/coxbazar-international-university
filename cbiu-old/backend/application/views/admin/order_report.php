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

<form method="get" action="<?=site_url('admin/order_report/');?>">
<table align="center">
<tr>

<td valign="top"><label for="text">Showroom</label>	</td>
<td><select class="bol_type" name="user">
<option value=""></option>
<?php foreach($outlet as $outlet1) { 
?>
  <option value="<?php echo $outlet1['id']; ?>"><?php echo $outlet1['name']; ?></option>
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

<script src="<?php echo base_url(); ?>jquery.min.js"></script>
<button id="myButtonControlID">Export Table data into Excel</button>
<div id="divTableDataHolder">

         
<table>
<thead>
<tr>
<th>PRODUCT</th>
<th>ORD QNTY</th>
<th>DEL QNTY</th>
<th>SHORT QNTY</th>
<th>UNIT</th>
</tr>

<?php
$i=1;
foreach ($product as $item): 
?>
<tr>
<td><?=$item['name']?></td>
<td><?php
 if(!empty($_GET['date1']) && !empty($_GET['date2']))
 {
$source = $_GET['date1'];
$date = new DateTime($source);
$date1 = $date->format('Y-m-d H:i:s');

$source = $_GET['date2'];
$date = new DateTime($source);
$date2 = $date->format('Y-m-d 24:i:s');

$this->db->where('date >=', $date1);
$this->db->where('date <=', $date2);
 }
  if(!empty($_GET['user']))
$this->db->where('user', $_GET['user']);
$this->db->where('code', $item['code']);
$this->db->select('sum(quantity) as total');
$info = $this->db->get('res_order');
		$row=$info->row();
		echo $row->total; ?>
</td>
<td><?php
 if(!empty($_GET['date1']) && !empty($_GET['date2']))
 {
$source = $_GET['date1'];
$date = new DateTime($source);
$date1 = $date->format('Y-m-d H:i:s');

$source = $_GET['date2'];
$date = new DateTime($source);
$date2 = $date->format('Y-m-d 24:i:s');

$this->db->where('date >=', $date1);
$this->db->where('date <=', $date2);
 }
   if(!empty($_GET['user']))
$this->db->where('user', $_GET['user']);
$this->db->where('code', $item['code']);
$this->db->select('sum(deliver_quantity) as deliver_total');
$info = $this->db->get('res_order');
		$row1=$info->row();
		echo $row1->deliver_total; ?>
</td>
<td><?=$row->total-$row1->deliver_total?></td>		
<td><?=$item['unit']?></td>		
</tr>

<?php endforeach; ?>
</table>



<?php
// $this->load->helper('php-excel_helper');
       // $data_array =  array (
       // $data_array[] = array ("Oliver", "Peter", "Paul"),
                        // array ("Marlene", "Mica", "Lina")
                // ); 
       // $xls = new Excel_XML;
       // $xls->addArray ($data_array);
       // $xls->generateXML ( "output_name" );
?>



</div>
<script type="text/javascript">
$("[id$=myButtonControlID]").click(function(e) {
    window.open('data:application/vnd.ms-excel,' + $('div[id$=divTableDataHolder]').html());
    e.preventDefault();
});
</script>


                    </div>
                    </div>
                </section>
            </div>
        </div>
        <!-- page end-->
        </section>
    </section>

