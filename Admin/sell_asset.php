<?php
    define('title','Sell Product');
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

    
<div class="col-md-6 mt-5 jumbotron">
<?php
if(isset($_REQUEST['sell']))
    {   
        $id=$_REQUEST['id'];
        $sql="Select * from assets where pid='$id'";
        $result=$con->query($sql);
        $row=$result->fetch_assoc(); ?>
<form action="" method="POST">
        <div class="form-group">
            <i class="fas fa-user"></i><label for="id" class="font-weight-bold pl-2">Product Id</label>
            <input type="text" class="form-control"  name="pid" value='<?php echo $row['pid'] ?>' readonly>
        </div>
        <div class="form-group">
            <i class="fas fa-user"></i><label for="name" class="font-weight-bold pl-2">Customer Name</label>
            <input type="text" class="form-control" name="cname" placeholder="Customer Name">
        </div>
        <div class="form-group">
            <i class="fas fa-user"></i><label for="name" class="font-weight-bold pl-2">Customer Address</label>
            <input type="text" class="form-control" name="caddr" placeholder="Address">
        </div>
        <div class="form-group">
            <i class="fas fa-user"></i><label for="name" class="font-weight-bold pl-2">Product Name</label>
            <input type="text" class="form-control" name="pname" value='<?php echo $row['pname'] ?>' readonly>
        </div>    
        <div class="form-group">
            <i class="fas fa-key"></i><label for="" class="font-weight-bold pl-2">Units Available</label>
            <input type="text" class="form-control"  name="pavl" value='<?php echo $row['pavl'] ?>' readonly>
        </div>
        <div class="form-group">
            <i class="fas fa-key"></i><label for="" class="font-weight-bold pl-2">Quantity</label>
            <input type="text" class="form-control" name="ppamt" placeholder="Amount">
        </div>
        <div class="form-group">
            <i class="fas fa-key"></i><label for="" class="font-weight-bold pl-2">Price Each</label>
            <input type="text" class="form-control" name="psellingprice" value='<?php echo $row['psellingprice'] ?>' readonly>
        </div>   
        <div class="form-group">
            <i class="fas fa-key"></i><label for="" class="font-weight-bold pl-2">Total Cost</label>
            <input type="text" class="form-control" name="total_cost" readonly>
        </div>     
        <div class="form-group">
            <i class="fas fa-key"></i><label for="" class="font-weight-bold pl-2">Date</label>
            <input type="date" class="form-control" name="selldate">
        </div>       
        <button type="submit" class="btn btn-danger" name="p-order">Place Order</button>        
        <button type="submit" class="btn btn-secondary" name="back">Back</button>
    </form>   
    <?php } 
if(isset($_REQUEST['p-order']))
{
    if(($_REQUEST['cname'] == "")  || ($_REQUEST['caddr']  == "")  || ($_REQUEST['pname']  == "")  || ($_REQUEST['pavl']  == "")  || ($_REQUEST['ppamt']  == "")  || ($_REQUEST['psellingprice']  == "")  || ($_REQUEST['total_cost']  == "")  || ($_REQUEST['selldate'] == ""))
    {
        $msg='<div class="alert alert-warning text-danger text-center mt-2" role="alert">***All Field are Require***</div>';
    }
    elseif($_REQUEST['ppamt'] > $_REQUEST['pavl'])
    {
        $msg='<div class="alert alert-warning text-danger text-center mt-2" role="alert">***Not in Stock***</div>';
    }
    else
    {   
        $pid=$_REQUEST['pid'];
        $cname=$_REQUEST['cname'];
        $addr=$_REQUEST['caddr'];
        $pname=$_REQUEST['pname'];
        $amt=$_REQUEST['ppamt'];
        $sp=$_REQUEST['psellingprice'];
        $tc=$_REQUEST['total_cost'];
        //$tc=$sp*$amt;
        $date=$_REQUEST['selldate'];
        $remain=($_REQUEST['pavl'])-($_REQUEST['ppamt']);
        $sql="Insert into customer (custname, custadd, cpname, cpquantaty, cpeach, cptotal, cpdate) values ('$cname', '$addr', '$pname', '$amt', '$sp', '$tc', '$date')";
        $result=$con->query($sql);
        if($result)
        {
            $genid=mysqli_insert_id($con);
            session_start();
            $_SESSION['myid']=$genid;
            echo "<script>location.href='payment_reciept.php' </script>";
        }
        $qry="Update assets set pavl='$remain' where pid='$pid'";
        $res=$con->query($qry);
        
    }
}
    if(isset($_REQUEST['back']))
    {
        echo "<script>location.href='asset.php' </script>";
    }
    if(isset($msg)){echo $msg;}
?>

</div>



<?php
    
    include('../Requester/footer.php');
?>