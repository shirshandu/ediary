<?php
include_once 'include/class.user.php';
$con = new User();
$table = "event";
if(isset($_GET['delete_id']))
{
	$id=$_GET['delete_id'];
	$res=$con->delete_event($table,$id);
	if($res)	{
		?>
		<script>
        window.location='home.php'
        </script>
		<?php
	}	else {
		?>
		<script>
		alert('Record can not be Deleted !!!')
        window.location='home.php'
        </script>
		<?php
	}
}
?>