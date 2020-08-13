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
    <script type="text/javascript" src="../asset/bootstrap.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="../asset/title/ticker.css">
    <script src="../asset/title/ticker.js"></script>



    <link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <style>
        .notices {
            width: 50%;
            margin: 0 auto;
            text-align: justify;
            text-justify: inter-word;
        }

        .all-notice,
        .li {
            font-size: 20px;
            text-align: center;
            color: #202040;
            top: 0;
            bottom: 0;
        }

        @media (max-width: 768px) {
            .notices {
            width: 100%;
            margin: 0 auto;
            text-align: justify;
            text-justify: inter-word;
            padding: 20px;
        }
        }
    </style>
</head>

<body>
    
    
    <?php include_once("header.html"); ?>
    
    
    <div style="text-align:center;min-height: 200px;margin-top: 19%;font-size: 35px;    line-height: 2;"> 
    
    <?php
    
    $servername = "localhost";
$username = "p9epkpjrusys";
$password = "Shamima@2001";
$dbname = "cursor";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";
    
    
    $stdinfo = $_POST['StudentInfo'];
    
   // print_r($stdinfo);
   
   $date = date('Y-m-d H:i:s');
   
  
    $date = date('Y-m-d H:i:s',strtotime('+6 hour',strtotime($date)));
    
  // Attempt insert query execution
$sql = "INSERT INTO admission  VALUES ('','".$stdinfo['techCode']."', '".$stdinfo['shiftId']."', '".$stdinfo['boardId']."', '".$stdinfo['boardGroup']."', '".$stdinfo['boardPassingYear']."', '".$stdinfo['boardGpa']."', '".$stdinfo['hscRoll']."', '".$stdinfo['hscRegNo']."', '".$stdinfo['name']."', '".$stdinfo['fatherName']."', '".$stdinfo['motherName']."', '".$stdinfo['guardianName']."', '".$stdinfo['guardianMobile']."', '".$stdinfo['dob']."', '".$stdinfo['gender']."', '".$stdinfo['religion']."', '".$stdinfo['nationality']."', '".$stdinfo['mobile']."', '".$stdinfo['email']."', '".$stdinfo['bloodGroup']."', '".$stdinfo['presentAddress']."', '".$stdinfo['prDistrict']."', '".$stdinfo['prThanaId']."', '".$stdinfo['permanentAddress']."', '".$stdinfo['perDistrict']."', '".$stdinfo['perThanaId']."','".$date."')";
if(mysqli_query($conn, $sql)){
    echo "Admission applied successfully.";
    
    $last_id = $conn->insert_id;
    
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}
 
 
 // File upload
 
 
 
 $target_dir = "attach/";

 $file_name = $_FILES['photo_1']['name'];
  $file_tmp = $_FILES['photo_1']['tmp_name'];
 
 move_uploaded_file($file_tmp,"attach/".$last_id.".".jpg);
 
 
  $file_name = $_FILES['hsc_acad_transfer']['name'];
  $file_tmp = $_FILES['hsc_acad_transfer']['tmp_name'];
 
 move_uploaded_file($file_tmp,"attach/".$last_id."_hsc.".jpg);
 
// if(isset($_FILES['image'])){
/*
 $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size = $_FILES['image']['size'];
      $file_tmp = $_FILES['image']['tmp_name'];
      $file_type = $_FILES['image']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
      
      $extensions= array("jpeg","jpg","png");
      
      if(in_array($file_ext,$extensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      
      if($file_size > 2097152) {
         $errors[]='File size must be excately 2 MB';
      }
      
      if(empty($errors)==true) {
         move_uploaded_file($file_tmp,"images/".$file_name);
         echo "Success";
      }else{
         print_r($errors);
      }*/

         
       
   
   //}
 
 
 
 
// Close connection
mysqli_close($conn);  
    
    ?>
    </div>
    
    
    <select name="name" id="name">
   <option value="a">a</option>
   <option value="b">b</option>
</select>

<script type="text/javascript">
  document.getElementById('name').value = "<?php echo $name;?>";
</script>

    
    
    
     <?php include_once("footer.html"); ?>

</body>

</html>