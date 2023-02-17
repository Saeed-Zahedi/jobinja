<?php
include_once('function.php');

$user_id;
$offer_id;
$user_id=$_GET['user_id'];
$offer_id=$_GET['offer_id'];
send_resume($user_id,$offer_id);
header("");
?>