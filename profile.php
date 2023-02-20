    <?php 
    include_once('functions.php');
    include_once('db.php');      
    $user_id;
    $user_id=$_GET['user_id'];
    $user=find_user_by_id($user_id);
    $user=$user->fetch_assoc(); 
    ?>
    username:<?php echo $user['username'];?>
    </br>
    emil:<?php echo $user['email'];?>
    </br>
    phone_number:<?php echo $user['phonenumber'];?>
    </br>
    <a href="<?php echo goto_edit_profile($user_id); ?>">edit</a>
</br>
    <?php
    $skills=see_user_skills($user_id);  
    echo 'your skills:';
    ?>
    </br>
    <br/>
    <?php
    foreach($skills as $skill){
        $category=$skill['category_id'];
        $name=see_skill_by_id($category)['name'];
        echo $name;
        ?>
        <a href="<?php echo goto_delete_skill_for_user($category,$user_id); ?>">delete</a>
        <br>
        <?php
    }
    ?>
 <a href="<?php echo goto_user_category_from_profile($user_id);?>">add skill</a>
</br>
</br>
<a href="<?php echo goto_see_result_resume($user_id);?>">see sent resume</a>
</br>
 <a href="<?php echo goto_main_page($user_id);?>">exit</a>
    
    
