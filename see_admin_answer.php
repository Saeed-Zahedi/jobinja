<?php 
include_once('functions.php');
$user_id=$_GET['user_id'];
$id=$_GET['id'];
$messages=see_admin_answer($user_id,$id);
foreach($messages as $message){
    echo $message['text'];?>
    </br>
    <?php
}
?>
