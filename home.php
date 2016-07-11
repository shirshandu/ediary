<?php
    session_start();
    include_once 'include/class.user.php';
    $user = new User();
    $res=$user->select();
    $res1=$user->public_event();
    $user_id = $_SESSION['user_id'];
    $event_id = $_SESSION['event_id'];
   
    if (!$user->get_session()){
       header("location:index.php");
    }

    if (isset($_GET['q'])){
        $user->user_logout();
        header("location:index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>EDiary | Home</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="sign up page">
    <meta name="author" content="shrishail sh">
    <link href="offcanvas.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script type="text/javascript">
        function del_id(id)
        {
            if(confirm('Sure to delete this record ?'))
            {
                window.location='delete_data.php?delete_id='+id
            }
        }
        function edit_id(id)
        {
            if(confirm('Sure to edit this record ?'))
            {
                window.location='editevent.php?edit_id='+id
            }
        }
    </script>
</head>
<body>
    <?php include "headerlogin.php"; ?>
    <div class="container">

        <div class="row row-offcanvas row-offcanvas-right">
            
            <div class="col-xs-12 col-sm-9">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <strong> Event's Hosted By You</strong>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr class="text-info">
                                        <th>Id</th>
                                        <th>Date</th>
                                        <th>Event Type</th>
                                        <th>Subject</th>
                                        <th>Details</th>
                                        <th colspan="2">Edit or Delete </th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                   session_start();
                                   while($row=mysqli_fetch_row($res))
                                    {
                                        ?>
                                        <tr>
                                            <td><?php echo $row[0]; ?></td>
                                            <td><?php echo $row[2]; ?></td>
                                            <td><?php echo $row[3]; ?></td>
                                            <td><?php echo $row[4]; ?></td>
                                            <td><?php echo $row[5]; ?></td>    
                                            <td align="center"><a href="javascript:edit_id(<?php echo $row[0]; ?>)"><img src="images/b_edit.png" alt="EDIT" /></a></td>
                                        	<td align="center"><a href="javascript:del_id(<?php echo $row[0]; ?>)"><img src="images/b_drop.png" alt="DELETE" /></a></td>
                                        </tr>
                                    <?php
                                   }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        <?php include 'sidebar.php'; ?>   
        </div>
    </div>
<!-- /container -->
    <div class="container">

        <div class="row row-offcanvas row-offcanvas-right">
            <div class="col-xs-12 col-sm-9">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <strong> Event's In Your City</strong>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr class="text-info">
                                         <th>Date</th>
                                          <th>Subject</th>
                                          <th>Details</th>                                    
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                   session_start();
                                   while($row=mysqli_fetch_row($res1))
                                    {
                                        ?>
                                        <tr>
                                            <td ><?php echo $row[0]; ?></td>
                                            <td><?php echo $row[1]; ?></td>
                                            <td><?php echo $row[2]; ?></td>
                                        </tr>
                                    <?php
                                   }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
<?php include 'footer.php' ?>
<script src="js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>