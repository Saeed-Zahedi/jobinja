<?php
include_once('db.php');
include_once('functions.php');
global$user_id;
global$category;
global$city;
global$company_name;
global$time;

?>

<?php
global$category;
global$city;
global$company_name;
global$time;
$offers=see_offers($category,$city,$company_name,$time);
?>
<table>
<?php
foreach($offers as $offer){
$o_offer_id=$offer['id'];
$o_category=$offer['category'];
$o_city=$offer['city'];
$o_company=$offer['company_name'];
$o_time=$offer['time'];
?>
<tr>category:<?php echo $o_category ?>
</br>
city:<?php echo $o_city ?>
</br>
company:<?php echo $o_company ?>
</br>   
time:<?php echo $o_time ?>
</br> 
<a class="btn btn-primary" href="<?php 
if(empty($user_id)){
    echo 
}
echo "http://localhost/projects/send_resume.php?user_id=$user_id&offer_id=$o_offer_id"?>">
send</a>
</tr>
</br>
</br>
</br>
<?php }?>