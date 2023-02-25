<?php
include_once('functions.php');
$messages=see_all_messages_admin();
foreach($messages as $message){
    echo "user_id";
    echo $message['user_id'];
    echo ":";
    echo $message['text'];
    $id=$message['id'];
    $user_id=$message['user_id'];
    ?>
    <a href="<?php echo send_message_admin($user_id,$id);?>">answer</a>
</br>
<?php }?>
<a href="http://localhost/projects/admin_page.php">exit</a>
