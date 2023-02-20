<?php

use LDAP\Result;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once('db.php');
include_once('config.php');

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
function see_offers($category=null,$city=null,$company_name=null,$time=null){
    global$db;
    if(is_null($company_name)||is_null($time)){
        $result=$db->query("
        SELECT * FROM `offer` 
        ");
        return $result;
    }elseif(is_null($company_name)&&is_null($time)){
        $result=$db->query("
        SELECT * FROM `offer`
        WHERE category='$category' AND
        city='$city' 
        ");
        return $result;
    }elseif(is_null($company_name)){
        $result=$db->query("
        SELECT * FROM `offer`
        WHERE category='$category' AND
        city='$city' AND 
        time='$time' 
        ");
        return $result;        
    }elseif(is_null($time)){
        $result=$db->query("
        SELECT * FROM `offer`
        WHERE category='$category' AND
        city='$city' AND 
        company_name='$company_name' 
        ");
        return $result;        
    }
}

function send_resume($user_id=1,$offer_id){
    echo 'hi';
    global$db;
    $db->query("
    INSERT INTO `sent_resume` (user_id,offer_id) VALUES
    ('$user_id','$offer_id')
    ");
    $db->query("
    INSERT INTO `resume_result`(offer_id,user_id,result)VALUES
    ('$offer_id','$user_id','0');
    ");
}

function add_offer_maker($username,$password,$company_name){
    global$db;
    $db->query("
    INSERT INTO `offer_maker` (username,password,company_name) VALUES
    ('$username','$password','$company_name')
    ");
}

function redirect($url){
    $des=SITE_URL.$url;
    header("Location:$des");
    die();
}
function find_user_id($username){
    global $db;
    $result=$db->query("
    SELECT * FROM `user`
    WHERE username='$username'
    ");
    $row=$result->fetch_assoc();
    return $row['id'];    
}
function is_offermaker($username,$password){
    global $db;
    $result=$db->query("
    SELECT * FROM `offer_maker`
    WHERE username='$username'
    AND password=$password
    ");
    $row=$result->fetch_assoc();
    if(!empty($row)){
        return true;
    }return false;
}
function find_company_of_offermaker($username,$password){
    global $db;
    $result=$db->query("
    SELECT * FROM `offer_maker`
    WHERE username='$username'
    AND password=$password
    ");
    $row=$result->fetch_assoc();
    return $row['company'];
}
function see_offers_of_company($company){
    global $db;
    $result=$db->query("
    SELECT * FROM `offer` 
    WHERE company_name='$company'
    ");
    return $result;
}
function see_sent_resume($id){
    global $db;
    $result=$db->query("
    SELECT * FROM `sent_resume` 
    WHERE offer_id='$id'
    ");
    return $result;
}
function find_user_by_id($id){
    global$db;
    $result=$db->query("
    SELECT * FROM `user`
    WHERE id=$id 
    ");
    return $result;
}
function see_all_categories(){
    global$db;
    $result=$db->query("
    SELECT * FROM `category`
    ");
    return $result;
}
function add_skill($user_id,$category_id){
    global$db;
    $result=$db->query("
    INSERT INTO `user_category`
    (user_id,category_id)
    VALUES
    ('$user_id','$category_id')
    ");
}
function goto_add_skill($user_id,$category_id){
    return "http://localhost/projects/add_skill.php?user_id=".$user_id."&category_id=".$category_id;
}
function goto_main_page($user_id){
    return "http://localhost/projects/mainpage.php?user_id=".$user_id;
}
function see_user_skills($user_id){
    global$db;
    $result=$db->query("
    SELECT * FROM `user_category`
       WHERE user_id='$user_id'
    ");
    return $result;
}
function see_skill_by_id($category_id){
    global$db;
    $result=$db->query("
    SELECT * FROM `category`
    WHERE id=$category_id
    ");     
    return $result->fetch_assoc();
}
function goto_profile_page($user_id){
    return "http://localhost/projects/profile.php?user_id=".(int)$user_id;
}
function delete_skill_for_user($category_id,$user_id){
    global$db;
    $db->query("
    DELETE FROM `user_category`
    WHERE user_id=$user_id 
    AND category_id=$category_id 
    ");
}
function goto_delete_skill_for_user($category_id,$user_id){
    return "http://localhost/projects/delete_skill_for_user.php?user_id=".(int)$user_id."&category_id=".(int)$category_id;
}
function goto_user_category_from_profile($user_id){
    return "http://localhost/projects/user_category_from_profile.php?user_id=".(int)$user_id;
}
function goto_edit_profile($user_id){
    return "http://localhost/projects/edit_profile.php?user_id=".(int)$user_id;
}
function update_user($user_id,$username,$password,$email,$phonenumber){
    global$db;
    $db->query("
    UPDATE `user` SET 
    username='$username', 
    password='$password',
    email='$email',
    phonenumber='$phonenumber'
    WHERE id=$user_id
    ");
}
function find_user_by_username($username){
    global$db;
    $result=$db->query("
    SELECT * FROM `user`
    WHERE username='$username'
    ");
    return $result;
}
function accept_and_reject_resume($offer_id,$user_id,$result){
    global$db;
        $db->query("
        UPDATE `resume_result` SET
        result=$result
        WHERE 
        user_id=$user_id AND
        offer_id=$offer_id
        ");
}
function goto_accept_reject($offer_id,$user_id,$result,$password){
    return "http://localhost/projects/accept_reject.php?offer_id=".$offer_id."&user_id=".$user_id."&result=".$result."&password=".$password;
}
function goto_offer_maker($username,$password){
    return "http://localhost/projects/offer_maker.php?username=".$username."&password=".$password;
}
?>  