<?php
	session_start();//session is a way to store information (in variables) to be used across multiple pages.
    include_once 'include/class.user.php';
    $user = new User();
    $user->get_session();
    unset($_SESSION['user_id']);
	header('Location: index.php');
?>