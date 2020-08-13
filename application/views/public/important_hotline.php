<div class="imp-hotline-area wrapper-area">
    <div class="section-top-banner">
		<!-- <img src="images/campus-img.jpg" alt="TECN"> -->
		<div class="container">
			<div class="section-top-banner-links">
				<h1>Important Number</h1>
				<nav aria-label="breadcrumb">
				  <ol class="breadcrumb">
				    <li class="breadcrumb-item"><a href="<?php echo base_url();?>">Home</a></li>
				    <li class="breadcrumb-item active" aria-current="page">Important Number</li>
				  </ol>
				</nav>
			</div>
		</div>
	</div>
	<div class="wrapper-area-body">
		<div class="container"> 
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		   			<div class="wrapper-area-body-right">
                        <!--google language-->
                        <!--<div id="google_translate_element"></div>

                        <script type="text/javascript">
                            function googleTranslateElementInit() {
                                new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
                            }
                        </script>

                        <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>-->
                        <!--google language-->
		   				<div class="row">
		   				    <?php
		   				    foreach($all_hotline as $a){
		   				    ?>
		   				    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
		   				        <div class="card mb-3">
	   				                <div class="card-header text-center text-white main-bg">
                                        <?=$a['title'];?>
                                    </div>
                                    <div class="card-body text-center">
                                        <?=$a['phone'];?>
                                    </div>
                                </div>
		   				    </div>
		   				    <?php
		   				    }
		   				    ?>
		   				</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>