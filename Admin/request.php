<?php
    define('title','Request');
    define('PAGE','request');
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

<div class="col-sm-4 mt-5 mx-2">
    <?php
        $sql="Select request_id, request_info, request_desc, request_date from submit_request";
        $result=$con->query($sql);
        if($result->num_rows > 0)
        {
            while($row=$result->fetch_assoc())
            {
                ?>
                <div class="card mb-3">
                    <div class="card-header">Request Id : <?php echo $row['request_id']; ?></div>
                    <div class="card-body">
                        <h5 class="card-title">Request Info : <?php echo $row['request_info']; ?></h5>
                        <p class="card-text"><?php echo $row['request_desc']; ?></p>
                        <p class="card-text">Request Date : <?php echo $row['request_date']; ?></p>
                        <div class="float-right">
                            <form action="" method="POST">
                                <input type="hidden" value='<?php echo $row['request_id']; ?>' name="id">
                                <input type="submit" class="btn btn-danger mr-2" value="View" name="view">
                                <input type="submit" class="btn btn-secondary" value="Delete" name="close">
                            </form>
                        </div>
                        
                    </div>
                    
                </div><?php if(isset($msg)){echo '$msg';} ?>
    <?php  } 
        }
    ?>
    

</div>
<?php
    if(isset($_REQUEST['close']))
    {
        $id=$_REQUEST['id'];
        $sql="delete from submit_request where request_id='$id'";
        $result=$con->query($sql);
        if($result==TRUE)
        {
             ?> <meta http-equiv="refresh" content= "0;URL=?closed" />
   <?php }
        else
            echo "Unable to Delete";
    }

?>

<?php
if(isset($_REQUEST['assign']))
{
    $id = $_REQUEST['requestId'];
    $info = $_REQUEST['requestInfo'];
    $desc = $_REQUEST['description'];
    $name = $_REQUEST['name'];
    $add1 = $_REQUEST['address1'];
    $add2 = $_REQUEST['address2'];
    $city = $_REQUEST['city'];
    $state = $_REQUEST['state'];
    $city = $_REQUEST['city'];
    $pin = $_REQUEST['pinCode'];
    $email= $_REQUEST['eMail'];
    $mobile = $_REQUEST['mobileNo'];
    $tech = $_REQUEST['technician'];
    $date = $_REQUEST['date'];
    
    $sql = "Insert into assigned_work (request_id, request_info, request_desc, request_name, request_add1, 
    request_add2, request_city, request_state, request_pin, request_email, request_mobile, assign_tech, 
    request_date) Values ('$id', '$info', '$desc', '$name', '$add1', '$add2', '$city', '$state',
     '$pin', '$email', '$mobile', '$tech', '$date')";
     if($con->query($sql) == TRUE)
    { ?><h3>
        <script>
            alert ("Request Assigned Successfully for Id no. <?php echo $id; ?>");
        </script>
        </h3>
<?php 
    }
}
if(isset($_REQUEST['view']))
    {
        $id=$_REQUEST['id'];
        echo $id;
        $sqli="select * from submit_request where request_id='$id'";
        echo $row['request_name'];
        $result=$con->query($sqli);
        $row=$result->fetch_assoc();
        
     
?>
<div class="col-sm-5 mt-5 bg-light">
    <h4 class="text-center">Assign Work Order Request</h3><br>
    <form action="" method="POST" >
        <div class="form-group">
            <label for="inputRequestId" class="font-weight-bold pl-2">Request Id</label>
            <input type="text" name="requestId" id="rid" class="form-control" id="inputRequestId" readonly value="<?php echo $row['request_id']; ?>">
        </div>
        <div class="form-group">
            <label for="inputRequestInfo" class="font-weight-bold pl-2">Request Info</label>
            <input type="text" name="requestInfo" id="remail" class="form-control" id="inputRequestInfo" readonly value="<?php echo $row['request_info']; ?>">
        </div>
        <div class="form-group">
            <label for="description" class="font-weight-bold pl-2">Description</label>      
            <input type="text" name="description" id="description" class="form-control" readonly value="<?php echo $row['request_desc']; ?>">
        </div>
        <div class="form-group">
            <label for="name" class="font-weight-bold pl-2">Name</label>      
            <input type="text" name="name" id="name" class="form-control" readonly value="<?php echo $row['request_name']; ?>">
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="addressLine1" class="font-weight-bold pl-2">Address Line 1</label>      
                    <input type="text" name="address1" id="address1" class="form-control" readonly value="<?php echo $row['request_add1']; ?>">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">     
                    <label for="addressLine2" class="font-weight-bold pl-2">Address Line 2</label>      
                    <input type="text" name="address2" id="address2" class="form-control" readonly value="<?php echo $row['request_add2']; ?>">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="city" class="font-weight-bold pl-2">City</label>      
                    <input type="text" name="city" id="city" class="form-control" readonly value="<?php echo $row['request_city']; ?>">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">     
                    <label for="state" class="font-weight-bold pl-2">State</label>      
                    <input type="text" name="state" id="state" class="form-control" readonly value="<?php echo $row['request_state']; ?>">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">     
                    <label for="pinCode" class="font-weight-bold pl-2">Pin Code</label>      
                    <input type="text" name="pinCode" id="pinCode" class="form-control" readonly value="<?php echo $row['request_pin']; ?>">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="eMail" class="font-weight-bold pl-2">E-Mail</label>      
                    <input type="email" name="eMail" id="eMail" class="form-control" readonly value="<?php echo $row['request_email']; ?>">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">     
                    <label for="mobileNo" class="font-weight-bold pl-2">Mobile No.</label>      
                    <input type="text" name="mobileNo" id="mobileNo" class="form-control" readonly value="<?php echo $row['request_mobile']; ?>">
                </div>
            </div>
            
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="technician" class="font-weight-bold pl-2">Assigned to Technician</label>      
                    <input type="text" name="technician" id="technician" class="form-control" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">     
                    <label for="date" class="font-weight-bold pl-2">Date</label>      
                    <input type="date" name="date" id="date" class="form-control" required>
                </div>
            </div>
        </div>
        
        <div class="float-right mb-3">
            <button type="submit" class="btn btn-success mr-2" name="assign">Assign Work</button>
            
        </div>            
    </form>   
    
</div>
<?php } 
    




?>



<?php
    include('../Requester/footer.php');
?>