<?php
    define('title','Technician');
    define('PAGE','technician');
    include('header.php');
    include('../db_connection.php');
    session_start();
    if($_SESSION['is_adminlogin'])
    {
       $rEmail=$_SESSION['mail'];
    }
    else
    {
        echo "<script>location.href='admin_login.php'</script>";
    }   
?>
<?php
        if(isset($_POST['insert']))
        {
            if(($_REQUEST['tName']=="") || ($_REQUEST['tEmail']=="") || ($_REQUEST['tCity']=="") || ($_REQUEST['tMobile']==""))
            {
                $msg='<div class="alert alert-warning text-danger text-center mt-2" role="alert">***All Field are Require***</div>';
            }
            else
            {
                
                $sqli="Select mail from technician_login where mail = '".$_REQUEST['tEmail']."'";
                $result=$con->query($sqli);
                if($result->num_rows==1)
                {
                    $msg='<div class="alert alert-warning text-danger text-center mt-2" role="alert">E-Mail already Registered</div>';
                }
                else
                {
                    $name=$_REQUEST['tName'];
                    $email=$_REQUEST['tEmail'];
                    $city=$_REQUEST['tCity'];
                    $mobile=$_REQUEST['tMobile'];

                    $sql="Insert into technician_login (name, city, mobile, mail) values ('$name', '$city', '$mobile', '$email')";
                    if($con->query($sql)===TRUE);
                    {
                        $msg='<div class="alert alert-success text-info text-center mt-2" role="alert">Registration Successful</div>';
                    
                    }
   
                }
            
            }
        }
?>
<div class="col-md-6 mt-5">
<h3 class="shadow text-center  p-3">Insert New Technician</h3>
    <form action="" method="post" class="shadow-lg p-4">
        <div class="form-group">
            <i class="fas fa-user"></i><label for="name" class="font-weight-bold pl-2">Name</label>
            <input type="text" class="form-control" placeholder="Name" name="tName" >
        </div>
        <div class="form-group">
            <i class="fas fa-user"></i><label for="email" class="font-weight-bold pl-2">E-Mail</label>
            <input type="email" class="form-control" placeholder="username@example.com" aria-describedby="emailHelp" name="tEmail" >
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <i class="fas fa-key"></i><label for="" class="font-weight-bold pl-2">City</label>
            <input type="text" class="form-control" placeholder="City" name="tCity" >
        </div>
        <div class="form-group">
            <i class="fas fa-key"></i><label for="" class="font-weight-bold pl-2">Mobile</label>
            <input type="text" class="form-control" placeholder="Mobile No" name="tMobile" >
        </div>
        <button type="submit" class="btn btn-danger btn-lg  shadow-sm font-weight-bold" name="insert">Insert</button>
        <button type="submit" class="btn btn-secondary btn-lg  shadow-sm font-weight-bold ml-3" name="back">Back</button>
    </form>
    <?php if(isset($msg)) { echo $msg ; }?>
</div>

<?php
    if(isset($_REQUEST['back']))
    { 
        echo "<script>location.href='technician.php'</script>";

    }
?>

<?php

    include('../Requester/footer.php');
?>