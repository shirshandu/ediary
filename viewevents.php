<?php
    include_once 'include/class.user.php';
    $user = new User();
    $res=$user->public_event();   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>EDiary | View Events</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="sign up page">
    <meta http-equiv="Refresh" Content="5">
    <meta name="author" content="shrishail sh">
    <link href="offcanvas.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php include "header.php"; ?>

    <div class="container">
    <br/><br/><br/>
  <h2 align="center">Current Events in your City.</h2><br/>
  <table class="table">
    <thead >
      <th>Date</th>
      <th>Event Subject</th>
      <th>Event Details</th>
    </thead>
    <?php
       while($row=mysqli_fetch_row($res))
        {
            ?>
            <tr class="info">
                <td><?php echo $row[0]; ?></td>
                <td><?php echo $row[1]; ?></td>
                <td><?php echo $row[2]; ?></td>
            </tr>
        <?php
       }
    ?>
  </table>
</div>
<!-- /container -->
<?php include 'footer.php' ?>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->

<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>