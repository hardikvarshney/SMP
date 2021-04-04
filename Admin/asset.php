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
    $sql="select * from assets";
    $result=$con->query($sql);
    if($result->num_rows > 0)
    {  
?>

<div class="col-md-10 mt-5">
<p class="bg-dark text-white text-center p-2">List of Products</p>
    <table class="table text-center">
        <thead>
            <tr >
                <th>Id</th>
                <th>Name</th>
                <th>D.O.P.</th>
                <th>Available</th>
                <th>Total</th>
                <th>Orignal Price</th>
                <th>Selling Price</th>
                <th>Action</th>
            </tr>
        </thead>
        <?php 
        while($row=$result->fetch_assoc()) 
        { ?>

        <tbody>
            <tr>
                <td><?php echo $row['pid']; ?></td>
                <td><?php echo $row['pname']; ?></td>
                <td><?php echo $row['pdop']; ?></td>
                <td><?php echo $row['pavl']; ?></td>
                <td><?php echo $row['ptotal']; ?></td>
                <td><?php echo $row['porignalprice']; ?></td>
                <td><?php echo $row['psellingprice']; ?></td>
                <td>
                    <form action="edit_asset.php" method="POST" class="d-inline">
                        <button class="btn btn-info" name="edit" value="Edit" type="submit"><i class="fas fa-pen"></i></button>   
                        <input type="hidden" name="pid" value='<?php echo $row['pid']; ?>'>
                    </form>
                    <form action="" method="POST" class="d-inline">
                        <button class="btn btn-secondary" name="delete" value="Delete" type="submit"><i class="fas fa-trash-alt"></i></button>   
                        <input type="hidden" name="id" value='<?php echo $row['pid']; ?>'>
                    </form>
                    <form action="sell_asset.php" method="POST" class="d-inline">
                        <button class="btn btn-warning" name="sell" value="Sell" type="submit"><i class="fas fa-handshake"></i></button>   
                        <input type="hidden" name="id" value='<?php echo $row['pid']; ?>'>
                    </form>                
                </td>
            </tr>
        </tbody>
  <?php } ?>
    </table>
</div>

<?php 
}
if(isset($_REQUEST['delete']))
{
    $sql="Delete from assets where pid={$_REQUEST['id']}";
    $result=$con->query($sql);
    if($result == TRUE)
    { ?>
        <meta http-equiv="refresh" content= "0;URL=?closed" />
<?php   
    }
}

?>

<div class=" col-sm-12">
    <a href="add_asset.php" class="btn btn-danger float-right mr-3" style="margin-top:50px">
        <i class="fas fa-plus fa-2x"></i>
    </a>
</div>


<?php 
    include('../Requester/footer.php');
?>