<style>
.header
{


}

.logo
{
float: left;
 c
}
.logo img
{
width: 100px;
}
.customer_info
{
float: left;
width: 300px;
}
.right_site
{
float:right;
}

.body
{
margin: 0px auto auto;
    width: 1000px;
}


.CSSTableGenerator1 tr:first-child td
{
   background: gray;
   color: white;
    font-weight: bold;
	font-size: 14px;
   }
   
.CSSTableGenerator1 table
{
   border-collapse: collapse;
    font-family: verdana;
    font-size: 14px;
    width: 100%;
}   
   

.CSSTableGenerator1 table  tr  td {
    padding: 8px 4px;
	border: 1px solid #ddd;
	line-height: 9px;
}
   
.CSSTableGenerator1 table  tr  {
   background-color: white;
}

.CSSTableGenerator1 table  tr:nth-child(odd)  {
   background-color:#E5E5E5;
}


table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  padding: 8px;
  text-align: left;
  border-bottom: 1px solid #ddd;
}

tr:hover {background-color:#f5f5f5;}

</style>
<div class="body"> 
<div class="header">  


<div style="text-align:center;margin: 0px;font-size: 14px;">   
<div style="color:red;font-size: 51px;text-align:center;"> Cox's Bazar International University</div>
 Cox's Bazar Bangladesh.
<br/>
Mobile : +880-0341-52510, Email : cbiu.info@gmail.com
</div>

<br/><br/><br/>

<img src="http://www.cbiu.ac.bd/attach/<?php echo $id;?>.jpg"  width="150" height="150" alt="Italian Trulli">


<table>
<?php
foreach ($all as $item): 
?>
<tr>
<td>Department</td><td><?php echo  $this->news_model->getcategorybreak_name('dept','id',$item['techCode'],'name'); ?> </td>
<td>Shift</td><td><?php if($item['shiftId']==1) echo "Morning"; else echo "Evening"; ?> </td>
</tr>

<tr>
<td>Board</td><td><?php echo  $this->news_model->getcategorybreak_name('board','id',$item['boardId'],'name'); ?> </td>
<td>Group</td><td><?php if($item['boardGroup']==1) echo "Science"; if($item['boardGroup']==2) echo "Arts";else echo "Commerce"; ?> </td>
</tr>

<tr>
<td>Passing Year</td><td><?php echo $item['boardPassingYear']; ?></td>
<td>GPA</td><td><?php echo $item['boardGpa']; ?></td>
</tr>

<tr>
<td>Roll</td><td><?php echo $item['hscRoll']; ?></td>
<td>Reg No</td><td><?php echo $item['hscRegNo']; ?></td>
</tr>


<tr>
<td>Name </td><td><?php echo $item['name']; ?></td>
<td>Fathers Name</td><td><?php echo $item['fatherName']; ?></td>
</tr>

<tr>
<td>Mother Name</td><td><?php echo $item['motherName']; ?></td>
<td>Guardian Name</td><td><?php echo $item['guardianName']; ?></td>
</tr>


<tr>
<td>Guardian Mobile</td><td><?php echo $item['guardianMobile']; ?></td>
<td>DOB</td><td><?php echo $item['dob']; ?></td>
</tr>

<tr>
<td>Gender</td><td><?php if($item['gender']==1) echo "Male"; else echo "Female"; ?> </td>
<td>Religion</td><td><?php if($item['religion']==1) echo "Islam"; if($item['religion']==2) echo "Hindu"; if($item['religion']==3) echo "Christian"; else echo "Buddhist"; ?> </td>
</tr>

<tr>
<td>Nationality</td><td><?php echo $item['nationality']; ?></td>
<td>Mobile</td><td><?php echo $item['mobile']; ?></td>
</tr>

<tr>
<td>Email</td><td><?php echo $item['email']; ?></td>
<td>Blood Group</td><td><?php echo  $this->news_model->getcategorybreak_name('blood_group','id',$item['bloodGroup'],'name'); ?> </td>
</tr>


<tr>
<td>Present Address</td><td><?php echo $item['presentAddress']; ?></td>
<td>Present District</td><td><?php echo  $this->news_model->getcategorybreak_name('districts','id',$item['prDistrict'],'name'); ?> </td>
</tr>


<tr>
<td>Present Thana</td><td><?php echo  $this->news_model->getcategorybreak_name('upazilas','id',$item['prThanaId'],'name'); ?> </td>
<td>Permanen Address</td><td><?php echo $item['permanentAddress']; ?></td>
</tr>

<tr>
<td>Permanen District</td><td><?php echo  $this->news_model->getcategorybreak_name('upazilas','id',$item['perDistrict'],'name'); ?> </td>
<td>Permanen Thana</td><td><?php echo  $this->news_model->getcategorybreak_name('upazilas','id',$item['perThanaId'],'name'); ?> </td>
</tr>

<tr>
<td>Date </td><td><?php echo $item['date']; ?></td>
<td></td><td> </td>
</tr>


<?php endforeach; ?>

</table>



</div> 


</div> 

