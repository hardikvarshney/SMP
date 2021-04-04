<?php
    define('title','Assets');
    define('PAGE','asset');
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
<h3 class="text-center">Update Product Details</h3>
<?php
    if(isset($_REQUEST['edit']))
    {
        $sql="select * from assets where pid={$_REQUEST['pid']}";
        $result=$con->query($sql);
        $row=$result->fetch_assoc();
?>
    <form action="" method="POST">
        <div class="form-group">
            <i class="fas fa-user"></i><label for="id" class="font-weight-bold pl-2">Product Id</label>
            <input type="text" class="form-control"  name="pid" value='<?php echo $row['pid'] ?>' readonly>
        </div>
        <div class="form-group">
            <i class="fas fa-user"></i><label for="name" class="font-weight-bold pl-2">Product Name</label>
            <input type="text" class="form-control" name="pname" value='<?php echo $row['pname'] ?>'>
        </div>
        <div class="form-group">
            <i class="fas fa-user"></i><label for="email" class="font-weight-bold pl-2">Date of Purchase</label>
            <input type="date" class="form-control" name="pdop" value='<?php echo $row['pdop'] ?>'>
        </div>
        <div class="form-group">
            <i class="fas fa-key"></i><label for="" class="font-weight-bold pl-2">Total Units</label>
            <input type="text" class="form-control"  name="ptotal" value='<?php echo $row['ptotal'] ?>'>
        </div>
        <div class="form-group">
            <i class="fas fa-key"></i><label for="" class="font-weight-bold pl-2">Orignal Price</label>
            <input type="text" class="form-control" name="porignalprice" value='<?php echo $row['porignalprice'] ?>'>
        </div>
        <div class="form-group">
            <i class="fas fa-key"></i><label for="" class="font-weight-bold pl-2">Selling Price</label>
            <input type="text" class="form-control" name="psellingprice" value='<?php echo $row['psellingprice'] ?>'>
        </div>     
        <button type="submit" class="btn btn-danger" name="update">Update</button>
        <button type="submit" class="btn btn-secondary" name="back">Back</button>
    </form>
    
<?php }
    if(isset($_REQUEST['update']))
    {        
        $name = $_REQUEST['pname'];
        $dop = $_REQUEST['pdop'];
        $total = $_REQUEST['ptotal'];
        $op = $_REQUEST['porignalprice'];
        $sp = $_REQUEST['psellingprice'];
        $avl= $total;
        $id = $_REQUEST['pid'];
        $sql="Update assets set pname='$name', pdop='$dop', pavl='$avl', ptotal='$total', porignalprice='$op' psellingprice='$sp' where pid='$id'";
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
        echo "<script>location.href='asset.php'</script>";

    }

    if(isset($msg)){ echo $msg ; }
?>

</div>


<?php
    include('../Requester/footer.php');
?>