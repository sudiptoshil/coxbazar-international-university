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
              All Image
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

                       <th>Thamb Image</th>
					  
			<th>Big Image</th>
			<th>Upload</th>
			<th>Update</th>
                    
                    </tr>
                    </thead>
                    <tbody>

<?php $i=1; foreach ($all as $item): ?>

		<form action="<?php echo base_url(); ?>admin/muli_img_update/<?php echo $item['id'] ?>" method="post" enctype="multipart/form-data">

<tr class="gradeX">
                    
                        <td>
                        
                        
                        
                        <?php echo $this->news_model->getcategorybreak_name('product','id',$item['root'],'product_name');?>
                        
                        
                        
                        
                        </td>
                        
                        
            
                       

                        <td><img src="<?php echo base_url(); ?>multi_image/<?php echo $item['th_image'] ?>" style='width:100px;height:100px;'/></td>
                        
                        <td><img src="<?php echo base_url(); ?>multi_image/<?php echo $item['big_image'] ?>" style='width:100px;height:100px;'/></td>
                       

			<td> 
				<input type="file" class="form-control" name="userifle"/>
			</td>
			<td> 
				<input type="submit" class="form-control" value="Submit"/>
			</td>
                    </tr>
                    
                    </form>

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


