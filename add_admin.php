<?php 
include_once('functions.php');
function procces_input(){
    if(isset($_POST['newadmin'])&&!empty($_POST['username'])&&!empty($_POST['password'])&&!empty($_POST['email'])){
        add_admin($_POST['username'],$_POST['password'],$_POST['email']);
    }
}
?>

<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">add admin</h3>
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
                    <form class="form-horizontal" method="post">
                    <div class="form-group">
                        <label for="password" class="col-sm-2 control-label">password</label>
                        <div class="col-sm-10">
                
                            <input class="form-control" id="password" name="password" placeholder="password"
                                value="">
                        </div>
                    </div>
                    <form class="form-horizontal" method="post">
                    <div class="form-group">
                        <label for="email" class="col-sm-2 control-label">email</label>
                        <div class="col-sm-10">
                
                            <input class="form-control" id="email" name="email" placeholder="email"
                                value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" name="newadmin" class="btn btn-primary">add</button>
                        </div>
                    </div>
                    <?php procces_input() ?>
                </form>
            </div>
        </div>

    </div>
    <div class="col-md-2"></div>
</div>
<a href="http://localhost/projects/admin_page.php">exit</a>