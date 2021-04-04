<?php
    define('title','Work Order');
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
<div class="col-md-10 col-sm-9 mt-5">

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Request Id</th>
                <th scope="col">Information</th>
                <th scope="col">Name</th>
                <th scope="col">Address</th>
                <th scope="col">City</th>
                <th scope="col">Mobile</th>
                <th scope="col">Technician</th>
                <th scope="col">Assigned Date</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <?php
    $sql="Select * from assigned_work";
    $result=$con->query($sql);
    if($result->num_rows > 0)
    { 
       while($row=$result->fetch_assoc())
       { ?>
        <tbody>
            <tr>
                <td scope="col"><?php echo $row['request_id']; ?></td>
                <td scope="col"><?php echo $row['request_info']; ?></td>
                <td scope="col"><?php echo $row['request_name']; ?></td>
                <td scope="col"><?php echo $row['request_add1']." ". $row['request_add2']; ?></td>
                <td scope="col"><?php echo $row['request_city']; ?></td>
                <td scope="col"><?php echo $row['request_mobile']; ?></td>
                <td scope="col"><?php echo $row['assign_tech']; ?></td>
                <td scope="col"><?php echo $row['request_date']; ?></td>
                <td>
                    <form action="view_workorder.php" method="POST" class="d-inline">
                        <button class="btn btn-warning" name="view" value="View" type="submit"><i class="far fa-eye"></i></button>   
                        <input type="hidden" name="id" value='<?php echo $row['request_id']; ?>'>
                    </form>
                    <form action="work.php" method="POST" class="d-inline">
                        <button class="btn btn-secondary" name="delete" value="Delete" type="submit"><i class="far fa-trash-alt"></i></button>   
                        <input type="hidden" name="id" value='<?php echo $row['request_id']; ?>'>
                    </form>
                </td>
            </tr>
        </tbody>
       <?php } }
    else
    {
        $msg='<div class="alert alert-warning text-danger text-center mt-2" role="alert">***No Work Rquest Found***</div>';
    }?>
    </table>
  
<?php 
if(isset($msg)){ echo $msg; } 
if(isset($_REQUEST['delete']))
{
    $sql="Delete from assigned_work where request_id={$_REQUEST['id']}";
    $result=$con->query($sql);
    if($result == TRUE)
    { ?>
        <meta http-equiv="refresh" content= "0;URL=?closed" />
<?php   
    }
}


?>
</div>




<?php
    include('../Requester/footer.php');
?>


