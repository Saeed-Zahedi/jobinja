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
<a href="<?php echo goto_send_message_user($user_id);?>">exit</a>