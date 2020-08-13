<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
    <title>Admin</title>
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
                <h3 class="account-title">Forgot Password</h3>
                <div class="account-box">
                    <div class="account-wrapper">
                        <div class="account-logo">
                            <a href="index.php"><img src="<?php echo base_url();?>assets-admin/img/logo2.png" alt="Preadmin"></a>
                        </div>
                        <form>
                            <div class="form-group form-focus">
                                <label class="control-label">Username or Email</label>
                                <input class="form-control floating" type="text">
                            </div>
                            <div class="form-group text-center">
                                <button class="btn btn-primary btn-block account-btn" type="submit">Reset Password</button>
                            </div>
                            <div class="text-center">
                                <a href="<?php echo base_url();?>login">Back to Login</a>
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