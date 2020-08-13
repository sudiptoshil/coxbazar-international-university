<div class="about-area">
	<div class="section-top-banner">
		<div class="container">
			<div class="section-top-banner-links">
				<h1>Application for hostel seat</h1>
				<nav aria-label="breadcrumb">
				  <ol class="breadcrumb">
				    <li class="breadcrumb-item"><a href="<?php echo base_url();?>">Home</a></li>
				    <li class="breadcrumb-item active" aria-current="page">Hostel Seat</li>
				  </ol>
				</nav>
			</div>
		</div>
	</div>

	<div class="about-area-body">
		<div class="container">
		    <h1 class="text-center mb-2" style="color: #035762;font-weight: bold;">Hostel Seat Allotment Application</h1>
		    <div class="text-center mb-4"><?php echo $this->session->flashdata('msg');?></div>
			    <form action="<?=base_url('students/hostel_seat_req')?>" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="student_name" class="form-control" placeholder="Applicant's Name" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">Gender</label>
                                <select name="gender" class="form-control" id="gender" required>
                                    <option value="0">-- Select Gender --</option>
                                    <option value="1">Male</option>
                                    <option value="2">Female</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">Department</label>
                                <select name="dept" class="form-control" id="dept" required>
                                    <option value="0">-- Select Department --</option>
                                    <?php
                                    foreach ($all_dept as $key => $d) {
                                    ?>
                                        <option value="<?php echo $d['id'];?>"<?php if(!empty($info)){if($info->dept==$d['id']) echo 'selected';}?>>
                                            <?php echo $d['name'];?>
                                        </option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4" >
                            <div class="form-group">
                                <label class="control-label">Batch</label>
                                <select name="batch" class="form-control" id="batch" required>
                                    <option value="0">Select Batch</option>
                                    <?php
                                    foreach ($all_batch as $key => $b) {
                                        ?>
                                        <option value="<?php echo $b['id'];?>">
                                            <?php echo $b['name'];?>
                                        </option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4" >
                            <div class="form-group">
                                <label class="control-label">Session</label>
                                <select name="session" class="form-control" id="session" required>
                                    <option value="0">Select Session</option>
                                    <?php
                                    foreach ($all_session as $key => $s) {
                                    ?>
                                    <option value="<?php echo $s['id'];?>">
                                        <?php echo $s['name'];?>
                                    </option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4" >
                            <div class="form-group">
                                <label>Roll</label>
                                <input type="text" name="roll" class="form-control" placeholder="Roll" required>
                            </div>
                        </div>
                        <div class="col-md-12" >
                            <div class="form-group">
                                <label>Application</label>
                                <textarea type="text" name="application" rows="7" class="form-control" placeholder="Write your application" required></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-custom">
                            Submit
                        </button>
                    </div>
            </form>
            
		</div>
	</div>
</div>