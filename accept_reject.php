<?php
include_once('functions.php');
$username = $_GET['username'];
$password = $_GET['password'];
$offer_id = $_GET['offer_id'];
$user_id = $_GET['user_id'];
$result = $_GET['result'];
accept_and_reject_resume($offer_id, $user_id, $result);
header("location:see_resume.php?offer_id=$offer_id&username=$username&password=$password");
die();
