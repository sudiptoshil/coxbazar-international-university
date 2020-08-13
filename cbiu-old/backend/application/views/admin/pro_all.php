 
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/tcal.css" />
	<script type="text/javascript" src="<?php echo base_url(); ?>css/tcal.js"></script> 


<!--main content start-->
    <section id="main-content">
        <section class="wrapper">
        <!-- page start-->

<div class="row">
            <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading">
					
					<form method="get" action="<?php echo base_url();?>admin/pro_all/1">
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
                       
                    </header>
                    <div class="panel-body">
                    <div class="adv-table">
                    <table  class="display table table-bordered table-striped" id="dynamic-table">
                    <thead>
                    <tr style="background:darkseagreen;">
                        <th>SL</th>
                        <th>Name</th>
                        <th>Mobile</th>
                        <th>Department</th>
                        <th>Address</th>
                        <th>HSC AT</th>
                        <th>View</th>
                    </tr>
                    </thead>
                    <tbody>

<?php $i=1; foreach ($all as $item): ?>

<tr class="gradeX">
                   
                   <td><?php echo $i; $i++;?></td>
                   
                        <td><?php echo $item['name']?></td>
                        <td><?php echo $item['mobile']?></td>
                        
                        
             <td><?php
                echo  $cate=$this->news_model->getcategorybreak_name('dept','id',$item['techCode'],'name');
                 ?> </td>
                         
                         
                        <td><?php echo $item['presentAddress']?></td>

        <td><a target="_blank" class="menu" href="http://www.cbiu.ac.bd/attach/<?=$item['id']?>_hsc.jpg">Show</a></td>                  
        <td><a target="_blank" class="menu" href="<?php echo base_url(); ?>admin/full_view/<?=$item['id']?>">View</a></td>              
                      
                      
                      
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