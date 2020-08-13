					<div class="col-md-3">
						<div class="menu_header">
							<h2>Browse By <b>Category</b></h2>
						</div>

						<div class='menu'>
						<ul>
						
<?php $catagory["cat"]=$this->news_model->getCetagory('cetagory'); $i=1; foreach ($catagory["cat"] as $item): ?>
							 
							 
							 <li class='active sub'><a href='#'><?php echo $item['name']?></a>
								

                                            <?php 

                           $data['sub']=$this->news_model->getSubCetagory($item['id']);

                                            ?>

                                              <?php $i=1; foreach ($data['sub'] as $it): ?>

                                                       
													<ul>
<li><a href="<?php echo base_url(); ?>main/menu/category/<?php echo $item['id']?>/<?php echo $it['id']?>"><?php echo $it['name']?></a></li>
													</ul>

                                                 <?php endforeach; ?>


                                    <?php endforeach; ?>
									
									 </li>
									 
									 <li class='last'>
							<a href="<?php echo base_url(); ?>main/contack/contact">Contact</a>
							</li>

						</ul>
						</div>
					</div>