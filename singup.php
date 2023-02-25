<?php 
include_once('functions.php');
function procces_input(){
    if(isset($_POST['signup'])&&!empty($_POST['username'])&&!empty($_POST['password'])&&!empty($_POST['email'])&&!empty($_POST['phonenumber'])){
        $username=$_POST['username'];
        $password=$_POST['password'];
        $email=$_POST['email'];
        $phonenumber=$_POST['phonenumber'];
        if(is_user_uniqe($username,$email)){
        user_singup($username,$password,$email,$phonenumber);
        $user_id=find_user_id($username);
        header("location:http://localhost/projects/user_category.php?user_id=$user_id");
        die();
        }else{
            echo 'this username or eamil has been used!!!';
            header("location:http://localhost/projects/singup.php?");
            die();
        }
    }
}
?>

<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">singup</h3>
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
                        <label for="inputPassword3" class="col-sm-2 control-label">email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="email" name="email"
                                placeholder="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">phonenumber</label>
                        <div class="col-sm-10">
                            <input type="phonenumber" class="form-control" id="phonenumber" name="phonenumber"
                                placeholder="phonenumber">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" name="signup" class="btn btn-primary">sign up</button>
                        </div>
                    </div>
                    <?php procces_input() ?>
                </form>
            </div>
        </div>

    </div>
    <div class="col-md-2"></div>
</div>
<a href="http://localhost/projects/mainpage.php">exit</a>
