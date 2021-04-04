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
<div class="col-md-6 mt-5 mx-3 jumbotron">
<h3 class="text-center">Update Requester Details</h3>
<?php
    if(isset($_REQUEST['edit']))
    {
    $sql="select * from requestor_login where id={$_REQUEST['id']}";
    $result=$con->query($sql);
    $row=$result->fetch_assoc();
?>
    <form action="" method="POST">
        <div class="form-group">
            <i class="fas fa-key"></i><label for="" class="font-weight-bold pl-2">Requestor Id</label>
            <input type="text" class="form-control" name="rId" value='<?php echo $row['id']; ?>' readonly>
        </div>
        <div class="form-group">
            <i class="fas fa-user"></i><label for="name" class="font-weight-bold pl-2">Name</label>
            <input type="text" class="form-control" name="rName" value='<?php echo $row['name']; ?>' required>
        </div>
        <div class="form-group">
            <i class="fas fa-user"></i><label for="email" class="font-weight-bold pl-2">E-Mail</label>
            <input type="email" class="form-control" aria-describedby="emailHelp" name="rEmail" value='<?php echo $row['mail']; ?>' required>
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>        
        <button type="submit" class="btn btn-danger" name="update">Update</button>
        <button type="submit" class="btn btn-secondary" name="back">Back</button>
    </form>
    
    <?php }
    if(isset($_REQUEST['update']))
    {
        $rname=$_REQUEST['rName'];
        $remail=$_REQUEST['rEmail'];
        $rid=$_REQUEST['rId'];
        $sql="update requestor_login set name='$rname', mail='$remail' where id='$rid'";
        if($result=$con->query($sql) == TRUE)
        {
            $msg='<div class="alert alert-success text-info text-center mt-2" role="alert">Details Updated Successfully</div>';
        }
        else
        {
            $msg='<div class="alert alert-warning text-danger text-center mt-2" role="alert">Cannot Updated</div>';
        }
    }
    
    if(isset($_REQUEST['back']))
    { 
        echo "<script>location.href='technician.php'</script>";

    }

    if(isset($msg)){ echo $msg ; }
?>

</div>





<?php

    include('../Requester/footer.php');
?>