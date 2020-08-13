<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="row">
            <!-- <div class="col-xs-12">
                <h4 class="page-title">Notice</h4>
            </div> -->
            <?php if($success == 1){?>
            <script>
            	alert("Notice Successfully Inserted.");
            </script>
        	<?php }?>
        	
            <div class="card-box">
            	<div class="notice-form">
	                <h2 class="text-center"><?php if(!empty($info)):?>
                            Update
                        <?php else:?>
                            Add New
                        <?php endif;?> Dept</h2>
	                <br>
					<?php echo validation_errors(); ?>

					<?php echo form_open_multipart('admin/insert_dept','class="form-horizontal"'); ?>
                    <input type="hidden" name="dept_id" value="<?php if(!empty($info)){echo $info->id;}?>">
					    <div class="form-group">
	                        <label class="control-label col-lg-2">Faculty</label>
	                        <div class="col-md-10">
	                            <select name="faculty" class="form-control">
	                                <option value="0">Select Faculty</option>
	                                <?php foreach($faculty as $f){
	                                ?>
	                                <option value="<?=$f['id'];?>"><?=$f['name'];?></option>
	                                <?php }?>
	                            </select>
	                        </div>
	                    </div>
					    <div class="form-group">
	                        <label class="control-label col-lg-2">Dept. Name</label>
	                        <div class="col-md-10">
	                            <input type="text" name="dept_name" value="<?php if(!empty($info)){echo $info->name;}?>" class="form-control" placeholder="Dept. name">
	                        </div>
	                    </div>
	                    <div class="form-group">
	                        <label class="control-label col-lg-2">Dept. Code</label>
	                        <div class="col-md-10">
	                            <input type="text" name="dept_code" value="<?php if(!empty($info)){echo $info->code;}?>" class="form-control" placeholder="Dept. code">
	                        </div>
	                    </div>
	                    <div class="form-group">
	                        <label class="control-label col-lg-2">Dept. short name</label>
	                        <div class="col-md-10">
	                            <input type="text" name="dept_short_name" value="<?php if(!empty($info)){echo $info->short_name;}?>" class="form-control" placeholder="Dept. short name">
	                        </div>
	                    </div>
	                    <div class="form-group">
	                        <label class="control-label col-lg-2">Dept. Image</label>
	                        <div class="col-lg-5">
	                            <input name="dept_image" id="dept_image" class="form-control" type="file">
	                        </div>
	                    </div>
	                    <div class="form-group">
	                        <label class="control-label col-lg-2">Dept. Phone No</label>
	                        <div class="col-md-10">
	                            <input type="text" name="dept_phone" class="form-control" value="<?php if(!empty($info)){echo $info->phone;}?>">
	                        </div>
	                    </div>
	                    <div class="form-group">
	                        <label class="control-label col-lg-2">Dept. Email</label>
	                        <div class="col-md-10">
	                            <input type="text" name="dept_email" class="form-control" value="<?php if(!empty($info)){echo $info->email;}?>">
	                        </div>
	                    </div>
	                    <div class="form-group">
	                        <label class="control-label col-lg-2">Overview</label>
	                        <div class="col-lg-10">
	                            <textarea name="dept_overview" rows="5" cols="5" class="editor form-control" placeholder="Dept. overview"><?php if(!empty($info)){echo $info->overview;}?></textarea>
	                        </div>
	                    </div>
	                    <div class="form-group">
	                        <label class="control-label col-lg-2">Mission-Vision</label>
	                        <div class="col-lg-10">
	                            <textarea name="dept_mission_vision" rows="5" cols="5" class="editor form-control"
                                          placeholder="Dept. Mission-Vision"><?php if(!empty($info)){echo $info->mission_vision;}?></textarea>
	                        </div>
	                    </div>
	                    <div class="form-group">
	                        <label class="control-label col-lg-2">Academic Curriculum</label>
	                        <div class="col-lg-10">
	                            <textarea name="dept_aca_curri" rows="5" cols="5" class="editor form-control"
                                          placeholder="Dept. overview"><?php if(!empty($info)){echo $info->academic_curriculum;}?></textarea>
	                        </div>
	                    </div>
	                    <div class="form-group">
	                        <label class="control-label col-lg-2">Dept. Starting Date</label>
	                        <div class="col-md-10">
	                            <input type="text" name="dept_starting_date" class="form-control" value="<?php if(!empty($info)){echo $info->starting_date;}else{echo date('Y-m-d');}?>">
	                        </div>
	                    </div>

	                    <div class="text-center">
	                    	<button type="submit" class="btn btn-primary">
                                <?php if(!empty($info)):?>
                                    Update
                                <?php else:?>
                                    Submit
                                <?php endif;?>
                            </button>
	                    </div>
					</form>
            	</div>
            </div>
        </div>
    </div>
</div>