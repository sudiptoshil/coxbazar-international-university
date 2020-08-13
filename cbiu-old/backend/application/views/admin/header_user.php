<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="ThemeBucket">
    <link rel="shortcut icon" href="images/favicon.png">

    <title>Gadgetoy</title>

    <!--Core CSS -->
    <link href="<?php echo base_url(); ?>bs3/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>css/bootstrap-reset.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>css/jquery-ui.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>css/test.css" rel="stylesheet">

    <link href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.css" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url(); ?>css/style.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>css/style-responsive.css" rel="stylesheet" />

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="js/ie8/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<section id="container">
<!--header start-->
<header class="header fixed-top clearfix">
<!--logo start-->
<div class="brand">

    <a href="<?php echo base_url(); ?>admin" class="logo">
        <img src="<?php echo base_url(); ?>images/logo.png" alt="" style="height:50px">
    </a>
    <div class="sidebar-toggle-box">
        <div class="fa fa-bars"></div>
    </div>
</div>
<!--logo end-->

<div class="nav notify-row" id="top_menu">
   

        <p style="color: teal;
font-family: cursive;
font-size: 25px;
font-weight: bold;
text-align: center;">
<strong>
<?php

				$wire=$this->session->userdata('wire');
				$ad=$this->session->userdata('admin');
				
				$ch=$this->news_model->anyName('wire','id',$wire,'name');

				if(empty($ch))
				{
					echo "Admin";
				}
				else{
					
					echo $ch;
					
					
				}

	?>
  </strong>        </p>
		
		

</div>

<div class="top-nav clearfix">
    <!--search & user info start-->
    <ul class="nav pull-right top-menu">
        <li>
            <input type="text" class="form-control search" placeholder=" Search">
        </li>
        <!-- user login dropdown start-->
        <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
               
                <span class="username"><?php
				$this->db->where("id", $this->session->userdata('admin')); 
$result = $this->db->get('login');
$row = $result->row();
echo  $row->user;
?></span>
                <b class="caret"></b>
            </a>
            <ul class="dropdown-menu extended logout">
                <li><a href="<?php echo base_url(); ?>admin/password_change"><i class="fa fa-cog"></i> Password change</a></li>
                <li><a href="<?php echo base_url(); ?>admin/logout"><i class="fa fa-key"></i> Log Out</a></li>
            </ul>
        </li>
        <!-- user login dropdown end -->
        <li>
            <div class="toggle-right-box">
                <div class="fa fa-bars"></div>
            </div>
        </li>
    </ul>
	
    <!--search & user info end-->
</div>
</header>
<!--header end-->


<!--sidebar start-->
<aside>
     <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->            <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">          		   
   <?php foreach($all2 as $val): ?>
		   
		   
		   <li class="sub-menu">
                 <a href="<?php echo $val['links']?>">
                    <i class="fa fa-laptop"></i>
                    <span><?php echo $val['name'] ?></span>
                </a>
                
	<?php $data['sub']=$this->news_model->getSubMenuData($val['ids'],$ad); ?>
				
	<?php foreach($data['sub'] as $s): ?>

		<?php

	$name=$this->news_model->getPname('sub_menu','id',$s['sub'],'name');
	$l=$this->news_model->getPname('sub_menu','id',$s['sub'],'links');

		?>
		 <ul class="sub">
		 
	<li><a href="<?php echo base_url(); ?><?php echo $l; ?>"><?php echo $name; ?></a></li>	 
		  </ul>

	<?php endforeach; ?>
				
				
            </li>
		   
		   
		   
			<?php endforeach; ?>
           
		   
			 	
			
           
        </ul></div>        
<!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->




   
	