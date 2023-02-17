<?php 
function procces_input(){
    echo 'hi';
    var_dump($_POST);
    if(isset($_POST['login'])&&!empty($_POST['username'])&&!empty($_POST['password'])){
        echo 'hi';
        $user_id=$_POST['username'];
        echo 'hi';
        header("location:http://localhost/projects/mainpage.php?user_id=$user_id");
        die();
    }
}
?>

<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">login </h3>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" method="post">
                    <div class="form-group">
                        <label for="username" class="col-sm-2 control-label">username</label>
                        <div class="col-sm-10">
                
                            <input class="form-control" id="username" name="username" placeholder="username"
                                value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="password">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" name="login" class="btn btn-primary">login</button>
                        </div>
                    </div>
                    <?php procces_input() ?>
                </form>
            </div>
        </div>

    </div>
    <div class="col-md-2"></div>
</div>
