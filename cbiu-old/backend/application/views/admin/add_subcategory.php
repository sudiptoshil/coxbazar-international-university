<!--main content start-->
    <section id="main-content" class="">
        <section class="wrapper">
        <!-- page start-->
        <!-- page start-->


		

        <div class="row">
        <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
               Add Subsategory
            </header>
            <div class="panel-body">

		 <form class="form-horizontal bucket-form" method="post" action="<?php echo base_url(); ?>admin/subcate_add/<?php echo $id; ?>">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Subcategory Name</label>
                        <div class="col-sm-6">
                            <input type="text" name="subcate" class="form-control">
                        </div>
                    </div>

				



			
				
		
				
				
 


<div class="form-group" style="text-align:center">	
<button type="submit" class="btn btn-info">Submit</button></div>
 
                </form>
            </div>
        </section>

        </div>
        </div>
		
		
		
		
		
		
		
		
		<div class="row">
        <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
               Subcategory List
            </header>
            <div class="panel-body">

			
			
			<table  class="display table table-bordered table-striped" id="dynamic-table">
                    <thead>
                    <tr>
                
                        <th>SL</th>
                        
                        <th class="hidden-phone">Subcategory Name</th>
                        
						
						
					
					
                    </tr>
                    </thead>
                    <tbody>


					
					
					
					
					
					
					
					<?php $i=1; foreach ($all as $item): ?>

							<tr class="gradeX">
                   
								<td><?php echo $i++;?></td>
						
						<input type="text" name="id" value="<?php echo $item['id'] ?>" hidden="hidden"/>
							
				<td style="width:300px"><div class="f"><span id="<?php echo $item['id'] ?>" data-table="subcetagory
"><?php echo $item['name']?></span></div></td>
                        

		 <td>
						
						
								<div class="col-sm-3">
								<a target="_blank" class="menu" href="<?php echo base_url(); ?>admin/subcategory_add/<?php echo $item['id']?>"><span style="color:red;float:right">View</span></a>
								</div>
						
						
						
						</td>					

		<td>
		
		
		<span id="edit">
			<a style="cursor: pointer;" data-id="<?php echo $item['id'];?>">Edit</a>
																							
		</span>
		
		
		<a onclick="return confirm('Are you sure to delete ?')" href="<?php echo base_url(); ?>admin/category_delete/<?php echo $item['id']; ?>/2/<?php echo $item['root']; ?>">
								<span style="color:red;float:right">X</span></a>
</td>
                    </tr>

					<?php endforeach; ?>
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					</tbody>
					
					
					</table>
			
			
		
            </div>
        </section>

        </div>
        </div>
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		


                </div>

            </div>
        </div>


        <!-- page end-->
        </section>
    </section>
    <!--main content end-->