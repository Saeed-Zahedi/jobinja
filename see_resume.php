<?php 
include_once('functions.php');
$offer_id=$_GET['offer_id'];
$resumes=see_sent_resume($offer_id);
?>
<table>
<?php
$sum=1; 
foreach($resumes as $resume){
    $user=find_user_by_id($resume['user_id']);
    $user=$user->fetch_assoc();
    $skills=see_user_skills($user['id']);
    $username=$user['username'];
    $email=$user['email'];
    $phonenumber=$user['phonenumber'];

    ?>
<tr>   
</t>
    <?php echo "user$sum:"."username:$username     email:$email     phonenumber:$phonenumber" ; 
    $sum++;
?>
</br>
    skills:</br >
        <?php foreach($skills as $skill){
            $category=$skill['category_id'];
            $name=see_skill_by_id($category)['name'];
            echo $name;
            ?>
            </t>
            <?php
        }
        ?>
    
</br>
</br>
</tr>

<?php }?>
</table>        