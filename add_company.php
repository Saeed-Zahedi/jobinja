<?php
include_once('functions.php');
include_once('config.php');
function procces_input()
{
    if (isset($_POST['newcompany']) && !empty($_POST['company']) && !empty($_POST['email'])) {
        add_company($_POST['company'], $_POST['email']);
    }
}
?>

<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">add company</h3>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" method="post">
                    <div class="form-group">
                        <label for="company" class="col-sm-2 control-label">company</label>
                        <div class="col-sm-10">

                            <input class="form-control" id="company" name="company" placeholder="company" value="">
                        </div>
                    </div>
                    <form class="form-horizontal" method="post">
                        <div class="form-group">
                            <label for="email" class="col-sm-2 control-label">eamil</label>
                            <div class="col-sm-10">

                                <input class="form-control" id="email" name="email" placeholder="email" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" name="newcompany" class="btn btn-primary">add</button>
                            </div>
                        </div>
                        <?php procces_input() ?>
                    </form>
            </div>
        </div>

    </div>
    <div class="col-md-2"></div>
</div>
<a href="<?php echo SITE_URL; ?>/admin_page.php">exit</a>