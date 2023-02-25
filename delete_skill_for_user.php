<?php
include_once('functions.php');
$user_id = $_GET['user_id'];
$category_id = $_GET['category_id'];
delete_skill_for_user($category_id, $user_id);
header("location:/projects/profile.php?user_id=$user_id");
die();
