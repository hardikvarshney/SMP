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
    <title><?php echo title ?></title>      <!--Dynamic Title-->
</head>
<body>
    <!--Navigation Bar Start-->
    <nav class="navbar navbar-expand-sm navbar-dark bg-danger pl-5 fixed-top " >
    <a href="index.php" class="navbar-brand">
    <img src="../images/logo.jpg" width="40" height="40" class="d-inline-block align-top mt-1" alt="" loading="lazy">
    SMP
    </a>
    <span class="navbar-text">Customer's Happiness is our Aim</span>
    </nav>
    <!--Navigation Bar End-->

    
    <div class="container-fluid" style="margin-top:40px">
        <div class="row">
        <!--Start SideBar-->
            <nav class="col-sm-2 bg-light sidebar py-5 d-print-none">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item"><a href="req_profile.php" class="nav-link <?php if(PAGE=='req_profile'){echo 'active';} ?>"><i class="fas fa-user"></i> Profile</a></li>
                        <li class="nav-item"><a href="submit_request.php" class="nav-link <?php if(PAGE=='submit_request'){echo 'active';} ?>"><i class="fab fa-accessible-icon"></i> Submit Request</a></li>
                        <li class="nav-item"><a href="service_status.php" class="nav-link <?php if(PAGE=='service_status'){echo 'active';} ?>"><i class="fas fa-align center "></i> Service Status</a></li>
                        <li class="nav-item"><a href="change_password.php" class="nav-link <?php if(PAGE=='change_password'){echo 'active';} ?>"><i class="fas fa-key "></i> Change Password</a></li> 
                        <li class="nav-item"><a href="../logout.php" class="nav-link "><i class="fas fa-sign-out-alt "></i> Logout</a></li> 
                    </ul>
                </div>
            </nav>  
        <!--End SideBar-->
        
        
    

    





  