

 <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
        <!-- page start-->

<div class="row">
            <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading">
                        All Sender User
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
                    <th>User Name</th>
					<th>Password</th>
                    <th>Company</th>
                    <th>Status I/O</th>
                    <th>Active</th>
					
                    </tr>
                    </thead>
                    <tbody>

<?php $i=1; foreach ($all as $item): ?>

<tr class="gradeX">
                   
                        <td><?php echo $item['name']?></td>
						
						
            
<td><?php echo $item['user']?></td>
<td><?php echo $item['password']?></td>
<td><?php echo $item['company']?></td>
<td><?php echo $item['status']?></td>
<td><?php echo $item['by']?></td>
<td>
<a target="_blank" class="menu" href="<?php echo base_url(); ?>sender/supplier_edit/<?php echo $item['id']?>">EDIT</a>
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


