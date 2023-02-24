<?php
include_once('functions.php');
global$user_id;
$user_id=$_GET['user_id'];
function procces_input(){
    global$user_id;
    if(isset($_POST['send'])&&!empty($_POST['Textarea'])){
        send_message($user_id,$_POST['Textarea']);
    }
}
$messages=see_all_messages_user($user_id);
foreach($messages as $message){
    $id=$message['id'];
    if($message['is_admin']==0){
        echo 'you:';
    }
    echo $message['text'];
    echo "     ";
    ?>
    <a href="<?php echo goto_see_admin_answer($user_id,$id); ?>">see admin answer for this message</a>
    </br>
<?php } ?>
<form class="form-horizontal" method="post">
<div class="form-group">
    <label for="Textarea">new mesage</label>
    <textarea class="form-control" id="Textarea"  name="Textarea"rows="3"></textarea>
</div>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" name="send" class="btn btn-primary">send</button>
                        </div>
                    </div>
                    <?php procces_input();?>
                </form>

<a href="<?php 
global$user_id;
include_once('functions.php');
goto_main_page($user_id);?>">exit</a>