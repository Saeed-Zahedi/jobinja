<?php 
include_once('functions.php');
$username=$_GET['username'];
delete_user($username);
header("location:/projects/see_all_users.php");
die();
?>