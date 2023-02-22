<?php 
include_once('functions.php');
function procces_input(){
    if(isset($_POST['category'])&&!empty($_POST['name'])){
        add_category($_POST['name']);
    }
}
?>

<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">name of category</h3>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" method="post">
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">category name</label>
                        <div class="col-sm-10">
                
                            <input class="form-control" id="name" name="name" placeholder="category name"
                                value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" name="category" class="btn btn-primary">add</button>
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