<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once('db.php');

function add_category($name){
    global$db;
    $result=$db->query("
    SELECT * FROM `category`
    ORDER BY id DESC
    LIMIT 1
    ");
    $row=$result->fetch_assoc();
    $id=$row['id'];
    $id++;
    $db->query("
    INSERT INTO `category` (id,name) VALUES
    ('$id','$name')
    ");
}

function add_city($name){
    global$db;
    $result=$db->query("
    SELECT * FROM `category`
    ORDER BY id DESC
    LIMIT 1
    ");
    $row=$result->fetch_assoc();
    $id=$row['id'];
    $id++;
    $db->query("
    INSERT INTO `city` (id,name) VALUES
    ('$id','$name')
    ");
}
function add_company($name,$email){
    $name=strtolower($name);
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
    INSERT INTO `company` (id,name,email) VALUES
    ('$id','$name','$email')
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
    $result=$db->query("
    SELECT * FROM `user`
    ORDER BY id DESC
    LIMIT 1
    ");
    $row=$result->fetch_assoc();
    $id=$row['id'];
    $id++;
    $db->query("
    INSERT INTO `user` (id,username,password,email,phonenumber,skills) VALUES
    ('$id','$username','$password','$email','$phonenumber','$skills')
    ");
}
function is_user_uniqe($username,$email){
    global$db;
    $result=$db->query("
    SELECT * FROM `user`
    WHERE username='$username' OR 
    email='$email'
    ");
    $row=$result->fetch_assoc();
    if(empty($row)){
        return false;
    }return true;
}

function is_admin_uniqe($username,$email){
    global$db;
    $result=$db->query("
    SELECT * FROM `admin`
    WHERE username='$username' OR 
    email='$email'
    ");
    $row=$result->fetch_assoc();
    if(empty($row)){
        return false;
    }return true;
}
function does_company_exist($name){
    $name=strtolower($name);
    global$db;
    $result=$db->query("
    SELECT * FROM `company`
    WHERE name='$name'
    ");
    $row=$result->fetch_assoc();
    if(empty($row)){
        return false;
    }return true;
}
function does_city_exist($name){
    $name=strtolower($name);
    global$db;
    $result=$db->query("
    SELECT * FROM `city`
    WHERE name='$name'
    ");
    $row=$result->fetch_assoc();
    if(empty($row)){
        return false;
    }return true;
}
function user_singup($username,$password,$email,$phonenumber,$skills=null){
    global$db;
    $result=$db->query("
    SELECT * FROM `user`
    ORDER BY id DESC
    LIMIT 1
    ");
    $row=$result->fetch_assoc();
    $id=$row['id'];
    $id++;
    $db->query("
    INSERT INTO `user`(id,username,password,email,phonenumber,skills)VALUES
    ('$id','$username','$password','$email','$phonenumber','$skills')
    ");
}
user_singup('s','p','e','1');
user_singup('s','p','e','1','asd');

?>