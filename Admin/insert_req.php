<?php
    define('title','Requestor');
    define('PAGE','requestor');
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
            if(($_REQUEST['rName']=="") || ($_REQUEST['rEmail']=="") || ($_REQUEST['rPassword']==""))
            {
                $msg='<div class="alert alert-warning text-danger text-center mt-2" role="alert">***All Field are Require***</div>';
            }
            else
            {
                
                $sqli="Select mail from requestor_login where mail = '".$_REQUEST['rEmail']."'";
                $result=$con->query($sqli);
                if($result->num_rows==1)
                {
                    $msg='<div class="alert alert-warning text-danger text-center mt-2" role="alert">E-Mail already Registered</div>';
                }
                else
                {
                    $name=$_REQUEST['rName'];
                    $email=$_REQUEST['rEmail'];
                    $password=$_REQUEST['rPassword'];
                    $sql="Insert into requestor_login (name, mail, password) values ('$name', '$email', '$password')";
                    if($con->query($sql)===TRUE);
                    {
                        $msg='<div class="alert alert-success text-info text-center mt-2" role="alert">Registration Successful</div>';
                    
                    }
   
                }
            
            }
        }
?>
<div class="col-md-6 mt-5">
<h3 class="shadow text-center  p-3">Insert New Requestor</h3>
    <form action="" method="post" class="shadow-lg p-4">
        <div class="form-group">
            <i class="fas fa-user"></i><label for="name" class="font-weight-bold pl-2">Name</label>
            <input type="text" class="form-control" placeholder="Name" name="rName" >
        </div>
        <div class="form-group">
            <i class="fas fa-user"></i><label for="email" class="font-weight-bold pl-2">E-Mail</label>
            <input type="email" class="form-control" placeholder="username@example.com" aria-describedby="emailHelp" name="rEmail" >
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <i class="fas fa-key"></i><label for="" class="font-weight-bold pl-2">Password</label>
            <input type="password" class="form-control" placeholder="Password" name="rPassword" >
        </div>
        <button type="submit" class="btn btn-danger btn-lg  shadow-sm font-weight-bold" name="insert">Insert</button>
        <button type="submit" class="btn btn-secondary btn-lg  shadow-sm font-weight-bold ml-3" name="back">Back</button>
    </form>
    <?php if(isset($msg)) { echo $msg ; }?>
</div>
<?php
    if(isset($_REQUEST['back']))
    { 
        echo "<script>location.href='requestor.php'</script>";

    }
?>


<?php

    include('../Requester/footer.php');
?>