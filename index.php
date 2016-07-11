<?php
    session_start();
    if(isset($_SESSION['user_id'])){
        header('Location:home.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>EDiary - Happening in your city</title>
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/landing-page.css" rel="stylesheet">
    <script src="sweetalert-master/lib/sweet-alert.min.js"></script>    
    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php include "header.php" ?>
<!-- Navigation -->
    <!-- Header -->
    <a name="about"></a>
    <div class="intro-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="intro-message">
                        <h1>EDiary</h1>
                        <h3>Current Happenings In Your City</h3>
                        <h3>Let Namma Bengluru Knows about your Event</h3>
                        <hr class="intro-divider">
                        <ul class="list-inline btn-bitbucket">
                            <li>
                                <a href="viewevents.php" class="btn btn-default btn-lg"> <span class="network-name">View Events in Your City</span></a>
                            </li>          
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- /.intro-header -->
    </div>
    <!-- /.content-section-a -->
    <!-- /.container -->
    </div>
    <script src="js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>