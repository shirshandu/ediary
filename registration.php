<html>
<head lang="en">
    <meta charset="UTF-8">
    <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="sweetalert-master/lib/sweet-alert.css">
    <script src="sweetalert-master/lib/sweet-alert.min.js"></script>
    <title>EDiary | Registration</title> 
</head>
<style>
    .login-panel {
        margin-top: 120px;  
        box-shadow:inset 0 1px 2px rgba(0,0,0,0.075),0 0 20px rgba(81,167,232,0.5);
    }
</style>
<body>
 
<div class="container"><!-- container class is used to centered  the body of the browser with some decent width-->
    <div class="row"><!-- row class is used for grid system in Bootstrap-->
        <div class="col-md-4 col-md-offset-4">
            <!--col-md-4 is used to create the no of colums in the grid also use for medimum and large devices-->
            <div class="login-panel panel panel-info">
                <div class="panel-heading">
                    <p class="panel-title">EDiary Registration</p>
                </div>
                <div class="panel-body">
                    <form role="form" name="reg" method="post">
                        <fieldset>

                            <div class="form-group">
                                <input class="form-control" placeholder="Enter User Name" name="uname" required
                                       required>
                            </div>
                            
                            <div class="form-group">
                                <input class="form-control" placeholder="Email ID - yourname@domain.com" name="uemail" type="email"
                                       required>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Password - 6 Digits Minimum" pattern=".{6,}" name="upass" type="password"
                                       required>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Phone Number - 10 Digits" pattern=[0-9]{10} name="uphno" type="text"
                                       required>
                            </div>

                            <input class="btn btn-lg btn-info btn-block" type="submit" value="Register"
                                   name="submit" >

                        </fieldset>
                    </form>
                    <center><b>Already Registered ?</b> <br></b><a href="index.php">Please Login </a></center>
                    <!--for centered text-->
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>

<?php
    include_once 'include/class.user.php';
    $user = new User();
    if (isset($_REQUEST['submit'])){
        extract($_REQUEST);
        $register = $user->reg_user($uname,$upass,$uemail,$uphno);
        if ($register) { ?>
            <script type='text/javascript'>
                swal("Congratulations!", "You can now post your Event Details!", "success")
                setTimeout(function(){window.location = 'index.php';}, 3000)
            </script>
            <?php
        } else { ?>
            <script type='text/javascript'>
                swal("Oops...!", "Registration Failed. Please Try Again!", "error");
            </script>
            <?php
        }
    }
?>