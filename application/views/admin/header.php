<!DOCTYPE html>
<html>

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url();?>assets-admin/img/favicon.png">
    <title>Admin</title>
    <link href="https://fonts.googleapis.com/css?family=Fira+Sans:400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets-admin/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets-admin/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets-admin/css/fullcalendar.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets-admin/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets-admin/css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets-admin/css/bootstrap-select.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets-admin/css/jquery-ui.min.css">
    <!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets-admin/css/bootstrap-datetimepicker.min.css"> -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets-admin/css/style.css">
    <!--[if lt IE 9]>
		<script src="<?php echo base_url();?>assets-admin/js/html5shiv.min.js"></script>
		<script src="<?php echo base_url();?>assets-admin/js/respond.min.js"></script>

	<![endif]-->
</head>
<script>
  var base_url = '<?php echo base_url(); ?>';
</script>
<script type="text/javascript" src="<?php echo base_url();?>assets-admin/js/jquery-3.2.1.min.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/12.4.0/classic/ckeditor.js"></script>
<?php
$user_type = $this->common->user_session_data(2);
$user_id = $this->common->user_session_data(3);
?>
<body>
    <div class="main-wrapper">
        <div class="header">
            <div class="header-left">
                <a href="<?php echo base_url();?>admin" class="logo">
                    <img src="<?php echo base_url();?>assets-admin/img/logo.png" width="40" height="40" alt="">
                </a>
            </div>
            <div class="page-title-box pull-left">
                <h3><?php if($user_type == $this->common->get_user_type('teacher')){echo $this->common->getSpecificField('teachers','id',$user_id,'name');}else{echo 'Admin';}?></h3>
            </div>
            <a id="mobile_btn" class="mobile_btn pull-left" href="#sidebar"><i class="fa fa-bars" aria-hidden="true"></i></a>
            <ul class="nav navbar-nav navbar-right user-menu pull-right">
                <li class="dropdown">
                    <a href="<?php echo base_url();?>admin/profile" class="dropdown-toggle user-link" data-toggle="dropdown" title="Admin">
                        <span class="user-img"><img class="img-circle" src="<?php echo base_url();?>assets-admin/img/user.jpg" width="40" alt="Admin">
							<span class="status online"></span></span>
                        <span>
                            <?php if(!empty($this->common->getSpecificField('password','id',$this->common->user_session_data(1),'username'))){
                                echo $this->common->getSpecificField('password','id',$this->common->user_session_data(1),'username');
                                }else{
                                echo $this->common->getSpecificField('password','id',$this->common->user_session_data(1),'email');
                                }?>

                        </span>
                        <i class="caret"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo base_url();?>admin/user_profile/<?=$this->common->anyName('password','id',$this->common->user_session_data(1),'user_id')?>">Profile</a></li>
                        <li><a href="<?php echo base_url();?>login/logout">Logout</a></li>
                    </ul>
                </li>
            </ul>
            <div class="dropdown mobile-user-menu pull-right">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                <ul class="dropdown-menu pull-right">
                    <li><a href="<?php echo base_url();?>admin/login">Logout</a></li>
                </ul>
            </div>
        </div>
        <div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
                <div id="sidebar-menu" class="sidebar-menu">
                    <?php
                    if($user_type == $this->common->get_user_type('admin')){
                    ?>
                    <ul>
                        <li>
                            <a href="<?php echo base_url();?>admin"><i class="fa fa-dashboard"></i> Dashboard</a>
                        </li>
                        <li class="submenu">
                            <a href="#"><i class="fa fa-users" aria-hidden="true"></i> <span> Admission</span> <span class="menu-arrow"></span></a>
                            <ul class="list-unstyled" style="display: none;">
                                <li><a href="<?php echo base_url();?>admin/student">All Admission Request</a></li>
<!--                                <li><a href="--><?php //echo base_url();?><!--admin/add_student">Add New Student</a></li>-->
                                <!--<li><a href="<?php echo base_url();?>admin/student_join_request">Student Join Request</a></li>-->
                            </ul>
                        </li>
                    </ul>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
