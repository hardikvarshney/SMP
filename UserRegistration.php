<?php 
        require("db_connection.php");
        if(isset($_POST['Signup']))
        {
            if(($_REQUEST['rName']=="") || ($_REQUEST['rEmail']=="") || ($_REQUEST['rPassword']==""))
            {
                $msg='<div class="alert alert-warning text-danger text-center mt-2" role="alert">***All Field are Require***</div>';
            }
            else
            {
                
                $sqli="Select mail from requestor_login where mail = '".$_REQUEST['rEmail']."'";
                $result=$con->query($sqli);
                if($result->num_rows==1)
                {
                    $msg='<div class="alert alert-warning text-danger text-center mt-2" role="alert">E-Mail already Registered</div>';
                }
                else
                {
                    $name=$_REQUEST['rName'];
                    $email=$_REQUEST['rEmail'];
                    $password=$_REQUEST['rPassword'];
                    $sql="Insert into requestor_login (name, mail, password) values ('$name', '$email', '$password')";
                    if($con->query($sql)===TRUE);
                    {?>
                    <script>
                        alert ("Registration Successful");
                    </script>
                    <?php 
                    }
   
                }
            
            }
        }
    ?>


<!-- Start Registration Form Section-->

    <div class="container pt-5 "id="Registration">
        <h2 class="text-center">Create an Account</h2>
        <div class="row mt-4 mb-4">
            <div class="col-md-6 offset-md-3">
            <form action="" method="post" class="shadow-lg p-4">
                <div class="form-group">
                    <i class="fas fa-user"></i><label for="name" class="font-weight-bold pl-2">Name</label>
                    <input type="text" class="form-control" placeholder="Name" name="rName">
                </div>
                <div class="form-group">
                    <i class="fas fa-user"></i><label for="email" class="font-weight-bold pl-2">E-Mail</label>
                    <input type="email" class="form-control" placeholder="username@example.com" aria-describedby="emailHelp" name="rEmail">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                    <i class="fas fa-key"></i><label for="" class="font-weight-bold pl-2">Password</label>
                    <input type="password" class="form-control" placeholder="Password" name="rPassword">
                </div>
                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div>
                <button type="submit" class="btn btn-danger btn-lg btn-block shadow-sm font-weight-bold" name="Signup">Sign Up</button>
                <em style="font-size:12px">Note - By clicking Sign Up, you agree to our Terms, Data Policy and Cookie Policy</em><br>
                <?php if(isset($msg)){ echo "$msg"; } ?>
            </form>
            </div>
        </div>
    </div>
    <!-- End Registration Form Section-->


    