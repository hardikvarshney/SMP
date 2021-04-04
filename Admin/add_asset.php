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
<?php
        if(isset($_POST['insert']))
        {
            if(($_REQUEST['pname']=="") || ($_REQUEST['pdop']=="") || ($_REQUEST['psellingprice']=="") || ($_REQUEST['porignalprice']=="") || ($_REQUEST['ptotal']==""))
            {
                $msg='<div class="alert alert-warning text-danger text-center mt-2" role="alert">***All Field are Require***</div>';
            }
            else
            {
                
                $sqli="Select pname from assets where pname = '".$_REQUEST['pname']."'";
                $result=$con->query($sqli);
                if($result->num_rows==1)
                {
                    $msg='<div class="alert alert-warning text-danger text-center mt-2" role="alert">Product Already Present</div>';
                }
                else
                {
                    $pname=$_REQUEST['pname'];
                    $pdop=$_REQUEST['pdop'];
                    $pop=$_REQUEST['porignalprice'];
                    $ptot=$_REQUEST['ptotal'];
                    $pavl=$ptot;
                    $psp=$_REQUEST['psellingprice'];
                    $sql="Insert into assets (pname, pdop, pavl, ptotal, porignalprice, psellingprice) values ('$pname', '$pdop', '$ptot', '$ptot', '$pop', '$psp')";
                    if($con->query($sql)===TRUE);
                    {
                        $msg='<div class="alert alert-success text-info text-center mt-2" role="alert">Product Added</div>';
                    
                    }
                    
   
                }
            
            }
        }
?>
<div class="col-md-6 mt-5">
<h3 class="shadow text-center  p-3">Add New Product</h3>
    <form action="" method="post" class="shadow-lg p-4">
        <div class="form-group">
            <i class="fas fa-user"></i><label for="name" class="font-weight-bold pl-2">Product Name</label>
            <input type="text" class="form-control" placeholder="Product Name" name="pname" >
        </div>
        <div class="form-group">
            <i class="fas fa-user"></i><label for="email" class="font-weight-bold pl-2">Date of Purchase</label>
            <input type="date" class="form-control" name="pdop" >
        </div>
        <div class="form-group">
            <i class="fas fa-key"></i><label for="" class="font-weight-bold pl-2">Total Units</label>
            <input type="text" class="form-control" placeholder="Amount" name="ptotal" >
        </div>
        <div class="form-group">
            <i class="fas fa-key"></i><label for="" class="font-weight-bold pl-2">Orignal Price</label>
            <input type="text" class="form-control" placeholder="Price" name="porignalprice" >
        </div>
        <div class="form-group">
            <i class="fas fa-key"></i><label for="" class="font-weight-bold pl-2">Selling Price</label>
            <input type="text" class="form-control" placeholder="Price" name="psellingprice" >
        </div>
        <button type="submit" class="btn btn-danger btn-lg  shadow-sm font-weight-bold" name="insert">Add</button>
        <button type="submit" class="btn btn-secondary btn-lg  shadow-sm font-weight-bold ml-3" name="back">Back</button>
    </form>
    <?php if(isset($msg)) { echo $msg ; }?>
</div>

<?php
    if(isset($_REQUEST['back']))
    { 
        echo "<script>location.href='asset.php'</script>";

    }
?>

<?php

    include('../Requester/footer.php');
?>