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
			
		 <form class="form-horizontal bucket-form" method="post" action="<?php echo base_url(); ?>admin/user_edit/<?php echo $id; ?>">
                 
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Name</label>
                        <div class="col-sm-6">
                            <input type="text" name="name" value="<?php echo $item['name']; ?>" class="form-control">
                        </div>
                    </div>
					
					 <div class="form-group">
                        <label class="col-sm-3 control-label">User</label>
                        <div class="col-sm-6">
                            <input type="text" name="user" value="<?php echo $item['user']; ?>" class="form-control">
                        </div>
                    </div>
					
					 <div class="form-group">
                        <label class="col-sm-3 control-label">Password</label>
                        <div class="col-sm-6">
                            <input type="text" name="password" value="<?php echo $item['password']; ?>" class="form-control">
                        </div>
                    </div>
					
					 <div class="form-group">
                        <label class="col-sm-3 control-label">Details</label>
                        <div class="col-sm-6">
                            <input type="text" name="details" value="<?php echo $item['details']; ?>" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Type</label>
                        <div class="col-sm-6">
                           <select class="form-control input-lg m-bot15" name="type">
                            <?php
                                if($item['type'] == '2'){
                                    ?>
                                     <option value="2" selected="selected">User</option>
                                     <option value="1">Admin</option>
                                      <?php
                                }
                                else{
                                    ?>
                                    <option value="1" selected="selected">Admin</option>
                                     <option value="2">User</option>
                                     <?php
                                }
                        ?>

                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Status</label>
                        <div class="col-sm-6">
                           <select class="form-control input-lg m-bot15" name="status">
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>

                            </select>
                        </div>
                    </div>
                <div class="form_group">
                        <label class="col-sm-3 control-label" id="lbl_valid">User Validation </label>
                        <?php 
                            if($item['insertable'] == '1' && $item['updateable'] == '1' && $item['deleteable'] == '1'){
                                ?>
                                     <div class="col-sm-2 checkbox">
                                    <label><input type="checkbox" name="ch_in" value="1" checked="checked">Insertable</label>
                                    </div> 

                                    <div class="col-sm-2 checkbox">
                                    <label><input type="checkbox" name="ch_up" value="1" checked="checked"> Updateable</label>
                                    </div> 
                                    <div class="col-sm-2 checkbox">
                                    <label><input type="checkbox" name="ch_de" value="1" checked="checked"> Deleteable</label>
                                    </div>
                                     <div class="col-sm-3 checkbox">
                 
                                    </div>
                                    <?php 
                            }
                            else if($item['insertable'] == '1' && $item['updateable'] == '1'){
                                ?>
                                    <div class="col-sm-2 checkbox">
                                    <label><input type="checkbox" name="ch_in" value="1" checked="checked">Insertable</label>
                                    </div> 

                                    <div class="col-sm-2 checkbox">
                                    <label><input type="checkbox" name="ch_up" value="1" checked="checked"> Updateable</label>
                                    </div> 
                                    <div class="col-sm-2 checkbox">
                                    <label><input type="checkbox" name="ch_de" value="1"> Deleteable</label>
                                    </div>
                                     <div class="col-sm-3 checkbox">
                 
                                    </div>
                                <?php
                            }
                            else if($item['insertable'] == '1' && $item['deleteable'] == '1'){
                                ?>
                                    <div class="col-sm-2 checkbox">
                                    <label><input type="checkbox" name="ch_in" value="1" checked="checked">Insertable</label>
                                    </div> 

                                    <div class="col-sm-2 checkbox">
                                    <label><input type="checkbox" name="ch_up" value="1"> Updateable</label>
                                    </div> 
                                    <div class="col-sm-2 checkbox">
                                    <label><input type="checkbox" name="ch_de" value="1" checked="checked"> Deleteable</label>
                                    </div>
                                     <div class="col-sm-3 checkbox">
                 
                                    </div>
                                <?php
                            }
                            else if($item['updateable'] == '1' && $item['deleteable'] == '1'){
                                ?>
                                    <div class="col-sm-2 checkbox">
                                    <label><input type="checkbox" name="ch_in" value="1">Insertable</label>
                                    </div> 

                                    <div class="col-sm-2 checkbox">
                                    <label><input type="checkbox" name="ch_up" value="1" checked="checked"> Updateable</label>
                                    </div> 
                                    <div class="col-sm-2 checkbox">
                                    <label><input type="checkbox" name="ch_de" value="1" checked="checked"> Deleteable</label>
                                    </div>
                                     <div class="col-sm-3 checkbox">
                 
                                    </div>
                                <?php
                            }
                            else if($item['updateable'] == '1'){
                                ?>
                                     <div class="col-sm-2 checkbox">
                                    <label><input type="checkbox" name="ch_in" value="1">Insertable</label>
                                    </div> 

                                    <div class="col-sm-2 checkbox">
                                    <label><input type="checkbox" name="ch_up" value="1" checked="checked"> Updateable</label>
                                    </div> 
                                    <div class="col-sm-2 checkbox">
                                    <label><input type="checkbox" name="ch_de" value="1"> Deleteable</label>
                                    </div>
                                     <div class="col-sm-3 checkbox">
                 
                                    </div>
                                <?php

                            }
                            else if($item['deleteable'] == '1'){
                                ?>
                                     <div class="col-sm-2 checkbox">
                                    <label><input type="checkbox" name="ch_in" value="1">Insertable</label>
                                    </div> 

                                    <div class="col-sm-2 checkbox">
                                    <label><input type="checkbox" name="ch_up" value="1"> Updateable</label>
                                    </div> 
                                    <div class="col-sm-2 checkbox">
                                    <label><input type="checkbox" name="ch_de" value="1" checked="checked"> Deleteable</label>
                                    </div>
                                     <div class="col-sm-3 checkbox">
                 
                                    </div>
                                <?php
                            }
                            else if($item['insertable'] == '1'){
                                ?>
                                         <div class="col-sm-2 checkbox">
                                    <label><input type="checkbox" name="ch_in" value="1" checked="checked">Insertable</label>
                                    </div> 

                                    <div class="col-sm-2 checkbox">
                                    <label><input type="checkbox" name="ch_up" value="1"> Updateable</label>
                                    </div> 
                                    <div class="col-sm-2 checkbox">
                                    <label><input type="checkbox" name="ch_de" value="1"> Deleteable</label>
                                    </div>
                                     <div class="col-sm-3 checkbox">
                 
                                    </div>
                                <?php
                            }
                            else if($item['insertable'] == '0' && $item['updateable'] == '0' && $item['deleteable'] == '0'){
                                ?>
                                             <div class="col-sm-2 checkbox">
                                    <label><input type="checkbox" name="ch_in" value="1">Insertable</label>
                                    </div> 

                                    <div class="col-sm-2 checkbox">
                                    <label><input type="checkbox" name="ch_up" value="1"> Updateable</label>
                                    </div> 
                                    <div class="col-sm-2 checkbox">
                                    <label><input type="checkbox" name="ch_de" value="1"> Deleteable</label>
                                    </div>
                                     <div class="col-sm-3 checkbox">
                 
                                    </div>

                                <?php

                            }
                            else{
                                ?>
                                        <div class="col-sm-2 checkbox">
                                    <label><input type="checkbox" name="ch_in" value="1">Insertable</label>
                                    </div> 

                                    <div class="col-sm-2 checkbox">
                                    <label><input type="checkbox" name="ch_up" value="1"> Updateable</label>
                                    </div> 
                                    <div class="col-sm-2 checkbox">
                                    <label><input type="checkbox" name="ch_de" value="1"> Deleteable</label>
                                    </div>
                                     <div class="col-sm-3 checkbox">
                 
                                    </div>
                                <?php
                            }
                        ?>     
                </div>


			

<div class="form-group" style="text-align:center">	
<button type="submit" class="btn btn-info">Update</button></div>
 
                </form>
				<?php endforeach; ?>	
				
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