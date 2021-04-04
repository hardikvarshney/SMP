<?php
    define('title','Requestor');
    define('PAGE','requestor');
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
    $sql="select * from requestor_login";
    $result=$con->query($sql);
    if($result->num_rows > 0)
    {  ?>


<div class="col-md-10 mt-5">
<p class="bg-dark text-white text-center p-2">List of Requestors</p>
    <table class="table text-center">
        <thead>
            <tr >
                <th>Requester Id</th>
                <th>Name</th>
                <th>E-Mail</th>
                <th>Action</th>
            </tr>
        </thead>
        <?php 
        while($row=$result->fetch_assoc()) 
        { ?>

        <tbody>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['mail']; ?></td>
                <td>
                    <form action="edit_requestor.php" method="POST" class="d-inline">
                        <button class="btn btn-info" name="edit" value="Edit" type="submit"><i class="fas fa-pen"></i></button>   
                        <input type="hidden" name="id" value='<?php echo $row['id']; ?>'>
                    </form>
                    <form action="" method="POST" class="d-inline">
                        <button class="btn btn-secondary" name="delete" value="Delete" type="submit"><i class="fas fa-trash-alt"></i></button>   
                        <input type="hidden" name="id" value='<?php echo $row['id']; ?>'>
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
    $sql="Delete from requestor_login where id={$_REQUEST['id']}";
    $result=$con->query($sql);
    if($result == TRUE)
    { ?>
        <meta http-equiv="refresh" content= "0;URL=?closed" />
<?php   
    }
}

?>


<div class=" col-sm-12">
    <a href="insert_req.php" class="btn btn-danger float-right mr-3" style="margin-top:50px">
        <i class="fas fa-plus fa-2x"></i>
    </a>
</div>








<?php
    include('../Requester/footer.php');
?>