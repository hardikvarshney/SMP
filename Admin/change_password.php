<?php
    define('title', 'Change Password');
    define('PAGE', 'change_password');
    include("header.php");
    include("../db_connection.php");
    session_start();
    if($_SESSION['is_adminlogin'])
    {
       $rEmail=$_SESSION['mail'];
    }
    else
    {
        echo "<script>location.href='admin_login.php'</script>";
    }
    if(isset($_REQUEST['change']))
    {
        if($_REQUEST['newPassword']=="")
        {
            $msg='<div class="alert alert-warning text-danger text-center mt-2" role="alert">***All Field are Require***</div>';
        }
        else
        {
            $pass=$_REQUEST['newPassword'];
            $sql="Update admin_login set password='$pass' where mail='$rEmail'";
            $result=$con->query($sql);
            if($result==TRUE)
            {
                $msg='<div class="alert alert-success text-primary text-center mt-2" role="alert">Password Successfully Changed</div>';
            }
            else
            {
                echo "Something went Wrong";
            }
        }
    }
?>

<div class="col-sm-6  mt-5">
    <form action="" method="POST" class="mx-5">
        <div class="form-group">
            <label for="emailId" class="font-weight-bold pl-2">E-Mail Id</label>
            <input type="text" name="emailId" class="form-control" id="emailId" readonly value="<?php echo "$rEmail"; ?>">
        </div>
        <div class="form-group">
            <label for="newPassword" class="font-weight-bold pl-2">Enter New Password</label>
            <input type="text" name="newPassword" class="form-control" id="newPassword" placeholder="Password">
        </div>
        <button type="submit" class="btn btn-danger" name="change">Change</button>
        <?php if(isset($msg)){ echo "$msg"; } ?>
    </form>
    

</div>





<?php
include("../Requester/footer.php");
?>


