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
    SELECT * FROM `company`
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
function see_offers($category_name=null,$city=null){
    global$db;
    if(is_null($category_name)){
        if(is_null($city)){
            $result=$db->query("
            SELECT * FROM `offer` 
            ");
            return $result;
        }else{
            $result=$db->query("
            SELECT * FROM `offer`
            WHERE city='$city' 
            ");   
            return $result;
        }
    }
    else{
        if(is_null($city)){
            $result=$db->query("
            SELECT * FROM `offer`
            WHERE category='$category_name' 
            ");
            return $result;
        }else{
            $result=$db->query("
            SELECT * FROM `offer`
            WHERE city='$city' AND
            category='$category_name'
            ");   
            return $result;
        }
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
    INSERT INTO `offer_maker` (username,password,company) VALUES
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
function goto_add_skill_from_admin($user_id,$category_id){
    return "http://localhost/projects/add_skill_from_admin.php?user_id=".$user_id."&category_id=".$category_id;
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
function see_result_of_sent_resume($user_id){
    global$db;
    $result=$db->query("
        SELECT * FROM `resume_result`
        WHERE user_id='$user_id'
    ");
    return $result;
}
function get_offer_by_id($offer_id){
    global$db;
    $result=$db->query("
    SELECT * FROM `offer`
    WHERE id=$offer_id
    ");
    return $result;
}
function goto_see_result_resume($user_id){
    return "http://localhost/projects/see_result_resume.php?user_id=$user_id";
}
function goto_make_new_offer($username,$company,$password){
    return "http://localhost/projects/make_offer.php?username=".$username."&company=".$company."&password=".$password;
}function get_all_cities(){
    global$db;
    $result=$db->query("
    SELECT * FROM `city`
    ");
    return $result;
}
function make_new_offer($company_name,$level,$salary,$city,$time,$status,$category){
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
    INSERT INTO `offer`(id,company_name,level,salary,city,time,status,category)VALUES
    ('$id','$company_name','$level','$salary','$city','$time','$status','$category')
    ");
}
function is_admin($username,$password){
    global$db;
    $result=$db->query("
    SELECT * FROM `admin`
    WHERE username='$username'
    AND password='$password'
    ");
    $result=$result->fetch_assoc();
    if(!empty($result)){
        return true;
    }return false;
}
function delete_user($username){
    global$db;
    $db->query("
    DELETE FROM `user`
    WHERE  username ='$username'
    ");
}
function get_all_users(){
    global$db;
    $result=$db->query("
    SELECT * FROM `user`
    ");
    return $result;
}
function goto_delete_user($username){
    return "http://localhost/projects/delete_user.php?username=".$username;
}
function goto_edit_user_from_admin($user_id){
    return "http://localhost/projects/edit_profile_from_admin.php?user_id=".(int)$user_id;
}
function get_all_companies(){
    global$db;
    $result=$db->query("
    SELECT * FROM `company`
    ");
    return $result;
}
function see_offers_by_category($category){
    global$db;
    $result=$db->query("
    SELECT * FROM `offer`
    WHERE category='$category'
    ");
    return$result;
}
function goto_main_page_by_category($category_name,$user_id){
    if($user_id==NULL){
        return "http://localhost/projects/mainpage.php?category=".$category_name;
    }
    return"http://localhost/projects/mainpage.php?category=".$category_name."&user_id=".$user_id;
}
function goto_send_message_user($user_id){
    return "http://localhost/projects/send_message_user.php?user_id=".$user_id;
}
function send_message($user_id,$text){
    global$db;
    $result=$db->query("
    SELECT * FROM `message`
    ORDER BY id DESC
    LIMIT 1
    ");
    $row=$result->fetch_assoc();
    $id=$row['id'];
    $id++;
    $db->query("
    INSERT INTO `message`
    (user_id,text,id,is_admin)VALUES
    ('$user_id','$text','$id','0')
    ");
    header("location:/projects/mainpage.php?user_id=$user_id");
    die();
}
function see_all_messages_user($user_id){
    global$db;
    $result=$db->query("
    SELECT * FROM `message`
    WHERE user_id=$user_id
    AND is_admin='0'
    ");
    return $result;
}
function see_all_messages_admin(){
    global$db;
    $result=$db->query("
    SELECT * FROM `message`
    WHERE is_admin='0'
    ");
    return $result;
}
function send_message_admin($user_id,$id){
    return("http://localhost/projects/write_message_admin.php?user_id=$user_id&id=$id");
}
function write_message_admin($user_id,$text,$id){
    global$db;
    $db->query("
    INSERT INTO `message`
    (user_id,text,id,is_admin)VALUES
    ('$user_id','$text','$id','1')
    ");
    header("location:admin_page.php");
    die();      
}
function see_admin_answer($user_id,$id){
    global$db;
    $result=$db->query("
    SELECT * FROM `message`
    WHERE user_id=$user_id AND 
    id=$id AND is_admin='0'
    ");
    return $result;
}
function goto_see_admin_answer($user_id,$id){
    return "http://localhost/projects/see_admin_answer.php?user_id=".$user_id."&id=".$id;
}
?>  