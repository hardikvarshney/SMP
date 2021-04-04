<?php
define('title', 'Requestor Profile');
define('PAGE', 'req_profile');
    include("header.php");
    include("../db_connection.php");
    session_start();
    if($_SESSION['is_login'])
    {
       $rEmail=$_SESSION['mail'];
    }
    else
    {
        echo "<script>location.href='req_login.php'</script>";
    }
    $sql="Select  name, mail from requestor_login where mail='$rEmail'";
    $result=$con->query($sql);
    if($result->num_rows==1)
    {
        $row=$result->fetch_assoc();
        $rName=$row['name'];       
    }
    //Update Query
    if(isset($_REQUEST['update']))
    {
        if($_REQUEST['rName']=="")
        {
            $msg='<div class="alert alert-warning text-danger text-center mt-2" role="alert">Name field should not be empty</div>';
        }
        else
        {
            $rName=$_REQUEST['rName'];
            $sql="Update requestor_login set name='$rName' where mail='$rEmail'";
            $run=$con->query($sql);
            if($run==TRUE)
            {
                $msg='<div class="alert alert-success text-success text-center mt-2" role="alert">Profile Updated Successfully</div>';
            }
            else
            {
                $msg='<div class="alert alert-warning text-danger text-center mt-2" role="alert">Profile Updated Successfully</div>';
            }
        }
    }
    
?>



        <!--Start Profile Area-->
        <div class="col-sm-6 mt-5">
            <form action="" method="POST" class="mx-5">
                <div class="form-group">
                    <label for="remail" class="font-weight-bold pl-2">E-Mail</label>
                        <input type="email" name="remail" id="remail" readonly class="form-control" value="<?php echo $_SESSION['mail']; ?>">
                </div>
                <div class="form-group">
                    <label for="rname" class="font-weight-bold pl-2">Name</label>
                        <input type="text" name="rName" id="rname" class="form-control " value="<?php echo $rName; ?>">
                </div>
                <button type="submit" class="btn btn-danger" name="update">Update</button><br>
                <?php if(isset($msg)){echo $msg;} ?>            
            </form>
        </div>
        <!--End Profile Area-->
  
<?php
    include("footer.php");
?>