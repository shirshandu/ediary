<?php
    session_start();
    if(isset($_SESSION['user_id'])){
        header('Location:home.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="sweetalert-master/lib/sweet-alert.css">
<script src="sweetalert-master/lib/sweet-alert.min.js"></script>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-fixed-top navbar-inverse">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php"><i class="glyphicon glyphicon-link"></i>&nbsp;  EDiary </i></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <form action="" method="post"  name="login" class="navbar-form navbar-right">
                <div class="form-group">
                    <input type="text" name="emailusername" placeholder="Username || Email Id " class="form-control" required >
                </div>
                <div class="form-group">
                    <input type="password" placeholder="Password" name="password" class="form-control" required >
                </div>
                <button type="submit" name="submit" value="Sign in"  onclick="return(submitlogin());" class="btn btn-info"><i class="glyphicon glyphicon-log-in"></i>&nbsp;Sign In</button>
                <a href="registration.php" name="signup" class="btn btn-info"><i class="glyphicon glyphicon-share-alt"></i> Sign up</a>
            </form>
        </div>
        <!--/.navbar-collapse -->
    </div>
</nav>
</body>
</html>
<?php
    include_once 'include/class.user.php';
    $user = new User();

    if (isset($_REQUEST['submit'])) { 
        extract($_REQUEST);   
        $login = $user->check_login($emailusername, $password);
        if ($login) {
            //Success
           header("location:home.php");
        } else { ?>
            <script type='text/javascript'>
                swal("Oops...!", "Looks like you have entered incorrect details. Try again!", "error");
            </script>
            <?php
        }
    }
?>