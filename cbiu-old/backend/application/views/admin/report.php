<!--main content start-->
    <section id="main-content" class="">
        <section class="wrapper">
        <!-- page start-->
        <!-- page start-->


		

        <div class="row">
        <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
              Product Store
            </header>
            <div class="panel-body">

		 <form class="form-horizontal bucket-form" method="post" action="<?php echo base_url(); ?>admin/pro_insert" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Product Name</label>
                        <div class="col-sm-6">
                            <input type="text" name="pname" value="<?php echo set_value('name'); ?>" class="form-control">
                        </div>
                    </div>
                    	<div class="form-group">
                        <label class="col-sm-3 control-label">Code</label>
                        <div class="col-sm-6">
                            <input type="text" name="pcode" value="<?php echo set_value('user'); ?>" class="form-control">
                        </div>
                    </div>
					<div class="form-group">
                        <label class="col-sm-3 control-label">Price</label>
                        <div class="col-sm-6">
                            <input type="text" name="price" value="<?php echo set_value('password'); ?>" class="form-control">
                        </div>
                    </div>
					
					 <div class="form-group">
                        <label class="col-sm-3 control-label">Description</label>
                        <div class="col-sm-6">
                           <textarea class="form-control" row="6" name="des"></textarea>
                        </div>
                    </div>
					
 <div class="form-group">
                        <label class="col-sm-3 control-label">Image</label>
                        <div class="col-sm-6">
                                 <input type="file" class="form-control" name="userfile" style="height:40px;margin:0px;padding:0;padding-left:5px;">
                        </div>
                    </div>

                    <div class="form-group">                    
                        <label class="col-sm-3 control-label">Cetagory</label>  
                        <div class="col-sm-6">      
                             <select class="form-control input-lg m-bot15" name="cetagory">

                                    <?php $i=1; foreach ($cetegory as $item): ?>

                                            <?php 

                                                   $data['sub']=$this->news_model->getSubCetagory($item['id']);

                                            ?>

                                              <?php $i=1; foreach ($data['sub'] as $it): ?>

                                                        <option value="<?php echo $item['id'].':'.$it['id']?>"><?php echo $item['name'].':'.$it['name']?></option>


                                                 <?php endforeach; ?>


                                    <?php endforeach; ?>


            </select>
        </div>
    </div>

<div class="col-sm-6 form-group" style="text-align:center">	
<button type="submit" class="btn btn-info">Submit</button></div>
 
                </form>
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