<!--main content start-->
    <section id="main-content" class="">
        <section class="wrapper">
        <!-- page start-->
        <!-- page start-->


		

        <div class="row">
        <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
             
        <p style="color: teal;
			font-family: bucket-ico-font;
				font-size: 30px;
			font-weight: bold;
			text-align: left;">
         
        </p>

            </header>
            <div class="panel-body">
<form class="form-horizontal bucket-form" method="post" action="<?php echo base_url(); ?>admin/pro_insert/<?php echo $type; ?>" enctype="multipart/form-data">
		 
			
                    <div class="form-group">
                        <label class="col-sm-3 control-label"> <p style=" ">
            Title
        </p></label>
                        <div class="col-sm-6">
                            <input type="text" name="title"  class="form-control">
                        </div>
                    </div>

					
				<div class="form-group">
                        <label class="col-sm-3 control-label">
                        <p style="font-family: normal;font-size: 18px;font-weight: bold;">Details:</p>
                        </label>
                        <div class="col-sm-6">
          <textarea class="form-control" rows="5" name="descrition"></textarea>
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


        <!-- page end-->
        </section>
    </section>
    <!--main content end-->