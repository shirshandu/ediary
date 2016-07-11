<?php
include_once 'include/class.user.php';
$con = new User();
$table = "event";
// data insert code starts here.
if(isset($_GET['edit_id']))
{ 
	
	$user = new User();
    $res=$user->Fetch($_GET['edit_id']);
	
}
// data update code starts here.
if(isset($_POST['btn-update']))
{
	$event_id = $_POST['event_id'];
	//echo $event_id;
	$event_date = $_POST['event_date'];
	$event_type = $_POST['event_type'];
	$event_subject = $_POST['event_subject'];
	$event_text = $_POST['event_text'];
	$con = new User();
	$res=$con->update($event_id,$event_date,$event_type,$event_subject,$event_text);
	if($res)	{
		?>
		<script>
		alert('Event Details Updated');
        window.location='home.php'
        </script>
		<?php
	}	else {
		?>
		<script>
		alert('Error Updating Event Details');
        window.location='home.php'
        </script>
		<?php
	}
}
?>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="sweetalert-master/lib/sweet-alert.css">
    <script src="sweetalert-master/lib/sweet-alert.min.js"></script>
    <title>EDiary | Edit Data</title>
	<script type="text/javascript">
        var datefield=document.createElement("input")
        datefield.setAttribute("type", "date")
        if (datefield.type!="date"){ //if browser doesn't support input type="date", load files for jQuery UI Date Picker
            document.write('<link href="css/jquery-ui.css" rel="stylesheet" type="text/css" />\n')
            document.write('<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"><\/script>\n')
            document.write('<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"><\/script>\n') 
        }
    </script>

    <script>
    var d = new Date();
    if (datefield.type!="date"){ //if browser doesn't support input type="date", initialize date picker widget:
        jQuery(function($){ //on document.ready
            $('#birthday').datepicker({ dateFormat: "yy-mm-dd", minDate:new Date(d.setDate(d.getDate() +1)), maxDate:new Date(d.setDate(d.getDate() + 9)) });
        })
    }
    </script></head>
	<style>
    .login-panel {
        margin-top: 120px;
        
        box-shadow:inset 0 1px 2px rgba(0,0,0,0.075),0 0 20px rgba(81,167,232,0.5);
    }
	</style>
<body>
<?php include "headerlogin.php"; ?>
<div class="container"><!-- container class is used to centered  the body of the browser with some decent width-->
    <div class="row"><!-- row class is used for grid system in Bootstrap-->
        <div class="col-md-4 col-md-offset-4">
            <!--col-md-4 is used to create the no of colums in the grid also use for medimum and large devices-->
            <div class="login-panel panel panel-info">
                <div class="panel-heading">
                    <p class="panel-title">EDIT EVENT DETAILS</p>
                </div>
				<?php
					while($row=mysqli_fetch_row($res)){?>
	                <div class="panel-body">
                    <form role="form" name="reg" method="post">
                        <fieldset>
                            <div class="form-group">
                                <input type="hidden" class="form-control" readonly value="<?php echo $row[0]; ?>" name="event_id" required>
                            </div>                            
                            <div class="form-group">
                                <input type="date" class="form-control" placeholder="Event Date" id="birthday" name="event_date" value="<?php echo $row[2]; ?>" required >
                            </div>
                            <label class="radio-inline">
                                <input type="radio" name="event_type" value="Public">Public
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="event_type" value="Private">Private
                            </label>
                            <br/><br/>
                            <div class="form-group">
                                <input class="form-control" value="<?php echo $row[4]; ?>"  name="event_subject" type="text"
                                       required>
                            </div>
                            <div class="form-group">
                                 <label for="esubject">Event Details</label>
                                <textarea class="form-control" rows="4" name="event_text" required> <?php echo $row[5]; ?> </textarea>
                             </div>
                             <input class="btn btn-lg btn-info btn-block" type="submit" value="Update"
                                   name="btn-update" onclick="return(submitreg());">
                        </fieldset>
                    </form><?php break;
               }
             ?>
        </div>
    </div>
</div><br/><br/><br/>
<?php include 'sidebar.php'; ?>   
</div></div>
<?php include 'footer.php' ?>
<script src="js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>