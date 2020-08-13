<?php

use \Illuminate\Database\Eloquent\Model as Eloquent;


class Student_reg extends Eloquent
{	
	protected $table = 'admission';
	protected $guarded = ['dept','shift','name_bangla','fatherName','father_occupation','motherName','mother_occupation','guardianName','guardian_occupation','guardianMobile','gender','religion','nationality', 'alternate_phone', 'country', 'marital_status', 'bloodGroup', 'passport', 'pass_validation_date', 'birth_certificate', 'image', 'presentAddress', 'prDistrict', 'prThanaId', 'permanentAddress', 'perDistrict',  'ssc_transcript_img', 'hsc_transcript_img', 'degree_honours_transcript_img'];
	public $timestamps = false;


	
	
}
