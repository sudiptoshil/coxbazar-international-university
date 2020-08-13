

 <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
        <!-- page start-->

<div class="row">
            <div class="col-sm-12">
                <section class="panel">
                    
					
					 <div class="panel-body" style="text-align:center">
                    <div class="adv-table">

<form method="get" action="<?=site_url('admin/product_all/');?>">
<table align="center">
<tr>
<td><div class="form-group">					
<label class="col-sm-3 control-label">Category</label></div>	</td>
<td>
	
<select class="form-control input-lg m-bot15" name="category">

<?php foreach($category as $category1) { ?>
<option value="<?php echo $category1['id']; ; ?>"><?php echo $category1['sub']; ?></option>
<?php  } ?>
</select></td>

<td>
<div class="form-group" style="text-align:center">	
<button type="submit" class="btn btn-info">Submit</button></div>
</td>
</tr>
</table>




</form>

</div>	

</div>	
					
					
                    <div class="panel-body">
                    <div class="adv-table">
                    <table  class="display table table-bordered table-striped" id="dynamic-table">
                    <thead>
                    <tr>
                
                        <th>CODE</th><th>MODEL NO</th>
                        
                        <th class="hidden-phone">CATEGORY</th><th>NAME</th><th class="hidden-phone">UNIT</th><th>OPENING</th><th>STOCK LIMIT</th>
                        
						
						
						<th class="hidden-phone">STAUTS</th>
						<th class="hidden-phone">EDIT</th>
					
                    </tr>
                    </thead>
                    <tbody>

<?php $i=1; foreach ($all as $item): ?>

<tr class="gradeX">
                   
                        <td><?=$item['code']?></td><td><?=$item['model_no']?></td>
						
						
                        <td><?php
$category = $this->news_model->common('sub_category','id',$item['category']) ;
 foreach($category as $category) { 
echo $category['sub']; 
} ?> </td>
<td><?=$item['name']?></td>
                        
<td><?=$item['unit']?></td><td><?=$item['opening_stock']?></td><td><?=$item['stock_limit']?></td>
<td><?php if($item['active']==1) echo "Active"; else echo "Not Active";?></td>
<td>
<a target="_blank" class="menu" href="<?php echo base_url(); ?>admin/item_edit/<?=$item['id']?>">EDIT</a>
</a>

<a href="<?php echo base_url(); ?>admin/delete/product/id/<?php echo $item['id']; ?>/product_all" onclick="return confirm('Are you sure want to delete');">
<span style="color:red;float:right">X</span>
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


