<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="row">
            <!-- <div class="col-xs-12">
                <h4 class="page-title">Notice</h4>
            </div> -->
        	
            <div class="card-box">
            	<div class="notice-form">
	                <h2 class="text-center">Add New Notice</h2>
	                <br>

					<?php echo form_open_multipart('admin/do_upload','class="form-horizontal"'); ?>

	                    <div class="form-group">
	                        <label class="control-label col-lg-2">Notice Image</label>
	                        <div class="col-lg-10">
					<input type="file" name="userfile" size="20" />
	                        </div>
	                    </div>
	                    <div class="form-group">
	                        <label class="control-label col-lg-2">Date</label>
	                        <div class="col-md-10">
	                            <input type="text" name="notice-date" class="form-control" value="<?php echo date('Y-m-d H:i:s');?>">
	                        </div>
	                    </div>

	                    <div class="text-center">
	                    	<button type="submit" class="btn btn-primary">Submit</button>
	                    </div>
					</form>
            	</div>
            </div>
        </div>
    </div>
</div>