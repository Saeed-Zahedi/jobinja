<?php
include_once('functions.php');
$username;
$password;
$company;
$username=$_GET['username'];
$password=$_GET['password'];
$company=find_company_of_offermaker($username,$password);

$offers=see_offers_of_company($company);

?>
list of the id's:
</br>
<table>
<?php foreach($offers as $offer){
$id=$offer['id']; 
$category=$offer['category'];   
?>
    <tr>
<?php 
echo $category.":";echo $id;
?>
</br>
<a href="<?php echo "http://localhost/projects/see_resume.php?offer_id=$id&username=$username&password=$password" ?>">see sent resume</a>
</br>
</br>
</tr>
<?php }?>
</table>
<a href="<?php echo goto_make_new_offer($username,$company,$password);?>">make new offer</a>
</br>
</br>
<a href="http://localhost/projects/mainpage.php">exit</a>