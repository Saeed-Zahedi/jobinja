<?php 
include_once('functions.php');
$offer_id=$_GET['offer_id'];
$resumes=see_sent_resume($offer_id);?>
<table>
<?php foreach($resumes as $resume){
    $user=find_user_by_id($resume['user_id']);
    $user=$user->fetch_assoc();
    $username=$user['username'];
    $email=$user['email'];
    $phonenumber=$user['phonenumber'];

    ?>
<tr>
    <?php echo "username:$username     email:$email     phonenumber:$phonenumber"; ?>
</br>
</br>
</tr>

<?php }?>
</table>