

 <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
        <!-- page start-->

<div class="row">
            <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading">
                        All General User
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
                        
						<th class="hidden-phone">User</th>
						<th>Password</th>
                        <th>Details</th>
                        <th>Type</th>
					   <th>BY</th>
                       <th>Insertable</th>
                       <th>Updateable</th>
                       <th>Deleteable</th>
					   <th class="hidden-phone">EDIT</th>
					
                    </tr>
                    </thead>
                    <tbody>

<?php $i=1; foreach ($all as $item): ?>

<tr class="gradeX">
                   
                        <td><?php echo $item['name']?></td>
						
						
            
                        <td><?php echo $item['user']?></td>
                        <td><?php echo $item['password']?></td>
                        <td><?php echo$item['details']?></td>
                        <td><?php echo$item['type']?></td>
                        <td><?php echo$item['by']?></td>
                        <td><?php echo$item['insertable']?></td>
                        <td><?php echo$item['updateable']?></td>
                        <td><?php echo$item['deleteable']?></td>

<td> 
<a target="_blank" class="menu" href="<?php echo base_url(); ?>admin/user_edit/<?php echo $item['id']?>">EDIT</a>
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


