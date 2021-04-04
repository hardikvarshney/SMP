<?php
    define('title', 'Submit Request');
    define('PAGE', 'submit_request');
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
    if(isset($_REQUEST['update']))
    {
        if(($_REQUEST['requestInfo']=="") || ($_REQUEST['description']=="") || ($_REQUEST['name']=="") || ($_REQUEST['address1']=="") || ($_REQUEST['address2']=="") || ($_REQUEST['city']=="") || ($_REQUEST['state']=="") || ($_REQUEST['pinCode']=="") || ($_REQUEST['eMail']=="") || ($_REQUEST['mobileNo']=="") || ($_REQUEST['date']==""))
        {
            $msg='<div class="alert alert-warning text-danger text-center mt-2" role="alert">***All Field are Require***</div>';
        }
        else
        {
            $info=$_REQUEST['requestInfo'];
            $desc=$_REQUEST['description'];
            $name=$_REQUEST['name'];
            $addr1=$_REQUEST['address1'];
            $addr2=$_REQUEST['address2'];
            $city=$_REQUEST['city'];
            $state=$_REQUEST['state'];
            $pin=$_REQUEST['pinCode'];
            $mail=$_REQUEST['eMail'];
            $mobile=$_REQUEST['mobileNo'];
            $date=$_REQUEST['date'];
            $sql="Insert into submit_request (request_info, request_desc, request_name, request_add1, request_add2, 
                  request_city, request_state, request_pin, request_email, request_mobile, request_date) Values
                  ('$info', '$desc', '$name', '$addr1', '$addr2', '$city', '$state', '$pin', '$mail', '$mobile', '$date')";
            if($con->query($sql)===TRUE)
            {
                $genid = mysqli_insert_id($con);
                $_SESSION['myid']=$genid;
            
            ?>
                <script>
                    alert ("Request Successful Submitted");
                    location.href='submit_req_success.php';
                </script>
            <?php 

            }

            
        }
    }
    
?>
<div class="col-sm-10  mt-5">
    <form action="" method="POST" class="mx-5">
        <div class="form-group">
            <label for="inputRequestInfo" class="font-weight-bold pl-2">Request Info</label>
            <input type="text" name="requestInfo" id="remail" class="form-control" id="inputRequestInfo" placeholder="Request Info">
        </div>
        <div class="form-group">
            <label for="description" class="font-weight-bold pl-2">Description</label>      
            <input type="text" name="description" id="description" class="form-control" placeholder=" Write Description">
        </div>
        <div class="form-group">
            <label for="name" class="font-weight-bold pl-2">Name</label>      
            <input type="text" name="name" id="name" class="form-control" placeholder="Name">
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="addressLine1" class="font-weight-bold pl-2">Address Line 1</label>      
                    <input type="text" name="address1" id="address1" class="form-control" placeholder="House No.">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">     
                    <label for="addressLine2" class="font-weight-bold pl-2">Address Line 2</label>      
                    <input type="text" name="address2" id="address2" class="form-control" placeholder="Colony Name">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="city" class="font-weight-bold pl-2">City</label>      
                    <input type="text" name="city" id="city" class="form-control">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">     
                    <label for="state" class="font-weight-bold pl-2">State</label>      
                    <input type="text" name="state" id="state" class="form-control">
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">     
                    <label for="pinCode" class="font-weight-bold pl-2">Pin Code</label>      
                    <input type="text" name="pinCode" id="pinCode" class="form-control" onkeypress="return onlyNumberKey(event)">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="eMail" class="font-weight-bold pl-2">E-Mail</label>      
                    <input type="email" name="eMail" id="eMail" class="form-control" readonly value="<?php echo "$rEmail"; ?>">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">     
                    <label for="mobileNo" class="font-weight-bold pl-2">Mobile No.</label>      
                    <input type="text" name="mobileNo" id="mobileNo" class="form-control" onkeypress="return onlyNumberKey(event)">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">     
                    <label for="date" class="font-weight-bold pl-2">Date</label>      
                    <input type="date" name="date" id="date" class="form-control">
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-danger" name="update">Update</button>
        <button type="submit" class="btn btn-secondary" name="reset">Reset</button>
                    
    </form>     
    <?php if(isset($msg)){ echo "$msg"; } ?> 

</div>

<!--Only Number Checking-->
    <script>
    function onlyNumberKey(evt)
    {
        var x=(evt.which) ? evt.which : evt.keyCode
        if(x > 31 && (x < 48 || x > 57))
        {
            return false;
        }
        return true;
    }
</script>

<?php
    include("footer.php");
?>




