<div class="dashboard-area wrapper-area">
	<div class="dashboard-area-body wrapper-area-body">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
					<div class="wrapper-area-body-left">
						<div class="list-group" role="tablist">
							<a class="list-group-item list-group-item-action list-group-item-light text-center active" data-toggle="list" href="#menu_1_content" role="tab" aria-controls="menu_1_content">
								Profile
							</a>
							<a class="list-group-item list-group-item-action list-group-item-light text-center"  href="<?= base_url(); ?>home/admission_form">
							Admission Form

							</a>

							<a class="list-group-item list-group-item-action list-group-item-light text-center" href="<?= base_url(); ?>/home/logout">
								Logout
							</a>
						</div>
					</div>
				</div>
				<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
					<div class="wrapper-area-body-right">
						<div class="tab-content" id="nav-tabContent">
							<div class="tab-pane fade show active" id="menu_1_content" role="tabpanel" aria-labelledby="menu_1_content">
								<h5 class="wrapper-area-body-right-card-heading border-bottom text-center text-light bg-blue mb-4">
									Profile
								</h5>
								<div class="wrapper-card-right-body">
									<div class="dashboard-profile-body table-responsive">
										<div class="row">
											<div class="col-md-4 col-sm-4 col-xs-12 ">
												<div class="pb-4">
													<img src="<?php if (!empty($info->image)) {
																	echo base_url() . "assets/images/applicants/" . $info->image;
																} else {
																	echo base_url() . "assets/images/user.png";
																} ?>" alt="..." class="img-thumbnail">
												</div>
											</div>
											<div class="col-md-8 col-sm-8 col-xs-12 text-center">
												<div class="form-group">
													<?php
													if ($info->status == 1) {
													?>
														<h2>Application Status:<br> <b class="text-warning">Your application is Pending</b></h2>
													<?php
													} elseif ($info->status == 2) {
													?>
														<h2>Application Status:<br> <b class="text-success">Your application is Accepted</b></h2>
													<?php
													} elseif ($info->status == 3) {
													?>
														<h2>Application Status:<br> <b class="text-danger">Your application is cancelled</b></h2>
													<?php
													}
													?>
												</div>
											</div>
											<br><br><br>
											<div class="col-md-6 col-sm-6 col-xs-12">
												<div class="row form-group">
													<label class="col-sm-4 control-label">Department</label>
													<div class="col-sm-8">
														<?php if (!empty($info)) {
															echo $this->common->getSpecificField('dept', 'id', $info->dept, 'name');
														} ?>
													</div>
												</div>
											</div>
											<div class="col-md-6 col-sm-6 col-xs-12">
												<div class="row form-group">
													<label class="col-sm-4 control-label">Shift</label>
													<div class="col-sm-8">
														<?php if (!empty($info)) {
															if ($info->shift == 1) {
																echo "Morning";
															} elseif ($info->shift == 3) {
																echo "Evening";
															}
														} ?>
													</div>
												</div>
											</div>
											<div class="col-md-6 col-sm-6 col-xs-12">
												<div class="row form-group">
													<label class="col-sm-4 control-label">Name</label>
													<div class="col-sm-8">
														<?php if (!empty($info)) {
															echo $info->name;
														} ?>
													</div>
												</div>
											</div>
											<div class="col-md-6 col-sm-6 col-xs-12">
												<div class="row form-group">
													<label class="col-sm-4 control-label">Bangla Name</label>
													<div class="col-sm-8">
														<?php if (!empty($info)) {
															echo $info->name_bangla;
														} ?>
													</div>
												</div>
											</div>
											<div class="col-md-6 col-sm-6 col-xs-12">
												<div class="row form-group">
													<label class="col-sm-4 control-label">Gender </label>
													<div class="col-sm-8">
														<?php if (!empty($info) && $info->gender == 1) {
															echo "Male";
														} elseif (!empty($info) && $info->gender == 2) {
															echo "Female";
														} ?>
													</div>
												</div>
											</div>
											<div class="col-md-6 col-sm-6 col-xs-12">
												<div class="row form-group">
													<label class="col-sm-4 control-label">Date of Birth</label>
													<div class="col-sm-8">
														<?php if (!empty($info)) {
															echo $info->dob;
														} ?>
													</div>
												</div>
											</div>
											<div class="col-md-6 col-sm-6 col-xs-12">
												<div class="row form-group">
													<label class="col-sm-4 control-label">Father's Name</label>
													<div class="col-sm-8">
														<?php if (!empty($info)) {
															echo $info->fatherName;
														} ?>
													</div>
												</div>
											</div>
											<div class="col-md-6 col-sm-6 col-xs-12">
												<div class="row form-group">
													<label class="col-sm-4 control-label">Father's Occupation</label>
													<div class="col-sm-8">
														<?php if (!empty($info)) {
															echo $info->father_occupation;
														} ?>
													</div>
												</div>
											</div>
											<div class="col-md-6 col-sm-6 col-xs-12">
												<div class="row form-group">
													<label class="col-sm-4 control-label">Mother's Name</label>
													<div class="col-sm-8">
														<?php if (!empty($info)) {
															echo $info->motherName;
														} ?>
													</div>
												</div>
											</div>
											<div class="col-md-6 col-sm-6 col-xs-12">
												<div class="row form-group">
													<label class="col-sm-4 control-label">Mother's Occupation</label>
													<div class="col-sm-8">
														<?php if (!empty($info)) {
															echo $info->mother_occupation;
														} ?>
													</div>
												</div>
											</div>
											<div class="col-md-6 col-sm-6 col-xs-12">
												<div class="row form-group">
													<label class="col-sm-4 control-label">Guardian's Name</label>
													<div class="col-sm-8">
														<?php if (!empty($info)) {
															echo $info->guardianName;
														} ?>
													</div>
												</div>
											</div>
											<div class="col-md-6 col-sm-6 col-xs-12">
												<div class="row form-group">
													<label class="col-sm-4 control-label">Guardian's Occupation</label>
													<div class="col-sm-8">
														<?php if (!empty($info)) {
															echo $info->guardian_occupation;
														} ?>
													</div>
												</div>
											</div>
											<div class="col-md-6 col-sm-6 col-xs-12">
												<div class="row form-group">
													<label class="col-sm-4 control-label">Phone</label>
													<div class="col-sm-8">
														<?php if (!empty($info)) {
															echo $info->mobile;
														} ?>
													</div>
												</div>
											</div>
											<div class="col-md-6 col-sm-6 col-xs-12">
												<div class="row form-group">
													<label class="col-sm-4 control-label">Alternate Phone</label>
													<div class="col-sm-8">
														<?php if (!empty($info)) {
															echo $info->alternate_phone;
														} ?>
													</div>
												</div>
											</div>
											<div class="col-md-6 col-sm-6 col-xs-12">
												<div class="row form-group">
													<label class="col-sm-4 control-label">Email</label>
													<div class="col-sm-8">
														<?php if (!empty($info)) {
															echo $info->email;
														} ?>
													</div>
												</div>
											</div>
											<div class="col-md-6 col-sm-6 col-xs-12">
												<div class="row form-group">
													<label class="col-sm-4 control-label">Guardian's Phone</label>
													<div class="col-sm-8">
														<?php if (!empty($info)) {
															echo $info->guardianMobile;
														} ?>
													</div>
												</div>
											</div>
											<div class="col-md-6 col-sm-6 col-xs-12">
												<div class="row form-group">
													<label class="col-sm-4 control-label">Nationality</label>
													<div class="col-sm-8">
														<?php if (!empty($info)) {
															echo $info->nationality;
														} ?>
													</div>
												</div>
											</div>
											<div class="col-md-6 col-sm-6 col-xs-12">
												<div class="row form-group">
													<label class="col-sm-4 control-label">Country</label>
													<div class="col-sm-8">
														<?php if (!empty($info)) {
															echo $info->country;
														} ?>
													</div>
												</div>
											</div>
											<div class="col-md-6 col-sm-6 col-xs-12">
												<div class="row form-group">
													<label class="col-sm-4 control-label">Marital Status</label>
													<div class="col-sm-8">
														<?php if (!empty($info) && $info->marital_status == 1) {
															echo "Unmarried";
														} elseif (!empty($info) && $info->marital_status == 1) {
															echo "Married";
														} ?>
													</div>
												</div>
											</div>
											<div class="col-md-6 col-sm-6 col-xs-12">
												<div class="row form-group">
													<label class="col-sm-4 control-label">Religion</label>
													<div class="col-sm-8">
														<?php if (!empty($info)) {
															echo $this->common->religion($info->religion);
														} ?>
													</div>
												</div>
											</div>
											<div class="col-md-6 col-sm-6 col-xs-12">
												<div class="row form-group">
													<label class="col-sm-4 control-label">Passport </label>
													<div class="col-sm-8">
														<?php if (!empty($info)) {
															echo $info->passport;
														} ?>
													</div>
												</div>
											</div>
											<div class="col-md-6 col-sm-6 col-xs-12">
												<div class="row form-group">
													<label class="col-sm-4 control-label">Blood Group</label>
													<div class="col-sm-8">
														<?php if (!empty($info)) {
															echo $info->bloodGroup;
														} ?>
													</div>
												</div>
											</div>
											<div class="col-md-6 col-sm-6 col-xs-12">
												<div class="row form-group">
													<label class="col-sm-4 control-label">Passport Validation Date</label>
													<div class="col-sm-8">
														<?php if (!empty($info)) {
															echo $info->pass_validation_date;
														} ?>
													</div>
												</div>
											</div>
											<div class="col-md-6 col-sm-6 col-xs-12">
												<div class="row form-group">
													<label class="col-sm-4 control-label">Birth Certificate</label>
													<div class="col-sm-8">
														<?php if (!empty($info)) {
															echo $info->birth_certificate;
														} ?>
													</div>
												</div>
											</div>

											<div class="col-md-12 col-sm-12 col-xs-12">
												<div class="row">
													<div class="col-md-6 col-sm-6 col-xs-12">
														<h4 class="text-uppercase"><u>Present Address</u></h4>
														<div class="row form-group">
															<label class="col-sm-4 control-label">Address</label>
															<div class="col-sm-8">
																<?php if (!empty($info)) {
																	echo $info->presentAddress;
																} ?>
															</div>
														</div>
														<div class="row form-group">
															<label class="col-sm-4 control-label">District</label>
															<div class="col-sm-8">
																<?php if (!empty($info)) {
																	echo $info->prDistrict;
																} ?>
															</div>
														</div>
														<div class="row form-group">
															<label class="col-sm-4 control-label">Thana</label>
															<div class="col-sm-8">
																<?php if (!empty($info)) {
																	echo $info->prThanaId;
																} ?>
															</div>
														</div>
													</div>
													<div class="col-md-6 col-sm-6 col-xs-12">
														<h4 class="text-uppercase"><u>Permanent Address</u></h4>
														<div class="row form-group">
															<label class="col-sm-4 control-label">Address</label>
															<div class="col-sm-8">
																<?php if (!empty($info)) {
																	echo $info->permanentAddress;
																} ?>
															</div>
														</div>
														<div class="row form-group">
															<label class="col-sm-4 control-label">District</label>
															<div class="col-sm-8">
																<?php if (!empty($info)) {
																	echo $info->perDistrict;
																} ?>
															</div>
														</div>
														<div class="row form-group">
															<label class="col-sm-4 control-label">Thana</label>
															<div class="col-sm-8">
																<?php if (!empty($info)) {
																	echo $info->perThanaId;
																} ?>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="col-md-12 col-sm-12 col-xs-12">
												<div class="form-group">
													<table class="table table-bordered">
														<thead>
															<tr>
																<th class="text-center">Sl</th>
																<th class="text-center">Examination/Degree</th>
																<th class="text-center">Board Name</th>
																<th class="text-center">School/College</th>
																<th class="text-center">Passing Year</th>
																<th class="text-center">Group/Discipline/Major</th>
																<th class="text-center">GPA/ CGPA/ Division</th>
																<th class="text-center">Marks GPA without Optional</th>
															</tr>
														</thead>
														<tbody>
															<?php
															$sl = 1;
															foreach ($edu_info as $e) {
															?>
																<tr>
																	<td class="text-center"><?php echo $sl; ?></td>
																	<td class="text-center"><?php echo $e['exam']; ?></td>
																	<td class="text-center"><?php echo $this->common->getSpecificField("board", 'id', $e['board'], 'name'); ?></td>
																	<td class="text-center"><?php echo $e['institution']; ?></td>
																	<td class="text-center"><?php echo $e['passing_year']; ?></td>
																	<td class="text-center"><?php echo $e['group']; ?></td>
																	<td class="text-center"><?php echo $e['cgpa']; ?></td>
																	<td class="text-center"><?php echo $e['gpa']; ?></td>
																</tr>
															<?php
																$sl++;
															}
															?>
														</tbody>
													</table>
												</div>
											</div>

											<div class="col-md-12 col-sm-12 col-xs-12 ">
												<div class="row">
													<div class="col-md-4 col-sm-4 col-xs-12 ">
														<label>SSC Transcript</label>
														<div class="pb-4">
															<a href="<?= base_url() . "assets/images/applicants/" . $info->ssc_transcript_img; ?>" target="_blank"><img src="<?php if (!empty($info->ssc_transcript_img)) {
																																													echo base_url() . "assets/images/applicants/" . $info->ssc_transcript_img;
																																												} ?>" alt="..." class="img-thumbnail"></a>
														</div>
													</div>
													<div class="col-md-4 col-sm-4 col-xs-12 ">
														<label>HSC Transcript</label>
														<div class="pb-4">
															<a href="<?= base_url() . "assets/images/applicants/" . $info->hsc_transcript_img; ?>" target="_blank"><img src="<?php if (!empty($info->hsc_transcript_img)) {
																																													echo base_url() . "assets/images/applicants/" . $info->hsc_transcript_img;
																																												} ?>" alt="..." class="img-thumbnail"></a>
														</div>
													</div>
													<?php if (!empty($info->degree_honours_transcript_img)) {
													?>
														<div class="col-md-4 col-sm-4 col-xs-12 ">
															<label>Degree/Honours Transcript</label>
															<div class="pb-4">
																<a href="<?= base_url() . "assets/images/applicants/" . $info->degree_honours_transcript_img; ?>" target="_blank"><img src="<?php if (!empty($info->degree_honours_transcript_img)) {
																																																echo base_url() . "assets/images/applicants/" . $info->hsc_transcript_img;
																																															} ?>" alt="..." class="img-thumbnail"></a>
															</div>
														</div>
													<?php
													}
													?>
												</div>
											</div>

											<div class="col-md-12 col-sm-12 col-xs-12 ">
												<div>
													<h4 class="text-center pb-4"><b>Your bkash payment info</b></h4>
												</div>
												<div class="row">

													<div class="col-md-6 col-sm-6 col-xs-12">
														<div class="row form-group">
															<label class="col-sm-5 control-label"><b>Sender Mobile No:</b> </label>
															<div class="col-sm-7">
																<?php if (!empty($payment_info)) {
																	echo $payment_info->sender_number;
																} ?>
															</div>
														</div>
													</div>
													<div class="col-md-6 col-sm-6 col-xs-12">
														<div class="row form-group">
															<label class="col-sm-5 control-label"><b>Transaction ID:</b> </label>
															<div class="col-sm-7">
																<?php if (!empty($payment_info)) {
																	echo $payment_info->transaction_id;
																} ?>
															</div>
														</div>
													</div>
													<div class="col-md-6 col-sm-6 col-xs-12">
														<div class="row form-group">
															<label class="col-sm-5 control-label"><b>Reference: </b></label>
															<div class="col-sm-7">
																<?php if (!empty($payment_info)) {
																	echo $payment_info->reference;
																} ?>
															</div>
														</div>
													</div>
													<div class="col-md-6 col-sm-6 col-xs-12">
														<div class="row form-group">
															<label class="col-sm-5 control-label"><b>Amount: </b></label>
															<div class="col-sm-7">
																<?php if (!empty($payment_info)) {
																	echo $payment_info->amount;
																} ?>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
