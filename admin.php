<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once('db.php');

function add_category($name){
    global$db;
    $db->query("
    INSERT INTO `catagory` (name) VALUES
    ('$name')
    ");
}

function add_city($name){
    global$db;
    $db->query("
    INSERT INTO `city` (name) VALUES
    ('$name')
    ");
}
function add_companyname($name){
    global$db;
    $db->query("
    INSERT INTO `company_name` (name) VALUES
    ('$name')
    ");
}

function add_offer($company_name,$level,$salary,$city,$time,$status,$category){
    global$db;
    $result=$db->query("
    SELECT * FROM `offer`
    ORDER BY id DESC
    LIMIT 1
    ");
    $row=$result->fetch_assoc();
    $id=$row['id'];
    $id++;
    $db->query("
    INSERT INTO `offer` (id, company_name, level, salary, city, time, status, category) VALUES 
    ('$id','$company_name','$level','$salary','$city','$time','$status','$category')
    ");
}
function add_admin($username,$password,$email){
    global$db;
    $db->query("
    INSERT INTO `admin` (username,password,email) VALUES
    ('$username','$password','$email')  
    ");
}
function add_user($username,$password,$email,$phonenumber,$skills){
    global$db;
    $db->query("
    INSERT INTO `user` (username,password,email,phonenumber,skills) VALUES
    ('$username','$password','$email','$phonenumber','$skills')
    ");
}

?>