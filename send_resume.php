<?php


global$db;

$db=new mysqli('localhost','saeed','1234','JOB');

function send_resume($user_id=1,$offer_id){
    global$db;
    $db->query("
    INSERT INTO `sent_resume` (user_id,offer_id) VALUES
    ('$user_id','$offer_id')
    ");
}

$user_id;
$offer_id;
$user_id=$_GET['user_id'];
$offer_id=$_GET['offer_id'];
send_resume($user_id,$offer_id);

?>