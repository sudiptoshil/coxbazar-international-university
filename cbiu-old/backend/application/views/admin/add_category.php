<!--main content start-->
    <section id="main-content" class="">
        <section class="wrapper">
        <!-- page start-->
        <!-- page start-->


		

        <div class="row">
        <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
               Add Category
            </header>
            <div class="panel-body">

		 <form class="form-horizontal bucket-form" method="post" action="<?php echo base_url(); ?>admin/category_add" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Category Name</label>
                        <div class="col-sm-2">
                            <input type="text" name="category" class="form-control">
                        </div>
						
						<div class="col-sm-2">
						
						
          <input type="file" class="form-control" name="userfile" style="height:40px;margin:0px;padding:0;padding-left:5px;">
						
						
						
						
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
               Category List
            </header>
            <div class="panel-body">

			
			
			<table  class="display table table-bordered table-striped" id="dynamic-table">
                    <thead>
                    <tr>
                
                        <th>SL</th>
                        
                        <th class="hidden-phone">Category Name</th>
                        <th class=""></th>
                        <th class=""></th>
                        <th class="">Current Image</th>
                        
						
						
					
					
                    </tr>
                    </thead>
                    <tbody>


					
					
					
					
					
					
					
					<?php $i=1; foreach ($all as $item): ?>

							<tr class="gradeX">
								
								<div id="ch">
								
								<td><?php echo $i++;?></td>
						
						
								
								<td style='width:200px'>


						
			


<div class="f"><span data-table="cetagory
" id="<?php echo $item['id'] ?>"><?php echo $item['name']?></span></div></td> 
                        

								<td>
								
								<div class="col-sm-3">
								<a target="_blank" class="menu" href="<?php echo base_url(); ?>admin/subcategory_add/<?php echo $item['id']?>"><span style="color:red;float:right">View</span></a>
								</div>
								
								
								
								
															
								
								<div class="col-sm-2" id="photos">
						
	<form id="" method="post" enctype="multipart/form-data" action='<?php echo base_url(); ?>admin/updateCategoryImage/<?php echo $item['id'] ?>'>
	
						
			
          

        <input type="file" value="<?php echo $item['id'] ?>" name="pho"/>
		<button class="btn btn-primary">Update</button>

			
	</form>	
	
	
					
					
	<div id='<?php echo $item['id']."p" ?>' style="padding:5px">

<img style='display:none' src="<?php echo base_url(); ?>img/loader.gif" id="<?php echo $item['id']."img" ?>">


</div>				
					
					
					
					
					
					
						
						</div>
								
								
								
								
								
								
							
								
								
								
								
								
								
								
							
								
								
							</td>
							<td>
							
							
							<span id="edit">
								<a style="cursor: pointer;" data-id="<?php echo $item['id'];?>">Edit</a>
								</span>
								
							
							</td>

								<td><a onclick="return confirm('Are you sure to delete ?')" href="<?php echo base_url(); ?>admin/category_delete/<?php echo $item['id']; ?>/1">
								<span style="color:red;float:right">X</span>
								
								
							</div>	
								
</td>

<td>


	<img style="width:150px;height:150px" src="<?php echo base_url()."file_upload/".$item["id"]."c.jpg" ?>"/>


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