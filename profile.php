    <?php 
    $user_id;
    $user_id=$_GET['user_id'];
    $user=find_user_by_id($user_id);
    ?>
    username:<?php echo $user_id['username'];?>
    </br>
    emil:<?php echo $user_id['email'];?>
    </br>
    phone_number:<?php echo $user_id['phonenumber'];?>
    </br>
    
    ?>