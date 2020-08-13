<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cox's Bazar International University</title>

    <link rel="icon" type="image/png" href="../asset/image/cbiu.png" />
    <link rel="stylesheet" href="../asset/bootstrap.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="../asset/jquery.fancybox.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.css">

    <link rel="stylesheet" href="../asset/style.css">
    <link rel="stylesheet" href="../asset/utils.css">

    <script type="text/javascript" src="../asset/jquery.fancybox.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.js"></script>
    <script src="../asset/jquery-3.4.1.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="../asset/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script type="text/javascript" src="asset/bootstrap.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="../asset/title/ticker.css">
    <script src="../asset/title/ticker.js"></script>

    <link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
   <style>
   
        .all-notice,.li{ font-size: 20px;text-align:center;color:#202040;} 
        .modal-body{
        height: 300px;
   }
   label{
       margin-bottom: 10px;
       color: #202040;
   }
   input{height: 30px;}
   .form-control{height: 40px; }
   button{height: 40px;margin-top: 20px;}
   .modal-body{
       background-color: #E1F4F3;
   }
   .button{
    font-size : 20px;background-color: #202040;color:#E1F4F3;
   }
   </style>
</head>
<body>
<?php include_once("../inc/header.html"); ?>
<div class="all-notice">
        
                <ul>
                    <li>Admin Login</li>
                </ul>
           
    </div>

    <div id="login-overlay" class="modal-dialog">
      <div class="modal-content">

          <div class="modal-body">
              <div class="row">
                  <div class="col-md-12">
                      <div class="well">
                          <form id="loginForm" method="POST" action="notice_mgt.php"  style="padding:40px">
                              <div class="form-group">
                                  <label for="username" class="control-label">Username</label>
                                  <input type="text" class="form-control" id="username" name="username" value="" required="" title="Please enter you username" >
                                  <span class="help-block"></span>
                              </div>
                              <div class="form-group">
                                  <label for="password" class="control-label">Password</label>
                                  <input type="password" class="form-control" id="password" name="password" value="" required="" title="Please enter your password">
                                  <span class="help-block"></span>
                              </div>
                            
                              <a href="notice_mgt.php" ><button type="submit" value="Login"  class="form-control button">Login</button></a>
                          </form>
                      </div>
                  </div>
                  
              </div>
          </div>
      </div>
  </div>
  <?php include_once("../inc/footer.html"); ?>
</body>
</html>