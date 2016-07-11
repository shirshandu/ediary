<?php
    session_start();
    if(!isset($_SESSION['user_id']))
    {
        header('Location:index.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/popupcontact.css" rel="stylesheet">
    <link rel="stylesheet" href="sweetalert-master/lib/sweet-alert.css">
    <link rel="stylesheet" href="Font-Awesome-master/css/font-awesome.min.css">
    <script src="sweetalert-master/lib/sweet-alert.min.js"></script>
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/popup.js"></script>
    <link rel="icon" href="images/icon.png">
</head>

<body>
<nav class="navbar navbar-fixed-top navbar-inverse">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
            </button>
            <a class="navbar-brand" href="home.php"><i class="glyphicon glyphicon-link"></i>&nbsp;  EDiary </i></a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="home.php"><i class="glyphicon glyphicon-home"></i> Home </a></li>
                <li><a href="addevent.php"><i class="glyphicon glyphicon-user"></i> Add New Event </a></li>
                
                <li><a href="home.php"><i class="glyphicon glyphicon-info-sign"></i> View Events </a></li>
            </ul>
            <form class="navbar-form navbar-right" method="post" action="logout.php">
                
                <button class="btn btn-info" type="submit" name="signout">
                    <i class="glyphicon glyphicon-log-out"></i> Sign out
                </button>
            </form>
        </div>
        <!-- /.nav-collapse -->
    </div>
    <!-- /.container -->
</nav>
<!-- /.navbar -->
</body>
</html>