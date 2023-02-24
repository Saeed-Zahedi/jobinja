<?php 
include_once('functions.php');
$all_users=get_all_users();
?>
<table>
<?php foreach($all_users as $users){
    $username=$users['username'];
    $user_id=$users['id'];
    echo $username;
    ?>
    <br>
    <a href="<?php echo goto_delete_user($username);?>">delete user</a>
    <br>
    <a href="<?php echo goto_edit_user_from_admin($user_id);?>">edit user</a>
    <br>    
    <br>
<?php } ?>
</br>
<a href="http://localhost/projects/add_user.php">add new users</a>
</br>
<a href="http://localhost/projects/admin_page.php">exit</a>
