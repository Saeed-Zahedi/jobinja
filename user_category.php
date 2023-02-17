<?php 
include_once('functions.php');
$user_id;
$category_id;
$user_id=$_GET['user_id'];
$category_id=$_GET['category_id'];
$all_category=see_all_categories();
?>
<table>
<?php
foreach($all_category as $category){
$category_id=$category['category_id']
?>
<tr>
<?php echo $category['name'];?>
<a href="http://localhost/projects/add_skill.php?user_id=$user_id&categry_id=$category_id"></a>
</tr>
<?php }?>