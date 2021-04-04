<?php
    define('title','Asset');
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

<div class="col-md-6 mt-5">
<h3 class="shadow text-center p-3">Payment Reciept</h3>
<?php 
    $sql="Select * from customer where custid={$_SESSION['myid']}";
    $result=$con->query($sql);
    if($result->num_rows == 1)
    {
        $row=$result->fetch_assoc(); ?>
    <table class="table ">
        <tbody>
            <tr>
                <th>Order Id</th>
                <td><?php echo $row['custid']; ?></td>
            </tr>
            <tr>
                <th>Customer Name</th>
                <td><?php echo $row['custname'] ?></td>
            </tr>
            <tr>
                <th>Customer Address</th>
                <td><?php echo $row['custadd'] ?></td>
            </tr>
            <tr>
                <th>Product Name</th>
                <td><?php echo $row['cpname'] ?></td>
            </tr>
            <tr>
                <th>Quantity</th>
                <td><?php echo $row['cpquantaty'] ?></td>
            </tr>
            <tr>
                <th>Total Cost</th>
                <td><?php echo $row['cpeach'] ?></td>
            </tr>
            <tr>
                <th>Purchased Date</th>
                <td><?php echo $row['cpdate'] ?></td>
            </tr>
            <tr>
                <td>
                    <form class="d-print-none">
                        <input type="submit" class="btn btn-danger" value="Print" name="print" onClick='window.print()'>
                        <input type="submit" class="btn btn-secondary" value="Back" name="back">
                    </form>
                </td>
            </tr>
        </tbody>
    </table>
    
<?php } 
if(isset($_REQUEST['back']))
{
    echo "<script>location.href='asset.php'</script>";
}

?>
</div>



<?php    
    include('../Requester/footer.php');
?>