<?php
include_once('db.php');
include_once('functions.php');
global$user_id;
global$category;
global$city;
global$company_name;
global$time;
if(!empty($_GET['user_id'])){
$user_id=$_GET['user_id'];
}
if(!empty($_POST['category'])){
    $category=$_POST['category'];

}
if(!empty($_POST['city'])){
    $city=$_POST['city'];

}
?>

<?php
global$category;
global$city;
global$company_name;
global$time;
$offers=see_offers($category,$city,$company_name,$time);
?>
<a href="http://localhost/projects/login.php">sing in/up</a>
</br>
<?php 
if(!empty($user_id)){?>
<a href="<?php echo goto_profile_page((int)$user_id); ?>">see profile</a>
<?php }?>
<form class="form-horizontal" method="post">
                <div class="form-group">
    <label for="category">category</label>
    <select class="form-control" id="category" name="category">
    <?php $all_category=see_all_categories();
foreach($all_category as $categorys){
    ?>
    <option><?php echo $categorys['name']; ?></option>
    <?php
  }
  ?>
</select>
</div>
<form class="form-horizontal" method="post">
                <div class="form-group">
    <label for="city">city</label>
    <select class="form-control" id="city" name="city">
    <?php $all_cities=get_all_cities();
foreach($all_cities as $cities){
    ?>
    <option><?php echo $cities['name']; ?></option>
    <?php
  }
  ?>
</select>
</div>
<div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" name="forcategory" class="btn btn-primary">search this!</button>
                        </div>
                    </div>
                    
                </form>
</br>
</br>
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
time:<?php 
switch($o_time){
    case '1':echo 'part time';
             break;
    case '2':echo 'full time';
             break;
    case '3':echo 'project ';
             break;
} ?>
</br> 
<a class="btn btn-primary" href="<?php 
if(empty($user_id)){
    echo "http://localhost/projects/login.php";
}else{echo "http://localhost/projects/send_resume.php?user_id=$user_id&offer_id=$o_offer_id";}?>">
send resume</a>
</tr>
</br>
</br>
</br>
<?php }?>
<a href="<?php 
if(!empty($user_id)){
echo goto_send_message_user($user_id);
}else{
    echo "http://localhost/projects/login.php";
}
?>">messages</a>