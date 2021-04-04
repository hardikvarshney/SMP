<?php
    define('title','Success');
    
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
    $sql="select * from submit_request where request_id ={$_SESSION['myid']}";
    $result=$con->query($sql);
    if($result->num_rows == 1)
    {
        $row = $result->fetch_assoc(); ?>
        <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Bootstrav CSS-->
    <link rel="stylesheet" href="../CSS/bootstrap.min.css">
    <!--Font Awesome CSS-->
    <link rel="stylesheet" href="../CSS/all.min.css">
    <!--Google Font-->
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@700&display=swap" rel="stylesheet">
    <!--Custom CSS-->
    <link rel="stylesheet" href="../CSS/custom.css">
    <title>Requestor Login</title>
</head>
<body>
<div class="row ">
<div class="col-md-2"></div>
<div class="col-md-8">
        <h2 class="text-center mt-4 "><i class="fas fa-stethoscope mr-5"></i>Online Service Management System</h2>
        <p class="text-center mt-4  shadow-lg p-4" style="font-size:20px; font-weight:bold"><i class="fas  fa-user-md mr-5"></i>User Reciept</p>
        <div class="ml-5 mt-5">
        <table class="table">
        <tbody>
            <tr>
                <th>Request Id</th>
                <td><?php echo $row['request_id']; ?></td>
            </tr>
            <tr>
                <th>Name</th>
                <td><?php echo $row['request_name']; ?></td>
            </tr>
            <tr>
                <th>E-Mail Id</th>
                <td><?php echo $row['request_email']; ?></td>
            </tr>
            <tr>
                <th>Request Info</th>
                <td><?php echo $row['request_info']; ?></td>
            </tr>
            <tr>
                <th>Description</th>
                <td><?php echo $row['request_desc']; ?></td>
            </tr>
            <tr>
                <td>
                    <form class="d-print-none">
                        <input type="submit" class="btn btn-danger" value="Print" name="print" onClick='window.print()'>
                        <input type="submit" class="btn btn-secondary" value="Back" name="profile">
                    </form>
                </td>
            </tr>
            </tbody>
        </table>
        </div>
        </div>
        </div>
        
<?php  }
else
{
    echo "Failed";
} 
if(isset($_REQUEST['profile']))
{
    echo "<script>location.href='req_profile.php'</script>";
}
?>





<?php
    include('footer.php');
?>