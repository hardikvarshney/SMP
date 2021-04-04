<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Bootstrav CSS-->
    <link rel="stylesheet" href="CSS/bootstrap.min.css">
    <!--Font Awesome CSS-->
    <link rel="stylesheet" href="CSS/all.min.css">
    <!--Google Font-->
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@700&display=swap" rel="stylesheet">
    <!--Custom CSS-->
    <link rel="stylesheet" href="CSS/custom.css">


    <title>SMP</title>
</head>
<body>
    <!--Navigation Bar Start-->
    <nav class="navbar navbar-expand-sm navbar-dark bg-danger pl-5 fixed-top" >
    <a href="index.php" class="navbar-brand">
    <img src="images/logo.jpg" width="40" height="40" class="d-inline-block align-top mt-1" alt="" loading="lazy">
    SMP
    </a>
    <span class="navbar-text">Customer's Happiness is our Aim</span>
    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#myMenu">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="myMenu">
    <ul class="navbar-nav pl-5 custom-nav">
        <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
        <li class="nav-item"><a href="#Services" class="nav-link">Services</a></li>
        <li class="nav-item"><a href="#Registration" class="nav-link">Registration</a></li>
        <li class="nav-item"><a href="Requester/req_login.php" class="nav-link">Login</a></li>
        <li class="nav-item"><a href="#Contact" class="nav-link">Contact</a></li>

    </ul>
    </div>
    </nav>
    <!--Navigation Bar End-->

    <!--Start Header Jumbotron-->
    <header class="jumbotron back-image"  style="background-image:url(images/home1.jpg);">
    <div class="myClass mainHeading">
        <h1 class="text-uppercase text-danger font-weight-bold">Welcome to SMP</h1>
        <p class="font-italic">Customer's Happiness is our Aim</p>
        <a href="Requester/req_login.php" class="btn btn-success mr-4">Login</a>
        <a href="#Registration" class="btn btn-danger mr-4" >Sign In</a>
    </div>
    </header>
    <!--End Header Jumbotron-->

    <!-- Start Introduction Section-->
    <div class="container">
        <div class="jumbotron">
            <h3 class="text-center">SMP Introduction</h3>
                <p>
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                    Placeat culpa dolor molestias dolore provident assumenda
                    quaerat neque fuga rerum! Nesciunt repellat expedita placeat
                    id maxime quod repellendus exercitationem nihil inventore 
                    non? Sed rerum error magnam accusamus quisquam ratione nisi
                    eum repellendus odio quae totam eos nemo, ab provident iure,
                    suscipit repudiandae, officia mollitia ipsam illum temporibus
                    aperiam! Quod dolorem quam delectus optio? Dolores expedita
                    culpa blanditiis accusamus temporibus eum exercitationem
                    debitis nisi ex. Ea delectus totam dolorem architecto 
                    vitae libero provident nobis modi repellendus error molestias
                    soluta, non aspernatur magni cum nemo quidem quae, eligendi 
                    ipsam voluptatum. Sapiente, veritatis harum!
                </p>

        </div>
    </div>
    <!-- End Introduction Section-->

    <!-- Start Our Services Section-->
    <div class="container text-center border-bottom" id="Services">
        <h2>Our Services</h2>
        <div class="row mt-4">
            <div class="col-sm-4 mb-4">
                <a href="#"><i class="fas fa-tv fa-8x text-success"></i></a>
                <h4 class="mt-4">Electronic Appliances</h4>
            </div>
            <div class="col-sm-4 mb-4">
                <a href="#"><i class="fas fa-sliders-h fa-8x text-primary"></i></a>
                <h4 class="mt-4">Preventive Maintenence</h4>
            </div>
            <div class="col-sm-4 mb-4">
                <a href="#"><i class="fas fa-cogs fa-8x text-info"></i></a>
                <h4 class="mt-4">Fault Repair</h4>
            </div>
        </div>
    </div>
    <!-- End Introduction Section-->

    <!-- Start Registration Form Section-->

        <?php include("UserRegistration.php"); ?>

    <!-- End Registration Form Section-->

    <!-- Start Happy Customer Section-->
    <div class="jumbotron bg-danger">
        <div class="container">
            <h2 class="text-center text-white">Happy Customers</h2>
            <div class="row mt-5">
                <div class="col-lg-3 col-sm-6">
                    <div class="card shadow-lf mb-2">
                        <div class="card-body text-center">
                            <img src="images/p1.jpeg"  class="img-fluid" style="border-radius:100px" alt="avt1">
                            <h4 class="card-title">Rahul Varshney</h4>
                            <p class="card-text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. 
                            Veritatis dolore ipsa enim nisi corporis nesciunt natus quidem porro dolorem optio.</p>
                        </div>
                    
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card shadow-lf mb-2">
                        <div class="card-body text-center">
                            <img src="images/p1.jpeg" class="img-fluid" style="border-radius:100px" alt="avt1">
                            <h4 class="card-title">Hardik Varshney</h4>
                            <p class="card-text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. 
                            Veritatis dolore ipsa enim nisi corporis nesciunt natus quidem porro dolorem optio.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card shadow-lf mb-2">
                        <div class="card-body text-center">
                            <img src="images/p1.jpeg"  class="img-fluid" style="border-radius:100px" alt="avt1">
                            <h4 class="card-title">Yashi Varshney</h4>
                            <p class="card-text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. 
                            Veritatis dolore ipsa enim nisi corporis nesciunt natus quidem porro dolorem optio.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card shadow-lf mb-2">
                        <div class="card-body text-center">
                            <img src="images/p1.jpeg"  class="img-fluid" style="border-radius:100px" alt="avt1">
                            <h4 class="card-title">Pulkit Varshney</h4>
                            <p class="card-text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. 
                            Veritatis dolore ipsa enim nisi corporis nesciunt natus quidem porro dolorem optio.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Happy Customer Section-->

    <!-- Start Contact Us Section-->

        <?php include("ContactUs.php"); ?>
        
    <!-- End Contact Us Section-->

    <!-- Start Footer Section-->
    <footer class="container-fluid bg-dark mt-5">
        <div class="container">
            <div class="row py-3">
                <div class="col-md-6 mt-2">
                    <span class="pr-2 text-white ">Follow Us:</span>
                    <a href="#" target="_blank" class="pr-2 fi-color"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" target="_blank" class="pr-2 fi-color"><i class="fab fa-twitter"></i></a>
                    <a href="#" target="_blank" class="pr-2 fi-color"><i class="fab fa-youtube"></i></a>
                    <a href="#" target="_blank" class="pr-2 fi-color"><i class="fab fa-google-plus"></i></a>
                </div>
                <div class="col-md-6 text-right">
                    <small class="text-white">Designed By Hardik Varshney copy; 2020</small>
                    <small class="ml-2 "><a href="Admin/admin_login.php" class="btn btn-danger">Admin Login</a></small>
                </div>
            </div>
        </div>
    </footer>



    <!-- End Footer Section-->

    <!--Javascript-->
    <script src="JS/jquery.min.js"></script>
    <script src="JS/popper.min.js"></script>
    <script src="JS/bootstrap.min.js"></script>
    <script src="JS/all.min.js"></script>
</body>
</html>