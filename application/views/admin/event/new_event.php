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
            	alert("Event Successfully Inserted.");
            </script>
        	<?php }?>
        	
            <div class="card-box">
            	<div class="notice-form">
	                <h2 class="text-center"><?php if(!empty($info)):?>
                            Update
                        <?php else:?>
                            Add New
                        <?php endif;?> Event</h2>
	                <br>
					<?php echo validation_errors(); ?>

					<?php echo form_open_multipart('admin/new_event_insert','class="form-horizontal"'); ?>
                    <input type="hidden" name="event_id" value="<?php if(!empty($info)){echo $info->id;}?>">
					    <div class="form-group">
	                        <label class="control-label col-lg-2">Title</label>
	                        <div class="col-md-10">
	                            <input type="text" name="title" value="<?php if(!empty($info)){echo $info->title;}?>" class="form-control" placeholder="Event Title">
	                        </div>
	                    </div>
					    <div class="form-group">
	                        <label class="control-label col-lg-2">Location</label>
	                        <div class="col-md-10">
	                            <input type="text" name="location" value="<?php if(!empty($info)){echo $info->location;}?>" class="form-control" placeholder="Location">
	                        </div>
	                    </div>
	                    <div class="form-group">
	                        <label class="control-label col-lg-2">Start Date</label>
	                        <div class="col-md-10">
	                            <input type="text" name="start_date" value="<?php if(!empty($info)){echo $info->start_date;}?>" class="datepicker form-control" placeholder="Start Date">
	                        </div>
	                    </div>
	                    <div class="form-group">
	                        <label class="control-label col-lg-2">End Date</label>
	                        <div class="col-md-10">
	                            <input type="text" name="end_date" value="<?php if(!empty($info)){echo $info->end_date;}?>" class="datepicker form-control" placeholder="End Date">
	                        </div>
	                    </div>
	                    <div class="form-group">
	                        <label class="control-label col-lg-2">Event Image</label>
	                        <div class="col-lg-5">
	                            <input name="event_image" id="event_image" class="form-control" type="file">
	                        </div>
	                    </div>
	                    <div class="form-group">
	                        <label class="control-label col-lg-2">Description</label>
	                        <div class="col-lg-10">
	                            <textarea name="description" rows="7" cols="5" class="editor form-control" placeholder="Description"><?php if(!empty($info)){echo $info->description;}?></textarea>
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