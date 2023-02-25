<?php
include_once('functions.php');
$user_id = $_GET['user_id'];
$category_id = $_GET['category_id'];
add_skill($user_id, $category_id);
header("location:http://localhost/projects/user_category.php?user_id=$user_id");
die();
