<!--main content start-->
    <section id="main-content" class="">
        <section class="wrapper">
        <!-- page start-->
        <!-- page start-->
     

        <div class="row">
        <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Form Elements
            </header>
            <div class="panel-body">
    <?php foreach ($all as $item): ?>
	<form class="form-horizontal bucket-form" method="post" action="<?php echo base_url(); ?>admin/pro_edit/<?php echo $id; ?>" enctype="multipart/form-data">

           


		   
                    <div class="form-group">
                        <label class="col-sm-3 control-label"> <p style=" ">
           Title
        </p></label>
                        <div class="col-sm-6">
                            <input type="text" name="title" value="<?php echo $item['title']; ?>" class="form-control">
                        </div>
                    </div>

					
					<div class="form-group">
                        <label class="col-sm-3 control-label"> <p style=" ">
           Author
        </p></label>
                        <div class="col-sm-6">
                            <input type="text" name="author" value="<?php echo $item['author']; ?>" class="form-control">
                        </div>
                    </div>
					
					<div class="form-group">
                        <label class="col-sm-3 control-label"> <p style=" ">
           Short Note
        </p></label>
                        <div class="col-sm-6">
                            <input type="text" name="short" value="<?php echo $item['short']; ?>" class="form-control">
                        </div>
                    </div>

<div class="form-group">
                        <label class="col-sm-3 control-label"><strong>Details:</strong></label>

                        <div class="col-sm-6">
<textarea class="form-control" rows="5" name="details"> <?php echo $item['descrition']; ?></textarea> </div>
                        
                    </div>



					<div class="form-group">					
<label class="col-sm-3 control-label"><p style="">
          Availability
        </p></label>	
<div class="col-sm-6">		

             <?php
             if($item['availability'] == 0){ ?>
			<input type='radio' name='availability' value='1'>     YES    <input type='radio' name='availability' value='0' checked>NO
				<?php } else if($item['availability'] == 1){ ?>
					<input type='radio' name='availability' value='1' checked>     YES    <input type='radio' name='availability' value='0'>NO
				<?php } ?>


</div>

</div>




			<div class="form-group">					
<label class="col-sm-3 control-label"><p style="">
          Show HP
        </p></label>	
<div class="col-sm-6">		

             <?php
             if($item['show'] == 0){ ?>
			<input type='radio' name='hp' value='1'>     YES    <input type='radio' name='hp' value='0' checked>NO
				<?php } else if($item['show'] == 1){ ?>
					<input type='radio' name='hp' value='1' checked>     YES    <input type='radio' name='hp' value='0'>NO
				<?php } ?>


</div>

</div>



<div class="form-group">
                        <label class="col-sm-3 control-label">
						<p style="font-family: normal;font-size: 18px;font-weight: bold;">File</p>
						</label>
                        <div class="col-sm-6">
       <input type="file" class="form-control" name="userfile" style="height:40px;margin:0px;padding:0;padding-left:5px;">
                        </div>
                    </div>

                      <div class="form-group">                    
            <label class="col-sm-3 control-label"><p style=" ">  Cetagory  </p></label>  
                        <div class="col-sm-6">      
                             <select class="form-control" id='cate' name="cetagory" onchange='categories()'>

                        <?php  foreach ($cetegory as $citem): ?>
                                <option <?php if($item['category'] == $citem['id']) echo "selected"; ?>  value="<?php echo $citem['id']?>"><?php echo $citem['name']?></option>
                        <?php endforeach; ?>
                        </select>
        </div>
    </div>
	
	
	
 <div class="form-group">                    
                        <label class="col-sm-3 control-label"><p style=" ">
           Sub cetagory
        </p></label>  
                        <div class="col-sm-6">      
                             <select class="form-control" id='sub' name="sub_cates">
 </select>
        </div>
    </div>

<input type="hidden" name="sub" value="<?php echo $item['category2']; ?>" class="form-control">

<div class="form-group" style="text-align:center">	
<button type="submit" class="btn btn-info">Update</button>
</div>
 
                </form>
				<?php endforeach; ?>	
				
            </div>
        </section>



        


                 



     
        </div>
    </section>


            </div>
        </div>


        <!-- page end-->
        </section>




    </section>

	
	
	
	
	


    <!--main content end-->