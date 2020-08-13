 <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
        <!-- page start-->

<div class="row">
            <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading">
					
					 <p style="color: teal;
font-family: bucket-ico-font;
font-size: 25px;
font-weight: bold;
text-align: center;">
          Product Size And Color
        </p>
                      
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
                    <tr style="background:darkseagreen;">
                
                        
                        <th>Product Name</th>

                       <th>Color</th>
					  
			<th>Size</th>
			
                    
                    </tr>
                    </thead>
                    <tbody>

<?php $i=1; foreach ($all as $item): ?>


<tr class="gradeX">
                    
                        <td>
                        
                        
                        
                      <?php echo $item['product_name']?>
                        
                        
                        
                        
                        </td>
                        
                                 <td>
                        
                        
                        
                        <?php echo $item['color']?>
                        
                        
                        
                        
                        </td>
                        
                        
                                 <td>
                        
                        
                        
                        <?php echo $item['size']?>
                        
                        
                        
                        
                        </td>
                        
                        
            
                       
                                 <td>
                        
                        
                        
                    <a target="_blank" href="<?php echo base_url(); ?>admin/edit_color/<?php echo $item['id'] ?>">Edit</a>
                        
                        
                        
                        
                        </td>
                        
                        

                     

		
                    </tr>
                    

<?php endforeach; ?>
</table>

                    </div>
                    </div>
                </section>
            </div>
        </div>
        <!-- page end-->
        </section>
    </section>