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
$category=$offer['category'];
$city=$offer['city'];
$company=$offer['company'];
$time=$offer['time'];
?>
<tr>category:<?php echo $category ?>
</br>
city:<?php echo $city ?>
</br>
company:<?php echo $company ?>
</br>
time:<?php echo $time ?>
</tr>
</br>
</br>
</br>
<?php }?>