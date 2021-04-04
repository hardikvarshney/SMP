<?php
    include("../db_connection.php");
    session_start();
    if(!isset($_SESSION['is_login']))
    {
        if(isset($_POST['login']))
        {
            $email=mysqli_real_escape_string($con, trim($_REQUEST['email']));
            $password=mysqli_real_escape_string($con,trim($_REQUEST['password']));
            $sql="Select mail, password from requestor_login WHERE mail='$email' AND password='$password'";
            $result=$con->query($sql);
            if($result->num_rows==1)
            {
                $_SESSION['is_login']=true;
                $_SESSION['mail']=$email;
                echo "<script>location.href='req_profile.php'</script>";
                exit;
            }
            else
            {
                $msg='<div class="alert alert-warning text-danger text-center mt-2" role="alert">***Invalid Credentials***</div>';
            }
            
        }   

    }
    else
    {
        echo "<script>location.href='req_profile.php';</script>";
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Bootstrav CSS-->
    <link rel="stylesheet" href="../CSS/bootstrap.min.css">
    <!--Font Awesome CSS-->
    <link rel="stylesheet" href="../CSS/all.min.css">
    <!--Google Font-->
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@700&display=swap" rel="stylesheet">
    <!--Custom CSS-->
    <link rel="stylesheet" href="../CSS/custom.css">
    <title>Requestor Login</title>
</head>
<body>
<div class="row mt-4 mb-4">
<div class="col-md-6 offset-md-3">
<h2 class="text-center mt-4 "><i class="fas fa-stethoscope mr-5"></i>Online Service Management System</h2>
<p class="text-center mt-4  shadow-lg p-4" style="font-size:20px; font-weight:bold"><i class="fas  fa-user-md mr-5"></i>User Login</p>
<form action="" method="POST" class="mt-3 shadow-lg p-4">
  <div class="form-group">
    <i class="fas fa-user"></i><label for="Email" class="font-weight-bold pl-2">Email address</label>
    <input type="email" class="form-control"  name="email" placeholder="E-Mail">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>

  <div class="form-group">
    <i class="fas fa-key"></i><label for="Password" class="font-weight-bold pl-2">Password</label>
    <input type="password" name="password" class="form-control" placeholder="Password">
  </div>

  <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>

  <button type="submit" name="login" class="btn btn-outline-danger btn-block" style="font-weight:bold">Log In</button><br>
  <?php if(isset($msg)){ echo "$msg"; } ?>
</form>
<div  class="text-center mt-2">
    <a href="../index.php" class="btn btn-info">Back to Home Page</a>
</div>
</div>
</div>
<!--Javascript-->
    <script src="../JS/jquery.min.js"></script>
    <script src="../JS/popper.min.js"></script>
    <script src="../JS/bootstrap.min.js"></script>
    <script src="../JS/all.min.js"></script>
</body>
</html>



<?php
    include("../db_connection.php");

?>