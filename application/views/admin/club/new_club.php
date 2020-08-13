<style>
    .ck-editor__editable {
      min-height: 250px;
    }
</style>
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="row">
            <!-- <div class="col-xs-12">
                <h4 class="page-title">Notice</h4>
            </div> -->
            <?php if($success == 1){?>
            <script>
            	alert("Club Successfully Inserted.");
            </script>
        	<?php }?>
        	
            <div class="card-box">
            	<div class="notice-form">
            	    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3">
    	                    <h2 class="text-center"><?php if(!empty($info)):?> Update <?php else:?> Add New <?php endif;?> Club</h2>
                        </div>
                        <div class="col-xs-3 text-right">
                            <a href="<?=base_url();?>admin/club" class="btn btn-info">All Club</a>
                        </div>
                    </div>
	                <br>
					<?php echo validation_errors(); ?>

					<?php echo form_open_multipart('admin/new_club_insert','class="form-horizontal"'); ?>
                    <input type="hidden" name="club_id" value="<?php if(!empty($info)){echo $info->id;}?>">
					    <div class="form-group">
	                        <label class="control-label col-lg-2">Title</label>
	                        <div class="col-md-10">
	                            <input type="text" name="title" value="<?php if(!empty($info)){echo $info->title;}?>" class="form-control" placeholder="Club Name">
	                        </div>
	                    </div>
	                    <div class="form-group">
	                        <label class="control-label col-lg-2">Starting Date</label>
	                        <div class="col-md-10">
	                            <input type="text" name="start_date" value="<?php if(!empty($info)){echo $info->starting_date;}?>" class="datepicker form-control" placeholder="Starting Date">
	                        </div>
	                    </div>
	                    <div class="form-group">
	                        <label class="control-label col-lg-2">Logo</label>
	                        <div class="col-lg-5">
	                            <input name="event_image" id="event_image" class="form-control" type="file">
	                        </div>
	                    </div>
	                    <div class="form-group">
	                        <label class="control-label col-lg-2">Description</label>
	                        <div class="col-lg-10">
	                            <textarea name="description" rows="7" cols="5" class="editor form-control" placeholder="Club Description"><?php if(!empty($info)){echo $info->description;}?></textarea>
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