
<div class="report-block">


<?php echo form_open_multipart('admin/category_all') ?>

<input onclick="return confirm('Are you sure want to update');" type="submit" name="submit" value="Update">

									
<?php
$i=0;
 foreach ($category as $item): ?>
<input type="hidden" name="id[]" value="<?php echo $item['id']; ?>" />		
<div class="uneditable">
<input name="name[]" value="<?php echo $item['name']; ?>" /> <a href="<?php echo base_url(); ?>admin/delete/category/id/<?php echo $item['id']; ?>/category_all" onclick="return confirm('Are you sure want to delete');">
<span style="color:red;">X</span>
</a>




</div>



 <?php
$i++;
 endforeach; 
 ?>
 <input type="hidden" name="count" value="<?php echo $i; ?>" />
	
</form>

</br></br></br>
<?php

 foreach ($category as $item):

$dsub_category = $this->news_model->common('sub_category','root',$item['id']);
?>
<div  style="float:right;width:200px">
<table border=1 cellpadding="10" cellspacing="10"><tr><td width="250px"><div  style="color:green;font-weight:700">
<?php echo $item['name']; ?></div></td></tr>
<?php
foreach ($dsub_category as $data):
 ?>
 <tr><td><?php echo $data['sub']; ?>
<a href="<?php echo base_url(); ?>admin/sub_cat_edit/<?php echo $data['id']; ?>"><span style="color:red;float:right">Edit</span>
</a>
</td></tr>
 <?php
 endforeach; 
 ?>
 </table>
 </div>
  <?php
 endforeach; 
 ?>



</div>


            </div>
			
			
			
			