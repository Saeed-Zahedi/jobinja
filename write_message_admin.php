<?php
include_once('functions.php');
global$user_id;
global$id;
$user_id=$_GET['user_id'];
$id=$_GET['id'];
function procces_input(){
global$user_id;
global$id;
    if(isset($_POST['send'])&&!empty($_POST['Textarea'])){
        write_message_admin($user_id,$_POST['Textarea'],$id);
    }
}
?>
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