<?php
    define('title', 'Service Status');
    define('PAGE', 'service_status');
    include("header.php");
    include("../db_connection.php");
    if(isset($_REQUEST['search']))
    {
        if($_REQUEST['requestId']=="")
        {
            $msg='<div class="alert alert-warning text-danger text-center mt-2" role="alert">***Input Field Require***</div>';
        }
        else
        {
            $id=$_REQUEST['requestId'];
            $sql="select * from assigned_work where request_id='$id'";
            $result=$con->query($sql);
            $row=$result->fetch_assoc(); 
            if($row['request_id']==$id)
            {
            ?>
            <div class="col-md-5 mt-5">
                <h3 class="text-center shadow p-4">Assigned Work Details</h3>
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                        <th>Request Id : </th>
                        <td><?php echo $row['request_id']; ?></td>
                        </tr>
                        <tr>
                        <th>Request Info : </th>
                        <td><?php echo $row['request_info']; ?></td>
                        </tr>
                        <tr>
                        <th>Request Description : </th>
                        <td><?php echo $row['request_desc']; ?></td>
                        </tr>
                        <tr>
                        <th>Request Name : </th>
                        <td><?php echo $row['request_name']; ?></td>
                        </tr>
                        <tr>
                        <th>Address : </th>
                        <td><?php echo $row['request_add1']." ". $row['request_add2']; ?></td>
                        </tr>
                        <tr>
                        <th>City : </th>
                        <td><?php echo $row['request_city']." (".$row['request_pin'].")"; ?></td>
                        </tr>
                        <tr>
                        <th>State : </th>
                        <td><?php echo $row['request_state']; ?></td>
                        </tr>
                        <tr>
                        <th>E-Mail : </th>
                        <td><?php echo $row['request_email']; ?></td>
                        </tr>
                        <tr>
                        <th>Mobile : </th>
                        <td><?php echo $row['request_mobile']; ?></td>
                        </tr>
                        <tr>
                        <tr>
                        <th>Assigned Date : </th>
                        <td><?php echo $row['request_date']; ?></td>
                        </tr>
                        <th>Technician Name : </th>
                        <td><?php echo $row['assign_tech']; ?></td>
                        </tr>
                        <tr>
                        <th>Customer Sign : </th>
                        <td></td>
                        </tr>
                        <tr>
                        <th>Technician Sign : </th>
                        <td></td>
                        </tr>
                    </tbody>
                </table>
                <form action="" method="POST" class="float-right d-print-none">
                    <input type="submit" class="btn btn-danger mr-2 mb-2 " name="print" value="Print Reciept" onClick="window.print()">
                    <input type="submit" class="btn btn-secondary mr-2 mb-2 " name="print" value="Close">
                </form>
            </div>
<?php       }
            else
            {
                $msg='<div class="alert alert-info text-danger text-center mt-2" role="alert">Your Request is Still Pending</div>';
            }
        }
    }
   
    
?>

<div class="col-sm-4  mt-5">
    <form action="" method="POST" class="mx-5 d-print-none">
        <div class="form-group">
            <label for="requestId" class="font-weight-bold pl-2">Enter Request Id :</label>
            <input type="text" name="requestId" class="form-control" id="requestId" placeholder="Request Id" onkeypress="return onlyNumberKey(event)">
        </div>
        <input type="submit" class="btn btn-danger" name="search" value="Search"><br>
        <?php if(isset($msg)){echo $msg;} ?>
    </form>
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