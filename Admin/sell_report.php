<?php
    define('title','Sell Report');
    define('PAGE','sell_report');
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
            $sql="Select * from customer where cpdate between '$startdate' and '$enddate'";
            $result=$con->query($sql);
            if($result->num_rows > 0)
            {   ?>
                
                
                <p class="bg-dark text-white text-center p-2 mt-4">Details</p>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Customet Id</th>
                            <th>Customer Name</th>
                            <th>Address</th>
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>Price Each</th>
                            <th>Total</th>
                            <th>Date</th>
                        </tr>
                    </thead>
            <?php   while($row=$result->fetch_assoc()) 
                    { ?>
                    <tbody>
                        <tr>
                            <td><?php echo $row['custid'];?></td>
                            <td><?php echo $row['custname'];?></td>
                            <td><?php echo $row['custadd'];?></td>
                            <td><?php echo $row['cpname'];?></td>
                            <td><?php echo $row['cpquantaty'];?></td>
                            <td><?php echo $row['cpeach'];?></td>
                            <td><?php echo $row['cptotal'];?></td>
                            <td><?php echo $row['cpdate'];?></td>
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