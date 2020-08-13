<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url();?>assets-admin/img/favicon.png">
    <title>CBIU | Login</title>
    <link href="https://fonts.googleapis.com/css?family=Fira+Sans:400,500,600,700" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets-admin/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets-admin/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets-admin/css/style.css">
    <!--[if lt IE 9]>
		<script src="<?php echo base_url();?>assets-admin/js/html5shiv.min.js"></script>
		<script src="<?php echo base_url();?>assets-admin/js/respond.min.js"></script>
	<![endif]-->
</head>

<body>
    <div class="main-wrapper">
        <div class="account-page">
            <div class="container">
                <h3 class="account-title">Login</h3>
                <div class="account-box">
                    <div class="account-wrapper">
                        <div class="account-logo">
                            <a href="<?php echo base_url();?>login"><img src="<?php echo base_url();?>assets-admin/img/logo2.png" alt="Preadmin"></a>
                        </div>
                        <form action="<?php echo base_url();?>login/auth" method="post">
                            <div class="form-group form-focus">
                                <label class="control-label">Username or Email</label>
                                <input name="username_email" class="form-control floating" type="text" required autofocus>
                            </div>
                            <div class="form-group form-focus">
                                <label class="control-label">Password</label>
                                <input name="password" class="form-control floating" type="password" required>
                            </div>
                            <p ><?php echo $this->session->flashdata('msg');?></p>
                            <div class="form-group text-center">
                                <button class="btn btn-primary btn-block account-btn" type="submit">Login</button>
                            </div>
                            <div class="text-center">
                                <a href="<?php echo base_url();?>login/forgot_password">Forgot your password?</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="<?php echo base_url();?>assets-admin/js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets-admin/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets-admin/js/app.js"></script>
</body>

</html>