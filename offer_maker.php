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
echo $category.":".$id;
?>
</br>
</br>
</tr>
<?php }?>
</table>
