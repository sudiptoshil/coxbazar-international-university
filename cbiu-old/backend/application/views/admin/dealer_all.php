

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
                    <div class="panel-body">
                    <div class="adv-table">
                    <table  class="display table table-bordered table-striped" id="dynamic-table">
                    <thead>
                    <tr>
                
                        
                   <th>NAME</th>
                        
						<th class="hidden-phone">PHONE NO</th>
						<th>ZONE</th><th>OPENING BALANCE</th>
					<th>DEBIT</th><th>CREDIT</th><th>CLOSING BALANCE</th><th>BY</th>
						<th class="hidden-phone">EDIT</th>
					
                    </tr>
                    </thead>
                    <tbody>

<?php $i=1; foreach ($all as $item): ?>

<tr class="gradeX">
                   
                        <td><?=$item['name']?></td>
						
						
            
<td><?=$item['phone']?></td>
<td><?php
$this->db->where('id', $item['zone']);
$query = $this->db->get("zone");
$zone = $query->row();
if(!empty($zone->name))
echo $zone->name;
?></td>

  
<td><?=$item['opening_balance']?></td>

<td><?php
// $this->db->where('approved', 1);
$this->db->select('SUM(`amount`) as score');
$this->db->where('d_l_id',$item['acc_ledger']);
$q=$this->db->get('transaction');
$row=$q->row();
$count_sale = $row->score+$item['opening_balance'];
echo round($count_sale);
?></td>

<td><?php
$this->db->where('cheque_date <=', date('Y-m-d'));
$this->db->select('SUM(`amount`) as score');
$this->db->where('c_l_id',$item['acc_ledger']);
$q=$this->db->get('transaction');
$row=$q->row();
$count_paid = $row->score;
echo round($count_paid);
?></td>

<td><?php
echo $count_sale-$count_paid;
?></td>
   <td><?php
$this->db->where("id", $item['by']); 
$query = $this->db->get("password");
$by = $query->row();
if(!empty($by->name))
echo $by->name; 
 ?></td>                   
<td>
<a target="_blank" class="menu" href="<?php echo base_url(); ?>admin/dealer_edit/<?=$item['id']?>">EDIT</a>
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


