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

<div class="col-md-6 mt-5 mx-3 jumbotron">
<h3 class="text-center">Update Technician Details</h3>
<?php
    if(isset($_REQUEST['edit']))
    {
    $sql="select * from technician_login where id={$_REQUEST['id']}";
    $result=$con->query($sql);
    $row=$result->fetch_assoc();
?>
    <form action="" method="POST">
        <div class="form-group">
            <i class="fas fa-key"></i><label for="" class="font-weight-bold pl-2">Technician Id</label>
            <input type="text" class="form-control" name="tId" value='<?php echo $row['id']; ?>' readonly>
        </div>
        <div class="form-group">
            <i class="fas fa-user"></i><label for="name" class="font-weight-bold pl-2">Name</label>
            <input type="text" class="form-control" name="tName" value='<?php echo $row['name']; ?>' required>
        </div>
        <div class="form-group">
            <i class="fas fa-user"></i><label for="email" class="font-weight-bold pl-2">E-Mail</label>
            <input type="email" class="form-control" aria-describedby="emailHelp" name="tEmail" value='<?php echo $row['mail']; ?>' required>
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>   
        <div class="form-group">
            <i class="fas fa-key"></i><label for="" class="font-weight-bold pl-2">City</label>
            <input type="text" class="form-control" placeholder="City" name="tCity" value='<?php echo $row['city']; ?>'>
        </div>
        <div class="form-group">
            <i class="fas fa-key"></i><label for="" class="font-weight-bold pl-2">Mobile</label>
            <input type="text" class="form-control" placeholder="Mobile No" name="tMobile" value='<?php echo $row['mobile']; ?>'>
        </div>     
        <button type="submit" class="btn btn-danger" name="update">Update</button>
        <button type="submit" class="btn btn-secondary" name="back">Back</button>
    </form>
    
    <?php }
    if(isset($_REQUEST['update']))
    {
        $name=$_REQUEST['tName'];
        $email=$_REQUEST['tEmail'];
        $mobile=$_REQUEST['tMobile'];
        $id=$_REQUEST['tId'];
        $city=$_REQUEST['tCity'];
        $sql="update technician_login set name='$name', city='$city', mobile='$mobile', mail='$email' where id='$id'";
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