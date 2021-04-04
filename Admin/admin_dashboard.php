<?php
    define('title','Admin Dashboard');
    define('PAGE','admin_dashboard');
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
    $sql="select max(request_id) from submit_request";
    $result1=$con->query($sql);
    $row1=$result1->fetch_row();
    $submitrequest1 = $row1[0];

    $qry="select max(r_no) from assigned_work";
    $result2=$con->query($qry);
    $row2=$result2->fetch_row();
    $submitrequest2 = $row2[0];

    $query="select * from technician_login";
    $result3=$con->query($query);
    $row3=$result3->num_rows;

?>
<div class="col-md-10">
    <div class="row mx-5 mt-5">
        <div class="col-md-4">
            <div class="card text-white bg-danger mb-3 text-center">
                <div class="card-header">Request Recieved</div>
                <div class="card-body">
                    <h4 class="card-title"><?php echo $submitrequest1 ;?></h4>
                    <a href="request.php" class="btn text-white">View</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
        <div class="card text-white bg-success mb-3 text-center">
                <div class="card-header">Assigned Work</div>
                <div class="card-body">
                    <h4 class="card-title"><?php echo $submitrequest2 ;?></h4>
                    <a href="work.php" class="btn text-white">View</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
        <div class="card text-white bg-info mb-3 text-center">
                <div class="card-header">Technician</div>
                <div class="card-body">
                    <h4 class="card-title"><?php echo $row3 ;?></h4>
                    <a href="technician.php" class="btn text-white">View</a>
                </div>
            </div>

        </div>
    </div>

    <div class="mx-5 mt-5 text-center">
        <p class="bg-dark text-white p-2">List of Requestors</p>
        <?php
            $sql="select * from requestor_login";
            $result=$con->query($sql);
            if($result->num_rows > 0)
            { 
                
            ?>
                <table class="table">
                <thead>
                    <tr>
                        <th> Requestor Id</th>
                        <th>Name</th>
                        <th>E-Mail</th>
                    </tr>
                </thead>
                
                <tbody>
                <?php
                    while($row=$result->fetch_assoc())
                    {
                ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['mail']; ?></td>
                    </tr>
                        <?php } ?>
                </tbody>
                
                
                </table>
            <?php   
            } 
            else
            {
                echo '<div class="alert alert-success text-success text-center mt-2" role="alert">No Result Found</div>';
            }
            ?>
    </div>
</div>

<?php
    include('../Requester/footer.php');
?>