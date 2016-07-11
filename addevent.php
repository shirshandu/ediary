<html>
<head lang="en">
    <meta charset="UTF-8">
    <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="sweetalert-master/lib/sweet-alert.css">
    <script src="sweetalert-master/lib/sweet-alert.min.js"></script>
    <title>EDiary | Add Events </title>
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
    </script>
    </head>
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
                    <p class="panel-title">Add New Event</p>
                </div>
                <div class="panel-body">
                    <form role="form" name="addevents" method="post">
                        <fieldset>
                            <div class="form-group">
                                <input type="hidden" class="form-control" name="user_id" value="<?php echo $_SESSION['user_id'] ?>" readonly >
                            </div>    
                            <div class="form-group">
                                <input type="date" class="form-control" placeholder="Event Date" id="birthday" name="event_date" required >
                            </div>
                            <label class="radio-inline">
                                <input type="radio" name="event_type" required value="Public">Public
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="event_type" required value="Private">Private
                            </label>
                            <br/><br/>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Event Subject" name="event_subject"  required>
                            </div>
                             <div class="form-group">
                                 <label for="esubject">Event Details</label>
                                <textarea class="form-control" rows="4" name="event_text" required> </textarea>
                             </div>
                                
                        
                            <input class="btn btn-lg btn-info btn-block" type="submit" value="Add Event"
                                   name="submit" onclick="return(submitreg());"><br/>
                             <a href="home.php"> <input class="btn btn-lg btn-info btn-block" type="submit" value="Back To Main Page"
                                   name="back"></a>             
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>

<?php include 'footer.php' ?>
<script src="js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>
<?php
    include_once 'include/class.user.php';
    $user = new User();
    if (isset($_REQUEST['submit'])){
        extract($_REQUEST);
        $register = $user->add_event($user_id,$event_date,$event_type,$event_subject,$event_text);
        if ($register) { ?>
            <script type='text/javascript'>
                swal("Congralution!", "New Event Added", "success")
                setTimeout(function(){window.location = 'home.php';}, 3000)
            </script>
            <?php
        } else { ?>
            <script type='text/javascript'>
                swal("Oops...!", "Failed. Please Try Again!", "error");
            </script>
            <?php
        }
    }
?>