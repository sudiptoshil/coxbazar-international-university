<style>
.adv-table table tr td {
    padding:5px;
	font-weight: bold;
	font-size:17px;
}
</style>

 <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
        <!-- page start-->

<div class="row">
            <div class="col-sm-12">
                <section class="panel">
                  
                    <div class="panel-body">
                    <div class="adv-table">
 
<script>
		(function (w, doc,co) {
			// http://stackoverflow.com/questions/901115/get-query-string-values-in-javascript
			var u = {},
				e,
				a = /\+/g,  // Regex for replacing addition symbol with a space
				r = /([^&=]+)=?([^&]*)/g,
				d = function (s) { return decodeURIComponent(s.replace(a, " ")); },
				q = w.location.search.substring(1),
				v = '2.0.3';

			while (e = r.exec(q)) {
				u[d(e[1])] = d(e[2]);
			}
			
			if (!!u.jquery) {
				v = u.jquery;
			}	

			
		</script>
		  <script src="<?php echo base_url(); ?>jquery.min.js"></script>
		<!--script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script-->
		<script src="<?php echo base_url(); ?>jquery.quicksearch.js"></script>
		<script>
			$(function () {
				/*
				Example 1
				*/
				$('input#id_search').quicksearch('table#table_example tbody tr');
				
				
			});
		</script>


		<form action="#" style="float:left">
			<fieldset>
				<input size="10" type="text" name="search" value="" id="id_search" placeholder="Search" autofocus />
			</fieldset>
		</form>
			

<table  class="display table table-bordered table-striped" id="table_example">
<thead>
<tr>
<th>SL</th><th>Name</th><th>QNTY</th><th>P STOCK</th>
</tr>
</thead>			
					<form method="post" action="<?php site_url('user/store_out');?>">
				<tr>	</td>
					<div class="form-group">
                       <label class="col-sm-3 control-label">DEALER</label>
                        <div class="col-sm-6">
                           <select class="bol_type" name="customer">
<?php foreach($customer as $product1) { 
?>
  <option value="<?php echo $product1['id']; ?>"><?php echo $product1['name']; ?></option>
<?php  } ?>
</select>
                        </div>
                    

	 </div>	</td>	</tr>
					
					<?php  $i=0; foreach ($sub_category as $item): $j=1;?>
					<tr><td colspan=4 style="text-align:center;background-color:#D0D0D6;"><?=$item['sub']?></td></tr>
					
					
					<?php $product = $this->news_model->common('product','category',$item['id']) ;	
					
					foreach ($product as $product_item): 					?>
					
			
				
      
					
					<tr>
						<td><?=$j?></td><td><?=$product_item['name']?></td><td>
						
						
						
					<input type="hidden" name="id[]" value="<?php echo $product_item['id']; ?>" />	 
<!-- The Name form field -->
  
    <input type="text" name="quantity[]" id="quantity" size="3" value=""/>  
	 <input type="hidden" name="code[]"  value="<?=$product_item['code']?>"/> 
	 <input type="hidden" name="price[]"  value="<?=$product_item['price']?>"/>
	 
	  <input type="hidden" name="count" value="<?php echo $i; ?>" />
	 
<!-- The Submit button -->
<td><?=$product_item['present_stock']?></td>

								</td>
								
									</tr>
							
									<?php $i++; $j++;  endforeach; endforeach; ?>
									
									

	
	
									
	<div class="form-group" style="text-align:center">	
<button type="submit" class="btn btn-info">Submit</button></div>						
									
									</form>
										</table>
										
					<br/>	<br/>	<br/>	<br/>					
										
										
										
                    </div>
                    </div>
                </section>
            </div>
        </div>
        <!-- page end-->
        </section>
    </section>
