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
                        <?php endif;?> Notice</h2>
	                <br>
					<?php echo validation_errors(); ?>

					<?php echo form_open_multipart('admin/insert_notice','class="form-horizontal"'); ?>
                    <input type="hidden" name="notice_id" value="<?php if(!empty($info)){echo $info->id;}?>">
					    <div class="form-group">
	                        <label class="control-label col-lg-2">Notice Type</label>
	                        <div class="col-md-10">
	                        	<select name="notice_type" class="form-control" required>
                                    <option value="0">-- Select --</option>
                                    <option value="1" <?php if(!empty($info)){if($info->notice_type==1) echo 'selected';}?>>General Notice</option>
                                    <option value="4" <?php if(!empty($info)){if($info->notice_type==4) echo 'selected';}?>>Academic Notice</option>
                                    <option value="2" <?php if(!empty($info)){if($info->notice_type==2) echo 'selected';}?>>News</option>
                                    <option value="3" <?php if(!empty($info)){if($info->notice_type==3) echo 'selected';}?>>Event</option>
                                </select>
	                        </div>
	                    </div>
					    <div class="form-group">
	                        <label class="control-label col-lg-2">Title</label>
	                        <div class="col-md-10">
	                            <input type="text" name="title" value="<?php if(!empty($info)){echo $info->title;}?>" class="form-control" placeholder="Notice Title" required>
	                        </div>
	                    </div>
	                    <div class="form-group">
	                        <label class="control-label col-lg-2">Description</label>
	                        <div class="col-lg-10">
	                            <textarea name="description" rows="5" cols="5" class="form-control"
                                          placeholder="Notice description here"><?php if(!empty($info)){echo $info->description;}?></textarea>
	                        </div>
	                    </div>
	                    <div class="form-group">
	                        <label class="control-label col-lg-2">Notice Image/File</label>
	                        <div class="col-lg-5">
	                            <input name="notice-image" id="notice_image" class="form-control" type="file">
	                        </div>
	                    </div>
	                    <div class="form-group">
	                        <label class="control-label col-lg-2">Date</label>
	                        <div class="col-md-10">
	                            <input type="text" name="notice-date" class="form-control" value="<?php if(!empty($info)){echo $info->date_time;}else{echo date('Y-m-d H:i:s');}?>">
	                        </div>
	                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-2"> Is Breaking?</label>
                        <div class="col-lg-10">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" value="1" name="is_breaking" <?php if( !empty($info) && $info->is_breaking==1){echo "checked";}?>>Click Here
                                </label>
                            </div>
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