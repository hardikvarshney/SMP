<?php
    define('title','View Work Order');
    define('PAGE','work');
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

<div class="col-md-8 col-sm-8 mt-5 mx-2">

<?php
if(isset($_REQUEST['view']))
{
    $id=$_REQUEST['id'];
    $sql="Select * from assigned_work where request_id='$id'";
    $result=$con->query($sql);
    $row=$result->fetch_assoc();
     ?>
    <h3 class="text-center shadow p-4">Online Service Management System</h3>
    <table class="table table-bordered">
        <tbody>
            <tr>
                <th>Request Id : </th>
                <td><?php echo $row['request_id']; ?></td>
            </tr>
            <tr>
                <th>Information : </th>
                <td><?php echo $row['request_info']; ?></td>
            </tr>
            <tr>
                <th>Name : </th>
                <td><?php echo $row['request_name']; ?></td>
            </tr>
            <tr>
                <th>Address : </th>
                <td><?php echo $row['request_add1'] . " " . $row['request_add2']; ?></td>
            </tr>
            <tr>
                <th>City : </th>
                <td><?php echo $row['request_city']; ?></td>
            </tr>
            <tr>
                <th>Mobile : </th>
                <td><?php echo $row['request_mobile']; ?></td>
            </tr>
            <tr>
                <th>Technician : </th>
                <td><?php echo $row['assign_tech']; ?></td>
            </tr>
            <tr>
                <th>Assigned Date : </th>
                <td><?php echo $row['request_date']; ?></td>
            </tr>
            <tr>
                <th>Technician Sign : </th>
                <td></td>
            </tr>
            <tr>
                <th>Customer Sign : </th>
                <td></td>
            </tr>
            
        </tbody>
    </table>
    <form action="" method="POST" class="mr-3 mt-3 mb-3 float-right d-print-none">
        <input type="submit" value="Print Reciept" name="print" class="btn btn-danger" onClick="window.print()">
        <input type="submit" value="Back" name="back" class="btn btn-secondary ml-2">
    </form>
    <?php      
        
}
if(isset($_REQUEST['back']))
{ ?>
    <script>
        location.href='work.php';
    </script>
<?php }
?>
</div>






<?php
    
    include('../Requester/footer.php');
?>