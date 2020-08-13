 <!--main content start-->
    <section id="main-content">
        <!-- page start-->
<div class="container">
<div class="row">
            <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading" style="background:#3EBD96;padding:10px;">
                       <span style="font-size:13px;font-weight:bold;color:white;font-family:sans-serif;"> ORDER LIST</span>
                       
                    </header>
         <div class="panel-body">
              <div class="adv-table">
			  
			  <div class="col-sm-12" style="margin:0;padding:0;overflow:auto">
                    <table class="table table-bordered table-hover" data-toggle="table" data-url="" data-cache="false" data-height="299">
                    <thead style="background:gray;color:white;font-family:sans-serif;font-weight:bold;">
                       <tr>
                		<th>Product Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
						<th>Total Price</th>

                        <th class="mobile_dt">Date</th>
					   	<th class="mobile_dt">Time</th>
					   <th>
					   <div class="img" style="display:none; position: absolute;
    left:50%;
    top: 50%;
    z-index: 1000;">
			<p id="percent"></p>
					<img src="<?php echo base_url(); ?>img/ajax.gif"/>
			
			
			</div>
			
			
			
			
			</th>
					
                    </tr>
                    </thead>
                    <tbody id="trr" >

<?php $total=0; $i=1; foreach ($all as $item): ?>

<tr class="gradeX" id="<?php echo $item['id']."tr" ?>">
                   
                        <td><?php echo $item['product_name']?></td>
						
						
            
                        <td><span id="<?php echo $item['id']."p" ?>"><?php echo $item['price']?></span></td>

                     
						
						
						<td>
										
	
										
										
	<div id="cmodify">							
										
	<button id="<?php echo $item['id']."q" ?>" type="submit" class="btn btn-default o-btn" name="submit"><?php echo $item['qun']?></button>
	
	<button type="submit" class="btn btn-default o-btn" data-id="<?php echo $item['id'] ?>" data-type="add">
	
	<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
	
	
	
	</button>

										
<button type="submit"  data-id="<?php echo $item['id'] ?>" data-type="minus" class="btn btn-default o-btn" name="submit">

<span class="glyphicon glyphicon-minus" aria-hidden="true"></span>




</button>								
										
										
									
		</div>								
										
										
						
						
						
						
						</td>
						
						
						                        <td><span id="<?php echo $item['id']."pp" ?>"><?php

						echo $item['price'] * $item['qun'];
						
						
$total=$total+($item['price'] * $item['qun']);						
						
						?></span></td>
						
						
						
						
                        <td class="mobile_dt"><?php echo$item['date']?></td>
                        <td class="mobile_dt"><?php echo$item['time']?></td>
                        <td>
						
						
						
						
<button onclick="process_drop(<?php echo $item['id']?>)" type="button" class="btn btn-default o-btn" aria-label="Left Align">
  <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
</button>
						
						
						
						</td>
            
                    </tr>
					
					
					
					
					
					

<?php endforeach; ?>


<tr>
<td colspan=3 style="font-family:sans-serif;text-align:right;font-weight:bold;font-size:13px;">Total Product Price </td>
		<td><span id="tp"><?php echo $total; ?></span></td>

							</tr>
			<tr>
	<td colspan=3 style="font-family:sans-serif;text-align:right;font-weight:bold;font-size:13px;">Delivery Fee </td>
		<td><span id="df">0</span></td>

		</tr>

	<tr>
								<td colspan=3 style="font-family:sans-serif;text-align:right;font-weight:bold;font-size:13px;">Vat (0%)</td>
								<td><span id="vat">0</span></td>

							</tr>
							<tr>
								<td colspan=3 style="font-family:sans-serif;text-align:right;font-weight:bold;font-size:13px;">Total</td>
								<td><span id="to"><?php echo $total;?></span></td>

							</tr>

<td style="text-align:center;" colspan=7>
	
</td>


</table>


</div>


                    </div>
                    </div>
					
					
					<form action="<?php echo base_url(); ?>mains/confirm/<?php echo $session_id; ?>/<?php echo $name; ?>" method="post">			
							<div class="row">
								<div class="col-sm-12">
									<div class="form-group">
									<label class="col-sm-12 control-label">You can create an account after placing your order.</label>
								</div>
								
									<div class="form-group">
									<label class="col-sm-12 control-label">
									<div class="row">
										<div class="col-sm-12">
												<?php

		$admin=$this->session->userdata('user');
												;
												if(empty($admin)){
													
													
													
												}
												else{
													?>
													
	<input type="checkbox" value="<?php echo $session_id; ?>" aria-label="...">Send to my address
													
													<?php
												}

												?>
										</div>
									
									
									</label>
									
								</div>
								
									<div class="form-group">
									<label class="col-sm-12 control-label">Name</label>
									<div class="col-sm-6">
										<input type="text" name="name" id="nam" class="form-control">
									</div>
								</div>
								
								<div class="form-group">
									<label class="col-sm-12 control-label">Email Address</label>
									<div class="col-sm-6">
										<input type="email" name="email" id="emai" class="form-control">
									</div>
								</div>
								
								<div class="form-group">
									<label class="col-sm-12 control-label">Mobile</label>
									<div class="col-sm-6">
										<input type="text" name="mobile" required="required" id="mobil" class="form-control" required>
									</div>
								</div>
								
								<div class="form-group">
									<label class="col-sm-12 control-label">More Address</label>
									<div class="col-sm-6">
										<textarea class="form-control" rows="6" name="address" id="addre" required></textarea>
									</div>
								</div>
								
								
								
								<div class="form-group">
									<label class="col-sm-12 control-label"></label>
									<div class="col-sm-6">
										<button type="submit" class="btn btn-primary o-btn" name="submit" value="Submit"><span class="glyphicon glyphicon-hand-right" aria-hidden="true"></span>        Submit</button>
									</div>
								</div>
								
								
								
								
								
								
								
								
							
					
					
					</div>
					
			</form>	
				
					
					
                </section>
            </div>
        </div>
		
</div>


        <!-- page end-->
    </section>
