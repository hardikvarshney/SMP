<?php
    define('title','Work Report');
    define('PAGE','work_report');
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

<div class="col-md-10 mt-5 text-center">
    <form action="" method="POST" class="d-print-none">
        <div class="form-row">    
            <div class="form-group col-md-2">
                <input type="date" class="form-control" id="startdate" name="startdate">
            </div><span>to</span>
            <div class="form-group col-md-2">
                <input type="date" class="form-control" id="endtdate" name="enddate">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-secondary" value="search" name="searchsubmit">
            </div>
        </div>
    </form>
    <?php
        if(isset($_REQUEST['searchsubmit']))
        {
            $startdate=$_REQUEST['startdate'];
            $enddate=$_REQUEST['enddate'];
            $sql="Select * from assigned_work where request_date between '$startdate' and '$enddate'";
            $result=$con->query($sql);
            if($result->num_rows > 0)
            {   ?>
                
                
                <p class="bg-dark text-white text-center p-2 mt-4">Details</p>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Request Id</th>
                            <th>Request Info</th>
                            <th>Name</th>
                            <th>Address</th>
                            <th>City</th>
                            <th>Mobile</th>
                            <th>Technician</th>
                            <th>Assigned Date</th>
                        </tr>
                    </thead>
            <?php   while($row=$result->fetch_assoc()) 
                    { ?>
                    <tbody>
                        <tr>
                            <td><?php echo $row['request_id'];?></td>
                            <td><?php echo $row['request_info'];?></td>
                            <td><?php echo $row['request_name'];?></td>
                            <td><?php echo $row['request_add1']." ".$row['request_add2'];?></td>
                            <td><?php echo $row['request_city'];?></td>
                            <td><?php echo $row['request_mobile'];?></td>
                            <td><?php echo $row['assign_tech'];?></td>
                            <td><?php echo $row['request_date'];?></td>
                        </tr>
                    </tbody>
                    <?php } ?>
                    
                </table>
                <input type="submit" class="btn btn-danger d-print-none" name="print" value="Print" onClick="window.print()">
<?php             
            }
            else
            {
                $msg='<div class="alert alert-warning text-danger text-center mt-2" role="alert">***No Record Found***</div>';
            }
        }
    if(isset($msg)){echo $msg;}
    ?>
</div>


<?php 

    include('../Requester/footer.php');
?>